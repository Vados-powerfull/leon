<section class="feedback-section" id="feedback-section">
    <div class="container">
        <h2 class="section-title">
            Выполняем работу на отлично
        </h2>
        <div class="row ">
            <div class="col-12 col-sm-7">
                <img class="feedback-img-banner" src="/<?=$feedback["img"]?>" alt="">
                <a href="<?=$feedback["href"]?>" target="blank" class="main-btn feedback-btn avito-link">Посмотреть
                    отзывы на Avito</a>
            </div>
            <div class="col-12 col-sm-5">
                <form class="feedback-form">
                    <h3>Заявка
                        на бесплатную
                        консультацию</h3>
                    <label for="form-tex">Какие работы нужно выполнить</label>
                    <input id="form-text" placeholder="Кратко опишите задачу" type="text">
                    <label for="form-tel">Ваш номер телефона</label>
                    <input id="form-tel" placeholder="+7" type="tel">
                    <button class="cta-btn">
                        отправить
                    </button>
                    <div class="check">
                        <input type="checkbox">
                        <label class="сheck-container">
                            <input type="checkbox" checked="false">
                            <img src="/public/img/svg/check.svg" alt="">
                        </label>
                        <p class="check-text">
                            Стоимость прописана в смете
                            и не меняется в процессе
                        </p>
                    </div>
                </form>
            </div>
        </div>
        <div class="row feedback-videos__container flex-nowrap overflow-auto">
        <div class="col-11 col-sm-6 feedback-video-wrapper">
                <div class="feedback-video">
                    <iframe  src="<?=$feedback["video1"]?>"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen></iframe>
                </div>
            </div>
            <div class="col-11 col-sm-6 feedback-video-wrapper">
                <div class="feedback-video">
                    <iframe  src="<?=$feedback["video2"]?>"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
</section>