<?php
$page = 'pendingpayment';
include 'connection.php';
include 'header.php';
include 'sidebar.php';

?>

<script>
    function dispatchorder(id)
	{
		window.location = "savedispatchorder.php?id="+ encodeURIComponent(id);
	}
   	function openrow(id)
	{
		$("#row-"+id).css("display","table-row");
		$("#td-"+id).attr('colspan',6);
		$("#table-"+id).css('width','80%');
	}
	
	function closerow(id)
	{
		$("#row-"+id).css("display","none");
	}
	
		
	function acceptorder(orderno)
	{
		$.ajax({
                type: "POST",
                url : "acceptorder.php",
                dataType : 'json',
                data : {
                    orderno : orderno
                },
                success : function(data)
                {
                    alert("Payment Recieved Successfully...");
					window.location = "pendingpayment.php";
				}
			});	
	} 
    function vieworder(orderno) {
    // alert "hiiii";
        $.ajax({
        type: "POST",
        url: "get_order_details.php",
        dataType: "json",
        data: {
            orderno : orderno

        },
    success: function(data) {
        var name = data.name;
        var lname = data.lname;
        var contact = data.contact;
        var email = data.email;
        var address = data.address;
        var landmark = data.landmark;
        var state = data.state;
        var pin = data.pin;
        var orderno1 = data.orderno;


        $("#fname").val(name);
        $("#lname").val(lname);
        $("#contact").val(contact);
        $("#email").val(email);
        $("#address").val(address);
        $("#landmark").val(landmark);
        $("#state").val(state);
        $("#pin").val(pin);      
        $("#order").val(orderno1);

    }
});
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
                        <h1>Pending Estimation List</h1>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-header with-border">
                    <form name="form1" id="form1" method="post">

                    <table class="table-bordered" width="100%" style="margin-top:20px;">
                        <thead style="background-color: #d3d3d3">
                        <th style="width: 5%; text-align: center;">Order No.</th>
                        <th style="width: 10%; text-align: center;">Date</th>
                        <th style="width: 20%; text-align: center;">Name</th>
                        <th style="width: 40%; text-align: center;">Address</th>
                        <th style="width: 10%; text-align: center;">Contact</th>
                        <th></th>
                        </thead>
                        <tbody>
                        <?php
                        $result = mysql_query("SELECT * FROM onlineorder WHERE payment_status='pending' GROUP BY orderno ORDER by date ASC, orderno ASC");
                        $count = 0;
                        $totalbillamt =0;
                        $totaldeposit = 0;
                        $totalwithdraw =0;
                        while($row=mysql_fetch_array($result))
                        {
                            $count = $count +1;
                            $date = date("d-m-Y",strtotime($row['date']));
                            $orderno = $row['orderno'];
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
                        <tr height="80px;">
                            <td align="center"><?php echo $orderno;?></td>
                            <td align="center"><?php echo $date;?></td>
                            <td align="left" style="padding-left:5px;"><?php echo $name;?></td>
                            <td align="left" style="padding-left:5px;" ><?php echo $add;?></td>
                            <td align="center"><?php echo $contact;?></td>
                            <td align="center"><a class="btn" href="showpendingpayment.php?orderno=<?php echo $orderno; ?>"><span>View Details</i></span></a></td>
                            <!-- <td align="center"><input type="button" id="view" value="View" style="height:50px; width:100px" onclick="openrow(<?php echo $orderno;?>)"/></td> -->
                        </tr>
                        <?php 
                            if($count = mysql_num_rows($result))
                            { ?>
                        <tr height="" style="display:none; border-bottom: hidden" id="row-<?php echo $orderno;?>">	
                        <?php }else { ?>
                        <tr height="" style="display:none; " id="row-<?php echo $orderno;?>">
                        <?php } ?>
                            <td align="center" id="td-<?php echo $orderno;?>" colspan="6">
                                <label style="margin: 10px 0px 0px 30px;" align="left"><strong><u> Order Details </u></strong></label><br>
                                <table border="1" id="table-<?php echo $orderno;?>" align="center" style="width:80%; margin-top: 20px;">
                                    <tr>
                                        <th align="center">Sr No</th>
                                        <th align="center">Item</th>
                                        <th align="center">Qty</th>
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
                                            $total = $qty * $price;
                                            $grandtot = $grandtot + $total;
                                            
                                    ?>	
                                    
                                    <tr>
                                        <td align="center" style="padding: 5px;"><?php echo $slno; ?></td>
                                        <td align="left" style="padding: 5px;"><?php echo $item; ?></td>
                                        <td align="center" style="padding: 5px;"><?php echo $qty; ?></td>
                                        <td align="right" style="padding: 5px;"><?php echo $price; ?></td>
                                        <td align="right" style="padding: 5px;"><?php echo $total; ?></td>
                                    </tr>										
                                    <?php	}	?>
                                    <tr>
                                        <td align="right" style="padding-right:10px;" colspan="4"><strong> Total </strong></td>
                                        <td align="right" style="padding: 5px;"><?php echo $grandtot; ?></td>
                                    </tr>
                                    
                                </table> 
                                <table style="border: hidden; margin: 10px;" >
                                    <tr>
                                        <td align="right" style="border-right:hidden"><input type="button" id="dispatch" value="Recieve Payment" style="height:50px; width:150px" onclick="acceptorder(<?php echo $orderno;?>)"/></td>
                                        <!-- <td align="left" style="padding: 5px;border-right:hidden"><input type="button" id="cancel" value="Cancel" style="height:50px; width:100px" onclick="acceptorder(<?php echo $orderno;?>,2)"/></td> -->
                                        <td align="left" style="padding: 5px;"><input type="button" id="close" value="Close" style="height:50px; width:100px" onclick="closerow(<?php echo $orderno;?>)"/></td>
                                    </tr>
                                </table> 
                            </td>
                        </tr>
                        <?php } ?>
                        
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
 