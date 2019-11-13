<?php

require_once('connection.php');
require_once 'php-excel-reader/PHPExcel.php';
//echo "<pre>";print_r($_POST);die;
function clean($str)
{
    $str = @trim($str);
    if (get_magic_quotes_gpc()) {
        $str = stripslashes($str);
    }
    return mysql_real_escape_string($str);
}

date_default_timezone_set('Asia/Calcutta');
$fromDate =$_POST['fromDate'];
$toDate =$_POST['toDate'];
$d = date('d-m-Y', strtotime($fromDate));
$dd = date('d-m-Y', strtotime($toDate));

$x = 0;

$filename = 'Online Order Invoice Report('. date('d-m-Y') . ').xls';//your file name
$objPHPExcel = new PHPExcel();

// while($x<2)
// {
    $j = 4; $total = 0;
    $column = array('','A','B','C','D','E','F','G','H','I','J','K','L');
    $colname = array('','Invoice No.','Date','Client','Contact','Dispatch','Paymentmode','Item','Quantity','Rate','Total','Final Tot','GST 2%');

    $objPHPExcel->setActiveSheetIndex($x);

    /*********************Add Main Heading**********************/

    $objPHPExcel->setActiveSheetIndex($x)->mergeCells("A1:L2");

   
        $objPHPExcel->getActiveSheet()
            ->getCell('A1')
            ->setValue(strtoupper('Completed Online Order Invoice Report (From : '.date("d-m-Y",strtotime($fromDate)).' To : '.date("d-m-Y",strtotime($toDate)).')'));
        $objPHPExcel->getActiveSheet()
            ->getStyle('A1')
            ->getAlignment()
            ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER)
            ->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);

        $objPHPExcel->getActiveSheet()->getRowDimension('1')->setRowHeight(40);

        $objPHPExcel->getActiveSheet()->getStyle("A1:L2")->applyFromArray(array(
            'borders' => array(
                'allborders' => array(
                    'style' => PHPExcel_Style_Border::BORDER_NONE
                )
            )
        ));
   
  

    /*********************END**********************/

    /*********************Add column headings START**********************/
    //$column = 'A';
    $objPHPExcel->setActiveSheetIndex($x)
        ->setCellValue('A3', $colname[1])
        ->setCellValue('B3', $colname[2])
        ->setCellValue('C3', $colname[3])
        ->setCellValue('D3', $colname[4])
        ->setCellValue('E3', $colname[5])
		->setCellValue('F3', $colname[6])
		->setCellValue('G3', $colname[7])
		->setCellValue('H3', $colname[8])
		->setCellValue('I3', $colname[9])
		->setCellValue('J3', $colname[10])
		->setCellValue('K3', $colname[11])
		->setCellValue('L3', $colname[12]);
		
    /*********************Add column headings END**********************/

    $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth("20");
    $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth("30");
    foreach(range('C','L') as $columnID) {
        $objPHPExcel->getActiveSheet()->getColumnDimension($columnID)->setWidth("30");
    }
    // echo "SELECT date,invoiceno FROM  online_invoice where (date BETWEEN '$fromDate' AND '$toDate') and status='paid' group by invoiceno order by date "; die;
    $result1 = mysql_query("SELECT date,invoiceno FROM  online_invoice where (date BETWEEN '$fromDate' AND '$toDate') and status='paid' group by invoiceno order by date ");
	$total1 = 0;
    $totgst =0;
	$totamt =0;
   
	while($res =mysql_fetch_array($result1)){
		$date =$res['date'];
        $invoiceno =$res['invoiceno'];
    //    echo "SELECT * FROM  online_invoice where invoiceno='$invoiceno' order by date"; die;
        $result = mysql_query("SELECT * FROM  online_invoice where invoiceno='$invoiceno' order by date");
   
	$sr=0;
	$count = 0;
    while ($row = mysql_fetch_array($result)) {
      $sr++;
      $count++;
       
        $orderno = $row['orderno'];
        $rate = $row['rate'];
        $qty = $row['qty'];
        $dispatch = $row['dispatch'];
        $paymentmode = $row['paymentmode'];
        $grandtotal = $row['finaltotal'];
        $total = $row['total'];
        $total1 =$total1 + $total;
        $itemname1 = $row['itemname'];
        // echo "<pre>";print_r[$row];die;
		$item1 = mysql_query("select * from onlineorder where orderno ='$orderno'");
        $itemname = mysql_fetch_array($item1);
        $client = $itemname['name'].' '.$itemname['lname'];
        $contact = $itemname['contact'];
        $gstamt = $grandtotal *0.02;
        
        $date1 = date('d-m-Y', strtotime($date));
	

        for ($k = 1; $k <= 12; $k++) {
            $colRow[$k] = $column[$k] . $j;
        }
		 if($count == 1){
        $objPHPExcel->setActiveSheetIndex($x)
            ->setCellValue($colRow[1], $invoiceno)
            ->setCellValue($colRow[2], $date)
            ->setCellValue($colRow[3], strtoupper($client))
            ->setCellValue($colRow[4],$contact)
            ->setCellValue($colRow[5], $dispatch)
			->setCellValue($colRow[6], $paymentmode)
			->setCellValue($colRow[7], $itemname1)
			->setCellValue($colRow[8], $qty)
			->setCellValue($colRow[9], $rate)
		    ->setCellValue($colRow[10], $total)
			->setCellValue($colRow[11], $grandtotal)
		    ->setCellValue($colRow[12], $gstamt);
       $j++;
		 }
		 if($count > 1){
			 $objPHPExcel->setActiveSheetIndex($x)
            ->setCellValue($colRow[1],'')
            ->setCellValue($colRow[2],'' )
            ->setCellValue($colRow[3],'')
            ->setCellValue($colRow[4],'')
            ->setCellValue($colRow[5],'')
			->setCellValue($colRow[6],'')
			->setCellValue($colRow[7], $itemname1)
			->setCellValue($colRow[8], $qty)
			->setCellValue($colRow[9], $rate)
		    ->setCellValue($colRow[10], $total)
			->setCellValue($colRow[11],'')
		    ->setCellValue($colRow[12], '');
			$count--;
        $j++;
		}	 
			 
		 }
		 $totamt = $totamt + $grandtotal;
        $totgst = $totgst + $gstamt; 
        //    foreach(range('A','D') as $columnID) {
        //        $objPHPExcel->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);
        //    }
    }
    $j++;
    for ($k = 1; $k <= 12; $k++) {
        $colRow[$k] = $column[$k] . $j;
    }
    $objPHPExcel->setActiveSheetIndex($x)
        ->setCellValue($colRow[1],'')
        ->setCellValue($colRow[2],'')
        ->setCellValue($colRow[3],'')
        ->setCellValue($colRow[4],'')
        ->setCellValue($colRow[5],'')
		->setCellValue($colRow[6],'')
	    ->setCellValue($colRow[7],'')
		->setCellValue($colRow[8],'')
		->setCellValue($colRow[9],'Grand Total')
	    ->setCellValue($colRow[10],number_format($totamt))
		->setCellValue($colRow[11],number_format($total1))
	    ->setCellValue($colRow[12],number_format($totgst));

    /*********************Autoresize column width depending upon contents END***********************/

    $objPHPExcel->getActiveSheet()->getStyle('A1:L1')->getFont()->setBold(true); //Make heading font bold
    $objPHPExcel->getActiveSheet()->getStyle('A3:L3')->getFont()->setBold(true); //Make heading font bold
    $objPHPExcel->getActiveSheet()->getStyle('A'.$j.':L'.$j)->getFont()->setBold(true); //Make Last row font bold

    /*********************Add color to heading START**********************/
    $objPHPExcel->getActiveSheet()
        ->getStyle('A3:L3')
        ->getFill()
        ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
        ->getStartColor()
        ->setARGB('99ff99');
    /*********************Add color to heading END***********************/

    /*********************Set Border to table***********************/

    for($i = 3;$i<=$j;$i++)
    {
        $objPHPExcel->getActiveSheet()->getStyle("A".$i.":L".$i)->applyFromArray(array(
            'borders' => array(
                'allborders' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN
                )
            )
        ));
    }
    /*********************END***********************/

    if($x==0)
    {	$objPHPExcel->getActiveSheet()->setTitle('InvoiceReport'); 	}	//give title to sheet
    else
    {	$objPHPExcel->getActiveSheet()->setTitle('InvoiceReport'); 	}	//give title to sheet

    $objPHPExcel->createSheet();
    $x++;

// }
//$objPHPExcel->setActiveSheetIndex(0);
header('Content-Type: application/vnd.ms-excel');
header("Content-Disposition: attachment;Filename=$filename");
header('Cache-Control: max-age=0');
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');
exit;

?>