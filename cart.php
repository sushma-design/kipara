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
$id = $_REQUEST['id'];
// $catid = $_REQUEST['catid'];
$result1 = mysql_query("SELECT * FROM product WHERE id='$id' AND deletestatus='YES'");
$row11 = mysql_fetch_array($result1);
$cat = $row11['category'];
?>

<!DOCTYPE html>
<html lang="en" >

<head>
    <meta charset="UTF-8">
    <title></title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel='stylesheet prefetch' href='https://photoswipe.s3.amazonaws.com/pswp/dist/default-skin/default-skin.css'>
    <link rel="stylesheet" href="css/style.css">


</head>

<style>
    @import url('https://fonts.googleapis.com/css?family=Open+Sans:400,600,700');
    @import url('https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');

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


</style>
<script>
    function addtocart(name,rs,id)
    {

        var qty = $("#qty-"+id).val();
        var totalrs = parseFloat(qty) * parseFloat(rs);

        document.getElementById("button"+id).innerHTML = '<i class="fa fa-shopping-cart"></i>&nbsp;&nbsp; ADDED TO CART';
        document.getElementById("button"+id).setAttribute("class","button-red button5");

        $.ajax({
            type: "POST",
            url : "setarray.php",
            dataType : 'json',
            data : {
                rs : rs,
                qty : qty,
                item : name,
                price : totalrs
            },
            success : function(data)
            {
                var id = data.id;
                var sessionno = data.sessionno;
                var sessionrs = data.sessionrs;
                document.getElementById("no").innerHTML = sessionno;
                document.getElementById("rs").innerHTML = sessionrs;
            }
        });
    }

    function deleteRow(r,id)
    {
        var i = r.parentNode.parentNode.rowIndex;
        var item = $("#item-"+id).val();
        var price = $("#price-"+id).val();

        $.ajax({
            type: "POST",
            url : "deletefromarray.php",
            dataType : 'json',
            data : {
                item : item,
                price : price
            },
            success : function(data)
            {
                /*var id = data.id;
                 var sessionno = data.sessionno;
                 var sessionrs = data.sessionrs;
                 document.getElementById("no").innerHTML = sessionno;
                 document.getElementById("rs").innerHTML = sessionrs; */
            }
        });

        var v= i-1;
        document.getElementById("DataTable").deleteRow(v);
        var count = $("#counter").val();
        count = parseFloat(count) - 1;
        $("#counter").val(count);
        $("#no").text(count);
        calgrandTot();
    }

    function calTotal(id)
    {
        var qty = $("#qty-"+id).val();
        var price = $("#price-"+id).val();
        var total = parseFloat(qty) * parseFloat(price);
        if(!isNaN(total))
        {
            $("#totprice-"+id).val(total);
            calgrandTot();
        }

    }

    function calgrandTot()
    {
        var table = document.getElementById("DataTable");
        var rowCount = table.rows.length;
        var totamt1 = 0;
        for (var i = 0; i < rowCount; i++) {
            var a = document.getElementsByName("totprice[]")[i].value;
            if (!isNaN(parseFloat(a))) {
                totamt1 = totamt1 + parseFloat(a);
            }
        }

        var tax = (totamt1 *5)/100 ;
        var cgst = tax / 2;
        var total = parseFloat(totamt1) - parseFloat(tax);
        $("#total").text(total);
       
        $("#grandtotal").text(totamt1);
        $("#grandtot").val(totamt1);
        $("#rs").text(totamt1);
    }

    function goback()
    {
        window.location = "allproducts.php";
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
                    <li class="active">Cart</li>
            </ul>
        </div>
        <!-- //Breadcrumbs Block -->
        <h1>Your <span class="color">Cart</span></h1>
    </div>
</div>

<div id="pageContent">
    <div class="block">
        <div class="container">
            <div class="row">
                <div class="col-sm-12" align="right" style="padding-bottom: 20px">
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

                <div class="block offset-sm">
                    <div class="container">

                        <div class="row">
                                <h3 class="h-lg">Your Shopping Cart <span class="color"><b> Is Here!</b></span></h3>
                                <br>
                <form name="form1" method="post" action="checkout.php" role="form">
                    <div class="col-sm-8 col-lg-8">
                        <br>
                        <div>
                            <table>
                                <thead>
                                    <tr>
                                        <th scope="col"></th>
                                        <th scope="col"></th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col" style="text-align: center;">Price</th>
                                        <th scope="col" style="text-align: center;">Total</th>
                                        <th scope="col" width="5%"> </th>
                                    </tr>
                                </thead>
                                <tbody id="DataTable">
                                <?php
                                    $count =count($_SESSION['item']);
                                    $count1 = 0; 
                                    $grandtot=0;
                                    for($i=0;$i<$count;$i++) {
                                        $count1 = $count1 + 1;
                                        $qty = $_SESSION['qty'][$i];
                                        $item = $_SESSION['item'][$i];
                                        $price = $_SESSION['price'][$i];
                                        $itemid = $_SESSION['itemid'][$i];
                                        $totprice = $_SESSION['totprice'][$i];

                                        $grandtot = $grandtot + $totprice;
                                        // echo "SELECT * FROM product WHERE productname='$item'";
                                        $result = mysql_query("SELECT * FROM product WHERE productname='$item'");
                                        $row1 = mysql_fetch_array($result);
                                            // $cat = $row1['category'];
                                            $productname = $row1['productname'];
                                            $mainprice = $row1['mainprise'];
                                            $img1 = $row1['img1'];
                                            // echo $img1;
                                        ?>
                                        <tr>
                                            <td data-label="Image">
                                                <div class="item-container">
                                                    <div class="image"><img height="100" src="kipara/<?php echo $img1; ?>">
                                                        <div class="overlay"><a class="fancybox overlay-inner"
                                                                                href="<?php echo $img1; ?>"><i
                                                                    class=" icon-eye6"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                            </td>

                                            <td data-label="Item Name"><input type="text" style="text-align: center; border: none;" readonly
                                                                              name="item[]" id="item-<?php echo $count1 ?>"
                                                                              value="<?php echo $item; ?>"></td>
                                            <td data-label="Quantity"><input type="number"
                                                                             style="border: 1px solid #ddd;!important;width: 60px;padding-left: 10px;"
                                                                             name="qty[]" id="qty-<?php echo $count1 ?>"
                                                                             value="<?php echo $qty; ?>"
                                                                             onkeyup="calTotal(<?php echo $count1; ?>)"
                                                                             onclick="calTotal(<?php echo $count1 ?>)"></td>
                                            <td data-label="Price"><input readonly style="text-align: center; border: none;" type="text"
                                                                          name="price[]" id="price-<?php echo $count1; ?>"
                                                                          value="<?php echo $price; ?>"></td>
                                            <td data-label="Total"><input readonly style="text-align: center; border: none;" type="text"
                                                                          name="totprice[]" id="totprice-<?php echo $count1; ?>"
                                                                          value="<?php echo $totprice ?>"></td>
                                            <td><label onclick="deleteRow(this,<?php echo $count1; ?>)"
                                                       style="cursor:pointer; font-size: 20px;" title="delete"> <i
                                                        class="fa fa-trash" aria-hidden="true" style="height:20px;"></i>
                                                </label></td>
                                        </tr>

                                        <?php
                                        }
                                ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="btn-submit btn-common-white" style="margin-top: 20px;">
                            <input type="button" class="button button5" name="continue" id="continue" value="Continue Shopping" onclick="goback();"/>
                        </div>
                    </div>

                    <div class="col-sm-4 col-lg-4">
                        <table style="border:1px solid #EEEEEE;border-radius: 10px;!important;">
                            <tbody>
                                <tr>
                                    <td style="padding: 5px;">
                                        <p>Your order is eligible for Delivery<br>
                                            Select this option for checkout</p>
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
                                            <tr>
                                                <td style="padding-left: 10px;">
                                                    <span><?php echo $item.' ('.$qty.')'; ?></span> : <input type="hidden" name="qty[]" value="<?php echo $qty; ?>" />
                                                    <span><i class="fa fa-inr" aria-hidden="true"></i> <?php echo $price*$qty;?></span>
                                                    <input type="hidden" name="item[]" id="item" value="<?php echo $item; ?>" />
                                                    <input type="hidden" name="itemid[]" id="itemid" value="<?php echo $itemid; ?>" />
                                                    <input type="hidden" name="price[]" id="price" value="<?php echo $price; ?>" />
                                                </td>
                                            </tr>
                                        <?php } ?>
                                <tr>
                                    <td style="padding: 5px;">
                                        <h3 style="float:left">Total ( <?php echo $count; ?> item): </h3> <h3 style="float:right"><i class="fa fa-inr" aria-hidden="true" ></i> <span id="grandtotal" ><?php echo $grandtot; ?> </span></h3>
                                        <input type="hidden" name="grandtot" id="grandtot" value="<?php echo $grandtot; ?>" />
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 5px;">
                                        <p> Note : Orders will be delivered only within 1km distance. </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 5px;  text-align: center;">
                                        <a href="checkout.php"><button type="submit" id="proceed" class="button button5">Proceed to Checkout</button></a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <input type="hidden" name="counter" id="counter" value="<?php echo $count; ?>" />
                </form>
                            </div></div></div>
            </div>
        </div>
    </div>
</div>

<?php include "footer.php";?>

</body>
</html>