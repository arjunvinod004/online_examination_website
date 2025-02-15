<!DOCTYPE html>
<html lang="en">
  
<!-- Mirrored from admin.pixelstrap.com/tivo/template/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 17 Feb 2023 08:00:15 GMT -->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="description" content="We welcome you to our website. In this site, we highlight about our services in the field of Inspection & Testing.">
    <meta name="keywords" content="deem,inspection,testing">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="<?php echo base_url();?>assets/images/favicon/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="<?php echo base_url();?>assets/images/favicon/favicon.png" type="image/x-icon">
    <title>Deem Inspection Company Ltd.</title><link rel="preconnect" href="https://fonts.googleapis.com/">
<link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/vendors/font-awesome.css">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/vendors/icofont.css">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/vendors/themify.css">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/vendors/flag-icon.css">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/vendors/feather-icon.css">
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/vendors/bootstrap.css">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/style.css">
    <link id="color" rel="stylesheet" href="<?php echo base_url();?>assets/css/color-1.css" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/responsive.css">
  </head>
  <body>
    <!-- Loader starts-->
    <div class="loader-wrapper">
      <div class="dot"></div>
      <div class="dot"></div>
      <div class="dot"></div>
      <div class="dot"> </div>
      <div class="dot"></div>
    </div>
    <!-- Loader ends-->
    <!-- login page start-->
    <div class="container-fluid p-0">
      <div class="row m-0">
        <div class="col-12 p-0">    
          <div class="login-card">
            <div>
              <div><a class="logo" href="index.html"><img class="img-fluid for-light" src="<?php echo base_url();?>assets/images/logo/logo2.png" alt="looginpage"></a></div>
              <div class="login-main"> 
              <form class="theme-form" method="POST" action="<?php echo base_url(); ?>admin/login/userlogin">
              

                  <h4 class="text-center">Login</h4>
                  <p class="text-center">Enter your username or email & password to login</p>
                  
                  <?php if($this->session->flashdata('success')){ ?>
                    <div class="alert alert-success dark" role="alert">
                        <?php echo $this->session->flashdata('success');$this->session->unset_userdata('success'); ?>
                    </div><?php } ?>
                  <?php if($this->session->flashdata('error')){ ?>
                    <div class="alert alert-danger dark" role="alert">
                        <?php echo $this->session->flashdata('error');$this->session->unset_userdata('error'); ?>
                    </div><?php } ?>
                  
                  
                  <div class="form-group">
                    <label class="col-form-label">Username</label>
                    <input class="form-control" name="username" type="text" value="<?php echo set_value('username'); ?>" placeholder="Enter your username">
                  </div>

                  <?php if(form_error('username')){ ?>
<div class="errormsg" role="alert"><?php echo form_error('username'); ?></div>
                  <?php } ?>
        
                  <div class="form-group">
                    <label class="col-form-label">Password</label>
                    <div class="form-input position-relative">
                      <input class="form-control" type="password" name="login[password]" value="<?php echo set_value('login[password]'); ?>">
                      <!--<div class="show-hide"><span class="show"></span></div>-->
                    </div>
                  </div>

                  <?php if(form_error('login[password]')){ ?>
<div class="errormsg" role="alert"><?php echo form_error('login[password]'); ?></div>
                  <?php } ?>
                  
                  <div class="form-group mb-0">
                    <div class="p-0">
                        <input type="checkbox" id="vehicle1" name="remember">
                      <!--<input id="checkbox1" type="checkbox" name="remember">-->
                      <label class="text-muted" for="checkbox1">Remember me</label>
                    </div><a class="link" href="<?php echo base_url();?>forgotpassword">Forgot password?</a>
                    <div class="text-end mt-3">
                      <button class="btn btn-primary btn-block w-100" type="submit">Sign in                 </button>
                    </div>
                  </div>
                 
                  
                  
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- latest jquery-->
      <script src="<?php echo base_url();?>assets/js/jquery-3.6.0.min.js"></script>
      <!-- Bootstrap js-->
      <script src="<?php echo base_url();?>assets/js/bootstrap/bootstrap.bundle.min.js"></script>
      <!-- feather icon js-->
      <script src="<?php echo base_url();?>assets/js/icons/feather-icon/feather.min.js"></script>
      <script src="<?php echo base_url();?>assets/js/icons/feather-icon/feather-icon.js"></script>
      <!-- scrollbar js-->
      <!-- Sidebar jquery-->
      <script src="<?php echo base_url();?>assets/js/config.js"></script>
      <!-- Template js-->
      <script src="<?php echo base_url();?>assets/js/script.js"></script>
      <!-- login js-->
    </div>
  </body>

<!-- Mirrored from admin.pixelstrap.com/tivo/template/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 17 Feb 2023 08:00:15 GMT -->
</html>