<?php
class Tablemodel extends CI_Model {
    public function listtaxes()
	{
		$this->db->select('countries.name,tax.tax_id,tax.tax_type,tax.tax_rate');
		$this->db->from('tax');
		$this->db->join('countries', 'countries.country_id = tax.country_id', 'left'); // Using a LEFT JOIN
		$this->db->order_by("tax.tax_id", "desc");
		$query = $this->db->get();
		//echo $this->db->last_query();exit;
		return $query->result_array();
	}
	
	public function insert($data){
	    $this->db->insert('store_table',$data);
	}
	public function delete($id){
		$this->db->where('table_id', $id);
        return $this->db->delete('store_table');
	}
	public function get($id){
	    $this->db->select('*');
		$this->db->from('tax');
		$this->db->where('tax_id',$id );
		$query = $this->db->get();
		return $query->result_array();
	}
	public function update($id,$data){
	    $this->db->where('tax_id', $id);
        $this->db->update('tax', $data);
        return true;
	}
	public function getTablesByStoreId($store_id){
		$this->db->select('*');
		$this->db->from('store_table');
		$this->db->where('store_id',$store_id );
		$this->db->order_by("table_id", "desc");
		$query = $this->db->get();
		//echo $this->db->last_query();exit;
		return $query->result_array();
	}

	public function getDeliveryOrdersByStoreId($store_id){
		$this->db->select('*');
		$this->db->from('order');
		$this->db->where('store_id',$store_id );
		$this->db->where('order_type','DL');
		$this->db->where('is_paid', 0 );
		$this->db->order_by("id", "desc");
		$query = $this->db->get();
		//echo $this->db->last_query();exit;
		return $query->result_array();
	}
	public function updateTableQRCode($table_id, $data){
		$this->db->where('table_id', $table_id);
        $this->db->update('store_table', $data);
        return true;
	}
	public function updateNumberOfTable($store_id, $data){
		$this->db->where('store_id', $store_id);
		$this->db->update('store', $data);
		return true;
	}
	public function check_tablename_exists($tablename, $store_id)
	{
    	$this->db->where('table_name', $tablename);
    	$this->db->where('store_id', $store_id);
    	$query = $this->db->get('store_table');  // Assuming 'users' is your table name
    	if ($query->num_rows() > 0) {
        	return TRUE;  // Field exists for the store
    	} else {
        	 FALSE; // Field does not exist for the store
    	}
}
public function comp_pickup_count($store_id){
	$this->db->select('*');
	$this->db->from('order');
	$this->db->where('store_id',$store_id );
	$this->db->where('order_type','PK');
	$this->db->where('is_paid', 1);
	$query = $this->db->get();
	return  $query->num_rows();
}
public function pending_pickup_count($store_id){
	$this->db->select('*');
	$this->db->from('order');
	$this->db->where('store_id',$store_id );
	$this->db->where('order_type','PK');
	$this->db->where('is_paid', 0);
	$query = $this->db->get();
	return  $query->num_rows();
}
public function comp_delivery_count($store_id){
	$this->db->select('*');
	$this->db->from('order');
	$this->db->where('store_id',$store_id );
	$this->db->where('order_type','DL');
	$this->db->where('is_paid', 1);
	$query = $this->db->get();
	return  $query->num_rows();

}
public function pending_delivery_count($store_id){
	$this->db->select('*');
	$this->db->from('order');
	$this->db->where('store_id',$store_id );
	$this->db->where('order_type','DL');
	$this->db->where('is_paid', 0);
	$query = $this->db->get();
	return  $query->num_rows();
}
public function pending_pickup_cooking($store_id){
    $this->db->select('*');
    $this->db->from('order');
    $this->db->where('store_id',$store_id );
    $this->db->where('order_status',1);
	$this->db->where('order_type','PK');
    $this->db->where('is_paid', 0);
    $query = $this->db->get();
    return  $query->num_rows();
}


public function pending_pickup_ready($store_id){
    $this->db->select('*');
    $this->db->from('order');
    $this->db->where('store_id',$store_id );
    $this->db->where('order_type','PK');
    $this->db->where('order_status',2);
    $this->db->where('is_paid',0);
    $query = $this->db->get();
    // echo $this->db->last_query();
    return  $query->num_rows();
}
public function pending_delivery_cooking($store_id){
    $this->db->select('');
    $this->db->from('order');
    $this->db->where('store_id',$store_id );
    $this->db->where('order_status',1);
    $this->db->where('order_type','DL');
    $this->db->where('is_paid', 0);
    $query = $this->db->get();
    return  $query->num_rows();
}

public function pending_delivery_ready($store_id){
    $this->db->select('');
    $this->db->from('order');
    $this->db->where('store_id',$store_id );
    $this->db->where('order_status',2);
    $this->db->where('order_type','DL');
    $this->db->where('is_paid', 0);
    $query = $this->db->get();
    return  $query->num_rows();
}
}
?>