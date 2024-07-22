
    <div class="container">
        <div class="mt-5 crumbs-m">
            <? include('core/view/template/crumbs.php');?>
        </div>
        <h2 class="page-title">
            <?=$page["page_title"]?>
        </h2>
        <div class="recipe-big-container container">
            <?  foreach ($recipe as $item) {?>

                <div class="recipe-big-card">
                    <a href="/recipe/<?=$item["sys_name"]?>"> <img src="<?=$item["page_foto"]?>" alt=""></a>
                    <h3><?=$item["page_title"]?></h3>
                    <div class="recipe_text"><?=$item["page_text"]?></div>
                    <a href="/recipe/<?=$item["sys_name"]?>" class="recipe-btn prime-black-btn">Подробнее</a>
                </div>


            <?} ?>
        </div>
    </div>
