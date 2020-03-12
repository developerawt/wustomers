<?php 

class Shop extends commonService
{
	 function __construct() {
		parent::__construct();
		$this->load->model('Admin_model');
 		$this->load->model('dynamic_dependent_model');

	}

	public function index(){
		$uri = $this->uri->segment(3); // 1stsegment
		if ($uri != '' || $uri != NULL ) {


		$data['products'] = $this->Admin_model->get_all_products_detail_pwa($uri);
		$data['products_shop'] = $this->Admin_model->get_all_products_detail_shop($uri);
		 if ($data['products_shop'] == 0 || $data['products'] ==0) {
		 	redirect(base_url());
		 }else{
	    	$this->load->view('mysite',$data);
		 	}
		 }else{
			redirect(base_url());
		}
		
		
	}


		public function description($a,$b,$product_id){

		$data['products_desc'] = $this->Admin_model->get_products_description($product_id);
		$this->load->view('product_desc',$data);
	}

	public function proooo(){
   		$uri = $this->uri->segment(3); // 1stsegment
  		$data['products'] = $this->Admin_model->get_all_products_detail_pwa($uri);
 	    $this->load->view('mysite',$data);
}

public function shop()
{
	 $uri = $this->uri->segment(3); // 1stsegment
  		if ($uri != '' || $uri != NULL ) {
  			$data['products'] = $this->Admin_model->get_all_products_detail_pwa($uri);
 			$data['products_shop'] = $this->Admin_model->get_all_products_detail_shop($uri);
			$this->load->view('shop',$data);
}
}

 
/*public function add_images($products_id){
    	$this->load->view('add_images');
  }  */


}

?>