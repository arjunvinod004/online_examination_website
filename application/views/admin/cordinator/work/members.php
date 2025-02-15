
<!-- header section -->
<div class="page-body">
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-sm-6">
                  <h3>Assign a task</h3>
                </div>
                <div class="col-sm-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url();?>dashboard"><i data-feather="home"></i>Home</a></li>
                    <li class="breadcrumb-item active">Assign crew leader and members</li>
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
                <form id="myform" method="post" action="<?php echo base_url(); ?>cordinator/save" enctype="multipart/form-data">
                    <input type="hidden" name="work_id" id="work_id" value="<?php if(isset($work_id)){ echo $work_id; } ?>">  
                    <div class="row">
                    
                        <div class="col-sm-4">
                          <div class="mb-3">
                          <label>Select Crew Leader</label>
                            <select class="form-select" id="sel_crew_leader" name="technician">
                            <option value="">---Select----</option>
                                <?php
                                foreach($technicians as $technician)
                                {
                                ?>
                              <option value="<?=$technician['userid'];?>" <?php echo set_select('client_id', $technician['userid'])?>><?=$technician['Name'];?></option>
                              <?php
                                }
                                ?>
                            </select>
                           
                          </div>
                        </div>

                      </div>
                      <div class="row" id="crew_members">
							
						

					</div>
                    </div>
                    

                    <div id="field_wrapper">
							
                    </div>

                    <input type="hidden" id="selected_date" value="">
                  
                    
                      <!-- <a href="<?php echo base_url(); ?>staff" name="add" class="btn btn-primary mt-4 pull-left">Back</a> -->
                    <input name="addtask" class="btn btn-primary mt-4 pull-right" type="submit" data-bs-original-title="" value="Save">

                      </div>
                      
                    

                        

                      </div>
                            </div>
                            </div>
                   


                    </div>
                    
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