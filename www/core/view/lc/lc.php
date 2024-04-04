<div class="path mt-5 container">
    <? include ("core/view/template/crumbs.php"); ?>
    <h2 class="page-title">
        <?=$page_title?>
    </h2>
</div>

<div class="container">

    <div class="personal">

        <div class="personal-buttons">
            <button class="personal-button my-info-button">
                <span class="my-info-title">Мои данные</span>
            </button>
            <button class="personal-button personal-button-active order-history-button">
                <span class="order-history-title">история заказов</span>
            </button>
            <button class="personal-button newsletter-button">
                <span class="newsletter-title">Рассылка</span>
            </button>
            <a href="/login" class="exit-button"><span class="">Выход</span></a>
        </div>

    </div>

</div>
<div class="background personal-bg">
    <div class="container">
        <div class="info content-hidden">
            <p class="info-title">Общие данные</p>
            <form class="info-body">
                <p>ФИО</p>
                <div class="full-name-content info-content">
                    <input value="Иванов Константин Петрович" class="info-text" />
                    <p class="change-button">Изменить</p>
                </div>
                <p>Телефон</p>
                <div class="phone-content info-content">
                    <input disabled value="+7 950 678 90 00" type="tel" class="info-text" />
                    <p class="change-button content-hidden">Изменить</p>
                </div>
                <p>E-mail</p>
                <div class="email-content info-content">
                    <input disabled value="user@mail.ru" class="info-text" />
                    <p class="change-button content-hidden">Изменить</p>
                </div>
                <p>Пароль</p>
                <div class="password-content info-content">
                    <input disabled value="********" type="password" class="info-text" />
                    <p class="change-button content-hidden">Изменить</p>
                </div>
            </form>
            <p class="delivery-points-title">Адреса доставки</p>
            <div class="delivery-points">
                <div class="delivery-point">
                    <img src="/public/img/svg/marker.svg" alt="marker" />
                    <p class="delivery-point-content">
                        г. Белгород, ул. Ленина , д.12, кв. 35
                    </p>
                </div>
            </div>
            <div class="add-delivery-point">
                <img src="/public/img/svg/plus.svg" alt="" />
                <p>Добавить новый адрес доставки</p>
            </div>
            <div class="bonus-card">
                <p class="bonus-card-title">Активировать бонусную карту</p>
                <p class="bonus-card-title bonus-card-title-locked content-hidden">
                    бонусная карта
                </p>
                <input class="card-number" placeholder="Введите номер карты" />
                <div class="card-number-locked content-hidden">
                    5678 2345 6789 8900
                </div>
                <a href="#" class="send">Отправить</a>
                <div class="points content-hidden">
                    <p class="points-title">Баллы за покупки</p>
                    <span class="amount">56 баллов</span>
                </div>
            </div>
        </div>
        <div class="history">
            <div class="order">
                <div class="order-header-wrapper">
                    <div>
                        <p class="order-type">Самовывоз</p>
                        <p class="order-address content-hidden">
                            Доставка г. Белгород, ул. Ленина , д.12, кв. 35
                        </p>
                        <div class="order-status">Собирается</div>
                    </div>
                    <div class="order-number-wrapper">
                        <p class="order-number">Заказ №21236776-1</p>
                        <p class="order-price">3400 руб</p>
                    </div>
                    <div class="order-buttons">
                        <div class="reorder">
                            <img src="/public/img/svg/reorder.svg" class="reorder-svg" alt="" />
                            <span class="reorder-title">Повторить заказ</span>
                        </div>
                        <button class="dropdown"></button>
                    </div>
                </div>
                <div class="order-content-wrapper content-hidden">
                    <div class="order-item">
                        <div class="order-img__container">
                            <img class="item-img" src="/public/img/items/1.jpg" alt="" />
                        </div>
                        <p class="item-name">
                            Нерка слабосоленая WISH FISH филе-кусок
                        </p>
                        <div class="item-total">
                            <span class="item-price">52,95 руб</span>
                            <span class="item-amount">2 шт</span>
                        </div>
                    </div>
                    <div class="order-item">
                        <div class="order-img__container">
                            <img class="item-img" src="/public/img/items/1.jpg" alt="" />
                        </div>
                        <p class="item-name">
                            Тунец замороженный PREMIUM CLUB стейк
                        </p>
                        <div class="item-total">
                            <span class="item-price">149,95 руб</span>
                            <span class="item-amount">2 шт</span>
                        </div>
                    </div>
                    <div class=" lc-order-info">
                        <p class="weight">
                            Общий вес: <span class="text-decorated">1.006 кг</span>
                        </p>
                        <p class="delivery-price">
                            Доставка: <span class="text-decorated">200 руб</span>
                        </p>
                        <p class="order-cost">
                            Стоимость заказа:
                            <span class="text-decorated">1230 руб</span>
                        </p>
                        <div class="total">
                            <span class="total-title">Итого:</span>
                            <span class="total-amount">1 430 руб</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="order order-active">
                <div class="order-header-wrapper">
                    <div>
                        <p class="order-type">Доставка</p>
                        <p class="order-address order-address-active">
                            Доставка г. Белгород, ул. Ленина , д.12, кв. 35
                        </p>
                        <div class="order-status">Успешно завершен</div>
                    </div>
                    <div class="order-number-wrapper">
                        <p class="order-number">Заказ №212326296-1</p>
                        <p class="order-price">1430 руб</p>
                    </div>
                    <div class="order-buttons">
                        <div class="reorder">
                            <img src="/public/img/svg/reorder.svg" class="reorder-svg" alt="" />
                            <span class="reorder-title">Повторить заказ</span>
                        </div>
                        <button class="dropdown dropdown-active"></button>
                    </div>
                </div>
                <div class="order-content-wrapper order-content-wrapper-active">
                    <div class="order-item">
                        <div class="order-img__container">
                            <img class="item-img" src="/public/img/items/1.jpg" alt="" />
                        </div>
                        <p class="item-name">
                            Нерка слабосоленая WISH FISH филе-кусок
                        </p>
                        <div class="item-total">
                            <span class="item-price">52,95 руб</span>
                            <span class="item-amount">2 шт</span>
                        </div>
                    </div>
                    <div class="order-item">
                        <div class="order-img__container">
                            <img class="item-img" src="/public/img/items/1.jpg" alt="" />
                        </div>
                        <p class="item-name">
                            Тунец замороженный PREMIUM CLUB стейк
                        </p>
                        <div class="item-total">
                            <span class="item-price">149,95 руб</span>
                            <span class="item-amount">2 шт</span>
                        </div>
                    </div>
                    <div class="lc-order-info">
                        <p class="weight">
                            Общий вес: <span class="text-decorated">1.006 кг</span>
                        </p>
                        <p class="delivery-price">
                            Доставка: <span class="text-decorated">200 руб</span>
                        </p>
                        <p class="order-cost">
                            Стоимость заказа:
                            <span class="text-decorated">1230 руб</span>
                        </p>
                        <div class="total">
                            <span class="total-title">Итого:</span>
                            <span class="total-amount">1 430 руб</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="order">
                <div class="order-header-wrapper">
                    <div>
                        <p class="order-type">Самовывоз</p>
                        <p class="order-address content-hidden">
                            Доставка г. Белгород, ул. Ленина , д.12, кв. 35
                        </p>
                        <div class="order-status">Успешно завершен</div>
                    </div>
                    <div class="order-number-wrapper">
                        <p class="order-number">Заказ №21236776-1</p>
                        <p class="order-price">3400 руб</p>
                    </div>
                    <div class="order-buttons">
                        <div class="reorder">
                            <img src="/public/img/svg/reorder.svg" class="reorder-svg" alt="" />
                            <span class="reorder-title">Повторить заказ</span>
                        </div>
                        <button class="dropdown"></button>
                    </div>
                </div>
                <div class="order-content-wrapper content-hidden">
                    <div class="order-item">
                        <div class="order-img__container">
                            <img class="item-img" src="/public/img/items/1.jpg" alt="" />
                        </div>
                        <p class="item-name">
                            Нерка слабосоленая WISH FISH филе-кусок
                        </p>
                        <div class="item-total">
                            <span class="item-price">52,95 руб</span>
                            <span class="item-amount">2 шт</span>
                        </div>
                    </div>
                    <div class="order-item">
                        <div class="order-img__container">
                            <img class="item-img" src="/public/img/items/1.jpg" alt="" />
                        </div>
                        <p class="item-name">
                            Тунец замороженный PREMIUM CLUB стейк
                        </p>
                        <div class="item-total">
                            <span class="item-price">149,95 руб</span>
                            <span class="item-amount">2 шт</span>
                        </div>
                    </div>
                    <div class="lc-order-info">
                        <p class="weight">
                            Общий вес: <span class="text-decorated">1.006 кг</span>
                        </p>
                        <p class="delivery-price">
                            Доставка: <span class="text-decorated">200 руб</span>
                        </p>
                        <p class="order-cost">
                            Стоимость заказа:
                            <span class="text-decorated">1230 руб</span>
                        </p>
                        <div class="total">
                            <span class="total-title">Итого:</span>
                            <span class="total-amount">1 430 руб</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="newsletter-wrapper content-hidden">
            <? 	include('core/view/index/newsletter.php'); ?>

        </div>
    </div>
</div>