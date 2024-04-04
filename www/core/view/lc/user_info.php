<? $user_info = mqo("SELECT * FROM lc_users WHERE id='".$_SESSION["user"]."'"); ?>
<div class="background personal-bg">
    <div class="container">
        <div class="info">
            <p class="info-title">Общие данные</p>
            <form class="info-body">
                <p>ФИО</p>
                <div class="full-name-content info-content">
                    <input value="<?=$user_info["fio"]?>" class="info-text" disabled />
                    <p class="change-button">Изменить</p>
                </div>
                <p>Телефон</p>
                <div class="phone-content info-content">
                    <input disabled value="<?=$user_info["phone"]?>" type="tel" class="info-text" />
                    <p class="change-button content-hidden">Изменить</p>
                </div>
                <p>E-mail</p>
                <div class="email-content info-content">
                    <input disabled value="<?=$user_info["email"]?>" class="info-text" />
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
                <? $adreses = mqs("SELECT * FROM lc_adress WHERE user_id='".$_SESSION["user"]."'"); 
                foreach ($adreses as $adres) {?>
                    <div class="delivery-point">
                        <img src="/public/img/svg/marker.svg" alt="marker" />
                        <p class="delivery-point-content">
                            <?=$adres["adress"]?>
                        </p>
                    </div>
                <?}?>
                
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
    </div>
</div>