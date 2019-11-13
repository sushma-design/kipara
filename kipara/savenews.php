<?php

include "connection.php";
//echo "<pre>";print_r($_POST);die;


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $date = date('Y-m-d', strtotime($_POST['date']));

    $title = $_POST['title'];
    $content = mysql_real_escape_string($_POST['content']);

    $filename = $_FILES['file']['name'];
    //    echo"<pre>";print_r($_FILES);die;
    $fpath = 'newsphotos/'.$filename;
    $fpath1 = 'newsphotos/'.$filename;
    move_uploaded_file($_FILES['file']['tmp_name'], $fpath);

    $sql = mysql_query('insert into news (date,title,content, img1) values("' . $date . '","' . $title . '","'. $content.'" ,"' . $fpath1 . '")');
    $last_insert_id=mysql_insert_id();
    // define("MAX_SIZE", "999999");


    if ($sql) {
        $response["status"] = 'success';
        $response["message"] = 'News Added Successfully';
    } else {
        $response["status"] = 'failed';
        $response["message"] = 'Insert Failed !.';
    }
} else {
    $response["success"] = 'failed';
    $response["message"] = "Error in POST method";
}
echo json_encode($response);
?>