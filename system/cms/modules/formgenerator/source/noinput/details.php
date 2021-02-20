<?php defined('BASEPATH') or exit('No direct script access allowed');


class Module_Gantinamamodul extends Module {

	public $version = '2.0';
	 

	public function info()
	{
		$mname = 'Gantidescription';
		return array(
			'name' => array(
				'en' => ucfirst($mname) 
			),
			'description' => array(
				'en' => 'Post '.$mname.' entries.' 
			),
			'frontend'	=> TRUE,
			'backend'	=> TRUE,
			'skip_xss'	=> TRUE,
			'menu'		=> 'Gantimenu',

			'roles' => array(
				'put_live', 'edit_live', 'delete_live'
			)
		);
	}

	public function install()
	{
		 return FALSE;
	}

	public function uninstall()
	{
		//it's a core module, lets keep it around
		return FALSE;
	}

	public function upgrade($old_version)
	{
		// Your Upgrade Logic
		return TRUE;
	}

	public function help()
	{
		/**
		 * Either return a string containing help info
		 * return "Some help info";
		 *
		 * Or add a language/help_lang.php file and
		 * return TRUE;
		 *
		 * help_lang.php contents
		 * $lang['help_body'] = "Some help info";
		*/
		return TRUE;
	}
}

/* End of file details.php */
