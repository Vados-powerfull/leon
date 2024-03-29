<?
	/**
	* Обработчик главной страницы
	*/
	if(isset($path[1])) ErrorPage404();
	
	include 'core/model/lib.php';
	
	$page = mqo("SELECT * FROM pages WHERE sys_name = ?",[end($path)]);
	$metaTitle = $page['meta_title'];
	$metaDescription = $page['meta_desc'];
	$page_title = $page["page_title"];
	$footerInfo = mqo("SELECT * FROM footer WHERE id = 1");
	
	$mobmenu = mqs("SELECT * FROM menu WHERE position = 4 AND on_moderate=0 ORDER BY ordering ASC");
	$footmenu = mqs("SELECT * FROM menu WHERE position = 2 AND on_moderate=0 ORDER BY ordering ASC");

		
	$uslugi = mqs("SELECT * FROM uslugi WHERE on_moderate=0 ORDER BY ordering ASC");
	$uslugi_cats = mqs("SELECT * FROM uslugi_cats WHERE on_moderate=0 ORDER BY ordering ASC");

	$kontakty = mqo("SELECT * FROM contacts_settings WHERE id=1");
	$menu = mqs("SELECT * FROM menu WHERE on_moderate=0  ORDER BY ordering");
	
	$razdel_info = mqs("SELECT * FROM catalog_razdel WHERE on_moderate=0  ORDER BY ordering");
	$cat_info = mqs("SELECT * FROM catalog_cats WHERE on_moderate=0  ORDER BY ordering");
	$podcat_info = mqs("SELECT * FROM catalog_podcats WHERE on_moderate=0  ORDER BY ordering");
	$goods = mqs("SELECT * FROM catalog WHERE on_moderate=0  ORDER BY ordering");


	include('core/view/head.php');
	include('core/view/template/header.php');

	include('core/view/text.php');

	include('core/view/template/footer.php');
	include('core/view/foot.php');