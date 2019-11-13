<?php
include 'connection.php';

$id = $_POST['id'];


$sql = mysql_query("SELECT * FROM news WHERE id='$id'");

$row = mysql_fetch_array($sql);
$data = array("id" => $row['id'], "date" => $row['date'], "title" => $row['title'], "content" => $row['content'], "img1" => $row['img1']);


echo json_encode($data);
?>