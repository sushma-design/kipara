<?php
include 'connection.php';


$orderno = $_POST['orderno'];
// echo $orderno;
//  echo "SELECT * FROM onlineorder WHERE orderno='$orderno'";
$sql1 = mysql_query("SELECT * FROM onlineorder WHERE orderno='$orderno'");
$row1 = mysql_fetch_array($sql1);

    $orderno1 = $row1['orderno'];
    $date = $row1['date'];
    $name = $row1['name'];
    $lname = $row1['lname'];
    $email = $row1['email'];
    $contact = $row1['contact'];
    $address = $row1['address'];
    $city = $row1['city'];
    $landmark = $row1['landmark'];
    $state = $row1['state'];
    $pin = $row1['pin'];

    $data = array('orderno' => $orderno1, 'name' => $name, "lname" => $lname, "email" => $email, "contact" => $contact, "address" => $address, "city" => $city,"landmark" => $landmark,  "state" => $state, "pin" => $pin);



// echo"<pre>";print_r($data);die;
echo json_encode($data);
?>