<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<?php
$page = 'uploadexcel';
include "header.php"; ?>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <!-- Main Header -->

    <?php include "menu.php" ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <section class="content-header" >
            <h1>
                Upload Excel Files
            </h1>
        </section>
        <!-- Main content -->
        <section class="content" >
            <div class="col-md-12">
                <div class="box box-info">
                    <form id="upload_excel" enctype="multipart/form-data" method="post" action="uploadexcel_submit.php">
                        <div class="modal-body">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="selectcustomer">Upload File</label>
                                 <input type="file" name="file" id="file">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary pull-left">Submit</button>
                        </div>

                    </form>
                </div>
                <!-- /.col (left) -->

            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <!-- ./wrapper -->
    <?php include "footer.php"; ?>
</body>
</html>