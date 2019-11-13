<?php
include "connection.php";

$unit = $_POST['unit'];
echo $unit;
$result=mysql_query("SELECT * FROM product WHERE category ='$category' AND id = '$id' AND deletestatus='YES'");

while($row=mysql_fetch_array($result))
{
    
    $id= $row['id'];
    $mainprise = $row['mainprise'];
    $scratchprise = $row['scratchprise'];

    $data[] = array('id' => $id,'mainprise' = > $mainprise , 'scratchprise' => $scratchprise);
}
echo json_encode($data);
?>
