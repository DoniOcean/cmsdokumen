<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Maintain a central list of masters to label and organize your content.
 *
 * @author PyroCMS Dev Team
 * @package PyroCMS\Core\Modules\masters\Controllers
 *
 */
class Admin extends Admin_Controller
{
	/**
	 * Constructor method
	 */
	public function __construct()
	{
		parent::__construct();

		// Load the required classes
		$this->load->library('form_validation');

		$this->load->model('master_m');

		$this->lang->load('masters');

		// Validation rules
		$this->validation_rules = array(
			array(
				'field' => 'master_name',
				'label' => lang('masters:name'),
				'rules' => 'trim|required|callback__check_title'
			),
		);

		$this->template 
			->set_theme('admin') ;
	}

	/**
	 * Create a new master
	 */
	public function index()
	{  
	 
		// Create pagination links
	 	$total_rows = $this->master_m->count_by();
		$pagination = create_pagination_admin('admin/master/index', $total_rows,20,4);
 
		$base_where =   $pagination;
		$masters = $this->master_m->get_many_by($base_where);

		
		$this->template 
			->title($this->module_details['name'])
			->set('masters', $masters)
			->set('pagination', $pagination)
			->set('total',$total_rows)
			->build('admin/index');
	}

	public function search()
	{  
		$_SESSION['keyword'] = $this->input->post('search');
		redirect('admin/master/index');
	}

	
	public function reset()
	{  
		$_SESSION['keyword'] = '';
		redirect('admin/master/index');
	}
	 
	public function form(){
		$master = new stdClass();
 
		$this->form_validation->set_rules($this->validation_rules);

		foreach ($this->validation_rules as $rule)
		{
			$master->{$rule['field']} = set_value($rule['field']);
		}
		$this->load->view('admin/form_o',array('master'=>$master));
		}

		public function listdata(){
			header('Content-Type: application/json');
			$this->db->order_by('name','ASC');
			$res = $this->db->get('masters')->result();
			foreach($res as $dat ){
				$arr['result'][]=array('label'=>$dat->name,'value'=>$dat->id);
			}
			echo json_encode($arr);
		}

	/**
	 * Create a new master
	 *
	 * 
	 * @return void
	 */
	public function add()
	{
		$master = new stdClass();

		if ($_POST)
		{
			$this->form_validation->set_rules($this->validation_rules);

			$name = $this->input->post('master_name');

			if ($this->form_validation->run())
			{
				if ($id = $this->master_m->insert(array('name' => $name,'user_id'=>$this->current_user->id)))
				{
					// Fire an event. A new master has been added.
					Events::trigger('master_created', $id);

					$this->session->set_flashdata('success', sprintf(lang('master:add_success'), $name));
				}
				else
				{
					$this->session->set_flashdata('error', sprintf(lang('master:add_error'), $name));
				}

				redirect('admin/master');
			}
		}

		$master = new stdClass();

		// Loop through each validation rule
		foreach ($this->validation_rules as $rule)
		{
			$master->{$rule['field']} = set_value($rule['field']);
		}

		$this->template
			->title($this->module_details['name'], lang('master:add_title'))
			->set('master', $master)
			->build('admin/form');
	}

public function add_json()
	{  header('Content-Type: application/json');
		$arr=array();
		if ($_POST)
		{
			$this->form_validation->set_rules($this->validation_rules);

			$name = $this->input->post('name');

			if ($this->form_validation->run())
			{
				if ($id = $this->master_m->insert(array('name' => $name,
				'user_id'=>$this->current_user->id, 
				)))
				{
					// Fire an event. A new master_supplier has been added. 
					$arr['result']='ok';
					$arr['pesan'] = 'Data "'.$name.'" Berhasil Disimpan!';
				}
				else
				{
					$arr['result']='error';
					$arr['pesan'] = 'Data "'.$name.'" Gagal  Disimpan!';
				}
 
			}
		}

		echo json_encode($arr);
	}


	public function edit_json($id=0)
	{  header('Content-Type: application/json');
		$arr=array();
		if ($_POST)
		{
			$this->form_validation->set_rules($this->validation_rules);

			$name = $this->input->post('name');

			if ($this->form_validation->run())
			{
				if ($success = $this->master_m->update($id, array('name' => $name,'user_id'=>$this->current_user->id)))
				 
				{
					// Fire an event. A new master_supplier has been added. 
					$arr['result']='ok';
					$arr['pesan'] = 'Data "'.$name.'" Berhasil Disimpan!';
				}
				else
				{
					$arr['result']='error';
					$arr['pesan'] = 'Data "'.$name.'" Gagal  Disimpan!';
				}
 
			}
		}

		echo json_encode($arr);
	}
	/**
	 * Edit a master
	 *
	 * 
	 *
	 * @param int $id The ID of the master to edit
	 *
	 * @return void
	 */
	public function edit($id = 0)
	{
		$master = $this->master_m->get($id);

		// Make sure we found something
		$master or redirect('admin/master');

		if ($_POST)
		{
			$this->form_validation->set_rules($this->validation_rules);

			$name = $this->input->post('master_name');

			if ($this->form_validation->run())
			{
				if ($success = $this->master_m->update($id, array('name' => $name,'user_id'=>$this->current_user->id)))
				{
					// Fire an event. A master has been updated.
					Events::trigger('master_updated', $id);
					$this->session->set_flashdata('success', sprintf(lang('master:edit_success'), $name));
				}
				else
				{
					$this->session->set_flashdata('error', sprintf(lang('master:edit_error'), $name));
				}

				redirect('admin/master');
			}
		}

		$this->template
			->title($this->module_details['name'], sprintf(lang('master:edit_title'), $master->name))
			->set('master', $master)
			->build('admin/form');
	}

	/**
	 * Delete master role(s)
	 *
	 * 
	 *
	 * @param int $id The ID of the master to delete
	 *
	 * @return void
	 */
	public function delete($id = 0)
	{
		if ($success = $this->master_m->delete($id))
		{
			// Fire an event. A master has been deleted.
			Events::trigger('master_deleted', $id);
			$this->session->set_flashdata('success', lang('master:delete_success'));
		}
		else
		{
			$this->session->set_flashdata('error', lang('master:delete_error'));
		}

		redirect('admin/master');
	}

	public function autocomplete()
	{
		echo json_encode(
			$this->master_m->select('name value')
				->like('name', $this->input->get('term'))
				->get_all()
		);
	}

	public function _check_title($title, $id = null)
	{
		$this->form_validation->set_message('_check_title', sprintf(lang('jenisbarang:already_exist_error'), lang('global:title')));

		return $this->check_exists('master_name', $title, $this->uri->segment(4));
	}

	public function check_exists($field, $value = '', $id = 0)
	{
		if (is_array($field))
		{
			$params = $field;
			$id = $value;
		}
		else
		{
			$params[$field] = $value;
		}
		$params['id !='] = (int)$id;

		if($id > 0){
			$this->db->where('name',$value);
			$this->db->where('id <>',$id);
			$res = $this->db->get('masters')->row();
			if($res==''){
				$this->session->set_flashdata('success', 'Data Berhasil disimpan!');
				return true;
			}else{
				$this->session->set_flashdata('error', 'Data tidak dapat digunakan!');
				return false;
			}
		}else{
			$this->db->where('name',$value); 
			$res = $this->db->get('masters')->row();
			if($res==''){
				$this->session->set_flashdata('success', 'Data Berhasil disimpan!');
				return true;
			}else{
				$this->session->set_flashdata('error', 'Data tidak dapat digunakan!');
				return false;
			}
		}
 
	}

}
