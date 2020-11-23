<?php

    $file = 'C:\AppServ\www\Dengue_Fever\assets\Manual\Dengue_Fever_Manual.pdf';
    $filename = '201.pdf';
    header('Content-type: application/pdf');
    header('Content-Disposition: inline; filename="' . $filename . '"');
    header('Content-Transfer-Encoding: binary');
    header('Accept-Ranges: bytes');
    @readfile($file);

?>