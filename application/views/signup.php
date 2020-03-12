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
      <link rel="stylesheet" href="<?=base_url();?>assets/owlcarousel/assets/owl.theme.default.min.css">
      <link rel="stylesheet" type="text/css" href="<?=base_url('/assets/temp1/');?>style.css">
      <!-- Add to home screen for Safari on iOS -->
      <link rel="icon" type="image/png" href="<?=base_url('/assets/pwa/');?>images/icons/icon-144x144.png">
      <style type="text/css">
      @media screen and (max-width: 767px) {

       .login-form {
 width: 90% !important;

}
}
.login-form {
width: 40%;
margin: 110px auto;
border-color: #ccc;
-webkit-box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.2);
-moz-box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.2);
box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.2);
padding:20px;
background:#ffffff;
}
label {
  display: block;
  position: relative;
  margin: 40px 0px;
}
.label-txt {
  position: absolute;
  top: -1.6em;
  padding: 10px;
  font-family: sans-serif;
  font-size: .8em;
  letter-spacing: 1px;
  color: rgb(120,120,120);
  transition: ease .3s;
}
.input {
  width: 100%;
  padding: 15px 8px;
  background: transparent;
  border: none;
  outline: none;
  color:#444;
  margin-bottom: 15px;
  border-bottom: 2px solid #BCBCBC;
}
.input-whatsapp {
  width: 76%;
  padding: 15px 8px;
  background: transparent;
  border: none;
  outline: none;
  border-bottom: 2px solid #BCBCBC;
   float: right;
   color: #444;
}
select#country{
margin-bottom: 30px;
text-align: left !important;	
}

.input-cc {
  width: 15%;
  min-width:60px;
  padding: 10px;
  background: transparent;
  border: none;
  outline: none;
  border-bottom: 2px solid #BCBCBC;
  float: left;
}

.line-box {
  position: relative;
  width: 100%;
  height: 2px;
  background: #BCBCBC;
}

.line {
  position: absolute;
  width: 0%;
  height: 2px;
  top: 0px;
  left: 50%;
  transform: translateX(-50%);
  background: #8BC34A;
  transition: ease .6s;
}

.input:focus + .line-box .line {
  width: 100%;
}

.label-active {
  top: -3em;
}

button {
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

button:hover {
  background: #222222;
  color: #ffffff;
}
label {
    margin: 0px 0px;
    text-align: left;
}
#phone-error{
  clear: both;
}
      </style>
   </head>
   <body style="background-color: #ededed;">
      <nav id="nav-wrap" style="background-color: #11abb0 !important; text-align: center; ">
         <div class="container"><a href="<?=base_url();?>">
            <img src="<?=base_url("/assets/temp1/");?>images/logo-design.png" style="height: 60px; margin-top: 7px;">
           </a> <!--      <button class="float-right" style="border-radius: 30px; margin-top: 13px; color: white;"><a style="color: white;" href="<?php echo site_url('/admin/login');?>"> Sign Up</a></button> -->
         </div>
      </nav>
      <?php //$this->load->view('includes/header');?>
      <!-- page content -->
      <!-- <div class="right_col" role="main"> -->
      <?php if($this->session->flashdata('acc_verify') || $this->session->flashdata('forgotP') ){ ?>
      <div class="alert alert-success alert-dismissible">
         <button type="button" class="close" data-dismiss="alert">&times;</button>
         <strong><?php echo  $this->session->flashdata('acc_verify');?> </strong> 
         <strong><?php echo  $this->session->flashdata('forgotP');?> </strong> 
      </div>
      <?php } ?>
      <?php if( $this->session->flashdata('forgotP') ){ ?>
      <div class="alert alert-danger alert-dismissible">
         <button type="button" class="close" data-dismiss="alert">&times;</button>
         <strong><?php echo  $this->session->flashdata('forgotP');?> </strong> 
      </div>
      <?php } ?>
      <?php if($this->session->flashdata('user_registration_error')){ ?>
      <div class="alert alert-success alert-dismissible">
         <button type="button" class="close" data-dismiss="alert">&times;</button>
         <strong><?php echo  $this->session->flashdata('user_registration_error');?> </strong> 
      </div>
      <?php } ?>
      <?php if($this->session->flashdata('data_insert')){ ?>
      <div class="alert alert-success alert-dismissible">
         <button type="button" class="close" data-dismiss="alert">&times;</button>
         <strong><?php echo  $this->session->flashdata('data_insert');?> </strong> 
      </div>
      <?php } ?>
      <section>
         <div class="container login-form">
            <?php if(validation_errors()) { ?>
            <div class="alert alert-danger alert-dismissible" style="margin-top: 80px;" >
               <?php print_r(validation_errors());?>
            </div>
            <?php } ?>
                

            <form class="cmxform" id="commentForm" action="<?php echo site_url("signup/admin_registration"); ?>" method="post"  >
               <h2 class="text-center h-l">Sign Up</h2>
               <p class="text-center p-l">Already account?<span style="color: blue;"><a href="<?php echo site_url();?>/admin/sign_in"> Log in</a></span></p>
               <div class="form-group">
                  <?php 
                     $this->load->helper('string');
                     ?>
                  <input type="hidden" id="Username" name="user_name" readonly="" value="<?php echo random_string('alnum', 8);?>"  class="form-1" placeholder="Username" required="required">
               </div>
               <div class="form-group">
                  <input type="Email" name="email" class="input" placeholder="Email" required="required">
               </div>
               <div class="form-group">
                  <input type="password" id="password" name="password" class="input" placeholder="Password" required="required">
               </div>
               <div class="form-group">
                  <input type="text" name="shop_name" class="input" placeholder="Shop Name" required="required">
               </div>
                <select name="Selcountry" id="country" class="input form-2 text-center d-block mx-auto">
                  <?php foreach($country as $row){
                    if ($row->id == 160) {
                     echo '<option selected="selected" value="'.$row->id.'">'.$row->country_name.'</option>';
                    }
                     echo '<option value="'.$row->id.'">'.$row->country_name.'</option>';
                     }
                     ?>
               </select>
               <div class="form-group">

                  <select name="CountryCodes" id="state" class="input-cc">
                     <option value="234">234</option>
                  </select>
          <input type="text" name="phone" class="input-whatsapp" placeholder="Whatapp Number" required="required">
               </div>
               <div style="clear:both;"></div>
                      <div class="form-group">
         <button type="submit" class="text-center d-block mx-auto btn_1" onclick="myload();"  >Sign Up</button>
         <img src="<?=base_url('/assets/images/loader.gif')?>" id="gif" style="display: block; margin: 0 auto; width: 80px; visibility: hidden; ">
         </div> 
         </div>
         </div>
      
         </form>
         </div>
         </div>
      </section>
 
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
      <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.0/dist/jquery.validate.js"></script>
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
      <script >
        function myload() {
       $('#gif').css('visibility', 'visible');
         } 
        
      </script>
    </body>
</html>
<?php //$this->load->view('includes/footer');?>