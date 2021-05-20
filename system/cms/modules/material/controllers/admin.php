<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Maintain a central list of materials to label and organize your content.
 *
 * @author PyroCMS Dev Team
 * @package PyroCMS\Core\Modules\materials\Controllers
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

		$this->load->model('material_m');

		$this->lang->load('materials');

		// Validation rules
		$this->validation_rules = array(
			array(
				'field' => 'material_name',
				'label' => lang('material:name'),
				'rules' => 'trim|required|callback__check_title'
			),
		);

		$this->template 
			->set_theme('materialize') ;
	}

	/**
	 * Create a new material
	 */
	public function index()
	{  
	 
		// Create pagination links
	 	$total_rows = $this->material_m->count_by();
		$pagination = create_pagination_admin('admin/material/index', $total_rows,20,4);
 
		$base_where =   $pagination;
		$materials = $this->material_m->get_many_by($base_where);

		
		$this->template 
			->title($this->module_details['name']) 
		->append_js('module::function.js')
			->set('materials', $materials)
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
		$total_rows = $this->material_m->count_by();
		$pagination = create_pagination_admin('admin/material/index_json', $total_rows,20,4);
 
		$base_where =   $pagination;
		$materials = $this->material_m->get_many_by($base_where);
		$res=array();
		$i=0;
		foreach($materials as $val){
			$res['data'][$i]['id']= $val->id;
			$res['data'][$i]['name']= $val->material_name; 
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
		redirect('admin/material/index');
	}

	 

	public function reset()
	{  
		$_SESSION['keyword'] = '';
		$_SESSION['kategori'] = '';
		redirect('admin/material/index');
	}

	public function form(){
		$material = new stdClass();
 
		$this->form_validation->set_rules($this->validation_rules);

		foreach ($this->validation_rules as $rule)
		{
			$material->{$rule['field']} = set_value($rule['field']);
		}
		$this->load->view('admin/form_o',array('material'=>$material));
		}
	

		public function listdata(){
			header('Content-Type: application/json');
			$this->db->order_by('material_name','ASC');
			$res = $this->db->get('materials')->result();
			foreach($res as $dat ){
				$arr['result'][]=array('label'=>$dat->material_name,'value'=>$dat->id);
			}
			echo json_encode($arr);
		}

	/**
	 * Create a new material
	 *
	 * 
	 * @return void
	 */
	public function add()
	{
		$material = new stdClass();

		if ($_POST)
		{
			$this->form_validation->set_rules($this->validation_rules);

			$name = $this->input->post('material_name');

			if ($this->form_validation->run())
			{
				if ($id = $this->material_m->insert(array('material_name' => $name,'user_id'=>$this->current_user->id)))
				{
					// Fire an event. A new material has been added.
					Events::trigger('material_created', $id);

					$this->session->set_flashdata('success', sprintf(lang('material:add_success'), $name));
				}
				else
				{
					$this->session->set_flashdata('error', sprintf(lang('material:add_error'), $name));
				}

				redirect('admin/material');
			}
		}

		$material = new stdClass();

		// Loop through each validation rule
		foreach ($this->validation_rules as $rule)
		{
			$material->{$rule['field']} = set_value($rule['field']);
		}

		$this->template
			->title($this->module_details['name'], lang('material:add_title'))
			->set('material', $material)
			->build('admin/form');
	}

	public function add_json()
	{  header('Content-Type: application/json');
		$arr=array();
		$this->db->where('name',$this->input->post('name'));
		$cek = $this->db->get('materials')->row();
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

			$name = $this->input->post('material_name');

			if ($this->form_validation->run())
			{
				if ($id = $this->material_m->insert(array('material_name' => $name,
				'user_id'=>$this->current_user->id, 
				)))
				{
					// Fire an event. A new material_supplier has been added. 
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

			$name = $this->input->post('material_name');

			if ($this->form_validation->run())
			{
				if ($success = $this->material_m->update($id, array('material_name' => $name,'user_id'=>$this->current_user->id)))
				 
				{
					// Fire an event. A new material_supplier has been added. 
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
	 * Edit a material
	 *
	 * 
	 *
	 * @param int $id The ID of the material to edit
	 *
	 * @return void
	 */
	public function edit($id = 0)
	{
		$material = $this->material_m->get($id);

		// Make sure we found something
		$material or redirect('admin/material');

		if ($_POST)
		{
			$this->form_validation->set_rules($this->validation_rules);

			$name = $this->input->post('material_name');

			if ($this->form_validation->run())
			{
				if ($success = $this->material_m->update($id, array('material_name' => $name,'user_id'=>$this->current_user->id)))
				{
					// Fire an event. A material has been updated.
					Events::trigger('material_updated', $id);
					$this->session->set_flashdata('success', sprintf(lang('material:edit_success'), $name));
				}
				else
				{
					$this->session->set_flashdata('error', sprintf(lang('material:edit_error'), $name));
				}

				redirect('admin/material');
			}
		}

		$this->template
			->title($this->module_details['name'], sprintf(lang('material:edit_title'), $material->material_name))
			->set('material', $material)
			->build('admin/form');
	}

	/**
	 * Delete material role(s)
	 *
	 * 
	 *
	 * @param int $id The ID of the material to delete
	 *
	 * @return void
	 */
	public function delete($id = 0)
	{
		if ($success = $this->material_m->delete($id))
		{
			// Fire an event. A material has been deleted.
			Events::trigger('material_deleted', $id);
			$this->session->set_flashdata('success', lang('material:delete_success'));
		}
		else
		{
			$this->session->set_flashdata('error', lang('material:delete_error'));
		}

		redirect('admin/material');
	}

	public function autocomplete()
	{
		echo json_encode(
			$this->material_m->select('material_name value')
				->like('material_name', $this->input->get('term'))
				->get_all()
		);
	}

	public function _check_title($title, $id = null)
	{
		$this->form_validation->set_message('_check_title', sprintf(lang('jenisbarang:already_exist_error'), lang('global:title')));

		return $this->check_exists('material_name', $title, $this->uri->segment(4));
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
			$this->db->where('material_name',$value);
			$this->db->where('id <>',$id);
			$res = $this->db->get('materials')->row();
			if($res==''){
				$this->session->set_flashdata('success', 'Data Berhasil disimpan!');
				return true;
			}else{
				$this->session->set_flashdata('error', 'Data tidak dapat digunakan!');
				return false;
			}
		}else{
			$this->db->where('material_name',$value); 
			$res = $this->db->get('materials')->row();
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
