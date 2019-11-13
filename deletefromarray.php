<?php
session_start();

$item = $_POST['item'];
$price = $_POST['price'];
$sessionno = $_SESSION['no'];
$sessionrs = $_SESSION['rs'];
$count = count($_SESSION['item']);
$itemarr = $_SESSION['item'];
$qtyarr = $_SESSION['qty'];
$pricearr = $_SESSION['price'];
$sizearr = $_SESSION['size'];
$totarr = $_SESSION['totprice'];
$totalprice = 0;
$counter =0;	$flg=0;
    foreach($_SESSION['item'] as $value2) {
			if ($value2 == $item) {
		
              if (($key = array_search($item, $itemarr)) !== false) {
				if($pricearr[$key] == $price){
					unset($itemarr[$key]);
					unset($qtyarr[$key]);
					unset($pricearr[$key]);
					unset($sizearr[$key]);
					unset($totarr[$key]);
				}
			}  
        }
		
    } 
	$itemarr1 = array_values($itemarr);
	$qtyarr1 = array_values($qtyarr);
	$pricearr1 = array_values($pricearr);
	$sizearr1 = array_values($sizearr);
	$totarr1 = array_values($totarr);
	
	foreach($totarr as $total)
	{
		$totalprice = $totalprice + $total;
		$counter = $counter + 1;
	}
	
	unset($_SESSION['qty']);
	unset($_SESSION['price']);
	unset($_SESSION['item']);
	unset($_SESSION['size']);
	unset($_SESSION['totprice']);
	unset($_SESSION['no']);
	
	$_SESSION['item'] = $itemarr1;
	$_SESSION['price'] = $pricearr1;
	$_SESSION['qty'] = $qtyarr1;
	$_SESSION['size'] = $sizearr1;
	$_SESSION['totprice'] = $totarr1;
	$_SESSION['no'] = $counter;
	$_SESSION['rs'] = $totalprice;
	//print_r($qtyarr); die;
    
            
?>