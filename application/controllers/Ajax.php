<?php 

class Ajax extends CI_Controller{


/*public function delete_admin_by_id(){
	$admin_id = $this->input->post('admin_id');

	$this->db->where('admin_id',$admin_id)
    ->delete('products')
	->where('admin_id',$admin_id)
    ->delete('admin_registration');

 $q = $this->db->get();
 if ($q) {
	return ; 	
 }else{
 	$e = $this->db->error();
 	return $e ;
 }

 }*/

public function delete_product_by_id(){
    $product_id = $this->input->post('product_id');
    $this->db->where('product_id', $product_id);
    $this->db->delete('products');
    echo json_encode(['success'=>true]);

}

public function delete_admin_by_id(){
    $admin_id = $this->input->post('admin_id');
    $this->db->where('admin_id', $admin_id);
    $this->db->set('status','inactive');
    $this->db->update('admin_registration');

    $this->db->where('admin_id', $admin_id);
    $this->db->set('status','inactive');
    $this->db->update('products');

    echo json_encode(['success'=>true]);

}

public function updateSubscription(){
    $adminId = $this->input->post('adminId');
    $subStatus = $this->input->post('subStatus');
    if($subStatus == 1){ $payStatus = 0; }else{ $payStatus = 1; }
    $this->db->where('admin_id', $adminId);
    $this->db->set('payment_status',$payStatus);
    $this->db->update('admin_registration');

    if($subStatus == 1){ 
      echo '<input onclick="subscription('.$adminId.',0)" id="subscribe'.$adminId.'" name="subscribe'.$adminId.'" type="checkbox">
            <label for="subscribe'.$adminId.'" class="label-success"></label>';
    }
    else{
      echo '<input onclick="subscription('.$adminId.',1)" id="subscribe'.$adminId.'" name="subscribe'.$adminId.'" type="checkbox" checked>
            <label for="subscribe'.$adminId.'" class="label-success"></label>';
    }
    

}

public function updateStatus(){
    $adminId = $this->input->post('adminId');
    $status = $this->input->post('status');
    if($status == 'active'){ $newStatus = 'inactive'; }else{ $newStatus = 'active'; }
    $this->db->where('admin_id', $adminId);
    $this->db->set('status',$newStatus);
    $this->db->update('admin_registration');
    echo true;
}

public function deleteStore(){
    $adminId = $this->input->post('adminId');
    //$this->db->where('admin_id', $adminId);
    //$this->db->where('payment_status !=', 1);
    $this->db->where(array('admin_id' => $adminId, 'payment_status !=' => 1));
    $this->db->set('isDeleted','YES');
    $this->db->update('admin_registration');
    echo true;
}

public function addVisitCount(){
    $uri = $this->input->post('uri');
    
    $data = $this->db->select('visitor_count')->get_where('admin_registration',array('shop_name'=>$uri))->row_array();
    $oldCount = $data['visitor_count'];
    $newCount = $oldCount+1;

    $this->db->where('shop_name', $uri);
    $this->db->update('admin_registration',array('visitor_count' => $newCount));
    if ($this->db->affected_rows() == '1') {
        echo 1;
    } else {
        echo 0;
    }

}

public function addEnquiryCount(){
    $uri = $this->input->post('uri');
    
    $data = $this->db->select('enquiry_count')->get_where('admin_registration',array('shop_name'=>$uri))->row_array();
    $oldCount = $data['enquiry_count'];
    $newCount = $oldCount+1;

    $this->db->where('shop_name', $uri);
    $this->db->update('admin_registration',array('enquiry_count' => $newCount));
    if ($this->db->affected_rows() == '1') {
        echo 1;
    } else {
        echo 0;
    }

}

/*
    public function sendemail(){
        
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $message_customer = $this->input->post('message');
        $subject_customer = $this->input->post('subject');
        $to = 'info@whatsapcampaigns.com';
        $subject = 'New message from your website';
        $headers = "From: " . strip_tags($email) . "\r\n";
        $headers .= "Reply-To: ". strip_tags($email) . "\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

  
  $message = '
        <html>
            <head>
                <title>Call me back</title>
            </head>
            <body>
                <p><b>Name:</b> '.$name.'</p>
                <p><b>Email:</b> '.$email.'</p>                        
                <p><b>Message Customer:</b> '.$message_customer.'</p>                        
                <p><b>Subject Customer:</b> '.$subject_customer.'</p>                        
            </body>
        </html>'; 
 
if(mail($to, $subject, $message, $headers))
  echo json_encode(array('status' => 'success'));
} else {
  echo json_encode(array('status' => 'error'));
}
    }
*/
}



?>