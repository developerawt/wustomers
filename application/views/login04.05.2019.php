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

    <!-- Custom Theme Style -->
    <link href="assets/build/css/custom.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  </head>

  <body class="login">
      
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>
    
      <div class="login_wrapper">
      
        <div class="animate form login_form">
        <?php if($this->session->flashdata('InValid_User')|| $this->session->flashdata('user_registration_error')){
                    ?><div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong><?php echo $this->session->flashdata('InValid_User'); ?>                    </strong> 
                    <strong><?php echo $this->session->flashdata('user_registration_error'); ?>                    </strong> 
                </div>
            <?php }?>
             <?php if($this->session->flashdata('acc_verify')){
                    ?><div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong><?php echo $this->session->flashdata('acc_verify'); ?>                    </strong> 
                 </div>
            <?php }?>

               <?php if($this->session->flashdata('mail_info')){
                    ?><div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong><?php echo $this->session->flashdata('mail_info'); ?>                    </strong> 
                    <strong><?php echo $this->session->flashdata('user_registration_error'); ?>                    </strong> 
                </div>
            <?php }?>


            <?php if($this->session->flashdata('validation_error')){
                    ?><div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong><?php echo $this->session->flashdata('validation_error'); ?>                    </strong> 
                </div>
            <?php }?>
        
          <section class="login_content">
            <form method="post" action="<?php echo site_url('admin/sign_in') ?>">
              <h1>Login Form</h1>
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
                   <a href="https://whatsapcampaigns.com/index.php/signup" class="to_register">Sign up </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> WebApp</h1>
                  <!-- <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p> -->
                </div>
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
          <form class="login ng-pristine ng-scope ng-valid-email ng-invalid ng-invalid-required ng-valid-minlength" name="loginForm" novalidate="" onsubmit="submit.focus()">
<div class="log-in-title title ng-binding">Log In</div>
<div class="new-user ng-binding">
New to Wix?
<a class="signup-link ng-binding" href="" ng-click="$ctrl.onClickSignup()">Sign Up</a>
</div>
<div class="signin-section">
<div class="signin-with-email">
<desktop-input class="email ng-isolate-scope" field="loginForm.email" label="'login.email'" server-error="$ctrl.serverError" show-error-on-general-error="true"><md-input-container class="tooltip-holder ng-isolate-scope has-error md-input-invalid" ng-class="{'has-error': !!$ctrl.getError()}" wix-tooltip="This field is required." is-open="$ctrl.showTooltip" max-width="225px" append-to-body="true" tooltip-trigger="false" placement="left" placement-force="true" style="">
                <label class="label ng-binding" for="input_0"> Email </label>
                <input autofocus="" default-email="" name="email" ng-attr-wix-mail-validator="{{!$ctrl.novalidateEmail()}}" ng-model="$ctrl.email" required="" type="email" class="ng-pristine ng-scope md-input ng-empty ng-valid-email ng-invalid ng-invalid-required ng-touched" id="input_0" wix-mail-validator="true" style="">
                <div class="focus-line"></div>
                <i class="login-svg-font-icons-error error"></i>
              </md-input-container></desktop-input>
<desktop-input class="password ng-isolate-scope" field="loginForm.password" label="'login.password'" server-error="$ctrl.serverError"><md-input-container class="tooltip-holder ng-isolate-scope has-error" ng-class="{'has-error': !!$ctrl.getError()}" wix-tooltip="This field is required." is-open="$ctrl.showTooltip" max-width="225px" append-to-body="true" tooltip-trigger="false" placement="left" placement-force="true">
                <label class="label ng-binding" for="input_1"> Password </label>
                <input name="password" ng-minlength="4" ng-model="$ctrl.password" required="" type="password" class="ng-pristine ng-untouched ng-scope md-input ng-empty ng-invalid ng-invalid-required ng-valid-minlength" id="input_1">
                <div class="focus-line"></div>
                <i class="login-svg-font-icons-error error"></i>
              </md-input-container></desktop-input>
<div class="remember-me-and-forgot-password">
<label class="remember-me-section">
<div class="remember-me-text ng-binding">Remember Me</div>
<wix-checkbox><label allow-propagation-from="input" class="ng-scope">
                  <input type="checkbox" class="remember-me ng-pristine ng-untouched ng-valid ng-not-empty" ng-model="$ctrl.rememberMe">
                  <span class="wix-checkbox-inner"></span>
                </label></wix-checkbox>
</label>
<a class="forgot-password-link ng-binding" ng-href="/account-recovery?sessionId=7ee377fd-d6d8-0ec9-c5a8-1f3c051c4206" target="_self" href="/account-recovery?sessionId=7ee377fd-d6d8-0ec9-c5a8-1f3c051c4206">Forgot Password?</a>
</div>
<div class="recaptcha-widget" id="recaptcha-widget"></div>
<div class="login-button">
<div class="button-spinner">
<button class="login-btn wix-button ng-binding is-button-outline" name="submit" ng-class="{'is-button-outline' : loginForm.$pristine}" ng-click="loginForm.$valid ? $ctrl.doLogin() : $ctrl.onSubmitInvalid()" ng-show="!$ctrl.loading" type="submit">Log In</button>
<div class="spinner-container ng-hide" ng-show="$ctrl.loading">
<spinner class="ng-isolate-scope"><svg class="spinner" width="29" height="29" viewBox="0 0 66 66" "="">
                 <circle class="path" fill="none" stroke-width="6" stroke-linecap="round" cx="33" cy="33" r="30"></circle>
              </svg></spinner>
</div>
</div>
</div>
</div>
<div class="divider"></div>
<!-- ngIf: -->
<!-- ngIf: --><social-signin template-url="'views/social-signin.html'" wix-experiment-if="specs.users.NewSocialLogin" class="ng-scope ng-isolate-scope"><!-- ngInclude: $ctrl.templateUrl --><div ng-include="$ctrl.templateUrl" class="ng-scope"><div class="sozial-buttons new ng-scope">
<div class="social-button facebook-button">
<div class="buttonContentWrapper ng-isolate-scope" facebook-login="" fb-error="$ctrl.fbError" fb-loading="$ctrl.fbLoading" ng-click="$ctrl.socialClicked('facebook')" ng-show="!$ctrl.fbLoading" tabindex="0">
<div class="buttonIcon">
<div class="buttonSvgImage"></div>
</div>
<span class="buttonContents ng-binding">Continue with Facebook</span>
</div>
<div class="spinner-container ng-hide" ng-show="$ctrl.fbLoading">
<spinner class="ng-isolate-scope"><svg class="spinner" width="29" height="29" viewBox="0 0 66 66" "="">
                 <circle class="path" fill="none" stroke-width="6" stroke-linecap="round" cx="33" cy="33" r="30"></circle>
              </svg></spinner>
</div>
</div>
<div class="social-button google-button">
<div class="buttonContentWrapper ng-isolate-scope" google-error="$ctrl.googleError" google-loading="$ctrl.googleLoading" google-login="" ng-click="$ctrl.socialClicked('google')" ng-show="!$ctrl.googleLoading" tabindex="0">
<div class="buttonIcon">
<div class="buttonSvgImage"></div>
</div>
<span class="buttonContents ng-binding">Continue with Google</span>
</div>
<div class="spinner-container ng-hide" ng-show="$ctrl.googleLoading">
<spinner class="ng-isolate-scope"><svg class="spinner" width="29" height="29" viewBox="0 0 66 66" "="">
                 <circle class="path" fill="none" stroke-width="6" stroke-linecap="round" cx="33" cy="33" r="30"></circle>
              </svg></spinner>
</div>
</div>
<div class="error-message ng-binding ng-hide" ng-show="$ctrl.googleError">Login with Google is temporarily unavailable. Try again later.</div>
<div class="error-message ng-binding ng-hide" ng-show="$ctrl.fbError">Login with Facebook is temporarily unavailable. Try again later.</div>
</div>
</div></social-signin><!-- end ngIf: function(){var a=g[d];return f.eval(b,a,g.wixPermissionContext)} -->
</div>
<terms-of-use class="small ng-isolate-scope" mode="'login'"><div class="terms-of-use ng-scope" translate="terms_of_use.login" translate-values="{termsOfUse: $ctrl.getTermsOfUseLinkTag(), privacyPolicy: $ctrl.getPrivacyPolicyLinkTag()}">* By logging in, you agree to our <a href="https://www.wix.com/about/terms-of-use" target="_blank">Terms of Use</a> and to receive Wix emails &amp; updates and acknowledge that you read our <a href="https://www.wix.com/about/privacy" target="_blank">Privacy Policy</a>.</div></terms-of-use>
</form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>

    <script>
      if ('serviceWorker' in navigator) {
        navigator.serviceWorker.register('/service-worker.js', { scope: '/' }).then(function(registration) {
          console.log('Service worker registration succeeded:', registration);
        }).catch(function(error) {
          console.log('Service worker registration failed:', error);
        });
      } else {
        console.log('Service workers are not supported.');
      }
    </script>
