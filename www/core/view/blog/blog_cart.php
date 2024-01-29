<div class="blog-container">

    <div class="container mt-5">
        <h1>Блог</h1>
        <div class="row">
            <?foreach ( $article as $item ) { ?>
            <div class="col-12 col-md-4">
                <div class="card">
                    <div class="card-body">
                        <a href="/blog/<?=$item["sys_name"]?>" class="card-body-img"><img src="<?=$item["page_foto"]?>" alt=""></a>
                        <h5 class="card-title"><?=$item["page_title"]?></h5>
                       <?=$item["page_text"]?>
                        <a href="/blog/<?=$item["sys_name"]?>" class="btn btn-primary">Перейти</a>
                    </div>
                </div>
            </div>
            <?} ?>


          
        </div>
    </div>
</div>