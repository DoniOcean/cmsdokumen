<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Keyword model
 *
 * @author		PyroCMS Dev Team
 * @package		PyroCMS\Core\Modules\agama\Models
 */
class Agama_m extends MY_Model {
	
	/**
	 * Get applied
	 *
	 * Gets all the agama applied with a certain hash
	 *
	 * @param	string	$hash	The unique hash stored for a entry
	 * @return	array
	 */
	public function get_applied($hash)
	{
		return $this->db
			->select('name')
			->where('hash', $hash)
			->join('agama', 'keyword_id = agama.id')
			->order_by('name')
			->get('agama_applied')
			->result();
	}
	
	/**
	 * Delete applied
	 *
	 * Deletes all the agama applied byhash
	 *
	 * @param	string	$hash	The unique hash stored for a entry
	 * @return	array
	 */
	public function delete_applied($hash)
	{
		return $this->db
			->where('hash', $hash)
			->delete('agama_applied');
	}

	function count_by()
	{
		  if(!empty($_SESSION['keyword'])){
			$this->db->like('agama_name',$_SESSION['keyword']);
		  }

		return $this->db->count_all_results('agamas');
	}

	function get_many_by($params = array())
	{
		if(!empty($_SESSION['keyword'])){
			$this->db->like('agama_name',$_SESSION['keyword']);
		  }
		// Limit the results based on 1 number or 2 (2nd is offset)
		$this->db->limit($params['limit'], $params['offset']);

		return $this->get_all();
	}
}