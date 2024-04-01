<div class="container desktop-busket busket-container personal-bg busket-wrapper">
    <div class="mt-5">
    <?include('core/view/template/crumbs.php');?>
    </div>

    <h1 class=""><?=$page_title?></h1> 

     <button class="add-to-favourites"> <!--МОБИЛЬНЫЕ КНОПКИ -->
        <img class="heart-svg" src="public/img/svg/fav-heart.svg" alt="">
        <span>Добавить в избранное</span>
    </button>
    <button class="clear-basket">Очистить корзину</button>


<!-- ИТЕМЫ --><!-- ИТЕМЫ --><!-- ИТЕМЫ --><!-- ИТЕМЫ --><!-- ИТЕМЫ --><!-- ИТЕМЫ --><!-- ИТЕМЫ -->

    <div class="order-content-wrapper">

        <? $ves = $n = 0; $total_price = 0; foreach ($goods as $gitem) {
                        $razdel_info = mqo ("SELECT sys_name FROM catalog_razdel WHERE id = '".$gitem["razdel_id"]."'");
                        $cat_info = mqo ("SELECT sys_name FROM catalog_cats WHERE id = '".$gitem["cat_id"]."'");
                        $podcat_info = mqo ("SELECT sys_name FROM catalog_podcats WHERE id = '".$gitem["podcat_id"]."'");
                        ?>


            <div class="order-item">
                <div class="order-img__container">
                    <img class="item-img" src="<?=$gitem["img"]?>" alt="" />
                </div>
                <p class="item-name"><?=$gitem["name"]?></p>
                <div class="choose-amount">
                    <button class="decrease">–</button>
                    <span class="current-amout">1</span>
                    <button class="increase">+</button>
                </div>
                <span class="item-price"><?=$gitem["price"]?> руб</span>
                <button class="cancel del_from_cart" data-id="<?=$gitem["id"]?>"></button>
            </div> 
        <? $ves = $ves + $gitem["ves"]; $n++; $total_price = $total_price + $gitem["price"];} ?> 
    


       
        <div class="order-info">
            <p>Товаров в корзине: <span class="text-decorated"><?=$n?> шт</span></p>
            <p>Общий вес: <span class="text-decorated"><?=round($ves/1000,2)?> кг</span></p>
            <div class="total">
                <span class="total-title">Итого:</span>
                <span class="total-amount"><?=$total_price?> руб</span>
            </div>
            <button class="make-order" id="submitForm" >Оформить заказ</button>
        </div>
    </div>


    <p class="title empty hidden">корзина пуста.</p>




    <form id="form_basket" class="basket-form" method="post">
        <div class="customer">
            <h3 class="title customer-title">покупатель</h3>
            
            <div class="customer-info">
                <input placeholder="Ваше ФИО" type="text" id="basket-name" name="cart_fio">
                <input placeholder="Ваш телефон" class="wide" type="tel" id="basket-tel" name="cart_phone">
                <input placeholder="Ваш e-mail" type="text" id="basket-email" name="cart_email">
                <input placeholder="Введите адрес доставки" class="wide " id="basket-adress" type="text" name="basket_adress">
                <input placeholder="Ваш комментарий к заказу" type="text" id="basket-connet" name="cart_text">
            </div>
        </div>

        <div class="wrapper">
            <div class="delivery-methods">
                <h3 class="title delivery-title">Способ доставки</h3>
                <div class="checkbox-container">
                    <input id="delivery" type="checkbox" name="cart_dost" onchange="uncheckAllDelivery(this)">
                    <label for="delivery">Доставка курьером</label>
                </div>
                <div class="checkbox-container">
                    <input id="pickup" type="checkbox" name="cart_dost" onchange="uncheckAllDelivery(this)">
                    <label for="pickup">Самовывоз</label>
                </div>
            </div>
            <div class="payment-methods">
                <h3 class="title payment-title">Способ оплаты</h3>
                <div class="checkbox-container">
                    <input id="card" type="checkbox" name="cart_pay" onchange="uncheckAllPayment(this)">
                    <label for="card">Банковская карта на сайте</label>
                </div>
                <div class="checkbox-container">
                    <input id="card-cur" type="checkbox" name="cart_pay" onchange="uncheckAllPayment(this)">
                    <label for="card-cur">Банковская карта курьеру</label>
                </div>
                <div class="checkbox-container">
                    <input id="nal" type="checkbox" name="cart_pay" onchange="uncheckAllPayment(this)">
                    <label for="nal">Наличные при получении</label>
                </div>
            </div>
        </div>
    </form>
</div>


<!-- МОБИЛКА -->
<div class="cart mobile-busket">
        <div class="container">
          
            <div class="cart-buttons">
                <button class="add-to-favourites">
                    <img class=heart-svg src="/public/img/svg/fav-heart.svg" alt="">
                    <span>Добавить в избранное</span>
                </button>
                <button class="clear-basket">Очистить корзину</button>
            </div>
            <div class="order-content-wrapper">
                <div class="order-item">
                <img class="item-img" src="/public/img/items/1.jpg" alt="" />
                    <p class="item-name">Нерка слабосоленая WISH FISH филе-кусок</p>
                    <div class="choose-amount">
                        <button class="decrease">–</button>
                        <span class="current-amout">1</span>
                        <button class="increase">+</button>
                    </div>
                    <span class="item-price">52,95 руб</span>
                    <button class="cancel"></button>
                </div>
                <div class="order-item">
                <img class="item-img" src="/public/img/items/1.jpg" alt="" />
                    <p class="item-name">Тунец замороженный PREMIUM CLUB стейк</p>
                    <div class="choose-amount">
                        <button class="decrease">–</button>
                        <span class="current-amout">1</span>
                        <button class="increase">+</button>
                    </div>
                    <span class="item-price">149,95 руб</span>
                    <button class="cancel"></button>
                </div>
                <div class="order-item">
                <img class="item-img" src="/public/img/items/1.jpg" alt="" />
                    <p class="item-name">Нерка слабосоленая WISH FISH филе-кусок</p>
                    <div class="choose-amount">
                        <button class="decrease">–</button>
                        <span class="current-amout">2</span>
                        <button class="increase">+</button>
                    </div>
                    <span class="item-price">52,95 руб</span>
                    <button class="cancel"></button>
                </div>
                <div class="order-item">
                <img class="item-img" src="/public/img/items/1.jpg" alt="" />
                    <p class="item-name">Тунец замороженный PREMIUM CLUB стейк</p>
                    <div class="choose-amount">
                        <button class="decrease">–</button>
                        <span class="current-amout">1</span>
                        <button class="increase">+</button>
                    </div>
                    <span class="item-price">149,95 руб</span>
                    <button class="cancel"></button>
                </div>
                <div class="order-info">
                    <p>Товаров в корзине: <span class="text-decorated">4 шт</span></p>
                    <p>Общий вес: <span class="text-decorated">1.006 кг</span></p>
                    <div class="total">
                        <span class="total-title">Итого:</span>
                        <span class="total-amount">1 600 руб</span>
                    </div>
                    <button class="make-order">Оформить заказ</button>
                </div>
            </div>
            <p class="title empty hidden">корзина пуста.</p>
            <div class="customer">
                <h3 class="title customer-title">покупатель</h3>
                <div class="customer-info">
                    <input placeholder="Ваше ФИО" type="text">
                    <input placeholder="Ваш телефон" class="wide" type="text">
                    <input placeholder="Ваш e-mail" type="text">
                    <input placeholder="Введите адрес доставки" class="wide" id="expanded" type="text">
                    <input placeholder="Ваш комментарий к заказу" type="text">
                </div>
            </div>
            <div class="wrapper">
                <div class="delivery-methods busket-delivery">
                    <h3 class="title delivery-title">Способ доставки</h3>
                    <div class="checkbox-container">
                        <input type="checkbox" onchange="uncheckAllDelivery(this)">
                        <label>Доставка курьером</label>
                    </div>
                    <div class="checkbox-container">
                        <input type="checkbox" onchange="uncheckAllDelivery(this)">
                        <label>Самовывоз</label>
                    </div>
                </div>
                <div class="payment-methods busket-payment">
                    <h3 class="title payment-title">Способ оплаты</h3>
                    <div class="checkbox-container">
                        <input type="checkbox" onchange="uncheckAllPayment(this)">
                        <label>Банковская карта на сайте</label>
                    </div>
                    <div class="checkbox-container">
                        <input type="checkbox" onchange="uncheckAllPayment(this)">
                        <label>Банковская карта курьеру</label>
                    </div>
                    <div class="checkbox-container">
                        <input type="checkbox" onchange="uncheckAllPayment(this)">
                        <label>Наличные при получении</label>
                    </div>
                </div>
            </div>
        </div>
    </div>