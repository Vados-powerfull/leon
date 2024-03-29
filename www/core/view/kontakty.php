<div class="container contacts-wrapper">
    <div class="row">
    <div class="mt-3">
        <? include ("core/view/template/crumbs.php"); ?>
    </div>
    <h2 class="page-title mb-5">
        Контакты
    </h2>
        <div class="col-12 col-sm-4">
            <p> Адрес: <br>
                <span><?=$kontakty["address2"]?></span>
            </p>
        </div>
        <div class="col-6 col-sm-2">
            <p>Телефоны <br>
                <a href="tel:<?=atel($kontakty["phone2"])?>" ><?=$kontakty["phone2"]?></a>
            </p>
        </div>
        <div class="col-6 col-sm-2">
            <p>График работы <br>
                <span><?=$kontakty["rezhim"]?></span>
            </p>
        </div>
        <div class="col-6 col-sm-2">
            <p>Эл. почта <br>
                <span><?=$kontakty["email"]?></span>
            </p>
        </div>
        <div class="col-6 col-sm-2">
            <p>Социальные сети <br></p>
            <a href="<?=$kontakty["vk_href"]?>">
                <img src="/public/img/svg/vk.svg" alt="">

            </a>
            <a href="youtube.com">
                <img src="/public/img/svg/youtube.svg" alt="">
            </a>
        </div>
    </div>
    
    <? 	include('core/view/index/newsletter.php'); ?>
</div>
<div class="map-container">
<iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3A181ac3f40fd6165420de8c20a884cd44bf59a600d8ffe4decea13d9d45f30e4e&amp;source=constructor" width="100%" height="403" frameborder="0"></iframe>
</div>