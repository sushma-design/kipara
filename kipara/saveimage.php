<?php
//Include database connection details
require_once('connection.php');

$category = $_POST['itemcat'];
$product = $_POST['product'];

$result = mysql_query("SELECT * FROM product WHERE id='$product' AND deletestatus='YES' ");
$row1 = mysql_fetch_array($result);
$pname = $row1['productname'];

$fname1 = $_FILES['file1']['name'];
$fname2 = $_FILES['file2']['name'];
$fname3 = $_FILES['file3']['name'];
$fname4 = $_FILES['file4']['name'];
//echo "<pre>";print_r($_POST);die;
$fpath = 'images/';

$var1 = $fpath.$fname1;
$var2 = $fpath.$fname2;
$var3 = $fpath.$fname3;
$var4 = $fpath.$fname4;

move_uploaded_file($_FILES['file1']['tmp_name'], $fpath.$fname1);
move_uploaded_file($_FILES['file2']['tmp_name'], $fpath.$fname2);
move_uploaded_file($_FILES['file3']['tmp_name'], $fpath.$fname3);
move_uploaded_file($_FILES['file4']['tmp_name'], $fpath.$fname4);









if($fname1 != '')
{
    $imgpath1 = $fpath.$fname1;
    $imagepathnew1 = 'images/'.$pname.$fname1;
    rename($imgpath1,$imagepathnew1);

    $query = "update product set img1 = '$imagepathnew1' WHERE category ='$category' AND id='$product'";
    $result = mysql_query($query);
}
if($fname2 != '')
{
    
   $imgpath2 = $fpath.$fname2;
   $imagepathnew2 = 'images/'.$pname.$fname2;
   rename($imgpath2,$imagepathnew2); 

    $query = "update product set img2 = '$imagepathnew2' WHERE category ='$category' AND id='$product'";
    $result = mysql_query($query);
}
if($fname3 != '')
{
    $imgpath3 = $fpath.$fname3;
    $imagepathnew3 = 'images/'.$pname.$fname3;
    rename($imgpath3,$imagepathnew3);

    $query = "update product set img3 = '$imagepathnew3' WHERE category ='$category' AND id='$product'";
    $result = mysql_query($query);
}
if($fname4 != '')
{
    $imgpath4 = $fpath.$fname4;
   $imagepathnew4 = 'images/'.$pname.$fname4;
   rename($imgpath4,$imagepathnew4);

    $query = "update product set img4 = '$imagepathnew4' WHERE category ='$category' AND id='$product'";
    $result = mysql_query($query);
}


// echo "<pre>";print_r($_POST);die;

//$query = "update product set productname = '$pname',mainprise = '$mainprise',scratchprise = '$scratchprise',description = '$description',img1 = '$file1',img2 = '$file2',img3 = '$file3',img4 = '$file4' WHERE category ='$category' AND id='$product'";
//$result = mysql_query($query);

//echo "<pre>";print_r($query);die;
//}

if ($result) {
    echo "<script>alert('Update Product successfully');  window.location= 'changeimage.php' </script>";
} else {
    echo "<script>alert('Update Failed');  window.location= 'changeimage.php' </script>";
}

?>