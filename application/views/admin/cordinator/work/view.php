<!-- Reshoot modal start -->
 <!--modal for delete request-->
 <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel"><?php echo confirm; ?></h5>
                              <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" name="id" id="request_id" value=""/>
                                <input type="hidden" name="id" id="task_id" value=""/>
                               <?php echo are_you_sure; ?></div>
                            <div class="modal-footer">
                              <button class="btn btn-primary" type="button" data-bs-dismiss="modal">No</button>
                              <button class="btn btn-secondary" id="yes_del_req" type="button" data-bs-dismiss="modal">Yes</button>
                            </div>
                          </div>
                        </div>
                      </div>
        <!--modal for delete confirmation-->
 <!--modal for delete report-->
 <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel"><?php echo confirm; ?></h5>
                              <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" name="id" id="role_id" value=""/>
                                <input type="hidden" name="id" id="task_id" value=""/>
                               <?php echo are_you_sure; ?></div>
                            <div class="modal-footer">
                              <button class="btn btn-primary" type="button" data-bs-dismiss="modal">No</button>
                              <button class="btn btn-secondary" id="yes_del_role" type="button" data-bs-dismiss="modal">Yes</button>
                            </div>
                          </div>
                        </div>
                      </div>
        <!--modal for delete confirmation-->

<div class="modal reshootmodal fade" tabindex="-1" role="dialog" aria-labelledby="reshootmodal" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title">Reshoot Timesheet</h5>
                              <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              
                      <form id="form" method="post" >  
                      <input type="hidden" value="" id="hidden_timesheet_id">                       <input type="hidden" value="" id="p">   
  
                      <div class="row">
                        <div class="col">
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Whose mistake</label>
                            
                            <div class="col-sm-9">
                            <select id="reshoot_mistake_by" class="form-control btn-square" name="reshoot_mistake">
                            <option value="">Select any</option> 
                            <option value="Technician">Technician</option>
                              <option value="Dark room">Dark room</option>
                              <option value="Technical">Technical</option>
                            </select>
                            <div id="reshoot_mistake" class="alert alert-danger dark mt-1 d-none" role="alert"></div>  
                          </div>
                          </div>
                          
                          
                          <div class="row">
                            <label class="col-sm-3 col-form-label">Details</label>
                            <div class="col-sm-9">
                              <textarea class="form-control" id="reshoot_mistake_details" name="reshoot_mistake_details" rows="2" cols="2"></textarea>
                            </div>
                          </div>
                        </div>
                      </div>
                    
                            </div>
                            <div class="modal-footer">
                              <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                              <a class="btn btn-primary" id="save">Submit</a>
                            </div>
                                </form>
                          </div>
                        </div>
                      </div>
                      <!-- Reshoot modal end -->

                      <?php  
                      $session_data=$this->session->all_userdata();
                      //echo "here". $session_data['loginid']; 
                      //echo "role-id=".$session_data['roleid']; //exit;
                      //echo $session_data['rolename']; 
                      ?>
<!-- header section -->
<div class="page-body">
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-sm-6">
                  <h3>Task Details - <?=$details[0]['id'];?></h3>
                 
                </div>
                <div class="col-sm-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url();?>dashboard"><i data-feather="home"></i>Home</a></li>
                    <li class="breadcrumb-item active">Task details</li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid starts-->
       <div class="container-fluid dashboard-default">

       <!-- for javascript validation showing -->


       <?php if($this->session->flashdata('success')){ ?>
                    <div class="alert alert-success dark" role="alert">
                        <?php echo $this->session->flashdata('success');$this->session->unset_userdata('success'); ?>
                    </div><?php } ?>
                    
                    <?php if($this->session->flashdata('error')){ ?>
                    <div class="alert alert-danger dark" role="alert">
                        <?php echo $this->session->flashdata('error');$this->session->unset_userdata('error'); ?>
                    </div><?php } ?>

      <div id="displaymsg" class="alert alert-message alert-success dark d-none" role="alert"></div>
      <div class="alert alert-danger dark d-none" role="alert"></div>
            <!-- for javascript validation showing -->


         <div class="row">  
            <div class="col-sm-12">
                <div class="card pb-4">   
                  <div class="card-header pb-0">

                   <!--details start  -->
                  


                  
                    <ul class="nav nav-tabs nav-primary" id="pills-warningtab" role="tablist">
                      <li class="nav-item"><a class="nav-link <?php if($active_tab == ''){ echo 'active'; } ?>" id="details-tab" data-bs-toggle="pill" href="#details" role="tab" aria-controls="details" aria-selected="true">Details</a></li>
                      <li class="nav-item"><a class="nav-link <?php if($active_tab == 'timesheet'){ echo 'active'; } ?>" id="pills-warningcontact-tab" data-bs-toggle="pill" href="#pills-warningcontact" role="tab" aria-controls="pills-warningcontact" aria-selected="false">Timesheet</a></li>
                      <?php if($this->Rolemodel->check_permission(65,$this->session->userdata('roleid'),'can_view') == 1){ ?>
                      <li class="nav-item"><a class="nav-link <?php if($active_tab == 'request'){ echo 'active'; } ?> requests" id="requests-tab" data-bs-toggle="pill" href="#requests" role="tab" aria-controls="requests" aria-selected="true">Job requests</a></li>
                      <?php } ?>
                      <?php if($this->Rolemodel->check_permission(66,$this->session->userdata('roleid'),'can_view') == 1){ ?>
                      <li class="nav-item"><a class="nav-link <?php if($active_tab == 'report'){ echo 'active'; } ?>" id="reports-tab" data-bs-toggle="pill" href="#reports" role="tab" aria-controls="reports" aria-selected="true">Job reports</a></li> 
                      <?php } ?>
                    </ul>
                    <div class="tab-content" id="pills-warningtabContent">
                      <div class="tab-pane fade show <?php if($active_tab == ''){ echo 'active'; } ?>" id="details" role="tabpanel" aria-labelledby="details-tab">
                        


 <!--staff details dtails start--------!-->
                      <div class="user-details">
                          <div class="collapse show">
                            <div class="user-status row">
                                <?php if(isset($details)){ ?>
                            <?php //print_r($details); ?>
                                  
                            <div class="col-sm-6 table-responsive theme-scrollbar mb-0">
                      <table class="table table-bordernone mt-3">
                       
                        <tbody>
                          <tr>
                            <td>Client</td>
                            <td class="digits"><?=$details[0]['name'];?></td>
                          </tr>
                          <tr>
                            <td>Project</td>
                            <td class="digits"><?=$details[0]['proj_name'];?></td>
                          </tr>
                          <tr>
                            <td>Location</td>
                            <td class="digits"><?=$details[0]['job_location'];?></td>
                          </tr>
                          
                          <tr>
                            <td>Date</td>
                            <td class="digits"><?=$details[0]['date_assign'];?></td>
                          </tr>
                          <tr>
                            <td>Time at site</td>
                            <td class="digits"><?=$details[0]['time_at_site'];?></td>
                          </tr>
                          <tr>
                            <td>Job</td>
                            <td class="digits"><?=$details[0]['job_name'];?></td>
                          </tr>
                          <tr>
                            <td>Men count</td>
                            <td class="digits"><?=$details[0]['men_count'];?></td>
                          </tr>
                          <tr>
                            <td>Projector</td>
                            <td class="digits"><?=$details[0]['projector_name'];?></td>
                          </tr>
                          <tr>
                            <td>Log source</td>
                            <td class="digits"><?=$details[0]['log_source_from_pit'];?></td>
                          </tr>
                          <tr>
                            <td>Vehicle Door</td>
                            <td class="digits"><?=$details[0]['vehicle_door'];?></td>
                          </tr>
                          <tr>
                            <td>Driver</td>
                            <td class="digits"><?=$details[0]['Name'];?></td>
                          </tr>
                          <tr>
                            <td>Joints Required</td>
                            <td class="digits"><?=$details[0]['req_joints'];?></td>
                          </tr>
                          <tr>
                            <td>Remark</td>
                            <td class="digits"><?=$details[0]['remark'];?></td>
                          </tr>
                          <tr>
                            <td>Technician time in</td>
                            <td class="digits"><?=$details[0]['tech_time_in'];?></td>
                          </tr>
                          <tr>
                            <td>Technician time out</td>
                            <td class="digits"><?=$details[0]['tech_time_out'];?></td>
                          </tr>
                        </tbody>
                      </table>
                    </div>


                    <div class="col-sm-6 table-responsive theme-scrollbar mb-0">
                    <table class="table table-responsive mt-3">
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
      </tr>
      <?php endforeach; } ?>
   </tbody>
</table>
                    </div>


                                  
                              <?php } ?>
                            </div>
                          </div>
                        </div>




                      </div>
                      <!--staff details dtails end--------!-->
    
                      <div class="tab-pane fade <?php if($active_tab == 'timesheet'){ echo 'show active'; } ?>" id="pills-warningcontact" role="tabpanel" aria-labelledby="pills-warningcontact-tab">

                     
                     
                     
                     
                      <div class="col-sm-12 col-xl-12">
                      <div class="">




                
                 
                    <div class="row mt-3">
                      <div class="col-sm-3 col-xs-12">
                        <div class="nav flex-column nav-pillss" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <?php if(isset($timesheet)){
                          foreach($timesheet as $key => $sheet){
                            if($key == 0){ $class = 'active'; }else{ $class = ''; } ?>
                        <a class="time_tab nav-link <?php echo $class; ?>" id="v-pills-<?php echo $key; ?>-tab" data-bs-toggle="pill" href="#v-pills-<?php echo $key; ?>" role="tab" aria-controls="v-pills-<?php echo $key; ?>" aria-selected="true"><?php echo "NO :". $sheet['timesheet_no'].'('.$sheet['date'].')'; ?></a>
                          <?php }} ?>
                      </div>
                          </div>
                      <div class="col-sm-9 col-xs-12">
                        <div class="tab-content" id="v-pills-tabContent">
                        <?php if(isset($timesheet)){ //print_r($timesheet);
                          foreach($timesheet as $key => $sheet){
                          if($key == 0){ $class = 'show active'; }else{ $class = ''; } ?>  
                          <div class="tab-pane fade <?php echo $class; ?>" id="v-pills-<?php echo $key; ?>" role="tabpanel" aria-labelledby="v-pills-<?php echo $key; ?>-tab">
                          
                          <div class="row">
                          <div class="col-sm-6 table-responsive theme-scrollbar mb-0 user-status">
                            <table class="table table-bordernone mt-3">
                            <tbody>
                           ID : <?php echo $sheet['timesheet_id']; ?>
                          <tr>
                            <td>Status</td>
                            <td class="digits"><?php if($sheet['status']== 0){
                              $st_class="bg-info";
                              $st_text="Pending";
                            }if($sheet['status']== 1){
                              $st_class="bg-success";
                              $st_text="Approved";
                            }if($sheet['status']== 2){
                              $st_class="bg-danger";
                              $st_text="Reshoot";
                            } ?>
                            <div class="p-1 mb-1 <?php echo $st_class; ?> text-white text-center"><?php echo $st_text; ?></div>
                            </td>
                          </tr>
                          <tr>
                            <td>Date</td>
                            <td class="digits"><?=$sheet['date'];?></td>
                          </tr>
                          <tr>
                            <td>Travel to site</td>
                            <td class="digits"><?=$sheet['travel_to_site'];?> Hour</td>
                          </tr>
                          <tr>
                            <td>Loading & Preparation time</td>
                            <td class="digits"><?=$sheet['loading_prep_time'];?> Hour</td>
                          </tr>
                          
                          <tr>
                            <td>Waiting time</td>
                            <td class="digits"><?=$sheet['waiting_time'];?> Hour</td>
                          </tr>
                          <tr>
                            <td>Field work</td>
                            <td class="digits"><?=$sheet['field_work'];?> Hour</td>
                          </tr>
                          <tr>
                            <td>Travel to base</td>
                            <td class="digits"><?=$sheet['travel_to_base'];?> Hour</td>
                          </tr>
                        </tbody>
                      </table>
                          </div>
                          <div class="col-sm-6 table-responsive theme-scrollbar mb-0 user-status">
                          <table class="table table-bordernone mt-3">
                            <tbody>
                          <tr>
                            <td>Processing & Reporting</td>
                            <td class="digits"><?=$sheet['processing_and_reporting'];?> Hour</td>
                          </tr>
                          <tr>
                            <td>Interpretation & Film submission</td>
                            <td class="digits"><?=$sheet['interpretation_and_film_sub'];?> Hour</td>
                          </tr>
                          <tr>
                            <td>Total Hours</td>
                            <input id="disp_total_hour" type="hidden" value="<?php 
                            echo 
                            (int)$sheet['travel_to_site']+
                            (int)$sheet['loading_prep_time']+
                            (int)$sheet['waiting_time']+
                            (int)$sheet['field_work']+
                            (int)$sheet['travel_to_base']+
                            (int)$sheet['processing_and_reporting']+
                            (int)$sheet['interpretation_and_film_sub'];
                             ?>">
                            <td class="digits"><?php 
                            echo 
                            (int)$sheet['travel_to_site']+
                            (int)$sheet['loading_prep_time']+
                            (int)$sheet['waiting_time']+
                            (int)$sheet['field_work']+
                            (int)$sheet['travel_to_base']+
                            (int)$sheet['processing_and_reporting']+
                            (int)$sheet['interpretation_and_film_sub'];
                            ?> Hour</td>
                          </tr>
                          <tr>
                            <td>Deducted Hours</td>
                            <td class="digits">
                              <input id="total_hour" type="text" value="<?php if(isset($timesheet[0]['deducted_hours']) && ($timesheet[0]['deducted_hours']!= 0 )){echo $timesheet[0]['deducted_hours']; }else{ echo ""; }?>">
                              <?php if($this->Rolemodel->check_permission(64,$this->session->userdata('roleid'),'can_edit') == 1){ ?>
                              <button class="btn btn-primary mt-1 deduct_tot_hour" data-id="<?php echo $timesheet[0]['timesheet_id']; ?>" type="button">Save</button>
                              <?php } ?>
                            </td>
                          </tr>
                          <tr>
                            <td>Total  joints</td>
                            <input id="disp_total_joint" type="hidden" value="<?=$timesheet[0]['total_joints'];?>">
                            <td class="digits"><?=$timesheet[0]['total_joints'];?></td>
                          </tr>
                          <tr>
                            <td>Deducted joints</td>
                            <td class="digits"><input id="deduct_joint" type="text" value="<?php if(isset($timesheet[0]['deducted_joints']) && ($timesheet[0]['deducted_joints']!= 0 )){echo $timesheet[0]['deducted_joints']; }else{ echo ""; }?>">
                            
                            <?php if($this->Rolemodel->check_permission(64,$this->session->userdata('roleid'),'can_edit') == 1){ ?>
                            <button class="btn btn-primary mt-1 deduct_joints" data-id="<?php echo $timesheet[0]['timesheet_id']; ?>" type="button">Save</button>
                          <?php } ?>
                          </td>
                          </tr>
                          
                        </tbody>
                      </table>
                          </div>
                          </div>

                          <div class="col-sm-12 table-responsive theme-scrollbar mb-0 user-status">
                    <h6 class="mt-3 text-center">Completed Joints</h6>  
                    <table class="table table-bordernone mt-3">
                       
                        <tbody>
                          <tr>
                            <td>Task</td>
                            <td>Diameter</td>
                            <td>Wall thickness</td>
                            <td>Requested</td>
                            <td>Completed</td>
                            <td>Remark</td>
                          </tr>
                          <?php foreach($sheet['completed_joints'] as $values){?>
                          <tr>
                            <td><?php echo $values['task_id']; ?></td>
                            <td><?php echo $values['diameter']; ?></td>
                            <td><?php echo $values['wall_thickness']; ?></td>
                            <td><?php echo $values['joints_requested']; ?></td>
                            <td><?php echo $values['joints_completed']; ?></td>
                            <td><?php echo $values['remarks']; ?></td>
                          </tr>
                          <?php } ?> 
                          </tbody>
                          </table>
                          <h6 class="mt-3 text-center">Used Consumables </h6>  
                    <table class="table table-bordernone mt-3">
                       
                        <tbody>
                          <tr>
                            
                            <td>Consumable</td>
                            <td>Count</td>
                            <td>Deducted count</td>
                          </tr>
                          <?php foreach($sheet['consumables_used'] as $key => $values){?>
                          <tr>
                            
                            <td><?php echo $values['name']; ?></td>
                            <td><?php echo $values['count']; ?></td>
                            <td>
                              <input type="text" class="ded_count" value="<?php if(isset($values['deducted_count']) && ($values['deducted_count']!= 0 )){echo $values['deducted_count']; }else{ echo ""; }?>">
                              <?php if($this->Rolemodel->check_permission(64,$this->session->userdata('roleid'),'can_edit') == 1){ ?>
                              <button class="btn btn-primary deduct_consumable_count" data-count="<?php echo $values['count']; ?>" data-id="<?php echo $values['tuc_id']; ?>" type="button">Save</button>
                              <?php } ?>
                            </td>
                          </tr>
                          <?php } ?> 
                          </tbody>
                          </table>
                          </div>
                          <div class="col-md-12 mt-3">
                          <?php if($this->Rolemodel->check_permission(64,$this->session->userdata('roleid'),'can_view') == 1){ ?>
                          <h6 class="mt-3 text-center">Timesheet Image</h6>
                            <a target="_blank" href="<?php echo $timesheet[0]['timesheet_image']; ?>"><img class="img-responsive img-fluid" src="<?php echo $timesheet[0]['timesheet_image']; ?>"></a>
                            <?php } ?>
                          </div>

                          

                          

                          <?php if($this->Rolemodel->check_permission(64,$this->session->userdata('roleid'),'can_edit') == 1){ ?>
                          <button class="btn btn-danger pull-right mb-4 mt-2 reshoot_submit" type="button" data-bs-toggle="modal" data-id="<?php echo $sheet['timesheet_id']; ?>" data-bs-target=".reshootmodal">Reshoot</button>
                          <?php } ?>
                          <?php if($this->Rolemodel->check_permission(64,$this->session->userdata('roleid'),'can_approve') == 1){ ?>
                          <form action="<?php echo base_url();?>cordinator/approve_timesheet" method="post">
                          <input type="hidden" name="task_id" value=" <?=$details[0]['id'];?>">
                          <input type="hidden" name="timesheet_id" value="<?php echo $sheet['timesheet_id']; ?>">  
                          <button class="btn btn-success pull-right mb-4 mt-2" type="submit">Approve</button>
                          </form>
                          <?php } ?>
                          </div>
                          <?php }}else{ echo "not uploaded";"<p style='color:red'>There is no timesheet uploaded</p>"; } ?>
                         
                        </div>
                      
                    
                  
               
                 
                 
                    
                 
                      
                      </div>
                      
                     
                     
                     
                     
                     
                     
                      </div>
                     
                    </div>
                    

                     <!--document section end------!-->
                    <a href="<?php echo base_url(); ?>cordinator/tasks" class="btn btn-primary mt-4 pull-left">Back</a>
                   <!--details end  -->

                   

                </div>
            </div>




<!-- Requests start -->
            <div class="tab-pane fade <?php if($active_tab == 'request'){ echo 'show active'; } ?>" id="requests" role="tabpanel" aria-labelledby="requests-tab">
            <div class="card-body">  
              <div class="form theme-form"> 
              <form id="upload_form" enctype="multipart/form-data">      
            <div class="row">
                       
                        <div class="col-sm-4 ">
                          <div class="mb-3">
                            <label>Upload Multiple Requests</label>
                            <input type="hidden" id="task_id_hidden" name="task_id_hidden1" value="<?=$details[0]['id'];?>">
                            <input class="form-control" type="file" id="request_file" name="files[]" multiple="multiple"> 
                            <div id="file-inputs"></div>
                          </div>
                        </div>
                        
             
                        </div>
                          </div>
                      </div>
                    </form>
                    

                    <div class="table-responsive theme-scrollbar">
                      <table class="display" id="basic-1">
                        <thead>
                          <tr>
                        <th>No</th>
                            <th>Title</th>
                            <th>Status</th>
                            <th class="text-center">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                       if(!empty($requests)){
                       $count = 1;
                       foreach($requests as $val){ ?>
                       
                       <tr>
                           
                            <form action="" method="post">  
                            <td><?php echo $count; ?></td>
                            <td><?php echo $val['title'];?></td>
                            
                            <td><?php 
                            if($val['status'] == 0){
                              $class= "bg-danger";
                              $text = "Pending";
                            }else{
                            $class= "bg-success";
                              $text = "Approved";} ?><button class="<?php echo $class; ?>"><?php echo $text; ?></button></td>
                            </form>
                            <td> 
                              <ul class="action pull-right">

                              <?php if($this->Rolemodel->check_permission(65,$this->session->userdata('roleid'),'can_view') == 1){ ?>
                                <li class="edit">
                                <a target="_blank" href="<?php echo base_url(); ?>uploads/job_Requests/<?php echo $val['path']; ?>" class="btn btn-primary btn-lg" role="button">View</a>
                                </li>
                                <?php } ?>
                               

                                <?php if($this->Rolemodel->check_permission(65,$this->session->userdata('roleid'),'can_delete') == 1){ ?>
                                <li class="edit">
                                <button class="btn btn-danger btn-lg delete_req" data-bs-toggle="modal" data-task="<?=$details[0]['id'];?>" data-id="<?php echo $val['id']; ?>" data-bs-target="#exampleModal1" type="button">Delete</a>
                                </li>
                                <?php } ?>
                                <?php if($this->Rolemodel->check_permission(65,$this->session->userdata('roleid'),'can_approve') == 1){ ?>
                                  <?php if($val['status'] == 0){ ?>
                                  <li class="edit">
                                  
                                <form action="<?php echo base_url();?>cordinator/approve_request" method="post">
                                  <input type="hidden" name="task_id" value=" <?=$details[0]['id'];?>">
                                  <input type="hidden" name="request_id" value="<?php echo $val['id']; ?>">  
                                  <button class="btn btn-success pull-right" type="submit">Approve</button>
                                </form>
                                </li>
                                <?php }} ?>
                                
                                
                              </ul>
                            </td>
                            
                          </tr>
                          
                       <?php $count++; }} ?>
                        </tbody>
                      </table>

            </div>
                       </div>
                      
<!-- Requests start -->

<!-- Requests start -->
<div class="tab-pane fade <?php if($active_tab == 'report'){ echo 'show active'; } ?>" id="reports" role="tabpanel" aria-labelledby="reports-tab">
            <div class="card-body">  
              <div class="form theme-form"> 
              <form id="uploadreport_form" enctype="multipart/form-data">      
            <div class="row">
                        
                        <div class="col-sm-4 ">
                          <div class="mb-3">
                            <label>Upload Multiple Reports</label>
                            <input class="form-control" type="file" id="report_file" name="report_file" multiple="multiple"> 
                          </div>
                        </div>
                        
                        </div>
                          </div>
                      </div>
                    </form>

                    <div class="table-responsive theme-scrollbar">
                      <table class="display" id="basic-2">
                        <thead>
                          <tr>
                        <th>No</th>
                            <th>Title</th>
                             <th>Status</th>
                            <th class="text-center">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                       if(!empty($reports)){
                       $count = 1;
                       foreach($reports as $val){ ?>
                       
                       <tr>
                           
                            <form action="" method="post">  
                            <td><?php echo $count; ?></td>
                            <td><?php echo $val['title'];?></td>
                            <td><?php 
                            if($val['status'] == 0){
                              $class= "bg-danger";
                              $text = "Pending";
                            }else{
                            $class= "bg-success";
                              $text = "Approved";} ?><button class="<?php echo $class; ?>"><?php echo $text; ?></button></td>
                            </form>
                            <td> 
                              <ul class="action pull-right">

                              <?php if($this->Rolemodel->check_permission(66,$this->session->userdata('roleid'),'can_view') == 1){ ?>
                                <li class="edit">
                                <a target="_blank" href="<?php echo base_url(); ?>uploads/job_Reports/<?php echo $val['path']; ?>" class="btn btn-primary btn-lg" role="button">View</a>
                                </li>
                              <?php } ?>
                              <?php if($this->Rolemodel->check_permission(66,$this->session->userdata('roleid'),'can_delete') == 1){ ?>
                                <li class="edit">
                                <button class="btn btn-danger btn-lg delete_rep" data-bs-toggle="modal" data-task="<?=$details[0]['id'];?>" data-id="<?php echo $val['id']; ?>" data-bs-target="#exampleModal" type="button">Delete</a>
                                </li>
                                <?php } ?>
                                <?php if($this->Rolemodel->check_permission(66,$this->session->userdata('roleid'),'can_approve') == 1){ ?>
                                  <?php if($val['status'] == 0){ ?>
                                  <li class="edit">
                                <form action="<?php echo base_url();?>cordinator/approve_report" method="post">
                                  <input type="hidden" name="task_id" value=" <?=$details[0]['id'];?>">
                                  <input type="hidden" name="report_id" value="<?php echo $val['id']; ?>">  
                                  <button class="btn btn-success pull-right" type="submit">Approve</button>
                                </form>
                                </li>
                                <?php }} ?>
                                
                                
                              </ul>
                            </td>
                            
                          </tr>
                          
                       <?php $count++; }} ?>
                        </tbody>
                      </table>

            </div>
                       </div>
                       </div>
<!-- Requests start -->


        </div>
        </div>
        </div>
        <!-- Container-fluid Ends-->
        </div>
        <!-- footer section -->         
        <script src="<?php echo base_url();?>assets/js/deem/cordinator/task.js"></script>

        <script>
          $(document).ready(function(){
            $('#request_file').change(function(){
                    var taskid=$('#task_id_hidden').val();
                    var item = 'request';
                    var form_data = new FormData();
                    var ins = document.getElementById('request_file').files.length;
                    for (var x = 0; x < ins; x++) {
                        form_data.append("files[]", document.getElementById('request_file').files[x]);
                    }
                    form_data.append("task_id", taskid);
                    $.ajax({
                        url: base_url + 'cordinator/upload_request',
                        method:"POST",  
                        data:form_data,  
                        contentType: false,  
                        cache: false,  
                        processData:false,  
                        dataType: "json",
                        success: function(data){
                          alert(data.msg);
                          window.location.href = base_url+'cordinator/task_details/'+taskid+'/'+item;
                        }
                });
            });




            $('#report_file').change(function(){
              var taskid=$('#task_id_hidden').val();
              var item = 'report';
              var form_data = new FormData();
                    var ins = document.getElementById('report_file').files.length;
                    for (var x = 0; x < ins; x++) {
                        form_data.append("files[]", document.getElementById('report_file').files[x]);
                    }
                    form_data.append("task_id", taskid);
                    $.ajax({
                        url: base_url + 'cordinator/upload_report',
                        method:"POST",  
                        data:form_data,  
                        contentType: false,  
                        cache: false,  
                        processData:false,  
                        dataType: "json",
                        success: function(data){
                          alert(data.msg);
                          window.location.href = base_url+'cordinator/task_details/'+taskid+'/'+item;
                        }
                });
            });



             //delete report
    $(".delete_rep").click(function () {
            $('#role_id').val($(this).data('id'));
            $('#task_id').val($(this).data('task'));
    });
    
    $('#yes_del_role').click(function(){
        //alert('client');
        $.ajax({
        method: "POST",
        url: base_url + 'cordinator/delete_report_request',
            data: { 'id' : $('#role_id').val() },
            success: function(data){
              var item="report";
              var taskid = $('#task_id').val();
              alert("Report deleted successfully");
              window.location.href = base_url+'cordinator/task_details/'+taskid+'/'+item;
            }
        });
    });
    //delete report



     //delete report
     $(".delete_req").click(function () {
            $('#request_id').val($(this).data('id'));
            $('#task_id').val($(this).data('task'));
    });
    
    $('#yes_del_req').click(function(){
        //alert('client');
        $.ajax({
        method: "POST",
        url: base_url + 'cordinator/delete_report_request',
            data: { 'id' : $('#request_id').val() },
            success: function(data){
              var item="request";
              var taskid = $('#task_id').val();
              alert("Request deleted successfully");
              window.location.href = base_url+'cordinator/task_details/'+taskid+'/'+item;
            }
        });
    });
    //delete report


            
          });
          </script>