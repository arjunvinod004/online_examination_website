<?php
class Jobmodel extends CI_Model {
    public function listjobs()
	{
		$this->db->select('*');
		$this->db->from('job');
		$this->db->where('is_active', 1);
		$this->db->order_by("id", "desc");
		$query = $this->db->get();
		return $query->result_array();
	}
	public function insert($data){
	    $this->db->insert('job',$data);
	}
	public function delete($id){
	    $data = array('is_active' => 0);
        $this->db->where('id', $id);
        $this->db->update('job', $data);
        return true;
	}
	public function get($id){
	    $this->db->select('*');
		$this->db->from('job');
		$this->db->where('id',$id );
		$query = $this->db->get();
		return $query->result_array();
	}
	public function update($id,$data){
	    $this->db->where('id', $id);
        $this->db->update('job', $data);
        return true;
	}
}
?>