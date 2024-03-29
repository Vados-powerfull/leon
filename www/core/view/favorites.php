<div class="container mt-5">
        <?include('core/view/template/crumbs.php');?>
        <h2 class="page-title mt-4 mb-5">
            Избранное
        </h2>
</div>

<div class="container fav-container busket-container">
    
    <?  foreach ($goods as $item) {
        $cat_info = mqo ("SELECT sys_name FROM catalog_cats WHERE id = '".$catitem["cat_id"]."'");
        $podcat_info = mqo ("SELECT sys_name FROM catalog_podcats WHERE id = '".$pitem["podcat_id"]."'");
        $nal_info = mqo("SELECT * FROM catalog_nal WHERE id = '".$item["nal_id"]."'");
        $country_info = mqo("SELECT * FROM catalog_country WHERE id = '".$item["country_id"]."'");
        $goods_info = mqo("SELECT * FROM catalog WHERE sys_name='".end($path)."'");  ?>


        <div class="item-card item-discount__card">
        <span class="item-discount"><?=$item["discount"]?></span>
    
            <button class="cancel item-fav__btn"></button>
       
        <div class="item-card__img mt-1">
            <a href="/itemcard"> <img src="<?=$item["img"]?>" alt=""></a>
        </div>
        <div class="item-card__articul__wrapper">
            <p class="item-card-articul">
                <?=$item["art"]?>
            </p>
            <span class="item-card__count green">
            
                <?=$nal_info["name"]?>
            </span>
        </div>
        <a href="/itemcard" class="item-card__title">
            <?=$item["name"]?>
        </a>
        <p class="item-card__county"> 
        
        
                <?=$country_info["name"]?>, <?=$item["ves"]?> г

        </p>

        <div class="price-wrapper">
            <div class="price-container ">
                <p><?=$item["price"]?></p>
                <span>
                <?=$item["price2"]?> руб
                </span>
            </div>

        </div>
        <div class="item-card__buy-btn-wrapper">
       <? $goods_info = mqs("SELECT * FROM catalog WHERE sys_name='".end($path)."'"); ?>
            <button class="item-card__busket-btn" data-id="<?=$goods_info["id"]?>">
                В корзину
            </button>
            <button class="item-card__buy-btn">
                Купить в 1 клик
            </button>
        </div>
    </div>
    <?} ?>
</div>