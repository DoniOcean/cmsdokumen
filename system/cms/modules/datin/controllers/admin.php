<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Maintain a central list of Datins to label and organize your content.
 *
 * @author PyroCMS Dev Team
 * @package PyroCMS\Core\Modules\Datins\Controllers
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

		$this->load->model('Datin_m');

		$this->lang->load('Datins');

		// Validation rules
		$this->validation_rules = array(
			array(
				'field' => 'Datin_name',
				'label' => lang('Datin:name'),
				'rules' => 'trim|required|callback__check_title'
			),array(
				'field' => 'jenis_informasi',
				'label' => 'Jenis Informasi',
				'rules' => 'trim|required'
			),array(
				'field' => 'urusan',
				'label' => 'Urusan',
				'rules' => 'trim|required'
			),array(
				'field' => 'status',
				'label' => 'Status',
				'rules' => 'trim|required'
			),array(
				'field' => 'ringkasan',
				'label' => 'Ringkasan',
				'rules' => 'trim|required'
			),array(
				'field' => 'tgl_dokumen',
				'label' => 'Tanggal Dokumen',
				'rules' => 'trim|required'
			),array(
				'field' => 'id',
				'label' => 'Tanggal Dokumen',
				'rules' => 'trim'
			),
		);

		$this->template 
			->set_theme('admin') ;
	}

	/**
	 * Create a new Datin
	 */
	public function index()
	{  
	 
		// Create pagination links
	 	$total_rows = $this->Datin_m->count_by();
		$pagination = create_pagination_admin('admin/datin/index', $total_rows,20,4);
 
		$base_where =   $pagination;
		$Datins = $this->Datin_m->get_many_by($base_where);
		$jenis_info_db=$this->db->get('master_jenis_informasis')->result();
		foreach($jenis_info_db as $ji){
			$name = $ji->master_jenis_informasi_name;
			$idji = $ji->id;
			$jenis_info[$idji]=$name;
		}

		$urusandb=$this->db->get('master_urusans')->result();
		foreach($urusandb as $ures){
			$name = $ures->master_urusan_name;
			$idji = $ures->id;
			$urusan[$idji]=$name;
		}
		
		$this->template 
			->title($this->module_details['name'])  
			->set('Datins', $Datins)
			->set('pagination', $pagination)
			->set('jenis', $jenis_info)
		->set('urusan', $urusan)
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
		$total_rows = $this->Datin_m->count_by();
		$pagination = create_pagination_admin('admin/Datin/index_json', $total_rows,20,4);
 
		$base_where =   $pagination;
		$Datins = $this->Datin_m->get_many_by($base_where);
		$res=array();
		$i=0;
		foreach($Datins as $val){
			$res['data'][$i]['id']= $val->id;
			$res['data'][$i]['name']= $val->Datin_name; 
			++$i;
		}
		$res['pagination']=$pagination;
		$res['total']=$total_rows;
		 echo json_encode($res);
	}

	public function hapus($id="")
	{ 
		header('Content-Type: application/json'); 
		$data = $this->db->where('id',$id)->get('datins_applied')->row();

		$this->db->where('id',$id);
		$this->db->delete('datins_applied');

		
		$res['id']=$data->master_id;
		echo json_encode($res);
	}

	public function search()
	{  
		$_SESSION['keyword'] = $this->input->post('search');
		$_SESSION['kategori'] = $this->input->post('kategorisrch');
		$_SESSION['jenis_informasi'] = $this->input->post('jenis_informasi');
		redirect('admin/datin/index');
	}

	 

	public function reset()
	{  
		$_SESSION['keyword'] = '';
		$_SESSION['kategori'] = '';
		$_SESSION['jenis_informasi'] = '';
		redirect('admin/datin/index');
	}

	public function form(){
		$Datin = new stdClass();
 
		$this->form_validation->set_rules($this->validation_rules);

		foreach ($this->validation_rules as $rule)
		{
			$Datin->{$rule['field']} = set_value($rule['field']);
		}
		$this->load->view('admin/form_o',array('Datin'=>$Datin));
		}
	

		public function listdata(){
			header('Content-Type: application/json');
			$this->db->order_by('Datin_name','ASC');
			$res = $this->db->get('Datins')->result();
			foreach($res as $dat ){
				$arr['result'][]=array('label'=>$dat->Datin_name,'value'=>$dat->id);
			}
			echo json_encode($arr);
		}

	/**
	 * Create a new Datin
	 *
	 * 
	 * @return void
	 */
	public function add()
	{
		$Datin = new stdClass();

		if ($_POST)
		{
			$this->form_validation->set_rules($this->validation_rules);

			$name = $this->input->post('Datin_name');

			if ($this->form_validation->run())
			{
				$datainsert = array('Datin_name' => $name,
									'user_id'=>$this->current_user->id,
									'jenis_informasi' =>  $this->input->post('jenis_informasi'),
									'urusan' =>  $this->input->post('urusan'),
									'tgl_dokumen' =>  $this->input->post('tgl_dokumen'),
									'tgl_input' => date('Y-m-d H:i:s'),
									'status' =>  $this->input->post('status'),
									'ringkasan' =>  $this->input->post('ringkasan'),
								);
				if ($id = $this->Datin_m->insert($datainsert))
				{
					// Fire an event. A new Datin has been added.
					Events::trigger('Datin_created', $id);

					$this->session->set_flashdata('success', sprintf(lang('Datin:add_success'), $name));
				}
				else
				{
					$this->session->set_flashdata('error', sprintf(lang('Datin:add_error'), $name));
				}

				redirect('admin/datin/edit/'.$id);
			}
		}

		$Datin = new stdClass();

		// Loop through each validation rule
		foreach ($this->validation_rules as $rule)
		{
			$Datin->{$rule['field']} = set_value($rule['field']);
		}

		$jenis_info_db=$this->db->get('master_jenis_informasis')->result();
		foreach($jenis_info_db as $ji){
			$name = $ji->master_jenis_informasi_name;
			$idji = $ji->id;
			$jenis_info[$idji]=$name;
		}

		$urusandb=$this->db->get('master_urusans')->result();
		foreach($urusandb as $ures){
			$name = $ures->master_urusan_name;
			$idji = $ures->id;
			$urusan[$idji]=$name;
		}

		$this->template
			->title($this->module_details['name'], lang('Datin:add_title'))
			->append_js('module::datin.js')
			->set('Datin', $Datin)
			->set('jenis_info',$jenis_info)
			->set('urusan',$urusan)
			->build('admin/form');
	}

	public function add_json()
	{  header('Content-Type: application/json');
		$arr=array();
		$this->db->where('name',$this->input->post('name'));
		$cek = $this->db->get('Datins')->row();
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

			$name = $this->input->post('Datin_name');

			if ($this->form_validation->run())
			{
				if ($id = $this->Datin_m->insert(array('Datin_name' => $name,
				'user_id'=>$this->current_user->id, 
				)))
				{
					// Fire an event. A new Datin_supplier has been added. 
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

			$name = $this->input->post('Datin_name');

			if ($this->form_validation->run())
			{
				$datainsert = array('Datin_name' => $name,
									'user_id'=>$this->current_user->id,
									'jenis_informasi' =>  $this->input->post('jenis_informasi'),
									'urusan' =>  $this->input->post('urusan'),
									'tgl_dokumen' =>  $this->input->post('tgl_dokumen'), 
									'status' =>  $this->input->post('status'),
									'ringkasan' =>  $this->input->post('ringkasan'),
								);
				if ($success = $this->Datin_m->update($id, $datainsert))
				 
				{
					// Fire an event. A new Datin_supplier has been added. 
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
	 * Edit a Datin
	 *
	 * 
	 *
	 * @param int $id The ID of the Datin to edit
	 *
	 * @return void
	 */
	public function upload($id = 0)
	{
		header('Content-Type: application/json');

		$dokumen = do_upload('file');
		if($dokumen['status']=='ok'){
			$arrdok = array(
				'dokumen' => $dokumen['data'],
				'type' => $dokumen['type'],
				'master_id' => $id
			);
			$this->db->insert('datins_applied',$arrdok);
		}
		 
		$arr['status']='ok';
		echo json_encode($arr);


	}

	public function listdok($id = 0)
	{
		header('Content-Type: application/json');
		$res = $this->db->where('master_id',$id)->order_by('id','DESC')->get('datins_applied')->result();
		$html ='<table class="table table-bordered table-striped m-0" cellspacing="0" >';
		$html .='<thead>
					<tr>
						<th>Dokumen</th>
						<th width="10%">Hapus</th>
					</tr>
				</thead><tbody>';
		foreach($res as $val){
			$html .= '<tr>';
			$html .= '<td>';
			$html .= '<a href="./assets/dokumen/'.$val->dokumen.'">'.$val->dokumen.'</a>';
			$html .= '</td>';
			$html .= '<td class="actions text-center">';
			$html .= '<a href="javascript:void(0);" class="btn btn-sm btn-icon btn-outline-danger rounded-circle mr-1 waves-effect waves-themed" title="Delete Record" onclick="return hapus(\''.$val->id.' \')">
			<i class="fal fa-times"></i>
		</a>';
			$html .= '</td>';
			$html .= '</tr>';
		}

		$html .= '</tbody></table>';
		$arr['isi']= $html;
		echo json_encode($arr);
	}

	public function edit($id = 0)
	{
		$Datin = $this->Datin_m->get($id);

		// Make sure we found something
		$Datin or redirect('admin/Datin');

		if ($_POST)
		{
			$this->form_validation->set_rules($this->validation_rules);

			$name = $this->input->post('Datin_name');

			if ($this->form_validation->run())
					{$datainsert = array('Datin_name' => $name,
						'user_id'=>$this->current_user->id,
						'jenis_informasi' =>  $this->input->post('jenis_informasi'),
						'urusan' =>  $this->input->post('urusan'),
						'tgl_dokumen' =>  $this->input->post('tgl_dokumen'), 
						'status' =>  $this->input->post('status'),
						'ringkasan' =>  $this->input->post('ringkasan'),
					);
				if ($success = $this->Datin_m->update($id, $datainsert)){
					// Fire an event. A Datin has been updated.
					Events::trigger('Datin_updated', $id);
					$this->session->set_flashdata('success', sprintf(lang('Datin:edit_success'), $name));
				}
				else
				{
					$this->session->set_flashdata('error', sprintf(lang('Datin:edit_error'), $name));
				}

				redirect('admin/datin');
			}
		}
		$jenis_info_db=$this->db->get('master_jenis_informasis')->result();
		foreach($jenis_info_db as $ji){
			$name = $ji->master_jenis_informasi_name;
			$idji = $ji->id;
			$jenis_info[$idji]=$name;
		}

		$urusandb=$this->db->get('master_urusans')->result();
		foreach($urusandb as $ures){
			$name = $ures->master_urusan_name;
			$idji = $ures->id;
			$urusan[$idji]=$name;
		}
		$this->template
			->title($this->module_details['name'], sprintf(lang('Datin:edit_title'), $Datin->Datin_name))
			->append_js('module::datin.js') 
			->set('jenis_info',$jenis_info)
			->set('urusan',$urusan)
			->set('Datin', $Datin)
			->build('admin/form');
	}

	/**
	 * Delete Datin role(s)
	 *
	 * 
	 *
	 * @param int $id The ID of the Datin to delete
	 *
	 * @return void
	 */
	public function delete($id = 0)
	{
		if ($success = $this->Datin_m->delete($id))
		{
			// Fire an event. A Datin has been deleted.
			Events::trigger('Datin_deleted', $id);
			$this->session->set_flashdata('success', lang('Datin:delete_success'));
		}
		else
		{
			$this->session->set_flashdata('error', lang('Datin:delete_error'));
		}

		redirect('admin/Datin');
	}

	public function autocomplete()
	{
		echo json_encode(
			$this->Datin_m->select('Datin_name value')
				->like('Datin_name', $this->input->get('term'))
				->get_all()
		);
	}

	public function _check_title($title, $id = null)
	{
		$this->form_validation->set_message('_check_title', sprintf(lang('jenisbarang:already_exist_error'), lang('global:title')));

		return $this->check_exists('Datin_name', $title, $this->uri->segment(4));
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
			$this->db->where('Datin_name',$value);
			$this->db->where('id <>',$id);
			$res = $this->db->get('Datins')->row();
			if($res==''){
				$this->session->set_flashdata('success', 'Data Berhasil disimpan!');
				return true;
			}else{
				$this->session->set_flashdata('error', 'Data tidak dapat digunakan!');
				return false;
			}
		}else{
			$this->db->where('Datin_name',$value); 
			$res = $this->db->get('Datins')->row();
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
