<div class="path mt-5 container">
    <? include ("core/view/template/crumbs.php"); ?>
    <h2 class="page-title">
        <?=$page_title?>
    </h2>
</div>

<div class="container">

    <div class="personal">

        <div class="personal-buttons">
            <? if (end($path) == 'lc') $active = ' personal-button-active'; else $active = ''; ?>
            <a href="/lc" class="personal-button my-info-button<?=$active?>">
                <span class="my-info-title">Мои данные</span>
            </a>

            <? if (end($path) == 'order-history') $active = ' personal-button-active'; else $active = ''; ?>
            <a href="/lc/order-history" class="personal-button order-history-button<?=$active?>">
                <span class="order-history-title">история заказов</span>
            </a>

            <? if (end($path) == 'newsletter') $active = ' personal-button-active'; else $active = ''; ?>
            <a href="/lc/newsletter" class="personal-button newsletter-button<?=$active?>">
                <span class="newsletter-title">Рассылка</span>
            </a>

            <a href="/lc/logout" class="exit-button"><span class="">Выход</span></a>
        </div>

    </div>

</div>