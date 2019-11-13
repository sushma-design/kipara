<?php
require_once('connection.php');

$qry1 = mysql_query("select * from product ");
while($row=mysql_fetch_array($qry1))
{
    $id = $row['id'];
    $qry = mysql_query("update howuse set product='$id' where id='$id'");
}
    


?>