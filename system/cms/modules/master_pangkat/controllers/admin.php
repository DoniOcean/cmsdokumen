<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Maintain a central list of master_pangkats to label and organize your content.
 *
 * @author PyroCMS Dev Team
 * @package PyroCMS\Core\Modules\master_pangkats\Controllers
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

		$this->load->model('master_pangkat_m');

		$this->lang->load('master_pangkats');

		// Validation rules
		$this->validation_rules = array(
			array(
				'field' => 'master_pangkat_name',
				'label' => lang('master_pangkat:name'),
				'rules' => 'trim|required|callback__check_title'
			),
		);

		$this->template 
			->set_theme('admin') ;
	}

	/**
	 * Create a new master_pangkat
	 */
	public function index()
	{  
	 
		// Create pagination links
	 	$total_rows = $this->master_pangkat_m->count_by();
		$pagination = create_pagination_admin('admin/master_pangkat/index', $total_rows,20,4);
 
		$base_where =   $pagination;
		$master_pangkats = $this->master_pangkat_m->get_many_by($base_where);

		
		$this->template 
			->title($this->module_details['name']) 
		->append_js('module::function.js')
			->set('master_pangkats', $master_pangkats)
			->set('pagination', $pagination)
			->set('total',$total_rows)
			->build('admin/index');
	}

	public function index_json()
	{ 
		header('Content-Type: application/json'); 
		 
		//if(!empty($this->input->post('search'))){
		$_SESSION['keyword'] = $this->input->post('search'); 
		//}

		//if(!empty($this->input->post('kategorisrch'))){ 
		$_SESSION['kategori'] = $this->input->post('brgkategorifrm');
		//}
		 
		// Create pagination links
		$total_rows = $this->master_pangkat_m->count_by();
		$pagination = create_pagination_admin('admin/master_pangkat/index_json', $total_rows,20,4);
 
		$base_where =   $pagination;
		$master_pangkats = $this->master_pangkat_m->get_many_by($base_where);
		$res=array();
		$i=0;
		foreach($master_pangkats as $val){
			$res['data'][$i]['id']= $val->id;
			$res['data'][$i]['name']= $val->master_pangkat_name; 
			++$i;
		}
		$res['pagination']=$pagination;
		$res['total']=$total_rows;
		 echo json_encode($res);
	}

	public function search()
	{  
		$_SESSION['keyword'] = $this->input->post('search');
		$_SESSION['kategori'] = $this->input->post('kategorisrch');
		redirect('admin/master_pangkat/index');
	}

	 

	public function reset()
	{  
		$_SESSION['keyword'] = '';
		$_SESSION['kategori'] = '';
		redirect('admin/master_pangkat/index');
	}

	public function form(){
		$master_pangkat = new stdClass();
 
		$this->form_validation->set_rules($this->validation_rules);

		foreach ($this->validation_rules as $rule)
		{
			$master_pangkat->{$rule['field']} = set_value($rule['field']);
		}
		$this->load->view('admin/form_o',array('master_pangkat'=>$master_pangkat));
		}
	

		public function listdata(){
			header('Content-Type: application/json');
			$this->db->order_by('master_pangkat_name','ASC');
			$res = $this->db->get('master_pangkats')->result();
			foreach($res as $dat ){
				$arr['result'][]=array('label'=>$dat->master_pangkat_name,'value'=>$dat->id);
			}
			echo json_encode($arr);
		}

	/**
	 * Create a new master_pangkat
	 *
	 * 
	 * @return void
	 */
	public function add()
	{
		$master_pangkat = new stdClass();

		if ($_POST)
		{
			$this->form_validation->set_rules($this->validation_rules);

			$name = $this->input->post('master_pangkat_name');

			if ($this->form_validation->run())
			{
				if ($id = $this->master_pangkat_m->insert(array('master_pangkat_name' => $name,'user_id'=>$this->current_user->id)))
				{
					// Fire an event. A new master_pangkat has been added.
					Events::trigger('master_pangkat_created', $id);

					$this->session->set_flashdata('success', sprintf(lang('master_pangkat:add_success'), $name));
				}
				else
				{
					$this->session->set_flashdata('error', sprintf(lang('master_pangkat:add_error'), $name));
				}

				redirect('admin/master_pangkat');
			}
		}

		$master_pangkat = new stdClass();

		// Loop through each validation rule
		foreach ($this->validation_rules as $rule)
		{
			$master_pangkat->{$rule['field']} = set_value($rule['field']);
		}

		$this->template
			->title($this->module_details['name'], lang('master_pangkat:add_title'))
			->set('master_pangkat', $master_pangkat)
			->build('admin/form');
	}

	public function add_json()
	{  header('Content-Type: application/json');
		$arr=array();
		$this->db->where('name',$this->input->post('name'));
		$cek = $this->db->get('master_pangkats')->row();
		$arr=array();
		if(!empty($cek->name)){
			$arr['result']='error';
			$arr['pesan']='Nama "'.$this->input->post('name').'" sudah ada yang menggunakan,Gunakan kode yang lain';
			echo json_encode($arr);
			return;
		}
		if ($_POST)
		{
			$this->form_validation->set_rules($this->validation_rules);

			$name = $this->input->post('master_pangkat_name');

			if ($this->form_validation->run())
			{
				if ($id = $this->master_pangkat_m->insert(array('master_pangkat_name' => $name,
				'user_id'=>$this->current_user->id, 
				)))
				{
					// Fire an event. A new master_pangkat_supplier has been added. 
					$arr['result']='ok';
					$arr['pesan'] = 'Data "'.$name.'" Berhasil Disimpan!';
					echo json_encode($arr);
				}
				else
				{
					$arr['result']='error';
					$arr['pesan'] = 'Data "'.$name.'" Gagal  Disimpan!';
					echo json_encode($arr);
				}
 
			}
		}

		
	}


	public function edit_json($id=0)
	{  header('Content-Type: application/json');
		$arr=array();
		if ($_POST)
		{
			$this->form_validation->set_rules($this->validation_rules);

			$name = $this->input->post('master_pangkat_name');

			if ($this->form_validation->run())
			{
				if ($success = $this->master_pangkat_m->update($id, array('master_pangkat_name' => $name,'user_id'=>$this->current_user->id)))
				 
				{
					// Fire an event. A new master_pangkat_supplier has been added. 
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
	 * Edit a master_pangkat
	 *
	 * 
	 *
	 * @param int $id The ID of the master_pangkat to edit
	 *
	 * @return void
	 */
	public function edit($id = 0)
	{
		$master_pangkat = $this->master_pangkat_m->get($id);

		// Make sure we found something
		$master_pangkat or redirect('admin/master_pangkat');

		if ($_POST)
		{
			$this->form_validation->set_rules($this->validation_rules);

			$name = $this->input->post('master_pangkat_name');

			if ($this->form_validation->run())
			{
				if ($success = $this->master_pangkat_m->update($id, array('master_pangkat_name' => $name,'user_id'=>$this->current_user->id)))
				{
					// Fire an event. A master_pangkat has been updated.
					Events::trigger('master_pangkat_updated', $id);
					$this->session->set_flashdata('success', sprintf(lang('master_pangkat:edit_success'), $name));
				}
				else
				{
					$this->session->set_flashdata('error', sprintf(lang('master_pangkat:edit_error'), $name));
				}

				redirect('admin/master_pangkat');
			}
		}

		$this->template
			->title($this->module_details['name'], sprintf(lang('master_pangkat:edit_title'), $master_pangkat->master_pangkat_name))
			->set('master_pangkat', $master_pangkat)
			->build('admin/form');
	}

	/**
	 * Delete master_pangkat role(s)
	 *
	 * 
	 *
	 * @param int $id The ID of the master_pangkat to delete
	 *
	 * @return void
	 */
	public function delete($id = 0)
	{
		if ($success = $this->master_pangkat_m->delete($id))
		{
			// Fire an event. A master_pangkat has been deleted.
			Events::trigger('master_pangkat_deleted', $id);
			$this->session->set_flashdata('success', lang('master_pangkat:delete_success'));
		}
		else
		{
			$this->session->set_flashdata('error', lang('master_pangkat:delete_error'));
		}

		redirect('admin/master_pangkat');
	}

	public function autocomplete()
	{
		echo json_encode(
			$this->master_pangkat_m->select('master_pangkat_name value')
				->like('master_pangkat_name', $this->input->get('term'))
				->get_all()
		);
	}

	public function _check_title($title, $id = null)
	{
		$this->form_validation->set_message('_check_title', sprintf(lang('jenisbarang:already_exist_error'), lang('global:title')));

		return $this->check_exists('master_pangkat_name', $title, $this->uri->segment(4));
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
			$this->db->where('master_pangkat_name',$value);
			$this->db->where('id <>',$id);
			$res = $this->db->get('master_pangkats')->row();
			if($res==''){
				$this->session->set_flashdata('success', 'Data Berhasil disimpan!');
				return true;
			}else{
				$this->session->set_flashdata('error', 'Data tidak dapat digunakan!');
				return false;
			}
		}else{
			$this->db->where('master_pangkat_name',$value); 
			$res = $this->db->get('master_pangkats')->row();
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
