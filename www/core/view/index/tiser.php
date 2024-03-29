<section class="section tiser-section">
    <div class="container">
        <div class="main-grid-container">
        <? $banner1 = mqo("SELECT * FROM banners WHERE position = 1");
           $banner2 = mqo("SELECT * FROM banners WHERE position = 2");
           $banner3 = mqo("SELECT * FROM banners WHERE position = 3")
        ?>
<!-- первый -->
            <a href="<?=$banner1["btn_href"]?>" class="tiser-card__wrapper"  >
                <div class="big-tiser__card tiser-card" style="background-image: url('<?=$banner1["img"]?>');">
                    <div class="tiser-card__container">
                        <p><?=$banner1["descr"]?></p>
                        <h3><?=$banner1["name"]?></h3>
                        <div class="link-arrow">
                            <img src="/public/img/svg/arrow.svg" alt="">
                        </div>
                    </div>
                </div>
            </a>
<!-- второй -->
            <a href="<?=$banner2["btn_href"]?>" class="tiser-card__wrapper tiser-card color-tiser__card"
                style="background-image: url('<?=$banner2["img"]?>');">
                <div class="tiser-card__container">
                    <div class="color-card__container">
                        <p>
                            <?=$banner2["descr"]?>
                        </p>
                        <h4>
                            <?=$banner2["name"]?>
                        </h4>
                        <div href="#" class="link-arrow">

                            <img src="/public/img/svg/black-arrow.svg" alt="">
                        </div>
                    </div>
                </div>
            </a>
<!-- третий -->
            <a href="<?=$banner3["btn_href"]?>" class="tiser-card__wrapper">
                <div class="last-tiser__card tiser-card" style="background-image: url('<?=$banner3["img"]?>');">
                    <div class="tiser-card__container">
                        <p><?=$banner3["descr"]?></p>
                        <h4><?=$banner3["name"]?></h4>
                        <div class="link-arrow">
                            <img src="/public/img/svg/arrow.svg" alt="">
                        </div>
                    </div>
                </div>
            </a>
            
        </div>
    </div>
</section>