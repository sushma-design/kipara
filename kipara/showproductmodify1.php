<?php
include 'header.php';
$page = 'modifyproduct';
include 'sidebar.php';
include 'connection.php';

$category = $_POST['itemcat'];
$product = $_POST['product'];


?>
<!--    For Autocomplete   -->

<script src="dist/js/jquery-3.2.1.min.js" type="text/javascript"></script>

<style type="text/css">
    table
    {
        width: 100%;
        margin: 20px 0px 20px 5px;
        border-collapse: collapse;

    }
    table, th, td
    {
        font-size: 20px;
    }
    table th, table td
    {
        padding: 7px;
        text-align: left;  
    }
    tr
    {
        font-size:23px  
    }
</style>


<script>
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

        var itemcat = document.getElementById("itemcat").value;
        //var product = document.getElementById("product").value;
        var pname = document.getElementById("pname").value;
        var mainprise = document.getElementById("mainprise").value;
        var scratchprise = document.getElementById("scratchprise").value;
       var description = document.getElementById("description").value;
        //var use = document.getElementById("use").value;
        if(itemcat == '')
        {
            alert("Please Select Category");
            $("#itemcat").focus();
            return false;
        }
        if(pname == '')
        {
            alert("Please Enter Product Name");
            $("#pname").focus();

            return false;
        }
        if(mainprise == '')
        {
            alert("Please Enter Main Prise");
            $("#mainprise").focus();

            return false;
        }
        if(scratchprise == '')
    {
        alert("Please Enter Scratch Prise");
        $("#scratchprise").focus();

        return false;
    }
        if(description == '')
        {
            alert("Please Enter Description");
            $("#description").focus();

            return false;
        }
       
        else
        {
            document.form1.action = "saveproductmodify1.php";
            document.form1.submit();
        }

    }
	function gethead1(id)
{
	 var infohead = document.getElementById("infohead1-"+id).value;
	 
	  $.ajax({
      type : "POST",
      url : "gethead1.php",
      dataType : "json",
      data : {
        infohead : infohead
              },
                success : function(data) {
                    if (data) {				
                    var length = data.length;
					var result = '<option value="">Select</option>';
					for (var i = 0; i < length; i++) {
                    var infohead1 = data[i].nutritionalhead;
                    var info1 = data[i].weight;
		
                    if (typeof infohead1 != "undefined") {
                        result += '<option value="' + infohead1 + '">';
                        result += '' + info1 + '</option>';
                    }
					$("#info1-"+id).html(result);
						}
                    }
                }
            });
}
function gethead(id)
{
	 var infohead = document.getElementById("infohead-"+id).value;
	 
	  $.ajax({
      type : "POST",
      url : "gethead.php",
      dataType : "json",
      data : {
        infohead : infohead
              },
                success : function(data) {
                    if (data) {				
                    var length = data.length;
					var result = '<option value="">Select</option>';
					for (var i = 0; i < length; i++) {
                    var infohead1 = data[i].infohead;
                    var info = data[i].info;
		
                    if (typeof infohead1 != "undefined") {
                        result += '<option value="' + infohead1 + '">';
                        result += '' + info + '</option>';
                    }
					$("#info-"+id).html(result);
						}
                    }
                }
            });
}
/*----------------Specification-----------------------*/
function addRow1()
{
	  $.ajax({
      type : "POST",
      url : "getspecificationhead.php",
      dataType : "json",
      data : {
        
              },
                success : function(data) {
                    if (data) {
                        var length = data.length; 				
						var rows = $("#estTable1 tr").length;
						rows = rows - 1;
						var sr = parseInt(rows) + 2;
						var result = '<tr> <td style="font-size: 16px; margin-left: 100px;"><input class="print-clean" type="text" name="slno1[]" id="slno1-"' + sr + '" style="border: hidden; width: 20px" value="'+sr+'" readonly></td> '; 
						result += '<td> <SELECT class="form-control select2"   id="infohead1-'+sr+'" name="infohead1[]" style="width:150;"';
						result += '<option value="">SELECT</option>';
						for (var i = 0; i < length; i++) {
							var infohead = data[i].specihead;
							var id = data[i].id;
							
						if (typeof infohead != "undefined") {
							result += '<option value="' + id + '">';
							result += '' + infohead + '</option>';

							}
						}
						result +=' </SELECT> </td>'; 						
						result += '<td> <input class="form-control" type="text" name="info1[]" id="info1-"' + sr + '" style=" width: 150px"  ></td>';
						$("#count1").val(sr);
						$("#estTable1").append(result);		
                        $(".select2").select2();	 
    } 
				}
	   });
}
    
	 function deleteRow1() {
        $("#estTable1 tr:last").remove();
        var counter = $("#count1").val();
        counter = counter - 1;
        $("#count1").val(counter);
    
    } 

/*----------------Information-----------------------*/

function addRow()
{
	  $.ajax({
      type : "POST",
      url : "getinfohead.php",
      dataType : "json",
      data : {
        
              },
                success : function(data) {
                    if (data) {
                        var length = data.length; 				
						var rows = $("#estTable tr").length;
						rows = rows - 1;
						var sr = parseInt(rows) + 2;
						var result = '<tr> <td style="font-size: 16px; margin-left: 100px;"><input class="print-clean" type="text" name="slno[]" id="slno-"' + sr + '" style="border: hidden; width: 20px" value="'+sr+'" readonly></td> '; 
						result += '<td> <select class="form-control select2"   id="infohead-'+sr+'" name="infohead[]" style="width:150;"';
						result += '<option value="">--SELECT--</option>';
						for (var i = 0; i < length; i++) {
							var infohead = data[i].infohead;
							var id = data[i].id;
							
						if (typeof infohead != "undefined") {
							result += '<option value="' + id + '">';
							result += '' + infohead + '</option>';
							}
						}
						result +=' </select> </td>'; 						
						result += '<td> <input class="form-control" type="text" name="info[]" id="info-"' + sr + '" style=" width: 150px"  ></td>';
						$("#count").val(sr);
						$("#estTable").append(result);	
                        $(".select2").select2();		 
    } 
				}
	   });
}
    
	 function deleteRow() {
        $("#estTable tr:last").remove();
        var counter = $("#count").val();
        counter = counter - 1;
        $("#count").val(counter);
    
    } 
	

</script>

<div class="content-wrapper" >
    <section class="content" >
        <div class="row" >
            <div class="col-lg-12 col-xs-12" >

                <div class="box box-danger"style="padding: 0px 0px 0px 2px;">
                    <div class="box-header">
                        <h2>Modify Product</h2>
                    </div>
                    <?php 
						    $cat =$_POST['itemcat']; 
                            $result1= mysql_query("SELECT name FROM category WHERE id= '$cat'");
                            $catname = mysql_fetch_array($result1);
							 
                           // $catname1 = $row1['name'];
                            // echo ("$catname1");
                            $prod =$_POST['product'];
                            $result2= mysql_query("SELECT * FROM product WHERE id= '$prod'");
                            $row2 = mysql_fetch_array($result2);
                            $productname1 = $row2['productname'];
                            $mainprise1 = $row2['mainprise'];
                            $scratchprise1 = $row2['scratchprise'];
                            // $mainprise1 = $row2['mainprise'];
                            // echo ("$scratchprise1");

                            $result3= mysql_query("SELECT * FROM description WHERE product= '$prod'");
                            $row3 = mysql_fetch_array($result3);
                            $description1 = $row3['description'];   
                            $features1 = $row3['features'];                           
                            // echo ("$description1");
                            // echo ("$advantages1");

                            $result4= mysql_query("SELECT * FROM howuse WHERE product= '$prod' ");
                            $row4 = mysql_fetch_array($result4);
                            $howuse1 = $row4['howuse'];  
                            // echo ("$howuse1");

                            $info = mysql_query("SELECT * FROM info WHERE id='$prod' AND id='infohead'");
                            $get_info = mysql_fetch_array($info);
                            $infohead1 = $_POST['infohead'];
                            $info1 = $_POST['info'];
                            echo ("$info1");
                        ?>
                    <form role="form" method="post" name="form1" enctype="multipart/form-data">
                        <table style="width:80%;">
                            <tr>
                                <td>Category :</td>
								<td colspan="2" style="padding-bottom: 10px;padding-top: 10px;">
                                    <input type="text" required class="form-control" value="<?php  echo $catname[0]; ?>" name="itemcat" id="itemcat" style="width: 277px;" readonly>
                                    <input type="hidden"  value="<?php  echo $cat; ?>" name="cat" id="cat" style="width: 277px;" readonly>
                                    <input type="hidden"  value="<?php  echo $prod; ?>" name="prod" id="prod" style="width: 277px;" readonly>
                                </td>
                
                                <td style="padding-bottom: 10px;padding-top: 10px;">Product:</td>
                                <td style="padding-bottom: 10px;padding-top: 10px;">
                                   <input type="text" required class="form-control" value="<?php  echo $productname1; ?>" name="pname" id="pname" style="width: 277px;" >
                                </td>

                            </tr>      
                            <tr>
							
							
							<td style="padding-bottom: 10px;padding-top: 10px;">Main/Original Price :</td>
								<td colspan="2" style="padding-bottom: 10px;padding-top: 10px;">
                                     <input class="form-control" type="text" required name="mainprise" id="mainprise" style="padding-left: 5px;width: 277px;" onkeypress="return isNumberKey(event);" value="<?php  echo $mainprise1; ?>" >
                                </td>
                
                                <td style="padding-bottom: 10px;padding-top: 10px;">Scratch Price:</td>
                                <td style="padding-bottom: 10px;padding-top: 10px;">
                                  <input class="form-control" type="text" required name="scratchprise" id="scratchprise" style="padding-left: 5px;" onkeypress="return isNumberKey(event);" value="<?php  echo $scratchprise1; ?>" >
                                </td>
                             
                            </tr>

                            <tr>
                                <td style="padding-bottom: 10px;padding-top: 10px;">Description :</td>
                                <td colspan="2" style="padding-bottom: 10px;padding-top: 10px;">
                                    <textarea class="form-control" required id="description" name="description"><?php  echo $description1; ?></textarea>
                                </td>
								
                                <td>Advantages / Features</td>
                                <td colspan="2">
                                    <textarea class="form-control" required id="features" name="features"><?php echo $features1; ?></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>How to Use</td>
                                <td colspan="2">
                                    <textarea class="form-control" required id="use" name="use"><?php echo $howuse1; ?></textarea>
                                </td>
                            </tr>
                        
							</table>
							<div class="col-lg-12">
                            					<!--------------------------Information----------------->
							<div class="col-lg-6 col-xs-6">
							<table width="50%" style="margin : 10px 20px 0px 0px">
                            <tr>
                                <td><b>Additional Information</b></td>
                            </tr>
                            <tr>
                
                                <td style="width: 45%; text-align: right"><input type="button" class="btn btn-info" onclick="addRow();" value="ADD ROW"></td>
                                <td style=" text-align: left"><button type="button" class="btn btn-default" onclick="deleteRow();">DELETE ROW</button></td>

                            </tr>
							</table>
							<table width="50%" style="margin : 10px 20px 0px 0px">
                            <tr>
                                <td style="width: 20px; font-size: 16px; margin-left: 100px">Sr.No.</td>
                                <td style="font-size: 16px;margin-left: 100px">Info Head</td>
                                <td style="font-size: 16px;margin-left: 100px">Information</td>
                            </tr>

                            <tbody id="estTable">
							<?php
                            $i=0;
							$info = mysql_query("SELECT * FROM info WHERE category ='$cat' AND product='$prod' AND deletestatus='YES' ");
							$infohead = mysql_num_rows($info);
							if($infohead == 0){
							?>
                            <tr id="firstrow">
                          <td style="font-size: 16px; margin-left: 100px;"><input class="print-clean" type="text" name="slno[]" id="slno-1" style="border: hidden; width: 20px" value="1" readonly></td>
						   <td style="width : 200px;font-size: 16px;"><select class="form-control select2" name="infohead[]" id="infohead-1" style="width : 150px" onchange="gethead(1);">
                                        <option value="">---SELECT---</option>
										<?php   $result = mysql_query("SELECT * FROM infohead WHERE deletestatus='YES' ");
                                        while($row = mysql_fetch_array($result))
                                        {
                                            $id = $row['id'];
                                            $infohead = $row['infohead'];
                                            echo "<option value='$id'>$infohead</option>";
                                        }
										?>
                                    </select></td>
									
								
							 <td style="font-size: 16px"><input class="form-control" type="text" name="info[]" id="info-1" style="width: 150px;"></td>							 
                            </tr>
							<?php  }else{
								$i=0;
							while($getinfo = mysql_fetch_array($info)){
										$i++;
							//echo "SELECT * FROM infohead where id ='".$getinfo['infohead']."'"; exit(0);
								$getinfohead =mysql_query("SELECT * FROM infohead where id ='".$getinfo['infohead']."'");
								$infoheadname = mysql_fetch_array($getinfohead);
							?>
								<tr>
                                 <td style="font-size: 16px; margin-left: 100px;"><input class="print-clean" type="text" name="slno[]" id="slno-1" style="border: hidden; width: 20px" value="<?php echo $i; ?>" readonly></td>
								 <td style="width : 150px;font-size: 16px;"><select  class="form-control select2" name="infohead[]" id="infohead-1" style="width : 150px" onchange="gethead(1);">
                                        <option  value="<?php echo $infoheadname['id'];?>" selected ="selected"><?php echo $infoheadname['infohead']; ?></option>
										<?php   $result = mysql_query("SELECT * FROM infohead");
                                        while($row = mysql_fetch_array($result))
                                        {
                                            $id = $row['id'];
                                            $infohead = $row['infohead'];
                                            echo "<option value='$id'>$infohead</option>";
                                        }
										?>
                                    </select></td>
							    <td style="font-size: 16px"><input class="form-control" type="text" name="info[]" id="info-1" style="width: 150px;" value="<?php echo $getinfo['info']; ?>"> </td>
								</tr>
								
							<?php 
						
							}?>	
										
						<?php 	}
							?>
						
                            </tbody>
                        </table>
						</div>
							<!--------------------------Specifications----------------->
							<div class="col-lg-6 col-xs-6" style="margin-left: 0px;">
							<table width="50%" style="margin : 10px 20px 0px 0px">
                            <tr>
                                <td><b>Add Specifications</b></td>
                            </tr>
                            <tr>
                                <td style="width: 45%; text-align: right"><input type="button" class="btn btn-info" onclick="addRow1();" value="ADD ROW"></td>
                                <td style= text-align: left"><button type="button" class="btn btn-default" onclick="deleteRow1();">DELETE ROW</button></td>

                            </tr>
							</table>
							<table width="50%" style="margin : 10px 20px 0px 46px">
                            <tr>
                                <td style="width: 20px; font-size: 16px; margin-left: 100px">Sr.No.</td>
                                <td style="font-size: 16px;margin-left: 100px">Specification Head</td>
                                <td style="font-size: 16px;margin-left: 100px">Information</td>
                            </tr>

                            <tbody id="estTable1">
							<?php
                            $i1=0;
                            // echo "SELECT * FROM specification_info WHERE product='$product' AND deletestatus='YES' ";
							$info = mysql_query("SELECT * FROM specification_info WHERE category ='$cat' AND product='$prod' AND deletestatus='YES' ");
                            $infohead = mysql_num_rows($info);
                            // echo ("$infohead");
							if($infohead == 0){
							?>
                            <tr id="firstrow">
                          <td style="font-size: 16px; margin-left: 100px;"><input class="print-clean" type="text" name="slno1[]" id="slno1-1" style="border: hidden; width: 20px" value="1" readonly></td>
						   <td style="width : 200px;font-size: 16px;"><select class="form-control select2" name="infohead1[]" id="infohead1-1" style="width : 150px" onchange="gethead1(1);">
                                        <option value="">---SELECT---</option>
										<?php
                                                $result = mysql_query("SELECT * FROM specification_head WHERE deletestatus='YES'");
                                                while($row = mysql_fetch_array($result))
                                                {
                                                    $id = $row['id'];
                                                    $infohead = $row['infohead'];
                                                    echo "<option value='$id'>$infohead</option>";
                                                }
                                            ?>
                                    </select></td>
									
							 <td style="font-size: 16px"><input class="form-control" type="text" name="info1[]" id="info1-1" style="width: 150px;"></td>							 
                            </tr>
							<?php  }else{
								$i1=0;
							while($getinfo = mysql_fetch_array($info)){
										$i1++;
							//echo "SELECT * FROM infohead where id ='".$getinfo['infohead']."'"; exit(0);
								$getinfohead =mysql_query("SELECT * FROM specification_head where id ='".$getinfo['infohead']."'");
                                $infoheadname = mysql_fetch_array($getinfohead);
                                // echo "<pre>";print_r[$infoheadname];die;
							?>
								<tr>
                                 <td style="font-size: 16px; margin-left: 100px;"><input class="print-clean" type="text" name="slno1[]" id="slno1-1" style="border: hidden; width: 20px" value="<?php echo $i1; ?>" readonly></td>
								 <td style="width : 150px;font-size: 16px;"><select  class="form-control select2" name="infohead1[]" id="infohead1-1" style="width : 150px" onchange="gethead1(1);">
                                        <option  value="<?php echo $infoheadname['id'];?>" selected ="selected"><?php echo $infoheadname['infohead']; ?></option>
										<?php   $result = mysql_query("SELECT * FROM specification_head WHERE deletestatus='YES' ");
                                        while($row = mysql_fetch_array($result))
                                        {
                                            $id = $row['id'];
                                            $specificationhead = $row['infohead'];
                                            echo "<option value='$id'>$specificationhead</option>";
                                        }
										?>
                                    </select></td>
							    <td style="font-size: 16px"><input class="form-control" type="text" name="info1[]" id="info1-1" style="width: 150px;" value="<?php echo $getinfo['info']; ?>"> </td>
								</tr>
								
							<?php 
						
							}?>	
										
						<?php 	}
							?>
						
                            </tbody>
                        </table>
                    
                         </div>
                                </div>
                         <?php 
                                $query = "SELECT * FROM product WHERE id='$product' ";
                                $results = mysql_query($query);
                                $row=mysql_fetch_array($results);
                                                            
                                $img1= $row['img1'];
                            ?>
                            <table width="50%">    
                            <tr>
                                <td width="20%">Product Image</td>
                                <td width="10%"></td>
                                <td width="20%">New Image</td>
                            </tr>
                            <tr>
                                <td style="width: 120px;height: 120px;">
                                    <div><img src="<?php echo $img1;?>" id="img11" name="img11" height="120px" width="120px" style="margin-top: 18px;"></div><br>
                                </td>
                                <td>
                                    <div id="filediv">
                                        <input type="file" required id="file1" name="file1" accept="image/*" onchange="preview_image(event)" />
                                    </div>
                                </td>
                                <td style="width: 120px;height: 120px;" colspan="1">
                                    <img id="output_image"/>
                                </td>
                            </tr>
                        </table>
                            
						
                      	<input type="hidden" name="count1" id="count1" value="<?php echo $i1; ?>">
						
                    
                      	<input type="hidden" name="count" id="count" value="<?php echo $i; ?>">
                        <input type="button" name="btnSubmit" id="Submit" value="Update" class="btn btn-primary" style="margin: 20px 0px 20px 42%; width: 100px" onclick="validation();">
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
