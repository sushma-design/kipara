<?php
include 'header.php';
$page = 'a1';
include 'sidebar.php';
include 'connection.php';
?>



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Dashboard
        <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
<!-- Small boxes (Stat box) -->
<div class="row">
<!--    <div class="col-lg-3 col-xs-6">-->
<!--        <!-- small box -->
<!--        <div class="small-box bg-aqua">-->
<!--            <div class="inner">-->
<!--                --><?php
////                    $query = "SELECT  COUNT(status) FROM jobentry Where status='pending' GROUP BY jobid";
////                    $execute = mysql_query($query);
////                   $pending= mysql_num_rows($execute);
//
//
//                ?>
<!---->
<!--                <h3>20</h3>-->
<!---->
<!--                <p>Pending Job</p>-->
<!--            </div>-->
<!--            <div class="icon">-->
<!--                <i class="ion-gear-b"></i>-->
<!--            </div>-->
<!--            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>-->
<!--        </div>-->
<!--    </div>-->
    <!-- ./col -->
    
    <div class="col-lg-4 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
            <div class="inner">

                <?php

                     $date=date("Y-m-d");
                      $month=date("m",strtotime($date));
					  $sum = 0;
                        $curPurchase = mysql_query("SELECT * FROM purchase Where month(date)='$month' group by purchaseno ");
						while($row1 = mysql_fetch_array($curPurchase)){
							$sumamt = $row1['grandtotal'];
							$sum = $sum + $sumamt;
						}
                ?>
                <h3><sup><i class="fa fa-inr" aria-hidden="true"></i></sup>  <?php echo $sum;?></h3>

                <p>Total Purchase</p>
            </div>
            <div class="icon">
                <i class="ion-ios-cart"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-4 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
            <div class="inner">
				<?php

                     $date=date("Y-m-d");
                      $month=date("m",strtotime($date));
					  $sum = 0; $sum1=0; $sum2=0;
                        $estim = mysql_query("SELECT * FROM estimation Where month(date)='$month' and status='completed' group by estnumber ");
						while($row = mysql_fetch_array($estim)){
							$sumamt = $row['grandtotal'];
							$sum = $sum + $sumamt;
						}
						$directb = mysql_query("SELECT * FROM directbilling Where month(date)='$month' group by dbnumber ");
						while($row1 = mysql_fetch_array($directb)){
							$sumamt = $row1['grandtotal'];
							$sum1 = $sum1 + $sumamt;
						}

                        $invoice = mysql_query("SELECT * FROM invoice Where month(date)='$month' and status='complete' group by invoicenumber");
                        while($row2 = mysql_fetch_array($invoice)){
                            $sumamt = $row2['grandtotal'];
                            $sum2 = $sum2 + $sumamt;
                        }

						$total = $sum + $sum1+ $sum2;
                ?>
                <h3><sup><i class="fa fa-inr" aria-hidden="true"></i></sup>  <?php echo $total; ?></h3>

                <p>Total Sale</p>
            </div>
            <div class="icon">
                <i class="ion-android-checkbox" ></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
	<div class="col-lg-4 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">

            <?php
//            $date=date("Y-m-d");
//            $month=date("m",strtotime($date));

            $esum = 0;
            $expenseQ = mysql_query("SELECT * FROM expenses WHERE month(date)='$month'");
            while($row = mysql_fetch_array($expenseQ)){
                $esumamt = $row['amount'];
                $esum = $esum + $esumamt;
            }

            $esum = 0;
            $expenseQ = mysql_query("SELECT * FROM expenses WHERE month(date)='$month'");
            while($row = mysql_fetch_array($expenseQ)){
                $esumamt = $row['amount'];
                $esum = $esum + $esumamt;
            }

            ?>

            <div class="inner">
                <h3><sup><i class="fa fa-inr" aria-hidden="true"></i></sup> <?php echo $esum; ?> </h3>
                <p>Total Expense</p>
            </div>



            <div class="icon">
                <i class="ion-ios-paperplane"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
</div>
<!-- /.row -->
<!-- Main row -->
<div class="row">
<!-- Left col -->
<section class="col-lg-7 connectedSortable">

<div class="box box-success">
    <div class="box-header">
		<h2 class="box-title">Purchase Graph</h2>
	</div>
	<div class="box-body" id="">
		<div class="chart-container" style="margin-top: 20px;">
			<canvas id="purchasechart" style=""></canvas>
		</div>
	</div>
</div>	

<div class="box box-success">
    <div class="box-header">
		<h2 class="box-title">Sales Graph</h2>
	</div>
	<div class="box-body" id="">
		<div class="chart-container" style="margin-top: 20px;">
			<canvas id="salechart" style=""></canvas>
		</div>
	</div>
</div>	



</section>
<!-- /.Left col -->
<!-- right col (We are only adding the ID to make the widgets sortable)-->
<section class="col-lg-5 connectedSortable">

    <!-- Map box -->
    <div class="box box-solid " style="height: 360px;">
        <div class="box-header">
            <!-- tools box -->
            <div class="pull-right box-tools">

                <button type="button" class="btn btn-primary btn-sm pull-right" data-widget="collapse" data-toggle="tooltip" title="Collapse" style="margin-right: 5px;">
                    <i class="fa fa-minus"></i></button>
            </div>
            <!-- /. tools -->

            <i class="fa fa-bars"></i>

            <h3 class="box-title" style="color: red">
                Production Alert List
            </h3>
        </div>
        <div class="box-body" style="height: 300px; overflow-y:auto">
            <table class="table">
                <tr>
                    <td>#</td>
                    <td>Type</td>
                    <td>Itemname</td>
                    <td>Stock</td>
                </tr>
            <?php
            $count = 1;
                $result11 = mysql_query("SELECT * FROM item WHERE totalstock <= stocklimit");

                    while ( $row11 = mysql_fetch_assoc($result11)) {
                        $itemname = $row11['itemname'];
                        $unit = $row11['unit'];
                        $category = $row11['itemsubcat'];

                        $result12 = mysql_query("SELECT * FROM subcategory WHERE id ='$category'");
                        $row12 = mysql_fetch_array($result12);
                        $catname = $row12['subcategory'];

                        $stock = $row11['totalstock'];

                            echo "<tr>";
                            echo "<td>$count</td>";
                           echo "<td>$catname</td>";
                            echo "<td>$itemname $unit</td>";
                            echo "<td>$stock</td>";
                            echo '</tr>';
                            $count = $count + 1;
                    }
            ?>


            </table>
        </div>
        <!-- /.box-body-->
        <div class="box-footer no-border">

        </div>
    </div>

</section>

    <section class="col-lg-5 connectedSortable">

        <!-- Map box -->
        <div class="box box-solid " style="height: 360px;">
            <div class="box-header">
                <!-- tools box -->
                <div class="pull-right box-tools">

                    <button type="button" class="btn btn-primary btn-sm pull-right" data-widget="collapse" data-toggle="tooltip" title="Collapse" style="margin-right: 5px;">
                        <i class="fa fa-minus"></i></button>
                </div>
                <!-- /. tools -->

                <i class="fa fa-bars"></i>

                <h3 class="box-title" style="color: red">
                  Raw Material Order List
                </h3>
            </div>
            <div class="box-body" style="height: 300px; overflow-y:auto">
                <table class="table">
                    <tr>
                        <td>#</td>
                        <td>Type</td>
                        <td>Itemname</td>
                        <td>Stock</td>
                    </tr>
                    <?php
                    $count = 1;
                    $result11 = mysql_query("SELECT * FROM raw_subcategory WHERE totalstock <= 20");

//                    while ( $row11 = mysql_fetch_assoc($result11)) {
//                        $itemname = $row11['itemname'];
//                        $unit = $row11['unit'];
//                        $category = $row11['itemsubcat'];
//
//                        $result12 = mysql_query("SELECT * FROM subcategory WHERE id ='$category'");
//                        $row12 = mysql_fetch_array($result12);
//                        $catname = $row12['subcategory'];
//
//                        $stock = $row11['totalstock'];
//
//                        echo "<tr>";
//                        echo "<td>$count</td>";
//                        echo "<td>$catname</td>";
//                        echo "<td>$itemname $unit</td>";
//                        echo "<td>$stock</td>";
//                        echo '</tr>';
//                        $count = $count + 1;
//                    }
                    ?>


                </table>
            </div>
            <!-- /.box-body-->
            <div class="box-footer no-border">

            </div>
        </div>

    </section>

</div>

</section>
</div>

<footer class="main-footer">

    <strong>Copyright &copy; 2017 <a href="http://insproit.com">InsproIT</a>.</strong> All rights
    reserved.
</footer>

</div>

<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>

<!-- Sparkline -->
<script src="plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>

<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script src="plugins/select2/select2.min.js"></script>

<script type="text/javascript" src="js/Chart.min.js"></script>
<script type="text/javascript" src="js/purchasegraph.js"></script>
<script type="text/javascript" src="js/salegraph.js"></script>