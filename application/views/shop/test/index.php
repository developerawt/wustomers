
 <?php
foreach (

$products as 

$pro) {
}
?>
<!DOCTYPE html>
             <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="theme-color" content="#FF9800">
        <title><?php echo $pro->Business_Name ;?></title>
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
      

            <link rel='manifest' href='https://whatsapcampaigns.com/application/views/shop/test/manifest.json'>
            <link rel='stylesheet' type='text/css' href='https://whatsapcampaigns.com/assets/temp1/css/css/bootstrap.min.css'>
            <link rel='stylesheet' href='https://whatsapcampaigns.com/assets/temp1/css/default.css'>
            <link rel='stylesheet' href='https://whatsapcampaigns.com/assets/temp1/css/layout.css'>
            <link rel='stylesheet' href='https://whatsapcampaigns.com/assets/temp1/css/media-queries.css'>
            <link rel='stylesheet' href='https://whatsapcampaigns.com/assets/temp1/css/magnific-popup.css'>
            <link rel='stylesheet' type='text/css' href='https://whatsapcampaigns.com/assets/temp1/style.css'>
            <script src='https://whatsapcampaigns.com/assets/temp1/js/modernizr.js'></script>
         </head>

         <body>
            
          <?php  $whatsappnumber =$pro->CountryCode.$pro->mobile_number;
            $whatsappnumberremovespecial = preg_replace("/[^A-Za-z0-9\-]/", "", $whatsappnumber);
           ?> <header id="home">

               <nav id="nav-wrap">
                  <img src="<?php echo base_url("shop/shop_image/").$pro->Business_logo  ?>" style="height: 60px;">
               </nav>
                <div class="row banner">
                  <div class="banner-text">
                     <marquee behavior="scroll"scrollamou="3">
                        <h1 class="responsive-headline"> <?php echo $pro->Business_deal_heading ;?></h1>
                     </marquee>
                     <h3> <?php echo $pro->Short_Description ;?></a>.</h3>
                     <hr />
                     <ul class="social">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                        <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                        <li><a href="#"><i class="fa fa-skype"></i></a></li>
                     </ul>
                  </div>
                  <div class="what ">
                       <a href="https://api.whatsapp.com/send?phone=<?php echo $whatsappnumberremovespecial ?>" class="button">
                        <img src="https://whatsapcampaigns.com/assets/temp1/images/cda3105f8b.png" style="height: 30px; position: absolute; left: 0; top: 0;">
                         <p style="margin-left: 30px; color: #fff;">Contact Us Now</p>
                     </a>
                     <button class="btn1" data-toggle="modal" data-target="#myModal1">
                     Login
                  </div>
                  </button>
                  </button>
                  <!-- Modal -->
                  <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                  <div class="modal-content">
                  <div class="modal-header">
                  <h4 class="modal-title" id="myModalLabel">Login</h4>
                  <button type="button" class="pull-right" data-dismiss="modal">&times;</button>
                  
                  </div>
                  <div class="modal-body">
                  <form>
                  <label>Email</label>
                  <input type="email" name="Email" placeholder="Email" class="form-control">
                  <label>Password</label>
                  <input type="Password" name="Password" placeholder="Password"  class="form-control">
                  <input type="submit" value="Submit" class="sub">
                  </form>
                  <p><a href="#"class="text-center d-block mx-auto" id="signin" style="text-decoration: none;">Dont have an Account sign Up?</a></p>
                  </div>
                   </div>
                  </div>
                  </div>
                   <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                     <div class="modal-dialog">
                        <div class="modal-content">
                           <div class="modal-header">
                              <h4 class="modal-title" id="myModalLabel">Sign Up</h4>
                              <button type="button" class="pull-right" data-dismiss="modal">&times;</button>
                           </div>
                           <div class="modal-body">
                              <form>
                                 <label>First Name</label>
                                 <input type="text" name="Email" placeholder="First name" class="form-control">
                                 <label>Last name</label>
                                 <input type="text" name="Password" placeholder="Last name"  class="form-control">
                                 <label>Email</label>
                                 <input type="Email" name="Email" placeholder="Email" class="form-control">
                                 <legend>Password</legend>
                                 <input type="Password" name="Password" placeholder="Password" class="form-control">
                                 <legend>Confirm Password</legend>
                                 <input type="Password" name="Password" placeholder="Confirm Password" class="form-control">
                                 <input type="submit" value="Submit" class="sub">
                              </form>
                           </div>
                           
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
               </div>
               <p class="scrolldown">
                  <a class="smoothscroll" href="#about"><i class="icon-down-circle"></i></a>
               </p>
            </header>
             

            <!-- Portfolio Section
               ================================================== -->
            <section id="portfolio">
               <div class="row">
                  <div class="twelve columns collapsed">
                     <h1>Our Products.</h1>
                  <?php 
                  if (is_array($products_shop)|| is_object($products_shop)) {
                           $i = 1 ; 
                        foreach ($products_shop as $products){  ?>

                     <div id="portfolio-wrapper" class="bgrid-quarters s-bgrid-thirds cf">
                        <div class="columns portfolio-item">
                           <!-- <h1></h1> -->
                           <div class="item-wrap">
                             <a href="#modal-01<?=$i++?>" title="">
                                   <img alt="" style="height: 215px; width: 100%;" src="<?php echo base_url("shop/product_images/").$products->product_image  ?>" >
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

                         <?php }
                 }else{ ?>
                        <!-- item end -->
                        <div class="columns portfolio-item">
                           <div class="item-wrap">
                              <a href="#modal-02" title="">
                                 <img alt="" src="https://whatsapcampaigns.com/assets/temp1/images/portfolio/console.jpg">
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
                                 <img alt="" src="https://whatsapcampaigns.com/assets/temp1/images/portfolio/judah.jpg">
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
                                 <img alt="" src="https://whatsapcampaigns.com/assets/temp1/images/portfolio/into-the-light.jpg">
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
                                 <img alt="" src="https://whatsapcampaigns.com/assets/temp1/images/portfolio/farmerboy.jpg">
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
                                 <img alt="" src="https://whatsapcampaigns.com/assets/temp1/images/portfolio/girl.jpg">
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
                                 <img alt="" src="https://whatsapcampaigns.com/assets/temp1/images/portfolio/origami.jpg">
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

                         <div class="columns portfolio-item">
                           <div class="item-wrap">
                              <a href="#modal-09" title="">
                                 <img alt="" src="https://whatsapcampaigns.com/assets/temp1/images/portfolio/origami.jpg">
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
                                 <img alt="" src="https://whatsapcampaigns.com/assets/temp1/images/portfolio/retrocam.jpg">
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

                         <?php } ?>
                        <!-- item end -->
                     </div>
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
                  <div id="modal-02" class="popup-modal mfp-hide">
                     <img class="scale-with-grid" src="https://whatsapcampaigns.com/assets/temp1/images/portfolio/modals/m-console.jpg" alt="" />
                     <div class="description-box">
                        <h4>Console</h4>
                        <p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit.</p>
                        <span class="categories"><i class="fa fa-tag"></i>Branding, Web Development</span>
                     </div>
                     <div class="link-box">
                        <a href="#" target="_blank">Details</a>
                        <a class="popup-modal-dismiss">Close</a>
                     </div>
                  </div>
                  <!-- modal-02 End -->
                  <div id="modal-03" class="popup-modal mfp-hide">
                     <img class="scale-with-grid" src="https://whatsapcampaigns.com/assets/temp1/images/portfolio/modals/m-judah.jpg" alt="" />
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
                     <img class="scale-with-grid" src="https://whatsapcampaigns.com/assets/temp1/images/portfolio/modals/m-intothelight.jpg" alt="" />
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
                     <img class="scale-with-grid" src="https://whatsapcampaigns.com/assets/temp1/images/portfolio/modals/m-farmerboy.jpg" alt="" />
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
                     <img class="scale-with-grid" src="https://whatsapcampaigns.com/assets/temp1/images/portfolio/modals/m-girl.jpg" alt="" />
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
                     <img class="scale-with-grid" src="https://whatsapcampaigns.com/assets/temp1/images/portfolio/modals/m-origami.jpg" alt="" />
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
                     <img class="scale-with-grid" src="https://whatsapcampaigns.com/assets/temp1/images/portfolio/modals/m-retrocam.jpg" alt="" />
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
 <section class="text-center my-5 col-xl-12">
  <div class="container">
    <div id="carousel-example-1" class="carousel no-flex testimonial-carousel slide carousel-fade" data-ride="carousel"
      data-interval="false">
      <!--Slides-->
      <div class="carousel-inner" role="listbox">
        <!--First slide-->
        <div class="carousel-item active">
          <div class="testimonial">
            <!--Avatar-->
            <div class="avatar mx-auto mb-4">
              <img src="https://mdbootstrap.com/img/Photos/Avatars/img%20(30).jpg" class="rounded-circle img-fluid"
                alt="First sample avatar image">
            </div>
            <!--Content-->
            <p>
              <i class="fa fa-quote-left"></i> <?php echo $pro->Testimonial?> </p>
            <h4 class="font-weight-bold"><?php echo $pro->admin_name?></h4>
            <h6 class="font-weight-bold my-3"><?php echo $pro->Business_Name?></h6>
            <!--Review-->
            <i class="fa fa-star blue-text"> </i>
            <i class="fa fa-star blue-text"> </i>
            <i class="fa fa-star blue-text"> </i>
            <i class="fa fa-star blue-text"> </i>
            <i class="fs fa-star-half-alt blue-text"> </i>
          </div>
        </div>
       </div>
      <!--Slides-->
      <!--Controls-->
      <a class="carousel-control-prev left carousel-control" href="#carousel-example-1" role="button"
        data-slide="prev">
        <span class="icon-left-circle rest1" aria-hidden="true"></span>
        <!-- <i class="icon-down-circle"></i> -->
        <span class=" fasr-only">Previous</span>
      </a>
      <a class="carousel-control-next right carousel-control" href="#carousel-example-1" role="button"
        data-slide="next">
        <span class="icon-right-circle rest1" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
      <!--Controls-->
    </div>
    <!-- Carousel Wrapper -->
  </div>
</div>
</section>
<!-- Section: Testimonials v.2 -->
            <!-- Testimonials Section End-->

         
            <!-- Contact Section
               ================================================== -->
            <section id="contact" style="overflow: hidden;" >
               <div class="row">
                  <!-- <div class="map-wrap" style="width:100%; height: 445px;" id="map"></div> -->
                  <div class="col-lg-4 d-flex flex-column address-wrap">
                     <div class="single-contact-address d-flex flex-row">
                        <div class="icon">
                           <span class="fa fa-home rest" style="color: black;"></span>
                        </div>
                        <div class="contact-details">
                           <h5> <?php echo $pro->address1 ;?> </h5>
                           <p>
                               <?php echo $pro->address2 ;?> 
                           </p>
                        </div>
                     </div>
                     <div class="single-contact-address d-flex flex-row">
                        <div class="icon">
                           <span class="fa fa-phone rest"></span>
                        </div>
                        <div class="contact-details">
                           <h5>+ <?php echo $pro->CountryCode ;?>-<?php echo $pro->mobile_number ;?> </h5>
                           <p>Mon to Fri 9am to 6 pm</p>
                        </div>
                     </div>
                     <div class="single-contact-address d-flex flex-row">
                        <div class="icon">
                           <span class="fa fa-envelope rest"></span>
                        </div>
                        <div class="contact-details">
                           <h5><?php echo $pro->email_id ;?></h5>
                           <p>Send us your Query any times</p>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-8">
                     <form class="form-area contact-form text-right" id="myForm" action="#" method="post">
                        <div class="row">
                           <div class="col-lg-6 form-group">
                              <input name="name" placeholder="Enter your name" class="input1 form-control"class="common-input mb-20 form-control" required="" type="text">
                              <input name="email" placeholder="Enter email address"  class="input3 form-control"  pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" placeholder = "Enter email address" class="common-input  form-control" required="" type="email">
                              <input name="subject" placeholder="Enter subject"  class="input1 form-control"class="common-input mb-20 form-control" required="" type="text">
                           </div>
                           <div class="col-lg-6 form-group">
                              <textarea class="input1 form-control" name="message" placeholder="Enter Messege" required="required"></textarea>            
                           </div>
                           <div class="col-lg-12">
                              <div class="alert-msg" style="text-align: left;"></div>
                              <button class="genric-btn primary" class="input6" style="float: right;">Send Message</button>                                 
                           </div>
                        </div>
                     </form>
                  </div>
               </div>
            </section>
            <!-- Contact Section End-->
            <!-- footer
               ================================================== -->
            <footer>
               <div class="row">
                  <div class="twelve columns">
                     <ul class="social-links">
                        <li><a href="#"><i class="fa fa-facebook" style="color: white;"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter" style="color: white;"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus" style="color: white;"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin" style="color: white;"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram" style="color: white;"></i></a></li>
                        <li><a href="#"><i class="fa fa-dribbble" style="color: white;"></i></a></li>
                        <li><a href="#"><i class="fa fa-skype" style="color: white;"></i></a></li>
                     </ul>
                     <ul class="copyright">
                        <li style="color: white;">&copy; Copyright 2019 SSapps</li>
                        <!-- <li>Design by <a href="https://www.styleshout.com/" title="Styleshout" target="_blank">S</a></li>    -->
                     </ul>
                  </div>
                  <div id="go-top"><a class="smoothscroll" title="Back to Top" href="#home"><i class="icon-up-open"></i></a></div>
               </div>
            </footer>
             <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
          
           <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
            
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
            
            <script>window.jQuery || document.write("<script src=https://whatsapcampaigns.com//assets/temp1/js/jquery-1.10.2.min.js><\/script>")</script>


            <script type="text/javascript" src="https://whatsapcampaigns.com/assets/temp1/js/jquery-migrate-1.2.1.min.js"></script>
            <script src="https://whatsapcampaigns.com/assets/temp1/js/jquery.flexslider.js"></script>
            <script src="https://whatsapcampaigns.com/assets/temp1/js/waypoints.js"></script>
            <script src="https://whatsapcampaigns.com/assets/temp1/js/jquery.fittext.js"></script>
            <script src="https://whatsapcampaigns.com/assets/temp1/js/magnific-popup.js"></script>
             <script src="https://whatsapcampaigns.com/assets/temp1/js/bootstrap.bundle.js"></script>
            <script src="https://whatsapcampaigns.com/assets/temp1/js/init.js"></script>

            <script>
                 $("#signin").on( "click", function() {
               $("#myModal1").modal("hide");  
               });
               //trigger next modal
               $("#signin").on( "click", function() {
                    $("#myModal2").modal("show");  
               });
            </script>
            
         </body>
      </html>

  <script>
      if ('serviceWorker' in navigator) {
        navigator.serviceWorker.register('/application/views/shop/test/service-worker.js', { scope: '/application/views/shop/test/' }).then(function(registration) {
          console.log('Service worker registration succeeded:', registration);
        }).catch(function(error) {
          console.log('Service worker registration failed:', error);
        });
      } else {
        console.log('Service workers are not supported.');
      }
    </script>

  </body>
</html>
