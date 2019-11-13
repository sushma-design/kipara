<?php
include 'connection.php';





$delete = "UPDATE info SET deletestatus='NO'";
$result = mysql_query($delete);
if($result){
    $msg="Information is Deleted Successful.";
}else {
    $msg="Deletion Failed.";
}

echo json_encode($msg);


?>