
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">
            <div class="page-content">

                


                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0 font-size-18">Users</h4>
                
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="<?php echo base_url();?>admin/dashboard">Home</a></li>
                                        <i class="fa-solid fa-chevron-right " style="font-size: 9px;margin: 6px 5px 0px 5px;"></i>
                                        <li class="breadcrumb-item active">Users</li>
                                    </ol>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    
                    <!-- Displaying Date and Time -->
                    <!-- <?php $time=strtotime(date("Y/m/d"));
 $month=date("F",$time);
 $year=date("Y",$time);
 $date=date("d",$time);  ?>
                          <h2 class="f-w-400"> <span><?php echo $month; ?> <?php echo $date; ?> <?php echo $year; ?><sup><i class="fa fa-circle-o f-10"></i></sup></span></h2> -->
                    <!-- Displaying Date and Time -->

                
                
                    <div class="row">





                    <?php if($this->session->flashdata('success')){ ?>
                    <div class="alert alert-success dark" role="alert">
                        <?php echo $this->session->flashdata('success');$this->session->unset_userdata('success'); ?>
                    </div><?php } ?>
                    
                    <?php if($this->session->flashdata('error')){ ?>
                    <div class="alert alert-danger dark" role="alert">
                        <?php echo $this->session->flashdata('error');$this->session->unset_userdata('error'); ?>
                    </div><?php } ?>


                    
                        <div class="">
                            <div class="table-responsive-sm">



                            <a class="btn btn-primary mb-2 f-right" href="<?php echo base_url(); ?>admin/user/add" role="button"><i class="fa fa-plus"></i> Add User</a>



                            <table id="example" class="table table-striped" style="width:100%">
        <thead style="background: #e5e5e5;">
            <tr>
            <th>No</th>
            <th>Store</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Status</th>
            <th>Actions</th>
            </tr>
        </thead>
        <tbody>

        <?php
                       if(!empty($users)){
                       $count = 1;
                       foreach($users as $val){ ?>
            <tr>
                <td><?php echo $count;?></td>
                <td><?php echo $val['store_name'];?></td>
                <td><?php echo $val['Name'];?></td>
                <td><?php echo $val['userEmail'];?></td>
                <td><?php echo $val['UserPhoneNumber'];?></td>
                <td><?php if($val['is_active'] == 1){ ?> <span class="badge-success">Active</span> <?php } else { ?> <span class="badge-danger">Inactive</span> <?php }?></td>
                <td class="pb-0 pt-0 d-flex">
                    <form class="m-0" action="<?php echo base_url();?>admin/user/edit" method="post">
                                      <input type="hidden" name="id" value="<?php echo $val['userid']; ?>"> 
                                        <button class="btn tblEditBtn pl-0 pr-0" type="submit" data-bs-toggle="tooltip" data-id="<?php echo $val['userid']; ?>" data-bs-original-title="Edit User"><i class="fa fa-edit"></i></button>
                    </form>
                    
                    <a class="btn tblDelBtn pl-0 pr-0 del_user" type="button" data-bs-toggle="modal" data-id="<?php echo $val['userid']; ?>" data-bs-original-title="Delete User" data-bs-target="#exampleModal"><i class="fa fa-trash"></i></a>
                    
            </tr>
            <?php $count++; }} ?>

           
            
        </tbody>
        <tfoot>
            <tr>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            </tr>
        </tfoot>
    </table>








                               
                               
                                
                            </div>
                        </div>
                    </div>



<!-- Modal for detailed view -->
                    <div class="modal fade" id="emp_informations" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h1 class="modal-title fs-5" id="exampleModalLabel">Employee Details</h1>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <iframe src="emp-informations.html" style="width: 100%; height: 500px;"></iframe>
                                </div>
                              </div>
                            </div>
                          </div>
                          <!-- end -->



                           <!--modal for delete confirmation-->
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel"><?php echo confirm; ?></h5>
                              <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" name="id" id="user_id" value=""/>
                                <?php echo are_you_sure; ?></div>
                            <div class="modal-footer">
                              <button class="btn btn-primary" type="button" data-bs-dismiss="modal">No</button>
                              <button class="btn btn-secondary" id="yes_del_user" type="button" data-bs-dismiss="modal">Yes</button>
                            </div>
                          </div>
                        </div>
                      </div>
        <!--modal for delete confirmation-->





            </div>

            <script src="<?php echo base_url();?>assets/admin/js/modules/user.js"></script>