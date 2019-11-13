<?php
session_start();

echo $rs = $_POST['price'];
$unit1 = $_POST['unit1'];
$qty = $_POST['qty'];
$item = $_POST['item'];
$price = $_POST['price'];
$itemid = $_POST['itemid'];
$sessionno = $_SESSION['no'];
$sessionrs = $_SESSION['rs'];
$count = count($_SESSION['item']);
print_r($_SESSION['price']);
$counter =0;  $count1 = 0;
if($count == 0)
{
    
    array_push($_SESSION['qty'],$qty);
    array_push($_SESSION['price'],$rs);
    array_push($_SESSION['item'],$item);
    array_push($_SESSION['itemid'],$itemid);
    array_push($_SESSION['totprice'],$price);

    $_SESSION['no'] =  $sessionno + 1;
    $_SESSION['rs'] = $sessionrs + $price;
    $id = 1;
    $data = array('id'=>$id,'sessionno'=>$_SESSION['no'],'sessionrs'=>$_SESSION['rs']);
    echo json_encode($data);
    return true;
}
else{					// If item list is not empty
    foreach($_SESSION['item'] as $value2) {
      
        if ($value2 == $item) {
            $counter = $counter +1;
            if (($key = array_search($item, $_SESSION['item'])) !== false) {
   
                if($_SESSION['price'][$key] == $rs){
                  
                    $new_qty = $_SESSION['qty'][$key] + $qty;
                    $_SESSION['qty'][$key] = $new_qty;
                    $_SESSION['qty'][$key];
                    $count1 = $count1 +1;
                }
            }
        }
    }

    //echo $counter;
    if($counter == 0)		// If selected item is not in item list
    {
        array_push($_SESSION['qty'],$qty);
        array_push($_SESSION['price'],$rs);
        array_push($_SESSION['item'],$item);
        array_push($_SESSION['itemid'],$itemid);
        array_push($_SESSION['totprice'],$price);

        $sessionno = $_SESSION['no'];
        $sessionrs = $_SESSION['rs'];
        $_SESSION['no'] =  $sessionno + 1;
        $_SESSION['rs'] = $sessionrs + $price;
        $id = 1;
        $data = array('id'=>$id,'sessionno'=>$_SESSION['no'],'sessionrs'=>$_SESSION['rs']);

        echo json_encode($data);
        return true;
    }
    else {				// If item exits in item list

        /*foreach($_SESSION['price'] as $value3) {
            if ($value3 == $rs) {
                    if (($key = array_search($rs, $_SESSION['price'])) !== false) {

                    $count1 = $count1 +1;
                }
            }
        } */
        //echo $count1;
        if($count1 == 0)
        {
            array_push($_SESSION['qty'],$qty);
            array_push($_SESSION['price'],$rs);
            array_push($_SESSION['item'],$item);
            array_push($_SESSION['itemid'],$itemid);
            array_push($_SESSION['totprice'],$price);

            $sessionno = $_SESSION['no'];
            $sessionrs = $_SESSION['rs'];
            $_SESSION['no'] =  $sessionno + 1;
            $_SESSION['rs'] = $sessionrs + $price;
            $id = 1;
            $data = array('id'=>$id,'sessionno'=>$_SESSION['no'],'sessionrs'=>$_SESSION['rs']);

            echo json_encode($data);
            return true;
        }
        else
        {
            $id = 2;
            $data = array('id'=>$id,'sessionno'=>$sessionno,'sessionrs'=>$sessionrs);
            echo json_encode($data);
            return true;
        }
    }

}
?>