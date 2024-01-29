<?
	/**
	* Обработчик главной страницы
	*/
	if(isset($path[1])) ErrorPage404();
	
	include 'core/model/lib.php';
	

	
	include('core/view/head.php');

	include('core/view/template/header.php');

   

    include('core/view/item-card/crumbs.php');
    include('core/view/item-card/item-card-alco.php');
    
	include('core/view/template/footer.php');


	include('core/view/foot.php');