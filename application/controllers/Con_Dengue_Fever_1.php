<?php

defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set("Asia/Bangkok"); //เซตเวลา ว่าเอาเวลาของอะไร

class Con_Dengue_Fever extends CI_Controller {

    public function __construct() {
        parent:: __construct();
        $this->load->library('session', 'upload');
        $this->load->library('excel');
        $this->load->model('Modal_Dengue_Fever');
        set_time_limit(0);
        ini_set('memory_limit', '-1');
    }

    public function index() { //แก้แล้ว
        $this->load->view('Login');
    }

    public function login() {

        if ($this->input->get("Username") != "" && $this->input->get('Password') != '') {
            $Username = $this->input->get("Username");
            $Password = $this->input->get('password');
        } else {
            $Username = $this->input->post("Username"); //รับค่า pass จากฟอร์ม       
            $Password = $this->input->post('password');
        }

        $data['check'] = $this->Modal_Dengue_Fever->_checklogin($Username, $Password);       // //ประกาศตัวแปร a มารับ ค่า user pass เพื่อ loop ค่าจากฐานข้อมูล

        if (count($data['check']) > 0) {

            foreach ($data['check'] as $row) :                                          //loop ค่าจากฐานข้อมูลออกมา

                $AutoID = $row->AutoID;
                $Username = trim($row->Username);
                $Password = $row->Password;
                $FirstName = trim($row->FirstName);
                $LastName = trim($row->LastName);
                $Tel = $row->Tel;
                $Status = $row->Status;
                $LevelEmp = $row->LevelEmp;
                $DEPARTMENT = $row->DEPARTMENT;

            endforeach;


            $this->session->set_userdata(array('AutoID' => $AutoID, 'Username' => $Username, 'Password' => $Password, 'FirstName' => $FirstName, 'LastName' => $LastName, 'Tel' => $Tel, 'Status' => $Status, 'LevelEmp' => $LevelEmp, 'DEPARTMENT' => $DEPARTMENT));

            redirect('Con_Dengue_Fever/Home');
        } else {
            $this->load->view('false');
        }
    }

    public function Home() {

        $Username = $this->session->userdata('Username');
        $Password = $this->session->userdata('Password');
        $AutoID = $this->session->userdata('AutoID');
        $FirstName = iconv('tis-620', 'utf-8', $this->session->userdata('FirstName'));
        $LastName = $this->session->userdata('LastName');
        $Tel = $this->session->userdata('Tel');
        $Status = $this->session->userdata('Status');
        $LevelEmp = $this->session->userdata('LevelEmp');
        $DEPARTMENT = $this->session->userdata('DEPARTMENT');

        $data['Username'] = $Username;
        $data['Password'] = $Password;
        $data['AutoID'] = $AutoID;
        $data['FirstName'] = $FirstName;
        $data['LastName'] = $LastName;
        $data['Tel'] = $Tel;
        $data['Status'] = $Status;
        $data['LevelEmp'] = $LevelEmp;
        $data['DEPARTMENT'] = $DEPARTMENT;

        $page = $this->input->post('page');

        if ($page != '') {
            $page = $page;
        } else {
            $page = 1;
        }

        $pageend1 = 50;


        $start = ($page - 1) * $pageend1;
        $pageend = $page * 50;

        $data['pageend'] = $pageend1;
        $data['pagenum'] = $page;

        $data['Status_API'] = "";
        $data['Number_Ref'] = "";



        $data['True_Temp_DengueFever'] = 0;
        $data['False_Temp_DengueFever'] = 0;
        $data['CountTrueTemp'] = 0;
        $data['CountFalseTemp'] = 0;
        $data['count_truedata'] = 0;
        $data['count_nodata'] = 0;


        $data['Dengue_Fever'] = $this->Modal_Dengue_Fever->Get_Dengue_Fever();
        $data['True_Temp_DengueFever'] = $this->Modal_Dengue_Fever->SelectTrueDengueFever($Username, $start, $pageend);
        $data['CountTrueTemp'] = $this->Modal_Dengue_Fever->CountTrueDengueFever($Username);
        foreach ($data['CountTrueTemp'] as $value) {
            $data['count_truedata'] = $value->Count;
        }
        $data['False_Temp_DengueFever'] = $this->Modal_Dengue_Fever->SelectFalseDengueFever($Username, $start, $pageend);
        $data['CountFalseTemp'] = $this->Modal_Dengue_Fever->CountFalseDengueFever($Username);
        foreach ($data['CountFalseTemp'] as $value) {
            $data['count_nodata'] = $value->Count;
        }


        $pagesub = "";
        $pagesub = $this->input->post("pagesub");


        if ($pagesub == "") {
            $data['Show_Data_management'] = "Upload_DengueFever";
            $this->load->view('Home_Dengue', $data);
        } else if ($pagesub == "Y") {
            $this->load->view('TrueTableCustomerdata', $data);
        } else if ($pagesub == "N") {
            $this->load->view('FalseTableCustomerdata', $data);
        }
    }

    public function Upload_File_Dengue() {

        $Username = $this->session->userdata('Username');
        $Password = $this->session->userdata('Password');

        $data['Username'] = $Username;
        $data['Password'] = $Password;

        $Current_date = $this->Modal_Dengue_Fever->Current_date();
        foreach ($Current_date as $value) {
            $Date_Save = $value->Currentdate;
        }

        $start = 0;
        $pageend = 50;
        $data['pageend'] = 50;

        list($file, $ext) = explode('.', $_FILES['fileDengue']['name']);

        $this->load->library('PHPExcel');
        if (isset($_FILES["fileDengue"]["name"])) {

            $path = $_FILES["fileDengue"]["tmp_name"];
            $object = PHPExcel_IOFactory::load($path);
            $cell = $object->getActiveSheet()->getCellCollection();  //7000 


            foreach ($cell as $cl) {
                $column = $object->getActiveSheet()->getCell($cl)->getColumn();
                $row = $object->getActiveSheet()->getCell($cl)->getRow();
            }

            $colNumber = PHPExcel_Cell::columnIndexFromString($column);
            if ($colNumber != 15) {
                echo "<script>alert('จำนวน Column ไม่ถูกต้อง')</script>";
            } else {

                foreach ($object->getWorksheetIterator() as $worksheet) {

                    $highestRow = $worksheet->getHighestRow();
                    $highestColumn = $worksheet->getHighestColumn();

                    for ($row = 2; $row <= $highestRow; $row++) {

                        $functionName = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                        $Title = iconv("UTF-8//ignore", "TIS-620//ignore", $worksheet->getCellByColumnAndRow(1, $row)->getValue());
                        $FirstName = iconv("UTF-8//ignore", "TIS-620//ignore", $worksheet->getCellByColumnAndRow(2, $row)->getValue());
                        $LastName = iconv("UTF-8//ignore", "TIS-620//ignore", $worksheet->getCellByColumnAndRow(3, $row)->getValue());
                        $Address = iconv("UTF-8//ignore", "TIS-620//ignore", $worksheet->getCellByColumnAndRow(4, $row)->getValue());
                        $AmphorCode = iconv("UTF-8//ignore", "TIS-620//ignore", $worksheet->getCellByColumnAndRow(5, $row)->getValue());
                        $ProvinceCode = iconv("UTF-8//ignore", "TIS-620//ignore", $worksheet->getCellByColumnAndRow(6, $row)->getValue());
                        $PostCode = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
                        $IDCard = $worksheet->getCellByColumnAndRow(8, $row)->getValue();
                        $Birthday = $worksheet->getCellByColumnAndRow(9, $row)->getValue();
                        $Mobile = $worksheet->getCellByColumnAndRow(10, $row)->getValue();
                        $Occp = iconv("UTF-8//ignore", "TIS-620//ignore", $worksheet->getCellByColumnAndRow(11, $row)->getValue());
                        $Ben = $worksheet->getCellByColumnAndRow(12, $row)->getValue();
                        $Email = $worksheet->getCellByColumnAndRow(13, $row)->getValue();
                        $Coverage = $worksheet->getCellByColumnAndRow(14, $row)->getValue();
                        $IDCard_Close = $worksheet->getCellByColumnAndRow(15, $row)->getValue();


                        $countIDcard = $this->Modal_Dengue_Fever->CountIDCard($IDCard);
                        $count_idcard = $countIDcard[0]->Count;

                        $Status = '1';
                        $Status_API = iconv("utf-8//ignore", "tis-620//ignore", "ตรวจสอบคำนำหน้า,จังหวัด,อำเภอ,รหัสไปรษณีย์");

                        if ($count_idcard >= 1) { //น้อยกว่า 0 จะ ลงเป็น status 1 
                            $Status = '0 IDCard';
                            $Status_API = iconv("utf-8//ignore", "tis-620//ignore", "IDCard ซ้ำ");
                        }

                        if ($Mobile == '' || $Mobile == 'NULL') {
                            $Status = '0 Mobile';
                            $Status_API = iconv("utf-8//ignore", "tis-620//ignore", "กรุณากรอกเบอร์โทรศัพท์");
                        }

                        if ($Occp == "" || $Occp == "NULL") {
                            $Occp = "9999";
                        } else {
                            $Occp;
                        }


                        $this->Modal_Dengue_Fever->Upload_Insert($functionName, $Title, $FirstName, $LastName, $Address, $AmphorCode, $ProvinceCode, $PostCode, $IDCard, $Birthday, $Mobile, $Occp, $Ben, $Email, $Coverage, $IDCard_Close, $Username, $Date_Save, $Status, $Status_API);

                        $this->Modal_Dengue_Fever->update_Temp_Detail_True($Username);
                    }
                }
            }
        }

        $data['count_truedata'] = 0;
        $data['count_nodata'] = 0;

        $data['True_Temp_DengueFever'] = $this->Modal_Dengue_Fever->SelectTrueDengueFever($Username, $start, $pageend);
        $data['CountTrueTemp'] = $this->Modal_Dengue_Fever->CountTrueDengueFever($Username);
        foreach ($data['CountTrueTemp'] as $value) {
            $data['count_truedata'] = $value->Count;
        }
        $data['False_Temp_DengueFever'] = $this->Modal_Dengue_Fever->SelectFalseDengueFever($Username, $start, $pageend);
        $data['CountFalseTemp'] = $this->Modal_Dengue_Fever->CountFalseDengueFever($Username);
        foreach ($data['CountFalseTemp'] as $value) {
            $data['count_nodata'] = $value->Count;
        }
        $data['Status_API'] = "";
        $data['Number_Ref'] = "";



        $this->load->view('Upload_DengueFever', $data);
    }

    public function Save_DengueFever() {


        $Username = $this->session->userdata('Username');
        $Password = $this->session->userdata('Password');
        $AutoID = $this->session->userdata('AutoID');
        $FirstName = iconv('tis-620', 'utf-8', $this->session->userdata('FirstName'));
        $LastName = $this->session->userdata('LastName');
        $Tel = $this->session->userdata('Tel');
        $Status = $this->session->userdata('Status');
        $LevelEmp = $this->session->userdata('LevelEmp');
        $DEPARTMENT = $this->session->userdata('DEPARTMENT');

        $data['Username'] = $Username;
        $data['Password'] = $Password;
        $data['AutoID'] = $AutoID;
        $data['FirstName'] = $FirstName;
        $data['LastName'] = $LastName;
        $data['Tel'] = $Tel;
        $data['Status'] = $Status;
        $data['LevelEmp'] = $LevelEmp;
        $data['DEPARTMENT'] = $DEPARTMENT;


        $start = 0;
        $pageend = 50;
        $data['pageend'] = 50;


        $GetDengueFever = $this->Modal_Dengue_Fever->SelectDengueFever($Username);

        //code เชื่อม API
        $curl = curl_init();

        foreach ($GetDengueFever as $item) {

            $ID_Timp = trim(iconv('TIS-620', 'UTF-8', $item->ID_Timp));
            $Title = trim(iconv('TIS-620', 'UTF-8', $item->Title));
            $FirstName = trim(iconv('TIS-620', 'UTF-8', $item->FirstName));
            $LastName = trim(iconv('TIS-620', 'UTF-8', $item->LastName));
            $Address = trim(iconv('TIS-620', 'UTF-8', $item->Address));
            $AmphorCode = trim(iconv('TIS-620', 'UTF-8', $item->AmphorCode));
            $ProvinceCode = trim(iconv('TIS-620', 'UTF-8', $item->ProvinceCode));
            $PostCode = trim($item->PostCode);
            $IDCard = trim($item->IDCard);
            $Birthday = trim($item->Birthday);
            $Mobile = trim($item->Mobile);
            $Occp = trim($item->Occp);
            $Ben = trim($item->Ben);
            $Email = trim($item->Email);
            $Coverage = trim($item->Coverage);
            $IDCard_Close = trim($item->IDCard_Close);
            $IDCardActive = '';



            curl_setopt_array($curl, array(
                //CURLOPT_URL => "https://ws.jpinsurancefriend.com/webservice/uat/service.php",
                CURLOPT_URL => "https://ws.jpinsurancefriend.com/webservice/production/service.php",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => "{\r\n   \"functionName\":\"sendDataPAD\",\r\n   \"Title\":\"$Title\",\r\n   \"FirstName\":\"$FirstName\",\r\n   \"LastName\":\"$LastName\",\r\n   \"Address\":\"$Address\",\r\n   \"AmphorCode\":\"$AmphorCode\",\r\n   \"ProvinceCode\":\"$ProvinceCode\",\r\n   \"PostCode\":\"$PostCode\",\r\n   \"IDCard\":\"$IDCard\",\r\n   \"Birthday\":\"$Birthday\",\r\n   \"Mobile\":\"$Mobile\",\r\n   \"Occp\":\"0100\",\r\n   \"Ben\":\"ทายาทตามกฎหมาย\"\r\n}",
                CURLOPT_HTTPHEADER => array(
                    "Authorization: Bearer jp-YjgxNmMyMTM5N2Y2YTQwMTM0ZjU1ODU3NWNiMzRkMTMxMWIwZTk3NDQ2YmE5OTgxYzA3NWQ3NGQyYmIxNGFkYzMyMzAzMjMwMzAzODMzMzEzMTMwMzMzMDMyMzg=",
                    "Content-Type: application/json"
                ),
            ));
            $response = curl_exec($curl);

            curl_close($curl);

            $arr[] = json_decode($response, true); // loop data Api 
//$curl = curl_init();
//
//curl_setopt_array($curl, array(
//  CURLOPT_URL => "https://ws.jpinsurancefriend.com/webservice/uat/service.php",
//  CURLOPT_RETURNTRANSFER => true,
//  CURLOPT_ENCODING => "",
//  CURLOPT_MAXREDIRS => 10,
//  CURLOPT_TIMEOUT => 0,
//  CURLOPT_FOLLOWLOCATION => true,
//  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//  CURLOPT_CUSTOMREQUEST => "POST",
//  CURLOPT_POSTFIELDS =>"{\r\n   \"functionName\":\"sendDataPAD\",\r\n   \"Title\":\"$Title\",\r\n   \"FirstName\":\"$FirstName\",\r\n   \"LastName\":\"$LastName\",\r\n   \"Address\":\"$Address\",\r\n   \"AmphorCode\":\"$AmphorCode\",\r\n   \"ProvinceCode\":\"$ProvinceCode\",\r\n   \"PostCode\":\"$PostCode\",\r\n   \"IDCard\":\"$IDCard\",\r\n   \"Birthday\":\"$Birthday\",\r\n   \"Mobile\":\"$Mobile\",\r\n   \"Occp\":\"0100\",\r\n   \"Ben\":\"ทายาทตามกฎหมาย\"\r\n}",
//  CURLOPT_HTTPHEADER => array(
//    "Authorization: Bearer jp-YjgxNmMyMTM5N2Y2YTQwMTM0ZjU1ODU3NWNiMzRkMTMxMWIwZTk3NDQ2YmE5OTgxYzA3NWQ3NGQyYmIxNGFkYzMyMzAzMjMwMzAzODMzMzEzMTMwMzMzMDMyMzg=",
//    "Content-Type: application/json"
//  ),
//));
//
//$response = curl_exec($curl);
//
//curl_close($curl);
//
//$arr[] = json_decode($response, true); // loop data Api 
//        var_dump ($response);

            if ($arr) {
                foreach ($arr as $key => $val) {
                    $val["status"];

                    switch ($val["status"]) {
                        case '200'://SUCCESS
                            $Ref = $val["data"]["ref"];
                            $url = $val["data"]["url"];

                            break;

                        case '401'://ERROR
                            if ($val["message"] == "data error") {

                                foreach ($val["data"] as $key => $value) {
                                    $key = $value;
                                    $IDCardActive = trim(iconv('UTF-8//ignore', 'TIS-620//ignore', $key));
                                }
                            } else if ($val["message"] == "data empty") {

                                $ar = $val["data"];

                                for ($ii = 0; $ii < count($ar); $ii++) {

                                    $key = $ar[$ii]["key"];
                                    $ar[$ii]["value"];
                                }
                            }

                            break;
                    }
                }
            }

//           echo "<pre>";
//            print_r($arr);
//            echo "</pre>";

            if ($val["status"] == '200') {

                $where = "Number_Ref = '$Ref', Status = 'SUCCESS' , Status_API = 'SUCCESS'";
            } else if ($val["status"] == '401') {

                if ($val["message"] == "data error") {

                    $where = "Number_Ref = '' , Status = '0', Status_API = '$IDCardActive'";
                } else if ($val["message"] == "data empty") {

                    $where = "Number_Ref = '' ,Status = '0', Status_API = '$key'";
                }
            }

            //Update
            $this->Modal_Dengue_Fever->update_Temp_DengueFever($where, $Username, $ID_Timp);
        }

        $Date_Save = '';
        $Number_Ref = '';
        $functionName = '';


        $wheresuccess = "AND Status = 'SUCCESS'";
        $data['GET_SUCCESS'] = $this->Modal_Dengue_Fever->SelectTrueDengueFevererror($Username, $wheresuccess, $start, $pageend);

        $this->Modal_Dengue_Fever->UpdateDengueFever($Username); // update data เดิมในฐานจริงให้เป็น 00 เพื่อ insent status 1 

//        foreach ($data['GET_SUCCESS'] as $item) {
//
//            $ID_Timp = $item->ID_Timp;
//            $functionName = $item->functionName;
//            $Title = trim($item->Title);
//            $FirstName = trim($item->FirstName);
//            $LastName = trim($item->LastName);
//            $Address = trim($item->Address);
//            $AmphorCode = $item->AmphorCode;
//            $ProvinceCode = $item->ProvinceCode;
//            $PostCode = $item->PostCode;
//            $IDCard = $item->IDCard;
//            $Birthday = $item->Birthday;
//            $Mobile = $item->Mobile;
//            $Occp = $item->Occp;
//            $Ben = $item->Ben;
//            $Email = $item->Email;
//            $Coverage = $item->Coverage;
//            $IDCard_Close = $item->IDCard_Close;
//            $Number_Ref = $item->Number_Ref;
//            $Date_Save = $item->Date_Save;
//
//
//            $this->Modal_Dengue_Fever->InsertDengueFever($functionName, $Title, $FirstName, $LastName, $Address, $AmphorCode, $ProvinceCode, $PostCode, $IDCard, $Birthday, $Mobile, $Occp, $Ben, $Email, $Coverage, $IDCard_Close, $Number_Ref, $Username, $Date_Save);
//            $this->Modal_Dengue_Fever->Delete_TmpDengueFever($Username);
//        }



//        $wheresuccess = "AND Status = '1'";
//        $data['True_Temp_DengueFever'] = $this->Modal_Dengue_Fever->Select_TrueDengueFever($Username, $wheresuccess, $start, $pageend);
//        foreach ($data['True_Temp_DengueFever'] as $value) {
//            $data['Number_Ref'] = $value->Number_Ref;
//        }
//
//        $data['CountTrueTemp'] = $this->Modal_Dengue_Fever->CountTrue_DengueFever($Username);
//        $data['count_truedata'] = 0;
//
//        $data['False_Temp_DengueFever'] = $this->Modal_Dengue_Fever->SelectFalseDengueFever($Username, $start, $pageend);
//        foreach ($data['False_Temp_DengueFever'] as $value) {
//            $data['Status_API'] = $value->Status_API;
//            $data['Number_Ref'] = $value->Number_Ref;
//        }
//        $data['CountFalseTemp'] = $this->Modal_Dengue_Fever->CountFalseDengueFever($Username, $wheresuccess);
//        foreach ($data['CountFalseTemp'] as $value) {
//            $data['count_nodata'] = $value->Count;
//        }


        $this->load->view('Upload_DengueFever', $data);
    }

    public function Delete_TemDengueFever() {

        $Username = $this->session->userdata('Username');
        $Password = $this->session->userdata('Password');
        $AutoID = $this->session->userdata('AutoID');
        $FirstName = iconv('tis-620', 'utf-8', $this->session->userdata('FirstName'));
        $LastName = $this->session->userdata('LastName');
        $Tel = $this->session->userdata('Tel');
        $Status = $this->session->userdata('Status');
        $LevelEmp = $this->session->userdata('LevelEmp');
        $DEPARTMENT = $this->session->userdata('DEPARTMENT');

        $data['Username'] = $Username;
        $data['Password'] = $Password;
        $data['AutoID'] = $AutoID;
        $data['FirstName'] = $FirstName;
        $data['LastName'] = $LastName;
        $data['Tel'] = $Tel;
        $data['Status'] = $Status;
        $data['LevelEmp'] = $LevelEmp;
        $data['DEPARTMENT'] = $DEPARTMENT;

        $start = 0;
        $pageend = 50;
        $data['pageend'] = 50;
        $data['Status_API'] = "";
        $data['Number_Ref'] = "";
        $data['count_truedata'] = 0;
        $data['count_nodata'] = 0;


        $this->Modal_Dengue_Fever->DeleteTmpDengueFeverTotal($Username);



        $data['True_Temp_DengueFever'] = $this->Modal_Dengue_Fever->SelectTrueDengueFever($Username, $start, $pageend);
        $data['CountTrueTemp'] = $this->Modal_Dengue_Fever->CountTrueDengueFever($Username);
        foreach ($data['CountTrueTemp'] as $value) {
            $data['count_truedata'] = $value->Count;
        }
        $data['False_Temp_DengueFever'] = $this->Modal_Dengue_Fever->SelectFalseDengueFever($Username, $start, $pageend);
        $data['CountFalseTemp'] = $this->Modal_Dengue_Fever->CountFalseDengueFever($Username);
        foreach ($data['CountFalseTemp'] as $value) {
            $data['count_nodata'] = $value->Count;
        }

//         redirect("Con_Dengue_Fever/Home");
        $this->load->view('Upload_DengueFever', $data);
    }

    public function Send_DengueFever() {

        $Username = $this->session->userdata('Username');
        $Password = $this->session->userdata('Password');
        $AutoID = $this->session->userdata('AutoID');
        $FirstName = iconv('tis-620', 'utf-8', $this->session->userdata('FirstName'));
        $LastName = $this->session->userdata('LastName');
        $Tel = $this->session->userdata('Tel');
        $Status = $this->session->userdata('Status');
        $LevelEmp = $this->session->userdata('LevelEmp');
        $DEPARTMENT = $this->session->userdata('DEPARTMENT');

        $data['Username'] = $Username;
        $data['Password'] = $Password;
        $data['AutoID'] = $AutoID;
        $data['FirstName'] = $FirstName;
        $data['LastName'] = $LastName;
        $data['Tel'] = $Tel;
        $data['Status'] = $Status;
        $data['LevelEmp'] = $LevelEmp;
        $data['DEPARTMENT'] = $DEPARTMENT;

        $start = 0;
        $pageend = 50;
        $data['pageend'] = 50;
        $data['Status_API'] = "";
        $data['Number_Ref'] = "";



        $wheresuccess = "AND Status = 'SUCCESS'";
        $data['Dengue_Fever'] = $this->Modal_Dengue_Fever->SelectTrueDengueFevererror($Username, $wheresuccess, $start, $pageend);
        foreach ($data['Dengue_Fever'] as $value) {
            $data['Status_API'] = $value->Status_API;
            $data['Number_Ref'] = $value->Number_Ref;
        }
        $data['CountDengue_Fever'] = $this->Modal_Dengue_Fever->CountTrueDengueFevererror($Username, $wheresuccess);


        $data['Show_Data_management'] = "SerchDengueFever";
        $this->load->view('Home_Dengue', $data);
    }

    public function Search_DengueFever() {

        $Username = $this->session->userdata('Username');
        $Password = $this->session->userdata('Password');
        $AutoID = $this->session->userdata('AutoID');
        $FirstName = iconv('tis-620', 'utf-8', $this->session->userdata('FirstName'));
        $LastName = $this->session->userdata('LastName');
        $Tel = $this->session->userdata('Tel');
        $Status = $this->session->userdata('Status');
        $LevelEmp = $this->session->userdata('LevelEmp');
        $DEPARTMENT = $this->session->userdata('DEPARTMENT');

        $data['Username'] = $Username;
        $data['Password'] = $Password;
        $data['AutoID'] = $AutoID;
        $data['FirstName'] = $FirstName;
        $data['LastName'] = $LastName;
        $data['Tel'] = $Tel;
        $data['Status'] = $Status;
        $data['LevelEmp'] = $LevelEmp;
        $data['DEPARTMENT'] = $DEPARTMENT;


        $page = $this->input->post('page');

        if ($page != '') {
            $page = $page;
        } else {
            $page = 1;
        }

        $pageend1 = 50;


        $start = ($page - 1) * $pageend1;
        $pageend = $page * 50;

        $data['pageend'] = $pageend1;
        $data['pagenum'] = $page;

        $data['Number_Ref'] = "";
        $data['Status_API'] = "";


        $Operator = trim($this->input->post('Operator'));
        $dataSearch = iconv("UTF-8//ignore", "TIS-620//ignore", trim($this->input->post('dataSearch')));
        $startdateSearch = trim($this->input->post('startdateSearch'));
        $EnddateSearch = trim($this->input->post('EnddateSearch'));


        if ($startdateSearch != '' || $EnddateSearch != '') {
            $wherestartdateSearch = "AND Date_Save BETWEEN '" . $startdateSearch . "' AND '" . $EnddateSearch . "'";
        } else {
            $wherestartdateSearch = '';
        }

        if ($Operator == "IDcard") {
            $whereUsername = " WHERE User_Save = '" . $Username . "'  AND IDCard LIKE '%" . $dataSearch . "%' $wherestartdateSearch";
        } else if ($Operator == 'NumberRef') {
            $whereUsername = " WHERE User_Save = '" . $Username . "'  AND Number_Ref LIKE '%" . $dataSearch . "%' $wherestartdateSearch";
        } else {
            $whereUsername = "";
        }


        $data['Dengue_Fever'] = $this->Modal_Dengue_Fever->SearchTrueDengueFever($whereUsername, $start, $pageend);
        foreach ($data['Dengue_Fever'] as $value) {
            $data['Number_Ref'] = $value->Number_Ref;
        }

        $data['CountDengue_Fever'] = $this->Modal_Dengue_Fever->CountSearchTrueDengueFever($whereUsername);

        $this->load->view('Table_Uploadfile', $data);
    }

    public function Send_data() {

        $Username = $this->session->userdata('Username');
        $Password = $this->session->userdata('Password');
        $AutoID = $this->session->userdata('AutoID');
        $FirstName = iconv('tis-620', 'utf-8', $this->session->userdata('FirstName'));
        $LastName = $this->session->userdata('LastName');
        $Tel = $this->session->userdata('Tel');
        $Status = $this->session->userdata('Status');
        $LevelEmp = $this->session->userdata('LevelEmp');
        $DEPARTMENT = $this->session->userdata('DEPARTMENT');

        $data['Username'] = $Username;
        $data['Password'] = $Password;
        $data['AutoID'] = $AutoID;
        $data['FirstName'] = $FirstName;
        $data['LastName'] = $LastName;
        $data['Tel'] = $Tel;
        $data['Status'] = $Status;
        $data['LevelEmp'] = $LevelEmp;
        $data['DEPARTMENT'] = $DEPARTMENT;

        $start = 0;
        $pageend = 50;
        $data['pageend'] = 50;
        $data['Status_API'] = "";
        $data['Number_Ref'] = "";

        $data['TITLE'] = $this->input->get('TITLE');

        if ($data['TITLE'] == "Occupation") {
            $data['Total_data'] = $this->Modal_Dengue_Fever->GETOCCUPATION();
        } else if ($data['TITLE'] == "District") {
            $data['Total_data'] = $this->Modal_Dengue_Fever->GETDistrict();
        } else if ($data['TITLE'] == "Province") {
            $data['Total_data'] = $this->Modal_Dengue_Fever->GETPROVINCE();
        } else if ($data['TITLE'] == "Title") {
            $data['Total_data'] = $this->Modal_Dengue_Fever->GETTITLE();
        }


        $data['Show_Data_management'] = "Table_occupation";
        $this->load->view('Home_Dengue', $data);
    }

    public function Search_datatotal() {

        $Username = $this->session->userdata('Username');
        $Password = $this->session->userdata('Password');
        $AutoID = $this->session->userdata('AutoID');
        $FirstName = iconv('tis-620', 'utf-8', $this->session->userdata('FirstName'));
        $LastName = $this->session->userdata('LastName');
        $Tel = $this->session->userdata('Tel');
        $Status = $this->session->userdata('Status');
        $LevelEmp = $this->session->userdata('LevelEmp');
        $DEPARTMENT = $this->session->userdata('DEPARTMENT');

        $data['Username'] = $Username;
        $data['Password'] = $Password;
        $data['AutoID'] = $AutoID;
        $data['FirstName'] = $FirstName;
        $data['LastName'] = $LastName;
        $data['Tel'] = $Tel;
        $data['Status'] = $Status;
        $data['LevelEmp'] = $LevelEmp;
        $data['DEPARTMENT'] = $DEPARTMENT;

        $start = 0;
        $pageend = 50;
        $data['pageend'] = 50;
        $data['Status_API'] = "";
        $data['Number_Ref'] = "";

        $data['TITLE'] = $this->input->post('TITLE');

        if ($data['TITLE'] == "Occupation") {

            $Occupation = trim($this->input->post('Occupation'));
            $dataSearchOccupation = iconv("UTF-8//ignore", "TIS-620//ignore", trim($this->input->post('dataSearchOccupation')));

            if ($Occupation == "CODE_OCCUP") {
                $whereUsername = " WHERE  CODE_OCCUP LIKE '%" . $dataSearchOccupation . "%'";
            } else if ($Occupation == 'Occupation') {
                $whereUsername = " WHERE  Occupation LIKE '%" . $dataSearchOccupation . "%'";
            } else {
                $whereUsername = "";
            }

            $data['Total_data'] = $this->Modal_Dengue_Fever->SearchOccupation($whereUsername);
        } else if ($data['TITLE'] == "District") {


            $DISTRICTCODE = trim($this->input->post('DISTRICTCODE'));
            $dataSearchDISTRICT = iconv("UTF-8//ignore", "TIS-620//ignore", trim($this->input->post('dataSearchDISTRICT')));

            if ($DISTRICTCODE == "DISTRICT_CODE") {
                $whereUsername = " WHERE  DISTRICT_CODE LIKE '%" . $dataSearchDISTRICT . "%'";
            } else if ($DISTRICTCODE == 'DISTRICT') {
                $whereUsername = " WHERE  DISTRICT LIKE '%" . $dataSearchDISTRICT . "%'";
            } else {
                $whereUsername = "";
            }

            $data['Total_data'] = $this->Modal_Dengue_Fever->SearchDISTRICT($whereUsername);
        } else if ($data['TITLE'] == "Province") {

            $PROVINCECODE = trim($this->input->post('PROVINCE'));
            $dataSearchPROVINCE = iconv("UTF-8//ignore", "TIS-620//ignore", trim($this->input->post('dataSearchPROVINCE')));

            if ($PROVINCECODE == "PROVINCE_CODE") {
                $whereUsername = " WHERE  PROVINCE_CODE LIKE '%" . $dataSearchPROVINCE . "%'";
            } else if ($PROVINCECODE == 'PROVINCE') {
                $whereUsername = " WHERE  PROVINCE LIKE '%" . $dataSearchPROVINCE . "%'";
            } else {
                $whereUsername = "";
            }

            $data['Total_data'] = $this->Modal_Dengue_Fever->SearchPROVINCE($whereUsername);
        } else if ($data['TITLE'] == "Title") {


            $Title_id = trim($this->input->post('Title_id'));
            $dataSearchTITLE = iconv("UTF-8//ignore", "TIS-620//ignore", trim($this->input->post('dataSearchTITLE')));

            if ($Title_id == "TITLE_CODE") {
                $whereUsername = " WHERE  TITLE_CODE LIKE '%" . $dataSearchTITLE . "%'";
            } else if ($Title_id == 'Title') {
                $whereUsername = " WHERE  TITLE LIKE '%" . $dataSearchTITLE . "%'";
            } else {
                $whereUsername = "";
            }

            $data['Total_data'] = $this->Modal_Dengue_Fever->SearchTITLE($whereUsername);
        }

        $this->load->view('subtable', $data);
    }

    public function Export_ReportNosavedata() {

        $Username = $this->session->userdata('Username');
        $Password = $this->session->userdata('Password');

        $data['Username'] = $Username;
        $data['Password'] = $Password;

        $Current_date = $this->Modal_Dengue_Fever->Current_date();
        foreach ($Current_date as $value) {
            $Date_Save = $value->Currentdate;
        }

        $start = 0;
        $pageend = 50;


        $data['False_Temp_DengueFever'] = $this->Modal_Dengue_Fever->SumSelectFalseDengueFever($Username);



        $objPHPExcel = new PHPExcel();
        $objPHPExcel->getActiveSheet()->setTitle('ข้อมูลที่บันทึกไม่ได้'); //ชื่อหัว
        $objPHPExcel->setActiveSheetIndex(0) //หัวข้อ
                ->setCellValue('A1', 'No')
                ->setCellValue('B1', 'functionName')
                ->setCellValue('C1', 'Title')
                ->setCellValue('D1', 'FirstName')
                ->setCellValue('E1', 'LastName')
                ->setCellValue('F1', 'Address')
                ->setCellValue('G1', 'AmphorCode')
                ->setCellValue('H1', 'ProvinceCode')
                ->setCellValue('I1', 'PostCode')
                ->setCellValue('J1', 'IDCard')
                ->setCellValue('K1', 'Birthday')
                ->setCellValue('L1', 'Mobile')
                ->setCellValue('M1', 'Occp')
                ->setCellValue('N1', 'Ben')
                ->setCellValue('O1', 'Coverage')
                ->setCellValue('P1', 'IDCard_Close')
                ->setCellValue('Q1', 'Status_API');


        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(20);  //ปรับความกว่างของช่อง
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(25);
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(25);
        $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(25);
        $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(25);
        $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(25);
        $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(25);
        $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(25);
        $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(25);
        $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(25);
        $objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(25);
        $objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(25);
        $objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(25);
        $objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(25);
        $objPHPExcel->getActiveSheet()->getColumnDimension('O')->setWidth(25);
        $objPHPExcel->getActiveSheet()->getColumnDimension('P')->setWidth(25);
        $objPHPExcel->getActiveSheet()->getColumnDimension('Q')->setWidth(40);

        //ใส่สีหัวข้อ
        $objPHPExcel->getActiveSheet()->getStyle('A1:Q1')->applyFromArray(
                array(
                    'fill' => array(
                        'type' => PHPExcel_Style_Fill::FILL_SOLID,
                        'color' => array('rgb' => 'B8DBD9')
                    )
                )
        );

        $start2 = 2;


        foreach ($data['False_Temp_DengueFever'] as $row) {

            $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('A' . $start2, $row->row)
                    ->setCellValue('B' . $start2, $row->functionName)
                    ->setCellValue('C' . $start2, iconv('tis-620//IGNORE', 'utf-8//IGNORE', $row->Title))
                    ->setCellValue('D' . $start2, iconv('tis-620//IGNORE', 'utf-8//IGNORE', $row->FirstName))
                    ->setCellValue('E' . $start2, iconv('tis-620//IGNORE', 'utf-8//IGNORE', $row->LastName))
                    ->setCellValue('F' . $start2, iconv('tis-620//IGNORE', 'utf-8//IGNORE', $row->Address))
                    ->setCellValue('G' . $start2, iconv('tis-620//IGNORE', 'utf-8//IGNORE', $row->AmphorCode))
                    ->setCellValue('H' . $start2, iconv('tis-620//IGNORE', 'utf-8//IGNORE', $row->ProvinceCode))
                    ->setCellValue('I' . $start2, $row->PostCode)
                    ->setCellValue('J' . $start2, $row->IDCard)
                    ->setCellValue('K' . $start2, $row->Birthday)
                    ->setCellValue('L' . $start2, $row->Mobile)
                    ->setCellValue('M' . $start2, $row->Occp)
                    ->setCellValue('N' . $start2, $row->Ben)
                    ->setCellValue('O' . $start2, $row->Coverage)
                    ->setCellValue('P' . $start2, $row->IDCard_Close)
                    ->setCellValue('Q' . $start2, iconv('tis-620//IGNORE', 'utf-8//IGNORE', $row->Status_API));


            // เพิ่มแถวข้อมูล
            $start2++;
        }


        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');  // Excel2007 (xlsx) หรือ Excel5 (xls)         
        $filename = 'ข้อมูลที่บันทึกไม่ได้-' . date("dmY") . '.xlsx'; //  กำหนดชือ่ไฟล์ นามสกุล xls หรือ xlsx

        header('Content-Type: application/vnd.ms-excel'); //mime type
        header('Content-Disposition: attachment;filename="' . $filename . '"'); //tell browser what's the file name
        header('Cache-Control: max-age=0'); //no cache
        ob_end_clean();
        $objWriter->save('php://output'); // ดาวน์โหลดไฟล์รายงาน

        exit;
    }

    public function Export_Senddata() {



        $Username = $this->session->userdata('Username');
        $Password = $this->session->userdata('Password');

        $data['Username'] = $Username;
        $data['Password'] = $Password;

        $Current_date = $this->Modal_Dengue_Fever->Current_date();
        foreach ($Current_date as $value) {
            $Date_Save = $value->Currentdate;
        }

        $page = $this->input->post('page');

        if ($page != '') {
            $page = $page;
        } else {
            $page = 1;
        }

        $pageend1 = 50;


        $start = ($page - 1) * $pageend1;
        $pageend = $page * 50;

        $data['pageend'] = $pageend1;
        $data['pagenum'] = $page;


        $Operator = trim($this->input->post('Operator'));
        $dataSearch = iconv("UTF-8//ignore", "TIS-620//ignore", trim($this->input->post('dataSearch')));
        $startdateSearch = trim($this->input->post('startdateSearch'));
        $EnddateSearch = trim($this->input->post('EnddateSearch'));

        if ($startdateSearch != '' || $EnddateSearch != '') {
            echo'<br>' . $wherestartdateSearch = "AND Date_Save BETWEEN '" . $startdateSearch . "' AND '" . $EnddateSearch . "'";
        } else {
            $wherestartdateSearch = '';
        }

        if ($Operator == "IDcard") {
            $whereUsername = " WHERE User_Save = '" . $Username . "'  AND IDCard LIKE '%" . $dataSearch . "%' $wherestartdateSearch";
        } else if ($Operator == 'NumberRef') {
            $whereUsername = " WHERE User_Save = '" . $Username . "'  AND Number_Ref LIKE '%" . $dataSearch . "%' $wherestartdateSearch";
        } else {
            $whereUsername = "";
        }

//      $data['Dengue_Fever'] = $this->Modal_Dengue_Fever->SearchTrueDengueFever($whereUsername ,$start, $pageend);
        $data['Dengue_Fever'] = $this->Modal_Dengue_Fever->SearchTrueDengueFeverTotal($whereUsername);
        foreach ($data['Dengue_Fever'] as $value) {
            $data['Number_Ref'] = $value->Number_Ref;
        }

        $data['CountDengue_Fever'] = $this->Modal_Dengue_Fever->CountSearchTrueDengueFever($whereUsername);


        $objPHPExcel = new PHPExcel();
        $objPHPExcel->getActiveSheet()->setTitle('ข้อมูลที่บันทึกไม่ได้'); //ชื่อหัว
        $objPHPExcel->setActiveSheetIndex(0) //หัวข้อ
                ->setCellValue('A1', 'No')
                ->setCellValue('B1', 'Title')
                ->setCellValue('C1', 'FirstName')
                ->setCellValue('D1', 'LastName')
                ->setCellValue('E1', 'Address')
                ->setCellValue('F1', 'Address')
                ->setCellValue('G1', 'AmphorCode')
                ->setCellValue('H1', 'NameAmphorCode')
                ->setCellValue('I1', 'ProvinceCode')
                ->setCellValue('J1', 'NameProvinceCode')
                ->setCellValue('K1', 'PostCode')
                ->setCellValue('L1', 'IDCard')
                ->setCellValue('M1', 'Birthday')
                ->setCellValue('N1', 'Mobile')
                ->setCellValue('O1', 'Occp')
                ->setCellValue('P1', 'Ben')
                ->setCellValue('Q1', 'Number_Ref');


        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(10);  //ปรับความกว่างของช่อง
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(25);
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(25);
        $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(25);
        $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(25);
        $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(25);
        $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(25);
        $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(25);
        $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(25);
        $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(25);
        $objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(25);
        $objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(25);
        $objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(25);
        $objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(25);
        $objPHPExcel->getActiveSheet()->getColumnDimension('O')->setWidth(25);
        $objPHPExcel->getActiveSheet()->getColumnDimension('P')->setWidth(25);
        $objPHPExcel->getActiveSheet()->getColumnDimension('Q')->setWidth(25);

        //ใส่สีหัวข้อ
        $objPHPExcel->getActiveSheet()->getStyle('A1:Q1')->applyFromArray(
                array(
                    'fill' => array(
                        'type' => PHPExcel_Style_Fill::FILL_SOLID,
                        'color' => array('rgb' => 'B8DBD9')
                    )
                )
        );

        $start2 = 2;


        foreach ($data['Dengue_Fever'] as $row) {

            $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('A' . $start2, $row->row)
                    ->setCellValue('B' . $start2, iconv('tis-620//IGNORE', 'utf-8//IGNORE', $row->Title))
                    ->setCellValue('C' . $start2, iconv('tis-620//IGNORE', 'utf-8//IGNORE', $row->FirstName))
                    ->setCellValue('D' . $start2, iconv('tis-620//IGNORE', 'utf-8//IGNORE', $row->LastName))
                    ->setCellValue('E' . $start2, iconv('tis-620//IGNORE', 'utf-8//IGNORE', $row->LastName))
                    ->setCellValue('F' . $start2, iconv('tis-620//IGNORE', 'utf-8//IGNORE', $row->Address))
                    ->setCellValue('G' . $start2, iconv('tis-620//IGNORE', 'utf-8//IGNORE', $row->AmphorCode))
                    ->setCellValue('H' . $start2, iconv('tis-620//IGNORE', 'utf-8//IGNORE', $row->DISTRICT))
                    ->setCellValue('I' . $start2, iconv('tis-620//IGNORE', 'utf-8//IGNORE', $row->ProvinceCode))
                    ->setCellValue('J' . $start2, iconv('tis-620//IGNORE', 'utf-8//IGNORE', $row->PROVINCE))
                    ->setCellValue('K' . $start2, $row->PostCode)
                    ->setCellValue('L' . $start2, $row->IDCard)
                    ->setCellValue('M' . $start2, $row->Birthday)
                    ->setCellValue('N' . $start2, $row->Mobile)
                    ->setCellValue('O' . $start2, $row->Occp)
                    ->setCellValue('P' . $start2, $row->Ben)
                    ->setCellValue('Q' . $start2, $row->Number_Ref);


            // เพิ่มแถวข้อมูล
            $start2++;
        }


        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');  // Excel2007 (xlsx) หรือ Excel5 (xls)         
        $filename = 'ข้อมูลที่บันทึกไม่ได้-' . date("dmY") . '.xlsx'; //  กำหนดชือ่ไฟล์ นามสกุล xls หรือ xlsx

        header('Content-Type: application/vnd.ms-excel'); //mime type
        header('Content-Disposition: attachment;filename="' . $filename . '"'); //tell browser what's the file name
        header('Cache-Control: max-age=0'); //no cache
        ob_end_clean();
        $objWriter->save('php://output'); // ดาวน์โหลดไฟล์รายงาน

        exit;
    }

    public function Export_Ex() {

        $Username = $this->session->userdata('Username');
        $Password = $this->session->userdata('Password');


        $data['Username'] = $Username;
        $data['Password'] = $Password;

        $Current_date = $this->Modal_Dengue_Fever->Current_date();
        foreach ($Current_date as $value) {
            $Date_Save = $value->Currentdate;
        }

        $start = 0;
        $pageend = 50;

        $objPHPExcel = new PHPExcel();
        $objPHPExcel->getActiveSheet()->setTitle('ข้อมูลที่บันทึกไม่ได้'); //ชื่อหัว
        $objPHPExcel->setActiveSheetIndex(0) //หัวข้อ
                ->setCellValue('A1', 'functionName')
                ->setCellValue('B1', 'Title')
                ->setCellValue('C1', 'FirstName')
                ->setCellValue('D1', 'LastName')
                ->setCellValue('E1', 'Address')
                ->setCellValue('F1', 'AmphorCode')
                ->setCellValue('G1', 'ProvinceCode')
                ->setCellValue('H1', 'PostCode')
                ->setCellValue('I1', 'IDCard')
                ->setCellValue('J1', 'Birthday')
                ->setCellValue('K1', 'Mobile')
                ->setCellValue('L1', 'Occp')
                ->setCellValue('M1', 'Ben')
                ->setCellValue('N1', 'Coverage')
                ->setCellValue('O1', 'IDCard_Close');


        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(15);
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(16);
        $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(15);
        $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(13);
        $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(35);
        $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(35);
        $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(25);
        $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(25);
        $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(23);
        $objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(60);
        $objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(15);
        $objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(15);
        $objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(15);
        $objPHPExcel->getActiveSheet()->getColumnDimension('O')->setWidth(15);

        //ใส่สีหัวข้อ
        $objPHPExcel->getActiveSheet()->getStyle('A1:O1')->applyFromArray(
                array(
                    'fill' => array(
                        'type' => PHPExcel_Style_Fill::FILL_SOLID,
                        'color' => array('rgb' => 'B8DBD9')
                    )
                )
        );

        $n = 2;

        $objPHPExcel->getActiveSheet()->setCellValue('A' . $n, "ค่าว่าง");
        $objPHPExcel->getActiveSheet()->setCellValue('B' . $n, "นาง-นาย-นางสาว");
        $objPHPExcel->getActiveSheet()->setCellValue('C' . $n, "ซื่อ");
        $objPHPExcel->getActiveSheet()->setCellValue('D' . $n, "สกุล");
        $objPHPExcel->getActiveSheet()->setCellValue('E' . $n, "ที่อยู่");
        $objPHPExcel->getActiveSheet()->setCellValue('F' . $n, "อำเภอแก่งคอย หรือ เขตดินแดง");
        $objPHPExcel->getActiveSheet()->setCellValue('G' . $n, "จังหวัดสระบุรี หรือ กรุงเทพมหานคร");
        $objPHPExcel->getActiveSheet()->setCellValue('H' . $n, "18110");
        $objPHPExcel->getActiveSheet()->setCellValue('I' . $n, "1777782989649 ห้ามซ้ำ");
        $objPHPExcel->getActiveSheet()->setCellValue('J' . $n, "วันเกิด 1966-11-08");
        $objPHPExcel->getActiveSheet()->setCellValue('K' . $n, "0827226173 เบอร์โทรต้องกรอกให้ครบและห้ามเป็นค่าว่าง");
        $objPHPExcel->getActiveSheet()->setCellValue('L' . $n, "9999");
        $objPHPExcel->getActiveSheet()->setCellValue('M' . $n, "-");
        $objPHPExcel->getActiveSheet()->setCellValue('N' . $n, "-");
        $objPHPExcel->getActiveSheet()->setCellValue('O' . $n, "-");


        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');  // Excel2007 (xlsx) หรือ Excel5 (xls)         
        $filename = 'ตัวอย่างไฟล์โหลด-' . '.xlsx'; //  กำหนดชือ่ไฟล์ นามสกุล xls หรือ xlsx

        header('Content-Type: application/vnd.ms-excel'); //mime type
        header('Content-Disposition: attachment;filename="' . $filename . '"'); //tell browser what's the file name
        header('Cache-Control: max-age=0'); //no cache
        ob_end_clean();
        $objWriter->save('php://output'); // ดาวน์โหลดไฟล์รายงาน

        exit;
    }

    public function Export_Occupation() {

        $Username = $this->session->userdata('Username');
        $Password = $this->session->userdata('Password');

        $data['Username'] = $Username;
        $data['Password'] = $Password;

        $Current_date = $this->Modal_Dengue_Fever->Current_date();

        $start = 0;
        $pageend = 50;

        $data['SHOWOCCUPATION'] = $this->Modal_Dengue_Fever->Get_OCCUPATION();

        $objPHPExcel = new PHPExcel();
        $objPHPExcel->getActiveSheet()->setTitle('ข้อมูลที่บันทึกไม่ได้'); //ชื่อหัว
        $objPHPExcel->setActiveSheetIndex(0) //หัวข้อ
                ->setCellValue('A1', 'No')
                ->setCellValue('B1', 'CODE_OCCUP')
                ->setCellValue('C1', 'Occupation');


        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(10);  //ปรับความกว่างของช่อง
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(13);
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(20);


        //ใส่สีหัวข้อ
        $objPHPExcel->getActiveSheet()->getStyle('A1:C1')->applyFromArray(
                array(
                    'fill' => array(
                        'type' => PHPExcel_Style_Fill::FILL_SOLID,
                        'color' => array('rgb' => 'B8DBD9')
                    )
                )
        );

        $start2 = 2;


        foreach ($data['SHOWOCCUPATION'] as $row) {

            $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('A' . $start2, $row->row)
                    ->setCellValue('B' . $start2, $row->CODE_OCCUP)
                    ->setCellValue('C' . $start2, iconv('tis-620//IGNORE', 'utf-8//IGNORE', $row->Occupation));

            // เพิ่มแถวข้อมูล
            $start2++;
        }


        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');  // Excel2007 (xlsx) หรือ Excel5 (xls)         
        $filename = 'ข้อมูลอาชีพ-' . date("dmY") . '.xlsx'; //  กำหนดชือ่ไฟล์ นามสกุล xls หรือ xlsx

        header('Content-Type: application/vnd.ms-excel'); //mime type
        header('Content-Disposition: attachment;filename="' . $filename . '"'); //tell browser what's the file name
        header('Cache-Control: max-age=0'); //no cache
        ob_end_clean();
        $objWriter->save('php://output'); // ดาวน์โหลดไฟล์รายงาน

        exit;
    }

    public function Export_PROVINCE() {

        $Username = $this->session->userdata('Username');
        $Password = $this->session->userdata('Password');

        $data['Username'] = $Username;
        $data['Password'] = $Password;

        $Current_date = $this->Modal_Dengue_Fever->Current_date();

        $start = 0;
        $pageend = 50;

        $data['SHOWPROVINCE'] = $this->Modal_Dengue_Fever->Get_PROVINCE();

        $objPHPExcel = new PHPExcel();
        $objPHPExcel->getActiveSheet()->setTitle('ข้อมูลที่บันทึกไม่ได้'); //ชื่อหัว
        $objPHPExcel->setActiveSheetIndex(0) //หัวข้อ
                ->setCellValue('A1', 'No')
                ->setCellValue('B1', 'PROVINCE_CODE')
                ->setCellValue('C1', 'PROVINCE');


        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(10);  //ปรับความกว่างของช่อง
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(13);
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(20);


        //ใส่สีหัวข้อ
        $objPHPExcel->getActiveSheet()->getStyle('A1:C1')->applyFromArray(
                array(
                    'fill' => array(
                        'type' => PHPExcel_Style_Fill::FILL_SOLID,
                        'color' => array('rgb' => 'B8DBD9')
                    )
                )
        );

        $start2 = 2;


        foreach ($data['SHOWPROVINCE'] as $row) {

            $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('A' . $start2, $row->row)
                    ->setCellValue('B' . $start2, $row->PROVINCE_CODE)
                    ->setCellValue('C' . $start2, iconv('tis-620//IGNORE', 'utf-8//IGNORE', $row->PROVINCE));

            // เพิ่มแถวข้อมูล
            $start2++;
        }


        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');  // Excel2007 (xlsx) หรือ Excel5 (xls)         
        $filename = 'ข้อมูลจังหวัด-' . date("dmY") . '.xlsx'; //  กำหนดชือ่ไฟล์ นามสกุล xls หรือ xlsx

        header('Content-Type: application/vnd.ms-excel'); //mime type
        header('Content-Disposition: attachment;filename="' . $filename . '"'); //tell browser what's the file name
        header('Cache-Control: max-age=0'); //no cache
        ob_end_clean();
        $objWriter->save('php://output'); // ดาวน์โหลดไฟล์รายงาน

        exit;
    }

    public function Export_DISTRICT() {

        $Username = $this->session->userdata('Username');
        $Password = $this->session->userdata('Password');

        $data['Username'] = $Username;
        $data['Password'] = $Password;

        $Current_date = $this->Modal_Dengue_Fever->Current_date();

        $start = 0;
        $pageend = 50;

        $data['SHOWDISTRICT'] = $this->Modal_Dengue_Fever->Get_DISTRICT();

        $objPHPExcel = new PHPExcel();
        $objPHPExcel->getActiveSheet()->setTitle('ข้อมูลที่บันทึกไม่ได้'); //ชื่อหัว
        $objPHPExcel->setActiveSheetIndex(0) //หัวข้อ
                ->setCellValue('A1', 'No')
                ->setCellValue('B1', 'PROVINCE_ID')
                ->setCellValue('C1', 'DISTRICT_CODE')
                ->setCellValue('D1', 'DISTRICT');


        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(10);  //ปรับความกว่างของช่อง
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(13);
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(13);
        $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20);


        //ใส่สีหัวข้อ
        $objPHPExcel->getActiveSheet()->getStyle('A1:D1')->applyFromArray(
                array(
                    'fill' => array(
                        'type' => PHPExcel_Style_Fill::FILL_SOLID,
                        'color' => array('rgb' => 'B8DBD9')
                    )
                )
        );

        $start2 = 2;


        foreach ($data['SHOWDISTRICT'] as $row) {

            $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('A' . $start2, $row->row)
                    ->setCellValue('B' . $start2, $row->PROVINCE_ID)
                    ->setCellValue('C' . $start2, $row->DISTRICT_CODE)
                    ->setCellValue('D' . $start2, iconv('tis-620//IGNORE', 'utf-8//IGNORE', $row->DISTRICT));

            // เพิ่มแถวข้อมูล
            $start2++;
        }


        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');  // Excel2007 (xlsx) หรือ Excel5 (xls)         
        $filename = 'ข้อมูลอำเภอ-' . date("dmY") . '.xlsx'; //  กำหนดชือ่ไฟล์ นามสกุล xls หรือ xlsx

        header('Content-Type: application/vnd.ms-excel'); //mime type
        header('Content-Disposition: attachment;filename="' . $filename . '"'); //tell browser what's the file name
        header('Cache-Control: max-age=0'); //no cache
        ob_end_clean();
        $objWriter->save('php://output'); // ดาวน์โหลดไฟล์รายงาน

        exit;
    }

    public function Export_TITLE_JP() {

        $Username = $this->session->userdata('Username');
        $Password = $this->session->userdata('Password');

        $data['Username'] = $Username;
        $data['Password'] = $Password;

        $Current_date = $this->Modal_Dengue_Fever->Current_date();

        $start = 0;
        $pageend = 50;

        $data['SHOWTitle'] = $this->Modal_Dengue_Fever->Get_Title();

        $objPHPExcel = new PHPExcel();
        $objPHPExcel->getActiveSheet()->setTitle('ข้อมูลที่บันทึกไม่ได้'); //ชื่อหัว
        $objPHPExcel->setActiveSheetIndex(0) //หัวข้อ
                ->setCellValue('A1', 'No')
                ->setCellValue('B1', 'TITLE_CODE')
                ->setCellValue('C1', 'TITLE')
                ->setCellValue('D1', 'SEX');


        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(10);  //ปรับความกว่างของช่อง
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(13);
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(13);
        $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20);


        //ใส่สีหัวข้อ
        $objPHPExcel->getActiveSheet()->getStyle('A1:D1')->applyFromArray(
                array(
                    'fill' => array(
                        'type' => PHPExcel_Style_Fill::FILL_SOLID,
                        'color' => array('rgb' => 'B8DBD9')
                    )
                )
        );

        $start2 = 2;


        foreach ($data['SHOWTitle'] as $row) {

            $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('A' . $start2, $row->row)
                    ->setCellValue('B' . $start2, $row->TITLE_CODE)
                    ->setCellValue('C' . $start2, iconv('tis-620//IGNORE', 'utf-8//IGNORE', $row->TITLE))
                    ->setCellValue('D' . $start2, iconv('tis-620//IGNORE', 'utf-8//IGNORE', $row->SEX));

            // เพิ่มแถวข้อมูล
            $start2++;
        }


        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');  // Excel2007 (xlsx) หรือ Excel5 (xls)         
        $filename = 'ข้อมูลคำนำหน้า-' . date("dmY") . '.xlsx'; //  กำหนดชือ่ไฟล์ นามสกุล xls หรือ xlsx

        header('Content-Type: application/vnd.ms-excel'); //mime type
        header('Content-Disposition: attachment;filename="' . $filename . '"'); //tell browser what's the file name
        header('Cache-Control: max-age=0'); //no cache
        ob_end_clean();
        $objWriter->save('php://output'); // ดาวน์โหลดไฟล์รายงาน

        exit;
    }

    public function Logout() {

        $Username = $this->session->userdata('Username');
        $Password = $this->session->userdata('Password');
        $AutoID = $this->session->userdata('AutoID');
        $FirstName = $this->session->userdata('FirstName');
        $LastName = $this->session->userdata('LastName');
        $Tel = $this->session->userdata('Tel');
        $Status = $this->session->userdata('Status');
        $LevelEmp = $this->session->userdata('LevelEmp');
        $DEPARTMENT = $this->session->userdata('DEPARTMENT');

        $data['Username'] = $Username;
        $data['Password'] = $Password;
        $data['AutoID'] = $AutoID;
        $data['FirstName'] = $FirstName;
        $data['LastName'] = $LastName;
        $data['Tel'] = $Tel;
        $data['Status'] = $Status;
        $data['LevelEmp'] = $LevelEmp;
        $data['DEPARTMENT'] = $DEPARTMENT;


        $Username = $this->session->unset_userdata('Username');
        $Password = $this->session->unset_userdata('Password');

        redirect('Con_Dengue_Fever/index');
    }

    // PDF Manual
    public function Send_Manual() {


        $this->load->view('Manual_PDF_View');
    }

    public function Send_APPI() {

        $ch = curl_init();
        $headers = array(
            'Content-Type: application/json',
            'Authorization: Basic ' . base64_encode("JINR-BR:12345678")
        );
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_URL, 'https://ws.jpinsurancefriend.com/JPApp/api/GetMapping');
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, '{"type":"JPADDRESS"}');
        $result = curl_exec($ch);
        $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);


//       var_dump($result, true );


        $arr[] = json_decode($result, true); // loop data Api 
//        echo count($arr);
//        $i = 0;
//        foreach ($arr as $key => $val) {
//
//            echo"<br>" . $val["data"][$i]["district_code"];
//            echo"<br>" . $val["data"][$i]["district_name"];
//            echo"<br>" . $val["data"][$i]["province_code"];
//            echo"<br>" . $val["data"][$i]["province_name"];
//            echo"<br>" . $val["data"][$i]["postcode"];
//
//            $i++;
//        }
//        foreach ($arr as $key => $val) {
//            for ($i = 0; $i <= count($val); $i++) {
//                echo"<br>" . $val["data"][$i]["district_code"];
//                echo"<br>" . $val["data"][$i]["district_name"];
//                echo"<br>" . $val["data"][$i]["province_code"];
//                echo"<br>" . $val["data"][$i]["province_name"];
//                echo"<br>" . $val["data"][$i]["postcode"];
//            }
//        }


        echo "<pre>";
        print_r($arr);
        echo "</pre>";
    }

    // PDF Manual
    public function SendTEST3() {

        $data['pag'] = $this->input->GET('pag');

        $this->load->view('SendTEST3', $data);
    }

}
