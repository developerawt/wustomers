<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Web App</title>

    <!-- Bootstrap -->
    <link href="<?=base_url()?>assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?=base_url()?>assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?=base_url()?>assets/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="<?=base_url()?>assets/vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?=base_url()?>assets/build/css/custom.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<style type="text/css">
  #content form .submit, .login_content form input[type=submit] {
    float: left;
    margin-left: 0px;
    background: #00e22b;
    border: 1px solid #00e22b;
    border-radius: 5px;
    padding: 5px 20px;
    color: #fff;
    font-size: 15px;
    font-weight: bold;
}
.login_content{
  padding: 25px 25px;
  border:1px solid #ccc;
}
</style>

  </head>

  <body class="login">
      
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>
    
      <div class="login_wrapper">
      
        <div class="animate form login_form">
        <?php if($this->session->flashdata('InValid_User')){
                    ?><div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong><?php echo $this->session->flashdata('InValid_User'); ?>                    </strong> 
                </div>
            <?php }?>

            <?php if($this->session->flashdata('validation_error')){
                    ?><div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong><?php echo $this->session->flashdata('validation_error'); ?>                    </strong> 
                </div>
            <?php }?>
        
          <section class="login_content">
            <form method="post" action="<?php echo site_url('superadmin/sign_in') ?>">
              <h1>Login</h1>
              <div>
                <input type="text" name="user_name" class="form-control" placeholder="Username"  />
              </div>
              <div>
                <input type="password" name="password" class="form-control" placeholder="Password"  />
              </div>
              <div>
                <input type="submit" value="Log in">
                <a class="reset_pass" href="#">Lost your password?</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">
                  <a href="#signup" class="to_register"> Create Account </a>
                </p>

                <div class="clearfix"></div>
                <br />
                <div>
                  <img src="<?php echo site_url('/assets/images/wlogo.png') ?>">
                </div>
                <div><h1>Super Admin</h1></div>
              </div>
            </form>
          </section>
        </div>

        <div id="register" class="animate form registration_form">
        <?php if($this->session->flashdata('reg_validation_error')){
                    ?><div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong><?php echo $this->session->flashdata('reg_validation_error'); ?>                    </strong> 
                </div>
            <?php }?>  
        <section class="login_content">
            <form method="post" action="<?php echo site_url('superadmin/registration'); ?>">
              <h1>Create Account</h1>
              <div>
                <input type="text" class="form-control" name="user_name" placeholder="user_name"  />
              </div>
              <div>
                <input type="email" name="email" class="form-control" placeholder="Email"  />
              </div>
              <div>
                <input type="password" name="password" class="form-control" placeholder="Password"  />
              </div>
              <div>
                <input type="password" name="confirm_password" class="form-control" placeholder="Confirm Password"  />
              </div>
              <div>
                <input type="submit" value="Submit">
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Already a member ?
                  <a href="#signin" class="to_register"> Log in </a>
                </p>

                <div class="clearfix"></div>
                <br />
                <div>
                  <img src="<?php echo site_url('/assets/images/wlogo.png') ?>">
                </div>
                <div><h1>Super Admin</h1></div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>
