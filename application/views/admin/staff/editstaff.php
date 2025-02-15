<!-- header section -->
<div class="page-body">
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-sm-6">
                  <h3>Edit Staff</h3>
                </div>
                <div class="col-sm-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url();?>dashboard"><i data-feather="home"></i>Home</a></li>
                    <li class="breadcrumb-item active">Edit Staff</li>
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
                  <form  method="post" action="<?php echo base_url(); ?>staff/edit" enctype="multipart/form-data">
                      <div class="row">
                        <div class="col-sm-4">
                          <div class="mb-3">
                            <label>Employee Id</label>
                            <input class="form-control" type="text"  name="emp_id" value="<?php if(isset($staff['emp_id'])) echo $staff['emp_id'];else echo set_value('emp_id');?>">
                            <?php if(form_error('emp_id')){ ?>
                           <div class="errormsg" role="alert"><?php echo form_error('emp_id'); ?></div>
                          <?php } ?>
 
                          </div>
                        </div>
                        <input type="hidden" name="userid" value="<?php if(isset($staff['userid'])) { echo $staff['userid'];}?>">
                        <div class="col-sm-4">
                          <div class="mb-3">
                            <label>Role</label>
                            <select class="form-select" name="userroleid">
                            <option value=" ">---Select----</option>

                                <?php
                                foreach($role as $role)
                                {
                                ?>
                              <option value="<?=$role['roleid'];?>" <?php if(isset($staff['userroleid']) && ($staff['userroleid']==$role['roleid'])) echo 'selected';else echo set_select('userroleid', $role['roleid'])?>><?=$role['rolename'];?></option>
                              <?php
                                }
                                ?>
                            </select>
                            <?php if(form_error('userroleid')){ ?>
                           <div class="errormsg" role="alert"><?php echo form_error('userroleid'); ?></div>
                          <?php } ?>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="mb-3">
                            <label>Name</label>
                            <input class="form-control" type="text" name="Name" value="<?php if(isset($staff['Name'])) echo $staff['Name'];else echo set_value('Name');?>">
                            <?php if(form_error('Name')){ ?>
                           <div class="errormsg" role="alert"><?php echo form_error('Name'); ?></div>
                          <?php } ?>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-4">
                          <div class="mb-3">
                            <label>Gender</label>
                            <select class="form-select" name="gender" >
                              <option value=" ">---Select----</option>
                              <option value="male" <?php if(isset($staff['gender']) && ($staff['gender']=='male')) echo 'selected';else echo set_select('gender', 'male')?>>Male</option>
                              <option value="female" <?php if(isset($staff['gender']) && ($staff['gender']=='female')) echo 'selected';else echo set_select('gender', 'female')?>>Female</option>
                            </select>
                            <?php if(form_error('gender')){ ?>
                           <div class="errormsg" role="alert"><?php echo form_error('gender'); ?></div>
                          <?php } ?>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="mb-3">
                            <label>Date of birth</label>
                            <input class="datepicker-here form-control digits" type="text" data-language="en" name="dob" value="<?php if(isset($staff['dob'])) echo $staff['dob'];else echo set_value('dob');?>">
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="mb-3">
                            <label>Email</label>
                            <input class="form-control" type="email" name="userEmail" value="<?php if(isset($staff['userEmail'])) echo $staff['userEmail'];else echo set_value('userEmail');?>">
                            <?php if(form_error('userEmail')){ ?>
                           <div class="errormsg" role="alert"><?php echo form_error('userEmail'); ?></div>
                          <?php } ?>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-4">
                          <div class="mb-3">
                            <label>Contact Number</label>
                            <input class="form-control" type="text" name="UserPhoneNumber" value="<?php if(isset($staff['UserPhoneNumber'])) echo $staff['UserPhoneNumber'];else echo set_value('UserPhoneNumber');?>">
                            <?php if(form_error('UserPhoneNumber')){ ?>
                           <div class="errormsg" role="alert"><?php echo form_error('UserPhoneNumber'); ?></div>
                          <?php } ?>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="mb-3">
                            <label>Username</label>
                            <input class="form-control" type="text" name="userName" value="<?php if(isset($staff['userName'])) echo $staff['userName'];else echo set_value('userName');?>">
                            <?php if(form_error('userName')){ ?>
                           <div class="errormsg" role="alert"><?php echo form_error('userName'); ?></div>
                          <?php } ?>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="mb-3">
                            <label>Date of joining</label>
                            <input class="datepicker-here form-control digits" type="text" data-language="en" name="dojoining" value="<?php if(isset($staff['dojoining'])) echo $staff['dojoining'];else echo set_value('dojoining');?>">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-4">
                          <div class="mb-3">
                            <label>Address</label>
                            <textarea class="form-control" id="exampleFormControlTextarea4" rows="3" name="userAddress"><?php if(isset($staff['userAddress'])) echo $staff['userAddress'];else echo set_value('userAddress');?></textarea>
                            <?php if(form_error('userAddress')){ ?>
                           <div class="errormsg" role="alert"><?php echo form_error('userAddress'); ?></div>
                          <?php } ?>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="mb-3">
                            <label>Upload CV</label>
                            <input class="form-control" id="cv" type="file" name="cv">
                            <?php 
                            if(!empty($staff['cv']))
                            {
                              ?>
                              <a target="_blank" href="<?php echo base_url().'uploads/staff/'.$staff['cv'];?>">Download cv</a>
                            <?php
                            }
                            else
                            {
                            ?>
                            <img  class="cvimg d-none" src=""  width="70" height="70" >
                            <?php
                            }
                            ?>
                            <input type="hidden" name="old_cv" value="<?php if(isset($staff['cv'])) echo $staff['cv'];?>">

                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="mb-3">
                            <label>Blood Group</label>
                            <select class="form-select" name="blood" >
                              <option value=" ">---Select----</option>
                              <option value="O+"  <?php if(isset($staff['blood']) && ($staff['blood']=='O+')) echo 'selected';else echo set_select('blood', 'O+')?>>O+</option>
                              <option value="A+"  <?php if(isset($staff['blood']) && ($staff['blood']=='A+')) echo 'selected';else echo set_select('blood', 'A+')?>>A+</option>
                              <option value="B+"  <?php if(isset($staff['blood']) && ($staff['blood']=='B+')) echo 'selected';else echo set_select('blood', 'B+')?>>B+</option>
                              <option value="AB+"  <?php if(isset($staff['blood']) && ($staff['blood']=='AB+')) echo 'selected';else echo set_select('blood', 'AB+')?>>AB+</option>
                              <option value="O-"  <?php if(isset($staff['blood']) && ($staff['blood']=='O-')) echo 'selected';else echo set_select('blood', 'O-')?>>O-</option>
                              <option value="A-"  <?php if(isset($staff['blood']) && ($staff['blood']=='A-')) echo 'selected';else echo set_select('blood', 'A-')?>>A-</option>
                              <option value="B-"  <?php if(isset($staff['blood']) && ($staff['blood']=='B-')) echo 'selected';else echo set_select('blood', 'B-')?>>B-</option>
                              <option value="AB-"  <?php if(isset($staff['blood']) && ($staff['blood']=='AB-')) echo 'selected';else echo set_select('blood', 'AB-')?>>AB-</option>

                            </select>
                            <?php if(form_error('blood')){ ?>
                           <div class="errormsg" role="alert"><?php echo form_error('blood'); ?></div>
                          <?php } ?>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                      <div class="col-sm-4">
                     <div class="mb-3">
                     <label>Is Active</label>
                    <select class="form-select" name="userStatus">
                  <option value="">Select Status</option>
<option value="Active" <?php if(isset($staff['userStatus']) && $staff['userStatus']=='Active'){echo 'selected'; }else{ echo set_select('status', 'Active'); } ?>>Yes</option>
<option value="Inactive" <?php if(isset($staff['userStatus']) && $staff['userStatus']=='Inactive'){echo 'selected'; }else{ echo set_select('status', 'Inactive'); }?>>No</option>
  </select>
  </div>
  <?php if(form_error('userStatus')){ ?>
 <div class="errormsg" role="alert"><?php echo form_error('userStatus'); ?></div>
<?php } ?>                          
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
                          <!--passport section start-----!-->
                        <div class="card2">
                        <div class="card-header" id="heading1">
                          <h5 class="mb-0">
                            Passport
                          </h5>
                        </div>
                            </div>
                          <div class="card-body">
                          <div class="row">
                        <div class="col-sm-6">
                          <div class="mb-3">
                            <label>Passport number</label>
                            <input class="form-control" type="text" name="passportnum" value="<?php if(isset($staff['passportnum'])) echo $staff['passportnum'];else echo set_value('passportnum');?>">

                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="mb-3">
                            <label>Expiry date</label>
                            <input class="datepicker-here form-control" type="text" data-language="en" name="passportexpirydate" value="<?php if(isset($staff['passportexpirydate'])) echo $staff['passportexpirydate'];else echo set_value('passportexpirydate');?>">
                          </div>
                        </div>
                          </div>
                          <div class="row">
                        <div class="col-sm-6">
                          <div class="mb-3">
                            <label>Front page photo</label>
                            <input class="form-control" type="file" name="frontpage" id="frontpage">
                            <?php
                            if(!empty($staff['frontpage']))
                            {
                              ?>
                            <img  class="frontimg" src="<?php echo base_url().'uploads/staff/'.$staff['frontpage'];  ?>" width="70" height="70" >
                            <?php
                            }
                            else
                            {
                              ?>
                         <img  class="frontimg d-none" src="" width="70" height="70" >
                         <?php
                            }
                            ?>
                          <input type="hidden" name="old_frontpage" value="<?php if(isset($staff['frontpage'])) echo $staff['frontpage'];?>">
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="mb-3">
                            <label>Back page photo</label>
                            <input class="form-control" type="file" name="backpage" id="backpage">
                            <?php
                            if(!empty($staff['backpage']))
                            {
                              ?>
                            <img  class="backimg" src="<?php echo base_url().'uploads/staff/'.$staff['backpage'];  ?>"  width="70" height="70" >
                            <?php
                            }
                            else
                            {
                              ?>
                              <img  class="backimg d-none" src=""  width="70" height="70" >
                              <?php
                            }
                            ?>
                            <input type="hidden" name="old_backpage" value="<?php if(isset($staff['backpage'])) echo $staff['backpage'];?>">

                          </div>
                        </div>
                          </div>

                        </div>
                        <!--passport section start-----!-->
                          
                         <!---iqama sectio  start------------------!-->
                        <div class="card2">
                        <div class="card-header" id="heading1">
                          <h5 class="mb-0">
                            Iqama
                          </h5>
                        </div>
                            </div>
                          <div class="card-body">
                          <div class="row">
                        <div class="col-sm-4">
                          <div class="mb-3">
                            <label>Iqama number</label>
                            <input class="form-control" type="text" name="iqamanum" value="<?php if(isset($staff['iqamanum'])) echo $staff['iqamanum'];else echo set_value('iqamanum');?>">

                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="mb-3">
                            <label>Expiry date</label>
                            <input class="datepicker-here form-control" type="text" data-language="en" name="iqamaexpirydate" value="<?php if(isset($staff['iqamaexpirydate'])) echo $staff['iqamaexpirydate'];else echo set_value('iqamaexpirydate');?>">
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="mb-3">
                            <label>Photo</label>
                            <input class="form-control" type="file" name="iqamaphoto" id="iqamaphoto">
                            <?php
                            if(!empty($staff['iqamaphoto']))
                            {
                              ?>
                            <img  class="iqamaimg" src="<?php echo base_url().'uploads/staff/'.$staff['iqamaphoto'];  ?>"  width="70" height="70" >
                            <?php
                            }
                            else
                            {
                            ?>
                            <img  class="iqamaimg d-none" src=""  width="70" height="70" >
                            <?php
                            }
                            ?>


                            <input type="hidden" name="old_iqamaphoto" value="<?php if(isset($staff['iqamaphoto'])) echo $staff['iqamaphoto'];?>">

                          </div>
                        </div>
                          </div>
                            </div>
                         <!---iqama sectio  end------------------!-->
                          
                          <!---medical sectio  start------------------!-->
                        <div class="card2">
                        <div class="card-header" id="heading1">
                          <h5 class="mb-0">
                            Medical
                          </h5>
                        </div>
                            </div>
                          <div class="card-body">
                          <div class="row">
                        <div class="col-sm-4">
                          <div class="mb-3">
                            <label>Name</label>
                            <input class="form-control" type="text" name="medicalname" value="<?php if(isset($staff['medicalname'])) echo $staff['medicalname'];else echo set_value('medicalname');?>">

                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="mb-3">
                            <label>Medical number</label>
                            <input class="form-control" type="text" name="medicalnum" value="<?php if(isset($staff['medicalnum'])) echo $staff['medicalnum'];else echo set_value('medicalnum');?>">
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="mb-3">
                            <label>Expiry date</label>
                            <?php echo $staff[0]['medicalexpirydate']; ?>
                            <input class="datepicker-here form-control" type="text" data-language="en" name="medicalexpirydate" value="<?php if(isset($staff['medicalexpirydate'])) echo $staff['medicalexpirydate'];else echo set_value('medicalexpirydate');?>" >
                          </div>
                        </div>
                          </div>
                          </div>
                         <!---medical sectio  end------------------!-->


                        

                      </div>
                            </div>
                            </div>
                   


                    </div>


                    <a href="<?php echo base_url(); ?>staff" name="add" class="btn btn-primary mt-4 pull-left">Back</a>
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