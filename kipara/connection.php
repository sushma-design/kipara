<?php
$mysql_hostname = "localhost:3306" ;
$mysql_user ="root";
$mysql_passward="";
$mysql_database="kipara";

$bd =mysql_connect($mysql_hostname ,$mysql_user ,$mysql_passward) or die("could not connect database");
mysql_select_db($mysql_database,$bd) or die("could not select database");

?>