<?php
require_once('connection.php');
echo "<pre>";print_r[$_POST];die;
$category = $_POST['itemcat'];
$product = $_POST['product'];
// alert(hiii);
$query = "SELECT * FROM product WHERE category ='$category' AND id='$product' AND deletestatus='YES' ";
$results = mysql_query($query);
$row=mysql_fetch_array($results);

$pname= $row['productname'];
$mainprise= $row['mainprise'];
$scratchprise= $row['scratchprise'];
// echo "<pre>";print_r[$_POST];die;
$query1 = "SELECT * FROM description WHERE category ='$category' AND product='$product' AND deletestatus='YES' ";
$results1 = mysql_query($query1);
$row1=mysql_fetch_array($results1);
$description=$row1['description'];
$advantages=$row1['features'];

$query2 = "SELECT * FROM howuse WHERE category ='$category' AND product='$product' AND deletestatus='YES' ";
$results2 = mysql_query($query2);
$row2=mysql_fetch_array($results2);
$howuse=$row2['howuse'];

$data = array('pname' => $pname, 'mainprise' => $mainprise, 'scratchprise' => $scratchprise, 'description' => $description, 'howuse' => $howuse);


$query3 = "SELECT * FROM info WHERE category ='$category' AND product='$product' AND deletestatus='YES' ";
$results3 = mysql_query($query3);
while($row3=mysql_fetch_array($results3)) {

    $infohead = $row3['infohead'];
    $info = $row3['info'];

    $data[] = array('infohead' => $infohead, 'info' => $info);
}


echo json_encode($data);

?>