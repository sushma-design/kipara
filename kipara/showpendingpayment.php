<?php
$page = 'pendinginvoice';
include 'connection.php';
include 'header.php';
include 'sidebar.php';
$orderno = $_REQUEST['orderno'];
$date = date("Y-m-d");
?>

<script>
   	function openrow(id)
	{
		$("#row-"+id).css("display","table-row");
		$("#td-"+id).attr('colspan',6);
		$("#table-"+id).css('width','80%');
	}
	
	function closerow(id)
	{
		document.getElementById("close").disabled = true;
        document.form1.action = "pendinginvoice.php";
        document.form1.submit();    // Submit the page
        return true;
	}
	
    function isNumberKey(evt)
    {
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode != 46 && charCode > 31
            && (charCode < 48 || charCode > 57))
            return false;

        return true;
    }

    function acceptpayment()
	{
        var pay = $("#paymentmode").val();
        var givenamt = $("#givenamt").val();

        if(pay == '')
        {
            alert("Please Select Payment Mode");
            return false;
        }
        if(givenamt == '')
        {
            alert("Please Enter Given Amount");
            return false;
        }


		document.getElementById("Submit").disabled = true;
        document.form1.action = "acceptorder.php";
        document.form1.submit();    // Submit the page
        return true;
	} 

    function checkmode()
    {
        var paymentmode = $("#paymentmode").val();

        if(paymentmode == 'cheque')
        {
            document.getElementById("cheque").style.display = 'block';
            document.getElementById("chequelabel").style.display = 'block';
            document.getElementById("chequedate1").style.display = 'block';
            document.getElementById("chequedate").style.display = 'block';
            document.getElementById("bankname1").style.display = 'block';
            document.getElementById("bankname").style.display = 'block';
            document.getElementById("batchnumber").style.display = 'none';
            document.getElementById("batchnumber1").style.display = 'none';
            document.getElementById("cardtype").style.display = 'none';
            document.getElementById("cardtype1").style.display = 'none';

        }
        else if(paymentmode == 'card')
        {
            document.getElementById("cardtype").style.display = 'block';
            document.getElementById("cardtype1").style.display = 'block';
            document.getElementById("batchnumber").style.display = 'block';
            document.getElementById("batchnumber1").style.display = 'block';
            document.getElementById("cheque").style.display = 'none';
            document.getElementById("chequelabel").style.display = 'none';
            document.getElementById("chequedate1").style.display = 'none';
            document.getElementById("chequedate").style.display = 'none';
            document.getElementById("bankname1").style.display = 'none';
            document.getElementById("bankname").style.display = 'none';

        }
       
        else{

            document.getElementById("batchnumber").style.display = 'none';
            document.getElementById("batchnumber1").style.display = 'none';
            document.getElementById("cheque").style.display = 'none';
            document.getElementById("chequelabel").style.display = 'none';
            document.getElementById("chequedate1").style.display = 'none';
            document.getElementById("chequedate").style.display = 'none';
            document.getElementById("bankname1").style.display = 'none';
            document.getElementById("bankname").style.display = 'none';
            document.getElementById("cardtype").style.display = 'none';
            document.getElementById("cardtype1").style.display = 'none';
        }
    }
</script>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
        <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-danger" style="padding: 0px 0px 20px 20px;">
                    <div class="box-header">
                        <h1>Pending Payment Details</h1>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-header with-border">
                    <?php
                                $result = mysql_query("SELECT * FROM online_invoice WHERE orderno='$orderno'");
                                $row=mysql_fetch_array($result);
                                
                                $date1 = date("d-m-Y",strtotime($row['date']));
                                $invoiceno = $row['invoiceno'];
                                $challan = $row['note'];
                                $dispatch = $row['dispatch'];
                                $terms = $row['terms'];
                                    

                                $result = mysql_query("SELECT * FROM onlineorder WHERE orderno='$orderno'");
                                $count = 0;
                            
                                $row=mysql_fetch_array($result);
                                $count = $count +1;
                                // $date = date("d-m-Y",strtotime($row['date']));
                                $name = $row['name'].' '.$row['lname'];
                                $address = $row['address'];
                                $land = $row['landmark'];
                                $city = $row['city'];
                                $pin = $row['pin'];
                                $contact = $row['contact'];
                                if($city != '')
                                    {	$add = $address."<br>City : ".$city."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pincode : ".$pin;	}
                                    else
                                    {	$add = $address."<br>Pincode : ".$pin;	}
                    ?>
                    <form name="form1" id="form1" method="post">
                        <table id="myTable" width="80%" class="" style ="margin-bottom:20px;">
                            <tr>
                                <td><label>Date</label></td>
                                <td><input type="date" name="date" style="width: 150px"  class="form-control" id="date" value="<?php echo $date;?>"><input type="hidden" name="pdate" class="form-control" id="date" value="<?php echo $date;?>"></td>
                                <td><label>Invoice No</label></td>
                                <td><input type="text" name="invoicenno" style="width: 150px"  class="form-control" id="invoicenno" value="<?php echo $invoiceno;?>" readonly>
                                <!-- <input type="hidden" name="contactname2" style="width: 150px"  class="form-control" id="contactname2" value="<?php echo $contactcode;?>"></td> -->
                            </tr>
                        </table>
						        
                        <table id="myTable1" width="80%" class="" style ="margin-bottom:20px;">
                            <tbody>
                                <tr>
                                    <td><label>P.O. No</label></td>
                                    <td style="padding-bottom: 15px"><input type="text" name="orderno" style="width: 150px"  class="form-control" id="orderno" value="<?php echo $orderno; ?>">
                                    <!-- <input type="hidden" name="orderno1" style="width: 150px"  class="form-control" id="orderno1" value="<?php echo $orderno;?>"></td></td> -->
                                    <td><label>P.O. Date</label></td>
                                    <td  style="padding-bottom: 15px"><input type="text" style="width: 150px" required class="form-control" value="<?php  echo $date; ?>" name="orderdate" id="orderdate" style="width: 277px;" readonly></td>
                                </tr>
                                <tr>
                                    <td><label>Delivery Challan </label></td>
                                    <td style="padding-bottom: 15px"><input type="text" name="note" style="width: 150px"  class="form-control" id="note" value="<?php echo $challan;?>"></td>
                                    <td><label>Terms Of Delivery</label></td>
                                    <td style="padding-bottom: 15px"><input type="text" name="terms" style="width: 150px"  class="form-control" id="terms" value="2 to 3 days"></td>
                                </tr>
                                <tr>
                                    <td><label>Dispatch Through</label></td>
                                    <td> 
                                    <input style="width: 150px; margin-bottom: 15px" class="form-control" name="dispatch" id="dispatch" value="<?php echo $dispatch;?>">
                                    </td>
                                    <td style="display:none" id="label2"><label>Transporter Name</label></td>
                                    <td><input type="text" name="transportername" class="form-control"  style="width: 150px; display:none"  id="transportername" value="<?php echo $transportername;?>"></td>
                                </tr>
                                <tr>
                                    <!-- <td><label>Invoice No.</label></td>
                                    <td><input type="text" name="invoiceno" class="form-control"  style="width: 150px"  id="invoiceno" onkeypress="return isNumber(event);" value="<?php echo $invoiceno;?>"></td> -->
                                    <td style="display:none" id="label1"><label>Courier Name</label></td>
                                    <td><input type="text" name="couriername" class="form-control"  style="width: 150px; display:none"  id="couriername" value="<?php echo $couriername;?>"></td> 
                                </tr>
                            </tbody>
                        </table>
                
                    
                        <table style="width:80%;">
                            <tbody>
                                <tr>
                                    <td>Name :</td>
                                    <td  style="padding-bottom: 10px;padding-top: 10px;">
                                        <input type="text" required class="form-control" value="<?php  echo $name; ?>" name="name" id="name" style="width: 277px;" readonly>
                                        <!-- <input type="hidden"  value="<?php  echo $orderno; ?>" name="name" id="name" style="width: 277px;" readonly> -->
                                    </td>
                        
                                    <td style="padding-bottom: 10px;padding-top: 10px;">Contact:</td>
                                    <td colspan="2" style="padding-bottom: 10px;padding-top: 10px;">
                                        <input type="text" required class="form-control" value="<?php  echo $contact; ?>" name="contact" id="contact" style="width: 277px;" readonly>
                                    </td>
                                </tr> 
                                <tr>
                                    <td style="padding-bottom: 10px;padding-top: 10px;">City:</td>
                                    <td style="padding-bottom: 10px;padding-top: 10px;">
                                        <input type="text" required class="form-control" value="<?php  echo $city; ?>" name="city" id="city" style="width: 277px;" readonly>
                                    </td>
                                    <td>Address :</td>
                                    <td colspan="2" style="padding-bottom: 10px;padding-top: 10px;">
                                        <textarea class="form-control" required id="address" name="address" readonly><?php  echo $address; ?></textarea>
                                    </td>
                                </tr> 
                                <tr>
                                    <td style="padding-bottom: 10px;padding-top: 10px;">Landmark:</td>
                                    <td style="padding-bottom: 10px;padding-top: 10px;">
                                        <input type="text" required class="form-control" value="<?php  echo $land; ?>" name="land" id="land" style="width: 277px;" readonly>
                                    </td>
                                    <td> Pin :</td>
                                    <td colspan="2" style="padding-bottom: 10px;padding-top: 10px;">
                                        <input type="text" required class="form-control" value="<?php  echo $pin; ?>" name="pin" id="pin" style="width: 277px;" readonly>
                                        <!-- <input type="hidden"  value="<?php  echo $orderno; ?>" name="cat" id="cat" style="width: 277px;" readonly> -->
                                    </td>
                                </tr> 
                                   
                                <tr>
                                    <td align="center" id="td-<?php echo $orderno;?>" colspan="6">
                                    <label style="margin: 10px 0px 0px 30px;" align="left"><strong><u> Order Details </u></strong></label><br>
                                        
                                    <table border="1" id="table-<?php echo $orderno;?>" align="center" style="width:80%; margin-top: 20px;">
                                        <tr>
                                            <th align="center">Sr No</th>
                                            <th align="center">Product</th>
                                            <th align='center'>Size</th>
                                            <th align="center">Quantity</th>
                                            <th align="center">Price</th>
                                            <th align="center">Total</th>
                                        </tr>
                                        <?php 
                                                $result1 = mysql_query("SELECT * FROM onlineorder WHERE orderno='$orderno'");
                                                $grandtot = 0;
                                                while($row1 = mysql_fetch_array($result1))
                                                {
                                                    $slno = $row1['slno'];
                                                    $item = $row1['item'];
                                                    $qty = $row1['qty'];
                                                    $price = $row1['price'];
                                                    $size = $row1['size'];
                                                    $total = $qty * $price;
                                                    $grandtot = $grandtot + $total;
                                                    
                                        ?>	
                                            
                                        <tr>
                                            <td align="center" style="padding: 5px;"><?php echo $slno; ?></td>
                                            <td align="left" style="padding: 5px;"><?php echo $item; ?></td>
                                            <td align="center" style="padding: 5px;"><?php echo $size; ?></td>
                                            <td align="center" style="padding: 5px;"><?php echo $qty; ?></td>
                                            <td align="right" style="padding: 5px;"><?php echo $price; ?></td>
                                            <td align="right" style="padding: 5px;"><?php echo $total; ?></td>
                                        </tr>										
                                        <?php	}	?>
                                        <tr>
                                            <td align="right" style="padding-right:10px;" colspan="5"><strong> Total </strong></td>
                                             <td align="right" style="padding: 5px;"><?php echo $grandtot; ?></td>
                                        </tr>
                                    </table> 
                                    <table style="border: hidden; margin: 15px;" >
                                        <tr>
                                            <td style="text-align: right" colspan="" align="right">
                                                <strong>Payment Mode</strong>
                                            </td>
                                            <td style="padding-bottom:10px;" colspan="2">
                                                <select class="form-control" name="paymentmode" id="paymentmode" onchange="checkmode();">
                                                    <option value=''>--Select Payment Mode--</option>
                                                    <option value="cash"> Paid In Cash </option>
                                                    <option value="card"> Card </option>
                                                    <option value="cheque"> Cheque </option>
                                                    <option value="paytm"> Paytm </option>
                                                    <option value="neft"> NEFT </option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td  style="text-align: right" colspan="">
                                                <strong id="chequelabel" style="display: none">Cheque Number</strong>
                                                <strong id="batchnumber1" style="display: none">Batch No</strong>
                                            </td>
                                            <td  style="padding-bottom:10px; text-align: right"  colspan="">
                                                <input type="text" style="width: 100px;text-align: right;display: none" class="form-control" onkeypress="return isNumber(event);" name="cheque" id="cheque" value="">
                                                <input type="text" style="width: 100px;text-align: right;display: none" class="form-control" onkeypress="return isNumber(event);" name="batchnumber" id="batchnumber" value="">
                                                </td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td  style="text-align: right" colspan="">
                                                <strong id="chequedate1" style="display: none">Cheque Date</strong>
                                                <strong id="cardtype1" style="display: none">Card Type</strong>
                                            </td>
                                            <td style="padding-bottom:10px; text-align: right"  colspan="2">
                                                <input type="date" style="padding-bottom:10px; display: none" class="form-control" name="chequedate" id="chequedate" value="">
                                                <select class="form-control" style="display:none" name="cardtype" id="cardtype">
                                                    <option value="">Select Card Type</option>
                                                    <option value="visa"> Visa </option>
                                                    <option value="mastercard"> MasterCard </option>
                                                    <option value="rupay"> Rupay </option>
                                                    <option value="creditcard"> Credit Card </option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td  style="text-align: right" colspan="">
                                                <strong id="bankname1" style="display: none">Bank Name</strong>
                                            </td>
                                            <td  style="padding-bottom:10px; text-align: right"  colspan="">
                                                <input type="text" style="width: 100px;text-align: right;display: none" class="form-control" name="bankname" id="bankname" value="">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="1" style="text-align:right; padding-right:10px;">
                                                <strong id="givenamt1">Paid Amount</strong>
                                            </td>
                                            <td>
                                                <input type="text" style="padding-top:10px; width: 100px;text-align: right;" class="form-control" name="givenamt" id="givenamt" value="0" onkeypress="return isNumberKey(event);" autocomplete="off">
                                            </td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td align="right" style="border-right:hidden"><input type="button" id="Submit" value="Submit" style="height:50px; width:100px" onclick="acceptpayment()"/></td>
                                            <td align="left" style="padding: 5px;"><input type="button" id="close" value="Close" style="height:50px; width:100px" onclick="closerow(<?php echo $orderno;?>)"/></td>
                                        </tr>
                                    </table> 
                                    <input type="hidden" name="counter" id="counter" value="1">
                                </td>
                            </tr>
                             
                            </tbody>
                            </table>
                        </form>
                    </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>

<?php

include 'footer.php';
?>
 