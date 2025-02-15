<!-- header section -->
		<div class="page-body">
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-sm-6">
                  <h3>Vehicle types</h3>
                </div>
                <div class="col-sm-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url();?>dashboard"><i data-feather="home"></i>Home</a></li>
                    <li class="breadcrumb-item active">Vehicle types</li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid starts-->
          
          
          
          
          <!--modal for delete confirmation-->
          <div class="modal fade" id="DeleteVehType" tabindex="-1" role="dialog" aria-labelledby="DeleteVehTypeLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="DeleteVehTypeLabel"><?php echo confirm; ?></h5>
                              <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" name="id" id="type_id" value=""/>
                               <?php echo are_you_sure; ?></div>
                            <div class="modal-footer">
                              <button class="btn btn-primary" type="button" data-bs-dismiss="modal">No</button>
                              <button class="btn btn-secondary" id="yes_del_type" type="button" data-bs-dismiss="modal">Yes</button>
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
              <!-- Zero Configuration  Starts-->
              <div class="col-sm-4">
                <div class="card">
                    
                  <div class="card-header pb-0">
                      
                    
                    
                    
                    
                    
                    
                    
                    
                     <!-- Zero Configuration  Starts-->
              <div class="col-sm-12">
                  
                <?php 
                if(isset($Details[0]['id'])) {
                    $path=base_url().'vehicletype/edit';
                    $button_text='Update';
                    $button_name='edit';
                }else{
                    $path= base_url().'vehicletype/add';
                    $button_text='Add new vehicletype';
                    $button_name='add';
                }?>
                        
                  <form class="" method="post" action="<?php echo $path;?>">
                      <input type="hidden" name="id" value="<?php  if(isset($Details[0]['id'])){echo $Details[0]['id'];}?>">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="mb-3">
                            <label class="form-label f-w-500">Type</label>
                            <input class="form-control" value="<?php if(isset($Details[0]['type_name'])){echo $Details[0]['type_name']; }else{ echo set_value('type_name'); } ?>" type="text" name="type_name">
                          </div>
                          <?php if(form_error('type_name')){ ?>
<div class="errormsg" role="alert"><?php echo form_error('type_name'); ?></div>
                  <?php } ?>
                        </div>
                        
                        
  
                        
                       <?php if(isset($Details[0]['id'])) { ?>
                        <div class="col-md-12">
                          <div class="mb-3">
                            <label class="form-label f-w-500">Is Active</label>
                            <select class="form-control btn-square" name="status">
                              <option value="">Select Status</option>
						<option value="1" <?php if(isset($Details[0]['is_active']) && $Details[0]['is_active']=='1'){echo 'selected'; }else{ echo set_select('status', '1'); } ?>>Yes</option>
						<option value="0" <?php if(isset($Details[0]['is_active']) && $Details[0]['is_active']=='0'){echo 'selected'; }else{ echo set_select('status', '0'); }?>>No</option>
                            </select>
                          </div>
                          <?php if(form_error('status')){ ?>
<div class="errormsg" role="alert"><?php echo form_error('status'); ?></div>
                  <?php } ?>
                        </div>
<?php } ?>
                         
                       <div class="col-md-12">
                          <div class="">

                          <?php if($this->Rolemodel->check_permission(49,$this->session->userdata('roleid'),'can_add') == 1){ ?>
                              <button class="btn btn-primary mb-3 pull-right" type="submit" name="<?php echo $button_name; ?>" value="add"><?php echo $button_text; ?></button>
                          <?php } ?>
                            </div>
                    </div>
                      </div>
                    </div>
                    <div class="mb-3 text-end">
                      
                    </div>
                  </form>
               
              <!-- Zero Configuration  Ends-->
              
              
              
                    
                    
                    
    
                  </div>
                
                  
                </div>
              </div>
              <!-- Zero Configuration  Ends-->
              
              
            <div class="col-sm-8">
                <div class="card">
                    
                  <div class="card-header pb-0">
                    <div class="">
                       
                    <div class="table-responsive theme-scrollbar">
                      <table class="display" id="basic-1">
                        <thead>
                          <tr>
                        <th>No</th>
                            <th>Name</th>
                            
                            <th class="text-center">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                       if(!empty($all)){
                       $count = 1;
                       foreach($all as $val){ ?>
                       
                       <tr>
                           
                            <form action="" method="post">  
                            <td><?php echo $count; ?></td>
                            <td><?php echo $val['type_name'];?></td>
                            
                            </form>
                            <td> 
                              <ul class="action pull-right">

                              <?php if($this->Rolemodel->check_permission(49,$this->session->userdata('roleid'),'can_edit') == 1){ ?>
                                <li class="delete">
                                    <form action="<?php echo base_url();?>vehicletype/edit" method="post">
                                      <input type="hidden" name="id" value="<?php echo $val['id']; ?>"> 
                                        <button type="submit" data-bs-toggle="tooltip" data-id="<?php echo $val['id']; ?>" data-bs-original-title="Edit vehicletype"><i class="fa fa-edit"></i></button>
                                    </form>
                                </li>
                                <?php } ?>

                                <?php if($this->Rolemodel->check_permission(49,$this->session->userdata('roleid'),'can_delete') == 1){ ?>
                                <li class="edit">
                                    <form action="<?php echo base_url();?>vehicletype/delete" method="post">
                                      <input type="hidden" name="id" value="<?php echo $val['id']; ?>"> 
                                        <button class="del_vehicletype" type="button" data-bs-toggle="modal" data-id="<?php echo $val['id']; ?>" data-bs-original-title="Delete vehicletype" data-bs-target="#DeleteVehType"><i class="fa fa-close"></i></button>
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
