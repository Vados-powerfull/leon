<?
	include ('../../core/model/common.php');
	$cnf = mqo("SELECT * FROM adm_m_feedback WHERE id = 1");
	$item = mqo("SELECT * FROM catalog WHERE id = ?",[$_POST['id']]);
	$cat = mqo("SELECT * FROM catalog_cats WHERE id = ?",[$item['cat_id']]);

	$text = 'Имя: '.trim($_POST["name"]).PHP_EOL.'Телефон: '.trim($_POST["tel"]).PHP_EOL.'Email: '.trim($_POST["mail"]).PHP_EOL.'Проект: '.$cat['name2'].' '.$item['name'].PHP_EOL.'Ссылка на сайт: http://'.$_SERVER['HTTP_HOST'].'/catalog/'.$cat['sys_name'].'/'.$item['sys_name'];
	$header = 'Content-type: text/plain; charset="utf-8 \r\n"'."From: ".$cnf["send_from"]." \r\n"; 
	$r = mail($cnf['send_to'], 'Заказ проекта с сайта '.$_SERVER['HTTP_HOST'], $text, $header);
	if ($r) echo '<script>$("#loader").remove(); alert("'.$cnf['mess_send'].'");</script>';
	else echo '<script>$("#loader").remove(); alert("'.$cnf['mess_send'].'");</script>';	