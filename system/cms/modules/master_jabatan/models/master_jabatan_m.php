<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Keyword model
 *
 * @author		PyroCMS Dev Team
 * @package		PyroCMS\Core\Modules\master_jabatan\Models
 */
class Master_jabatan_m extends MY_Model {
	
	/**
	 * Get applied
	 *
	 * Gets all the master_jabatan applied with a certain hash
	 *
	 * @param	string	$hash	The unique hash stored for a entry
	 * @return	array
	 */
	public function get_applied($hash)
	{
		return $this->db
			->select('name')
			->where('hash', $hash)
			->join('master_jabatan', 'keyword_id = master_jabatan.id')
			->order_by('name')
			->get('master_jabatan_applied')
			->result();
	}
	
	/**
	 * Delete applied
	 *
	 * Deletes all the master_jabatan applied byhash
	 *
	 * @param	string	$hash	The unique hash stored for a entry
	 * @return	array
	 */
	public function delete_applied($hash)
	{
		return $this->db
			->where('hash', $hash)
			->delete('master_jabatan_applied');
	}

	function count_by()
	{
		  if(!empty($_SESSION['keyword'])){
			$this->db->like('master_jabatan_name',$_SESSION['keyword']);
		  }

		return $this->db->count_all_results('master_jabatans');
	}

	function get_many_by($params = array())
	{
		if(!empty($_SESSION['keyword'])){
			$this->db->like('master_jabatan_name',$_SESSION['keyword']);
		  }
		// Limit the results based on 1 number or 2 (2nd is offset)
		$this->db->limit($params['limit'], $params['offset']);

		return $this->get_all();
	}
}