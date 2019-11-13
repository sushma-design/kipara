<?php

require_once('connection.php');
require_once('php-excel-reader/excel_reader2.php');
$date = date('Y-m-d');
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["file"]["name"]);
move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);

$data = new Spreadsheet_Excel_Reader();

// Set output Encoding.
$data->setOutputEncoding('UTF-8');

$data->read($target_file);
$sql= 0;

//$result =mysql_query("SELECT slno FROM user ORDER BY slno DESC ");
//$row1 = mysql_fetch_array($result);
//$slno = $row1['slno'];

$max = count($data->sheets[0]['cells']);
//echo "<pre>";print_r($max);die;
for($i=0;$i< count($data->sheets);$i++) // Loop to get all sheets in a file.
{
    $counter = 0;
    for ($x = 0; $x <= count($data->sheets[$i]["cells"]); $x++) {
//        echo "<pre>";print_r(count($data->sheets[$i]["cells"]));die;
//        $counter = $counter +1;
        if(empty($data->sheets[$i]["cells"][$x]))
        {
            echo "<script> alert('Enteries upto '.$x.'are imported into database'); window.location ='uploadexcel.php' </script>";
        }
        else
        {
            $slno = $data->sheets[$i]["cells"][$x][1];
            $category = $data->sheets[$i]["cells"][$x][2];
            $name = $data->sheets[$i]["cells"][$x][3];
//            $company_name = $data->sheets[$i]["cells"][$x][3];
//            $address = $data->sheets[$i]["cells"][$x][4];
//            $mobileno = $data->sheets[$i]["cells"][$x][5];
//            $route = $data->sheets[$i]["cells"][$x][9];

//            $select = mysql_query("SELECT * FROM route WHERE route='$route'");
//            $row= mysql_fetch_array($select);
//            $routeid =$row['id'];

//            $customercode = 'CMS'.$slno;
            $sql = "INSERT INTO `product1`(`category`, `productname`)
             VALUES ('$category','$name')";
            mysql_query($sql);
//            echo $sql;
//            echo $counter;
        }
    }

}

if($sql) {
    echo "<script> alert('Your database has imported successfully.'); window.location ='uploadexcel.php' </script>";
}

?>