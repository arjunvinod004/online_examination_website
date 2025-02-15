<!-- header section -->
<div class="page-body">
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-sm-6">
                  <h3>Client - <?php if(isset($details[0]['name'])){ echo $details[0]['name']; } ?></h3>
                  <input type="hidden" id="client_id" value="<?php if(isset($details[0]['id'])){ echo $details[0]['id']; } ?>">
                </div>
                <div class="col-sm-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url();?>dashboard"><i data-feather="home"></i>Home</a></li>
                    <li class="breadcrumb-item active">Clients</li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid starts-->
       <div class="container-fluid dashboard-default">

      <!-- for javascript validation showing -->
      <div class="alert alert-success dark d-none" role="alert"></div>
      <div class="alert alert-danger dark d-none" role="alert"></div>
            <!-- for javascript validation showing -->

       
             <!--modal for delete confirmation-->
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                              <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <input type="text" name="id" id="clientjobloc_id" value=""/>
                                <?php echo are_you_sure; ?></div>
                            <div class="modal-footer">
                              <button class="btn btn-primary" type="button" data-bs-dismiss="modal">No</button>
                              <button class="btn btn-secondary" id="yes_del_client_jobloc" type="button" data-bs-dismiss="modal">Yes</button>
                            </div>
                          </div>
                        </div>
                      </div>
        <!--modal for delete confirmation-->
       
       
       
            <div class="row">  
            <div class="col-sm-12">
                <div class="card pb-4">   
                  <div class="card-header pb-0">

                   <!--details start  -->
                  
                    <ul class="nav nav-tabs nav-primary" id="pills-warningtab" role="tablist">
                      <li class="nav-item"><a class="nav-link active" id="profile-tab" data-bs-toggle="pill" href="#profile" role="tab" aria-controls="profile" aria-selected="true"><i data-feather="edit"></i>Profile</a></li>
                      <li class="nav-item"><a class="nav-link" id="projects-tab" data-bs-toggle="pill" href="#projects" role="tab" aria-controls="projects" aria-selected="false"><i data-feather="tag"></i>Projects</a></li>
                      <li class="nav-item"><a class="nav-link" id="location-tab" data-bs-toggle="pill" href="#location" role="tab" aria-controls="location" aria-selected="false"><i data-feather="map-pin"></i>Job Locations</a></li>
                    </ul>
                    <div class="tab-content" id="pills-warningtabContent">
                      <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        



                      <div class="user-profile">
                          <div class="collapse show">
                            <div class="post-about mt-4">
                                <?php if(isset($details[0])){ ?>
                            <ul>
                                <li>
                                  <div class="icon"><i data-feather="user"></i></div>
                                  <div>
                                    <h6><?php echo $details[0]['name']; ?></h6>
                                    <!-- <p class="mb-0">banglore - 2022</p> -->
                                  </div>
                                </li>
                                <li>
                                  <div class="icon"><i data-feather="inbox"></i></div>
                                  <div>
                                    <h5><?php echo $details[0]['email']; ?></h5>
                                  </div>
                                </li>
                                <li>
                                  <div class="icon"><i data-feather="phone"></i></div>
                                  <div>
                                    <h5><?php echo $details[0]['phone']; ?></h5>
                                  </div>
                                </li>
                                <li>
                                  <div class="icon"><i data-feather="map-pin"></i></div>
                                  <div>
                                    <h5><?php echo $details[0]['address']; ?></h5>
                                  </div>
                                </li>
                                
                              </ul>
                              <?php } ?>
                            </div>
                          </div>
                        </div>




                      </div>
                      <div class="tab-pane fade" id="projects" role="tabpanel" aria-labelledby="projects-tab">
                        <p class="mb-0 m-t-30">Projets</p>
                      </div>
                      <div class="tab-pane fade" id="location" role="tabpanel" aria-labelledby="location-tab">
                      <!-- location content start -->
                      <div class="table-responsive theme-scrollbar mt-4">
                      <button id="addnewjoblocation" class="btn btn-primary pull-right mb-4" type="button" data-bs-toggle="modal" data-bs-target="#joblocationmodal">Add new Job Location</button>
                      
                      
                      <!-- modal start -->
                      <div class="modal fade" id="joblocationmodal" tabindex="-1" role="dialog" aria-labelledby="joblocationmodal" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title">Job Location</h5>
                              <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                      <form id="form" method="post" >     
                      <div class="row">
                        <div class="col">
                        
                          <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Location</label>
                            
                            <div class="col-sm-9">
                            <input type="text" id="joblocation" value="" name="joblocation" class="form-control">
                            <div id="valid_location" class="alert alert-danger dark mt-1 d-none" role="alert"></div>  
                          </div>
                          </div>
                          <div class="row">
                            <label class="col-sm-3 col-form-label">Location Details</label>
                            <div class="col-sm-9">
                              <textarea class="form-control" id="details" name="details" rows="2" cols="2"></textarea>
                            </div>
                          </div>
                        </div>
                      </div>
                    
                            </div>
                            <div class="modal-footer">
                              <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                              <a class="btn btn-primary" id="save">Save</a>
                            </div>
                                </form>
                          </div>
                        </div>
                      </div>
                      <!-- modal end -->


                       <!-- update modal start -->
                       <div class="modal fade" id="edit_joblocationmodal" tabindex="-1" role="dialog" aria-labelledby="edit_joblocationmodal" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title">Update Job Location</h5>
                              <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              
                      <form id="form" method="post" >  
                      <input type="hidden" value="" id="hiddenClientJobId">                       <input type="hidden" value="" id="hiddenClientId">   
  
                      <div class="row">
                        <div class="col">
                        
                          <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Location</label>
                            
                            <div class="col-sm-9">
                            <input type="text" id="edit_joblocation" value="" name="joblocation" class="form-control">
                            <div id="edit_valid_location" class="alert alert-danger dark mt-1 d-none" role="alert"></div>  
                          </div>
                          </div>
                          <div class="row">
                            <label class="col-sm-3 col-form-label">Location Details</label>
                            <div class="col-sm-9">
                              <textarea class="form-control" id="edit_details" name="details" rows="2" cols="2"></textarea>
                            </div>
                          </div>
                        </div>
                      </div>
                    
                            </div>
                            <div class="modal-footer">
                              <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                              <a class="btn btn-primary" id="update">Update</a>
                            </div>
                                </form>
                          </div>
                        </div>
                      </div>
                      <!-- update modal end -->
                      
                      <table class="display" id="basic-1">
                        <thead>
                          <tr>
                        <th>No</th>
                           <th>Job Location</th>
                            
                            <th class="text-center">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                       if(!empty($job_locations)){
                       $count = 1;
                       foreach($job_locations as $val){ ?>
                       
                       <tr>
                           
                           
                            <td><?php echo $count; ?></td>
                            <td><a href=""><?php echo $val['job_location'];?></a></td>
                           
                            <td> 
                              <ul class="action pull-right">
                              
                                <li class="delete">
                                    
                                <button class="btn-primary edit_job_loc" type="button" data-bs-toggle="tooltip" data-id="<?php echo $val['job_location_id']; ?>"><i data-feather="edit"></i></button>
                                   
                                </li>
                                
                                <li class="edit">
                                    <form action="<?php echo base_url();?>client/delete_jobloc" method="post">
                                      <input type="hidden" name="id" value="<?php echo $val['job_location_id']; ?>"> 
                                        <button class="btn-primary del_client_jobloc" type="button" data-bs-toggle="modal" data-id="<?php echo $val['job_location_id']; ?>" data-bs-original-title="Delete Job Location" data-bs-target="#exampleModal"><i data-feather="trash-2"></i></button>
                                    </form>
                                </li>
                              </ul>
                            </td>
                            
                          </tr>
                          
                       <?php $count++; }} ?>
                        </tbody>
                      </table>
                      </div>
                    <!-- location content end -->
                      </div>
                    </div>
                    <a href="<?php echo base_url(); ?>client" class="btn btn-primary mt-4 pull-left">Back</a>
                   <!--details end  -->

                </div>
            </div>
        </div>
        </div>
        </div>
        <!-- Container-fluid Ends-->
        </div>
        <!-- footer section -->
        <script src="<?php echo base_url();?>assets/js/deem/client/client.js"></script>



       