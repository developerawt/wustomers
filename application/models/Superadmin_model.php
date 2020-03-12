<?php 
class Superadmin_model extends CI_Model {

    public function sign_in($user_name,$password){


        $this->db->select('*')->from('sup_admin');
        $this->db->where('name', $user_name);
        $this->db->where('password', $password);
         $query = $this->db->get(); 
        
        
        if ($query->num_rows() > 0){

             $result = $query->row();
             $admin_data = array(
                'sup_admin_id'=>$result->sup_admin_id,
                'name'=>$result->name,
            );
             $this->session->set_userdata($admin_data);
            redirect('/superadmin/dashboard');
        }else{
            $message = $this->session->set_flashdata('InValid_User', 'invalid user.');
            redirect('superadmin', $message);
        }
       
    }

    public function check_user_is_unique($admin_name,$email_id,$shop_name,$data_insert)
    {
        $this->db->where('admin_name', $admin_name);
        $this->db->where('email_id', $email_id);
        $query = $this->db->get('admin_registration'); 
        if ($query->num_rows() > 0)
        {
            $message = $this->session->set_flashdata("data_insert", 'User details already exists');
            redirect('superadmin/add_admin', $message);
        }else{
           
            $result = $this->db->insert('admin_registration',$data_insert);
           
    $data_update = array(
        'Business_Name'=>$shop_name,
        'Business_logo'=>base_url('assets/temp1/images/logo-design.png'),
        'Short_Description'=>'Short Description',
        'Business_deal_heading'=>"Business_deal_heading",
        'admin_id' => $this->db->insert_id(),
        'address1' => "Binghamton, New York",
        'address2' => "4343 Hinkle Deegan Lake Road"   
        );


        $result1 = $this->db->insert('shop_details', $data_update);
 
            if ($result)
            { 
                $message = $this->session->set_flashdata("data_insert", 'Data  Successfully Insert');
                redirect('superadmin/add_admin', $message);
            }
        }
       
    }

   /* public function registration($data_insert, $user_name)
    {
        $result = $this->db->insert('admin', $data_insert);
        if($result){
            $this->db->where('user_name', $user_name);
            //$this->db->where('password', $password);
            $query = $this->db->get('admin'); 
            if ($query->num_rows() > 0)
            {
                $result = $query->result();
                $admin_data = array(
                    'admin_id'=>$result[0]->admin_id,
                    'user_name'=>$result[0]->user_name,
                );
                $this->session->set_userdata($admin_data);
                redirect('/admin/dashboard');
            }
        }
    }*/
 
    public function get_all_users_detail($by, $type){

        if(isset($by) && !empty($by)){
            if(isset($type) && !empty($type)){
                $orderBy = $by;
                $orderType = $type;

            }else{
                $orderBy = 'admin_id';
                $orderType = 'desc'; 
            }
        }else{
            $orderBy = 'admin_id';
            $orderType = 'desc';
        }

        $this->db->select('admin_registration.*,country.country_name,country.id')
        ->from('admin_registration')
        ->join('country', 'country.id = admin_registration.country_id', 'inner')
        ->where('isDeleted', 'NO') 
        ->order_by("admin_registration.".$orderBy, $orderType);
        $query = $this->db->get();
        $num_rows = $query->num_rows();
        if ($num_rows > 0) {
        return $query->result();
        }else{
            return 0;
        }
    }

    public function getStoreCount(){
        $data['totalStore'] = $this->db->select('COUNT("admin_id") as totalStore')->get_where('admin_registration',array('isDeleted'=>'NO'))->row_array();
        $data['subscribeStore'] = $this->db->select('COUNT("admin_id") as subscribeStore')->get_where('admin_registration',array('isDeleted'=>'NO','payment_status'=>1))->row_array();
        $data['unSubscribeStore'] = $this->db->select('COUNT("admin_id") as unSubscribeStore')->get_where('admin_registration',array('isDeleted'=>'NO','payment_status'=>0))->row_array();
        $data['activeStore'] = $this->db->select('COUNT("admin_id") as activeStore')->get_where('admin_registration',array('isDeleted'=>'NO','status'=>'active'))->row_array();
        $data['inActiveStore'] = $this->db->select('COUNT("admin_id") as inActiveStore')->get_where('admin_registration',array('isDeleted'=>'NO','status'=>'inactive'))->row_array();
        return $data;
    }

    public function getWhatsAppCount(){
        $data = $this->db->select('SUM(enquiry_count) as totalWhatsapp')->get_where('admin_registration',array('isDeleted'=>'NO'))->row_array();
        return $data['totalWhatsapp'];
    }

    public function get_admin_detail($admin_id){
        $this->db->select('admin_registration.*,country.country_name,country.id')
        ->from('admin_registration')
        ->join('country', 'country.id = admin_registration.country_id', 'inner')
         //->where('admin_registration.status', 'active')    
         ->where('admin_registration.admin_id',$admin_id);    

        $this->db->order_by("admin_registration.admin_id", "desc");
        $query = $this->db->get();
        $num_rows = $query->num_rows();
        if ($num_rows > 0) {
            return $query->row();
        }else{
            return 0;
        }
    }



    
     
    
    /*public function direct_cost_get_data()
    {
        //$this->db->where('direct_cost_id', 1);
        $query = $this->db->get('direct_cost');
        
        return $query->result();
    }*/

    /*public function indirect_cost_get_data()
    {
        //$this->db->where('direct_cost_id', 1);
        $query = $this->db->get('indirect_cost');
        
        return $query->result();
    }

    public function all_suspend_user_detail()
    {
        $this->db->where('status', 'active');
        $this->db->where('isactive', 1);
        $query = $this->db->get('user');
        return $query->result();
    }

    public function edit_user_detail($user_id)
    {
        $this->db->where('user_id', $user_id);
        $query = $this->db->get('user');
        return $query->result();
    }*/

    /* public function update_user_details($user_id,$data_update)
    {
        $this->db->where('user_id',$user_id);
        $result= $this->db->update('user',$data_update);
        return  $result;

    }

    public function update_direct_cost($direct_cost_id,$data_update)
    {
        $this->db->where('direct_cost_id',$direct_cost_id);
        $result= $this->db->update('direct_cost',$data_update);
        return  $result;

    }

    public function update_indirect_cost($indirect_cost_id,$data_update)
    {
        $this->db->where('indirect_cost_id',$indirect_cost_id);
        $result= $this->db->update('indirect_cost',$data_update);
        return  $result;

    }

    public function suspend_user_id($user_id)
    {
        $this->db->where('user_id',$user_id);
        $data_update = array('isactive'=>1);
        $result = $this->db->update('user',$data_update);
        // Yecho $this->db->last_query();die;
        return  $result;
        
    }

    public function active_suspend_user_id($user_id)
    {
        $this->db->where('user_id',$user_id);
        $data_update = array('isactive'=>0);
        $result = $this->db->update('user',$data_update);
        // Yecho $this->db->last_query();die;
        return  $result;
        
    }

    public function delete_user_id($user_id)
    {
        $this->db->where('user_id',$user_id);
        $data_update = array('status'=>'deactive');
        $result = $this->db->update('user',$data_update);
        // Yecho $this->db->last_query();die;
        return  $result;
        
    }*/

    public function get_all_products_detail_pwa($shop_name){
        $this->db->select('admin_registration.*,products.*,shop_details.*')
        ->from('products')
        ->join('admin_registration', 'products.admin_id = admin_registration.admin_id', 'inner')
        ->join('shop_details', 'products.admin_id = shop_details.admin_id', 'inner')
        ->where('admin_registration.shop_name', $shop_name)
        ->where('products.status', 'active');    
        $this->db->order_by("admin_registration.admin_id", "desc");
        $query = $this->db->get();
        $num_rows = $query->num_rows();
        if ($num_rows > 0) {
        return $query->result();
        }else{
            return 0;
        }
    }  

}
?>
