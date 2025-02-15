<!-- header section -->
<div class="page-body">
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-sm-6">
                  <h3>Add Staff</h3>
                </div>
                <div class="col-sm-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url();?>dashboard"><i data-feather="home"></i>Home</a></li>
                    <li class="breadcrumb-item active">Add Staff</li>
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
                <form  method="post" action="<?php echo base_url(); ?>staff/add" enctype="multipart/form-data">
                      <div class="row">
                        <div class="col-sm-4">
                          <div class="mb-3">
                            <label>Employee Id</label>
                            <input class="form-control" type="text" id="emp_id"  name="emp_id" value="<?php echo set_value('emp_id');?>">
                            <p class="empexist d-none" style="color:red">Employee Id alreay exist</p>
                            <?php if(form_error('emp_id')){ ?>
                           <div class="errormsg" role="alert"><?php echo form_error('emp_id'); ?></div>
                          <?php } ?>
 
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="mb-3">
                            <label>Role</label>
                            <select class="form-select" name="userroleid">
                            <option value=" ">---Select----</option>

                                <?php
                                foreach($role as $role)
                                {
                                ?>
                              <option value="<?=$role['roleid'];?>" <?php echo set_select('userroleid', $role['roleid'])?>><?=$role['rolename'];?></option>
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
                            <input class="form-control" type="text" name="Name" value="<?php echo set_value('Name');?>">
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
                              <option value="male"  <?php echo set_select('gender', 'male')?>>Male</option>
                              <option value="female"  <?php echo set_select('gender', 'female')?>>Female</option>
                            </select>
                            <?php if(form_error('gender')){ ?>
                           <div class="errormsg" role="alert"><?php echo form_error('gender'); ?></div>
                          <?php } ?>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="mb-3">
                            <label>Date of birth</label>
                            <input class="datepicker-here form-control digits" type="text" data-language="en" name="dob" value="<?php echo set_value('dob');?>">
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="mb-3">
                            <label>Email</label>
                            <input class="form-control" type="email" name="userEmail" value="<?php echo set_value('userEmail');?>">
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
                            <input class="form-control" type="text" name="UserPhoneNumber" value="<?php echo set_value('UserPhoneNumber');?>">
                            <?php if(form_error('UserPhoneNumber')){ ?>
                           <div class="errormsg" role="alert"><?php echo form_error('UserPhoneNumber'); ?></div>
                          <?php } ?>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="mb-3">
                            <label>Username</label>
                            <input class="form-control" type="text" name="userName" value="<?php echo set_value('userName');?>">
                            <?php if(form_error('userName')){ ?>
                           <div class="errormsg" role="alert"><?php echo form_error('userName'); ?></div>
                          <?php } ?>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="mb-3">
                            <label>Date of joining</label>
                            <input class="datepicker-here form-control digits" type="text" data-language="en" name="dojoining" value="<?php echo set_value('dojoining');?>">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-4">
                          <div class="mb-3">
                            <label>Address</label>
                            <textarea class="form-control" id="exampleFormControlTextarea4" rows="3" name="userAddress"><?php echo set_value('userAddress');?></textarea>
                            <?php if(form_error('userAddress')){ ?>
                           <div class="errormsg" role="alert"><?php echo form_error('userAddress'); ?></div>
                          <?php } ?>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="mb-3">
                            <label>Upload CV</label>
                            <input class="form-control" id="cv" type="file" name="cv">
                            <img  class="cvimg d-none" src="" width="70" height="70" >

                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="mb-3">
                            <label>Blood Group</label>
                            <select class="form-select" name="blood" >
                              <option value=" ">---Select----</option>
                              <option value="O+"  <?php echo set_select('blood', 'O+')?>>O+</option>
                              <option value="A+"  <?php echo set_select('blood', 'A+')?>>A+</option>
                              <option value="B+"  <?php echo set_select('blood', 'B+')?>>B+</option>
                              <option value="AB+"  <?php echo set_select('blood', 'AB+')?>>AB+</option>
                              <option value="O-"  <?php echo set_select('blood', 'O-')?>>O-</option>
                              <option value="A-"  <?php echo set_select('blood', 'A-')?>>A-</option>
                              <option value="B-"  <?php echo set_select('blood', 'B-')?>>B-</option>
                              <option value="AB-"  <?php echo set_select('blood', 'AB-')?>>AB-</option>

                            </select>
                            <?php if(form_error('blood')){ ?>
                           <div class="errormsg" role="alert"><?php echo form_error('blood'); ?></div>
                          <?php } ?>
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
                            <input class="form-control" type="text" name="passportnum" value="<?php echo set_value('passportnum');?>">

                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="mb-3">
                            <label>Expiry date</label>
                            <input class="datepicker-here form-control" type="text" data-language="en" name="passportexpirydate" value="<?php echo set_value('passportexpirydate');?>">
                          </div>
                        </div>
                          </div>
                          <div class="row">
                        <div class="col-sm-6">
                          <div class="mb-3">
                            <label>Front page photo</label>
                            <input class="form-control" type="file" name="frontpage" id="frontpage">
                            <img  class="frontimg d-none" src="" width="70" height="70" >

                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="mb-3">
                            <label>Back page photo</label>
                            <input class="form-control" type="file" name="backpage" id="backpage">
                            <img  class="backimg d-none" src="" width="70" height="70" >

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
                            <input class="form-control" type="text" name="iqamanum" value="<?php echo set_value('iqamanum');?>">

                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="mb-3">
                            <label>Expiry date</label>
                            <input class="datepicker-here form-control" type="text" data-language="en" name="iqamaexpirydate" value="<?php echo set_value('iqamaexpirydate');?>">
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="mb-3">
                            <label>Photo</label>
                            <input class="form-control" type="file" name="iqamaphoto" id="iqamaphoto">
                            <img  class="iqamaimg d-none" src="" width="70" height="70" >

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
                            <input class="form-control" type="text" name="medicalname" value="<?php echo set_value('medicalname');?>">

                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="mb-3">
                            <label>Medical number</label>
                            <input class="form-control" type="text" name="medicalnum" value="<?php echo set_value('medicalnum');?>">
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="mb-3">
                            <label>Expiry date</label>
                            <input class="datepicker-here form-control" type="text" data-language="en" name="medicalexpirydate" value="<?php echo set_value('medicalexpirydate');?>" >
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
                            <script>
                              $(document).ready(function(){
                                $('#emp_id').keyup(function(){
                                  var base_url= $('#baseurl').val(); 
                                  var id=$('#emp_id').val();
                                  $.ajax({
                                  method: "POST",
                                  url: base_url + 'Staff/check_idexist',
                                      data: { 'id' : id },
                                      success: function(data){
                                         if(data > 0)  {
                                          $('.empexist').removeClass('d-none');
                                         }else{
                                          $('.empexist').addClass('d-none');
                                         }
                                      }
                                  });
                                });
                              });
                                 
                                 /*$('#cv').change(function() {                     
         var preview = document.querySelector('.cvimg');
         var file    = document.querySelector('#cv').files[0];alert(file);
         var extension=$('#cv').val().replace(/^.*\./, '');
        var uppextensiom= extension.toLowerCase();alert(uppextensiom)
        if(uppextensiom=='jpg' || uppextensiom=='jpeg' || uppextensiom=='png' || uppextensiom=='gif')
        {
          $('.cvimg').removeClass('d-none');
         var reader  = new FileReader();
         reader.onloadend = function () {
           preview.src = reader.result;
       
         }
       
         if (file) {
           reader.readAsDataURL(file);
         } else {
           preview.src = "";
         }
        }
      });
      $('#frontpage').change(function() {      
                                  
                                  var preview = document.querySelector('.frontimg');
                                  var file    = document.querySelector('#frontpage').files[0];alert(file);
                                  var extension=$('#frontpage').val().replace(/^.*\./, '');
                                 var uppextensiom= extension.toLowerCase();alert(uppextensiom)
                                 if(uppextensiom=='jpg' || uppextensiom=='jpeg' || uppextensiom=='png' || uppextensiom=='gif')
                                 {
                                   $('.frontimg').removeClass('d-none');
                                  var reader  = new FileReader();
                                  reader.onloadend = function () {
                                    preview.src = reader.result;
                                
                                  }
                                
                                  if (file) {
                                    reader.readAsDataURL(file);
                                  } else {
                                    preview.src = "";
                                  }
                                 }
                                });
                                $('#backpage').change(function() {      
                                  
                                  var preview = document.querySelector('.backimg');
                                  var file    = document.querySelector('#backpage').files[0];
                                  var extension=$('#backpage').val().replace(/^.*\./, '');
                                 var uppextensiom= extension.toLowerCase();alert(uppextensiom)
                                 if(uppextensiom=='jpg' || uppextensiom=='jpeg' || uppextensiom=='png' || uppextensiom=='gif')
                                 {
                                   $('.backimg').removeClass('d-none');
                                  var reader  = new FileReader();
                                  reader.onloadend = function () {
                                    preview.src = reader.result;
                                
                                  }
                                
                                  if (file) {
                                    reader.readAsDataURL(file);
                                  } else {
                                    preview.src = "";
                                  }
                                 }
                                });
                                $('#iqamaphoto').change(function() {      
                                  
                                  var preview = document.querySelector('.iqamaimg');
                                  var file    = document.querySelector('#iqamaphoto').files[0];
                                  var extension=$('#iqamaphoto').val().replace(/^.*\./, '');
                                 var uppextensiom= extension.toLowerCase();alert(uppextensiom)
                                 if(uppextensiom=='jpg' || uppextensiom=='jpeg' || uppextensiom=='png' || uppextensiom=='gif')
                                 {
                                   $('.iqamaimg').removeClass('d-none');
                                  var reader  = new FileReader();
                                  reader.onloadend = function () {
                                    preview.src = reader.result;
                                
                                  }
                                
                                  if (file) {
                                    reader.readAsDataURL(file);
                                  } else {
                                    preview.src = "";
                                  }
                                 }
                                });*/
       </script>