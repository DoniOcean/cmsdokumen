<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Keyword model
 *
 * @author		PyroCMS Dev Team
 * @package		PyroCMS\Core\Modules\master_satuan_kerja\Models
 */
class Master_satuan_kerja_m extends MY_Model {
	
	/**
	 * Get applied
	 *
	 * Gets all the master_satuan_kerja applied with a certain hash
	 *
	 * @param	string	$hash	The unique hash stored for a entry
	 * @return	array
	 */
	public function get_applied($hash)
	{
		return $this->db
			->select('name')
			->where('hash', $hash)
			->join('master_satuan_kerja', 'keyword_id = master_satuan_kerja.id')
			->order_by('name')
			->get('master_satuan_kerja_applied')
			->result();
	}
	
	/**
	 * Delete applied
	 *
	 * Deletes all the master_satuan_kerja applied byhash
	 *
	 * @param	string	$hash	The unique hash stored for a entry
	 * @return	array
	 */
	public function delete_applied($hash)
	{
		return $this->db
			->where('hash', $hash)
			->delete('master_satuan_kerja_applied');
	}

	function count_by()
	{
		  if(!empty($_SESSION['keyword'])){
			$this->db->like('master_satuan_kerja_name',$_SESSION['keyword']);
		  }

		return $this->db->count_all_results('master_satuan_kerjas');
	}

	function get_many_by($params = array())
	{
		if(!empty($_SESSION['keyword'])){
			$this->db->like('master_satuan_kerja_name',$_SESSION['keyword']);
		  }
		// Limit the results based on 1 number or 2 (2nd is offset)
		$this->db->limit($params['limit'], $params['offset']);

		return $this->get_all();
	}
}