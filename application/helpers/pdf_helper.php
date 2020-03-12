<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	function tcpdf()
	{
	    //require_once('tcpdf/config/lang/eng.php');
	    //require_once('tcpdf/tcpdf.php');

	    require_once(dirname(__FILE__) . '/tcpdf/tcpdf.php');
	}


	function sendMailInvoice($email){

		$path = getcwd(); //GET THE FOLDER PATH OF PROJECT 

		require($path."/PHPMailer/class.phpmailer.php");
        

        $message = 'DEAR USER HERE IS YOUR ATTACHED E-INVOICE YOU CAN GO THROUGH IT';
        $subject = 'CORDIAL E-INVOICE';
        $mail = new PHPMailer;
        $mail->isSMTP();
        //$mail->SMTPDebug = 2;
        $mail->Host = "mail.madeirarentcar.com";
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = "tls";
        $mail->Port = 587;
        $mail->From = "info@madeirarentcar.com";
        $mail->FromName = "CORDIAL";            
        $mail->Username = 'info@madeirarentcar.com';
        $mail->Password = 'rentcar@123';
        
        $mail->addAddress($email);              
        $mail->addAttachment('uploads/pdfInvoice.pdf');
        $mail->Subject = $subject;
        $mail->msgHTML($message);

        $sendEmail = $mail->send();
        
        if($sendEmail){
        	unlink('uploads/pdfInvoice.pdf');
        	return TRUE;
        }
        else{
        	return FALSE;
        }
	}
