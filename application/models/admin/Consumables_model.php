<?php
class Consumables_model extends CI_Model {
    public function listconsumables()
	{
		$this->db->select('*');
		$this->db->from('consumables');
		$this->db->where('is_active', 1);
		$this->db->order_by("id", "desc");
		$query = $this->db->get();
		return $query->result_array();
	}
	public function insert($data){
	    $this->db->insert('consumables',$data);
	}

	public function delete($id){
	    $data = array('is_active' => 0);
        $this->db->where('id', $id);
        $this->db->update('consumables', $data);
        return true;
	}
	public function get($roleid){
	    $this->db->select('*');
		$this->db->from('consumables');
		$this->db->where('id',$roleid );
		$query = $this->db->get();
		return $query->result_array();
	}
	public function update($roleid,$roledata){
	    $this->db->where('id', $roleid);
        $this->db->update('consumables', $roledata);//echo $this->db->last_query();die;
        return true;
	}
	public function requested_consumables(){
	    $this->db->select('consumable_request.*,users.Name,consumables.name as cons_name');
		$this->db->from('consumable_request');
		$this->db->join('users','users.userid=consumable_request.technician_id');
		$this->db->join('consumables','consumables.id=consumable_request.consumable_id');

		$query = $this->db->get();
		return $query->result_array();
	}
	
	public function change_status($selected,$request_id){
	    //echo $selected;echo $request_id;exit;
	    $request_data = array(
	        'status' => $selected
	        );
	    $this->db->where('id',$request_id);
	    $this->db->update('consumable_request', $request_data);//echo $this->db->last_query();die;
        return true;
	}
		public function addNotification($technician,$consumable){
		    //echo 'log'.$this->session->userdata('loginid');die;
	    $this->db->select('*');
		$this->db->from('consumables');
		$this->db->where('id',$consumable);
		$query = $this->db->get();
		$row=$query->row_array();//echo $this->db->last_query();die;
		 $noti_data = array(
	        'title' => 'your request for consumable '.$row['name'].' is approved',
	        'message'=>'Consumable request',
	        'sender'=>$this->session->userdata('loginid'),
	        'reciever'=>$technician,
	        'created_date'=>date('Y-m-d'),
	        'status'=>0,
	        'task_id'=>0
	        
	        );
	     
			    $this->db->insert('notification',$noti_data);

	}
	public function stockUpdate($consumable,$count)
	{
	    $this->db->select('*');
		$this->db->from('stock');
		$this->db->where('consumable_id',$consumable);
		$this->db->where('qty >=',$count);
       //$this->db->limit(1);
		$query = $this->db->get();//echo $this->db->last_query();die;
		$row=$query->row_array();
		if(!empty($row))
		{
		 $noti_data = array('qty'=>$row['qty']-$count);
		 	    $this->db->where('consumable_id',$consumable);
		 	    		$this->db->where('qty >=',$count);
$this->db->limit(1);
		 	    	    $this->db->update('stock', $noti_data);
		 	    	    }
		 	    	    //echo $this->db->last_query();die;


	}
}
?>