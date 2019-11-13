<?php
$page = 'partner';
include 'connection.php';
include 'header.php';
include 'sidebar.php';

?>



<div class="content-wrapper">
    <!-- Content Header (Page header) -->
        <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-danger" style="padding: 0px 0px 20px 20px;">
                    <div class="box-header">
                        <h1>Request For Partner</h1>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-header with-border">
                        <table id="example2" class="table table-bordered table-hover">

                            <tr>
                                <th style="text-align:center">Sr.No</th>
                                <th style="text-align:center">Date</th>
                                <th style="text-align:center">Name</th>
                                <th style="text-align:center">Email</th>
                                <th style="text-align:center">Contact</th>
                                <th style="text-align:center">Message</th>
                            </tr>
                            <?php
                            $result1 = "SELECT * FROM resume ";
                            $result = mysql_query($result1);
                            $count =0;

                            while($row=mysql_fetch_array($result))
                            {
                                $count = $count + 1;
                                $date = $row['date'];
                                $name = $row['name'];
                                $email = $row['email'];
                                $contact = $row['contact'];
                                $message = $row['message'];
                                //$var1 = $row ['filepath'];
                                //echo $var1;



                                ?>

                                <tr>
                                    <td style="text-align:center"><?php echo $count;?></td>
                                    <td style="text-align:center"><?php echo $date;?></td>
                                    <td style="text-align:center"><?php echo $name;?></td>
                                    <td style="text-align:center"><?php echo $email;?></td>
                                    <td style="text-align:center"><?php echo $contact;?></td>
                                    <td style="text-align:center"><?php echo $message;?></td>
                                </tr>
                            <?php   }
                            ?>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->


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
 