<?php
include 'header.php';
$page='addsubcat';
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
        var cat = $("#itemcat").val();
        var pname = $("#product").val();
		var info = $("#info").val();
        var mainprise = $("#mainprise").val();
        var scratchprise = $("#scratchprise").val();
       
        var counter =$("#counter").val();
       
        if(cat == '')
        {
            alert("Please Select Category");
            $("#itemcat").focus();
            return false;
        }
        else if(pname == '')
        {
            alert("Please Enter Product Name");
            $("#product").focus();
            return false;
        }
		 else if(info == '')
        {
            alert("Please Enter Subcategory");
            $("#info").focus();
            return false;
        }
       else if(mainprise == '')
       {
           alert("Please Enter Main Price");
           $("#mainprise").focus();
           return false;
       }
       else if(scratchprise == '')
       {
           alert("Please Enter Scratch Price");
           $("#scratchprise").focus();
           return false;
       }
      
        else
        {

            document.getElementById("Submit").disabled = true;
            document.form11.action = "savesubcategory.php";
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
                    result += '<input type="hidden" name="itemid[]" id="itemid-'+count+'" value=""></td>';
                    result += '<td style="width:250px;font-size: 16px;"><input type="text" class="form-control" name="info[]" id="info-'+count+'"></td>';
					result += '<td style="width:250px;font-size: 16px;"><input type="text" class="form-control" name="mainprise[]" id="mainprise-'+count+'" onkeypress="return isNumberKey(event);"></td>';
					result += '<td style="width:250px;font-size: 16px;"><input type="text" class="form-control" name="scratchprise[]" id="scratchprise-'+count+'" onkeypress="return isNumberKey(event);"></td>';
                    result += '<td style="padding-right: 10px;padding-bottom: 10px;"><button type="button" class="" onclick="deleterow('+count+')"><span class="glyphicon glyphicon-trash" ></span></button></td>';
                    result += '</tr>';
                    $("#estTable").append(result);
                    $("#counter").val(count);
                    $(".select2").select2();
                }

            },
            'json')
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
                    <form role="form" action="" method="post" name="form11" id="form11">
                        <div class="box box-danger"style="padding: 0px 0px 20px 20px; ">
                            <div class="box-header">
                                <h1>Add Subcategory</h1>
                            </div>
                            <table id="myTable" width="80%" class="">

                                <tr>
                                    <td>
                                        Select Category

                                    </td>

                                    <td>
                                        <select class="form-control select2" name="itemcat" id="itemcat" style="width: 272px;" onchange="getproductDetails();">
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
                                
                                    <td>Select Product</td>
                                    <td>
                                    <select class="form-control select2" name="product" id="product" style="width : 272px" onchange="getProduct();">
                                        <option value="">---Select Products---</option>
                                    </select>


                                    </td>
                                    <td></td>
                                </tr>
                               
                            </table>
							
							            <div class="row">
                                            <div class="col-md-12">
                                                <input type="button" class="btn btn-block btn-danger" name="addrow" id="addrow" value="Add Row" style="width:10%" onclick="addRow();">
                                            </div>
                                        </div>
										
                             <table id="myTable" width="70%" class="">
                               <thead>
                                <tr>
                                    <th style="width: 20px; font-size: 16px;">Sr.No.</th>                                   
                                    <th style="font-size: 16px;">Subcategory</th>
									<th>Main Price</th>
									<th>Scratch Price</th>
									<th></th>
                                </tr>
								</thead>
                                <tbody id="estTable">
                                <tr>
                                    <td style="font-size: 16px"><input class="print-clean" type="text" name="slno[]" id="slno-1" style="border: hidden; width: 20px" value="1" readonly></td>                   

                                    <td style="width : 250px;font-size: 16px"><input type="text" class="form-control" name="info[]" id="info-1" ></td>
									<td style="width : 250px;font-size: 16px"><input type="text" class="form-control" name="mainprise[]" id="mainprise-1" onkeypress="return isNumberKey(event);"></td>
									<td style="width : 250px;font-size: 16px"><input type="text" class="form-control" name="scratchprise[]" id="scratchprise-1" onkeypress="return isNumberKey(event);"></td>
                                    <td style="padding-right: 10px;padding-bottom: 10px;"><button type="button" class="" onclick="deleterow(1);"><span class="glyphicon glyphicon-trash" ></span></button></td>

                                </tr>
                                </tbody>
                                <!-- <input type="hidden" name="counter1" id="counter1" value="1"> -->
                            </table>

                           
                            <input type="hidden" name="counter" id="counter" value="1">
                            
                            <button type="button" name="btnSubmit" id="Submit" value="" class="btn btn-primary" style="margin: 20px 0px 0px 39%; width: 100px"  onclick="validation();">Submit</button>

                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>


<?php include 'footer.php' ?>