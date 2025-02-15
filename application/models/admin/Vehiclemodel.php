<?php
class Vehiclemodel extends CI_Model {
    public function listvehicletypes()
	{
		$this->db->select('*');
		$this->db->from('vehicle_type');
		$this->db->where('is_active', 1);
		$this->db->order_by("id", "desc");
		$query = $this->db->get();
		return $query->result_array();
	}
	public function get_vehicle_logs(){
		$this->db->select('*');
		$this->db->from('vehicle_log');
		$this->db->order_by("id", "desc");
		$query = $this->db->get();
		return $query->result_array();
	}
	public function available_approved_vehicles($client,$project,$location,$date){
		//echo $client;echo $project;echo $location;echo $date;exit;
		$this->db->select('v.id,v.door_number');
		$this->db->from('approval_item');
		$this->db->join('vehicle as v', 'v.id = approval_item.seected_item_id');
		$this->db->where('client_id', $client);
		$this->db->where('project_id', $project);
		$this->db->where('client_job_location_id', $location);
		$this->db->where('approve_item', 'veh');
		$this->db->where('status', 1);
		$query = $this->db->get();
		//echo $this->db->last_query();exit;
		return $query->result_array();
	}
	public function insert($data){
	    $this->db->insert('vehicle_type',$data);
	}
	public function delete($id){
	    $data = array('is_active' => 0);
        $this->db->where('id', $id);
        $this->db->update('vehicle_type', $data);
        return true;
	}
	public function get($id){
	    $this->db->select('*');
		$this->db->from('vehicle_type');
		$this->db->where('id',$id );
		$query = $this->db->get();
		return $query->result_array();
	}
	public function update($id,$data){
	    $this->db->where('id', $id);
        $this->db->update('vehicle_type', $data);
        return true;
	}

	public function listvehicle()
	{
		$this->db->select('v.*,vt.type_name,p.name');
		$this->db->from('vehicle as v');
        $this->db->join('vehicle_type as vt', 'v.type_id = vt.id');
		$this->db->join('plant as p', 'v.plant_id = p.id');
		$this->db->where('v.is_active', 1);
		$this->db->order_by("id", "desc");
		$query = $this->db->get();
		//echo $this->db->last_query();exit;
		return $query->result_array();
	}
	public function insert_vehicle($data)
	{
		$this->db->insert('vehicle',$data);	
	}
	public function delete_vehicle($id){
	    $data = array('is_active' => 0);
        $this->db->where('id', $id);
        $this->db->update('vehicle', $data);
        return true;
	}
	public function get_vehicle($id){
	    $this->db->select('*');
		$this->db->from('vehicle');
		$this->db->where('id',$id );
		$query = $this->db->get();
		return $query->result_array();
	}
	public function vehicle_update($id,$data){
	    $this->db->where('id', $id);
        $this->db->update('vehicle', $data);
        return true;
	}

}
?>