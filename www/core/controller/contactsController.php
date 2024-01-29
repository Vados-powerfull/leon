<?

	if(isset($path[1])) ErrorPage404();
	
	include 'core/model/lib.php';
	

	
	include('core/view/head.php');

	include('core/view/template/header.php');

	
    include('core/view/contacts/crumbs.php');
    include('core/view/contacts/contacts.php');



	
	include('core/view/template/footer.php');


	include('core/view/foot.php');