<?
	/**
	* Обработчик главной страницы
	*/
	if(isset($path[1])) ErrorPage404();
	
	include 'core/model/lib.php';
	
	$page = mqo("SELECT * FROM pages WHERE sys_name='".end($path)."'");
	$page_title = $page["page_title"];
	$footerInfo = mqo("SELECT * FROM footer WHERE id = 1");
	$menu = mqs("SELECT * FROM menu WHERE on_moderate=0  ORDER BY ordering");
	$kontakty = mqo("SELECT * FROM contacts_settings WHERE id=1");
	$faq = mqs("SELECT * FROM faq WHERE on_moderate=0  ORDER BY ordering");
	$razdel_info = mqs("SELECT * FROM catalog_razdel WHERE on_moderate=0  ORDER BY ordering");


	include('core/view/head.php');
	include('core/view/template/header.php');

	include('core/view/help.php');


	include('core/view/template/footer.php');
	include('core/view/foot.php');
