<?php
include 'header.php';
$page = 'modifysubcategory';
include 'sidebar.php';
include 'connection.php';

//$category = $_POST['itemcat'];
//$product = $_POST['product'];

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
        padding: 1px;
        text-align: left; 
     }
    tr {
        font-size:23px  
    }
    #output_image{
        max-width:150px;
    }
</style>

<script>
    

    function isNumber(evt) 
    {
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

    function getProduct()
    {
        // alert("hiii");
        var itemcat = $("#itemcat").val();
        // alert(itemcat);
        var product = $("#product").val();
        // alert(product);

        $.ajax({
            type : "POST",
            url : "getdetails.php",

            dataType : "json",
            data : {

                category : itemcat,
                product : product
            },
            success : function(data) 
            {
                if (data) {
                    var rate = data.rate;
                    // alert(rate);
                    $("#mainprise").val(rate);
                }
            }
        });
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
        // alert ("hii");
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
                        var length = data.length;
                        //alert(length);
                        var pname = data.productname;
                        var mainprise = data.mainprise;
                        var scratchprise= data.scratchprise;
                        var description = data.description;
                        var features = data.features;
                        // alert(advantages);
                        var howuse = data.howuse;

                        for (var i = 0; i < length; i++) 
                        {
                            var infohead = data[i].infohead;
                            var info = data[i].info;
                           // alert(info);
                            $("#item-"+i).val(infohead);
                            $("#info-"+i).val(info);
                        }
                        $("#pname").val(pname);
                        $("#mainprise").val(mainprise);
                        $("#scratchprise").val(scratchprise);
                        $("#description").val(description);
                        $("#features").val(features);
                        $("#use").val(howuse);
                    }
                }
            });
    }

    function validation()
    {
        var itemcat = document.getElementById("itemcat").value;
        // alert(itemcat);
        var product = document.getElementById("product").value;

        //var counterno = document.getElementById("counter").value;

        if(itemcat == '')
        {
            alert("Please Select Category");
            $("#itemcat").focus();
            return false;
        }
        if(product == '')
        {
            alert("Please Select Product");
            $("#product").focus();
            return false;
        }
        else
        {
            //alert("hi");
            document.form1.action = "showsubcategorymodify.php";
            document.form1.submit();
        }
    }

</script>

<div class="content-wrapper" >
    <section class="content" >
        <div class="row" >
            <div class="col-lg-12 col-xs-12" >
                <div class="box box-danger"style="padding: 0px 0px 0px 2px;">
                    <div class="box-header">
                        <h2>Modify Subcategory</h2>
                    </div>
                    <form role="form" method="post" name="form1" >
                        <table style="width:80%;">
                            <tr>
                                <td>Select Category :</td>
                                <td style="padding-bottom: 10px;padding-top: 10px;font-size: 16px">
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
                                    <select class="form-control select2" name="product" id="product" style="width : 277px">
                                        <option value="">---Select Product---</option>
                                    </select>
                                </td>
                            </tr>
                        </table>

                        <input type="hidden" name="counter" id="counter" value="<?php echo $i;?>">
                        <input type="hidden" name="count" id="count" value="">
                        <input type="button" name="btnSubmit" id="Submit" value="submit" class="btn btn-primary" style="margin: 20px 0px 20px 39%; width: 100px" onclick="validation();">
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
