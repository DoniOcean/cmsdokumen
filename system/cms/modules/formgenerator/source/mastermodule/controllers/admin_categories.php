<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 *
 * @package  	PyroCMS
 * @subpackage  Categories
 * @category  	Module
 * @author  	Phil Sturgeon - PyroCMS Dev Team
 */
class Admin_Categories extends Admin_Controller
{
	/**
	 * Array that contains the validation rules
	 * @access protected
	 * @var array
	 */
	protected $validation_rules;
	
	/** 
	 * The constructor
	 * @access public
	 * @return void
	 */
	public function __construct()
	{ 
		$this->load->model('categories_m');
		$this->config->load('app');
		$this->MNAME = $this->config->item('mname');
		
	    $this->template->set_partial('shortcuts', 'admin/partials/shortcuts');
	
		// Set the validation rules
		$this->validation_rules = array(
			array(
				'field' => 'title',
				'label' => lang('categories.title_label'),
				'rules' => 'trim|required|max_length[20]|callback__check_title'
			),array(
				'field' => 'navigation_group_id',
				'label' => 'Parent',
				'rules' => 'trim'
			)
		);
		
		// Load the validation library along with the rules
		$this->load->library('form_validation');
		$this->form_validation->set_rules($this->validation_rules);

		$this->template
         ->set_theme('admin_gue');
	}
	
	/**
	 * Index method, lists all categories
	 * @access public
	 * @return void
	 */
	public function index()
	{
		$this->pyrocache->delete_all('modules_m');
		// Create pagination links
		if($this->input->post('search')){ 
			$this->db->like('title',$this->input->post('search'));
		} 
		
		$this->db->from($this->MNAME.'_categories'); 
		$total_rows = $this->db->count_all_results();
		$pagination = create_pagination('admin/'.$this->MNAME.'/categories/index', $total_rows,50,5);
			
		// Using this data, get the relevant results
		if($this->input->post('search')){
			$this->categories_m->like('title',$this->input->post('search'));
		} 
		$categories = $this->categories_m->order_by('title')->limit($pagination['limit'])->get_all();

		$this->template
			->title($this->module_details['name'], lang('cat_list_title'))
			->set('categories', $categories)
			->set('pagination', $pagination)
			->build('admin/categories/index', $this->data);
	}
	
	/**
	 * Create method, creates a new category
	 * @access public
	 * @return void
	 */
	public function create()
	{
		$this->data->folders_tree[0] = array();
		@$file_folders = $this->categories_m->get_folders();
		$folders_tree = array();
		
		if(!empty($file_folders)){
			foreach($file_folders as $folder)
			{
				$indent = repeater('&raquo; ', $folder->depth);
				$this->data->folders_tree[$folder->id] = $indent . $folder->title;
			}
		}
		
		// Validate the data
		if ($this->form_validation->run())
		{
			$this->categories_m->insert($_POST)
				? $this->session->set_flashdata('success', sprintf( lang('cat_add_success'), $this->input->post('title')) )
				: $this->session->set_flashdata(array('error'=> lang('cat_add_error')));

			redirect('admin/'.$this->MNAME.'/categories');
		}
		
		// Loop through each validation rule
		foreach($this->validation_rules as $rule)
		{
			@$category->{$rule['field']} = set_value($rule['field']);
		}
		
		// Render the view	
		$this->data->category =& $category;	
		$this->template->title($this->module_details['name'], lang('cat_create_title'))
						->build('admin/categories/form', $this->data);	
	}
	
	/**
	 * Edit method, edits an existing category
	 * @access public
	 * @param int id The ID of the category to edit 
	 * @return void
	 */
	public function edit($id = 0)
	{
		$this->data->folders_tree[0] = array();
		@$file_folders = $this->categories_m->get_folders();
		$folders_tree = array();
		
		if(!empty($file_folders)){
			foreach($file_folders as $folder)
			{
				$indent = repeater('&raquo; ', $folder->depth);
				$this->data->folders_tree[$folder->id] = $indent . $folder->title;
			}
		}
		// Get the category
		$category = $this->categories_m->get($id);
		
		// ID specified?
		$category or redirect('admin/'.$this->MNAME.'/categories/index');
		
		// Validate the results
		if ($this->form_validation->run())
		{		
			$this->categories_m->update($id, $_POST)
				? $this->session->set_flashdata('success', sprintf( lang('cat_edit_success'), $this->input->post('title')) )
				: $this->session->set_flashdata(array('error'=> lang('cat_edit_error')));
			
			redirect('admin/'.$this->MNAME.'/categories/index');
		}
		
		// Loop through each rule
		foreach($this->validation_rules as $rule)
		{
			if($this->input->post($rule['field']) !== FALSE)
			{
				$category->{$rule['field']} = $this->input->post($rule['field']);
			}
		}

		// Render the view
		$this->data->category =& $category;
		$this->template->title($this->module_details['name'], sprintf(lang('cat_edit_title'), $category->title))
						->build('admin/categories/form', $this->data);
	}	

	/**
	 * Delete method, deletes an existing category (obvious isn't it?)
	 * @access public
	 * @param int id The ID of the category to edit 
	 * @return void
	 */
	public function delete($id = 0)
	{	
		$id_array = (!empty($id)) ? array($id) : $this->input->post('action_to');
		
		// Delete multiple
		if(!empty($id_array))
		{
			$deleted = 0;
			$to_delete = 0;
			foreach ($id_array as $id) 
			{
				if($this->categories_m->delete($id))
				{
					$deleted++;
				}
				else
				{
					$this->session->set_flashdata('error', sprintf($this->lang->line('cat_mass_delete_error'), $id));
				}
				$to_delete++;
			}
			
			if( $deleted > 0 )
			{
				$this->session->set_flashdata('success', sprintf($this->lang->line('cat_mass_delete_success'), $deleted, $to_delete));
			}
		}		
		else
		{
			$this->session->set_flashdata('error', $this->lang->line('cat_no_select_error'));
		}
		
		redirect('admin/'.$this->MNAME.'/categories/index');
	}
		
	/**
	 * Callback method that checks the title of the category
	 * @access public
	 * @param string title The title to check
	 * @return bool
	 */
	public function _check_title($title = '')
	{
		$cektitle = $this->categories_m->check_title($title);
		$asli = strtolower(url_title($this->input->post('title_asli')));
	//echo $asli.'=='.$cektitle;
		if (!empty($cektitle))
		{ //echo url_title($this->input->post('title_asli')) .'=='. $cektitle;
			if( $asli == $cektitle){
				echo 'asd';
				return TRUE;
			}else{
				$this->form_validation->set_message('_check_title', sprintf($this->lang->line('cat_already_exist_error'), $title));
			    return FALSE;
			}
			
		}else{
			return TRUE;
		}

		
	}
	
	/**
	 * Create method, creates a new category via ajax
	 * @access public
	 * @return void
	 */
	public function create_ajax()
	{
		// Loop through each validation rule
		foreach($this->validation_rules as $rule)
		{
			$category->{$rule['field']} = set_value($rule['field']);
		}
		
		$this->data->method = 'create';
		$this->data->category =& $category;
		
		if ($this->form_validation->run())
		{
			$id = $this->categories_m->insert_ajax($_POST);
			
			if($id > 0)
			{
				$message = sprintf( lang('cat_add_success'), $this->input->post('title'));
			}
			else
			{
				$message = lang('cat_add_error');
			}

			return $this->template->build_json(array(
				'message'		=> $message,
				'title'			=> $this->input->post('title'),
				'category_id'	=> $id,
				'status'		=> 'ok'
			));
		}	
		else
		{
			// Render the view
			$form = $this->load->view('admin/categories/form', $this->data, TRUE);

			if ($errors = validation_errors())
			{
				return $this->template->build_json(array(
					'message'	=> $errors,
					'status'	=> 'error',
					'form'		=> $form
				));
			}

			echo $form;
		}
	}
}