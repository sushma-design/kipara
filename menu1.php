<?php
require_once('connection.php');
?>

<script type="text/javascript">
    // function classactive()
    // {
    //     var page = $("#page").val();
    //     // alert (page);
    //     $("#mytable>ul>li.active").removeClass("active");
    //     var element = document.getElementById(page);
    //     element.className += " " + "active";
    //     if(page == 'index')
    //     { document.getElementById("bodyclass").className = 'home';}

    //     else{$("#bodyclass").removeClass("home");}
    // }



</script>

<body onload="" id="bodyclass">
<!-- Loader -->
	<div id="loader-wrapper">
		<div class="loader">
			<div class="line"></div>
			<div class="line"></div>
			<div class="line"></div>
			<div class="line"></div>
			<div class="line"></div>
			<div class="line"></div>
			<div class="subline"></div>
			<div class="subline"></div>
			<div class="subline"></div>
			<div class="subline"></div>
			<div class="subline"></div>
			<div class="loader-circle-1">
				<div class="loader-circle-2"></div>
			</div>
			<div class="needle"></div>
			<div class="loading">Loading</div>
		</div>
	</div>
<!-- //Loader -->

<!-- Header -->
<header class="page-header">
    <nav class="navbar" id="slide-nav">
        <div class="container">
            <div class="header-row">
                <div class="logo">
                    <a href="index.php"><img src="images/kiparanewlogo.png" alt="Logo"></a>
                </div>
                <div class="header-right">
                    <button type="button" class="navbar-toggle"><i class="icon icon-lines-menu"></i></button>
                    <div class="header-right-top">
                        <div class="address">
<!--                            Monday-Sunday <span class="custom-color">24 * 7 Hours</span>-->
                                <a href="images/brochure.pdf" target="_blank" class="btn" style="margin: -8px;"><span>Brochure</span></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <a href="partner.php" class="btn" style="margin: -8px;"><span>Become Our Prtner</span></a>
                        </div>
                        <a href="#" class="appointment" data-toggle="modal" data-target="#appointmentForm"><i class="icon-shape icon"></i><span>Enquiry</span></a>
                    </div>
                    <div class="header-right-bottom">
                        <div class="header-phone"><span class="text">CALL US AT</span><span class="phone-number">+91-<span class="code">9766595564 / 9762907249</span></span>
                        </div>
                    </div>
                </div>
            </div>
            <div id="slidemenu">
                <div class="row">
                    <div class="col-md-9" id="mytable">
                        <div class="close-menu"><i class="icon-close-cross"></i></div>
                        <ul class="nav navbar-nav">
                            <li id="index"><a href="index.php"><span>Home</span></a></li>
                            <li class="dropdown" id="about"><a href="#"><span>About</span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li id="about"><a href="about.php">About Us</a></li>
									<li id="about"><a href="gallery.php">Certificates</a></li>
                                </ul>
                            </li>
                            <li id="product"><a href="allproducts.php"><span>Products</span></a></li>
                            <li id="news"><a href="news2.php"><span>News</span></a></li>
                            <li id="gallery"><a href="video.php"><span>Videos</span></a></li>
                            <!-- <li class="dropdown" id="gallery"><a href="#" data-toggle="dropdown" data-submenu=""><span>Gallery</span><span class="ecaret"></span></a>
                                <ul class="dropdown-menu" role="menu">
									<li  id="gallery"><a href="gallery.php">Photo Gallery</a></li>
									<li  id="gallery"><a href="video.php">Video Gallery</a></li>
                                </ul>
                            </li> -->
                            <li id="career"><a href="career.php"><span>Career</span></a></li>
                            <li id="enquiry"><a href="enquiry.php"><span>Enquiry</span></a></li>
                            <li id="contact"><a href="contact.php"><span>Contact</span></a></li>
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <div class="search-container">
                            <input placeholder="search" type="text">
                            <a class="button">
                                <i class="icon icon-search"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>
<!-- // Header -->