<?php 
class Admin_model extends CI_Model {

    public function getStoreStatus($storeName){
        $storeName = str_replace('%20', ' ', $storeName);

        $data = $this->db->select('*')->get_where('admin_registration',array('shop_name'=>$storeName,'isDeleted'=>'NO'))->row_array();
        if(isset($data) AND !empty($data)){
          return $data;
        }
        else{
          return false;
        }
    }

    function paymentLogin($authToken){
      $this->db->select('*')->from('admin_registration');
      $this->db->where('authToken', $authToken);
      $this->db->where('isDeleted', 'NO');
         
      $query = $this->db->get(); 
      if ($query->num_rows() > 0)
      {
        $result = $query->row();
        if($result->status =='active'){
            $admin_data = array(
              'admin_id'=>$result->admin_id,
              'admin_name'=>$result->admin_name,
              'email_id'=>$result->email_id,
              'mobile_number'=>$result->mobile_number
            );
            $this->session->set_userdata($admin_data);
            redirect('/admin/update_shop_details');
        }
        else{
            $message = $this->session->set_flashdata('InValid_Users', 'Your store has been paused reach out to the support for further assistance');
            $this->load->view('login',$message);
        }    
      }else{
        $message = $this->session->set_flashdata('InValid_Users', 'Invalid User');
        $this->load->view('login',$message);
      }
    }

    public function sign_in($email_id,$password){
 
      $this->db->select('*')->from('admin_registration');
      $this->db->where('email_id', $email_id);
      $this->db->where('password', $password);
      $this->db->where('isDeleted', 'NO');
         
      $query = $this->db->get(); 
      if ($query->num_rows() > 0)
      {
        $result = $query->row();
        if($result->status =='active'){
            $admin_data = array(
              'admin_id'=>$result->admin_id,
              'admin_name'=>$result->admin_name,
              'email_id'=>$result->email_id,
              'mobile_number'=>$result->mobile_number
            );
            $this->session->set_userdata($admin_data);
            redirect('/admin/update_shop_details');
        }
        else{
            $message = $this->session->set_flashdata('InValid_Users', 'Your store has been paused reach out to the support for further assistance');
            $this->load->view('login',$message);
        }    
      }else{
        $message = $this->session->set_flashdata('InValid_Users', 'Invalid User');
        $this->load->view('login',$message);
      }
       
    }

    public function check_user_is_unique($product_name,$admin_id,$data_insert)
    {
        $this->db->where('product_name', $product_name);
        $this->db->where('admin_id', $admin_id);
        $query = $this->db->get('products'); 
       return $query->num_rows();
        
    }

    public function get_user_details($admin_id)
      {
         $this->db->where('admin_id', $admin_id);
         $query = $this->db->get('admin_registration');
         return $query->row();
      } 



    public function customer_product_show(){
     $this->db->select('*')
          ->from('products');
        $q = $this->db->get();
        $num_rows = $q->num_rows(); 
        if ($num_rows >= '0') {
            $data = $q->result();
            return $data;
        }else{
            return 0;
        }
      } 
public function get_products_description($product_id)
      {
          $this->db->select('admin_registration.*,products.*')
         ->from('products')
         ->join('admin_registration', 'products.admin_id = admin_registration.admin_id','INNER' )
         ->where('products.product_id',$product_id);
          $q = $this->db->get();
        $num_rows = $q->num_rows(); 
        if ($num_rows >= '0') {
            $data = $q->row();
              return $data;
        }else{
            return 0;
        }
      } 
      public function get_single_product($product_id)
      {
          $this->db->select('admin_registration.*,products.*')
         ->from('products')
         ->join('admin_registration', 'products.admin_id = admin_registration.admin_id','INNER' )
         ->where('products.product_id',$product_id);
          $q = $this->db->get();
        $num_rows = $q->num_rows(); 
        if ($num_rows >= '0') {
            $data = $q->row();
              return $data;
        }else{
            return 0;
        }
      } 
      
          

     public function check_admin_is_unique($admin_name,$email_id,$shop_name,$data_insert)
    {
        //$this->db->where('admin_name', $admin_name);
        $this->db->where('email_id', $email_id);
        $query = $this->db->get('admin_registration'); 
        if ($query->num_rows() > 0)
        {
            $message = $this->session->set_flashdata("data_insert", 'User details already exists');
            redirect('signup', $message);
        }else{
            $result = $this->db->insert('admin_registration',$data_insert);

    $data_update = array(
        'Business_Name'=>$shop_name,
        'Business_logo'=>'logo-design.png',
        'Short_Description'=>'Short Description',
        'Business_deal_heading'=>"Special Offer For Weeks",
         'admin_id' => $this->db->insert_id(),
        'address1' => "Binghamton, New York",
        'address2' => "4343 Hinkle Deegan Lake Road"   
        );


        $result1 = $this->db->insert('shop_details', $data_update);


            if ($result){ 
                 $message = $this->session->set_flashdata("mail_info", 'Please Verify Your Whatsapp No. - A Message Will Be Sent To Your Phone.');
                $this->load->view('emailvarfiy',$message);
            }
        }
       
    }
    

  public function get_all_products_detail($admin_id){
        $this->db->select('admin_registration.admin_name,products.*, admin_registration.admin_link')
        ->from('products')
        ->join('admin_registration', 'products.admin_id = admin_registration.admin_id', 'inner')
        ->where('admin_registration.admin_id', $admin_id)
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



    


    public function get_all_products_detail_pwa($shop_name){

        $shop_name = str_replace('%20', ' ', $shop_name);
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

      public function get_all_products_detail_shop($shop_name){
        $shop_name = str_replace('%20', ' ', $shop_name);
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
     
    public function get_business_details($admin_id){

      $this->db->select('admin_registration.*,shop_details.*')
        ->from('shop_details')
        ->join('admin_registration', 'shop_details.admin_id = admin_registration.admin_id', 'inner')
        ->where('admin_registration.admin_id', $admin_id)
        ->where('admin_registration.status', 'active');    
        $this->db->order_by("shop_details.shop_details_id", "desc");
        $query = $this->db->get();
        $num_rows = $query->num_rows();
        if ($num_rows > 0) {
        return $query->row();
        }else{
            return 0;
        }
      
    }

    public function count_product($admin_id){

      $this->db->select('*')
                ->from('products')
                ->where('products.admin_id', $admin_id)
                ->where('products.status', 'active'); 
          $query = $this->db->get();
        $num_rows = $query->num_rows();
        if ($num_rows > 0) {
        return $query->num_rows();
        }else{
            return 0;
        }
      
    }

    public function get_admin_status($admin_id){

      $this->db->select('payment_status')->from('admin_registration')->where('admin_id',$admin_id);
      $query = $this->db->get();

      if($query) {
        return $query->row();
      }else{
        return '0';
      }
    }


public function forgotpassword_update($smscode ,$data_update)
{

  $this->db->select('*')->where('f_password',$smscode);
  $q = $this->db->get('admin_registration');
if ($q->num_rows()==1) {
  $this->db->where('f_password',$smscode)
  ->where('status','active')
  ->update('admin_registration',$data_update);
return TRUE;
}else{

return '0';
}
  
}


public function password_update($admin_id ,$data_update)
{

  $this->db->select('*')->where('admin_id',$admin_id);
  $q = $this->db->get('admin_registration');
if ($q->num_rows()==1) {
  $this->db->where('admin_id',$admin_id)
  ->where('status','active')
  ->update('admin_registration',$data_update);
return TRUE;
}else{

return '0';
}
  
}

public function Whatsapp_number_update($admin_id ,$data_update)
{

  $this->db->select('*')->where('admin_id',$admin_id);
  $q = $this->db->get('admin_registration');
if ($q->num_rows()==1) {
  $this->db->where('admin_id',$admin_id)
  ->where('status','active')
  ->update('admin_registration',$data_update);
return TRUE;
}else{

return '0';
}
  
}


public function number_update($varification ,$data_update)
{

  $this->db->select('*')->where('emailcode',$varification);
  $q = $this->db->get('admin_registration');
if ($q->num_rows()==1) {
  $this->db->where('emailcode',$varification)
  ->where('status','active')
  ->update('admin_registration',$data_update);
return TRUE;
}else{

return '0';
}
  
}




public function get_profile_details($admin_id){

      $this->db->select('admin_registration.*,country.country_name')
        ->from('admin_registration')
        ->join('country','admin_registration.country_id = country.id' ,'INNER')
         ->where('admin_registration.admin_id', $admin_id)
        ->where('admin_registration.status', 'active');    
         $query = $this->db->get();
        $num_rows = $query->num_rows();
        if ($num_rows > 0) {
        return $query->row();
        }else{
            return 0;
        }
      
    }

 
  
     

}
?>
