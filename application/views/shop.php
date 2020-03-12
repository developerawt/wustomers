<?php
$admin_id = $detail['admin_id'];
$shop_det = $this->Admin_model->get_business_details($admin_id);
?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <title><?=$products[0]->shop_name?> | Shop</title>
      <link rel="icon" href="<?=base_url('shop/shop_image/').$shop_det->Business_logo;?>">
      <meta name="description" content="">
      <meta name="author" content="">
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
      
      <link rel="stylesheet" type="text/css" href="<?=base_url('/assets/temp1/');?>css/css/bootstrap.min.css">
      <link rel="stylesheet" href="<?=base_url('/assets/temp1/');?>css/default.css">
      <link rel="stylesheet" href="<?=base_url('/assets/temp1/');?>css/layout.css">
      <link rel="stylesheet" href="<?=base_url('/assets/temp1/');?>css/media-queries.css">
      <link rel="stylesheet" href="<?=base_url('/assets/temp1/');?>css/magnific-popup.css">
      <!--
      <link rel="stylesheet" href="<?=base_url('/assets/temp1/');?>assets/owlcarousel/assets/owl.carousel.min.css">
      <link rel="stylesheet" href="<?=base_url();?>assets/owlcarousel/assets/owl.theme.default.min.css">
      -->
      <link rel="stylesheet" type="text/css" href="<?=base_url('/assets/temp1/');?>style.css">

      <!-- Jquery -->
      <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
   </head>
   
   <?php  
      $whatsappnumber =$products[0]->CountryCode.$products[0]->mobile_number;
      $whatsappnumberremovespecial = preg_replace("/[^A-Za-z0-9\-]/", "", $whatsappnumber);
   ?> 

   <style type="text/css">
      body{
         font-family: 'Roboto';
      }
      #nav-wrap .container {
          width: 100%;
          padding-right: 0px;
          padding-left: 0px;
          margin-right: 5px;
          margin-left: 5px;
      }
      .shopLogo img{
         width: 80px;
         height: 80px;
         margin-top: 7px;
         border-radius: 50%;
      }
      .shopLogo, .shopTitle{
         float: left;
      }
      .shopTitle{
         text-align: center;
      }
      .shopTitle h1{
         margin-top: 20px;
         color: <?= $products[0]->header_txt_color?>;
      }
      .homeSection{
         text-align: center;
         width:98%;
         margin: 0 auto;
      }
      .shopName h1 {
         color: 
         #000;
         font-size: 35px;
         font-family: 'Roboto Slab', serif;
         text-align: center;
         margin: 20px 0px;
         font-weight: 700;
      }
      .shopDesc p {
         text-align: center;
         width: 95%;
         margin: 20px auto;
         line-height: 1.5;
         font-size: 18px;
         font-family: 'Roboto';
      }
      .greenBtn{
         background:#00E22B;
         border-radius: 51px;
         font-size: 20px;
         font-family: 'Roboto';
         font-weight: 600;
      }
      .prdctBtn{
         background:transparent;
         font-size: 20px;
         font-family: 'Roboto';
         color: #000 !important;
         font-weight: 600;
      }
      .viewAllBtn span {
         background: #00e22b;
         color:#000;
         padding: 0px 15px;
         border-radius: 50%;
         font-size: 35px;
         margin-left: 20px;
      }
      .whatsAppBtn, .viewAllBtn{
         padding: 20px;
      }

      .button:hover{
         background:#00E22B;
         color:#fff !important;
         text-decoration: none;
         border-radius: 51px;
      }
      .footerContact{
         float: left;
         color: #fff;
      }
      .footerContact p, .footerContact span, .footerContact h5, .footCopyright{
         color: <?= $products[0]->footer_txt_color?> !important;
      }
      .footerContact p{
         text-align: center;
      }
      .footerSocial{
         clear: both;
         padding-bottom: 20px;
      }
      footer{
         background-color: <?=$products[0]->footer_color?>!important;
         border-radius: 0px;
      }
      footer .social-links {
         padding: 7px;
         font-size: 30px;
         width: 370px;
         margin: 0 auto;
         background: #fff;
         border-radius: 50px;
      }
      footer a, footer a:visited, footer a:hover {
         color: <?= $products[0]->footer_social_color?> !important;
         font-size: 25px;
         text-decoration: none;
      }
      .oneProducts{
         float: left;
      }
      .allProducts{
         overflow: auto;
         padding-bottom: 40px;
      }
      .shopHeading{
         color: #000;
         text-transform: uppercase;
      }
      @media only screen and (max-width: 768px) {
        .oneProducts{
            width: 50%;
            padding-bottom: 40px;
         }
      }
   </style>

<body class="body">

<header>
   <nav id="nav-wrap" style=" background-color: <?=$products[0]->header_color?>!important;">
      <div class="container">
         <div class="shopLogo col-md-2">
            <a href="<?=site_url('/shop/index/').$products[0]->shop_name?>">
               <img src="<?=base_url('shop/shop_image/').$products[0]->Business_logo;?>">
            </a>
         </div>

         <div class="shopTitle col-md-10">
            <h1><?=$products[0]->Business_Name?></h1>
         </div>
         
      </div>
   </nav>
</header>

<section class="homeSection">
   <div class="col-md-12">
      <div class="shopName col-md-12">
         <p class="shopHeading"><?=$products[0]->Business_deal_heading?></p>
      </div>
   </div> 

   <div class="col-md-12 allProducts">
      <?php 
         if (is_array($products_shop)|| is_object($products_shop)){
            $i = 1 ; 
            //echo"<pre>"; print_r($products_shop);
            foreach ($products_shop as $oneProduct){  ?>
               <div class="col-md-3 oneProducts">
                  <a  href="<?php echo site_url("shop/description")."/".$oneProduct->product_name."/".$oneProduct->shop_name."/".$oneProduct->product_id ?>" target="_blank" title="">
                     <img alt="" style="width: 100%;" src="<?php echo base_url("shop/product_images/").$oneProduct->product_image  ?>" >
                     <h5><?=$oneProduct->product_name?></h5>
                     <h5 style="color: <?= $shop_det->button_color; ?>"><?php if($oneProduct->product_quantity == 'NGN'){ echo "N"; } ?><?=$oneProduct->product_price?></h5>
                  </a>
               </div>
      <?php 
            }
         }else{ 
      ?>
       <p style="color:red;font-size: 18px;text-align:center;">No Product Found..</p>           
      <?php } ?>   
   </div>  
</section>

<footer  class="text-center" >
   <div class="col-md-12">
      
      <div class="col-md-4 footerContact">
         <div class="icon">
            <span class="fa fa-home rest"></span>
         </div>
         <div class="contact-details">
            <h5> <?php echo $products[0]->address1 ;?> </h5>
            <p>
                <?php echo $products[0]->address2 ;?> 
            </p>
         </div>
      </div> 

      <div class="col-md-4 footerContact">
         <div class="icon">
            <span class="fa fa-phone rest"></span>
         </div>
         <div class="contact-details">
            <a href="tel:+ <?php echo $products[0]->CountryCode ;?>-<?php echo $products[0]->mobile_number ;?>"><h5>+ <?php echo $products[0]->CountryCode ;?>-<?php echo $products[0]->mobile_number ;?> </h5></a>
            <p>Mon to Fri 9am to 6 pm</p>
         </div>
      </div>

      <div class="col-md-4 footerContact">
         <div class="icon">
            <span class="fa fa-envelope rest"></span>
         </div>
         <div class="contact-details">
            <a href="mailto:<?php echo $products[0]->email_id ;?>"><h5><?php echo $products[0]->email_id ;?></h5>
            <p>Send us your Query any times</p>
         </div>
      </div> 

   </div>
   <div class="col-md-12 footerSocial">      
      <ul class="social-links">
         <li><a href="<?=$products[0]->facebook?>" target="_blank"  ><i class="fa fa-facebook "></i></a></li>
         <li><a href="<?=$products[0]->instagram?>" target="_blank"  ><i class="fa fa-instagram "></i></a></li>
         <li><a href="<?=$products[0]->tweeter?>" target="_blank"  ><i class="fa fa-twitter "></i></a></li>
         <li><a href="<?=$products[0]->youtube?>" target="_blank"  ><i class="fa fa-youtube "></i></a></li>
       </ul>
   </div> 

   <div class="footCopyright">
      &copy; Copyright <?php echo date('Y'); ?> Wustomers. All rights reserved.
   </div>

</footer>






</body>
</html>

<script type="text/javascript">

</script>