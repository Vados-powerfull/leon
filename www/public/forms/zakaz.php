<?
	include ('../../core/model/common.php');
	$item = mqo("SELECT * FROM catalog WHERE id = ?",[$_GET['id']]);
	$cat = mqo("SELECT * FROM catalog_cats WHERE id = ?",[$item['cat_id']]);
?>
<div id="callback_widjet">
	<div class="callback_title">Заказать<br><?echo $cat['name2'].' '.$item['name'];?></div>
	<input type="text" id="callname" placeholder="Ваше имя">
	<input type="tel" id="calltel" placeholder="Ваш телефон">
	<input type="tel" id="callmail" placeholder="Ваш email">
	<div class="button" onclick="sendZakaz(<?echo $item['id'];?>)">Отправить</div>
	<div id="callback_widjet_close" onclick="$('#callback').remove()"></div>
</div>