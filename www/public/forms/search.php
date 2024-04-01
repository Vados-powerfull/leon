<?
	session_start();
    include ('../../core/model/common.php');
	
	$goods = mqs("SELECT * FROM catalog WHERE name LIKE '%".$_POST["query"]."%' OR art LIKE '%".$_POST["query"]."%' ORDER BY name LIMIT 10");

	foreach ($goods as $gitem) {
		$razdel_info = mqo("SELECT * FROM catalog_razdel WHERE id='".$gitem["razdel_id"]."'");
		$cat_info = mqo("SELECT sys_name FROM catalog_cats WHERE id='".$gitem["cat_id"]."'");
		$podcat_info = mqo("SELECT sys_name FROM catalog_podcats WHERE id='".$gitem["podcat_id"]."'");
		?>
		<a href="/item/<?=$gitem["sys_name"]?>"><?=$gitem["name"]?></a>
	<?}?>
   
	<!-- агроз копия -->