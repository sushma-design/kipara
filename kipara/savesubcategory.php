<?php
include 'connection.php';

$itemcat= $_POST['itemcat'];
$product= mysql_real_escape_string($_POST['product']);

$counter2 = $_POST['counter'];


// echo "<pre>";print_r($_POST);die;

$result = mysql_query("SELECT * FROM category");
$row=mysql_fetch_array($result);
$catname = $row['name'];

$result1 = mysql_query("SELECT * FROM product WHERE id='$product'");
$row1=mysql_fetch_array($result1);
$pname = $row1['productname'];


$id = 0;
$select = mysql_query("SELECT id FROM subcategory ORDER BY id DESC");
$row = mysql_fetch_array($select);
$id1 = $row['id'];
$id = $id1 +1;


for ($i = 0; $i < $counter2; $i++) {

    $info = $_POST['info'][$i];
	$mainprise = $_POST['mainprise'][$i];
    $scratchprise = $_POST['scratchprise'][$i];

    if ($info != '') {

         $insertQuery = "INSERT INTO subcategory (category,productname,subcategoryname,mainprise,scratchprise) VALUES('$itemcat','$product','$info','$mainprise','$scratchprise')";
            $result = mysql_query($insertQuery);
			//echo "<pre>";print_r($insertQuery);die;
    }

}   
if ($result) {
    echo '<script type="text/javascript">alert("Data Inserted Successfully");
     window.location = "addsubcategory.php";
     </script>';

    exit;
}
else
{
   echo '<script type="text/javascript">alert("Insertion Failed");
    window.location = "addsubcategory.php";
    </script>';

    exit;
}




?>