<?php

date_default_timezone_set("Asia/Kolkata");
include "connection.php";

$counter = $_POST['counter'];
$orderno = $_REQUEST['orderno'];

$time = date("H:i:s"); 
$month = date("m");
$year = date("y");
$year1 = $year + 1;
$date = date("Y-m-d");


$counter = $_POST['counter'];
$orderdate = date("d-m-Y",strtotime($_POST['orderdate']));
// $orderno = $row['orderno'];
$name = $_POST['name'].' '.$_POST['lname'];
$address = $_POST['address'];
$land = $_POST['land'];
$city = $_POST['city'];
$pin = $_POST['pin'];
$state = $_POST['state'];
$contact = $_POST['contact'];
$challan = $_POST['note'];
$terms = $_POST['terms'];
$invoicenno = $_POST['invoicenno'];
// $paymentmode = $_POST['paymentmode'];
$dispatch = $_POST['dispatch'];
$transportername = $_POST['transportername'];
$couriername = $_POST['couriername'];
// echo "<pre>";print_r($_POST);die;

$words = explode(" ", $name);
$acronym = "";
foreach ($words as $w) {
    $acronym .= $w[0];
}
$ccode = substr($acronym, 0, 2); 

$ccodeno = 0;
$select = mysql_query("SELECT ccodeno FROM onlineorder ORDER BY ccodeno DESC");
$row = mysql_fetch_array($select);
$ccodeno1 = $row['ccodeno'];
$ccodeno = $ccodeno1 + 1;
$contactcode = strtoupper($ccode) . '0' . $ccodeno;
$ccode = strtoupper($ccode);

$destination = $address.$land.$city;
// $invoiceno =0;
// $select = mysql_query("SELECT invoiceno FROM online_invoice ORDER BY invoiceno DESC");
// $row = mysql_fetch_array($select);
// $invoiceno1 = $row['invoiceno'];
// $invoiceno2 = $invoiceno1 + 1; 

$invoiceno = $invoicenno."/".$month."/".$year."-".$year1;

        $count =0;
        $orderno = $_POST['orderno'];
        // echo "SELECT * FROM onlineorder WHERE orderno='$orderno'";
        $result1 = mysql_query("SELECT * FROM onlineorder WHERE orderno='$orderno'");
        
        while($row1 = mysql_fetch_array($result1))
        {
            $slno = $row1['slno'];
            $item = $row1['item'];
            $qty = $row1['qty'];
            $price = $row1['price'];
            $finaltotal = $row1['finaltotal'];
            $date1= $row1['date'];
            $count=$count+1;                                              
            //   echo "<pre>";print_r($row1); die;                                                             
            $total = $qty * $price;
            $grandtot = $grandtot + $total;
        
        // echo "INSERT INTO `onlineorder` (`contactcode`,`ccode`,`ccodeno`) VALUES ('$contactcode','$ccode','$ccodeno')";die;
    // $insert1 = "INSERT INTO `onlineorder` (`contactcode`,`ccode`,`ccodeno`) VALUES ('$contactcode','$ccode','$ccodeno')";
    // $result1 = mysql_query($insert1);
    for($i=0;$i<$counter;$i++)
    {
    // echo "INSERT INTO `online_invoice`(`invoiceno`,`invoiceno1`,`contactcode`, `slno`, `date`,`time`, `orderno`,`orderdate`, `dispatch`, `destination`,`transportername`,`couriername`, `note`,`terms`,`category`, `item`,`itemname`,`qty`,`rate`,`total`) VALUES
    // ('$invoicenno','$invoiceno','$contactcode','$slno','$date','$time','$orderno','$date1','$dispatch','$destination','$transportername','$couriername','$challan','$terms','$category','$itemid','$item','$qty','$price','$total')";
    $insert = "INSERT INTO `online_invoice`(`invoiceno`,`invoiceno1`,`contactcode`, `slno`, `date`,`time`, `orderno`,`orderdate`, `dispatch`, `destination`,`transportername`,`couriername`, `note`,`terms`,`category`, `item`,`itemname`,`qty`,`rate`,`total`,`finaltotal`) VALUES
    ('$invoicenno','$invoiceno','$contactcode','$slno','$date','$time','$orderno','$date1','$dispatch','$destination','$transportername','$couriername','$challan','$terms','$category','$itemid','$item','$qty','$price','$total','$finaltotal')";
    $result = mysql_query($insert);
    }
}
// echo "UPDATE onlineorder SET status='completed' WHERE orderno='$orderno'";
$update = mysql_query("UPDATE onlineorder SET status='completed' WHERE orderno='$orderno'");

$contactname1 = str_replace(' ', '%20', $company);
// $msg = "Hi%20".$contactname1."%20Thanks%20For%20Purchasing%20With%20Kipara.%20Your%20Total%20Bill%20Rs.%20".$finaltotal."%20With%20Bill%20Number%20".$estimationno."%20Has%20been%20processed%20successfully.%20Visit%20us%20on%20http://www.kipara.in";

// $url = "http://bulksmsindia.mobi/sendurlcomma.aspx?user=20079344&pwd=20079344321&senderid=Kipara&mobileno=".$mobile."&msgtext=".$msg;
// $ch = curl_init($url);
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// $curl_scraped_page = curl_exec($ch);
// curl_close($ch);


// $msg1 = "The customer with name ".$contactname1." Has purchased products from shop of total Bill Rs.".$finaltotal." With Bill Number ".$estimationno." Date ".$date." Time ".$time;
// $msg2 = str_replace(' ', '%20', $msg1);
// $url = "http://bulksmsindia.mobi/sendurlcomma.aspx?user=20079344&pwd=20079344321&senderid=Kipara&mobileno=9766595564&msgtext=".$msg2;
// $ch = curl_init($url);
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// $curl_scraped_page = curl_exec($ch);
// curl_close($ch);


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
        window.location = 'onlineorder.php';
    }

</script>
</br>
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<div class="container col-sm-12">
    <div class="col-xs-12 nopadding" style="border-top: 1px solid #000000;border-right: 1px solid #000000;border-left: 1px solid #000000; border-bottom: 1px solid #000000;">
        <div class="col-xs-12 nopadding">
            <table class="printTable" width="100%" style="" height="180">
                <tbody>
                    <tr height="25">
                        <td style="border-bottom: 1px solid" colspan="4" align="center">TAX INVOICE [ORIGINAL]</td>
                    </tr>
                    <tr>
                        <td width="30%" style="" align="left">
                        <img src="kiparanewlogo.png">
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
                        
                            <label style="font-size: 14px;padding-left: 5px;">INVOICE NO : <?php echo $invoiceno; ?></label> <br/>
                            <label style="font-size: 14px;padding-left: 5px;">Delivery Challan : <?php echo $challan?> </label> <br/>
                            <label style="font-size: 14px;padding-left: 5px;">Date : <?php echo date("d-m-Y",strtotime($date));?> &nbsp; &nbsp; Time: <?php echo $time; ?> </label><br/>
                            <!-- <label style="font-size: 14px;padding-left: 5px;">Mode Of Payment : <?php echo ucfirst($paymentmode);?> </label><br/> -->
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
                        <label style="font-size: 14px;padding-left: 5px;">Buyer: &nbsp;&nbsp;<?php echo $name ;?></label>
                    </td>
                    <td style="border-bottom: hidden;" width="30%">
                        <label style="font-size: 14px;padding-left: 5px;" colspan="2">Dispatch Through: <?php echo ucfirst($dispatch);?></label> 
                    </td>
                </tr>
                <tr>
                    <td style="border-bottom: hidden;border-right: 1px solid #000000" width="40%">
                        <label style="font-size: 14px;padding-left: 5px;">Address: <?php echo $address;?>, <?php echo $city;?></label>
                    </td>
                    <td style="border-bottom: hidden;" width="30%" colspan="2">
                        <label style="font-size: 14px;padding-left: 5px;">Destination : <?php echo $destination;?></label>
                    </td>
                </tr>
                <tr>
                    <td style="border-bottom: hidden;border-right: 1px solid #000000" width="40%">
                        <label style="font-size: 14px;padding-left: 5px;">Pin: <?php echo $pin;?></label>
                    </td>
                    <td style="border-bottom: hidden;border-left: 1px solid #000000" width="40%">
                    <label style="font-size: 14px;padding-left: 5px;">Pin: <?php echo $pin;?></label>
                        <label style="font-size: 14px;padding-left: 5px;">State: <?php echo $state;?></label>
                    </td>
                </tr>
                <tr>
                    <td style="border-bottom: hidden;border-right: 1px solid #000000" width="40%"></td>
                    <td style="border-bottom: hidden;" width="30%" colspan="2">
                        <label style="font-size: 14px;padding-left: 5px;">
                            <?php
                                if($dispatch =='courier')
                                {
                                    echo "Courier Name: ".$couriername;
                                }else if($dispatch =='transport')
                                {
                                    echo "Transpoter Name: ".$transportername;
                                }
                            ?>
                        </label>
                    </td>   
                </tr>
                <tr>
                    <td style="border-bottom: hidden;border-right: 1px solid #000000" width="40%">
                        <label style="font-size: 14px;padding-left: 5px;">Mobile No. : <?php echo $contact;?></label>
                    </td>
                    <td style="border-bottom: hidden;" width="30%">
                        <label style="font-size: 14px;padding-left: 5px;"> P.O No: <?php echo $orderno; ?></label> </td>
                    <td style="border-bottom: hidden;" width="34%">
                    </td>
                </tr>
                <tr>
                    <td style="border-right: 1px solid #000000" width="33%">
                    <label style="font-size: 14px;padding-left: 5px;">Place Of Supply : <?php echo $city;?></label>
                    </td>
                    <td style="" width="30%" >
                        <label style="font-size: 14px;padding-left: 5px;"> P.O. Date: <?php echo date("d-m-Y",strtotime($orderdate))?></td>
                        <td style="" width="30%" >
                        
                </tr>
                
                </tbody>
            </table>
        </div>
        <div class="col-xs-12 nopadding">
            <table border='1' width='100%' height="300" align='center' bordercolor='#000000'
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
                <tr height="25"></tr>
                <?php
                    $count =0;
                    $orderno = $_POST['orderno'];
                    // echo "SELECT * FROM onlineorder WHERE orderno='$orderno'";
                    $result1 = mysql_query("SELECT * FROM onlineorder WHERE orderno='$orderno'");
                    
                    while($row1 = mysql_fetch_array($result1))
                    {
                        $slno = $row1['slno'];
                        $item = $row1['item'];
                        $hsn = $row1['hsn'];
                        $unit = $row1['unit'];
                        $qty = $row1['qty'];
                        $price = $row1['price'];
                        $finaltotal = $row1['finaltotal'];
                        $count=$count+1;                                              
                        //   echo "<pre>";print_r($row1); die;                                                             
                        $total = $qty * $price;
                        $grandtot = $grandtot + $total;
                
                    ?>
                    <tr style="border-bottom:hidden;" height="15px;!important">
                        <td align="center"><label style="padding-top: 3px;"><?php echo $count; ?></label></td>
                        <td><label style="padding-top: 3px;padding-left: 10px;"><?php echo $item;  ?></label></td>
                        <td align="center"><label style="padding-top: 3px;padding-left: 10px;"><?php echo $hsn;?></label></td>
                        <td align="center"><label style="padding-top: 3px;padding-left: 10px;">NILL</label></td>
                        <td align="center"><label style="padding-top: 3px;padding-left: 10px;"><?php echo ucfirst($unit);?></label></td>
                        <td align="center"><label style="padding-top: 3px;"><?php echo $qty; ?></label></td>
                        <td align="right"><label style="padding-top: 3px; padding-right:10px;"><?php echo $price; ?></label></td>
                        <td align="right"><label style="padding-top: 3px; padding-right:10px;"><?php echo $total; ?></label></td>
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
               
                <tr height="25px;">
                    <td colspan="7" style="border-right: 1px solid #000000;text-align: right; padding-right:10px;"><strong>Total</strong></td>
                    <td align="right" style="padding-right: 10px;"><strong><input type="text" name ="Net_Total" id= "Net_Total" value="<?php echo round($finaltotal);?>" style="border:hidden; text-align: right;"></strong></td>
                </tr>
                <tr height="15px;!important">
                    <td colspan="88" style="" rowspan="2">
                        <strong>
                            <span style="font-size: 12px;padding-left: 5px;">Total Invoice Value (In words) : </span>
                            <span id="container3" style="font-size:12px;font-weight:bold;padding-left: 5px;"></span><span style="font-size: 12px;">Only</span>
                        </strong>
                    </td>
                </tr>
                <tr height="15px;!important"></tr>
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
                        1. We declare that this invoice shows the actual price of goods described and has all particulars are true and correct.<br>
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
            <table class="printTable" width="100%" style="" height="180">
                <tbody>
                    <tr height="25">
                        <td style="border-bottom: 1px solid" colspan="4" align="center">TAX INVOICE [DUPLICATE]</td>
                    </tr>
                    <tr>
                        <td width="30%" style="" align="left">
                        <img src="kiparanewlogo.png">
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
                        
                            <label style="font-size: 14px;padding-left: 5px;">INVOICE NO : <?php echo $invoiceno; ?></label> <br/>
                            <label style="font-size: 14px;padding-left: 5px;">Delivery Challan : <?php echo $challan?> </label> <br/>
                            <label style="font-size: 14px;padding-left: 5px;">Date : <?php echo date("d-m-Y",strtotime($date));?> &nbsp; &nbsp; Time: <?php echo $time; ?> </label><br/>
                            <!-- <label style="font-size: 14px;padding-left: 5px;">Mode Of Payment : <?php echo ucfirst($paymentmode);?> </label><br/> -->
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
                        <label style="font-size: 14px;padding-left: 5px;">Buyer: &nbsp;&nbsp;<?php echo $name ;?></label>
                    </td>
                    <td style="border-bottom: hidden;" width="30%">
                        <label style="font-size: 14px;padding-left: 5px;" colspan="2">Dispatch Through: <?php echo ucfirst($dispatch);?></label> 
                    </td>
                </tr>
                <tr>
                    <td style="border-bottom: hidden;border-right: 1px solid #000000" width="40%">
                        <label style="font-size: 14px;padding-left: 5px;">Address: <?php echo $address;?>, <?php echo $city;?></label>
                    </td>
                    <td style="border-bottom: hidden;" width="30%" colspan="2">
                        <label style="font-size: 14px;padding-left: 5px;">Destination : <?php echo $destination;?></label>
                    </td>
                </tr>
                <tr>
                    <td style="border-bottom: hidden;border-right: 1px solid #000000" width="40%">
                        <label style="font-size: 14px;padding-left: 5px;">Pin: <?php echo $pin;?></label>
                    </td>
                    <td style="border-bottom: hidden;border-left: 1px solid #000000" width="40%">
                    <label style="font-size: 14px;padding-left: 5px;">Pin: <?php echo $pin;?></label>
                        <label style="font-size: 14px;padding-left: 5px;">State: <?php echo $state;?></label>
                    </td>
                </tr>
                <tr>
                    <td style="border-bottom: hidden;border-right: 1px solid #000000" width="40%"></td>
                    <td style="border-bottom: hidden;" width="30%" colspan="2">
                        <label style="font-size: 14px;padding-left: 5px;">
                            <?php
                                if($dispatch =='courier')
                                {
                                    echo "Courier Name: ".$couriername;
                                }else if($dispatch =='transport')
                                {
                                    echo "Transpoter Name: ".$transportername;
                                }
                            ?>
                        </label>
                    </td>   
                </tr>
                <tr>
                    <td style="border-bottom: hidden;border-right: 1px solid #000000" width="40%">
                        <label style="font-size: 14px;padding-left: 5px;">Mobile No. : <?php echo $contact;?></label>
                    </td>
                    <td style="border-bottom: hidden;" width="30%">
                        <label style="font-size: 14px;padding-left: 5px;"> P.O No: <?php echo $orderno; ?></label> </td>
                    <td style="border-bottom: hidden;" width="34%">
                    </td>
                </tr>
                <tr>
                    <td style="border-right: 1px solid #000000" width="33%">
                    <label style="font-size: 14px;padding-left: 5px;">Place Of Supply : <?php echo $city;?></label>
                    </td>
                    <td style="" width="30%" >
                        <label style="font-size: 14px;padding-left: 5px;"> P.O. Date: <?php echo date("d-m-Y",strtotime($orderdate))?></td>
                        <td style="" width="30%" >
                        
                </tr>
                
                </tbody>
            </table>
        </div>
        <div class="col-xs-12 nopadding">
            <table border='1' width='100%' height="300" align='center' bordercolor='#000000'
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
                <tr height="25"></tr>
                <?php
                    $count =0;
                    $orderno = $_POST['orderno'];
                    // echo "SELECT * FROM onlineorder WHERE orderno='$orderno'";
                    $result1 = mysql_query("SELECT * FROM onlineorder WHERE orderno='$orderno'");
                    
                    while($row1 = mysql_fetch_array($result1))
                    {
                        $slno = $row1['slno'];
                        $item = $row1['item'];
                        $qty = $row1['qty'];
                        $price = $row1['price'];
                        $count=$count+1;                                              
                        //   echo "<pre>";print_r($row1); die;                                                             
                        $total = $qty * $price;
                        $grandtot = $grandtot + $total;
                
                    ?>
                    <tr style="border-bottom:hidden;" height="15px;!important">
                        <td align="center"><label style="padding-top: 3px;"><?php echo $count; ?></label></td>
                        <td><label style="padding-top: 3px;padding-left: 10px;"><?php echo $item;  ?></label></td>
                        <td align="center"><label style="padding-top: 3px;padding-left: 10px;"><?php echo $hsn;?></label></td>
                        <td align="center"><label style="padding-top: 3px;padding-left: 10px;">NILL</label></td>
                        <td align="center"><label style="padding-top: 3px;padding-left: 10px;"><?php echo ucfirst($unit);?></label></td>
                        <td align="center"><label style="padding-top: 3px;"><?php echo $qty; ?></label></td>
                        <td align="right"><label style="padding-top: 3px; padding-right:10px;"><?php echo $price; ?></label></td>
                        <td align="right"><label style="padding-top: 3px; padding-right:10px;"><?php echo $total; ?></label></td>
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
               
                <tr height="25px;">
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
                <tr height="15px;!important"></tr>
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
                        1. We declare that this invoice shows the actual price of goods described and has all particulars are true and correct.<br>
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
            <table class="printTable" width="100%" style="" height="180">
                <tbody>
                    <tr height="25">
                        <td style="border-bottom: 1px solid" colspan="4" align="center">TAX INVOICE [TRIPLICATE]</td>
                    </tr>
                    <tr>
                        <td width="30%" style="" align="left">
                        <img src="kiparanewlogo.png">
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
                        
                            <label style="font-size: 14px;padding-left: 5px;">INVOICE NO : <?php echo $invoiceno; ?></label> <br/>
                            <label style="font-size: 14px;padding-left: 5px;">Delivery Challan : <?php echo $challan?> </label> <br/>
                            <label style="font-size: 14px;padding-left: 5px;">Date : <?php echo date("d-m-Y",strtotime($date));?> &nbsp; &nbsp; Time: <?php echo $time; ?> </label><br/>
                            <!-- <label style="font-size: 14px;padding-left: 5px;">Mode Of Payment : <?php echo ucfirst($paymentmode);?> </label><br/> -->
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
                        <label style="font-size: 14px;padding-left: 5px;">Buyer: &nbsp;&nbsp;<?php echo $name ;?></label>
                    </td>
                    <td style="border-bottom: hidden;" width="30%">
                        <label style="font-size: 14px;padding-left: 5px;" colspan="2">Dispatch Through: <?php echo ucfirst($dispatch);?></label> 
                    </td>
                </tr>
                <tr>
                    <td style="border-bottom: hidden;border-right: 1px solid #000000" width="40%">
                        <label style="font-size: 14px;padding-left: 5px;">Address: <?php echo $address;?>, <?php echo $city;?></label>
                    </td>
                    <td style="border-bottom: hidden;" width="30%" colspan="2">
                        <label style="font-size: 14px;padding-left: 5px;">Destination : <?php echo $destination;?></label>
                    </td>
                </tr>
                <tr>
                    <td style="border-bottom: hidden;border-right: 1px solid #000000" width="40%">
                        <label style="font-size: 14px;padding-left: 5px;">Pin: <?php echo $pin;?></label>
                    </td>
                    <td style="border-bottom: hidden;border-left: 1px solid #000000" width="40%">
                    <label style="font-size: 14px;padding-left: 5px;">Pin: <?php echo $pin;?></label>
                        <label style="font-size: 14px;padding-left: 5px;">State: <?php echo $state;?></label>
                    </td>
                </tr>
                <tr>
                    <td style="border-bottom: hidden;border-right: 1px solid #000000" width="40%"></td>
                    <td style="border-bottom: hidden;" width="30%" colspan="2">
                        <label style="font-size: 14px;padding-left: 5px;">
                            <?php
                                if($dispatch =='courier')
                                {
                                    echo "Courier Name: ".$couriername;
                                }else if($dispatch =='transport')
                                {
                                    echo "Transpoter Name: ".$transportername;
                                }
                            ?>
                        </label>
                    </td>   
                </tr>
                <tr>
                    <td style="border-bottom: hidden;border-right: 1px solid #000000" width="40%">
                        <label style="font-size: 14px;padding-left: 5px;">Mobile No. : <?php echo $contact;?></label>
                    </td>
                    <td style="border-bottom: hidden;" width="30%">
                        <label style="font-size: 14px;padding-left: 5px;"> P.O No: <?php echo $orderno; ?></label> </td>
                    <td style="border-bottom: hidden;" width="34%">
                    </td>
                </tr>
                <tr>
                    <td style="border-right: 1px solid #000000" width="33%">
                    <label style="font-size: 14px;padding-left: 5px;">Place Of Supply : <?php echo $city;?></label>
                    </td>
                    <td style="" width="30%" >
                        <label style="font-size: 14px;padding-left: 5px;"> P.O. Date: <?php echo date("d-m-Y",strtotime($orderdate))?></td>
                        <td style="" width="30%" >
                        
                </tr>
                
                </tbody>
            </table>
        </div>
        <div class="col-xs-12 nopadding">
            <table border='1' width='100%' height="300" align='center' bordercolor='#000000'
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
                <tr height="25"></tr>
                <?php
                    $count =0;
                    $orderno = $_POST['orderno'];
                    // echo "SELECT * FROM onlineorder WHERE orderno='$orderno'";
                    $result1 = mysql_query("SELECT * FROM onlineorder WHERE orderno='$orderno'");
                    
                    while($row1 = mysql_fetch_array($result1))
                    {
                        $slno = $row1['slno'];
                        $item = $row1['item'];
                        $qty = $row1['qty'];
                        $price = $row1['price'];
                        $count=$count+1;                                              
                        //   echo "<pre>";print_r($row1); die;                                                             
                        $total = $qty * $price;
                        $grandtot = $grandtot + $total;
                
                    ?>
                    <tr style="border-bottom:hidden;" height="15px;!important">
                        <td align="center"><label style="padding-top: 3px;"><?php echo $count; ?></label></td>
                        <td><label style="padding-top: 3px;padding-left: 10px;"><?php echo $item;  ?></label></td>
                        <td align="center"><label style="padding-top: 3px;padding-left: 10px;"><?php echo $hsn;?></label></td>
                        <td align="center"><label style="padding-top: 3px;padding-left: 10px;">NILL</label></td>
                        <td align="center"><label style="padding-top: 3px;padding-left: 10px;"><?php echo ucfirst($unit);?></label></td>
                        <td align="center"><label style="padding-top: 3px;"><?php echo $qty; ?></label></td>
                        <td align="right"><label style="padding-top: 3px; padding-right:10px;"><?php echo $price; ?></label></td>
                        <td align="right"><label style="padding-top: 3px; padding-right:10px;"><?php echo $total; ?></label></td>
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
               
                <tr height="25px;">
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
                <tr height="15px;!important"></tr>
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
                        1. We declare that this invoice shows the actual price of goods described and has all particulars are true and correct.<br>
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
    <p align="center" style='margin-bottom:1px;margin-top:10px;'><input id="bprint" type="button" name="Submit" onclick="printing();" value="Print"/>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input id="close" type="button" name="close" onclick="close123();" value="Close"/>
    </p>
</div>
