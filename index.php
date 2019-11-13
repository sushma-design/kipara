<?php
include "header.php";
include "menu.php";
?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdn.shopify.com/s/files/1/0901/8774/t/2/assets/assets.css?9468484036412095268">
<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css">
<style>

.title-product {
	color #000;
	font-size: 21px;
	font-weight: 600;
    color: #000000;
	text-align: left;
	margin: -11px 0px 11px;
	
}
.services-block-alt .text {
	text-align: left;
	font-size: 22px;
	
}

.col-item
{
    border: 1px solid #E1E1E1;
    border-radius: 5px;
    background: #FFF;
}
.col-item .photo img
{
    margin: 0 auto;
    width: 100%;
}

.col-item .info
{
    padding: 10px;
    border-radius: 0 0 5px 5px;
    margin-top: 1px;
}

.col-item:hover .info {
    background-color: #F5F5DC;
}
.col-item .price
{
    /*width: 50%;*/
    float: left;
    margin-top: 5px;
}

.col-item .price h5
{
    line-height: 20px;
    margin: 0;
}

.price-text-color
{
    color: #000000;
}

.col-item .info .rating
{
    color: #777;
}

.col-item .rating
{
    /*width: 50%;*/
    float: left;
    font-size: 17px;
    text-align: right;
    line-height: 52px;
    margin-bottom: 10px;
    height: 52px;
}

.col-item .separator
{
    border-top: 1px solid #E1E1E1;
}

.clear-left
{
    clear: left;
}

.col-item .separator p
{
    line-height: 20px;
    margin-bottom: 0;
    margin-top: 10px;
    text-align: center;
}

.col-item .separator p i
{
    margin-right: 5px;
}
.col-item .btn-add
{
    width: 50%;
    float: left;
	border-right: 1px solid #E1E1E1;
}

.col-item .btn-details
{
    width: 50%;
    float: left;
    padding-left: 10px;
}
.controls
{
    margin-top: 20px;
}
[data-slide="prev"]
{
    margin-right: 15px;
    margin-left: 15px;
	margin-top: 9px;
}


a {
    text-decoration: none;
    display: inline-block;
    padding: 3px 3px;
}

.captionslide {
	background-color: #f5f4f4; 
	padding: 14px;
}

.row1 {
    margin-right: 6px;
    margin-left: 5px;
	margin-top: 8px;
}

.slider {
	font-size: 22px;
	height: 49px;
	width: 100px;
	background-color: #131313;
	vertical-align: middle;
	margin-top: -12px;
}
.previous {
    background-color: #000000;
    color: white;
}

.next {
    background-color: #000000;
    color: white;
}

.round {
    border-radius: 50%;
}

</style>

<body>
<!-- Body Start --> 
<input type="hidden" id="page" value="index">

<!-- Slider -->
<div id="mainSliderWrapper">
    <div id="mainSlider">
        <div class="slide">
            <div class="img--holder" style="background-image: url(images/banner/banner2.jpg); height:250px;"></div>
            <div class="slide-content center">
                <div class="vert-wrap container">
                    <div class="vert">
<!--                        <div class="container">-->
<!--                            <h4 data-animation="zoomIn" data-animation-delay="0.8s">Bring Out the <span class="color"><strong>Wow</strong></span></h4>-->
<!--                            <h3 data-animation="fadeInUp" data-animation-delay="0.2s">Factor In Your Car</h3>-->
<!--                            -->
<!--                        </div>-->
                    </div>
                </div>
            </div>
        </div>
       <div class="slide">
            <div class="img--holder" style="background-image: url(images/banner/last_last_last2.jpg); height:250px;"></div>
            <div class="slide-content container left">
                <div class="vert-wrap">
                    <div class="vert">
<!--                        <div class="container">-->
<!---->
<!--                            <h4 data-animation="zoomIn" data-animation-delay="0.8s">Beyond clean and <span class="color"><strong>more than</strong></span></h4>-->
<!--                            <h3 data-animation="zoomIn" data-animation-delay="0.2s">just shine!</h3>-->
<!--							<p data-animation="fadeIn" data-animation-delay="1.2s">Swirl Marks, Oxidation, Bird Droppings, Hazing, Hard Water Deposits, Minor Scratches</p>-->
<!--                         </div>-->
                    </div>
                </div>
            </div>
        </div>
        <div class="slide">
            <div class="img--holder" style="background-image: url(images/banner/krbanner1.jpg); height:250px;"></div>
            <div class="slide-content container left">
                <div class="vert-wrap">
                    <div class="vert">
<!--                        <div class="container">-->
<!--                            <h4 data-animation="zoomIn" data-animation-delay="0.8s">Get a showroom <span class="color"><strong> shine,</strong></span></h4>-->
<!--                            <h3 data-animation="zoomIn" data-animation-delay="0.2s">every time</h3>-->
<!---->
<!---->
<!---->
<!--                        </div>-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Slider -->

<!-- Content  -->
<div id="pageContent">
	<!-- Under Slider Banner -->
	<div class="block banner-under-slider">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="negative-margin-img">
                    <img src="images/part2.png" class="img-responsive" alt="">
                </div>
            </div>
            <div class="col-md-8">
                    <h4 data-animation="zoomIn" data-animation-delay="0.8s">Become <span class="color"><strong>Our Partner</strong></span></h4>
<!--                    <h3 data-animation="zoomIn" data-animation-delay="0.2s"><span class="color"> Partner</span></h3>-->
                    <p class="info">Join our hands and become world class car care beautification center</p>
                <a href="about.php" class="btn btn-full btn-border"><span>Know more</span></a>
            </div>
<!---->
<!--            <div class="col-md-2">-->
<!--                <div class="action hidden-xs">-->
<!--                    <a href="about.php" class="btn btn-full btn-border"><span>Know more</span></a>-->
<!--                </div>-->
<!--            </div>-->
        </div>
    </div>
	</div>
	<!-- // Under Slider Banner -->

	<!-- Appointment Block -->
	<div class="block">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <div class="text-appointment">
                    <h1 class="h-lg">Welcome To <br/><span class="color"><b>Kinjal Autochem India</b></span></h1>
                    <h5>ISO 9001:2015 &nbsp;&nbsp; ISO 14001:2004 &nbsp;&nbsp; GMP Certification</h5>
                    <p class="info">Welcome to the Kinjal Autochem India. Established in the year 2011, at Pune (Maharashtra, India), Kinjal Autochem India, and is actively engaged in Manufacturing, Trading and Supplying an excellent quality assortment of Car Dresser, Car Polish, Car Wash and Wax Shampoo, Hard Water Spot Remover, Microfiber Cloths, Interior Cleaning Spray, Multipurpose Liquid Soap, Tar Remover and many more, etc.</p>
                </div>
            </div>
            <div class="col-md-5">
                <div class="img-move animation" data-animation="fadeInRight" data-animation-delay="0s">
                    <img src="images/home.png" alt="" class="img-responsive">
                </div>
            </div>
        </div>
    </div>
	</div>

	<!-- Services List Block -->
	<div class="block bg-1">
    <div class="container">
        <h2 class="h-lg text-center">Our <span class="color">Products</span></h2>
        <p class="info text-center">Includes Manufacturing, Trading and Supplying in:</p>
        <div class="row" id="slideMobile">
            <div class="col-sm-4 col-md-4">
                <ul class="marker-list">
                    <li>3 in one Dressers</li>
                    <li>Tyre Polish</li>
                    <li>Dash Board Polish</li>
                    <li>Wash & Wax</li>
					<li>Eco Car Wash</li>

                </ul>
            </div>
            <div class="col-sm-4 col-md-4 view-more-mobile">
                <ul class="marker-list">
                    <li>Microfiber Cloths</li>
                    <li>Vacume Cleaner</li>
                    <li>Interior Cleaner</li>
                    <li>Car Washer</li>
                    <li>Rubbing Polish</li>


                </ul>
            </div>
            <div class="col-sm-4 col-md-4 view-more-mobile">
                <ul class="marker-list">
                    <li>Car Body Polish</li>
                    <li>Car Freshener</li>
                    <li>Green Car Wash</li>
                    <li>Dry Wash</li>
                    <li>Engine Cleaner</li>

                </ul>
            </div>
        </div>
        <div class="text-center">
			<a href="#slideMobile" class="view-more-link color"><span class="more">All Services</span><span class="less">Hide All Services</span></a>
        </div>
    </div>
	</div>
	<!-- //Services List Block -->

	<!-- Services Block -->
	<div class="block">
    <div class="container">
        <h2 class="h-lg text-center">Why To Choose Us?</h2>
        <div class="row text-icon-carousel">
            <div class="col-sm-4 col-md-4">
                <div class="text-icon">
                    <div class="icon-wrapper"><span><i class="icon icon-diploma"></i><span class="icon-hover"></span></span>
                    </div>
                    <h4 class="title"><b>Good Products</b></h4>
                    <p class="text">To supply customers with details around the features and benefits of the product so they’re compelled to buy.</p>
                </div>
            </div>
            <div class="col-sm-4 col-md-4">
                <div class="text-icon">
                    <div class="icon-wrapper"><span><i class="icon icon-transport"></i><span class="icon-hover"></span></span>
                    </div>
                    <h4 class="title"><b>Effective Price</b></h4>
                    <p class="text">It is something that is a good value, where the benefits and usage are worth at least what is paid for them.</p>
                </div>
            </div>
            <div class="col-sm-4 col-md-4">
                <div class="text-icon">
                    <div class="icon-wrapper"><span><i class="icon icon-arrows-2"></i><span class="icon-hover"></span></span>
                    </div>
                    <h4 class="title"><b>Good Service</b></h4>
                    <p class="text">We stand behind our goods &nbsp;&nbsp; &nbsp; &nbsp;&nbsp;and services and  want&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  you to be satisfied with &nbsp;&nbsp; them.
                    </p>
                </div>
            </div>
        </div>
    </div>
	</div>
	<!-- //Services Block -->

	<!--//Products Block-->
	<div class="container color-yellow">
       <div class="row1">
            <div class="col-md-6">
		        <h3 class="text-left1"><b>OUR PRODUCTS</b></h3>
            </div>
            <div class="col-md-6">
				<div class="slider controls pull-right hidden-xs">
                    <a class="fa fa-arrow-left" style="color: #fff;" href="#carousel-example" data-slide="prev"> </a>
                    <a class="fa fa-arrow-right" style="color: #fff" href="#carousel-example" data-slide="next"></a>
                </div>
            </div>
      </div>
	</div>

	<div class="block">
		<div class="container">
			<div class="services-alt tab-pane fade in active" id="services1">
				
					<br/><br/>
						<div id="carousel-example" class="carousel slide hidden-xs" data-ride="carousel">
							<!-- Wrapper for slides -->
							<div class="carousel-inner">
								<div class="item active">
									<div class="row">
									<?php

										$count = 0;
										$result = mysql_query("SELECT * FROM product WHERE deletestatus='YES' ");
										while($row1 = mysql_fetch_array($result))
										{
											//$cat = $row1['category'];
											$productname = $row1['productname'];
											$mainprice = $row1['mainprise'];
											$scratchprice = $row1['scratchprise'];
											$img1 = $row1['img1'];
											$count = $count +1;
											$number = $count % 4;
											if($count <= 4)
											{
											?>
		
											<div class="col-sm-3">
											<div class="col-item">
												<div class="photo">
													<a href="pro_details1.php?id=<?php echo $row1['id']?>" class="img-responsive"><?php echo "<img src='kipara/".$row1['img1']." ' alt='' style='height: 243px;' >";?></a>
												</div>
												<div class="captionslide">
													<h4 class="title-p"><a href="pro_details1.php?id=<?php echo $row1['id']?>"><?php echo $productname;?></a></h4>
													<h4 class="title-product">Rs.&nbsp;<?php echo $mainprice;?> <del>Rs.&nbsp;<?php echo $scratchprice;?></del></h4>
													<div class="text">
														<a class="btn btn-cart btn-invert" href="pro_details1.php?id=<?php echo $row1['id']?>"><span><i class="fa fa-shopping-cart"></i></span></a>&nbsp;&nbsp;
														<a class="btn" href="pro_details1.php?id=<?php echo $row1['id']?>"><span><i class="fa fa-cog"></i>&nbsp;&nbsp;Details</i></span></a>
													</div>
												</div>
											</div>
											</div>
											<?php }	
											else { 
												if($number == '1')
												{ ?>
									</div>
								</div>
								<div class="item">
									<div class="row">
										<div class="col-sm-3">
											<div class="col-item">
												<div class="photo">
													<a href="pro_details.php?id=<?php echo $row1['id']?>" class="img-responsive"><?php echo "<img src='kipara/".$row1['img1']." ' alt='' >";?></a>
												</div>
												<div class="captionslide">
													<h4 class="title-p"><a href="pro_details.php?id=<?php echo $row1['id']?>"><?php echo $productname;?></a></h4>
													<h4 class="title-product">Rs.&nbsp;<?php echo $mainprice;?> <del>Rs.&nbsp;<?php echo $scratchprice;?></del></h4>
													<div class="text">
														<a class="btn btn-cart btn-invert" href="pro_details.php?id=<?php echo $row1['id']?>"><span><i class="fa fa-shopping-cart"></i></span></a>&nbsp;&nbsp;
														<a class="btn" href="pro_details.php?id=<?php echo $row1['id']?>"><span><i class="fa fa-cog"></i>&nbsp;&nbsp;Details</i></span></a>
													</div>
												</div>
											</div>
										</div>
												<?php }
												else { ?>
												<div class="col-sm-3">
												<div class="col-item">
													<div class="photo">
														<a href="pro_details.php?id=<?php echo $row1['id']?>" class="img-responsive"><?php echo "<img src='kipara/".$row1['img1']." ' alt='' >";?></a>
													</div>
													<div class="captionslide">
														<h4 class="title-p"><a href="pro_details.php?id=<?php echo $row1['id']?>"><?php echo $productname;?></a></h4>
														<h4 class="title-product">Rs.&nbsp;<?php echo $mainprice;?> <del>Rs.&nbsp;<?php echo $scratchprice;?></del></h4>
														<div class="text">
															<a class="btn btn-cart btn-invert" href="pro_details.php?id=<?php echo $row1['id']?>"><span><i class="fa fa-shopping-cart"></i></span></a>&nbsp;&nbsp;
															<a class="btn" href="pro_details.php?id=<?php echo $row1['id']?>"><span><i class="fa fa-cog"></i>&nbsp;&nbsp;Details</i></span></a>
														</div>
													</div>
												</div>
												</div>
												<?php } ?>
					
											<?php } ?>
				
										<?php } ?>				
									</div>
								</div>
           
							</div>
						</div>
					
    
				
			</div>
		</div>
	</div>
</div>
<!-- // Content  -->


<?php
include "footer.php";
?>


</body>
<!--</body>-->