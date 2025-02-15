<?php
class Staffmodel extends CI_Model {
	public function __construct()
	{ 
        parent::__construct();
		$this->loginID=$this->session->userdata('loginid');
    } 
    public function liststaff()
	{
		$this->db->select('*');
		$this->db->from('users');
        $this->db->join('role','role.roleid=users.userroleid');
		$this->db->where('userStatus', 'Active');
		$this->db->order_by("userid", "desc");
		$query = $this->db->get();//echo $this->db->last_query();die;
		return $query->result_array();
	}

	public function delete($id){
	    $data = array('userStatus' => 'Deleted');
        $this->db->where('userid', $id);
        $this->db->update('users', $data);
        return true;
	}
	public function get($userid){
	    $this->db->select('*');
		$this->db->from('users');
		$this->db->where('userid',$userid );
		$query = $this->db->get();//echo $this->db->last_query();die;
		return $query->row_array();
	}
	public function update($roleid,$roledata){
	    $this->db->where('userid', $roleid);
        $this->db->update('users', $roledata);
        return true;
	}
	public function updatepw($id,$data){
	    $this->db->where('userid', $id);
        $this->db->update('users', $data);
        return true;
	}

	public function insertUser($cv,$frontpage,$backpage,$iqamaphoto)
	{
		
		$passwod=$this->passwordgenerate();//Create random password
		$useremail=$this->security->xss_clean($this->input->post('userEmail'));//te
        $username=$this->security->xss_clean($this->input->post('userName'));
		$encrypt_password = md5(trim($passwod));	
		$created_date=date("Y-m-d h:i:s");
		$doj=$this->input->post('dojoining');
		$dob=$this->input->post('dob');
		$passportexpirydate=$this->input->post('passportexpirydate');
		$iqamaexpirydate=$this->input->post('iqamaexpirydate');
		$medicalexpirydate=$this->input->post('medicalexpirydate');
		//echo $this->input->post('Name');echo $cv;echo $frontpage;echo $backpage;echo $iqamaphoto;exit;
		if($doj=='')
		{
			$doj='';
		}
		else
		{
			$doj=$this->security->xss_clean(date('Y-m-d',strtotime($this->input->post('dojoining'))));
		}
		if($dob=='')
		{
			$dob='';
		}
		else
		{
			$dob=$this->security->xss_clean(date('Y-m-d',strtotime($this->input->post('dob'))));
		}
		if($passportexpirydate=='')
		{
			$passportexpirydate='';
		}
		else
		{
			$doj=$this->security->xss_clean(date('Y-m-d',strtotime($this->input->post('passportexpirydate'))));
		}
		if($iqamaexpirydate=='')
		{
			$iqamaexpirydate='';
		}
		else
		{
			$iqamaexpirydate=$this->security->xss_clean(date('Y-m-d',strtotime($this->input->post('iqamaexpirydate'))));
		}
		if($medicalexpirydate=='')
		{
			$medicalexpirydate='';
		}
		else
		{
			$medicalexpirydate=$this->security->xss_clean(date('Y-m-d',strtotime($this->input->post('medicalexpirydate'))));
		}
        $data = array(
			'userroleid' => $this->security->xss_clean($this->input->post('userroleid')),
			'emp_id' => $this->security->xss_clean($this->input->post('emp_id')),
			'Name' => $this->security->xss_clean($this->input->post('Name')),
			'gender' => $this->security->xss_clean($this->input->post('gender')),
			'userEmail' => $this->security->xss_clean($this->input->post('userEmail')),
			'userName' => $this->security->xss_clean($this->input->post('userName')),
			'userPassword' => $encrypt_password,
			'UserPhoneNumber' => $this->security->xss_clean($this->input->post('UserPhoneNumber')),
			'userAddress' => $this->security->xss_clean($this->input->post('userAddress')),
			'createdBy' => $this->loginID,
			'dob' => $dob,
			'dojoining' => $doj,
			'cv' => $cv,
			'passportnum' => $this->security->xss_clean($this->input->post('passportnum')),
			'passportexpirydate' => $passportexpirydate,
			'frontpage'=>$frontpage,
			'backpage'=>$backpage,
			'iqamanum' => $this->security->xss_clean($this->input->post('iqamanum')),
			'iqamaexpirydate' => $iqamaexpirydate,
			'iqamaphoto'=>$iqamaphoto,
			'medicalname' => $this->security->xss_clean($this->input->post('medicalname')),
			'medicalnum' => $this->security->xss_clean($this->input->post('medicalnum')),
			'medicalexpirydate' => $medicalexpirydate,
            'blood'=>$this->security->xss_clean($this->input->post('blood'))
		);
		//print_r($data);exit;
        $this->db->insert('users',$data);
	   	$userDetails=array($passwod,$username,$useremail);//Array returns inserted userdetails
		return $userDetails;
	
}

// Password auto generation
	public function passwordgenerate()
	{
		// Random password generation
		$len=8;
		if($len < 8)
		$len = 8;

		//define character libraries - remove ambiguous characters like iIl|1 0oO
		$sets = array();
		$sets[] = 'ABCDEFGHJKLMNPQRSTUVWXYZ';
		$sets[] = 'abcdefghjkmnpqrstuvwxyz';
		$sets[] = '0123456789';
		//$sets[]  = '@#$%&?';
		$password = '';    
		//append a character from each set - gets first 4 characters
		foreach ($sets as $set) {
		$password .= $set[array_rand(str_split($set))];
		}
		//use all characters to fill up to $len
		while(strlen($password) < $len) {
			//get a random set
			$randomSet = $sets[array_rand($sets)];				
			//add a random char from the random set
			$password .= $randomSet[array_rand(str_split($randomSet))]; 
		}			
		//shuffle the password string before returning!
		return  $pswd= str_shuffle($password);
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

public function get_user_details($userid){
	$this->db->select('*');
	$this->db->from('users');
	$this->db->where('userid',$userid);
	$query = $this->db->get();
	return $query->result_array();
}
public function check_idexist($id){
	$this->db->select('*');
	$this->db->from('users');
	$this->db->where('emp_id',$id);
	$query = $this->db->get();
	return $query->result_array();
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

	public function liststaffcsv()
	{
		$this->db->select('userid,emp_id,Name,gender,userEmail,UserPhoneNumber,userAddress,dob,dojoining,blood,passportnum,passportexpirydate,
		iqamanum,iqamaexpirydate,medicalname,medicalnum,medicalexpirydate');
		$this->db->from('users');
		$this->db->where('userStatus','Active');
		$this->db->order_by("userid", "desc");
		$query = $this->db->get();
		return $query->result_array();
	}
		public function checkpassword($userid,$pass)
{
	$this->db->select('*');
	$this->db->from('users');
	$this->db->where('userid',$userid);
    $query = $this->db->get();//echo $this->db->last_query();die;
	$row=$query->row_array();
	if($row['userPassword']==md5($pass))
	{
		echo json_encode(true);
	}
	else
	{
		echo json_encode(false);
	}
}

public function checkemail($email)
{
	$this->db->select('*');
	$this->db->from('users');
	$this->db->where('userid!=',$this->loginID);
	$this->db->where('userEmail',$email);
	$this->db->limit(1);
	
	$query = $this->db->get();
	if ($query->num_rows() == 0)
	{
		echo json_encode(true);
	}
	else
	{
		echo json_encode(false);
	}
}	

public function checkph($ph)
{
	$this->db->select('*');
	$this->db->from('users');
	$this->db->where('userid!=',$this->loginID);
	$this->db->where('UserPhoneNumber',$ph);
	$this->db->limit(1);
	
	$query = $this->db->get();
	if ($query->num_rows() == 0)
	{
		echo json_encode(true);
	}
	else
	{
		echo json_encode(false);
	}
}	
public function getPunchData($userid){
	$this->db->select('*');
	$this->db->from('punch');
	$this->db->where('user_id',$userid );
	$this->db->where('is_active',1);
	$query = $this->db->get();//echo $this->db->last_query();die;
	return $query->result_array();
}


public function listpunchcsv($id)
{
	$this->db->select('punch_id,punch_in_date,punch_in_time,punch_out_date,punch_out_time,total_hrs,timezone');
	$this->db->from('punch');
	$this->db->where('is_active',1);
	$this->db->where('user_id',$id);

	$query = $this->db->get();
	return $query->result_array();
	 
}

}
?>