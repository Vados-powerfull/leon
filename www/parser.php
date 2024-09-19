<?
include ('core/model/common.php');


// Загрузка XML файлов
$catalog_file = 'import0_1.txt';
$prices_file = 'import0_2.txt';

$catalog_xml = simplexml_load_file($catalog_file);
$prices_xml = simplexml_load_file($prices_file);

// Загружаем все категории
$categories = [];
$categories_result = $db->query("SELECT id, category_id, name FROM catalog_1c_cats");
while ($row = $categories_result->fetch(PDO::FETCH_ASSOC)) {
    $categories[$row['category_id']] = $row['id'];
}

// Проходим по товарам из первого файла
foreach ($catalog_xml->Каталог->Товары->Товар as $product) {
    $product_id = (string)$product->Ид;
    $artikul = (string)$product->Артикул;
    $name = (string)$product->Наименование;
    $description = (string)$product->Описание;
    $manufacturer = (string)$product->Изготовитель->Наименование;
    
    // Идентификатор категории (возможно нужно будет подогнать формат идентификаторов)
    $category_id = (int)$product->Группы->Ид;
    $category_db_id = isset($categories[$category_id]) ? $categories[$category_id] : null;

    // Поиск цен и количества во втором файле
    foreach ($prices_xml->ПакетПредложений->Предложения->Предложение as $price_offer) {
        if ((string)$price_offer->Ид == $product_id) {
            $price = (float)$price_offer->Цены->Цена->ЦенаЗаЕдиницу;
            $quantity = (int)$price_offer->Количество;

            // Проверка наличия товара в базе данных
            $sql = "SELECT id FROM catalog_1c WHERE product_id = ?";
            $stmt = mqo($sql, [$product_id]);

            if ($stmt) {
                // Если товар уже существует, обновляем его цену, количество и категорию
                $update_sql = "UPDATE catalog_1c SET price = ?, quantity = ?, name = ?, description = ?, manufacturer = ?, category_id = ?, updated_at = NOW() WHERE product_id = ?";
                mqo($update_sql, [$price, $quantity, $name, $description, $manufacturer, $category_db_id, $product_id]);
            } else {
                // Если товара нет, добавляем его
                $insert_sql = "INSERT INTO catalog_1c (product_id, artikul, name, description, price, manufacturer, quantity, category_id, date_added) VALUES (?, ?, ?, ?, ?, ?, ?, ?, NOW())";
                mqo($insert_sql, [$product_id, $artikul, $name, $description, $price, $manufacturer, $quantity, $category_db_id]);
            }
        }
    }
}

echo "Импорт завершен.";
?>
