<!-- header section -->
<div class="page-body">
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-sm-6">
                  <h3>Edit Customer new</h3>
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




            <?php if(isset($clientDet[0]['id'])) {
            //print_r($clientDet);exit;
            ?>
            <form method="post" action="<?php echo base_url(); ?>admin/customer/edit" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php  if(isset($clientDet[0]['id'])){echo $clientDet[0]['id'];}?>">
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
                <input class="form-control" value="<?php if(set_value('name')){echo set_value('name');}else if(isset($clientDet[0]['name'])){echo $clientDet[0]['name'];}?>" type="text" name="name">
              </div>
              <?php if(form_error('name')){ ?>
<div class="errormsg" role="alert"><?php echo form_error('name'); ?></div>
                  <?php } ?>
            </div>
            
            <div class="col-sm-3">
              <div class="mb-3">
                <label>Email</label>
                <input class="form-control" value="<?php if(set_value('email')){echo set_value('email');}else if(isset($clientDet[0]['email'])){echo $clientDet[0]['email'];}?>" type="text" name="email">
                          </div>
                          <?php if(form_error('email')){ ?>
<div class="errormsg" role="alert"><?php echo form_error('email'); ?></div>
                  <?php } ?>
            </div>
            
            <div class="col-sm-3">
              <div class="mb-3">
                <label>Phone</label>
                <input class="form-control" value="<?php if(set_value('phone')){echo set_value('phone');}else if(isset($clientDet[0]['phone'])){echo $clientDet[0]['phone'];}?>" type="text" name="phone">

</div>
<?php if(form_error('phone')){ ?>
<div class="errormsg" role="alert"><?php echo form_error('phone'); ?></div>
<?php } ?>
            </div>
            <div class="col-sm-2">
              <div class="mb-3">
                <label>Gender</label>
                <select class="form-control btn-square" name="gender">
                              <option value="">Select Status</option>
						<option value="1" <?php if(isset($clientDet[0]['gender']) && $clientDet[0]['gender']=='male'){echo 'selected'; }else{ echo set_select('gender', 'male'); } ?>>Male</option>
						<option value="0" <?php if(isset($clientDet[0]['gender']) && $clientDet[0]['gender']=='female'){echo 'selected'; }else{ echo set_select('gender', 'female'); }?>>Female</option>
                            </select>

</div>
<?php if(form_error('phone')){ ?>
<div class="errormsg" role="alert"><?php echo form_error('phone'); ?></div>
<?php } ?>
            </div>
            <div class="col-sm-1">
              <div class="mb-3">
                <label>Age</label>
                <input class="form-control" value="<?php if(set_value('age')){echo set_value('age');}else if(isset($clientDet[0]['age'])){echo $clientDet[0]['age'];}?>" type="number" name="age">

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
                <textarea name="address" class="form-control" id="exampleFormControlTextarea4" rows="3"><?php if(set_value('address')){echo set_value('address');}else if(isset($clientDet[0]['address'])){echo $clientDet[0]['address'];}?></textarea>
              </div>
            </div>
          </div>
<!-- row start -->
          <div class="row">
          <div class="col-sm-4">
             <div class="mb-3">
                            <label>Username</label>
                        <input class="form-control" value="<?php if(set_value('username')){echo set_value('username');}else if(isset($clientDet[0]['username'])){echo $clientDet[0]['username'];}?>" type="number" name="username">

</div>
<?php if(form_error('username')){ ?>
<div class="errormsg" role="alert"><?php echo form_error('username'); ?></div>
<?php } ?>
             </div>
             <div class="col-sm-4">
             <div class="mb-3">
                            <label>Password</label>
                        <input class="form-control" value="<?php if(set_value('password')){echo set_value('password');}else if(isset($clientDet[0]['password'])){echo $clientDet[0]['password'];}?>" type="number" name="password">

</div>
<?php if(form_error('password')){ ?>
<div class="errormsg" role="alert"><?php echo form_error('password'); ?></div>
<?php } ?>
             </div>
            <div class="col-sm-4">
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
          <!-- row end -->
          
      
        
    
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
<button class="btn btn-primary mt-4 pull-right" type="submit" name="edit">Update</button>
</form>
<?php } ?>








            
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