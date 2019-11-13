<?php
include 'header.php';
$page = 'modifycategory';
include 'sidebar.php';
include 'connection.php';
?>
<!--    For Autocomplete   -->

<script src="dist/js/jquery-3.2.1.min.js" type="text/javascript"></script>

<style type="text/css">
    table{
        width: 40%;
        margin: 20px 0px 20px 10px;
        border-collapse: collapse;


    }
    table, th, td{
        font-size: 20px;

    }
    table th, table td{
        padding: 5px;
        text-align: left;  }

    tr {
        font-size:23px  }
</style>


<script>



function validation()
    {

        var counter = $("#count").val();
        //alert(counter);

            for (var i=1; i<=counter; i++) {
				
                var category = $("#cname-"+i).val();	
                //alert(category);
                
                if(category == '')
                {
                    alert("Please Enter Category Name");
                    $("#cname-"+i).focus();
                    return false;
                }

            }

                document.getElementById("Submit").disabled = true;
                document.form1.action = "updatecategory.php";

                document.form1.submit();    // Submit the page
                return true;

    }
    


    
</script>

<div class="content-wrapper" >
    <section class="content" >
        <div class="row"  >
            <div class="col-lg-12 col-xs-12" >

                <div class="box box-danger"style="padding: 0px 0px 0px 20px;">
                    <div class="box-header">
                        <h2>Modify Category</h2>
                    </div>



                    <form role="form" method="post" name="form1" action="" >
                        <table  class="" style="margin : 10px 20px 0px 0px;width: 25%">
                           						
							
                            <thead>
                            <tr>
                                <th style="font-size: 16px; text-align: center">Sr.No</th>
                                <th style="font-size: 16px; text-align: center">Category</th>
                               
                            </tr>
                            </thead>
							
                            <tbody>
                            <tr id="firstrow">
                                <td style="font-size: 16px">
                                     <?php
                                    $result =mysql_query("SELECT * FROM category WHERE status='YES' ");
                                    $count=0;
                                    while ($row = mysql_fetch_array($result)){
                                        $cid = $row['id'];
                                        $cname = $row['name'];
                                        $count=$count+1;
										?>

                                     <tr>
                                    <td> <div class="col-md-12">
                                         <input class="form-control" style="width:50px" type="text" name="cid[]" value="<?php echo $count; ?>" readonly="readonly">
                                            <input type="hidden" name="catid[]" id="catid-<?php echo $count;?>" value="<?php echo $cid;?>">
                                         
									</div></td>
                                        

                                    <td> <div class="col-md-12">
										<input type="text" style="width: 250px;" class="form-control" value="<?php echo  $cname; ?>" name="cname[]"  id="cname-<?php echo $count;?>">
									</div></td>
										</tr>                 
                                                                        
                                    
                                   <?php
                                    }
                                    ?>
									
                                </td>
							
                            </tbody>
                        </table>

                        <input type="hidden" name="count" id="count" value="<?php echo $count; ?>">                       
						

                        <input type="button" name="btnSubmit" id="Submit" value="Update" class="btn btn-primary" style="margin: 20px 0px 20px 39%; width: 100px" onclick="validation();">
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
