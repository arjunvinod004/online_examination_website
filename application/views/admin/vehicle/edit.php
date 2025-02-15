<!-- header section -->
<div class="page-body">
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-sm-6">
                  <h3>Edit Vehicle</h3>
                </div>
                <div class="col-sm-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url();?>dashboard"><i data-feather="home"></i>Home</a></li>
                    <li class="breadcrumb-item active">Edit Vehicle</li>
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
                  <form  method="post" action="<?php echo base_url(); ?>vehicle/edit" enctype="multipart/form-data">
                      <div class="row">
                   
                        <input type="hidden" name="id" value="<?php if(isset($details[0]['id'])) { echo $details[0]['id'];}?>">
                        <div class="col-sm-4">
                          <div class="mb-3">
                            <label>Vehicle type</label>
                            <select class="form-select" name="type_id">
                            <option value=" ">---Select----</option>

                                <?php
                                foreach($types as $type)
                                {
                                ?>
                              <option value="<?=$type['id'];?>" <?php if(isset($details[0]['type_id']) && ($details[0]['type_id']==$type['id'])) echo 'selected';else echo set_select('type_id', $type['id'])?>><?=$type['type_name'];?></option>
                              <?php
                                }
                                ?>
                            </select>
                            <?php if(form_error('type_id')){ ?>
                           <div class="errormsg" role="alert"><?php echo form_error('type_id'); ?></div>
                          <?php } ?>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="mb-3">
                            <label>Plant</label>
                            <select class="form-select" name="plant_id">
                            <option value=" ">---Select----</option>

                                <?php
                                foreach($plants as $plant)
                                {
                                ?>
                              <option value="<?=$plant['id'];?>" <?php if(isset($details[0]['plant_id']) && ($details[0]['plant_id']==$plant['id'])) echo 'selected';else echo set_select('plant_id', $plant['id'])?>><?=$plant['name'];?></option>
                              <?php
                                }
                                ?>
                            </select>
                            <?php if(form_error('plant_id')){ ?>
                           <div class="errormsg" role="alert"><?php echo form_error('plant_id'); ?></div>
                          <?php } ?>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="mb-3">
                            <label>Aramco ID</label>
                            <input class="form-control" type="text" name="aramco_id" value="<?php if(isset($details[0]['aramco_id'])) echo $details[0]['aramco_id'];else echo set_value('aramco_id');?>">
                            <?php if(form_error('aramco_id')){ ?>
                           <div class="errormsg" role="alert"><?php echo form_error('aramco_id'); ?></div>
                          <?php } ?>
                          </div>
                        </div>
                      </div>
                      
                      <div class="row">
                        <div class="col-sm-4">
                          <div class="mb-3">
                            <label>Register Number</label>
                            <input class="form-control" type="text" name="reg_number" value="<?php if(isset($details[0]['reg_number'])) echo $details[0]['reg_number'];else echo set_value('reg_number');?>">
                            <?php if(form_error('reg_number')){ ?>
                           <div class="errormsg" role="alert"><?php echo form_error('reg_number'); ?></div>
                          <?php } ?>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="mb-3">
                            <label>Door Number</label>
                            <input class="form-control" type="text" name="door_number" value="<?php if(isset($details[0]['door_number'])) echo $details[0]['door_number'];else echo set_value('door_number');?>">
                            <?php if(form_error('door_number')){ ?>
                           <div class="errormsg" role="alert"><?php echo form_error('door_number'); ?></div>
                          <?php } ?>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="mb-3">
                            <label>Aramco Expiry Date</label>
                            <input class="datepicker-here form-control digits" type="text" data-language="en" name="aramco_exp_date" value="<?php if(isset($details[0]['aramco_exp_date'])) echo $details[0]['aramco_exp_date'];else echo set_value('aramco_exp_date');?>">
                          </div>
                        </div>
                        <div class="col-sm-4">
                     <div class="mb-3">
                     <label>Is Active</label>
                    <select class="form-select" name="is_active">
                  <option value="">Select Status</option>
<option value="1" <?php if(isset($details[0]['is_active']) && $details[0]['is_active']==1){echo 'selected'; }else{ echo set_select('status', 'Active'); } ?>>Yes</option>
<option value="0" <?php if(isset($details[0]['is_active']) && $details[0]['is_active']==0){echo 'selected'; }else{ echo set_select('status', 'Inactive'); }?>>No</option>
  </select>
  </div>
  <?php if(form_error('is_active')){ ?>
 <div class="errormsg" role="alert"><?php echo form_error('is_active'); ?></div>
<?php } ?>           
                      </div>
                    
                      
  </div>
                  
                    
  
                   


                    </div>


                    <a href="<?php echo base_url(); ?>vehicle" name="add" class="btn btn-primary mt-4 pull-left">Back</a>
                    <button name="edit" class="btn btn-primary mt-4 pull-right" type="submit" data-bs-original-title="" title="">Save</button>
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