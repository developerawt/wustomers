<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends commonService
{

    function __construct()
    {
        parent::__construct();
        $this
            ->load
            ->model('Admin_model');
        $this
            ->load
            ->model('dynamic_dependent_model');
        $this
            ->load
            ->library('africastalking');
    }

    public function registration_post()
    {

        $this
            ->form_validation
            ->set_rules('password', 'password', 'trim|required');
        $this
            ->form_validation
            ->set_rules('email', 'email', 'trim|required|is_unique[admin_registration.email_id]', array(
            'is_unique' => 'Email Id Is Already Exist.'
        ));
        $this
            ->form_validation
            ->set_rules('phone', 'Phone', 'trim|required|min_length[8]|integer', array(
            'integer' => 'Please Use Only Numerical Value.'
        ));
        $this
            ->form_validation
            ->set_rules('shop_name', 'Shop Name', 'trim|required|alpha_numeric|is_unique[admin_registration.shop_name]', array(
            'alpha_numeric' => 'Your Shop Name Must Contain Number And Alphabet Only.',
            'is_unique' => 'Shop name is taken please choose another one'
        ));
        // $this->form_validation->set_rules('phone', 'Phone', 'trim|required');
        if ($this
            ->form_validation
            ->run() == false)
        {
            $response = array(
                'status' => FAIL,
                'message' => strip_tags(validation_errors())
            );
            $this->response($response);
        }
        else
        {
            $admin_link = base_url("/shop/index/" . $this
                ->input
                ->post('shop_name'));
            $admin_name = random_string('alnum', 8);
            $shop_name = $this
                ->input
                ->post('shop_name');
            $password = sha1(($this
                ->input
                ->post('password')));
            $email_id = $this
                ->input
                ->post('email');
            $mobile_number = $this
                ->input
                ->post('phone');
            $CountryCodes = $this
                ->input
                ->post('CountryCodes');
            $country_id = $this
                ->input
                ->post('Selcountry');
            $state_id = $this
                ->input
                ->post('Selstate');
            $salt = $this
                ->input
                ->post('password');
            $emailcode = mt_rand(000000, 999999);

            $data_insert = array(
                'admin_link' => $admin_link,
                'admin_name' => $admin_name,
                'password' => $password,
                'email_id' => $email_id,
                'shop_name' => $shop_name,
                'CountryCode' => $CountryCodes,
                'mobile_number' => $mobile_number,
                'country_id' => $country_id,
                'salt' => $salt,
                'authToken' => 'webapp_' . md5(rand()) ,
                'emailcode' => $emailcode,
                'status' => 'inactive'
            );
            $mobile = $CountryCodes . $mobile_number;
            $message = 'Use This Code To Verify Your Whatsapp Number' . ' ' . $emailcode;
            // $sms =   $this->africastalking->sendMessage($mobile, $message);
            $sms = 1;

            if ($sms)
            {
                $check_user_is_unique = $this
                    ->Admin_model
                    ->check_admin_is_unique($admin_name, $email_id, $shop_name, $data_insert);
                if (!empty($check_user_is_unique) || $check_user_is_unique != false)
                {
                    $message = ResponseMessages::getStatusCodeMessage(106);
                    $response = array(
                        'status' => SUCCESS,
                        'message' => $message,
                        'data' => array(
                            'admin_id' => $check_user_is_unique,
                            'otp' => $emailcode
                        )
                    );
                }
                else
                {
                    $message = ResponseMessages::getStatusCodeMessage(155);
                    $response = array(
                        'status' => FAIL,
                        'message' => $message
                    );
                }
            }
            else
            {
                $message = $this
                    ->session
                    ->set_flashdata('Sent', 'We Can"t sent You Message');
                $message = ResponseMessages::getStatusCodeMessage(155);
                $response = array(
                    'status' => FAIL,
                    'message' => $message
                );
            }
        }
        $this->response($response);
    }

    public function sign_in_post()
    {

        $this
            ->form_validation
            ->set_rules('email_id', 'User Email', 'trim|required');
        $this
            ->form_validation
            ->set_rules('password', 'Password', 'trim|required');

        if ($this
            ->form_validation
            ->run() == false)
        {
            $message = ResponseMessages::getStatusCodeMessage(119);
            $response = array(
                'status' => FAIL,
                'message' => $message
            );
        }
        else
        {

            $email_id = $this
                ->input
                ->post('email_id');
            $password = sha1(($this
                ->input
                ->post('password')));
            $data = $this
                ->Admin_model
                ->sign_in($email_id, $password);
            if ($data != false)
            {
                $message = ResponseMessages::getStatusCodeMessage(106);
                $response = array(
                    'status' => SUCCESS,
                    'message' => $message,
                    'data' => $data
                );
            }
            else
            {
                $message = ResponseMessages::getStatusCodeMessage(105);
                $response = array(
                    'status' => FAIL,
                    'message' => $message
                );
            }
        }
        $this->response($response);
    }

    public function getAllCountry_get()
    {
        $data = $this
            ->dynamic_dependent_model
            ->fetch_country();
        $out = array_values($data);
        json_encode($out);

        $message = ResponseMessages::getStatusCodeMessage(302);
        $response = array(
            'status' => SUCCESS,
            'message' => $message,
            'data' => $data
        );
        $this->response($response);
    }

    public function is_logged_in()
    {
        if ($this
            ->session
            ->userdata('admin_name') != '')
        {
            return true;
        }
        else
        {
            redirect('admin');
        }
    }

    public function is_not_logged_in()
    {
        if ($this
            ->session
            ->userdata('admin_name') == '')
        {
            return true;
        }
        else
        {
            redirect('admin');
        }
    }

    public function login()
    {
        $this->is_not_logged_in();
        $this
            ->session
            ->userdata('admin_name');
        $this
            ->load
            ->view('login');
    }

    public function products_entry_post()
    {
        $this->check_service_auth();
        $this
            ->form_validation
            ->set_rules('product_name', 'Product Name', 'required');
        $this
            ->form_validation
            ->set_rules('product_price', 'Product Price', 'required');
        $this
            ->form_validation
            ->set_rules('product_quantity', 'Product Quantity', 'required');

        if ($this
            ->form_validation
            ->run() == false)
        {
            $response = array(
                'status' => FAIL,
                'message' => strip_tags(validation_errors())
            );
            $this->response($response);
        }
        else
        {
            $admin_id = $this
                ->authData->admin_id;
            $product_name = $this
                ->input
                ->post('product_name');
            $product_price = $this
                ->input
                ->post('product_price');
            $product_quantity = $this
                ->input
                ->post('product_quantity');
            $product_description = $this
                ->input
                ->post('product_description');
            $one_products = $this
                ->Admin_model
                ->count_product($admin_id);
            $adminstatus = $this
                ->Admin_model
                ->get_admin_status($admin_id);
            $admin_status = $adminstatus->payment_status;

            if ($one_products == 1 && $admin_status != 1)
            {
                $response = array(
                    'status' => FAIL,
                    'message' => 'To Add More Product Please subscribe'
                );
                $this->response($response);
            }
            else
            {

                if (isset($_FILES['productImage']) && !empty($_FILES['productImage']))
                {
                    $image2 = $this
                        ->image_model
                        ->updateMedia('productImage', 'product_images');
                    if (is_array($image2))
                    {
                        $message = array(
                            'status' => 0,
                            'message' => 'Please select another product image'
                        );
                        $this->response($response);
                    }
                }
                $data_insert = array(
                    'product_name' => $product_name,
                    'product_image' => $image2,
                    'product_description' => $product_description,
                    'product_price' => $product_price,
                    'product_quantity' => $product_quantity,
                    'admin_id' => $admin_id
                );
                $products_unique = $this
                    ->Admin_model
                    ->check_user_is_unique($product_name, $admin_id, $data_insert);

                if ($products_unique > 0)
                {
                    $response = array(
                        'status' => FAIL,
                        'message' => 'You have already enter this product name'
                    );
                    $this->response($response);
                }
                else
                {
                    $result = $this
                        ->db
                        ->insert('products', $data_insert);
                    if ($result)
                    {
                        $message = ResponseMessages::getStatusCodeMessage(155);
                        $response = array(
                            'status' => SUCCESS,
                            'message' => $message
                        );
                        $this->response($response);
                    }
                }
            }
        }
    }

    public function edit_product($product_id)
    {
        $this->is_logged_in();
        $this
            ->form_validation
            ->set_rules('product_name', 'Product Name', 'required');
        $this
            ->form_validation
            ->set_rules('product_price', 'Product Price', 'required');
        $this
            ->form_validation
            ->set_rules('product_quantity', 'Product Quantity', 'required');

        if ($this
            ->form_validation
            ->run() == false)
        {

            $data['country'] = $this
                ->dynamic_dependent_model
                ->fetch_country();
            $data['product'] = $this
                ->Admin_model
                ->get_single_product($product_id);
            $this
                ->load
                ->view('product_update', $data);
        }
        else
        {
            $product_id = $this
                ->input
                ->post('hdn_id');
            $product_name = $this
                ->input
                ->post('product_name');
            $product_image = $this
                ->input
                ->post('product_image');
            $product_price = $this
                ->input
                ->post('product_price');
            $product_quantity = $this
                ->input
                ->post('product_quantity');
            $product_description = $this
                ->input
                ->post('product_description');
            $admin_id = $this
                ->input
                ->post('admin_id');
            $num = rand(9999, 0000);
            if ($_FILES['product_image']['name'] == '')
            {

                $product_image = $this
                    ->input
                    ->post('old_image');
            }
            else
            {

                if (!empty($_FILES['product_image']['name']))
                {

                    $config_one = array(
                        'upload_path' => './shop/product_images/',
                        'allowed_types' => 'jpg|png|jpeg',
                        'overwrite' => true,
                        'max_size' => "10048000", // Can be set to particular file size , here it is 10 MB(10048 Kb)
                        'file_name' => $num . "_" . $_FILES['product_image']['name']
                    );
                    $this
                        ->load
                        ->library('upload', $config_one);
                    $this
                        ->upload
                        ->initialize($config_one);

                    if ($this
                        ->upload
                        ->do_upload("product_image"))
                    {

                        $p_image = $this
                            ->upload
                            ->data();
                        $product_image = $p_image['file_name'];
                    }
                    else
                    {

                        $message = $this
                            ->session
                            ->set_flashdata("errorss", $this
                            ->upload
                            ->display_errors());
                        redirect('admin/all_producs');
                    }
                }
            }
            $data_update = array(
                'product_name' => $product_name,
                'product_image' => $product_image,
                'product_description' => $product_description,
                'product_price' => $product_price,
                'product_quantity' => $product_quantity,
                'admin_id' => $admin_id
            );

            $this
                ->db
                ->where('product_id', $product_id);
            $this
                ->db
                ->update('products', $data_update);

            $message = $this
                ->session
                ->set_flashdata("data_update", 'Data Successfully Updated');
            redirect('admin/all_producs', $message);

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
        $admin_id = $this
            ->session
            ->userdata('admin_id');
        $data['products'] = $this
            ->Admin_model
            ->get_all_products_detail($admin_id);
        $this
            ->load
            ->view('all_products', $data);
    }

    public function edit_user_detail()
    {
        $this->is_logged_in();
        $user_id = $this
            ->uri
            ->segment(3);
        $user_data['user_data'] = $this
            ->Admin_model
            ->edit_user_detail($user_id);
        $this
            ->load
            ->view('edit_user_details', $user_data);
    }

    public function logout()
    {
        $this->is_logged_in();
        $this
            ->session
            ->sess_destroy();
        redirect(base_url());
    }

    public function proooo()
    {

        $admin_id = $this
            ->session
            ->userdata('admin_id');
        $uri = $this
            ->uri
            ->segment(3); // 1stsegment
        $data['products'] = $this
            ->Admin_model
            ->get_all_products_detail_pwa($uri);
        $this
            ->load
            ->view('mysite', $data);
    }

    public function update_shop_details()
    {
        //design:- Homepage me heading chipak rhi hai
        //Add Business Details me design gadbad hai
        $this->is_logged_in();
        $this
            ->form_validation
            ->set_rules('Business_Name', 'Product Name', 'required');
        $this
            ->form_validation
            ->set_rules('Short_Description', 'Product Price', 'required');

        if ($this
            ->form_validation
            ->run() == false)
        {
            $admin_id = $this
                ->session
                ->userdata('admin_id');
            $data['details'] = $this
                ->Admin_model
                ->get_business_details($admin_id);
            $this
                ->load
                ->view('update_business', $data);
        }
        else
        {
            $admin_id = $this
                ->session
                ->userdata('admin_id');
            $hdn_id = $this
                ->input
                ->post('hdn_id');
            $hdn_logo = $this
                ->input
                ->post('hdn_logo');
            $hdn_bg_logo = $this
                ->input
                ->post('hdn_bg_logo');
            $Business_Name = $this
                ->input
                ->post('Business_Name');
            $Short_Description = $this
                ->input
                ->post('Short_Description');
            $Business_deal_heading = $this
                ->input
                ->post('Business_deal_heading');
            $address1 = $this
                ->input
                ->post('address1');
            $address2 = $this
                ->input
                ->post('address2');
            $facebook = $this
                ->input
                ->post('facebook');
            $instagram = $this
                ->input
                ->post('instagram');
            $tweeter = $this
                ->input
                ->post('tweeter');
            $youtube = $this
                ->input
                ->post('youtube');
            $header_color = $this
                ->input
                ->post('header_color');
            $back_color = $this
                ->input
                ->post('back_color');
            $footer_color = $this
                ->input
                ->post('footer_color');
            $num = rand(99999, 00000);

            if (!empty($_FILES['Business_logo']['name']))
            {
                $config_one = array(
                    'upload_path' => './shop/shop_image/',
                    'allowed_types' => 'jpg|png|jpeg',
                    'overwrite' => true,
                    'max_size' => "10048000", // Can be set to particular file size , here it is 10 MB(10048 Kb)
                    'file_name' => $num . "_" . $_FILES['Business_logo']['name']
                );

                $this
                    ->load
                    ->library('upload', $config_one);
                $this
                    ->upload
                    ->initialize($config_one);

                if ($this
                    ->upload
                    ->do_upload("Business_logo"))
                {

                    $Business_logo = $this
                        ->upload
                        ->data();
                    $Business_logo = $Business_logo['file_name'];
                }
                else
                {
                    $message = array(
                        'errors' => $this
                            ->upload
                            ->display_errors()
                    );
                }
            }
            else
            {
                $Business_logo = $hdn_logo;
            }

            if (!empty($_FILES['background_image']['name']))
            {
                $config_one = array(
                    'upload_path' => './shop/shop_business/',
                    'allowed_types' => 'jpg|png|jpeg',
                    'overwrite' => true,
                    'max_size' => "10048000", // Can be set to particular file size , here it is 10 MB(10048 Kb)
                    'file_name' => $num . "_" . $_FILES['background_image']['name']
                );

                $this
                    ->load
                    ->library('upload', $config_one);
                $this
                    ->upload
                    ->initialize($config_one);

                if ($this
                    ->upload
                    ->do_upload("background_image"))
                {

                    $background_image = $this
                        ->upload
                        ->data();
                    $background_image = $background_image['file_name'];
                }
                else
                {
                    $message = array(
                        'errors' => $this
                            ->upload
                            ->display_errors()
                    );
                }
            }
            else
            {
                $background_image = $hdn_bg_logo;
            }

            $data_update = array(
                'Business_Name' => $Business_Name,
                'Short_Description' => $Short_Description,
                'Business_deal_heading' => $Business_deal_heading,
                'Business_logo' => $Business_logo,
                'admin_id' => $admin_id,
                'address1' => $address1,
                'address2' => $address2,
                'facebook' => $facebook,
                'instagram' => $instagram,
                'tweeter' => $tweeter,
                'youtube' => $youtube,
                'background_image' => $background_image,
                'header_color' => $header_color,
                'back_color' => $back_color,
                'footer_color' => $footer_color
            );

            $this
                ->db
                ->where('shop_details_id', $hdn_id);
            $this
                ->db
                ->update('shop_details', $data_update);
            $message = $this
                ->session
                ->set_flashdata("data_update", 'Data  Successfully Updated');
            redirect('admin/products_entry', $message);
        }

    }

    public function create_folder()
    {

        mkdir('shop/shop_business', 0777, true);
        chmod('shop/shop_business', 0777);

    }

    public function create_files()
    {
        $file = fopen('application/views/shop/service-worker.js', 'w') or die("Unable to open file!");
        chmod('application/views/shop/service-worker.js', 0777);
        $txt = " file code which you wnt";
    }

    public function shop_style()
    {
        $admin_id = $this
            ->session
            ->userdata('admin_id');
        $data['details'] = $this
            ->Admin_model
            ->get_business_details($admin_id);
        $this
            ->load
            ->view('site_style', $data);
    }

    public function vartemp()
    {
        $this
            ->load
            ->view('vartemp');
    }

    public function pricing()
    {

        $this
            ->load
            ->view('pricing');
    }

    public function chnagenumber()
    {
        $admin_id = $this
            ->session
            ->userdata('admin_id');
        $data['profile'] = $this
            ->Admin_model
            ->get_profile_details($admin_id);
        $data['country'] = $this
            ->dynamic_dependent_model
            ->fetch_country();
        $this
            ->load
            ->view('whatsappprofile', $data);
    }
    public function chnagepassword()
    {
        $admin_id = $this
            ->session
            ->userdata('admin_id');
        $data['country'] = $this
            ->dynamic_dependent_model
            ->fetch_country();
        $data['profile'] = $this
            ->Admin_model
            ->get_profile_details($admin_id);
        $this
            ->load
            ->view('passwordprofile', $data);
    }

    public function changeWhatsappNumber()
    {
        $this->is_logged_in();
        $this
            ->form_validation
            ->set_rules('WhatsappNumber', 'New Password', 'trim|required|min_length[8]|integer', array(
            'integer' => 'Please Use Only Numerical Value.'
        ));

        if ($this
            ->form_validation
            ->run() == false)
        {
            $message = $this
                ->session
                ->set_flashdata('WhatsappNumber', 'Please Insert required filed');
            $this
                ->load
                ->view('signup', $message);
        }
        else
        {

            $admin_id = $this
                ->session
                ->userdata('admin_id');
            $country_id = $this
                ->input
                ->post('Selcountry');
            $CountryCode = $this
                ->input
                ->post('CountryCodes');
            $WhatsappNumber = $this
                ->input
                ->post('WhatsappNumber');

            $emailcode = mt_rand(1000, 999999);

            $mobile = $CountryCode . $WhatsappNumber;
            $message = 'Use This Code To Verify Your Whatsapp Number' . ' ' . $emailcode;

            $sms = $this
                ->africastalking
                ->sendMessage($mobile, $message);
            $data_update = array(
                'emailcode' => $emailcode,
            );
            $update = $this
                ->Admin_model
                ->Whatsapp_number_update($admin_id, $data_update);

            if ($update)
            {
                $this
                    ->load
                    ->view('new_mobile_pas', ['country_id' => $country_id, 'CountryCode' => $CountryCode, 'mobile_number' => $WhatsappNumber, 'sms' => $emailcode]);

            }
            else
            {
                $message = $this
                    ->session
                    ->set_flashdata('Fmessage', 'Failed to change number');
                redirect('admin/update_shop_details', $message);

            }

        }

    }

    public function VerifyNewPassword()
    {

        $admin_id = $this
            ->session
            ->userdata('admin_id');
        $country_id = $this
            ->input
            ->post('country_id');
        $CountryCode = $this
            ->input
            ->post('CountryCode');
        $mobile_number = $this
            ->input
            ->post('mobile_number');
        $varification = $this
            ->input
            ->post('newNumber');

        $data_update = array(
            'emailcode' => $varification,
            'country_id' => $country_id,
            'CountryCode' => $CountryCode,
            'mobile_number' => $mobile_number
        );

        $update = $this
            ->Admin_model
            ->number_update($varification, $data_update);

        if ($update)
        {
            $message = $this
                ->session
                ->set_flashdata('message', 'Whatsapp number has been updated');
            redirect('admin/update_shop_details', $message);
        }
        else
        {
            $message = $this
                ->session
                ->set_flashdata('Fmessage', 'Verification number is wrong');
            redirect('admin/update_shop_details', $message);

        }

    }

    public function chnage_admin_password()
    {
        $this->is_logged_in();
        $this
            ->form_validation
            ->set_rules('oldpassword', 'Old Password', 'trim|required');
        $this
            ->form_validation
            ->set_rules('newpassword', 'New Password', 'trim|required');
        $this
            ->form_validation
            ->set_rules('confirmpassword', 'Confirm Password', 'required|matches[newpassword]', array(
            'matches' => 'Password and confirm password can not be different'
        ));

        if ($this
            ->form_validation
            ->run() == false)
        {

            $message = $this
                ->session
                ->set_flashdata('Fmessage', 'Please insert required fields');

            $this
                ->load
                ->view('passwordprofile');
        }
        else
        {

            $password = sha1($this
                ->input
                ->post('oldpassword'));
            $admin_id = $this
                ->session
                ->userdata('admin_id');
            $this
                ->db
                ->select('*')
                ->from('admin_registration')
                ->where('password', $password)->where('admin_id', $admin_id);
            $q = $this
                ->db
                ->get();
            $num_row = $q->num_rows();
            if ($num_row == 0)
            {
                $message = $this
                    ->session
                    ->set_flashdata('Fmessage', 'Old password is not matched with you entered password');
                redirect('admin/update_shop_details', $message);
            }
            else
            {
                $newpassword = sha1($this
                    ->input
                    ->post('newpassword'));
                $salt = $this
                    ->input
                    ->post('newpassword');

                $data_update = array(
                    'password' => $newpassword,
                    'salt' => $salt
                );
                $update = $this
                    ->Admin_model
                    ->Whatsapp_number_update($admin_id, $data_update);

                if ($update)
                {
                    $message = $this
                        ->session
                        ->set_flashdata('message', 'Password has been changed');
                    redirect('admin/update_shop_details', $message);
                }
                else
                {
                    $message = $this
                        ->session
                        ->set_flashdata('Fmessage', 'Failed to update password');
                    redirect('admin/update_shop_details', $message);

                }

            }
        }

    }

}

