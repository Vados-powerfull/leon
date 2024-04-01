<section class="section discount-section discount-mobile round-section">
    <div class="container">
        <h6 class="small-title">Акции</h6>
        <h2 class="block-title">Скидки до -60%</h2>
        <div class="discount-grid-container">
        <?  foreach ($sell as $item) {

                $catalog_razdel = mqo("SELECT * FROM catalog_razdel WHERE id='".$item["razdel_id"]."'");
                $catalog_cat = mqo("SELECT sys_name FROM catalog_cats WHERE id='".$item["cat_id"]."'");
                $catalog_podcat = mqo("SELECT sys_name FROM catalog_podcats WHERE id='".$item["podcat_id"]."'");
                // $goods_info = mqo("SELECT * FROM catalog WHERE sys_name='".end($path)."'");
                // $nal = mqo("SELECT * FROM catalog_nal WHERE id='".$item["nal_id"]."'"); НАЛИЧИЕ
                ?>
                

            <div class="item-card">
                <span class="item-discount"><?=$item["discount"]?></span>
                <button class="item-fav__btn" data-id="<?=$item["id"]?>">
                    <svg class="header-nav-svg add_to_favorites" width="32" height="32" viewBox="0 0 27 22">
                        <use xlink:href="/public/img/svg/heart.svg#heart-menu-icon" fill="currentColor" />
                    </svg>
                </button>
                <div class="item-card__img mt-1">
                  <a href="/item/<?=$item["sys_name"]?>">  <img src="<?=$item["img"]?>" alt=""></a>
                </div>
                <a href="/item/<?=$item["sys_name"]?>" class="item-card__title">
                    <?=$item["name"]?>
                </a>

                <div class="price-wrapper">
                    <div class="price-container">
                        <p><?=$item["price2"]?></p>
                        <span>
                            <?=$item["price"]?> руб
                        </span>
                    </div>
                    <button class="item-card__buy-mobile add_to_cart" data-id="<?=$item["id"]?>">
                        В корзину
                    </button>
                    <button class="item-card__btn " data-id="<?=$item["id"]?>">
                        <svg class="header-nav-svg add_to_cart" width="32" height="32" viewBox="0 0 33 23">
                            <use xlink:href="/public/img/svg/busket.svg#busket-menu-icon" fill="currentColor" />
                        </svg>
                    </button>
                </div>
            </div>
             <?} ?>
        </div>
        <button class="upload-more__btn black-btn" data-id="<?=$item["id"]?>">
            <a href="/category/<?=$catalog_razdel["sys_name"]?>/<?=$catalog_cat["sys_name"]?>/<?=$catalog_podcat["sys_name"]?>" style="color: white; text-decoration: none">Загрузить еще</a>
        </button>
    </div>
</section>