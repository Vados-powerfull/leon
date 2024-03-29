<footer>
    <div class="container footer-wrapper">
        <div class="footer-container container row">

            <div class="col-sm-2 col-12 footer-container__item footer-mobile footer-logo-leon">
                <a href="" class="">
                    <img src="/public/img/logo-top.png" alt="">

                </a>

            </div>


            <div class="col-sm-2 footer-container__item">

                <ul>
                    <li><a href="/catalog">Каталог</a></li>
                    <li><a href="<?=$menu[0]["url"]?>"><?=$menu[0]["name"]?></a></li>

                    <li><a href="<?=$menu[4]["url"]?>"><?=$menu[4]["name"]?></a></li>
                </ul>
            </div>
            <div class="col-sm-3 footer-container__item catalog-footer">

                <ul>
                    <li><a href="<?=$menu[1]["url"]?>"><?=$menu[1]["name"]?></a></li>
                    <li><a href="<?=$menu[2]["url"]?>"><?=$menu[2]["name"]?></a></li>

                   
                    <li><a href="/recipe">Рецепты</a></li>
                </ul>

            </div>
            <div class="col-sm-2 footer-container__item">
                <div class="footer-phone__container">
                    <p>Телефон:</p>
                    <span> <a href="tel:<?=atel($kontakty["phone1"])?>"><?=$kontakty["phone1"]?></a>
                    </span>
                    <p>E-mail:
                    </p>
                    <span> <a href="mailto:leone_bel@mail.ru"><?=$kontakty["email"]?></a></span>
                </div>

            </div>
            <div class="col-sm-3 footer-container__item footer-mobile__contacts footer-mobile col-12">


                <div class="footer-phone__container adress-container">
                    <p>Адрес:
                    </p>
                    <span><?=$kontakty["address"]?></span>
                </div>
                <div class="footer-svg__container ">
                    <a href="<?=$kontakty["vk_href"]?>">
                        <img src="/public/img/svg/vk.svg" alt="">

                    </a>
                    <a href="<?=$kontakty["yt_href"]?>">
                        <img src="/public/img/svg/youtube.svg" alt="">
                    </a>
                </div>
            </div>

        </div>




    </div>
    <div class="deep-footer">
        <div class="container ">
            <p class="thin-text"><?=$footerInfo['copyright']?></p>
            <p class="thin-text"><a href="politika">
                    Политика конфиденциальности
                </a></p>
        </div>
    </div>
    <!-- include ('components/mobile-footer.php'); ?> -->
</footer>
<!-- <div class="totop">&#9650;</div> -->