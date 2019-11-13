<?php
$page = 'onlineorder';
include 'connection.php';
include 'header.php';
include 'sidebar.php';
$orderno = $_REQUEST['orderno'];
$date = date("Y-m-d");


$invoiceno =0;
// echo "SELECT invoiceno FROM oniline_invoice ORDER BY invoiceno DESC";
$select = mysql_query("SELECT invoiceno FROM online_invoice ORDER BY invoiceno DESC");
$row = mysql_fetch_array($select);
$invoiceno1 = $row['invoiceno'];
$invoiceno = $invoiceno1 + 1;

$time = date("H:i:s"); 
$month = date("m");
$year = date("y");
$year1 = $year + 1;
$challan = $invoiceno."/".$month."/".$year."-".$year1;
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
        document.form1.action = "onlineorder.php";
        document.form1.submit();    // Submit the page
        return true;
	}


    function dispatchorder(orderno)
	{
        var type = $("#saletype1").val();
        var dispatch = $("#dispatch").val();

        if(dispatch == ''){
            alert("Please Select Dispatch");
            return false;
        }
        document.getElementById("Submit").disabled = true;
        document.form1.action = "saveinvoice.php";
        document.form1.submit();    // Submit the page
        return true;
		// if(type == 'abc')
		// {
		// 	alert("Please Select Bill type");
        //     return false;
		// }
       
        // if(type == 'estimation')
        // {
        //     document.getElementById("Submit").disabled = true;
        //     document.form1.action = "saveestimation.php";
        //     document.form1.submit();    // Submit the page
        //     return true;
        // } 

		// if(type == 'invoice')
        // {
            // document.getElementById("Submit").disabled = true;
            // document.form1.action = "saveinvoice.php";
            // document.form1.submit();    // Submit the page
            // return true;
        // }
	}


    function display(dispatch)
    {
        if(dispatch=='courier'){
            
            document.getElementById("label1").style.display = 'block';
            document.getElementById("couriername").style.display = 'block';
            document.getElementById("label2").style.display = 'none';
            document.getElementById("transportername").style.display = 'none';
        
        }else if(dispatch=='transport'){
            
            document.getElementById("label2").style.display = 'block';
            document.getElementById("transportername").style.display = 'block';
            document.getElementById("label1").style.display = 'none';
            document.getElementById("couriername").style.display = 'none';
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
                        <h1>Online Order Details</h1>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-header with-border">
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
                        <?php
                                // echo $orderno;
                                // echo "SELECT * FROM onlineorder WHERE 'orderno' = $orderno GROUP BY orderno ORDER by date ASC, orderno ASC";
                                $result = mysql_query("SELECT * FROM onlineorder WHERE orderno='$orderno'");
                                $count = 0;
                                $totalbillamt =0;
                                $totaldeposit = 0;
                                $totalwithdraw =0;
                                $row=mysql_fetch_array($result);
                                
                                    $count = $count +1;
                                    $date1 = date("d-m-Y",strtotime($row['date']));
                                    // $orderno = $row['orderno'];
                                    $name = $row['name'].' '.$row['lname'];
                                    $address = $row['address'];
                                    $land = $row['landmark'];
                                    $city = $row['city'];
                                    $pin = $row['pin'];
                                    $contact = $row['contact'];
                                    $state = $row['state'];
                                    if($city != '')
                                    {	$add = $address."<br>City : ".$city."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pincode : ".$pin;	}
                                    else
                                    {	$add = $address."<br>Pincode : ".$pin;	}
                                    
                                    ?>

                            <tr>
                                <td><label>P.O. No</label></td>
                                <td style="padding-bottom: 15px"><input type="text" name="orderno" style="width: 150px"  class="form-control" id="orderno" value="<?php echo $orderno; ?>">
                                <!-- <input type="hidden" name="orderno1" style="width: 150px"  class="form-control" id="orderno1" value="<?php echo $orderno;?>"></td></td> -->
                                <td><label>P.O. Date</label></td>
                                <td  style="padding-bottom: 15px"><input type="text" style="width: 150px" required class="form-control" value="<?php  echo $date1; ?>" name="orderdate" id="orderdate" style="width: 277px;" readonly></td>
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
                                    <select style="width: 150px; margin-bottom: 15px" class="form-control" name="dispatch" id="dispatch" onchange="display(this.value);">
                                        <option value="" >Select Dispatch </option>
                                        <option value="office" <?php if($dispatch== 'office'){echo 'selected';}?>> Office </option>
                                        <option value="door delivery" <?php if($dispatch== 'door delivery'){echo 'selected';}?>> Door Delivery </option>
                                        <option value="transport" <?php if($dispatch== 'transport'){echo 'selected';}?>> Transport </option>
                                        <option value="courier" <?php if($dispatch== 'courier'){echo 'selected';}?>> Courier </option>                          
                                    </select>
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

                                    <tr>
                                        <td>Name :</td>
                                        <td  style="padding-bottom: 10px;padding-top: 10px;">
                                            <input type="text" required class="form-control" value="<?php  echo $name; ?>" name="name" id="name" style="width: 277px;" readonly>
                                            <!-- <input type="hidden"  value="<?php  echo $orderno; ?>" name="name" id="name" style="width: 277px;" readonly> -->
                                        </td>
                        
                                        <td style="padding-bottom: 10px;padding-top: 10px;">Contact:</td>
                                        <td colspan="1" style="padding-bottom: 10px;padding-top: 10px;">
                                            <input type="text" required class="form-control" value="<?php  echo $contact; ?>" name="contact" id="contact" style="width: 277px;" readonly>
                                        </td>
                                    </tr> 
                                    <tr>
                                        <td style="padding-bottom: 10px;padding-top: 10px;">City:</td>
                                            <td style="padding-bottom: 10px;padding-top: 10px;">
                                            <input type="text" required class="form-control" value="<?php  echo $city; ?>" name="city" id="city" style="width: 277px;" readonly>
                                        </td>
                                        <td>Address :</td>
                                        <td colspan="1" style="padding-bottom: 10px;padding-top: 10px;">
                                            <textarea class="form-control" required id="address" name="address" readonly><?php  echo $address; ?></textarea>
                                        </td>
                                    </tr> 
                                    <tr>
                                        <td style="padding-bottom: 10px;padding-top: 10px;">Landmark:</td>
                                            <td style="padding-bottom: 10px;padding-top: 10px;">
                                            <input type="text" required class="form-control" value="<?php  echo $land; ?>" name="land" id="land" style="width: 277px;" readonly>
                                        </td>
                                        <td> Pin :</td>
                                        <td colspan="1" style="padding-bottom: 10px;padding-top: 10px;">
                                            <input type="text" required class="form-control" value="<?php  echo $pin; ?>" name="pin" id="pin" style="width: 277px;" readonly>
                                            <!-- <input type="hidden"  value="<?php  echo $orderno; ?>" name="cat" id="cat" style="width: 277px;" readonly> -->
                                        </td>
                                    </tr> 
                                    <tr>
                                        <td style="padding-bottom: 10px;padding-top: 10px;">State:</td>
                                            <td style="padding-bottom: 10px;padding-top: 10px;">
                                            <input type="text" required class="form-control" value="<?php  echo $state; ?>" name="state" id="state" style="width: 277px;" readonly>
                                        </td>
                                    </tr>
                                    <tr>
                                    <td align="center" id="td-<?php echo $orderno;?>" colspan="6">
                                        <label style="margin: 10px 0px 0px 30px;" align="left"><strong><u> Order Details </u></strong></label><br>
                                    </tr>  
                                        <table border="1" id="table-<?php echo $orderno;?>" align="center" style="width:80%; margin-top: 20px;">
                                            <tr>
                                                <th align="center">Sr No</th>
                                                <th align="center">Product</th>
                                                <th align="center">Size</th>
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
                                                <td align="left" style="padding: 5px;"><?php echo $size ?></td>
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
                                        <table width="90%" align="center" style="border: hidden; margin: 10px;" >
                                            <tr >
                                                <td align="right" style="border-right:hidden"><input type="button" id="Submit" value="Submit" style="height:50px; width:100px" onclick="dispatchorder()"/></td>
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
 