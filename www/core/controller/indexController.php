<?
	/**
	* Обработчик главной страницы
	*/
	if(isset($path[5])) ErrorPage404();
	
	include 'core/model/lib.php';
	
	
	$menu = mqs("SELECT * FROM menu WHERE on_moderate=0  ORDER BY ordering");
	$kontakty = mqo("SELECT * FROM contacts_settings WHERE id=1");
	
	$razdel_info = mqs("SELECT * FROM catalog_razdel WHERE on_moderate=0  ORDER BY ordering");
	$cat_info = mqs("SELECT * FROM catalog_cats WHERE on_moderate=0  ORDER BY ordering");
	$podcat_info = mqs("SELECT * FROM catalog_podcats WHERE on_moderate=0  ORDER BY ordering");
	$goods = mqs("SELECT * FROM catalog WHERE on_moderate=0  ORDER BY ordering");

	
	$page = mqo("SELECT * FROM pages WHERE sys_name='".end($path)."'");
	$sell = mqs("SELECT * FROM catalog WHERE sell=1 ORDER BY ordering LIMIT 4");
	$new = mqs("SELECT * FROM catalog WHERE new=1 ORDER BY ordering LIMIT 4");
	
	
	

	include('core/view/head.php');
	include('core/view/template/header.php');
	


	include('core/view/index/tiser.php');
	include('core/view/index/discount.php');
	include('core/view/index/new-items.php');
	include('core/view/index/products.php');
	include('core/view/index/recipes.php');
	




	
	include('core/view/template/footer.php');

	include('core/view/foot.php');
