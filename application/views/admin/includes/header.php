<input type="hidden" id="base_url" value="<?php echo base_url();?>">

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8" />
    <title>Dashboard | Emigo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Emigo" name="description" />
    <meta content="CVS" name="author" />

    <link rel="shortcut icon" href="<?php echo base_url();?>assets/admin/images/favicon.ico">
    <link href="<?php echo base_url();?>assets/admin/css/crm-responsive.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/admin/css/classic.min.css" rel="stylesheet" /> <!-- 'classic' theme -->
    <link href="<?php echo base_url();?>assets/admin/fonts/css/all.min.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>assets/admin/css/datepicker.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>assets/admin/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/admin/css/icon.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/admin/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
    
</head>

<body>

    <!-- <body data-layout="horizontal"> -->
    <!-- Begin page -->
    <div id="layout-wrapper">


        <header id="page-topbar">
            <div class="navbar-header">
                <div class="d-flex">
                    <!-- LOGO -->
                    <div class="navbar-brand-box">
                        <a href="<?php echo base_url();?>admin/dashboard" class="logo logo-dark">
                            <span class="logo-sm">
                                <img src="<?php echo base_url();?>assets/admin/images/emigo_logo.png" alt="" height="">
                            </span>
                            <span class="logo-lg">
                                <img src="<?php echo base_url();?>assets/admin/images/emigo_logo.png" alt="" height="">
                                <span class="logo-txt"></span>
                            </span>
                        </a>

                        <a href="#" class="logo logo-light">
                            <span class="logo-sm">
                                <img src="<?php echo base_url();?>assets/admin/images/logo.png" alt="" height="">
                            </span>
                            <span class="logo-lg">
                                <img  src="<?php echo base_url();?>assets/admin/images/logo.png" alt="" width="100px">
                                <span class="logo-txt"></span>
                            </span>
                        </a>
                    </div>

                    <button type="button" class="btn btn-sm px-3 font-size-16 header-item" id="vertical-menu-btn">
                        <i class="fa fa-fw fa-bars"></i>
                    </button>


                </div>

                <div class="d-flex">





                    <!-- <div class="dropdown d-sm-inline-block">
                        <button type="button" class="btn header-item" id="mode-setting-btn">
                            <i data-feather="moon" class="icon-lg layout-mode-dark"></i>
                            <i data-feather="sun" class="icon-lg layout-mode-light"></i>
                        </button>
                    </div> -->

                    <div class="dropdown d-inline-block d-none">
                        <button type="button" class="btn header-item noti-icon position-relative"
                            id="page-header-notifications-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <i data-feather="bell" class="icon-lg"></i>
                            <span class="badge bg-danger rounded-pill">5</span>
                        </button>
                    </div>

                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item right-bar-toggle me-2">

                        </button>
                    </div>

                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item bg-soft-light border-start border-end"
                            id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <img class="rounded-circle header-profile-user"
                                src="<?php echo base_url();?>assets/admin/images/avatar-1.jpg" alt="Header Avatar">
                            <span class="d-none d-xl-inline-block ms-1 fw-medium">Emigo Admin</span>
                            <i class="fa-solid fa-chevron-down" style="font-size: 9px;"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end">
                            <!-- item-->

                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?php echo base_url()?>admin/logout"><i
                                    class="fa-solid fa-right-from-bracket me-1"></i>Logout</a>
                        </div>
                    </div>

                </div>
            </div>
        </header>


        <!-- ========== Left Sidebar Start ========== -->

        <div class="vertical-menu">

            <div data-simplebar class="h-100">

                <!--- Sidemenu -->




                <div id="sidebar-menu">
                    <!-- Left Menu Start -->
                    <ul class="metismenu list-unstyled" id="side-menu">
                        <li>
                            <a href="<?php echo base_url(); ?>admin/dashboard">
                                <i data-feather="home"></i>
                                <span data-key="t-dashboard">Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a href="javascript: void(0);" class="has-arrow">
                                <i data-feather="book"></i>

                                <span data-key="t-apps">Masters</span>
                                <i class="fa-solid fa-chevron-right " style="float: right; font-size: 9px;"></i>
                            </a>


                            <ul class="sub-menu" aria-expanded="false">
                                <li>
                                    <a href="<?php echo base_url(); ?>admin/student/">
                                    <i data-feather="users"></i>
                                        <span data-key="t-calendar">Students</span>

                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>admin/question/">
                                    <i class="fa-solid fa-question mx-1"></i>
                                        <span data-key="t-calendar">Questions</span>

                                    </a>
                                </li>
                            </ul>

                        </li>

                        <!-- <li>
                            <a href="javascript: void(0);" class="has-arrow">
                                <i data-feather="users"></i>

                                <span data-key="t-apps">User</span>
                                <i class="fa-solid fa-chevron-right " style="float: right; font-size: 9px;"></i>
                            </a>


                            <ul class="sub-menu" aria-expanded="false">
                                <li>
                                    <a href="<?php echo base_url(); ?>admin/user/add">
                                        <span data-key="t-calendar">Add User</span>

                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>admin/user">
                                        <span data-key="t-calendar">View Users</span>

                                    </a>
                                </li>
                            </ul>

                        </li> -->
                    </ul>
                </div>

                <!-- Sidebar -->
            </div>
        </div>
        <!-- Left Sidebar End -->
        <!-- ============================================================== -->