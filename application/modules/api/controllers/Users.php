<?php
		if(!defined('BASEPATH')) exit('No direct script access allowed');

		class Users extends commonService {

		function __construct() {
		parent::__construct();
		$this->load->model('Admin_model');
		$this->load->model('dynamic_dependent_model');
		$this->load->library('africastalking');
		}



	public function registration_post(){

  		$this->form_validation->set_rules('password', 'password', 'trim|required');
		$this->form_validation->set_rules('email', 'email', 'trim|required|is_unique[admin_registration.email_id]',array('is_unique'=>'Email Id Is Already Exist.'));
		$this->form_validation->set_rules('phone', 'Phone', 'trim|required|min_length[8]|integer',array('integer'=>'Please Use Only Numerical Value.'));
		$this->form_validation->set_rules('shop_name', 'Shop Name', 'trim|required|alpha_numeric|is_unique[admin_registration.shop_name]' ,array('alpha_numeric' => 'Your Shop Name Must Contain Number And Alphabet Only.', 'is_unique'=>'Shop name is taken please choose another one'));
		// $this->form_validation->set_rules('phone', 'Phone', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$response = array('status' => FAIL, 'message' => strip_tags(validation_errors()));
			$this->response($response);                        
		}else{
			$admin_link    = base_url("/shop/index/".$this->input->post('shop_name'));
			$admin_name    = random_string('alnum', 8);
			$shop_name     = $this->input->post('shop_name');
			$password      = sha1(($this->input->post('password')));
			$email_id      = $this->input->post('email');
			$mobile_number = $this->input->post('phone');
			$CountryCodes = $this->input->post('CountryCodes');
			$country_id    = $this->input->post('Selcountry');
			$state_id      = $this->input->post('Selstate');
			$salt          = $this->input->post('password');
			$emailcode  = mt_rand(000000, 999999);

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
					'authToken'=> 'webapp_'.md5(rand()),
					'emailcode'=>$emailcode,
					'status' =>'inactive'
				);
					$mobile = $CountryCodes.$mobile_number;
					$message = 'Use This Code To Verify Your Whatsapp Number'.' '.$emailcode;  
					$sms =   $this->africastalking->sendMessage($mobile, $message);
					 					
					if($sms){
						$check_user_is_unique = $this->Admin_model->check_admin_is_unique($admin_name, $email_id,$shop_name,$data_insert);
						 if (!empty($check_user_is_unique) || $check_user_is_unique != FALSE ) {
								$message = ResponseMessages::getStatusCodeMessage(106);
								$response = array('status' => SUCCESS, 'message' => $message, 'data' => array('admin_id' => $check_user_is_unique, 'otp'=>$emailcode));
						 }else{
								$message = ResponseMessages::getStatusCodeMessage(155);
								$response = array('status' => FAIL, 'message' => $message);
						 }
					}else{
						$message = $this->session->set_flashdata('Sent','We Can"t sent You Message');
						 $message = ResponseMessages::getStatusCodeMessage(155);
						$response = array('status' => FAIL, 'message' => $message);
					}
			}
			$this->response($response);
	}




	public function sign_in_post(){

		$this->form_validation->set_rules('email_id', 'User Email', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if ($this->form_validation->run() == FALSE){
			$message = ResponseMessages::getStatusCodeMessage(119);
			$response = array('status' => FAIL, 'message' => $message);
		}else{

			$email_id = $this->input->post('email_id');
			$password = sha1(($this->input->post('password')));
			$data =  $this->Admin_model->sign_in($email_id,$password);
			if ($data != FALSE) {
				$message = ResponseMessages::getStatusCodeMessage(106);
				$response = array('status' => SUCCESS, 'message' => $message, 'data' => $data);
			}else{
				$message = ResponseMessages::getStatusCodeMessage(105);
				$response = array('status' => FAIL, 'message' => $message);
			}
		}
		$this->response($response);
	}

		public function getAllCountry_get(){
		$data = $this->Admin_model->fetch_country();
 		$message = ResponseMessages::getStatusCodeMessage(302);
		$response = array('status' => SUCCESS, 'message' => $message, 'data' => $data);
		$this->response($response);
		}
 
 		public function products_entry_post(){
			$this->check_service_auth();
			$this->form_validation->set_rules('product_name', 'Product Name', 'required');
			$this->form_validation->set_rules('product_price', 'Product Price', 'required');
 
			if ($this->form_validation->run() == FALSE){
				$response = array('status' => FAIL, 'message' => strip_tags(validation_errors()));
				$this->response($response);             
			}else{
				$admin_id = $this->authData->admin_id;
				//pr($this->authData->payment_status);

				if($this->authData->payment_status != 1){
					$check = $this->db->get_where('products',array('admin_id' => $this->authData->admin_id))->row_array();
					if(isset($check) && !empty($check)){
						$response = array('status' => FAIL, 'message' => 'Please subscribe to add more products.');
						$this->response($response);die();
					}
				}

				$product_name = $this->input->post('product_name');
				$product_price= $this->input->post('product_price');
				$currency = $this->input->post('currency');
				$product_description = $this->input->post('product_description');
				$one_products = $this->Admin_model->count_product($admin_id); 
				$adminstatus =  $this->Admin_model->get_admin_status($admin_id);
				$admin_status = $adminstatus->payment_status ;

				if ($one_products == 1 && $admin_status != 1  ) {
					$response = array('status' => FAIL, 'message' => 'To Add More Product Please subscribe');
					$this->response($response);             
				}else{
 
 					if(isset($_FILES['productImage']) && !empty($_FILES['productImage'])){
						$image2 = $this->image_model->updateMedia('productImage','product_images');
						if(is_array($image2)){
							$message = array('status' => FAIL,'message' => 'Please select another product image');
							$this->response($message); 
						}
					}
					$data_insert = array(
						'product_name'=>$product_name,
						'product_image'=>$image2,
						'product_description'=>$product_description,
						'product_price'=>$product_price,
						'product_quantity'=>$currency,
						'admin_id'=>$admin_id
					);
					$products_unique = $this->Admin_model->check_user_is_unique($product_name,$admin_id,$data_insert);
					
					if ($products_unique > 0){
						$response = array('status'=>FAIL,'message'=>'You have already enter this product name');
						$this->response($response); 
					}else{
						$result = $this->db->insert('products',$data_insert);
						if ($result){ 
							$message = ResponseMessages::getStatusCodeMessage(155);
							$response = array('status' => SUCCESS, 'message' => $message);
							$this->response($response); 
						}
					}
				}
			}
		}



				public function email_verfiy_post(){
 
 					$emailcode  = $this->input->post('emailcode');
 					$admin_id  = $this->input->post('admin_id');

					if($emailcode != ''){

						$data = $this->db->get_where(ADMIN,array('emailcode'=>$emailcode ,'admin_id'=>$admin_id))->row_array();
   							if (!empty($data)) {
									$this->db->set('status','active')->where('emailcode',$emailcode,'admin_id',$admin_id)->update('admin_registration');
 									$message = ResponseMessages::getStatusCodeMessage(814);
									$response = array('status' => SUCCESS, 'message' => $message);
 							}else{

									$message = ResponseMessages::getStatusCodeMessage(815);
									$response = array('status' => FAIL, 'message' => $message);
 							}
  					}else{
 						$message = ResponseMessages::getStatusCodeMessage(815);
						$response = array('status' => FAIL, 'message' => $message);
						$this->response($response); 
 					}

					$this->response($response); 
				}


			

			public function all_producs_post(){
				$this->check_service_auth();
				$admin_id = $this->authData->admin_id;
 				$data = $this->Admin_model->get_all_products_detail($admin_id);

				if (isset($data)) {
					$message = ResponseMessages::getStatusCodeMessage(169);
					$response = array('status' => SUCCESS, 'message' => $message, 'data' => $data);
				}else{
					$message = ResponseMessages::getStatusCodeMessage(168);
					$response = array('status' => FAIL, 'message' => $message);
				}
 				$this->response($response); 
			}


		public function getSingleProduct_post(){
			$this->check_service_auth();
			$product_id = $this->input->post('productId');
			$admin_id = $this->authData->admin_id;
			$data = $this->Admin_model->get_single_product($product_id,$admin_id); 
 				if (isset($data)) {
					$message = ResponseMessages::getStatusCodeMessage(169);
					$response = array('status' => SUCCESS, 'message' => $message, 'data' => $data);
				}else{
					$message = ResponseMessages::getStatusCodeMessage(168);
					$response = array('status' => FAIL, 'message' => $message);
				}
 				$this->response($response); 


		}


	public function edit_product_post(){
		$this->check_service_auth();
		$this->form_validation->set_rules('product_name', 'Product Name', 'required');
		$this->form_validation->set_rules('product_price', 'Product Price', 'required');
		$this->form_validation->set_rules('product_id', 'Product Id', 'required',array('required' =>'Product id can not be null' , ));
 
		if($this->form_validation->run() == FALSE){ 

			$response = array('status' => FAIL, 'message' => strip_tags(validation_errors()));

		}else{
			$admin_id = $this->authData->admin_id;
			$product_name = $this->input->post('product_name');
			$product_id = $this->input->post('product_id');
			$product_price= $this->input->post('product_price');
			$currency = $this->input->post('currency');
			$product_description = $this->input->post('product_description');

			$num = rand(9999 , 0000); 
   			$data_update = array(
				'product_name'=>$product_name,
 				'product_description'=>$product_description,
				'product_price'=>$product_price,
				'product_quantity'=>$currency,
 			);

   			if(isset($_FILES['productImage']) && !empty($_FILES['productImage'])){
					$image2 = $this->image_model->updateMedia('productImage','product_images');
				if(is_array($image2)){
						$message = array('status' => FAIL,'message' => 'Please select another product image');
						$this->response($message); 
					}
						$data_update['product_image'] = $image2;
 				}
  			$data = $this->Admin_model->updateProduct(array('product_id'=>$product_id,'admin_id'=>$admin_id),$data_update);
  			if($data){
 					$message = ResponseMessages::getStatusCodeMessage(816);
					$response = array('status' => SUCCESS, 'message' => $message);
 			}else{
 				$message = ResponseMessages::getStatusCodeMessage(817);
				$response = array('status' => FAIL, 'message' => $message);
 			}
  		}

		$this->response($response); 
	}



		public function updateWhatsappNumber_post(){
			$this->check_service_auth();
			$this->form_validation->set_rules('phone', 'phone number', 'trim|required|min_length[8]|integer',array('integer'=>'Please Use Only Numerical Value.'));

			if($this->form_validation->run() == FALSE) {
				$response = array('status' => FAIL, 'message' => strip_tags(validation_errors()));
			}else{
				$admin_id = $this->authData->admin_id;
				$country_id = $this->input->post('Selcountry');
				$CountryCode = $this->input->post('CountryCodes');
				$WhatsappNumber = $this->input->post('phone');
				$emailcode  = mt_rand(000000, 999999);
				$mobile = $CountryCode.$WhatsappNumber;
				$message = 'Use This Code To Verify Your Whatsapp Number'.' '.$emailcode;  
				// $sms =   $this->africastalking->sendMessage($mobile, $message);
				$update = $this->Admin_model->Whatsapp_number_update(array('admin_id'=> $admin_id,),array('emailcode' => $emailcode,'status'=>'inactive'));
				if($update){
 					$message = ResponseMessages::getStatusCodeMessage(818);
					$response = array('status' => SUCCESS, 'message' => $message , 'emailcode'=>$emailcode);
	 			}else{
	 				$message = ResponseMessages::getStatusCodeMessage(819);
					$response = array('status' => FAIL, 'message' => $message);
	 			}
 			}
 			$this->response($response);
		}

		public function deleteProduct_post(){
			$this->check_service_auth();
			$this->form_validation->set_rules('product_id', 'Product Id', 'required',array('required' =>'Product id can not be null' , ));

				if($this->form_validation->run() == FALSE) {
					$response = array('status' => FAIL, 'message' => strip_tags(validation_errors()));
			}else{
				$admin_id = $this->authData->admin_id;
				$product_id =$this->input->post('product_id');
				$data = $this->db->where(array('admin_id' =>$admin_id,'product_id'=>$product_id))->delete(PRODUCTS);	
				if($data){
 					$message = ResponseMessages::getStatusCodeMessage(820);
					$response = array('status' => SUCCESS, 'message' => $message);
	 			}else{
	 				$message = ResponseMessages::getStatusCodeMessage(821);
					$response = array('status' => FAIL, 'message' => $message);
	 			}
			}
		$this->response($response);
	}

    public function updateShopLogo_post(){
        $this->check_service_auth();
        $data_update = array();
        if(isset($_FILES['business_logo']) && !empty($_FILES['business_logo'])){
            $business_logo = $this->image_model->updateMedia('business_logo','shop_image');
            if(is_array($business_logo)){
                $message = array('status' => FAIL,'message' => 'Please select another business Logo image');
                $this->response($message); 
            }
            $data_update['business_logo'] = $business_logo;
        }
        
        if(isset($data_update) && !empty($data_update)){
            $admin_id = $this->authData->admin_id;
            $update = $this->Admin_model->updateShop(array('admin_id'=> $admin_id,),$data_update);
        }else{
            $update = false;
        }
        
        if($update){
            $message = ResponseMessages::getStatusCodeMessage(822);
            $response = array('status' => SUCCESS, 'message' => $message);
        }else{
            $message = ResponseMessages::getStatusCodeMessage(823);
            $response = array('status' => FAIL, 'message' => $message);
        }
        $this->response($response);
    }


	public function updateShopDetails_post(){
 	 	$this->check_service_auth();
		$this->form_validation->set_rules('business_Name', 'Product Name', 'required');
		$this->form_validation->set_rules('short_Description', 'Product Price', 'required');

		if ($this->form_validation->run() == FALSE){ 
			$response = array('status' => FAIL, 'message' => strip_tags(validation_errors())); 
		}else{
			$admin_id = $this->authData->admin_id;
   			$business_Name = $this->input->post('business_Name');
			$short_Description= $this->input->post('short_Description');
			$business_deal_heading = $this->input->post('business_deal_heading');
			$address1 = $this->input->post('address1');
			$address2 = $this->input->post('address2');  
			$facebook = $this->input->post('facebook');
			$instagram = $this->input->post('instagram');
			$tweeter = $this->input->post('tweeter');
			$youtube = $this->input->post('youtube');
			 	
 				

 			$data_update = array(
				'Business_Name'=>$business_Name,
				'Short_Description'=>$short_Description,
				'Business_deal_heading'=>$business_deal_heading,
		 		'admin_id' =>$admin_id,
				'address1' => $address1,
				'address2' => $address2,
				'facebook'=>$facebook,
				'instagram'=>$instagram,
				'tweeter'=>$tweeter,
				'youtube'=>$youtube ,
 			);

 			if(isset($_FILES['business_logo']) && !empty($_FILES['business_logo'])){
					$business_logo = $this->image_model->updateMedia('business_logo','shop_image');
					if(is_array($business_logo)){
						$message = array('status' => FAIL,'message' => 'Please select another business Logo image');
						$this->response($message); 
					}
						$data_update['business_logo'] = $business_logo;
				}

				
			
			$update = $this->Admin_model->updateShop(array('admin_id'=> $admin_id,),$data_update);
				if($update){
 					$message = ResponseMessages::getStatusCodeMessage(822);
					$response = array('status' => SUCCESS, 'message' => $message);
	 			}else{
	 				$message = ResponseMessages::getStatusCodeMessage(823);
					$response = array('status' => FAIL, 'message' => $message);
	 			}
 			}
 			$this->response($response);
		
	}

 	public function updateShopDesign_post(){
 	 	$this->check_service_auth();
 			$admin_id = $this->authData->admin_id;
			$header_color = $this->input->post('header_color');
			$footer_color = $this->input->post('footer_color');	

			$back_color = $this->input->post('back_color');
			$button_color = $this->input->post('button_color');	
			$footer_txt_color = $this->input->post('footer_txt_color');	
			$footer_social_color = $this->input->post('footer_social_color');	
			$button_txt_color = $this->input->post('button_txt_color');	
			$header_txt_color = $this->input->post('header_txt_color');	
			
			/*
			header_color
			footer_color
			back_color
			button_color

			footer_txt_color
			footer_social_color
			
			button_txt_color
			*/

			$data_update = array();				
				
			if ($header_color != '') {
				$data_update['header_color']=$header_color;
			}	

			if ($back_color != '') {
				$data_update['back_color']=$back_color;
			}

			if ($footer_color != '') {
				$data_update['footer_color']=$footer_color;
			}
			
			if ($button_color != '') {
				$data_update['button_color']= $button_color;
			}

			if ($footer_txt_color != '') {
				$data_update['footer_txt_color']= $footer_txt_color;
			}

			if ($footer_social_color != '') {
				$data_update['footer_social_color']= $footer_social_color;
			}

			if ($button_txt_color != '') {
				$data_update['button_txt_color']= $button_txt_color;
			}

			if ($header_txt_color != '') {
				$data_update['header_txt_color']= $header_txt_color;
			}

 		
 			if(isset($_FILES['background_image']) && !empty($_FILES['background_image'])){
					$background_image = $this->image_model->updateMedia('background_image','shop_business');
					if(is_array($background_image)){
						$message = array('status' => FAIL,'message' => 'Please select another background image');
						$this->response($message); 
					}
						$data_update['background_image'] = $background_image;
 				}

  			$update = $this->Admin_model->updateShop(array('admin_id'=> $admin_id,),$data_update);
				if($update){
 					$message = ResponseMessages::getStatusCodeMessage(822);
					$response = array('status' => SUCCESS, 'message' => $message);
	 			}else{
	 				$message = ResponseMessages::getStatusCodeMessage(823);
					$response = array('status' => FAIL, 'message' => $message);
	 			}
 			$this->response($response);
 		}


		public function updatePassword_post(){
			$this->check_service_auth();
			$admin_id = $this->authData->admin_id;

			$old_password = sha1($this->input->post('old_password'));
			$new_password = sha1($this->input->post('new_password'));
			$salt = $this->input->post('new_password');

			$update =$this->Admin_model->checkUserNUpdatePwd(array('password'=>$old_password,'admin_id'=>$admin_id),array('password'=>$new_password,'salt'=>$salt));

 			if($update){
				$message = ResponseMessages::getStatusCodeMessage(140);
				$response = array('status' => SUCCESS, 'message' => $message);
			}else{
				$message = ResponseMessages::getStatusCodeMessage(141);
				$response = array('status' => FAIL, 'message' => $message);
			}
 			$this->response($response);
}



public function forgotPasswordOtpSend_post(){
		
		$this->form_validation->set_rules('email_id', 'Email', 'trim|required');
		
		if ($this->form_validation->run() == FALSE) {
			$response = array('status' => FAIL, 'message' => strip_tags(validation_errors())); 
		}else{
			$email_id = $this->input->post('email_id');
 			 $data = $this->Admin_model->checkUser(array('email_id' => $email_id));
 			 if (empty($data) || $data == FALSE ) {
			 	$message = ResponseMessages::getStatusCodeMessage(511);
				$response = array('status' => FAIL, 'message' => $message);
 			 }else{
  				$CountryCode = $data->CountryCode;
				$mobile_number = $data->mobile_number;
 				$emailcode  = mt_rand(000000, 999999);
 				$mobile = $CountryCode.$mobile_number;
				$updateData = $this->Admin_model->forgotPasswordUpdate(array('email_id' => $email_id),array('f_password'=>$emailcode));
 				if ($updateData) {
 				    $message = 'Use This Code To Verify Your Account'.' '.$emailcode;  
 				    $sms =   $this->africastalking->sendMessage($mobile, $message);
 				    
 					$message = ResponseMessages::getStatusCodeMessage(818);
					$response = array('status' => SUCCESS, 'message' => $message, 'emailcode'=> $emailcode ,'data'=>$data );
 				}else{
 					$message = ResponseMessages::getStatusCodeMessage(819);
					$response = array('status' => FAIL, 'message' => $message);
 				}
  			}
 		} 
		$this->response($response);
  	}


	public function fPasswordOtpMatchUpdate_post(){
		$this->check_service_auth();
		$emailcode  = $this->input->post('emailcode');
		$admin_id = $this->authData->admin_id;
		$new_password = sha1($this->input->post('new_password'));
		$salt = $this->input->post('new_password');

		$data = $this->db->get_where(ADMIN,array('f_password'=>$emailcode ,'admin_id'=>$admin_id))->row_array();
	
		if(!empty($data)) {
			$update =$this->Admin_model->forgotPasswordUpdate(array('admin_id'=>$admin_id,'status'=>'active'),array('password'=>$new_password,'salt'=>$salt));
			$message = ResponseMessages::getStatusCodeMessage(140);
			$response = array('status' => SUCCESS, 'message' => $message);
		}else{
			$message = ResponseMessages::getStatusCodeMessage(815);
			$response = array('status' => FAIL, 'message' => $message);
		}

		$this->response($response); 
	}

	public function paymentStatus_post(){
		$this->check_service_auth();
		$admin_id = $this->authData->admin_id;
		$data = $this->Admin_model->payemntUpdate(array('admin_id'=>$admin_id),array('payment_status' =>'1'));
		if ($data) {
		$message = ResponseMessages::getStatusCodeMessage(824);
			$response = array('status' => SUCCESS, 'message' => $message);
		}else{
			$message = ResponseMessages::getStatusCodeMessage(825);
			$response = array('status' => FAIL, 'message' => $message);
		}
 		$this->response($response); 
	}

	public function updateProfile_post(){
		$this->check_service_auth();
		$admin_id = $this->authData->admin_id;
		$emailId =$this->input->post('emailId');
		$shopName =$this->input->post('shopName');

		$admin_link    = base_url("/shop/index/".$shopName);


		$data_update =array();  
		if (isset($shopName) AND !empty($shopName)) {
			$data_update['shop_name'] = $shopName;			
			$data_update['admin_link']= $admin_link;			
		}
		if (isset($emailId) AND !empty($emailId)) {
			$data_update['email_id'] = $emailId;			
		}


		$data = $this->Admin_model->profileUpdate(array('email_id' =>$emailId,'admin_id !='=>$admin_id));
		$data1 = $this->Admin_model->profileUpdate(array('shop_name' =>$shopName,'admin_id !='=>$admin_id));
 		if ($data != TRUE) {
			$message = ResponseMessages::getStatusCodeMessage(826);
			$response = array('status' => FAIL, 'message' => $message);
		}elseif($data1 != TRUE){
			$message = ResponseMessages::getStatusCodeMessage(827);
			$response = array('status' => FAIL, 'message' => $message);
		}else{
			$this->db->update(ADMIN,$data_update,array('admin_id' =>$admin_id));
			$message = ResponseMessages::getStatusCodeMessage(828);
			$response = array('status' => SUCCESS, 'message' => $message);
		}
		$this->response($response); 
	}


public function getProfile_post(){
	$this->check_service_auth();
	$admin_id = $this->authData->admin_id;
	$data = $this->Admin_model->profileDetail(array('admin_id' =>$admin_id));
	$message = ResponseMessages::getStatusCodeMessage(169);
	$response = array('status' => SUCCESS, 'message' => $message,'data'=>$data);
	$this->response($response); 

}

		/*public function FupdatePassword_post(){
			$this->check_service_auth();
			$admin_id = $this->authData->admin_id;
			$new_password = sha1($this->input->post('new_password'));
			$salt = $this->input->post('new_password');
			$check = $this->Admin_model->checkUser(array('admin_id'=>$admin_id,'status'=>'active'));
			if (isset($check) || !empty($check)) {
				$update =$this->Admin_model->forgotPasswordUpdate(array('admin_id'=>$admin_id,'status'=>'active'),array('password'=>$new_password,'salt'=>$salt));
				if($update){
					$message = ResponseMessages::getStatusCodeMessage(140);
					$response = array('status' => SUCCESS, 'message' => $message);
				}else{
					$message = ResponseMessages::getStatusCodeMessage(149);
					$response = array('status' => FAIL, 'message' => $message);
				}
			}else{
				$message = ResponseMessages::getStatusCodeMessage(198);
				$response = array('status' => FAIL, 'message' => $message);
			}
 			$this->response($response);
		}
*/
 		
	


	

	public function getBusinessDetail_post(){
		$this->check_service_auth();
		$admin_id = $this->authData->admin_id;
		$data = $this->Admin_model->get_business_details($admin_id); 
		if (isset($data)) {
			$message = ResponseMessages::getStatusCodeMessage(169);
			$response = array('status' => SUCCESS, 'message' => $message, 'data' => $data);
		}else{
			$message = ResponseMessages::getStatusCodeMessage(168);
			$response = array('status' => FAIL, 'message' => $message);
		}
		$this->response($response); 
	}


}

?>