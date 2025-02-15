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
                    <li class="breadcrumb-item active">Assign a task</li>
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
                    <form id="myform" method="post" action="<?php echo base_url(); ?>cordinator/task_assign_save" enctype="multipart/form-data">
                      <div class="row">
                      
                        <div class="col-sm-4">
                          <div class="mb-3">
                            <label>Client</label>
                            <select class="form-select" id="sel_client_id" name="client_id">
                            <option value="">Select</option>

                                <?php
                                foreach($clients as $client)
                                {
                                ?>
                              <option value="<?=$client['id'];?>" <?php echo set_select('client_id', $client['id'])?>><?=$client['name'];?></option>
                              <?php
                                }
                                ?>
                            </select>
                            <?php if(form_error('client_id')){ ?>
                           <div class="errormsg" role="alert"><?php echo form_error('client_id'); ?></div>
                          <?php } ?>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="mb-3">
                            <label>Project</label>
                            <select id="sel_Project" class="form-select" name="project_id">
                              
                            </select>
                            <?php if(form_error('project_id')){ ?>
                           <div class="errormsg" role="alert"><?php echo form_error('project_id'); ?></div>
                          <?php } ?>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="mb-3">
                            <label>Location</label>
                            <select id="sel_Project_loc" class="form-select" name="client_job_location_id">
                              
                            </select>
                            <?php if(form_error('client_job_location_id')){ ?>
                           <div class="errormsg" role="alert"><?php echo form_error('client_job_location_id'); ?></div>
                          <?php } ?>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                      <div class="col-sm-4">
                          <div class="mb-3">
                            <label>Date</label>
                            <input class="datepicker-here form-control" type="text" data-language="en" name="date_assign" value="<?php echo set_value('date_assign');?>">
                          </div>
                        </div>
                        <div class="col-sm-4">
                        <div class="mb-3">
                        <label>Time at site</label>
                            <input class="form-control" type="time" name="time_at_site" value="<?php echo set_value('time_at_site');?>">
                            <?php if(form_error('time_at_site')){ ?>
                           <div class="errormsg" role="alert"><?php echo form_error('time_at_site'); ?></div>
                          <?php } ?>
                        </div>
                            </div>
                        <div class="col-sm-4">
                          <div class="mb-3">
                          <label>Job Type</label>
                            <select class="form-select" id="job_id" name="job_id">
                            <option value="">Select</option>

                                <?php
                                foreach($jobs as $job)
                                {
                                ?>
                              <option value="<?=$job['id'];?>" <?php echo set_select('client_id', $job['id'])?>><?=$job['job_name'];?></option>
                              <?php
                                }
                                ?>
                            </select>
                          </div>
                          </div>
                        </div>
                        <input type="hidden" id="selected_date" value="">
                        <div id="response">
                        
                      



                    </div>
                              </div>
                        


                    
                  
                    
                      <!-- <a href="<?php echo base_url(); ?>staff" name="add" class="btn btn-primary mt-4 pull-left">Back</a> -->
                    <input name="add" class="btn btn-primary mt-4 pull-right" type="submit" data-bs-original-title="" value="Next">

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