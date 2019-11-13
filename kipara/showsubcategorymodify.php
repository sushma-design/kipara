<?php
include 'header.php';
$page = 'modifysubcategory';
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
			 var counter = $("#count").val();
			 var itemcat = $("#itemcat").val();
			 var pname = $("#pname").val();
			if(itemcat == ''){
                alert("Please Select Category");
                document.getElementById("itemcat").focus();
                return false;

            }
			if(pname == ''){
                alert("Please Select Product");
                document.getElementById("pname").focus();
                return false;

            }

          for(var i=1; i<=counter; i++) {
			  var info = $("info-"+i).val();
			  var mainprise = $("mainprise-"+i).val();
			  var scratchprise = $("scratchprise-"+i).val();
              
              
                if(info == ''){

                    alert("Please Enter SubCategory");
                    document.getElementById("info-"+i).focus();
                    return false;
                }else if(mainprise == ''){
                    alert("Please Enter Mainprise");
                    document.getElementById("mainprise-"+i).focus();
                    return false;

                }else if(scratchprise == ''){
                    alert("Please Enter Scratchprise");
                    document.getElementById("scratchprise-"+i).focus();
                    return false;

                }
               
                
            }
          
            document.form1.action = "savesubcategorymodify.php";

            document.form1.submit();    // Submit the page
            return true;

        }


function addRow()
{
	  $.ajax({
      type : "POST",
      url : "getsub.php",
      dataType : "json",
      data : {
        
              },
                success : function(data) {
                    if (data) {
                        var length = data.length; 				
						var rows = $("#estTable tr").length;
						rows = rows - 1;
						var sr = parseInt(rows) + 2;
						// alert(sr);
						var result = '<tr> <td style="font-size: 16px; margin-left: 100px;"><input class="print-clean" type="text" name="slno[]" id="slno-'+sr+'" style="border: hidden; width: 20px" value="'+sr+'" readonly></td> '; 
												
						result += '<td> <input class="form-control" type="text" name="info[]" id="info-'+sr+'" style=" width: 150px"  ></td>';
						result += '<td> <input class="form-control" type="text" name="mainprise[]" id="mainprise-'+sr+'" style=" width: 150px"  ></td>';
						result += '<td> <input class="form-control" type="text" name="scratchprise[]" id="scratchprise-'+sr+'" style=" width: 150px"  ></td>';
						result += '<td style="padding-right: 10px;padding-bottom: 10px;"><button type="button" class="" onclick="deleteRow('+sr+')"><span class="glyphicon glyphicon-trash" ></span></button></td>';
						$("#count").val(sr);
						$("#estTable").append(result);	
                        $(".select2").select2();		 
    } 
				}
	   });
}

	
	   function deleteRow(r)
        {
            //var i = r.parentNode.parentNode.rowIndex;
            //var v= i-1;
            document.getElementById("estTable").deleteRow(r-1);
            var counter = $("#count").val();
            counter = counter - 1;
            $("#count").val(counter);
			
            slnocounter();
		

        } 
	 
	
		 function slnocounter()
    {
        var counter=$("#count").val();

        for(var i=0;i<counter;i++) {

            var add = i+1;
            document.getElementsByName("slno[]")[i].value = i + 1;
            document.getElementsByName("info[]")[i].id ='item-'+add;
			document.getElementsByName("mainprise[]")[i].id ='mainprise-'+add;
			document.getElementsByName("scratchprise[]")[i].id ='scratchprise-'+add;
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
                            
                          
                           
                        
							</table>
							<div class="col-lg-12">
                            				
							<div class="col-lg-6 col-xs-6">
							
							<table width="50%" style="margin : 10px 20px 0px 0px">
							
                            <tr>
                
                                <td style="width: 45%; text-align: right"><input type="button" class="btn btn-info" onclick="addRow();" value="ADD ROW"></td>
                               <td></td>
                               <td></td>
                               <td></td>
                            </tr>
                            <tr>
                                <td style="width: 20px; font-size: 16px; margin-left: 100px">Sr.No.</td>
                                <td style="font-size: 16px;margin-left: 100px">Subcategory</td>
                                <td style="font-size: 16px;margin-left: 100px">Mainprice</td>
								<td style="font-size: 16px;margin-left: 100px">Scratchprice</td>
								<td></td>
                            </tr>

                            <tbody id="estTable">
							<?php

                            $i=0;
							//echo "SELECT * FROM subcategory WHERE category ='$cat' AND productname='$prod' AND deletestatus='YES'";
							$info = mysql_query("SELECT * FROM subcategory WHERE category ='$cat' AND productname='$prod' AND deletestatus='YES' ");
							$infohead = mysql_num_rows($info);
						
								
							while($getinfo = mysql_fetch_array($info)){
										$i++;
							//echo "SELECT * FROM infohead where id ='".$getinfo['infohead']."'"; exit(0);
								//$getinfohead =mysql_query("SELECT * FROM infohead where id ='".$getinfo['infohead']."'");
								//$infoheadname = mysql_fetch_array($getinfohead);
							?>
								<tr id="row-<?php echo $i;?>">
                                 <td style="font-size: 16px; margin-left: 100px;"><input class="print-clean" type="text" name="slno[]" id="slno-1" style="border: hidden; width: 20px" value="<?php echo $i; ?>" readonly></td>
							    <input class="form-control" type="hidden" name="id[]" id="id-1" style="width: 150px;" value="<?php echo $getinfo['id']; ?>">
							    <td style="font-size: 16px"><input class="form-control" type="text" name="info[]" id="info-<?php echo $i;?>" style="width: 150px;" value="<?php echo $getinfo['subcategoryname']; ?>"> </td>
								<td style="font-size: 16px"><input class="form-control" type="text" name="mainprise[]" id="mainprise-<?php echo $i;?>" style="width: 150px;" value="<?php echo $getinfo['mainprise']; ?>" onkeypress="return isNumberKey(event);"></td>
								<td style="font-size: 16px"><input class="form-control" type="text" name="scratchprise[]" id="scratchprise-<?php echo $i;?>" style="width: 150px;" value="<?php echo $getinfo['scratchprise']; ?>" onkeypress="return isNumberKey(event);"></td>
								<td style="padding-right: 10px;padding-bottom: 10px;"><button type="button" class="" onclick="deleteRow(<?php echo $i;?>)"><span class="glyphicon glyphicon-trash" ></span></button></td>
								</tr>
								
							<?php 
						
							}?>	
										
						<?php 	//}
							?>
						
                            </tbody>
                        </table>
						</div>
						
                                </div>
                        
						
                      
						
                    
                      	<input type="hidden" name="count" id="count" value="<?php echo $i; ?>">
						 <input type="hidden" name="data" id="data" value="0">
						 <input type="hidden" name="id1[]" id="id1-<?php echo $count;?>" value="<?php echo $getinfo['id']; ?>">
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
