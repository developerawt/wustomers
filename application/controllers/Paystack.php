<?php
defined('BASEPATH') OR exit('No direct script access allowed');
define( 'PAYSTACK_SECRET_KEY', 'sk_test_41629b510423d2f0699cc802b0c82948b6777ce1' );

class Paystack extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }


    private function getPaymentInfo($ref) {
        $result = array();
        $url = 'https://api.paystack.co/transaction/verify/'.$ref;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt(
            $ch, CURLOPT_HTTPHEADER, [
                'Authorization: Bearer '.PAYSTACK_SECRET_KEY]
        );
        $request = curl_exec($ch);
        curl_close($ch);
    
        $result = json_decode($request, true);

        return $result['data'];

    }

    public function verify_payment($ref) {
        $result = array();
        $url = 'https://api.paystack.co/transaction/verify/'.$ref;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt(
            $ch, CURLOPT_HTTPHEADER, [
            'Authorization: Bearer '.PAYSTACK_SECRET_KEY]
        );
        $request = curl_exec($ch);
        curl_close($ch);

        if ($request) {
            $result = json_decode($request, true);
            if($result){
                if($result['data']){
                    if($result['data']['status'] == 'success'){
                        header("Location: ".site_url().'paystack/success/'.$ref);
                    }else{
                        header("Location: ".site_url().'paystack/fail/'.$ref);
                    }
                }
                else{
                    header("Location: ".sire_url().'paystack/fail/'.$ref);
                }

            }else{
                header("Location: ".sire_url().'paystack/fail/'.$ref);
            }
        }else{
            header("Location: ".sire_url().'paystack/fail/'.$ref);
        }
    }


    public function paystack_standard() {

        $admin_id = $this->session->userdata('admin_id');
        $admin_email = $this->session->userdata('email_id');
        $admin_name = $this->session->userdata('admin_name');
        $pay =  $this->input->post('price');

        if(isset($pay)) {
            $result = array();
            $amount = $pay * 100;
            $ref = rand(1000000, 9999999999);
            $callback_url = site_url().'/paystack/verify_payment/'.$ref;
            $postdata =  array(
                'first_name'=>'name',
                'last_name'=> 'lname',
                'email' => 'awt.honest2019@gmail.com',
                'amount' => $amount,
                'reference' => $ref,
                'callback_url' => $callback_url
            );

            $url = "https://api.paystack.co/transaction/initialize";
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL,$url);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS,json_encode($postdata));  //Post Fields
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            $headers = [
                'Authorization: Bearer '.PAYSTACK_SECRET_KEY,
                'Content-Type: application/json',
            ];
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            $request = curl_exec ($ch);
            curl_close ($ch);
            
            if ($request) {
                $result = json_decode($request, true);
            }

            if ($result['status'] != '') {
                $redir = $result['data']['authorization_url'];
                header("Location: ".$redir);
            }else{
                header("Location: ".base_url('index.php/admin/products_entry'));
            }
        }
        
        $data = array();
        $data['title'] = "Paystack Standard Demo";
        
        $this->load->view('paystack_standard', $data);
    }


    public function paystack_inline() {
        $data = array();
        $data['title'] = "Paystack InLine Demo";
        $this->load->view('paystack_inline', $data);
    }

    public function success($ref) {
        $data = array();
        $info = $this->getPaymentInfo($ref);
       
        //print_r($info);

        $cus = $info['customer'];
        $authorization = $info['authorization'];


        $amount = $info['amount']/100;
        $admin_id = $this->session->userdata('admin_id');
        $first_name = $cus['first_name'];
        $last_name = $cus['last_name'];
        $email = $cus['email'];
        $phone = $cus['phone'];
        $paid_at = $info['paid_at'];
        $signature = $authorization['signature'];

        $currency = $info['currency'];
        $exp_month = $authorization['exp_month'];
        $bank = $authorization['bank'];
        $exp_year = $authorization['exp_year'];
        $card_type = $authorization['card_type'];
        $country_code = $authorization['country_code'];
        $brand = $authorization['brand'];
        $ip_address = $info['ip_address'];
        $channel = $authorization['channel'];


        $dataArray = array( 
            'admin_id' => $admin_id,
            'first_name' => $first_name ,
            'last_name' =>$last_name,
            'email' =>$email,
            'phone' =>$phone,
            'amount' =>$amount,
            'paid_at' =>$paid_at,
            'signature' =>$signature,
            'currency' => $currency,
            'exp_month' => $exp_month,
            'bank' => $bank,
            'exp_year' => $exp_year,
            'card_type' => $card_type,
            'country_code' => $country_code,
            'brand' => $brand,
            'ip_address' => $ip_address,
            'channel' => $channel
        );

        $db_ins = $this->db->insert('payment_info', $dataArray );
        $db_update = $this->db->set('payment_status', '1')->where('admin_id',$admin_id)->update('admin_registration');

        $message = $this->session->set_flashdata("Payemnt", 'Payment Has Been Done Successfully');
        redirect(site_url('admin/all_producs')); 

    }

    public function fail() {
        $message = $this->session->set_flashdata("Payemnt", 'Payment Has Been failed');
        redirect(site_url('admin/all_producs')); 
    }

    public function paySuccess() {
        
        $ref = $_GET['reference']; 

        $result = array();
        $url = 'https://api.paystack.co/transaction/verify/'.$ref;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt(
            $ch, CURLOPT_HTTPHEADER, [
            'Authorization: Bearer '.PAYSTACK_SECRET_KEY]
        );
        $request = curl_exec($ch);
        curl_close($ch);

        if ($request) {
            $result = json_decode($request, true);
            
            $info = $result['data'];

            $cus = $info['customer'];
            $authorization = $info['authorization'];


            $amount = $info['amount']/100;
            $admin_id = $this->session->userdata('admin_id');
            $first_name = $cus['first_name'];
            $last_name = $cus['last_name'];
            $email = $cus['email'];
            $phone = $cus['phone'];
            $paid_at = $info['paid_at'];
            $signature = $authorization['signature'];

            $currency = $info['currency'];
            $exp_month = $authorization['exp_month'];
            $bank = $authorization['bank'];
            $exp_year = $authorization['exp_year'];
            $card_type = $authorization['card_type'];
            $country_code = $authorization['country_code'];
            $brand = $authorization['brand'];
            $ip_address = $info['ip_address'];
            $channel = $authorization['channel'];


            $dataArray = array( 
                'admin_id' => $admin_id,
                'first_name' => $first_name ,
                'last_name' =>$last_name,
                'email' =>$email,
                'phone' =>$phone,
                'amount' =>$amount,
                'paid_at' =>$paid_at,
                'signature' =>$signature,
                'currency' => $currency,
                'exp_month' => $exp_month,
                'bank' => $bank,
                'exp_year' => $exp_year,
                'card_type' => $card_type,
                'country_code' => $country_code,
                'brand' => $brand,
                'ip_address' => $ip_address,
                'channel' => $channel
            );

            $db_ins = $this->db->insert('payment_info', $dataArray );
            $db_update = $this->db->set('payment_status', '1')->where('admin_id',$admin_id)->update('admin_registration');

            $message = $this->session->set_flashdata("Payemnt", 'Payment Has Been Done Successfully');
            redirect(site_url('admin/all_producs')); 
        } 
    }

}
?>