<?php
require_once('connection.php');
date_default_timezone_set('ASIA/KOLKATA');
$date = date('Y-m-d');

$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$msg = $_POST['message'];

$id11 = 0;
$select = mysql_query("SELECT id FROM partner ORDER BY id DESC");
$row = mysql_fetch_array($select);
$id1 = $row['id'];
$id11 = $id1 +1;
// echo "<pre>";print_r($_POST);die;
// echo "INSERT INTO partner(id,date,name,email,contact,message) VALUES('$id','$date','$name','$email',$contact','$message')"
$insert = mysql_query("INSERT INTO partner(id,date,name,email,contact,message) VALUES('$id11','$date','$name','$email','$phone','$msg')");

ini_set("sendmail_from", "crm@kipara.in");
$to = "crm@kipara.in";//change receiver address
$from_mail = $name.'<'.$email.'>';
$subject1 = "Request For Become A Partner received from Kinjal Autochem Website";

$body = array(
    'From : '.$name.'',
    'Phone : '.$phone.'',
    'Email : '.$email.'',
    'Message : '.$msg.'',

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