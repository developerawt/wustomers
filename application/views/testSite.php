<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <title><?=$products[0]->shop_name?></title>
      <link rel="icon" href="<?=base_url('shop/shop_image/').$products[0]->Business_logo;?>">
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
         background:<?= $products[0]->button_color?>;
         color:<?= $products[0]->button_txt_color?> !important;
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

      <div class="shopImage col-md-12">
         <img style="width: 25%;" src="<?=base_url('/shop/shop_business/').$products[0]->background_image;?>">
      </div>

      <div class="shopName col-md-12">
         <h1><?=$products[0]->Business_deal_heading?></h1>
      </div>

      <div class="shopDesc col-md-12">
         <p><?=$products[0]->Short_Description?></p>
      </div>

      <div class="whatsAppBtn col-md-12">
         <a style="background-color: <?=$products[0]->button_color?>!important; color:<?= $products[0]->button_txt_color?> !important;" href="javascript:void(0)" onclick="whatsAppEnquiry()" class="button greenBtn">Contact us on WhatsApp</a>
      </div>

      <div class="viewAllBtn col-md-12">
         <a href="<?php echo site_url('shop/shop')."/".$products[0]->shop_name;?>" class="button prdctBtn">
            View All Products <span style="background-color: <?= $products[0]->button_color?>!important;" ><i class="fa fa-angle-right"></i></span>
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

   var thisUri = '<?php echo $uri = $this->uri->segment(3); ?>';
   if(localStorage.getItem('vistorCount') === null || localStorage.getItem('vistorCount') == undefined) {
    
      console.log('New Visitor Creating...');
      let vistorCount = [
        {
          visited: thisUri
        }, 
      ];

      localStorage.setItem('vistorCount', JSON.stringify(vistorCount));
      addVisitCount(thisUri);
   
   }else{

      let newVisit = { visited: thisUri }
      
      let vistorCount = JSON.parse(localStorage.getItem('vistorCount'));
      
      var checkVisit = false;
      
      for(let i = 0; i <vistorCount.length; i++) {
         if(vistorCount[i].visited == thisUri) {
           checkVisit = true;
           break;
         }    
      }
      if(checkVisit == true){
         console.log('Old visitor');
      }
      if(checkVisit == false){
         vistorCount.push(newVisit);
         // Set New Visit
         localStorage.setItem('vistorCount', JSON.stringify(vistorCount));
         addVisitCount(thisUri);
      }
      

   }


function addVisitCount(uri){
    
    $.ajax({
      method:"POST",
      data:{ uri:uri },  
      url: "<?php echo site_url('ajax/addVisitCount')?>",
      success: function(data) {
         if(data == 1){
            console.log('Visit count added');
         }
       }
    });          
}


function whatsAppEnquiry(){

   var thisUri = '<?php echo $uri = $this->uri->segment(3); ?>';
   var enquireUri = 'https://api.whatsapp.com/send?phone=<?php echo $whatsappnumberremovespecial ?>&text=<?php echo "Hello, I am interested in your product/services"?>';

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