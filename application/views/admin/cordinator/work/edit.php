<!-- header section -->
<div class="page-body">
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-sm-6">
                  <h3>Edit Task</h3>
                </div>
                <div class="col-sm-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url();?>dashboard"><i data-feather="home"></i>Home</a></li>
                    <li class="breadcrumb-item active">Edit Task</li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
          

          <!-- Container-fluid starts-->
            <div class="container-fluid project-create">
            <div class="row">
              <div class="col-sm-12">
                <div class="card">
                  <div class="card-body">
                    <div class="form theme-form">
                  <form id="myform" method="post" action="<?php echo base_url(); ?>cordinator/edit_task" enctype="multipart/form-data">
                  <input type="hidden" id="work_id" name="id" value="<?php if(isset($task[0]['id'])) { echo $task[0]['id'];}?>">    
                  <div class="row">
                      <div class="col-sm-4">
                        <?php if(isset($task[0])){ 
                          //print_r($task); 
                          } ?>
                          
                          <div class="mb-3">
                            <label>Client</label>
                            <select class="form-select" id="sel_client_id" name="client_id">
                            <option value="">---Select----</option>

                                <?php
                                foreach($clients as $client)
                                {
                                ?>
                              <option value="<?=$client['id'];?>" <?php if(isset($task[0]['client_id']) && ($task[0]['client_id']==$client['id'])) echo 'selected';else echo set_select('client_id', $client['id'])?>><?=$client['name'];?></option>
                              <?php
                                }
                                ?>
                            </select>

                          </div>
                        </div>
                        
                        <div class="col-sm-4">
                          <div class="mb-3">
                            <label>Project</label>
                            <select id="sel_Project" class="form-select" name="project_id">
                            <option value="">---Select----</option>

                                  <?php
                                  foreach($projects as $project)
                                  {
                                  ?>
                                  <option value="<?=$project['id'];?>" <?php if(isset($task[0]['project_id']) && ($task[0]['project_id']==$project['id'])) echo 'selected';else echo set_select('project_id', $project['id'])?>><?=$project['name'];?></option>
                                  <?php
                                  }
                                  ?>
                            </select>
                        
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="mb-3">
                            <label>Location</label>
                            <select id="sel_Project_loc" class="form-select" name="client_job_location_id">
                            <option value="">---Select----</option>

                                  <?php
                                  foreach($job_location as $location)
                                  {
                                  ?>
                                  <option value="<?=$location['job_location_id'];?>" <?php if(isset($task[0]['client_job_location_id']) && ($task[0]['client_job_location_id']==$location['job_location_id'])) echo 'selected';else echo set_select('client_job_location_id', $location['job_location_id'])?>><?=$location['job_location'];?></option>
                                  <?php
                                  }
                                  ?>
                            </select>
                            
                          </div>
                        </div>
                      </div>

                      <div class="row">
                      <div class="col-sm-4">
                          <div class="mb-3">
                            <label>Date</label>
                            <?php if(isset($task[0]['date_assign'])){ echo $task[0]['date_assign']; } ?>
                            <input id="datepicker" class=" form-control" type="text" data-language="en" name="date_assign" value="<?php if(isset($task[0]['date_assign'])){ echo $task[0]['date_assign']; }else echo set_value('date_assign');?>">
                          </div>
                        </div>
                        
                        <div class="col-sm-4">
                        <div class="mb-3">
                        <label>Time at site</label>
                            <input class="form-control" type="time" name="time_at_site" value="<?php if(isset($task[0]['time_at_site'])) echo $task[0]['time_at_site'];else echo set_value('time_at_site');?>">
                            
                        </div>
                            </div>
                        <div class="col-sm-4">
                          <div class="mb-3">
                          <label>Job Type</label>
                            <select class="form-select" id="job_id" name="job_id">
                            
                            <option value="">---Select----</option>

                                <?php
                                foreach($jobs as $job)
                                {
                                ?>
                                <option value="<?=$job['id'];?>" <?php if(isset($task[0]['job_id']) && ($task[0]['job_id']==$job['id'])) echo 'selected';else echo set_select('job_id', $job['id'])?>><?=$job['job_name'];?></option>
                                <?php
                                }
                                ?>
                            </select>
                          </div>
                          </div>
                              </div>
                          
                          <div class="row">
                          <div class="col-sm-4">
                          <div class="mb-3">
                          <label>Men</label>
                            <select class="form-select" name="men_count" >
                            <option value="">---Select----</option>
                            <option value="2" <?php if(isset($task[0]['men_count']) && ($task[0]['men_count']=='2')) echo 'selected';else echo set_select('men_count', '2')?>>2 Men</option>
                              <option value="3" <?php if(isset($task[0]['men_count']) && ($task[0]['men_count']=='3')) echo 'selected';else echo set_select('men_count', '3')?>>3 Men</option>
                            </select>
                            
                          </div>
                        </div>
		<div class="col-sm-4">
			
                          <div class="mb-3">
                            <label>Projector</label>
                            <select class="form-select" id="projector_id" name="projector_id">
                            <option value="">---Select----</option>

                                  <?php
                                  foreach($projectors as $projector)
                                  {
                                  ?>
                                  <option value="<?=$projector['id'];?>" <?php if(isset($task[0]['projector_id']) && ($task[0]['projector_id']==$projector['id'])) echo 'selected';else echo set_select('projector_id', $projector['id'])?>><?=$projector['projector_name'];?></option>
                                  <?php
                                  }
                                  ?>
                            </select>
                            
                          </div>
                        </div>
                        
                        
                        
                        
                       
                        <div class="col-sm-4">
                          <div class="mb-3">
                          <label>Vehicle door</label>
                            <select class="form-select" id="vehicle_door" name="vehicle_door">
                            <option value="">---Select----</option>

                                  <?php
                                  foreach($vehicles as $vehicle)
                                  {
                                  ?>
                                  <option value="<?=$vehicle['id'];?>" <?php if(isset($task[0]['vehicle_door']) && ($task[0]['vehicle_door']==$vehicle['id'])) echo 'selected';else echo set_select('vehicle_door', $vehicle['id'])?>><?=$vehicle['door_number'];?></option>
                                  <?php
                                  }
                                  ?>
                            </select>
                            
                          </div>
                        </div>
                                </div>


                        

						<div class="row">
						<div class="col-sm-2">
                          <div class="mb-3">
                          <label>Log source from PIT</label>
                            <select class="form-select" name="log_source_from_pit" >
                              <option value="">---Select----</option>
                              <option value="DMM" <?php if(isset($task[0]['log_source_from_pit']) && ($task[0]['log_source_from_pit']=='DMM')) echo 'selected';else echo set_select('log_source_from_pit', 'DMM')?>>DMM</option>
                              <option value="DMM/KRSN" <?php if(isset($task[0]['log_source_from_pit']) && ($task[0]['log_source_from_pit']=='DMM/KRSN')) echo 'selected';else echo set_select('log_source_from_pit', 'DMM/KRSN')?>>DMM/KRSN</option>
                              <option value="DMM/JUB" <?php if(isset($task[0]['log_source_from_pit']) && ($task[0]['log_source_from_pit']=='DMM/JUB')) echo 'selected';else echo set_select('log_source_from_pit', 'DMM/JUB')?>>DMM/JUB</option>
                            </select>
                            
                          </div>
                        </div>
                      <div class="col-sm-2">
                        <div class="mb-3">
                        <label>Requested Joints</label>
                            <input class="form-control" type="text" name="req_joints" value="<?php if(isset($task[0]['req_joints'])) echo $task[0]['req_joints'];else echo set_value('req_joints');?>">
                            
                        </div>
                      </div>
                   

					<div class="col-sm-2">
                          <div class="mb-3">
                            <?php // print_r($task_crew_leader); ?>
                          <label>Select Crew Leaders</label>
                            <select class="form-select" id="sel_crew_leader" name="technician">
                            <option value="">---Select----</option>
                                  <?php
                                  foreach($technicians as $tech)
                                  {
                                  ?>
                                  <option value="<?=$tech['userid'];?>" <?php if(isset($task_crew_leader[0]['user_id']) && ($task_crew_leader[0]['user_id']==$tech['userid'])) echo 'selected';else echo set_select('technician', $tech['userid'])?>><?=$tech['Name'];?></option>
                                  <?php
                                  }
                                  ?>
                            </select>
                            
                          </div>
                        </div>
                        <div class="col-sm-2">
                          <div class="mb-3">
                            <?php // print_r($task_crew_leader); ?>
                          <label>Driver</label>
                            <select class="form-select" name="driver">
                            <option value="">---Select----</option>
                                  <?php
                                  foreach($drivers as $driver)
                                  {
                                  ?>
                                  <option value="<?=$driver['userid'];?>" <?php if(isset($task[0]['driver']) && ($task[0]['driver']==$driver['userid'])) echo 'selected';else echo set_select('driver', $driver['userid'])?>><?=$driver['Name'];?></option>
                                  <?php
                                  }
                                  ?>
                            </select>
                            
                          </div>
                        </div>
                        <div class="col-sm-4">
                        <div class="mb-3">
                        <label>Remarks</label>
						<textarea name="remark" class="form-control" id="exampleFormControlTextarea4" rows="3"><?php if(isset($task[0]['remark'])) echo $task[0]['remark'];else echo set_value('remark');?></textarea>
                        </div>
						</div>
                            </div>
                            <div class="row" id="crew_members">
							
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

			foreach($technicians as $technician)
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
         <th>Delete</th>
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

      </div>

                      
                      
                      
                  
                    
  <div class="default-according" id="accordionclose">
                     
                            </div>
                   


                    </div>


                    <a href="<?php echo base_url(); ?>cordinator/tasks" name="add" class="btn btn-primary mt-4 pull-left">Back</a>
                    <button name="edit" class="btn btn-primary mt-4 pull-right" type="submit" data-bs-original-title="" title="">Update</button>
                  </div>
                              </form>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid Ends-->



                <!-- Container-fluid starts-->
                <div class="container-fluid project-create">
            <div class="row">
              <div class="col-sm-12">
               
                
              
                 
                            
               
                 
            </div>
          </div>
          <!-- Container-fluid Ends-->
                            </div>


                            </div>
<script src="<?php echo base_url();?>assets/js/deem/cordinator/task_assign.js"></script>