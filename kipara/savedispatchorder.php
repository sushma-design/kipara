<?php
session_start();

require_once("connection.php");

//print_r($_POST['cash']); die;

$orderno = $_GET['id'];

$result = mysql_query("UPDATE onlineorder SET status='dispatch' WHERE orderno='$orderno'");

$uregion=$_SESSION['region'];
$uregioncode=$_SESSION['regioncode'];
$ustate=$_SESSION['state'];
$ucountry=$_SESSION['country'];
$usaleown=$_SESSION['ownercode'];
$ufcode=$_SESSION['f_code'];
$usfcode=$_SESSION['sub_f_code'];

$selectadd = mysql_query("SELECT address,mobile,gstper,gstno FROM frenchise WHERE ownercode='$ufcode'");
$rowadd = mysql_fetch_array($selectadd);
$address = $rowadd['address'];
$mobile = $rowadd['mobile'];
$gstper = $rowadd['gstper'];
$gstno = $rowadd['gstno'];

 ?>

 <!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <title>Kipara | Kinjal Autochem India</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="img/favicon.ico">


    <style>

        p {
            font-size: 16px;
            font-family: Arial
        }

        td {
            font-size: 16px;
            font-family: Arial
        }

        input {
            font-size: 17px;
            font-family: Arial
        }

  
			@media print{

            @page { size: 3in auto; }
            .page-break	{ display: none; }
            body{
              
				margin-left: 1em;
				margin-right:1em;
            }
                p {
                    font-size: 13px;
                    font-family: Arial
                }

                td {
                    font-size: 12px;
                    font-family: Arial
                }

                input {
                    font-size: 17px;
                    font-family: Arial
                }
            }
        @media screen{
            @page { size: 1in auto; }
            .page-break	{ display: none; }
            body{
                margin-left:0em;
                margin-right:0em;}
        }
    </style>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script type="text/javascript">
        function printing1() {
            location.reload();
        }
        function printing() {
            var printButton = document.getElementById("bprint");
            var close = document.getElementById("Submit1");
            printButton.style.visibility = 'hidden';
            close.style.visibility = 'hidden';
            window.print()
            //Set the print button to 'visible' again
            //[Delete this line if you want it to stay hidden after printing]
            printButton.style.visibility = 'visible';
            close.style.visibility = 'visible';

        }
        function printload1() {
            document.getElementById("bprint").style.visibility = 'hidden';
            document.getElementById("Submit1").style.visibility = 'hidden';
            //Print the page content
            self.print();
        }
        function printload2()
        {
            var printButton = document.getElementById("bprint");
            var printButton4 = document.getElementById("Submit1");

            printButton.style.visibility = 'visible';
            printButton4.style.visibility = 'visible';
        }
        function closeing() {
            window.location = "dispatchorder.php";
        }
        function focusprint()
        {
            document.getElementById("bprint").focus();
        }


        document.onkeydown = function() {
            switch (event.keyCode) {
                case 116 : //F5 button
                    event.returnValue = false;
                    event.keyCode = 0;
                    return false;
                case 82 : //R button
                    if (event.ctrlKey) {
                        event.returnValue = false;
                        event.keyCode = 0;
                        return false;
                    }
            }
        }
        $(document).ready(function()
        {
            $(document).bind("contextmenu",function(e){
                return false;
            });
        })
    </script>

<body onload="focusprint();">

<?php
?>
<p align="center" style='padding-left:0px;margin-bottom:0px;margin-top:0px;'><img src="img/pork.png" width="auto"  height="120"/></p>

<p align="center" style='padding-left:0px;margin-bottom:0px;margin-top:0px;font-size:16px'><strong>Kinjal Autochem India</strong></p>
<p align="left" style='padding:0px;margin-bottom:0px;margin-top:0px;'><?php echo nl2br($address);?><br>
Phone: <?php echo $mobile;?></p>

<?php
$result = mysql_query("SELECT * FROM onlineorder WHERE orderno='$orderno'");
$row=mysql_fetch_array($result);
$date1 = $row['date'];

$time = date("H:i:s");
?>
<table border="0" align="center" style="border-collapse:collapse;" width="100%">
    <tr style="border-bottom:1px dashed #000; border-top:1px dashed #000">
        <td align="center" style="width: 33%">Date: <br><?php echo date("d-m-Y",strtotime($date1)); ?></td>
        <td align="center" style="width: 33%">Time: <br><?php echo $time;?></span></td>
        <td align="center" style="width: 33%"> Order No : <br><?php echo $orderno; ?></td>
    </tr>
</table>

<table border="0" align="center" style="border-collapse:collapse;" width="100%" >
    <tr style="border-bottom:1px dashed #000;">
        <td style="width: 60%"><strong>ITEMS</strong></td>
        <td align="center" style="width: 10%"><strong>QTY</strong></td>
        <td align="right" style="width: 10%"><strong>Rate (Rs)</strong></td>
        <td align="right" style="width: 20%"><strong>Total</strong></td>
    </tr>
    <?php
    $totalgst1 = 0; $grandtot = 0;
    $result1 = mysql_query("SELECT * FROM onlineorder WHERE orderno='$orderno'");
    while($row1=mysql_fetch_array($result1))
    {
        $item1 = $row1['item'];
        $itemQuantity1 = $row1['qty'];
		$itemPrice1 = $row1['price'];
		$itemTotal1 = $itemQuantity1 * $itemPrice1;
		$cgst = $row1['cgst'];
		$sgst = $row1['sgst'];
		$grandtot = $grandtot + $itemTotal1;
		$grandTotal2 = $row1['grandtot'];
		$extotal1 = $row1['total'];
		$add = $row1['address'];
		$city = $row1['city'];
		$pin = $row1['pin'];
		$landmark = $row1['landmark'];
		$name = $row1['name'].' '.$row1['lname'];
		$contact = $row1['contact'];
		
		if($landmark != '')
		{	$add1 = 'Landmark : '.$landmark.' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;City : '.$city.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pin : '.$pin;	}
		else
		{	$add1 = 'City : '.$city.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pin : '.$pin;	}
		
		$result11 = mysql_query("SELECT * from menu WHERE items='$item1'");
		$row11 = mysql_fetch_array($result11);
		$category = $row11['category'];
		$mrate = $row11['mrate'];
		$lrate = $row11['lrate'];
		
		$selectItemType = mysql_query("select * from category WHERE category='$category'");
        $selectItemType1 = mysql_fetch_array($selectItemType);
        $itemType = $selectItemType1['itemType'];
        if($itemType == 'gram')
        {
            $qtyin = 'g';
        }
        else {
            $qtyin = '';
        }
		
		if($itemPrice1 == $mrate)
		{	$itemqty1 = 'M';	}
		else if($itemPrice1 == $lrate)
		{	$itemqty1 = 'L';	}
		else
		{	$itemqty1 = '';	}
        
        ?>
        <tr style="border-bottom:1px dashed #000;">
            <td><?php echo $itemqty1.' '.$item1." ".$category; ?></td>
            <td align="center">
                <?php echo $itemQuantity1.' '.$qtyin;?>
            </td>
            <td align="right"><?php echo number_format($itemPrice1, 2, '.', '');?></td>
            <td align="right"><?php echo number_format($itemTotal1, 2, '.', ''); ?></td>
        </tr>
    <?php } ?>
    <tr>
        <td align="right" colspan="3"><strong>Total (Rs):</strong></td>
        <td align="right" style="border-top:1px dashed #000;"><?php echo number_format($grandTotal2, 2, '.', ''); ?>
        </td>
    </tr>

    <tr>
        <td align="right" colspan="3"><strong>Exclusive Total (Rs):</strong></td>
        <td align="right" style="border-top:1px dashed #000;"><?php echo number_format($extotal1, 2, '.', ''); ?>
        </td>
    </tr>
    <?php
    $gstper1 = $gstper / 2;
    ?>
    <tr>
        <td align="right" colspan="3"><strong>CGST (<?php echo $gstper1;?>%):</strong></td>
        <td align="right" style="border-top:1px dashed #000;"><?php echo number_format($cgst, 2, '.', ''); ?>
        </td>
    </tr>
    <tr>
        <td align="right" colspan="3"><strong>SGST (<?php echo $gstper1;?>%):</strong></td>
        <td align="right" style="border-top:1px dashed #000;"><?php echo number_format($sgst, 2, '.', ''); ?>
        </td>
    </tr>
    <tr>
        <td align="right" colspan="3"><strong>Total After Tax :</strong></td>
        <td align="right" style="border-top:1px dashed #000;"><?php echo number_format($grandTotal2, 2, '.', ''); ?>
        </td>
    </tr>
    <?php
    $roundoff = $grandtot - $grandTotal2;
    $roundoff1 = round($roundoff);
    $roundoff2 = abs($roundoff1);
    ?>
    <tr>
        <td align="right" colspan="3"><strong>Round Off :</strong></td>
        <td align="right" style="border-top:1px dashed #000;"><?php echo number_format($roundoff, 2, '.', ''); ?>
        </td>
    </tr>
    <tr>
        <td align="right" colspan="3"><strong>Amount to give :</strong></td>
        <td align="right" style="border-top:1px dashed #000;"><?php echo number_format($grandTotal2, 2, '.', ''); ?>
        </td>
    </tr>
    <tr style="border-top:1px dashed #000;">
        <td colspan="4"></td>
    </tr>
	<tr>
        <td colspan="4"><strong>Shipping Address : </strong><?php echo $name; ?></td>
    </tr>
	<tr>
        <td colspan="4" style="padding-left: 150px;"><?php echo 'Contact No : '.$contact; ?></td>
    </tr>
	<tr>
        <td colspan="4" style="padding-left: 150px;"><?php echo $add; ?></td>
    </tr>
    <tr style="border-bottom:1px dashed #000;">
        <td colspan="4" style="padding-left: 150px;"> <?php echo $add1; ?></td>
    </tr>
    <tr>
        <td colspan="4" align="center" style="">Thank You.....!! VISIT AGAIN</td>
    </tr>
    <tr>
        <td colspan="4" style="text-align: center;!important;"><strong>GST NO. <?php echo $gstno; ?></strong></td>
    </tr>
    <tr>
        <td colspan="4" align="center" style="font-size: 12px;">Kipara- Kinjal Autochem India</td>
    </tr>
    <tr>
        <td colspan="4" align="center"><strong>www.kipara.in</strong></td>
    </tr>
</table>
<p align="center"><input id="bprint" type="button" name="Submit" onclick="printing();" value="Print"
                         style="font-size:18px;width: 100px;height: 50px;"/>
    <input id="Submit1" type="button" name="Submit1" onclick="closeing();" value="Back"
           style='font-size:18px;width: 100px;height: 50px;'/>
</p>
<br/>
<br/>
<br/>

<p align="center"></p>


</body>
</html>