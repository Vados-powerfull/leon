<?
	include ('../../core/model/common.php');
	$cnf = mqo("SELECT * FROM adm_m_feedback WHERE id = 1");
?>
<div id="callback_widjet">
	<div class="callback_title"><?echo $cnf["mess_form"];?></div>
	<input type="text" id="callname" placeholder="Ваше имя">
	<input type="tel" id="calltel" placeholder="Ваш телефон">
	<div class="button" onclick="sendCallback()">Отправить</div>
	<div id="callback_widjet_close" onclick="$('#callback').remove()"></div>
</div>