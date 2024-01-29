<?php
session_start();
date_default_timezone_set('Europe/Moscow');
include ("core/model/common.php");
include ("core/model/lib.php");


/* А Ф Т О Р И З А Ц И Я */


function auth()
{
	if ($_GET["bad_auth"] == 1) echo '<p align="center" class="alert alert-danger">Неверный логин/пароль!</p>';
    echo '
	<div id="auth_form" class="text-center">
		<h4 class=" bg-danger text-white my-0 mx-auto py-2 px-5 d-inline-block rounded-top"><i class="fa fa-lock" aria-hidden="true"></i> Авторизация</h4>
    	<form action="/admin.php?action=login" method="post" class="w-100 d-block border-3 border-danger rounded p-5">
    		<div class="input-group">
				<span class="input-group-addon" id="basic-addon1"><i class="fa fa-user fa-fw" aria-hidden="true"></i></span>
				<input type="text" name="login" class="form-control" placeholder="Логин" aria-label="Username" aria-describedby="basic-addon1">
			</div>
    		<div class="input-group my-3">
				<span class="input-group-addon" id="basic-addon2"><i class="fa fa-unlock-alt fa-fw" aria-hidden="true"></i></span>
				<input type="password" name="pass" class="form-control" placeholder="Пароль" aria-label="Username" aria-describedby="basic-addon2">
			</div>
            <input name="auth" type="submit" value="Войти" class="btn btn-danger w-75"/>
    	</form>
	</div>';
}

function login ()
{
    if (isset($_POST["login"])) /* Если была нажата кнопка "Войти" */
    {
    	$login = trim($_POST["login"]);
		$login = htmlspecialchars($login);
    	$pass = trim($_POST["pass"]);
		$pass = htmlspecialchars($pass);

		if(adm_user($login,$pass)){
			$_SESSION["login"] = $login;
			$_SESSION["super"] = 'super';
			echo("<script>location.href='/admin.php'</script>");
		}
		else{
			/* Пытаемся вытащить из базы пароль по введенному логину */
			$a = mqo("SELECT login,pass FROM adm_users WHERE login=?",[$login]);
			if ($pass == $a["pass"] && !empty($a["pass"]))
			{ /* Пароль правильный - пишем в сессии */
		  		$_SESSION["login"] = $a["login"];
				echo("<script>location.href='/admin.php'</script>");
			}
			else
			{ /* Наверное не правильный пароль - возвращаем ошибку в ф-ю auth() */
		 		$_SESSION["login"] = '';
		 		echo("<script>location.href='/admin.php?bad_auth=1'</script>");
			}			
		}
  	}
}

function is_login ()
{
    if (isset($_SESSION["login"]) && !empty($_SESSION["login"])) return true;
    else return false;
}

function logout()
{
    unset($_SESSION["login"]);
    unset($_SESSION["super"]);
    echo("<script>location.href='/admin.php'</script>");
}


function admin()
{
	global $modules;
    if ($_GET["action"] == "login") login();
    if ($_GET["action"] == "logout") logout();
    if (!is_login()) {auth(); exit;}
    echo '<div class="container p-2 bg-danger text-white rounded-bottom">
    	<div class="row">
    		<div class="col-8">
    			<h3 class="m-0 p-0">Панель управления</h3>
    		</div>
    		<div class="col-4 text-right">
				<a href="/admin.php?action=logout" class="btn btn-danger"><i class="fa fa-sign-out" aria-hidden="true"></i> Выход</a>
    		</div>
    	</div>
    </div>
    <div class="container mt-3">
		<div class="row">
			<div class="col-2">
				<img src="/adm/img/admin/logo.png" class="d-block w-75 mb-3">
				<a href="/admin.php?action=site_opt" class="btn btn-danger text-white w-100 text-left mb-1"><i class="fa fa-sliders fa-fw" aria-hidden="true"></i> Настройки</a>
				<a href="/admin.php?action=modules" class="btn btn-danger text-white w-100 text-left mb-1"><i class="fa fa-cubes fa-fw" aria-hidden="true"></i> Модули</a>
				<a href="/" target="_blank" class="btn btn-danger text-white w-100 text-left mb-1"><i class="fa fa-globe fa-fw" aria-hidden="true"></i> На сайт</a>
				<a href="/admin.php?action=logout" class="btn btn-danger text-white w-100 text-left mb-1"><i class="fa fa-sign-out" aria-hidden="true"></i> Выход</a>';
				if(isset($_SESSION["super"])){
					echo '
					<a href="/admin.php?action=s_modules&mode=items" class="btn btn-info text-white w-100 text-left mb-1"><i class="fa fa-wrench fa-fw" aria-hidden="true"></i> Модули</a>
					<a href="/adm/zrfm/index.php" target="_blank" class="btn btn-info text-white w-100 text-left mb-1"><i class="fa fa-floppy-o fa-fw" aria-hidden="true"></i> Файлы</a>
					<a href="/adm/zrdb/index.php" target="_blank" class="btn btn-info text-white w-100 text-left mb-1"><i class="fa fa-database fa-fw" aria-hidden="true"></i> MySQL</a>
					<a href="#" target="_blank" class="btn btn-info text-white w-100 text-left mb-1"><i class="fa fa-bitbucket fa-fw" aria-hidden="true"></i> Git pull</a>
					';
				}
				echo '
			</div>
			<div class="col-10">
				';
				$modules->setModules();
				if(!isset($_GET['action']) || $_GET['action'] == '') $action = 'modules';
				else $action = $_GET['action'];
				if(function_exists($action))call_user_func($action);
				elseif($modules->isModule($action))$modules->callModule($action);
				else echo '<p class="alert alert-danger">Функция '.$action.'() не существует</p>';
				echo '
			</div>
		</div>
    </div>';
}

/*Actions*/

function s_modules()
{
	$sModule = new zrModuleDefault('s_modules');
	$sModule->icon = '';
	$sModule->text = 'Администрирование модулей';
	$sModule->addMode('items','Модули','s_modules','name,action');
	$sModule->addMode('modes','Моды','s_modes','name,action','module_id');
	$sModule->addMode('relation','Связи','relation','primary_table,foreign_table');
	$sModule->render();
}

function site_opt()
{
	echo '<h5 class="rounded text-white bg-secondary p-2">Настройки сайта</h5>';

	if (isset($_POST["submit"]))
	{
		$fav_path = $_POST["fav_path"];
		$counter = $_POST["counter"];
		$password1 = $_POST["password1"];
		$password2 = $_POST["password2"];
		$r = mqo("UPDATE adm_site_opt SET val='$fav_path' WHERE name='fav_path'");
		$r = $r && mqo("UPDATE adm_site_opt SET val='$counter' WHERE name='counter'");
		if ($r) echo '<p class="alert alert-success">Настройки успешно сохранены!</p>';
		if (!empty($password1))
		{
			if ($password1 != $password2) echo '<p class="alert alert-danger">Введенные пароли не совпадают!</p>';
			else
			{
				$r = mqo("UPDATE adm_users SET pass='$password1'");
				if ($r) echo '<p class="alert alert-success">Пароль успешно изменен!</p>';
			}
		}
	}

	$a = mqo("SELECT val FROM adm_site_opt WHERE name='fav_path'");
	echo '
	<form action="/admin.php?action=site_opt" method="post" class="rounded p-3 bg-light border border-secondary">
		<p class="font-weight-bold">&nbsp;Путь к favicon:<br>
			<input type="text" name="fav_path" class="form-control" value="'.$a["val"].'" />
		</p>
		<fieldset class="border border-secondary p-2 rounded">
			<legend class="d-inline-block w-auto">Смена пароля</legend>
			<p class="font-weight-bold">&nbsp;Новый пароль:<br>
				<input type="password" name="password1" class="form-control"/>
			</p>
			<p class="font-weight-bold">&nbsp;Повтор:<br>
				<input type="password" name="password2" class="form-control"/>
			</p>
		</fieldset><br>';
		$a = mqo("SELECT val FROM adm_site_opt WHERE name='counter'");
		echo '
		<p class="font-weight-bold">&nbsp;Код счетчика посещаемости:<br>
			<textarea name="counter" class="form-control" rows="10">'.$a["val"].'</textarea>
		</p>
		<p><input type="submit" class="btn btn-danger" name="submit" value="Сохранить" /></p>
	</form>';
}

function modules()
{
	global $modules;
	$modules->setModules();
	$modules->links();
}

/* Объявление объекта класса модулей */
global $modules;
$modules = new zrModules;