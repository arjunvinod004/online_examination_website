<?php
class Projectormodel extends CI_Model {
    public function listprojectors()
	{
		$this->db->select('*');
		$this->db->from('projectors');
		$this->db->where('is_active', 1);
		$this->db->order_by("id", "desc");
		$query = $this->db->get();
		return $query->result_array();
	}
	public function available_approved_projectors($client,$project,$location,$date){
		//echo $client;echo $project;echo $location;echo $date;exit;
		$this->db->select('p.id,p.projector_name');
		$this->db->from('approval_item');
		$this->db->join('projectors as p', 'p.id = approval_item.seected_item_id');
		$this->db->where('client_id', $client);
		$this->db->where('project_id', $project);
		$this->db->where('client_job_location_id', $location);
		$this->db->where('approve_item', 'pro');
		$this->db->where('status', 1);
		$query = $this->db->get();
		//echo $this->db->last_query();exit;
		return $query->result_array();
	}
	public function insert($data){
	    $this->db->insert('projectors',$data);
	}
	public function delete($id){
	    $data = array('is_active' => 0);
        $this->db->where('id', $id);
        $this->db->update('projectors', $data);
        return true;
	}
	public function get($id){
	    $this->db->select('*');
		$this->db->from('projectors');
		$this->db->where('id',$id );
		$query = $this->db->get();
		return $query->result_array();
	}
	public function update($id,$data){
	    $this->db->where('id', $id);
        $this->db->update('projectors', $data);
        return true;
	}
	public function list_avail_projectors($date){
		$formatted_date = date('Y-m-d', strtotime($date));//exit;
		$this->db->select('*');
		$this->db->from('projectors');
		$this->db->join('work_assign', 'work_assign.projector_id = projectors.id', 'left');
		$this->db->where('is_active', 1);
		$this->db->where('work_assign.projector_id=',NULL);
		$this->db->or_where('work_assign.date_assign !=', $formatted_date);
		$query = $this->db->get();
		//echo $this->db->last_query();exit;
		return $query->result_array();
	}
	public function get_locations(){
		$this->db->select('*');
		$this->db->from('projector_location');
		$this->db->where('is_active',1);
		$this->db->order_by('id','desc');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function insert_location($data){
		$this->db->insert('projector_location',$data);
	}
	public function get_location_details($id){
		$this->db->select('*');
		$this->db->from('projector_location');
		$this->db->where('id',$id);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function update_location($data,$id){
		$this->db->where('id',$id);
		$this->db->update('projector_location',$data);
		return true;
	}
	public function delete_location($id){
		$data = array(
			'is_active' =>0
		);
		$this->db->where('id',$id);
		$this->db->update('projector_location',$data);
	}
}
?>