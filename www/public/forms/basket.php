
<!-- АГРОЗ КОПИЯ -->

<?
	session_start();
    include ('../../core/model/common.php');
	
    $text = $_POST['sub'].PHP_EOL;
    if(isset($_POST['cart_fio'])) $text.="ФИО: ".$_POST['cart_fio'].PHP_EOL;
	if(isset($_POST['cart_phone'])) $text.="Телефон: ".$_POST['cart_phone'].PHP_EOL;
	if(isset($_POST['cart_adres'])) $text.="Адрес: ".$_POST['cart_adress'].PHP_EOL;
	if(isset($_POST['cart_email'])) $text.="E-mail: ".$_POST['cart_email'].PHP_EOL;
	if(isset($_POST['cart_text'])) $text.="Сообщение: ".PHP_EOL.$_POST['cart_text'].PHP_EOL;
	if(isset($_POST['cart_pay'])) $text.="Способ оплаты: ".$_POST['cart_pay'].PHP_EOL;
	if(isset($_POST['cart_dost'])) $text.="Способ доставки: ".$_POST['cart_dost'].PHP_EOL;
	
	$text.=PHP_EOL."Товар в корзине: ".PHP_EOL;

	$goods = explode(",", $_COOKIE["cart"]);
	foreach ($goods as $item) {
		$item_info = mqo("SELECT name FROM catalog WHERE id='".$item."'");
		$text.= $item_info["name"].PHP_EOL;
	}
	
	$cnf = mqo("SELECT * FROM adm_m_feedback WHERE id = 1");
	

	$header = 'Content-type: text/plain; charset="utf-8 \r\n"'."From: ".$cnf["send_from"]." \r\n";
	$r = mail($cnf['send_to'], $cnf['mess_title'], $text, $header);

	if ($r) echo '<script>$("#loader").remove(); alert("Заказ успешно отправлен! Мы свяжемся с Вами в ближайшее время");</script>';
	else echo '<script>$("#loader").remove(); alert("'.$cnf['mess_send'].'");</script>';
	