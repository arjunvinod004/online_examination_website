<input type="hidden" id="base_url" value="<?php echo base_url();?>">

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8" />
    <title>Dashboard | Emigo </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Emigo" name="description" />
    <meta content="CVS" name="author" />

    <link rel="shortcut icon" href="<?php echo base_url();?>assets/admin/images/favicon.ico">
    <link href="<?php echo base_url();?>assets/admin/css/crm-responsive.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/admin/css/classic.min.css" rel="stylesheet" /> <!-- 'classic' theme -->
    <link href="<?php echo base_url();?>assets/admin/fonts/css/all.min.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>assets/admin/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet"
        type="text/css" />
    <link href="<?php echo base_url();?>assets/admin/css/icon.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/admin/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
    <script src="<?php echo base_url();?>assets/admin/js/jquery.min.js"></script>
    <script src="<?php echo base_url();?>assets/admin/js/bootstrap.bundle.min.js"></script>

</head>

<body>

    <div class="container-fluid bg-light-new">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box text-center mt-5">
                    <h4 class="mb-sm-0 font-size-25 text-uppercase text-center"><?php echo $store_disp_name; ?></h4>
                    <p class="font-size-15"><?php echo $store_address; ?></p>
                    <p class="font-size-15"><b>SUPPORT NO :</b> <?php echo $support_no; ?></p>
                    <p class="font-size-15"><b>SUPPORT EMAIL :</b> <?php echo $support_email; ?></p>

                    <!-- <div class="page-title-right">
                    <button id="reloadButton" class="btn btn-primary">Reload </button>
                    <button class="btn btn-primary" style="margin-left: 10px;" id="stopReload">Stop Reload</button>
                </div> -->


                </div>
            </div>
        </div>
        <!-- end page title -->
        <?php if(isset($controller) && $controller != 'dashboard'){ ?>
        <div class="container-fluid">
            <div class="row mb-5 justify-content-center">
                <div class="col-1 col-md-2 col-lg-1">
                    <a href="<?php echo base_url('owner/dashboard'); ?>"><button
                            class="btn btn-secondary text-white text-uppercase w-100">Dashboard</button></a>
                </div>
                <div class="col-1 col-md-2 col-lg-1">
                    <a href="<?php echo base_url('owner/product'); ?>"><button
                            class="btn bg-bg-primary text-white text-uppercase w-100">Dishes Catalog</button></a>
                </div>
                <div class="col-1 col-md-2 col-lg-1">
                    <a href="<?php echo base_url('owner/order'); ?>"><button
                            class="btn bg-bg-info text-white text-uppercase w-100">Order Monitor</button></a>
                </div>
                <?php if ($this->session->userdata('roleid') == 2){ ?>
                <div class="col-1 col-md-2 col-lg-1">
                    <a href="<?php echo base_url('owner/order/reports'); ?>"><button
                            class="btn bg-bg-success text-white text-uppercase w-100">Reports</button></a>
                </div>
                <div class="col-1 col-md-2 col-lg-1">
                    <a href="<?php echo base_url('owner/settings'); ?>"><button
                            class="btn bg-bg-info text-white text-uppercase w-100">Settings</button></a>
                </div>
                <?php } ?>
                <div class="col-1 col-md-2 col-lg-1">
                    <a href="<?php echo base_url('admin/login/logout'); ?>"><button
                            class="btn bg-bg-primary text-white text-uppercase w-100">LOGOUT</button></a>
                </div>
            </div>
        </div>
        <?php } ?>