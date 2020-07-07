<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set("Asia/Bangkok"); //เซตเวลา ว่าเอาเวลาของอะไร
require_once APPPATH . "libraries/mpdf/mpdf.php";
?>

<html>
    <head>
    </head>
    <body style="font-size: 12pt;">
        <?php $this->load->view('DocPDF/Doc_Quotation'); ?>
    </body>
</html>

<?php
$mpdf = new mPDF('th', 'A4', 0, 'angsananew');

$mpdf->setAutoFont(AUTOFONT_THAIVIET);
$mpdf->SetDisplayMode('fullpage');
$html = ob_get_contents();
ob_end_clean();

$mpdf->writeHTML($html);
// I คือการแสดงข้อมูลบน Browser
$mpdf->Output("LetterTSS.pdf", "I");

//Barcode

$mpdf = new mPDF('utf-8', 'A4', '', '', 0, 0, 0, 0, 0, 0);
$mpdf->SetDisplayMode('fullpage');
$mpdf->list_indent_first_level = 0;  // 1 or 0 - whether to indent the first level of a list
$mpdf->WriteHTML($html);
//render the pdf on the browser
$mpdf->Output();
?>



