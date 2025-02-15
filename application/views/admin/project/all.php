<!-- header section -->
<div class="page-body">
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-sm-6">
                  <h3>Projects</h3>
                </div>
                <div class="col-sm-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url();?>dashboard"><i data-feather="home"></i>Home</a></li>
                    <li class="breadcrumb-item active">Projects</li>
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
                                <input type="hidden" name="id" id="role_id" value=""/>
                               <?php echo are_you_sure; ?></div>
                            <div class="modal-footer">
                              <button class="btn btn-primary" type="button" data-bs-dismiss="modal">No</button>
                              <button class="btn btn-secondary" id="yes_del_role" type="button" data-bs-dismiss="modal">Yes</button>
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
              <div class="col-sm-3">
                <div class="card">
                    
                  <div class="card-header pb-0">
                      
                    
                    
                    
                    
                    
                    
                    
                    
                     <!-- Zero Configuration  Starts-->
              <div class="col-sm-12">
                  
                <?php 
                if(isset($roleDet[0]['roleid'])) {
                    $path=base_url().'role/edit';
                    $button_text='Update';
                    $button_name='edit';
                }else{
                    $path= base_url().'project/add';
                    $button_text='Add new project';
                    $button_name='add';
                }?>
                        
                  <form class="" method="post" action="<?php echo $path;?>">
                      <input type="hidden" name="roleid" value="<?php  if(isset($roleDet[0]['roleid'])){echo $roleDet[0]['roleid'];}?>">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="mb-3">
                            <label class="form-label f-w-500">Name</label>
                            <input class="form-control" value="<?php if(isset($roleDet[0]['name'])){echo $roleDet[0]['rolename']; }else{ echo set_value('name'); } ?>" type="text" name="name">
                          </div>
                          <?php if(form_error('name')){ ?>
<div class="errormsg" role="alert"><?php echo form_error('name'); ?></div>
                  <?php } ?>
                        </div>
                        
                        <div class="col-md-12">
                          <div class="mb-3">
                            <label class="form-label f-w-500">Client</label>
                            <select class="form-control btn-square" name="client">
                            <option value=" ">Select</option>
                                <?php
                                foreach($clients as $client)
                                {
                                ?>
                              <option value="<?=$client['id'];?>" <?php echo set_select('client', $client['id'])?>><?=$client['name'];?></option>
                              <?php
                                }
                                ?>
                            </select>
                          </div>
                          <?php if(form_error('client')){ ?>
<div class="errormsg" role="alert"><?php echo form_error('client'); ?></div>
                  <?php } ?>
                        </div>

                        <div class="col-md-12">
                          <div class="mb-3">
                            <label class="form-label f-w-500">Description</label>
                            <textarea class="form-control" type="text" name="desc"><?php if(isset($roleDet[0]['roleDesc'])){echo $roleDet[0]['roleDesc']; }else{ echo set_value('desc'); } ?></textarea>
                          </div>
                        </div>
                        
                        <?php if(isset($moduleDet[0]['moduleid'])) { ?>
                        <div class="col-md-12">
                          <div class="mb-3">
                            <label class="form-label f-w-500">Is Active</label>
                            <select class="form-control btn-square" name="status">
                              <option value="">Select Status</option>
						<option value="1" <?php if(isset($moduleDet[0]['is_active']) && $moduleDet[0]['is_active']=='1'){echo 'selected'; }else{ echo set_select('status', '1'); } ?>>Yes</option>
						<option value="0" <?php if(isset($moduleDet[0]['is_active']) && $moduleDet[0]['is_active']=='0'){echo 'selected'; }else{ echo set_select('status', '0'); }?>>No</option>
                            </select>
                          </div>
                          <?php if(form_error('status')){ ?>
<div class="errormsg" role="alert"><?php echo form_error('status'); ?></div>
                  <?php } ?>
                        </div>
                         <?php } ?>
                         
                       <div class="col-md-12">
                          <div class="">
                              <button class="btn btn-primary mb-3 pull-right" type="submit" name="<?php echo $button_name; ?>" value="add"><?php echo $button_text; ?></button>
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
              
              
            <div class="col-sm-9">
                <div class="card">
                    
                  <div class="card-header pb-0">
                    <div class="">
                       
                    <div class="table-responsive theme-scrollbar">
                      <table class="display" id="basic-1">
                        <thead>
                          <tr>
                        <th>No</th>
                           <th>Role Name</th>
                            <!--<th>Is Active</th>-->
                            <th class="text-center">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                       if(!empty($role)){
                       $count = 1;
                       foreach($role as $val){ ?>
                       
                       <tr>
                           
                            <form action="" method="post">  
                            <td><?php echo $count; ?></td>
                            <td><?php echo $val['rolename'];?></td>
                            <!--<td><?php if($val['is_active'] == 1) { echo "Yes"; }?></td>-->
                            </form>
                            <td> 
                              <ul class="action pull-right">
                                  <li class="delete">
                                    <form action="<?php echo base_url();?>role/permission" method="post">
                                      <input type="hidden" name="roleid" value="<?php echo $val['roleid']; ?>"> 
                                        <button class="btn-primary assign_per" data-bs-toggle="tooltip" data-bs-placement="top"  data-bs-original-title="Assign Permission" type="submit" data-bs-toggle="modal" data-id="<?php echo $val['roleid']; ?>"><i data-feather="tag"></i></button>
                                    </form>
                                </li>
                                <li class="delete">
                                    <form action="<?php echo base_url();?>role/edit" method="post">
                                      <input type="hidden" name="roleid" value="<?php echo $val['roleid']; ?>"> 
                                        <button class="btn-primary edit_role" type="submit" data-bs-toggle="tooltip" data-id="<?php echo $val['roleid']; ?>" data-bs-original-title="Edit Role"><i data-feather="edit"></i></button>
                                    </form>
                                </li>
                                <li class="edit">
                                    <form action="<?php echo base_url();?>role/delete" method="post">
                                      <input type="hidden" name="roleid" value="<?php echo $val['roleid']; ?>"> 
                                        <button class="btn-primary del_role" type="button" data-bs-toggle="modal" data-id="<?php echo $val['roleid']; ?>" data-bs-original-title="Delete Role" data-bs-target="#exampleModal"><i data-feather="trash-2"></i></button>
                                    </form>
                                </li>
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
        <script src="<?php echo base_url();?>assets/js/deem/role/role.js"></script>
