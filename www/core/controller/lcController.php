<?

	if(isset($path[1])) ErrorPage404();
	
	include 'core/model/lib.php';
	
	$page = mqo("SELECT * FROM pages WHERE sys_name='".end($path)."'");
	$page_title = $page["page_title"];
	$footerInfo = mqo("SELECT * FROM footer WHERE id = 1");
	$menu = mqs("SELECT * FROM menu WHERE on_moderate=0  ORDER BY ordering");
	$kontakty = mqo("SELECT * FROM contacts_settings WHERE id=1");

	$razdel_info = mqs("SELECT * FROM catalog_razdel WHERE on_moderate=0  ORDER BY ordering");
	$cat_info = mqs("SELECT * FROM catalog_cats WHERE on_moderate=0  ORDER BY ordering");
	$podcat_info = mqs("SELECT * FROM catalog_podcats WHERE on_moderate=0  ORDER BY ordering");
	$goods = mqs("SELECT * FROM catalog WHERE on_moderate=0  ORDER BY ordering");

	
	
	$sell = mqs("SELECT * FROM catalog WHERE sell=1 ORDER BY ordering LIMIT 4");
	$new = mqs("SELECT * FROM catalog WHERE new=1 ORDER BY ordering LIMIT 4");
	
	include('core/view/head.php');
	include('core/view/template/header.php');


    include('core/view/lc/lc.php');


    
	include('core/view/template/footer.php');
	include('core/view/foot.php');