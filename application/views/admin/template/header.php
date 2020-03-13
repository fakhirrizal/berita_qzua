<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url(); ?>assets/img/logo.png">
    <title>Queensland Zhejiang United Association Inc.</title>
    <!-- Custom CSS -->
    <link href="<?= base_url(); ?>assets/dashboard_admin/assets/extra-libs/c3/c3.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/dashboard_admin/assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/dashboard_admin/assets/extra-libs/jvector/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
    <!-- Custom CSS -->
    <link href="<?= base_url(); ?>assets/dashboard_admin/dist/css/style.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets_dashboard/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin6">
            <nav class="navbar top-navbar navbar-expand-md">
                <div class="navbar-header" data-logobg="skin6">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
                            class="ti-menu ti-close"></i></a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <div class="navbar-brand">
                        <!-- Logo icon -->
                        <a href="index.html">
                            <b class="logo-icon">
                                <!-- Dark Logo icon -->
                                <img src="<?= base_url(); ?>assets/dashboard_admin/assets/images/logo-icon.png" alt="homepage" class="dark-logo" />
                                <!-- Light Logo icon -->
                                <img src="<?= base_url(); ?>assets/dashboard_admin/assets/images/logo-icon.png" alt="homepage" class="light-logo" />
                            </b>
                            <!--End Logo icon -->
                            <!-- Logo text -->
                            <span class="logo-text">
                                <!-- dark Logo text -->
                                <img src="<?= base_url(); ?>assets/dashboard_admin/assets/images/logo-text.png" alt="homepage" class="dark-logo" />
                                <!-- Light Logo text -->
                                <img src="<?= base_url(); ?>assets/dashboard_admin/assets/images/logo-light-text.png" class="light-logo" alt="homepage" />
                            </span>
                        </a>
                    </div>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)"
                        data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i
                            class="ti-more"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-left mr-auto ml-3 pl-1">
                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-right">
                        <!-- <li class="nav-item d-none d-md-block">
                            <a class="nav-link" href="javascript:void(0)">
                                <form>
                                    <div class="customize-input">
                                        <input class="form-control custom-shadow custom-radius border-0 bg-white"
                                            type="search" placeholder="Search" aria-label="Search">
                                        <i class="form-control-icon" data-feather="search"></i>
                                    </div>
                                </form>
                            </a>
                        </li> -->
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <?php
                                $getdata = $this->Main_model->getSelectedData('user a', 'a.*', array('a.id'=>$this->session->userdata('id')))->row();
                                if($getdata->photo==NULL){
                                    echo'<img class="rounded-circle" width="40" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">';
                                }else{
                                    $foto = base_url().'data_upload/photo_profile/'.$getdata->photo;
                                    echo'<img class="rounded-circle" width="40" src="'.$foto.'">';
                                }
                                ?>
                                <span class="ml-2 d-none d-lg-inline-block"><span>Hello,</span> <span
                                        class="text-dark"><?= $getdata->fullname; ?></span> <i data-feather="chevron-down"
                                        class="svg-icon"></i></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                                <a class="dropdown-item" href="<?php echo site_url('admin_side/profil'); ?>"><i data-feather="user"
                                        class="svg-icon mr-2 ml-1"></i>
                                    My Profile</a>
                                <!-- <a class="dropdown-item" href="javascript:void(0)"><i data-feather="credit-card"
                                        class="svg-icon mr-2 ml-1"></i>
                                    My Balance</a>
                                <a class="dropdown-item" href="javascript:void(0)"><i data-feather="mail"
                                        class="svg-icon mr-2 ml-1"></i>
                                    Inbox</a> -->
                                <div class="dropdown-divider"></div>
                                <!-- <a class="dropdown-item" href="javascript:void(0)"><i data-feather="settings"
                                        class="svg-icon mr-2 ml-1"></i>
                                    Account Setting</a>
                                <div class="dropdown-divider"></div> -->
                                <a class="dropdown-item" href="<?php echo site_url('admin/App/logout'); ?>"><i data-feather="power"
                                        class="svg-icon mr-2 ml-1"></i>
                                    Logout</a>
                                <!-- <div class="dropdown-divider"></div>
                                <div class="pl-4 p-3"><a href="javascript:void(0)" class="btn btn-sm btn-info">View
                                        Profile</a></div> -->
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar" data-sidebarbg="skin6">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="<?php echo site_url('admin_side/beranda'); ?>"
                                aria-expanded="false"><i data-feather="home" class="feather-icon"></i><span
                                    class="hide-menu">Dashboard</span></a></li>
                        <li class="list-divider"></li>
                        <!-- <li class="nav-small-cap"><span class="hide-menu">Components</span></li> -->
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                                aria-expanded="false"><i data-feather="grid" class="feather-icon"></i><span
                                    class="hide-menu">Master </span></a>
                            <ul aria-expanded="false" class="collapse  first-level base-level-line">
                                <li class="sidebar-item"><a href="<?php echo site_url('admin_side/administrator'); ?>" class="sidebar-link"><span
                                            class="hide-menu"> Administrator
                                        </span></a>
                                </li>
                                <li class="sidebar-item"><a href="<?php echo site_url('admin_side/subscriber'); ?>" class="sidebar-link"><span
                                            class="hide-menu"> Subscriber
                                        </span></a>
                                </li>
                                <li class="sidebar-item"><a href="<?php echo site_url('admin_side/kritik_saran'); ?>" class="sidebar-link"><span
                                            class="hide-menu"> Critics and Suggestions
                                        </span></a>
                                </li>
                                <hr>
                                <li class="sidebar-item"><a href="<?php echo site_url('admin_side/kategori_berita'); ?>" class="sidebar-link"><span
                                            class="hide-menu"> Category of News
                                        </span></a>
                                </li>
                                <li class="sidebar-item"><a href="<?php echo site_url('admin_side/berita'); ?>" class="sidebar-link"><span
                                            class="hide-menu"> News
                                        </span></a>
                                </li>
                                <li class="sidebar-item"><a href="<?php echo site_url('admin_side/komen_berita'); ?>" class="sidebar-link"><span
                                            class="hide-menu"> Comments
                                        </span></a>
                                </li>
                                <li class="sidebar-item"><a href="<?php echo site_url('admin_side/event'); ?>" class="sidebar-link"><span
                                            class="hide-menu"> Event
                                        </span></a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                                aria-expanded="false"><i class="icon-settings"></i><span
                                    class="hide-menu">Setting </span></a>
                            <ul aria-expanded="false" class="collapse  first-level base-level-line">
                                <li class="sidebar-item"><a href="<?php echo site_url('admin_side/iklan'); ?>" class="sidebar-link"><span
                                            class="hide-menu"> Ads
                                        </span></a>
                                </li>
                                <li class="sidebar-item"><a href="<?php echo site_url('admin_side/slider'); ?>" class="sidebar-link"><span
                                            class="hide-menu"> Slider
                                        </span></a>
                                </li>
                                <li class="sidebar-item"><a href="<?php echo site_url('admin_side/cover'); ?>" class="sidebar-link"><span
                                            class="hide-menu">
                                            Cover Image
                                        </span></a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="<?php echo site_url('admin_side/log_aktifitas'); ?>"
                                aria-expanded="false"><i data-feather="sidebar" class="feather-icon"></i><span
                                    class="hide-menu">Log Activity
                                </span></a>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link" href="<?php echo site_url('admin_side/tentang_aplikasi'); ?>"
                                aria-expanded="false"><i data-feather="tag" class="feather-icon"></i><span
                                    class="hide-menu">About Application
                                </span></a>
                        </li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            