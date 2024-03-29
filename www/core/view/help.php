<div class="container">
    <div class="path mt-5">
        <? include ("core/view/template/crumbs.php"); ?>
    </div>
    <p class="help-title"><?=$page["page_title"]?></p>
    <div class="questions">
    <? foreach ($faq as $item) {?>
            <div class="question ">
                <div class="quesion-body">
                    <div class="question-title-wrapper">

                        <h3 class="question-title "><?=$item["question"]?></h3>
                        <button class="dropdown "></button>

                    </div>
                    <p class="question-text"><?=$item["answer"]?></p>
                </div>
            </div>
            <? } ?>                
            
       
    </div>
</div>