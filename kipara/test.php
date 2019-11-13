<?php
//Start session
session_start();

//Include database connection details
require_once('connection.php');
//<!-- start: Header -->
date_default_timezone_set('Asia/Calcutta');

$uname=$_SESSION['Username'];
$upass=$_SESSION['Password'];
$urole=$_SESSION['Role'];
$un=$_SESSION['Name'];

//$uregion=$_SESSION['region'];
//$qry1="SELECT * FROM frenchise";
//$result1=mysql_query($qry1);

$qry="SELECT * FROM frenchise WHERE username='$uname' AND password='$upass'";
$result1=mysql_query($qry);
$row1 = mysql_fetch_array($result1);
$fcode = $row1['ownercode'];


$qry1="SELECT * FROM sales WHERE f_code='$fcode'";
$result5=mysql_query($qry1);
$row5 = mysql_fetch_array($result5);
$salescode = $row5['ownercode'];



//$qry1="SELECT * FROM subfrenchise";
//$result=mysql_query($qry1);
//if($result1) {
//if(mysql_num_rows($result1) > 0) {
//Login Successful
//session_regenerate_id();





//Function to sanitize values received from the form. Prevents SQL injection
function clean($str)
{
    $str = @trim($str);
    if (get_magic_quotes_gpc()) {
        $str = stripslashes($str);
    }
    return mysql_real_escape_string($str);
}

$fdate = $_POST['fdate'];
$tdate = $_POST['tdate'];


$d = date('d-m-Y', strtotime($fdate));
$dd = date('d-m-Y', strtotime($tdate));


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!--
        ===
        This comment should NOT be removed.

        Charisma v2.0.0

        Copyright 2012-2014 Muhammad Usman
        Licensed under the Apache License v2.0
        http://www.apache.org/licenses/LICENSE-2.0

        http://usman.it
        http://twitter.com/halalit_usman
        ===
    -->
    <meta charset="utf-8">
    <title>Report</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Charisma, a fully featured, responsive, HTML5, Bootstrap admin template.">
    <meta name="author" content="Muhammad Usman">

    <!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- The fav icon -->
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
            window.print();
            //Set the print button to 'visible' again
            //[Delete this line if you want it to stay hidden after printing]
            printButton.style.visibility = 'visible';
            close.style.visibility = 'visible';
            printButton1.style.visibility = 'visible';
            close1.style.visibility = 'visible';
        }

        function close123() {
//            window.close();
            window.location = 'tallyreportdatewise.php';
        }

    </script>
</head>
<body>

<table width="100%">
    <tbody>
    <tr>
        <?php include "address.php" ?>


    </tr>
    </tbody>
</table>
<br/>
<table width="100%">
    <tr>
        <td width="30%" style="font-size: 16px;"><strong>Tally Report Date Wise</strong></td>

        <td width="30%" style="font-size: 16px;"><b> From Date: </b> <?php echo $d; ?></td>
        <td style="font-size: 16px;"> <b> To Date: </b> <?php echo $dd; ?></td>
        <td><input id="bprint" type="button" name="Submit" onclick="printing();" value="Print"/>
            <input id="close" type="button" name="close" onclick="close123();" value="Back"/></td>
    </tr>

</table>
<table border="1" align="center" style="border-collapse:collapse;" width="100%">
    <?php

    $date_from = strtotime($fdate); // Convert date to a UNIX timestamp

    // Specify the end date. This date can be any English textual format

    $date_to = strtotime($tdate); // Convert date to a UNIX timestamp

    // Loop from the start date to end date and output all dates inbetween
    for ($i=$date_from; $i<=$date_to; $i+=86400) {
    $date = date("Y-m-d", $i);
    $date1 = date("d-m-Y", $i);

        $select = mysql_query("SELECT * FROM manual WHERE date = '$date'");
        $selectrow = mysql_fetch_array($select);
        $s_code = $selectrow['s_code'];

        $select1 = mysql_query("SELECT * FROM sales WHERE ownercode='$s_code'");
        $selectrow1 = mysql_fetch_array($select1);
        $ownername1 = $selectrow1['ownername'];
        ?>


        <tr style="height: 25px;">
            <td colspan="13" style="padding-left: 10px;"><strong>Date : <?php echo $date1; ?> &nbsp;&nbsp;&nbsp;Manual Report Given By <?php echo ucfirst($ownername1);?></strong></td>
        </tr>
        <tr>
            <td width="5%" style="padding-left: 10px;"><strong></strong></td>
            <td width="10%" align="left" style="padding-left: 10px;"><strong>Opening Balance</strong></td>
            <td width="10%" align="left" style="padding-left: 10px;"><strong>Sale In Cash</strong></td>
            <td width="10%" align="left" style="padding-left: 10px;"><strong>Sale In Card</strong></td>
            <td width="10%" align="left" style="padding-left: 10px;"><strong>Sale In Paytm</strong></td>
            <td width="10%" align="left" style="padding-left: 10px;"><strong>Sale In Cash(Third Party)</strong></td>
            <td width="10%" align="left" style="padding-left: 10px;"><strong>Sale In Card(Third Party)</strong></td>
            <td width="10%" align="left" style="padding-left: 10px;"><strong>Sale In Online(Third Party)</strong></td>
            <td width="10%" align="left" style="padding-left: 10px;"><strong>Added Amt</strong></td>
            <td width="10%" align="left" style="padding-left: 10px;"><strong>Removed Amt</strong></td>
            <td width="10%" align="left" style="padding-left: 10px;"><strong>Cash In Drawer</strong></td>
        </tr>
        <?php
        $selectamt = mysql_query("SELECT opbalance FROM openingbalance WHERE f_code='$fcode' AND date='$date'");
        $rowamt = mysql_fetch_array($selectamt);
        $cashamt = $rowamt['opbalance'];

        $tsale =0;
        $selectsale = mysql_query("SELECT totalaftertax FROM dispatch WHERE f_code='$fcode' AND saletype='' AND paymentMode='Cash' AND date = '$date' GROUP BY dispatch_no");
        while($rowsale = mysql_fetch_array($selectsale)) {
            $saleamt = $rowsale['totalaftertax'];
            $tsale = $tsale + $saleamt;
        }

        $tsale1 =0;
        $selectsale1 = mysql_query("SELECT totalaftertax FROM dispatch WHERE f_code='$fcode' AND saletype='' AND paymentMode='Card' AND date = '$date' GROUP BY dispatch_no");
        while($rowsale1 = mysql_fetch_array($selectsale1)) {
            $saleamt1 = $rowsale1['totalaftertax'];
            $tsale1 = $tsale1 + $saleamt1;
        }

        $tsale3 =0;
        $selectsale3 = mysql_query("SELECT totalaftertax FROM dispatch WHERE f_code='$fcode' AND saletype != '' AND paymentMode='Cash' AND date = '$date' GROUP BY dispatch_no");
        while($rowsale3 = mysql_fetch_array($selectsale3)) {
            $saleamt3 = $rowsale3['totalaftertax'];
            $tsale3 = $tsale3 + $saleamt3;
        }

        $tsale4 =0;
        $selectsale4 = mysql_query("SELECT totalaftertax FROM dispatch WHERE f_code='$fcode' AND saletype != '' AND paymentMode='Card' AND date = '$date' GROUP BY dispatch_no");
        while($rowsale4 = mysql_fetch_array($selectsale4)) {
            $saleamt4 = $rowsale4['totalaftertax'];
            $tsale4 = $tsale4 + $saleamt4;
        }

        $tsale2 = 0;
        $selectsale2 = mysql_query("SELECT totalaftertax FROM dispatch WHERE f_code='$fcode' AND paymentMode='Paytm' AND date = '$date' GROUP BY dispatch_no");
        while($rowsale2 = mysql_fetch_array($selectsale2)) {
            $saleamt2 = $rowsale2['totalaftertax'];
            $tsale2 = $tsale2 + $saleamt2;
        }

        $tsale5 = 0;
        $selectsale5 = mysql_query("SELECT totalaftertax FROM dispatch WHERE f_code='$fcode' AND paymentMode='Online' AND date = '$date' GROUP BY dispatch_no");
        while($rowsale5 = mysql_fetch_array($selectsale5)) {
            $saleamt5 = $rowsale5['totalaftertax'];
            $tsale5 = $tsale5 + $saleamt5;
        }

        $tdeposite = 0;
        $result2 = mysql_query("SELECT deposit FROM activity WHERE date='$date' AND f_code='$fcode'");
        while($row2  = mysql_fetch_array($result2)) {
           $deposit = $row2['deposit'];
           $tdeposite = $tdeposite + $deposit;
        }

        $twithdraw = 0;
        $result3 = mysql_query("SELECT withdraw FROM activity WHERE date='$date' AND f_code='$fcode'");
        while($row3  = mysql_fetch_array($result3)) {
            $withdraw = $row3['withdraw'];
            $twithdraw = $twithdraw + $withdraw;

        }

        ?>
            <tr>
                <td width="10%" style="padding-left: 10px;">System Report</td>
                <td width="10%" style="padding-left: 10px;"><?php echo $cashamt;?></td>
                <td width="10%" style="padding-left: 10px;"><?php echo $tsale;?></td>
                <td width="10%" style="padding-left: 10px;"><?php echo $tsale1;?></td>
                <td width="10%" style="padding-left: 10px;"><?php echo $tsale2;?></td>
                <td width="10%" style="padding-left: 10px;"><?php echo $tsale3;?></td>
                <td width="10%" style="padding-left: 10px;"><?php echo $tsale4;?></td>
                <td width="10%" style="padding-left: 10px;"><?php echo $tsale5;?></td>
                <td width="10%" style="padding-left: 10px;"><?php echo $tdeposite;?></td>
                <td width="10%" style="padding-left: 10px;"><?php echo $twithdraw;?></td>
                <?php
                $result = mysql_query("SELECT * FROM ((SELECT activity.date, activity.time, activity.activity,'-' AS dispatch_no,'-' AS totalaftertax,activity.deposit,activity.withdraw,activity.s_code,activity.f_code FROM activity) UNION ALL (SELECT dispatch.date,dispatch.time,'Bill' AS activity,dispatch.dispatch_no,dispatch.totalaftertax,'0' AS deposit,'0' AS withdraw,dispatch.s_code,dispatch.f_code FROM dispatch WHERE dispatch.paymentMode = 'Cash' GROUP BY dispatch.dispatch_no)) results where date = '$date' AND f_code='$fcode' ORDER BY time ASC");
                $count = 0;
                $finalbillamt =0;
                $finaldeposit =0;
                $finalwithdraw =0;
                while($row=mysql_fetch_array($result)) {
                    $count = $count + 1;
                    $billamount = $row['totalaftertax'];
                    $deposit = $row['deposit'];
                    $withdraw = $row['withdraw'];

                    $finalbillamt = $finalbillamt + $billamount;
                    $finaldeposit = $finaldeposit + $deposit;
                    $finalwithdraw = $finalwithdraw + $withdraw;

                    $selectamt = mysql_query("SELECT opbalance FROM openingbalance WHERE date='$date' AND f_code='$fcode'");
                    $rowamt = mysql_fetch_array($selectamt);
                    $cashamt = $rowamt['opbalance'];

                }
                $totalcash = $finalbillamt + $finaldeposit + $cashamt;
                $totalcash1 = $totalcash - $finalwithdraw;
                ?>
                <td width="10%" style="padding-left: 10px;"><?php echo $totalcash1;?></td>
             </tr>
        <?php
        $select = mysql_query("SELECT * FROM manual WHERE date = '$date'");
        $selectrow = mysql_fetch_array($select);
        $cashamount = $selectrow['cashamt'];
        $cardamount = $selectrow['cardamt'];
        $addamt = $selectrow['addamt'];
        $paytmamount = $selectrow['paytm'];
        $removeamount = $selectrow['removeamount'];
        $removeamt = $selectrow['removeamt'];
        $removeamount1 = $removeamount + $removeamt;
        $totalamount = $cashamount+$addamt+$cashamt;
        $totalamount1 = $totalamount - $removeamount1;
        $s_code = $selectrow['s_code'];

        $select1 = mysql_query("SELECT * FROM sales WHERE ownercode='$s_code'");
        $selectrow1 = mysql_fetch_array($select1);
        $ownername1 = $selectrow1['ownername'];

        $tcashamount = $selectrow['tcashamt'];
        $tcardamount = $selectrow['tcardamt'];
        $tonlineamount = $selectrow['tonlineamt'];
        ?>
           <tr>
            <td width="10%" style="padding-left: 10px;">Manual Report</td>
            <td width="10%" style="padding-left: 10px;"><?php echo $cashamt;?></td>
            <td width="10%" style="padding-left: 10px;"><?php echo $cashamount;?></td>
            <td width="10%" style="padding-left: 10px;"><?php echo $cardamount;?></td>
            <td width="10%" style="padding-left: 10px;"><?php echo $paytmamount;?></td>
            <td width="10%" style="padding-left: 10px;"><?php echo $tcashamount;?></td>
            <td width="10%" style="padding-left: 10px;"><?php echo $tcardamount;?></td>
             <td width="10%" style="padding-left: 10px;"><?php echo $tonlineamount;?></td>
            <td width="10%" style="padding-left: 10px;"><?php echo $addamt;?></td>
            <td width="10%" style="padding-left: 10px;"><?php echo $removeamount1;?></td>
            <td width="10%" style="padding-left: 10px;"><?php echo $totalamount1;?></td>
           </tr>
        <?php
        $diffcashdrawer =0;
        $diffincard =0;
        $diffincash= 0;
        $diffinpaytm =0;
        $diffinadd =0;
        $diffinremove =0;
        $diffincash = $tsale - $cashamount;
        $diffincard = $tsale1 - $cardamount;
        $diffinpaytm = $tsale2 - $paytmamount;
        $diffinadd = $tdeposite - $addamt;
        $diffinremove = $twithdraw - $removeamount1;
        $diffcashdrawer = $totalcash1 - $totalamount1;
        $diffincash1 = $tsale3 - $tcashamount;
        $diffincard1 = $tsale4 - $tcardamount;
        $diffinonline = $tsale5 - $tonlineamount;
        if($diffincash < 0)
        {
          $diffincash = $diffincash * -1;
          $diffincashsign = '+'.$diffincash;
         } 
        else{
       $diffincashsign = '-'.$diffincash;
        if($diffincash == 0)
        {
            $diffincashsign = 0;
        } 
        }

        if($diffincard < 0)
        {
          $diffincard = $diffincard * -1;
          $diffincardsign = '+'.$diffincard;
         } 
        else{
       $diffincardsign = '-'.$diffincard;
       if($diffincard == 0)
       {
           $diffincardsign = 0;
       } 
        }

        if($diffinpaytm < 0)
        {
          $diffinpaytm = $diffinpaytm * -1;
          $diffinpaytmsign = '+'.$diffinpaytm;
         } 
        else{
       $diffinpaytmsign = '-'.$diffinpaytm;
       if($diffinpaytm == 0)
       {
           $diffinpaytmsign = 0;
       } 
        }

        if($diffinadd < 0)
        {
          $diffinadd = $diffinadd * -1;
          $diffinaddsign = '+'.$diffinadd;
         } 
        else{
       $diffinaddsign = '-'.$diffinadd;
       if($diffinadd == 0)
       {
           $diffinaddsign = 0;
       } 
        }

        if($diffinremove < 0)
        {
          $diffinremove = $diffinremove * -1;
          $diffinremovesign = '+'.$diffinremove;
         } 
        else{
       $diffinremovesign = '-'.$diffinremove;
       if($diffinremove == 0)
       {
           $diffinremovesign = 0;
       } 
        }

        if($diffcashdrawer < 0)
        {
          $diffcashdrawer = $diffcashdrawer * -1;
          $diffincashdrawersign = '+'.$diffcashdrawer;
         } 
        else{
       $diffincashdrawersign = '-'.$diffcashdrawer;
       if($diffcashdrawer == 0)
       {
           $diffincashdrawersign = 0;
       } 
        }

        if($diffincash1 < 0)
        {
          $diffincash1 = $diffincash1 * -1;
          $diffincash1sign = '+'.$diffincash1;
         } 
        else{
       $diffincash1sign = '-'.$diffincash1;
       if($diffincash1 == 0)
       {
           $diffincash1sign = 0;
       } 
        }

        if($diffincard1 < 0)
        {
          $diffincard1 = $diffincard1 * -1;
          $diffincard1sign = '+'.$diffincard1;
         } 
        else{
       $diffincard1sign = '-'.$diffincard1;
       if($diffincard1 == 0)
       {
           $diffincard1sign = 0;
       }
        }
       
        if($diffinonline < 0)
        {
          $diffinonline = $diffinonline * -1;
          $diffinonlinesign = '+'.$diffinonline;
         } 
        else{
       $diffinonlinesign = '-'.$diffinonline;
       if($diffinonline == 0)
       {
           $diffinonlinesign = 0;
       }
        }

       
        ?>
            <tr>
                <td width="10%" style="padding-left: 10px;">Difference</td>
                <td width="10%" style="padding-left: 10px;"></td>
                <td width="10%" style="padding-left: 10px;"><?php echo $diffincashsign;?></td>
                <td width="10%" style="padding-left: 10px;"><?php  echo $diffincardsign;?></td>
                <td width="10%" style="padding-left: 10px;"><?php  echo $diffinpaytmsign;?></td>
                <td width="10%" style="padding-left: 10px;"><?php  echo $diffincash1sign;?></td>
                <td width="10%" style="padding-left: 10px;"><?php echo $diffincard1sign;?></td>
                <td width="10%" style="padding-left: 10px;"><?php  echo $diffinonline1sign;?></td>
                <td width="10%" style="padding-left: 10px;"><?php echo $diffinaddsign;?></td>
                <td width="10%" style="padding-left: 10px;"><?php echo $diffinremovesign;?></td>
                <td width="10%" style="padding-left: 10px;"><?php echo $diffincashdrawersign;?></td>
            </tr>
    <?php } ?>

</table>

<br/>
<br>

<p style="text-align: center;"><input id="bprint1" type="button" name="Submit" onclick="printing();" value="Print"/>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input id="close1" type="button" name="close" onclick="close123();" value="Back"/>
</p>
</body>
</html>
