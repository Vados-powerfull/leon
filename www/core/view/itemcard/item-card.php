<div class="mt-5 container">
        <?include('core/view/template/crumbs.php');?>
        <?$goods_info = mqo("SELECT * FROM catalog WHERE sys_name='".end($path)."'");?>
        <h2 class="page-title mt-4 mb-5">
            <?=$goods_info["name"]?>
        </h2>
</div>

<div class="container item-card__container">

    <?
    
    $nal_info = mqo("SELECT * FROM catalog_nal WHERE id = '".$goods_info["nal_id"]."'");
	$country_info = mqo("SELECT * FROM catalog_country WHERE id = '".$goods_info["country_id"]."'");
    
    ?>    

    <div class="item-card__img-container">
        <!-- <? if($goods_info["img"] == '') $img = '/public/img/items/1.jpg'; else $img = $goods_info["img"]; ?> -->
        <img class="item-card__img" src="<?=$img?>" alt="">
        <span class="discount">
            <?=$goods_info["discount"]?>
        </span>
    </div>

    </img>

    <div class="item-card__text-container">
        <div class="item-card__info">
            <p>арт. <?=$goods_info["art"]?></p>
            <div class="item-card__fav-container">
                <a class="add_to_favorites" href="" data-id="<?=$goods_info["id"]?>">В избранное</a>
                <a class="item-card__fav">
                    <svg class="header-nav-svg add_to_favorites" width="29" height="23" viewBox="0 0 29 23" data-id="<?=$goods_info["id"]?>">
                        <use xlink:href="/public/img/svg/heart.svg#heart-menu-icon" stroke="red" fill="currentColor" />
                    </svg>
                </a>
            </div>
        </div>
        <div class="item-card__text">
            <div class="card-text__info">
                <p>Страна: <span><?=$country_info["name"]?></span></p>
                <p>Производитель: <span><?=$country_info["name"]?></span></p>
                <p>Вес: <span><?=$goods_info["ves"]?> г </span></p>
            </div>
            <div class="card-text__count">
                <p>Наличие: <span class="red"><?=$nal_info["name"]?></span></p>
            </div>
        </div>
        <div class="item-card__price">
            <div class="old-price">
                <p>Старая цена:</p>
                <span class="text-center"><?=$goods_info["price2"]?></span> <!-- Выровнил старую цену по центру -->
            </div>
            <div class="new-price">
                <p>Новая цена:</p>
                <span><?=$goods_info["price"]?> руб</span>
            </div>
        </div>
        <div class="item-card__btns">
            <button class="prime-btn add_to_cart" data-id="<?=$goods_info["id"]?>">
                В корзину
            </button>
            <button class="prime-black-btn">
                Купить в 1 клик
            </button>
        </div>
    </div>
</div>

<div class="container">


    <div class="personal-buttons">
        <button class="personal-button   personal-button__no-border my-info-button order-stats-btn">
            <span class="my-info-title">Характеристики</span>
        </button>
        <button
            class="personal-button personal-button-active  personal-button__no-border  order-history-button order-description-btn">
            <span class="order-history-title">Описание</span>
        </button>


    </div>
</div>
<div class="background item-card__bg">
    <div class="container">
        <div class="info content-hidden">
            <div class="item-card__stats">
                
                <?=$goods_info["haracters"]?> <!-- ХАРАКТЕРИСТИКИ -->
                
            </div>
        </div>
        <div class=" history ">
            <p class="item-card__description"><?=$goods_info["opisanie"]?></p>
        </div>


    </div>

</div>

<!-- РЕКОМЕНДУЕМЫЕ "POP" -->


<section class=" round-section new-section recommended-items__section">
 
    <div class=" container">
        <h2 class="block-title">
            Рекомендуемые товары
        </h2>
        <div class="recommended-items__container">
            <?  foreach ($pop as $gitem) {
                 include ('core/view/itemcard/item.php');
            } ?>
        </div>

    </div>
            </section>