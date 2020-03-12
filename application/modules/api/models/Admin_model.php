<?php 
class Admin_model extends CI_Model {


    public function sign_in($email_id,$password){
    $this->db->where(array('email_id'=>$email_id,'password'=>$password,'status'=>'active'));
            $this->db->update('admin_registration',array('authToken'=> 'webapp_'.md5(rand())));
    $data =  $this->db->select('admin_registration.*,country.sortname')->join('country','country.id = admin_registration.country_id')->get_where('admin_registration',array('email_id'=>$email_id,'password'=>$password,'status'=>'active'))->row_array();
        if (isset($data)) {
            //$this->db->where(array('email_id'=>$email_id,'password'=>$password,'status'=>'active'));
            //$this->db->update('admin_registration',array('authToken'=> 'webapp_'.md5(rand())));
            return $data;
        }else{
          return FALSE;
        }
    }

    public function fetch_country(){
    return $this->db->order_by('country_name','ASC')->get_where('country')->result();
        // $this->db->order_by("country_name", "ASC");
        // $query = $this->db->get("country");
        // return $query->result();
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

      public function updateProduct($where,$data_update){
          return $this->db->where($where)->update('products',$data_update);
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
      public function get_single_product($product_id,$admin_id)
      {
          $this->db->select('admin_registration.*,products.*')
         ->from('products')
         ->join('admin_registration', 'products.admin_id = admin_registration.admin_id','INNER' )
         ->where('products.product_id',$product_id)
         ->where(PRODUCTS.'.admin_id',$admin_id);
          $q = $this->db->get();
        $num_rows = $q->num_rows(); 
        if ($num_rows >= '0') {
            $data = $q->row();
              return $data;
        }else{
            return 0;
        }
      } 
      
          

    public function check_admin_is_unique($admin_name,$email_id,$shop_name,$data_insert){
        $this->db->where('email_id', $email_id);
        $query = $this->db->get('admin_registration'); 
        if ($query->num_rows() > 0){
           return FALSE;
        }else{
            $result = $this->db->insert('admin_registration',$data_insert);
            $admin_id = $this->db->insert_id();

            $data_update = array(
                'Business_Name'=>$shop_name,
                'Business_logo'=>'logo-design.png',
                'Short_Description'=>'Short Description',
                'Business_deal_heading'=>"Special Offer For Weeks",
                'admin_id' => $admin_id,
                'address1' => "Binghamton, New York",
                'address2' => "4343 Hinkle Deegan Lake Road"   
            );
            $result1 = $this->db->insert('shop_details', $data_update);
            if ($result1){ 
                return $admin_id;
            }else{

                return FALSE;
            }
        }

    }
    

 

 public function get_all_products_detail($admin_id){
        $productsImg = base_url('shop/product_images/');
        $data = $this->db->select('*,(CASE 
                  WHEN( '.PRODUCTS.'.product_image = "" OR '.PRODUCTS.'.product_image IS NULL) 
                    THEN "'.PRODUCTS.'" 
                  WHEN '.PRODUCTS.'.product_image LIKE "%//%" 
                    THEN '.PRODUCTS.'.product_image
                  ELSE
                    CONCAT("'.$productsImg.'",'.PRODUCTS.'.product_image) 
                  END ) as product_image')
               ->join(ADMIN,PRODUCTS.'.admin_id ='.ADMIN.'.admin_id', 'INNER')
               ->order_by(ADMIN.'.admin_id','DESC')
               ->get_where(PRODUCTS,array(ADMIN.'.admin_id' => $admin_id,))
               ->result();
               return $data;
      }

    


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

      public function get_all_products_detail_shop($shop_name){
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
        $background = base_url('shop/shop_business/');
        $logo = base_url('shop/shop_image/');
        $productsImg = base_url('shop/product_images/');
        $this->db->select('*,
                (CASE 
                WHEN( '.SHOPDETAILS.'.background_image = "" OR '.SHOPDETAILS.'.background_image IS NULL) 
                THEN "'.SHOPDETAILS.'" 
                WHEN '.SHOPDETAILS.'.background_image LIKE "%//%" 
                THEN '.SHOPDETAILS.'.background_image
                ELSE
                CONCAT("'.$background.'",'.SHOPDETAILS.'.background_image) 
                END ) as background_image, 
                
                (CASE 
                WHEN( '.SHOPDETAILS.'.Business_logo = "" OR '.SHOPDETAILS.'.Business_logo IS NULL) 
                THEN "'.SHOPDETAILS.'" 
                WHEN '.SHOPDETAILS.'.Business_logo LIKE "%//%" 
                THEN '.SHOPDETAILS.'.Business_logo
                ELSE
                CONCAT("'.$logo.'",'.SHOPDETAILS.'.Business_logo) 
                END ) as Business_logo,country.sortname')
                
                ->from('shop_details')
                ->join('admin_registration', 'shop_details.admin_id = admin_registration.admin_id', 'inner')
                ->join('country','country.id = admin_registration.country_id')
                ->where('admin_registration.admin_id', $admin_id)
                ->where('admin_registration.status', 'active');    
                $this->db->order_by("shop_details.shop_details_id", "DESC");
            $query = $this->db->get();
            $num_rows = $query->num_rows();
            if ($num_rows > 0) {
                return $query->row();
            }else{
                return 0;
            }

    }

    public function count_product($admin_id){

      $data = $this->db->get_where(PRODUCTS,array('admin_id'=>$admin_id,'status'=>'active'))->num_rows();
      return ($data >0)? $data : FALSE;
      }

 public function get_admin_status($admin_id){


      $data = $this->db->select('payment_status')->get_where(ADMIN,array('admin_id'=>$admin_id,'status'=>'active'))->row();
      return ($data > '0')? $data : '0';

}


    public function forgotpassword_update($smscode ,$data_update){

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


    public function password_update($admin_id ,$data_update){

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
 


public function Whatsapp_number_update($where,$dataUpdate){
 return $data = $this->db->where($where)->update(ADMIN,$dataUpdate);
}


public function forgotPasswordUpdate($where,$dataUpdate){
 return $data = $this->db->where($where)->update(ADMIN,$dataUpdate);
}
public function payemntUpdate($where,$dataUpdate){
 return $data = $this->db->where($where)->update(ADMIN,$dataUpdate);
}

public function updateShop($where,$dataUpdate){
 return $data = $this->db->where($where)->update(SHOPDETAILS,$dataUpdate);
}

public function checkUserNUpdatePwd($where,$update){
 $data = $this->db->get_where(ADMIN,$where)->row();
 if (isset($data) || !empty($data)) {
     return $data = $this->db->where($where)->update(ADMIN,$update);
 }else{
     return FALSE;
 }
}


public function checkUser($where){
 return $data = $this->db->get_where(ADMIN,$where)->row();
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

 
 /*public function profileUpdate($emailId,$shopName,$admin_id){
    $data = $this->db->get_where(ADMIN,array('email_id' =>$emailId,'admin_id !='=>$admin_id))->row();
   pr($data);
    if(!isset($data) || empty($data) ){
    die('8');
        $shop = $this->db->get_where(ADMIN,array('shop_name' =>$shopName,'admin_id !='=>$admin_id))->row();
        if(!isset($shop) || empty($shop) ){
    die('9');
    print_r('xxx');
              return  $this->db->update(ADMIN,array('email_id' =>$emailId,'shop_name' =>$shopName ),array('admin_id !='=>$admin_id));
            }    
    }
}*/
  
  public function profileUpdate($where){
    $data = $this->db->get_where(ADMIN,$where)->row();
   if (!isset($data)) {
        return TRUE;
   }else{
    return FALSE;
   }
   }

   public function profileDetail($data){
       return $this->db
       ->select(ADMIN.'.*,country.sortname')
       ->join('country','country.id ='.ADMIN.'.country_id')
       ->get_where(ADMIN,$data)->result_array();
   }
     

}
?>
