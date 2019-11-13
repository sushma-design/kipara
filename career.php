<?php
$page = 'career';
include "header.php";
include "menu.php";
//$date = date('Y-m-d');
?>


    <input type="hidden" id="page" value="career">
    <div id="pageTitle">
        <div class="container">
            <!-- Breadcrumbs Block -->
            <div class="breadcrumbs">
                <ul class="breadcrumb">
                    <li><a href="index.php">Home</a></li>
                    <li class="active">Career</li>
                </ul>
            </div>
            <!-- //Breadcrumbs Block -->
            <h1>Career</h1>
        </div>
    </div>
	


    <div id="pageContent">
        <!-- Block -->
        <div class="block offset-sm">
            <div class="container">

                <div class="row">

                    <div class="col-sm-7">

                        <h3 class="h-lg">Want to Join Our Company? <span class="color"><b> Apply Now !</b></span></h3>
                        <br>

                        <form id="career_form" class="career_form" name="career_form" action="saveresume.php" method="post" enctype="multipart/form-data">

                            <!--<input type="hidden" class="form-control" id="date" name="date" value="<?php echo $date; ?>" required>-->

                            <div class="input-wrapper">
                                <input type="text" class="input-custom input-full" id="name" name="name" placeholder="Your name*" required>
                            </div>
                            <div class="input-wrapper">
                                <input type="email" class="input-custom input-full" id="email" name="email" placeholder="E-mail*" required>
                            </div>
                            <div class="input-wrapper">
                                <input type="text" class="input-custom input-full" id="city" name="city" placeholder="City*" required>
                            </div>
                            <div class="input-wrapper">
                                <input type="text" class="input-custom input-full" id="contact" name="contact" placeholder="Your Phone*" onkeypress="return isNumber(event);" required>
                            </div>


                            <div class="input-wrapper">
                                <textarea class="textarea-custom input-full" id="message" name="message" placeholder="Your Message"></textarea>
                            </div>
                            <div class="input-wrapper">
                                <label for="form_attachment">Upload Resume<small>*</small></label>
                                <input type="file" required id="file1" name="file1" accept="resume/*" multiple data-show-upload="false"  data-show-caption="true" />

                                <small>Maximum upload file size: 12 MB</small>
                            </div>

                            <input type="submit" value="Apply Now" id="submit-contact" class="btn"><i class="icon icon-lightning"></i>
                        </form>
                    </div>
					<!-- Contact Form Validation-->
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
                                var charCode = (evt.which) ? evt.which : event.keyCode;
                                if (charCode != 46 && charCode > 31
                                    && (charCode < 48 || charCode > 57)){
                                    return false;
                                }


                                return true;
                            }


                        </script>

                    <div class="col-sm-5">
                        <img style="" alt="" src="images/careers1.jpg" >
                        </div>

                </div>
            </div>
        </div>
        <!-- //Block -->
    </div>


<?php
include "footer.php";

?>