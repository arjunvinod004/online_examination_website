<?php
class Cordinatormodel extends CI_Model {
    public function listtechnicians()
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('userStatus', 'Active');
		$this->db->where('userroleid', 6);//fetch technicians only
		$this->db->order_by("userid", "desc");
		$query = $this->db->get();
		return $query->result_array();
	}
	public function list_approved_technicians($client_id,$proj_id,$loc_id)
	{
		$this->db->select('*');
		$this->db->from('users as u');
		$this->db->join('approval_item as ai', 'ai.seected_item_id = u.userid');
		$this->db->where('ai.client_id', $client_id);
		$this->db->where('ai.project_id', $proj_id);
		$this->db->where('ai.client_job_location_id', $loc_id);
		$this->db->where('ai.approve_item', 'tech');
		$this->db->where('ai.status', 1);
		$this->db->order_by("u.userid", "desc");
		$query = $this->db->get();
		//echo $this->db->last_query();exit;
		return $query->result_array();
	}
	public function fetchReport($client_id,$status,$criteria,$criteria_value){
		//echo $client_id;echo $technician_id;echo $criteria;echo $criteria_value; exit;
		$this->db->select('wa.*,c.name,cjl.job_location,p.name as proj_name');
		$this->db->from('work_assign as wa');
        $this->db->join('client as c', 'wa.client_id = c.id');
        $this->db->join('project as p', 'wa.project_id = p.id');
		$this->db->join('client_job_location as cjl', 'wa.client_job_location_id = cjl.job_location_id');
		$this->db->join('job as j', 'wa.job_id = j.id');
		$this->db->join('projectors as pr', 'wa.projector_id = pr.id');

		if ($client_id != 'null') {
            $this->db->where('wa.client_id', $client_id);
        }
        if ($status != 'null') {
			if($status == 0){
				$this->db->where('wa.status', 0);
				$this->db->where('wa.work_approve', 0);
			}
			if($status == 1){
				$this->db->where('wa.status', 0);
				$this->db->where('wa.work_approve', 1);
			}
			if($status == 2){
				$this->db->where('wa.status', 1);
				$this->db->where('wa.work_approve', 1);
			}
			if($status == 3){
				$this->db->where('wa.status', 3);
				$this->db->where('wa.work_approve', 1);
			}
        }
		if ($criteria != 'null') {
            if($criteria == 'date'){
				//echo $criteria_value;exit;
				$date = date('Y-m-d',strtotime($criteria_value));
				$this->db->where('wa.date_assign', $date);
			}
			if($criteria == 'week'){
				//echo $criteria_value;
				$splitStrings = explode("-", $criteria_value);
				$startDate = date('Y-m-d',strtotime($splitStrings[0]));
				$endDate = date('Y-m-d',strtotime($splitStrings[1]));
				$this->db->where('wa.date_assign >=', $startDate);
				$this->db->where('wa.date_assign <=', $endDate);

			}
			if($criteria == 'month'){
				$splitStrings = explode(" ", $criteria_value);
				$monthName = $splitStrings[0];
				$year = $splitStrings[1];
				$dateParts = date_parse($monthName);
				$monthNumber = $dateParts['month'];
				$where = "MONTH(wa.date_assign) = $monthNumber AND YEAR(wa.date_assign) = $year";
				$this->db->where($where);
			}
			if($criteria == 'range'){
				$date = $criteria_value;//get date range
				$splitStrings = explode("/", $date);
				$start_date = date('Y-m-d',strtotime($splitStrings[0]));
				$end_date = date('Y-m-d',strtotime($splitStrings[1]));
				$this->db->where('wa.date_assign >=', $start_date);
				$this->db->where('wa.date_assign <=', $end_date);
			}
        }

        $this->db->order_by("wa.id", "desc");
        $query = $this->db->get();
		//echo $this->db->last_query();exit;
        return $query->result_array();
	}
	public function task_approve($taskid){
		$data=array('work_approve' => 1);
		$this->db->where('id', $taskid);
		$this->db->update('work_assign', $data);
	}
	public function approve_request($taskid,$reqid){
		$this->db->select('*');
		$this->db->from('task_request_and_report');
		$this->db->where('task_id', $taskid);
		$this->db->where('status', 1);
		$this->db->where('type', 'rep');
		$query = $this->db->get();
		$report_upload = $query->result_array();

		$data=array('status' => 1);
		$this->db->where('id', $reqid);
		$this->db->update('task_request_and_report', $data);

		if(!empty($report_upload)){
			$data=array('status' => 3);
			$this->db->where('id', $taskid);
			$this->db->update('work_assign', $data);
		}

	}
	public function approve_report($taskid,$repid){
		$this->db->select('*');
		$this->db->from('task_request_and_report');
		$this->db->where('task_id', $taskid);
		$this->db->where('status', 1);
		$this->db->where('type', 'req');
		$query = $this->db->get();
		$report_upload = $query->result_array();

		$data=array('status' => 1);
		$this->db->where('id', $repid);
		$this->db->update('task_request_and_report', $data);

		if(!empty($report_upload)){
			$data=array('status' => 3);
			$this->db->where('id', $taskid);
			$this->db->update('work_assign', $data);
		}

	}
	public function work_details($work_id){
		$this->db->select('client_id,project_id,client_job_location_id');
		$this->db->from('work_assign');
		$this->db->where('id', $work_id);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function getItemName($item,$id){
		//echo $item;echo $id;exit;
		if($item == 'veh'){
			$this->db->select('door_number');
			$this->db->from('vehicle');
			$this->db->where('id', $id);
			$query = $this->db->get();
			$row =  $query->result_array();
			return $row[0]['door_number'];
		}
		if($item == 'pro'){
			$this->db->select('projector_name');
			$this->db->from('projectors');
			$this->db->where('id', $id);
			$query = $this->db->get();
			$row =  $query->result_array();
			return $row[0]['projector_name'];
		}
		if($item == 'tech'){
			$this->db->select('Name');
			$this->db->from('users');
			$this->db->where('userid', $id);
			$query = $this->db->get();
			$row =  $query->result_array();
			return $row[0]['Name'];
		}
	}
	public function change_approve($id){
		$data=array('status' => 0);
		$this->db->where('id', $id);
		$this->db->update('approval_item', $data);
	}
	public function approved_items(){
			$this->db->select('ai.id,c.name,cjl.job_location,p.name as proj_name,ai.approve_item,ai.seected_item_id');
			$this->db->from('approval_item as ai');
			$this->db->join('client as c', 'ai.client_id = c.id');
			$this->db->join('project as p', 'ai.project_id = p.id');
			$this->db->join('client_job_location as cjl', 'ai.client_job_location_id = cjl.job_location_id');
			$this->db->where('status', 1);
			$this->db->order_by("ai.id", "desc");
			$query = $this->db->get();
			//echo $this->db->last_query();exit;
			return $query->result_array();
	}
	public function approve_save($data){
		$this->db->select('*');
		$this->db->from('approval_item');
		$this->db->where('client_id', $data['client_id']);
		$this->db->where('project_id', $data['project_id']);
		$this->db->where('client_job_location_id', $data['client_job_location_id']);
		$this->db->where('approve_item', $data['approve_item']);
		$this->db->where('status',1);
		$this->db->where('seected_item_id', $data['seected_item_id']);
		$query = $this->db->get();
		$row = $query->result_array();
		if(empty($row)){
			$this->db->insert('approval_item',$data);
			return $insert_id = $this->db->insert_id();	
		}else{
			return "exist";
		}
	}
	public function listdrivers()
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('userStatus', 'Active');
		$this->db->where('userroleid', 31);//fetch Drivers only
		$this->db->order_by("userid", "desc");
		$query = $this->db->get();
		return $query->result_array();
	}
	public function save_work_assign_details($data){
		$this->db->insert('work_assign',$data);
		return $insert_id = $this->db->insert_id();	
	}
	// public function save_work_assign_crew_members($data){
	// 	$this->db->insert('work_assign_crew_members',$data);
	// }
	public function list_tasks(){
		$this->db->select('wa.*,c.name,cjl.job_location,p.name as proj_name');
		$this->db->from('work_assign as wa');
        $this->db->join('client as c', 'wa.client_id = c.id');
        $this->db->join('project as p', 'wa.project_id = p.id');
		$this->db->join('client_job_location as cjl', 'wa.client_job_location_id = cjl.job_location_id');
		$this->db->join('job as j', 'wa.job_id = j.id');
		$this->db->join('projectors as pr', 'wa.projector_id = pr.id');
        $this->db->order_by("wa.id", "desc");
        $query = $this->db->get();
		//echo $this->db->last_query();exit;
        return $query->result_array();
	}
	public function list_pending_tasks(){
		$this->db->select('wa.*,c.name,cjl.job_location,p.name as proj_name');
		$this->db->from('work_assign as wa');
        $this->db->join('client as c', 'wa.client_id = c.id');
        $this->db->join('project as p', 'wa.project_id = p.id');
		$this->db->join('client_job_location as cjl', 'wa.client_job_location_id = cjl.job_location_id');
		$this->db->join('job as j', 'wa.job_id = j.id');
		$this->db->join('projectors as pr', 'wa.projector_id = pr.id');
		$this->db->where('work_approve',0);
        $this->db->order_by("wa.id", "desc");
        $query = $this->db->get();
		//echo $this->db->last_query();exit;
        return $query->result_array();
	}
	public function list_approved_tasks(){
		$this->db->select('wa.*,c.name,cjl.job_location,p.name as proj_name');
		$this->db->from('work_assign as wa');
        $this->db->join('client as c', 'wa.client_id = c.id');
        $this->db->join('project as p', 'wa.project_id = p.id');
		$this->db->join('client_job_location as cjl', 'wa.client_job_location_id = cjl.job_location_id');
		$this->db->join('job as j', 'wa.job_id = j.id');
		$this->db->join('projectors as pr', 'wa.projector_id = pr.id');
		$this->db->where('work_approve',1);
		$this->db->where('status',0);
        $this->db->order_by("wa.id", "desc");
        $query = $this->db->get();
		//echo $this->db->last_query();exit;
        return $query->result_array();
	}
	public function get_task_detail_view($work_id){
		$this->db->select('wa.*,c.name,cjl.job_location,p.name as proj_name,j.job_name,pr.projector_name,u.Name');
		$this->db->from('work_assign as wa');
        $this->db->join('client as c', 'wa.client_id = c.id');
        $this->db->join('project as p', 'wa.project_id = p.id');
		$this->db->join('client_job_location as cjl', 'wa.client_job_location_id = cjl.job_location_id');
		$this->db->join('job as j', 'wa.job_id = j.id');
		$this->db->join('projectors as pr', 'wa.projector_id = pr.id');
		$this->db->join('users as u', 'wa.driver = u.userid');
        $this->db->where("wa.id", $work_id);
        $query = $this->db->get();
		//echo $this->db->last_query();exit;
        return $query->result_array();
	}
	public function get_task_details($id){
		$this->db->select('*');
		$this->db->from('work_assign');
		$this->db->where('id', $id);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function get_task_crew_leader($id){
		$this->db->select('*');
		$this->db->from('work_assign_crew_members');
		$this->db->where('work_assign_id', $id);
		$this->db->where('is_crew_leader', 1);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function check_task_leader_exist($work_id){
		$this->db->select('*');
		$this->db->from('work_assign_crew_members');
		$this->db->where('work_assign_id', $work_id);
		$this->db->where('is_crew_leader', 1);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function update_crew_leader($work_crew_id,$data){
		$this->db->where('id', $work_crew_id);
		$this->db->update('work_assign_crew_members', $data);
	}
	public function insert_crew_leader($data){
		$this->db->insert('work_assign_crew_members',$data);
	}
	public function all_taskcrew_members($work_id){
		$this->db->select('u.userid,u.Name,wacm.*');
		$this->db->from('work_assign_crew_members as wacm');
		$this->db->join('users as u', 'wacm.user_id = u.userid');
		$this->db->where('work_assign_id', $work_id);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function delete_report_request($id){
		$this->db->delete('task_request_and_report', array('id' => $id));
	}
	public function delete_crew_member($crew_memb_id){
		$this->db->delete('work_assign_crew_members', array('id' => $crew_memb_id));
	}
	public function update_work_assign_details($data,$work_id){
		//print_r($data);echo $work_id;exit;
		$this->db->where('id', $work_id);
		$this->db->update('work_assign', $data);
		//echo $this->db->last_query();exit;
	}
	public function update_task_driver($work_id,$data){
		$this->db->where('id', $work_id);
		$this->db->update('work_assign', $data);
	}
	public function delete_task($work_id){
		$this->db->delete('work_assign', array('id' => $work_id));
		$this->db->delete('work_assign_crew_members', array('work_assign_id' => $work_id));
	}
	public function get_timesheet_by_taskId($work_id){//select timesheet details where work_id = ?
		$this->db->select('*');
		$this->db->from('timesheet');
		$this->db->where('work_assign_id', $work_id);
		$query = $this->db->get();
		$data = $query->result_array();
		//print_r($data);exit;
		$timesheet = array();
		foreach ($data as $row) {
			$timesheet_id = $row['id'];
			if (!isset($timesheet[$timesheet_id])) {
				$timesheet[] = array(
					'timesheet_id' => $timesheet_id,
					'timesheet_no' => $row['timesheet_no'],
					'task_id' => $row['work_assign_id'],
					'date' => $row['date'],
					'travel_to_site' => $row['travel_to_site'],
					'loading_prep_time' => $row['loading_prep_time'],
					'waiting_time' => $row['waiting_time'],
					'field_work' => $row['field_work'],
					'travel_to_base'=>$row['travel_to_base'],
					'processing_and_reporting'=>$row['processing_and_reporting'],
					'interpretation_and_film_sub' => $row['interpretation_and_film_sub'],
					'deducted_hours' => $row['deducted_hours'],
					'total_joints' => $row['total_joints'],
					'deducted_joints' => $row['deducted_joints'],
					'technician_id' => $row['technician_id'],
					'timesheet_image' => $row['timesheet_image'],
					'status' => $row['status'],
					'completed_joints' => $this->get_completed_joints($timesheet_id),
					'consumables_used' => $this->get_consumables_used($timesheet_id)
				);
			}
		}
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
	public function getLocation($id){
		$this->db->select('*');
		$this->db->from('location');
		$this->db->where('userid', $id);
		$this->db->group_by('date');
		$query = $this->db->get();
		return $query->result_array();
		

	

		
	}
	public function getlocationsbydate($date,$id){
		$this->db->select('*');
		$this->db->from('location');
		$this->db->where('userid', $id);
		$this->db->where('date', $date);

		$query = $this->db->get();
		return $query->result_array();
		

	}
		public function getlocationsbydatedisp($date,$id){
		$this->db->select('*');
		$this->db->from('location');
		$this->db->where('userid', $id);
		$this->db->where('date', $date);
		$this->db->group_by('location');

		$query = $this->db->get();
		return $query->result_array();
		

	}
	public function insertReportRequest($data){
		$this->db->insert('task_request_and_report',$data);
		date_default_timezone_set('Asia/Kolkata');
        $data1=array(
            'status' => 2
            );
        $this->db->where('id', $data['task_id']);
     	$update=$this->db->update('work_assign', $data1);
	}
	public function insert_reshoot($data,$task_id){
		$this->db->insert('reshoot_task',$data);

		$data1=array('status' => 2);
        $this->db->where('id', $data['timesheet_id']);
     	$update=$this->db->update('timesheet', $data1);


		$this->db->select('*');
		$this->db->from('work_assign');
		$this->db->where('id', $task_id);
		$query = $this->db->get();
		return $row = $query->row_array();
		
	}
		public function getTaskId($id){
		$this->db->select('*');
		$this->db->from('notification');
		$this->db->where('id', $id);
		$query = $this->db->get();
		return $query->row_array();
	}
	public function get_taskrequests($taskid){
		$this->db->select('*');
		$this->db->from('task_request_and_report');
		$this->db->where('task_id', $taskid);
		$this->db->where('type', 'req');
		$this->db->order_by("id", "desc");
		$query = $this->db->get();
		return $query->result_array();
	}
	public function get_taskreports($taskid){
		$this->db->select('*');
		$this->db->from('task_request_and_report');
		$this->db->where('task_id', $taskid);
		$this->db->where('type', 'rep');
		$this->db->order_by("id", "desc");
		$query = $this->db->get();
		return $query->result_array();
	}
	public function updatenotification($id,$data){
		$this->db->where('id', $id);
		$this->db->update('notification', $data);
	}

	public function update_deducted_hour($data,$timesheet_id){
		$this->db->where('id', $timesheet_id);
		$this->db->update('timesheet', $data);
		return true;
	}
	public function update_deducted_joints($data,$timesheet_id){
		$this->db->where('id', $timesheet_id);
		$this->db->update('timesheet', $data);
		return true;
	}
	public function update_deducted_usedcons_count($data,$task_used_cons_id){
		$this->db->where('id', $task_used_cons_id);
		$this->db->update('task_used_consumables', $data);
		return true;
	}
	public function approve_timesheet($data,$id){
		$this->db->where('id', $id);
		$this->db->update('timesheet', $data);
		return true;
	}
	public function check_consumable_used($sheet_id,$cons_id){
		$this->db->select('*');
		$this->db->from('task_used_consumables');
		$this->db->where('timesheet_id', $sheet_id);
		$this->db->where('consumable_id', $cons_id);
		$query = $this->db->get();
		//echo $this->db->last_query();exit;
		return $query->result_array();
	}
	public function task_excel(){
		$this->db->select('wa.*,c.name,cjl.job_location,cjl.contact_person,cjl.contact_person_phone,p.name as proj_name,j.job_name,pr.projector_name,v.door_number');
		$this->db->from('work_assign as wa');
        $this->db->join('client as c', 'wa.client_id = c.id');
        $this->db->join('project as p', 'wa.project_id = p.id');
		$this->db->join('client_job_location as cjl', 'wa.client_job_location_id = cjl.job_location_id');
		$this->db->join('job as j', 'wa.job_id = j.id');
		$this->db->join('projectors as pr', 'wa.projector_id = pr.id');
		$this->db->join('vehicle as v', 'wa.vehicle_door = v.id');
		// $ids=array(8,5,6);
		// $this->db->where_in('wa.id',$ids);
        $this->db->order_by("wa.id", "desc");
	
        $query = $this->db->get();
		//echo $this->db->last_query();exit;
        return $query->result_array();
	}

}
?>