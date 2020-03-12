<?php 
$this->load->model('Admin_model');
$admin_id = $products_desc->admin_id;
$shop_det = $this->Admin_model->get_business_details($admin_id);

/*echo "<pre>";
print_r($shop_det);die();*/

$whatsappnumber =$products_desc->CountryCode.$products_desc->mobile_number;
$whatsappnumberremovespecial = preg_replace('/[^A-Za-z0-9\-]/', '', $whatsappnumber);
$product_name = $products_desc->product_name;
$price = $products_desc->product_price;
$currency = $products_desc->product_quantity;
$whatsappmessage = 'I Want To By'." " . $product_name ." " . 'Which Price is' ." " .$currency. " " .$price .'';

//print_r($shop_det); die;
?>  


<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <title><?=$shop_det->shop_name?> | Product</title>

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
         color: <?= $shop_det->header_txt_color?>;
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
         background:<?= $shop_det->button_color?>;
         color:<?= $shop_det->button_txt_color?> !important;
         text-decoration: none;
         border-radius: 51px;
      }
      .footerContact{
         float: left;
         color: #fff;
      }
      .footerContact p, .footerContact span, .footerContact h5, .footCopyright{
         color: <?=$shop_det->footer_txt_color?> !important;
      }
      .footerContact p{
         text-align: center;
      }
      .footerSocial{
         clear: both;
         padding-bottom: 20px;
      }
      footer{
         background-color: <?=$shop_det->footer_color?>!important;
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
         color: <?= $shop_det->footer_social_color?> !important;
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
      .productDesc{
        text-align: center;
      }
      .productImg{
        width: 500px;
        margin: 0 auto;
      }
      .productTitle {
          font-size: 30px;
          padding: 20px;
      }
      @media only screen and (max-width: 768px) {
        .oneProducts{
            width: 50%;
            padding-bottom: 40px;
         }
      }
   </style>

<body class="body">

<!-- <header>
   <nav id="nav-wrap" style=" background-color: <?=$shop_det->header_color?>!important;text-align: center; ">
      <div class="container">
         <a href="<?=site_url('/shop/index/').$shop_det->shop_name?>">
            <img src="<?=base_url('shop/shop_image/').$shop_det->Business_logo;?>" style="height: 80px;  margin-top: 7px;">
         </a>
      </div>
   </nav>
</header> -->

<header>
   <nav id="nav-wrap" style=" background-color: <?=$shop_det->header_color?>!important;">
      <div class="container">
         <div class="shopLogo col-md-2" style="width: 20%">
            <a href="<?=site_url('/shop/index/').$shop_det->shop_name?>">
               <img src="<?=base_url('shop/shop_image/').$shop_det->Business_logo;?>">
            </a>
         </div>

         <div class="shopTitle col-md-10" style="width: 80%">
            <h1><?=$shop_det->Business_Name?></h1>
         </div>
         
      </div>
   </nav>
</header>

<section class="homeSection">
  <div class="col-md-12 allProducts">
    <div style="width: 100%;" class="productImg section content">
      <img alt="" style="width: 100%; max-width: 500px;" src="<?=base_url('/shop/product_images/').$products_desc->product_image?>" >
    </div>
    <h5 class="productTitle"><?=$products_desc->product_name?></h5>
    <h5 style="color: <?= $shop_det->button_color; ?>" ><?php if($products_desc->product_quantity == 'NGN'){ echo "N"; } ?><?=number_format($products_desc->product_price,2)?></h5>
    <p class="productDesc"><?=$products_desc->product_description?> </p>   

    <div class="whatsAppBtn col-md-12">
      <a style="background-color: <?=$shop_det->button_color?>;color:<?= $shop_det->button_txt_color?> !important;" href="javascript:void(0)" onclick="whatsAppEnquiry()" class="button greenBtn">Buy</a>
    </div>

    <div class="viewAllBtn col-md-12">
        <a href="<?php echo site_url('shop/shop')."/".$shop_det->shop_name;?>" class="button prdctBtn">
            View All Products <span style="background-color: <?= $shop_det->button_color; ?>" ><i class="fa fa-angle-right"></i></span>
        </a>
    </div>

  </div>  
</section>

<footer  class="text-center" >
   <div class="col-md-12">
      
      <div class="col-md-4 footerContact">
         <div class="icon">
            <span class="fa fa-home rest"></span>
         </div>
         <div class="contact-details">
            <h5> <?php echo $shop_det->address1 ;?> </h5>
            <p>
                <?php echo $shop_det->address2 ;?> 
            </p>
         </div>
      </div> 

      <div class="col-md-4 footerContact">
         <div class="icon">
            <span class="fa fa-phone rest"></span>
         </div>
         <div class="contact-details">
            <a href="tel:+ <?php echo $shop_det->CountryCode ;?>-<?php echo $shop_det->mobile_number ;?>"><h5>+ <?php echo $shop_det->CountryCode ;?>-<?php echo $shop_det->mobile_number ;?> </h5></a>
            <p>Mon to Fri 9am to 6 pm</p>
         </div>
      </div>

      <div class="col-md-4 footerContact">
         <div class="icon">
            <span class="fa fa-envelope rest"></span>
         </div>
         <div class="contact-details">
            <a href="mailto:<?php echo $shop_det->email_id ;?>"><h5><?php echo $shop_det->email_id ;?></h5>
            <p>Send us your Query any times</p>
         </div>
      </div> 

   </div>
   <div class="col-md-12 footerSocial">      
      <ul class="social-links">
         <li><a href="<?=$shop_det->facebook?>" target="_blank"  ><i class="fa fa-facebook "></i></a></li>
         <li><a href="<?=$shop_det->instagram?>" target="_blank"  ><i class="fa fa-instagram "></i></a></li>
         <li><a href="<?=$shop_det->tweeter?>" target="_blank"  ><i class="fa fa-twitter "></i></a></li>
         <li><a href="<?=$shop_det->youtube?>" target="_blank"  ><i class="fa fa-youtube "></i></a></li>
       </ul>
   </div> 

   <div class="footCopyright">
      &copy; Copyright <?php echo date('Y'); ?> Wustomers. All rights reserved.
   </div>

</footer>



</body>
</html>

<script type="text/javascript">
  function whatsAppEnquiry(){

    var thisUri = '<?=$shop_det->shop_name?>';
    var enquireUri = 'https://api.whatsapp.com/send?phone=<?php echo $whatsappnumberremovespecial ?>&text=<?php echo $whatsappmessage?>';

    $.ajax({
      method:"POST",
      data:{ uri:thisUri },  
      url: "<?php echo site_url('ajax/addEnquiryCount')?>",
      success: function(data) {
         if(data == 1){
            window.location.href=enquireUri;
         }
       }
    });          
  }
</script>  
                  

