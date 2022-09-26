<?php 
require "PHPmailer/PHPMailerAutoload.php";
function smtpmailer($to,$from,$from_name,$subject,$body)
{

$mail = new PHPMailer;
$mail->isSMTP();                                    
$mail->Host = 'mails.afriaid.com'; 
$mail->SMTPAuth = true;                              
$mail->Username = 'mysite.com';                 
$mail->Password = 'Balaga';                           
$mail->SMTPSecure =  'ssl';                            
$mail->Port = 465;                                    

$mail->setFrom="support@afriaids.com";
$mail->addAddress($to);     
//$mail->addAddress('ellen@example.com');              
$mail->addReplyTo($from,$from_name);

//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

//$mail->addAttachment('/var/tmp/file.tar.gz');       
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    
$mail->isHTML(true);                                

$mail->Subject = $subject;
$mail->Body    = $body;
//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
   $result= "<div class='alert alert-danger alert-dismissible'><a href='#' class='close' data-dismissible='alert'aria-label='close'>&times;</a>please try again an error just occured</div>";
   return $result;
} else {
    $result= "<div class='alert alert-danger alert-dismissible'><a href='#' class='close' data-dismissible='alert'aria-label='close'>&times;</a>check your email or spam folder </div>";
   return $result;
    
}

 }
 $to = $email;
 $from = 'support@afriaids.com';
 $name='Balaga';
 $subj='Reset password';
 $msg='hi <br><br>


 in order to reset your password please click on the link below:<br><br>
 <a href ="http://localhost/workbench/reset.php?code'.$code.'"> reset</a><br><br>
 or copy and paste the link to your browser.<br><br>



 Http://localhost/workbench/reset.php?code='.$code.'<br><br>
 kind regards<br><br>
 Ashua.com
 ';
$result= smtpmailer($to,$from,$name,$subj,$msg);

?>