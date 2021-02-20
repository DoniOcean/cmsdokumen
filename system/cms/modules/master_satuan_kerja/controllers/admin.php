<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Maintain a central list of master_satuan_kerjas to label and organize your content.
 *
 * @author PyroCMS Dev Team
 * @package PyroCMS\Core\Modules\master_satuan_kerjas\Controllers
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

		$this->load->model('master_satuan_kerja_m');

		$this->lang->load('master_satuan_kerjas');

		// Validation rules
		$this->validation_rules = array(
			array(
				'field' => 'master_satuan_kerja_name',
				'label' => lang('master_satuan_kerja:name'),
				'rules' => 'trim|required|callback__check_title'
			),
		);

		$this->template 
			->set_theme('admin') ;
	}

	/**
	 * Create a new master_satuan_kerja
	 */
	public function index()
	{  
	 
		// Create pagination links
	 	$total_rows = $this->master_satuan_kerja_m->count_by();
		$pagination = create_pagination_admin('admin/master_satuan_kerja/index', $total_rows,20,4);
 
		$base_where =   $pagination;
		$master_satuan_kerjas = $this->master_satuan_kerja_m->get_many_by($base_where);

		
		$this->template 
			->title($this->module_details['name']) 
		->append_js('module::function.js')
			->set('master_satuan_kerjas', $master_satuan_kerjas)
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
		$total_rows = $this->master_satuan_kerja_m->count_by();
		$pagination = create_pagination_admin('admin/master_satuan_kerja/index_json', $total_rows,20,4);
 
		$base_where =   $pagination;
		$master_satuan_kerjas = $this->master_satuan_kerja_m->get_many_by($base_where);
		$res=array();
		$i=0;
		foreach($master_satuan_kerjas as $val){
			$res['data'][$i]['id']= $val->id;
			$res['data'][$i]['name']= $val->master_satuan_kerja_name; 
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
		redirect('admin/master_satuan_kerja/index');
	}

	 

	public function reset()
	{  
		$_SESSION['keyword'] = '';
		$_SESSION['kategori'] = '';
		redirect('admin/master_satuan_kerja/index');
	}

	public function form(){
		$master_satuan_kerja = new stdClass();
 
		$this->form_validation->set_rules($this->validation_rules);

		foreach ($this->validation_rules as $rule)
		{
			$master_satuan_kerja->{$rule['field']} = set_value($rule['field']);
		}
		$this->load->view('admin/form_o',array('master_satuan_kerja'=>$master_satuan_kerja));
		}
	

		public function listdata(){
			header('Content-Type: application/json');
			$this->db->order_by('master_satuan_kerja_name','ASC');
			$res = $this->db->get('master_satuan_kerjas')->result();
			foreach($res as $dat ){
				$arr['result'][]=array('label'=>$dat->master_satuan_kerja_name,'value'=>$dat->id);
			}
			echo json_encode($arr);
		}

	/**
	 * Create a new master_satuan_kerja
	 *
	 * 
	 * @return void
	 */
	public function add()
	{
		$master_satuan_kerja = new stdClass();

		if ($_POST)
		{
			$this->form_validation->set_rules($this->validation_rules);

			$name = $this->input->post('master_satuan_kerja_name');

			if ($this->form_validation->run())
			{
				if ($id = $this->master_satuan_kerja_m->insert(array('master_satuan_kerja_name' => $name,'user_id'=>$this->current_user->id)))
				{
					// Fire an event. A new master_satuan_kerja has been added.
					Events::trigger('master_satuan_kerja_created', $id);

					$this->session->set_flashdata('success', sprintf(lang('master_satuan_kerja:add_success'), $name));
				}
				else
				{
					$this->session->set_flashdata('error', sprintf(lang('master_satuan_kerja:add_error'), $name));
				}

				redirect('admin/master_satuan_kerja');
			}
		}

		$master_satuan_kerja = new stdClass();

		// Loop through each validation rule
		foreach ($this->validation_rules as $rule)
		{
			$master_satuan_kerja->{$rule['field']} = set_value($rule['field']);
		}

		$this->template
			->title($this->module_details['name'], lang('master_satuan_kerja:add_title'))
			->set('master_satuan_kerja', $master_satuan_kerja)
			->build('admin/form');
	}

	public function add_json()
	{  header('Content-Type: application/json');
		$arr=array();
		$this->db->where('name',$this->input->post('name'));
		$cek = $this->db->get('master_satuan_kerjas')->row();
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

			$name = $this->input->post('master_satuan_kerja_name');

			if ($this->form_validation->run())
			{
				if ($id = $this->master_satuan_kerja_m->insert(array('master_satuan_kerja_name' => $name,
				'user_id'=>$this->current_user->id, 
				)))
				{
					// Fire an event. A new master_satuan_kerja_supplier has been added. 
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

			$name = $this->input->post('master_satuan_kerja_name');

			if ($this->form_validation->run())
			{
				if ($success = $this->master_satuan_kerja_m->update($id, array('master_satuan_kerja_name' => $name,'user_id'=>$this->current_user->id)))
				 
				{
					// Fire an event. A new master_satuan_kerja_supplier has been added. 
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
	 * Edit a master_satuan_kerja
	 *
	 * 
	 *
	 * @param int $id The ID of the master_satuan_kerja to edit
	 *
	 * @return void
	 */
	public function edit($id = 0)
	{
		$master_satuan_kerja = $this->master_satuan_kerja_m->get($id);

		// Make sure we found something
		$master_satuan_kerja or redirect('admin/master_satuan_kerja');

		if ($_POST)
		{
			$this->form_validation->set_rules($this->validation_rules);

			$name = $this->input->post('master_satuan_kerja_name');

			if ($this->form_validation->run())
			{
				if ($success = $this->master_satuan_kerja_m->update($id, array('master_satuan_kerja_name' => $name,'user_id'=>$this->current_user->id)))
				{
					// Fire an event. A master_satuan_kerja has been updated.
					Events::trigger('master_satuan_kerja_updated', $id);
					$this->session->set_flashdata('success', sprintf(lang('master_satuan_kerja:edit_success'), $name));
				}
				else
				{
					$this->session->set_flashdata('error', sprintf(lang('master_satuan_kerja:edit_error'), $name));
				}

				redirect('admin/master_satuan_kerja');
			}
		}

		$this->template
			->title($this->module_details['name'], sprintf(lang('master_satuan_kerja:edit_title'), $master_satuan_kerja->master_satuan_kerja_name))
			->set('master_satuan_kerja', $master_satuan_kerja)
			->build('admin/form');
	}

	/**
	 * Delete master_satuan_kerja role(s)
	 *
	 * 
	 *
	 * @param int $id The ID of the master_satuan_kerja to delete
	 *
	 * @return void
	 */
	public function delete($id = 0)
	{
		if ($success = $this->master_satuan_kerja_m->delete($id))
		{
			// Fire an event. A master_satuan_kerja has been deleted.
			Events::trigger('master_satuan_kerja_deleted', $id);
			$this->session->set_flashdata('success', lang('master_satuan_kerja:delete_success'));
		}
		else
		{
			$this->session->set_flashdata('error', lang('master_satuan_kerja:delete_error'));
		}

		redirect('admin/master_satuan_kerja');
	}

	public function autocomplete()
	{
		echo json_encode(
			$this->master_satuan_kerja_m->select('master_satuan_kerja_name value')
				->like('master_satuan_kerja_name', $this->input->get('term'))
				->get_all()
		);
	}

	public function _check_title($title, $id = null)
	{
		$this->form_validation->set_message('_check_title', sprintf(lang('jenisbarang:already_exist_error'), lang('global:title')));

		return $this->check_exists('master_satuan_kerja_name', $title, $this->uri->segment(4));
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
			$this->db->where('master_satuan_kerja_name',$value);
			$this->db->where('id <>',$id);
			$res = $this->db->get('master_satuan_kerjas')->row();
			if($res==''){
				$this->session->set_flashdata('success', 'Data Berhasil disimpan!');
				return true;
			}else{
				$this->session->set_flashdata('error', 'Data tidak dapat digunakan!');
				return false;
			}
		}else{
			$this->db->where('master_satuan_kerja_name',$value); 
			$res = $this->db->get('master_satuan_kerjas')->row();
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
