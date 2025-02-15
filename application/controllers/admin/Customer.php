<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once ('application/libraries/dompdf/autoload.inc.php'); 

// excel 
require_once('application/third_party/PHPExcel-1.8/Classes/PHPExcel.php');
// require_once ('application/libraries/phpexcel/autoload.php');
// use PhpOffice\PhpSpreadsheet\IOFactory;
// use PhpOffice\PhpSpreadsheet\Spreadsheet;
// use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
// use PhpOffice\PhpSpreadsheet\Writer\Xls;
// use PhpOffice\PhpSpreadsheet\Style\Fill;
// use PhpOffice\PhpSpreadsheet\Style\Border;
// use PhpOffice\PhpSpreadsheet\Style\Alignment;

use Dompdf\Dompdf; 
use Dompdf\Options; 
use Dompdf\FontMetrics; 

class Customer extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/Customermodel');
		$this->load->model('admin/Projectmodel');
		$this->load->model('admin/Projectormodel');
		$this->load->model('admin/Vehiclemodel');
		$this->load->model('admin/Cordinatormodel');
		
		require('Common.php');
		if (!$this->session->userdata('login_status')) {
			redirect(login);
		}
	}

	
	public function index()
	{
	    $data['client']=$this->Customermodel->listclients();
		$this->load->view('admin/includes/header');
		$this->load->view('admin/customer/customers',$data);
		$this->load->view('admin/includes/footer');
	}




	public function getClientProjects(){
		$data['projects']=$this->Projectmodel->get_projects_by_clientid($this->input->post('client_id'));
		echo '<option value="">Select Project</option>';
            foreach($data['projects'] as $project) { ?>
                <option value="<?php echo $project['id']; ?>"><?php echo $project['name']; ?></option>
            <?php }
	}
	public function save_technicians_to_session(){
	    if($this->input->post('sel_driver')!=''){
			$sel_driver = $this->input->post('sel_driver');
		}else{
			$sel_driver = 0;
		}
		$data = array(
			'work_assign_id' => $this->input->post('work_id'),
			'user_id' => $this->input->post('id'),
			'is_crew_leader' => 0
		);
		$this->Cordinatormodel->insert_crew_leader($data);
		$this->show_available_technicians($this->input->post('work_id'),$sel_driver);
	}
	public function remove_technicians_to_session(){
	    if($this->input->post('sel_driver')!=''){
			$sel_driver = $this->input->post('sel_driver');
		}else{
			$sel_driver = 0;
		}
		if (isset($_POST['key'])) {
			$crew_memb_id = $_POST['key'];//echo $key;
			$this->Cordinatormodel->delete_crew_member($crew_memb_id);
			$this->show_available_technicians($this->input->post('work_id'),$sel_driver);
		}
	}
	public function get_available_technician_from_session(){ 
	    if($this->input->post('sel_driver')!=''){
			$sel_driver = $this->input->post('sel_driver');
		}else{
			$sel_driver = 0;
		}
		$check_task_leader_exist = $this->Cordinatormodel->check_task_leader_exist($this->input->post('work_id'));
		//print_r($check_task_leader_exist);
		if(!empty($check_task_leader_exist)){
			$data = array(
				'user_id' => $this->input->post('id')
			);
			$this->Cordinatormodel->update_crew_leader($check_task_leader_exist[0]['id'],$data);
		}else{
			$data = array(
				'work_assign_id' => $this->input->post('work_id'),
				'user_id' => $this->input->post('id'),
				'is_crew_leader' => 1
			);
			$this->Cordinatormodel->insert_crew_leader($data);
		}
		
		$this->show_available_technicians($this->input->post('work_id'),$sel_driver);
	 }



	public function show_available_technicians($work_id,$sel_driver){
		$taskcrew_members = $this->Cordinatormodel->all_taskcrew_members($work_id);
		$workdet = $this->Cordinatormodel->work_details($work_id);
		//print_r($workdet);die();
		$data['technicians']=$this->Cordinatormodel->list_approved_technicians($workdet[0]['client_id'],$workdet[0]['project_id'],$workdet[0]['client_job_location_id']);
		?>
		
		
		<div class="col-sm-6">
		<div class="mb-3">
	  <!-- <label>Select Crew Members</label> -->
	  <div class="alert alert-info dark" role="alert">
          <p>You can select more technicians using Add button!</p>
    </div>
	  <?php //print_r($_SESSION['form_data']); ?>
		<select class="form-select" id="sel_technicians" name="technician">
		<option value=" ">---Select----</option>
			<?php

			$ids = array();
			foreach ($taskcrew_members as $item) {
				$ids[] = $item['user_id'];
			}

			foreach($data['technicians'] as $technician)
			{	
				if (!in_array($technician['userid'], $ids)) {
			?>
		  <option value="<?=$technician['userid'];?>" <?php echo set_select('client_id', $technician['userid'])?>><?=$technician['Name'];?></option>
		  <?php
					}
				}
			?>
		</select>
	  </div>
		</div>
		<div class="col-sm-6">
		<div class="mb-3">
		<label></label>
		<a id="my-button" class="addmore btn btn-primary mt-5">Add</a>
		</div>
	</div>
	<div class="col-sm-12">
	<table class="table table-responsive table-bordered">
   <thead>
      <tr>
         <th>Technician</th>
         <th>Actions</th>
      </tr>
   </thead>
   <tbody>
      <?php 
	 if(isset($taskcrew_members)) {
	  foreach($taskcrew_members as $key => $data): ?>
      <tr>
         
         <td>
			<?php
				if($data['is_crew_leader'] == 1){
					echo $data['Name'].' (CREW LEADER)';
				}else{
					echo $data['Name'];
				}
			?>
		</td>
         <td><button type="button" class="delete-button" data-key="<?php echo $data['id']; ?>"><i class="fa fa-trash" aria-hidden="true"></i></button></td>
      </tr>
      <?php endforeach; } ?>
   </tbody>
</table>
			</div>
			<div class="row mt-3">
			<div class="col-sm-4">
                          <div class="mb-3">
                          <label>Select Driver</label>
                             <select class="form-select" name="driver" id="sel_driver">
                            <option value=" ">---Select----</option>
			<?php
			foreach ($taskcrew_members as $item) {
			if($item['userid'] == $sel_driver){ ?>
				<option value="<?php echo $item['userid'] ; ?>" selected ><?php echo $item['Name'] ; ?> </option> 
			<?php }else{ ?>
				<option value="<?php echo $item['userid'] ; ?>" ><?php echo $item['Name'] ; ?> </option> 
			<?php } ?>
		  <?php } ?>
                            </select>
                           
                          </div>
                        </div>
							</div>

	<?php 
	
}
	public function avail_vehicles_and_projectors(){
		$client = $this->input->post('client');
		$project = $this->input->post('project');
		$location = $this->input->post('location');
		$date = $this->input->post('date');//echo $date;exit;
		$data['projectors']=$this->Projectormodel->available_approved_projectors($client,$project,$location,$date); //Call list_avail_projectors($date) if display available projectors with date check
		$data['vehicles']=$this->Vehiclemodel->available_approved_vehicles($client,$project,$location,$date);
		$data['technicians']=$this->Cordinatormodel->listtechnicians();
		 ?>
		<div class="row">
		<div class="col-sm-4">
                          <div class="mb-3">
                          <label>Men</label>
                            <select class="form-select" name="men_count" >
                              <option value="">---Select----</option>
                              <option value="2"  <?php echo set_select('men_count', '2')?>>2 Men</option>
                              <option value="3"  <?php echo set_select('men_count', '2')?>>3 Men</option>
                            </select>
                            <?php if(form_error('men_count')){ ?>
                           <div class="errormsg" role="alert"><?php echo form_error('men_count'); ?></div>
                          <?php } ?>
                          </div>
                        </div>
		<div class="col-sm-4">
			
                          <div class="mb-3">
                            <label>Projector</label>
                            <select class="form-select" id="projector_id" name="projector_id">
                            <option value="">---Select----</option>

                                <?php
                                foreach($data['projectors'] as $proj)
                                {
                                ?>
                              <option value="<?=$proj['id'];?>" <?php echo set_select('client_id', $proj['id'])?>><?=$proj['projector_name'];?></option>
                              <?php
                                }
                                ?>
                            </select>
                            <?php if(form_error('job_id')){ ?>
                           <div class="errormsg" role="alert"><?php echo form_error('job_id'); ?></div>
                          <?php } ?>
                          </div>
                        </div>
                        
                        
                        
                        
                       
                        <div class="col-sm-4">
                          <div class="mb-3">
                          <label>Vehicle door</label>
                            <select class="form-select" id="vehicle_door" name="vehicle_door">
                            <option value="">---Select----</option>
                                <?php
                                foreach($data['vehicles'] as $vehicle)
                                {
                                ?>
                              <option value="<?=$vehicle['id'];?>" <?php echo set_select('client_id', $vehicle['id'])?>><?=$vehicle['door_number'];?></option>
                              <?php
                                }
                                ?>
                            </select>
                            <?php if(form_error('vehicle_door')){ ?>
                           <div class="errormsg" role="alert"><?php echo form_error('vehicle_door'); ?></div>
                          <?php } ?>
                          </div>
                        </div>
							</div>


                        

						<div class="row">
						<div class="col-sm-3">
                          <div class="mb-3">
                          <label>Log source from PIT</label>
                            <select class="form-select" name="log_source_from_pit" >
                              <option value="">---Select----</option>
                              <option value="DMM"  <?php echo set_select('log_source_from_pit', 'DMM')?>>DMM</option>
                              <option value="DMM/KRSN"  <?php echo set_select('log_source_from_pit', 'DMM/KRSN')?>>DMM/KRSN</option>
                              <option value="DMM/JUB"  <?php echo set_select('log_source_from_pit', 'DMM/JUB')?>>DMM/JUB</option>
                            </select>
                            <?php if(form_error('log_source_from_pit')){ ?>
                           <div class="errormsg" role="alert"><?php echo form_error('log_source_from_pit'); ?></div>
                          <?php } ?>
                          </div>
                        </div>
                      <div class="col-sm-3">
                        <div class="mb-3">
                        <label>Requested Joints</label>
                            <input class="form-control" type="text" name="req_joints" value="<?php echo set_value('req_joints');?>">
                            <?php if(form_error('req_joints')){ ?>
                           <div class="errormsg" role="alert"><?php echo form_error('req_joints'); ?></div>
                          <?php } ?>
                        </div>
                      </div>
                   

					
						<div class="col-sm-6">
                        <div class="mb-3">
                        <label>Remarks</label>
						<textarea name="remark" class="form-control" id="exampleFormControlTextarea4" rows="3"><?php echo set_value('remark');?></textarea>
                        </div>
							</div></div>

						
						





	<?php }
	public function getProjectLocations(){
		$data['locations']=$this->Projectmodel->getProjectLocations($this->input->post('project_id'));
		echo '<option value="">Select Location</option>';
            foreach($data['locations'] as $location) { ?>
                <option value="<?php echo $location['job_location_id']; ?>"><?php echo $location['job_location']; ?></option>
            <?php }
	}
	public function view()
	{
		//echo "here";exit;
		$data['projects']=$this->Projectmodel->get_projects_by_clientid($this->input->post('id'));
		$data['job_locations']=$this->Customermodel->get_job_locations($this->input->post('id'));
	    $data['details']=$this->Customermodel->get($this->input->post('id'));
		//print_r($data['details']);exit;
		$this->load->view('admin/includes/header');
		$this->load->view('admin/client/view',$data);
		$this->load->view('admin/includes/footer');
	}
	public function updatejoblocation(){
		//echo "here";echo $this->input->post('client_id');exit;
		$data = array(
			'project_id' => $this->input->post('project_id'),
			'job_location' => $this->input->post('location'),
			'contact_person' => $this->input->post('contact_person'),
			'contact_person_phone' => $this->input->post('contact_person_phone'),
			'job_location_details' => $this->input->post('details'),
		);
		$id = $this->input->post('id');
		$this->Customermodel->updatejoblocation($data,$id);
		$this->showlocations($this->input->post('client_id'));

	}
	public function addjoblocation(){
		$data = array(
			'client_id' => $this->input->post('client_id'),
			'project_id' => $this->input->post('project_id'),
			'job_location' => $this->input->post('location'),
			'contact_person' => $this->input->post('contact_person'),
			'contact_person_phone' => $this->input->post('contact_person_phone'),
			'job_location_details' => $this->input->post('details'),
			);
		$this->Customermodel->insertjoblocation($data);
		
		$this->showlocations($this->input->post('client_id'));
		}
		public function showlocations($id)
		{
			$job_locations=$this->Customermodel->get_job_locations($id);
			?>
                        <thead>
                        <tr>
                        <th>No</th>
						<th>Project</th>
                        <th>Job Location</th>
                        <th class="text-center">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                          <?php
                       if(!empty($job_locations)){
                       $count = 1;
                       foreach($job_locations as $val){ ?>
                       
                       <tr>
                           
                           
                            <td><?php echo $count; ?></td>
							<td><?php echo $val['proj_name'];?></td>
                            <td><a href=""><?php echo $val['job_location'];?></a></td>
                           
                            <td> 
                              <ul class="action pull-right">
							  <li class="delete">   
                                <button class="edit_job_loc" type="button" data-bs-toggle="tooltip" data-id="<?php echo $val['job_location_id']; ?>"><i class="fa fa-edit"></i></button>    
                                </li>
                                
                                <li class="edit">
                                    <form action="<?php echo base_url();?>client/delete_jobloc" method="post">
                                      <input type="hidden" name="id" value="<?php echo $val['job_location_id']; ?>"> 
                                        <button class="del_client_jobloc" type="button" data-bs-toggle="modal" data-id="<?php echo $val['job_location_id']; ?>" data-bs-original-title="Delete Job Location" data-bs-target="#exampleModal"><i class="fa fa-close"></i></button>
                                    </form>
                                </li>
                              </ul>
                            </td>
                          </tr>
                          
                       <?php $count++; }} ?>
                        </tbody>
                      
		<?php
		//create job locations table display
		
	}
	public function delete(){
	    $this->Customermodel->delete($this->input->post('id'));
		$this->session->set_flashdata('error','Client deleted successfully');
	}
	public function delete_jobloc(){
	    $this->Customermodel->delete_jobloc($this->input->post('id'));
		$this->session->set_flashdata('error','Client location deleted successfully');
		$this->showlocations($this->input->post('client_id'));
	}
	public function editClientJobDetails()
	{
		$client_job_id=$this->input->post('client_job_id');
		$getClientJobLocations=$this->Customermodel->getClientJobLocationsByJobId($client_job_id);
		echo json_encode($getClientJobLocations);
	}
	public function add(){
	    if(isset($_POST['add']))
		{
		    
		    $this->form_validation->set_error_delimiters('', ''); 
			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('gender', 'Gender', 'required');
			$this->form_validation->set_rules('age', 'Age', 'required');
			$this->form_validation->set_rules('phone', 'Phone Number', 'required|callback_valid_phone');
            $this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');
            //$this->form_validation->set_rules('profile_image', 'Profile Image', 'required');

		
			if($this->form_validation->run() == FALSE) 
			{
				$this->load->view('admin/includes/header');
			    $this->load->view('admin/customer/add'); 
			    $this->load->view('admin/includes/footer');
			}
			else
			{
                if(!empty($_FILES['profile_image']['name'])){
					$config['upload_path'] = './uploads/customer/';
					$config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|doc|docx';
					$config['file_name'] = $_FILES['profile_image']['name'];
					
					
					$this->load->library('upload',$config);
					$this->upload->initialize($config);
					
					if($this->upload->do_upload('profile_image')){
						$uploadData = $this->upload->data();
						$profile_image = $uploadData['file_name'];
					}else{
					   $uploaderr=$this->upload->display_errors();
                       //echo $uploaderr;exit;
	
					}
				}else{
					$profile_image = '';
				}
			    $data = array(
			        'name' => $this->input->post('name'),
			        'email' => $this->input->post('email'),
			        'phone' => $this->input->post('phone'),
                    'gender' => $this->input->post('gender'),
                    'age' => $this->input->post('age'),
                    'username' => $this->input->post('username'),
                    'password' => $this->input->post('password'),
					'address' => $this->input->post('address'),
			        'is_active' => 1,
			        );
				$this->Customermodel->insert($data);
				$this->session->set_flashdata('success','New record inserted...');
				redirect('admin/customer');
			}
		}
		else
		{
		    $this->load->view('admin/includes/header');
			$this->load->view('admin/customer/add'); 
			$this->load->view('admin/includes/footer');
		}
	}
	
	public function edit(){
	    if(isset($_POST['edit']))
		{
		    $id=$this->input->post('id'); //echo $roleid;die();
			$data['clientDet']=$this->Customermodel->get($id);
			$this->form_validation->set_error_delimiters('', ''); 
			$this->form_validation->set_rules('name', 'Client Name', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
			$this->form_validation->set_rules('phone', 'Phone Number', 'required|callback_valid_phone');
			$this->form_validation->set_rules('is_active', 'Status', 'required');
			if ($this->form_validation->run() == FALSE) 
			{
				$this->load->view('admin/includes/header');
			    $this->load->view('admin/customer/edit',$data); 
			    $this->load->view('admin/includes/footer');
			}
			else
			{
				$data = array(
			        'name' => $this->input->post('name'),
			        'email' => $this->input->post('email'),
			        'phone' => $this->input->post('phone'),
					'address' => $this->input->post('address'),
			        'is_active' => $this->input->post('is_active'),
			        );
				$this->Customermodel->update($id,$data);
				$this->session->set_flashdata('success','Client details updated...');
				redirect('admin/customer');
			}
		}
		else
		{
			$id=$this->input->post('id'); 
			$data['clientDet']=$this->Customermodel->get($id);
			$this->load->view('admin/includes/header');
			$this->load->view('admin/customer/edit',$data); 
			$this->load->view('admin/includes/footer');
		}
	}
	public function valid_phone($phone_number) {
		$pattern = "/^\+?\d{1,3}?[-.\s]?\(?\d{3}\)?[-.\s]?\d{3}[-.\s]?\d{4}$/";
        $clean_phone_number = preg_replace('/\D/', '', $phone_number);
        if (preg_match('#[^0-9]#',$phone_number)) {
            $this->form_validation->set_message('valid_phone', 'The %s field must be digits.');
            return FALSE;
        } 
		return TRUE;
    }



	//importing
	public function csv()
	{
		$data=$this->Customermodel->listclientscsv();
		$fileName="clients.csv";
		header("Content-Description: File Transfer"); 
	    header("Content-Disposition: attachment; filename=$fileName"); 
	    header("Content-Type: application/csv; "); 
	    $file = fopen('php://output', 'w');
	   	$header = array("ID","Name","Email","Number","Address"); 
	   	fputcsv($file, $header);
	   	foreach ($data as $key=>$line){ 
	     fputcsv($file,$line); 
	   	}
	   	fclose($file); 
	  	exit; 
		
	}
	public function pdf() {
		$html='';
		$dompdf = new Dompdf();
		$data['data'] = $this->Customermodel->listclientscsv();  
		$html = $this->load->view('admin/pdf_view', $data, true);
		$html .= $this->output->get_output();
		$dompdf->loadHtml($html);
		$dompdf->setPaper('A4', 'landscape');
		$dompdf->render();
		$dompdf->stream("clients.pdf", array("Attachment"=>0));
	}
	public function excel()
	{
        // Read an Excel File
        $tmpfname = "example.xls";
        $excelReader = PHPExcel_IOFactory::createReaderForFile($tmpfname);
        $objPHPExcel = $excelReader->load($tmpfname);
        
        // Set document properties
        $objPHPExcel->getProperties()->setCreator("Furkan Kahveci")
							 ->setLastModifiedBy("Furkan Kahveci")
							 ->setTitle("Office 2007 XLS Test Document")
							 ->setSubject("Office 2007 XLS Test Document")
							 ->setDescription("Description for Test Document")
							 ->setKeywords("phpexcel office codeigniter php")
							 ->setCategory("Test result file");

        // Create a first sheet
        $objPHPExcel->setActiveSheetIndex(0);
        $objPHPExcel->getActiveSheet()->setCellValue('A1', "ID");
        $objPHPExcel->getActiveSheet()->setCellValue('B1', "EMPLOYEE ID");
        $objPHPExcel->getActiveSheet()->setCellValue('C1', "NAME");
        $objPHPExcel->getActiveSheet()->setCellValue('D1', "GENDER");
        $objPHPExcel->getActiveSheet()->setCellValue('E1', "EMAIL");
        $objPHPExcel->getActiveSheet()->setCellValue('F1', "PHONE NUMBER");
        $objPHPExcel->getActiveSheet()->setCellValue('G1', "ADDRESS");
        $objPHPExcel->getActiveSheet()->setCellValue('H1', "DATE OF BIRTH");
        $objPHPExcel->getActiveSheet()->setCellValue('I1', "DATE OF JOINING");

        // Hide F and G column
      /*  $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setVisible(false);
        $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setVisible(false);*/

        // Set auto size
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);

        $data = $this->Customermodel->listclientscsv();  
        
        // Add data
        $i=0;
	    $k = 2;
        while ( $i <= count($data))  
        {
            if(isset($data[$i]))
            {
                $id=$data[$i]['id'];
                $name=$data[$i]['name'];
                $email=$data[$i]['email'];
                $phone=$data[$i]['phone'];
                $address=$data[$i]['address'];

                $objPHPExcel->getActiveSheet()->setCellValue('A' . $k, "$id")
                                            ->setCellValue('B' . $k, "$name")
                                            ->setCellValue('C' . $k, "$email")
                                            ->setCellValue('D' . $k, "$phone")
                                            ->setCellValue('G' . $k, "$address");
            }
            $k++;
            $i++;
        }


        // Set Font Color, Font Style and Font Alignment code edit by vishnu
        // $stil=array(
        //     'borders' => array(
        //       'allborders' => array(
        //         'style' => PHPExcel_Style_Border::BORDER_THIN,
        //         'color' => array('rgb' => '000000')
        //       )
        //     ),
        //     'alignment' => array(
        //       'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        //     )
        // );
        // $objPHPExcel->getActiveSheet()->getStyle('A3:E3')->applyFromArray($stil);



        // Merge Cells
        //$objPHPExcel->getActiveSheet()->mergeCells('A5:E5');
        //$objPHPExcel->getActiveSheet()->setCellValue('A5', "MERGED CELL");
        //$objPHPExcel->getActiveSheet()->getStyle('A5:E5')->applyFromArray($stil);
        
        // Save Excel xls File
        $filename="clients.xls";
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        ob_end_clean();
        header('Content-type: application/vnd.ms-excel');
        header('Content-Disposition: attachment; filename='.$filename);
        $objWriter->save('php://output');
	}
	
	








}
