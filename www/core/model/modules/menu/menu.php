<?
	function menu($class = '')
	{
		global $gpage;
		
		if($class != '')$r = mqs("SELECT menu.name as name,menu.url as url,menu_pos.class as class FROM menu,menu_pos WHERE menu_pos.class='$class' and menu.position = menu_pos.id ORDER BY menu.ordering");
		else $r = mqs("SELECT * FROM menu ORDER BY ordering");
		$c = count($r);

		echo '<nav class="'.$class.'">';
		//echo '<a href="javascript:hideMenu()" class="menu d-lg-none"><img src="/img/exit.svg"></a> ';
		$n = 1;
		foreach($r as $a)
		{
			if ($a['url'] == '#') {
				echo '<div class="menu">'.$a["name"].'<div class="dopmenu_cont">';
				$menu_pos = mqo("SELECT id FROM menu_pos WHERE name = '".$a['name']."'")['id'];
				foreach (mqs("SELECT * FROM menu WHERE position = $menu_pos") as $link) {
					if ($link["url"] == "/") $url = "/";
					else
					{
						$url = trim($link["url"],"/");
						$url = '/'.$url;
					}
					echo '<a href="'.$url.'" class="dopmenu">'.$link["name"].'</a>';					
				}
				if ($class != 'bottom') echo '</div></div><div class="menu_devider">\</div>';
			}
			else{
				if ($a["url"] == "/") $url = "/";
				else
				{
					$url = trim($a["url"],"/");
					$url = '/'.$url;
				}
				if ($_SERVER['REQUEST_URI'] == $url) $opt = ' active';
				else $opt = '';
				echo '<a href="'.$url.'" class="menu'.$opt.'">'.$a["name"].'</a>';
				if ($n < $c && $class != 'bottom') echo '<div class="menu_devider">\</div>';
			}
			$n++;
		}
		echo '</nav>';
	}
