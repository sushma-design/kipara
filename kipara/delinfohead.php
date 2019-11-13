<?php
include 'connection.php';

$catid =$_POST['catid'];



$delete = "UPDATE infohead SET deletestatus='NO' WHERE id='$catid' ";
$result = mysql_query($delete);

$delete = "UPDATE info SET deletestatus='NO' WHERE infohead='$catid' ";
$result = mysql_query($delete);

if($result){
    $msg="Additional Information is Deleted Successful.";
}else {
    $msg="Deletion Failed.";
}

echo json_encode($msg);


?>