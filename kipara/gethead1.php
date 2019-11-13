<?php
require_once('connection.php');

$infohead1 = $_POST['item1'];
$query3 = "SELECT * FROM specification_info WHERE infohead='$infohead1' ";
$results3 = mysql_query($query3);
while($row3=mysql_fetch_array($results3)) {

    $infohead1 = $row3['infohead'];
    $info1 = $row3['info'];

    $data[] = array('specihead' => $infohead1, 'info' => $info1);
}

echo json_encode($data);

?>