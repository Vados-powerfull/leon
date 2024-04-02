<?

	if(isset($path[4])) ErrorPage404();
	
	include 'core/model/lib.php';
	
	$footerInfo = mqo("SELECT * FROM footer WHERE id = 1");
	$menu = mqs("SELECT * FROM menu WHERE on_moderate=0  ORDER BY ordering");
	$kontakty = mqo("SELECT * FROM contacts_settings WHERE id=1");

	$razdel_info = mqs("SELECT * FROM catalog_razdel WHERE on_moderate=0  ORDER BY ordering");
	$mmpodcat_info = mqo("SELECT * FROM catalog_podcats WHERE sys_name='".end($path)."'");
	$cur_cat = mqo("SELECT * FROM catalog_cats WHERE id='".$mmpodcat_info["cat_id"]."'");
	$cur_razdel = mqo("SELECT * FROM catalog_razdel WHERE id='".$cur_cat["razdel_id"]."'");
	$cat_info = mqs("SELECT * FROM catalog_cats WHERE on_moderate=0 AND razdel_id='".$cur_razdel["id"]."' ORDER BY ordering");
	$podcat_info = mqs("SELECT * FROM catalog_podcats WHERE on_moderate=0  ORDER BY ordering");
	$goods = mqs("SELECT * FROM catalog WHERE on_moderate=0  ORDER BY ordering");

	$catalog_brands = mqs("SELECT * FROM catalog_brands WHERE on_moderate=0 ORDER BY ordering"); // БРЕНД 
	$catalog_country = mqs("SELECT * FROM catalog_country WHERE on_moderate=0 ORDER BY ordering"); // СТРАНЫ
	$catalog_type = mqs("SELECT * FROM catalog_type WHERE on_moderate=0 ORDER BY ordering"); // МЕТОД ОБРАБОТКИ 

	
	
	include('core/view/head.php');
	include('core/view/template/header.php');


    include('core/view/category/category.php');

	
	include('core/view/template/footer.php');
	include('core/view/foot.php');