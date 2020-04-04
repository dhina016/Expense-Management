<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/vendor/bootstrap/css/bootstrap.min.css'); ?>">
    <link href="<?php echo base_url('assets/vendor/fonts/circular-std/style.css'); ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('assets/libs/css/style.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/vendor/fonts/fontawesome/css/fontawesome-all.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/vendor/charts/chartist-bundle/chartist.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/vendor/charts/morris-bundle/morris.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/vendor/charts/c3charts/c3.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/vendor/fonts/flag-icon-css/flag-icon.min.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/vendor/datatables/css/dataTables.bootstrap4.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/vendor/datatables/css/buttons.bootstrap4.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/vendor/datatables/css/select.bootstrap4.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/vendor/datatables/css/fixedHeader.bootstrap4.css'); ?>">
    
    <!-- jquery 3.3.1 -->
    <script src="<?php echo base_url('assets/vendor/jquery/jquery-3.3.1.min.js'); ?>"></script>
    <!-- bootstap bundle js -->
    <script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.bundle.js'); ?>"></script>
    <title>SoCalled</title>
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
        <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
        <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
                <a class="navbar-brand" href="index.html">SOCALLED</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">
                        <li class="nav-item dropdown nav-user">
                            <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="<?php echo base_url('assets/images/admin.png'); ?>" alt="" class="user-avatar-md rounded-circle"></a>
                            <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                                <div class="nav-user-info">
                                    <h5 class="mb-0 text-white nav-user-name"><?php echo ucfirst($this->session->userdata('username')); ?> </h5>
                                    <span class="status"></span><span class="ml-2">Available</span>
                                </div>
                                <a class="dropdown-item" href="<?php echo base_url('settings'); ?>"><i class="fas fa-cog mr-2"></i>Setting</a>
                                <a class="dropdown-item" href="<?php echo base_url('dashboard/logout'); ?>"><i class="fas fa-power-off mr-2"></i>Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- ============================================================== -->
        <!-- end navbar -->