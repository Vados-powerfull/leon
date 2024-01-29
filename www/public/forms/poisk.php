<?
	include ('../../core/model/common.php');
	$item = mqo("SELECT * FROM catalog WHERE id = ?",[$_GET['id']]);
	$cat = mqo("SELECT * FROM catalog_cats WHERE id = ?",[$item['cat_id']]);
?>
