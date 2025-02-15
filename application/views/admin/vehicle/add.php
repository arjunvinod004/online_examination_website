<!-- header section -->
<div class="page-body">
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-sm-6">
                  <h3>Add Vehicle</h3>
                </div>
                <div class="col-sm-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url();?>dashboard"><i data-feather="home"></i>Home</a></li>
                    <li class="breadcrumb-item active">Add Vehicle</li>
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
                <form  method="post" action="<?php echo base_url(); ?>vehicle/add" enctype="multipart/form-data">
                      <div class="row">
                        <div class="col-sm-4">
                          <div class="mb-3">
                            <label>Vehicle type</label>
                            <select class="form-select" name="type_id">
                            <option value=" ">---Select----</option>

                                <?php
                                foreach($types as $type)
                                {
                                ?>
                              <option value="<?=$type['id'];?>" <?php echo set_select('type_id', $type['id'])?>><?=$type['type_name'];?></option>
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
                            <label>Select plant</label>
                            <select class="form-select" name="plant_id">
                            <option value=" ">---Select----</option>

                                <?php
                                foreach($plants as $plant)
                                {
                                ?>
                              <option value="<?=$plant['id'];?>" <?php echo set_select('plant_id', $plant['id'])?>><?=$plant['name'];?></option>
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
                            <input class="form-control" type="text" name="aramco_id" value="<?php echo set_value('aramco_id');?>">
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
                            <input class="form-control" type="text" name="reg_number" value="<?php echo set_value('reg_number');?>">
                            <?php if(form_error('reg_number')){ ?>
                           <div class="errormsg" role="alert"><?php echo form_error('reg_number'); ?></div>
                          <?php } ?>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="mb-3">
                            <label>Door Number</label>
                            <input class="form-control" type="text" name="door_number" value="<?php echo set_value('door_number');?>">
                            <?php if(form_error('door_number')){ ?>
                           <div class="errormsg" role="alert"><?php echo form_error('door_number'); ?></div>
                          <?php } ?>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="mb-3">
                            <label>Aramco Expiry Date</label>
                            <input class="datepicker-here form-control digits" type="text" data-language="en" name="aramco_exp_date" value="<?php if(isset($staff['aramco_exp_date'])) echo $staff['aramco_exp_date'];else echo set_value('aramco_exp_date');?>">
                            <?php if(form_error('aramco_exp_date')){ ?>
                           <div class="errormsg" role="alert"><?php echo form_error('aramco_exp_date'); ?></div>
                          <?php } ?>
                          </div>
                        </div>
                      </div>

                    </div>
                    <a href="<?php echo base_url(); ?>vehicle" name="add" class="btn btn-primary mt-4 pull-left">Back</a>
                    <button name="add" class="btn btn-primary mt-4 pull-right" type="submit" data-bs-original-title="" title="">Save</button>
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