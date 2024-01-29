<?
	include ('../../core/model/common.php');
	$otzyvy = mqs("SELECT * FROM otzyvy ORDER BY ordering LIMIT ".$_POST["curcount"].",4");
	
	foreach ( $otzyvy as $item ) { ?>
		<a href="<?=$item["img"]?>" class="fancy otzyvy_item" data-fancybox="otzyvy"><img src="<?=$item["img"]?>" alt="" class="wow zoomIn"></a>
	<?}
?>
