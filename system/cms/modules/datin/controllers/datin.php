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
		->append_js('module::datin.js')
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
			$html .= '<small><i class="fal fa-paperclip"></i> <a href="'.base_url().'assets/dokumen/'.$val->dokumen.'">'.$val->dokumen.'</small>' ;
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
 
}
