<?
	/**
	* Обработчик главной страницы
	*/
	if(isset($path[1])) ErrorPage404();
	
	include 'core/model/lib.php';
	

	
	include('core/view/head.php');

	include('core/view/template/header.php');
	
	include('core/view/index/tiser.php');
	include('core/view/index/discount.php');
	include('core/view/index/new-items.php');
	include('core/view/index/products.php');
	include('core/view/index/recipes.php');
	




	
	include('core/view/template/footer.php');

	include('core/view/foot.php');
