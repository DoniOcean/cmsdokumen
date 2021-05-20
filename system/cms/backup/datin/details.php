<?php defined('BASEPATH') or exit('No direct script access allowed');

/**
 * master module
 *
 * @author PyroCMS Dev Team
 * @package PyroCMS\Core\Modules\master
 */
class Module_Datin extends Module {

	public $version = '1.1.0'; 
	public function info()
	{
		return array(
			'name' => array(
				'en' => 'Data Dan Informasi', 
				'id' => 'Data Dan Informasi', 
			),
			'icon' => 'fa-info-circle',
			'description' => array(
				'en' => 'Data Dan Informasi', 
				'id' => 'Data Dan Informasi', 
			),
			'frontend' => false,
			'backend'  => true,
			'menu'     => 'Publikasi',
			'shortcuts' => array(
				array(
			 	   'name' => 'Datin:add_title',
				   'uri' => 'admin/datin/add',
				   'class' => 'btn btn-primary waves-effect waves-themed',
				   'icon' => 'fa-plus',
				),
			),
		);

		 
	}

	public function install()
	{
		$this->dbforge->drop_table('master');
		$this->dbforge->drop_table('master_applied');

		return $this->install_tables(array(
			'master' => array(
				'id' => array('type' => 'INT', 'constraint' => 11, 'auto_increment' => true, 'primary' => true,),
				'name' => array('type' => 'VARCHAR', 'constraint' => 50,),
			),
			'master_applied' => array(
				'id' => array('type' => 'INT', 'constraint' => 11, 'auto_increment' => true, 'primary' => true,),
				'hash' => array('type' => 'CHAR', 'constraint' => 32, 'default' => '',),
				'keyword_id' => array('type' => 'INT', 'constraint' => 11,),
			),
		));
	}

	public function uninstall()
	{
		// This is a core module, lets keep it around.
		return false;
	}

	public function upgrade($old_version)
	{
		return true;
	}

}
