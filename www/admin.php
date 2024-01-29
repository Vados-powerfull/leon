<?php include("adm/admin/aengine.php");?>
<!DOCTYPE html>
<html lang="ru">
	<head>
		<meta charset="utf-8">

		<title>Панель управления сайтом</title>
		<meta name="author" content="zonareklamy.ru">
		<meta name="viewport" content="width=1200, shrink-to-fit=yes">

		<link href="https://fonts.googleapis.com/css?family=Play:400,700&amp;subset=cyrillic" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="/adm/css/fa/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="/adm/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="<?echo hashpath('/adm/css/admin.css');?>" />

		<script type="text/javascript" src="/adm/js/jquery.min.js"></script>
		<script type="text/javascript" src="/adm/js/ckeditor/ckeditor.js"></script>
		<script type="text/javascript" src="/adm/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="<?echo hashpath('/adm/js/jadmin.js');?>"></script>

		<!--[if lt IE 9]>
		<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
	</head>
	<body>
		<? admin(); ?>
		<div id="query"></div>
		<br>
		<br>
		<br>
	</body>
</html>