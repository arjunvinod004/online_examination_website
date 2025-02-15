<!-- header section -->
<div class="page-body">
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-sm-6">
                  <h3>Edit Customer</h3>
                </div>
                <div class="col-sm-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url();?>dashboard"><i data-feather="home"></i>Home</a></li>
                    <li class="breadcrumb-item active">Edit Customer</li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
            <!-- Container-fluid starts-->
            <div class="container-fluid project-create">
            <div class="row">
            <?php if(isset($clientDet[0]['id'])) {
            //print_r($clientDet);exit;
            ?>
            <form method="post" action="<?php echo base_url(); ?>client/edit">
            <input type="hidden" name="id" value="<?php  if(isset($clientDet[0]['id'])){echo $clientDet[0]['id'];}?>">
              <div class="col-sm-12">
                <div class="card">
                  <div class="card-body">
                    
                    <div class="form theme-form">
                    
                      <div class="row">
                        <div class="col-sm-4">
                          <div class="mb-3">
                            <label>Name</label>
                            <input class="form-control" value="<?php if(set_value('name')){echo set_value('name');}else if(isset($clientDet[0]['name'])){echo $clientDet[0]['name'];}?>" type="text" name="name">
                          </div>
                          <?php if(form_error('name')){ ?>
<div class="errormsg" role="alert"><?php echo form_error('name'); ?></div>
                  <?php } ?>
                        </div>
                        
                        <div class="col-sm-4">
                          <div class="mb-3">
                            <label>Email</label>
                            <input class="form-control" value="<?php if(set_value('email')){echo set_value('email');}else if(isset($clientDet[0]['email'])){echo $clientDet[0]['email'];}?>" type="text" name="email">
                          </div>
                          <?php if(form_error('email')){ ?>
<div class="errormsg" role="alert"><?php echo form_error('email'); ?></div>
                  <?php } ?>
                        </div>
                        
                        <div class="col-sm-4">
                          <div class="mb-3">
                            <label>Phone</label>
                            <input class="form-control" value="<?php if(set_value('phone')){echo set_value('phone');}else if(isset($clientDet[0]['phone'])){echo $clientDet[0]['phone'];}?>" type="text" name="phone">

                          </div>
                          <?php if(form_error('phone')){ ?>
<div class="errormsg" role="alert"><?php echo form_error('phone'); ?></div>
                  <?php } ?>
                        </div>
                        
                      </div>
                      <div class="row">
                        <div class="col-sm-6">
                          <div class="mb-3">
                            <label>Address</label>
                            <textarea name="address" class="form-control" id="exampleFormControlTextarea4" rows="3"><?php if(set_value('address')){echo set_value('address');}else if(isset($clientDet[0]['address'])){echo $clientDet[0]['address'];}?></textarea>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="mb-3">
                            <label>Is Active</label>
                        <select class="form-control btn-square" name="is_active">
                              <option value="">Select Status</option>
						<option value="1" <?php if(isset($clientDet[0]['is_active']) && $clientDet[0]['is_active']=='1'){echo 'selected'; }else{ echo set_select('status', '1'); } ?>>Yes</option>
						<option value="0" <?php if(isset($clientDet[0]['is_active']) && $clientDet[0]['is_active']=='0'){echo 'selected'; }else{ echo set_select('status', '0'); }?>>No</option>
                            </select>
                            </div>
                            <?php if(form_error('is_active')){ ?>
<div class="errormsg" role="alert"><?php echo form_error('is_active'); ?></div>
                  <?php } ?>
                        </div>
                      </div>
                        
                        
                      </div>
                      
                  
                    
                      <div class="default-according" id="accordionclose">
                      <div class="card">
                        <div class="card-header" id="heading1">
                          <h5 class="mb-0">
                            <a class="btn btn-link ps-0" data-bs-toggle="collapse" data-bs-target="#collapse1" aria-expanded="true" aria-controls="heading1">Add more details</a>
                          </h5>
                        </div>
                        <div class="collapse show" id="collapse1" aria-labelledby="heading1" data-bs-parent="#accordionclose">
                          <div class="card-body">
                          <div class="row">
                        <div class="col-sm-4">
                          <div class="mb-3">
                            <label>Gender</label>
                            <select class="form-select">
                              <option value="male">Male</option>
                              <option value="female">Female</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="mb-3">
                            <label>Date of birth</label>
                            <input class="datepicker-here form-control digits" type="text" data-language="en">
                          </div>
                        </div>
                          </div>
                        </div>
                      </div>
                            </div>
                    </div>
                    <a href="<?php echo base_url(); ?>client" class="btn btn-primary mt-4 pull-left">Back</a>
                    <button class="btn btn-primary mt-4 pull-right" type="submit" name="edit">Update</button>
                    </div>
                    </form>
                    <?php } ?>
                  </div>
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