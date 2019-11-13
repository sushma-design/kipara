<?php
include "connection.php";

$category = $_POST['category'];

$result=mysql_query("SELECT * FROM product WHERE category ='$category' AND deletestatus='YES'");

while($row=mysql_fetch_array($result))
{
    $product = $row['productname'];
    $id= $row['id'];
    $rate = $row['rate'];

    $data[] = array('name' => $product, 'id' => $id, 'rate' => $rate);
}
echo json_encode($data);
?>
