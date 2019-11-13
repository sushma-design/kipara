<?php

require_once('connection.php');
 $query3 = "SELECT * FROM subcategory";
$results3 = mysql_query($query3);
while($row3=mysql_fetch_array($results3)) {

    $infohead = $row3['subcategoryname'];
    $id = $row3['id'];

    $data[] = array('infohead' => $infohead, 'id' => $id);
}

echo json_encode($data);

?>