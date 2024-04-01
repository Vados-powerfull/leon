<div class="path mt-5 container">
    <? include ("core/view/template/crumbs.php"); ?>
</div>


    <?
        // $razdel_info = mqo("SELECT * FROM catalog_razdel WHERE sys_name='".end($path)."'");
        // $cat_info = mqs("SELECT * FROM catalog_cats WHERE sys_name='".end($path)."'");
        // $podcat_info = mqo("SELECT * FROM catalog_podcats WHERE sys_name='".end($path)."'");
        // $goods_info = mqo("SELECT * FROM catalog WHERE sys_name='".end($path)."'");
    ?>



<h2 class="page-title container">
    <?=$razdel_info["name"]?>
</h2>

<div class="container category-wrapper">
   
    <div class="category-aside">
        <div class="aside-category__dropdowns">

            <!-- <div class="aside-preview">  НУЖЕН ПОВТОР РАЗДЕЛА ТУТ?
                <h3><?=$razdel_info["name"]?></h3>
            </div> -->


           
            <? foreach ($cat_info as $citem) {?>
           
                <div class="question  question-active">
                    <div class="quesion-body">
                        <div class="question-title-wrapper">
                            <h3 class="question-title title-active"><?=$citem["name"]?></h3>
                            <button class="dropdown dropdown-active"></button>

                        </div>
                        
                        <div class="question-text  text-active text-slide-in">
                                              
                        <?  
                             $catalog_podcats = mqs("SELECT * FROM catalog_podcats WHERE cat_id='".$citem["id"]."'");
                            foreach ($catalog_podcats as $pitem) {?>
                            <a href="/podcat/<?=$pitem["sys_name"]?>"><?=$pitem["name"]?></a>
                            <? } ?>
                        </div>
                    </div>
                </div>
            <? } ?>


            <!-- <div class="question  ">
                <div class="quesion-body">
                    <div class="question-title-wrapper">
                        <h3 class="question-title title-active">Замороженная рыба
                            и морепродукты</h3>
                        <button class="dropdown "></button>

                    </div>
                    <div class="question-text text-slide-in">
                        <a href="#">Лососевая рыба</a>
                        <a href="#">Белая рыба</a>
                        <a href="#">Креветки и ракообразные</a>
                        <a href="#">Морепродукты</a>
                        <a href="#">Полуфабрикаты из рыбы
                            и морепродуктов</a>
                        <a href="#">
                            Продукты из сурими</a>
                    </div>
                </div>
            </div>
            
            <div class="question  ">
                <div class="quesion-body">
                    <div class="question-title-wrapper">
                        <h3 class="question-title title-active">Замороженная рыба
                            и морепродукты</h3>
                        <button class="dropdown "></button>

                    </div>
                    <div class="question-text  text-slide-in">
                        <a href="#">Лососевая рыба</a>
                        <a href="#">Белая рыба</a>
                        <a href="#">Креветки и ракообразные</a>
                        <a href="#">Морепродукты</a>
                        <a href="#">Полуфабрикаты из рыбы
                            и морепродуктов</a>
                        <a href="#">
                            Продукты из сурими</a>
                    </div>
                </div>
            </div>
            <div class="question  aside-last-question">
                <div class="quesion-body">
                    <div class="question-title-wrapper">
                        <h3 class="question-title title-active">Замороженная рыба
                            и морепродукты</h3>
                        <button class="dropdown "></button>

                    </div>
                    <div class="question-text text-slide-in">
                        <a href="#">Лососевая рыба</a>
                        <a href="#">Белая рыба</a>
                        <a href="#">Креветки и ракообразные</a>
                        <a href="#">Морепродукты</a>
                        <a href="#">Полуфабрикаты из рыбы
                            и морепродуктов</a>
                        <a href="#">
                            Продукты из сурими</a>
                    </div>
                </div>
            </div>
            <div class="aside-without__dropdown">
                <div class="aside-text">
                    <a href="#">Икра</a>

                </div>
            </div> -->



        </div>
        <div class="desktop-category">
            <div class="range-slider__wrapper">
                <div class="price-range-slider">
                    <h6 class="filters-header">Цена (руб.)</h6>
                    <p class="range-value">
                        <input type="number" id="start-amount">
                        <input type="number" id="end-amount">
                    </p>
                    <div id="slider-range" class="range-bar"></div>

                    <div class="checkbox-container checkbox-category__container">
                        <input id="terms" type="checkbox">
                        <label for="terms">Товары со скидкой</label>
                    </div>
                </div>

            </div>




            <div class="question aside-white__question ">
                <div class="quesion-body">
                    <div class="question-title-wrapper">
                        <h3 class="question-title title-active">Бренд</h3>
                        <button class="dropdown "></button>

                    </div>
                    <div class="question-text text-slide-in">
                        <? $n = 1; 
                        foreach ($catalog_brands as $bitem) {
                        
                            
                            ?>
                          
                        
                            <div class="checkbox-container checkbox-category__container">
                                <input id="terms<?=$n?>" type="checkbox">
                                <label for="terms<?=$n?>"><?=$bitem["name"]?><span>(1)</span></label>
                            </div>
                        <? $n++;} ?>
                        

                        <span class="show-all-btn">
                            Показать все
                        </span>
                    </div>

                </div>
            </div>
            <div class="question aside-white__question ">
                <div class="quesion-body">
                    <div class="question-title-wrapper">
                        <h3 class="question-title title-active">Вес</h3>
                        <button class="dropdown "></button>

                    </div>
                    <div class="question-text text-slide-in">
                        <div class="checkbox-container checkbox-category__container">
                            <input id="terms11" type="checkbox">
                            <label for="terms11">1 кг <span>(1)</span></label>
                        </div>
                        <div class="checkbox-container checkbox-category__container">
                            <input id="terms21" type="checkbox">
                            <label for="terms21">100 г <span>(1)</span></label>
                        </div>
                        <div class="checkbox-container checkbox-category__container">
                            <input id="terms31" type="checkbox">
                            <label for="terms31">1000 г <span>(1)</span></label>
                        </div>
                        <div class="checkbox-container checkbox-category__container">
                            <input id="terms41" type="checkbox">
                            <label for="terms41">113 г <span>(1)</span></label>
                        </div>
                        <div class="checkbox-container checkbox-category__container">
                            <input id="terms51" type="checkbox">
                            <label for="terms51">115 г <span>(1)</span></label>
                        </div>

                        <span class="show-all-btn">
                            Показать все
                        </span>
                    </div>

                </div>
            </div>
            <div class="question aside-white__question ">
                <div class="quesion-body">
                    <div class="question-title-wrapper">
                        <h3 class="question-title title-active">Способ обработки</h3>
                        <button class="dropdown "></button>

                    </div>
                    <div class="question-text text-slide-in">
                        <div class="checkbox-container checkbox-category__container">
                            <input id="terms12" type="checkbox">
                            <label for="terms12">365 ДНЕЙ <span>(1)</span></label>
                        </div>
                        <div class="checkbox-container checkbox-category__container">
                            <input id="terms22" type="checkbox">
                            <label for="terms22">5 ОКЕАНОВ <span>(1)</span></label>
                        </div>
                        <div class="checkbox-container checkbox-category__container">
                            <input id="terms32" type="checkbox">
                            <label for="terms32">Agama <span>(1)</span></label>
                        </div>
                        <div class="checkbox-container checkbox-category__container">
                            <input id="terms42" type="checkbox">
                            <label for="terms42">AQUA PRODUKT <span>(1)</span></label>
                        </div>
                        <div class="checkbox-container checkbox-category__container">
                            <input id="terms52" type="checkbox">
                            <label for="terms52">BONVIDA <span>(1)</span></label>
                        </div>

                        <span class="show-all-btn">
                            Показать все
                        </span>
                    </div>

                </div>
            </div>
            <div class="question aside-white__question ">
                <div class="quesion-body">
                    <div class="question-title-wrapper">
                        <h3 class="question-title title-active">Страна производителя</h3>
                        <button class="dropdown "></button>

                    </div>
                    <div class="question-text text-slide-in">
                        <div class="checkbox-container checkbox-category__container">
                            <input id="terms14" type="checkbox">
                            <label for="terms14">365 ДНЕЙ <span>(1)</span></label>
                        </div>
                        <div class="checkbox-container checkbox-category__container">
                            <input id="terms24" type="checkbox">
                            <label for="terms24">5 ОКЕАНОВ <span>(1)</span></label>
                        </div>
                        <div class="checkbox-container checkbox-category__container">
                            <input id="terms34" type="checkbox">
                            <label for="terms34">Agama <span>(1)</span></label>
                        </div>
                        <div class="checkbox-container checkbox-category__container">
                            <input id="terms44" type="checkbox">
                            <label for="terms44">AQUA PRODUKT <span>(1)</span></label>
                        </div>
                        <div class="checkbox-container checkbox-category__container">
                            <input id="terms54" type="checkbox">
                            <label for="terms54">BONVIDA <span>(1)</span></label>
                        </div>

                        <span class="show-all-btn">
                            Показать все
                        </span>
                    </div>

                </div>
            </div>
            <button class="prime-btn catalog-aside-btns">
                Показать 42 товара
            </button>
            <button class="prime-black-btn catalog-aside-btns">
                Сбросить фильтры
            </button>
        </div>

    </div>
    <div class="category-grid__wrapper">
        <div class="select-wrapper">
            <p class="sort-title">
                Сортировка
            </p>
            <div class="styled-select">
                <select class="sort-select" name="cars" id="sort-select">
                    <option value="sort-select1">По цене(возрастание) </option>
                    <option value="sort-select2">По цене(убывание) </option>
                    <option value="sort-select3">По количеству</option>

                </select>
            </div>
            <div class="mobile-filter__btn">
                <img src="/public/img/svg/filter.svg" alt="">
            </div>
        </div>

<!-- ВЫВОД ТОВАРОВ --><!-- ВЫВОД ТОВАРОВ --><!-- ВЫВОД ТОВАРОВ --><!-- ВЫВОД ТОВАРОВ --><!-- ВЫВОД ТОВАРОВ --><!-- ВЫВОД ТОВАРОВ -->
        
        <div class="category-grid__container">
        
           <? if ($path[0] == 'razdel') $goods = mqs("SELECT * FROM catalog WHERE razdel_id='".$mmrazdel_info["id"]."' AND on_moderate=0 ORDER BY ordering"); 
              elseif ($path[0] == 'category') $goods = mqs("SELECT * FROM catalog WHERE cat_id='".$mmcat_info["id"]."' AND on_moderate=0 ORDER BY ordering");
              elseif ($path[0] == 'podcat') $goods = mqs("SELECT * FROM catalog WHERE podcat_id='".$mmpodcat_info["id"]."' AND on_moderate=0 ORDER BY ordering"); 
          
          ?>
          <? foreach ($goods as $gitem) {
                
                $gnal = mqo("SELECT * FROM catalog_nal WHERE id='".$gitem["nal_id"]."'");
                $gcountry = mqo("SELECT * FROM catalog_country WHERE id='".$gitem["country_id"]."'");
                

            ?>

            <div class="item-card item-discount__card">
                <span class="item-discount"><?=$gitem["discount"]?></span>
                <button class="item-fav__btn" >
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
                    <span class="item-card__count green">
                    <?=$gnal["name"]?>
                    </span>
                </div>
                <a href="/item/<?=$gitem["sys_name"]?>" class="item-card__title">
                    <?=$gitem["name"]?>
                </a>
                <p class="item-card__county">
                    <?=$gcountry["name"]?>, <?=$gitem["ves"]?> г
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
            <?} ?>

<!-- END --><!-- END --><!-- END --><!-- END --><!-- END --><!-- END --><!-- END --><!-- END --><!-- END --><!-- END --><!-- END -->

        </div>
        <nav aria-label="Page navigation example">
            <ul class="pagination store-items__pagination">
                <li class="page-item arrow-page-item disabled"><a class="page-link" href="#">

                        <img src="/public/img/svg/pagination-left.svg" alt="">
                    </a></li>
                <li class="page-item  page-item-active"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">4</a></li>
                <li class="page-item"><a class="page-link" href="#">5</a></li>
                <li class="page-item"><a class="page-link" href="#">6</a></li>
                <li class="page-item"><a class="page-link" href="#">7</a></li>
                <li class="page-item"><a class="page-link" href="#">8</a></li>
                <li class="page-item arrow-page-item"><a class="page-link" href="#">
                        <img src="/public/img/svg/pagination-right.svg" alt="">
                    </a></li>
            </ul>
        </nav>
    </div>
</div>
