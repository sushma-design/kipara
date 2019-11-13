<?php
require_once('connection.php');

$category = $_POST['category'];
$product = $_POST['product'];

$query = "SELECT * FROM product WHERE category ='$category' AND id='$product' AND deletestatus='YES' ";
$results = mysql_query($query);
$row=mysql_fetch_array($results);


$img1= $row['img1'];
$img2= $row['img2'];
$img3= $row['img3'];
$img4= $row['img4'];

$data = array('img1'=>$img1, 'img2'=>$img2, 'img3'=>$img3, 'img4'=>$img4 );


echo json_encode($data);

?>