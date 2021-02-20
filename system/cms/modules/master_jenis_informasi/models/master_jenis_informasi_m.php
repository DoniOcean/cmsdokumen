<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Keyword model
 *
 * @author		PyroCMS Dev Team
 * @package		PyroCMS\Core\Modules\master_jenis_informasi\Models
 */
class Master_jenis_informasi_m extends MY_Model {
	
	/**
	 * Get applied
	 *
	 * Gets all the master_jenis_informasi applied with a certain hash
	 *
	 * @param	string	$hash	The unique hash stored for a entry
	 * @return	array
	 */
	public function get_applied($hash)
	{
		return $this->db
			->select('name')
			->where('hash', $hash)
			->join('master_jenis_informasi', 'keyword_id = master_jenis_informasi.id')
			->order_by('name')
			->get('master_jenis_informasi_applied')
			->result();
	}
	
	/**
	 * Delete applied
	 *
	 * Deletes all the master_jenis_informasi applied byhash
	 *
	 * @param	string	$hash	The unique hash stored for a entry
	 * @return	array
	 */
	public function delete_applied($hash)
	{
		return $this->db
			->where('hash', $hash)
			->delete('master_jenis_informasi_applied');
	}

	function count_by()
	{
		  if(!empty($_SESSION['keyword'])){
			$this->db->like('master_jenis_informasi_name',$_SESSION['keyword']);
		  }

		return $this->db->count_all_results('master_jenis_informasis');
	}

	function get_many_by($params = array())
	{
		if(!empty($_SESSION['keyword'])){
			$this->db->like('master_jenis_informasi_name',$_SESSION['keyword']);
		  }
		// Limit the results based on 1 number or 2 (2nd is offset)
		$this->db->limit($params['limit'], $params['offset']);

		return $this->get_all();
	}
}