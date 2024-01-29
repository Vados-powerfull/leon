<?
	include("../../core/model/common.php");
	include("../../core/model/lib.php");
	$parms = json_decode($_POST['parms'],true);
	$mass = $parms['mass'];
	$table = $parms['table'];
	$fieldTypes = $parms['fieldTypes'];
	$action = $parms['action'];
	$cols = $parms['cols'];
	$mode = $parms['mode'];
	$where = $parms['where'];
	$join = $parms['join'];
	$filter = $parms['filter'];

						$key = current($mass);
						if($key){
							array_shift($mass);
							if($where == 'WHERE 1')$style = 'bg-danger text-white border-light';
							else $style = 'btn-cat font-weight-bold border-danger';
							$rel = mqo("SELECT * FROM relation WHERE foreign_table = '$table' AND foreign_column = '$key'");
							$r = mqs("SELECT ".$rel['primary_column'].",".$rel['display_column']." FROM ".$rel['primary_table']);
							foreach ($r as $a) {
								$and = " AND $key='".$a[$rel['primary_column']]."'";
								$rc = mqs("SELECT * FROM $table $join $where$and $filter");
								if($rc){
									echo '<div class="cat w-100"><div class="header rounded p-2 border text-left '.$style.' cur-pointer" onclick="group(this)"><i class="fa fa-folder fa-fw" aria-hidden="true"></i> '.$a[$rel['display_column']].' ['.count($rc).']</div><div class="cont slides" loaded="0">
											<i class="fa fa-circle-o-notch fa-spin" aria-hidden="true"></i><b>Загрузка...</b>';
											unset($parms);
											$parms = array();
											$parms['mass'] = $mass;
											$parms['table'] = $table;
											$parms['fieldTypes'] = $fieldTypes;
											$parms['action'] = $action;
											$parms['cols'] = $cols;
											$parms['mode'] = $mode;
											$parms['where'] = $where.$and;
											$parms['join'] = $join;
											$parms['filter'] = $filter;
											
											echo '<div class="d-none parms">'.json_encode($parms).'</div>';											
									echo '</div></div>';									
								}
							}
						}
						else{
							$r = mqs("SELECT $table.* FROM $table $join $where $filter ORDER BY ordering");
							foreach ($r as $a) {
								$str = '';
								foreach ($cols as $col) {
									if($fieldTypes[$col] == 'tinytext')$str .= '<img src="'.$a[$col].'" style="height:100px;margin:0 10px 5px 0;border:#CCC 1px solid;">';
									else $str .= $a[$col].' | ';
								}
								$str = trim($str,' | ');
								echo '<div class="elemcont"><div class="elem rounded border border-secondary btn-elem" id="'.$a['id'].'" order="'.$a['ordering'].'">';
								echo '<div class="d-inline-block pt-2 text-nowrap text-truncate w-75"><i class="fa fa-arrows-v fa-fw" aria-hidden="true"></i><strong>'.$str.'</strong></div>';
								echo '<div class="float-right p-1 ml-5 nomove"><a href="/admin.php?action='.$action.'&mode='.$mode.'&delete='.$a["id"].'" title="Удалить" class="mdel"><h4 class="m-0 p-0 text-danger"><i class="fa fa-trash fa-fw" aria-hidden="true"></i></h4></a></div>';
								echo '<div class="float-right pt-1 nomove"><a href="/admin.php?action='.$action.'&mode='.$mode.'&modify='.$a["id"].'" title="Редактировать"><h4 class="m-0 p-0 text-secondary"><i class="fa fa-pencil fa-fw" aria-hidden="true"></i></h4></a></div>';
								echo '</div></div>';
							}							
						}