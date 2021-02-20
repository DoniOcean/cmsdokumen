<ul class="nav-menu" id="js-nav-menu">
	
 
		<?php 
 
		// Display the menu items.
		// We have already vetted them for permissions
		// in the Admin_Controller, so we can just
        // display them now.
        $icon['Content']='fa-briefcase';
        $icon['Structure']='fa-cubes';
        $icon['Master']='fa-database';
        $icon['Users']='fa-user';
        $icon['Add-ons']='fa-puzzle-piece';
		$icon['Profile']='fa-user-circle';
		$icon['Utilities']='fa-compass'; 
		$icon['Inventory']='fa-truck'; 
		$icon['Produksi']='fa-cube';
		$icon['Purchasing']='fa-briefcase'; 
		$icon['Distributor']='fa-briefcase'; 
		$icon['Application']='fa-tasks'; 
		$icon['Agen']='fa-user';
		$icon['Anggota']='fa-user';
		$icon['Publikasi']='fa-briefcase'; 
		foreach ($menu_items as $key => $menu_item)
		{
			 
			if (is_array($menu_item))
			{
				echo '<li> <a href="javascript:void(0);" class="" style="font-size:12px"><i class="fal '.$icon[$key].'"></i>  '.lang_label($key).'</a><ul>';

				foreach ($menu_item as $lang_key => $uri)
				{
					echo '<li><a href="'.site_url($uri).'" class="" style="font-size:12px">'.lang_label($lang_key).'</a></li>';

				}

				echo '</ul></li>';

			}
			elseif (is_array($menu_item) and count($menu_item) == 1)
			{
				foreach ($menu_item as $lang_key => $uri)
				{
					echo '<li><a href="'.site_url($menu_item).'" class="top-link no-submenu" style="font-size:12px">'.lang_label($lang_key).'</a></li>';
				}
			}
			elseif (is_string($menu_item))
			{
				echo '<li><a href="'.site_url($menu_item).'" class="top-link no-submenu" style="font-size:12px"><i class="fal fa-wrench"></i> '.lang_label($key).'</a></li>';
			}

		}
	
		?>

</ul>