<?php // $this->load->view('includes/side_bar');?>
<html>
   <head>
      <title>WebApp</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width initial-scale=1.0">
      <link rel="icon" href="images/favicon.ico" type="image/ico" />
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
      <link rel="stylesheet" type="text/css" href="<?=base_url('/assets/temp1/');?>css/css/bootstrap.min.css">
      <link rel="stylesheet" href="<?=base_url('/assets/temp1/');?>css/default.css">
      <link rel="stylesheet" href="<?=base_url('/assets/temp1/');?>css/layout.css">
      <link rel="stylesheet" href="<?=base_url('/assets/temp1/');?>css/media-queries.css">
      <link rel="stylesheet" href="<?=base_url('/assets/temp1/');?>css/magnific-popup.css">
<!--       <link rel="stylesheet" href="<?=base_url();?>assets/owlcarousel/assets/owl.theme.default.min.css">
 -->      <link rel="stylesheet" type="text/css" href="<?=base_url('/assets/temp1/');?>style.css">
      <!-- Add to home screen for Safari on iOS -->
      <link rel="icon" type="image/png" href="<?=base_url('/assets/pwa/');?>images/icons/icon-144x144.png">
    
   </head>
   <body style="background-color: #f0f0f0;">

    <div class="container">
        <h1 class="pric-h">Web App Plans & Pricing</h1>
        <p class="pric-p">Sign up for free and receive our awesome basics, but for<br> Instagrammers ahead of the curve, Linktree PRO can help you get even<br> more out of your bio link. You can upgrade or downgrade at any time.</p>
    </div>

    <div class="container coin">
      <div class="row">
        <div class="col-xl-6">
           <h3 class="p-h3">Free</h3>
           <p class="p-p1">For users who want their links<br> to work harder.</p>
           <form class="text-center d-block mr-auto" method="post" action="<?php echo site_url('paystack/paystack_standard');?>" >
              <input type="hidden" name="price" value="0" class="text-center d-block mr-auto"><h1 class="form-h"><span style="font-size: 15px; vertical-align: top; padding-right: 5px;">$</span>0</h1>
           <button class="btn-p text-center d-block mr-auto" name="submit" >GIVE FREE A GO</button>
           </form>

           <!-- <input type="" name="" value="0"> -->
           <h4 class="price-h4">Free includes all of the basic<br> features to get you started:</h4>
           <ul class="under-p">
             <li class="list-p">
               <i class=" fa fa-check"></i>&nbsp;&nbsp;&nbsp; Get unlimited links on your linktree.
             </li>
              <li class="list-p">
               <i class=" fa fa-check"></i>&nbsp;&nbsp;&nbsp;See the total number of times each link has been clicked.
             </li>
              <li class="list-p">
               <i class=" fa fa-check"></i>&nbsp;&nbsp;&nbsp; Pick from a selection of linktree themes.
             </li>
              <li class="list-p">
               <i class=" fa fa-check"></i>&nbsp;&nbsp;&nbsp; Upload your own profile image.
             </li>
              <li class="list-p">
               <i class=" fa fa-check"></i>&nbsp;&nbsp;&nbsp; Amazon Influencer Program Integration.
             </li>
           </ul>

        </div>
        <div class="col-xl-6" style="border-top: 5px solid #39e09b; margin: 0; padding: 0;">
            <h3 class="p-h3">PRO</h3>
           <p class="p-p1">All the basics, for as long as<br> you like.</p>
       <form class="text-center d-block mr-auto" method="post" action="<?php echo site_url('paystack/paystack_standard');?>" >
              <input type="hidden" name="price" value="6" class="text-center d-block mr-auto"><h1 class="form-h"><span style="font-size: 15px; vertical-align: top; padding-right: 5px;">$</span>6<span style="font-size: 15px; letter-spacing: 0.3px; word-spacing: 0.3px; vertical-align: baseline; padding-left: 5px;">USD/month</span></h1>
           <button class="btn-p1 btn-p text-center d-block mr-auto">MAKE ME A WEBAPP PRO</button>
          
           </form>


             <h4 class="price-h4">Includes everything in Free<br> plus all this:</h4>
           <ul class="under-p">
             <li class="list-p">
               <i class=" fa fa-check rests"></i>&nbsp;&nbsp;&nbsp;Get help quickly with priority support.
             </li>
              <li class="list-p">
               <i class=" fa fa-check rests"></i>&nbsp;&nbsp;&nbsp;Capture your visitors email addresses with the email / newsletter signup integration.
             </li>
              <li class="list-p">
               <i class=" fa fa-check rests"></i>&nbsp;&nbsp;&nbsp; Remove Linktree logo.
             </li>
              <li class="list-p">
               <i class=" fa fa-check rests"></i>&nbsp;&nbsp;&nbsp;See a day-by-day breakdown of link traffic.
             </li>
              <li class="list-p">
               <i class=" fa fa-check rests"></i>&nbsp;&nbsp;&nbsp; Complete customization of your linktree colors, button styles and fonts.
             </li>
              <li class="list-p">
               <i class=" fa fa-check rests"></i>&nbsp;&nbsp;&nbsp; Highlight your most important links with priority links.
             </li>
              <li class="list-p">
               <i class=" fa fa-check rests"></i>&nbsp;&nbsp;&nbsp; Change the title of your linktree.
             </li>
              <li class="list-p">
               <i class=" fa fa-check rests"></i>&nbsp;&nbsp;&nbsp; Temporarily send visitors to one link with Leap Links.
             </li>
               <li class="list-p">
               <i class=" fa fa-check rests"></i>&nbsp;&nbsp;&nbsp;Retarget your Linktree visitors on Facebook and Instagram by adding your Facebook Pixel ID.
             </li>
               <li class="list-p">
               <i class=" fa fa-check rests"></i>&nbsp;&nbsp;&nbsp; Add a beautiful background image or GIF.
             </li>
               <li class="list-p">
               <i class=" fa fa-check rests"></i>&nbsp;&nbsp;&nbsp;Give access to your team to manage your linktree and links.
             </li>
              <li class="list-p">
               <i class=" fa fa-check rests"></i>&nbsp;&nbsp;&nbsp;Show traffic as 'Social' in Google Analytics.
             </li>
              <li class="list-p">
               <i class=" fa fa-check rests"></i>&nbsp;&nbsp;&nbsp;Custom UTM Parameters.
             </li>
                <li class="list-p">
               <i class=" fa fa-check rests"></i>&nbsp;&nbsp;&nbsp;Add thumbnails to each link.
             </li>
           </ul>
        </div>
      </div>
    </div>

      <footer>
               <div class="row">
                  <div class="twelve columns">
                     <ul class="social-links">
                        <li><a href="#"><i class="fa fa-facebook" style="color: white;"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter" style="color: white;"></i></a></li>
                        <li><a href="#"><i class="fa fa-youtube" style="color: white;"></i></a></li>
                        <!-- <li><a href="#"><i class="fa fa-linkedin" style="color: white;"></i></a></li> -->
                        <li><a href="#"><i class="fa fa-instagram" style="color: white;"></i></a></li>
                        <!-- <li><a href="#"><i class="fa fa-dribbble" style="color: white;"></i></a></li> -->
                        <!-- <li><a href="#"><i class="fa fa-skype" style="color: white;"></i></a></li> -->
                     </ul>
                     <ul class="copyright">
                        <li style="color: white;">&copy; Copyright 2019 SSapps</li>
                        <!-- <li>Design by <a href="http://www.styleshout.com/" title="Styleshout" target="_blank">S</a></li>    -->
                     </ul>
                  </div>
                  <div id="go-top"><a class="smoothscroll" title="Back to Top" href="#home" ><i class="icon-up-open" style="position: relative; top: 15px;"></i></a></div>
               </div>
            </footer>
            <!-- Footer End-->
            <!-- Java Script
               ================================================== -->
            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
          
           <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
            
<!--             <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
 -->          
   <script>window.jQuery || document.write('<script src="<?=base_url('/assets/temp1/');?>js/jquery-1.10.2.min.js"><\/script>')</script>
            <script type="text/javascript" src="<?=base_url('/assets/temp1/');?>js/jquery-migrate-1.2.1.min.js"></script>
            <script src="<?=base_url('/assets/temp1/');?>js/jquery.flexslider.js"></script>
            <script src="<?=base_url('/assets/temp1/');?>js/waypoints.js"></script>
            <script src="<?=base_url('/assets/temp1/');?>js/jquery.fittext.js"></script>
            <script src="<?=base_url('/assets/temp1/');?>js/magnific-popup.js"></script>
             <script src="<?=base_url('/assets/temp1/');?>js/bootstrap.bundle.js"></script>
            <!-- <script src="<?=base_url('/assets/temp1/');?>js/init.js"></script> -->

            <script>
               $("#signin").on( "click", function() {
               $('#myModal1').modal('hide');  
               });
               $("#signin").on( "click", function() {
                    $('#myModal2').modal('show');  
               });
            </script>
    
     <!--  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
      <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.0/dist/jquery.validate.js"></script> -->

   </body>
</html>
