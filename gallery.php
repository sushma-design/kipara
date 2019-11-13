<?php
include "header.php";
include "menu.php";
?>
<!-- // Header -->
<input type="hidden" id="page" value="about">
<!-- Content  -->
<div id="pageTitle">
    <div class="container">
        <!-- Breadcrumbs Block -->
        <div class="breadcrumbs">
            <ul class="breadcrumb">
                <li><a href="index.php">Home</a></li>
                <li class="active">Certificates</li>
            </ul>
        </div>
        <!-- //Breadcrumbs Block -->
        <h1>Certificates</h1>
    </div>
</div>
<div id="pageContent">
    <!-- Block -->
    <div class="block">
        <div class="container">
            <!-- Filters -->
            <!-- <div class="filters-by-category">
                <ul class="option-set" data-option-key="filter">
                    <li><a href="#filter" data-option-value="*" class="selected">All</a></li>
                    <li><a href="#filter" data-option-value=".category1" class="">Certificates</a></li>
                    <li><a href="#filter" data-option-value=".category2" class="">Vehicle Repair</a></li>
                    <li><a href="#filter" data-option-value=".category3" class="">Other</a></li>
                </ul>
            </div> -->
            <!-- //end Filters -->
            <div class="gallery gallery-isotope" id="gallery">
                <div class="gallery-item category1">
				    <div class="gallery-item-image">
						<img src="images/gallery/certificate1.jpg" alt="" />
							<a class="hover" href="images/gallery/certificate1.jpg">
								<span class="view">
								<span class="icon icon-search"></span>
								</span>
								<span class="tags">
								<span class="pull-left">Kinjal Autochem India(EMS)</span>
								
								</span>
							</a>
					</div>
                </div>
				<div class="gallery-item category1">
					<div class="gallery-item-image">
						<img src="images/gallery/certificate2.jpg" alt="" />
							<a class="hover" href="images/gallery/certificate2.jpg">
								<span class="view">
								<span class="icon icon-search"></span>
								</span>
								<span class="tags">
								<span class="pull-left">Kinjal Autochem India(GMP)</span>
								
								</span>
							</a>
					</div>
				</div>
				<div class="gallery-item category1">
					<div class="gallery-item-image">
						<img src="images/gallery/certificate3.jpg" alt="" />
							<a class="hover" href="images/gallery/certificate3.jpg">
								<span class="view">
								<span class="icon icon-search"></span>
								</span>
								<span class="tags">
								<span class="pull-left">Kinjal Autochem India(QMS)</span>
								
								</span>
							</a>
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