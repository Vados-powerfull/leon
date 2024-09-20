
<?
if (isset($_GET["order"]) && is_numeric($_GET["order"]))
{
    $order_info = mqo("SELECT payment_status_id FROM orders WHERE id='".$_GET["order"]."'");
    $payment_status_info = mqo("SELECT * FROM payments_status WHERE id='".$order_info["payment_status_id"]."'");

    echo '<script>alert("Ваш заказ '.mb_strtolower($payment_status_info["name"]).'");</script>';
}


function getAmountFromCookie($productId) {
    // Проверяем, есть ли кука с количеством
    if (isset($_COOKIE['cart_amount'])) {
        // Получаем значение куки
        $amount_mcookie = $_COOKIE['cart_amount'];

        // Пример строки куки: 1-5,13-1,220-2
        // Используем регулярное выражение для поиска количества для товара с определенным id
        $pattern = '/'.$productId.'-(\d+)/';
        if (preg_match($pattern, $amount_mcookie, $matches)) {
            // Возвращаем найденное количество
            return (int)$matches[1];
        }
    }

    // Если товара нет в куке, возвращаем количество по умолчанию - 1
    return 1;
}
?>
<div class="container busket-container personal-bg busket-wrapper">
<? $_COOKIE["cart"] = '';?>
    <div class="mt-5">
    <?include('core/view/template/crumbs.php');?>
    </div>

    <h1 class=""><?=$page_title?></h1> 

     


<!-- ИТЕМЫ --><!-- ИТЕМЫ --><!-- ИТЕМЫ --><!-- ИТЕМЫ --><!-- ИТЕМЫ --><!-- ИТЕМЫ --><!-- ИТЕМЫ -->

    <div class="row">
        <div class="col-12 col-md-9">
            <?  $ves = $n = 0; 
            $total_price = 0;
                foreach ($goods as $gitem) {
                        $razdel_info = mqo ("SELECT sys_name FROM catalog_razdel WHERE id = '".$gitem["razdel_id"]."'");
                        $cat_info = mqo ("SELECT sys_name FROM catalog_cats WHERE id = '".$gitem["cat_id"]."'");
                        $podcat_info = mqo ("SELECT sys_name FROM catalog_podcats WHERE id = '".$gitem["podcat_id"]."'");


                        $amount = getAmountFromCookie($gitem["id"]);
                        ?>



        
                
            <div class="order-item">

                <div>
                    <div class="order-img__container">
                        <div><img class="item-img" src="<?=$gitem["img"]?>" alt="" /></div>
                    </div>
                </div>
                <div>
                    <p class="item-name"><?=$gitem["name"]?></p>
                </div>
                

                <div class="choose-amount-m">
                    <div class="choose-amount">
                        <button class="decrease" data-id="<?=$gitem["id"]?>">–</button>
                        <span class="current-amout"><?=$amount?></span>
                        <button class="increase"  data-id="<?=$gitem["id"]?>">+</button>
                    </div>
                </div>
                <div class="item-price-m">
                    <span class="item-price"><?=$gitem["price"]?> руб</span>
                </div>
                
                <div class="cancel-m">
                    <button class="cancel del_from_cart" data-id="<?=$gitem["id"]?>"></button>
                </div>
            </div> 
        
            <? 
                
                $ves = $ves + $gitem["ves"]; $n++; $total_price = $total_price + $gitem["price"];} 
                
            ?> 
        </div>
        <div class="col-12 col-md-3">
            <div class="order-info">
                <p>Товаров в корзине: <span class="text-decorated"><?=$n?> шт</span></p>
                <p>Общий вес: <span class="text-decorated order-ves"><?=round($ves/1000,2)?> кг</span></p>
                <div class="total">
                    <span class="total-title">Итого:</span>
                    <span class="total-amount"><?=$total_price?> руб</span>
                </div>
                <button class="make-order make-order-d" id="submitForm" >Оформить заказ</button>
            </div>
        </div>
        
    </div>


    <p class="title empty hidden">корзина пуста.</p>



    <form id="form_basket" class="basket-form" method="post">

        <div class="row">
            <div class="col-12 col-md-9">
                <div class="customer">
                    <h3 class="title customer-title">покупатель</h3>
                    
                            
                    <? $uinfo = mqo("SELECT * FROM lc_users WHERE id='".$_SESSION["user"]."'") ?>
                    
                    
                    
                            <div class="customer-info">
                                <input placeholder="Ваше имя" type="text" id="basket-name" name="cart_fio" value="<?=$uinfo["fio"]?>">
                                <input placeholder="Ваш телефон" class="wide" type="tel" id="basket-tel" name="cart_phone" value="<?=$uinfo["phone"]?>" required>
                                <input placeholder="Ваш email" type="text" id="basket-email" name="cart_email" value="<?=$uinfo["email"]?>" required>
                                <input placeholder="Введите адрес доставки" class="wide " id="basket-adress" type="text" name="basket_adress" value="<?=$uinfo["adress"]?>">
                                <input placeholder="Ваш комментарий к заказу" type="text" id="basket-connet" name="cart_text">
                            </div>
                        
                </div>
            </div>
            <div class="col-12 col-md-3"></div>
        </div>

        <div class="row">
            <div class="col-12 col-md-9">
                <div class="wrapper">
                    <div class="delivery-methods">
                        <h3 class="title delivery-title">Способ доставки</h3>
                        <div class="checkbox-container">
                            <input id="delivery" type="checkbox" name="cart_dost" value="2" onchange="uncheckAllDelivery(this)">
                            <label for="delivery">Доставка курьером</label>
                        </div>
                        <div class="checkbox-container">
                            <input id="pickup" type="checkbox" name="cart_dost" value="1" onchange="uncheckAllDelivery(this)">
                            <label for="pickup">Самовывоз</label>
                        </div>
                    </div>
                    <div class="payment-methods">
                        <h3 class="title payment-title">Способ оплаты</h3>
                        <div class="checkbox-container">
                            <input id="card" type="checkbox" name="cart_pay" value="online" onchange="uncheckAllPayment(this)">
                            <label for="card">Банковская карта на сайте</label>
                        </div>
                        <div class="checkbox-container">
                            <input id="card-cur" type="checkbox" name="cart_pay" value="offline" onchange="uncheckAllPayment(this)">
                            <label for="card-cur">Банковская карта курьеру</label>
                        </div>
                        <div class="checkbox-container">
                            <input id="nal" type="checkbox" name="cart_pay" value="cash" onchange="uncheckAllPayment(this)">
                            <label for="nal">Наличные при получении</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-3"></div>
        </div>

        
    </form>






</div>

