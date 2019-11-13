<?php
session_start();
require_once('connection.php');
include "header.php";
include "menu.php";

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

?>

<!DOCTYPE html>
<html lang="en" >
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<style>
 
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
        border-radius: 4px;
    }
    
    @media screen and (max-width: 650px) {
        label {
            font-size: 0;
        }
        label:before {
            margin: 0;
            font-size: 18px;
        }
    }

    @media screen and (max-width: 400px) {
        label {
            padding: 15px;
        }
    }



    .button1 {
        background-color: white;
        color: black;
        border: 2px solid #fede00;
    }
    #div1{
        border: 1px solid #dcdcdc;
        border-style: solid;
    }
    .div2{
        border: 1px solid #dcdcdc;
        border-style: solid;
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

    function isNumber(evt) {
        evt = (evt) ? evt : window.event;
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            return false;
        }
        return true;
    }

    function saveform1()
    {
        var name = $("#name").val();
        var lname = $("#lname").val();
        var email = $("#email").val();
        var contact1 = $("#contact1").val();
        var add = $("#add").val();
        var city = $("#city").val();
        var pin = $("#pin").val();

        if(name== '')
        {
            alert("Please Fill name");
            return false;
        }
        else if(lname== '')
        {
            alert("Please Fill last name");
            return false;
        }
        else if(email== '')
        {
            alert("Please Fill Email");
            return false;
        }
        else if(contact1== '')
        {
            alert("Please Fill Contact No");
            return false;
        }
        else if(add== '')
        {
            alert("Please Fill Shipping address");
            return false;
        }
        else if(city== '')
        {
            alert("Please Fill City");
            return false;
        }
        else if(pin== '')
        {
            alert("Please Fill Pincode");
            return false;
        }
        else
        {
            document.getElementById("btn_order_submit").disabled = true;
            document.form1.action = "saveinfo.php";
            document.form1.submit();             // Submit the page
            return true;
        }
    }
</script>


<input type="hidden" id="page" value="product">
<!-- Content  -->
<div id="pageTitle">
    <div class="container">
        <!-- Breadcrumbs Block -->
        <div class="breadcrumbs">
            <ul class="breadcrumb">
                <li><a href="index.html">Home</a></li>
                <li class="active">Checkout</li>
            </ul>
        </div>
        <!-- //Breadcrumbs Block -->
        <h1>Your <span class="color">Checkout</span></h1>
    </div>
</div>

<div id="pageContent">
    <div class="block">
        <div class="container">
            <div class="row">
                <div class="col-md-11" align="right" style="padding-bottom: 20px">
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

                <div class="col-md-12 block offset-md">
                    <div class="container">

                        <div class="row">
                            <h3 class="h-lg">Shipping Address<span class="color"><b> Details!</b></span></h3>
                            <br>
                            <form name="form1" method="post" role="form" class="">
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="form-group" style="background-color:#eee; height: 40px;">
                                            <label style="padding:5px; font-size: 18px; color: #000;"> Billing Information </label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group">
                                            <p>Fill out this form before making payment</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="First Name"  name="name" id="name"  required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Last Name"  name="lname" id="lname"  required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <input type="email" class="form-control" placeholder="Email" name="email" id="email" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <input type="text" class="form-control" onkeypress="isNumber(event);" placeholder="Phone No" name="contact1" id="contact1" >
                                            </div>
                                        </div>
                                        <div class="form-group col-md-8">
                                            
                                                <textarea class="form-control" placeholder="Shipping Address" name="add" id="add" required></textarea>
                                            
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control"  placeholder="Landmark" name="landmark" id="landmark" >
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Town/City" name="city" id="city" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="State" name="state" id="state" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" onkeypress="return isNumber(event);" placeholder="Pincode" name="pin" id="pin" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top: 20px;">
                                        <div class="form-group" style=" background-color:#eee; height: 40px;">
                                            <label style="padding:5px; font-size: 18px; color: #000;"> Payment Information </label>
                                        </div>
                                    </div>

                                    <div class="row" style="margin-top: 20px;">
                                        <div class="form-group col-md-6" style="">
                                            <input type="radio" name="cash" id="payment-1" style="" checked /> Cash on Delivery
                                            <br/><input type="radio" name="net" id="payment-2" style=""  /> Online Payment
                                        </div>
                                        
                                    </div>

                                    <div class="row" style="margin-top: 20px;text-align:center">
                                        <div class="col-md-12">

                                            <div class="form-group">
                                                <div class="btn-submit btn-common-white">
                                                    <input type="button" onclick="saveform1();" value="Continue" class="button button5" id="btn_order_submit" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4" style="padding-left: 95px;">
                                    <table width="100%" style="border:1px solid #EEEEEE;border-radius: 10px;!important;">
                                        <tbody>
                                        <tr>
                                            <td style="text-align: center; padding-top: 15px;">
                                                <h3>Order Summary</h3>
                                            </td>
                                        </tr>
                                        <?php
                                        $count =count($_SESSION['qty']);
                                        $count1 = 0; $grandtot=0;
                                        for($i=0;$i<$count;$i ++)
                                        {
                                            $count1 = $count1 + 1;
                                            $qty = $_SESSION['qty'][$i];
                                            $item = $_SESSION['item'][$i];
                                            $itemid = $_SESSION['itemid'][$i];
                                            $price = $_SESSION['price'][$i];
                                            $totprice = $_SESSION['totprice'][$i];

                                            $grandtot = $grandtot + $totprice;
                                            ?>
                                            <tr style="padding-top: 20px;">
                                                <td style="padding-left: 20px;">
                                                    <span><?php echo $item.' ('.$qty.')'; ?></span> : <input type="hidden" name="qty[]" value="<?php echo $qty; ?>" />
                                                    <span><i class="fa fa-inr" aria-hidden="true"></i> <?php echo $price*$qty;?></span>
                                                    <input type="hidden" name="item[]" id="item" value="<?php echo $item; ?>" />
                                                    <input type="hidden" name="itemid[]" id="itemid" value="<?php echo $itemid; ?>" />
                                                    <input type="hidden" name="price[]" id="price" value="<?php echo $price; ?>" />
                                                </td>
                                            </tr>
                                        <?php } ?>

                                        <tr style="margin-top:10px; ">
                                            <td>
                                                <h4 style="padding-left: 20px; float: left;">Total ( <?php echo $count; ?> item) : </h4> &nbsp; <h3 style="float:left"><i class="fa fa-inr" aria-hidden="true" ></i> <span id="grandtotal" ><?php echo $grandtot; ?> </span></h3>
                                                <input type="hidden" name="grandtot" id="grandtot" value="<?php echo $grandtot; ?>" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p> </p>
                                            </td>
                                        </tr>

                                        </tbody>
                                    </table>
                                    <div style="text-align:right; margin-top:20px;">
                                        <a href="cart.php" style="color: blue"> <i class="fa fa-long-arrow-left" aria-hidden="true"></i> Back to Cart </a>
                                    </div>
                                </div>

                            </form>
                        </div></div></div>
            </div>
        </div>
    </div>
</div>

<?php include "footer.php";?>

</body>
</html>