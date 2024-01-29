<?
session_start();
if(isset($_SESSION['super']) && $_SESSION['super'] != ''){
	require_once("../config.php");
	$_GET['username'] = DB_USER;
	$_GET['mpass'] = DB_PASSW;
	require_once("zrdb.php");	
}