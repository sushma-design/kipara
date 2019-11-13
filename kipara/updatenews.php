<?php

include 'connection.php';
date_default_timezone_set("Asia/Calcutta");

$response = array();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $date = date('Y-m-d', strtotime($_POST['date']));
    $title = $_POST['title'];
//    $place = $_POST['place'];
    $content = mysql_real_escape_string($_POST['content']);
    $id = $_POST['id'];

    $filename = $_FILES['file']['name'];
//    echo"<pre>";print_r($_FILES);die;
    $fpath = 'newsphotos/';
    $fpath1 = 'newsphotos/'.$filename;
    move_uploaded_file($_FILES['file']['tmp_name'],$fpath1);

if($filename != ''){
//echo "<pre>";print_r($_POST);die;
        $imgpath1 = $fpath.$filename;
        $imagepathnew1 = 'newsphotos/'.$filename;
        rename($imgpath1,$imagepathnew1);

    $sql = "update news set date = '$date', title = '$title', content = '$content', img1='$imagepathnew1' where id = '$id'";
    $result = mysql_query($sql);
}
else {
    $sql = "update news set date = '$date', title = '$title', content = '$content' where id = '$id'";
    $result = mysql_query($sql);
}
    if ($result) {
        $response["status"] = 'success';
        $response["message"] = "News Updated Successfully";
    } else {
        $response["status"] = 'failed';
        $response["message"] = 'Update Failed !.';
    }
} else {
    $response["status"] = 'failed';
    $response["message"] = "Error in POST method";
}
echo json_encode($response);
?>