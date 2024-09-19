<?

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
            'return_url' => 'http://leon.loc/paymentsucceeded', // URL возврата после оплаты
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


function handleWebhook() {
    global $db;

    $input = @file_get_contents("php://input");
    $event_json = json_decode($input, true);

    if (isset($event_json['event'])) {
        $payment_id = $event_json['object']['id'];
        $status = $event_json['object']['status'];
        $payment_method = $event_json['object']['payment_method']['type'];

        // Обновляем данные о платеже в базе данных
        mqo("UPDATE payments SET status = ?, payment_method = ? WHERE payment_id = ?", [
            $status,
            $payment_method,
            $payment_id
        ]);

        // Извлекаем идентификатор заказа по payment_id
        $order_id = mqo("SELECT order_id FROM payments WHERE payment_id = ?", [$payment_id])['order_id'];

        // Обновляем статус заказа в зависимости от статуса платежа
        switch ($status) {
            case 'pending':
                mqo("UPDATE orders SET status = 'pending' WHERE id = ?", [$order_id]);
                break;
            case 'waiting_for_capture':
                mqo("UPDATE orders SET status = 'waiting_for_capture' WHERE id = ?", [$order_id]);
                break;
            case 'succeeded':
                mqo("UPDATE orders SET status = 'succeeded' WHERE id = ?", [$order_id]);
                break;
            case 'canceled':
                mqo("UPDATE orders SET status = 'canceled' WHERE id = ?", [$order_id]);
                break;
        }
    }
}

// Вызов функции для обработки вебхуков
handleWebhook();