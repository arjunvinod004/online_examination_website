<?php
Class Commonmodel extends CI_Model
{

	public function __construct()
	{ 
        parent::__construct(); 
    }

    
	

	public function fetchtopmenu()
	{
		
		$query		= "SELECT module.modulecode, module.moduleid, module.modulename,module.icon
                       FROM module 
		               WHERE module.moduletype = 'Topmenu' AND module.is_active = 1";
		
		$query = $this->db->query($query);
		$rows=$this->db->affected_rows();
        if($rows >0)
        {
            return $query->result_array();
        }
        else
        {
            return ;
        }		
	}
    public function fetcleftmenu()
	{
		
		$query		= "SELECT module.modulecode, module.moduleid, module.modulename,module.icon
                       FROM module 
		               WHERE module.moduletype = 'Leftmenu' AND module.is_active = 1";
		
		$query = $this->db->query($query);
		$rows=$this->db->affected_rows();
        if($rows >0)
        {
            return $query->result_array();
        }
        else
        {
            return ;
        }		
	}
	
    public function fetchaccessmodules($roleid)
    {
        // $query		= "SELECT privilege.mainModules
        //                FROM privilege 
        //                WHERE privilege.roleid = '".$roleid."'";
        $query		= "SELECT module.modulecode, module.moduleid, module.modulename,module.icon
        FROM module 
        WHERE module.moduletype = 'Topmenu' AND module.is_active = 1";
        $query = $this->db->query($query);
        $rows=$this->db->affected_rows();
        if($rows >0)
        {
        return $query->result_array();
        }
        else
        {
        return ;
        }		
    }

    public function fetchuserDetails($roleID,$loginID)
    {
        $query="SELECT * from users";
        $query.=" WHERE userid='".$this->loginID."'";
        $query = $this->db->query($query);
        $rows = $this->db->affected_rows();
    
            if($rows!=0)
            {
                return $query->result_array();
            }
            else
            {
                return;
                
            }
    }

    
    public function fetch_notifications($login_user){
        $this->db->select('id,title');
		$this->db->from('notification');
		$this->db->where('reciever',$login_user );
		$this->db->where('status',0 );
		 $this->db->order_by('id','desc');

		$query = $this->db->get();
        return $query->result_array();
    }

    public function productsCount(){
        $query = $this->db->query("SELECT COUNT(*) AS product_count FROM product");
        $result = $query->row();
        return $result->product_count;
    }
    public function Clientscount(){
        $query = $this->db->query("SELECT COUNT(*) AS store_count FROM store");
        $result = $query->row();
        return $result->store_count;
    }

    public function pendingfollowup(){
        $today = date('Y-m-d'); 
        $after_30_days = date('Y-m-d', strtotime('+30 days')); 
        // print_r( $after_30_days); exit;
        $this->db->select('store_id, store_name, next_followup_date'); // Select relevant columns
        $this->db->from('store');
        $this->db->where('next_followup_date =',$after_30_days);
        $query = $this->db->get();
        return $query->result_array();


        $this->db->select('id, name, email, next_followup_date');
        $this->db->from('clients');
        $this->db->where('next_followup_date >=', date('Y-m-d'));
        $this->db->where('next_followup_date <=', date('Y-m-d', strtotime('+30 days')));
        $query = $this->db->get();
        return $query->result_array();
        
        // $result = $query->row();
        // return $result->store_count;
    }


    
    public function completedOrder(){
         // Filter for completed orders
        $this->db->from('order'); // Specify the table
        $this->db->where('is_paid', 1);
        return $this->db->count_all_results();
    }


    public function todayOrder($logged_in_store_id){
        $today = date('Y-m-d');
        // Filter for completed orders
       $this->db->from('order'); // Specify the table
       $this->db->where('store_id',$logged_in_store_id);
       $this->db->where('Date(date)',$today);
       return $this->db->count_all_results();
   }

   public function totalAmount($logged_in_store_id){
    // $today = date('Y-m-d');
    // Filter for completed orders
    $this->db->select_sum('total_amount');
   $this->db->from('order'); // Specify the table
   $this->db->where('store_id',$logged_in_store_id);
   $query = $this->db->get();
   $result = $query->row();
   
   return $result->total_amount ?? 0; 
//    $this->db->where('Date(date)',$today);
//    return $this->db->count_all_results();
}


public function todayAmount($logged_in_store_id){
    $today = date('Y-m-d');
    // Filter for completed orders
    $this->db->select_sum('total_amount');
   $this->db->from('order'); // Specify the table
   $this->db->where('store_id',$logged_in_store_id);
   $this->db->where('Date(date)',$today);
   $query = $this->db->get();
   $result = $query->row();
   
   return $result->total_amount ?? 0; 
//    $this->db->where('Date(date)',$today);
//    return $this->db->count_all_results();
}


    public function pendingOrder(){
        // Filter for completed orders
       $this->db->from('order'); // Specify the table
       $this->db->where('is_paid', 0);
       return $this->db->count_all_results();
   }

    public function get_clients_total(){
        $this->db->select('*');
        $this->db->from('customer');
        $this->db->where('is_active',1);
        $query = $this->db->get();
        return $query->num_rows();
    }

}	
?>