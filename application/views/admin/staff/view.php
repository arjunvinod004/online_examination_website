<!-- header section -->
<div class="page-body">
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-sm-6">
                  <h3>Staff - <?=$details['Name'];?></h3>
                </div>
                <div class="col-sm-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url();?>dashboard"><i data-feather="home"></i>Home</a></li>
                    <li class="breadcrumb-item active">Staffs</li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid starts-->
       <div class="container-fluid dashboard-default">
         <div class="row">  
            <div class="col-sm-12">
                <div class="card pb-4">   
                  <div class="card-header pb-0">

                   <!--details start  -->
                  
                    <ul class="nav nav-tabs nav-primary" id="pills-warningtab" role="tablist">
                      <li class="nav-item"><a class="nav-link active" id="profile-tab" data-bs-toggle="pill" href="#profile" role="tab" aria-controls="profile" aria-selected="true"><i data-feather="edit"></i>Profile</a></li>
                      <li class="nav-item"><a class="nav-link" id="pills-warningcontact-tab" data-bs-toggle="pill" href="#pills-warningcontact" role="tab" aria-controls="pills-warningcontact" aria-selected="false"><i data-feather="map-pin"></i>Documents</a></li>

                      <li class="nav-item"><a class="nav-link" id="pills-warningprofile-tab" data-bs-toggle="pill" href="#pills-warningprofile" role="tab" aria-controls="pills-warningprofile" aria-selected="false"><i data-feather="tag"></i>Attendence</a></li>
                    </ul>
                    <div class="tab-content" id="pills-warningtabContent">
                      <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        


 <!--staff profile dtails start--------!-->
                      <div class="user-profile">
                          <div class="collapse show">
                            <div class="post-about mt-4">
                                <?php if(isset($details)){   
                                
 ?>
                            <ul>
                                 <li>
                                  <div><h5>Employee ID:</h5></div>
                                  <div>
                                    <h6><?php echo $details['emp_id']; ?></h6>
                                  </div>
                                </li>
                                <li>
                                  <div><h5>Name:</h5></div>
                                  <div>
                                    <h6><?php echo $details['Name']; ?></h6>
                                    <!-- <p class="mb-0">banglore - 2022</p> -->
                                  </div>
                                </li>
                                 <li>
                                  <div><h5>Gender:</h5></div>
                                  <div>
                                    <h6><?php echo $details['gender']; ?></h6>
                                  </div>
                                </li>
                                <li>
                                  <div><h5>Email:</h5></div>
                                  <div>
                                    <h6><?php echo $details['userEmail']; ?></h6>
                                  </div>
                                </li>
                                <li>
                                  <div><h5>Phone number:</h5></div>
                                  <div>
                                    <h6><?php echo $details['UserPhoneNumber']; ?></h6>
                                  </div>
                                </li>
                                <li>
                                  <div><h5>Address:</h5></div>
                                  <div>
                                    <h6><?php echo $details['userAddress']; ?></h6>
                                  </div>
                                </li>
                                
                                 <li>
                                  <div><h5>Date of birth:</h5></div>
                                  <div>
                                    <h6><?php echo date('d-M-y',strtotime($details['dob'])); ?></h6>
                                  </div>
                                </li>
                                 <li>
                                  <div><h5>Joining Date:</h5></div>
                                  <div>
                                    <h6><?php echo date('d-M-y',strtotime($details['dojoining'])); ?></h6>
                                  </div>
                                </li>
                                <li>
                                  <div><h5>Blood group:</h5></div>
                                  <div>
                                    <h6><?php echo $details['blood']; ?></h6>
                                  </div>
                                </li>
                                <li>
                                  <div><h5>Resume:</h5></div>
                                  <div>
                                    <?php
                                    if(empty($details['cv']))
                                    {
                                      echo '<h6>cv not uploaded</h6>';
                                    }
                                    else
                                    {
                                    $ext1 = pathinfo($details['cv'], PATHINFO_EXTENSION);
                                    $ext1lower=strtolower($ext1);
                                    if($ext1lower=='jpg' || $ext1lower=='jpeg' || $ext1lower=='png' || $ext1lower=='gif')
                                    {
           
                                    ?>
                                     <h6><img src="<?=base_url();?>uploads/staff/<?=$details['cv'];?>" width="15%" height="15%"></h6>
                                     <?php
                                    }
                                    else
                                    {
                                     ?>
                                     <h6><a href="<?=base_url();?>uploads/staff/<?=$details['cv'];?>" target="_blank"><?=$details['cv'];?></a></h6>
                                     <?php
                                    }
                                  }
                                    ?>
                                  </div>
                                </li>
                              </ul>
                              <?php } ?>
                            </div>
                          </div>
                        </div>

                        <?php if($this->Rolemodel->check_permission(44,$this->session->userdata('roleid'),'can_edit') == 1){ ?>
                        <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#exampleModalfat" data-whatever="@mdo">Change password</button>
                        <?php } ?>



                      </div>
                      <!--staff profile dtails end--------!-->
                       <!--staff attendendence dtails start--------!-->
                      <div class="tab-pane fade" id="pills-warningprofile" role="tabpanel" aria-labelledby="pills-warningprofile-tab">
                      <div class="col-sm-12">
            <div class="">
            <div class="card-header pb-0">
                      <div class="row">
                      <div class="col-sm-6 pull-right">
                      <a target="_blank" href="<?php echo base_url();?>staff/punchcsv/<?=$details['userid'];?>" class="btn btn-primary mb-4" type="submit" title="">CSV</a>
                 <a target="_blank" href="<?php echo base_url();?>staff/punchpdf/<?=$details['userid'];?>" class="btn btn-primary mb-4" type="submit" title="">PDF</a>
                 <a target="_blank" href="<?php echo base_url();?>staff/punchexcel/<?=$details['userid'];?>" class="btn btn-primary mb-4" type="submit" title="">Excel</a>
                </div>
                                </div>
                      <div class="">

                    <div class="table-responsive theme-scrollbar">
                      <table class="display" id="basic-1">
                        <thead>
                          <tr>
                        <th>No</th>
                            <th>Punchin Time</th>
                            <th>Punchout Time</th>
                            <th>Timezone</th>
                            <th>Total Hours</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                       if(!empty($attendence)){
                       $count = 1;
                       foreach($attendence as $val){ 
                        // Set default time zone to UTC
date_default_timezone_set('UTC');

// Set punch-in time
$punchindatetime=new DateTime($val['punch_in_date'].' '. $val['punch_in_time']);//combine date time together of punchin
$punchoutdatetime=new DateTime($val['punch_out_date'].' '. $val['punch_out_time']);


// Set employee time zone
$employee_time_zone = new DateTimeZone($val['timezone']);

// Convert punchin and punchout time to employee's time zone
$punchindatetime->setTimezone($employee_time_zone);
$punchoutdatetime->setTimezone($employee_time_zone);
// Set punch-in time



// Output punch-in time in employee's time zone
//echo "Punch-in time: " . $punchin_time->format('Y-m-d H:i:s T') . " " . $employee_time_zone->getName() . "\n";

// Output current time in employee's time zone
//echo "Current time: " . $current_time->format('Y-m-d H:i:s') . " " . $employee_time_zone->getName() . "\n";

// Output time difference
//echo "Total time: " . $time_diff->format('%H:%I:%S') . "\n";
                        
                        ?>
                       
                       <tr>
                           
                           
                            <td><?php echo $count; ?></td>
                            <td><?php echo $punchindatetime->format('d-m-Y H:i:s T');?></td>
                            <td><?php echo $punchoutdatetime->format('d-m-Y H:i:s T');?></td>
                            <td><?php echo $val['timezone'];?></td>
                            <td><?php echo $val['total_hrs'];?></td>

                           
                            
                          </tr>
                          
                       <?php $count++; }} ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                       </div>
                       </div>
                       </div>
                    </div>
                       <!--staff attendendence dtails end--------!-->
                       <!--document section start------!-->
                      <div class="tab-pane fade" id="pills-warningcontact" role="tabpanel" aria-labelledby="pills-warningcontact-tab">

                     
                     
                     
                     
                      <div class="col-sm-12 col-xl-12">
                <div class="">
                  <div class="card-header pb-0">
                    
                  </div>
                  <div class="">
                    <div class="row">
                      <div class="col-sm-12 col-md-6 col-lg-4">
                        <div class="card ribbon-wrapper">
                          <div class="card-body">
                            <div class="ribbon ribbon-primary ribbon-space-bottom">Passport</div>
                            <?php if(empty($details['passportnum']) && empty($details['passportexpirydate']) && empty($details['frontpage']) && empty($details['backpage']))
                              {
                                echo 'no records found';
                              }
                              else
                              {
                                $ext1 = pathinfo($details['frontpage'], PATHINFO_EXTENSION);
                                $ext1lower=strtolower($ext1);
                                $ext2 = pathinfo($details['backpage'], PATHINFO_EXTENSION);
                                $ext2lower=strtolower($ext2);
                                ?>
                            <div class="mb-3">
                             
                          <h6 class="form-label f-w-500">Passport number</h6>
                          <input class="form-control" value="<?=$details['passportnum'];?>" readonly>
                        </div>
                        <div class="mb-3">
                        <h6 class="form-label f-w-500">Expiry date</h6>
                          <input class="form-control" value="<?php if($details['passportexpirydate']!='')echo date('d-M-y',strtotime($details['passportexpirydate']));?>" readonly>
                        </div>
                        <div class="mb-3">
                          <h6 class="form-label f-w-500">Front page image</h6>
                          <?php
                           if(empty($details['frontpage']))
                           {
                             echo 'document not uploaded';
                           }
                           else
                           {
                        if($ext1lower=='jpg' || $ext1lower=='jpeg' || $ext1lower=='png' || $ext1lower=='gif')
                         {

                         ?>
                          <img src="<?=base_url();?>uploads/staff/<?=$details['frontpage'];?>" width="50%" height="50%">
                          <?php
                         }
                         else
                         {
                          ?>
                          <a href="<?=base_url();?>uploads/staff/<?=$details['frontpage'];?>" target="_blank"><?=$details['frontpage'];?></a>
                          <?php
                         }
                        }
                         ?>
                        </div>
                        <div class="mb-3">
                          <h6 class="form-label f-w-500">Back page image</h6>
                          <?php
                          if(empty($details['backpage']))
                          {
                            echo 'document not uploaded';
                          }
                          else
                          {
                          if($ext2lower=='jpg' || $ext2lower=='jpeg' || $ext2lower=='png' || $ext2lower=='gif')
                         {

                         ?>
                          <img src="<?=base_url();?>uploads/staff/<?=$details['backpage'];?>" width="50%" height="50%">
                          <?php
                         }
                         else
                         {
                          ?>
                          <a href="<?=base_url();?>uploads/staff/<?=$details['backpage'];?>" target="_blank"><?=$details['backpage'];?></a>
                        <?php
                         }
                        }
                         ?>
                        </div>
                         <?php
                              }
                              ?>
                                       
                             </div>
                        </div>
                      </div>
                      <div class="col-sm-12 col-md-6 col-lg-4">
                        <div class="card ribbon-wrapper">
                          <div class="card-body">
                            <div class="ribbon ribbon-info ribbon-space-bottom">Iqama</div>
                            <?php if(empty($details['iqamanum']) && empty($details['iqamaexpirydate']) && empty($details['iqamaphoto']))
                              {
                                echo 'no records found';
                              }
                              else
                              {
                                $ext1 = pathinfo($details['iqamaphoto'], PATHINFO_EXTENSION);
                                $ext1lower=strtolower($ext1);
                                ?>

                            <div class="mb-3">
                          <h6 class="form-label f-w-500">Iqama number</h6>
                          <input class="form-control" value="<?=$details['iqamanum'];?>" readonly>
                        </div>
                        <div class="mb-3">
                        <h6 class="form-label f-w-500">Expiry date</h6>
                          <input class="form-control" value="<?php if($details['iqamaexpirydate']!='') echo date('d-M-y',strtotime($details['iqamaexpirydate']));?>" readonly>
                        </div>
                        <div class="mb-3">
                          <h6 class="form-label f-w-500">Image</h6>
                          <?php
                          if(empty($details['iqamaphoto']))
                          {
                            echo 'document not uploaded';
                          }
                          else
                          {
                          if($ext1lower=='jpg' || $ext1lower=='jpeg' || $ext1lower=='png' || $ext1lower=='gif')
                         {

                         ?>
                          <img src="<?=base_url();?>uploads/staff/<?=$details['iqamaphoto'];?>" width="50%" height="50%">
                          <?php
                         }
                         else
                         {
                          ?>
                          <a href="<?=base_url();?>uploads/staff/<?=$details['iqamaphoto'];?>" target="_blank"><?=$details['iqamaphoto'];?></a>
                        <?php
                         }
                        }
                         ?>
                        </div>
                        <?php
                              }
                              ?>



                          </div>
                        </div>
                      </div>
                      <div class="col-sm-12 col-md-6 col-lg-4">
                        <div class="card ribbon-wrapper">
                          <div class="card-body">
                            <div class="ribbon ribbon-success ribbon-space-bottom">Medical</div>
                            <?php if(empty($details['medicalname']) && empty($details['medicalnum']) && empty($details['medicalexpirydate']))
                              {
                                echo 'no records found';
                              }
                              else
                              {
                                ?>
                            <div class="mb-3">
                          <h6 class="form-label f-w-500">Name</h6>
                          <input class="form-control" value="<?=$details['medicalname'];?>" readonly>
                        </div>
                        <div class="mb-3">
                        <h6 class="form-label f-w-500">Medical number</h6>
                          <input class="form-control" value="<?=$details['medicalnum'];?>" readonly>
                        </div>
                        <div class="mb-3">
                        <h6 class="form-label f-w-500">Expiry date</h6>
                          <input class="form-control" value="<?php if($details['medicalexpirydate']!='') echo date('d-M-y',strtotime($details['medicalexpirydate']));?>" readonly>
                        </div>
                       <?php
                              }
                              ?>
                  


                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
                     
                     
                     
                     
                     
                      </div>
                    </div>

                     <!--document section end------!-->
                    <a href="<?php echo base_url(); ?>staff" class="btn btn-primary mt-4 pull-left">Back</a>
                   <!--details end  -->

                </div>
            </div>
        </div>
        </div>
        </div>
        <!-- Container-fluid Ends-->
        </div>
        <!-- footer section -->
       
        <div class="modal fade" id="exampleModalfat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel2">Change password</h5>
                              <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <form id="password" method="post" action="<?=base_url()?>staff/changepass">
                              <input type="hidden" value="<?=$details['userid'];?>" id="userid" name="userid">

                                <!-- <div class="mb-3">
                                  <label class="col-form-label" for="recipient-name">Old password:</label>
                                  <input class="form-control" type="text" name="oldpassword" id="opassword">
                                </div> -->
                                <div class="mb-3">
                                  <label class="col-form-label" for="message-text">New password:</label>
                                  <input class="form-control" id="newpassword" type="password" name="newpassword">
                                </div>
                                <div class="mb-3">
                                  <label class="col-form-label" for="message-text">Confirm password:</label>
                                  <input class="form-control" id="cpass" type="password" name="cpassword">
                                </div>
                              
                            </div>
                            <div class="modal-footer">
                              <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                              <button class="btn btn-primary" type="submit" id="upd">Update</button>
                                </form>
                            </div>
                          </div>
                        </div>
                      </div>
                      <script src="<?php echo base_url();?>assets/js/deem/staff/staff.js" type="text/javascript"></script>

                      <script src="<?php echo base_url();?>assets/js/validate.js" type="text/javascript"></script>