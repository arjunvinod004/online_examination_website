<!-- header section -->
<div class="page-body">
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-sm-6">
                  <h3>Staff</h3>
                </div>
                <div class="col-sm-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url();?>dashboard"><i data-feather="home"></i>Home</a></li>
                    <li class="breadcrumb-item active">Staff</li>
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
                                <input type="hidden" name="id" id="staff_id" value=""/>
                                <?php echo are_you_sure; ?></div>
                            <div class="modal-footer">
                              <button class="btn btn-primary" type="button" data-bs-dismiss="modal">No</button>
                              <button class="btn btn-secondary" id="yes_del_staff" type="button" data-bs-dismiss="modal">Yes</button>
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
                <div class="col-sm-6">

                <?php if($this->Rolemodel->check_permission(44,$this->session->userdata('roleid'),'can_add') == 1){ ?>
                  <form method="post" action="<?php echo base_url();?>staff/add">
                    <button class="btn btn-primary mb-4" type="submit" title="">Add new staff</button>
                  </form>
                <?php } ?>

                </div>
                 
                
                <div class="col-sm-6 pull-right">
                <?php if($this->Rolemodel->check_permission(44,$this->session->userdata('roleid'),'can_view') == 1){ ?>
                 <a target="_blank" href="<?php echo base_url();?>staff/csv" class="btn btn-primary mb-4" type="submit" title="">CSV</a>
                 <a target="_blank" href="<?php echo base_url();?>staff/pdf" class="btn btn-primary mb-4" type="submit" title="">PDF</a>
                 <a target="_blank" href="<?php echo base_url();?>staff/excel" class="btn btn-primary mb-4" type="submit" title="">Excel</a>
                <?php } ?>
                </div> 
                </div>
                                  <div class="">

                    <div class="table-responsive theme-scrollbar">
                      <table class="display" id="basic-1">
                        <thead>
                          <tr>
                        <th>No</th>
                            <th>Employee Id</th>
                            <th>Name</th>
                            <th>Contact Number</th>
                            <th>Role Name</th>

                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                       if(!empty($staff)){
                       $count = 1;
                       foreach($staff as $val){ ?>
                       
                       <tr>
                           
                           
                            <td><?php echo $count; ?></td>
                            <td><?php echo $val['emp_id'];?></td>
                            <td><?php echo $val['Name'];?></td>
                            <td><?php echo $val['UserPhoneNumber'];?></td>
                            <td><?php echo $val['rolename'];?></td>

                            <td> 
                              <ul class="action">
                                
                              <?php if($this->Rolemodel->check_permission(44,$this->session->userdata('roleid'),'can_edit') == 1){ ?>
                                <li class="delete">
                                    <form action="<?php echo base_url();?>staff/edit" method="post">
                                      <input type="hidden" name="userid" value="<?php echo $val['userid']; ?>"> 
                                        <button class="" type="submit" data-bs-toggle="tooltip" data-id="<?php echo $val['userid']; ?>" data-bs-original-title="Edit Staff"><i class="fa fa-edit"></i></button>
                                    </form>
                                </li>
                                <?php } ?>

                                <?php if($this->Rolemodel->check_permission(44,$this->session->userdata('roleid'),'can_view') == 1){ ?>
                                <li class="delete">
                                    <form action="<?php echo base_url();?>staff/view" method="post">
                                      <input type="hidden" name="userid" value="<?php echo $val['userid']; ?>"> 
                                        <button class="" type="submit" data-bs-toggle="tooltip" data-id="<?php echo $val['userid']; ?>" data-bs-original-title="Staff Details"><i class="fa fa-eye"></i></button>
                                    </form>
                                </li>
                                <?php } ?>

                                <?php if($this->Rolemodel->check_permission(44,$this->session->userdata('roleid'),'can_delete') == 1){ ?>
                                <li class="edit">
                                    <form action="<?php echo base_url();?>module/delete" method="post">
                                      <input type="hidden" name="userid" value="<?php echo $val['userid']; ?>"> 
                                        <button class="del_staff" type="button" data-bs-toggle="modal" data-id="<?php echo $val['userid']; ?>" data-bs-original-title="Delete Staff" data-bs-target="#exampleModal"><i class="fa fa-close"></i></button>
                                    </form>
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
        <script src="<?php echo base_url();?>assets/js/deem/staff/staff.js"></script>