<!-- header section -->
<div class="page-body">
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-sm-6">
                  <h3><?=$details['Name'];?></h3>
                </div>
                <div class="col-sm-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url();?>dashboard"><i data-feather="home"></i>Home</a></li>
                    <li class="breadcrumb-item active">Profile</li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid starts-->
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
                <div class="card pb-4">   
                  <div class="card-header pb-0">

                   <!--details start  -->
                  
                    <ul class="nav nav-tabs nav-primary" id="pills-warningtab" role="tablist">
                      <li class="nav-item"><a class="nav-link active" id="profile-tab" data-bs-toggle="pill" href="#profile" role="tab" aria-controls="profile" aria-selected="true"><i data-feather="user"></i>Profile</a></li>
                      <li class="nav-item"><a class="nav-link" id="pills-warningprofile-tab" data-bs-toggle="pill" href="#pills-warningprofile" role="tab" aria-controls="pills-warningprofile" aria-selected="false"><i data-feather="edit"></i>Edit profile</a></li>
                      <li class="nav-item"><a class="nav-link" id="pills-warningcontact-tab" data-bs-toggle="pill" href="#pills-warningcontact" role="tab" aria-controls="pills-warningcontact" aria-selected="false"><i data-feather="tag"></i>Change password</a></li>
                    </ul>
                    <div class="tab-content" id="pills-warningtabContent">
                      <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        



                      <div class="edit-profile">
                      <div class="col-xl-12 col-lg-12">
                  <div class="card">
                    <div class="card-header pb-0">
                      <h4 class="card-title mb-0">My Profile</h4>
                      <div class="card-options"><a class="card-options-collapse" href="#" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-bs-toggle="card-remove"><i class="fe fe-x"></i></a></div>
                    </div>
                    <div class="card-body">
                        <div class="row mb-2">
                          <div class="profile-title">
                            <div class="d-lg-flex d-block align-items-center"><img class="img-70 rounded-circle" alt="" src="<?=base_url();?>assets/images/user/7.jpg">
                              <div class="flex-grow-1">
                                <h3 class="mb-1 f-20 txt-primary"> <a href="user-profile.html"><?=$details['Name'];?></a></h3>
                                <p class="f-12 mb-0"><?=$role[0]['rolename'];?></p>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="mb-3">
                          <h6 class="form-label f-w-500">Employee ID</h6>
                          <input class="form-control" value="<?=$details['emp_id'];?>" readonly>
                        </div>
                        <div class="mb-3">
                        <h6 class="form-label f-w-500">Gender</h6>
                          <input class="form-control" value="<?=$details['gender'];?>" readonly>
                        </div>
                        <div class="mb-3">
                          <h6 class="form-label f-w-500">Address</h6>
                          <textarea class="form-control" rows="5" readonly><?=$details['userAddress'];?></textarea>
                        </div>
                        <div class="mb-3">
                        <h6 class="form-label f-w-500">Email-Address</h6>
                          <input class="form-control" value="<?=$details['userEmail'];?>" readonly>
                        </div>
                        <div class="mb-3">
                        <h6 class="form-label f-w-500">Phone number</h6>
                          <input class="form-control" value="<?=$details['UserPhoneNumber'];?>" readonly>
                        </div>
                        <div class="mb-3">
                        <h6 class="form-label f-w-500">Date of birth</h6>
                          <input class="form-control" value="<?=date('d-M-y',strtotime($details['dob']));?>" readonly>
                        </div>
                        <div class="mb-3">
                          <h6 class="form-label f-w-500">Date of joining</h6>
                          <input class="form-control"  value="<?=date('d-M-y',strtotime($details['dojoining']));?>" readonly>
                        </div>

                    </div>
                  </div>
                </div>
                          </div>

                      </div>
                      <div class="tab-pane fade" id="pills-warningprofile" role="tabpanel" aria-labelledby="pills-warningprofile-tab">
                     
                      <form class="card" method="post" id="edit-profile1" action="<?=base_url()?>profile/updateprofile">
                      <div class="card-body">
                      <div class="row">
                        <div class="col-sm-4">
                          <div class="mb-3">
                          <label>Name</label>
                            <input class="form-control" type="text" name="Name" value="<?php if(isset($details['Name'])) echo $details['Name'];else echo set_value('Name');?>">
                          
                          </div>
                        </div>
                        <input type="hidden" name="userid" value="<?php if(isset($details['userid'])) { echo $details['userid'];}?>">
                        <div class="col-sm-4">
                          <div class="mb-3">
                          <label>Gender</label>
                            <select class="form-select" name="gender" >
                              <option value="">---Select----</option>
                              <option value="male" <?php if(isset($details['gender']) && ($details['gender']=='male')) echo 'selected';else echo set_select('gender', 'male')?>>Male</option>
                              <option value="female" <?php if(isset($details['gender']) && ($details['gender']=='female')) echo 'selected';else echo set_select('gender', 'female')?>>Female</option>
                            </select>
                        
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="mb-3">
                          <label>Date of birth</label>
                            <input class="datepicker-here form-control" type="text" data-language="en" name="dob" value="<?php if(isset($details['dob'])) echo $details['dob'];else echo set_value('dob');?>">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-4">
                          <div class="mb-3">
                          <label>Email</label>
                            <input class="form-control" type="email" id="userEmail" name="userEmail" value="<?php if(isset($details['userEmail'])) echo $details['userEmail'];else echo set_value('userEmail');?>">
                           
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="mb-3">
                          <label>Contact Number</label>
                            <input class="form-control" type="number" name="UserPhoneNumber" id="userph" value="<?php if(isset($details['UserPhoneNumber'])) echo $details['UserPhoneNumber'];else echo set_value('UserPhoneNumber');?>">
                           
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="mb-3">
                          <label>Username</label>
                            <input class="form-control" type="text" name="userName" value="<?php if(isset($details['userName'])) echo $details['userName'];else echo set_value('userName');?>">
                          
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-4">
                          <div class="mb-3">
                          <label>Address</label>
                            <textarea class="form-control" id="exampleFormControlTextarea4" rows="3" name="userAddress"><?php if(isset($details['userAddress'])) echo $details['userAddress'];else echo set_value('userAddress');?></textarea>
                        
                          </div>
                        </div>
                        
                        </div>
                        <div class="default-according" id="accordionclose">
                      <div class="card">
                        <div class="card-header" id="heading1">
                          <h5 class="mb-0">
                            <button type="button" class="btn btn-link ps-0" data-bs-toggle="collapse" data-bs-target="#collapse1" aria-expanded="true" aria-controls="heading1">Add more details</button>
                          </h5>
                        </div>
                        <div class="collapse" id="collapse1" aria-labelledby="heading1" data-bs-parent="#accordionclose">
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
                     <button type="submit" class="btn btn-primary mt-4 pull-right">Update profile</button>

                            </div>
             
                  </form>

                    </div>
                      <div class="tab-pane fade" id="pills-warningcontact" role="tabpanel" aria-labelledby="pills-warningcontact-tab">
                      <form class="card" method="post" id="password" action="<?=base_url()?>profile/changepass">
                      <div class="card-body">
                      <div class="row">

                      <div class="col-sm-12">
                          <div class="mb-3">
                          <label>Old password</label>
                          <input class="form-control" type="text" name="oldpassword" id="opassword">
                          <input type="hidden" name="userid" id="userid" value="<?=$this->session->userdata('loginid');?>">
                        </div>
                    </div>
                    </div>
                    <div class="row">
                   <div class="col-sm-12">
                   <div class="mb-3">
                   <label>New password</label>
                   <input class="form-control" id="newpassword" type="password" name="newpassword">
                   </div>
                   </div>
                  </div>
                  <div class="row">

                  <div class="col-sm-12">
                  <div class="mb-3">
                  <label>Confirm password</label>
                  <input class="form-control" id="cpass" type="password" name="cpassword">
                  </div>
                  </div>
                  </div>
                  <button class="btn btn-primary" type="submit">Update</button>

                    </div>
                    </form>
                    </div>
                    </div>
                    <!--<a href="<?php //echo base_url(); ?>staff" class="btn btn-primary mt-4 pull-left">Back</a>-->

                   <!--details end  -->

                </div>
            </div>
        </div>
        </div>
        </div>
        <!-- Container-fluid Ends-->
        </div>
        <!-- footer section -->
       
      
                      <script src="<?php echo base_url();?>assets/js/deem/staff/staff.js" type="text/javascript"></script>

                      <script src="<?php echo base_url();?>assets/js/validate.js" type="text/javascript"></script>
                      

<script>

   /*if ($("#password").length > 0) {
    var base_url = $('#baseurl').val(); 
            $("#password").validate({
                rules: {
                    oldpassword: {
                        required: true,
                        remote: {
                            url: base_url + 'Staff/checkpassword',
                            type: "post",
                            
                            data: {
                              oldpass: function() {
                              return $("#opassword").val();
                              },
                              userid: function() {
                              return $("#userid").val();
                              }

                                 },
                                     
                        },
                    },
                    newpassword: {
                        required: true,
                        
                    },
                    cpassword: {
                        required: true,
                        equalTo: '#newpassword'

                    },
                },
                messages: {
                    
                  oldpassword: {
                        required: "Old password is required",
                        remote: "Invalid password."
                    },
                    newpassword: {
                        required: "New password is required",
                        
                    },
                   
                    cpassword: {
                        required: "Confirm password is required",
                        equalTo:'Password missmatches',
                    },
                    
                },
 
            })
        }*/
  </script>
  <script>
 // $('#upd').click(function(){
  /*$("#opassword").blur(function(){

    var base_url = $('#baseurl').val(); 
    var oldpass=$('#opassword').val();
            var userid=$('#userid').val();
$.ajax({
url: base_url + 'Staff/checkpassword',
                            type: "post",
                            data: {'oldpass':oldpass,
                                   'userid':userid,
                                   
                                 },
                                 success: function(result){
                                 
                                  if(result=='false')
                                  {
                                  $("#opassword").focus();
                                  $(':input[type="submit"]').prop('disabled', true);
                                  }
                                  else
                                  $(':input[type="submit"]').prop('disabled', false);


                                 }
  });
});*/
  </script>
