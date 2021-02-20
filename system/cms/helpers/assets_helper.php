<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * CodeIgniter Debug Helpers
 *
 * @author      PyroCMS Dev Team
 * @copyright   Copyright (c) 2012, PyroCMS LLC
 * @package		PyroCMS\Core\Helpers
 */

/**
 * Debug Helper
 *
 * Outputs the given variable with formatting and location
 */ 

function tanggal($unix, $format = '')
	{
		 return date_format(date_create($unix),'d-m-Y');
	}

	function do_upload($input){
		$CI = & get_instance();

        $config['upload_path'] = './assets/dokumen/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf|txt|docx'; //type yang dapat diakses bisa anda sesuaikan
        $config['encrypt_name'] = TRUE; //Enkripsi nama yang terupload
		$CI->load->library('upload', $config);
        $CI->upload->initialize($config);
        if(!empty($_FILES[$input]['name'])){
 
            if ($CI->upload->do_upload($input)){
                $gbr = $CI->upload->data();
				//Compress Image
			 

				if($CI->upload->data('file_ext')=='.jpg'){

			 
                $config['image_library']='gd2';
                $config['source_image']=$config['upload_path'].$gbr['file_name'];
                $config['create_thumb']= FALSE;
                $config['maintain_ratio']= FALSE;
                $config['quality']= '50%';
                $config['width']= 595;
                $config['height']= 842;
                $config['new_image']= $config['upload_path'].$gbr['file_name'];
                $CI->load->library('image_lib', $config);
				$CI->image_lib->resize();
				}
    
				   $gambar=$gbr['file_name'];
                   $ret['type'] = $gbr['file_ext'];
				   $ret['status']='ok';
				   $ret['data'] = $gambar;
				   return $ret;   

            }else{
				return $ret['status']='error';// "File image yang anda gunakan tidak sesuai,hanya menerima format .jpg"; 
			}
                      
        }else{ 
			return $ret['status']='error';
        }
                 
	}
	 

    function data_enum($table , $field){
        $obj =& get_instance();
        $query = "SHOW COLUMNS FROM ".$table." LIKE '$field'";
         $row = $obj->db->query("SHOW COLUMNS FROM ".$table." LIKE '$field'")->row()->Type;  
         $regex = "/'(.*?)'/";
                preg_match_all( $regex , $row, $enum_array );
                $enum_fields = $enum_array[1];
                foreach ($enum_fields as $key=>$value)
                {
                    $enums[$value] = $value; 
                }
                return $enums;
    }

    

function bulan($bln=""){
		 
    switch ($bln) {
    case 1:
        return 'Januari';
        break;
    case 2:
        return 'Februari';
        break;
    case 3:
        return 'Maret';
        break;
    case 4:
        return 'April';
        break;
    case 5:
        return 'Mei';
        break;
    case 6:
        return 'Juni';
        break;
    case 7:
        return 'Juli';
        break;
    case 8:
        return 'Agustus';
        break;
    case 9:
        return 'September';
        break;
    case 10:
        return 'Oktober';
        break;
    case 11:
        return 'November';
        break;
    case 12:
        return 'Desember';
        break;
    }
}


function bln(){
$bulan=array(
         '01' => 'January',
         '02' => 'Februari',
         '03' => 'Maret',
         '04' => 'April',
         '05' => 'Mei',
         '06' => 'Juni',
         '07' => 'July',
         '08' => 'Agustus',
         '09' => 'September',
         '10' => 'Oktober',
         '11' => 'November',
         '12' => 'Desember' 

         
         );
return $bulan;
}

function tgl(){

for($i=1;$i<=31;$i++){
    $frm=str_pad($i,2,'0',STR_PAD_LEFT);
    $tgl[$frm]=$frm;
}
return $tgl;
}

function thn($awal="",$akhir=""){
if($awal==''){
    $awal='2000';
}

if($akhir==''){
    $akhir=date('Y');
}

for($i=$awal;$i<=$akhir;$i++){
    $year[$i]=$i;
}

return $year;
}

function time_elapsed_string($datetime, $full = false) {
$now = new DateTime;
$ago = new DateTime($datetime);
$diff = $now->diff($ago);

$diff->w = floor($diff->d / 7);
$diff->d -= $diff->w * 7;

$string = array(
    'y' => 'tahun',
    'm' => 'bulan',
    'w' => 'minggu',
    'd' => 'hari',
    'h' => 'jam',
    'i' => 'menit',
    's' => 'detik',
);
foreach ($string as $k => &$v) {
    if ($diff->$k) {
        $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? '' : '');
    } else {
        unset($string[$k]);
    }
}

if (!$full) $string = array_slice($string, 0, 1);
return $string ? implode(', ', $string) . ' yang lalu' : 'Baru saja';
}

function hitunghari($datetime, $full = false) {
$now = new DateTime;
$ago = new DateTime($datetime);
$diff = $now->diff($ago);

$diff->w = floor($diff->d / 7);
$diff->d -= $diff->w * 7;

return $diff->days;
}

function timeAgo($time=""){
$periods = array("detik", "menit", "jam", "hari", "minggu", "bulan", "tahun", "dekade");
$lengths = array("60","60","24","7","4.35","12","10");

$now = time();

   $difference     = $now - $time;
   $tense         = "yang lalu";

for($j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++) {
   $difference /= $lengths[$j];
}

$difference = round($difference);

if($difference != 1) {
   $periods[$j].= "";
}

return $difference.' '.$periods[$j].' '.$tense;
}

function days_in_month($bln="",$thn=""){
return cal_days_in_month(CAL_GREGORIAN, $bln, $thn);
}

function dmy($originalDate){ 
        return  $newDate = date("d-m-Y", strtotime($originalDate));
}

