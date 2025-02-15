<!-- header section -->
<div class="page-body">
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-sm-6">
                  <h3>Assigned Tasks</h3>
                </div>
                <div class="col-sm-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url();?>dashboard"><i data-feather="home"></i>Home</a></li>
                    <li class="breadcrumb-item active">Assigned Tasks</li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid starts-->
          
          
          
          
          <!--modal for delete confirmation-->
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel"><?php echo confirm; ?></h5>
                              <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" name="id" id="task_id" value=""/>
                                <?php echo are_you_sure; ?></div>
                            <div class="modal-footer">
                              <button class="btn btn-primary" type="button" data-bs-dismiss="modal">No</button>
                              <button class="btn btn-secondary" id="yes_del_task" type="button" data-bs-dismiss="modal">Yes</button>
                            </div>
                          </div>
                        </div>
                      </div>
        <!--modal for delete confirmation-->
          
          
          
          
          
          <div class="container-fluid dashboard-default">
         
           
           
           
           
           
            <?php if($this->session->flashdata('success')){ ?>
                    <div class="alert alert-success dark" role="alert">
                        <?php echo $this->session->flashdata('success');$this->session->unset_userdata('success'); ?>
                    </div><?php } ?>
                    
                    <?php if($this->session->flashdata('error')){ ?>
                    <div class="alert alert-danger dark" role="alert">
                        <?php echo $this->session->flashdata('error');$this->session->unset_userdata('error'); ?>
                    </div><?php } ?>
                    
            <div class="row">
             
              
              
            <div class="col-sm-12">
            
                <div class="card">
                
                
                
                  
                
                <div class="card-header pb-0">
                  

                <div class="row">


                <div class="row">
            <div class="col-sm-12">
                <div class="">
                <div class=" pb-0">
                <div class="d-flex">
                <div class="col-md-3">
                          <div class="mb-3 me-3">
                            <label class="form-label f-w-500">Client</label>
                            <select class="form-select" name="status" id="client_select">
                            <option value="">Select</option>
                            <?php foreach($client as $value){?>
                              <option value="<?=$value['id'];?>"><?=$value['name'];?></option>
                            <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                    <div class="mb-3 me-3">
                            <label class="form-label f-w-500">Status</label>
                            <select class="form-select" name="status" id="technician_select">
                            <option value="">Select</option>
                            <option value="0">Pending</option>
                            <option value="1">Approved</option>
                            <option value="2">Started</option>
                            <option value="3">Completed</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                    <div class="mb-3 me-3 d-none">
                            <label class="form-label f-w-500">Select</label>
                            <select class="form-select" name="status" id="select_criteria">
                                <option value="">Select</option>
                                <option value="date">Date </option>
						        <option value="week">Week</option>
						        <option value="month">Month</option>
                                <option value="range">Date Range</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3" id="display_filter">
                    
                        <div class="mb-3 d-none" id="date_display">
                            <label>Date</label>
                            <input id="date" class="datepicker-here form-control" type="text" data-language="en" name="date_assign">
                        </div>
                    
                        <div class="mb-3 d-none" id="month_display">
                            <label>Month</label>
                            <input id="month" class="datepicker-here form-control" type="text" data-language="en" name="date_assign" data-min-view="months" data-view="months" data-date-format="MM yyyy">
                        </div>
                    
                        <div class="mb-3 d-none" id="week_display">
                            <label>Select date range</label>
                            <input id="week" class="datepicker-here form-control" type="text" data-language="en" name="date_assign" data-range="true" data-multiple-dates-separator=" - " data-language="en">
                          </div>
                            
                 
                        <div class="mb-3 d-none" id="date_range_display">
                            <label>Date Range</label>
                            <input id="range" type="text" class="form-control" name="daterange" value="" />
                        </div>
                    </div>
                            </div>
                          
                          <div class="ccol-sm-3 pull-right">
                            <div class="">
                            <?php 
                 if($this->Rolemodel->check_permission(52,$this->session->userdata('roleid'),'can_view') == 1){// 52 is module_id
                   ?>       
                 <a target="_blank" id="filter_csv" class="btn btn-primary mb-4 d-none" type="submit" title="">CSV</a>
                 <a target="_blank" id="filter_pdf" class="btn btn-primary mb-4" type="submit" title="">PDF</a>
                 <a target="_blank" id="filter_excel" class="btn btn-primary mb-4 d-none" type="submit" title="">Excel</a>
                 <?php 
                 if($this->Rolemodel->check_permission(52,$this->session->userdata('roleid'),'can_view') == 1){// 52 is module_id
                   ?>
                <form method="post" action="<?php echo base_url();?>cordinator/task_excel">
                    <button class="btn btn-primary mb-4" type="submit" title="">Download task details</button>
                </form>
                <?php } ?>
                 <?php } ?>
                </div> 

                </div>




                <div class="col-sm-6">
                 
                 
                 <?php 
                 if($this->Rolemodel->check_permission(52,$this->session->userdata('roleid'),'can_add') == 1){// 52 is module_id
                   ?>
                <form method="post" action="<?php echo base_url();?>cordinator/task_assign">
                    <button class="btn btn-primary mb-4" type="submit" title="">Add new task</button>
                </form>
                <?php } ?>
                
                 
                </div>
                   
               
              
                </div>
                 </div>
                 </div>
                                  <div class="">

                    <div class="table-responsive theme-scrollbar">
                      <table class="display" id="basic-1">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Task Id</th>
                            <th>Client</th>
                            <th>project</th>
                            <th>Location</th>
                            <th>Assigned Date</th>
                            <th>Status</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php //print_r($tasks);
                       if(!empty($tasks)){
                       $count = 1;
                       foreach($tasks as $val){ ?>
                       
                       <tr>
                           
                           
                            <td><?php echo $count; ?></td>
                            <td><?php echo $val['id'];?></td>
                            <td><?php echo $val['name'];?></td>
                            <td><?php echo $val['proj_name'];?></td>
                            <td><?php echo $val['job_location'];?></td>
                            <td><?php echo $val['date_assign'];?></td>
                            <?php 
                            if($val['status'] == 0 && $val['work_approve'] == 0){
                              $class= "text-danger";
                              $text = "Pending";
                            }if($val['status'] == 0 && $val['work_approve'] == 1){
                              $class= "text-primary";
                              $text = "Approved";
                            }if($val['status'] == 1 && $val['work_approve'] == 1){
                              $class= "text-info";
                              $text = "Started";
                            }if($val['status'] == 2 && $val['work_approve'] == 1){
                              $class= "text-warning";
                              $text = "in progress";
                            }if($val['status'] == 3 && $val['work_approve'] == 1){
                              $class= "text-success";
                              $text = "Completed";
                            }
                            if($val['status'] == 4 && $val['work_approve'] == 0){
                              $class= "text-danger";
                              $text = "Reshoot";
                            }
                            ?>
                            <td><b class="<?php echo $class;?>"><b><?php echo $text;?></b></td>

                            <td> 
                              <ul class="action">
                                
                              <?php if($this->Rolemodel->check_permission(52,$this->session->userdata('roleid'),'can_edit') == 1){ ?>
                                <li class="edit">
                                    <form action="<?php echo base_url();?>cordinator/edit_task" method="post">
                                      <input type="hidden" name="id" value="<?php echo $val['id']; ?>">
                                      <input type="hidden" name="client_id" value="<?php echo $val['client_id']; ?>">
                                      <input type="hidden" name="project_id" value="<?php echo $val['project_id']; ?>"> 
                                        <button class="bg-primary" type="submit" data-bs-toggle="tooltip" data-id="<?php echo $val['id']; ?>" >Edit</button>
                                    </form>
                                </li>
                                <?php } ?>

                                <?php if($this->Rolemodel->check_permission(52,$this->session->userdata('roleid'),'can_view') == 1){ ?>
                                <li class="edit">
                                    <form action="<?php echo base_url();?>cordinator/task_view" method="post">
                                      <input type="hidden" name="id" value="<?php echo $val['id']; ?>"> 
                                        <button class="bg-info" type="submit" data-bs-toggle="tooltip" data-id="<?php echo $val['id']; ?>" >View</button>
                                    </form>
                                </li>
                                <?php } ?>

                                <?php if($this->Rolemodel->check_permission(52,$this->session->userdata('roleid'),'can_delete') == 1){ ?>
                                <li class="edit">
                                        <button class="del_task bg-danger" type="button" data-bs-toggle="modal" data-id="<?php echo $val['id']; ?>" data-bs-target="#exampleModal">Delete</button>
                                </li>
                                <?php } ?>

                                <?php if($val['work_approve'] == 0){ ?>
                                <li class="edit">
                                <?php if($this->Rolemodel->check_permission(52,$this->session->userdata('roleid'),'can_approve') == 1){ ?>
                                  
                                    <form action="<?php echo base_url();?>cordinator/task_approve" method="post">
                                      <input type="hidden" name="id" value="<?php echo $val['id']; ?>"> 
                                        <button class="bg-success" type="submit" data-bs-toggle="tooltip" data-id="<?php echo $val['id']; ?>" >Approve</button>
                                    </form>
                                
                                <?php } ?>
                                </li>
                                <?php } ?>

                              </ul>
                            </td>
                            
                          </tr>
                          
                       <?php $count++; }} ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div></div></div>
            </div>
            
           
            
            
            
            
            
          </div>
          <!-- Container-fluid Ends-->
        </div>
        
        <!-- footer section -->
        <script src="<?php echo base_url();?>assets/js/deem/cordinator/task_filter.js"></script>
        <script src="<?php echo base_url();?>assets/js/deem/cordinator/task_assign.js"></script>