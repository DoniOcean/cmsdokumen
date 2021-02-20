<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Categories model
 *
 * @package		PyroCMS
 * @subpackage	Categories Module
 * @category	Modules
 * @author		Phil Sturgeon - PyroCMS Dev Team
 */
class categories_m extends MY_Model
{
	
	protected $_table = 'Gantinama_categories';
	/**
	 * Insert a new category into the database
	 * @access public
	 * @param array $input The data to insert
	 * @return string
	 */
	public function insert($input = array())
	{
		$this->load->helper('text');
		parent::insert(array(
			'title'=>$input['title'],
			'navigation_group_id' =>$input['navigation_group_id'],
			'slug'=>url_title(strtolower(convert_accented_characters($input['title'])))
		));
		
		return $input['title'];
	}
    
	/**
	 * Update an existing category
	 * @access public
	 * @param int $id The ID of the category
	 * @param array $input The data to update
	 * @return bool
	 */
	public function update($id, $input)
	{
		return parent::update($id, array(
			'title'	=> $input['title'],
			'navigation_group_id' =>$input['navigation_group_id'],
		        'slug'	=> url_title(strtolower(convert_accented_characters($input['title'])))
		));
	}

	/**
	 * Callback method for validating the title
	 * @access public
	 * @param string $title The title to validate
	 * @return mixed
	 */
	public function check_title($title = '')
	{
		$this->db->where('slug',url_title($title));
		$data = $this->db->get($this->MNAME)->row();
		return $data->slug;
		//return parent::count_by('slug', url_title($title)) > 0;
	}
	
	/**
	 * Insert a new category into the database via ajax
	 * @access public
	 * @param array $input The data to insert
	 * @return int
	 */
	public function insert_ajax($input = array())
	{
		$this->load->helper('text');
		return parent::insert(array(
			'title'=>$input['title'],
			'navigation_group_id' =>$input['navigation_group_id'],
			//is something wrong with convert_accented_characters?
			//'slug'=>url_title(strtolower(convert_accented_characters($input['title'])))
			'slug' => url_title(strtolower($input['title']))
		));
	}
	
	//TREEE
	public function get_folders($id = 0)
	{
		if ($id)
		{
			$this->folder_tree($id);
		}
		elseif (empty($this->_folder))
		{
			$this->folder_tree();
		}
		
		return @$this->_folders;
	}
	
	public function folder_tree($parent_id = 0, $depth = 0, &$arr = array())
	{
		$arr = $arr ? $arr : array();

		if ($parent_id === 0)
		{
			$arr	= array();
			$depth	= 0;
		}

		$folders = $this
			->order_by('position')
			->get_many_by(array('navigation_group_id' => $parent_id));

		if ( ! $folders)
		{
			return $arr;
		}

		static $root = NULL;

		foreach ($folders as $folder)
		{
			
			if ($depth < 1)
			{
				$root = $folder->id;
			}

//			$folder->name_indent		= repeater('&raquo; ', $depth) . $folder->name;
			$folder->root_id			= $root;
			$folder->depth				= $depth;
			//$folder->count_files		= sizeof($this->db->get_where('files', array('folder_id' => $folder->id))->result());
			$arr[$folder->id]			= $folder;
			$old_size					= sizeof($arr);

			$this->folder_tree($folder->id, $depth+1, $arr);

			//$folder->count_subfolders	= sizeof($arr) - $old_size;
		}

		if ($parent_id === 0)
		{
			foreach ($arr as $id => &$folder)
			{
				$folder->virtual_path		= $this->_build_asc_segments($id, array(
					'segments'	=> $arr,
					'separator'	=> '/',
					'attribute'	=> 'slug'
				));
			}

			$this->_folders = $arr;
		}

		if ($parent_id > 0 && $depth < 1)
		{
			foreach ($arr as $id => &$folder)
			{
				$folder->virtual_path = $this->_folders[$id]->virtual_path;
			}
		}

		return $arr;
	}
	
	public function _build_asc_segments($id, $options = array()) 
	{
		if ( ! isset($options['segments']))
		{
			return;
		}

		$defaults = array(
			'attribute'	=> 'name',
			'separator'	=> ' &raquo; ',
			'limit'		=> 0
		);

		$options = array_merge($defaults, $options);

		extract($options);

		$arr = array();

		while (isset($segments[$id]))
		{
			array_unshift($arr, $segments[$id]->{$attribute});
			$id = $segments[$id]->navigation_group_id;
		}

		if (is_int($limit) && $limit > 0 && sizeof($arr) > $limit)
		{
			array_splice($arr, 1, -($limit-1), '&#8230;');
		}

		return implode($separator, $arr);
	}
}