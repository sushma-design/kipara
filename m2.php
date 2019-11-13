<?php

$name = $_POST['name'];
$email = $_POST['email'];
$review = $_POST['review'];

//echo "<pre>";print_r($_POST);die;
ini_set("sendmail_from", "crm@kipara.in");
$to = "crm@kipara.in";//change receiver address
$from_mail = $name.'<'.$email.'>';
$subject1 = "Reviews For Products received from Kinjal Autochem Website";

$body = array(
    'From : '.$name.'',
    'Email : '.$email.'',
    'Review : '.$review.'',

);
$body = implode( "\r\n" , $body );
$from = $from_mail;
$headers .= 'From: ' . $from . "\r\n";
$headers .= "Reply-To: ". $email. "\r\n";
$headers .= "Return-Path: ". $email. "\r\n";
$headers .= "Organization: Sender Organization\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/plain; charset=iso-8859-1\r\n";
$headers .= "X-Priority: 3\r\n";
$headers .= "X-Mailer: PHP". phpversion() ."\r\n";

$result = mail($to,$subject1,$body,$headers);


if($result) {
    $id='1';
}
else {
    $id='0';
}

$data = array('id'=> $id);
echo json_encode($data);



?>