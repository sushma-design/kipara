<?php
include "connection.php";

$unit = $_POST['unit'];
// echo $unit;
$result=mysql_query("SELECT * FROM subcategory WHERE id ='$unit' AND deletestatus='YES'");
$row=mysql_fetch_array($result);

$mainprise = $row['mainprise'];
$scratchprise = $row['scratchprise'];

$data = array('mainprise' => $mainprise , 'scratchprise' => $scratchprise);

echo json_encode($data);
?>
