<?
	global $db;
	
	/* Конфигурация */
	if(preg_match('/\.loc$/',$_SERVER['HTTP_HOST'])){
		define('DB_HOST', '127.0.0.1');
		define('DB_NAME', 'leon');
		define('DB_USER', 'root');
		define('DB_PASSW', '');
	}
	else{
		define('DB_HOST', 'localhost');
		define('DB_NAME', 'halin_leon');
		define('DB_USER', 'halin_leon');
		define('DB_PASSW', 'Lodmin1!');	
	}

	try {
	    $db = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASSW);
	} catch (PDOException $e) {
	    print '<!DOCTYPE html><html lang="ru"><head><meta charset="UTF-8"><title>Error</title></head><body>Error!: ' . $e->getMessage() . '<br/></body></html>';
	    die();
	}