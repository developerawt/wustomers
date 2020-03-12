<!DOCTYPE html>
<html lang="en">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <!-- Meta, title, CSS, favicons, etc. -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>WebApp</title>
      <!-- Bootstrap -->
      <link href="<?php echo base_url();?>assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
      <!-- Font Awesome -->
      <link href="<?php echo base_url();?>assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
      <!-- NProgress -->
      <link href="<?php echo base_url();?>assets/vendors/nprogress/nprogress.css" rel="stylesheet">
      <!-- Animate.css -->
      <link href="<?php echo base_url();?>assets/vendors/animate.css/animate.min.css" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="<?=base_url('/assets/temp1/');?>css/css/bootstrap.min.css">
      <link rel="stylesheet" href="<?=base_url('/assets/temp1/');?>css/default.css">
      <link rel="stylesheet" href="<?=base_url('/assets/temp1/');?>css/layout.css">
      <link rel="stylesheet" href="<?=base_url('/assets/temp1/');?>css/media-queries.css">
      <link rel="stylesheet" href="<?=base_url('/assets/temp1/');?>css/magnific-popup.css">
      <link rel="stylesheet" type="text/css" href="<?=base_url('/assets/temp1/');?>style.css">
      <link href="<?php echo base_url();?>assets/build/css/custom.min.css" rel="stylesheet">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
      <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.0/dist/jquery.validate.js"></script>
       <link rel='manifest' href='<?=base_url()?>/manifest.json'>
      <style type="text/css">
          @media screen and (max-width: 767px) {

       .login_wrapper {
 width: 90%!important;

}
}
.login_wrapper {
 width: 40%;
max-width: 100%;
}
.login_form {
margin: 50px auto;
border-color: #ccc;
-webkit-box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.2);
-moz-box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.2);
box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.2);
padding:20px;
background:#ffffff;
}
         .login-form h2 {
         margin: 0 0 15px;
         padding-top: 30px;
         }
         .form-1
         {
         width: 100%;
         margin-top: 8px;
         margin-bottom: 10px;
         height: 40px;
         background-color: transparent;
         border: none;
         outline: none;
          border-bottom: 2px solid #BCBCBC;
         }
                
        .btn_1 {
  display: inline-block;
  padding: 12px 40px;
 background-color: #2bcdc1;
  font-weight: bold;
  color: #ffffff;
  border: none;
  outline: none;
  border-radius: 0px;
  cursor: pointer;
  transition: ease .3s;
  margin-top: 25px;
}

.btn_1:hover {
  background: #222222;
  color: #ffffff;
}
form{
margin-bottom:0px;
}
         .h-l
         {
         font-size: 28px;
         font-weight: bold;
         font-family: HelveticaNeueW01-Thin,HelveticaNeueW02-Thin,HelveticaNeueW10-35Thin,sans-serif;
         color: #20303c;
         }
         .p-l
         {
         font-size: 18px;
         font-family: HelveticaNeueW01-Thin,HelveticaNeueW02-Thin,HelveticaNeueW10-35Thin,sans-serif ;
         padding-top: 15px;
         padding-bottom: 10px;
         }
         .c-l
         {
         font-size: 14px;
         padding-top: 13px;
         font-family:  HelveticaNeueW01-Thin,HelveticaNeueW02-Thin,HelveticaNeueW10-35Thin,sans-serif ;
         color: #3d4145;
         }
         ::placeholder {
         font-size: 16px;
         color: black;
         }

         .form-1-f
         {
         width: 100% !important;
         margin-top: 8px !important;
         margin-bottom: 10px !important;
         height: 40px !important;
         background-color: transparent !important;
         border: none !important;
         outline: none !important;
          border-bottom: 2px solid #BCBCBC !important;
          padding-left: 5px;
          box-shadow: none !important;
         }
      </style>
   </head>
   <body class="login" style="background-color: #ededed;">
      <nav id="nav-wrap" style="background-color: #11abb0 !important;">
         <div class="container">
            <img src="<?=base_url("/assets/temp1/");?>images/logo-design.png" style="height: 60px; float: left; margin-top: 7px;">
         </div>
      </nav>
      <div>
         <a class="hiddenanchor" id="signup"></a>
         <a class="hiddenanchor" id="signin"></a>
         <div class="login_wrapper">
            <div class="animate form login_form">
               <?php if(validation_errors()) { ?>
               <div class="alert alert-danger alert-dismissible">
                  <?php echo validation_errors();?>
               </div>
               <?php } ?>
               <?php if($this->session->flashdata('InValid_Users')|| $this->session->flashdata('user_registration_error')){
                  ?>
               <div class="alert alert-danger alert-dismissible" id="InValid_Users" >
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                  <strong><?php echo $this->session->flashdata('InValid_Users'); ?>                    </strong> 
                  <strong><?php echo $this->session->flashdata('user_registration_error'); ?>                    </strong> 
               </div>
               <?php }?>
               <?php if($this->session->flashdata('acc_verify'))  {
                  ?>
               <div class="alert alert-success alert-dismissible" id="acc_verify">
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                  <strong><?php echo $this->session->flashdata('acc_verify'); ?>                    </strong> 
               </div>
               <?php }?>
               <?php if($this->session->flashdata('forgotPs')){
                  ?>
               <div class="alert alert-success alert-dismissible" id="forgotPs" >
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                  <strong><?php echo $this->session->flashdata('forgotPs'); ?>  </strong> 
                </div>
               <?php }?>  
               <?php if($this->session->flashdata('validation_error')){
                  ?>
               <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                  <strong><?php echo $this->session->flashdata('validation_error'); ?>                    </strong> 
               </div>
               <?php }?>
               <section>
                  <div class="login-form">
                     <form class="cmxform" id="commentForm" action="<?=site_url('admin/sign_in');?>" method="post">
                        <h3 class="text-center h-l">Log in</h3>
                        <p class="text-center p-l">New To Webapp?<span style="color: blue;"><a href="<?php echo site_url();?>/signup"> Sign Up</a></span></p>
                        <div class="form-group">
                           <input type="text" class="form-1" id="Username" name="email_id"  placeholder="Email *" required="required">
                        </div>
                        <div class="form-group">
                           <input type="password" id="password" class="form-1" name="password" placeholder="Password *" required="required">
                        </div>
                       
                       <div class="row">
                         <div class="col-md-6"></div>
                         <div class="col-md-6"></div>
                       </div>
                        <div class="clearfix">
                            
                            <a href="#signup" class=" pull-right c-l to_register">Forgot Password</a>
                           <!-- <a href="#" class="pull-right c-l">Forgot Password?</a> -->
                        </div>
                         <div class="clearfix" style="" >
                            
                            <a href="<?=site_url('signup/emailvarfcation')?>" class="pull-right c-l to_register">Verify Whatsapp Number</a>
                           <!-- <a href="#" class="pull-right c-l">Forgot Password?</a> -->
                        </div>



                        <p class="change_link">
                      <button type="submit" class="text-center d-block mx-auto btn_1">Submit</button>

                </p>
                     </form>
                         
                  </div>
               </section>
            </div>
            <div id="register" class="animate form registration_form">
               <?php if($this->session->flashdata('reg_validation_error')){
                  ?>
               <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                  <strong><?php echo $this->session->flashdata('reg_validation_error'); ?>                    </strong> 
               </div>
               <?php }?>  
                  
           <?php if($this->session->flashdata('forgotP') ){ ?>
        <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong><?php echo  $this->session->flashdata('forgotP');?> </strong> 
                 </div>
                <?php } ?>



               <section class="login_content" style="background-color: #fff; padding: 15px;">
                       <a href="#signin" class="to_register">  <h3 class="text-center h-l">Log in</h3></a>
              
              <h1>Forgot Password</h1>
              
                   <div class="login-form">
            <form method="post" action="<?php echo site_url('signup/forgotpassword'); ?>">
                        
                         <div class="form-group">
                           <input type="text" class="form-1-f" id="Username" name="email_id"  placeholder="Email Id *" required="required"> 
                        </div>
                         <div class="form-group">
            <button type="submit" class="text-center d-block mx-auto btn_1">Submit</button>
           </div> 
                             
                            
                        </div>
                        
                     </form>
 
                <div class="clearfix"></div>
                <br />
 
              </div>
         </div>
      </div>
      <script>
         $("#commentForm").validate();
      </script>
   </body>
</html>

<script>
      if ('serviceWorker' in navigator) {
        navigator.serviceWorker.register('<?php echo base_url('/service-worker.js')?>', { scope: '/index.php/admin/login/' }).then(function(registration) {
          console.log('Service worker registration succeeded:', registration);
        }).catch(function(error) {
          console.log('Service worker registration failed:', error);
        });
      } else {
        console.log('Service workers are not supported.');
      }
    </script>

<script type="text/javascript">
    setTimeout(function(){

      $('#InValid_Users').fadeOut();

     }, 5000);
  </script>

<script type="text/javascript">
    setTimeout(function(){

      $('#acc_verify').fadeOut();

     }, 5000);
     setTimeout(function(){

      $('#forgotPs').fadeOut();
      $('#forgotP').fadeOut();

     }, 5000);
  </script>

  