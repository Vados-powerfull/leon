<div class="container">
    <div class=" mt-5">
    <? include ("core/view/template/crumbs.php"); ?>
    </div>
    
    <h1 class="payment-title"><?=$page["meta_title"]?></h1>
    <div class="order-info">
        <img src="/public/img/payment/clock.svg" class="clock-svg" alt="">
        <div class="order-info-wrapper">
            <p class="order-info-content">Заказы принимаются через веб-сайт – <span
                    class="order-info-content-decorated">24 часа в сутки.</span></p>
            <p class="order-info-content">Служба доставки работает 7 дней в неделю, время работы доставки <span
                    class="order-info-content-decorated">с 11:00 до 21:00.</span></p>
        </div>
    </div>
    <p class="payment-info">
        Вы сможете принять решение, оплачивать заказ или нет, после того, как полностью проверите его. <br>
        Оплатить заказ можно банковской картой или курьеру при получении заказа.
        В случае оплаты наличными списание <br> произойдет в тот момент, когда сборщик расплатится на кассе магазина.
    </p>
    <div class="payment-methods-small">
        <div class="payment-method-small">
            <img src="/public/img/payment/laptop.svg" class="laptop-svg" alt="">
            <p class="payment-method-content-small">Пластиковой картой на сайте</p>
        </div>
        <div class="payment-method-small">
            <img src="/public/img/payment/client-card.svg" class="client-card-svg" alt="">
            <p class="payment-method-content-small">Пластиковой картой курьеру</p>
        </div>
        <div class="payment-method-small">
            <img src="/public/img/payment/money.svg" class="money-svg" alt="">
            <p class="payment-method-content-small">Наличными курьеру</p>
        </div>
    </div>
    <div class="payment-methods">
        <div class="card-on-domen">
            <h3 class="payment-method-title card-on-domen-title">1. Картой онлайн</h3>
            <div class="payment-method-content">
                <p class="payment-method-text payment-method-text-bold">Для выбора оплаты товара с помощью банковской
                    карты на соответствующей
                    странице необходимо нажать<br>
                    кнопку Оплата заказа банковской картой. Оплата происходит через ПАО СБЕРБАНК с использованием<br>
                    банковских карт следующих платёжных систем:
                </p>
                <div class="card-types">
                    <p>
                        МИР; VISA International; Mastercard Worldwide; JCB.
                    </p>
                    <div class="card-logos">
                        <img src="/public/img/payment/mir-logo.svg" alt="mir">
                        <img src="/public/img/payment/visa-logo.svg" alt="visa">
                        <img src="/public/img/payment/ms-logo.svg" alt="ms">
                        <img src="/public/img/payment/jcb-logo.svg" alt="jcb">
                    </div>

                </div>
                <p class="payment-method-text">
                    Для оплаты (ввода реквизитов Вашей карты) Вы будете перенаправлены на платёжный шлюз ПАО СБЕРБАНК.
                    <br>
                    Соединение с платёжным шлюзом и передача информации осуществляется в защищённом режиме с
                    использованием
                    протокола шифрования SSL. В случае если Ваш банк поддерживает технологию безопасного проведения
                    интернет-
                    платежей Verified By Visa, MasterCard SecureCode, MIR Accept, J-Secure, для проведения платежа также
                    может
                    потребоваться ввод специального пароля.Настоящий сайт поддерживает 256-битное шифрование.
                    Конфиденциальность сообщаемой персональной информации обеспечивается ПАО СБЕРБАНК. Введённая
                    информация не будет предоставлена третьим лицам за исключением случаев, предусмотренных
                    законодательством РФ. <br>
                    Проведение платежей по банковским картам осуществляется в строгом соответствии с требованиями
                    платёжных систем
                    МИР, Visa Int., MasterCard Europe Sprl, JCB.
                </p>
            </div>
            <h3 class="payment-method-title card-to-courier-title">2. Картой курьеру при получении заказа</h3>
            </div>
        </div>
        <h2 class=" delivery-title">Доставка</h2>
        </div>

    </div>
    <div class="delivery">
        <div class="delivery-buttons__wrapper">
            <div class="container">
                <div class="delivery-buttons">
                    <button class="delivery-button courier-delivery"><span class="courier-delivery-title">доставка
                            курьером</span></button>
                    <button class="delivery-button delivery-button-active pick-up"><span
                            class="pick-up-title">самовывоз</span></button>
                </div>
            </div>
        </div>
        <div class="container delivery-container">


            <div class="delivery-content-wrapper">

    <!-- САМОВЫВОЗ ВЫВОД ТЕКСТА-->
                <div class="pick-up-content">
                    <?=$delivery_text["samo"]?> 
                </div>

    <!-- КУРЬЕР ВЫВОД ТЕКСТА-->
                <div class="courier-delivery-content content-hidden">
                    <?=$delivery_text["cour"]?> 
                </div>

            </div>
        </div>
    </div>