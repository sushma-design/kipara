<?php
require_once('connection.php');

$category = $_POST['category'];
$product = $_POST['product'];

$query = "SELECT * FROM item WHERE category ='$category' AND id='$product' AND status='YES' ";
$results = mysql_query($query);
$row=mysql_fetch_array($results);

$rate = $row['rate'];


$data = array('rate'=>$rate);


echo json_encode($data);

?>