<!DOCTYPE html>
<html lang="en">
     <head>
          <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
          <meta charset="utf-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <meta name="apple-mobile-web-app-capable" content="yes">
          <meta name="apple-mobile-web-app-status-bar-style" content="black">
          <meta name="apple-mobile-web-app-title" content="Template PWA">
          <link rel="apple-touch-icon" href="<?=base_url('/assets/pwa/');?>images/icons/icon-152x152.png">
          <meta name="msapplication-TileImage" content="<?=base_url('/assets/pwa/');?>images/icons/icon-144x144.png">
          <meta name="msapplication-TileColor" content="#2F3BA2">
          <?php 
               $this->load->model('Admin_model');
               $admin_id = $this->session->userdata('admin_id');
               $shop_det = $this->Admin_model->get_business_details($admin_id);
               $pro_det = $this->Admin_model->get_all_products_detail($admin_id);
               // print_r($pro_det);
               ?>
          <title><?php print_r($shop_det->shop_name);?> </title>
          <link rel="icon" href="images/favicon.ico" type="image/ico" />
          <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
          <!-- Bootstrap -->
          <link href="<?php echo base_url('assets/vendors/bootstrap/dist/css/bootstrap.min.css');?>" rel="stylesheet">
          <!-- Font Awesome -->
          <link href="<?php echo base_url();?>assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
          <!-- NProgress -->
          <link href="<?php echo base_url();?>assets/vendors/nprogress/nprogress.css" rel="stylesheet">
          <link href="<?php echo base_url('/assets/parsley/');?>parsley.css" rel="stylesheet">
          <!-- iCheck -->
          <link href="<?php echo base_url();?>assets/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
          <!-- bootstrap-progressbar -->
          <link href="<?php echo base_url();?>assets/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
          <!-- JQVMap -->
          <link href="<?php echo base_url();?>assets/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet" />
          <!-- bootstrap-daterangepicker -->
          <link href="<?php echo base_url();?>assets/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
          <!-- Custom Theme Style -->
          <link href="<?php echo base_url();?>assets/build/css/custom.min.css" rel="stylesheet">
          <!-- datatable -->
          <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.13/datatables.min.css" />
          <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css" />
          <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
          <!--     <link rel="stylesheet" type="text/css" href="<?=base_url('/assets/pwa/');?>styles/materialize.css">
               -->    
          <link rel="stylesheet" type="text/css" href="<?=base_url('/assets/pwa/');?>styles/style.css">
          <link rel="manifest" href="<?= base_url();?>/manifest.json">
          <!-- Add to home screen for Safari on iOS -->
          <link rel="icon" type="image/png" href="<?=base_url('/assets/pwa/');?>images/icons/icon-144x144.png">
          <style type="text/css">
               .menu_section > ul {
               margin-top: 5px;
               }
               .nav_title{
               background:#000;
               }
               .profile_info {
               padding: 0px 0px 00px;  
               }
               .img-circle.profile_img {
               margin-top: 5px;
               width: 55%;
               padding:2px;
               }    
               @media screen and (max-width: 768px){
               .nav.toggle {
               display: block;
               }
               }
          </style>
          <script>
               var base_url = '<?php echo base_url() ;?>';
          </script>
     </head>
     <body class="nav-md">
          <div class="container body">
          <div class="main_container">
          <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;">
               <div class="profile clearfix">
                    <div class="profile_pic">
                         <img src="<?=base_url('/shop/shop_image/').$shop_det->Business_logo?>" alt="..." class="img-circle profile_img">
                    </div>
                    <div class="profile_info">
                         <h4 style="color: #fff;" >Welcome <?=$shop_det->admin_name ;?></h4>
                    </div>
               </div>
          </div>
          <div class="clearfix"></div>
          <!-- menu profile quick info -->
          <!-- /menu profile quick info -->
          <!-- sidebar menu -->
          <!-- sidebar menu -->
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
               <div class="menu_section">
                    <ul class="nav side-menu">
                         <!-- <li><a href="<?php echo site_url('admin/dashboard') ?>"><i class="fa fa-home"></i> Dashbord </a></li> -->
                         <li><a href="<?php echo site_url('admin/products_entry') ?>"><i class="fa fa-plus-circle"></i> Add Products </a> </li>
                         <li><a href="<?php echo site_url('admin/all_producs') ?>"><i class="fa fa-table"></i> View Products </a> </li>
                         <li><a href="<?php echo site_url('admin/update_shop_details') ?>"><i class="fa fa-building-o"></i> Update Shop Details </a></li>
                         <li><a href="<?php echo site_url('admin/chnagenumber') ?>"><i class="fa fa-whatsapp" aria-hidden="true"></i> Update Whatsapp Number</a></li>
                         <li><a href="<?php echo site_url('admin/chnagepassword') ?>"><i class="fa fa-key"></i> Update Password </a></li>
                         <li><a href="<?php echo site_url('admin/shop_style') ?>"><i class="fa fa-magic"></i></i>Shop Design </a></li>
                         <?php  if ($pro_det != '0' || $pro_det != '' ) { ?>
                         <li><a class="alert alert-info" onclick="myFunction()" ><i class="fa fa-copy"></i> Copy Shop </a></li>
                         <?php } ?>



                         <?php if($shop_det->payment_status == '1'){ ?>
                              <li>
                                   <a class="alert alert-success" ><i class="fa fa-money"></i> Subscribed </a>
                              </li>
                         <?php }else{ ?>
                              <li>
                                   <a href="https://paystack.com/pay/pricing-wustomers">
                                        <i class="fa fa-money"></i> Pro Features
                                   </a>
                              </li>
                              <!-- <li><a href="<?php echo site_url('paystack/paystack_standard'); ?>"> <i class="fa fa-money"></i>Please Subscribe </a></li> -->
                         <?php } ?>



                         <li>
                              <input type="text" readonly="" value="<?=$shop_det->admin_link;?>" id="myInput" class="alert alert-success" style="font-size: 1px; background: transparent; color: transparent; border:none;"  > 
                         </li>
                    </ul>
               </div>
          </div>
          <!-- /sidebar menu -->
          <script>
               function myFunction() {
               
                 var copyText = document.getElementById("myInput");
                 copyText.select();
                 document.execCommand("copy");
                 alert("Copied the text: " + copyText.value);
               }
          </script>