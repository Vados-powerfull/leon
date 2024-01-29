<?
	include("../../config.php");
	$dest = 'img/catalog/certs2/'.rand(100000,999999).'.'.array_pop(explode('.', $_POST['src']));
	@copy($_POST['src'],'../../'.$dest);
	if(is_file('../../'.$dest)){
		mysql_query("UPDATE catalog2 SET cert".$_POST['i']." = '/$dest' WHERE id=".$_POST['id']);
		echo "/$dest";
	}
	else echo $_POST['src'];