<?php
//Include database connection details
require_once('connection.php');

$count =$_POST['count'];

for ($i = 0; $i < $count; $i++) {

    $catid = $_POST['catid'][$i];
    $cname = $_POST['cname'][$i];

    //echo "<pre>";print_r($_POST);die;
    if ($cname != '') {

        $query = "update category set name = '$cname' WHERE id='$catid'";
        $result = mysql_query($query);

    }
}

if ($result) {
    echo "<script>alert('Update Category successfully');  window.location= 'modifycategory.php' </script>";
} else {
    echo "<script>alert('Update Failed');  window.location= 'modifycategory.php' </script>";
}

?>