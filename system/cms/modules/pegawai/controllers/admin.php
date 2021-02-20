<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Maintain a central list of pegawais to label and organize your content.
 *
 * @author PyroCMS Dev Team
 * @package PyroCMS\Core\Modules\pegawais\Controllers
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

		$this->load->model('pegawai_m');

		$this->lang->load('pegawais');

		// Validation rules
		$this->validation_rules = array(
			array(
				'field' => 'display_name',
				'label' => 'Nama Lengkap',
				'rules' => 'trim|required'
			),
			array(
				'field' => 'NIP',
				'label' => 'NIP Lengkap',
				'rules' => 'trim|required'
			),
			array(
				'field' => 'NRK',
				'label' => 'NRK Lengkap',
				'rules' => 'trim|required'
			),array(
				'field' => 'id_jabatan',
				'label' => 'Jabatan harus lengkap',
				'rules' => 'trim|required'
			),array(
				'field' => 'id_pangkat',
				'label' => 'Pangkat harus Lengkap',
				'rules' => 'trim|required'
			),array(
				'field' => 'id_satuan_kerja',
				'label' => 'NRK Lengkap',
				'rules' => 'trim|required'
			),array(
				'field' => 'email',
				'label' => 'Email tidak boleh kosong',
				'rules' => 'trim|required'
			) ,array(
				'field' => 'password',
				'label' => 'Email tidak boleh kosong',
				'rules' => 'trim'
			) 
		);

		$this->template 
			->set_theme('admin') ;
	}

	/**
	 * Create a new pegawai
	 */
	public function index()
	{  
	 
		// Create pagination links
	 	$total_rows = $this->pegawai_m->count_by();
		$pagination = create_pagination_admin('admin/pegawai/index', $total_rows,20,4);
 
		$base_where =   $pagination;
		$pegawais = $this->pegawai_m->get_many_by($base_where);

		
		$this->template 
			->title($this->module_details['name']) 
		->append_js('module::function.js')
			->set('pegawais', $pegawais)
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
		$total_rows = $this->pegawai_m->count_by();
		$pagination = create_pagination_admin('admin/pegawai/index_json', $total_rows,20,4);
 
		$base_where =   $pagination;
		$pegawais = $this->pegawai_m->get_many_by($base_where);
		$res=array();
		$i=0;
		foreach($pegawais as $val){
			$res['data'][$i]['id']= $val->id;
			$res['data'][$i]['name']= $val->pegawai_name; 
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
		redirect('admin/pegawai/index');
	}

	 

	public function reset()
	{  
		$_SESSION['keyword'] = '';
		$_SESSION['kategori'] = '';
		redirect('admin/pegawai/index');
	}

	public function form(){
		$pegawai = new stdClass();
 
		$this->form_validation->set_rules($this->validation_rules);

		foreach ($this->validation_rules as $rule)
		{
			$pegawai->{$rule['field']} = set_value($rule['field']);
		}
		$this->load->view('admin/form_o',array('pegawai'=>$pegawai));
		}
	

		public function listdata(){
			header('Content-Type: application/json');
			$this->db->order_by('pegawai_name','ASC');
			$res = $this->db->get('pegawais')->result();
			foreach($res as $dat ){
				$arr['result'][]=array('label'=>$dat->pegawai_name,'value'=>$dat->id);
			}
			echo json_encode($arr);
		}

	/**
	 * Create a new pegawai
	 *
	 * 
	 * @return void
	 */
	public function add()
	{
		$pegawai = new stdClass();
		if($this->current_user->group_id =='12'){
			$this->session->set_flashdata('error', 'Anda tidak punya wewenang menambah data!');
			redirect('admin/pegawai');
		}

		$resjabatan = $this->db->get('master_jabatans')->result();
		foreach($resjabatan as $rj){
			$jabatan[$rj->id] = $rj->master_jabatan_name;
		}

		$pangkatarr = $this->db->get('master_pangkats')->result();
		foreach($pangkatarr as $rp){
			$pangkat[$rp->id] = $rp->master_pangkat_name;
		}

		$satuankerjaarr = $this->db->get('master_satuan_kerjas')->result();
		foreach($satuankerjaarr as $rs){
			$satuan_kerja[$rs->id] = $rs->master_satuan_kerja_name;
		}




		if ($_POST)
		{
			$this->form_validation->set_rules($this->validation_rules);

			$name = $this->input->post('display_name');
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$NRK = $this->input->post('NRK');
			$NIP = $this->input->post('NIP');
			$id_pangkat = $this->input->post('id_pangkat');
			$id_jabatan = $this->input->post('id_jabatan');
			$id_satuan_kerja = $this->input->post('id_satuan_kerja');



		$cekemail = $this->db->where('email',$email)->get('users')->row();

		if($cekemail){
			$this->session->set_flashdata('error', 'email sudah ada yang menggunakan!');
			$notice['error'] = 'email atau nomor KTP sudah ada yang menggunakan!';
			 
		}else{
		

			if ($this->form_validation->run())
			{
						$this->load->model('users/ion_auth_model');
						$salt = $this->ion_auth_model->salt();
						$pass = $this->ion_auth_model->hash_password($password,$salt); 

						$arrayusers = array(
							'email' => $email,
							'password'=>$pass,
							'salt'=>$salt,
							'group_id'=>12, 
							'created_on'=>now(),
							'last_login'=>now(),
							'username' => $email, 
							'NRK'=> $NRK,
							'NIP' => $NIP,
							'id_jabatan'=> $id_jabatan ,
							'id_pangkat'=> $id_pangkat ,
							'id_satuan_kerja'=> $id_satuan_kerja ,
							'active' => '1'
						); 

						$this->db->insert('users',$arrayusers);
						$id = $this->db->insert_id();

				if ($id)
				{
					$this->db->insert('profiles',array('user_id'=>$id,'lang'=>'en','display_name'=>$name,'first_name'=>$name,'last_name'=>$name));
					// Fire an event. A new pegawai has been added. 

					$this->session->set_flashdata('success', sprintf(lang('pegawai:add_success')));
					
				}
				else
				{
					$this->session->set_flashdata('error', sprintf(lang('pegawai:add_error')));
				}

				redirect('admin/pegawai/edit/'.$id);
			}
		}
	}
 

		// Loop through each validation rule
		foreach ($this->validation_rules as $rule)
		{
			$pegawai->{$rule['field']} = @$_POST[$rule['field']];;
		}
 
		$this->template
			->title($this->module_details['name'], lang('pegawai:add_title'))
			->append_js('module::function.js')
			->set('pegawai', $pegawai)
			->set('jabatan',$jabatan)
			->set('pangkat',$pangkat)
			->set('satuan_kerja',$satuan_kerja)
			->build('admin/form');
	}

	public function add_json()
	{  header('Content-Type: application/json');
		$arr=array();
		$this->db->where('name',$this->input->post('name'));
		$cek = $this->db->get('pegawais')->row();
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

			$name = $this->input->post('pegawai_name');

			if ($this->form_validation->run())
			{
				if ($id = $this->pegawai_m->insert(array('pegawai_name' => $name,
				'user_id'=>$this->current_user->id, 
				)))
				{
					// Fire an event. A new pegawai_supplier has been added. 
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

			$name = $this->input->post('pegawai_name');

			if ($this->form_validation->run())
			{
				if ($success = $this->pegawai_m->update($id, array('pegawai_name' => $name,'user_id'=>$this->current_user->id)))
				 
				{
					// Fire an event. A new pegawai_supplier has been added. 
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
	 * Edit a pegawai
	 *
	 * 
	 *
	 * @param int $id The ID of the pegawai to edit
	 *
	 * @return void
	 */
	public function edit($id = 0)
	{
		$this->db->select('users.*,profiles.display_name');
		$pegawai = $this->db->join('profiles',' profiles.user_id=users.id')->where('users.id',$id)->get('users')->row();
		$resjabatan = $this->db->get('master_jabatans')->result();
		foreach($resjabatan as $rj){
			$jabatan[$rj->id] = $rj->master_jabatan_name;
		}

		$pangkatarr = $this->db->get('master_pangkats')->result();
		foreach($pangkatarr as $rp){
			$pangkat[$rp->id] = $rp->master_pangkat_name;
		}

		$satuankerjaarr = $this->db->get('master_satuan_kerjas')->result();
		foreach($satuankerjaarr as $rs){
			$satuan_kerja[$rs->id] = $rs->master_satuan_kerja_name;
		}
		// Make sure we found something
		$pegawai or redirect('admin/pegawai');

		$pegawai->password = ''; 

		if ($_POST)
		{
			$this->form_validation->set_rules($this->validation_rules);

			$name = $this->input->post('display_name');

			if ($this->form_validation->run())
			{
				$name = $this->input->post('display_name');
				$email = $this->input->post('email');
				$password = $this->input->post('password');
				$NRK = $this->input->post('NRK');
				$NIP = $this->input->post('NIP');
				$id_pangkat = $this->input->post('id_pangkat');
				$id_jabatan = $this->input->post('id_jabatan');
				$id_satuan_kerja = $this->input->post('id_satuan_kerja');

				
				$arrayusers = array(
					'email' => $email,  
					'created_on'=>now(),
					'last_login'=>now(),
					'username' => $email, 
					'NRK'=> $NRK,
					'NIP' => $NIP,
					'id_jabatan'=> $id_jabatan ,
					'id_pangkat'=> $id_pangkat ,
					'id_satuan_kerja'=> $id_satuan_kerja ,
					'active' => '1'
				); 

				if(!in_array($pegawai->group_id,array('1','11','10'))){
					$arrayusers['group_id'] = '12';
				}

				if($password){
					$this->load->model('users/ion_auth_model');
						$salt = $this->ion_auth_model->salt();
						$pass = $this->ion_auth_model->hash_password($password,$salt); 
						$arrayusers['password'] = $pass;
						$arrayusers['salt'] = $salt;
				}
 
		 	
			 if($this->current_user->group_id =='12'){
				$this->db->where('id',$this->current_user->id);
				}else{
					$this->db->where('id',$id); 
				}

				if ($this->db->update('users',$arrayusers))
				{
					$this->db->where('user_id',$id); 
					$this->db->update('profiles',array('display_name'=>$name,'first_name'=>$name,'last_name'=>$name));
					// Fire an event. A pegawai has been updated.
					Events::trigger('pegawai_updated', $id);
					$this->session->set_flashdata('success', sprintf(lang('pegawai:edit_success'), $name));
				}
				else
				{
					$this->session->set_flashdata('error', sprintf(lang('pegawai:edit_error'), $name));
				}

				redirect('admin/pegawai/edit/'.$id);
			}
		}

		$this->template
			->title($this->module_details['name'], sprintf(lang('pegawai:edit_title'), $pegawai->display_name))
			->append_js('module::function.js')
			->set('pegawai', $pegawai)
			->set('jabatan',$jabatan)
			->set('pangkat',$pangkat)
			->set('satuan_kerja',$satuan_kerja)
			->build('admin/form');
	}

	public function struktural_add(){
		
		$img = upload_image('product_image','pegawai');
		if($img){
		$arr=array(
			'nama' => $this->input->post('namajabatan'),
			'mulai' => $this->input->post('mulai'),
			'akhir' => $this->input->post('akhir'),
			'id_pegawai' => $this->input->post('user_id'),
			'dok_path' => $img['data'],
			'kategori' => $this->input->post('kategori')
		);

		$this->db->insert('pegawai_dokumen',$arr);
		$idres = $this->db->insert_id();

		if($idres){
			$this->session->set_flashdata('success', 'Data Berhasil disimpan');
		}else{
			$this->session->set_flashdata('error', 'Data gagal disimpan');
		}
		}else{
			$this->session->set_flashdata('error','Dokumen yang anda kirim tidak sesuai dengan format kami!');
		}
		
		redirect('admin/pegawai/edit/'.$this->input->post('user_id'));
	}

	public function rs($id=0){
		$this->db->where('id',$this->input->get('id'));
		$this->db->delete('pegawai_dokumen');
		redirect('admin/pegawai/edit/'.$this->input->get('user_id'));
	}

	public function pangkat(){
		header('Content-Type: application/json');
		$this->db->order_by('id','ASC');
		$res = $this->db->get('master_pangkats')->result();
		foreach($res as $dat ){
			$arr['result'][]=array('label'=>$dat->master_pangkat_name,'value'=>$dat->master_pangkat_name);
		}
		echo json_encode($arr);
	}

	/**
	 * Delete pegawai role(s)
	 *
	 * 
	 *
	 * @param int $id The ID of the pegawai to delete
	 *
	 * @return void
	 */
	public function delete($id = 0)
	{
		if($this->current_user->group_id =='12'){
			$this->session->set_flashdata('error', 'Anda tidak punya wewenang menghapus!');
			redirect('admin/pegawai');
			}

		if ($this->db->where('id',$id)->update('users',array('active'=>'0')))
		{
			// Fire an event. A pegawai has been deleted.
			Events::trigger('pegawai_deleted', $id);
			$this->session->set_flashdata('success', lang('pegawai:delete_success'));
		}
		else
		{
			$this->session->set_flashdata('error', lang('pegawai:delete_error'));
		}

		redirect('admin/pegawai');
	}

	public function autocomplete()
	{
		echo json_encode(
			$this->pegawai_m->select('pegawai_name value')
				->like('pegawai_name', $this->input->get('term'))
				->get_all()
		);
	}

	public function _check_title($title, $id = null)
	{
		$this->form_validation->set_message('_check_title', sprintf(lang('jenisbarang:already_exist_error'), lang('global:title')));

		return $this->check_exists('pegawai_name', $title, $this->uri->segment(4));
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
			$this->db->where('pegawai_name',$value);
			$this->db->where('id <>',$id);
			$res = $this->db->get('pegawais')->row();
			if($res==''){
				$this->session->set_flashdata('success', 'Data Berhasil disimpan!');
				return true;
			}else{
				$this->session->set_flashdata('error', 'Data tidak dapat digunakan!');
				return false;
			}
		}else{
			$this->db->where('pegawai_name',$value); 
			$res = $this->db->get('pegawais')->row();
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
