<div class="container fav-container busket-container">


    <?  for ($i = 0; $i < 3; $i++) {?>
    <div class="item-card item-discount__card">
        <span class="item-discount">-18%</span>
    
            <button class="cancel item-fav__btn"></button>
       
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
    <?} ?>
</div>