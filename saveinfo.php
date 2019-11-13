<?php
session_start();

require_once("connection.php");

//print_r($_POST['cash']); die;

$name = $_POST['name'];
$lname = $_POST['lname'];
$name1 = $_POST['name'].' '.$_POST['lname'];
$email = $_POST['email'];
$contact = $_POST['contact1'];
$add = mysql_real_escape_string($_POST['add']);
$landmark = $_POST['landmark'];
$city = $_POST['city'];
$state = $_POST['state'];
$pin = $_POST['pin'];
$grandtot = $_POST['grandtot'];
$cash = $_POST['cash'];
$net = $_POST['net'];
// echo "<pre>";print_r($_POST);die;
if($cash == 'on')
{	$mode = 'Cash on Delivery';	}
if($net == 'on')
{	$mode = 'Online Payment';	}

$tax = ($grandtot * 12)/100;
$cgst = $tax/2;
$sgst = $tax/2;
$tot = $grandtot - ($cgst *2);

$date = date("Y-m-d");
$orderno = 0 ;
$result1 = mysql_query("SELECT * FROM onlineorder ORDER BY orderno DESC");
$row1 = mysql_fetch_array($result1);
$orderno = $row1['orderno'] + 1;
$slno = 0 ;

$words = explode(" ", $name1);
$acronym = "";
foreach ($words as $w) {
    $acronym .= $w[0];
}
$ccode = substr($acronym, 0, 2); 

$ccodeno = 0;
$select1 = mysql_query("SELECT ccodeno FROM onlineorder ORDER BY ccodeno DESC");
$row1 = mysql_fetch_array($select1);
$ccodeno1 = $row1['ccodeno'];
$ccodeno = $ccodeno1 + 1;
$contactcode = strtoupper($ccode) . '0' . $ccodeno;
$ccode = strtoupper($ccode);

// echo "INSERT into onlineorder (orderno,slno,date,name,lname,contactcode,ccode,ccodeno,email,contact,address,landmark,city,state,pin,category,itemid,item,qty,price,total,finaltotal,mode,status) 
		// Values ('$orderno','$slno','$date','$name','$lname','$contactcode','$ccode','$ccodeno','$email','$contact','$add','$landmark','$city','$state','$pin','$category','$itemid','$item','$qty','$price','$tot','$grandtot','$mode','accepted')";die;
for($i=0 ; $i<=sizeof($_POST['item']); $i++)
{
	$item = $_POST['item'][$i];
	$qty = $_POST['qty'][$i];
	$price = $_POST['price'][$i];
	$category = $_POST['itemid'][i];
	$slno = $slno + 1;
	
	if($item != '')
	{
		// echo "INSERT into onlineorder (orderno,slno,date,name,lname,contactcode,ccode,ccodeno,email,contact,address,landmark,city,state,pin,category,itemid,item,qty,price,total,grandtot,mode,status) 
		// Values ('$orderno','$slno','$date','$name','$lname','$contactcode','$ccode','$ccodeno','$email','$contact','$add','$landmark','$city','$state','$pin','$category','$itemid','$item','$qty','$price','$tot','$grandtot','$mode','accepted')";die;
		$insert = "INSERT into onlineorder (orderno,slno,date,name,lname,contactcode,ccode,ccodeno,email,contact,address,landmark,city,state,pin,category,itemid,item,qty,price,total,finaltotal,mode,status) 
		Values ('$orderno','$slno','$date','$name','$lname','$contactcode','$ccode','$ccodeno','$email','$contact','$add','$landmark','$city','$state','$pin','$category','$itemid','$item','$qty','$price','$tot','$grandtot','$mode','accepted')";
		// echo $insert; die;
		$result = mysql_query($insert);		
	}	
}

if ($result) {

    unset($_SESSION['qty']);
	unset($_SESSION['price']);
	unset($_SESSION['item']);
	unset($_SESSION['totprice']);
	unset($_SESSION['no']);
	unset($_SESSION['rs']);

	echo "<script>alert('Your order has been placed.');  window.location= 'checkout.php' </script>";
} else {
    echo "<script>alert('Something went Wrong...Try again');  window.location= 'checkout.php' </script>";
}

?>

