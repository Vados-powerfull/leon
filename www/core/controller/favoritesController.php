<?

	if(isset($path[1])) ErrorPage404();
	
	include 'core/model/lib.php';
	
	$footerInfo = mqo("SELECT * FROM footer WHERE id = 1");
	$menu = mqs("SELECT * FROM menu WHERE on_moderate=0  ORDER BY ordering");
	$razdel_info = mqs("SELECT * FROM catalog_razdel WHERE on_moderate=0  ORDER BY ordering");
	$kontakty = mqo("SELECT * FROM contacts_settings WHERE id=1");
	$page = mqo("SELECT * FROM pages WHERE sys_name='".end($path)."'");

	include('core/view/head.php');
	include('core/view/template/header.php');

    
	$goods = mqs("SELECT * FROM catalog WHERE on_moderate=0  ORDER BY ordering"); // WHERE FIND_IN_SET (id, '".$_COOKIE['favorites']."')
	
    include('core/view/favorites.php');


    
	include('core/view/template/footer.php');
	include('core/view/foot.php');