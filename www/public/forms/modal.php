<?
	session_start();
    include ('../../core/model/common.php');
	
    $text = $_POST['sub'].PHP_EOL;
    if(isset($_POST['name'])) $text.="Имя: ".$_POST['name'].PHP_EOL;
	if(isset($_POST['phone'])) $text.="Телефон: ".$_POST['phone'].PHP_EOL;
	if(isset($_POST['message'])) $text.="Сообщение: ".PHP_EOL.$_POST['message'].PHP_EOL;

	
	$cnf = mqo("SELECT * FROM adm_m_feedback WHERE id = 1");
	

	$header = 'Content-type: text/plain; charset="utf-8 \r\n"'."From: ".$cnf["send_from"]." \r\n";
	$r = mail($cnf['send_to'], $cnf['mess_title'], $text, $header);

	if ($r) echo '<script>$("#loader").remove(); alert("'.$cnf['mess_send'].'");</script>';
	else echo '<script>$("#loader").remove(); alert("'.$cnf['mess_send'].'");</script>';
	