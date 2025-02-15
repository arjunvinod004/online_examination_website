<!-- header section -->
		<div class="page-body">
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-sm-6">
                  <h3>Projectors</h3>
                </div>
                <div class="col-sm-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url();?>dashboard"><i data-feather="home"></i>Home</a></li>
                    <li class="breadcrumb-item active">Projectors</li>
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
                                <input type="hidden" name="id" id="Projector_id" value=""/>
                               <?php echo are_you_sure; ?></div>
                            <div class="modal-footer">
                              <button class="btn btn-primary" type="button" data-bs-dismiss="modal">No</button>
                              <button class="btn btn-secondary" id="yes_del_Projector" type="button" data-bs-dismiss="modal">Yes</button>
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
                if(isset($projDet[0]['id'])) {
                    $path=base_url().'projector/edit';
                    $button_text='Update';
                    $button_name='edit';
                }else{
                    $path= base_url().'projector/add';
                    $button_text='Add new projector';
                    $button_name='add';
                }?>
                        <?php //print_r($projDet[0]); ?>
                  <form class="" method="post" action="<?php echo $path;?>">
                      <input type="hidden" name="id" value="<?php  if(isset($projDet[0]['id'])){echo $projDet[0]['id'];}?>">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="mb-3">
                            <label class="form-label f-w-500">Projector</label>
                            <input class="form-control" value="<?php if(isset($projDet[0]['projector_name'])){echo $projDet[0]['projector_name']; }else{ echo set_value('projector_name'); } ?>" type="text" name="projector_name">
                          </div>
                          <?php if(form_error('projector_name')){ ?>
<div class="errormsg" projector_name="alert"><?php echo form_error('projector_name'); ?></div>
                  <?php } ?>
                        </div>
                        <div class="col-md-12">
                          <div class="mb-3">
                            <div class="form-label">
                            <label class="form-label f-w-500">Location</label>
                            <select class="form-select" name="location">
                            <option value=" ">---Select----</option>

                                <?php
                                foreach($locations as $loc)
                                {
                                ?>
                               <option value="<?=$loc['id'];?>" <?php if(isset($projDet[0]['location_id']) && ($projDet[0]['location_id']==$loc['id'])) echo 'selected';else echo set_select('location', $loc['id'])?>><?=$loc['location'];?></option>
                              <?php
                                }
                                ?>
                            </select>
                            <?php if(form_error('location')){ ?>
                           <div class="errormsg" role="alert"><?php echo form_error('location'); ?></div>
                          <?php } ?>
                            </div>
                          </div>
                        </div>
                        
                        <div class="col-md-12">
                          <div class="mb-3">
                            <label class="form-label f-w-500">Description</label>
                            <textarea class="form-control" type="text" name="details"><?php if(isset($projDet[0]['details'])){echo $projDet[0]['details']; }else{ echo set_value('details'); } ?></textarea>
                          </div>
                        </div>
                       <?php if(isset($projDet[0]['id'])) { ?>
                        <div class="col-md-12">
                          <div class="mb-3">
                            <label class="form-label f-w-500">Is Active</label>
                            <select class="form-control btn-square" name="status">
                              <option value="">Select Status</option>
						<option value="1" <?php if(isset($projDet[0]['is_active']) && $projDet[0]['is_active']=='1'){echo 'selected'; }else{ echo set_select('status', '1'); } ?>>Yes</option>
						<option value="0" <?php if(isset($projDet[0]['is_active']) && $projDet[0]['is_active']=='0'){echo 'selected'; }else{ echo set_select('status', '0'); }?>>No</option>
                            </select>
                          </div>
                          <?php if(form_error('status')){ ?>
<div class="errormsg" role="alert"><?php echo form_error('status'); ?></div>
                  <?php } ?>
                        </div>
                          <?php } ?>
                         
                       <div class="col-md-12">
                          <div class="">
                          <?php if($this->Rolemodel->check_permission(43,$this->session->userdata('roleid'),'can_add') == 1){ ?>
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
                           <th>Projector</th>
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
                            <td><?php echo $val['projector_name'];?></td>
                            <!--<td><?php if($val['is_active'] == 1) { echo "Yes"; }?></td>-->
                            </form>
                            <td> 
                              <ul class="action pull-right">
                              
                              <?php if($this->Rolemodel->check_permission(43,$this->session->userdata('roleid'),'can_edit') == 1){ ?>
                                <li class="delete">
                                    <form action="<?php echo base_url();?>projector/edit" method="post">
                                      <input type="hidden" name="id" value="<?php echo $val['id']; ?>"> 
                                        <button class="edit_role" type="submit" data-bs-toggle="tooltip" data-id="<?php echo $val['id']; ?>" data-bs-original-title="Edit Projector"><i class="fa fa-edit"></i></button>
                                    </form>
                                </li>
                                <?php } ?>

                                <?php if($this->Rolemodel->check_permission(43,$this->session->userdata('roleid'),'can_delete') == 1){ ?>
                                <li class="edit">
                                        <button class="del_Projector" type="button" data-bs-toggle="modal" data-id="<?php echo $val['id']; ?>" data-bs-original-title="Delete Projector" data-bs-target="#exampleModal"><i class="fa fa-close"></i></button>
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
        <script src="<?php echo base_url();?>assets/js/deem/Job/job.js"></script>
