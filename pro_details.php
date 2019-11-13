<?php
require_once('connection.php');
include "header.php";
include "menu.php";
$limit = 6;
$id = $_REQUEST['id'];
// $catid = $_REQUEST['catid'];
$result1 = mysql_query("SELECT * FROM product WHERE id='$id' AND deletestatus='YES'");
$row11 = mysql_fetch_array($result1);
$cat = $row11['category'];

?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/style.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<style>
.services-block-alt .caption {
  background-color: #f5f4f4;
  color: #fff;
  font-size: 18px;
  line-height: 26px;
  padding: 15px 20px 23px;
  
 }
 main {
  min-width: 320px;
  max-width: 800px;
  padding: 0px;
  margin: 0 auto;
  background: #fff;
}

section {
  display: none;
  padding: 20px 0 0;
  border-top: 1px solid #ddd;
}

#tab1,#tab2,#tab3,#tab4 {
  display: none;
}
#qty,#type,#vendor{
	color:#000000;
	
}
 label {
  display: inline-block;
  margin: 0 -25 -1px;
  padding: 15px 25px;
  font-weight: 600;
  text-align: center;
  color: #bbb;
  border: 1px solid transparent;
}

label:before {
  font-family: fontawesome;
  font-weight: normal;
  margin-right: 10px;
}

label[for*='1']:before { content: '\f1cb'; }
label[for*='2']:before { content: '\f17d'; }
label[for*='3']:before { content: '\f16b'; }
label[for*='4']:before { content: '\f1a9'; }

label:hover {
  color: #888;
  cursor: pointer;
}

input:checked + label {
  color: #555;
  border: 1px solid #ddd;
  border-top: 2px solid #fede00;;
  border-bottom: 1px solid #fff;
}

#tab1:checked ~ #content1,
#tab2:checked ~ #content2,
#tab3:checked ~ #content3,
#tab4:checked ~ #content4 {
  display: block;
}
.button {
    background-color: #000;
    border: none;
    color: white;
    padding: 8px 10px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 14px;
    margin: 2px 2px;
    cursor: pointer;
    border-radius: 4px;
}
.button1 {
    height: 36px;
    background-color: #fede00;
    border: none;
    color: white;
    padding: 8px 14px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 14px;
    margin: 2px 2px;
    cursor: pointer;
    border-radius: 4px;
}
.button2 {
    height: 36px;
    background-color: #ff0000;
    border: none;
    color: white;
    padding: 8px 14px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 14px;
    margin: 2px 2px;
    cursor: pointer;
  
#div1{
  border: 1px solid #dcdcdc;
  border-style: solid;
}
 .div2{
  border: 1px solid #dcdcdc;
  border-style: solid;
}


.blog-isotope1 .cat {
    float: left;
    width: calc(105.33% - 20px);
    padding: 20px 0px 20px;
    margin-bottom: 30px;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.15);
}
.product-block-alt {
	margin-top: -75px;
    text-align: left;
}

#i1{
    border: 1px solid #dcdcdc;
    padding: 5px;

}
</style>

<script>
 function getimage(image,id)
    {
      //alert(id);
      //alert(image);


        var img5= 'kipara/';

        var main='<?php echo $img1;?>';
        var small1='<?php echo $img2;?>';
        var small2='<?php echo $img3;?>';
        var small3='<?php echo $img4;?>';

        document.getElementById('main').src=img5.concat(image);
                   if(id==1)
                  {
                  document.getElementById('img1').src=img5.concat(main);
                  }
                  if(id==2)
                  {
                  document.getElementById('img2').src=img5.concat(small2);
                  }
                  if(id==3)
                  {
                  document.getElementById('img3').src=img5.concat(small3);
                  }



    }

 function addtocart()
 {

     var qty = $("#quantity").val();
     var rs = $("#rs1").val();
     var productname = $("#productname").val();
     var productid = $("#productid").val();
     var totalrs = parseFloat(qty) * parseFloat(rs);

//            document.getElementById("button"+id).innerHTML = '<i class="fa fa-shopping-cart"></i>&nbsp;&nbsp; ADDED TO CART';
//            document.getElementById("button"+id).setAttribute("class","button-red button5");

     $.ajax({
         type: "POST",
         url : "setarray.php",
         dataType : 'json',
         data : {
             rs : rs,
             itemid : productid,
             qty : qty,
             item : productname,
             price : totalrs
         },
         success : function(data)
         {
             var id = data.id;
             var sessionno = data.sessionno;
             var sessionrs = data.sessionrs;
             document.getElementById("no").innerHTML = sessionno;
             document.getElementById("rs").innerHTML = sessionrs;
         }
     });
 }

function getprice(){
    var unit = $("#unit").val();
        // alert(unit);
        $.ajax({

            type : "POST",
            url : "getprice.php",
            dataType : 'json',
            data : {
                unit : unit
            },
            success: function(data)
            {
                // alert(data);
                // alert("hi");
               
                
                    var mainprice = data.mainprise;
                    var scratchprice = data.scratchprise;
                
                      
                 
                // alert(mainprice);
                
                $("#unit1").html(mainprice);
                $("#unit2").html(scratchprice);
            }
        });
}

</script>

<input type="hidden" id="page" value="product">
<!-- Content  -->
<div id="pageTitle">
    <div class="container">
        <!-- Breadcrumbs Block -->
        <div class="breadcrumbs">
            <ul class="breadcrumb">
                <li><a href="index.php">Home</a></li>
                <li class="active">Products</li>
            </ul>
        </div>
        <!-- //Breadcrumbs Block -->
        <h1>Our <span class="color">Products</span></h1>
    </div>
</div>


<div id="pageContent">
<!-- Services -->
<div class="block">
<div class="container">

<div class="tab-content">
    <div class="row services-alt tab-pane fade in active" id="services1">
        <div class="col-sm-11" align="right" style="margin-bottom: 20px;">
            <a href="cart.php"><button type="button" class="button button5"><i class="fa fa-shopping-cart"></i>&nbsp;&nbsp;<span id="no">
                        <?php
                            if($_SESSION['no'] == '') {
                                echo '0';
                            }else{
                                echo $_SESSION['no'];
                        }?>
                        </span> item(s) - <i class="fa fa-rupee"></i> <span id="rs">
                            <?php
                            if($_SESSION['rs'] == ''){
                                echo '0';
                            }else{
                                echo $_SESSION['rs'];
                            };
                            ?></span></span></button></a>
        </div>

	    <div class="col-md-3">
             <?php include "productsidebar.php"?>				
        </div>

        <div class="col-md-9">
        
            <?php
                    // echo $cat;
                    // echo "SELECT * FROM product WHERE category = '$cat' AND id='$id' AND deletestatus='YES'";		 
                $result = mysql_query("SELECT * FROM product WHERE category = '$cat' AND id='$id' AND deletestatus='YES'");
                while($row1 = mysql_fetch_array($result)) 
                {
                    //$cat = $row1['category'];
                    $productname = $row1['productname'];
                    $mainprice = $row1['mainprise'];
                    $scratchprice = $row1['scratchprise'];

                    $img1 = $row1['img1'];
            ?>
            
            <div class="col-md-5">
            <h3><strong><?php echo $productname;?></strong></h3>
                    <body>
				        <div class="wrapper">
				            <div class="product-images">
				                <div class="main-img-slider" id="i1">
                                    <figure style="border: 1px solid #dcdcdc; padding: 4px;">
                                        <img src="kipara/<?php echo $row1['img1'];?>" id="main"  style="width: 295px; height: 221px;">
                                    </figure>
		                        </div>
	                        </div>
                        </div>
                    </body>
            </div>

			<div class="col-md-7">
                
				<h4><strong>Rs.&nbsp;<span id="unit1"><?php echo $mainprice;?></span> <del>Rs.&nbsp;<span id="unit2"><?php echo $scratchprice;?></span></del></strong></h4>
				<div class="col-sm-12"> 
					<div class="col-sm-4">
						<label id="" for="unit" style="color: #000; margin-left: -57px;">Unit : </label>
					</div>
					<div class="col-sm-8">
						<select class="form-control select2" name="unit" id="unit" style="width : 180px; border: 1px solid; margin-left: -80px;" onchange="getprice();">
							<option value="">---Select Unit---</option>
							<?php
								$result = mysql_query("SELECT * FROM subcategory WHERE productname='$id' AND deletestatus='YES'");
								while($row = mysql_fetch_array($result))
								{
									$cid = $row['id'];
									$name = $row['subcategoryname'];

									echo "<option value='$cid'>$name</option>";
								}
							?>
						</select>
					</div>
				</div>
				<label id="qty" for="quantity" style="">Qty : </label>
				<input min="1" type="number" id="quantity" name="quantity" style="width: 4em;"  value="1" />

                <input type="hidden" id="productname" name="productname" value="<?php echo $productname;?>">
                <input type="hidden" id="productid" name="productid" value="<?php echo $id;?>">
                <input type="hidden" id="rs1" name="rs1" value="<?php echo $mainprice;?>">

				<style>#quantity { padding:5px; width:35px; height: 42px; border: 1px solid #555; }</style>
				&ensp;&ensp;&ensp;&ensp;
                <?php
                    if (in_array($id, $_SESSION['itemid'])) {
                        $status="YES";
                    }
                    else{
                        $status="NO";
                    }
                ?>
                <?php
//                   echo "$status";
                    if($status == 'YES')
                    {
                ?>
                <a onclick="addtocart();"><button type="button" id="button" disabled class="button2" >ADDED TO CART</button></a>
                <?php } ?>
                <?php
                if($status == 'NO')
                {
                    ?>
                    <a onclick="addtocart();"><button type="button" id="button" class="button1">ADD TO CART</button></a>
                <?php } ?>
<!--					<a onclick="addtocart()" class="btn btn-cart" style="background-color: #000;"><span>ADD TO CART</span></a>-->
				<hr>

				<h2>Description</h2>
		        <?php
                    $product = $_POST['productid'];
                    // echo $product;
                    $result3 = mysql_query("SELECT * FROM description WHERE category='$cat' AND product='$id' AND deletestatus='YES'");
                    while($row3 = mysql_fetch_array($result3))
                    {
                        $description = $row3['description'];										
                ?>				
					
                <p><?php echo $description1=substr($description, 0, 220).'  ...';?></p>
				<?php } ?>
				
            </div>
	        <?php } ?>
        
        
            <div class="col-sm-12">
                <hr>
                <main>
                    <input id="tab1" type="radio" name="tabs" checked>
                    <label id="lab1" for="tab1">Description</label>
                
                    <input id="tab2" type="radio" name="tabs">
                    <label id="lab2" for="tab2">Additional Information</label>
                
                    <input id="tab3" type="radio" name="tabs">
                    <label id="lab3" for="tab3">Specifications</label>
            
                    <input id="tab4" type="radio" name="tabs">
                    <label id="lab4" for="tab4">Reviews</label>
            
                    <section id="content1">
                        <?php
                        // echo "SELECT * FROM description WHERE category='$cat' AND product='$id' AND deletestatus='YES'";
                            $result3 = mysql_query("SELECT * FROM description WHERE category='$cat' AND product='$id' AND deletestatus='YES'");
                            while($row3 = mysql_fetch_array($result3))
                            {
                                $description = $row3['description'];
                                $features = $row3['features'];
                                ?>
                                <p><?php echo $description; ?></p>
                                <!-- <p><b>Advantages : </b></p> -->
                                <!-- <p><?php echo $features; ?></p> -->
                                <?php 
                                    if($features!=''){
                                    ?>
                                    <p><strong>Advantages:</strong><br>
                                    <?php echo $output =str_replace('.', '<br />', $features);?></p>
                                    <?php } ?>
                            <?php } 
                        ?>

                        <?php
                            $result4 = mysql_query("SELECT * FROM howuse WHERE category='$cat' AND product='$id' AND deletestatus='YES'");
                            while($row4 = mysql_fetch_array($result4))
                            {
                                $use = $row4['howuse'];
        
                                ?>
                                <p><b>How To Use :</b></p>
                                <p><?php echo $output =str_replace('.', '<br />', $use);?></p>
        
                            <?php } 
                        ?>
                    </section>
            
                    <section id="content2">
                        <table class="table table-striped shop_attributes">
                            <tbody>
                                <tr class>
                                <?php
                                    $result3 = mysql_query("SELECT * FROM info WHERE category='$cat' AND product='$id' AND deletestatus='YES'");
                                    while($row3 = mysql_fetch_array($result3))
                                    {
                                    $infohead = $row3['infohead'];
                                    $info = $row3['info'];

                                    $result5 = mysql_query("SELECT * FROM infohead where id=$infohead");
                                    $row5 = mysql_fetch_array($result5);
                                    $infohead1 = $row5['infohead'];
                                ?>
                                    <tr>
                                        <td><p><?php echo $infohead1;?></p></td>
                                        <td><p><?php echo $info;?></p></td>
                                    </tr>
                                    <?php } ?>
                                <tr>
                            </tbody>
                        </table>
                    </section>
        
                    <section id="content3">
                    <table class="table table-striped shop_attributes">
                            <tbody>
                                <tr class>
                                <?php
                                    $result33 = mysql_query("SELECT * FROM specification_info WHERE category='$cat' AND product='$id' AND deletestatus='YES'");
                                    while($row33 = mysql_fetch_array($result33))
                                    {
                                    $infohead3 = $row33['infohead'];
                                    $info3 = $row33['info'];

                                    $result53 = mysql_query("SELECT * FROM specification_head where id=$infohead3");
                                    $row53 = mysql_fetch_array($result53);
                                    $infohead13 = $row53['infohead'];
                                ?>
                                    <tr>
                                        <td><p><?php echo $infohead13;?></p></td>
                                        <td><p><?php echo $info3;?></p></td>
                                    </tr>
                                    <?php } ?>
                                <tr>
                            </tbody>
                        </table>
                    </section>

                    <section id="content4">
                        <script>
                            function saveform1()
                            {
                                var name = $("#name").val();
                                var email = $("#email").val();
                                var review = $("#review").val();
                
                                if (name == '') {
                                alert("Please Enter Name");
                                $("#name").focus();
                                return false;
                                }
                                if (email == '') {
                                alert("Please Enter Email-Id");
                                $("#email").focus();
                                return false;
                                }
                                if(email!="")
                                {
                                    //var emailpattern = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/;
                                    var emailpattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
                                    var patternarray2=email.match(emailpattern);
                
                                    if(patternarray2==null)
                                    {
                                        alert("Please Enter Proper Email-Id");
                                        $("#email").focus();
                                        return false;
                                    }
                                    //return true;
                                }
                                if (review == '') {
                                    alert("Please Enter Your Review");
                                    $("#review").focus();
                                    return false;
                                    }
                                else {
                                    //alert("hii");
                                    //document.getElementById("message1").style.display ="block";
                
                                    $.ajax({
                                        type: "POST",
                                        url: "m2.php",
                                        dataType: 'json',
                                        data: {
                                            name : name,
                                            email :email,
                                            review : review
                                        },
                                        success: function(data) {
                                            var id = data.id;
                                            //alert(id);
                
                
                                            if(id==1)
                                            {
                
                                                document.getElementById("message1").style.display ="block";
                                                $("#name").val('');
                                                $("#email").val('');
                                                $("#review").val('');
                
                                            }
                                            if(id==0)
                                            {
                                                document.getElementById("message11").style.display ="block";
                                                $("#name").val('');
                                                $("#email").val('');
                                                $("#review").val('');
                                            }
                                        }
                                    });
                                }
                            //document.getElementById("comment_form").reset();
                            }
                        </script>
                        <form  id="review_form"  action="" method="POST">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <div id="result" class="text-center"></div>
                            </div>
                        </div>
            
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="input-wrapper">
                                    <input type="text" class="input-custom input" placeholder="Name"  name="name" id="name"  required>
                                </div>
                            </div>
                                            
                            <div class="col-sm-12">
                                <div class="input-wrapper">
                                    <input type="email" class="input-custom input" placeholder="Email-Id" name="email" id="email" required>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="input-wrapper">
                                    <textarea class="textarea-custom input" name="review" id="review" placeholder="Your Reviews" required></textarea>
                                </div>
                                <div class="form-group">
                                    <div class="btn-submit btn-common-white" >
                                        <button type="button" class="btn" onclick="saveform1();"id="btn_order_submit" /><i class="icon icon-lightning"></i><span>Submit</span></button>
                                    </div>      
                                </div>
                            </div>
                        </div>
                            
                                
                        <div id="message1" style="display:none;border:2px solid #fede00;margin-top:10px; padding:10px;">
                            <h3>Your Review sent successfully...</h3>
                        </div>
                        <div id="message11" style="display:none;border:2px solid #fede00;margin-top:20px; padding:10px;">
                            <h3>Sorry, unable to send review...</h3>
                        </div>
                        </form>
                    </section>
                </main>
            </div>
    
            <div class="col-sm-12">
                <hr>
                <p class="similar" style="font-size:20px"><strong>Similar Products</strong></p><br/>
                <?php
            
                    $count =0;
                    $result7 = mysql_query("SELECT * FROM product WHERE category='$cat' AND id!='$id' AND deletestatus='YES'");
                                        
                        while($row7 = mysql_fetch_array($result7))
                            {
                                //$cat = $row1['category'];
                                $productname1 = $row7['productname'];
                                $mainprice1 = $row7['mainprise'];
                                $scratchprice1 = $row7['scratchprise'];
                                $count++;
                                if($count<=3)
                                {
            
                ?>
                <div class="services-block-alt col-md-4">
                    <div class="image">
                        <a href="pro_details1.php?id=<?php echo $row7['id']?>" class="image-scale-color text-product"> <?php echo "<img src='kipara/".$row7['img1']." ' alt='' style='height: 260px;' >";?></a>
                    </div>
                    <div class="caption">
                        <h4><a href="pro_details1.php?id=<?php echo $row7['id']?>"><?php echo $productname;?></a></h4>
                        <h4><b>Rs.&nbsp;<?php echo $mainprice;?> <del>Rs.&nbsp;<?php echo $scratchprice;?></del></b></h4>			
                        <div class="text">
                            <a class="btn btn-cart btn-invert" href="pro_details1.php?id=<?php echo $row7['id']?>"><span><i class="fa fa-shopping-cart"></i></span></a>&nbsp;&nbsp;
                            <a class="btn" href="pro_details1.php?id=<?php echo $row7['id']?>"><span><i class="fa fa-cog"></i>&nbsp;&nbsp;Details</i></span></a>
                            </div>	
                    </div>	
            </div>
                <?php }} ?>
            </div>
        </div>  

    </div>
</div>
</div>
</div>
</div>


<?php
include "footer.php";
?>