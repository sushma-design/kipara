<?php
//Include database connection details
require_once('connection.php');

$category = $_POST['itemcat'];
$product = $_POST['product'];
    
$query = "UPDATE product SET deletestatus='NO' WHERE id='$product'";
$result = mysql_query($query);

if ($result) {
    echo "<script>alert('Product Deleted successfully');  window.location= 'deleteproduct.php' </script>";
} else {
    echo "<script>alert('Delete Failed');  window.location= 'deleteproduct.php' </script>";
}

?>

