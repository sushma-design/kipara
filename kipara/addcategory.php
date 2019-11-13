<?php
include 'header.php';
$page = 'addcat';
include 'sidebar.php';
include 'connection.php';
?>

    <style type="text/css">
        table{
            width: 50%;
            margin: 20px 0px 20px 100px;
            border-collapse: collapse;

        }
        table, th, td{
            font-size: 20px;
        }
        table th, table td{
            padding: 10px;
            text-align: left;  }

        tr {
            font-size:23px  }
    </style>

    <!--    <script src="global/plugins/jquery.min.js" type="text/javascript"></script>-->
    <script>

        function submitform() {

            var itemSelect2 = $("#itemSelect").val();
//            var name2 = $("#itemname-"+j).val();

            if (itemSelect2 == 'notselected') {
                alert('Please Select Add Category!');
                return false;
            }
            else {
   
                document.form1.action = "savecategory.php";
                document.form1.submit();
            }
        }

        function add_cat() {
            var itemSelect= $("#itemSelect").val();
            $('#itemTable').html('');
            var result1 = '<tr><th style="font-size: 16px;">Sr.No.</th><th style="font-size: 16px;">Category</th></tr>';
            $("#itemTable").append(result1);

            for (var i = 1; i <= parseInt(itemSelect); i++) {
                var  result = '<tr >';
                result += '<td><input type="text" class="form-control"  value="'+i+'" style="width:45px;" readonly></td>';
                result += '<td><input type="text" class="form-control" name="itemcat[]" style="width:250px;"  id="itemcat-'+i+'" placeholder="Category"></td>';
                result += '<tr>';
                $("#itemTable").append(result);
            }
        }
    </script>


    <div class="content-wrapper">
        <section class="content">
            <div class="row">
                <div class="col-lg-12 col-xs-12">
                    <form role="form" method="post" name="form1" >
                        <div class="box box-danger"style="padding: 0px 0px 0px 20px;">
                            <div class="box-header">
                                <h2>Add Category</h2>
                            </div>
                            <table id="itemTable" >
                                <label class="control-label" style="float: left; margin: 20px 20px 0px 0px;">Select Number of Categories to Add:</label>
                                <select id="itemSelect" name="itemSelect" class="form-control" style="width:220px; margin-top: 20px;"    onchange="add_cat();"  >
                                    <option value="notselected">--------------Select----------------</option>
                                    <?php
                                    for ($i = 0; $i < 10; $i++) {
                                        $serial = $i + 1;
                                        echo "<option value='$serial'>$serial</option>";
                                    }
                                    ?>
                                </select>

                            </table>
                            <input type="button" name="btnSubmit" value="Submit" class="btn btn-primary" style="margin: 20px 0px 10px 39%; width: 100px" onclick="submitform();">


                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>

<?php include 'footer.php' ?>