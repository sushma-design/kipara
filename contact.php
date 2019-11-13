<?php
include "header.php";
include "menu.php";
?>

    <script>

        function isNumber(evt) {
            evt = (evt) ? evt : window.event;
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                return false;
            }
            return true;
        }




        function saveform()
        {

            var name1 = $("#name").val();
            var phone = $("#phone").val();
            var email = $("#email").val();
            var enq = $("#message").val();

            if (name1 == '') {
                alert("Please Enter Name");
                $("#name").focus();
                return false;
            }
            if (phone == '') {
                alert("Please Enter Phone No");
                $("#phone").focus();
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


            if (enq == '') {
                alert("Please Enter Message");
                $("#message").focus();
                return false;
            }


            else {
                //alert("hii");
                //document.getElementById("message1").style.display ="block";

                $.ajax({
                    type: "POST",
                    url: "m1.php",
                    dataType: 'json',
                    data: {
                        name : name1,
                        phone : phone,
                        email :email,
                        message : enq
                    },
                    success: function(data) {
                        var id = data.id;
                        //alert(id);


                        if(id==1)
                        {

                            document.getElementById("message1").style.display ="block";
                            $("#name").val('');
                            $("#phone").val('');
                            $("#email").val('');
                            $("#message").val('');

                        }
                        if(id==0)
                        {
                            document.getElementById("message11").style.display ="block";
                            $("#name").val('');
                            $("#phone").val('');
                            $("#email").val('');
                            $("#message").val('');
                        }
                    }



                });
            }

            //document.getElementById("comment_form").reset();
        }


    </script>


<input type="hidden" id="page" value="contact">


<!-- Content  -->
<div id="pageTitle">
    <div class="container">
        <!-- Breadcrumbs Block -->
        <div class="breadcrumbs">
            <ul class="breadcrumb">
                <li><a href="index.php">Home</a></li>
                <li class="active">Contact</li>
            </ul>
        </div>
        <!-- //Breadcrumbs Block -->
        <h1>Contact</h1>
    </div>
</div>
<div id="pageContent">
    <!-- Block -->
    <div class="block offset-sm">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h6><i class="fa fa-phone-square" aria-hidden="true"></i> +91 9766595564 / +91 9762907249</h6>
                    <p><i class="fa fa-envelope" aria-hidden="true"></i><b> info@kipara.in</b></p>
                </div>
                <div class="col-md-8">If you have any questions or comments regarding us , please fill out a contact request form below. Or if you prefer, you can reach us at the following address:</div>
            </div>
            <div class="row row-grey">
                <div class="col-sm-4">
                    <div class="contact-info">
                        <h5>Post Address</h5>
                        <i class="icon icon-locate"></i>Gat No.752, Near Moshi Market yard, Boradewasti, Moshi,
                        <br>  Pune-412105, Maharashtra(India)
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="contact-info">
                        <h5>Business Hours</h5>
                        <i class="icon icon-clock"></i>
                        <li>Monday - Sunday</li>
                        <h5> &nbsp; 09:00 am - 08:00 pm</h5>
                        
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="contact-info">
                        <h5>Follow Us</h5>
                        <div class="social-links">
                            <ul>
                                <li>
                                    <a class="icon icon-facebook-logo" href="#"></a>
                                </li>
                                <li>
                                    <a class="icon icon-twitter-logo" href="#"></a>
                                </li>
                                <li>
                                    <a class="icon icon-instagram-logo" href="#"></a>
                                </li>
                                <li>
                                    <a class="icon icon-google-plus-logo" href="#"></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-5">
                    <h3 class="h-lg">Location <span class="color"><b>Map</b></span></h3>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3780.027802872134!2d73.8445829641399!3d18.662748319683047!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bc2c7febc356c5b%3A0xe39b368238291f2f!2sMarket+Yard%2C+Sector+No.+5%2C+Sanjay+Gandhi+Nagar%2C+Borhade+Wadi%2C+Moshi%2C+Maharashtra+412105!5e0!3m2!1sen!2sin!4v1515232724754" width="600" height="400" frameborder="0" style="border:0" allowfullscreen></iframe></iframe>
                </div>
                <div class="col-sm-2">
                </div>
                <div class="col-sm-5">
                    <h3 class="h-lg">Contact <span class="color"><b>Form</b></span></h3>
					<form  id="comment_form" style="margin-top:-15px;" action="" method="POST">
                    <div class="row">
                        <div class="form-group col-md-12">
							<div id="result" class="text-center"></div>
						</div>
					</div>

                    <div class="row">
						<div class="col-md-12">
                            <div class="input-wrapper">
                                <input type="text" class="input-custom input-full11" placeholder="Name"  name="name" id="name"  required>
                            </div>
                        </div>
						<div class="col-md-12">
                            <div class="input-wrapper">
                                <input type="text" class="input-custom input-full11" onkeypress="return isNumber(event);" placeholder="Number" name="phone" id="phone" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="input-wrapper">
                                <input type="email" class="input-custom input-full11" placeholder="Email-Id" name="email" id="email" required>
                            </div>
                        </div>
						<div class="col-md-12">
                            <div class="input-wrapper">
								<textarea class="textarea-custom input-full11" name="message" id="message" placeholder="Your Message" required></textarea>
							</div>
                            <div class="form-group">
                                <div class="btn-submit btn-common-white" >
                                    <button type="button" class="btn" onclick="saveform();"id="btn_order_submit" /><i class="icon icon-lightning"></i><span>Send Message</span></button>
								</div>      
							</div>
                        </div>
                    </div>
                   
					
					<div id="message1" style="display:none;border:2px solid #fede00;margin-top:10px; padding:10px;">
                         <h3>Message sent successfully...</h3>
                    </div>
                    <div id="message11" style="display:none;border:2px solid #fede00;margin-top:20px; padding:10px;">
                        <h3>Sorry, unable to send mail...</h3>
                    </div>
					</form>
                </div>

            </div>
        </div>
    </div>
    <!-- //Block -->
</div>
<?php
include "footer.php";

?>