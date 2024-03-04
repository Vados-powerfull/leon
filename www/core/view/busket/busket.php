<div class="container desktop-busket busket-container personal-bg busket-wrapper">

    <button class="add-to-favourites">
        <img class="heart-svg" src="public/img/svg/fav-heart.svg" alt="">
        <span>Добавить в избранное</span>
    </button>
    <button class="clear-basket">Очистить корзину</button>
    <div class="order-content-wrapper">
        <div class="order-item">
            <div class="order-img__container">
                <img class="item-img" src="/public/img/items/1.jpg" alt="" />
            </div>
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
            <div class="order-img__container">
                <img class="item-img" src="/public/img/items/1.jpg" alt="" />
            </div>
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
            <div class="order-img__container">
                <img class="item-img" src="/public/img/items/1.jpg" alt="" />
            </div>
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
            <div class="order-img__container">
                <img class="item-img" src="/public/img/items/1.jpg" alt="" />
            </div>
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
            <input placeholder="Ваш телефон" class="wide" type="tel">
            <input placeholder="Ваш e-mail" type="text">
            <input placeholder="Введите адрес доставки" class="wide " id="expanded" type="text">
            <input placeholder="Ваш комментарий к заказу" type="text">
        </div>
    </div>
    <div class="wrapper">
        <div class="delivery-methods">
            <h3 class="title delivery-title">Способ доставки</h3>
            <div class="checkbox-container">
                <input id="busket1" type="checkbox" onchange="uncheckAllDelivery(this)">
                <label for="busket1">Доставка курьером</label>
            </div>
            <div class="checkbox-container">
                <input id="busket2" type="checkbox" onchange="uncheckAllDelivery(this)">
                <label for="busket2">Самовывоз</label>
            </div>
        </div>
        <div class="payment-methods">
            <h3 class="title payment-title">Способ оплаты</h3>
            <div class="checkbox-container">
                <input id="busket3" type="checkbox" onchange="uncheckAllPayment(this)">
                <label for="busket3">Банковская карта на сайте</label>
            </div>
            <div class="checkbox-container">
                <input id="busket4" type="checkbox" onchange="uncheckAllPayment(this)">
                <label for="busket4">Банковская карта курьеру</label>
            </div>
            <div class="checkbox-container">
                <input id="busket5" type="checkbox" onchange="uncheckAllPayment(this)">
                <label for="busket5">Наличные при получении</label>
            </div>
        </div>
    </div>
</div>
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