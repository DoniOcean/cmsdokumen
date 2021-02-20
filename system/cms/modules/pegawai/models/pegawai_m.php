<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Keyword model
 *
 * @author		PyroCMS Dev Team
 * @package		PyroCMS\Core\Modules\pegawai\Models
 */
class Pegawai_m extends MY_Model {
	
	/**
	 * Get applied
	 *
	 * Gets all the pegawai applied with a certain hash
	 *
	 * @param	string	$hash	The unique hash stored for a entry
	 * @return	array
	 */
	public function get_applied($hash)
	{
		return $this->db
			->select('name')
			->where('hash', $hash)
			->join('pegawai', 'keyword_id = pegawai.id')
			->order_by('name')
			->get('pegawai_applied')
			->result();
	}
	
	/**
	 * Delete applied
	 *
	 * Deletes all the pegawai applied byhash
	 *
	 * @param	string	$hash	The unique hash stored for a entry
	 * @return	array
	 */
	public function delete_applied($hash)
	{
		return $this->db
			->where('hash', $hash)
			->delete('pegawai_applied');
	}

	function count_by()
	{
		  if(!empty($_SESSION['keyword'])){
			$this->db->like('profiles.display_name',$_SESSION['keyword']);
		  }
		  if($this->current_user->group_id =='11'){
			$this->db->where('users.id_satuan_kerja',$this->current_user->id_satuan_kerja);
		}
		$this->db->where('users.group_id <>','1');
		  $this->db->join('profiles','profiles.user_id = users.id');
		return $this->db->where('active','1')->count_all_results('users');
	}

	function get_many_by($params = array())
	{ 
		$this->db->select('users.*,profiles.display_name,master_jabatans.master_jabatan_name,
		master_pangkats.master_pangkat_name,
		master_satuan_kerjas.master_satuan_kerja_name
		');
		if(!empty($_SESSION['keyword'])){
			$this->db->like('profiles.display_name',$_SESSION['keyword']);
		  }
		// Limit the results based on 1 number or 2 (2nd is offset)
		$this->db->limit($params['limit'], $params['offset']);
		 
		if($this->current_user->group_id =='11'){
			$this->db->where('users.id_satuan_kerja',$this->current_user->id_satuan_kerja);
		}

		if($this->current_user->group_id =='12'){
			$this->db->where('users.id',$this->current_user->id);
		}
		$this->db->where('users.group_id <>','1');
		$this->db->join('master_satuan_kerjas','master_satuan_kerjas.id=users.id_satuan_kerja','LEFT');
		$this->db->join('master_pangkats','master_pangkats.id=users.id_pangkat','LEFT');
		$this->db->join('master_jabatans','master_jabatans.id=users.id_jabatan','LEFT');
		$this->db->join('profiles','profiles.user_id = users.id');
		$this->db->order_by('profiles.display_name','ASC');
		return $this->db->where('active','1')->get('users')->result();
	}
}