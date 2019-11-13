<?php
//Include database connection details
require_once('connection.php');

$category = $_POST['itemcat'];
$categoryid = $_POST['cat'];
$product = $_POST['prod'];
// echo "<pre>";print_r($_POST);die;

$pname = $_POST['pname'];
$mainprise = $_POST['mainprise'];
$scratchprise = $_POST['scratchprise'];
$description = $_POST['description'];
$features = $_POST['features'];
$howuse = $_POST['use'];
$count = $_POST['count'];
$count1 = $_POST['count1'];

$fname1 = $_FILES['file1']['name'];
//echo $fname1;die;
$fpath = 'images/';
//echo "<pre>";print_r($fname1);die;

$var1 = $fpath.$fname1;

move_uploaded_file($_FILES['file1']['tmp_name'], $fpath.$pname.$fname1);


if ($fname1 != '') {

    $imgpath1 = $fpath.$fname1;
    $imagepathnew1 = 'images/'.$pname.$fname1;
    rename($imgpath1,$imagepathnew1);

$query1 = "update product set productname = '$pname',mainprise = '$mainprise',scratchprise = '$scratchprise', img1= '$imagepathnew1',path1 = '$fpath'  WHERE id='$product'";
$result1 = mysql_query($query1);
}
else {
    // echo "update product set productname = '$pname',mainprise = '$mainprise',scratchprise = '$scratchprise', img1= '$imagepathnew1',path1 = '$fpath'  WHERE id='$product'";die;
    $query1 = "update product set productname = '$pname',mainprise = '$mainprise',scratchprise = '$scratchprise'  WHERE id='$product'";
    $result1 = mysql_query($query1);
}
//echo "In If"; exit(0);
// echo "<pre>";print_r("update description set description = '".mysql_real_escape_string($_POST['description'])."' WHERE category ='$categoryid' AND product='$product'");die;
$query1 = "update description set description = '".mysql_real_escape_string($_POST['description'])."', features = '".mysql_real_escape_string($_POST['features'])."' WHERE category ='$categoryid' AND product='$product'"or die(mysql_error());
$result1 = mysql_query($query1);

    //echo "In If2"; exit(0);
    // echo "<pre>";print_r("update howuse set howuse = '".mysql_real_escape_string($_POST['use'])."' WHERE category ='$categoryid' AND product='$product'");die;  
$query1 = "update howuse set howuse = '".mysql_real_escape_string($_POST['use'])."' WHERE category ='$categoryid' AND product='$product'"or die(mysql_error());
$result1 = mysql_query($query1);

//echo "<pre>";print_r($_POST);die;

$delete = mysql_query("delete from info where product='$product' AND category='$categoryid'");
$delete1 = mysql_query("delete from specification_info where product='$product' AND category='$categoryid' ");

if($count1 != '0') {
    for ($i = 0; $i<$count1; $i++) {
        //echo "hi";
        //echo "In For Loop"; exit(0);
        //$slno = $_POST['slno'][$i];
        $infohead1 = $_POST['infohead1'][$i];
        $info1 = $_POST['info1'][$i];

        if ($infohead1 != '') {
            if ($info1 != '') {

                $query22 = "INSERT into specification_info (product,category,infohead, info) VALUES('$product','$categoryid','$infohead1','$info1')";
                $result22 = mysql_query($query22);
            }
        }
    }
}

if($count != '0') {
    for ($i1 = 0; $i1<$count; $i1++) {
        //echo "In For Loop"; exit(0);
        //$slno = $_POST['slno'][$i];
        $infohead = $_POST['infohead'][$i1];
        $info = $_POST['info'][$i1];
        if ($infohead != '') {
            if ($info != '') {
                //echo "<pre>";print_r($_POST);die;

                $query21 = "INSERT into info (product,category,infohead,info) VALUES('$product','$categoryid','$infohead','$info')";
                $result12 = mysql_query($query21);
            }
        }
    }
}


//echo "<pre>";print_r($_POST);die;
if ($query1) {
  echo "<script>alert('Update Product successfully');  window.location= 'modifyproduct.php' </script>";
} else {
echo "<script>alert('Update Failed');  window.location= 'modifyproduct.php' </script>";
}

?>