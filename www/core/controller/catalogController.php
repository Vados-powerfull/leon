<?
	/**
	* Обработчик главной страницы
	*/
	if(isset($path[1])) ErrorPage404();
	
	include 'core/model/lib.php';
	
	$footerInfo = mqo("SELECT * FROM footer WHERE id = 1");
	$menu = mqs("SELECT * FROM menu WHERE on_moderate=0  ORDER BY ordering");
	$kontakty = mqo("SELECT * FROM contacts_settings WHERE id=1");
	
	include('core/view/head.php');

	include('core/view/template/header.php');

    include('core/view/catalog.php');


	
	
	include('core/view/template/footer.php');


	include('core/view/foot.php');