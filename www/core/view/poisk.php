

<section class="section about-section">
    <div class="container row-container-nopd">
        <? include ("core/view/template/bcrumbs.php"); ?>
        <h1 class=""><?=$page_title?></h1>

        


        <div class="fav-container mflex5">

            <? foreach ($goods as $gitem) {
                $razdel_info = mqo("SELECT * FROM catalog_razdel WHERE id='".$gitem["radel_id"]."'");
                $cat_info = mqo ("SELECT sys_name FROM catalog_cats WHERE id = '".$gitem["cat_id"]."'");
                $podcat_info = mqo ("SELECT sys_name FROM catalog_podcats WHERE id = '".$gitem["podcat_id"]."'");
                ?>
                <div class="item-price new-item-price" href="#">
                    <? if ($gitem["img"] == '') $img = '/public/img/header-logo.png'; else $img = $gitem["img"]; ?>
                    <div class="item-price_img_corrector_compi">
                        <a class="item-price__img" href="/сategory/<?=$razdel_info["sys_name"]?>/<?=$cat_info["sys_name"]?>/<?=$podcat_info["sys_name"]?>/<?=$gitem["sys_name"]?>"><img
                                src="<?=$img?>"> </a>
                    </div>
                    <div class="item-price__container">
                        <? $nal_info = mqo("SELECT * FROM catalog_nal WHERE id = '".$gitem["nal_id"]."'") ?>
                        <p class="item-count <?=$nal_info["class"]?>">
                            <svg class="header-nav-svg" viewBox="0 0 6 6" width="6">
                                <use xlink:href="/public/img/svg/item-svg/item-count-svg.svg#item-count-svg" fill="currentColor" />
                            </svg>
                            <?=$nal_info["name"]?>
                        </p>
                        <a class="item-price__header" href="item-page.php"><?=$gitem["name"]?>S</a>
                        <p class="compatibility ">Совместимость: <?=$gitem["sovmest"]?></p>
                        <span class="price new-price"><?=$gitem["price"]?> руб/шт</span>
                        
                        <div class="item-price__svg-container ">
                            <img class="item-start__svg" src="/public/img/svg/item-svg/item-stars.svg" alt="">
                        </div>
                    </div>
                    <div class="buy-btn__container">
                        <button class="fast-buy">Купить в 1 клик</button>
                        <button class="buy-btn" data-id="<?=$gitem["id"]?>">Купить</button>

                    </div>
                </div>

            <?} ?>
            
        </div>
    </div>

</section>
