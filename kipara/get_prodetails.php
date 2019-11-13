<?php
include "connection.php";

$category = $_POST['category'];

$result=mysql_query("SELECT * FROM product WHERE category ='$category' AND status='YES'");

while($row=mysql_fetch_array($result))
{
    $product = $row['name'];
    $id= $row['id'];

    $data[] = array('product' => $product, 'id' => $id);
}
echo json_encode($data);
?>
