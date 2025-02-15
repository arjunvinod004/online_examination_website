<!-- header section -->
<div class="page-body">
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-sm-6">
                  <h3>Customer Registration new</h3>
                </div>
                <div class="col-sm-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url();?>admin/dashboard"><i data-feather="home"></i>Home</a></li>
                    <li class="breadcrumb-item active">Customer Registration</li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
            <!-- Container-fluid starts-->
            <div class="container-fluid project-create">




            <?php if($this->session->flashdata('success')){ ?>
                    <div class="alert alert-success dark" role="alert">
                        <?php echo $this->session->flashdata('success');$this->session->unset_userdata('success'); ?>
                    </div><?php } ?>
                    
                    <?php if($this->session->flashdata('error')){ ?>
                    <div class="alert alert-danger dark" role="alert">
                        <?php echo $this->session->flashdata('error');$this->session->unset_userdata('error'); ?>
                    </div><?php } ?>



                    
            <form method="post" action="<?php echo base_url(); ?>admin/customer/add" enctype="multipart/form-data">

            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="true">Profile</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="image-tab" data-bs-toggle="tab" data-bs-target="#image" type="button" role="tab" aria-controls="image" aria-selected="false">Image</button>
                </li>
                <!-- <li class="nav-item" role="presentation">
                  <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Contact</button>
                </li> -->
            </ul>
            <div class="tab-content" id="myTabContent">
              <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                  <div class="row">
                    






                 
              <div class="col-sm-12">
                <div class="card">
                  <div class="card-body">
                    
                    <div class="form theme-form">
                    
                      <div class="row">
                        <div class="col-sm-3">
                          <div class="mb-3">
                            <label>Name</label>
                            <input class="form-control" value="<?php echo set_value('name'); ?>" type="text" name="name">
                          </div>
                          <?php if(form_error('name')){ ?>
<div class="errormsg" role="alert"><?php echo form_error('name'); ?></div>
                  <?php } ?>
                        </div>
                        
                        <div class="col-sm-3">
                          <div class="mb-3">
                            <label>Email</label>
                            <input class="form-control" value="<?php echo set_value('email'); ?>" type="text" name="email">
                          </div>
                          <?php if(form_error('email')){ ?>
<div class="errormsg" role="alert"><?php echo form_error('email'); ?></div>
                  <?php } ?>
                        </div>
                        
                        <div class="col-sm-3">
                          <div class="mb-3">
                            <label>Phone</label>
                            <input class="form-control" value="<?php echo set_value('phone'); ?>" type="text" name="phone">

                          </div>
                          <?php if(form_error('phone')){ ?>
<div class="errormsg" role="alert"><?php echo form_error('phone'); ?></div>
                  <?php } ?>
                        </div>
                        <div class="col-sm-2">
                          <div class="mb-3">
                            <label>Gender</label>
                            <select class="form-control" name="gender">
                            <option value="">Select Gender</option>
                            <option value="male" <?= set_select('gender', 'male') ?>>Male</option>
                            <option value="female" <?= set_select('gender', 'female') ?>>Female</option>
                            </select>
                          </div>
                          <?php if(form_error('gender')){ ?>
<div class="errormsg" role="alert"><?php echo form_error('gender'); ?></div>
                  <?php } ?>
                        </div>
                        <div class="col-sm-1">
                          <div class="mb-3">
                            <label>Age</label>
                            <input class="form-control" value="<?php echo set_value('age'); ?>" type="number" name="age">

                          </div>
                          <?php if(form_error('age')){ ?>
<div class="errormsg" role="alert"><?php echo form_error('age'); ?></div>
                  <?php } ?>
                        </div>
                        
                      </div>
                      <div class="row">
                        <div class="col">
                          <div class="mb-3">
                            <label>Address</label>
                            <textarea name="address" class="form-control" id="exampleFormControlTextarea4" rows="3"><?php echo set_value('address'); ?></textarea>
                          </div>
                        </div>
                      </div>

                      <!-- row start -->
                      <div class="row">
                        <div class="col-sm-4">
                          <div class="mb-3">
                            <label>Username</label>
                            <input class="form-control" value="<?php echo set_value('username'); ?>" type="text" name="username">
                          </div>
                          <?php if(form_error('username')){ ?>
<div class="errormsg" role="alert"><?php echo form_error('username'); ?></div>
                  <?php } ?>
                        </div>
                        
                        <div class="col-sm-4">
                          <div class="mb-3">
                            <label>Password</label>
                            <input class="form-control" value="<?php echo set_value('password'); ?>" type="text" name="password">
                          </div>
                          <?php if(form_error('password')){ ?>
<div class="errormsg" role="alert"><?php echo form_error('password'); ?></div>
                  <?php } ?>
                        </div>
                        
                          
                        
                      </div>
                      <!-- row end -->
                        
                        
                      </div>
                      
                  
                    
                
                      </div>
                            </div>
                    </div>
                    
                    
        
                        
            






                  </div>
              </div>
              <div class="tab-pane fade" id="image" role="tabpanel" aria-labelledby="image-tab">
                
              



              <div class="col-sm-12">
                <div class="card">
                  <div class="card-body">
                    
                    <div class="form theme-form">
                    
                      <div class="row">
                        <div class="col-sm-4">
                          <div class="mb-3">
                            <label>Photo</label>
                            <input type="file" class="form-control-file" name="profile_image">
                          </div>
                          <?php if(form_error('profile_image')){ ?>
<div class="errormsg" role="alert"><?php echo form_error('profile_image'); ?>
</div>
                  <?php } ?>
                        </div>
                        
                        
                        
                        
                  
                        </div>
                        
                      </div>
                      
                      
                      
                      
                        
                        
                      </div>
                      
                  
                    
                
                      </div>
                            </div>
                    </div>






              </div>
              <!-- <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
fffffffffff
              </div> -->
            </div>
            <button class="btn btn-primary mt-4 pull-right" type="submit" name="add">Save</button>
            </form>
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