<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">
    <div class="page-content">




        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Question</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="<?php echo base_url();?>admin/dashboard">Home</a>
                                </li>
                                <i class="fa-solid fa-chevron-right "
                                    style="font-size: 9px;margin: 6px 5px 0px 5px;"></i>
                                <li class="breadcrumb-item active">Question</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <form method="post" id="QuestionForm"  enctype="multipart/form-data">

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
                                                <div class="col-sm-10">
                                                    <input class="form-control" 
                                                        type="text" name="question_name" id="question_name">
        
                                                    <div class="errormsg mt-2" id="error-question_name" role="alert"></div>
                                                    
                                                </div>

                                                <label class="col-sm-2 col-form-label">Option1</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" 
                                                        type="text" name="option1" id="option1">
                                                        <div class="errormsg mt-2" id="erroroption1" role="alert"></div>
                                                </div>
                                            </div>
                                             <div class="form-group row mb-2">
                                             <label class="col-sm-2 col-form-label">Option2</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" 
                                                        type="text" name="option2" id="option2">
                                                        <div class="errormsg mt-2" id="erroroption2" role="alert"></div>
                                                </div>
                                                <label class="col-sm-2 col-form-label">Option3</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" 
                                                        type="text" name="option3" id="option3">
                                                        <div class="errormsg mt-2" id="erroroption3" role="alert"></div>
                                                </div>
                                             </div>
                                            <div class="form-group row mb-2">
                                            <label class="col-sm-2 col-form-label">Option4</label>
                                                <div class="col-sm-10"> 
                                                    <input class="form-control" 
                                                        type="text" name="option4" id="option4">
                                                        <div class="errormsg mt-2" id="erroroption4" role="alert"></div>
                                                </div>

                                                <label class="col-sm-2 col-form-label">Answer</label>
                                                <div class="col-sm-10"> 
                                                    <input class="form-control" 
                                                        type="text" name="answer" id="answer">
                                                        <div class="errormsg mt-2" id="erroranswer" role="alert"></div>
                                                </div>  
                                            </div>

                                            <div class="form-group row mb-2">
                                            <!-- <label class="col-sm-2 col-form-label">Mark</label>
                                                <div class="col-sm-10"> 
                                                 <input type="text" class="form-control" name="mark" id="mark">
                                                        <div class="errormsg mt-2" id="errormark" role="alert"></div>
                                                </div> -->
                                            <label class="col-sm-2 col-form-label">Remarks</label>
                                                <div class="col-sm-10"> 
                                                    <textarea class="form-control" name="remarks" id="remarks">
                                                    </textarea>
                                                        <div class="errormsg mt-2" id="errorremarks" role="alert"></div>
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