<nav class="path crumbs">
	<? $arr = '<img src="/public/img/svg/path-arrow.svg" class="arrow-svg" alt="">';
    $index = '<a href="/">Главная</a>'.$arr; ?>
        
        <?
	if ($path[0] == 'catalog') {//каталог
        if (isset($path[0])) $crumbs = $index.'<span href="#">Каталог</span>';
        if (isset($path[1])) {
        	$step1 = '<a href="/'.$path[0].'">Каталог</a>'.$arr; 
        	$crumbs = $index.$step1.'<span href="#">'.$cat_info["name"].'</span>';
        }
        if (isset($path[2])) { // Раздел-категория
        	$step2 = '<a href="/'.$path[0].'/'.$path[1].'">'.$razdel_info["name"].'</a>'.$arr;
        	$crumbs = $index.$step1.$step2.'<span href="#">'.$cat_info["name"].'</span>';
        }
        if (isset($path[3])) { // подкат
        	$step2 = '<a href="/'.$path[0].'/'.$path[1].'">'.$podcat_info["name"].'</a>'.$arr;
        	$crumbs = $index.$step1.$step2.$step3.'<span href="#">'.$item_info["name"].'</span>';
        }
        if (isset($path[4])) { 
        	$crumbs = $index.$step1.$step2.'<a href="/'.$path[0].'/'.$path[1].'/'.$path[2].'/'.$path[3].'">'.$podcat_info["name"].'</a>'.$arr.'<span href="#">'.$item_info["name"].'</span>';
        }
       
        
        echo $crumbs;

    } else {?>
    	<?=$index?><span href="#"><?=$page_title?></span>
    <?}?>

</nav>
