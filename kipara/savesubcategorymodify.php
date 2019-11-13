<?php
//Include database connection details
require_once('connection.php');

$category = $_POST['itemcat'];
$categoryid = $_POST['cat'];
$product = $_POST['prod'];
$pname = $_POST['pname'];
 //echo "<pre>";print_r($_POST);die;

$subcategory = $_POST['info'];
$mainprise = $_POST['mainprise'];
$scratchprise = $_POST['scratchprise'];

$count = $_POST['count'];

$delete = mysql_query("delete from subcategory where category='$categoryid'");

if($count != '0') {
    for ($i1 = 0; $i1<$count; $i1++) {
        //echo "In For Loop"; exit(0);
        //$slno = $_POST['slno'][$i];
        $id = $_POST['id'][$i1];
        $subcategory = $_POST['info'][$i1];
		$mainprise = $_POST['mainprise'][$i1];
		$scratchprise = $_POST['scratchprise'][$i1];
        
            if ($subcategory != '') {
                //echo "<pre>";print_r($_POST);die;

                 $query1 = "update subcategory set subcategoryname = '$subcategory',mainprise = '$mainprise',scratchprise = '$scratchprise' WHERE id='$id' ";
                 $result1 = mysql_query($query1);
				 
				 $query21 = "INSERT into subcategory (category,productname,subcategoryname,mainprise,scratchprise) VALUES('$categoryid','$product','$subcategory','$mainprise','$scratchprise')";
                $result12 = mysql_query($query21);
				 
				 
            }
        
    }
}



//echo "<pre>";print_r($query1);die;

if ($query1) {
  echo "<script>alert('Update Subcategory successfully');  window.location= 'modifysubcategory.php' </script>";
} else {
echo "<script>alert('Update Failed');  window.location= 'modifysubcategory.php' </script>";
}

?>