<section class="map-section">
    <div class="container map-section__container">
        <div class="row">
            <div class="col-12 col-sm-3">
                <h2 class="section-title">
                    Как нас
                    найти
                </h2>
            </div>
            <div class="col-6 col-sm-3">
                <div class="map-item">

                    <h3><img src="/public/img/svg/map-svg/location.svg" alt="">Наш адрес:</h3>
                    <p><?=$kontakty["adres2"]?></p>
                </div>
            </div>
            <div class="col-6 col-sm-3">
                <div class="map-item">

                    <h3><img src="/public/img/svg/map-svg/phone.svg" alt="">Телефоны: </h3>
                    <p><a href="tel:<?=atel($kontakty["phone1"])?>"><?=$kontakty["phone1"]?></a> <br> <a href="tel:<?=atel($kontakty["phone2"])?>"><?=$kontakty["phone2"]?></a></p>
                </div>
            </div>
            <div class="col-6 col-sm-3 ">
                <div class="map-item col-6">

                    <h3><img src="/public/img/svg/map-svg/email.svg" alt="">Почта:

                    </h3>
                    <a href="mailto:<?=$kontakty["email"]?>"><?=$kontakty["email"]?></a>
                </div>
                <div class="map-item col-6 last-map__item">

                    <h3><img src="/public/img/svg/map-svg/time.svg" alt="">Режим работы:

                    </h3>
                    <p><?=$kontakty["rezhim"]?></p>
                </div>
            </div>
            <div class="d-block col-6 d-sm-none map-item">
                <h3><img src="/public/img/svg/map-svg/time.svg" alt="">Режим работы:

                </h3>
                <p><?=$kontakty["rezhim"]?></p>
            </div>
        </div>
    </div>
    <div class="map-wrapper">
    <?=$kontakty["mapcode"]?>
    </div>
</section>