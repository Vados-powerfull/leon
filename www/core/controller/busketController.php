<?

	if(isset($path[1])) ErrorPage404();
	
	include 'core/model/lib.php';
	
	$page = mqo("SELECT * FROM pages WHERE sys_name='".end($path)."'");
	$page_title = $page["page_title"];
	$footerInfo = mqo("SELECT * FROM footer WHERE id = 1");
	$menu = mqs("SELECT * FROM menu WHERE on_moderate=0  ORDER BY ordering");
	$kontakty = mqo("SELECT * FROM contacts_settings WHERE id=1");


	$razdel_info = mqs("SELECT * FROM catalog_razdel WHERE on_moderate=0 ORDER BY ordering");
	$cat_info = mqs("SELECT * FROM catalog_cats WHERE on_moderate=0 ORDER BY ordering");
	$podcat_info = mqs("SELECT * FROM catalog_podcats WHERE on_moderate=0 ORDER BY ordering");

	include('core/view/head.php');
	include('core/view/template/header.php');

	$goods = mqs("SELECT * FROM catalog WHERE FIND_IN_SET (id, '".$_COOKIE['cart']."')");
    include('core/view/busket/busket.php');


	include('core/view/template/footer.php');
	include('core/view/foot.php');