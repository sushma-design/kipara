<?php
include 'connection.php';

$itemcat= $_POST['itemcat'];
$product1= $_POST['product'];
$mainprise= $_POST['mainprise'];
$scratchprise= $_POST['scratchprise'];
$description= $_POST['description'];
$features = $_POST['features'];
$use= $_POST['use'];

$counter2 = $_POST['counter'];
$counter1 = $_POST['counter1'];

//echo "<pre>";print_r($_POST);die;

$result = mysql_query("SELECT * FROM category");
$row=mysql_fetch_array($result);
$catname = $row['name'];



$fname1 = $_FILES['file1']['name'];

$fpath = 'images/';

$var1 = $fpath.$fname1;

move_uploaded_file($_FILES['file1']['tmp_name'], $fpath.$fname1);

$imgpath1 = $fpath.$fname1;
$imagepathnew1 = 'images/'.$pname.$fname1;
rename($imgpath1,$imagepathnew1);


$id = 0;
$select = mysql_query("SELECT id FROM product ORDER BY id DESC");
$row = mysql_fetch_array($select);
$id1 = $row['id'];
$id = $id1 +1;


    $insertQuery = "INSERT INTO product (id,category,productname,mainprise,scratchprise,img1,path1) VALUES('$id','$itemcat','$product1','$mainprise','$scratchprise','$imagepathnew1','$fpath')";
    $result = mysql_query($insertQuery);

    $insertQuery = "INSERT INTO description (product,category,description, features) VALUES('$id','$itemcat','".mysql_real_escape_string($_POST['description'])."','".mysql_real_escape_string($_POST['features'])."')"or die(mysql_error());
    $result = mysql_query($insertQuery);

//if($use != '') {
    $insertQuery = "INSERT INTO howuse (product,category,howuse) VALUES('$id','$itemcat','".mysql_real_escape_string($_POST['use'])."')"or die(mysql_error());
    $result = mysql_query($insertQuery);
//}
//echo "<pre>";print_r($query);die;



for($i=0;$i<$counter2; $i++) {

    $item = $_POST['item'][$i];
    $info = $_POST['info'][$i];
    if ($item != '') {
        if ($info != '') {
            // echo "INSERT INTO info (product,category,infohead,info) VALUES('$product','$itemcat','$item','$info')";
            $insertQuery = "INSERT INTO info (product,category,infohead,info) VALUES('$id','$itemcat','$item','$info')";
            $result = mysql_query($insertQuery);
        }
    }
}

for($i=0;$i<$counter1; $i++) {
    $item1 = $_POST['item1'][$i];
    $info1 = $_POST['info1'][$i];
    if ($item1 != '') {
        if ($info1 != '') {
            $insertQuery = "INSERT INTO specification_info (product,category,infohead,info) VALUES('$id','$itemcat','$item1','$info1')";
            $result = mysql_query($insertQuery);
        }
    }
}
if ($result) {
    echo '<script type="text/javascript">alert("Data Inserted Successfully");
     window.location = "addproduct.php";
     </script>';

    exit;
}
else
{
   echo '<script type="text/javascript">alert("Insertion Failed");
    window.location = "addproduct.php";
    </script>';

    exit;
}




?>