<!-- header section -->
<div class="page-body">
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-sm-6">
                  <h3>Vehicle logs</h3>
                </div>
                <div class="col-sm-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url();?>dashboard"><i data-feather="home"></i>Home</a></li>
                    <li class="breadcrumb-item active">Vehicle logs</li>
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
                                <input type="hidden" name="id" id="client_id" value=""/>
                                <?php echo are_you_sure; ?></div>
                            <div class="modal-footer">
                              <button class="btn btn-primary" type="button" data-bs-dismiss="modal">No</button>
                              <button class="btn btn-secondary" id="yes_del_client" type="button" data-bs-dismiss="modal">Yes</button>
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
                
                

                </div>
                    
                <div class="col-sm-6 pull-right">

                <?php if($this->Rolemodel->check_permission(37,$this->session->userdata('roleid'),'can_view') == 1){ ?>
                 <!-- <a target="_blank" href="<?php echo base_url();?>client/csv" class="btn btn-primary mb-4" type="submit" title="">CSV</a>
                 <a target="_blank" href="<?php echo base_url();?>client/pdf" class="btn btn-primary mb-4" type="submit" title="">PDF</a>
                 <a target="_blank" href="<?php echo base_url();?>client/excel" class="btn btn-primary mb-4" type="submit" title="">Excel</a> -->
                <?php } ?>

                </div> 
                </div>


                  <div class="">
                    <div class="table-responsive theme-scrollbar">
                      <table class="display" id="basic-1">
                        <thead>
                          <tr>
                        <th>No</th>
                           <th>Door number</th>
                            <th>Date</th>
                            <th>Reading</th>
                            <th>Reading Photo</th>
                          
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                       if(!empty($logs)){
                       $count = 1;
                       foreach($logs as $val){ ?>
                       
                       <tr>
                           
                           
                            <td><?php echo $count; ?></td>
                            <td><a href=""><?php echo $val['vehicle_id'];?></a></td>
                            <td><?php echo $val['date'];?></td>
                            <td><?php echo $val['reading'];?></td>
                            <td><a target="_blank" href="<?php echo base_url(); ?>uploads/readings/<?php echo $val['reading_photo'];?>"><img width="100" height="100" src="<?php echo base_url(); ?>uploads/readings/<?php echo $val['reading_photo'];?>"></a></td>
                            
                            
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
        <script src="<?php echo base_url();?>assets/js/deem/client/client.js"></script>
