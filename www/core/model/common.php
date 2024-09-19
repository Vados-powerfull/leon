<?
	include ($_SERVER['DOCUMENT_ROOT'].'/core/model/config.php');

	/*Страница 404*/
	function ErrorPage404()
	{
	  header('HTTP/1.1 404 Not Found');
	  header("Status: 404 Not Found");
	  header('Location:/404');
	}

	/* функция для добавления хэша файла к пути */
	/**/
	function hashPath ($path,$echo = false)
	{
		$hash = trim($path,'/');
		if(is_file($hash)){
		    $result = $path.'?v='.hash_file('md5', $hash);
		    if($echo) echo $result;
		    return $result;
		}
		else return '';
	}

	/* Функции работы с базой данных */
	/*-------------------------------*/

	/* Выборка одного значения по заданным параметрам */
	/**/
	function mqo($sql,$values = []){
		global $db;
		$stmt = $db->prepare($sql);
		$stmt->execute($values);

		// Если запрос был на вставку, возвращаем lastInsertId
        if (preg_match('/^INSERT/i', trim($sql))) {
            return $db->lastInsertId();
        }
		return $stmt->fetch(PDO::FETCH_LAZY);
		$stmt = null;
	}

	/* Выполнение любого запроса */
	/**/
	function mqs($sql,$values = []){
		global $db;
		$stmt = $db->prepare($sql);
		$stmt->execute($values);
		return $stmt->fetchALL(PDO::FETCH_ASSOC);
	}

	/* Добавление записи в БД */
	/**/
	function mqi($table,$ins = []){
		global $db;
		$fields = '';
		$values = '';
		foreach ($ins as $key => $value) {
			$fields .= '`'.$key.'`,';
			$values .= ':'.$key.',';
		}
		$fields = trim($fields,',');
		$values = trim($values,',');
		$sql = "INSERT INTO `$table`($fields) VALUES($values)";
		$stmt = $db->prepare($sql);
		$stmt->execute($ins);
		return $stmt;
	}

	function print_article($is_title)
	{
		global $path;
		$a = mqo("SELECT page_text,page_title FROM pages WHERE sys_name='".end($path)."'");  
		echo '<div class="print_article">';
			if ($is_title == 1) echo '<h1>'.$a["page_title"].'</h1>';    
			echo $a["page_text"];
		echo '</div>';
	}

	function get_favicon_path()
	{
		$a = mqo("SELECT val FROM adm_site_opt WHERE name='fav_path'");	
		echo $a["val"];
	}

	function get_counter()
	{
		$a = mqo("SELECT val FROM adm_site_opt WHERE name='counter'");	
		echo $a["val"];
}

/*Минимизирование js и css*/
function minjs(){
	$js = file_get_contents('public/js/jengine.js');
	$minjs = preg_replace('!/\*.*?\*/!s', '', $js);
	$minjs = preg_replace('/\s+/', ' ', $minjs);
	file_put_contents('public/js/jengine.min.js', $minjs);
}
function mincss(){
	$css = file_get_contents('public/css/style.css');
	$mincss = preg_replace('!/\*.*?\*/!s', '', $css);
	$mincss = preg_replace('/\s+/', ' ', $mincss);
	file_put_contents('public/css/style.min.css', $mincss);
}