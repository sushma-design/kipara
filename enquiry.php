<?php
include "header.php";
include "menu.php";
?>

<script>					
    function isNumber(evt)
    {
        evt = (evt) ? evt : window.event;
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57)) 
        {
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

        if (name1 == '') 
        {
            alert("Please Enter Name");
            $("#name").focus();
            return false;
        }
        if (phone == '') 
        {
            alert("Please Enter Phone No");
            $("#phone").focus();
            return false;
        }
        if (email == '') 
        {
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
        }
        if (enq == '') 
        {
            alert("Please Enter Message");
            $("#message").focus();
            return false;
        }
        else 
        {
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
                success: function(data) 
                {
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



<input type="hidden" id="page" value="enquiry">
<div id="pageTitle">
    <div class="container">
        <!-- Breadcrumbs Block -->
        <div class="breadcrumbs">
            <ul class="breadcrumb">
                <li><a href="index.php">Home</a></li>
                <li class="active">Enquiry</li>
            </ul>
        </div>
        <!-- //Breadcrumbs Block -->
        <h1>Enquiry</h1>
    </div>
</div>

<div id="pageContent">
    <!-- Block -->
    <div class="block offset-sm">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="h-lg">Send Us Your <span class="color"><b> Enquiry Below!</b></span></h3>
                    <br>	
					<form  id="comment_form" style="margin-top:-15px;" action="" method="POST">
						<div class="row">
							<div class="form-group col-md-12">
								<div id="result" class="text-center"></div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="input-wrapper">
									<input type="text" class="input-custom input-full1" placeholder="Name"  name="name" id="name"  required>
								</div>
							</div>
							<div class="col-md-12">
								<div class="input-wrapper">
									<input type="text" class="input-custom input-full1" onkeypress="return isNumber(event);" placeholder="Number" name="phone" id="phone" required>
								</div>
							</div>
							<div class="col-md-12">
								<div class="input-wrapper">
									<input type="email" class="input-custom input-full1" placeholder="Email-Id" name="email" id="email" required>
								</div>
							</div>
							<div class="col-md-12">
								<div class="input-wrapper">
									<textarea class="textarea-custom input-full1" name="message" id="message" placeholder="Your Message" required></textarea>
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
					
                <div class="col-sm-1"></div>
                <div class="col-sm-5">
                    <img style="" alt="" src="images/eq1.jpg" >
                </div>
            </div>
        </div>
    </div>
</div>
        <!-- //Block -->

<?php
    include "footer.php";
?>