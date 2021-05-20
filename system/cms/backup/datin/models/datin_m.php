<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Keyword model
 *
 * @author		PyroCMS Dev Team
 * @package		PyroCMS\Core\Modules\datin\Models
 */
class datin_m extends MY_Model {
	
	/**
	 * Get applied
	 *
	 * Gets all the datin applied with a certain hash
	 *
	 * @param	string	$hash	The unique hash stored for a entry
	 * @return	array
	 */
	public function get_applied($hash)
	{
		return $this->db
			->select('name')
			->where('hash', $hash)
			->join('datin', 'keyword_id = datin.id')
			->order_by('name')
			->get('datin_applied')
			->result();
	}
	
	/**
	 * Delete applied
	 *
	 * Deletes all the datin applied byhash
	 *
	 * @param	string	$hash	The unique hash stored for a entry
	 * @return	array
	 */
	public function delete_applied($hash)
	{
		return $this->db
			->where('hash', $hash)
			->delete('datin_applied');
	}

	function count_by()
	{
		  if(!empty($_SESSION['keyword'])){
			$this->db->like('datin_name',$_SESSION['keyword']);
		  }

		return $this->db->count_all_results('datins');
	}

	function get_many_by($params = array())
	{
		$this->db->select(' datins.*,master_jenis_informasis.master_jenis_informasi_name as ji,master_urusans.master_urusan_name as mu');
		if(!empty($_SESSION['keyword'])){
			$this->db->like("CONCAT(datin_name,' ',ringkasan)",$_SESSION['keyword']);
		  }

		  if(!empty($_SESSION['kategori'])){
			$this->db->where("urusan",$_SESSION['kategori']);
		  }

		  if(!empty($_SESSION['jenis_informasi'])){
			$this->db->where("jenis_informasi",$_SESSION['jenis_informasi']);
		  }

		// Limit the results based on 1 number or 2 (2nd is offset)
		$this->db->limit($params['limit'], $params['offset']);
		
		$this->db->join('master_jenis_informasis','master_jenis_informasis.id=datins.jenis_informasi');
		$this->db->join('master_urusans','master_urusans.id=datins.urusan');
		$this->db->order_by('id','DESC');
		return $this->db->get('datins')->result();
	}
}