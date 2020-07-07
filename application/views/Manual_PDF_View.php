<?php


if ($statuspdf == 1) {
    $file = 'C:\AppServ\www\\InsuranceCar\assets\Manual\InsuranceCa_DirectSales.pdf';
    $filename = '201.pdf';
    header('Content-type: application/pdf');
    header('Content-Disposition: inline; filename="' . $filename . '"');
    header('Content-Transfer-Encoding: binary');
    header('Accept-Ranges: bytes');
    @readfile($file);
    
} else if ($statuspdf == 2) {
    $file = 'C:\AppServ\www\\InsuranceCar\assets\Manual\Manual_BackCar.pdf';
    $filename = '201.pdf';
    header('Content-type: application/pdf');
    header('Content-Disposition: inline; filename="' . $filename . '"');
    header('Content-Transfer-Encoding: binary');
    header('Accept-Ranges: bytes');
    @readfile($file);
}
?>