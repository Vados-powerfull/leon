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

<div class="container category-wrapper ">
   
    <div class="category-aside ">
        <div class="aside-category__dropdowns ">

            <!-- <div class="aside-preview">  НУЖЕН ПОВТОР РАЗДЕЛА ТУТ?
                <h3><?=$razdel_info["name"]?></h3>
            </div> -->


            <div class="mquestions">
            <? $cat_razdelinfo = mqs("SELECT * FROM catalog_cats WHERE razdel_id='".$mmrazdel_info["id"]."' AND on_moderate=0  ORDER BY ordering");
                  foreach ($cat_razdelinfo as $citem) {
                    

                    if ($mmpodcat_info["cat_id"] == $citem["id"]) {
                        $cat_active = ' text-active'; $cat_dd = ' dropdown-active'; $cat_cont = ' question-active';
                    } else {$cat_active = $cat_dd = $cat_cont = '';}?>


                    <div class="question  <?=$cat_cont?>">
                        <div class="quesion-body ">
                            <div class="question-title-wrapper">
                                <h3 class="question-title title-active"><?=$citem["name"]?></h3>
                                <button class="dropdown <?=$cat_dd?>"></button>

                            </div>


                            <div class="question-text  <?=$cat_active?> text-slide-in">   <!--text-active ОТКРЫВАЕТ ВСЕ-->

                                <?  
                                    $catalog_podcats = mqs("SELECT * FROM catalog_podcats WHERE cat_id='".$citem["id"]."'");
                                    foreach ($catalog_podcats as $pitem) {?>
                                    <a href="/podcat/<?=$pitem["sys_name"]?>"><?=$pitem["name"]?></a>
                                <? } ?>
                            </div>
                        </div>
                    </div>
                <?} ?>
            </div>


<!-- CAT_QUERY -->
            <?
                if ($path[0] == 'razdel') $cat_query = ' AND razdel_id='.$mmrazdel_info["id"];
                elseif ($path[0] == 'podcat') $cat_query = ' AND podcat_id='.$mmpodcat_info["id"];
                elseif ($path[0] == 'category') $cat_query = ' AND cat_id='.$mmcat_info["id"];
                else $cat_query = '';
            ?>


<!-- ADD_QUERY -->
            <? 
            if ($_SERVER['QUERY_STRING'] == '') $add_query = '';
            else {
                $params = explode('&', $_SERVER['QUERY_STRING']);
                $add_query = '';
                foreach ($params as $param) {
                    if ( preg_match('/price1/',$param) ) $add_query .= ' AND price >= '.str_replace("price1=","",$params[0]);
                    elseif ( preg_match('/price2/',$param) ) $add_query .= ' AND price <= '.str_replace("price2=","",$params[1]);
                    else {
                        $add_query .= ' AND '.$param;
                    }
                }
            }
            

           	if ($path[0] == 'razdel') $goods = mqs("SELECT * FROM catalog WHERE razdel_id='".$mmrazdel_info["id"]."' AND on_moderate=0 ".$add_query." ORDER BY ordering"); 
            elseif ($path[0] == 'category') $goods = mqs("SELECT * FROM catalog WHERE cat_id='".$mmcat_info["id"]."' AND on_moderate=0 ".$add_query." ORDER BY ordering");
            elseif ($path[0] == 'podcat') $goods = mqs("SELECT * FROM catalog WHERE podcat_id='".$mmpodcat_info["id"]."' AND on_moderate=0 ".$add_query." ORDER BY ordering"); 
          
            ?>
          

        

        <div class="desktop-category filtr_nav">
            <div class="range-slider__wrapper">
                <div class="price-range-slider">
                    <h6 class="filters-header">Цена (руб.)</h6>

                    <p class="range-value">

                   <?   $start_price = mqo("SELECT price FROM catalog WHERE on_moderate=0".$add_query.$cat_query." ORDER BY price LIMIT 1 ");
		                $end_price = mqo("SELECT price FROM catalog WHERE on_moderate=0".$add_query.$cat_query." ORDER BY price DESC LIMIT 1 ");
                    ?>
                        <input type="number" id="start-amount" value="<?=$start_price["price"]?>" data-min="<?=$start_price["price"]?>">
                        <input type="number" id="end-amount" value="<?=$end_price["price"]?>" data-max="<?=$end_price["price"]?>">
                    </p>
                    <div id="slider-range" class="range-bar"></div>


                    <div class="checkbox-container checkbox-category__container">
                        <input id="discount1" type="checkbox" name="fsell" data-value="1" class="check">
                        <label class="checkbox-label" for="discount1">Товары со скидкой</label>
                    </div>
                </div>

            </div>



<!-- БРЕНДЫ -->

            <div class="question aside-white__question ">
                <div class="quesion-body ">
                    <div class="question-title-wrapper">
                        <h3 class="question-title title-active">Бренд</h3>
                        <button class="dropdown "></button>

                    </div>
                    <div class="question-text text-slide-in">
                        <? $n = 1; 
                            foreach ($catalog_brands as $bitem) {
                                $mbrand_info =  mqo("SELECT * FROM catalog WHERE brand_id = '".$bitem["id"]."'");
                            
                            ?>
                          
                            <?$vsego_brand = mqs("SELECT id FROM catalog WHERE brand_id='".$bitem["id"]."'".$cat_query);
                                $mark_brand = 'filter-brand'.$n;?>
                                <div class="checkbox-container checkbox-category__container ">
                                    <input class="check" name="brand_id" id="<?=$mark_brand?>" type="checkbox" data-value="<?=$mbrand_info["id"]?>">
                                    <label class="checkbox-label" for="<?=$mark_brand?>"><?=$bitem["name"]?> <span>(<?=count($vsego_brand)?>)</span></label>
                                </div>
                        <? $n++;} ?>
                        

                    </div>

                </div>
            </div>


<!-- СТРАНА -->
            <div class="question aside-white__question ">
                <div class="quesion-body">
                    <div class="question-title-wrapper">
                        <h3 class="question-title title-active">Страна производителя</h3>
                        <button class="dropdown "></button>

                    </div>

                    
                        <div class="question-text text-slide-in">


                            <? foreach ($catalog_country as $couitem) {
                                $mcountry_info =  mqo("SELECT * FROM catalog WHERE country_id = '".$couitem["id"]."'");?>
                                <div class="checkbox-container checkbox-category__container">
                                                                                          <!-- podcat_id='".$pitem["id"]."' AND cat_id='".$item["id"]."' -->
                                    <? $vsego_country = mqs("SELECT id FROM catalog WHERE country_id='".$couitem["id"]."'".$cat_query);
                                       $mark_country = 'filter-country'.$n;
                                    ?>

                                    <input id="<?=$mark_country?>" name="country_id" type="checkbox" data-value="<?=$mcountry_info["id"]?>">
                                    <label for="<?=$mark_country?>"><?=$couitem["name"]?> <span>(<?=count($vsego_country)?>)</span></label>

                                </div>
                            <? $n++;} ?>
                        </div>
                    </div>
                </div>
            </div>


            <button class="prime-btn filtr_btn catalog-aside-btns">
                Показать товары
            </button>

            <button class="prime-black-btn filtr_btn_reset catalog-aside-btns" data-url="<?=$_SERVER['REDIRECT_URL']?>">
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
        
        
        <? foreach ($goods as $gitem) {

            include('core/view/itemcard/item.php');
           
        } ?>

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
