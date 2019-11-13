<?php
$page = 'pendinginvoice';
include 'connection.php';
include 'header.php';
include 'sidebar.php';
// $orderno = $_REQUEST['orderno'];
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
   
</script>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
        <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-danger" style="padding: 0px 0px 20px 20px;">
                    <div class="box-header">
                        <h1> Pending Invoice List</h1>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-header with-border">
                    <form name="form1" id="form1" method="post">

                    <table class="table-bordered" width="100%" style="margin-top:20px;">
                        <thead style="background-color: #d3d3d3">
                        <th style="width: 5%; text-align: center;">Invoice No.</th>
                        <th style="width: 10%; text-align: center;">Date</th>
                        <th style="width: 20%; text-align: center;">Name</th>
                        <th style="width: 40%; text-align: center;">Address</th>
                        <th style="width: 10%; text-align: center;">Contact</th>
                        <th></th>
                        </thead>
                        <tbody>
                        <?php
                                                 

                            $result = mysql_query("SELECT * FROM online_invoice WHERE status='pending' GROUP BY invoiceno ORDER by date ASC");
                            $count = 0;
                        
                            while($row=mysql_fetch_array($result))
                            {
                                $count = $count +1;
                                $date = date("d-m-Y",strtotime($row['date']));
                                $orderno = $row['orderno'];
                                $invoiceno= $row['invoiceno'];
    
                                $result11 = mysql_query("SELECT * FROM onlineorder WHERE orderno='$orderno'");                        
                                $row11=mysql_fetch_array($result11);
                            
                                $name = $row11['name'].' '.$row['lname'];
                                $address = $row11['address'];
                                $land = $row11['landmark'];
                                $city = $row11['city'];
                                $pin = $row11['pin'];
                                $contact = $row11['contact'];
                                if($city != '')
                                    {	$add = $address."<br>City : ".$city."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pincode : ".$pin;	}
                                    else
                                    {	$add = $address."<br>Pincode : ".$pin;	}
    
                            ?>
                            <tr height="80px;">
                                <td align="center"><?php echo $invoiceno;?></td>
                                <td align="center"><?php echo $date;?></td>
                                <td align="left" style="padding-left:5px;"><?php echo $name;?></td>
                                <td align="left" style="padding-left:5px;" ><?php echo $add;?></td>
                                <td align="center"><?php echo $contact;?></td>
                                <td align="center"><a class="btn" href="showpendingpayment.php?orderno=<?php echo $orderno; ?>"><span>View Details</i></span></a></td>
                                <!-- <td align="center"><input type="button" id="view" value="View" style="height:50px; width:100px" onclick="openrow(<?php echo $orderno;?>)"/></td> -->
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
 