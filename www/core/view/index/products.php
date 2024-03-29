<section class="section catalog-section  discount-section round-section">
    <div class="container">
        <h2 class="block-title">Наши продукты</h2>
        <div class="products-grid-container">
            <?  foreach ($razdel_info as $item) {?>

                <a href="/category/<?=$item["sys_name"]?>" class="product-card">
                    <img class="product-image" src="<?=$item["img"]?>" alt="">
                    <div class="product-cover">
                        <h3 class="text-overlay"><?=$item["name"]?></h3>

                    </div>
                    <div  class="link-arrow">
                        <img src="/public/img/svg/black-arrow.svg" alt="">
                    </div>
                </a>

            <?} ?>
        </div>
    </div>

                <div class="mt-5">
                    <? 	include('core/view/index/newsletter.php'); ?>
                </div>
                
</section>