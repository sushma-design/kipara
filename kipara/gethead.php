<?php
require_once('connection.php');

$infohead = $_POST['item'];
$query3 = "SELECT * FROM info WHERE infohead='$infohead' ";
$results3 = mysql_query($query3);
while($row3=mysql_fetch_array($results3)) {

    $infohead = $row3['infohead'];
    $info = $row3['info'];

    $data[] = array('infohead' => $infohead, 'info' => $info);
}

echo json_encode($data);

?>