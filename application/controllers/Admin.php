<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('Admin_model');
		$this->load->model('dynamic_dependent_model');
		$this->load->library('africastalking');
 	}

	public function pwa(){
	
	$data['productsArray']= $this->Admin_model->customer_product_show();
 	$this->load->view('pwa',$data);

}

	public function index()
	{
 		if($this->session->userdata('admin_name') != '')
		redirect('admin/dashboard');
 		$this->load->view('vartemp');
		// $this->load->view('login');
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

	public function login(){
    $this->is_not_logged_in();
    $this->session->userdata('admin_name');

		$this->load->view('login');
	}
 
 
 public function products_entry(){
		$this->is_logged_in();
 		$this->form_validation->set_rules('product_name', 'Product Name', 'required');
		$this->form_validation->set_rules('product_price', 'Product Price', 'required');
		$this->form_validation->set_rules('product_quantity', 'Product Quantity','required');
  
		if ($this->form_validation->run() == FALSE)
		{  
  			$data['country'] = $this->dynamic_dependent_model->fetch_country();
  			$this->load->view('products_entry',$data);
 		}else{
      //print_r($_POST);
			$product_name = $this->input->post('product_name');
 			$product_price= $this->input->post('product_price');
			$product_quantity = $this->input->post('product_quantity');
			$product_description = $this->input->post('product_description');
			$admin_id = $this->input->post('admin_id');	
		  $admin_email = $this->session->userdata('email_id');
			$one_products = $this->Admin_model->count_product($admin_id); 
    	$adminstatus =  $this->Admin_model->get_admin_status($admin_id);
		  $admin_status = $adminstatus->payment_status ;
 
			if ($one_products >= 1 && $admin_status != 1  ) {
		    	
             $message = $this->session->set_flashdata("subscribe",'To Add More Product Please subscribe');
		    	 $this->load->view('products_entry',$message);
		    	 /*redirect('paystack/paystack_standard');
				*/
				}else{
 
 			// $double_pro = $this->Admin_model->get_products_number_of_admin();
 $num = rand(9999 , 0000);
   
      
      if(isset($_POST['product_image_url']) && !empty($_POST['product_image_url'])){
        $img = $_POST['product_image_url']; // Your data 'data:image/png;base64,AAAFBfj42Pj4';
        $img = str_replace('data:image/png;base64,', '', $img);
        $img = substr(explode(";",$img)[1], 7);
        $img = str_replace(' ', '+', $img);
        $data = base64_decode($img);

        $product_image = md5(rand()).'.png';

        file_put_contents('./shop/product_images/'.$product_image, $data);
      }else{
        $message = $this->session->set_flashdata("errorsss",  'Image Not Found');
        redirect('admin/products_entry',$message);
      }

      /*if (!empty($_FILES['product_image']['name'])) {
 
        $config_one = array(
            'upload_path' => './shop/product_images/',
            'allowed_types' => 'jpg|png|jpeg',
            'overwrite' => TRUE,
            'max_size' => "10048000", // Can be set to particular file size , here it is 10 MB(10048 Kb)
            'file_name' => $num."_".$_FILES['product_image']['name']
        );


          $this->load->library('upload', $config_one);
          $this->upload->initialize($config_one);
           if ($this->upload->do_upload("product_image")) {
			
 			 $product_image = $this->upload->data();
        	 $product_image = $product_image['file_name'];
 
        } else {
               
             $message = $this->session->set_flashdata("errorsss",  $this->upload->display_errors());
           
               redirect('admin/products_entry',$message);
  	    }
    }else{
             $message = $this->session->set_flashdata("errorsss",  'Image Not Found');
             redirect('admin/products_entry',$message);
            
   }*/



 			$data_insert = array(
				'product_name'=>$product_name,
				'product_image'=>$product_image,
				'product_description'=>$product_description,
 				'product_price'=>$product_price,
 				'product_quantity'=>$product_quantity,
 				'admin_id'=>$admin_id
  				);
		
		$products_unique = $this->Admin_model->check_user_is_unique($product_name,$admin_id,$data_insert);
  
 		if ($products_unique > 0){
            $message = $this->session->set_flashdata("data_inserted", 'Products Details is already exists');
            redirect('admin/products_entry', $message);
        }else{
            $result = $this->db->insert('products',$data_insert);
            if ($result)
            { 
                $message = $this->session->set_flashdata("data_inserted", 'Data Successfully Inserted');
                redirect('admin/products_entry', $message);
            }
        }
}}
	}

	public function edit_product($product_id){
		$this->is_logged_in();
 		$this->form_validation->set_rules('product_name', 'Product Name', 'required');
 		$this->form_validation->set_rules('product_price', 'Product Price', 'required');
		$this->form_validation->set_rules('product_quantity', 'Product Quantity','required');
 		
 		if($this->form_validation->run() == FALSE){ 
		 
			$data['country'] = $this->dynamic_dependent_model->fetch_country();
			$data['product'] = $this->Admin_model->get_single_product($product_id); 
 			$this->load->view('product_update',$data);
 		}else{
 			$product_id = $this->input->post('hdn_id');
			$product_name = $this->input->post('product_name');
			$product_image = $this->input->post('product_image');
			$product_price= $this->input->post('product_price');
			$product_quantity = $this->input->post('product_quantity');
			$product_description = $this->input->post('product_description');
			$admin_id = $this->input->post('admin_id');	
    $num = rand(9999 , 0000); 
    

      if(isset($_POST['product_image_url']) && !empty($_POST['product_image_url'])){
        $img = $_POST['product_image_url']; // Your data 'data:image/png;base64,AAAFBfj42Pj4';
        $img = str_replace('data:image/png;base64,', '', $img);
        $img = substr(explode(";",$img)[1], 7);
        $img = str_replace(' ', '+', $img);
        $data = base64_decode($img);

        $product_image = md5(rand()).'.png';

        file_put_contents('./shop/product_images/'.$product_image, $data);
      }else{
        $product_image = $this->input->post('old_image');
      }


/*
    if ($_FILES['product_image']['name']=='') {
   	 
    	$product_image = $this->input->post('old_image');
    }else{
 
    if (!empty($_FILES['product_image']['name'])) {
  
        $config_one = array(
            'upload_path' => './shop/product_images/',
            'allowed_types' => 'jpg|png|jpeg',
            'overwrite' => TRUE,
            'max_size' => "10048000", // Can be set to particular file size , here it is 10 MB(10048 Kb)
            'file_name' =>  $num."_".$_FILES['product_image']['name']
        );
          $this->load->library('upload', $config_one);
        $this->upload->initialize($config_one);
 
           if ($this->upload->do_upload("product_image")) {
         
            $p_image = $this->upload->data();
            $product_image = $p_image['file_name'];
        } else {
        	 
            $message = $this->session->set_flashdata("errorss",  $this->upload->display_errors());
            redirect('admin/all_producs');
         }
    }
    }*/



 			$data_update = array(
				'product_name'=>$product_name,
				'product_image'=>$product_image,
				'product_description'=>$product_description,
 				'product_price'=>$product_price,
 				'product_quantity'=>$product_quantity,
 				'admin_id'=>$admin_id
  				);
		
			 $this->db->where('product_id',$product_id);
             $this->db->update('products',$data_update);
            
                $message = $this->session->set_flashdata("data_update", 'Data Successfully Updated');
                redirect('admin/all_producs', $message);
 
   		}
	}

 
	public function sign_in(){

 		$this->form_validation->set_rules('email_id', 'User Email', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		
		if ($this->form_validation->run() == FALSE){
  			 $this->login();
 		}else{

 			  $email_id = $this->input->post('email_id');
			  $password = sha1(($this->input->post('password')));
 			  $this->Admin_model->sign_in($email_id,$password);
		}
	}


	public function dashboard()
	{
		$this->is_logged_in();
		redirect('admin/update_shop_details');
	}
	
	public function all_producs()
	{
		$this->is_logged_in();
		$admin_id =$this->session->userdata('admin_id');
 		$data['products'] = $this->Admin_model->get_all_products_detail($admin_id);
  	    $this->load->view('all_products',$data);
	}
 	
	public function edit_user_detail()
	{
		$this->is_logged_in();
		$user_id = $this->uri->segment(3) ;
		$user_data['user_data'] = $this->Admin_model->edit_user_detail($user_id);
		$this->load->view('edit_user_details',$user_data);
	}


	
 

	public function logout()
	{
		$this->is_logged_in();
		$this->session->sess_destroy();
		redirect(base_url());
	}

public function proooo(){

 		$admin_id =$this->session->userdata('admin_id');
 		$uri = $this->uri->segment(3); // 1stsegment
  		$data['products'] = $this->Admin_model->get_all_products_detail_pwa($uri);
 	    $this->load->view('mysite',$data);
}

public function update_shop_details(){
//design:- Homepage me heading chipak rhi hai 
//Add Business Details me design gadbad hai

		$this->is_logged_in();
 		$this->form_validation->set_rules('Business_Name', 'Product Name', 'required');
		$this->form_validation->set_rules('Short_Description', 'Product Price', 'required');
 		
		if ($this->form_validation->run() == FALSE){ 
			  $admin_id =$this->session->userdata('admin_id');
 			$data['details'] = $this->Admin_model->get_business_details($admin_id); 
  			$this->load->view('update_business' , $data);
 		}else{
			$admin_id =$this->session->userdata('admin_id');
 			$hdn_id =$this->input->post('hdn_id');
			$hdn_logo =$this->input->post('hdn_logo');
			$hdn_bg_logo =$this->input->post('hdn_bg_logo');
 			$Business_Name = $this->input->post('Business_Name');
 			$Short_Description= $this->input->post('Short_Description');
			$Business_deal_heading = $this->input->post('Business_deal_heading');
 			$address1 = $this->input->post('address1');
        	$address2 = $this->input->post('address2');  
			$facebook = $this->input->post('facebook');
			$instagram = $this->input->post('instagram');
			$tweeter = $this->input->post('tweeter');
			$youtube = $this->input->post('youtube');
			$header_color = $this->input->post('header_color');
      $header_txt_color = $this->input->post('header_txt_color');
      $button_color = $this->input->post('button_color');
      $button_txt_color = $this->input->post('button_txt_color');
			$back_color = $this->input->post('back_color');
			$footer_color = $this->input->post('footer_color');			
      $footer_txt_color = $this->input->post('footer_txt_color');     
      $footer_social_color = $this->input->post('footer_social_color');     
        	$num = rand(99999,00000);
      

      

      if(isset($_POST['Business_logo_url']) && !empty($_POST['Business_logo_url'])){
        $img = $_POST['Business_logo_url']; // Your data 'data:image/png;base64,AAAFBfj42Pj4';
        $img = str_replace('data:image/png;base64,', '', $img);
        $img = substr(explode(";",$img)[1], 7);
        $img = str_replace(' ', '+', $img);
        $data = base64_decode($img);

        $Business_logo = md5(rand()).'.png';

        file_put_contents('./shop/shop_image/'.$Business_logo, $data);
      }else{
        $Business_logo = $hdn_logo ;  
      }

     /*if (!empty($_FILES['Business_logo']['name'])) {
         $config_one = array(
            'upload_path' => './shop/shop_image/',
            'allowed_types' => 'jpg|png|jpeg',
            'overwrite' => TRUE,
            'max_size' => "10048000", // Can be set to particular file size , here it is 10 MB(10048 Kb)
            'file_name' =>  $num."_".$_FILES['Business_logo']['name']
        );


          $this->load->library('upload', $config_one);
          $this->upload->initialize($config_one);
 
           if ($this->upload->do_upload("Business_logo")) {
         
             $Business_logo = $this->upload->data();
        	 $Business_logo = $Business_logo['file_name'];
        } else {
              $message = array('errors' => $this->upload->display_errors());
	    }
    }else{
              $Business_logo = $hdn_logo ;  
   }*/

   /*if (!empty($_FILES['background_image']['name'])) {
         $config_one = array(
            'upload_path' => './shop/shop_business/',
            'allowed_types' => 'jpg|png|jpeg',
            'overwrite' => TRUE,
            'max_size' => "10048000", // Can be set to particular file size , here it is 10 MB(10048 Kb)
            'file_name' =>  $num."_".$_FILES['background_image']['name']
        );


          $this->load->library('upload', $config_one);
          $this->upload->initialize($config_one);
 
           if ($this->upload->do_upload("background_image")) {
         
             $background_image = $this->upload->data();
        	 $background_image = $background_image['file_name'];
        } else {
              $message = array('errors' => $this->upload->display_errors());
	    }
    }else{
              $background_image = $hdn_bg_logo ;  
   }*/

        if(isset($_POST['background_image_url']) && !empty($_POST['background_image_url'])){
          $img = $_POST['background_image_url']; // Your data 'data:image/png;base64,AAAFBfj42Pj4';
          $img = str_replace('data:image/png;base64,', '', $img);
          $img = substr(explode(";",$img)[1], 7);
          $img = str_replace(' ', '+', $img);
          $data = base64_decode($img);

          $background_image = md5(rand()).'.png';

          file_put_contents('./shop/shop_business/'.$background_image, $data);
        }else{
          $background_image = $hdn_bg_logo ; 
        }


  			$data_update = array(
 				'Business_Name'=>$Business_Name,
				'Short_Description'=>$Short_Description,
 				'Business_deal_heading'=>$Business_deal_heading,
  			 	'Business_logo'=>$Business_logo,
  				'admin_id' =>$admin_id,
  				'address1' => $address1,
       			'address2' => $address2,
				'facebook'=>$facebook,
				'instagram'=>$instagram,
				'tweeter'=>$tweeter,
				'youtube'=>$youtube ,
				'background_image'=>$background_image,
				'header_color'=>$header_color,
        'header_txt_color'=>$header_txt_color,
        'button_color'=>$button_color,
        'button_txt_color'=>$button_txt_color,
				'back_color'=>$back_color,
				'footer_color'=>$footer_color,       
        'footer_txt_color'=>$footer_txt_color,       
        'footer_social_color'=>$footer_social_color       
  			);

     		 $this->db->where('shop_details_id',$hdn_id);
             $this->db->update('shop_details',$data_update);
 			$message = $this->session->set_flashdata("data_update", 'Data  Successfully Updated');
			redirect('admin/shop_style', $message);
 }
 
}

public function create_folder(){

mkdir('shop/shop_business', 0777, true);
chmod('shop/shop_business',  0777);

}

public function create_files(){
$file = fopen('application/views/shop/service-worker.js','w') or die("Unable to open file!");
chmod('application/views/shop/service-worker.js', 0777);
$txt =" file code which you wnt";
}
 

  public function shop_style(){
  	$admin_id =$this->session->userdata('admin_id');
  	$data['details'] = $this->Admin_model->get_business_details($admin_id); 
    if( $data['details']->payment_status == 1){
        $this->load->view('site_style', $data);
    }
    else{
      $data['storeNotice'] = 'Please subscribe to PRO so that you can custmize your store';
      $this->load->view('site_notice', $data);
    }  

  }
 
public function vartemp()
 {
 	$this->load->view('vartemp');
 } 

public function pricing(){
	
 	$this->load->view('pricing');
 } 


public function chnagenumber()
{
	 $admin_id =$this->session->userdata('admin_id');
	$data['profile'] = $this->Admin_model->get_profile_details($admin_id); 
	$data['country'] = $this->dynamic_dependent_model->fetch_country();
	$this->load->view('whatsappprofile',$data);
}
public function chnagepassword()
{
	$admin_id = $this->session->userdata('admin_id');
	$data['country'] = $this->dynamic_dependent_model->fetch_country();
	$data['profile'] = $this->Admin_model->get_profile_details($admin_id); 
	$this->load->view('passwordprofile',$data);
}

	

public function changeWhatsappNumber(){
	$this->is_logged_in();
        $this->form_validation->set_rules('WhatsappNumber', 'New Password', 'trim|required|min_length[8]|integer',array('integer'=>'Please Use Only Numerical Value.'));

          if ($this->form_validation->run() == FALSE) {
            $message = $this->session->set_flashdata('WhatsappNumber','Please Insert required filed');
             $this->load->view('signup',$message);
        } else {

            $admin_id = $this->session->userdata('admin_id');
            $country_id = $this->input->post('Selcountry');
            $CountryCode = $this->input->post('CountryCodes');
            $WhatsappNumber = $this->input->post('WhatsappNumber');

  $emailcode  = mt_rand(1000, 999999);

  $mobile = $CountryCode.$WhatsappNumber;
  $message = 'Use This Code To Verify Your Whatsapp Number'.' '.$emailcode;  

$sms =   $this->africastalking->sendMessage($mobile, $message);
   $data_update = array(
                'emailcode' => $emailcode,
               );
  $update = $this->Admin_model->Whatsapp_number_update($admin_id,$data_update);

                if ($update) {
                $this->load->view('new_mobile_pas',['country_id'=>$country_id,'CountryCode'=>$CountryCode,'mobile_number'=>$WhatsappNumber,'sms'=>$emailcode]);
              
              }else{
                $message = $this->session->set_flashdata('Fmessage','Failed to change number');
                redirect('admin/update_shop_details',$message);

              }

          }
      
    }


public function VerifyNewPassword(){
 	  
			$admin_id = $this->session->userdata('admin_id');
            $country_id = $this->input->post('country_id');
            $CountryCode = $this->input->post('CountryCode');
            $mobile_number = $this->input->post('mobile_number');
            $varification = $this->input->post('newNumber');


 
 	   $data_update = array(
                'emailcode' => $varification,
				'country_id' => $country_id,
				'CountryCode' => $CountryCode,
				'mobile_number' => $mobile_number
               );

   $update = $this->Admin_model->number_update($varification,$data_update);

                if ($update) {
                $message = $this->session->set_flashdata('message','Whatsapp number has been updated');
                redirect('admin/update_shop_details',$message);
              }else{
                $message = $this->session->set_flashdata('Fmessage','Verification number is wrong');
                redirect('admin/update_shop_details',$message);

              }

 }
     

 
public function chnage_admin_password(){
	$this->is_logged_in();
        $this->form_validation->set_rules('oldpassword', 'Old Password', 'trim|required');
        $this->form_validation->set_rules('newpassword', 'New Password', 'trim|required');
        $this->form_validation->set_rules('confirmpassword', 'Confirm Password', 'required|matches[newpassword]', array('matches' => 'Password and confirm password can not be different'));

          if ($this->form_validation->run() == FALSE) {
            
          $message = $this->session->set_flashdata('Fmessage','Please insert required fields');
          	
          	$this->load->view('passwordprofile');
        } else {

	$password = sha1($this->input->post('oldpassword'));
    $admin_id = $this->session->userdata('admin_id');
$this->db->select('*')->from('admin_registration')->where('password',$password)->where('admin_id',$admin_id);
$q= $this->db->get();
$num_row = $q->num_rows();
if ($num_row == 0) {
	$message = $this->session->set_flashdata('Fmessage','Old password is not matched with you entered password');
	redirect('admin/update_shop_details',$message);
}else{
            $newpassword = sha1($this->input->post('newpassword'));
            $salt = $this->input->post('newpassword');

               $data_update = array(
                'password' => $newpassword,
                'salt' => $salt
              );
              $update = $this->Admin_model->Whatsapp_number_update($admin_id,$data_update);
          
              if ($update) {
                $message = $this->session->set_flashdata('message','Password has been changed');
               redirect('admin/update_shop_details',$message);
              }else{
                $message = $this->session->set_flashdata('Fmessage','Failed to update password');
               	redirect('admin/update_shop_details',$message);

              }

          }
      }
      
    }


    function paymentLogin(){
      $authToken = $this->uri->segment(2);
      $this->Admin_model->paymentLogin($authToken);
    }


 


}