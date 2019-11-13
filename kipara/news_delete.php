<?php
include 'connection.php';

$id = $_POST['id'];


$delete = mysql_query("DELETE FROM news WHERE id='$id'");


if($delete) {

    $response["status"] = 'success';
    $response["message"] = 'News Deleted Sucessfully !.';
}
else
{
    $response["status"] = 'failed';
    $response["message"] = "Error in POST method";
}
echo json_encode($response);;
?>