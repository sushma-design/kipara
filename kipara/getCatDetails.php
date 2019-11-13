<?php
include "connection.php";

$result = mysql_query("SELECT * FROM infohead WHERE deletestatus='YES' ");
//$data[]= 0;
while($row = mysql_fetch_assoc($result)) {

    $id = $row['id'];
    $infohead = $row['infohead'];

    $response[] = array('id' => $id, 'infohead' => $infohead);
}
echo json_encode($response);

?>