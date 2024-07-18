<?
	
	if(isset($path[3])) ErrorPage404();
	
	include 'core/model/lib.php';
	
	
	$menu = mqs("SELECT * FROM menu WHERE on_moderate=0  ORDER BY ordering");
	$kontakty = mqo("SELECT * FROM contacts_settings WHERE id=1");

	$razdel_info = mqs("SELECT * FROM catalog_razdel WHERE on_moderate=0 ORDER BY ordering");
	$cat_info = mqs("SELECT * FROM catalog_cats WHERE on_moderate=0 ORDER BY ordering");
	$podcat_info = mqs("SELECT * FROM catalog_podcats WHERE on_moderate=0 ORDER BY ordering");
	$goods = mqs("SELECT * FROM catalog WHERE on_moderate=0 ORDER BY ordering");

	
	$pop = mqs("SELECT * FROM catalog WHERE pop = 1 ORDER BY ordering LIMIT 4");
	
	include('core/view/head.php');
	include('core/view/template/header.php');

   
    include('core/view/itemcard/item-card.php');
    

	include('core/view/template/footer.php');
	include('core/view/foot.php');