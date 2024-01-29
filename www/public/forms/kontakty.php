<?
	include ('../../core/model/common.php');
	$cnf = mqo("SELECT * FROM adm_m_feedback WHERE id = 1");


	$text = 'Имя: '.trim($_POST["name"]).PHP_EOL.
	'Фамилия: '.trim($_POST["sername"]).PHP_EOL.
	'Email: '.trim($_POST["email"]).PHP_EOL.
	'Телефон: '.trim($_POST["phone"]).PHP_EOL.
	'Компания: '.trim($_POST["company"]).PHP_EOL.
	'Причина обращения: '.trim($_POST["reason"]).PHP_EOL.
	'Сообщение: '.$cat['message'];

	$header = 'Content-type: text/plain; charset="utf-8 \r\n"'."From: ".$cnf["send_from"]." \r\n"; 
	$r = mail($cnf['send_to'], $_POST["sub"].' с сайта '.$_SERVER['HTTP_HOST'], $text, $header);
	if ($r) echo '<script>$("#loader").remove(); alert("'.$cnf['mess_send'].'");</script>';
	else echo '<script>$("#loader").remove(); alert("'.$cnf['mess_send'].'");</script>';	