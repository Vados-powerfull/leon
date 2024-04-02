<section class="section new-section  discount-section round-section">
    <div class="container">
        <h6 class="small-title">Новинки</h6>
        <h2 class="block-title">Попробуйте наши новинки</h2>
        <div class="discount-grid-container">
            <?  foreach ($new as $item) {
                
                $catalog_razdel = mqo("SELECT * FROM catalog_razdel WHERE id='".$item["razdel_id"]."'");
                $catalog_cat = mqo("SELECT sys_name FROM catalog_cats WHERE id='".$item["cat_id"]."'");
                $catalog_podcat = mqo("SELECT sys_name FROM catalog_podcats WHERE id='".$item["podcat_id"]."'");
                
                ?>
                            

            <div class="item-card">
                <span class="item-new">Новинка</span>
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
                    <div class="price-container new-price__container">

                        <span>
                            <?=$item["price"]?> руб
                        </span>
                    </div>
                    <button class="item-card__buy-mobile add_to_cart" data-id="<?=$item["id"]?>">
                        В корзину
                    </button>
                    <button class="item-card__btn" data-id="<?=$item["id"]?>">
                        <svg class="header-nav-svg" width="32" height="32" viewBox="0 0 33 23">
                            <use xlink:href="/public/img/svg/busket.svg#busket-menu-icon" fill="currentColor" />
                        </svg>
                    </button>
                </div>
            </div>
            <?} ?>
        </div>
    </div>
</section>