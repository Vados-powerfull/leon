<?

	if(isset($path[2])) ErrorPage404();
	
	include 'core/model/lib.php';
	
	$page = mqo("SELECT * FROM pages WHERE sys_name='".end($path)."'");
	$page_title = $page["page_title"];
	
	$menu = mqs("SELECT * FROM menu WHERE on_moderate=0  ORDER BY ordering");
	$kontakty = mqo("SELECT * FROM contacts_settings WHERE id=1");
	$razdel_info = mqs("SELECT * FROM catalog_razdel WHERE on_moderate=0  ORDER BY ordering");
	$recipe = mqs("SELECT * FROM recipes  ORDER BY ordering");

	include('core/view/head.php');
	include('core/view/template/header.php');


	if (count($path) == 2) {
		$recipe_item = 'core/view/recipe/recipe-item.php';
		include($recipe_item);} else {
			include('core/view/recipe.php');
		}
	
	
	include('core/view/template/footer.php');
	include('core/view/foot.php');