<div class="container recipe-item-container">
    <div class="mt-5">
        <? include('core/view/template/crumbs.php');?>
    </div>
    
    
    <?$recipe = mqo("SELECT * FROM recipes WHERE sys_name='".end($path)."'");?>
    <h1 class="page-title">
        <?=$recipe["page_title"]?>
    </h1>
    <div class="recipe_img_card">
        <img src="<?=$recipe["page_foto"]?>" alt="">
    </div>
    <div class="recipe_text_card">
        <?=$recipe["page_text"]?>
    </div>
   
</div>