<?php
//Include database connection details
require_once('connection.php');

$count =$_POST['count'];

for ($i = 0; $i < $count; $i++) {

    $catid = $_POST['catid'][$i];
    $infohead = $_POST['infohead'][$i];

    //echo "<pre>";print_r($_POST);die;
    if ($infohead != '') {

        $query = "update specification_head set infohead = '$infohead' WHERE id='$catid'";
        $result = mysql_query($query);

    }
}

if ($result) {
    echo "<script>alert('Update Specification successfully');  window.location= 'modifyspechead.php' </script>";
} else {
    echo "<script>alert('Update Failed');  window.location= 'modifyspechead.php' </script>";
}

?>