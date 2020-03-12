<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Superadmin extends CI_Controller
{
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('Superadmin_model');
        $this->load->model('dynamic_dependent_model');
    }
    
    public function index()
    {
        // $this->Superadmin_model->get_last_ten_entries();
        if ($this->session->userdata('name') != ''){
            redirect('superadmin/dashboard');
        }
        else{
            $this->load->view('superadmin/login');
        }
        
    }
    
    public function is_logged_in()
    {
        if ($this->session->userdata('name') != '') {
            return true;
        } else {
            redirect('superadmin');
        }
    }
    
    public function login()
    {
        $this->load->view('superadmin/login');
    }
    
    public function add_admin()
    {
        $this->is_logged_in();
        $data['country'] = $this->dynamic_dependent_model->fetch_country();
        $this->load->view('superadmin/add_user', $data);
    }
    
    
    
    
    public function admin_registration()
    {
        $this->is_logged_in();
        
        $this->form_validation->set_rules('user_name', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'password', 'trim|required');
        $this->form_validation->set_rules('email', 'Password', 'trim|required');
        $this->form_validation->set_rules('phone', 'Phone', 'trim|required');
         
        if ($this->form_validation->run() == FALSE) {
            $message = $this->session->set_flashdata("user_registration_error", 'Please Enter Required Fields');
            redirect('superadmin/add_admin', $message);
        } else {
   
            $admin_link    = base_url("index.php/shop/index/".$this->input->post('shop_name'));
            $admin_name    = $this->input->post('user_name');
            $shop_name     = $this->input->post('shop_name');
            $password      = sha1(($this->input->post('password')));
            $email_id      = $this->input->post('email');
            $mobile_number = $this->input->post('phone');
            $CountryCode = $this->input->post('CountryCode');
            $country_id    = $this->input->post('Selcountry');
            $state_id      = $this->input->post('Selstate');
            $city_id       = $this->input->post('Selcity');
            $salt          = $this->input->post('password');
      
            //$user_name = $this->input->post('user_name');
              $data_insert = array(
                'admin_link' => $admin_link,
                'admin_name' => $admin_name,
                'password' => $password,
                'email_id' => $email_id,
                'shop_name' =>$shop_name,
                'CountryCode'=>$CountryCode,
                'mobile_number' => $mobile_number,
                'country_id' => $country_id,
                 'salt' => $salt
             );
            $check_user_is_unique = $this->Superadmin_model->check_user_is_unique($admin_name, $email_id,$shop_name,$data_insert);
            
            // $this->Superadmin_model->registration($data_insert, $user_name);
        }
    }
    
    public function sign_in()
    {
        $this->form_validation->set_rules('user_name', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        
        if ($this->form_validation->run() == FALSE) {
            $message = $this->session->set_flashdata("validation_error", 'Please Enter Valid Details');
            redirect('superadmin', $message);
        } else {
            //print_r($_POST);
            $user_name = $this->input->post('user_name');
            $password  = sha1(($this->input->post('password')));
            $this->Superadmin_model->sign_in($user_name, $password);
        }
    }
     
    public function dashboard()
    {
        $this->is_logged_in();
        $allData = $this->Superadmin_model->getStoreCount();
        $data['totalStore'] = $allData['totalStore']['totalStore'];
        $data['subscribeStore'] = $allData['subscribeStore']['subscribeStore'];
        $data['unSubscribeStore'] = $allData['unSubscribeStore']['unSubscribeStore'];
        $data['activeStore'] = $allData['activeStore']['activeStore'];
        $data['inActiveStore'] = $allData['inActiveStore']['inActiveStore'];

        $this->load->view('superadmin/dashboard',$data);
    }
    
    public function all_admins()
    {
        $this->is_logged_in();

        $by = decoding($this->input->get('by'));
        $type = decoding($this->input->get('type'));


        $data['by'] = $this->input->get('by');
        $data['type'] = $this->input->get('type');

        $data['admins'] = $this->Superadmin_model->get_all_users_detail($by, $type);
        $this->load->view('superadmin/all_accounts', $data);
    }
    
     public function logout()
    {
        $this->is_logged_in();
        $this->session->sess_destroy();
        redirect(site_url().'/'.'superadmin');
    }

    public function update_details($admin_id){
        $this->is_logged_in();
        $data['admin_data'] = $this->Superadmin_model->get_admin_detail($admin_id);
        $data['country'] = $this->dynamic_dependent_model->fetch_country();
        $this->load->view('superadmin/update_admin', $data);
    }

    public function edit_admin(){
    
        $this->is_logged_in();
        
        $this->form_validation->set_rules('user_name', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'password', 'trim|required');
        $this->form_validation->set_rules('email', 'Password', 'trim|required');
        $this->form_validation->set_rules('phone', 'Phone', 'trim|required');
         
        if ($this->form_validation->run() == FALSE) {
            die();
            $message = $this->session->set_flashdata("user_registration_error", 'Please Enter Required Fields');
            $this->load->view('superadmin/update_admin',$data);
        }else{
     
            $admin_id = $this->input->post('Hdn_id'); 
            $admin_name    = $this->input->post('user_name');
            $shop_name     = $this->input->post('shop_name');
            $password      = sha1(($this->input->post('password')));
            $email_id      = $this->input->post('email');
            $mobile_number = $this->input->post('phone');
            $CountryCode   = $this->input->post('CountryCode');
            $country_id    = $this->input->post('Selcountry');
             $salt          = $this->input->post('password');
      
            //$user_name = $this->input->post('user_name');
              $data_update = array(
                 'admin_name' => $admin_name,
                'password' => $password,
                'email_id' => $email_id,
                'shop_name' =>$shop_name,
                'CountryCode'=>$CountryCode,
                'mobile_number' => $mobile_number,
                'country_id' => $country_id,
                'salt' => $salt
            );
            $this->db->where('admin_id',$admin_id);
            $this->db->update('admin_registration',$data_update);
            $message = $this->session->set_flashdata('upd' , 'Data Has Been Updated');   
            redirect('superadmin/all_admins',$message);
        }
    }

    public function analytics()
    {
        $this->is_logged_in();
        $allData = $this->Superadmin_model->getStoreCount();
        $data['totalStore'] = $allData['totalStore']['totalStore'];
        $data['subscribeStore'] = $allData['subscribeStore']['subscribeStore'];
        $data['whatsAppLinkHits'] = $this->Superadmin_model->getWhatsAppCount();
        //$data['unSubscribeStore'] = $allData['unSubscribeStore']['unSubscribeStore'];
        //$data['activeStore'] = $allData['activeStore']['activeStore'];
        //$data['inActiveStore'] = $allData['inActiveStore']['inActiveStore'];
        
        $this->load->view('superadmin/analytics',$data);
    }

}