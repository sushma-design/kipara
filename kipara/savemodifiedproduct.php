<?php
include 'db_connection/connection.php';
$response = array();
if($_SERVER['REQUEST_METHOD']=='POST'){

    $product = $_POST['product'];
    
    $mainprise = $_POST['mainprise'];
    $scratchprise = $_POST['scratchprise'];
    $description = $_POST['description'];
    $use = $_POST['use'];
    $img1 = $_POST['img1'];
    // $authorization = $_POST['authorization'];
    

    $fname = $_FILES['file']['name'];
    $fpath = '../assets/img/sign/'.$fname;
    $fpath1 = 'assets/img/sign/'.$fname;

//echo $var1;die;
    move_uploaded_file($_FILES['file']['tmp_name'], $fpath);
//    echo "<pre>";print_r($_POST);die;
    $sql = "update product set mainprise = '$mainprise', scratchprise = '$scratchprise' where productid = '$product'";
    $result = mysql_query($sql);


    if($result) {
        $response["status"] = 'success';
        $response["message"] = "Employee Updated Successfully";
    }



}else{
    $response["status"] = 'failed';
    $response["message"] = "Error in POST method";
}
echo json_encode($response);
?>