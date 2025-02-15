<?php
class Diameter_model extends CI_Model {
    public function listdiameter()
	{
		$this->db->select('*');
		$this->db->from('diameter');
		$this->db->where('is_active', 1);
		$this->db->order_by("id", "desc");
		$query = $this->db->get();
		return $query->result_array();
	}
	public function insert($data){
	    $this->db->insert('diameter',$data);
	}

	public function delete($id){
	    $data = array('is_active' => 0);
        $this->db->where('id', $id);
        $this->db->update('diameter', $data);
        return true;
	}
	public function get($roleid){
	    $this->db->select('*');
		$this->db->from('diameter');
		$this->db->where('id',$roleid );
		$query = $this->db->get();
		return $query->result_array();
	}
	public function update($roleid,$roledata){
	    $this->db->where('id', $roleid);
        $this->db->update('diameter', $roledata);//echo $this->db->last_query();die;
        return true;
	}
}
?>