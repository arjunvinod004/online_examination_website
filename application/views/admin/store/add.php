<div class="main-content">
            <div class="page-content">

                


                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0 font-size-18">Store</h4>
                
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="<?php echo base_url();?>admin/dashboard">Home</a></li>
                                        <i class="fa-solid fa-chevron-right " style="font-size: 9px;margin: 6px 5px 0px 5px;"></i>
                                        <li class="breadcrumb-item active">Store</li>
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

                        
                    
                  <form method="post" action="<?php echo base_url(); ?>admin/store/add" enctype="multipart/form-data">

<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
      <button class="nav-link active" id="store-tab" data-bs-toggle="tab" data-bs-target="#store" type="button" role="tab" aria-controls="store" aria-selected="true">Store</button>
    </li>
    <?php if($this->session->userdata('last_insert_store_id') != ''){ ?>
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="image-tab" data-bs-toggle="tab" data-bs-target="#image" type="button" role="tab" aria-controls="image" aria-selected="false">QR Codes</button>
    </li>
    <?php } ?>
    <!-- <li class="nav-item" role="presentation">
      <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Contact</button>
    </li> -->
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="store" role="tabpanel" aria-labelledby="store-tab">
      <div class="row">
        






     
  <div class="col-sm-12">
    <div class="card">
      <div class="card-body">



      <div class="form-group row mb-2">
    <label class="col-sm-2 col-form-label">Country</label>
    <div class="col-sm-4">
    <select class="form-select" name="country" id="country_id">
                                <option value="">Select Country</option>
    <?php
                                foreach($countries as $country)
                                {
                                ?>
                              <option value="<?=$country['country_id'];?>" <?php echo set_select('country', $country['country_id'])?>><?=$country['name'];?></option>
                              <?php
                                }
                                ?>
    </select>
    <?php if(form_error('country')){ ?>
<div class="errormsg mt-2" role="alert"><?php echo form_error('country'); ?></div>
      <?php } ?>
    </div>
    <label class="col-sm-2 col-form-label">GST/TAX</label>
    <div class="col-sm-4">
    <select id="sel_gst_or_tax" class="form-select" name="gst_or_tax">
                              
                            </select>
    <?php if(form_error('gst_or_tax')){ ?>
<div class="errormsg mt-2" role="alert"><?php echo form_error('gst_or_tax'); ?></div>
      <?php } ?>
    </div>
  </div>
  
  
  <div class="form-group textbox row mb-2 d-none">
    <label for="inputPassword" class="col-sm-2 col-form-label">Registration Number</label>
    <div class="col-sm-10  mb-2">
      <input name="bill_no" class="form-control" value="<?php echo set_value('bill_no'); ?>" id="inputbillno" placeholder="">
      <!-- <?php if(form_error('disp_name')){ ?>
<div class="errormsg mt-2" role="alert"><?php echo form_error('disp_name'); ?></div>
      <?php } ?> -->
    </div>
  </div>



  <div class="form-group row mb-2">
    <label for="inputPassword" class="col-sm-2 col-form-label">Display Name</label>
    <div class="col-sm-10 mb-2">
      <input name="disp_name" class="form-control" value="<?php echo set_value('disp_name'); ?>" id="inputPassword" placeholder="">
      <?php if(form_error('disp_name')){ ?>
<div class="errormsg mt-2" role="alert"><?php echo form_error('disp_name'); ?></div>
      <?php } ?>
    </div>
  </div>


     
  <div class="form-group row mb-2">
    <label class="col-sm-2 col-form-label">Registered Name</label>
    <div class="col-sm-4">
    <input class="form-control" value="<?php echo set_value('name'); ?>" type="text" name="name">
    <?php if(form_error('name')){ ?>
<div class="errormsg mt-2" role="alert"><?php echo form_error('name'); ?></div>
      <?php } ?>
    </div>

    <label class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-4">
    <input class="form-control" value="<?php echo set_value('email'); ?>" type="text" name="email">
    <?php if(form_error('email')){ ?>
<div class="errormsg mt-2" role="alert"><?php echo form_error('email'); ?></div>
      <?php } ?>
    </div>
    
  </div>


 


  <div class="form-group row mb-2">
    <label class="col-sm-2 col-form-label">Phone</label>
    <div class="col-sm-4">
    <input class="form-control" value="<?php echo set_value('phone'); ?>" type="text" name="phone">
    <?php if(form_error('phone')){ ?>
<div class="errormsg mt-2" role="alert"><?php echo form_error('phone'); ?></div>
      <?php } ?>
    </div>
    <label class="col-sm-2 col-form-label">Address</label>
    <div class="col-sm-4 mb-2">
    <textarea name="address" class="form-control" id="exampleFormControlTextarea4" rows=""><?php echo set_value('address'); ?></textarea>
    <?php if(form_error('address')){ ?>
<div class="errormsg mt-2" role="alert"><?php echo form_error('address'); ?></div>
      <?php } ?>
    </div>
  </div>

  <div class="form-group row mb-2">
    <label class="col-sm-2 col-form-label">Description</label>
    <div class="col-sm-10 mb-2">
    <textarea name="store_desc" class="form-control" id="exampleFormControlTextarea4" rows="3"><?php echo set_value('store_desc'); ?></textarea>
    <?php if(form_error('store_desc')){ ?>
<div class="errormsg mt-2" role="alert"><?php echo form_error('store_desc'); ?></div>
      <?php } ?>
    </div>
  </div>

  

  <div class="form-group row mb-2">
    <label class="col-sm-2 col-form-label">Contract Start Date</label>
    <div class="col-sm-2 mb-2">
    <div id="datepicker"  class="input-group date" data-date-format="yyyy-mm-dd">
                                                                            <input name="contract_start_date" class="form-control" value="<?php echo set_value('contract_start_date'); ?>" type="text">
                                                                            <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                                                        </div>
    
    </div>
    <label class="col-sm-2 col-form-label">Contract End Date</label>
    <div class="col-sm-2">
    <input type="text" class="form-control" id="datepicker1" name="contract_end_date" placeholder="Select End Date">
    
    </div>

    <label class="col-sm-2 col-form-label">Next Followup Date</label>
    <div class="col-sm-2">
    <input type="text" class="form-control" id="datepicker2" name="next_followup_date" value="<?php echo set_value('next_followup_date'); ?>" placeholder="Select End Date">
    
    </div>
  </div>

  <div class="form-group row mb-2">
    <label for="inputPassword" class="col-sm-2 col-form-label">Followup Remark</label>
    <div class="col-sm-10 mb-2">
      <input name="followup_remarks" class="form-control" value="<?php echo set_value('followup_remarks'); ?>" id="inputPassword" placeholder="">
    </div>
  </div>


  <div class="form-group row mb-2">
    <label class="col-sm-2 col-form-label">Opening Times</label>
    <div class="col-sm-4 mb-2">
    <input class="form-control" type="time" value="<?php echo set_value('store_opening_time'); ?>" name="store_opening_time">
    <?php if(form_error('store_opening_time')){ ?>
<div class="errormsg mt-2" role="alert"><?php echo form_error('store_opening_time'); ?></div>
      <?php } ?>
    </div>
    <label class="col-sm-2 col-form-label">Closing Time</label>
    <div class="col-sm-4">
    <input class="form-control" type="time" value="<?php echo set_value('store_closing_time'); ?>" name="store_closing_time">
    <?php if(form_error('store_closing_time')){ ?>
<div class="errormsg mt-2" role="alert"><?php echo form_error('store_closing_time'); ?></div>
      <?php } ?>
    </div>
  </div>
  

  <div class="form-group row mb-2">
    <label class="col-sm-2 col-form-label">Select Package</label>
    <div class="col-sm-4 mb-2">
    <select class="form-select" name="no_of_tables" id="country_id">
                                <option value="">Select Package</option>
    <?php
                                foreach($packages as $package)
                                {
                                ?>
                              <option value="<?=$package['package_id'];?>" <?php echo set_select('no_of_tables', $package['package_id'])?>><?=$package['name'];?></option>
                              <?php
                                }
                                ?>
    </select>
    <?php if(form_error('no_of_tables')){ ?>
<div class="errormsg mt-2" role="alert"><?php echo form_error('no_of_tables'); ?></div>
      <?php } ?>
    </div>
    <label class="col-sm-2 col-form-label">Trade License</label>
    <div class="col-sm-4">
    <input class="form-control" value="<?php echo set_value('trade_license'); ?>" type="text" name="trade_license">
    <?php if(form_error('trade_license')){ ?>
<div class="errormsg mt-2" role="alert"><?php echo form_error('trade_license'); ?></div>
      <?php } ?>
    </div>
  </div>




  <div class="form-group row mb-2">
    <label for="inputPassword" class="col-sm-2 col-form-label">Location</label>
    <div class="col-sm-10 mb-2">
      <input name="location" class="form-control" value="<?php echo set_value('location'); ?>" id="inputPassword" placeholder="">
      <?php if(form_error('location')){ ?>
<div class="errormsg mt-2" role="alert"><?php echo form_error('location'); ?></div>
      <?php } ?>
    </div>
  </div>




  <div class="form-group row mb-2">
    <label class="col-sm-2 col-form-label">Default Language</label>
    <div class="col-sm-10">
    <select class="form-select" name="language">
                            <option value="">Select Language</option>
                            <option value="ma" <?= set_select('language', 'ma') ?>>Malayalam</option>
                            <option value="hi" <?= set_select('language', 'hi') ?>>Hindi</option>
                            <option value="en" <?= set_select('language', 'en') ?>>English</option>
                            <option value="ar" <?= set_select('language', 'ar') ?>>Arabic</option>
                            </select>
    <?php if(form_error('language')){ ?>
<div class="errormsg mt-2" role="alert"><?php echo form_error('language'); ?></div>
      <?php } ?>
    </div>
  </div>





  <div class="form-group row mb-2">
    <label class="col-sm-2 col-form-label">Selected Languages</label>
    <div class="col-sm-10">
    <input type="checkbox" name="checkbox[]" value="ma" checked>Malayalam<br>
    <input type="checkbox" name="checkbox[]" value="en" checked>English<br>
    <input type="checkbox" name="checkbox[]" value="hi" checked>Hindi<br>
    <input type="checkbox" name="checkbox[]" value="ar" checked>Arabic<br>
    </div>
  </div>


  



<!--  <div class="form-group row mb-2">-->
<!--    <label class="col-sm-2 col-form-label">Currency</label>-->
<!--    <div class="col-sm-10">-->
<!--    <select class="form-select" name="currency">-->
<!--                            <option value="">Select Currency</option>-->
<!--                            <option value="inr" <?= set_select('currency', 'inr') ?>>Indian Rupee</option>-->
<!--                            <option value="euro" <?= set_select('currency', 'euro') ?>>EURO</option>-->
<!--                            <option value="pound" <?= set_select('currency', 'pound') ?>>Pound</option>-->
<!--                            <option value="dollar" <?= set_select('currency', 'dollar') ?>>Dollar</option>-->
<!--                            </select>-->
<!--    <?php if(form_error('currency')){ ?>-->
<!--<div class="errormsg mt-2" role="alert"><?php echo form_error('currency'); ?></div>-->
<!--      <?php } ?>-->
<!--    </div>-->
<!--  </div>-->



  <div class="form-group row mb-2">
    <label class="col-sm-2 col-form-label">Username</label>
    <div class="col-sm-4 mb-2">
    <input class="form-control" type="text" value="<?php echo set_value('username'); ?>" name="username">
    <?php if(form_error('username')){ ?>
<div class="errormsg mt-2" role="alert"><?php echo form_error('username'); ?></div>
      <?php } ?>
    </div>
    <label class="col-sm-2 col-form-label">Password</label>
    <div class="col-sm-4">
    <input class="form-control" type="password" value="<?php echo set_value('password'); ?>" name="password">
    <?php if(form_error('password')){ ?>
<div class="errormsg mt-2" role="alert"><?php echo form_error('password'); ?></div>
      <?php } ?>
    </div>
  </div>


  <div class="form-group row mb-2">
    <label class="col-sm-2 col-form-label">Store Logo</label>
    <div class="col-sm-10">
    <input type="file" class="form-control-file" name="store_logo_image">
    </div>
  </div>


  <label></label>
               

  <h4 class="mb-sm-3 font-size-18">Serving Modes</h4>
    <div class="row mb-4">
      <label for="horizontal-firstname-input" class="col-sm-2 col-form-label">Pickup/Take away</label>
          <div class="col-sm-2 d-flex">
              <input class="form-check-input" type="checkbox" value="" id="checkbox_pickup_or_take_away">
              <input type="hidden" name="checkbox_pickup_or_take_away" value="0" id="pickup_hidden">
          </div>

          <div class="col-sm-2">
          <input type="text" placeholder="Country code (91)" value="<?php echo set_value('pickup_country_code'); ?>" class="form-control" name="pickup_country_code" id="pickup_country_code">
                            <?php if(form_error('code')){ ?>
<div class="errormsg mt-2" role="alert"><?php echo form_error('code'); ?></div>
      <?php } ?>
          </div>

       

          <div class="col-sm-4 d-flex">
            <input type="text" placeholder="Enter Pickup Number" value="<?php echo set_value('txt_pickup_or_take_away'); ?>" class="form-control" name="txt_pickup_or_take_away" id="txt_pickup_or_take_away">
          </div>
          <div class="col-sm-2 d-flex">
          <a class="btn btn-primary" onclick="sendPickupTestMessage()">Send Test Message</a>
          </div>
    </div>
    <div class="row mb-4">
      <label for="horizontal-firstname-input" class="col-sm-2 col-form-label">Dining</label>
          <div class="col-sm-2 d-flex">
              <input class="form-check-input" type="checkbox" value="" name="checkbox_dining" id="checkbox_dining">
              <input type="hidden" name="checkbox_dining" value="0" id="dining_hidden">
          </div>

          <div class="col-sm-2">
          <input type="text" placeholder="Country code (91)" value="<?php echo set_value('dining_country_code'); ?>" class="form-control" name="dining_country_code" id="dining_country_code">
                            <?php if(form_error('code')){ ?>
<div class="errormsg mt-2" role="alert"><?php echo form_error('code'); ?></div>
      <?php } ?>
                            
          </div>


          <div class="col-sm-4 d-flex">
            <input type="text" placeholder="Enter Dining Number" class="form-control" value="<?php echo set_value('txt_dining'); ?>" name="txt_dining" id="txt_dining">
          </div>
          <div class="col-sm-2 d-flex">
          <a class="btn btn-primary" onclick="sendDiningTestMessage()">Send Test Message</a>
          </div>
    </div>
    <div class="row mb-4">
      <label for="horizontal-firstname-input" class="col-sm-2 col-form-label">Delivery</label>
          <div class="col-sm-2 d-flex">
              <input class="form-check-input" type="checkbox" value="" name="checkbox_delivery" id="checkbox_delivery">
              <input type="hidden" name="checkbox_delivery" value="0" id="delivery_hidden">
          </div>

          <div class="col-sm-2">
          <input type="text" placeholder="Country code (91)" value="<?php echo set_value('delivery_country_code'); ?>" class="form-control" name="delivery_country_code" id="delivery_country_code">
                            <?php if(form_error('code')){ ?>
<div class="errormsg mt-2" role="alert"><?php echo form_error('code'); ?></div>
      <?php } ?>
                    
          </div>

          <div class="col-sm-4 d-flex">
            <input type="text" placeholder="Enter Delivery Number" class="form-control" value="<?php echo set_value('txt_delivery'); ?>" name="txt_delivery" id="txt_delivery">
          </div>
          <div class="col-sm-2 d-flex">
          <a class="btn btn-primary" onclick="sendDeliveryTestMessage()">Send Test Message</a>
          </div>
    </div>


        
        <div class="form theme-form">
        
          
          

          <!-- row start -->
          <div class="row">
            
            
            
            
              
            
          </div>
          <!-- row end -->
            
            
          </div>
          
      
          <button class="btn btn-primary pull-right mb-4" type="submit" name="add">Save</button>
    
          </div>
                </div>
        </div>
        
        

            







      </div>
  </div>
  
</form>
  <div class="tab-pane fade" id="image" role="tabpanel" aria-labelledby="image-tab">
    
  



  <div class="col-sm-12">
    <div class="card">
      <div class="card-body">
        
        <div class="form theme-form">
        
          <div class="row">


        


          <?php if ($store_details[0]['pickup_number'] != '') { ?>
          <div class="col-xl-3 col-md-6">
          <form class="m-0" action="<?php echo base_url(); ?>admin/qrcodes/generatePickupQrCode" method="post">
          <?php if($this->session->userdata('last_insert_store_id') != ''){ ?>
  <input type="hidden" name="store_id_hidden" value="<?php echo $this->session->userdata('last_insert_store_id'); ?>">
    <?php } ?>
          <!-- <input type="hidden" name="store_id_hidden" value="<?php echo $this->session->userdata('logged_in_store_id'); ?>"> -->
          <input type="hidden" name="pickup_number_hidden" value="<?php echo $store_details[0]['pickup_number']; ?>">       
          <div class="card-body bg-b-success">
                                    <button class="bg-b-success" style="border: none;" type="submit"><div class="row align-items-center">
                                        <div class="col-8">
                                            <span class="text-white text-truncate" style="font-size: 19px;">Download Pickup QR Code</span>
                                            <span class="text-white text-truncate" style="font-size: 15px;"><?php echo $store_details[0]['pickup_number'] ?></span>
                                        </div>
                                        <div class="col-4 icon">
                                        <a href="<?php echo base_url(); ?>admin/qrcodes/generatePickupQrCode" target="_blank">
  <i class="fa fa-qrcode" style="font-size: 50px;"></i>
</a>
                                            <!-- <i class="fa fa-qrcode" style="font-size: 50px;"></i> -->
                                        </div>
                                    </div>
                                    
                                </div></button><!-- end card body -->
                           
                        </div>
                        </form>
                        <?php } ?>


                        <?php if ($store_details[0]['delivery_number'] != '') { ?>
          <div class="col-xl-3 col-md-6">
          <form class="m-0" action="<?php echo base_url(); ?>admin/qrcodes/generateDeliveryQRCode" method="post">
          <?php if($this->session->userdata('last_insert_store_id') != ''){ ?>
  <input type="hidden" name="store_id_hidden" value="<?php echo $this->session->userdata('last_insert_store_id'); ?>">
    <?php } ?>
          <input type="hidden" name="delivery_number_hidden" value="<?php echo $store_details[0]['delivery_number']; ?>">       
          <div class="card-body bg-b-success">
                                    <button class="bg-b-success" style="border: none;" type="submit"><div class="row align-items-center">
                                        <div class="col-8">
                                            <span class="text-white text-truncate" style="font-size: 19px;">Download Delivery QR Code</span>
                                            <span class="text-white text-truncate" style="font-size: 15px;"><?php echo $store_details[0]['delivery_number'] ?></span>
                                        </div>
                                        <div class="col-4 icon">
                                          <a href="<?php echo base_url(); ?>admin/qrcodes/generateDeliveryQRCode" target="_blank">
                                               <i class="fa fa-qrcode" style="font-size: 50px;"></i>
                                          </a>
                                            <!-- <i class="fa fa-qrcode" style="font-size: 50px;"></i> -->
                                        </div>
                                    </div>
                                    
                                </div></button><!-- end card body -->
                           
                        </div>
                        </form>
                        <?php } ?>

          
          
          
          <div class="col-xl-3 col-md-6">
                            
          <a class="store_table btn tblLogBtn pl-0 pr-0" id="" data-id="<?php echo $this->session->userdata('last_insert_store_id'); ?>" data-name="<?php echo $this->session->userdata('last_insert_store_name'); ?>" data-bs-toggle="modal" data-bs-target="#emp_informations" class="btn tblLogBtn pl-0 pr-0" title="Tables"><div class="card-body bg-b-success">
                                    <div class="row align-items-center">
                                        <div class="col-8">
                                            <span class="text-white text-truncate" style="font-size: 19px;">Generate Table QR Codes</span>
                                        </div>
                                        <div class="col-4 icon">
                                            <i class="fa fa-qrcode" style="font-size: 50px;"></i>
                                        </div>
                                    </div>
                                    
                                </div></a><!-- end card body -->
                           
                        </div>





            </div>
            
          </div>
          
          
          
          
            
            
          </div>
          
      
        
    
          </div>
                </div>
        </div>






  </div>
  <!-- <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
fffffffffff
  </div> -->
</div>





<!-- Modal for detailed view -->
<div class="modal fade" id="emp_informations" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h1 class="modal-title fs-5" id="modal_title_table"></h1>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="col-md-12">
                                <iframe id="table_iframe" height="600px" width="100%"></iframe>
                                </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <!-- end -->


                    


                  </div>

        <script>
          $(document).ready(function() {

            var base_url = '<?= base_url() ?>';
            $('#country_id').change(function() {
        var country_id = $(this).val();//alert(base_url);
        $.ajax({
            method: "POST",
            url: base_url + 'admin/store/getTaxRates',
                data: { 'country_id' : country_id },
                success: function(data){
                    $('#sel_gst_or_tax').html(data);
                }
            });
            
        $('#sel_gst_or_tax').change(function () {
        var taxRate = $(this).val();

        // alert(taxRate);
        if (taxRate !== '1') {
            $('.textbox').removeClass('d-none'); // Show the textbox group
        } else {
            $('.textbox').addClass('d-none'); // Hide the textbox group
        }
    });

    });





    $('#checkbox_pickup_or_take_away').on('click', function() {
                if ($(this).is(':checked')) {
                  $('#pickup_hidden').val(1);
                } else {
                  $('#pickup_hidden').val(0);
                }
    });

    $('#checkbox_dining').on('click', function() {
                if ($(this).is(':checked')) {
                  $('#dining_hidden').val(1);
                } else {
                  $('#dining_hidden').val(0);
                }
    });

    $('#checkbox_delivery').on('click', function() {
                if ($(this).is(':checked')) {
                  $('#delivery_hidden').val(1);
                } else {
                  $('#delivery_hidden').val(0);
                }
    });


          } );
        </script>


<script>
  $(document).ready(function() {
    // Initialize the datepicker
    $('#datepicker').datepicker({
        format: 'yyyy-mm-dd',
        startDate: new Date(),  // Set minimum date if needed
        endDate: '+364d'        // Set maximum date to 365 days in the future
    }).on('changeDate', function(e) {
        // Get the selected date as a JavaScript Date object
        var selectedDate = e.date;

        // Calculate the date 365 days after the selected date
        var dateAfter365Days = new Date(selectedDate);
        dateAfter365Days.setDate(dateAfter365Days.getDate() + 364);

        // Format the new date as 'yyyy-mm-dd'
        var formattedDateAfter365 = 
            dateAfter365Days.getFullYear() + '-' +
            (dateAfter365Days.getMonth() + 1).toString().padStart(2, '0') + '-' +
            dateAfter365Days.getDate().toString().padStart(2, '0');

        // Update another input field with the date 365 days after the selected date in yyyy-mm-dd format
        $('#datepicker1').val(formattedDateAfter365);

         // Calculate the date 365 days after the selected date
         var dateAfter335Days = new Date(selectedDate);
        dateAfter335Days.setDate(dateAfter335Days.getDate() + 335);

        // Format the new date as 'yyyy-mm-dd'
        var formattedDateAfter335 = 
            dateAfter335Days.getFullYear() + '-' +
            (dateAfter335Days.getMonth() + 1).toString().padStart(2, '0') + '-' +
            dateAfter335Days.getDate().toString().padStart(2, '0');

        // Update another input field with the date 365 days after the selected date in yyyy-mm-dd format
        $('#datepicker2').val(formattedDateAfter335);
    });
  });
</script>

<script>
    function sendPickupTestMessage() {
        const phoneNumber = $('#pickup_country_code').val()+$('#txt_pickup_or_take_away').val(); // Replace with the recipient's phone number
        const message = 'Hello, this is a test message!'; // The message to send
        const url = `https://wa.me/${phoneNumber}?text=${encodeURIComponent(message)}`;
        window.open(url, '_blank');
        return false;
    }
    function sendDiningTestMessage() {
        const phoneNumber = $('#dining_country_code').val()+$('#txt_dining').val(); // Replace with the recipient's phone number
        const message = 'Hello, this is a test message!'; // The message to send
        const url = `https://wa.me/${phoneNumber}?text=${encodeURIComponent(message)}`;
        window.open(url, '_blank');
    }
    function sendDeliveryTestMessage() {
        const phoneNumber = $('#delivery_country_code').val()+$('#txt_delivery').val(); // Replace with the recipient's phone number
        const message = 'Hello, this is a test message!'; // The message to send
        const url = `https://wa.me/${phoneNumber}?text=${encodeURIComponent(message)}`;
        window.open(url, '_blank');
    }
</script>


<script>
                $(document).ready(function() {
                    $('.store_table').click(function() {
                        var storeId = $(this).attr('data-id');
                        var storeName = $(this).attr('data-name');
                        document.getElementById('modal_title_table').innerHTML = storeName + ' - Tables';
                        document.getElementById('table_iframe').src = '<?php echo base_url('admin/table/load_store_tables_iframe/'); ?>' + storeId;
                    });
                } );
            </script>
