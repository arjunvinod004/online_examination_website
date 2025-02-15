<?php
class Punchmodel extends CI_Model {
	public function __construct()
	{ 
        parent::__construct();
		$this->loginID=$this->session->userdata('loginid');
    } 
    public function insert_punch($data)
    {
        $this->db->insert('punch',$data);

    }
    public function getPunchindata()
	{
		$this->db->select('*');
		$this->db->from('punch');
		$this->db->where('is_active', 1);
		$this->db->where("user_id", $this->loginID);
        $this->db->order_by("punch_id", 'desc');

		$query = $this->db->get();//echo $this->db->last_query();die;
		return $query->row_array();
	}
    public function update_punch($data,$id){
	    $this->db->where('punch_id', $id);
        $this->db->update('punch', $data);
        return true;
	}
}
?>