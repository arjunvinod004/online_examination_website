<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">
    <div class="page-content">




        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Students</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="<?php echo base_url();?>admin/dashboard">Home</a>
                                </li>
                                <i class="fa-solid fa-chevron-right "
                                    style="font-size: 9px;margin: 6px 5px 0px 5px;"></i>
                                <li class="breadcrumb-item active">Students</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

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



                        <a class="btn btn-primary mb-2 f-right" href="<?php echo base_url(); ?>admin/Student/student_form"
                            role="button"><i class="fa fa-plus"></i> Add</a>



                        <table id="example" class="table table-striped" style="width:100%">
                            <thead style="background: #e5e5e5;">
                                <tr>
                                    <th>No</th>
                                    
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Mob No</th>
                                    <th>Address</th>
                                    <th>Status</th>
                                    <!-- <th>Actions</th> -->
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                       if(!empty($students)){
                       $count = 1;
                       foreach($students as $val){ ?>
                                <tr>
                                    <td><?php echo $count;?></td>
                                    <td><?php echo $val['name'];?></td>
                                    <td><?php echo $val['email'];?></td>
                                    <td><?php echo $val['mobno'];?></td>
                                    <td><?php echo $val['address'];?></td>
                                   
                                    <td><?php if($val['status'] == 1){ ?> <span class="badge-success">Active</span>
                                        <?php } else { ?> <span class="badge-danger">Inactive</span> <?php }?></td>
                                    <td class="pb-0 pt-0 d-flex">
                                        <form class="m-0" action="<?php echo base_url();?>admin/student/edit"
                                            method="post">
                                            <input type="hidden" name="id" value="<?php echo $val['id']; ?>">
                                            <!-- <button class="btn tblEditBtn pl-0 pr-0" type="submit"
                                                data-bs-toggle="tooltip" data-id="<?php echo $val['id']; ?>"
                                                data-bs-original-title="Edit Category"><i
                                                    class="fa fa-edit"></i></button> -->
                                        </form>

                                        <!-- <a class="btn tblDelBtn pl-0 pr-0 del_category" type="button"
                                            data-bs-toggle="modal" data-id="<?php echo $val['id']; ?>"
                                            data-bs-original-title="Delete Category" data-bs-target="#exampleModal"><i
                                                class="fa fa-trash"></i></a> -->


                                        <!-- <a data-bs-toggle="modal" data-bs-target="#emp_informations" class="btn tblLogBtn pl-0 pr-0" type="button" class="btn btn-secondary" data-toggle="tooltip" data-placement="top" title="Additional Informations">
                        <i class="fa-solid fa-circle-plus"></i>
                    </a> -->
                                    </td>
                                </tr>
                                <?php $count++; }} ?>



                            </tbody>
                           
                        </table>











                    </div>
                </div>
            </div>



            <!-- Modal for detailed view -->
            <div class="modal fade" id="emp_informations" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Employee Details</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <iframe src="" style="width: 100%; height: 500px;"></iframe>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end -->



            <!--modal for delete confirmation-->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"><?php echo confirm; ?></h5>
                            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="id" id="category_id" value="" />
                            <?php echo are_you_sure; ?>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary" type="button" data-bs-dismiss="modal">No</button>
                            <button class="btn btn-secondary" id="yes_del_category" type="button"
                                data-bs-dismiss="modal">Yes</button>
                        </div>
                    </div>
                </div>
            </div>
            <!--modal for delete confirmation-->





        </div>

        