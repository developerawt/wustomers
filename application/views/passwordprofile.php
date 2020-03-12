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
      </style>
   </head>
   <body class="login" style="background-color: #ededed;">
      <nav id="nav-wrap" style="background-color: #11abb0 !important; text-align: center; ">
         <a href="<?=base_url()?>">
         <div class="container">
            <img src="<?=base_url("/assets/temp1/");?>images/logo-design.png" style="height: 60px;margin-top: 7px;">
         </a>
         </div>
      </nav>
      <div>
         <a class="hiddenanchor" id="signup"></a>
         <a class="hiddenanchor" id="signin"></a>
         <div class="login_wrapper">
            <div class="animate form login_form">
               <?php if(validation_errors()) { ?>
               <div class="alert alert-danger alert-dismissible">
                 <p style="color: white">  <?php echo validation_errors();?></p>
               </div>
               <?php } ?>
                 <?php if($this->session->flashdata('WhatsappNumber')){
                  ?>
               <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                  <strong><h6><?php echo $this->session->flashdata('WhatsappNumber'); ?><h6></strong> 
                </div>
               <?php }?>
             
                <section>
                  <div class="login-form">
                     <form class="cmxform" id="commentForm" action="<?=site_url('admin/chnage_admin_password');?>" method="post">
                        <h3 class="text-center h-l">Change Password </h3>
                       <p class="text-center p-l"><span style="color: blue;"><a href="<?php echo site_url('admin/update_shop_details');?>">Back</a></span></p>
                        <div class="form-group">
                            <input type="password" class="form-1" id="oldpassword" name="oldpassword"  placeholder="Old password *" required> 
                            <input type="password" class="form-1" id="newpassword" name="newpassword" placeholder="New password*" required> 
                            <input type="password" class="form-1" id="confirmpassword" name="confirmpassword" placeholder="Confirm password *" required> 
                        </div>
                          <p class="change_link">
                      <button type="submit" class="text-center d-block mx-auto btn_1">Submit</button>

                </p>
                     </form>
                         
                  </div>
               </section>
            </div>
             


 
            
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
         $(document).ready(function(){
          $('#country').change(function(){
           var country_id = $('#country').val();
         
         
            if(country_id != '')
           {
            $.ajax({
             url:"<?php echo site_url(); ?>/dynamic_dependent/phone_codes",
             method:"POST",
             data:{country_id:country_id},
             success:function(data)
             {
              $('#state').html(data);
              $('#city').html('<option value="">Select City</option>');
             }
            });
           }
           else
           {
            $('#state').html('<option value="">Select Country Code</option>');
            $('#city').html('<option value="">Select City</option>');
           }
          });
         
          $('#state').change(function(){
           var state_id = $('#state').val();
           if(state_id != '')
           {
            $.ajax({
             url:"<?php echo site_url(); ?>/dynamic_dependent/fetch_city",
             method:"POST",
             data:{state_id:state_id},
             success:function(data)
             {
              $('#city').html(data);
             }
            });
           }
           else
           {
            $('#city').html('<option value="">Select City</option>');
           }
          });
          
         });
         
         $("#commentForm").validate();
         
      </script>
      <script type='text/javascript'>
       $('#check').click(function(){
    if('password' == $('#WhatsappNumber').attr('type')){
         $('#WhatsappNumber').prop('type', 'text');
    }else{
         $('#WhatsappNumber').prop('type', 'password');
    }
});
    </script>