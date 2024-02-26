<header>
    <div class="top_mmenu">
        <div class="phone-navigation">

            <div class="container header-contacts__container ">
                <!-- <button class="header-phone-navigation__btn">

                    <svg viewBox="0 0 22 14" width="22">
                        <use xlink:href="/public/img/svg/catalog-menu-icon.svg#catalog-menu-icon" fill="currentColor" />
                    </svg>
                </button>
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
                <a href="tel:<?=atel($kontakty["phone1"])?>" class="nav-phone">
                    <img src="public/img/svg/phone.svg" alt="">
                    <p>123</p>
                </a> -->

                <a href="/index.php" class="nav-main-logo main-logo"><img src="/public/img/logo-top.png" alt=""></a>

                <li>
                    <a href="/lc">
                        <svg class="header-nav-svg" width="28" height="28" viewBox="0 0 19 25">
                            <use xlink:href="/public/img/svg/avatar.svg#avatar-menu-icon" fill="currentColor" />
                        </svg>
                    </a>
                </li>
                <li>
                    <a href="/favorites">
                        <svg class="header-nav-svg" width="28" height="28" viewBox="0 0 27 22">
                            <use xlink:href="/public/img/svg/heart.svg#heart-menu-icon" fill="currentColor" />
                        </svg>
                    </a>
                </li>
                <li>
                    <a href="/busket" class="header-relative__icon">
                        <svg class="header-nav-svg" width="28" height="28" viewBox="0 0 33 23">
                            <use xlink:href="/public/img/svg/busket.svg#busket-menu-icon" fill="currentColor" />
                        </svg>
                        <div class="header-relative__count">
                            4
                        </div>
                    </a>
                </li>
                <li>
                    <a href="tel:<?=atel($kontakty["phone1"])?>" class="header-relative__icon">
                        <img src="public/img/svg/phone.svg" alt="">
                        <!-- <svg class="header-nav-svg" width="32" height="32" viewBox="0 0 33 23">
                            <use xlink:href="/public/img/svg/phone.svg" fill="currentColor" />
                        </svg> -->
                    </a>
                </li>


               
            </div>
            <div class="phone-search container">
                <div class="phone-round-catalog">
                    <svg class="header-nav-svg catalog-default__icon" width="21" height="13" viewBox="0 0 21 13">
                        <use xlink:href="/public/img/svg/catalog.svg#catalog-menu-icon" fill="currentColor" />
                    </svg>
                </div>
                <form class="search-form">
                    <input type="text" name="search" class="header-search__input" placeholder="Поиск">
                    <button type="submit" class="search-icon"><img src="/public/img/svg/search.svg" alt=""></button>
                </form>
            </div>


        </div>
        <div class="contacts">
            <div class="container header-contacts__container ">
                <ul class="header-list">
                <?
                // print_r($menu);
                foreach ( $menu as $item ) {
                
                    ?> <li>
                        <a href="<?=$item['url']?>"><?=$item['name']?></a>
                    </li> <?
                } ?>

                </ul>

                <a class="header-phone__container" href="tel:<?=atel($kontakty["phone2"])?>">
                    <p><?=$kontakty["phone2"]?></p> <img src="/public/img/svg/phone.svg" alt="">
                </a>
            </div>

        </div>
        <div class="nav-section container">
            <!-- <img src="" alt=""> -->
            <a href="/index.php" class="nav-main-logo main-logo"><img src="/public/img/logo-top.png" alt=""></a>


            <div class="navbar-link<?=$act?> navbar-link__dropdown" id="navbar-link">
                <div class="top-navbar-link">
                    <svg class="header-nav-svg catalog-default__icon" width="21" height="13" viewBox="0 0 21 13">
                        <use xlink:href="/public/img/svg/catalog.svg#catalog-menu-icon" fill="currentColor" />
                    </svg>
                    <svg class="header-nav-svg catalog-active__icon" width="21" height="17" viewBox="0 0 17 17">
                        <use xlink:href="/public/img/svg/xmark.svg#xmark-icon" fill="currentColor" />
                    </svg>
                    <span>КАТАЛОГ</span>
                </div>

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
<div class="modal-menu__wrapper ">
    <div class="modal-menu">
        <div class="modal-menu-header">
            <div class="modal-menu-close-btn">
                <img src="/public/img/svg/mobile-close.svg" />
            </div>
            <div class="modal-menu-title">МЕНЮ</div>
            <div class="modal-menu-phone">
                <div class="modal-menu-phone-number">

                    <a href="tel:<?=atel($kontakty["phone1"])?>"><?=$kontakty["phone1"]?></a>
                    <img src="/public/img/svg/phone.svg" alt="">
                </div>

            </div>
        </div>
        <div>

        </div>

        <div class="modal-menu-main-btns">
            <div class="modal-menu-main-btn catalog-mobile-btn">
                <svg class="header-nav-svg catalog-default__icon" width="21" height="13" viewBox="0 0 21 13">
                    <use xlink:href="/public/img/svg/catalog.svg#catalog-menu-icon" fill="currentColor" />
                </svg>
                <a class="submenu-open">КАТАЛОГ</a>
                <img class="catalog-mobile-arrow" src="/public/img/svg/catalog-arrow.svg" alt="">
            </div>


           <? foreach ( $menu as $item ) {
               ?>   <div class="modal-menu-main-btn modal-menu-item">
                  <a href="<?=$item['url']?>"><?=$item['name']?></a>
              </div> <?
               
            } ?>



        </div>

    </div>

    <div class="modal-sub-menu">
        <div class="modal-menu-header">
            <div class="submenu-title">
                <img class="submenu-back" src="/public/img/svg/mobile-back.svg" alt="">
                <div class="modal-menu-title">КАТАЛОГ</div>
               
                <img class="submenu-close close" src="/public/img/svg/mobile-close.svg" />
            </div>
        </div>
        <div>

        </div>

        <div class="modal-menu-main-btns">






            <div class="modal-menu-main-btn modal-submenu-item">
                <a href="#">Овощи, фрукты</a>
            </div>

            <div class="modal-menu-main-btn modal-submenu-item">
                <a href="#">Крепкий алкоголь, пиво</a>
            </div>
            <div class="modal-menu-main-btn modal-submenu-item">
                <a href="#">Крепкий алкоголь, пиво</a>
            </div>
            <div class="modal-menu-main-btn modal-submenu-item">
                <a href="#">Крепкий алкоголь, пиво</a>
            </div>
            <div class="modal-menu-main-btn modal-submenu-item">
                <a href="#">Крепкий алкоголь, пиво</a>
            </div>
            <div class="modal-menu-main-btn modal-submenu-item">
                <a href="#">Крепкий алкоголь, пиво</a>
            </div>
            <div class="modal-menu-main-btn modal-submenu-item">
                <a href="#">Крепкий алкоголь, пиво</a>
            </div>
            <div class="modal-menu-main-btn modal-submenu-item">
                <a href="#">Крепкий алкоголь, пиво</a>
            </div>
            <div class="modal-menu-main-btn modal-submenu-item">
                <a href="#">Крепкий алкоголь, пиво</a>
            </div>
        </div>
    </div>
</div>
    <?php include ('core/view/template/_popup.php');?>