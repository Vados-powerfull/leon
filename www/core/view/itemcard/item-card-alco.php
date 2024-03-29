<div class="container item-card__container">

    <div class="item-card__img-container">
        <img class="item-card__img" src="/public/img/items/2.jpg" alt="">
        <span class="discount">
            -55%
        </span>
    </div>

    </img>

    <div class="item-card__text-container">
        <div class="item-card__info">
            <p>арт. 688541</p>
            <div class="item-card__fav-container">
                <a href="">В избранное</a>
                <a class="item-card__fav">
                    <svg class="header-nav-svg" width="29" height="23" viewBox="0 0 29 23">
                        <use xlink:href="/public/img/svg/heart.svg#heart-menu-icon" stroke="red" fill="currentColor" />
                    </svg>
                </a>
            </div>
        </div>
        <div class="item-card__text">
            <div class="card-text__info">
                <p>Страна: <span>Россия</span></p>
                <p>Производитель: <span>Россия, 150 г </span></p>
                <p>Вес: <span>150 г </span></p>
            </div>
            <div class="card-text__count">
                <p>Наличие: <span class="red">мало</span></p>
            </div>
        </div>
        <div class="item-card__price">

            <div class="default-price">
                <p>цена</p>
                <span>52,95 руб</span>
            </div>
            <div class="item-price__notice">
                Только самовывоз
                из магазина с оплатой при получении
            </div>
        </div>
        <div class="item-card__btns">
            <button class="prime-btn alco-popup-btn">
                В корзину
            </button>
            <button class="prime-black-btn alco-popup-btn">
                Купить в 1 клик
            </button>
        </div>
    </div>

</div>
<div class="container">
    <div class="item-card__alco-container">
        <div class="item-card__alco-text">
            <p> Продажа товара возможна только для лиц старше 18 лет
                при наличии документа, удостоверяющего личность</p>
        </div>
        <div class="item-card__alco-text">
            <p> Этот продукт не исключает риски
                для здоровья и вызывает зависимость</p>
        </div>
    </div>
</div>
<div class="container">


    <div class="personal-buttons">
        <button class="personal-button   personal-button__no-border my-info-button order-stats-btn">
            <span class="my-info-title">Характеристики</span>
        </button>
        <button
            class="personal-button personal-button-active  personal-button__no-border  order-history-button order-description-btn">
            <span class="order-history-title">Описание</span>
        </button>


    </div>
</div>
<div class="background item-card__bg">
    <div class="container">
        <div class="info content-hidden">
            <div class="item-card__stats">
                <?  for ($i = 0; $i < 14; $i++) {?>
                <div class="item-card__stats-row">
                    <p>Бренд</p>
                    <span>WISH FISH</span>
                </div>
                <?} ?>
            </div>
        </div>
        <div class=" history ">
            <p class="item-card__description">Форель слабосоленая WISH FISH филе-кусок станет удачным вариантом
                для
                повседневного обеда, ужина и
                сервировки праздничного стола. Ее можно подавать в виде нарезки, использовать для приготовления
                салатов и холодных закусок. Слабосоленая форель отличается нежной текстурой и отменными
                дегустационными качествами. Она быстро утоляет голод, заряжает энергией и является источником
                ценных
                омега-кислот, витаминов и минеральных элементов.</p>
            <div class="alco-warn">
                <img src="/public/img/svg/alert.svg" alt="">
                <p> Алкоголь противопоказан детям и подросткам до 18 лет, беременным и кормящим женщинам, лицам с
                    заболеваниями центральной нервной системы, почек, печени и других органов пищеварения. Осторожно,
                    вызывает привыкание! Чрезмерное употребление алкоголя вредит Вашему здоровью.</p>
            </div>
        </div>


    </div>

</div>
<section class=" round-section new-section recommended-items__section">

    <div class=" container">
        <h2 class="block-title">
            Рекомендуемые товары
        </h2>
        <div class="recommended-items__container">
            <?  for ($i = 0; $i < 4; $i++) {?>

            <div class="item-card item-discount__card">
                <span class="item-discount">-18%</span>
                <button class="item-fav__btn">
                    <svg class="header-nav-svg" width="32" height="32" viewBox="0 0 27 22">
                        <use xlink:href="/public/img/svg/heart.svg#heart-menu-icon" fill="currentColor" />
                    </svg>
                </button>
                <div class="item-card__img">
                    <a href="/itemcard"> <img src="/public/img/items/1.jpg" alt=""></a>
                </div>
                <div class="item-card__articul__wrapper">
                    <p class="item-card-articul">
                        арт. 688541
                    </p>
                    <span class="item-card__count green">
                        Много
                    </span>
                </div>
                <a href="/itemcard" class="item-card__title">
                    Сыр мягкий
                    «Егорлык Молоко»
                    Шевр в масле
                </a>
                <p class="item-card__county">
                    Вьетнам, 400 г
                </p>

                <div class="price-wrapper">
                    <div class="price-container ">
                        <p>333,99</p>
                        <span>
                            149,95 руб
                        </span>
                    </div>

                </div>
                <div class="item-card__buy-btn-wrapper">
                    <button class="item-card__busket-btn">
                        В корзину
                    </button>
                    <button class="item-card__buy-btn">
                        Купить в 1 клик
                    </button>
                </div>
            </div>
            <? } ?>
        </div>

    </div>
</section>