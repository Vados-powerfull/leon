<section class="section catalog-section  discount-section round-section">
    <div class="container">
        <h6 class="small-title">Каталог</h6>
        <h2 class="block-title">Наши продукты</h2>
        <div class="products-grid-container">
            <?  for ($i = 0; $i < 8; $i++) {?>

            <a href="/category" class="product-card">
                <img class="product-image" src="/public/img/products/1.jpg" alt="">
                <div class="product-cover">
                    <h3 class="text-overlay">Овощи,
                        фрукты</h3>

                </div>
                <div  class="link-arrow">
                    <img src="/public/img/svg/black-arrow.svg" alt="">
                </div>
            </a>
            <a href="/category" class="product-card">
                <img class="product-image" src="/public/img/products/2.jpg" alt="">
                <div class="product-cover">
                    <h3 class="text-overlay">
                        Крепкий
                        алкоголь, пиво</h3>

                </div>
                <div class="link-arrow">
                    <img src="/public/img/svg/black-arrow.svg" alt="">
                </div>
            </a>
            <?} ?>
        </div>

    </div>

                    <? 	include('core/view/index/newsletter.php'); ?>
</section>