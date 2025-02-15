<?php
class Clientmodel extends CI_Model {
    public function listclients()
	{
		$this->db->select('*');
		$this->db->from('client');
		$this->db->where('is_active', 1);
		$this->db->order_by("id", "desc");
		$query = $this->db->get();
		return $query->result_array();
	}
	public function listclientscsv()
	{
		$this->db->select('id,name,email,phone,address');
		$this->db->from('client');
		$this->db->where('is_active', 1);
		$this->db->order_by("id", "desc");
		$query = $this->db->get();
		return $query->result_array();
	}
	public function insert($data){
	    $this->db->insert('client',$data);
	}
	public function insertjoblocation($data){
		$this->db->insert('client_job_location',$data);
	}
	public function delete($id){
	    $data = array('is_active' => 0);
        $this->db->where('id', $id);
        $this->db->update('client', $data);
        return true;
	}
	public function delete_jobloc($id){
	    $data = array('is_active' => 0);
        $this->db->where('job_location_id', $id);
        $this->db->update('client_job_location', $data);
        return true;
	}
	public function get_all_locations(){
		$this->db->select('*');
		$this->db->from('client_job_location');
		$this->db->where('is_active', 1);
		$this->db->order_by("job_location_id", "desc");
		$query = $this->db->get();
		return $query->result_array();
	}
	public function getClientJobLocationsByJobId($client_job_id)
	{
		$query = $this->db->get_where('client_job_location', array('job_location_id' => $client_job_id));
        return $query->row_array();
	}
	public function get($id){
	    $this->db->select('*');
		$this->db->from('client');
		$this->db->where('id',$id );
		$query = $this->db->get();
		return $query->result_array();
	}
	public function get_job_locations($id){
		$this->db->select('cjl.job_location_id,cjl.job_location,c.name as cl_name,p.name as proj_name');
		$this->db->from('client_job_location as cjl');
        $this->db->join('client as c', 'cjl.client_id = c.id');
        $this->db->join('project as p', 'cjl.project_id = p.id');
        $this->db->where('cjl.client_id', $id);
        $this->db->where('cjl.is_active', 1);
        $this->db->order_by("cjl.job_location_id", "desc");
        $query = $this->db->get();
		//echo $this->db->last_query();exit;
        return $query->result_array();
	}
	public function update($id,$data){
	    $this->db->where('id', $id);
        $this->db->update('client', $data);
        return true;
	}
	public function updatejoblocation($data,$id){
		//print_r($data);echo $id;exit;
		$this->db->where('job_location_id', $id);
		$this->db->update('client_job_location', $data);
		return true;
	}
}
?>