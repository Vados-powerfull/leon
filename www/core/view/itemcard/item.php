<div class="item-card item-discount__card">

<!-- СКИДКА --><!-- СКИДКА --><!-- СКИДКА --><!-- СКИДКА --><!-- СКИДКА --><!-- СКИДКА -->

                <?if ($gitem["discount"] === 'Новинка') {
                   echo '<span class="item-discount" style="background: #0bda51">' . $gitem["discount"] .'</span>';
                  } else {echo '<span class="item-discount">' . $gitem["discount"] . '</span>'; }
               
                ?>

<!-- СКИДКА --><!-- СКИДКА --><!-- СКИДКА --><!-- СКИДКА --><!-- СКИДКА --><!-- СКИДКА -->



                <button class="item-fav__btn">
                    <svg class="header-nav-svg add_to_favorites" width="32" height="32" viewBox="0 0 27 22" data-id="<?=$gitem["id"]?>">
                        <use xlink:href="/public/img/svg/heart.svg#heart-menu-icon" fill="currentColor" />
                    </svg>
                </button>
                <div class="item-card__img">
                    <a href="/item/<?=$gitem["sys_name"]?>"> <img src="<?=$gitem["img"]?>" alt=""></a>
                </div>
                <div class="item-card__articul__wrapper">
                    <p class="item-card-articul">
                        арт. <?=$gitem["art"]?>
                    </p>


    <!-- НАЛИЧИЕ --><!-- НАЛИЧИЕ --><!-- НАЛИЧИЕ --><!-- НАЛИЧИЕ --><!-- НАЛИЧИЕ --><!-- НАЛИЧИЕ --><!-- НАЛИЧИЕ -->

                    <?   
                         
                        $nal = mqo("SELECT * FROM catalog_nal WHERE id = '".$gitem["nal_id"]."'"); 
    

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

    <!-- НАЛИЧИЕ --><!-- НАЛИЧИЕ --><!-- НАЛИЧИЕ --><!-- НАЛИЧИЕ --><!-- НАЛИЧИЕ --><!-- НАЛИЧИЕ --><!-- НАЛИЧИЕ -->


                </div>
                <a href="/item" class="item-card__title">
                    <?=$gitem["name"]?>
                </a>
                <p class="item-card__county">
                <?$country_info = mqo("SELECT * FROM catalog_country WHERE id = '".$gitem["nal_id"]."'"); ?>
                    <?=$country_info["name"]?>, <?=$gitem["ves"]?> г
                </p>

                <div class="price-wrapper">
                    <div class="price-container ">
                        <p><?=$gitem["price2"]?></p>
                        <span>
                        <?=$gitem["price"]?> руб
                        </span>
                    </div>

                </div>
                <div class="item-card__buy-btn-wrapper">
                    <button class="item-card__busket-btn add_to_cart" data-id="<?=$gitem["id"]?>">
                        В корзину
                    </button>
                    <button class="item-card__buy-btn">
                        Купить в 1 клик
                    </button>
                </div>
            </div>