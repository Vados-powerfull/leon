<header>





    <div class="top_mmenu">
        <div class="phone-navigation">

            <div class="container header-contacts__container ">
                <button class="header-phone-navigation__btn">

                    <svg viewBox="0 0 22 14" width="22">
                        <use xlink:href="/public/img/svg/catalog-menu-icon.svg#catalog-menu-icon" fill="currentColor" />
                    </svg>
                </button>

                <a href="tel:<?=atel($kontakty["phone1"])?>" class="nav-phone">
                    <img src="public/img/svg/phone.svg" alt="">
                    <p><?=$kontakty["phone1"]?></p>
                </a>


                <a href="<?=$kontakty["tg_href"]?>" id="tg">
                    <svg class="header-nav-svg" width="32" height="32" viewBox="0 0 32 32">
                        <use xlink:href="/public/img/svg/media-svg/tg.svg#tg-svg" fill="currentColor" />
                    </svg>
                </a>


                <a href="https://wa.me/<?=atel($kontakty["phone1"])?>" id="whatsapp">
                    <svg class="header-nav-svg" width="32" height="32" viewBox="0 0 32 32">
                        <use xlink:href="/public/img/svg/media-svg/whatsapp.svg#whatsapp-svg" fill="currentColor" />
                    </svg>
                </a>

            </div>



        </div>
        <div class="contacts">
            <div class="container header-contacts__container ">
                <ul class="header-list">
                    <li>
                        <a href="#">О компании</a>

                    </li>
                    <li>
                        <a href="/delivery">Доставка и оплата</a>

                    </li>
                    <li>
                        <a href="/help">Помощь при покупке</a>

                    </li>
                    <li>
                        <a href="/recipe">Рецепты</a>

                    </li>
                    <li>
                        <a href="/contacts">Контакты</a>

                    </li>
                </ul>

                <a class="header-phone__container" href="tel:89103261956">
                    <p>8 (910) 326-19-56</p> <img src="/public/img/svg/phone.svg" alt="">
                </a>
            </div>

        </div>
        <div class="nav-section container">
            <!-- <img src="" alt=""> -->
            <a href="/index.php" class="nav-main-logo main-logo"><img src="/public/img/logo-top.png" alt=""></a>


            <div class="navbar-link<?=$act?> navbar-link__dropdown" id="navbar-link">
                <div class="top-navbar-link" >
                    <svg class="header-nav-svg catalog-default__icon" width="21" height="13" viewBox="0 0 21 13">
                        <use xlink:href="/public/img/svg/catalog.svg#catalog-menu-icon" fill="currentColor" />
                    </svg>
                    <svg class="header-nav-svg catalog-active__icon" width="21" height="17" viewBox="0 0 17 17">
                        <use xlink:href="/public/img/svg/xmark.svg#xmark-icon" fill="currentColor" />
                    </svg>
                    <span>КАТАЛОГ</span></div>

                <div class="navbar-dropdown">
                    <div class="dropdown-wrapper dropdown-wrapper__left">

                        <div class="dropdown-container"><a href="#" class="">Овощи, фрукты</a></div>
                        <div class="dropdown-container"><a href="#" class="">Крепкий алкоголь, пиво</a></div>
                        <div class="dropdown-container"><a href="#" class="">Вода, соки, напитки</a></div>
                        <div class="dropdown-container"><a href="#" class="">Молоко, яйца</a></div>
                        <div class="dropdown-container"><a href="#" class="">Сладости</a></div>
                        <div class="dropdown-container"><a href="#" class="">Колбасы, сосиски, нарезки</a></div>
                        <div class="dropdown-container"><a href="#" class="">Сыры</a></div>
                        <div class="dropdown-container"><a href="#" class="">Хлеб и выпечка</a></div>
                        <div class="dropdown-container"><a href="#" class="">Рыба и морепродукты </a></div>
                        <div class="dropdown-container"><a href="#" class="">Мясо и птица</a></div>
                        <div class="dropdown-container"><a href="#" class="">Чипсы, снеки</a></div>
                        <div class="dropdown-container"><a href="#" class="">Консервы, соленья</a></div>
                        <div class="dropdown-container"><a href="#" class="">Чай, кофе</a></div>
                        <div class="dropdown-container"><a href="#" class="">Соусы, приправы, специи</a></div>
                        <div class="dropdown-container"><a href="#" class="">Бытовая химия</a></div>
                    </div>

                </div>

            </div>

            <form class="search-form">
                <input type="text" name="search" class="header-search__input" placeholder="Поиск">
                <button type="submit" class="search-icon"><img src="/public/img/svg/search.svg" alt=""></button>
            </form>

            <ul class="nav-media-list">
                <li>
                    <a href="/lc">
                        <svg class="header-nav-svg" width="32" height="32" viewBox="0 0 19 25">
                            <use xlink:href="/public/img/svg/avatar.svg#avatar-menu-icon" fill="currentColor" />
                        </svg>
                    </a>
                </li>
                <li>
                    <a href="/favorites">
                        <svg class="header-nav-svg" width="32" height="32" viewBox="0 0 27 22">
                            <use xlink:href="/public/img/svg/heart.svg#heart-menu-icon" fill="currentColor" />
                        </svg>
                    </a>
                </li>
                <li>
                    <a href="/busket" class="header-relative__icon">
                        <svg class="header-nav-svg" width="32" height="32" viewBox="0 0 33 23">
                            <use xlink:href="/public/img/svg/busket.svg#busket-menu-icon" fill="currentColor" />
                        </svg>
                        <div class="header-relative__count">
                            4
                        </div>
                    </a>
                </li>

            </ul>
        </div>
        <div class="nav-media-container">

        </div>

    </div>







</header>
<!-- <div class="modal-menu__wrapper ">
    <div class="modal-menu">
        <div class="modal-menu-header">
            <div class="modal-menu-close-btn">
                <img src="/public/img/svg/close-symbol.svg" />
            </div>
            <div class="modal-menu-title">МЕНЮ</div>
            <div class="modal-menu-phone">
                <div class="modal-menu-phone-number">
                    <img src="/public/img/svg/phone.svg" alt="">
                    <a href="tel:<?=atel($kontakty["phone1"])?>"><?=$kontakty["phone1"]?></a>
                </div>
                <div class="modal-menu-phone-btn">Жду звонка</div>
            </div>
        </div>
        <div>

        </div>
        <hr />
        <div class="modal-menu-main-btns">
            <div class="modal-menu-main-btn">
                <a href="/index.php">Главная</a>
            </div>
            <hr />

            <div class="modal-menu-main-btn">
                <div class="collapsible"><a href="#">О компании</a>
                    <div class="content">
                        <a href="">Вакансии</a> <br>
                        <a href="">Акции</a>
                    </div> <img class="dropdown-image" src="/public/img/svg/open.svg" alt="">
                </div>
            </div>
            <hr />
            <div class="modal-menu-main-btn">
                <div class="collapsible"><a href="item">Услуги </a>
                    <div class="content">
                        <div class="navbar-dropdown">
                            <div class="dropdown-wrapper dropdown-wrapper__left">
                                <div class="dropdown-container">
                                    <a href="/uslugi/udalenie-derevev">Удаление деревьев</a>
                                    <ul class="header-list">
                                        <li><a href="/uslugi/spil-derevev">Спил деревьев</a></li>
                                        <li><a href="/uslugi/valka-derevev">Валка деревьев</a></li>
                                        <li><a href="/uslugi/vyrubka-derevev">Вырубка деревьев</a></li>
                                    </ul>
                                </div>
                                <div class="dropdown-container">
                                    <a href="/uslugi/kronirovanie-derevev"> Кронирование деревьев</a>
                                </div>
                                <div class="dropdown-container">
                                    <a href="/uslugi/udalenie-pney"> Удаление пней </a>
                                    <ul class="header-list">
                                        <li><a href="/uslugi/korchevanie-korchevka-pney">Корчевание (корчевка) пней</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="dropdown-wrapper dropdown-wrapper__right">
                                <div class="dropdown-container"><a href="/uslugi/raschistka-uchastka">Расчистка
                                        участка</a></div>
                                <div class="dropdown-container"><a href="/uslugi/obrabokta-ot-koroeda">Обработка от
                                        короеда</a></div>
                                <div class="dropdown-container"><a href="/uslugi/vyvoz-musora">Вывоз мусора</a></div>
                                <div class="dropdown-container"><a href="/uslugi/vyrubka-kustarnikov">Вырубка
                                        кустарников</a></div>
                                <div class="dropdown-container"><a href="/uslugi/lechenie-derevev">Лечение деревьев</a>
                                </div>
                                <div class="dropdown-container"><a href="/uslugi/ukreplenie-derevev">Укрепление
                                        деревьев</a></div>

                            </div>
                        </div>
                    </div>
                    <img class="dropdown-image" src="/public/img/svg/open.svg" alt="">
                </div>
            </div>
            <hr />
            <div class="modal-menu-main-btn">
                <a href="#">Цены</a>
            </div>
            <hr />
            <div class="modal-menu-main-btn">
                <a href="#">Наши работы</a>
            </div>
            <hr />
            <div class="modal-menu-main-btn">
                <a href="#">Отзывы</a>
            </div>
            <hr />
            <div class="modal-menu-main-btn">
                <a href="#">Блог</a>
            </div>
            <hr />
            <div class="modal-menu-main-btn">
                <a href="#">Контакты</a>
            </div>
            <hr />
        </div>
        <div class="modal-menu-footer">
            <div class="modal-menu-footer-contact">
                <ul class="nav-media-list">
                    <li>
                        <a href="<?=$kontakty["tg_href"]?>" id="tg">
                            <svg class="header-nav-svg" width="32" height="32" viewBox="0 0 32 32">
                                <use xlink:href="/public/img/svg/media-svg/tg.svg#tg-svg" fill="currentColor" />
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="https://wa.me/<?=atel($kontakty["phone1"])?>" id="whatsapp">
                            <svg class="header-nav-svg" width="32" height="32" viewBox="0 0 32 32">
                                <use xlink:href="/public/img/svg/media-svg/whatsapp.svg#whatsapp-svg"
                                    fill="currentColor" />
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="<?=$kontakty["vk_href"]?>" id="vk">
                            <svg class="header-nav-svg" width="32" height="32" viewBox="0 0 32 32">
                                <use xlink:href="/public/img/svg/media-svg/vk.svg#vk-svg" fill="currentColor" />
                            </svg>
                        </a>
                    </li>

                </ul>
            </div>
            <div class="modal-menu-footer-info">
                <div class="modal-menu-footer-location">
                    <img class="modal-menu-footer-location-svg" src="/public/img\svg\mobile-svg\pin1.svg" alt="" />
                    <div class="modal-menu-footer-location-content">
                        <?=$kontakty["adres"]?>
                    </div>
                </div>
                <div class="modal-menu-footer-time">
                    <img width="18" class="modal-menu-footer-time-svg" src="/public/img\svg\mobile-svg\time.svg"
                        alt="" />
                    <div class="modal-menu-footer-time-content">
                        <span class="modal-menu-footer-time-span"><?=$kontakty["rezhim"]?>

                    </div>
                </div>
                <div class="modal-menu-footer-mail">
                    <img width="25" class="modal-menu-footer-mail-svg" src="/public/img\svg\mobile-svg\mail.svg"
                        alt="" />
                    <a href="mailto:<?=$kontakty["email"]?>"
                        class="modal-menu-footer-time-content"><?=$kontakty["email"]?></a>
                </div>
            </div>
        </div>
    </div>
</div> -->

<?php include ('core/view/template/_popup.php');?>