<?php
class Wall_model extends CI_Model {
    public function listthickness()
	{
		$this->db->select('*');
		$this->db->from('wall_thickness');
		$this->db->where('is_active', 1);
		$this->db->order_by("id", "desc");
		$query = $this->db->get();
		return $query->result_array();
	}
	public function insert($data){
	    $this->db->insert('wall_thickness',$data);
	}

	public function delete($id){
	    $data = array('is_active' => 0);
        $this->db->where('id', $id);
        $this->db->update('wall_thickness', $data);
        return true;
	}
	public function get($roleid){
	    $this->db->select('*');
		$this->db->from('wall_thickness');
		$this->db->where('id',$roleid );
		$query = $this->db->get();
		return $query->result_array();
	}
	public function update($roleid,$roledata){
	    $this->db->where('id', $roleid);
        $this->db->update('wall_thickness', $roledata);//echo $this->db->last_query();die;
        return true;
	}
}
?>