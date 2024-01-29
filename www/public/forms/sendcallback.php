<?
	include ('../../core/model/common.php');
	$cnf = mqo("SELECT * FROM adm_m_feedback WHERE id = 1");
	$text = 'Имя: '.trim($_POST["name"]).PHP_EOL.'Телефон: '.trim($_POST["tel"]);
	$header = 'Content-type: text/plain; charset="utf-8 \r\n"'."From: ".$cnf["send_from"]." \r\n"; 
	$r = mail($cnf['send_to'], $cnf['mess_title'], $text, $header);
	if ($r) echo '<script>$("#loader").remove(); alert("'.$cnf['mess_send'].'");</script>';
	else echo '<script>$("#loader").remove(); alert("'.$cnf['mess_send'].'");</script>';	