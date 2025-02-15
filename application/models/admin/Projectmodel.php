<?php
class Projectmodel extends CI_Model {
    
	public function insertproject($data){
		$this->db->insert('project',$data);
	}
	public function delete_project($id){
	    $data = array('is_active' => 0);
        $this->db->where('id', $id);
        $this->db->update('project', $data);
        return true;
	}
	public function getprojectById($client_job_id)
	{
		$query = $this->db->get_where('project', array('id' => $client_job_id));
        return $query->row_array();
	}
	public function updateproject($data,$id){
	    $this->db->where('id', $id);
        $this->db->update('project', $data);
        return true;
	}
	public function get_projects_by_clientid($id){
		$this->db->select('*');
		$this->db->from('project');
		$this->db->where('is_active', 1);
		$this->db->where('client_id',$id );
		$this->db->order_by("id", "desc");
		$query = $this->db->get();
		return $query->result_array();
	}
	public function get_all_projects(){
		$this->db->select('*');
		$this->db->from('project');
		$this->db->where('is_active', 1);
		$this->db->order_by("id", "desc");
		$query = $this->db->get();
		return $query->result_array();
	}
	public function getProjectLocations($id){
		$this->db->select('*');
		$this->db->from('client_job_location');
		$this->db->where('is_active', 1);
		$this->db->where('project_id',$id );
		$this->db->order_by("job_location_id", "desc");
		$query = $this->db->get();
		return $query->result_array();
	}

	
}
?>