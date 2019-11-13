<?php
include 'connection.php';

    $catid =$_POST['catid'];



        $delete = "UPDATE category SET status='NO' WHERE id='$catid' ";
        $result = mysql_query($delete);

// $delete1 = "UPDATE product SET deletestatus='NO' WHERE category='$catid' ";
// $result1 = mysql_query($delete1);


if($result){
    $msg="Category is Deleted Successfully.";
}else {
    $msg="Deletion Failed.";
}

echo json_encode($msg);


?>