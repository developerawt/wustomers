  <!DOCTYPE html>
 
       <html class="no-js" lang="en">
         <!--<![endif]-->
         <head>
            <!--- Basic Page Needs
               ================================================== -->
            <meta charset="utf-8">
            <title><?=$products[0]->shop_name?></title>
            <meta name="description" content="">
            <meta name="author" content="">
            <!-- Mobile Specific Metas
               ================================================== -->
            <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
            <!-- CSS
               ================================================== -->
            <link rel="stylesheet" type="text/css" href="<?=base_url('/assets/temp1/');?>css/css/bootstrap.min.css">
            <link rel="stylesheet" href="<?=base_url('/assets/temp1/');?>css/default.css">
            <link rel="stylesheet" href="<?=base_url('/assets/temp1/');?>css/layout.css">
            <link rel="stylesheet" href="<?=base_url('/assets/temp1/');?>css/media-queries.css">
            <link rel="stylesheet" href="<?=base_url('/assets/temp1/');?>css/magnific-popup.css">
            <!--<link rel="stylesheet" href="<?=base_url('/assets/temp1/');?>assets/owlcarousel/assets/owl.carousel.min.css">
             <link rel="stylesheet" href="<?=base_url();?>assets/owlcarousel/assets/owl.theme.default.min.css">
             --><link rel="stylesheet" type="text/css" href="<?=base_url('/assets/temp1/');?>style.css">
            <script src="<?=base_url('/assets/temp1/');?>js/modernizr.js"></script>
            <style type="text/css">
               .p-head{
                  font-size: 50px;
               }
            </style>
         </head>
         <?php  $whatsappnumber =$products[0]->CountryCode.$products[0]->mobile_number;
            $whatsappnumberremovespecial = preg_replace("/[^A-Za-z0-9\-]/", "", $whatsappnumber);
           ?> 
         <body>
            <!-- Header
               ================================================== -->
            <header id="home" style=" background-image: url('<?=base_url('/shop/shop_business/').$products[0]->background_image;?>');" >
               <nav id="nav-wrap" style=" background-color: <?=$products[0]->header_color?>!important;text-align: center; ">
                  <div class="container">
                     <a href="<?=site_url('/shop/index/').$products[0]->shop_name?>">
                  <img src="<?=base_url("shop/shop_image/").$products[0]->Business_logo;?>" style="height: 80px;  margin-top: 7px;"></a>
                 <!--  <a style="color: white; text-decoration: none;" href="<?php echo site_url('/admin/login');?>"><button class="float-right" style="border-radius: 30px; margin-top: 13px; color: white;"> Sign In </button></a> -->
               </div>
               </nav>
               <!-- end #nav-wrap -->
               <div class="row banner">
                  <div class="banner-text">
                    

   <h1 class="big-heading-text"><?=$products[0]->Business_deal_heading?></h1>
                     
                     <h3><?=$products[0]->Short_Description?></a>.</h3>
                     <hr />
                     <ul class="social">
                        <li><a href="<?=$products[0]->facebook?>"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="<?=$products[0]->instagram?>"><i class="fa fa-instagram"></i></a></li>
                        <li><a href="<?=$products[0]->tweeter?>"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="<?=$products[0]->youtube?>"><i class="fa fa-youtube"></i></a></li>
                         
                     </ul>
                    
                  <div class="row">
                     <div class="col-md-3" ></div>
                     



<?php if ($products[0]->payment_status != '0') { ?>
   
      <div class="col-md-3" >
                      <div class="what ">
                       

                     <a href="javascript:void(0)" onclick="whatsAppEnquiry()" class="button">
                        <span   style="margin-left: 25px; color: #fff !important;"> Contact Us<img src="<?=site_url()?>assets/temp1/images/cda3105f8b.png" style="height: 30px; position: absolute; left: 0; top: 0;">
                     </span>
                      </a>
                     
                  </div>
               </div>
                     

                     <div class="col-md-3" >
                        <div class="view-all">
                     <a href="<?php echo site_url('shop/shop')."/".$products[0]->shop_name;?>" class="button" >
                        <span   style="margin-left: 5px; color: #fff !important;"> View All Products                         
                     </span>
                      </a>
                     
                  </div>
               </div>
<?php }else{ ?>
<div class="col-md-1" ></div>

<div class="col-md-3" >
                      <div class="what ">
                       

                     <a href="javascript:void(0)" onclick="whatsAppEnquiry()" class="button">
                        <span   style="margin-left: 25px; color: #fff !important;"> Contact Us<img src="<?=site_url()?>assets/temp1/images/cda3105f8b.png" style="height: 30px; position: absolute; left: 0; top: 0;">
                     </span>
                      </a>
                     
                  </div>
               </div>
<div class="col-md-2" ></div>
 
 <?php } ?>

                      <div class="col-md-3" ></div>
                  </div>
                   
                
                 
               <p class="scrolldown">
                  <a class="smoothscroll" href="#about"><i class="icon-down-circle"></i></a>
               </p>
            </header>
            <!-- Header End -->
            <!-- Portfolio Section
               ================================================== -->
            <section id="portfolio">
               <div class="row">
                  <div class="twelve columns collapsed">
                     <h1>Our Products</h1>

                      <?php 
                  if (is_array($products_shop)|| is_object($products_shop)) {
                           $i = 1 ; 
                        foreach ($products_shop as $products){  ?>

                     <div id="portfolio-wrapper" class="bgrid-quarters s-bgrid-thirds cf">
                        <div class="columns portfolio-item">
                           <!-- <h1></h1> -->
                           <div class="item-wrap">
                             <a  href="<?php echo site_url("shop/description")."/".$products->product_name."/".$products->shop_name."/".$products->product_id ?>" target="_blank" title="">
                                   <img alt="" style="height: 215px; width: 100%;" src="<?php echo base_url("shop/product_images/").$products->product_image  ?>" >
                                 <div class="overlay">
                                     <div class="portfolio-item-meta">
                                       <h5><?=$products->product_name?></h5>
                                       </div>  
                                 </div>
                                 <div class="link-icon"><i class="fa fa-eye"></i></div>
                              </a>
                           </div>
                                <!-- <h1>Information</h1> -->
                        </div>

                         <?php }
                 }else{ ?>
                  
                     <div id="portfolio-wrapper" class="bgrid-quarters s-bgrid-thirds cf">
                        <div class="columns portfolio-item">
                           <!-- <h1></h1> -->
                           <div class="item-wrap">
                              <a href="#modal-01" title="">
                                 <img alt="" src="<?=base_url('/assets/temp1/');?>images/portfolio/coffee.jpg">
                                 <div class="overlay">
                                    <!--  <div class="portfolio-item-meta">
                                       <h5>Coffee</h5>
                                       <p>Illustrration</p>
                                       </div> -->
                                 </div>
                                 <div class="link-icon"><i class="fa fa-eye"></i></div>
                              </a>
                           </div>
                                <!-- <h1>Information</h1> -->
                        </div>
                        <!-- item end -->
                        <div class="columns portfolio-item">
                           <div class="item-wrap">
                              <a href="#modal-02" title="">
                                 <img alt="" src="<?=base_url('/assets/temp1/');?>images/portfolio/console.jpg">
                                 <div class="overlay">
                                    <!-- <div class="portfolio-item-meta">
                                       <h5>Console</h5>
                                       <p>Web Development</p>
                                       </div> -->
                                 </div>
                                 <div class="link-icon"><i class="fa fa-eye"></i></div>
                              </a>
                           </div>
                        </div>
                        <!-- item end -->
                        <div class="columns portfolio-item">
                           <div class="item-wrap">
                              <a href="#modal-03" title="">
                                 <img alt="" src="<?=base_url('/assets/temp1/');?>images/portfolio/judah.jpg">
                                 <div class="overlay">
                                    <!-- <div class="portfolio-item-meta">
                                       <h5>Judah</h5>
                                       <p>Webdesign</p>
                                       </div> -->
                                 </div>
                                 <div class="link-icon"><i class="fa fa-eye"></i></div>
                              </a>
                           </div>
                        </div>
                        <!-- item end -->
                        <div class="columns portfolio-item">
                           <div class="item-wrap">
                              <a href="#modal-04" title="">
                                 <img alt="" src="<?=base_url('/assets/temp1/');?>images/portfolio/into-the-light.jpg">
                                 <div class="overlay">
                                    <!--  <div class="portfolio-item-meta">
                                       <h5>Into The Light</h5>
                                       <p>Photography</p>
                                       </div> -->
                                 </div>
                                 <div class="link-icon"><i class="fa fa-eye"></i></div>
                              </a>
                           </div>
                        </div>
                        <!-- item end -->
                        <div class="columns portfolio-item">
                           <div class="item-wrap">
                              <a href="#modal-05" title="">
                                 <img alt="" src="<?=base_url('/assets/temp1/');?>images/portfolio/farmerboy.jpg">
                                 <div class="overlay">
                                    <!-- <div class="portfolio-item-meta">
                                       <h5>Farmer Boy</h5>
                                       <p>Branding</p>
                                       </div> -->
                                 </div>
                                 <div class="link-icon"><i class="fa fa-eye"></i></div>
                              </a>
                           </div>
                        </div>
                        <!-- item end -->
                        <div class="columns portfolio-item">
                           <div class="item-wrap">
                              <a href="#modal-06" title="">
                                 <img alt="" src="<?=base_url('/assets/temp1/');?>images/portfolio/girl.jpg">
                                 <div class="overlay">
                                    <!--   <div class="portfolio-item-meta">
                                       <h5>Girl</h5>
                                       <p>Photography</p>
                                       </div> -->
                                 </div>
                                 <div class="link-icon"><i class="fa fa-eye"></i></div>
                              </a>
                           </div>

                        </div>
                        <!-- item end -->
                        <div class="columns portfolio-item">
                           <div class="item-wrap">
                              <a href="#modal-07" title="">
                                 <img alt="" src="<?=base_url('/assets/temp1/');?>images/portfolio/origami.jpg">
                                 <div class="overlay">
                                    <!-- <div class="portfolio-item-meta">
                                       <h5>Origami</h5>
                                       <p>Illustrration</p>
                                       </div> -->
                                 </div>
                                 <div class="link-icon"><i class="fa fa-eye"></i></div>
                              </a>
                           </div>
                        </div>
                        <!-- item end -->
                        <div class="columns portfolio-item">
                           <div class="item-wrap">
                              <a href="#modal-08" title="">
                                 <img alt="" src="<?=base_url('/assets/temp1/');?>images/portfolio/retrocam.jpg">
                                 <div class="overlay">
                                    <!--   <div class="portfolio-item-meta">
                                       <h5>Retrocam</h5>
                                       <p>Web Development</p>
                                       </div> -->
                                 </div>
                                 <div class="link-icon"><i class="fa fa-eye"></i></div>
                              </a>
                           </div>
                        </div>
                        <!-- item end -->
                     </div>
                       <?php } ?>
                     <!-- portfolio-wrapper end -->
                  </div>
                  <!-- twelve columns end -->
                  <!-- Modal Popup
                     --------------------------------------------------------------- -->
                   <?php 
                    if (is_array($products_shop)|| is_object($products_shop)) {
                            $i = 1; 
                        foreach ($products_shop as $products){ 
                        $product_name = $products->product_name;
$price = $products->product_price;
$currency = "N";
$want = "I want To Buy";
$which = "Which Price is";
$whatsappmessage = $want." ".$product_name." ".$which." ".$currency. " " .$price ;
                     ?>

                  <div id="modal-01<?php echo $i++ ?>" class="popup-modal mfp-hide">
                      <img class="scale-with-grid" src="<?php echo base_url("shop/product_images/").$products->product_image  ?>" alt="" />  
                     <div class="description-box">
                        <h4><?=$products->product_name?></h4>
                           <p><?=$products->product_name?></p> 
                        <span class="categories"><i class="fa fa-tag"></i> <?=$products->product_price?></span>
                     </div>

                     <div class="link-box">
 
<a href="https://api.whatsapp.com/send?phone=<?php echo $whatsappnumberremovespecial ?>&text=<?php echo $whatsappmessage?>">Purchase On Whatsapp</a>
 
  <a href="<?php echo site_url("admin/product_description")."/".$products->product_id;?>" target="_blank">Details</a>
                        <a class="popup-modal-dismiss">Close</a>
                     </div>
                  </div>
                  <!-- modal-01 End -->

                   <?php } }else{ ?>
                  <div id="modal-03" class="popup-modal mfp-hide">
                     <img class="scale-with-grid" src="<?=base_url('/assets/temp1/');?>images/portfolio/modals/m-judah.jpg" alt="" />
                     <div class="description-box">
                        <h4>Judah</h4>
                        <p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit.</p>
                        <span class="categories"><i class="fa fa-tag"></i>Branding</span>
                     </div>
                     <div class="link-box">
                        <a href="#" target="_blank">Details</a>
                        <a class="popup-modal-dismiss">Close</a>
                     </div>
                  </div>
                  <!-- modal-03 End -->
                  <div id="modal-04" class="popup-modal mfp-hide">
                     <img class="scale-with-grid" src="<?=base_url('/assets/temp1/');?>images/portfolio/modals/m-intothelight.jpg" alt="" />
                     <div class="description-box">
                        <h4>Into the Light</h4>
                        <p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit.</p>
                        <span class="categories"><i class="fa fa-tag"></i>Photography</span>
                     </div>
                     <div class="link-box">
                        <a href="#" target="_blank">Details</a>
                        <a class="popup-modal-dismiss">Close</a>
                     </div>
                  </div>
                  <!-- modal-04 End -->
                  <div id="modal-05" class="popup-modal mfp-hide">
                     <img class="scale-with-grid" src="<?=base_url('/assets/temp1/');?>images/portfolio/modals/m-farmerboy.jpg" alt="" />
                     <div class="description-box">
                        <h4>Farmer Boy</h4>
                        <p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit.</p>
                        <span class="categories"><i class="fa fa-tag"></i>Branding, Webdesign</span>
                     </div>
                     <div class="link-box">
                        <a href="#" target="_blank">Details</a>
                        <a class="popup-modal-dismiss">Close</a>
                     </div>
                  </div>
                  <!-- modal-05 End -->
                  <div id="modal-06" class="popup-modal mfp-hide">
                     <img class="scale-with-grid" src="<?=base_url('/assets/temp1/');?>images/portfolio/modals/m-girl.jpg" alt="" />
                     <div class="description-box">
                        <h4>Girl</h4>
                        <p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit.</p>
                        <span class="categories"><i class="fa fa-tag"></i>Photography</span>
                     </div>
                     <div class="link-box">
                        <a href="#" target="_blank">Details</a>
                        <a class="popup-modal-dismiss">Close</a>
                     </div>
                  </div>
                  <!-- modal-06 End -->
                  <div id="modal-07" class="popup-modal mfp-hide">
                     <img class="scale-with-grid" src="<?=base_url('/assets/temp1/');?>images/portfolio/modals/m-origami.jpg" alt="" />
                     <div class="description-box">
                        <h4>Origami</h4>
                        <p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit.</p>
                        <span class="categories"><i class="fa fa-tag"></i>Branding, Illustration</span>
                     </div>
                     <div class="link-box">
                        <a href="#" target="_blank">Details</a>
                        <a class="popup-modal-dismiss">Close</a>
                     </div>
                  </div>
                  <!-- modal-07 End -->
                  <div id="modal-08" class="popup-modal mfp-hide">
                     <img class="scale-with-grid" src="<?=base_url('/assets/temp1/');?>images/portfolio/modals/m-retrocam.jpg" alt="" />
                     <div class="description-box">
                        <h4>Retrocam</h4>
                        <p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit.</p>
                        <span class="categories"><i class="fa fa-tag"></i>Webdesign, Photography</span>
                     </div>
                     <div class="link-box">
                        <a href="#" target="_blank">Details</a>
                        <a class="popup-modal-dismiss">Close</a>
                     </div>
                  </div>
                     <?php } ?>
                  <!-- modal-01 End -->
               </div>
               <!-- row End -->
            </section>
          <!--     <img alt="" src="<?=base_url('/assets/temp1/');?><?=base_url('/assets/temp1/')?>images/portfolio/retrocam.jpg"> -->
            <!-- Portfolio Section End-->
            <!-- Testimonials Section
               ================================================== -->
         <!-- Section: Testimonials v.2 -->
<!-- Section: Testimonials v.2 -->
            <!-- Testimonials Section End-->
            <!-- Contact Section
               ================================================== -->
             <section id="contact" style="overflow: hidden;" >
               <div class="row">
                  <!-- <div class="map-wrap" style="width:100%; height: 445px;" id="map"></div> -->
                  <div class="col-lg-4 d-flex flex-column address-wrap">
                  </div>
                  <div class="col-lg-4 d-flex flex-column address-wrap">
                     <div class="single-contact-address d-flex flex-row">
                        <div class="icon">
                           <span class="fa fa-home rest" style="color: black;"></span>
                        </div>
                        <div class="contact-details">
                           <h5> <?php echo $products->address1 ;?> </h5>
                           <p>
                               <?php echo $products->address2 ;?> 
                           </p>
                        </div>
                     </div>
                     <div class="single-contact-address d-flex flex-row">
                        <div class="icon">
                           <span class="fa fa-phone rest"></span>
                        </div>
                        <div class="contact-details">
                           <h5>+ <?php echo $products->CountryCode ;?>-<?php echo $products->mobile_number ;?> </h5>
                           <p>Mon to Fri 9am to 6 pm</p>
                        </div>
                     </div>
                     <div class="single-contact-address d-flex flex-row">
                        <div class="icon">
                           <span class="fa fa-envelope rest"></span>
                        </div>
                        <div class="contact-details">
                           <h5><?php echo $products->email_id ;?></h5>
                           <p>Send us your Query any times</p>
                        </div>
                     </div>
                     <div class="single-contact-address d-flex flex-row">
                        <div class="icon">
                         </div>
                       
                        <div class="whatsapp-contact" style="display: none;" >
   <a class="btn btn-success" data-toggle="modal" data-target="#myModal"><img src="<?=site_url()?>assets/temp1/images/cda3105f8b.png"> Contact Us
  </a>
                        </div>
                     </div>
                  </div>
                 
               </div>
            </section>

            <div class="container">
              
 
   <!-- Button to Open the Modal -->
  

  <!-- The Modal -->
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content p10">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h2 class="modal-title">Contact Us On Whatsapp</h2>
          <button type="button" class="close wc" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body"  >
          <form action="" onsubmit="myFunction()" class="whatsapp-con-form">
    
   <div class="form-group">
    <label for="Full Name">Full Name
    <input type="text" required="" name="full_name"  class="form-control" id="Full_Name">
     </label>
  </div>

   <div class="form-group">
    <label for="Email">Email
    <input type="email" required="" class="form-control" name="Email_Id" id="Email_Id">
 </label>
  </div>
  <div class="form-group">
    <label for="Mobile-Number">Mobile Number
    <input type="tel" required="" class="form-control" name="mobile_number" id="mobile_number"></label>
  </div>
<div class="form-group">
    <label for="exampleTextarea"> Message
    <textarea class="form-control" id="Message"  name="Message" rows="3"></textarea>
 </label>
  </div>
  <div class="form-group"><input type="submit" class="w-send" value="SEND"></div>
   <div>
    </div>
     </div>

        </form>
        
      </div>
    </div>
  </div>
  
</div>

            <!-- Contact Section End-->
            <!-- footer
               ================================================== -->
            <footer style="background-color: <?=$products->footer_color?>!important;" >
               <div class="row">
                  <div class="twelve columns">
                     <ul class="social-links">

                        <li><a href="<?=$products->facebook?>" target="_blank"  ><i class="fa fa-facebook " style="color: white;"></i></a></li>
                        <li><a href="<?=$products->instagram?>" target="_blank"  ><i class="fa fa-instagram " style="color: white;"></i></a></li>
                        <li><a href="<?=$products->tweeter?>" target="_blank"  ><i class="fa fa-twitter " style="color: white;"></i></a></li>
                        <li><a href="<?=$products->youtube?>" target="_blank"  ><i class="fa fa-youtube " style="color: white;"></i></a></li>

 
                      </ul>
                     <ul class="copyright">
                        <li style="color: white;">&copy; Copyright 2019 Whatsapcampaigns. All rights reserved.</li>
                        <!-- <li>Design by <a href="http://www.styleshout.com/" title="Styleshout" target="_blank">S</a></li>    -->
                     </ul>
                  </div>
                  <div id="go-top"><a class="smoothscroll" title="Back to Top" href="#home"><i class="icon-up-open"></i></a></div>
               </div>
            </footer>
            <!-- Footer End-->
            <!-- Java Script
               ================================================== -->
            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
          
           <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
            
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
            <script>window.jQuery || document.write('<script src="<?=base_url('/assets/temp1/');?>js/jquery-1.10.2.min.js"><\/script>')</script>
            <script type="text/javascript" src="<?=base_url('/assets/temp1/');?>js/jquery-migrate-1.2.1.min.js"></script>
            <script src="<?=base_url('/assets/temp1/');?>js/jquery.flexslider.js"></script>
            <script src="<?=base_url('/assets/temp1/');?>js/waypoints.js"></script>
            <script src="<?=base_url('/assets/temp1/');?>js/jquery.fittext.js"></script>
            <script src="<?=base_url('/assets/temp1/');?>js/magnific-popup.js"></script>
             <script src="<?=base_url('/assets/temp1/');?>js/bootstrap.bundle.js"></script>
            <script src="<?=base_url('/assets/temp1/');?>js/init.js"></script>

            <script>
               $("#signin").on( "click", function() {
               $('#myModal1').modal('hide');  
               });
               $("#signin").on( "click", function() {
                    $('#myModal2').modal('show');  
               });
            </script>
            
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

<script>
function myFunction() {
var Full_Name  = document.getElementById("Full_Name").value;
var Email_Id  = document.getElementById("Email_Id").value;
var mobile_number  = document.getElementById("mobile_number").value;
var Message  = document.getElementById("Message").value;

event.preventDefault();

if (Full_Name != undefined && Email_Id != null && mobile_number != undefined && Message != null ) {
   
window.location.href = "https://api.whatsapp.com/send?phone=<?php echo $whatsappnumberremovespecial?>&text="+ "Name:-" + Full_Name  + ", Message:-" + Message + " Mobile:-" +  mobile_number + "Email_Id:-" + Email_Id ;
} 
 
 
 }
</script>