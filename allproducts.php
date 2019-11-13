<?php
require_once('connection.php');
include "header.php";
include "menu.php";
$limit = 9;
//$id = $_REQUEST['id'];
// $category = $_POST['itemcat'];
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
.services-block-alt .caption {
  background-color: #f5f4f4;
  color: #fff;
  font-size: 18px;
  line-height: 26px;
  padding: 15px 20px 23px;
  
 }

</style>

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

	<div class="col-md-3">
             <?php include "productsidebar.php"?>
						
    </div>
    <div class="col-md-9">
 <?php

                 if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };  
                 $start_from = ($page-1) * $limit;  
				//  echo $start_from;
            $result = mysql_query("SELECT * FROM product WHERE deletestatus='YES' ORDER BY id DESC LIMIT $start_from, $limit");
            while($row1 = mysql_fetch_array($result)) {
                //$cat = $row1['category'];
                $productname = $row1['productname'];
                $mainprice = $row1['mainprise'];
                $scratchprice = $row1['scratchprise'];
                $product = $row1['productid'];
                $categoty = $row1['category'];
                $img1 = $row1['img1'];
               
                ?>

    <div class="services-block-alt col-md-4">

        <div class="image" style="height: 260px;">
            <a href="pro_details1.php?id=<?php echo $row1['id']?>" class="image-scale-color text-product" style="height: 260px;"> <?php echo "<img src='kipara/".$row1['img1']." ' alt='' style='height: 260px;'>";?></a>
        </div>
        <div class="caption" style="height: 186px;">
            <h4><a href="pro_details1.php?id=<?php echo $row1['id']?>"><?php echo $productname;?></a></h4>
			<h4><b>Rs.&nbsp;<?php echo $mainprice;?> <del>Rs.&nbsp;<?php echo $scratchprice;?></del></b></h4>
			<div class="text">
				<a class="btn btn-cart btn-invert" href="pro_details1.php?id=<?php echo $row1['id']?>"><span><i class="fa fa-shopping-cart"></i></span></a>&nbsp;&nbsp;
				<a class="btn" href="pro_details1.php?id=<?php echo $row1['id']?>"><span><i class="fa fa-cog"></i>&nbsp;&nbsp;Details</i></span></a>
				</div>
		</div>	
    </div>
    
	 <?php } ?>
     <!-- <input type ="text" value="<?php echo $product; ?>" name="productid" id="productid"> -->
    <!-- <input type ="text" value="<?php echo $category; ?>" name="itemcat" id="itemcat"> -->
   </div>
	
	<div class="row">
        <div class="col-sm-12">
            <nav>
            <ul class="pagination theme-colored pull-right xs-pull-center mb-xs-40">
            <?php
                $sql = "SELECT COUNT(id) FROM product WHERE deletestatus='YES'";  
				$rs_result = mysql_query($sql);  
				$row = mysql_fetch_row($rs_result);  
                $total_records = $row[0];  
                //echo $total_records;
                $total_pages = ceil($total_records / $limit);  
            ?>
            <li>
                <?php echo "<a href='allproducts.php?page=1' style='color: #fbdd12; background-color:#000;'> First </a>"; ?>
            </li>
            <li class="<?php if($page <= 1){ echo 'disabled'; } ?>">
                <a href="<?php if($page <= 1)
                {
                    echo '#'; 
                } else {
                    echo "allproducts.php?page=".($page - 1);
                }?> " style='color: #fbdd12; background-color:#000;'>  Prev </a>
            </li>
            <li>
                <a href="#" style='color: #000; background-color:#fbdd12;' ><?php echo $page; ?></a>
            </li>
            <li class="<?php if($page >= $total_pages){ echo 'disabled'; } ?>">
                <a style='color: #fbdd12; background-color:#000;' href="<?php if($page >= $total_pages)
                {
                    echo '#'; 
                } else { 
                    echo "allproducts.php?page=".($page + 1);}?> " >  Next </a>
            </li>
            <li>
                <?php echo "<a href='allproducts.php?page=$total_pages' style='color: #fbdd12; background-color:#000;'> Last </a>"; ?>
            </li>    
        </ul>
			
                <!-- <ul class="pagination theme-colored pull-right xs-pull-center mb-xs-40">
				
                    <?php  
						$sql = "SELECT COUNT(id) FROM product WHERE deletestatus='YES'";  
						$rs_result = mysql_query($sql);  
						$row = mysql_fetch_row($rs_result);  
						$total_records = $row[0];  
						$total_pages = ceil($total_records / $limit);  
						$pagLink = "<div class='pagination'>";  
						for ($i=1; $i<=$total_pages; $i++) { 
                             
									 $pagLink .= "<a href='allproducts.php?page=".$i."' style='padding: 12px 12px; background-color: #fbdd12; color:white;'>".$i."</a>&nbsp";
						};  
						echo $pagLink . "</div>";  
						?>
                </ul> -->
            </nav>
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