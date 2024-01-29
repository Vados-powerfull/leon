<?
	/**
	* Роутер
	*/
	include ('core/model/common.php');
	
	if(is_file('core/controller/'.$path[0].'Controller.php')){
		include ('core/controller/'.$path[0].'Controller.php');
	}
	elseif (!isset($path[1])){
		include ('core/controller/textController.php');
	}
	else ErrorPage404();
