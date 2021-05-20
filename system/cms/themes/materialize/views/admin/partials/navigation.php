<ul class="sidenav sidenav-collapsible leftside-navigation collapsible sidenav-fixed menu-shadow" id="slide-out" data-menu="menu-navigation" data-collapsible="menu-accordion">
 
 
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
				echo '<li class="bold"> <a href="javascript:void(0);" class="collapsible-header waves-effect waves-cyan "><i class="material-icons">settings_input_svideo</i>  '.lang_label($key).'</a> <div class="collapsible-body">
				<ul class="collapsible collapsible-sub" data-collapsible="accordion">';

				foreach ($menu_item as $lang_key => $uri)
				{
					echo '<li><a href="'.site_url($uri).'" class=""> <i class="material-icons">radio_button_unchecked</i> <span class="menu-title" data-i18n="'.lang_label($lang_key).'">'.lang_label($lang_key).' </span></a></li>';

				}

				echo '</ul></div></li>';

			}
			elseif (is_array($menu_item) and count($menu_item) == 1)
			{
				foreach ($menu_item as $lang_key => $uri)
				{
					echo '<li class="bold"><a href="'.site_url($menu_item).'" class="waves-effect waves-cyan " >cc'.lang_label($lang_key).'</a></li>';
				}
			}
			elseif (is_string($menu_item))
			{
				echo '<li class="bold"><a href="'.site_url($menu_item).'" class="waves-effect waves-cyan " ><i class="material-icons">filter_tilt_shift</i><span class="menu-title" data-i18n="Mail"> '.lang_label($key).'</span></a></li>';
			}

		}
	
		?>

</ul>