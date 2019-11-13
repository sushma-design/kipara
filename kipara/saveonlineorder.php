<?php
include "connection.php";
$saletype = $_POST['saletype'];


$user = $_POST['user'];
$orderno = $_POST['orderno'];
if($saletype=='estimation') 
{	
$counter = $_POST['counter'];

$name = $_POST['name'];
$lname = $_POST['lname'];
$contact = $_POST['contact'];
$email = $_POST['email'];
$quantity = $_POST['quantity'];
$address = $_POST['address'];
$landmark = $_POST['landmark'];
$state = $_POST['state'];
$pin = $_POST['pin'];
// echo "<pre>";print_r($_POST);die;

$date = $_POST['date'];
$time = date("H:i:s");
$estimationno =0;
$select = mysql_query("SELECT estimationno FROM estimation ORDER BY estimationno DESC");
$row = mysql_fetch_array($select);
$estimationno1 = $row['estimationno'];
$estimationno = $estimationno1 + 1;

for($i=0;$i<$counter;$i++)
{
    $slno = $_POST['slno'][$i];
    $item = $_POST['itemnew'][$i];
    $unitnew = $_POST['unitnew'][$i];
    $hsn = $_POST['hsn'][$i];
    $stock = $_POST['stock'][$i];
    $qty = $_POST['qty'][$i];
    $rate = $_POST['ratenew'][$i];
    $total = $_POST['totalamount'][$i];

    $select2 = mysql_query("SELECT * FROM item WHERE name='$item'");
    $row2 = mysql_fetch_array($select2);
    $itemid = $row2['id'];
    $category = $row2['category'];
    $itemname = $row2['name'];

     $insert = "INSERT INTO `online_estimation`(`estimationno`, `slno`, `contactcode`, `date`,`time`, `category`, `item`,`itemname`,`unit`,`hsn`,`prevstock`, `qty`, `rate`, `total`, `grandtotal`,`transport`,`packing`,`labour`,`totalamt`,`discount`,`finaltotal`,`paymentmode`,`chequeno`,`chequedate`,`bankname`,`batchnumber`,`cardtype`,`drum`,`paidamt`, `pendingamt`,`user`) VALUES
('$estimationno','$slno','$contactcode','$date','$time','$category','$itemid','$itemname','$unitnew','$hsn','$stock','$qty','$rate','$total','$grandtotal','$transport','$packing','$labour','$totalamt','$discount','$finaltotal','$paymentmode','$cheque','$chequedate','$bankname','$batchnumber','$cardtype','$drum','$givenamt','$pendingamt','$user')";
    $result = mysql_query($insert);

    if($result) {
			$update = mysql_query("UPDATE item SET initialstock= initialstock - '$qty' WHERE id ='$itemid'");
    }
}

?>
<?php //\app\commands\AppUtility::dump($entireData); ?>
<style type="text/css">

    /* this is the important part (should be used in HTML head): */
    .pagebreak {
        page-break-after: always;
    }
    .nopadding {
        padding: 0 !important;
        margin: 0 !important;
    }
    #color {
        color: red;
    }
    @media print {
        #color {
            color: red !important;
            -webkit-print-color-adjust: exact;
        }}
</style>

<script src="js/jquery-1.8.3.js" type="text/javascript"></script>
<script>
    var a = ['', 'One ', 'Two ', 'Three ', 'Four ', 'Five ', 'Six ', 'Seven ', 'Eight ', 'Nine ', 'Ten ', 'Eleven ', 'Twelve ', 'Thirteen ', 'Fourteen ', 'Fifteen ', 'Sixteen ', 'Seventeen ', 'Eighteen ', 'Nineteen '];
    var b = ['', '', 'Twenty', 'Thirty', 'Forty', 'Fifty', 'Sixty', 'Seventy', 'Eighty', 'Ninety'];
    $(document).ready(function () {

        inWords($('#Net_Total').val());

    });
    $(document).ready(function () {

        inWords($('#Net_Total1').val());

    });
    function numberWithCommas(nStr) {
        nStr += '';
        x = nStr.split('.');
        x1 = x[0];
        x2 = x.length > 1 ? '.' + x[1] : '';
        var rgx = /(\d+)(\d{3})/;
        var z = 0;
        var len = String(x1).length;
        var num = parseInt((len / 2) - 1);

        while (rgx.test(x1)) {
            if (z > 0) {
                x1 = x1.replace(rgx, '$1' + ',' + '$2');
            }
            else {
                x1 = x1.replace(rgx, '$1' + ',' + '$2');
                rgx = /(\d+)(\d{2})/;
            }
            z++;
            num--;
            if (num == 0) {
                break;
            }
        }
        return x1 + x2;
    }

    function inWords(num) {


        if ((num = num.toString()).length > 9) return 'overflow';
        n = ('000000000' + num).substr(-9).match(/^(\d{2})(\d{2})(\d{2})(\d{1})(\d{2})$/);
        if (!n) return;
        var str = '';
        str += (n[1] != 0) ? (a[Number(n[1])] || b[n[1][0]] + ' ' + a[n[1][1]]) + 'Crore ' : '';
        str += (n[2] != 0) ? (a[Number(n[2])] || b[n[2][0]] + ' ' + a[n[2][1]]) + 'Lakh ' : '';
        str += (n[3] != 0) ? (a[Number(n[3])] || b[n[3][0]] + ' ' + a[n[3][1]]) + 'Thousand ' : '';
        str += (n[4] != 0) ? (a[Number(n[4])] || b[n[4][0]] + ' ' + a[n[4][1]]) + 'Hundred ' : '';
        str += (n[5] != 0) ? ((str != '') ? 'and ' : '') + (a[Number(n[5])] || b[n[5][0]] + ' ' + a[n[5][1]]) : '';

        $('#container3').text(str);


        document.getElementById('Net_Total').value = numberWithCommas(num) + ".00";
    }

    function printing() {
        var printButton = document.getElementById("bprint");
        var close = document.getElementById("close");
        printButton.style.visibility = 'hidden';
        close.style.visibility = 'hidden';
        window.print();

        printButton.style.visibility = 'visible';
        close.style.visibility = 'visible';
    }

    function close123() {
        window.location = 'genratebill.php';
    }




</script>
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">

<div class="container col-sm-12" style="margin-top: 20px;">
 <div class="col-xs-12 nopadding" style="border-top: 1px solid #000000;border-right: 1px solid #000000;border-left: 1px solid #000000; border-bottom: 1px solid #000000;">
<table class="printTable" width="100%"
       style="">
    <tbody>
    <tr>
        <td style="border-bottom: hidden;border-right: hidden" align="left">
        </td>
        <td style="border-bottom: hidden;border-right: hidden" align="center">
            <label><strong style="font-size: 14px;padding-right: 5px;">Estimation</strong></label>
        </td>
        <td style="border-bottom: hidden;border-right: hidden" align="right">

        </td>

    </tr>
    </tbody>
</table>
<div class="col-xs-12 nopadding">
    <table class="printTable" width="100%"
           style="">
        <tbody>
        <tr>
         <?php include "address.php";?>
        </tr>
        </tbody>
    </table>
</div>
<div class="col-xs-12 nopadding" style="border-top: 1px solid #000000;">

    <table class="printTable" width="100%">
        <tbody>
        <tr>
            <td style="border-bottom: hidden;border-right: hidden" width="50%">
                <label style="font-size: 14px;padding-left: 5px;">Name  : <?php echo $company;?></label> </td>
            <td style="border-bottom: hidden;" width="50%">
                <label style="font-size: 14px;">Estimation No : <?php echo $estimationno;?></label> </td>

        </tr>
        <tr>
            <td style="border-bottom: hidden;border-right: hidden" width="50%">
                <label style="font-size: 14px;padding-left: 5px;">Ph.No: <?php echo $mobile;?></label></td>
            <td style="border-bottom: hidden;" width="50%">
                <label style="font-size: 14px;">Date :<?php echo date("d-m-Y",strtotime($date));?>&nbsp; &nbsp; Time:<?php echo $time; ?></label></td>

        </tr>
        <tr>
            <td style="border-bottom: hidden;border-right: hidden" width="50%">
                <label style="font-size: 12px;padding-left: 5px;"><strong style="font-size: 14px;!important;">Add : <?php echo $address;?></strong></label></td>
            <td style="border-bottom: hidden;" width="50%">
                <label style="font-size: 12px;"><strong style="font-size: 14px;!important;">Email-Id : <?php echo $email;?></strong></label>
            </td>


        </tr>
        <tr>
            <td style="border-bottom: hidden;border-right: hidden" width="50%">
                <label style="font-size: 14px;padding-left: 5px;">GST No: <?php echo $gst;?></label></td>
            <td style="border-bottom: hidden;" width="50%">
                <label style="font-size: 14px;">PAN No :<?php echo $pan;?></label></td>

        </tr>

        </tbody>
    </table>
</div>
<div class="col-xs-12 nopadding">

    <table border='1' width='100%' height="270" align='center' bordercolor='#000000'
           style='border-collapse:collapse;border-left: hidden;border-right: hidden;font-size: 12px;'>

        <tr height="15">
            <th ><input type='text' value='Sr.No' readonly='true'
                        style='border-style : hidden;text-align: center;width:40px; font-weight:bold'/></th>

            <th ><input type='text' value='Description of' readonly='true'
                        style='border-style : hidden;text-align: center;width:150px;font-weight:bold'/></th>
            <th ><input type='text' value='Qty' readonly='true'
                        style='border-style : hidden;text-align: center;width:40px;font-weight:bold'/></th>

            <th ><input type='text' value='Per' readonly='true'
                        style='border-style : hidden;text-align: center;width:40px;font-weight:bold'/></th>
            <th ><input type='text' value='Rate' readonly='true'
                        style='border-style : hidden;text-align: center;width:100px;font-weight:bold'/></th>
            <th><input type='text' value='Amount' readonly='true'
                       style='border-style : hidden;text-align: center;width:100px;font-weight:bold'/></th>
        </tr>
        <?php
	
        $result2 = mysql_query("SELECT * FROM estimation WHERE estimationno ='$estimationno'");
        $count =0;
        while($row2 = mysql_fetch_array($result2))
        {
            $category  = $row2['category'];
            $item = $row2['item'];
            $itemname1 = $row2['itemname'];
            $unit = $row2['unit'];
            $qty = $row2['qty'];
            $rate = $row2['rate'];
            $total = $row2['total'];
            $grandtotal = $row2['grandtotal'];
			$totalamt = $row2['totalamt'];
            $discount = $row2['discount'];
      
			$finaltotal = $row2['finaltotal'];
            $count=$count+1; 
            $selectinfo = mysql_query("SELECT * FROM item WHERE id='$item'");
            $rowinfo = mysql_fetch_array($selectinfo);
            $itemname = $rowinfo['name'];
            $selectinfo = mysql_query("SELECT * FROM category WHERE id='$category'");
            $rowinfo = mysql_fetch_array($selectinfo);
            $categoryname = $rowinfo['name'];

        ?>
            <tr style="border-bottom:hidden;" height="15px;!important">
                <td align="center"><label style="padding-top: 3px;"><?php echo $count; ?></label></td>
                <td><label style="padding-top: 3px;padding-left: 10px;"><?php echo $itemname1;?></label></td>
                <td align="center"><label style="padding-top: 3px;"><?php echo $qty; ?></label></td>
                <td align="center"><input type='text' value='<?php echo strtoupper($unit);?>' name='unit'
                                          id='unit' readonly="readonly" style='border-style : hidden;text-align:center;width:40px;padding-top: 3px;'/>
                </td>
                <td align="center"><input type='text' value='<?php echo $rate; ?>' name='rat'
                                          id='rat'
                                          readonly="readonly"
                                          style='border-style : hidden;text-align:center;width:60px;padding-top: 3px;'/>
                </td>

                <td align="right"><input type='text' value='<?php echo $total; ?>' name='amt'
                                         id='amt'
                                         readonly="readonly"
                                         style='border-style : hidden;text-align: center;padding-top: 3px;width:60px;padding-right: 10px;'/>
                </td>
            </tr>

        <?php } ?>
        <tr>
            <td>&nbsp;</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <?php
        if($grandtotal != $finaltotal)
        {
        ?>
        <tr height="15px;!important">
            <td colspan="4"></td>
            <td colspan="" style="text-align: right;padding-right: 5px;">
                <strong> Total Amount</strong></td>
            <td align="right"><input type='text' value='<?php echo $grandtotal; ?>'
                                     readonly="readonly" name='Net_Total1'   id='Net_Total12'

                                     style='border-style : hidden;text-align: right; font-weight:bold;width:70px;padding-right: 10px;'/></td>
        </tr>
        <?php } ?>
        <?php
        if($transport != '0')
        {
        ?>
        <tr height="15px;!important">
            <td colspan="4"></td>
            <td colspan="1" style="text-align: right;padding-right: 5px;">
                <strong> Transport Amount</strong></td>
            <td align="right"><input type='text' value='<?php echo $transport; ?>'
                                     readonly="readonly" name='Net_Total1'   id='Net_Total12'

                                     style='border-style : hidden;text-align: right; font-weight:bold;width:70px;padding-right: 10px;'/></td>
        </tr>
        <?php } ?>
        <?php
        if($packing != '0')
        {
        ?>
        <tr height="15px;!important">
            <td colspan="4"></td>
            <td colspan="1" style="text-align: right;padding-right: 5px;">
                <strong> Packing Amount</strong></td>
            <td align="right"><input type='text' value='<?php echo $packing; ?>'
                                     readonly="readonly" name='Net_Total1'   id='Net_Total12'

                                     style='border-style : hidden;text-align: right; font-weight:bold;width:70px;padding-right: 10px;'/></td>
        </tr>
        <?php } ?>
        <?php
        if($labour != '0')
        {
        ?>
        <tr height="15px;!important">
            <td colspan="4"></td>
            <td colspan="1" style="text-align: right;padding-right: 5px;">
                <strong> Labour Amount</strong></td>
            <td align="right"><input type='text' value='<?php echo $labour; ?>'
                                     readonly="readonly" name='Net_Total1'   id='Net_Total12'

                                     style='border-style : hidden;text-align: right; font-weight:bold;width:70px;padding-right: 10px;'/></td>
        </tr>
        <?php } ?>
        <tr height="15px;!important">
            <td colspan="4"></td>
            <td colspan="1" style="text-align: right;padding-right: 5px;">
                <strong> Bill Amount</strong></td>
            <td align="right"><input type='text' value='<?php echo $totalamt; ?>'
                                     readonly="readonly" name='billamt'   id='billamt'

                                     style='border-style : hidden;text-align: right; font-weight:bold;width:70px;padding-right: 10px;'/></td>
        </tr>
		<tr height="15px;!important">
            <td colspan="4"></td>
            <td colspan="1" style="text-align: right;padding-right: 5px;">
                <strong> Discount Amount</strong></td>
            <td align="right"><input type='text' value='<?php echo $discount; ?>'
                                     readonly="readonly" name='discount'   id='discount'

                                     style='border-style : hidden;text-align: right; font-weight:bold;width:70px;padding-right: 10px;'/></td>
        </tr><tr height="15px;!important">
            <td colspan="4"></td>
            <td colspan="1" style="text-align: right;padding-right: 5px;">
                <strong> Total Amount</strong></td>
            <td align="right"><input type='text' value='<?php echo $finaltotal; ?>'
                                     readonly="readonly" name='Net_Total'   id='Net_Total'

                                     style='border-style : hidden;text-align: right; font-weight:bold;width:70px;padding-right: 10px;'/></td>
        </tr>
    </table>
</div>
<div class="col-xs-12 nopadding">
    <table border='1' align='center' width="100%" bordercolor='#000000'style='border-collapse:collapse;border-right: hidden;border-left: hidden;border-top: hidden;border-bottom: hidden'>
        <tr>
            <td style="text-align:left;border-right:hidden;border-left: solid"> &nbsp;&nbsp;&nbsp;<strong>
                    <span style="font-size: 12px;">Bill Amount(In words) : </span><span id="container3" style="font-size:12px;font-weight:bold"></span><span style="font-size: 12px;">Only</span>
                </strong></td>
            <td style="border-right: solid"><input type='text' readonly='true'
                                                   style='border-style:hidden;width:0px;'/>
            </td>
        </tr>
    </table>
</div>

<div class="col-xs-12 nopadding">
    <table border='1' align='center' width="100%" bordercolor='#000000'style='border-collapse:collapse;border-right: hidden;border-left: hidden;border-bottom: hidden;font-size: 12px;'>
        <tr>
            <td style="text-align:left;border-left: solid;padding: 5px;"><strong>
                    <strong><p>Terms & Conditions :</p></strong>
                    <span>Within 1 Days</span><br>
            </td>
            <td style="padding: 5px;vertical-align: bottom" align="right">

                <strong> Receiver Signature </strong>
            </td>
            <td style="padding: 5px;" align="center"><p> For Kinjal Autochem India </p><br>

                <strong> PROPRIETOR </strong>

            </td>
        </tr>
    </table>
</div>

</div>
</div>
<div class="col-xs-12">


    <p align="center" style='margin-bottom:1px;margin-top:10px;'><input id="bprint" type="button" name="Submit"
                                                                        onclick="printing();" value="Print"/>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input id="close" type="button" name="close" onclick="close123();" value="Close"/>
    </p>
</div>
<?php 
}
if($saletype=='invoice') 
{
	//echo "In iNVOICE"; exit(0);
$counter = $_POST['counter'];
$contactcode = $_POST['contactname2'];
$grandtotal = $_POST['grandtotal'];
$transport = $_POST['transport'];
$packing = $_POST['packing'];
$labour = $_POST['labour'];
$totalamt = $_POST['totalamt'];
$discount = $_POST['discount'];
$finaltotal = $_POST['finaltotal'];
$paymentmode = $_POST['paymentmode'];
$cheque = $_POST['cheque'];
$drum = $_POST['drum'];
$batchnumber = $_POST['batchnumber'];
$chequedate = $_POST['chequedate'];
$cardtype = $_POST['cardtype'];
$bankname = $_POST['bankname'];
$givenamt = $_POST['givenamt'];
$orderno1 = $_POST['orderno1'];
$orderdate = $_POST['odate'];
$dispatch = $_POST['dispatch'];
$oreff = $_POST['oreff'];
$destination = $_POST['destination'];
$transportername = $_POST['transportername'];
$couriername = $_POST['couriername'];
$note = $_POST['note'];
$terms = $_POST['terms'];
$pendingamt = $finaltotal - $givenamt;
$date = $_POST['date'];
$time = date("H:i:s");
$month = date("m");
$year = date("y");
$year1 = $year + 1;
$challan = $note."/".$month."/".$year."-".$year1;

$invoiceno = $_POST['invoiceno'];

$estimationno = $invoiceno."/".$month."/".$year."-".$year1;

for($i=0;$i<$counter;$i++)
{
    $slno = $_POST['slno'][$i];
    $item = $_POST['itemnew'][$i];
    $unitnew = $_POST['unitnew'][$i];
    $hsn = $_POST['hsn'][$i];
    $stock = $_POST['stock'][$i];
    $qty = $_POST['qty'][$i];
    $rate = $_POST['ratenew'][$i];
    $total = $_POST['totalamount'][$i];
    $select2 = mysql_query("SELECT * FROM item WHERE name='$item'");
    $row2 = mysql_fetch_array($select2);
    $itemid = $row2['id'];
    $category = $row2['category'];
    $itemname = $row2['name'];

    $insert = "INSERT INTO `online_invoice`(`invoiceno`,`invoiceno1`, `slno`, `contactcode`, `date`,`time`, `orderno`,`orderdate`, `dispatch`, `sreff`,`oreff`, `destination`,`transportername`,`couriername`, `note`,`terms`,`category`, `item`,`itemname`,`unit`, `hsn`,`prevstock`,`qty`,`rate`,`total`,`grandtotal`,`transport`,`packing`,`labour`,`totalamt`,`discount`,`finaltotal`,`paymentmode`,`chequeno`,
	`chequedate`,`bankname`,`batchnumber`,`cardtype`,`drum`,`paidamt`,`pendingamt`,`user`) VALUES
	('$invoiceno','$estimationno','$slno','$contactcode','$date','$time','$orderno','$orderdate','$dispatch','','$oreff','$destination','$transportername','$couriername','$challan','$terms','$category','$itemid','$itemname','$unitnew','$hsn','$stock','$qty','$rate','$total','$grandtotal','$transport','$packing','$labour','$totalamt','$discount','$finaltotal','$paymentmode','$cheque','$chequedate','$bankname','$batchnumber','$cardtype','$drum','$givenamt','$pendingamt','$user')";
	//echo $insert; exit(0);
    $result = mysql_query($insert);

    if($paymentmode == 'cheque')
    {
        $insert1 = mysql_query("INSERT INTO cheque (contactcode,date,billno,type,chequeno,chequedate,amount,bankname) VALUES ('$contactcode','$date','$invoiceno','Invoice','$cheque','$chequedate','$givenamt','$bankname')");
    }

    if ($unitnew =='nos'){
        $update = mysql_query("UPDATE item SET initialstock= initialstock - '$qty' WHERE id ='$itemid'");
    }
    else
    {
        $update = mysql_query("UPDATE item SET unitstock = unitstock - '$qty' WHERE id ='$itemid'");
    }

}
$selectcontact = mysql_query("SELECT * FROM clientdata WHERE contactcode='$contactcode'");
$rowcontact = mysql_fetch_array($selectcontact);
$contactname = $rowcontact['contactname'];
$company = $rowcontact['company'];
$company = $rowcontact['company'];
$address = $rowcontact['address'];
$mobile = $rowcontact['mobile'];
$email = $rowcontact['email'];
$gst1 = $rowcontact['gst'];
$pan = $rowcontact['pan'];

$insertlog = mysql_query("INSERT INTO activitylog (billno,detail,date,time,user) VALUES ('$invoiceno','Invoice Created ','$date','$time','$user')"); 
//$contactname1 = str_replace(' ', '%20', $company);
//$msg = "Hi%20".$contactname1."%20Thanks%20For%20Purchasing%20With%20Kipara.%20Your%20Total%20Bill%20Rs.%20".$finaltotal."%20With%20Bill%20Number%20".$estimationno."%20Has%20been%20processed%20successfully.%20Visit%20us%20on%20http://www.kipara.in";
//
//$url = "http://bulksmsindia.mobi/sendurlcomma.aspx?user=20079344&pwd=20079344321&senderid=Kipara&mobileno=".$mobile."&msgtext=".$msg;
//$ch = curl_init($url);
//curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//$curl_scraped_page = curl_exec($ch);
//curl_close($ch);
//
//$msg1 = "The customer with name ".$contactname1." Has purchased products from shop of total Bill Rs.".$finaltotal." With Bill Number ".$estimationno." Date ".$date." Time ".$time;
//$msg2 = str_replace(' ', '%20', $msg1);
//$url = "http://bulksmsindia.mobi/sendurlcomma.aspx?user=20079344&pwd=20079344321&senderid=Kipara&mobileno=9766595564&msgtext=".$msg2;
//$ch = curl_init($url);
//curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//$curl_scraped_page = curl_exec($ch);
//curl_close($ch);
$updateclient = mysql_query("UPDATE clientdata SET balance = balance+'$pendingamt' WHERE contactcode='$contactcode'");
$updateorder = mysql_query("UPDATE `order` SET status ='placed' WHERE orderno='$orderno'");

$get = mysql_query("SELECT orderno,paymentmode,orderdate,dispatch,sreff,oreff,destination,note,terms FROM composite WHERE invoiceno='$invoiceno' group by invoiceno");
$res =mysql_fetch_array($get);
$orderno = $res['orderno'];
$orderdate = $res['orderdate'];
$dispatch = $res['dispatch'];
$sreff = $res['sreff'];
$oreff = $res['oreff'];
$destination = $res['destination'];
$note = $res['note'];
$terms = $res['terms'];
$paymentmode = $res['paymentmode'];
?>
<style type="text/css">

    /* this is the important part (should be used in HTML head): */
    .pagebreak {
        page-break-after: always;
    }
    .nopadding {
        padding: 0 !important;
        margin: 0 !important;
    }
    #color {
        color: red;
    }
    @media print {
        #color {
            color: red !important;
            -webkit-print-color-adjust: exact;
        }}
</style>
<script src="js/jquery-1.8.3.js" type="text/javascript"></script>
<script>
    var a = ['', 'One ', 'Two ', 'Three ', 'Four ', 'Five ', 'Six ', 'Seven ', 'Eight ', 'Nine ', 'Ten ', 'Eleven ', 'Twelve ', 'Thirteen ', 'Fourteen ', 'Fifteen ', 'Sixteen ', 'Seventeen ', 'Eighteen ', 'Nineteen '];
    var b = ['', '', 'Twenty', 'Thirty', 'Forty', 'Fifty', 'Sixty', 'Seventy', 'Eighty', 'Ninety'];
    $(document).ready(function () {

        inWords($('#Net_Total').val());

    });
    $(document).ready(function () {

        inWords1($('#Net_Total11').val());

    });
    $(document).ready(function () {

        inWords1($('#Net_Total22').val());

    });
    function numberWithCommas(nStr) {
        nStr += '';
        x = nStr.split('.');
        x1 = x[0];
        x2 = x.length > 1 ? '.' + x[1] : '';
        var rgx = /(\d+)(\d{3})/;
        var z = 0;
        var len = String(x1).length;
        var num = parseInt((len / 2) - 1);

        while (rgx.test(x1)) {
            if (z > 0) {
                x1 = x1.replace(rgx, '$1' + ',' + '$2');
            }
            else {
                x1 = x1.replace(rgx, '$1' + ',' + '$2');
                rgx = /(\d+)(\d{2})/;
            }
            z++;
            num--;
            if (num == 0) {
                break;
            }
        }
        return x1 + x2;
    }
    function numberWithCommas1(nStr) {
        nStr += '';
        x = nStr.split('.');
        x1 = x[0];
        x2 = x.length > 1 ? '.' + x[1] : '';
        var rgx = /(\d+)(\d{3})/;
        var z = 0;
        var len = String(x1).length;
        var num = parseInt((len / 2) - 1);

        while (rgx.test(x1)) {
            if (z > 0) {
                x1 = x1.replace(rgx, '$1' + ',' + '$2');
            }
            else {
                x1 = x1.replace(rgx, '$1' + ',' + '$2');
                rgx = /(\d+)(\d{2})/;
            }
            z++;
            num--;
            if (num == 0) {
                break;
            }
        }
        return x1 + x2;
    }

    function inWords(num) {


        if ((num = num.toString()).length > 9) return 'overflow';
        n = ('000000000' + num).substr(-9).match(/^(\d{2})(\d{2})(\d{2})(\d{1})(\d{2})$/);
        if (!n) return;
        var str = '';
        str += (n[1] != 0) ? (a[Number(n[1])] || b[n[1][0]] + ' ' + a[n[1][1]]) + 'Crore ' : '';
        str += (n[2] != 0) ? (a[Number(n[2])] || b[n[2][0]] + ' ' + a[n[2][1]]) + 'Lakh ' : '';
        str += (n[3] != 0) ? (a[Number(n[3])] || b[n[3][0]] + ' ' + a[n[3][1]]) + 'Thousand ' : '';
        str += (n[4] != 0) ? (a[Number(n[4])] || b[n[4][0]] + ' ' + a[n[4][1]]) + 'Hundred ' : '';
        str += (n[5] != 0) ? ((str != '') ? 'and ' : '') + (a[Number(n[5])] || b[n[5][0]] + ' ' + a[n[5][1]]) : '';

        $('#container3').text(str);
        document.getElementById('Net_Total').value = numberWithCommas(num) + ".00";
        $('#container11').text(str);
        document.getElementById('Net_Total11').value = numberWithCommas(num) + ".00";
        $('#container22').text(str);
        document.getElementById('Net_Total22').value = numberWithCommas(num) + ".00";
    }
    function inWords1(num) {


        if ((num = num.toString()).length > 9) return 'overflow';
        n = ('000000000' + num).substr(-9).match(/^(\d{2})(\d{2})(\d{2})(\d{1})(\d{2})$/);
        if (!n) return;
        var str = '';
        str += (n[1] != 0) ? (a[Number(n[1])] || b[n[1][0]] + ' ' + a[n[1][1]]) + 'Crore ' : '';
        str += (n[2] != 0) ? (a[Number(n[2])] || b[n[2][0]] + ' ' + a[n[2][1]]) + 'Lakh ' : '';
        str += (n[3] != 0) ? (a[Number(n[3])] || b[n[3][0]] + ' ' + a[n[3][1]]) + 'Thousand ' : '';
        str += (n[4] != 0) ? (a[Number(n[4])] || b[n[4][0]] + ' ' + a[n[4][1]]) + 'Hundred ' : '';
        str += (n[5] != 0) ? ((str != '') ? 'and ' : '') + (a[Number(n[5])] || b[n[5][0]] + ' ' + a[n[5][1]]) : '';
    }
    function printing() {
        var printButton = document.getElementById("bprint");
        var close = document.getElementById("close");
        printButton.style.visibility = 'hidden';
        close.style.visibility = 'hidden';
        window.print();

        printButton.style.visibility = 'visible';
        close.style.visibility = 'visible';
    }

    function close123() {
        window.location = 'genratebill.php';
    }

</script>
</br>
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<div class="container col-sm-12">
<div class="col-xs-12 nopadding" style="border-top: 1px solid #000000;border-right: 1px solid #000000;border-left: 1px solid #000000; border-bottom: 1px solid #000000;">
<div class="col-xs-12 nopadding">
    <table class="printTable" width="100%"
           style="" height="180">
        <tbody>
        <tr height="25">
            <td style="border-bottom: 1px solid" colspan="4" align="center">TAX INVOICE <span style="text-align: right">[ORIGINAL]</span></td>
        </tr>
        <tr>
            <td width="30%" style="" align="left">
              <img src="kr logo.png">
            </td>
            <td width="40%" style="border-top: 1px solid #000000;border-right: 1px solid #000000;border-left: 1px solid #000000; " align="left">
			  <label style="font-size: 20px;padding-left: 5px;" id="color"><u>KINJAL AUTOCHEM INDIA</u></label><br>
                <p style="text-align: left;font-size: 12px;padding-left: 5px;">
                    <strong> GSTIN/UIN : 27AHCPJ6555A1ZM<br>
                        (Registered Under Composite Scheme)</strong><br>
                    <strong>Address : </strong> Gat No - 752, Nr old Panchsheel club, Borhadewadi, Moshi, Pune - 412105.
                    <br><strong>Mobile No: </strong>+91 09766595564, 09762907249. <br> <strong>Email:</strong> kinjalautochemindia@gmail.com
                </p>
               
            </td>
            <td width="30%" style="border-top: 1px solid #000000;border-right: 1px solid #000000;border-left: 1px solid #000000;" align="left">
              
                <label style="font-size: 14px;padding-left: 5px;">INVOICE NO : <?php echo $estimationno; ?></label> <br/>
                <label style="font-size: 14px;padding-left: 5px;">Delivery Challan : <?php echo $note?> </label> <br/>
				   <label style="font-size: 14px;padding-left: 5px;">Date : <?php echo date("d-m-Y",strtotime($date));?> &nbsp; &nbsp; Time: <?php echo $time; ?> </label><br/>
				   <label style="font-size: 14px;padding-left: 5px;">Mode Of Payment : <?php echo ucfirst($paymentmode);?> </label><br/>
				   <label style="font-size: 14px;padding-left: 5px;">Customer Code : <?php echo $contactcode;?> </label> 
            </td>
        </tr>
        </tbody>
    </table>
</div>
<div class="col-xs-12 nopadding" style="border-top: 1px solid #000000;">
    <table class="printTable" width="100%" height="120">
        <tbody>
        <tr>
            <td style="border-bottom: hidden;border-right: 1px solid #000000" width="50%">
                <label style="font-size: 14px;padding-left: 5px;">Buyer:</label>
            </td>
            <td style="border-bottom: hidden;" width="30%">
                <label style="font-size: 14px;padding-left: 5px;">Dispatch Through: <?php echo $dispatch;?></label> </td>
            <td style="border-bottom: hidden;" width="34%">
              
                
            </td>

        </tr>
        <tr>
            <td style="border-bottom: hidden;border-right: 1px solid #000000" width="40%">
                <label style="font-size: 14px;padding-left: 5px;">Company Name: <?php echo $company;?></label>
            </td>
            <td style="border-bottom: hidden;" width="30%">
                <label style="font-size: 14px;padding-left: 5px;">Destination :  <?php echo $destination;?></label> </td>
            <td style="border-bottom: hidden;" width="34%">
               
                </td>
        </tr>
        <tr>
            <td style="border-bottom: hidden;border-right: 1px solid #000000" width="40%">
                <label style="font-size: 14px;padding-left: 5px;">Address: <?php echo $address;?></label>
            </td>
            <td style="border-bottom: hidden;" width="30%">
                <label style="font-size: 14px;padding-left: 5px;">
				<?php
					if($dispatch =='courier')
					{
						echo "Courier Name:".$couriername;
					}else if($dispatch =='transport')
					{
						echo "Transpoter Name:".$transportername;
					}
				?>
</label>
				</td>
            <td style="border-bottom: hidden;" width="34%">
                 
        </tr>
        <tr>
            <td style="border-bottom: hidden;border-right: 1px solid #000000" width="40%">
                <label style="font-size: 14px;padding-left: 5px;">Mobile No. : <?php echo $mobile;?></label>
            </td>
            <td style="border-bottom: hidden;" width="30%">
                <label style="font-size: 14px;padding-left: 5px;"> P.O No: <?php echo $orderno?></label> </td>
            <td style="border-bottom: hidden;" width="34%">
              </td>
        </tr>
        <tr>
            <td style="border-right: 1px solid #000000" width="33%">
                <label style="font-size: 14px;padding-left: 5px;">GSTIN : <?php echo $gst1;?></label>
            </td>
            <td style="" width="30%" >
                <label style="font-size: 14px;padding-left: 5px;"> P.O. Date: <?php echo date("d-m-Y",strtotime($orderdate))?></td>
				<td style="" width="30%" >
                
        </tr>
        <tr>
            <td style="border-right: 1px solid #000000" width="40%">
                <label style="font-size: 14px;padding-left: 5px;">Place Of Supply : <?php echo $destination;?></label>
            </td>
            <td style="" width="30%">
                <label style="font-size: 14px;padding-left: 5px;"> </label> </td>
            <td style="" width="34%">
                <label style="font-size: 14px;padding-left: 5px;"> </label> </td>
        </tr>
        </tbody>
    </table>
</div>
<div class="col-xs-12 nopadding">

    <table border='1' width='100%' height="400" align='center' bordercolor='#000000'
           style='border-collapse:collapse;border-left: hidden;border-right: hidden;font-size: 12px;'>

        <tr height="25">
            <th style="text-align: center" width="3%" rowspan="2"><strong>Sr.No</strong></th>
            <th style="text-align: center" width="29%" rowspan="2"><strong>Description of Goods or Service</strong></th>
            <th style="text-align: center" width="8%" rowspan="2"><strong>HSN Code</strong></th>
            <th style="text-align: center" width="8%" rowspan="2"><strong>GST Rate</strong></th>
            <th style="text-align: center" width="8%" rowspan="2"><strong>Per</strong></th>
            <th style="text-align: center" width="5%" rowspan="2"><strong>Qty</strong></th>
            <th style="text-align: center" rowspan="2" width="3%"><strong>Rate</strong></th>
            <th style="text-align: center" rowspan="2" width="3%"><strong>Total</strong></th>
        </tr>
        <tr height="25">

        </tr>
        <?php
        $result2 = mysql_query("SELECT * FROM composite WHERE invoiceno='$invoiceno'");
        $count =0;
        $totalamount = 0;
        $totalbefore =0;
        $totalcgst =0;
        $totalsgst = 0;
        while($row2 = mysql_fetch_array($result2))
        {
            $category  = $row2['category'];
            $item = $row2['item'];
            $unit = $row2['unit'];
            $qty = $row2['qty'];
            $rate = $row2['rate'];
            $tax = $row2['tax'];
            $total = $row2['total'];
            $discount = $row2['discount'];
            $totalamt = $row2['totalamt'];				
            $finaltotal = $row2['finaltotal'];				
            $grandtotal = $row2['grandtotal'];
            $count=$count+1;

            $selectinfo = mysql_query("SELECT * FROM item WHERE id='$item'");
            $rowinfo = mysql_fetch_array($selectinfo);
            $itemname = $rowinfo['name'];
            $hsn = $rowinfo['hsncode'];


            $selectinfo = mysql_query("SELECT * FROM category WHERE id='$category'");
            $rowinfo = mysql_fetch_array($selectinfo);
            $categoryname = $rowinfo['name'];

            $taxper = $tax /2;

            $gst = ($tax * $total)/ 100;
            $cgst= $gst/2;
            $sgst = $gst/2;
            $totalaftergst = $total + $gst;
            $totalamount = $totalamount + $totalaftergst;
            $totalbefore = $totalbefore + $total;
            $totalcgst = $totalcgst + $cgst;
            $totalsgst = $totalsgst + $sgst;
            ?>
            <tr style="border-bottom:hidden;" height="15px;!important">
                <td align="center"><label style="padding-top: 3px;"><?php echo $count; ?></label></td>
                <td><label style="padding-top: 3px;padding-left: 10px;"><?php echo $itemname;  ?></label></td>
                <td align="center"><label style="padding-top: 3px;padding-left: 10px;"><?php echo $hsn;?></label></td>
                <td align="center"><label style="padding-top: 3px;padding-left: 10px;">NILL</label></td>
             
                <td align="center"><label style="padding-top: 3px;padding-left: 10px;"><?php echo ucfirst($unit);?></label></td>
                <td align="center"><label style="padding-top: 3px;"><?php echo $qty; ?></label></td>
                <td align="right"><input type='text' value='<?php echo $rate; ?>' name='rat' style='border-style : hidden;text-align:right;padding-right:10px;width:60px;padding-top: 3px;'/></td>
                <td align="right"><input type='text' value='<?php echo $total; ?>' name='amt' style='border-style : hidden;text-align: right;padding-top: 3px;width:60px;padding-right: 10px;'/></td>
            </tr>

        <?php } ?>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>

        </tr>

      <?php if($transport > 0){?>
		<tr height="25px;">
			<td style="border-bottom:hidden;border-top:hidden;"></td>
			<td style="border-bottom:hidden;border-top:hidden;"></td>
			<td style="border-bottom:hidden;border-top:hidden;"></td>
			<td style="border-bottom:hidden;border-top:hidden;"></td>
		
            <td colspan="3" style="border-right: 1px solid #000000;text-align: right; padding-right:10px;border-bottom:hidden;"><strong>Transport Charges </strong></td>

            <td align="right" style="padding-right: 10px;"><strong><input type="text" name ="billamt" id= "billamt"value="<?php echo round($transport);?>" style="border:hidden; text-align: right; "></strong></td>
        </tr><tr height="25px;">
			<td colspan=""  style="border-bottom:hidden"></td>
			<td style="border-bottom:hidden;"></td>
			<td style="border-bottom:hidden;"></td>
			<td style="border-bottom:hidden;"></td>
		
            <td colspan="3" style="border-right: 1px solid #000000;text-align: right;border-bottom:hidden; padding-right:10px;"><strong>Laber Charges </strong></td>

            <td align="right" style="padding-right: 10px;"><strong><input type="text" name ="billamt" id= "billamt"value="<?php echo round($labour);?>" style="border:hidden; text-align: right;"></strong></td>
        </tr><tr height="25px;">
			<td colspan=""></td>
				<td style="border-bottom:hidden;"></td>
			<td style="border-bottom:hidden;"></td>
			<td style="border-bottom:hidden;"></td>	
            <td colspan="3" style="border-right: 1px solid #000000;text-align: right; padding-right:10px;"><strong>packing Charges </strong></td>

            <td align="right" style="padding-right: 10px;"><strong><input type="text" name ="billamt" id= "billamt"value="<?php echo round($packing);?>" style="border:hidden; text-align: right;"></strong></td>
        </tr>
		<?php } ?>
          <tr height="25px;">
            <td colspan="7" style="border-right: 1px solid #000000;text-align: right; padding-right:10px;"><strong>Bill Amount</strong></td>

            <td align="right" style="padding-right: 10px;"><strong><input type="text" name ="billamt" id= "billamt"value="<?php echo round($totalamt);?>" style="border:hidden; text-align: right;"></strong></td>
        </tr><tr height="25px;">
            <td colspan="7" style="border-right: 1px solid #000000;text-align: right; padding-right:10px;"><strong>Discount</strong></td>

            <td align="right" style="padding-right: 10px;"><strong><input type="text" name ="discount" id= "discount"value="<?php echo round($discount);?>" style="border:hidden; text-align: right;"></strong></td>
        </tr><tr height="25px;">
            <td colspan="7" style="border-right: 1px solid #000000;text-align: right; padding-right:10px;"><strong>Total</strong></td>

            <td align="right" style="padding-right: 10px;"><strong><input type="text" name ="Net_Total" id= "Net_Total"value="<?php echo round($finaltotal);?>" style="border:hidden; text-align: right;"></strong></td>
        </tr>

        <tr height="15px;!important">
            <td colspan="88" style="" rowspan="2">
                <strong>
                    <span style="font-size: 12px;padding-left: 5px;">Total Invoice Value (In words) : </span>
                    <span id="container3" style="font-size:12px;font-weight:bold;padding-left: 5px;"></span><span style="font-size: 12px;">Only</span>
                </strong>

            </td>

        </tr>

        <tr height="15px;!important">

        </tr>
    </table>
	 <table border='1' width='100%' height='100' align='center' bordercolor='#000000'
           style='border-collapse:collapse;border-left: hidden;border-right: hidden;border-top: hidden;font-size: 12px;'>
		    <tr>
            <th style="text-align: center" ><strong>HSN/SAC</strong></th>
            <th style="text-align: center" ><strong>Taxable Value</strong></th>
            <th style="text-align: center" colspan="2"><strong>IGST</strong></th>
            <th style="text-align: center" colspan="2"><strong>Central Tax</strong></th>
            <th style="text-align: center" colspan="2"><strong>State Tax</strong></th>
		</tr>
		<tr>
            <th style="text-align: center"><strong></strong></th>
            <th style="text-align: center"><strong></strong></th>
            <th style="text-align: center"><strong>Rate</strong></th>
            <th style="text-align: center"><strong>Amount</strong></th>
            <th style="text-align: center"><strong>Rate</strong></th>
            <th style="text-align: center"><strong>Amount</strong></th>
			<th style="text-align: center"><strong>Rate</strong></th>
            <th style="text-align: center"><strong>Amount</strong></th>
		</tr><tr>
            <td style="text-align: center">&nbsp;</td>
            <td style="text-align: center">&nbsp;</td>
            <td style="text-align: center">&nbsp;</td>
            <td style="text-align: center">&nbsp;</td>
            <td style="text-align: center">&nbsp;</td>
            <td style="text-align: center">&nbsp;</td>
			<td style="text-align: center">&nbsp;</td>
            <td style="text-align: center">&nbsp;</td>
		</tr>
		<tr>
            <td style="text-align: center">&nbsp;</td>
            <td style="text-align: center">&nbsp;</td>
            <td style="text-align: center">&nbsp;</td>
            <td style="text-align: center">&nbsp;</td>
            <td style="text-align: center">&nbsp;</td>
            <td style="text-align: center">&nbsp;</td>
			<td style="text-align: center">&nbsp;</td>
            <td style="text-align: center">&nbsp;</td>
		</tr>
		<tr>
            <td style="text-align: center" colspan="2"><strong>Total</strong></td>
            <td style="text-align: center">&nbsp;</td>
            <td style="text-align: center">&nbsp;</td>
            <td style="text-align: center">&nbsp;</td>
            <td style="text-align: center">&nbsp;</td>
			<td style="text-align: center">&nbsp;</td>
            <td style="text-align: center">&nbsp;</td>
		</tr>
		      </table>
			  
</div>
<div class="col-xs-12 nopadding">

    <table border='1' align='center' width="100%" bordercolor='#000000'
           style='border-collapse:collapse;border-right: hidden;border-left: hidden;border-top: hidden;border-bottom: hidden;font-size: 12px;' >

        <tr style="border-bottom: hidden">
            <td width="45%" style="padding-left: 5px;"><strong>Our Bank Details</strong></td>

            <td width="30%" align="center" style="font-size: 12px;"></td>
        </tr>
        <tr style="border-bottom: hidden">
            <td style="padding-left: 5px;">Account Name: Kinjal Autochem India, <br>Bank name &#45; Union Bank of India</td>

            <td align="center"> <span style="font-weight: bold;font-size: 16px;">For, KINJAL AUTOCHEM INDIA</span></td>
        </tr>
        <tr style="border-bottom: hidden">
            <td style="padding-left: 5px;">Branch &#45; Bhosari Branch</td>

            <td></td>
        </tr>
        <tr style="border-bottom: hidden">
            <td style="padding-left: 5px;">A/c No. &#45; 672001010050426</td>

            <td></td>
        </tr>
        <tr style="border-bottom: hidden">
            <td style="padding-left: 5px;">IFSC Code &#45; UBIN0567205 </td>

            <td align="center"></strong></td>
        </tr>
        <tr style="border-bottom: hidden">
            <td style="padding-left: 5px;"><strong>Declaration: </strong></td>

            <td align="center"></td>
        </tr>
        <tr style="border-bottom: hidden">
            <td style="padding-left: 5px;"><p style="font-size: 12px;">
                    1. We declare that this invoice shows the actual price of goods described and has
                    all particulars are true and correct.<br>
                    2. Goods once sold cannot be taken back.<br>
                    3. If credit days is more than 30 then 18% interest will be applied.<br>
                    4. All disputes are subject to Pimpri Chinchwad jurisdiction only.<br>
					5. Terms Of Delivery: <?php echo $terms; ?> 
                </p></td>

            <td align="center"><strong>Authorised Signatory</strong></td>
        </tr>
    </table>

</div>
</div>
</div>
<div class="container col-sm-12" style="page-break-before: always">

<div class="col-xs-12 nopadding" style="border-top: 1px solid #000000;border-right: 1px solid #000000;border-left: 1px solid #000000; border-bottom: 1px solid #000000;">
<div class="col-xs-12 nopadding">
    <table class="printTable" width="100%"
           style="" height="180">
        <tbody>
        <tr height="25">
            <td style="border-bottom: 1px solid" colspan="4" align="center">TAX INVOICE <span style="text-align: right">[DUPLICATE]</span></td>
        </tr>
        <tr>
            <td width="30%" style="" align="left">
              <img src="kr logo.png">
            </td>
            <td width="40%" style="border-top: 1px solid #000000;border-right: 1px solid #000000;border-left: 1px solid #000000; " align="left">
			  <label style="font-size: 20px;padding-left: 5px;" id="color"><u>KINJAL AUTOCHEM INDIA</u></label><br>
                <p style="text-align: left;font-size: 12px;padding-left: 5px;">
                    <strong> GSTIN/UIN : 27AHCPJ6555A1ZM<br>
                        (Registered Under Composite Scheme)</strong><br>
                    <strong>Address : </strong> Gat No - 752, Nr old Panchsheel club, Borhadewadi, Moshi, Pune - 412105.
                    <br><strong>Mobile No: </strong>+91 09766595564, 09762907249. <br> <strong>Email:</strong> kinjalautochemindia@gmail.com
                </p>
               
            </td>
            <td width="30%" style="border-top: 1px solid #000000;border-right: 1px solid #000000;border-left: 1px solid #000000;" align="left">
              
                <label style="font-size: 14px;padding-left: 5px;">INVOICE NO : <?php echo $estimationno; ?></label> <br/>
                <label style="font-size: 14px;padding-left: 5px;">Delivery Challan : <?php echo $note?> </label> <br/>
				   <label style="font-size: 14px;padding-left: 5px;">Date : <?php echo date("d-m-Y",strtotime($date));?> &nbsp; &nbsp; Time: <?php echo $time; ?> </label><br/>
				   <label style="font-size: 14px;padding-left: 5px;">Mode Of Payment : <?php echo ucfirst($paymentmode);?> </label><br/>
				   <label style="font-size: 14px;padding-left: 5px;">Customer Code : <?php echo $contactcode;?> </label> 
            </td>
        </tr>
        </tbody>
    </table>
</div>
<div class="col-xs-12 nopadding" style="border-top: 1px solid #000000;">
    <table class="printTable" width="100%" height="120">
        <tbody>
        <tr>
            <td style="border-bottom: hidden;border-right: 1px solid #000000" width="50%">
                <label style="font-size: 14px;padding-left: 5px;">Buyer:</label>
            </td>
            <td style="border-bottom: hidden;" width="30%">
                <label style="font-size: 14px;padding-left: 5px;">Dispatch Through: <?php echo $dispatch;?></label> </td>
            <td style="border-bottom: hidden;" width="34%">
              
                
            </td>

        </tr>
        <tr>
            <td style="border-bottom: hidden;border-right: 1px solid #000000" width="40%">
                <label style="font-size: 14px;padding-left: 5px;">Company Name: <?php echo $company;?></label>
            </td>
            <td style="border-bottom: hidden;" width="30%">
                <label style="font-size: 14px;padding-left: 5px;">Destination :  <?php echo $destination;?></label> </td>
            <td style="border-bottom: hidden;" width="34%">
               
                </td>
        </tr>
        <tr>
            <td style="border-bottom: hidden;border-right: 1px solid #000000" width="40%">
                <label style="font-size: 14px;padding-left: 5px;">Address: <?php echo $address;?></label>
            </td>
            <td style="border-bottom: hidden;" width="30%">
                <label style="font-size: 14px;padding-left: 5px;">
				<?php
					if($dispatch =='courier')
					{
						echo "Courier Name:".$couriername;
					}else if($dispatch =='transport')
					{
						echo "Transpoter Name:".$transportername;
					}
				?>
</label>
				</td>
            <td style="border-bottom: hidden;" width="34%">
                 
        </tr>
        <tr>
            <td style="border-bottom: hidden;border-right: 1px solid #000000" width="40%">
                <label style="font-size: 14px;padding-left: 5px;">Mobile No. : <?php echo $mobile;?></label>
            </td>
            <td style="border-bottom: hidden;" width="30%">
                <label style="font-size: 14px;padding-left: 5px;"> P.O No: <?php echo $orderno?></label> </td>
            <td style="border-bottom: hidden;" width="34%">
              </td>
        </tr>
        <tr>
            <td style="border-right: 1px solid #000000" width="33%">
                <label style="font-size: 14px;padding-left: 5px;">GSTIN : <?php echo $gst1;?></label>
            </td>
            <td style="" width="30%" >
                <label style="font-size: 14px;padding-left: 5px;"> P.O. Date: <?php echo date("d-m-Y",strtotime($orderdate))?></td>
				<td style="" width="30%" >
                
        </tr>
        <tr>
            <td style="border-right: 1px solid #000000" width="40%">
                <label style="font-size: 14px;padding-left: 5px;">Place Of Supply : <?php echo $destination;?></label>
            </td>
            <td style="" width="30%">
                <label style="font-size: 14px;padding-left: 5px;"> </label> </td>
            <td style="" width="34%">
                <label style="font-size: 14px;padding-left: 5px;"> </label> </td>
        </tr>
        </tbody>
    </table>
</div>
<div class="col-xs-12 nopadding">

    <table border='1' width='100%' height="400" align='center' bordercolor='#000000'
           style='border-collapse:collapse;border-left: hidden;border-right: hidden;font-size: 12px;'>

        <tr height="25">
            <th style="text-align: center" width="3%" rowspan="2"><strong>Sr.No</strong></th>
            <th style="text-align: center" width="29%" rowspan="2"><strong>Description of Goods or Service</strong></th>
            <th style="text-align: center" width="8%" rowspan="2"><strong>HSN Code</strong></th>
            <th style="text-align: center" width="8%" rowspan="2"><strong>GST Rate</strong></th>
            <th style="text-align: center" width="8%" rowspan="2"><strong>Per</strong></th>
            <th style="text-align: center" width="5%" rowspan="2"><strong>Qty</strong></th>
            <th style="text-align: center" rowspan="2" width="3%"><strong>Rate</strong></th>
            <th style="text-align: center" rowspan="2" width="3%"><strong>Total</strong></th>
        </tr>
        <tr height="25">

        </tr>
        <?php
        $result2 = mysql_query("SELECT * FROM composite WHERE invoiceno='$invoiceno'");
        $count =0;
        $totalamount = 0;
        $totalbefore =0;
        $totalcgst =0;
        $totalsgst = 0;
        while($row2 = mysql_fetch_array($result2))
        {
            $category  = $row2['category'];
            $item = $row2['item'];
            $unit = $row2['unit'];
            $qty = $row2['qty'];
            $rate = $row2['rate'];
            $tax = $row2['tax'];
            $total = $row2['total'];
            $discount = $row2['discount'];
            $totalamt = $row2['totalamt'];				
            $finaltotal = $row2['finaltotal'];				
            $grandtotal = $row2['grandtotal'];
            $count=$count+1;

            $selectinfo = mysql_query("SELECT * FROM item WHERE id='$item'");
            $rowinfo = mysql_fetch_array($selectinfo);
            $itemname = $rowinfo['name'];
            $hsn = $rowinfo['hsncode'];


            $selectinfo = mysql_query("SELECT * FROM category WHERE id='$category'");
            $rowinfo = mysql_fetch_array($selectinfo);
            $categoryname = $rowinfo['name'];

            $taxper = $tax /2;

            $gst = ($tax * $total)/ 100;
            $cgst= $gst/2;
            $sgst = $gst/2;
            $totalaftergst = $total + $gst;
            $totalamount = $totalamount + $totalaftergst;
            $totalbefore = $totalbefore + $total;
            $totalcgst = $totalcgst + $cgst;
            $totalsgst = $totalsgst + $sgst;
            ?>
            <tr style="border-bottom:hidden;" height="15px;!important">
                <td align="center"><label style="padding-top: 3px;"><?php echo $count; ?></label></td>
                <td><label style="padding-top: 3px;padding-left: 10px;"><?php echo $itemname;  ?></label></td>
                <td align="center"><label style="padding-top: 3px;padding-left: 10px;"><?php echo $hsn;?></label></td>
                <td align="center"><label style="padding-top: 3px;padding-left: 10px;">NILL</label></td>
             
                <td align="center"><label style="padding-top: 3px;padding-left: 10px;"><?php echo ucfirst($unit);?></label></td>
                <td align="center"><label style="padding-top: 3px;"><?php echo $qty; ?></label></td>
                <td align="right"><input type='text' value='<?php echo $rate; ?>' name='rat' style='border-style : hidden;text-align:right;padding-right:10px;width:60px;padding-top: 3px;'/></td>
                <td align="right"><input type='text' value='<?php echo $total; ?>' name='amt' style='border-style : hidden;text-align: right;padding-top: 3px;width:60px;padding-right: 10px;'/></td>
            </tr>

        <?php } ?>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>

        </tr>

      <?php if($transport > 0){?>
		<tr height="25px;">
			<td style="border-bottom:hidden;border-top:hidden;"></td>
			<td style="border-bottom:hidden;border-top:hidden;"></td>
			<td style="border-bottom:hidden;border-top:hidden;"></td>
			<td style="border-bottom:hidden;border-top:hidden;"></td>
		
            <td colspan="3" style="border-right: 1px solid #000000;text-align: right; padding-right:10px;border-bottom:hidden;"><strong>Transport Charges </strong></td>

            <td align="right" style="padding-right: 10px;"><strong><input type="text" name ="billamt" id= "billamt"value="<?php echo round($transport);?>" style="border:hidden; text-align: right; "></strong></td>
        </tr><tr height="25px;">
			<td colspan=""  style="border-bottom:hidden"></td>
			<td style="border-bottom:hidden;"></td>
			<td style="border-bottom:hidden;"></td>
			<td style="border-bottom:hidden;"></td>
		
            <td colspan="3" style="border-right: 1px solid #000000;text-align: right;border-bottom:hidden; padding-right:10px;"><strong>Laber Charges </strong></td>

            <td align="right" style="padding-right: 10px;"><strong><input type="text" name ="billamt" id= "billamt"value="<?php echo round($labour);?>" style="border:hidden; text-align: right;"></strong></td>
        </tr><tr height="25px;">
			<td colspan=""></td>
				<td style="border-bottom:hidden;"></td>
			<td style="border-bottom:hidden;"></td>
			<td style="border-bottom:hidden;"></td>	
            <td colspan="3" style="border-right: 1px solid #000000;text-align: right; padding-right:10px;"><strong>packing Charges </strong></td>

            <td align="right" style="padding-right: 10px;"><strong><input type="text" name ="billamt" id= "billamt"value="<?php echo round($packing);?>" style="border:hidden; text-align: right;"></strong></td>
        </tr>
		<?php } ?>
          <tr height="25px;">
            <td colspan="7" style="border-right: 1px solid #000000;text-align: right; padding-right:10px;"><strong>Bill Amount</strong></td>

            <td align="right" style="padding-right: 10px;"><strong><input type="text" name ="billamt" id= "billamt"value="<?php echo round($totalamt);?>" style="border:hidden; text-align: right;"></strong></td>
        </tr><tr height="25px;">
            <td colspan="7" style="border-right: 1px solid #000000;text-align: right; padding-right:10px;"><strong>Discount</strong></td>

            <td align="right" style="padding-right: 10px;"><strong><input type="text" name ="discount" id= "discount"value="<?php echo round($discount);?>" style="border:hidden; text-align: right;"></strong></td>
        </tr><tr height="25px;">
            <td colspan="7" style="border-right: 1px solid #000000;text-align: right; padding-right:10px;"><strong>Total</strong></td>

            <td align="right" style="padding-right: 10px;"><strong><input type="text" name ="Net_Total11" id= "Net_Total11"value="<?php echo round($finaltotal);?>" style="border:hidden; text-align: right;"></strong></td>
        </tr>
        <tr height="15px;!important">
            <td colspan="88" style="" rowspan="2">
                <strong>
                    <span style="font-size: 12px;padding-left: 5px;">Total Invoice Value (In words) : </span>
                    <span id="container11" style="font-size:12px;font-weight:bold;padding-left: 5px;"></span><span style="font-size: 12px;">Only</span>
                </strong>

            </td>

        </tr>

        <tr height="15px;!important">

        </tr>
    </table>
	 <table border='1' width='100%' height='100' align='center' bordercolor='#000000'
           style='border-collapse:collapse;border-left: hidden;border-right: hidden;border-top: hidden;font-size: 12px;'>
		    <tr>
            <th style="text-align: center" ><strong>HSN/SAC</strong></th>
            <th style="text-align: center" ><strong>Taxable Value</strong></th>
            <th style="text-align: center" colspan="2"><strong>IGST</strong></th>
            <th style="text-align: center" colspan="2"><strong>Central Tax</strong></th>
            <th style="text-align: center" colspan="2"><strong>State Tax</strong></th>
		</tr>
		<tr>
            <th style="text-align: center"><strong></strong></th>
            <th style="text-align: center"><strong></strong></th>
            <th style="text-align: center"><strong>Rate</strong></th>
            <th style="text-align: center"><strong>Amount</strong></th>
            <th style="text-align: center"><strong>Rate</strong></th>
            <th style="text-align: center"><strong>Amount</strong></th>
			<th style="text-align: center"><strong>Rate</strong></th>
            <th style="text-align: center"><strong>Amount</strong></th>
		</tr><tr>
            <td style="text-align: center">&nbsp;</td>
            <td style="text-align: center">&nbsp;</td>
            <td style="text-align: center">&nbsp;</td>
            <td style="text-align: center">&nbsp;</td>
            <td style="text-align: center">&nbsp;</td>
            <td style="text-align: center">&nbsp;</td>
			<td style="text-align: center">&nbsp;</td>
            <td style="text-align: center">&nbsp;</td>
		</tr>
		<tr>
            <td style="text-align: center">&nbsp;</td>
            <td style="text-align: center">&nbsp;</td>
            <td style="text-align: center">&nbsp;</td>
            <td style="text-align: center">&nbsp;</td>
            <td style="text-align: center">&nbsp;</td>
            <td style="text-align: center">&nbsp;</td>
			<td style="text-align: center">&nbsp;</td>
            <td style="text-align: center">&nbsp;</td>
		</tr>
		<tr>
            <td style="text-align: center" colspan="2"><strong>Total</strong></td>
            <td style="text-align: center">&nbsp;</td>
            <td style="text-align: center">&nbsp;</td>
            <td style="text-align: center">&nbsp;</td>
            <td style="text-align: center">&nbsp;</td>
			<td style="text-align: center">&nbsp;</td>
            <td style="text-align: center">&nbsp;</td>
		</tr>
		      </table>
			  
</div>
<div class="col-xs-12 nopadding">

    <table border='1' align='center' width="100%" bordercolor='#000000'
           style='border-collapse:collapse;border-right: hidden;border-left: hidden;border-top: hidden;border-bottom: hidden;font-size: 12px;' >

        <tr style="border-bottom: hidden">
            <td width="45%" style="padding-left: 5px;"><strong>Our Bank Details</strong></td>

            <td width="30%" align="center" style="font-size: 12px;"></td>
        </tr>
        <tr style="border-bottom: hidden">
            <td style="padding-left: 5px;">Account Name: Kinjal Autochem India, <br>Bank name &#45; Union Bank of India</td>

            <td align="center"> <span style="font-weight: bold;font-size: 16px;">For, KINJAL AUTOCHEM INDIA</span></td>
        </tr>
        <tr style="border-bottom: hidden">
            <td style="padding-left: 5px;">Branch &#45; Bhosari Branch</td>

            <td></td>
        </tr>
        <tr style="border-bottom: hidden">
            <td style="padding-left: 5px;">A/c No. &#45; 672001010050426</td>

            <td></td>
        </tr>
        <tr style="border-bottom: hidden">
            <td style="padding-left: 5px;">IFSC Code &#45; UBIN0567205 </td>

            <td align="center"></strong></td>
        </tr>
        <tr style="border-bottom: hidden">
            <td style="padding-left: 5px;"><strong>Declaration: </strong></td>

            <td align="center"></td>
        </tr>
        <tr style="border-bottom: hidden">
            <td style="padding-left: 5px;"><p style="font-size: 12px;">
                    1. We declare that this invoice shows the actual price of goods described and has
                    all particulars are true and correct.<br>
                    2. Goods once sold cannot be taken back.<br>
                    3. If credit days is more than 30 then 18% interest will be applied.<br>
                    4. All disputes are subject to Pimpri Chinchwad jurisdiction only.<br>
					5. Terms Of Delivery: <?php echo $terms; ?> 
                </p></td>

            <td align="center"><strong>Authorised Signatory</strong></td>
        </tr>
    </table>

</div>
</div>
</div>
<div class="container col-sm-12" style="page-break-before: always">

<div class="col-xs-12 nopadding" style="border-top: 1px solid #000000;border-right: 1px solid #000000;border-left: 1px solid #000000; border-bottom: 1px solid #000000;">
<div class="col-xs-12 nopadding">
    <table class="printTable" width="100%"
           style="" height="180">
        <tbody>
        <tr height="25">
            <td style="border-bottom: 1px solid" colspan="4" align="center">TAX INVOICE <span style="text-align: right">[TRIPLICATE]</span></td>
        </tr>
        <tr>
            <td width="30%" style="" align="left">
              <img src="kr logo.png">
            </td>
            <td width="40%" style="border-top: 1px solid #000000;border-right: 1px solid #000000;border-left: 1px solid #000000; " align="left">
			  <label style="font-size: 20px;padding-left: 5px;" id="color"><u>KINJAL AUTOCHEM INDIA</u></label><br>
                <p style="text-align: left;font-size: 12px;padding-left: 5px;">
                    <strong> GSTIN/UIN : 27AHCPJ6555A1ZM<br>
                        (Registered Under Composite Scheme)</strong><br>
                    <strong>Address : </strong> Gat No - 752, Nr old Panchsheel club, Borhadewadi, Moshi, Pune - 412105.
                    <br><strong>Mobile No: </strong>+91 09766595564, 09762907249. <br> <strong>Email:</strong> kinjalautochemindia@gmail.com
                </p>
               
            </td>
            <td width="30%" style="border-top: 1px solid #000000;border-right: 1px solid #000000;border-left: 1px solid #000000;" align="left">
              
                <label style="font-size: 14px;padding-left: 5px;">INVOICE NO : <?php echo $estimationno; ?></label> <br/>
                <label style="font-size: 14px;padding-left: 5px;">Delivery Challan : <?php echo $note?> </label> <br/>
				   <label style="font-size: 14px;padding-left: 5px;">Date : <?php echo date("d-m-Y",strtotime($date));?> &nbsp; &nbsp; Time: <?php echo $time; ?> </label><br/>
				   <label style="font-size: 14px;padding-left: 5px;">Mode Of Payment : <?php echo ucfirst($paymentmode);?> </label><br/>
				   <label style="font-size: 14px;padding-left: 5px;">Customer Code : <?php echo $contactcode;?> </label> 
            </td>
        </tr>
        </tbody>
    </table>
</div>
<div class="col-xs-12 nopadding" style="border-top: 1px solid #000000;">
    <table class="printTable" width="100%" height="120">
        <tbody>
        <tr>
            <td style="border-bottom: hidden;border-right: 1px solid #000000" width="50%">
                <label style="font-size: 14px;padding-left: 5px;">Buyer:</label>
            </td>
            <td style="border-bottom: hidden;" width="30%">
                <label style="font-size: 14px;padding-left: 5px;">Dispatch Through: <?php echo $dispatch;?></label> </td>
            <td style="border-bottom: hidden;" width="34%">
              
                
            </td>

        </tr>
        <tr>
            <td style="border-bottom: hidden;border-right: 1px solid #000000" width="40%">
                <label style="font-size: 14px;padding-left: 5px;">Company Name: <?php echo $company;?></label>
            </td>
            <td style="border-bottom: hidden;" width="30%">
                <label style="font-size: 14px;padding-left: 5px;">Destination :  <?php echo $destination;?></label> </td>
            <td style="border-bottom: hidden;" width="34%">
               
                </td>
        </tr>
        <tr>
            <td style="border-bottom: hidden;border-right: 1px solid #000000" width="40%">
                <label style="font-size: 14px;padding-left: 5px;">Address: <?php echo $address;?></label>
            </td>
            <td style="border-bottom: hidden;" width="30%">
                <label style="font-size: 14px;padding-left: 5px;">
				<?php
					if($dispatch =='courier')
					{
						echo "Courier Name:".$couriername;
					}else if($dispatch =='transport')
					{
						echo "Transpoter Name:".$transportername;
					}
				?>
</label>
				</td>
            <td style="border-bottom: hidden;" width="34%">
                 
        </tr>
        <tr>
            <td style="border-bottom: hidden;border-right: 1px solid #000000" width="40%">
                <label style="font-size: 14px;padding-left: 5px;">Mobile No. : <?php echo $mobile;?></label>
            </td>
            <td style="border-bottom: hidden;" width="30%">
                <label style="font-size: 14px;padding-left: 5px;"> P.O No: <?php echo $orderno?></label> </td>
            <td style="border-bottom: hidden;" width="34%">
              </td>
        </tr>
        <tr>
            <td style="border-right: 1px solid #000000" width="33%">
                <label style="font-size: 14px;padding-left: 5px;">GSTIN : <?php echo $gst1;?></label>
            </td>
            <td style="" width="30%" >
                <label style="font-size: 14px;padding-left: 5px;"> P.O. Date: <?php echo date("d-m-Y",strtotime($orderdate))?></td>
				<td style="" width="30%" >
                
        </tr>
        <tr>
            <td style="border-right: 1px solid #000000" width="40%">
                <label style="font-size: 14px;padding-left: 5px;">Place Of Supply : <?php echo $destination;?></label>
            </td>
            <td style="" width="30%">
                <label style="font-size: 14px;padding-left: 5px;"> </label> </td>
            <td style="" width="34%">
                <label style="font-size: 14px;padding-left: 5px;"> </label> </td>
        </tr>
        </tbody>
    </table>
</div>
<div class="col-xs-12 nopadding">

    <table border='1' width='100%' height="400" align='center' bordercolor='#000000'
           style='border-collapse:collapse;border-left: hidden;border-right: hidden;font-size: 12px;'>

        <tr height="25">
            <th style="text-align: center" width="3%" rowspan="2"><strong>Sr.No</strong></th>
            <th style="text-align: center" width="29%" rowspan="2"><strong>Description of Goods or Service</strong></th>
            <th style="text-align: center" width="8%" rowspan="2"><strong>HSN Code</strong></th>
            <th style="text-align: center" width="8%" rowspan="2"><strong>GST Rate</strong></th>
            <th style="text-align: center" width="8%" rowspan="2"><strong>Per</strong></th>
            <th style="text-align: center" width="5%" rowspan="2"><strong>Qty</strong></th>
            <th style="text-align: center" rowspan="2" width="3%"><strong>Rate</strong></th>
            <th style="text-align: center" rowspan="2" width="3%"><strong>Total</strong></th>
        </tr>
        <tr height="25">

        </tr>
        <?php
        $result2 = mysql_query("SELECT * FROM composite WHERE invoiceno='$invoiceno'");
        $count =0;
        $totalamount = 0;
        $totalbefore =0;
        $totalcgst =0;
        $totalsgst = 0;
        while($row2 = mysql_fetch_array($result2))
        {
            $category  = $row2['category'];
            $item = $row2['item'];
            $unit = $row2['unit'];
            $qty = $row2['qty'];
            $rate = $row2['rate'];
            $tax = $row2['tax'];
            $total = $row2['total'];
            $discount = $row2['discount'];
            $totalamt = $row2['totalamt'];				
            $finaltotal = $row2['finaltotal'];				
            $grandtotal = $row2['grandtotal'];
            $count=$count+1;

            $selectinfo = mysql_query("SELECT * FROM item WHERE id='$item'");
            $rowinfo = mysql_fetch_array($selectinfo);
            $itemname = $rowinfo['name'];
            $hsn = $rowinfo['hsncode'];


            $selectinfo = mysql_query("SELECT * FROM category WHERE id='$category'");
            $rowinfo = mysql_fetch_array($selectinfo);
            $categoryname = $rowinfo['name'];

            $taxper = $tax /2;

            $gst = ($tax * $total)/ 100;
            $cgst= $gst/2;
            $sgst = $gst/2;
            $totalaftergst = $total + $gst;
            $totalamount = $totalamount + $totalaftergst;
            $totalbefore = $totalbefore + $total;
            $totalcgst = $totalcgst + $cgst;
            $totalsgst = $totalsgst + $sgst;
            ?>
            <tr style="border-bottom:hidden;" height="15px;!important">
                <td align="center"><label style="padding-top: 3px;"><?php echo $count; ?></label></td>
                <td><label style="padding-top: 3px;padding-left: 10px;"><?php echo $itemname;  ?></label></td>
                <td align="center"><label style="padding-top: 3px;padding-left: 10px;"><?php echo $hsn;?></label></td>
                <td align="center"><label style="padding-top: 3px;padding-left: 10px;">NILL</label></td>
             
                <td align="center"><label style="padding-top: 3px;padding-left: 10px;"><?php echo ucfirst($unit);?></label></td>
                <td align="center"><label style="padding-top: 3px;"><?php echo $qty; ?></label></td>
                <td align="right"><input type='text' value='<?php echo $rate; ?>' name='rat' style='border-style : hidden;text-align:right;padding-right:10px;width:60px;padding-top: 3px;'/></td>
                <td align="right"><input type='text' value='<?php echo $total; ?>' name='amt' style='border-style : hidden;text-align: right;padding-top: 3px;width:60px;padding-right: 10px;'/></td>
            </tr>

        <?php } ?>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>

        </tr>

       <?php if($transport > 0){?>
		<tr height="25px;">
			<td style="border-bottom:hidden;border-top:hidden;"></td>
			<td style="border-bottom:hidden;border-top:hidden;"></td>
			<td style="border-bottom:hidden;border-top:hidden;"></td>
			<td style="border-bottom:hidden;border-top:hidden;"></td>
		
            <td colspan="3" style="border-right: 1px solid #000000;text-align: right; padding-right:10px;border-bottom:hidden;"><strong>Transport Charges </strong></td>

            <td align="right" style="padding-right: 10px;"><strong><input type="text" name ="billamt" id= "billamt"value="<?php echo round($transport);?>" style="border:hidden; text-align: right; "></strong></td>
        </tr><tr height="25px;">
			<td colspan=""  style="border-bottom:hidden"></td>
			<td style="border-bottom:hidden;"></td>
			<td style="border-bottom:hidden;"></td>
			<td style="border-bottom:hidden;"></td>
		
            <td colspan="3" style="border-right: 1px solid #000000;text-align: right;border-bottom:hidden; padding-right:10px;"><strong>Laber Charges </strong></td>

            <td align="right" style="padding-right: 10px;"><strong><input type="text" name ="billamt" id= "billamt"value="<?php echo round($labour);?>" style="border:hidden; text-align: right;"></strong></td>
        </tr><tr height="25px;">
			<td colspan=""></td>
				<td style="border-bottom:hidden;"></td>
			<td style="border-bottom:hidden;"></td>
			<td style="border-bottom:hidden;"></td>	
            <td colspan="3" style="border-right: 1px solid #000000;text-align: right; padding-right:10px;"><strong>packing Charges </strong></td>

            <td align="right" style="padding-right: 10px;"><strong><input type="text" name ="billamt" id= "billamt"value="<?php echo round($packing);?>" style="border:hidden; text-align: right;"></strong></td>
        </tr>
		<?php } ?>
          <tr height="25px;">
            <td colspan="7" style="border-right: 1px solid #000000;text-align: right; padding-right:10px;"><strong>Bill Amount</strong></td>

            <td align="right" style="padding-right: 10px;"><strong><input type="text" name ="billamt" id= "billamt"value="<?php echo round($totalamt);?>" style="border:hidden; text-align: right;"></strong></td>
        </tr><tr height="25px;">
            <td colspan="7" style="border-right: 1px solid #000000;text-align: right; padding-right:10px;"><strong>Discount</strong></td>

            <td align="right" style="padding-right: 10px;"><strong><input type="text" name ="discount" id= "discount"value="<?php echo round($discount);?>" style="border:hidden; text-align: right;"></strong></td>
        </tr><tr height="25px;">
            <td colspan="7" style="border-right: 1px solid #000000;text-align: right; padding-right:10px;"><strong>Total</strong></td>

            <td align="right" style="padding-right: 10px;"><strong><input type="text" name ="Net_Total22" id= "Net_Total22"value="<?php echo round($finaltotal);?>" style="border:hidden; text-align: right;"></strong></td>
        </tr>

        <tr height="15px;!important">
            <td colspan="88" style="" rowspan="2">
                <strong>
                    <span style="font-size: 12px;padding-left: 5px;">Total Invoice Value (In words) : </span>
                    <span id="container22" style="font-size:12px;font-weight:bold;padding-left: 5px;"></span><span style="font-size: 12px;">Only</span>
                </strong>

            </td>

        </tr>

        <tr height="15px;!important">

        </tr>
    </table>
	 <table border='1' width='100%' height='100' align='center' bordercolor='#000000'
           style='border-collapse:collapse;border-left: hidden;border-right: hidden;border-top: hidden;font-size: 12px;'>
		    <tr>
            <th style="text-align: center" ><strong>HSN/SAC</strong></th>
            <th style="text-align: center" ><strong>Taxable Value</strong></th>
            <th style="text-align: center" colspan="2"><strong>IGST</strong></th>
            <th style="text-align: center" colspan="2"><strong>Central Tax</strong></th>
            <th style="text-align: center" colspan="2"><strong>State Tax</strong></th>
		</tr>
		<tr>
            <th style="text-align: center"><strong></strong></th>
            <th style="text-align: center"><strong></strong></th>
            <th style="text-align: center"><strong>Rate</strong></th>
            <th style="text-align: center"><strong>Amount</strong></th>
            <th style="text-align: center"><strong>Rate</strong></th>
            <th style="text-align: center"><strong>Amount</strong></th>
			<th style="text-align: center"><strong>Rate</strong></th>
            <th style="text-align: center"><strong>Amount</strong></th>
		</tr><tr>
            <td style="text-align: center">&nbsp;</td>
            <td style="text-align: center">&nbsp;</td>
            <td style="text-align: center">&nbsp;</td>
            <td style="text-align: center">&nbsp;</td>
            <td style="text-align: center">&nbsp;</td>
            <td style="text-align: center">&nbsp;</td>
			<td style="text-align: center">&nbsp;</td>
            <td style="text-align: center">&nbsp;</td>
		</tr>
		<tr>
            <td style="text-align: center">&nbsp;</td>
            <td style="text-align: center">&nbsp;</td>
            <td style="text-align: center">&nbsp;</td>
            <td style="text-align: center">&nbsp;</td>
            <td style="text-align: center">&nbsp;</td>
            <td style="text-align: center">&nbsp;</td>
			<td style="text-align: center">&nbsp;</td>
            <td style="text-align: center">&nbsp;</td>
		</tr>
		<tr>
            <td style="text-align: center" colspan="2"><strong>Total</strong></td>
            <td style="text-align: center">&nbsp;</td>
            <td style="text-align: center">&nbsp;</td>
            <td style="text-align: center">&nbsp;</td>
            <td style="text-align: center">&nbsp;</td>
			<td style="text-align: center">&nbsp;</td>
            <td style="text-align: center">&nbsp;</td>
		</tr>
		      </table>
			  
</div>
<div class="col-xs-12 nopadding">

    <table border='1' align='center' width="100%" bordercolor='#000000'
           style='border-collapse:collapse;border-right: hidden;border-left: hidden;border-top: hidden;border-bottom: hidden;font-size: 12px;' >

        <tr style="border-bottom: hidden">
            <td width="45%" style="padding-left: 5px;"><strong>Our Bank Details</strong></td>

            <td width="30%" align="center" style="font-size: 12px;"></td>
        </tr>
        <tr style="border-bottom: hidden">
            <td style="padding-left: 5px;">Account Name: Kinjal Autochem India, <br>Bank name &#45; Union Bank of India</td>

            <td align="center"> <span style="font-weight: bold;font-size: 16px;">For, KINJAL AUTOCHEM INDIA</span></td>
        </tr>
        <tr style="border-bottom: hidden">
            <td style="padding-left: 5px;">Branch &#45; Bhosari Branch</td>

            <td></td>
        </tr>
        <tr style="border-bottom: hidden">
            <td style="padding-left: 5px;">A/c No. &#45; 672001010050426</td>

            <td></td>
        </tr>
        <tr style="border-bottom: hidden">
            <td style="padding-left: 5px;">IFSC Code &#45; UBIN0567205 </td>

            <td align="center"></strong></td>
        </tr>
        <tr style="border-bottom: hidden">
            <td style="padding-left: 5px;"><strong>Declaration: </strong></td>

            <td align="center"></td>
        </tr>
        <tr style="border-bottom: hidden">
            <td style="padding-left: 5px;"><p style="font-size: 12px;">
                    1. We declare that this invoice shows the actual price of goods described and has
                    all particulars are true and correct.<br>
                    2. Goods once sold cannot be taken back.<br>
                    3. If credit days is more than 30 then 18% interest will be applied.<br>
                    4. All disputes are subject to Pimpri Chinchwad jurisdiction only.<br>
					5. Terms Of Delivery: <?php echo $terms; ?> 
                </p></td>

            <td align="center"><strong>Authorised Signatory</strong></td>
        </tr>
    </table>

</div>
</div>
</div>
<div class="col-xs-12">


    <p align="center" style='margin-bottom:1px;margin-top:10px;'><input id="bprint" type="button" name="Submit"
                                                                        onclick="printing();" value="Print"/>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input id="close" type="button" name="close" onclick="close123();" value="Close"/>
    </p>
</div>


<?php } ?>