<?php
session_start();
require_once("connection.php");

$orderno = $_POST['orderno'];
// echo $orderno;
$date = $_POST['date'];
$paymentmode = $_POST['paymentmode'];
$cheque = $_POST['cheque'];
$batchnumber = $_POST['batchnumber'];
$chequeno = $_POST['chequeno'];
$chequedate = $_POST['chequedate'];
$cardtype = $_POST['cardtype'];
$bankname = $_POST['bankname'];
// echo "<pre>";print_r($_POST);die;
// echo "UPDATE online_invoice SET payment_date = '$date', paymentmode= '$paymentmode' , chequeno='$chequeno', chequedate='$chequedate', bankname='$bankname', batchnumber='$batchnumber', cardtype='$cardtype', status='recieved' WHERE orderno='$orderno'";

$result1 = mysql_query("UPDATE online_invoice SET payment_date = '$date', paymentmode= '$paymentmode' , chequeno='$chequeno', chequedate='$chequedate', bankname='$bankname', batchnumber='$batchnumber', cardtype='$cardtype', status='paid' WHERE orderno='$orderno'");


if (isset($result1)) {
    echo '<script type="text/javascript">alert("Your Payment Is Done Sccessfully!");
    window.location = "pendinginvoice.php";
    </script>';
    exit;
}
else
{
    echo '<script type="text/javascript">alert("Failed");
    window.location = "pendinginvoice.php";
    </script>';
    exit;
}
 ?>
