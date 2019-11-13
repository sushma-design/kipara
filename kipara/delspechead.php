<?php
include 'connection.php';

$catid =$_POST['catid'];



$delete = "UPDATE specification_head SET deletestatus='NO' WHERE id='$catid' ";
$result = mysql_query($delete);

$delete = "UPDATE specification_info SET deletestatus='NO' WHERE infohead='$catid' ";
$result = mysql_query($delete);

if($result){
    $msg="Specification is Deleted Successful.";
}else {
    $msg="Deletion Failed.";
}

echo json_encode($msg);


?>