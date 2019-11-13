<?php
require 'connection.php';
$select = mysql_query("SELECT id,date_format(date,'%d-%m-%Y') as date,title,content FROM news");
while ($row = mysql_fetch_array($select)) {
    $id = $row['id'];
    $date = $row['date'];
    $title = $row['title'];
//    $place = $row['place'];
    $content = $row['content'];
    $arr['data'][]= array("id"=>$id,"date"=>$date,"title"=>$title
    ,"content"=>$content);
}

echo json_encode($arr);
?>