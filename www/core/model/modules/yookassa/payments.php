<?
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
/*CREATE TABLE payments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT NOT NULL,                 -- ID заказа
    payment_id VARCHAR(255) NOT NULL,      -- ID платежа от ЮKassa
    status VARCHAR(50) NOT NULL,           -- Статус платежа
    amount DECIMAL(10, 2) NOT NULL,        -- Сумма оплаты
    currency VARCHAR(10) DEFAULT 'RUB',    -- Валюта
    payment_method VARCHAR(255),           -- Метод оплаты (карта, Яндекс.Деньги и т.д.)
    created_at DATETIME DEFAULT NOW(),     -- Дата создания платежа
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);*/


function createPayment($order_id, $amount) {
    global $db;

    $shopId = '461598';  // Замените на ваш shopId
    $secretKey = 'test_ECYUvM4kSAMxss9qxbhrrGIph5-U3L7DnfdtSNFwxoU';  // Замените на ваш секретный ключ

    // Данные для отправки в API ЮKassa
    $paymentData = [
        'amount' => [
            'value' => number_format($amount, 2, '.', ''),
            'currency' => 'RUB',
        ],
        'confirmation' => [
            'type' => 'redirect',
            'return_url' => 'https://leon.zrtest.ru/busket?order='.$order_id, // URL возврата после оплаты
        ],
        'capture' => true, // Автоматическое подтверждение платежа
        'description' => 'Оплата заказа № ' . $order_id,
    ];

    // Генерируем уникальный ключ для идемпотентности (например, на основе времени или UUID)
    $idempotenceKey = uniqid('', true);


    // Инициализируем cURL
    $ch = curl_init('https://api.yookassa.ru/v3/payments');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json',
        'Authorization: Basic ' . base64_encode($shopId . ':' . $secretKey),
        'Idempotence-Key: ' . $idempotenceKey  // Передаем уникальный ключ для идемпотентности
    ]);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($paymentData));
    
    // Отправляем запрос и получаем ответ
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    // Обработка результата
    if ($httpCode == 200) {
        $responseData = json_decode($response, true);

        // Сохраняем информацию о платеже в базу данных
        mqi('payments', [
            'order_id' => $order_id,
            'payment_id' => $responseData['id'],
            'status' => $responseData['status'],
            'amount' => $amount,
            'payment_method' => null, // Пока не известно
        ]);

        echo '<script type="text/javascript">
                var confirmationUrl = "' . $responseData['confirmation']['confirmation_url'] . '";
                window.location.href = confirmationUrl;
              </script>';
    } else {
        echo "Ошибка при создании платежа: " . $response;
        return false;
    }
}


   /*
    echo '<pre>';
    print_r($event_json);  // Выводим все данные вебхука для проверки
    echo '</pre>';
*/

function handleWebhook() {
    global $db;

    // Чтение данных, полученных через вебхук
    $input = @file_get_contents("php://input");
    $event_json = json_decode($input, true);



    // Записываем данные вебхука в лог-файл для проверки
    file_put_contents('webhook_log.txt', date("Y-m-d H:i:s") . " - Webhook Data: " . print_r($event_json, true) . "\n", FILE_APPEND);

    // Проверяем наличие объекта уведомления и объекта платежа в массиве
    if (isset($event_json['event']) && isset($event_json['object'])) {
        $event_type = $event_json['event'];
        $payment = $event_json['object'];  // Извлекаем данные о платеже из 'object'

        // Проверка, что это уведомление о платеже
        if ($event_type == 'payment.succeeded' || $event_type == 'payment.canceled' || $event_type == 'payment.waiting_for_capture') {
            $payment_id = $payment['id'];
            $status = $payment['status'];
            $amount = isset($payment['amount']['value']) ? $payment['amount']['value'] : 0;
            $payment_method = isset($payment['payment_method']['type']) ? $payment['payment_method']['type'] : 'unknown';

            // Логирование статуса для отладки
            file_put_contents('webhook_log.txt', date("Y-m-d H:i:s") . " - Статус: $status, Сумма: $amount\n", FILE_APPEND);

            // Обновляем данные о платеже в базе данных
            mqo("UPDATE payments SET status = ?, payment_method = ?, amount = ? WHERE payment_id = ?", [
                $status,
                $payment_method,
                $amount,
                $payment_id
            ]);

            // Получаем статус из таблицы payments_status
            $status_info = mqo("SELECT id FROM payments_status WHERE status = ?", [$status]);

            // Извлекаем идентификатор заказа по payment_id
            $order_info = mqo("SELECT order_id FROM payments WHERE payment_id = ?", [$payment_id]);

            // Обновляем данные о заказе в таблице orders
            mqo("UPDATE orders SET payment_status_id = ? WHERE id = ?", [
                $status_info["id"],
                $order_info["order_id"]
            ]);

            // Обрабатываем статусы платежа
            switch ($status) {
                case 'pending':
                    file_put_contents('webhook_log.txt', "Ваш платеж ожидает подтверждения...\n", FILE_APPEND);
                    break;
                case 'waiting_for_capture':
                    file_put_contents('webhook_log.txt', "Ваш платеж в обработке...\n", FILE_APPEND);
                    break;
                case 'succeeded':
                    file_put_contents('webhook_log.txt', "Ваша оплата успешно прошла!\n", FILE_APPEND);
                    echo 'все заеись!';
                    break;
                case 'canceled':
                    file_put_contents('webhook_log.txt', "Ваша оплата не прошла!\n", FILE_APPEND);
                    break;
            }

            // Отправляем ответ ЮKassa, что вебхук был успешно обработан
            http_response_code(200);
        } else {
            // Если пришло другое событие, которое мы не обрабатываем
            file_put_contents('webhook_log.txt', date("Y-m-d H:i:s") . " - Неизвестное событие: $event_type\n", FILE_APPEND);
        }
    } else {
        // Если объект платежа не найден, выводим сообщение в лог
        file_put_contents('webhook_log.txt', date("Y-m-d H:i:s") . " - Некорректный вебхук или недостаточно данных\n", FILE_APPEND);
        http_response_code(400);  // Сообщаем об ошибке, если вебхук не содержит нужные данные
    }
}
