<div class="container mt-5">
        <?include('core/view/template/crumbs.php');?>
        <h2 class="page-title mt-4 mb-5">
            Избранное
        </h2>
</div>

<div class="container fav-container busket-container">
    
    <?  foreach ($goods as $gitem) {
        

        include ('core/view/itemcard/item.php');


    } ?>
</div>