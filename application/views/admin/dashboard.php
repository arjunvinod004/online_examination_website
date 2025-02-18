
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0 font-size-18">Dashboard</h4>
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="<?php echo base_url();?>admin/dashboard">Home</a></li>
                                        <i class="fa-solid fa-chevron-right " style="font-size: 9px;margin: 6px 5px 0px 5px;"></i>
                                        <li class="breadcrumb-item active">Dashboard</li>
                                    </ol>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    <div class="row">
                        <div class="col-xl-3 col-md-6">
                            <!-- card -->
                            <div class="card card-h-100">
                                <!-- card body -->
                                <a href="<?php echo base_url('admin/report'); ?>"><div class="card-body bg-b-purple">
                                    <div class="row align-items-center">
                                        <div class="col-8">
                                            <span class="text-white mb-3 d-block text-truncate">Reports</span>
                                            <h4 class="mb-3">
                                                <span class="text-white"><?php if(isset($Clientscount)) { echo $Clientscount; } ?></span>
                                            </h4>
                                        </div>
                                        <div class="col-4 icon">
                                            <i class="fa fa-store"></i>
                                        </div>
                                    </div>
                                </div><!-- end card body -->
                            </a>
                            </div><!-- end card -->
                        </div><!-- end col -->
                
                        <div class="col-xl-3 col-md-6">
                            <!-- card -->
                            <div class="card card-h-100">
                                <!-- card body -->
                                <a href="<?php echo base_url('admin/user'); ?>"><div class="card-body bg-b-secondary">
                                    <div class="row align-items-center">
                                        <div class="col-8">
                                            <span class="text-white mb-3 d-block text-truncate">Students</span>
                                            <h4 class="mb-3">
                                                <span class="text-white"><?php if(isset($Studentscount)) { echo $Studentscount; } ?></span>
                                            </h4>
                                        </div>
                                        <div class="col-4 icon">
                                            <i class="fa fa-store"></i>
                                        </div>
                                    </div>
                                </div><!-- end card body -->
                            </a>
                            </div><!-- end card -->
                        </div><!-- end col -->
                        </div><!-- end col -->
                    </div>
                </div>
            </div>

           