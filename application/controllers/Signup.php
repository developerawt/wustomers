<?php

/**
 * 
 */
class Signup extends CI_Controller
{
    
    function __construct()
    {
        parent::__construct();
        $this->load->library('email');
        $this->load->model('Admin_model');
        $this->load->model('dynamic_dependent_model');
        $this->load->library('africastalking');

    }

    public function is_logged_in(){ 
    if($this->session->userdata('admin_name') != ''){
      return  true;
    }
    else{
      redirect('admin');
    }
  }


  public function is_not_logged_in(){ 
    if($this->session->userdata('admin_name') == ''){
      return  true;
    }
    else{
      redirect('admin');
    }
  }




     public function index()
    {
        // $this->Superadmin_model->get_last_ten_entries();
        // if ($this->session->userdata('name') != '')
            // redirect('superadmin/dashboard');
               $data['country'] = $this->dynamic_dependent_model->fetch_country();
               // $data['phone_codes'] = $this->dynamic_dependent_model->phone_codes();
               $this->load->view('signup', $data);
    }

public function emailvarfcation()
{
      $this->is_not_logged_in();
     $this->load->view('emailvarfiy');
}


     public function emailvarfiy(){
             $this->is_not_logged_in();
            $emailcode  = $this->input->post('emailcode');

          if($emailcode){
            $this->db->set('status','active')->where('emailcode',$emailcode)->update('admin_registration');
           $message = $this->session->set_flashdata("acc_verify", 'Your Account is Verified.');
           $this->load->view('login',$message);
        }else{
 
           $message = $this->session->set_flashdata("acc_verify", 'Your account is not verified or your verification code is wrong.');
           $this->load->view('login',$message);
        }
        
     }

      public function smsvarfiy(){
            
            $emailcode  = $this->input->post('emailcode');
            $smscode  = $this->input->post('smscode');

          if($smscode){
            $this->db->set('status','active')->where('f_password',$emailcode)->update('admin_registration');
           $message = $this->session->set_flashdata("mess", 'Please enter new password.');
            $this->load->view('change_pas',['smscode'=>$smscode],$message);
        }else{
           $message = $this->session->set_flashdata("acc_verify", 'Your account is not verified or your verification code is wrong.');
           $this->load->view('login',$message);
        }
        
     }



     public function admin_registration(){

         $this->is_not_logged_in();
        $this->form_validation->set_rules('password', 'password', 'trim|required');
        $this->form_validation->set_rules('email', 'email', 'trim|required|is_unique[admin_registration.email_id]',array('is_unique'=>'Email Id Is Already Exist.'));
        $this->form_validation->set_rules('phone', 'Phone', 'trim|required|min_length[8]|integer',array('integer'=>'Please Use Only Numerical Value.'));
        $this->form_validation->set_rules('shop_name', 'Shop Name', 'trim|required');
        //$this->form_validation->set_rules('shop_name', 'Shop Name', 'trim|required|alpha_numeric' ,array('alpha_numeric' => 'Your Shop Name Must Contain Number And Alphabet Only.'));
        // $this->form_validation->set_rules('phone', 'Phone', 'trim|required');
         
        if ($this->form_validation->run() == FALSE) {
  
            /*$this->form_validation->set_message('is_unique', '%s already registered, please log in!');
            $this->form_validation->set_message('is_unique', '%s already registered, please log in!');
            $this->form_validation->set_message('is_unique', '%s already registered, please log in!');*/
		$data['country'] = $this->dynamic_dependent_model->fetch_country();
 
            $this->load->view('signup', $data);
        } else {
   
  

            $admin_link    = base_url("shop/index/".$this->input->post('shop_name'));
            $admin_name    = $this->input->post('user_name');
            $shop_name     = $this->input->post('shop_name');
            $password      = sha1(($this->input->post('password')));
            $email_id      = $this->input->post('email');
            $mobile_number = $this->input->post('phone');
            $CountryCodes = $this->input->post('CountryCodes');
            $country_id    = $this->input->post('Selcountry');
            $state_id      = $this->input->post('Selstate');
            $city_id       = $this->input->post('Selcity');
            $salt          = $this->input->post('password');
            $emailcode  = mt_rand(1000, 999999);
      
            //$user_name = $this->input->post('user_name');
              $data_insert = array(
                'admin_link' => $admin_link,
                'admin_name' => $admin_name,
                'password' => $password,
                'email_id' => $email_id,
                'shop_name' =>$shop_name,
                'CountryCode'=>$CountryCodes,
                'mobile_number' => $mobile_number,
                'country_id' => $country_id,
                 'salt' => $salt,
                 'emailcode'=>$emailcode,
                 'status' =>'inactive'
             );
             
/*
        $email = $this->input->get_post("email");
        $verificationText = $this->input->get_post("verificationText");*/
       /* $return_url = 'https://whatsapcampaigns.com';
        $to = $this->input->post('email');
        $subject = "Email Verification";
        $from = "info@whatsapcampaigns.com";*/

        // Create email headers
        /*'Reply-To:loyalty@lovethis.place' . "\r\n" .*/

       /*
        $headers = "From: webapp <info@whatsapcampaigns.com>\r\n";
        $headers .= "Reply-To: " . $from . "\r\n";
        $headers .= "Return-Path: info@whatsapcampaigns.com\r\n";
        $headers .= 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";*/

        /*   
 
          $message = "<html><body>";
          
          $message .= 'Please Click The Link for <a href="https://whatsapcampaigns.com/index.php/signup/verify_email/' . $emailcode .  '"> https://whatsapcampaigns.com/index.php/signup/verify_email/' . $emailcode .  '</a>';
          
         $message .= '</body></html>';*/

  $mobile = $CountryCodes.$mobile_number;
  $message = 'Use This Code To Verify Your Whatsapp Number'.' '.$emailcode;  
  $sms =   $this->africastalking->sendMessage($mobile, $message);
   if($sms) {
              $check_user_is_unique = $this->Admin_model->check_admin_is_unique($admin_name, $email_id,$shop_name,$data_insert);
               $message = $this->session->set_flashdata('Sent','Please Verify Your Whatsapp No. - A Message Will Be Sent To Your Phone.');
  
         } else {
          $message = $this->session->set_flashdata('Sent','We Can"t sent You Message');
         $this->load->view('signup',$message);
        }
    

             /*"http://ssappsnwebs.com/blast/index.php/Stickers/sendVerificatinEmail?email=$email_id&verificationText=$emailcode";

         // $this->load->helper('url');
        // $sendlink = redirect($link, 'refresh');
        // $sendlink = anchor($link, 'Link');

             $ch = curl_init();
             curl_setopt($ch, CURLOPT_HEADER, 1); 
             curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL, 1);         
             curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
             curl_setopt($ch, CURLOPT_HEADER, 0);
             curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
             curl_setopt($ch, CURLOPT_URL,$link );
             curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
             
          $data = curl_exec($ch);*/
 
  
        }
    }

    public function newpass(){
        $this->form_validation->set_rules('newpass', 'New Password', 'trim|required');

          if ($this->form_validation->run() == FALSE) {
            $message = $this->session->set_flashdata('forgotP','Please Insert required filed');
             $this->load->view('signup',$message);
        } else {
            $smscode = $this->input->post('smscode');
            $password = sha1($this->input->post('newpass'));
            $salt = $this->input->post('newpass');


             $data_update = array(
                'password' => $password,
                'salt' => $salt
              );
 
             $update = $this->Admin_model->forgotpassword_update($smscode,$data_update);
          
              if ($update) {
                $message = $this->session->set_flashdata('forgotPs','Password has been changed please login');
                $this->load->view('login',$message);
              }else{
                $message = $this->session->set_flashdata('forgotP','Failed To Update');
                $this->load->view('signup',$message);

              }

          }
      
    }

public function forgotpassword(){
        $this->form_validation->set_rules('email_id', 'Email Number', 'trim|required');
      
       if ($this->form_validation->run() == FALSE) {
            $message = $this->session->set_flashdata('forgotP','Please Insert required filed');
             $this->load->view('signup',$message);
        } else {
            $email_id = $this->input->post('email_id');
  
  $this->db->select('CountryCode,mobile_number')->from('admin_registration')->where('email_id',$email_id);
$q = $this->db->get();

  $num_rows = $q->num_rows();

 
if ($num_rows !=1) {
 $message = $this->session->set_flashdata('forgotP','Email id is not registered');
  $this->load->view('signup',$message);
 }else{
$data = $q->row();
$CountryCode = $data->CountryCode;
$mobile_number = $data->mobile_number;

 $emailcode  = mt_rand(1000, 999999);
// $emailcode  = "123456";
$mobile = $CountryCode.$mobile_number;
$message = 'Use This Code To Verify Your Account'.' '.$emailcode;  
$this->db->where('email_id',$email_id)->set('f_password',$emailcode)->update('admin_registration');
$sms =   $this->africastalking->sendMessage($mobile, $message);

$message = $this->session->set_flashdata('mes','A verification code will be sent to your phone.');
 $this->load->view('f_password', ['emailcode' =>$emailcode, 'mess'=>'Please enter new password']);
 
 /*         $password      = sha1(($this->input->post('password')));
            $salt          = $this->input->post('password');
           
            //$user_name = $this->input->post('user_name');
              $data_update = array(
                'password' => $password,
                'salt' => $salt
              );
 
             $update = $this->Admin_model->forgotpassword_update($email_id,$data_update);
          
              if ($update) {
                $message = $this->session->set_flashdata('forgotPs','password Has Been Changed Please Login');
                $this->load->view('login',$message);
              }else{
                $message = $this->session->set_flashdata('forgotP','Failed To Update');
                $this->load->view('signup',$message);

              }*/
  }

  } 

 
 }
 
 
/*public function sendVerificatinEmail1($emailcode,$to){
 require_once(APPPATH.'/views/class.phpmailer.php');
 $from = "info@whatsapcampaigns.com";
$mail = new PHPMailer();
$mail->IsSMTP(true); // SMTP
$mail->SMTPAuth   = true;  // SMTP authentication
$mail->Mailer = "smtp";
$mail->Host= "tls://email-smtp.eu-west-1.amazonaws.com"; // Amazon SES
$mail->Port = 465;  // SMTP Port
$mail->Username = "AKIA3NWFWHHGMVMAF2JM";  // SMTP  User name
$mail->Password = "BAGu3oRygTdlmJr5tUtmf2LsKC2uX2Gdf4W5S53X2K1B";  // SMTP Password
$mail->SetFrom($from, 'whatsapcampaigns');
$mail->AddReplyTo($from,'info@whatsapcampaigns.com');
$mail->Subject = 'Email Verification';
$mail->MsgHTML('Please Click The Link for <a href="https://whatsapcampaigns.com/index.php/signup/verify_email/' . $emailcode .  '">  To Verify The Email </a> 
    <p>And If Link Is Not Working Please Copy This URL And Go To The Link. : https://whatsapcampaigns.com/index.php/signup/verify_email/' . $emailcode .'</p>');
$address = $to;
 $mail->AddAddress($address, $to);
if(!$mail->Send()){
return true;
}else{
return true;
} 
*/

 
/*$to = "awt.honest2019@gmail.com";
$subject = "Test Mail Subject";
$body = "Hi<br/>Test Mail<br/>Amazon SES"; // HTML  tags
sendVerificatinEmail1($to,$subject,$body);*/
 

 

  public function sendVerificatinEmail($email_id,$emailcode){

         
        $emailcode ;
        
        $return_url = 'https://whatsapcampaigns.com';
        $to = $email_id;
        $subject = "Email Verification";
        $from = "info@whatsapcampaigns.com";
        // 'Reply-To:loyalty@lovethis.place' . "\r\n" . 

        // Create email headers
         

       
        $headers = "From: webapp <info@whatsapcampaigns.com>\r\n";
        $headers .= "Reply-To: " . $from . "\r\n";
        $headers .= "Return-Path: info@whatsapcampaigns.com\r\n";
        $headers .= 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

 
          $message = "<html><body>";
          /*
          $message .= 'Please Click The Link for <a href="'.site_url().'/signup/verify_email/' . $emailcode .  '">  To Verify The Email </a>';*/
           
          $message .= '<p>Please Copy This  Email Verification code :'.$emailcode.'</p>';

 
         $message .= '</body></html>';
  
        if (mail($to, $subject, $message, $headers)) {
          /*  sendVerificatinEmail($to,$subject,$body);*/

      return TRUE ; 

         } else {
            echo "not";
    }
        }
    }


/*public function test(){
    if ( function_exists( 'mail' ) )
{
    echo 'mail() is available';
}else{
    echo 'mail() has been disabled';
}
 
}*/



?>