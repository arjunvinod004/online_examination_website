
        <!-- ============================================================== -->
        <div class="main-content">
            <div class="page-content">

                


                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0 font-size-18">QR Codes</h4>
                
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="<?php echo base_url();?>admin/dashboard">Home</a></li>
                                        <i class="fa-solid fa-chevron-right " style="font-size: 9px;margin: 6px 5px 0px 5px;"></i>
                                        <li class="breadcrumb-item active">QR Codes</li>
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



<div class="row">
    <?php foreach ($tableQrCodes as $qrcode) { ?>
  <!-- QR Code Item 1 -->
  <div class="col-md-3 mb-4">
    <div class="card">
      <img src="<?php echo base_url();?>uploads/qrbg.jpg" class="card-img-top" alt="QR Code 1">
      <div class="card-body qr-card">
        <img src="<?php echo $qrcode['qr_code']; ?>">
        <span><?php echo $qrcode['table_name']; ?></span>
        <h5 class="card-title"><?php echo $qrcode['table_name']; ?></h5>
      </div>
    </div>
  </div>
  <?php } ?>
                                
                            </div>
                            
                            <a class="btn btn-primary" href="<?php echo base_url(); ?>admin/qrcodes/generatePdf/<?php echo $storeId; ?>"
                                                                    target="_blank">
                                                                    <i class="fa-solid fa-file-pdf"
                                                                        ></i>Generate PDF
                                                                </a>
                                                                
                        </div>
                    </div>





            </div>

            <script src="<?php echo base_url();?>assets/admin/js/modules/store.js"></script>

            
           