<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="images/favicon.ico" type="image/ico" />

    <title>Super Admin </title>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <!-- Bootstrap -->
    <link href="<?php echo base_url('assets/vendors/bootstrap/dist/css/bootstrap.min.css');?>" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url();?>assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo base_url();?>assets/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="<?php echo base_url();?>assets/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
	
    <!-- bootstrap-progressbar -->
    <link href="<?php echo base_url();?>assets/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="<?php echo base_url();?>assets/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="<?php echo base_url();?>assets/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php echo base_url();?>assets/build/css/custom.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/build/css/customStyle.css" rel="stylesheet">


    <!-- datatable -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.13/datatables.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css" />
    
    <!-- SWEET ALERT -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    
    <script>
      var base_url = '<?php echo base_url() ;?>' ;
    </script>
    <style type="text/css">
      @media only screen and (max-width: 768px) {
        .nav.toggle {
           display: block;
        }
        .toggle {
          width: 30px;
        }
        nav img{
          margin-left: -30px;
        }
        .card {
          width: 100% !important;
        }
      }
    </style>
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a class="site_title" href="<?php echo site_url('superadmin/dashboard') ?>"><!-- <i class="fa fa-paw"></i>  --><span>ADMIN</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <!--
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="images/img.jpg" alt="..." class="img-circle profile_img">
              </div>
      
              <div class="profile_info">
                <span>Welcome</span>
                <h2><?php if($this->session->userdata('user_name')){
                      echo $this->session->userdata('user_name');
                    }?></h2>
              </div>
            </div>
            -->
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                
                <ul class="nav side-menu">
                 <!-- <li><a href="<?php echo site_url('superadmin/dashboard') ?>"><i class="fa fa-home"></i> DASHBOARD </a>-->
                    
                  </li>
                  <li><a href="<?php echo site_url('superadmin/admin_registration') ?>"><i class="fa fa-plus"></i> CREATE NEW STORE</a>
                    
                  </li>
                  <li><a href="<?php echo site_url('superadmin/all_admins') ?>"><i class="fa fa-edit"></i> VIEW ALL STORES</a>

                  <li><a href="<?php echo site_url('superadmin/analytics') ?>"><i class="fa fa-edit"></i> ANALYTICS </a>
                  <li><a href="<?php echo site_url('superadmin/logout') ?>"><i class="fa fa-user"></i> LOGOUT </a>
                    
                  </li>
                <!--   <li><a href="<?php echo site_url('superadmin/all_suspend_user_detail') ?>"><i class="fa fa-desktop"></i> Suspended Users</a>
                    
                  </li> -->
                  <!--  <li><a href="<?php echo site_url('superadmin/direct_cost'); ?>"><i class="fa fa-bar-chart-o"></i>Direct Cost</a>
                    </li>

                    <li><a href="<?php echo site_url('superadmin/indirect_cost'); ?>"><i class="fa fa-bar-chart-o"></i>Indirect cost</a>
                    </li> -->
                  
                </ul>
              </div>
              

            </div>
            <!-- /sidebar menu -->