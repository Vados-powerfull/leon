<?
	session_start();
    include ('../../core/model/common.php');
    include ('../../core/model/modules/yookassa/payments.php');

	if (empty($_POST['cart_email']) || empty($_POST['cart_dost']) || empty($_POST['cart_pay'])) {
		// echo '<script>$("#loader").remove(); alert("Пожалуйста, заполните все обязательные поля");</script>';
		exit;
	}

function generatePassword($length = 6) {
    // Набор символов: цифры и буквы
    $characters = '0123456789';
    $charactersLength = strlen($characters);
    $password = '';

    // Генерируем случайные символы
    for ($i = 0; $i < $length; $i++) {
        $password .= $characters[rand(0, $charactersLength - 1)];
    }

    return $password;
}


	
    $text = isset($_POST['sub']) ? $_POST['sub'].PHP_EOL : '';
    if(isset($_POST['cart_fio'])) $text.="ФИО: ".$_POST['cart_fio'].PHP_EOL;
	if(isset($_POST['cart_phone'])) $text.="Телефон: ".$_POST['cart_phone'].PHP_EOL;
	if(isset($_POST['basket_adress'])) $text.="Адрес: ".$_POST['basket_adress'].PHP_EOL;
	if(isset($_POST['cart_email'])) $text.="E-mail: ".$_POST['cart_email'].PHP_EOL;
	if(isset($_POST['cart_text'])) $text.="Сообщение: ".PHP_EOL.$_POST['cart_text'].PHP_EOL;
	if(isset($_POST['cart_pay'])) $text.="Способ оплаты: ".$_POST['cart_pay'].PHP_EOL;
	if(isset($_POST['cart_dost'])) {
		$type_info = mqo("SELECT name FROM catalog_type WHERE id='".$_POST['cart_dost']."'");
		$text.="Способ доставки: ".$type_info['name'].PHP_EOL;
	}

	$text.=PHP_EOL."Товар в корзине: ".PHP_EOL;
	if (!isset($_SESSION['user']) || $_SESSION['user'] == '')
	{
		$is_user = mqo("SELECT id FROM lc_users WHERE email = '".$_POST['cart_email']."'");
		if ($is_user) $user_id = $is_user["id"];
		else {
			$pass = generatePassword();
			$last_user_id = mqo("INSERT INTO lc_users (fio, adress, phone, email, pass) 
				VALUES ('".$_POST['cart_fio']."', '".$_POST['basket_adress']."', '".$_POST['cart_phone']."', '".$_POST['cart_email']."', '".$pass."')");
			$user_id = $last_user_id;
		}
	}
	else $user_id = $_SESSION['user'];

	$time_order = date("G:i:s");
	$date_order = date("Y-m-d");


	$print_goods = '';
	$goods = explode(",", $_COOKIE["cart"]);
	$total_price = $ves = 0;

	foreach ($goods as $item) {
		$item_info = mqo("SELECT * FROM catalog WHERE id='".$item."'");
		$text.= $item_info["name"].PHP_EOL;

		preg_match("/" . preg_quote($item_info["id"], "/") . "-(\d+)/", $_COOKIE["cart_amount"], $matches);
		$amount = $matches[1];
		$print_goods .= '<div class="order-item">
			<div class="order-img__container">
				<img class="item-img" src="'.$item_info["img"].'" alt="" />
			</div>
			<p class="item-name">'.$item_info["name"].'</p>
			<div class="item-total">
				<span class="item-price">'.$item_info["price"].' руб</span>
				<span class="item-amount">'.$amount.' шт</span>
			</div>
		</div>';
		$total_price = $total_price + $item_info["price"]*$amount;
		$ves = $ves + $item_info["ves"];
	}

	$lastId = mqo( "INSERT INTO `orders` (`details`, `phone`, `adress`, `comment`, `ves`, user_id, status_id, type_id, summ, time_order, date_order) 
                    VALUES ('$print_goods', '".$_POST['cart_phone']."', '".$_POST['basket_adress']."', '".$_POST['cart_text']."', '$ves', '$user_id', '1', '".$_POST['cart_dost']."', '$total_price', '$time_order', '$date_order')");


	
if ($_POST['cart_pay'] == "online") {
    createPayment($lastId, $total_price);
} else {
    $cnf = mqo("SELECT * FROM adm_m_feedback WHERE id = 1");
    $header = 'Content-type: text/plain; charset="utf-8 \r\n"'."From: ".$cnf["send_from"]." \r\n";
    $r = mail($cnf['send_to'], $cnf['mess_title'], $text, $header);

    if ($r) {
        echo '<script>$("#loader").remove(); alert("Заказ успешно отправлен! Мы свяжемся с Вами в ближайшее время");</script>';
    } else {
        echo '<script>$("#loader").remove(); alert("'.$cnf['mess_send'].'");</script>';
    }
}
 