<?php
include 'header.php';
$page='addproduct';
include 'sidebar.php';
include 'connection.php';
?>
    <!-- <script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script> -->
    <style type="text/css">
        table{
            width: 89%;
            margin: 20px 0px 20px 50px;
            border-collapse: collapse;

        }
        table, th, td{
            font-size: 17px;
        }
        table th, table td{
            padding: 10px;
            text-align: left;  }

        tr {
            font-size:20px  }


        body
        {
            width:100%;
            margin:0 auto;
            padding:0px;
            font-family:helvetica;
            background-color:#0B3861;
        }




    </style>

    <script type="text/JavaScript">


    function preview_image(event)
    {
        var reader = new FileReader();
        reader.onload = function()
        {
            var output = document.getElementById('output_image');
            document.getElementById('output_image').style.height = '110px';
            document.getElementById('output_image').style.width = '110px';


            output.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
    }
    function preview_image1(event)
    {
        var reader = new FileReader();
        reader.onload = function()
        {
            var output = document.getElementById('output_image1');
            document.getElementById('output_image1').style.height = '110px';
            document.getElementById('output_image1').style.width = '110px';
            output.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
    }
    function preview_image2(event)
    {
        var reader = new FileReader();
        reader.onload = function()
        {
            var output = document.getElementById('output_image2');
            document.getElementById('output_image2').style.height = '110px';
            document.getElementById('output_image2').style.width = '110px';
            output.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
    }
    function preview_image3(event)
    {
        var reader = new FileReader();
        reader.onload = function()
        {
            var output = document.getElementById('output_image3');
            document.getElementById('output_image3').style.height = '110px';
            document.getElementById('output_image3').style.width = '110px';
            output.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
    }

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

    function validation()
    {
        var cat = $("#cat").val();
        var pname = $("#pname").val();
        var mainprise = $("#mainprise").val();
        var scratchprise = $("#scratchprise").val();
        var description = $("#description").val();
        var use = $("#use").val();
        var counter =$("#counter").val();
        var counter1 =$("#counter1").val();


        var file1 = $("#file1").val();
        // var file2 = $("#file2").val();
        // var file3 = $("#file3").val();
        // var file4 = $("#file4").val();



        if(cat == '')
        {
            alert("Please Select Category");
            $("#cat").focus();
            return false;
        }
        else if(pname == '')
        {
            alert("Please Enter Product Name");
            $("#pname").focus();
            return false;
        }
    //    else if(mainprise == '')
    //    {
    //        alert("Please Enter Main Price");
    //        $("#mainprise").focus();
    //        return false;
    //    }
    //    else if(scratchprise == '')
    //    {
    //        alert("Please Enter Scratch Price");
    //        $("#scratchprise").focus();
    //        return false;
    //    }
    //    else if(description == '')
    //    {
    //        alert("Please Enter Description");
    //        $("#description").focus();
    //        return false;
    //    }
    //    else if(use == '')
    //    {
    //        alert("Please Enter Use");
    //        $("#use").focus();
    //        return false;
    //    }
    //    else if(file1 == '')
    //    {
    //        alert("Please Choose Image");

    //        return false;
    //    }
        else
        {

            document.getElementById("Submit").disabled = true;
            document.form11.action = "saveproduct.php";
            document.form11.submit();

        }
    }

    function addRow() {

        //alert("hi");
        var count = $("#counter").val();
        count = parseInt(count) + 1;
        $.post('getCatDetails.php', {}, function (response) {
                if (response) {

                    var len = response.length;
                    var result = '<tr>';
                    result += '<td style="font-size: 16px"><input class="print-clean" type="text" name="slno[]" id="slno-'+count+'" style="border: hidden; width: 20px" value="'+count+'" readonly></td>';
                    result += '<td style="font-size: 16px"> <select class="form-control select2" name="item[]" id="item-'+count+'" style="width : 250px;" >';
                    result += '<option value="">---SELECT---</option>';
                    for(var i=0; i<len; i++)
                    {
                        var infohead = response[i].infohead;
                        var id = response[i].id;

                        if (typeof infohead != "undefined") {
                            result += '<option value="' + id + '">';
							result += '' + infohead + '</option>';
                        }
                    }
                    result += '</select>';
                    result += '<input type="hidden" name="itemid[]" id="itemid-'+count+'" value=""></td>';

                    result += '<td style="width:250px;font-size: 16px;"><input type="text" class="form-control" name="info[]" id="info-'+count+'" style="margin-left: -81px;"></td>';
                    result += '<td style="padding-right: 10px;padding-bottom: 10px;"><button type="button" class="" onclick="deleterow('+count+')"><span class="glyphicon glyphicon-trash" ></span></button></td>';


                    result += '</tr>';

                    $("#estTable").append(result);
                    $("#counter").val(count);
                    $(".select2").select2();
                }

            },
            'json')
    }

    
    function addRow1() 
    {
        //alert("hi");
        var count = $("#counter1").val();
        count = parseInt(count) + 1;
        $.post('getspechead.php', {}, function (response) {
                if (response) {

                    var len = response.length;
                    var result = '<tr>';
                    result += '<td style="font-size: 16px"><input class="print-clean" type="text" name="slno1[]" id="slno1-'+count+'" style="border: hidden; width: 20px" value="'+count+'" readonly></td>';
                    result += '<td style="font-size: 16px"> <select class="form-control select2" name="item1[]" id="item1-'+count+'" style="width : 250px;" >';
                    result += '<option value="">---SELECT---</option>';
                    for(var i=0; i<len; i++)
                    {
                        var infohead = response[i].infohead;
                        var id = response[i].id;
                        if (typeof infohead != "undefined") {
                            result += '<option value="' + id + '">'  + infohead + '</option>';
                        }
                    }
                    result += '</select>';
                    
                    result += '<input type="hidden" name="itemid1[]" id="itemid1-'+count+'" value=""></td>';

                    result += '<td style="width:250px;font-size: 16px;"><input type="text" class="form-control" name="info1[]" id="info1-'+count+'" style="margin-left: -81px;"></td>';
                    result += '<td style="padding-right: 10px;padding-bottom: 10px;"><button type="button" class="" onclick="deleterow1('+count+')"><span class="glyphicon glyphicon-trash" ></span></button></td>';


                    result += '</tr>';
               
                    $("#estTable1").append(result);
                    $("#counter1").val(count);
                    $(".select2").select2();
                }

            },
            'json');



        }


    function deleterow(r)
    {
        // alert(r);
        var counter = $("#counter").val();

        if(counter != '1') {
            //var i = r.parentNode.parentNode.rowIndex;
            // var v = i - 1;
            document.getElementById("estTable").deleteRow(r-1);
            var counter = $("#counter").val();
            counter = counter - 1;
            $("#counter").val(counter);

            slnocounter();
        }

    }

    function deleterow1(r)
    {
        // alert(r);
        var counter = $("#counter1").val();

        if(counter != '1') {
            //var i = r.parentNode.parentNode.rowIndex;
            // var v = i - 1;
            document.getElementById("estTable1").deleteRow(r-1);
            var counter = $("#counter1").val();
            counter = counter - 1;
            $("#counter1").val(counter);

            slnocounter();
        }

    }
    function slnocounter()
    {
        var counter=$("#counter").val();

        for(var i=0;i<counter;i++) {

            var add = i+1;
            document.getElementsByName("slno[]")[i].value = i + 1;
            document.getElementsByName("item[]")[i].id ='item-'+add;
        }
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
            success : function(data) {


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

                for (var i = 0; i < length; i++) {


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


    </script>


    <div class="content-wrapper">
        <section class="content">
            <div class="row">
                <div class="col-lg-12 col-xs-12">
                    <form role="form" action="" method="post" name="form11" id="form11" enctype="multipart/form-data">
                        <div class="box box-danger"style="padding: 0px 0px 20px 20px; ">
                            <div class="box-header">
                                <h1>Add Product</h1>
                            </div>
                            <table id="myTable" width="80%" class="">

                                <tr>
                                    <td>
                                        Select Category

                                    </td>

                                    <td colspan="2">
                                        <select class="form-control select2" name="itemcat" id="itemcat" style="width: 272px;" onchange="">
                                            <option value="">---Select Category---</option>
                                            <?php
                                            $result = mysql_query("SELECT * FROM category WHERE status='YES'");
                                            while($row = mysql_fetch_array($result))
                                            {
                                                $id = $row['id'];
                                                $category = $row['name'];

                                                echo "<option value='$id'>$category</option>";
                                            }
                                            ?>
                                    </select>
                                    </td>
                                </tr>

                                <tr>

                                    <td>Product Name</td>
                                    <td colspan="2">
                                        <input class="form-control" type="text" required name="product" id="product" style="width: 277px;" value="" >
                                    </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Main/Original Price</td>
                                    <td>
                                        <input class="form-control" type="text" required name="mainprise" id="mainprise" style="padding-left: 5px;width: 277px;" value="" onkeypress="return isNumberKey(event);">
                                    </td>
                                </tr>

                                <tr>

                                    <td>Scratch Price</td>
                                    <td>
                                        <input class="form-control" type="text" required name="scratchprise" id="scratchprise" style="padding-left: 5px; width: 277px;" onkeypress="return isNumberKey(event);">
                                    </td>
                                </tr>

                                <tr>
                                    <td>Description</td>
                                    <td colspan="2">
                                        <textarea class="form-control" required id="description" name="description"></textarea>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Advantages / Features</td>
                                    <td colspan="2">
                                        <textarea class="form-control" required id="features" name="features"></textarea>
                                    </td>
                                </tr>

                                <tr>
                                    <td>How to Use</td>
                                    <td colspan="2">
                                        <textarea class="form-control" required id="use" name="use"></textarea>
                                    </td>
                                </tr>
                            </table>
                            <table id="myTable" width="70%" class="">
                                <tr>
                                    <td>Add Information</td>
                                </tr>
                                <tr>
                                    <td style="width: 60px; text-align: right"><input type="button" class="btn btn-info" onclick="addRow();" value="ADD ROW"></td>


                                </tr>
                                <tr>
                                    <th style="width: 20px; font-size: 16px;">Sr.No.</th>
                                    <th style="font-size: 16px;margin-left: -100px">InfoHead</th>
                                    <th style="font-size: 16px;margin-left: -100px">Info</th>
                                </tr>
                                <tbody id="estTable">

                                <tr>
                                    <td style="font-size: 16px"><input class="print-clean" type="text" name="slno[]" id="slno-1" style="border: hidden; width: 20px" value="1" readonly></td>

                                    <td style="font-size: 16px">
                                        <select class="form-control select2" name="item[]" id="item-1" style="width : 250px;margin-left: -77px;"  >
                                            <option value="">---SELECT---</option>
                                            <?php
                                            $result = mysql_query("SELECT * FROM infohead WHERE deletestatus = 'YES' GROUP BY infohead");

                                            while($row = mysql_fetch_array($result))
                                            {
                                                $id = $row['id'];
                                                $infohead = $row['infohead'];
                                                echo "<option value='$id'>$infohead</option>";
                                            }
                                            ?>
                                        </select>

                                        <!-- <input type="hidden" name="itemid[]" id="itemid-1" value=""> -->

                                    </td>

                                    <td style="width : 250px;font-size: 16px"><input type="text" class="form-control" name="info[]" id="info-1" style="margin-left: -81px;" ></td>
                                    <td style="padding-right: 10px;padding-bottom: 10px;"><button type="button" class="" onclick="deleterow(1);"><span class="glyphicon glyphicon-trash" ></span></button></td>

                                </tr>
                                </tbody>
                                <!-- <input type="hidden" name="counter1" id="counter1" value="1"> -->
                            </table>

                            <table id="myTable" width="70%" class="">
                                    <tr>
                                        <td>Specifications</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 60px; text-align: right"><input type="button" class="btn btn-info" onclick="addRow1();" value="ADD ROW"></td>
                                    </tr>
                                    <tr>
                                        <th style="width: 20px; font-size: 16px;">Sr.No.</th>
                                        <th style="font-size: 16px;margin-left: -100px">Specification Head</th>
                                        <th style="font-size: 16px;margin-left: -100px">Info</th>
                                    </tr>
                                    <tbody id="estTable1">
                                    <tr>
                                        <td style="font-size: 16px"><input class="print-clean" type="text" name="slno1[]" id="slno1-1" style="border: hidden; width: 20px" value="1" readonly></td>
                                        <td style="font-size: 16px">
                                            <select class="form-control select2" name="item1[]" id="item1-1" style="width : 250px;margin-left: -77px;"  >
                                                <option value="">---SELECT---</option>
                                                <?php
                                                $result = mysql_query("SELECT * FROM specification_head WHERE deletestatus = 'YES' GROUP BY infohead");

                                                while($row = mysql_fetch_array($result))
                                                {
                                                    $id = $row['id'];
                                                    $infohead = $row['infohead'];
                                                    echo "<option value='$id'>$infohead</option>";
                                                }
                                                ?>
                                            </select>

                                            <!-- <input type="hidden" name="itemid1[]" id="itemid1-1" value=""> -->
                                        </td>
                                        <td style="width : 250px;font-size: 16px"><input type="text" class="form-control" name="info1[]" id="info1-1" style="margin-left: -81px;" ></td>
                                        <td style="padding-right: 10px;padding-bottom: 10px;"><button type="button" class="" onclick="deleterow1(1);"><span class="glyphicon glyphicon-trash" ></span></button></td>
                                    </tr>
                                </tbody>
                                <!-- <input type="hidden" name="counter2" id="counter2" value="1"> -->
                            </table>
                            
                            <table width="50%">
                                <tr>

                                    <td>Select Image</td>
                                    <td>

                                        <div id="filediv">

                                            <input type="file" required id="file1" name="file1" accept="image/*" onchange="preview_image(event)" />

                                        </div>

                                    </td>
                                    <td colspan="1">
                                        <img id="output_image"/>
                                    </td>
                                </tr>
                               
                            </table>
                            <input type="hidden" name="counter" id="counter" value="1">
                            <input type="hidden" name="counter1" id="counter1" value="1">
                            <button type="submit" name="btnSubmit" id="Submit" value="" class="btn btn-primary" style="margin: 20px 0px 0px 39%; width: 100px"  onclick="validation();">Submit</button>

                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>


<?php include 'footer.php' ?>