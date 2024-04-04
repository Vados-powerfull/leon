<?

	if(isset($path[2])) ErrorPage404();
	
	include 'core/model/lib.php';
	
	//$page = mqo("SELECT * FROM pages WHERE sys_name='".end($path)."'");
	$page_title = 'Личный кабинет';
	$footerInfo = mqo("SELECT * FROM footer WHERE id = 1");
	$menu = mqs("SELECT * FROM menu WHERE on_moderate=0  ORDER BY ordering");
	$kontakty = mqo("SELECT * FROM contacts_settings WHERE id=1");

	$razdel_info = mqs("SELECT * FROM catalog_razdel WHERE on_moderate=0  ORDER BY ordering");
	$cat_info = mqs("SELECT * FROM catalog_cats WHERE on_moderate=0  ORDER BY ordering");
	$podcat_info = mqs("SELECT * FROM catalog_podcats WHERE on_moderate=0  ORDER BY ordering");
	$goods = mqs("SELECT * FROM catalog WHERE on_moderate=0  ORDER BY ordering");

	
	
	$sell = mqs("SELECT * FROM catalog WHERE sell=1 ORDER BY ordering LIMIT 4");
	$new = mqs("SELECT * FROM catalog WHERE new=1 ORDER BY ordering LIMIT 4");

	if (end($path) == 'logout')
	{
		$_SESSION["user"] = '';
	}
	if (isset($_POST["auth"])) {
		$login = trim($_POST["login"]);
		$login = str_replace('+', '', $login);
        $pass = trim($_POST["pass"]);

        $is_reg = mqo("SELECT id FROM lc_users WHERE (phone='".str_replace("8",'7',atel($login))."' OR email='".$login."') AND pass='".$pass."'");
        if ($is_reg) {  $_SESSION["user"] = $is_reg["id"]; }

    }


	include('core/view/head.php');
	include('core/view/template/header.php');
	
	
	if ( $_SESSION["user"] != '') {
		include('core/view/lc/nav.php');
    	if (end($path) == 'lc') include('core/view/lc/user_info.php');
    	if (end($path) == 'order-history') include('core/view/lc/order_history.php');
    	if (end($path) == 'newsletter') include('core/view/lc/newsletter.php');
	}
	else include('core/view/lc/login.php');

    
	include('core/view/template/footer.php');
	include('core/view/foot.php');