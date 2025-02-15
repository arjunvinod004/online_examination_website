<!-- header section -->
<div class="page-body">
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-sm-6">
                  <h3>Requested Consumables</h3>
                </div>
                <div class="col-sm-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url();?>dashboard"><i data-feather="home"></i>Home</a></li>
                    <li class="breadcrumb-item active">Requested Consumables</li>
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
                  

               <!-- <div class="row">
                <div class="col-sm-6">
                  <form method="post" action="<?php echo base_url();?>vehicle/add">
                    <button class="btn btn-primary mb-4" type="submit" title="">Add new Vehicle</button>
                  </form>
                </div>-->
                    
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
                            <th>Technician name</th>
                            <th>Consumable name</th>
                            <th>Count Requested</th>
                            <th>Status</th>
                            
                         
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                       if(!empty($all)){
                       $count = 1;
                       foreach($all as $val){ ?>
                       
                       <tr>
                           
                           
                            <td><?php echo $count; ?></td>
                            <td><?php echo $val['Name'];?></td>
                            <td><?php echo $val['cons_name'];?></td>
                            <td><?php echo $val['count_requested'];?></td>
                            <td><select name="status" class="approve" data-count="<?php echo $val['count_requested'];?>" data-technician="<?php echo $val['technician_id'];?>" data-consumable="<?php echo $val['consumable_id'];?>" data-id="<?php echo $val['id'];?>">
                                <option value="0" <?php if($val['status']=='0') echo 'selected';?>>Requested</option>
                                <option value="1" <?php if($val['status']=='1') echo 'selected';?>>Approved</option>
                                <option value="2" <?php if($val['status']=='2') echo 'selected';?>>Collected</option>

                            </select></td>
                            
                            
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
        <script src="<?php echo base_url();?>assets/js/deem/consumables/consumables.js"></script>