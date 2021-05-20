<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Maintain a central list of datins to label and organize your content.
 *
 * @author PyroCMS Dev Team
 * @package PyroCMS\Core\Modules\datins\Controllers
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

		$this->load->model('datin_m');

		$this->lang->load('datins');

		// Validation rules
		$this->validation_rules = array(
			array(
				'field' => 'datin_name',
				'label' => lang('datin:name'),
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
				'field' => 'id',
				'label' => 'Tanggal Dokumen',
				'rules' => 'trim'
			),array(
				'field' => 'bulan',
				'label' => 'Bulan Dokumen',
				'rules' => 'required'
			),array(
				'field' => 'tahun',
				'label' => 'Tahun Dokumen',
				'rules' => 'required'
			),
		);

		$this->template 
			->set_theme('admin') ;
	}

	/**
	 * Create a new datin
	 */
	public function index()
	{  
	  
		 
		// Create pagination links
	 	$total_rows = $this->datin_m->count_by();
		$pagination = create_pagination_admin('admin/datin/index', $total_rows,20,4);
 
		$base_where =   $pagination;
		$datins = $this->datin_m->get_many_by($base_where);
		
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
			->set('datins', $datins)
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
		$total_rows = $this->datin_m->count_by();
		$pagination = create_pagination_admin('admin/datin/index_json', $total_rows,20,4);
 
		$base_where =   $pagination;
		$datins = $this->datin_m->get_many_by($base_where);
		$res=array();
		$i=0;
		foreach($datins as $val){
			$res['data'][$i]['id']= $val->id;
			$res['data'][$i]['name']= $val->datin_name; 
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
		$_SESSION['bulan'] = $this->input->post('bulan');
		$_SESSION['tahun'] = $this->input->post('tahun');

		redirect('admin/datin/index');
	}

	 

	public function reset()
	{  
		$_SESSION['keyword'] = '';
		$_SESSION['kategori'] = '';
		$_SESSION['bulan'] = '';
		$_SESSION['tahun'] = '';
		$_SESSION['jenis_informasi'] = '';
		redirect('admin/datin/index');
	}

	public function form(){
		$datin = new stdClass();
 
		$this->form_validation->set_rules($this->validation_rules);

		foreach ($this->validation_rules as $rule)
		{
			$datin->{$rule['field']} = set_value($rule['field']);
		}
		$this->load->view('admin/form_o',array('datin'=>$datin));
		}
	

		public function listdata(){
			header('Content-Type: application/json');
			$this->db->order_by('datin_name','ASC');
			$res = $this->db->get('datins')->result();
			foreach($res as $dat ){
				$arr['result'][]=array('label'=>$dat->datin_name,'value'=>$dat->id);
			}
			echo json_encode($arr);
		}

	/**
	 * Create a new datin
	 *
	 * 
	 * @return void
	 */
	public function add()
	{
		$datin = new stdClass();

		if ($_POST)
		{
			$this->form_validation->set_rules($this->validation_rules);

			$name = $this->input->post('datin_name');

			if ($this->form_validation->run())
			{
				$datainsert = array('datin_name' => $name,
									'user_id'=>$this->current_user->id,
									'jenis_informasi' =>  $this->input->post('jenis_informasi'),
									'urusan' =>  $this->input->post('urusan'),
									'bulan' =>  $this->input->post('bulan'),
									'tahun' =>  $this->input->post('tahun'),
									'tgl_input' => date('Y-m-d H:i:s'),
									'status' =>  $this->input->post('status'),
									'ringkasan' =>  $this->input->post('ringkasan'),
								);
				if ($id = $this->datin_m->insert($datainsert))
				{
					// Fire an event. A new datin has been added.
					Events::trigger('datin_created', $id);

					$this->session->set_flashdata('success', sprintf(lang('datin:add_success'), $name));
				}
				else
				{
					$this->session->set_flashdata('error', sprintf(lang('datin:add_error'), $name));
				}

				redirect('admin/datin/edit/'.$id);
			}
		}

		$datin = new stdClass();

		// Loop through each validation rule
		foreach ($this->validation_rules as $rule)
		{
			$datin->{$rule['field']} = set_value($rule['field']);
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
			->title($this->module_details['name'], lang('datin:add_title'))
			->append_js('module::datin.js')
			->set('datin', $datin)
			->set('jenis_info',$jenis_info)
			->set('urusan',$urusan)
			->build('admin/form');
	}

	public function add_json()
	{  header('Content-Type: application/json');
		$arr=array();
		$this->db->where('name',$this->input->post('name'));
		$cek = $this->db->get('datins')->row();
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

			$name = $this->input->post('datin_name');

			if ($this->form_validation->run())
			{
				if ($id = $this->datin_m->insert(array('datin_name' => $name,
				'user_id'=>$this->current_user->id, 
				)))
				{
					// Fire an event. A new datin_supplier has been added. 
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

			$name = $this->input->post('datin_name');

			if ($this->form_validation->run())
			{
				$datainsert = array('datin_name' => $name,
									'user_id'=>$this->current_user->id,
									'jenis_informasi' =>  $this->input->post('jenis_informasi'),
									'urusan' =>  $this->input->post('urusan'), 
									'bulan' =>  $this->input->post('bulan'),
									'tahun' =>  $this->input->post('tahun'),
									'status' =>  $this->input->post('status'),
									'ringkasan' =>  $this->input->post('ringkasan'),
								);
				if ($success = $this->datin_m->update($id, $datainsert))
				 
				{
					// Fire an event. A new datin_supplier has been added. 
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
	 * Edit a datin
	 *
	 * 
	 *
	 * @param int $id The ID of the datin to edit
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
			$arr['status']='ok';
		}else{
			$arr['status']='gagal';
		}
		 
		
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
		$datin = $this->datin_m->get($id);

		// Make sure we found something
		$datin or redirect('admin/datin');

		if ($_POST)
		{
			$this->form_validation->set_rules($this->validation_rules);

			$name = $this->input->post('datin_name');

			if ($this->form_validation->run())
					{$datainsert = array('datin_name' => $name,
						'user_id'=>$this->current_user->id,
						'jenis_informasi' =>  $this->input->post('jenis_informasi'),
						'urusan' =>  $this->input->post('urusan'), 
						'bulan' =>  $this->input->post('bulan'),
						'tahun' =>  $this->input->post('tahun'),
						'status' =>  $this->input->post('status'),
						'ringkasan' =>  $this->input->post('ringkasan'),
					);
				if ($success = $this->datin_m->update($id, $datainsert)){
					// Fire an event. A datin has been updated.
					Events::trigger('datin_updated', $id);
					$this->session->set_flashdata('success', sprintf(lang('datin:edit_success'), $name));
				}
				else
				{
					$this->session->set_flashdata('error', sprintf(lang('datin:edit_error'), $name));
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
			->title($this->module_details['name'], sprintf(lang('datin:edit_title'), $datin->datin_name))
			->append_js('module::datin.js') 
			->set('jenis_info',$jenis_info)
			->set('urusan',$urusan)
			->set('datin', $datin)
			->build('admin/form');
	}

	/**
	 * Delete datin role(s)
	 *
	 * 
	 *
	 * @param int $id The ID of the datin to delete
	 *
	 * @return void
	 */
	public function delete($id = 0)
	{
		if ($success = $this->datin_m->delete($id))
		{
			// Fire an event. A datin has been deleted.
			Events::trigger('datin_deleted', $id);
			$this->session->set_flashdata('success', lang('datin:delete_success'));
		}
		else
		{
			$this->session->set_flashdata('error', lang('datin:delete_error'));
		}

		redirect('admin/datin');
	}

	public function autocomplete()
	{
		echo json_encode(
			$this->datin_m->select('datin_name value')
				->like('datin_name', $this->input->get('term'))
				->get_all()
		);
	}

	public function _check_title($title, $id = null)
	{
		$this->form_validation->set_message('_check_title', sprintf(lang('jenisbarang:already_exist_error'), lang('global:title')));

		return $this->check_exists('datin_name', $title, $this->uri->segment(4));
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
			$this->db->where('datin_name',$value);
			$this->db->where('id <>',$id);
			$res = $this->db->get('datins')->row();
			if($res==''){
				$this->session->set_flashdata('success', 'Data Berhasil disimpan!');
				return true;
			}else{
				$this->session->set_flashdata('error', 'Data tidak dapat digunakan!');
				return false;
			}
		}else{
			$this->db->where('datin_name',$value); 
			$res = $this->db->get('datins')->row();
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
