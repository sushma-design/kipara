<?php
require_once('connection.php');

function clean($str)
{
    $str = @trim($str);
    if (get_magic_quotes_gpc()) {
        $str = stripslashes($str);
    }
    return mysql_real_escape_string($str);
}

date_default_timezone_set('Asia/Calcutta');
$user =$_POST['user'];
$fdate =$_POST['fdate'];
$tdate =$_POST['tdate'];
$d = date('d-m-Y', strtotime($fdate));
$dd = date('d-m-Y', strtotime($tdate));
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <title>Report</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Charisma, a fully featured, responsive, HTML5, Bootstrap admin template.">
    <meta name="author" content="Muhammad Usman">
    <link rel="shortcut icon" href="img/favicon.ico">
    <style>

        p {
            font-size: 12px;
            font-family: Arial
        }

        td {
            font-size: 12px;
            font-family: Arial
        }

        input {
            font-size: 12px;
            font-family: Arial
        }
		 table { page-break-inside:auto }
        tr    { page-break-inside:avoid; page-break-after:auto }
        thead { display:table-header-group }

        @media print {

            @page {
                size: 3in auto;
            }

            .page-break {
                display: none;
            }

            .landscape {
                width: 100%;
                height: 100%;
                margin: 0% 0% 0% 0%;
                filter: progid:DXImageTransform.Microsoft.BasicImage(Rotation=1);
            }

            body {
                margin-left: 0em;
                margin-right: 0em;
            }
        }

        @media screen {
            @page {
                size: 3in auto;
            }

            .page-break {
                display: none;
            }

            body {
                margin-left: 5em;
                margin-right: 5em;
            }
        }

        .display-total-row {
            border-left: hidden;
            border-right: hidden;
            border-bottom: hidden;
        }

        .new-prod-border {
            border-top: 2px solid;
        }
    </style>
    <script type="text/javascript">
        function printing() {
            var printButton = document.getElementById("bprint");
            var close = document.getElementById("close");
            var printButton1 = document.getElementById("bprint1");
            var close1 = document.getElementById("close1");
            printButton.style.visibility = 'hidden';
            close.style.visibility = 'hidden';
            printButton1.style.visibility = 'hidden';
            close1.style.visibility = 'hidden';
            document.getElementById("excel").style.visibility = 'hidden';
            window.print();
            printButton.style.visibility = 'visible';
            close.style.visibility = 'visible';
            printButton1.style.visibility = 'visible';
            close1.style.visibility = 'visible';
            document.getElementById("excel").style.visibility = 'visible';
        }

        function close123() {
//            window.close();
            window.location = 'invoicereport.php';
        }

    </script>
</head>
<body>

<br>

<table border="1" align="center" style="border-collapse:collapse;" width="100%">
<input id="bprint" type="button" name="Submit" onclick="printing();" value="Print"/>&nbsp;&nbsp;&nbsp;
            <input id="close" type="button" name="close" onclick="close123();" value="Back"/>
<thead>
    <tr style="border:hidden;">
	<p style="text-decoration: underline;text-align: center;font-size: 16px;margin-bottom: 0px;color: red"><strong>Kinjal Autochem India</strong>
    </p>
        <td style="font-size: 16px;border-right: hidden" colspan="8"><strong>Online Order Invoice Report  </strong></td>
        <td style="border-right:hidden"></td>
		<td style="border-right:hidden"></td>
		<td style="font-size: 16px;border-left: hidden;border-right: hidden;" colspan="16"><?php echo date('d-m-Y'); ?> , <?php echo date('g:i:s a'); ?></td>
        
        
    </tr>
    <tr>
        <td  style="font-size: 16px;border-right: hidden;border-left: hidden" colspan="4"><b>From Date: </b> <?php echo $d; ?></td>
        <td style="font-size: 16px;border-right: hidden" colspan="4"><b>To Date: </b> <?php echo $dd; ?></td>
    </tr>

</thead>





    <?php
    echo '<tr>';
    echo '<td style="text-align: center"><strong>Invoice No </strong></td>';
    echo '<td style="text-align: center"><strong>Date </strong></td>';
    echo '<td style="text-align: center;width:120px;"><strong>Client </strong></td>';
	echo '<td style="text-align: center"><strong>Contact </strong></td>';
    echo '<td style="text-align:  center"><strong> Item</strong></td>';
    echo '<td style="text-align:  center"><strong>Quantity</strong></td>';
    echo '<td style="text-align:  center"><strong> Rate </strong></td>';
    echo '<td style="text-align:  right;padding-right: 5px;"><strong> Total	</strong></td>';
    echo '<td style="text-align:  right;padding-right: 5px;"><strong>Grand Total</strong></td>';
	echo '<td style="text-align:  right;padding-right: 5px;"><strong>Dispatch</strong></td>';
	echo '<td style="text-align:  right;padding-right: 5px;"><strong>Paymentmode</strong></td>';
    echo '</tr>';
	
	$result1 = mysql_query("SELECT date,invoiceno FROM  online_invoice where (date BETWEEN '$fdate' AND '$tdate') and status='paid' group by invoiceno order by date ");
	$total1 = 0;
	$total2 = 0;
	$totpacking = 0;
    $totlabour = 0;
    $totfinal =0;
    $totgst =0;
	$totamt =0;
    $totdis =0;
	while($res =mysql_fetch_array($result1)){
		$date =$res['date'];
        $invoiceno =$res['invoiceno'];
       
        $result = mysql_query("SELECT * FROM  online_invoice where invoiceno='$invoiceno' order by date");
   
	$sr=0;
	$count = 0;
    while ($row = mysql_fetch_array($result)) {
      $sr++;
      $count++;
       
        $orderno = $row['orderno'];
        $rate = $row['rate'];
        $qty = $row['qty'];
        $dispatch = $row['dispatch'];
        $paymentmode = $row['paymentmode'];
        $grandtotal = $row['finaltotal'];
        $total = $row['total'];
        $total1 =$total1 + $total;
        $itemname1 = $row['itemname'];

		$item1 = mysql_query("select * from onlineorder where orderno ='$orderno'");
        $itemname = mysql_fetch_array($item1);
        $client = $itemname['name'].' '.$itemname['lname'];
        $contact = $itemname['contact'];
        
        $date1 = date('d-m-Y', strtotime($date));
       if($count == 1)
	    {	
            echo '<tr>';
            echo "<td style='text-align:  center'>$invoiceno</td>";
            echo "<td style='text-align:  center'>$date</td>";
            echo "<td style='text-align:  center'>$client</td>";
            echo "<td style='text-align:  center;'>$contact</td>";
            echo "<td style='text-align: center'>$itemname1</td>";
            echo "<td style='text-align: center'>$qty</td>";
            echo "<td style='text-align: center'>$rate</td>";
            echo "<td style='text-align: right;padding-right: 5px;'>$total</td>";
            echo "<td style='text-align: right;padding-right: 5px;'>$grandtotal</td>";
            echo "<td style='text-align: right;padding-right: 5px;'>$dispatch</td>";
            echo "<td style='text-align: right;padding-right: 5px;'>$paymentmode</td>";
            echo '</tr>';
        }
	    if($count > 1)
	    {   
			echo '<tr>';
			echo "<td></td>";
			echo "<td></td>";
			echo "<td></td>";
			echo "<td></td>";
			echo "<td style='text-align: center'>$itemname1</td>";
			echo "<td style='text-align: center'>$qty</td>";
			echo "<td style='text-align: center'>$rate</td>";
			echo "<td style='text-align: right;padding-right: 5px;'>$total</td>";
			echo "<td></td>";
			echo "<td></td>";
            echo "<td></td>";
			echo '</tr>';
			$count--;
	    } 
	} 
}
    ?>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td> 
        <td style="text-align: right;padding-right: 5px;"></td>
        <td style="text-align: right;padding-right: 5px;"><strong>Grand Total</strong></td>
        <td style="text-align: right;padding-right: 5px;"><?php echo number_format($total1);?></td>
		<td style="text-align: right;padding-right: 5px;"></td>
        <td style="text-align: right;padding-right: 5px;"></td>   
    </tr>
</table>
<br/><br/>


<br>

<form role="form" method="post" name="form1" action="showexcelinvoice.php" >
<p style="margin-left:300px;padding-top:-400px;">
    <input  id="excel" type="submit" name="excel"  value="Download as excel"/>
     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input id="bprint1" type="button" name="Submit" onclick="printing();" value="Print"/>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input id="close1" type="button" name="close" onclick="close123();" value="Back"/>

   <input type="hidden" name="fromDate" id="fromDate" value="<?php echo $fdate; ?>">
   <input type="hidden" name="toDate" id="toDate" value="<?php echo $tdate; ?>">
</p>
</form>
</body>
</html>
