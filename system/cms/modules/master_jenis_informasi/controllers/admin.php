<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Maintain a central list of master_jenis_informasis to label and organize your content.
 *
 * @author PyroCMS Dev Team
 * @package PyroCMS\Core\Modules\master_jenis_informasis\Controllers
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

		$this->load->model('master_jenis_informasi_m');

		$this->lang->load('master_jenis_informasis');

		// Validation rules
		$this->validation_rules = array(
			array(
				'field' => 'master_jenis_informasi_name',
				'label' => lang('master_jenis_informasi:name'),
				'rules' => 'trim|required|callback__check_title'
			),
		);

		$this->template 
			->set_theme('admin') ;
	}

	/**
	 * Create a new master_jenis_informasi
	 */
	public function index()
	{  
	 
		// Create pagination links
	 	$total_rows = $this->master_jenis_informasi_m->count_by();
		$pagination = create_pagination_admin('admin/master_jenis_informasi/index', $total_rows,20,4);
 
		$base_where =   $pagination;
		$master_jenis_informasis = $this->master_jenis_informasi_m->get_many_by($base_where);

		
		$this->template 
			->title($this->module_details['name']) 
		->append_js('module::function.js')
			->set('master_jenis_informasis', $master_jenis_informasis)
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
		$total_rows = $this->master_jenis_informasi_m->count_by();
		$pagination = create_pagination_admin('admin/master_jenis_informasi/index_json', $total_rows,20,4);
 
		$base_where =   $pagination;
		$master_jenis_informasis = $this->master_jenis_informasi_m->get_many_by($base_where);
		$res=array();
		$i=0;
		foreach($master_jenis_informasis as $val){
			$res['data'][$i]['id']= $val->id;
			$res['data'][$i]['name']= $val->master_jenis_informasi_name; 
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
		redirect('admin/master_jenis_informasi/index');
	}

	 

	public function reset()
	{  
		$_SESSION['keyword'] = '';
		$_SESSION['kategori'] = '';
		redirect('admin/master_jenis_informasi/index');
	}

	public function form(){
		$master_jenis_informasi = new stdClass();
 
		$this->form_validation->set_rules($this->validation_rules);

		foreach ($this->validation_rules as $rule)
		{
			$master_jenis_informasi->{$rule['field']} = set_value($rule['field']);
		}
		$this->load->view('admin/form_o',array('master_jenis_informasi'=>$master_jenis_informasi));
		}
	

		public function listdata(){
			header('Content-Type: application/json');
			$this->db->order_by('master_jenis_informasi_name','ASC');
			$res = $this->db->get('master_jenis_informasis')->result();
			foreach($res as $dat ){
				$arr['result'][]=array('label'=>$dat->master_jenis_informasi_name,'value'=>$dat->id);
			}
			echo json_encode($arr);
		}

	/**
	 * Create a new master_jenis_informasi
	 *
	 * 
	 * @return void
	 */
	public function add()
	{
		$master_jenis_informasi = new stdClass();

		if ($_POST)
		{
			$this->form_validation->set_rules($this->validation_rules);

			$name = $this->input->post('master_jenis_informasi_name');

			if ($this->form_validation->run())
			{
				if ($id = $this->master_jenis_informasi_m->insert(array('master_jenis_informasi_name' => $name,'user_id'=>$this->current_user->id)))
				{
					// Fire an event. A new master_jenis_informasi has been added.
					Events::trigger('master_jenis_informasi_created', $id);

					$this->session->set_flashdata('success', sprintf(lang('master_jenis_informasi:add_success'), $name));
				}
				else
				{
					$this->session->set_flashdata('error', sprintf(lang('master_jenis_informasi:add_error'), $name));
				}

				redirect('admin/master_jenis_informasi');
			}
		}

		$master_jenis_informasi = new stdClass();

		// Loop through each validation rule
		foreach ($this->validation_rules as $rule)
		{
			$master_jenis_informasi->{$rule['field']} = set_value($rule['field']);
		}

		$this->template
			->title($this->module_details['name'], lang('master_jenis_informasi:add_title'))
			->set('master_jenis_informasi', $master_jenis_informasi)
			->build('admin/form');
	}

	public function add_json()
	{  header('Content-Type: application/json');
		$arr=array();
		$this->db->where('name',$this->input->post('name'));
		$cek = $this->db->get('master_jenis_informasis')->row();
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

			$name = $this->input->post('master_jenis_informasi_name');

			if ($this->form_validation->run())
			{
				if ($id = $this->master_jenis_informasi_m->insert(array('master_jenis_informasi_name' => $name,
				'user_id'=>$this->current_user->id, 
				)))
				{
					// Fire an event. A new master_jenis_informasi_supplier has been added. 
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

			$name = $this->input->post('master_jenis_informasi_name');

			if ($this->form_validation->run())
			{
				if ($success = $this->master_jenis_informasi_m->update($id, array('master_jenis_informasi_name' => $name,'user_id'=>$this->current_user->id)))
				 
				{
					// Fire an event. A new master_jenis_informasi_supplier has been added. 
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
	 * Edit a master_jenis_informasi
	 *
	 * 
	 *
	 * @param int $id The ID of the master_jenis_informasi to edit
	 *
	 * @return void
	 */
	public function edit($id = 0)
	{
		$master_jenis_informasi = $this->master_jenis_informasi_m->get($id);

		// Make sure we found something
		$master_jenis_informasi or redirect('admin/master_jenis_informasi');

		if ($_POST)
		{
			$this->form_validation->set_rules($this->validation_rules);

			$name = $this->input->post('master_jenis_informasi_name');

			if ($this->form_validation->run())
			{
				if ($success = $this->master_jenis_informasi_m->update($id, array('master_jenis_informasi_name' => $name,'user_id'=>$this->current_user->id)))
				{
					// Fire an event. A master_jenis_informasi has been updated.
					Events::trigger('master_jenis_informasi_updated', $id);
					$this->session->set_flashdata('success', sprintf(lang('master_jenis_informasi:edit_success'), $name));
				}
				else
				{
					$this->session->set_flashdata('error', sprintf(lang('master_jenis_informasi:edit_error'), $name));
				}

				redirect('admin/master_jenis_informasi');
			}
		}

		$this->template
			->title($this->module_details['name'], sprintf(lang('master_jenis_informasi:edit_title'), $master_jenis_informasi->master_jenis_informasi_name))
			->set('master_jenis_informasi', $master_jenis_informasi)
			->build('admin/form');
	}

	/**
	 * Delete master_jenis_informasi role(s)
	 *
	 * 
	 *
	 * @param int $id The ID of the master_jenis_informasi to delete
	 *
	 * @return void
	 */
	public function delete($id = 0)
	{
		if ($success = $this->master_jenis_informasi_m->delete($id))
		{
			// Fire an event. A master_jenis_informasi has been deleted.
			Events::trigger('master_jenis_informasi_deleted', $id);
			$this->session->set_flashdata('success', lang('master_jenis_informasi:delete_success'));
		}
		else
		{
			$this->session->set_flashdata('error', lang('master_jenis_informasi:delete_error'));
		}

		redirect('admin/master_jenis_informasi');
	}

	public function autocomplete()
	{
		echo json_encode(
			$this->master_jenis_informasi_m->select('master_jenis_informasi_name value')
				->like('master_jenis_informasi_name', $this->input->get('term'))
				->get_all()
		);
	}

	public function _check_title($title, $id = null)
	{
		$this->form_validation->set_message('_check_title', sprintf(lang('jenisbarang:already_exist_error'), lang('global:title')));

		return $this->check_exists('master_jenis_informasi_name', $title, $this->uri->segment(4));
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
			$this->db->where('master_jenis_informasi_name',$value);
			$this->db->where('id <>',$id);
			$res = $this->db->get('master_jenis_informasis')->row();
			if($res==''){
				$this->session->set_flashdata('success', 'Data Berhasil disimpan!');
				return true;
			}else{
				$this->session->set_flashdata('error', 'Data tidak dapat digunakan!');
				return false;
			}
		}else{
			$this->db->where('master_jenis_informasi_name',$value); 
			$res = $this->db->get('master_jenis_informasis')->row();
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
