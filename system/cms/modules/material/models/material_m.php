<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Keyword model
 *
 * @author		PyroCMS Dev Team
 * @package		PyroCMS\Core\Modules\material\Models
 */
class Material_m extends MY_Model {
	
	/**
	 * Get applied
	 *
	 * Gets all the material applied with a certain hash
	 *
	 * @param	string	$hash	The unique hash stored for a entry
	 * @return	array
	 */
	public function get_applied($hash)
	{
		return $this->db
			->select('name')
			->where('hash', $hash)
			->join('material', 'keyword_id = material.id')
			->order_by('name')
			->get('material_applied')
			->result();
	}
	
	/**
	 * Delete applied
	 *
	 * Deletes all the material applied byhash
	 *
	 * @param	string	$hash	The unique hash stored for a entry
	 * @return	array
	 */
	public function delete_applied($hash)
	{
		return $this->db
			->where('hash', $hash)
			->delete('material_applied');
	}

	function count_by()
	{
		  if(!empty($_SESSION['keyword'])){
			$this->db->like('material_name',$_SESSION['keyword']);
		  }

		return $this->db->count_all_results('materials');
	}

	function get_many_by($params = array())
	{
		if(!empty($_SESSION['keyword'])){
			$this->db->like('material_name',$_SESSION['keyword']);
		  }
		// Limit the results based on 1 number or 2 (2nd is offset)
		$this->db->limit($params['limit'], $params['offset']);

		return $this->get_all();
	}
}