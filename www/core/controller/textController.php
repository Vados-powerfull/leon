<?
	/**
	* Обработчик главной страницы
	*/
	if(isset($path[1])) ErrorPage404();
	
	include 'core/model/lib.php';
	
	$page = mqo("SELECT * FROM pages WHERE sys_name = ?",[end($path)]);
	$metaTitle = $page['meta_title'];
	$metaDescription = $page['meta_desc'];
	$footerInfo = mqo("SELECT * FROM footer WHERE id = 1");
	$menu = mqs("SELECT * FROM menu WHERE on_moderate=0 AND position = 1 ORDER BY ordering");
	$mobmenu = mqs("SELECT * FROM menu WHERE position = 4 AND on_moderate=0 ORDER BY ordering ASC");
	$footmenu = mqs("SELECT * FROM menu WHERE position = 2 AND on_moderate=0 ORDER BY ordering ASC");

		
	$uslugi = mqs("SELECT * FROM uslugi WHERE on_moderate=0 ORDER BY ordering ASC");
	$uslugi_cats = mqs("SELECT * FROM uslugi_cats WHERE on_moderate=0 ORDER BY ordering ASC");

	$kontakty = mqo("SELECT * FROM contacts_settings WHERE id=1");

	include('core/view/head.php');

	include('core/view/template/header.php');

	include('core/view/text.php');

	include('core/view/template/footer.php');
	

	include('core/view/foot.php');