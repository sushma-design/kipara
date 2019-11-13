<?php

require_once('connection.php');
 $query3 = "SELECT * FROM specification_head WHERE deletestatus='YES' ";
$results3 = mysql_query($query3);
while($row3=mysql_fetch_array($results3)) {

    $nutritionalhead = $row3['infohead'];
    $id = $row3['id'];

    $data[] = array('specihead' => $nutritionalhead, 'id' => $id);
}

echo json_encode($data);

?>