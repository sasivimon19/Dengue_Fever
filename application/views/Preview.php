<?php if( ! defined('BASEPATH')) exit('No direct script access allowed');
	require_once APPPATH."libraries/mpdf/mpdf.php";
	
 ?>
 <html>
	 <head>
	 	 
	 </head>
	 <body style="font-size: 12pt;">
<?php 
	
	


		if($Name_Letter == "BAY-LEGAL-FirstMonth"){
		 	$this->load->view('DocPDF/BAY/First_Of_Month/BAY_Legal_FirstMonth',$data);

		}else if($Name_Letter == "BAY-GoodsName-FirstMonth"){
			 $this->load->view('DocPDF/BAY/First_Of_Month/BAY-GoodsName-FirstMonth',$data);

		}else if($Name_Letter == "KHB-LEGAL-FirstMonth"){
			$this->load->view('DocPDF/KHB/First_Of_Month/KHB_Legal_FirstMonth',$data);

		}else if($Name_Letter == "KHB-ZB-FirstMonth"){
			 $this->load->view('DocPDF/KHB/First_Of_Month/KHB_ZB_FirstMonth',$data);

		}else if($Name_Letter == "KHB-NON_C-FirstMonth"){
			 $this->load->view('DocPDF/KHB/First_Of_Month/KHB_NONC_FirstMonth',$data);
		}



		else if ($Name_Letter == "BAY-LEGAL-BetweenOfMonth") {

			if($installment == "MoreOne"){ //หลายงวด
				$this->load->view('DocPDF/BAY/BetweenOfMonth/BAY_Legal_MoreOne',$data);
			}else{ //งวดเดียว
				$this->load->view('DocPDF/BAY/BetweenOfMonth/BAY_Legal_One',$data);
			}

		}else if ($Name_Letter == "BAY-GoodsName-BetweenOfMonth") {

			if($installment == "MoreOne"){//หลายงวด
				$this->load->view('DocPDF/BAY/BetweenOfMonth/BAY_GoodsName_MoreOne',$data);
			}else{ //งวดเดียว
				$this->load->view('DocPDF/BAY/BetweenOfMonth/BAY_GoodsName_One',$data);
			}

		}else if ($Name_Letter == "KHB-LEGAL-BetweenOfMonth") {

			if($installment == "MoreOne"){//หลายงวด
				$this->load->view('DocPDF/KHB/BetweenOfMonth/KHB_Legal_MoreOne',$data);
			}else{ //งวดเดียว
				$this->load->view('DocPDF/KHB/BetweenOfMonth/KHB_Legal_One',$data);
			}

		}else if ($Name_Letter == "KHB-NONC-BetweenOfMonth") {

			if($installment == "MoreOne"){//หลายงวด
				 
				$this->load->view('DocPDF/KHB/BetweenOfMonth/KHB_NON_MoreOne',$data);
			}else{ //งวดเดียว

				echo "666";
				$this->load->view('DocPDF/KHB/BetweenOfMonth/KHB_NON_One',$data);
			}
		}

	 	
?>
	 </body>
 </html>
<?php 

$mpdf = new mPDF('th','A4',0,'angsananew');

   $mpdf->setAutoFont(AUTOFONT_THAIVIET);
   $mpdf->SetDisplayMode('fullpage');
   $html = ob_get_contents();
   ob_end_clean();

   $mpdf->writeHTML($html);
// I คือการแสดงข้อมูลบน Browser
    $mpdf->Output("LetterTSS.pdf","I");
   
//Barcode
  
$mpdf = new mPDF('utf-8','A4','','' , 0 , 0 , 0 , 0 , 0 , 0); 
$mpdf->SetDisplayMode('fullpage');
$mpdf->list_indent_first_level = 0;  // 1 or 0 - whether to indent the first level of a list
$mpdf->WriteHTML($html);
//render the pdf on the browser
$mpdf->Output();
?>