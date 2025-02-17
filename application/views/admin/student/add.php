<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">
    <div class="page-content">




        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Student</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="<?php echo base_url();?>admin/dashboard">Home</a>
                                </li>
                                <i class="fa-solid fa-chevron-right "
                                    style="font-size: 9px;margin: 6px 5px 0px 5px;"></i>
                                <li class="breadcrumb-item active">Student</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <form method="post" id="UserForm"  enctype="multipart/form-data">

                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="store" role="tabpanel" aria-labelledby="store-tab">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="form-group row mb-2">
                                                <label class="col-sm-2 col-form-label">Name</label>
                                                <div class="col-sm-3">
                                                    <input class="form-control" 
                                                        type="text" name="name" id="name">
                                                 
                                                    <div class="errormsg mt-2" id="errorname" role="alert"></div>
                                                    
                                                </div>

                                                <label class="col-sm-2 col-form-label">Email</label>
                                                <div class="col-sm-3">
                                                    <input class="form-control" 
                                                        type="email" name="email" id="email">
                                                        <div class="errormsg mt-2" id="erroremail" role="alert"></div>
                                                </div>
                                            </div>
                                             <div class="form-group row mb-2">
                                             <label class="col-sm-2 col-form-label">Mobile No</label>
                                                <div class="col-sm-3">
                                                    <input class="form-control" 
                                                        type="text" name="mobileno" id="mobileno">
                                                        <div class="errormsg mt-2" id="errormobileno" role="alert"></div>
                                                </div>
                                                <label class="col-sm-2 col-form-label">Address</label>
                                                <div class="col-sm-3">
                                                    <input class="form-control" 
                                                        type="text" name="address" id="address">
                                                        <div class="errormsg mt-2" id="erroraddress" role="alert"></div>
                                                </div>
                                             </div>
                                            <div class="form-group row mb-2">
                                            <label class="col-sm-2 col-form-label">Remarks</label>
                                                <div class="col-sm-3"> 
                                                    <input class="form-control" 
                                                        type="text" name="remarks" id="remarks">
                                                        <div class="errormsg mt-2" id="errorremarks" role="alert"></div>
                                                </div>
                                                <label class="col-sm-2 col-form-label">Status</label>
                                                <div class="col-sm-3">
                                                <select class="form-select"  name="user-status" id="user-status">
                                                    <option selected>Select Status</option>
                                                     <option value="1">Active</option>
                                                     <option value="0">Inactive</option>
                                                </select>
                                                <div class="errormsg mt-2" id="errorstatus" role="alert"></div>
                                                </div>
                                            </div>

                                         <div class="form theme-form">
                                            </div>




                                        </div>
                                    </div>
                                </div>











                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary pull-right mb-4" type="submit">Save</button>
                </form>



            </div>