<?php

require_once('connection.php');
date_default_timezone_set('ASIA/KOLKATA');
$date = date('Y-m-d');
//$date = $_POST['date'];
$name = $_POST['name'];
$email = $_POST['email'];
$city = $_POST['city'];
$contact = $_POST['contact'];
$message = $_POST['message'];

$fname1 = $_FILES['file1']['name'];
$fpath = 'kipara/resume/';
//echo "<pre>";print_r($_POST);die;


$id = 0;
$select = mysql_query("SELECT id FROM resume ORDER BY id DESC");
$row = mysql_fetch_array($select);
$id1 = $row['id'];
$id = $id1 +1;

$fpath1 = 'resume/'.$id.$fname1;

$var1 = $id.$fname1;

move_uploaded_file($_FILES['file1']['tmp_name'], $fpath1.$var1);
// echo $_FILES;die;
$insert=mysql_query("INSERT INTO resume(id,date,name,email,city,contact,message,filepath) VALUES('$id','$date','$name','$email','$city','$contact','$message', '$fpath1')");

if($insert){
    echo "<script>
            alert('Your Data Has Been Saved');
            window.location ='career.php';
        </script>";
} else{
    echo "<script>
            alert('Failed');
            window.location ='career.php';
        </script>";
}

?>