<!-- header section -->
<div class="page-body">
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-sm-6">
                  <h3>Vehicles</h3>
                </div>
                <div class="col-sm-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url();?>dashboard"><i data-feather="home"></i>Home</a></li>
                    <li class="breadcrumb-item active">Vehicles</li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid starts-->
          
          
          
          
          <!--modal for delete confirmation-->
          <div class="modal fade" id="deleteVehicle" tabindex="-1" role="dialog" aria-labelledby="deleteVehicleLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="deleteVehicleLabel"><?php echo confirm; ?></h5>
                              <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" name="id" id="vehicle_id" value=""/>
                                <?php echo are_you_sure; ?></div>
                            <div class="modal-footer">
                              <button class="btn btn-primary" type="button" data-bs-dismiss="modal">No</button>
                              <button class="btn btn-secondary" id="yes_del_vehicle" type="button" data-bs-dismiss="modal">Yes</button>
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
                <?php if($this->Rolemodel->check_permission(50,$this->session->userdata('roleid'),'can_add') == 1){ ?>
                  <form method="post" action="<?php echo base_url();?>vehicle/add">
                    <button class="btn btn-primary mb-4" type="submit" title="">Add new Vehicle</button>
                  </form>
                  <?php } ?>
                </div>
                    
                <!-- <div class="col-sm-6 pull-right">
                 <a target="_blank" href="<?php echo base_url();?>staff/csv" class="btn btn-primary mb-4" type="submit" title="">CSV</a>
                 <a target="_blank" href="<?php echo base_url();?>staff/pdf" class="btn btn-primary mb-4" type="submit" title="">PDF</a>
                 <a target="_blank" href="<?php echo base_url();?>staff/excel" class="btn btn-primary mb-4" type="submit" title="">Excel</a>
                </div>  -->

                </div>
                                  <div class="">

                    <div class="table-responsive theme-scrollbar">
                      <table class="display" id="basic-1">
                        <thead>
                          <tr>
                        <th>No</th>
                            <th>Type</th>
                            <th>Plant</th>
                            <th>Register Number</th>
                            <th>Aramco Id</th>
                            <th>door_number</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                       if(!empty($all)){
                       $count = 1;
                       foreach($all as $val){ ?>
                       
                       <tr>
                           
                           
                            <td><?php echo $count; ?></td>
                            <td><?php echo $val['type_name'];?></td>
                            <td><?php echo $val['name'];?></td>
                            <td><?php echo $val['reg_number'];?></td>
                            <td><?php echo $val['aramco_id'];?></td>
                            <td><?php echo $val['door_number'];?></td>

                            <td> 
                              <ul class="action">
                                 
                              <?php if($this->Rolemodel->check_permission(50,$this->session->userdata('roleid'),'can_edit') == 1){ ?>
                                <li class="delete">
                                    <form action="<?php echo base_url();?>vehicle/edit" method="post">
                                      <input type="hidden" name="id" value="<?php echo $val['id']; ?>"> 
                                        <button class="" type="submit" data-bs-toggle="tooltip" data-id="<?php echo $val['id']; ?>" data-bs-original-title="Edit Vehicle"><i class="fa fa-edit"></i></button>
                                    </form>
                                </li>
                                <?php } ?>
                                
                                <?php if($this->Rolemodel->check_permission(50,$this->session->userdata('roleid'),'can_delete') == 1){ ?>
                                <li class="edit">
                                    <form action="<?php echo base_url();?>vehicle/delete" method="post">
                                      <input type="hidden" name="id" value="<?php echo $val['id']; ?>"> 
                                        <button class="del_vehicle" type="button" data-bs-toggle="modal" data-id="<?php echo $val['id']; ?>" data-bs-original-title="Delete Vehicle" data-bs-target="#deleteVehicle"><i class="fa fa-close"></i></button>
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
        <script src="<?php echo base_url();?>assets/js/deem/vehicle/vehicle.js"></script>