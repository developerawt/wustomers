<?php  
function Send_Mail($to,$subject,$body)
{
    require 'class.phpmailer.php';
    $from = "Senders_Email_Address";
    $mail = new PHPMailer();
    $mail->IsSMTP(true); // SMTP
    $mail->SMTPAuth   = true;  // SMTP authentication
    $mail->Mailer = "smtp";
    $mail->Host= "tls://email-smtp.us-east.amazonaws.com"; // Amazon SES
    $mail->Port = 465;  // SMTP Port
    $mail->Username = "Senders_Email_Address";  // SMTP  Username
    $mail->Password = "MyPassword";  // SMTP Password
    $mail->SetFrom($from, 'From Name');
    $mail->AddReplyTo($from,'Senders_Email_Address');
    $mail->Subject = $subject;
    $mail->MsgHTML($body);
    $address = $to;
    $mail->AddAddress($address, $to);
    if(!$mail->Send())
        return false;
    else
        return true;
}
?>