<?
	
	if(isset($path[3])) ErrorPage404();
	
	include 'core/model/lib.php';
	
	
	$menu = mqs("SELECT * FROM menu WHERE on_moderate=0  ORDER BY ordering");
	$kontakty = mqo("SELECT * FROM contacts_settings WHERE id=1");
	$razdel_info = mqs("SELECT * FROM catalog_razdel WHERE on_moderate=0  ORDER BY ordering");
	
	include('core/view/head.php');
	include('core/view/template/header.php');

   

    include('core/view/item-card/crumbs.php');
    include('core/view/item-card/item-card-alco.php');
    

	include('core/view/template/footer.php');
	include('core/view/foot.php');