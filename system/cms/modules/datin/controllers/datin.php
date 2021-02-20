<?php defined('BASEPATH') or exit('No direct script access allowed');
/**
 * Public Blog module controller
 *
 * @author  PyroCMS Dev Team
 * @package PyroCMS\Core\Modules\Blog\Controllers
 */
class Datin extends Public_Controller
{
	/**
	 * Every time this controller is called should:
	 * - load the blog and blog_categories models.
	 * - load the keywords library.
	 * - load the blog language file.
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Datin_m');
	}

	/**
	 * Index
	 *
	 * List out the blog posts.
	 *
	 * URIs such as `blog/page/x` also route here.
	 */
	public function index()
	{
		// Create pagination links
		$total_rows = $this->Datin_m->where('datins.status','Publik')->count_by();
		$pagination = create_pagination_admin('datin/index', $total_rows,20,3);
 
		$base_where =   $pagination;
		$Datins = $this->Datin_m->where('datins.status','Publik')->get_many_by($base_where);

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


		$this->template->title($this->module_details['name'])
		->set_metadata('description', 'Pusat Data dan informasi')
		->set_metadata('keywords', 'Data dan informasi') 
		->append_js('module::datin_home.js')
		->set('Datins', $Datins)
		->set('pagination', $pagination)
		->set('jenis', $jenis_info)
		->set('urusan', $urusan)
		->set('total',$total_rows) 
		->build('index');
	}

	public function listdata($id="")
	{
		header('Content-Type: application/json');
		$this->db->select(' datins.*,master_jenis_informasis.master_jenis_informasi_name as ji,master_urusans.master_urusan_name as mu');
	    $this->db->where('datins.id',$id);
		$this->db->join('master_jenis_informasis','master_jenis_informasis.id=datins.jenis_informasi');
		$this->db->join('master_urusans','master_urusans.id=datins.urusan'); 
		$res = $this->db->get('datins')->row();

		$html = '<small>Nama Dokumen :</small>  <br><b>'.$res->Datin_name.'</b>';
		$html .= '<br><small>Ringkasan :</small>  <br><em>'.$res->ringkasan.'</em>';
		$html .= '<br><small>Jenis Informasi :</small>  <br><b>'.$res->ji.'</b>';
		$html .= '<br><small>Urusan :</small>  <br><b>'.$res->mu.'</b>';
		$html .= '<p>';

		$this->db->where('master_id',$res->id); 
		$this->db->order_by('id','DESC');
		$resdetail = $this->db->get('datins_applied')->result();

		$html .= '<table class="table m-0"><thead><tr><th>Dokumen</th></tr></thead>';
		foreach($resdetail as $val){
			$html .= '<tr>';
			$html .= '<td>';
			$html .= '<small><i class="fal fa-paperclip"></i> <a href="javascript:void(0)" onClick="download_dok(\''.base_url().'assets/dokumen/'.$val->dokumen.'\',\''.$val->id.'\')">'.$val->dokumen.'</small>' ;
			$html .= '</td>';
			$html .= '<tr>';
		}
		$html .= '</table>';

		$arr['isi'] = $html;
		echo json_encode($arr);
	}

	public function search()
	{  
		$_SESSION['keyword'] = $this->input->post('search');
		$_SESSION['kategori'] = $this->input->post('kategorisrch');
		$_SESSION['jenis_informasi'] = $this->input->post('jenis_informasi');
		redirect('datin/index');
	}

	 

	public function reset()
	{  
		$_SESSION['keyword'] = '';
		$_SESSION['kategori'] = '';
		$_SESSION['jenis_informasi'] = '';
		redirect('datin/index');
	}

	public function update_download($id=""){
		header('Content-Type: application/json');
		$this->db->query('UPDATE default_datins_applied SET download = download + 1 WHERE id ='.$id);
		echo json_encode($arr['status']='ok');
	}

	public function urusan(){  
		$this->db->select("sum(default_datins_applied.download)as jml,master_urusans.master_urusan_name as nama");
 
		$this->db->join('datins_applied','datins_applied.master_id=datins.id'); 
		$this->db->join('master_urusans','master_urusans.id=datins.urusan'); 
		$this->db->group_by("master_urusans.master_urusan_name");
		$res = $this->db->get('datins')->result();		
		$html='Categories,Jumlah '."\r\n"; 
		foreach($res as $val){
			$html.= str_replace(' ','_',$val->nama).','.$val->jml." \r\n";
		}
					
				
				 	echo $html; 
					 //echo "Server,Instance Load \nec2-310-67-177.compute-1.amazonaws.com,93.31520951357652 \nec2-285-167-103.compute-1.amazonaws.com,45.337991729357434";
	}

	public function jenis_info(){  
		$this->db->select("sum(default_datins_applied.download)as jml,master_jenis_informasis.master_jenis_informasi_name as nama");
 
		$this->db->join('datins_applied','datins_applied.master_id=datins.id'); 
		$this->db->join('master_jenis_informasis','master_jenis_informasis.id=datins.jenis_informasi'); 
		$this->db->group_by("master_jenis_informasis.master_jenis_informasi_name");
		$res = $this->db->get('datins')->result();		
		$html='Categories,Jumlah '."\r\n"; 
		foreach($res as $val){
			$html.= str_replace(' ','_',$val->nama).','.$val->jml." \r\n";
		}
					
				
				 	echo $html; 
					 //echo "Server,Instance Load \nec2-310-67-177.compute-1.amazonaws.com,93.31520951357652 \nec2-285-167-103.compute-1.amazonaws.com,45.337991729357434";
	}
 
}
