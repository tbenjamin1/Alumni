<?php 
// require "PHPMailer/PHPMailerAutoload.php";

require 'PHPMailer.git/PHPMailerAutoload.php';
// require('C:\xampp\New folder\htdocs\form\PHPMailer-master\PHPMailerAutoload.php');
function smtpmailer($to,$from,$from_name,$subject,$body)
{
$email= new PHPMailer();
$email->IsSMTP();
$email->IsSMTPAuth = true;

$email->SMTPSecure ='ssl';
$email->Host ='mail.afriaids.com';
$email->Port = 465;
$email->Username ='support@afriaids.com';
$email->Password ='viralskill247@1';


$email->IsHTML(true);
$email->From="support@afriaids.com";
$email->FromName=$from_name;
$email->Sender=$from;
$email-> AddReplyTO($from,$from_name);
$email->$subject = $subject;
$email->Body = $body;
$email->AddAddress($to);
if(!$email->send()){
    $result ="<div class=' alert alert -success alert-dismissible' ><a href ='#' class='close' data-dismiss='alert' aria-label='close'> &times;</a> plz try again an error occured
    contact the admin
    </div>";
    return $result;
}else{
    $result ="<div class=' alert alert -success alert-dismissible' ><a href ='#' class='close' data-dismiss='alert' aria-label='close'> 
    &times;</a> plz  check your email inbox or spam folder
    </div>";
    return $result;
}
}
$to =$email;
$from ="support@afriaids.com";
$name ='viralskill247@1';
$subj ='resetpassword';
$msg = 'Hi there, <br><br>
in order to reset your password
click on this <a href=\"http://localhost/form/create-new-password.php?token='. $token . '\">
link</a> rest <br><br>
or copy and paste the link below in the new tab <br><br>
http://localhost/form/create-new-password.php?token='. $token . '

kind Regards,<br><br>
@tbenpolly_250


';
$result=smtpmailer($to,$from,$name,$subj,$msg);

?>