<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Maintain a central list of agamas to label and organize your content.
 *
 * @author PyroCMS Dev Team
 * @package PyroCMS\Core\Modules\agamas\Controllers
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

		$this->load->model('agama_m');

		$this->lang->load('agamas');

		// Validation rules
		$this->validation_rules = array(
			array(
				'field' => 'agama_name',
				'label' => lang('agama:name'),
				'rules' => 'trim|required|callback__check_title'
			),
		);

		$this->template 
			->set_theme('admin') ;
	}

	/**
	 * Create a new agama
	 */
	public function index()
	{  
	 
		// Create pagination links
	 	$total_rows = $this->agama_m->count_by();
		$pagination = create_pagination_admin('admin/agama/index', $total_rows,20,4);
 
		$base_where =   $pagination;
		$agamas = $this->agama_m->get_many_by($base_where);

		
		$this->template 
			->title($this->module_details['name']) 
		->append_js('module::function.js')
			->set('agamas', $agamas)
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
		$total_rows = $this->agama_m->count_by();
		$pagination = create_pagination_admin('admin/agama/index_json', $total_rows,20,4);
 
		$base_where =   $pagination;
		$agamas = $this->agama_m->get_many_by($base_where);
		$res=array();
		$i=0;
		foreach($agamas as $val){
			$res['data'][$i]['id']= $val->id;
			$res['data'][$i]['name']= $val->agama_name; 
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
		redirect('admin/agama/index');
	}

	 

	public function reset()
	{  
		$_SESSION['keyword'] = '';
		$_SESSION['kategori'] = '';
		redirect('admin/agama/index');
	}

	public function form(){
		$agama = new stdClass();
 
		$this->form_validation->set_rules($this->validation_rules);

		foreach ($this->validation_rules as $rule)
		{
			$agama->{$rule['field']} = set_value($rule['field']);
		}
		$this->load->view('admin/form_o',array('agama'=>$agama));
		}
	

		public function listdata(){
			header('Content-Type: application/json');
			$this->db->order_by('agama_name','ASC');
			$res = $this->db->get('agamas')->result();
			foreach($res as $dat ){
				$arr['result'][]=array('label'=>$dat->agama_name,'value'=>$dat->id);
			}
			echo json_encode($arr);
		}

	/**
	 * Create a new agama
	 *
	 * 
	 * @return void
	 */
	public function add()
	{
		$agama = new stdClass();

		if ($_POST)
		{
			$this->form_validation->set_rules($this->validation_rules);

			$name = $this->input->post('agama_name');

			if ($this->form_validation->run())
			{
				if ($id = $this->agama_m->insert(array('agama_name' => $name,'user_id'=>$this->current_user->id)))
				{
					// Fire an event. A new agama has been added.
					Events::trigger('agama_created', $id);

					$this->session->set_flashdata('success', sprintf(lang('agama:add_success'), $name));
				}
				else
				{
					$this->session->set_flashdata('error', sprintf(lang('agama:add_error'), $name));
				}

				redirect('admin/agama');
			}
		}

		$agama = new stdClass();

		// Loop through each validation rule
		foreach ($this->validation_rules as $rule)
		{
			$agama->{$rule['field']} = set_value($rule['field']);
		}

		$this->template
			->title($this->module_details['name'], lang('agama:add_title'))
			->set('agama', $agama)
			->build('admin/form');
	}

	public function add_json()
	{  header('Content-Type: application/json');
		$arr=array();
		$this->db->where('name',$this->input->post('name'));
		$cek = $this->db->get('agamas')->row();
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

			$name = $this->input->post('agama_name');

			if ($this->form_validation->run())
			{
				if ($id = $this->agama_m->insert(array('agama_name' => $name,
				'user_id'=>$this->current_user->id, 
				)))
				{
					// Fire an event. A new agama_supplier has been added. 
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

			$name = $this->input->post('agama_name');

			if ($this->form_validation->run())
			{
				if ($success = $this->agama_m->update($id, array('agama_name' => $name,'user_id'=>$this->current_user->id)))
				 
				{
					// Fire an event. A new agama_supplier has been added. 
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
	 * Edit a agama
	 *
	 * 
	 *
	 * @param int $id The ID of the agama to edit
	 *
	 * @return void
	 */
	public function edit($id = 0)
	{
		$agama = $this->agama_m->get($id);

		// Make sure we found something
		$agama or redirect('admin/agama');

		if ($_POST)
		{
			$this->form_validation->set_rules($this->validation_rules);

			$name = $this->input->post('agama_name');

			if ($this->form_validation->run())
			{
				if ($success = $this->agama_m->update($id, array('agama_name' => $name,'user_id'=>$this->current_user->id)))
				{
					// Fire an event. A agama has been updated.
					Events::trigger('agama_updated', $id);
					$this->session->set_flashdata('success', sprintf(lang('agama:edit_success'), $name));
				}
				else
				{
					$this->session->set_flashdata('error', sprintf(lang('agama:edit_error'), $name));
				}

				redirect('admin/agama');
			}
		}

		$this->template
			->title($this->module_details['name'], sprintf(lang('agama:edit_title'), $agama->agama_name))
			->set('agama', $agama)
			->build('admin/form');
	}

	/**
	 * Delete agama role(s)
	 *
	 * 
	 *
	 * @param int $id The ID of the agama to delete
	 *
	 * @return void
	 */
	public function delete($id = 0)
	{
		if ($success = $this->agama_m->delete($id))
		{
			// Fire an event. A agama has been deleted.
			Events::trigger('agama_deleted', $id);
			$this->session->set_flashdata('success', lang('agama:delete_success'));
		}
		else
		{
			$this->session->set_flashdata('error', lang('agama:delete_error'));
		}

		redirect('admin/agama');
	}

	public function autocomplete()
	{
		echo json_encode(
			$this->agama_m->select('agama_name value')
				->like('agama_name', $this->input->get('term'))
				->get_all()
		);
	}

	public function _check_title($title, $id = null)
	{
		$this->form_validation->set_message('_check_title', sprintf(lang('jenisbarang:already_exist_error'), lang('global:title')));

		return $this->check_exists('agama_name', $title, $this->uri->segment(4));
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
			$this->db->where('agama_name',$value);
			$this->db->where('id <>',$id);
			$res = $this->db->get('agamas')->row();
			if($res==''){
				$this->session->set_flashdata('success', 'Data Berhasil disimpan!');
				return true;
			}else{
				$this->session->set_flashdata('error', 'Data tidak dapat digunakan!');
				return false;
			}
		}else{
			$this->db->where('agama_name',$value); 
			$res = $this->db->get('agamas')->row();
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
