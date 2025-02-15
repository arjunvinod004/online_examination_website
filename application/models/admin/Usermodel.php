<?php
class Usermodel extends CI_Model {
    public function listusers()
	{
		$this->db->select('users.*, store.store_name');
        $this->db->from('users');
        $this->db->join('store', 'users.store_id = store.store_id');
        $this->db->order_by("userid", "desc");
        $query = $this->db->get();
        return $query->result_array();
	}
	public function listclientscsv()
	{
		$this->db->select('id,name,email,phone,address');
		$this->db->from('customer');
		$this->db->where('is_active', 1);
		$this->db->order_by("id", "desc");
		$query = $this->db->get();
		return $query->result_array();
	}
	public function insert($data){
	    $this->db->insert('users',$data);
	}
	public function delete($id){
	    $data = array('is_active' => 0);
        $this->db->where('userid', $id);
        $this->db->update('users', $data);
        return true;
	}
	public function get($id){
	    $this->db->select('*');
		$this->db->from('users');
		$this->db->where('userid',$id );
		$query = $this->db->get();
		return $query->result_array();
	}
	public function update($id,$data){
	    $this->db->where('userid', $id);
        $this->db->update('users', $data);
        return true;
	}
}
?>