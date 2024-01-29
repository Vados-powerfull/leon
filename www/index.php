<?
  session_start();
  
  //ini_set('display_errors', 1);
  //ini_set('display_startup_errors', 1);
  //error_reporting(E_ALL);
  
  
  if(!isset($_SESSION['referer'])) 
  {
    if (!isset($_SERVER["HTTP_REFERER"]) || empty($_SERVER["HTTP_REFERER"])) $_SESSION['referer'] = '';
  }
  
  global $path;

  $srv = $_SERVER['REQUEST_URI'];
  $srv = str_replace('?'.$_SERVER['QUERY_STRING'], '', $srv);
  $url = trim($srv,'/');
  $path = Array();
  if($url == ''){
    array_push($path, 'index');
  }
  else{
    $path = explode('/', $url);
    $path[count($path) - 1] = preg_replace('/\?.*/', '', $path[count($path) - 1]);
  }
  
  require_once ('core/model/Mobile_Detect.php');
  $mobileView = false;
  $detect = new Mobile_Detect;
  if( $detect->isMobile() && !$detect->isTablet() ){
    $mobileView = true;
  }
  include ('core/controller/router.php');


