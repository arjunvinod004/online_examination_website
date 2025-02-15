<?php
Class Api_model extends CI_Model
{

	public function __construct()
	{ 
        parent::__construct();
		//$this->loginID=$this->session->userdata('loginid');
    } 
    public function login($username,$password)
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('userName', $username);
		$this->db->where('userPassword', $password);		
		$this->db->where('userStatus', 'Active');
	//	$query="SELECT * FROM users
	//	WHERE (userName='".$username."' OR userEmail='".$username."') AND userPassword='".$password."' AND userStatus='Active'";
       // $query = $this->db->query($query);

		$query = $this->db->get();

		if ($query->num_rows() == 1) {

			return $query->row();

		} else {

			return FALSE;

		}
	}
    public function updateuser($data,$check_staffid)
	{   
	    $this->db->where('userid', $check_staffid);
     	$this->db->update('users', $data);
		return true;
      
	}
	public function update_password_forget($data,$user_id)
	{   
	    $this->db->where('userid', $user_id);
     	$this->db->update('users', $data);
		return true;
	}
    public function staffExist($staff_id,$device_id)
	{
	    
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('userid', $staff_id);
		$this->db->where('device_id', $device_id);
		
		$this->db->where('userStatus', 'Active');
		$query = $this->db->get();
    
		if ($query->num_rows() == 1) {

			return $query->row();

		} else {

			return FALSE;

		}
	}
	public function emailExist($email)
	{
	    
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('userEmail', $email);
		$this->db->where('userStatus', 'Active');
		$query = $this->db->get();
		if ($query->num_rows() == 1) {
			return $query->row();
		} else {
			return FALSE;
		}
	}
	
    public function punchIn($data)
	{
		$queryResult = $this->db->insert('punch', $data);
    	if($queryResult){
            return $this->db->insert_id();
        }else{
            return false;
        }
	}
    public function getPunchindata($staff_id)
	{
		$this->db->select('*');
		$this->db->from('punch');
		$this->db->where('is_active', 1);
		$this->db->where("user_id", $staff_id);
        $this->db->order_by("punch_id", 'desc');

		$query = $this->db->get();//echo $this->db->last_query();die;
		return $query->row_array();
	}
    public function update_punch($data,$id){
	    $this->db->where('punch_id', $id);
        $this->db->update('punch', $data);
        return true;
	}
	public function getProfileByEmail($profileid)
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('userEmail',$this->security->xss_clean($this->input->post('userEmail')));
		$this->db->where('userid !=',$profileid);
		$this->db->where('userStatus!=', 'Deleted');
		$this->db->where('userStatus!=', 'Inactive');
	
		$this->db->limit(1);
		
		$query = $this->db->get();//echo $this->db->last_query();die;
	
		if ($query->num_rows() == 0)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	
	public function getProfileByPh($profileid)
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('UserPhoneNumber',$this->security->xss_clean($this->input->post('UserPhoneNumber')));
		$this->db->where('userid !=',$profileid);
		$this->db->where('userStatus!=', 'Deleted');
		$this->db->where('userStatus!=', 'Inactive');
	
		$this->db->limit(1);
		
		$query = $this->db->get();
	
		if ($query->num_rows() == 0)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	
	public function getProfileByusername($profileid)
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('userName',$this->security->xss_clean($this->input->post('userName')));
		$this->db->where('userid !=',$profileid);
		$this->db->where('userStatus!=', 'Deleted');
		$this->db->where('userStatus!=', 'Inactive');
	
		$this->db->limit(1);
		
		$query = $this->db->get();
	
		if ($query->num_rows() == 0)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	public function updatestaff($data,$check_staffid)
	{
		$this->db->where('userid', $check_staffid);
     	$update=$this->db->update('users', $data);
		if($update)
			return true;
      
	}
	public function getProfileBypassword($profileid)
	{
		$password=md5($this->security->xss_clean($this->input->post('cpassword')));
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('userPassword',$password);
		$this->db->where('userid !=',$profileid);
		$this->db->where('userStatus!=', 'Deleted');
		$this->db->where('userStatus!=', 'Inactive');
	
		$this->db->limit(1);
		
		$query = $this->db->get();
	
		if ($query->num_rows() == 0)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	function matchOldPassword($oldPassword,$staff_id)
    {
        $this->db->select('userPassword');
        $this->db->where('userid', $staff_id);        
	//	$this->db->where('usertype', 'customer');
        $query = $this->db->get('users');
        
        $user = $query->result();

        if(!empty($user)){
            $encrypt_password = md5(trim($oldPassword));
            if($encrypt_password==$user[0]->password){
                return '1';
            } else {
				
                return '0';
            }
        } else {
            return '0';
        }
    }
	public function updatepassword($data,$check_staffid)
	{
		$this->db->where('userid', $check_staffid);
     	$update=$this->db->update('users', $data);
		if($update)
			return true;
      
	}
	public function daily_tasks($technician){
		$today=date('Y-m-d');
		$this->db->select('work_assign.id,work_assign.time_at_site,work_assign.date_assign,work_assign.vehicle_door,work_assign.req_joints,
		                client.name as client,project.name as projname,client_job_location.job_location,client_job_location.contact_person,job.job_name as job_type,
						projectors.projector_name,
						');
		$this->db->from('work_assign');
		$this->db->join('work_assign_crew_members','work_assign.id=work_assign_crew_members.work_assign_id');
		$this->db->join('client','client.id=work_assign.client_id');
		$this->db->join('project','project.id=work_assign.project_id');
		$this->db->join('client_job_location','client_job_location.job_location_id=work_assign.client_job_location_id');
		$this->db->join('job','job.id=work_assign.job_id');
		$this->db->join('projectors','projectors.id=work_assign.projector_id');
		$this->db->where("work_assign.date_assign", $today);
		$this->db->where("work_assign_crew_members.user_id", $technician);
		$query = $this->db->get();
		//echo $this->db->last_query();
		$data = $query->result_array();
		$tasks = array();
		foreach ($data as $row) {
			$task_id = $row['id'];
			if (!isset($tasks[$task_id])) {
				$tasks[] = array(
					'task_id' => $task_id,
					'client_name' => $row['client'],
					'project_name' => $row['projname'],
					'date' => $row['date_assign'],
					'time' => $row['time_at_site'],
					'job' => $row['job_type'],
					'projector' => $row['projector_name'],
					'crew_members' => $this->get_crew($task_id),
				);
			}
		}
		//print_r($tasks);
		return $tasks;
	}
	public function get_crew($task_id){
		$this->db->select('u.userid,u.Name');
		$this->db->from('work_assign_crew_members as wacm');
		$this->db->join('users as u','u.userid=wacm.user_id');
		$this->db->where('work_assign_id',$task_id);
		$query = $this->db->get();
		//echo $this->db->last_query();
		$data = $query->result_array();
		return $data;

	}

    public function list_consumables(){
        $this->db->select('id,name');
		$this->db->from('consumables');
		$this->db->where('is_active',1);

		$query = $this->db->get();
		$data = $query->result_array();
		return $data;
    }
	public function requested_consumables($technician){
        $this->db->select('*,co.name as consumable_name');
		$this->db->from('consumable_request as cr');
		$this->db->join('consumables as co','co.id=cr.consumable_id');
		$this->db->where('technician_id',$technician);

		$query = $this->db->get();
		$data = $query->result_array();
		return $data;
    }
    public function start_task($task_id,$technician){
        date_default_timezone_set('Asia/Kolkata');
        $data=array(
            'task_done_date' => date('Y-m-d'),
            'task_start_time' => date('H:i:s'),
            'status' => 1
            );
        $this->db->where('id', $task_id);
     	$update=$this->db->update('work_assign', $data);
     	$createduser = $this->createduser($task_id);//return task created user id
     	//save details to notification table
     	$technicianname=$this->getTechnicion($technician);
     	$data = array(
     	        'title' => 'Task Id- '.$task_id.' started by '.$technicianname,
     	        'message' => 'work message',
     	        'sender' => $technician,
     	        'reciever' => $createduser,//task created user
     	        'created_date' => date('Y-m-d'),
     	        'status' => 0,
     	        'task_id'=>$task_id
     	    );
     	$this->db->insert('notification', $data);
     	
		if($update){
			return true;
		}else{
		    return false;
		}
    }
     public function getTechnicion($technician){
        $this->db->select('Name');
		$this->db->from('users');
		$this->db->where('userid',$technician);
		$query = $this->db->get();
		//echo $this->db->last_query();
		$data = $query->result_array(); 
		return $data[0]['Name'];
    }
    public function createduser($task_id){
        $this->db->select('created_by');
		$this->db->from('work_assign');
		$this->db->where('id',$task_id);
		$query = $this->db->get();
		//echo $this->db->last_query();
		$data = $query->result_array(); 
		return $data[0]['created_by'];
    }
    public function requestConsumables($data)
	{
		$queryResult = $this->db->insert('consumable_request', $data);
    	if($queryResult){
            return $this->db->insert_id();
        }else{
            return false;
        }
	}
    public function end_task($task_id,$technician){
        date_default_timezone_set('Asia/Kolkata');
        $data=array(
            'task_done_date' => date('Y-m-d'),
            'task_end_time' => date('H:i:s'),
            'status' => 1
            );
        $this->db->where('id', $task_id);
     	$update=$this->db->update('work_assign', $data);
     	
     	$createduser = $this->createduser($task_id);//return task created user id
     	//save details to notification table
     	     	$technicianname=$this->getTechnicion($technician);

     	$data = array(
     	        'title' => 'Task Id- '.$task_id.' ended by '.$technicianname,
     	        'message' => 'work message',
     	        'sender' => $technician,
     	        'reciever' => $createduser,//task created user
     	        'created_date' => date('Y-m-d'),
     	        'status' => 0,
     	       'task_id'=>$task_id

     	    );
     	$this->db->insert('notification', $data);
     	
		if($update){
			return true;
		}else{
		    return false;
		}
    }
    public function get_assigned_tasks($technician){
		$today=date('Y-m-d');
		$this->db->select('work_assign.id,work_assign.time_at_site,work_assign.date_assign,work_assign.vehicle_door,work_assign.req_joints,
		                client.name as client,project.name as projname,client_job_location.job_location,client_job_location.contact_person,job.job_name as job_type,
						projectors.projector_name,work_assign.status,work_assign.work_approve
						');
		$this->db->from('work_assign');
		$this->db->join('work_assign_crew_members','work_assign.id=work_assign_crew_members.work_assign_id');
		$this->db->join('client','client.id=work_assign.client_id');
		$this->db->join('project','project.id=work_assign.project_id');
		$this->db->join('client_job_location','client_job_location.job_location_id=work_assign.client_job_location_id');
		$this->db->join('job','job.id=work_assign.job_id');
		$this->db->join('projectors','projectors.id=work_assign.projector_id');
		//$this->db->where("work_assign.work_approve","1");
		$this->db->where("work_assign_crew_members.user_id", $technician);
		$where = '(work_assign.status="0" AND work_assign.work_approve="1" OR work_assign.status="1" AND work_assign.work_approve="1")';
        $this->db->where($where);
       
        
		$this->db->group_by('work_assign.id');
		$query = $this->db->get();
		//echo $this->db->last_query();exit;
		$data = $query->result_array();
		$tasks = array();
		foreach ($data as $row) {
			$task_id = $row['id'];
			if (!isset($tasks[$task_id])) { // It will check if the timesheet has been added.If timesheet added return timesheet number otherwise return 0
				$tasks[] = array(
					'task_id' => $task_id,
					'client_name' => $row['client'],
					'project_name' => $row['projname'],
					'date' => $row['date_assign'],
					'time' => $row['time_at_site'],
					'job' => $row['job_type'],
					'projector' => $row['projector_name'],
					'joints'=>$row['req_joints'],
					'location'=>$row['job_location']
					
				);
			}
		}
		//print_r($tasks);
		return $tasks;
	}
	public function get_tasks_details($technician,$task_id){
		
		$this->db->select('work_assign.id,work_assign.time_at_site,work_assign.date_assign,work_assign.vehicle_door,work_assign.req_joints,
		                client.name as client,project.name as projname,client_job_location.job_location,client_job_location.contact_person,job.job_name as job_type,
						projectors.projector_name,projector_location.location,client_job_location.contact_person,client_job_location.contact_person_phone,vehicle.door_number
						');
		$this->db->from('work_assign');
		$this->db->join('work_assign_crew_members','work_assign.id=work_assign_crew_members.work_assign_id');
		$this->db->join('client','client.id=work_assign.client_id');
		$this->db->join('project','project.id=work_assign.project_id');
		$this->db->join('client_job_location','client_job_location.job_location_id=work_assign.client_job_location_id');
		$this->db->join('job','job.id=work_assign.job_id');
		$this->db->join('projectors','projectors.id=work_assign.projector_id');
		$this->db->join('projector_location','projector_location.id=projectors.location_id');
		$this->db->join('vehicle','vehicle.id=work_assign.vehicle_door');
		$this->db->where("work_assign.id", $task_id);
		$this->db->group_by('work_assign.id');

		$query = $this->db->get();
		//echo $this->db->last_query();
		$data = $query->result_array();
		$tasks = array();
		foreach ($data as $row) {
			$task_id = $row['id'];
			if (!isset($tasks[$task_id])) {
				$tasks[] = array(
					'task_id' => $task_id,
					'client_name' => $row['client'],
					'project_name' => $row['projname'],
					'date' => $row['date_assign'],
					'time' => $row['time_at_site'],
					'job' => $row['job_type'],
					'projector' => $row['projector_name'],
					'vehicle' => $row['door_number'],
					'projector_location' => $row['location'],
					'contact_person' => $row['contact_person'],
					'contact_person_phone' => $row['contact_person_phone'],
					'joints'=>$row['req_joints'],
					'location'=>$row['job_location'],
					'crew_members' => $this->get_crew($task_id),
				);
			}
		}
		//print_r($tasks);
		return $tasks;
	}
	public function completed_tasks($technician){
		$today=date('Y-m-d');
		$this->db->select('work_assign.id,work_assign.time_at_site,work_assign.date_assign,work_assign.vehicle_door,work_assign.req_joints,
		                client.name as client,project.name as projname,client_job_location.job_location,client_job_location.contact_person,job.job_name as job_type,
						projectors.projector_name,work_assign.status,work_assign.work_approve
						');
		$this->db->from('work_assign');
		$this->db->join('work_assign_crew_members','work_assign.id=work_assign_crew_members.work_assign_id');
		$this->db->join('client','client.id=work_assign.client_id');
		$this->db->join('project','project.id=work_assign.project_id');
		$this->db->join('client_job_location','client_job_location.job_location_id=work_assign.client_job_location_id');
		$this->db->join('job','job.id=work_assign.job_id');
		$this->db->join('projectors','projectors.id=work_assign.projector_id');
		$this->db->where("work_assign_crew_members.user_id", $technician);
        $where = '(work_assign.status="2" AND work_assign.work_approve="1")';
        $this->db->where($where);
		$this->db->group_by('work_assign.id');
		$query = $this->db->get();
		//echo $this->db->last_query();exit;
		$data = $query->result_array();
		$tasks = array();
		foreach ($data as $row) {
			$task_id = $row['id'];
			if (!isset($tasks[$task_id])) {
				$tasks[] = array(
					'task_id' => $task_id,
					'client_name' => $row['client'],
					'project_name' => $row['projname'],
					'date' => $row['date_assign'],
					'time' => $row['time_at_site'],
					'job' => $row['job_type'],
					'projector' => $row['projector_name'],
					'joints'=>$row['req_joints'],
					'location'=>$row['job_location']
				);
			}
		}
		//print_r($tasks);
		return $tasks;
	}
	public function add_timesheet($data){
		$queryResult = $this->db->insert('timesheet', $data);
    	if($queryResult){
            return $this->db->insert_id();
        }else{
            return false;
        }
	}
	public function update_work_status_after_timesheet_updation($task_id){
	    date_default_timezone_set('Asia/Kolkata');
        $data=array(
            'task_done_date' => date('Y-m-d'),
            'task_end_time' => date('H:i:s'),
            'status' => 2
            );
        $this->db->where('id', $task_id);
     	$update=$this->db->update('work_assign', $data);
	}
	public function insertVehicleLog($data)
	{
		$queryResult = $this->db->insert('vehicle_log', $data);
    	if($queryResult){
            return $this->db->insert_id();
        }else{
            return false;
        }
	}
	public function add_timesheet_image($data,$timesheet_id){
	    $this->db->where('id', $timesheet_id);
     	$update=$this->db->update('timesheet', $data);
		if($update){
			return true;
		}else{
		    return false;
		}
	}
	public function add_joints($data)
	{
		$queryResult = $this->db->insert('completed_joints', $data);
    	if($queryResult){
            return $this->db->insert_id();
        }else{
            return false;
        }
	}
	public function check_timesheet($timesheet_id)
	{
		$this->db->select('*');
		$this->db->from('timesheet');
		$this->db->where('id', $timesheet_id);
		
		$query = $this->db->get();

		if ($query->num_rows() == 1) {

			return $query->row();

		} else {

			return FALSE;

		}
	}
	public function check_task($task_id)
	{
		$this->db->select('*');
		$this->db->from('work_assign');
		$this->db->where('id', $task_id);
		
		$query = $this->db->get();

		if ($query->num_rows() == 1) {

			return $query->row();

		} else {

			return FALSE;

		}
	}
	public function check_consumable($consumable_id)
	{
		$this->db->select('*');
		$this->db->from('consumables');
		$this->db->where('id', $consumable_id);
		$this->db->where('is_active', 1);
		$query = $this->db->get();

		if ($query->num_rows() == 1) {

			return $query->row();

		} else {

			return FALSE;

		}
	}
	public function used_consumables($data)
	{
		$queryResult = $this->db->insert('task_used_consumables', $data);
    	if($queryResult){
            return $this->db->insert_id();
        }else{
            return false;
        }
	}
	  public function list_diameter(){
        $this->db->select('id,name');
		$this->db->from('diameter');
		$this->db->where('is_active',1);

		$query = $this->db->get();
		$data = $query->result_array();
		return $data;
    }
    	public function list_wallthickness(){
        $this->db->select('id,name');
		$this->db->from('wall_thickness');
		$this->db->where('is_active',1);

		$query = $this->db->get();
		$data = $query->result_array();
		return $data;
    }
    	public function timesheetExist($task_id)
	{
		$this->db->select('*');
		$this->db->from('timesheet');
		$this->db->where('id', $task_id);
		
		$query = $this->db->get();

		if ($query->num_rows() == 1) {

			return $query->row();

		} else {

			return FALSE;

		}
	}
	public function monthly_timesheet($staff){
        $this->db->select('id,timesheet_no,date');
		$this->db->from('timesheet');
		$this->db->where('technician_id',$staff);

		$query = $this->db->get();
		$data = $query->result_array();
		return $data;
    }

		public function get_timesheet_details($id){
        $this->db->select('*');
		$this->db->from('timesheet');
		$this->db->where('id', $id);
		$query = $this->db->get();
		$row = $query->row_array();
		//print_r($data);exit;
		$timesheet_id=$row['id'];
				
				$timesheet['timesheet_id'] = $row['id'];
					$timesheet['timesheet_no'] = $row['timesheet_no'];
					$timesheet['task_id'] = $row['work_assign_id'];
					$timesheet['date'] = $row['date'];
					$timesheet['travel_to_site'] = $row['travel_to_site'];
					$timesheet['loading_prep_time'] = $row['loading_prep_time'];
					$timesheet['waiting_time'] = $row['waiting_time'];
					$timesheet['field_work'] = $row['field_work'];
					$timesheet['travel_to_base']=$row['travel_to_base'];
					$timesheet['processing_and_reporting']=$row['processing_and_reporting'];
					$timesheet['interpretation_and_film_sub'] = $row['interpretation_and_film_sub'];
					$timesheet['deducted_hours'] = $row['deducted_hours'];
					$timesheet['total_joints'] = $row['total_joints'];
					$timesheet['deducted_joints'] = $row['deducted_joints'];
					$timesheet['technician_id'] = $row['technician_id'];
					$timesheet['timesheet_image'] = $row['timesheet_image'];
					$timesheet['status'] = $row['status'];
					$timesheet['completed_joints'] = $this->get_completed_joints($timesheet_id);
					$timesheet['consumables_used'] = $this->get_consumables_used($timesheet_id);
				
			
		
		return $timesheet;
    }
    
    
    public function get_completed_joints($timesheet_id){
		$this->db->select('*');
		$this->db->from('completed_joints');
		$this->db->where('timesheet_id',$timesheet_id);
		$query = $this->db->get();
		$data = $query->result_array();
		return $data;
	}
	public function get_consumables_used($timesheet_id){
		$this->db->select('c.id,c.name,tuc.count,tuc.id as tuc_id,tuc.deducted_count');
		$this->db->from('task_used_consumables as tuc');
		$this->db->join('consumables as c', 'tuc.consumable_id = c.id');
		$this->db->where('timesheet_id',$timesheet_id);
		$query = $this->db->get();
		$data = $query->result_array();
		return $data;
	}
	
	
}
?>