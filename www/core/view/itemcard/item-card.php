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
                <a href="" data-id="<?=$goods_info["id"]?>">В избранное</a>
                <a class="item-card__fav">
                    <svg class="header-nav-svg" width="29" height="23" viewBox="0 0 29 23" data-id="<?=$goods_info["id"]?>">
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
            <button class="prime-btn" data-id="<?=$goods_info["id"]?>">
                В корзину
            </button>
            <button class="prime-black-btn" data-id="<?=$goods_info["id"]?>">
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
            <?  foreach ($pop as $item) {?>
               
                
                

            <div class="item-card item-discount__card">
                <span class="item-discount"><?=$item["discount"]?></span>
                <button class="item-fav__btn">
                    <svg class="header-nav-svg" width="32" height="32" viewBox="0 0 27 22" data-id="<?=$item["id"]?>">
                        <use xlink:href="/public/img/svg/heart.svg#heart-menu-icon" fill="currentColor" />
                    </svg>
                </button>
                <div class="item-card__img">
                    <a href="/itemcard/<?=$item["sys_name"]?>"> <img src="<?=$item["img"]?>" alt=""></a>
                </div>
                <div class="item-card__articul__wrapper">
                    <p class="item-card-articul">
                        арт. <?=$item["art"]?>
                    </p>


    <!-- НАЛИЧИЕ -->
                    <?   
                         
                        $nal = mqo("SELECT * FROM catalog_nal WHERE id = '".$item["nal_id"]."'"); 
    

                     if ($nal["name"] === 'Мало') {
                             echo'<span class="item-card__count red">' . $nal["name"] . '</span>';
                         } elseif ($nal["name"] === 'Под заказ') {
                             echo '<span class="item-card__count yellow">' . $nal["name"] . '</span>';
                         } elseif ($nal["name"] === 'Нет в наличии') {
                             echo '<span class="item-card__count black">' . $nal["name"] . '</span>';
                         } else {
                             echo '<span class="item-card__count green">' . $nal["name"] . '</span>';
                        }
                    ?>
    <!-- НАЛИЧИЕ -->


                </div>
                <a href="/itemcard" class="item-card__title">
                    <?=$item["name"]?>
                </a>
                <p class="item-card__county">
                <?$country_info = mqo("SELECT * FROM catalog_country WHERE id = '".$item["nal_id"]."'"); ?>
                    <?=$country_info["name"]?>, <?=$item["ves"]?> г
                </p>

                <div class="price-wrapper">
                    <div class="price-container ">
                        <p><?=$item["price2"]?></p>
                        <span>
                        <?=$item["price"]?> руб
                        </span>
                    </div>

                </div>
                <div class="item-card__buy-btn-wrapper">
                    <button class="item-card__busket-btn" data-id="<?=$item["id"]?>">
                        В корзину
                    </button>
                    <button class="item-card__buy-btn">
                        Купить в 1 клик
                    </button>
                </div>
            </div>
            <? } ?>
        </div>

    </div>
            </section>