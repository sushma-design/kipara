<?php
include 'header.php';
$page = 'deleteproduct';
include 'sidebar.php';
include 'connection.php';

?>
<!--    For Autocomplete   -->

<script src="dist/js/jquery-3.2.1.min.js" type="text/javascript"></script>

<style type="text/css">
    table{
        width: 100%;
        margin: 20px 0px 20px 5px;
        border-collapse: collapse;

    }
    table, th, td{
        font-size: 20px;
    }
    table th, table td{

        text-align: left;  }

    tr {
        font-size:23px  }
</style>


<script>
    function isNumber(evt) {
        evt = (evt) ? evt : window.event;
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            return false;
        }
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
    function getproductDetails()
    {
        var cat = $("#itemcat").val();
        // alert(itemcat);
        $.ajax({

            type : "POST",
            url : "getProductList.php",
            dataType : 'json',
            data : {
                category : cat
            },
            success: function(data)
            {
                // alert(data);
                //alert("hi");
                var length = data.length;
                // alert(length);

                var result = '<option value="">Select</option>';

                for (var i = 0; i < length; i++) 
                {
                    var productName = data[i].name;
                    var id = data[i].id;
                    var rate = data[i].rate;
                    if (typeof productName != "undefined") {
                        result += '<option value="' + id + '">';
                        result += '' + productName + '</option>';
                        result += '' + rate + '';
                    }
                }
                //alert(result);
                $("#product").html(result);
                $("#mainprise").html(result);
            }
        });
    }

    function getproductinfo()
    {
        var itemcat = $("#itemcat").val();
        // alert(itemcat);
        var product = $("#product").val();
        // alert(product);



        $.ajax({
            type : "POST",
            url : "getproductdetails.php",

            dataType : "json",
            data : {

                category : itemcat,
                product : product
            },
            success : function(data) {


                if (data) {

                    var pname = data.productname;
                    var mainprise = data.mainprise;
                    var scratchprise= data.scratchprise;
                    var description = data.description;


                    $("#pname").val(pname);
                    $("#mainprise").val(mainprise);
                    $("#scratchprise").val(scratchprise);
                    $("#description").val(description);


                }


            }

        });

    }

    function validation()
    {

        var itemcat = document.getElementById("itemcat").value;
        var product = document.getElementById("product").value;

        if (itemcat == '') {
            alert("Please Select Category");
            document.getElementById("itemcat").focus();
            return false;
        }
        if (product == '') {
            alert("Please Select Product to Delete");
            document.getElementById("product").focus();
            return false;
        }

            else {
                var conf = confirm("Are You Sure To Delete This Product..?");

                if(conf ==true) {

                    document.getElementById("Submit").disabled = true;
                    document.form1.action = "saveproductdelete.php";
                    document.form1.submit();    // Submit the page
                    return true;
                }
            }

    }

</script>

<div class="content-wrapper" >
    <section class="content" >
        <div class="row" >
            <div class="col-lg-12 col-xs-12" >

                <div class="box box-danger" style="padding: 0px 0px 0px 2px;">
                    <div class="box-header">
                        <h2>Delete Product</h2>
                    </div>


                    <form role="form" method="post" name="form1" >
                        <table style="width:80%;">
                            <tr>
                                <td>Select Category :</td>
                                <td style="font-size: 16px; padding-bottom: 10px;padding-top: 10px;font-size: 16px">

                                    <select class="form-control select2" name="itemcat" id="itemcat" style="width : 277px" onchange="getproductDetails();">
                                        <option value="">---Select Category---</option>
                                        <?php
                                        $result = mysql_query("SELECT * FROM category WHERE status='YES'");
                                        while($row = mysql_fetch_array($result))
                                        {
                                            $cid = $row['id'];
                                            $category = $row['name'];

                                            echo "<option value='$cid'>$category</option>";
                                        }
                                        ?>
                                    </select>
                                </td>

                                <td style="padding-bottom: 10px;padding-top: 10px;">Select Product :</td>
                                <td style="padding-bottom: 10px;padding-top: 10px;">
                                    <select class="form-control select2" name="product" id="product" style="width : 270px" onchange="getproductinfo();">
                                        <option value="">---Select Product---</option>
                                    </select>
                                </td>

                            </tr>
                        </table>


                        <input type="hidden" name="counter" id="counter" value="1">
                        <input type="hidden" name="count" id="count" value="">
                        <input type="button" name="btnSubmit" id="Submit" value="Delete" class="btn btn-primary" style="margin: 20px 0px 20px 39%; width: 100px" onclick="validation();">
                        <button type="button" class="btn default" onclick="window.location.reload();" style="margin:20px 0px 20px 20px"> Cancel
                        </button>
                    </form>


                </div>
            </div>
        </div>
    </section>
</div>

<?php
include 'footer.php';
?>
