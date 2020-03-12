<?php 

class Sendsms extends CI_Controller{
	
	function __construct(){
	parent::__construct();
	$this->load->library('africastalking');
	}

	public function sendsms()	{
	$message="I am Arpit";
	$mobile=918878872281;
	$this->africastalking->sendMessage($mobile, $message);
  	}
}