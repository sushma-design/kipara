<?php
$page = 'news';
include "header.php";
include "menu.php";

$id = $_REQUEST['id'];
$result = mysql_query("SELECT * FROM product WHERE id='$id' AND deletestatus='YES'");
$row1 = mysql_fetch_array($result);
$cat = $row1['category'];
$productname = $row1['productname'];
$mainprice = $row1['mainprise'];
$scratchprice = $row1['scratchprise'];
//$description = $row1['description'];
$img1 = $row1['img1'];
$img2 = $row1['img2'];
$img3 = $row1['img3'];
$img4 = $row1['img4'];

$count = $_SESSION['no'];
$rs = $_SESSION['rs'];

if($count == '')
{
    $_SESSION['qty'] = array();
    $_SESSION['item'] = array();
    $_SESSION['price'] = array();
    $_SESSION['size'] = array();
    $_SESSION['totprice'] = array();
}
unset($_SESSION['page']);
$_SESSION['page'] = "news.php";
?>
 <input type="hidden" id="page" value="news"/>   
    <!-- Content  -->
    <div id="pageTitle">
			<div class="container">
				<!-- Breadcrumbs Block -->
				<div class="breadcrumbs">
					<ul class="breadcrumb">
						<li><a href="index.html">Home</a></li>
						<li class="active">News</li>
					</ul>
				</div>
				<!-- //Breadcrumbs Block -->
				<h1> <span class="color">News</span></h1>
			</div>
		</div>
		<div id="pageContent">
			<div class="block">
				<div class="container">
					<div class="blog-isotope">
                    <?php 
                $result= mysql_query("SELECT * FROM news WHERE deletestatus='yes' ORDER BY id DESC");
                while($row = mysql_fetch_array($result)){
                $title = $row['title'];
                $content = $row['content'];
                $date = $row['date'];
                $img1 = $row['img1'];

                // echo $img1;
       
            ?>
			<div class="blog-post" style="height: 550px;">
		        <div class="post-image">
			        <?php echo "<img src='kipara/".$row['img1']." ' alt='' style='height: 250px;' >";?>
		        </div>
		        <ul class="post-meta">
			       <!-- <li class="author">by <b><i>Paul Johnson</i></b></li> -->
			        <li><i class="icon icon-clock"></i><span><?php echo $row['date']; ?></span></li>
			        <!-- <li><i class="icon icon-interface"></i><span>3</span></li> -->
		        </ul>
		        <h2 class="post-title"><?php echo $row['title']; ?></h2>
		        <div class="post-teaser">
			        <p><?php echo $content=substr($content, 0, 220).'  ...'; ?></p>
		        </div>
		        <!-- <a href="blog-single.html" class="btn"><span>Continue Reading</span></a>  -->
            </div>
        <?php  } ?>
					</div>
				</div>
			</div>
		</div>
        <!-- // Content  -->
        <?php include "footer.php";?>