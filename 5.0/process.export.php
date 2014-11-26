<?php  

// Error reporting
error_reporting(E_ALL);

function num_to_letter($num, $uppercase = FALSE)
{
	$num -= 1;
	
	$letter = 	chr(($num % 26) + 97);
	$letter .= 	(floor($num/26) > 0) ? str_repeat($letter, floor($num/26)) : '';
	return 		($uppercase ? strtoupper($letter) : $letter); 
}

function cellColor($cells,$color){
    global $objPHPExcel;
    $objPHPExcel->getActiveSheet()->getStyle($cells)->getFill()
    ->applyFromArray(array('type' => PHPExcel_Style_Fill::FILL_SOLID,
    'startcolor' => array('rgb' => $color)
    ));
}

// PHPExcel
include 'inc/php/PHPExcel.php';

// PHPExcel_Writer_Excel2007 
include 'inc/php/PHPExcel/Writer/Excel2007.php';

// Create new PHPExcel object
$objPHPExcel = new PHPExcel();

// Set properties
$objPHPExcel->getProperties()->setCreator("Merit Traveller");
$objPHPExcel->getProperties()->setLastModifiedBy("Merit Traveller");
$objPHPExcel->getProperties()->setTitle(date("d-m-Y")."-Traveller-".$_POST['name']);
$objPHPExcel->getProperties()->setSubject(date("d-m-Y")."-Traveller-".$_POST['name']);
$objPHPExcel->getProperties()->setDescription("The ".$_POST['name']." exported from Merit Traveller on ".date("d-m-Y"));

// Add some data
$objPHPExcel->setActiveSheetIndex(0);
if($_POST['tableArray']){
    $result = json_decode($_POST['tableArray'], true);
    for($i = 0; $i < count($result); $i++){
        for($i2 = 0; $i2 < (count($result[$i])-1); $i2++){
            $letter = num_to_letter(($i2+1), true);
            $objPHPExcel->getActiveSheet()->SetCellValue($letter.($i+1), str_replace("&amp;", "&", $result[$i][$i2]));
            if($i == 0){
                $objPHPExcel->getActiveSheet()->getStyle($letter.($i+1).":".$letter.($i+1))->getFont()->setBold(true);
                cellColor($letter.($i+1), 'CCCCCC');
            }
        }
    }
}
else if($_POST['table']){
    $result = json_decode($_POST['table'], true);
    for($i = 0; $i < count($result); $i++){
        for($i2 = 0; $i2 < (count($result[$i])); $i2++){
            $letter = num_to_letter(($i2+1), true);
            $objPHPExcel->getActiveSheet()->SetCellValue($letter.($i+1), str_replace("&amp;", "&", $result[$i][$i2]));
            if($i == 0){
                $objPHPExcel->getActiveSheet()->getStyle($letter.($i+1).":".$letter.($i+1))->getFont()->setBold(true);
                cellColor($letter.($i+1), 'CCCCCC');
            }
        }
    }
}

$fromCol = "A";
$toCol = "Z";

for($i = $fromCol; $i !== $toCol; $i++) {
    $objPHPExcel->getActiveSheet()->getColumnDimension($i)->setAutoSize(true);
}

$objPHPExcel->getActiveSheet()->getColumnDimension("B")->setWidth(50);
$objPHPExcel->getActiveSheet()->getColumnDimension("C")->setWidth(50);

$objPHPExcel->getActiveSheet()->setTitle($_POST['name']);

// Save
$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);

// We'll be outputting an excel file
header('Content-type: application/vnd.ms-excel');

// It will be called file.xls
header('Content-Disposition: attachment; filename="'.date("d-m-Y").'"-Traveller-'.$_POST['name'].'.xlsx"');

// Write file to the browser
$objWriter->save('php://output');
exit();
?>