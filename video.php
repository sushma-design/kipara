<?php
include "header.php";
include "menu.php";
?>
<!-- // Header -->
<input type="hidden" id="page" value="gallery">
<!-- Content  -->
<div id="pageTitle">
    <div class="container">
        <!-- Breadcrumbs Block -->
        <div class="breadcrumbs">
            <ul class="breadcrumb">
                <li><a href="index.php">Home</a></li>
                <li class="active">Video Gallery</li>
            </ul>
        </div>
        <!-- //Breadcrumbs Block -->
        <h1>Video Gallery</h1>
    </div>
</div>
<div id="pageContent">
    <!-- Block -->
    <div class="block">
        <div class="container">
            <!-- Filters -->
            <div class="filters-by-category">
                <ul class="option-set" data-option-key="filter">
                    <li><a href="#filter" data-option-value="*" class="selected">All</a></li>
                    <li><a href="#filter" data-option-value=".category1" class="">Car Maintenance</a></li>
                    <li><a href="#filter" data-option-value=".category2" class="">Vehicle Repair</a></li>
                    <li><a href="#filter" data-option-value=".category3" class="">Other</a></li>
                </ul>
            </div>
            <!-- //end Filters -->
            <div class="gallery gallery-isotope" id="gallery">
                <div class="gallery-item category3">
                    <div class="gallery-item-image">
                        <a href="https://www.youtube.com/watch?v=f1d-NJVDpTo"  target="_blank">
                            <img height="230px"  src="images/gallery/video1.jpg" alt="" style="border: 1px solid #000;padding: 7px;" />
                        </a>
						<span class="tags">
							<span class="pull-left" style="color: #fff;">Kipara Foam Lance</span>
						</span>
                    </div>
                </div>
                <div class="gallery-item category1">
                    <div class="gallery-item-image">
                        <a href="https://www.youtube.com/watch?v=YJLKGcie8UA" target="_blank">
                            <img height="230px" src="images/gallery/video2.jpg" alt="" style="border: 1px solid #000;padding: 7px;" />
                        </a>
                        <span class="tags">
							<span class="pull-left" style="color: #fff;">Kipara Foam Gun</span>
						</span>
                    </div>
                </div>
                <div class="gallery-item category2">
                    <div class="gallery-item-image">
                        <a href="https://www.youtube.com/watch?v=g_qHRGiinOQ" class="prettyPhoto kids_picture" target="_blank">
                            <img height="230px" src="images/gallery/video3.jpg" alt="" style="border: 1px solid #000;padding: 7px;" />
                        </a> 
                        <span class="tags">
							<span class="pull-left" style="color: #fff;">Kipara Foam Tank</span>
						</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- //Block -->
</div>
<!-- // Content  -->
<!-- Footer -->
<?php
    include "footer.php";
?>