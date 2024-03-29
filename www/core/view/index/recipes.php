<section class="section recipe-section  discount-section round-section">
    <div class="container">
    <? $recipe = mqs("SELECT * FROM recipes ORDER BY RAND() LIMIT 1"); ?>
        <h6 class="small-title">Рецепты</h6>
        <h2 class="block-title">НОВЫЕ РЕЦЕПТЫ КАЖДУЮ НЕДЕЛЮ</h2>
        <div class="recipe-container row">

        <?foreach ($recipe as $item) {?>
           
 <!-- первый---------------------------------------------------------------------------------------- -->       
            <div class="col-12 col-sm-6 recipe-big-wrapper">
                <a href="/recipe/<?=$item["sys_name"]?>" class="card-container recipe-card">
                    <img class="card-image" src="<?=$item["page_foto"]?>" alt="Product Image">
                    <div class="card-text">
                        <h3><?=$item["page_title"]?></h3>

                    </div>
                    <div href="/recipe/<?=$item["sys_name"]?>" class="link-arrow">

                        <img src="/public/img/svg/arrow.svg" alt="">
                    </div>
                </a>
            </div>
        <? }?>

        
 <!-- второй---------------------------------------------------------------------------------------- -->
            <div class="col-12 col-sm-6 recipe-small-wrapper row">
            <? $recipe2 = mqs("SELECT * FROM recipes ORDER BY ordering LIMIT 2"); ?>
                <?foreach ($recipe2 as $ritem) {?>
                    <a href="/recipe/<?=$ritem["sys_name"]?>" class=" recipe-card">
                    <div class="ritem_img">
                        <img src="<?=$ritem["page_foto"]?>" alt="">
                    </div>
                        <div class="recipe-card__container">
                            <h4>
                                <?=$ritem["page_title"]?>
                            </h4>
                            <p>
                                <?=$ritem["page_text"]?>

                            </p>

                            <div href="/recipe/<?=$ritem["sys_name"]?>" class="link-arrow">

                                <img src="/public/img/svg/black-arrow.svg" alt="">
                            </div>

                        </div>
                    
                    </a>
                <? }?>
        
            </div>
           
        </div>
        <button class="upload-more__btn black-btn">
            <a href="/recipe" style="color: white; text-decoration: none">Смотреть все</a>
        </button>
    </div>


</section>