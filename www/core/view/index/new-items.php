<section class="section new-section  discount-section round-section">
    <div class="container">
        <h6 class="small-title">Новинки</h6>
        <h2 class="block-title">Попробуйте наши новинки</h2>
        <div class="discount-grid-container">
            <?  for ($i = 0; $i < 4; $i++) {?>

            <div class="item-card">
                <span class="item-new">Новинка</span>
                <button class="item-fav__btn">
                    <svg class="header-nav-svg" width="32" height="32" viewBox="0 0 27 22">
                        <use xlink:href="/public/img/svg/heart.svg#heart-menu-icon" fill="currentColor" />
                    </svg>
                </button>
                <div class="item-card__img">
                    <a href="/itemcard"> <img src="/public/img/items/1.jpg" alt=""></a>
                </div>
                <a href="/itemcard" class="item-card__title">
                    Сыр мягкий
                    «Егорлык Молоко»
                    Шевр в масле
                </a>

                <div class="price-wrapper">
                    <div class="price-container new-price__container">

                        <span>
                            149,95 руб
                        </span>
                    </div>
                    <button class="item-card__btn">
                        <svg class="header-nav-svg" width="32" height="32" viewBox="0 0 33 23">
                            <use xlink:href="/public/img/svg/busket.svg#busket-menu-icon" fill="currentColor" />
                        </svg>
                    </button>
                </div>
            </div>
            <?} ?>
        </div>
        <button class="upload-more__btn black-btn">
            Загрузить еще
        </button>
    </div>
</section>