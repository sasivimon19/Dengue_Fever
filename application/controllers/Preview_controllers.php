<?php

defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set("Asia/Bangkok"); //เซตเวลา ว่าเอาเวลาของอะไร

class Preview_controllers extends CI_Controller {

    public function __construct() {
        parent:: __construct();
        $this->load->library('session', 'upload', 'encrypt');
        $this->load->library('excel');
        $this->load->model('Model_HomeInsurance');
        $this->load->library('Ciqrcode');
        set_time_limit(0);
        ini_set('memory_limit', '-1');
    }

    public function index() {
        $this->load->view('Login');
    }

     public function Get_Preview() {
        

        $Username = $this->session->userdata('Username');
        $Password = $this->session->userdata('Password');
        $AutoID = $this->session->userdata('AutoID');
        $IDCard = $this->session->userdata('IDCard');
        $FirstName = iconv('tis-620', 'utf-8', $this->session->userdata('FirstName'));
        $LastName = iconv('tis-620', 'utf-8', $this->session->userdata('LastName'));
        $Tel = $this->session->userdata('Tel');
        $Status = $this->session->userdata('Status');
        $LevelEmp = $this->session->userdata('LevelEmp');
        $DEPARTMENT = $this->session->userdata('DEPARTMENT');


        $thai_month = array(
            "0" => "",
            "01" => "มกราคม",
            "02" => "กุมภาพันธ์",
            "03" => "มีนาคม",
            "04" => "เมษายน",
            "05" => "พฤษภาคม",
            "06" => "มิถุนายน",
            "07" => "กรกฏาคม",
            "08" => "สิงหาคม",
            "09" => "กันยายน",
            "10" => "ตุลาคม",
            "11" => "พฤศจิกายน",
            "12" => "ธันวาคม");

        $strMonth = date("m");
        $data['YEAR'] = date("Y") + 543;
        $data['MONTH'] = $thai_month[$strMonth];


        $data['Username'] = $Username;
        $data['Password'] = $Password;
        $data['AutoID'] = $AutoID;
        $data['IDCard'] = $IDCard;
        $data['FirstName'] = $FirstName;
        $data['LastName'] = $LastName;
        $data['Tel'] = $Tel;
        $data['Status'] = $Status;
        $data['LevelEmp'] = $LevelEmp;
        $data['DEPARTMENT'] = $DEPARTMENT;

        $car_brand = $this->input->post('CarBrand');
        $Car_modil = iconv('UTF-8//IGNORE', 'TIS-620//IGNORE', $this->input->post('CarDesc'));
        $YearGroup = $this->input->post('CarYear');
        $CODE = $this->input->post('Type_Car');
        $MakeDescription = $this->input->post('MakeDescription');


        $vehicle = $this->input->post('vehicle');

        if ($vehicle == "") {
            $data['checkComparison'] = 0;
            $vehicle = "";
        } else {
            $C = 1;
            foreach ($vehicle as $f) {
                $Check_company[$C] = $f;

                if ($C <= 1) {
                    $wherechkompany = "'" . $Check_company[$C] . "'";
                } else {
                    $wherechkompany = "" . $wherechkompany . ",'" . $Check_company[$C] . "' ";
                }
                $C++;
            }
             $whereLengthvehicle = "AND A.Middle_ID in ( " . $wherechkompany . " )";


            if ($Username == "") {
                $this->load->view('false');
            } else {

                $data['checkComparison'] = $this->Model_HomeInsurance->Comparison_MOdels($car_brand, $Car_modil, $YearGroup,$MakeDescription, $CODE, $whereLengthvehicle);
            }
        }
    
        $data['COUNTInstallments'] = COUNT($data['checkComparison']);

        $data['HeadCoverage1'] = $data['checkComparison'][0]->HeadCoverage1;
        $data['HeadCoverage2'] = $data['checkComparison'][0]->HeadCoverage2;
        $data['HeadCoverage3'] = $data['checkComparison'][0]->HeadCoverage3;
        $data['HeadCoverage4'] = $data['checkComparison'][0]->HeadCoverage4;
        $data['HeadCoverage5'] = $data['checkComparison'][0]->HeadCoverage5;
        $data['HeadCoverage6'] = $data['checkComparison'][0]->HeadCoverage6;
        $data['HeadCoverage7'] = $data['checkComparison'][0]->HeadCoverage7;
        $data['HeadCoverage8'] = $data['checkComparison'][0]->HeadCoverage8;
        $data['HeadCoverage9'] = $data['checkComparison'][0]->HeadCoverage9;
        $data['HeadCoverage10'] = $data['checkComparison'][0]->HeadCoverage10;
        
        $data['CarBrand'] = $data['checkComparison'][0]->CarBrand;
        $data['CarModel'] = $data['checkComparison'][0]->CarModel;
        $data['CarYear'] = $data['checkComparison'][0]->CarYear;
        $data['CODE'] = $data['checkComparison'][0]->CODE;
        $data['TYPENAME'] = $data['checkComparison'][0]->TYPENAME;
        $data['Type_Name'] = $data['checkComparison'][0]->Type_Name;

        $this->load->view('DocPDF/Docpreview', $data);
    }

    public function Get_Payment() {

        $Username = $this->session->userdata('Username');
        $Password = $this->session->userdata('Password');
        $AutoID = $this->session->userdata('AutoID');
        $IDCard =  $this->session->userdata('IDCard');
        $FirstName =  $this->session->userdata('FirstName');
        $LastName = $this->session->userdata('LastName');
        $Tel = $this->session->userdata('Tel');
        $Status = $this->session->userdata('Status');
        $LevelEmp = $this->session->userdata('LevelEmp');
        $DEPARTMENT = $this->session->userdata('DEPARTMENT');

        $data['Username'] = $Username;
        $data['Password'] = $Password;
        $data['AutoID'] = $AutoID;
        $data['IDCard'] = $IDCard;
        $data['FirstName'] = $FirstName;
        $data['LastName'] = $LastName;
        $data['Tel'] = $Tel;
        $data['Status'] = $Status;
        $data['LevelEmp'] = $LevelEmp;
        $data['DEPARTMENT'] = $DEPARTMENT;


        $thai_month = array(
            "0" => "",
            "01" => "มกราคม",
            "02" => "กุมภาพันธ์",
            "03" => "มีนาคม",
            "04" => "เมษายน",
            "05" => "พฤษภาคม",
            "06" => "มิถุนายน",
            "07" => "กรกฏาคม",
            "08" => "สิงหาคม",
            "09" => "กันยายน",
            "10" => "ตุลาคม",
            "11" => "พฤศจิกายน",
            "12" => "ธันวาคม");

        $strMonth = date("m");
        $data['YEAR'] = date("Y") + 543;
        $data['MONTH'] = $thai_month[$strMonth];


        $PROSPECT_LIST_ID = $this->input->GET('PRO');
        $url_paramPRO = rtrim($PROSPECT_LIST_ID, '=');
        $base_64PRO = $url_paramPRO . str_repeat('=', strlen($url_paramPRO) % 4);
        $PROSPECT_LIST_ID = base64_decode($base_64PRO);

        $CustomerIDCard = $this->input->GET('C');
        $url_paramCus = rtrim($CustomerIDCard, '=');
        $base_64Cus = $url_paramCus . str_repeat('=', strlen($url_paramCus) % 4);
        $data['CustomerIDCard2'] = base64_decode($base_64Cus);
        $CustomerIDCard = base64_decode($base_64Cus);


        $data['converttext'] = $this->Model_HomeInsurance->GET_FirstPayment($Username, $CustomerIDCard, $PROSPECT_LIST_ID);
        foreach ($data['converttext'] as $value) {
            $data['CreateEmp'] = iconv('TIS-620//ignore', 'UTF-8//ignore', $value->CreateEmp);
	    $data['SaveDate'] = $value->SaveDate;
            $data['TransactionID'] = $value->TransactionID;
            $data['CustomerIDCard'] = $value->CustomerIDCard;
            $data['PROSPECT_LIST_ID'] = $value->PROSPECT_LIST_ID;
            $data['CustomerFirstname'] = iconv('TIS-620//ignore', 'UTF-8//ignore', $value->CustomerFirstname);
            $data['CustomerLastname'] = iconv('TIS-620//ignore', 'UTF-8//ignore', $value->CustomerLastname);
            $data['Total_FirstPayment'] = $value->Total_FirstPayment;
            $data['Installment'] = $value->Installment;
            $data['PaymentType'] = iconv('TIS-620//ignore', 'UTF-8//ignore', $value->PaymentType);
            $data['TextbathDebt_balance'] = iconv('TIS-620//ignore', 'UTF-8//ignore', $value->TextbathDebt_balance);
        }



        $this->load->view('DocPDF/Docpayment', $data);
    }

    
    // PDF Manual
    public function Manual_PDF() {

        $data['statuspdf'] = $this->input->GET('statuspdf');

        $this->load->view('Manual_PDF_View', $data);
    }

//  QRcode 
    public function genqrdocePayment($TransactionID, $CustomerIDCard, $Total_FirstPayment) {
        QRcode::png(
                $kodenya = '|010555602288600 ' . $TransactionID . ' ' . $CustomerIDCard . ' '
                . ' ' . $Total_FirstPayment, $outfile = false, $level = QR_ECLEVEL_H, $size = 2, $margin = 2
        );
    }

}
