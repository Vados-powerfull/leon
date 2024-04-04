<nav class="path crumbs">
	<? $arr = '<img src="/public/img/svg/path-arrow.svg" class="arrow-svg" alt="">';
    $index = '<a href="/">Главная</a>'.$arr; ?>
        
    <?
	if ($path[0] == 'catalog') {//каталог
        $crumbs = $index.'<span href="#">'.$page_title.'</span>';
    }elseif($path[0] == 'razdel') {
       $mrazdel_info = mqo("SELECT name FROM catalog_razdel WHERE sys_name='".end($path)."'"); 
       $crumbs = $index.'<a href="/catalog">Каталог</a>'.$arr.'<span href="#">'.$mrazdel_info["name"].'</span>';
        

    }elseif($path[0] == 'podcat') {
       $mpodcat_info = mqo("SELECT * FROM catalog_podcats WHERE sys_name='".end($path)."'"); 
       $mrazdel_info = mqo("SELECT * FROM catalog_razdel WHERE id='".$mpodcat_info["razdel_id"]."'"); 
       $mcat_info = mqo("SELECT * FROM catalog_cats WHERE id='".$mpodcat_info["cat_id"]."'"); 
       
       $crumbs = $index.'<a href="/catalog">Каталог</a>'.$arr.'<a href="/category/'.$mcat_info["sys_name"].'">'.$mcat_info["name"].'</a>'.$arr.
       '<span href="#">'.$mpodcat_info["name"].'</span>';
        

    }elseif($path[0] == 'category') {
       $mcat_info = mqo("SELECT * FROM catalog_cats WHERE sys_name='".end($path)."'"); 
       
       $crumbs = $index.'<a href="/catalog">Каталог</a>'.$arr.
       '<span href="#">'.$mcat_info["name"].'</span>';
        

    } elseif($path[0] == 'item') {
       $mitem_info = mqo("SELECT * FROM catalog WHERE sys_name='".end($path)."'"); 
       $mpodcat_info = mqo("SELECT * FROM catalog_podcats WHERE id='".$mitem_info["podcat_id"]."'"); 
       $crumbs = $index.'<a href="/catalog">Каталог</a>'.$arr.'<a href="/podcat/'.$mpodcat_info["sys_name"].'">'.$mpodcat_info["name"].'</a>'.$arr.
       '<span href="#">'.$mitem_info["name"].'</span>';
        

    } elseif($path[0] == 'recipe' && isset($path[1])) {
       $mrecipe_info = mqo("SELECT * FROM recipes WHERE sys_name='".end($path)."'"); 
       
       $crumbs = $index.'<a href="/recipe">Рецепты</a>'.$arr.
       '<span href="#">'.$mrecipe_info["page_title"].'</span>';
        

    }elseif($path[0] == 'lc' && isset($path[1])) {
       $crumbs = $index.'<span href="#">Личный кабинет</span>';
    }else {?>
    	<?=$index?><span href="#"><?=$page_title?></span>
    <?}?>

    <?=$crumbs?>
</nav>
