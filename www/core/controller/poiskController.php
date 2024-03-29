<?

	if(isset($path[1])) ErrorPage404();
	
	include 'core/model/lib.php';
	
	$page = mqo("SELECT * FROM pages WHERE sys_name = '".end($path)."'");
	$page_title = $page['page_title'];
	$metaTitle = $page['meta_title'];
	$metaDescription = $page['meta_desc'];
	
	$mainmenu = mqs("SELECT * FROM menu WHERE position = 5 AND on_moderate=0 ORDER BY ordering ASC");
	$aboutmenu = mqs("SELECT * FROM menu WHERE position = 6 AND on_moderate=0 ORDER BY ordering ASC");
	$mobmenu = mqs("SELECT * FROM menu WHERE position = 4 AND on_moderate=0 ORDER BY ordering ASC");
	$catalog_cats = mqs("SELECT * FROM catalog_cats WHERE on_moderate=0 ORDER BY ordering");
	$cats = mqs("SELECT * FROM catalog_cats WHERE on_moderate=0 ORDER BY ordering ASC");
	$kontakty = mqo("SELECT * FROM contacts_settings WHERE id=1");
	$inside = 1;
	
	include('core/view/template/head.php');
	include('core/view/template/header.php');

	$goods = mqs("SELECT * FROM catalog WHERE name LIKE '%".$_GET['query']."%' OR art LIKE '%".$_GET['query']."%'");
    include('core/view/poisk.php');

	include('core/view/template/footer.php');
	include('core/view/template/foot.php');