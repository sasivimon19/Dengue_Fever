<?php

defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set("Asia/Bangkok"); //เซตเวลา ว่าเอาเวลาของอะไร

class Management_Data extends CI_Controller {
    

    public function __construct() {
        parent:: __construct();
        $this->load->library('session', 'upload');
        $this->load->library('excel');
        $this->load->model('Model_HomeInsurance');
        $this->load->model('DateManagement_Model');
        set_time_limit(0);
        ini_set('memory_limit', '-1');
    }

    public function Management_Package() {

        $Username = $this->session->userdata('Username');
        $Password = $this->session->userdata('Password');
        $AutoID = $this->session->userdata('AutoID');
        $IDCard = $this->session->userdata('IDCard');
        $FirstName = iconv('tis-620', 'utf-8', $this->session->userdata('FirstName'));
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
        
        $data['Currentdate'] = $this->Model_HomeInsurance->Current_date();
        foreach ($data['Currentdate'] as $value) {
            $data['Currentdate'] = $value->Currentdate;
            $Currentdate = $value->Currentdate;
        }
        $data['StatusEdit'] = '';
        $data['SaveDate'] = '';
        $data['NamePackage'] = "";
        $data['Status_Package'] = "";
       
        $wherenamegroup = '';
        $data['wherenamegroup'] = '';
        $data['start'] = 0;
        $data['pageend'] = 10;
        $start = 0;
        $pageend = 10;
        
        $data['pageend'] = $pageend;
        $data['Get_CarPackage'] = $this->DateManagement_Model->Select_CarPackage($wherenamegroup,$start,$pageend);
        $IDPackage =  $data['Get_CarPackage'][0]->IDPackage;
     
        
        $data['Count_CarPackage'] = $this->DateManagement_Model->Count_CarPackage($wherenamegroup);
        $data['Get_Insure'] = $this->DateManagement_Model->Get_Insure_Company();
        
        
        $data['CountIDPackage'] = $this->DateManagement_Model->SELECT_CARIDPackage($IDPackage);
        $data['Count_Idedit'] =  $data['CountIDPackage'][0]->IDPackage;

        $data['Show_Data_management'] = "SettingData/Package";
       $this->load->view('SettingData/Main_Datamanagement', $data);
    }
    

    public function Insernt_Package() {

        $Username = $this->session->userdata('Username');
        $Password = $this->session->userdata('Password');
        $AutoID = $this->session->userdata('AutoID');
        $IDCard = $this->session->userdata('IDCard');
        $FirstName = iconv('tis-620', 'utf-8', $this->session->userdata('FirstName'));
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


        $ID_InsureCode = trim($this->input->post("ID_InsureCode"));
        $NamePackage =  iconv('UTF-8', 'TIS-620', trim($this->input->post("NamePackage")));
        $SaveDate = $this->input->post("SaveDate");
        $Status_Package = $this->input->post("Status_Package");


        $this->DateManagement_Model->Insent_CarPackage($ID_InsureCode, $NamePackage, $SaveDate, $Status_Package, $Username);

        $start = 0;
        $pageend = 10;
        $wherenamegroup = '';
        
        $data['pageend'] = $pageend;
        $data['Get_CarPackage'] = $this->DateManagement_Model->Select_CarPackage($wherenamegroup,$start,$pageend);
        $data['Count_CarPackage'] = $this->DateManagement_Model->Count_CarPackage($wherenamegroup);


        
        $this->load->view('SettingData/TablePackage', $data);
    }
    
    
        public function Edit_Package() {

        $Username = $this->session->userdata('Username');
        $Password = $this->session->userdata('Password');
        $AutoID = $this->session->userdata('AutoID');
        $IDCard = $this->session->userdata('IDCard');
        $FirstName = iconv('tis-620', 'utf-8', $this->session->userdata('FirstName'));
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
        

        $data['Currentdate'] = $this->Model_HomeInsurance->Current_date();
        foreach ($data['Currentdate'] as $value) {
            $data['Currentdate'] = $value->Currentdate;
            $Currentdate = $value->Currentdate;
        }
        
         $IDPackage = $this->input->post("IDPackage");
         $data['StatusEdit'] = $this->input->post("StatusEdit");
         

        $data['Get_IDPackage'] = $this->DateManagement_Model->SelectEdit_CarPackage($IDPackage);
        foreach ($data['Get_IDPackage'] as $value) {
            $IDPackage = $value->IDPackage;
            $NamePackage = iconv('tis-620', 'utf-8', $value->NamePackage);
            $SaveDate = $value->SaveDate;
            $Status_Package = $value->Status_Package;
            $Save_By = $value->Save_By;
            $ID_InsureCode = $value->ID_InsureCode;
        }
        $data['IDPackage'] = $IDPackage;
        $data['NamePackage'] = $NamePackage;
        $data['Status_Package'] = $Status_Package;
        $data['SaveDate'] = $SaveDate;

        $data['Get_Insure'] = $this->DateManagement_Model->Get_Insure_Company();
        $data['Company'] = $this->DateManagement_Model->Get_Company($ID_InsureCode);
        foreach ($data['Company'] as $item) {
            $data['Insure_Company'] = iconv('tis-620', 'utf-8', $item->Insure_Company);
            $Insure_Company = iconv('tis-620', 'utf-8', $item->Insure_Company);
            $data['Auto_ID'] = $item->Auto_ID;
        }
        
        $start = 0;
        $pageend = 10;
        $wherenamegroup = '';
        
        $data['pageend'] = $pageend;
        $data['Get_CarPackage'] = $this->DateManagement_Model->Select_CarPackage($wherenamegroup,$start,$pageend);
        $data['Count_CarPackage'] = $this->DateManagement_Model->Count_CarPackage($wherenamegroup);
        
        $this->load->view('SettingData/EditTablePackage', $data);
    }
   
    
    public function EditUpdate_CarPackage() {

        $Username = $this->session->userdata('Username');
        $Password = $this->session->userdata('Password');
        $AutoID = $this->session->userdata('AutoID');
        $IDCard = $this->session->userdata('IDCard');
        $FirstName = iconv('tis-620', 'utf-8', $this->session->userdata('FirstName'));
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
        
        $IDPackage = $this->input->post("IDPackage");
        $ID_InsureCode = trim($this->input->post("ID_InsureCode"));
        $NamePackage = iconv('UTF-8', 'TIS-620', trim($this->input->post("NamePackage")));
        $SaveDate = $this->input->post("SaveDate");
        $Status_Package = $this->input->post("Status_Package");

     
        $this->DateManagement_Model->UpdateCarPackage($ID_InsureCode, $NamePackage, $SaveDate, $Status_Package, $Username,$IDPackage);
        $start = 0;
        $pageend = 10;
        $wherenamegroup = '';
        
        $data['pageend'] = $pageend;
        $data['Get_CarPackage'] = $this->DateManagement_Model->Select_CarPackage($wherenamegroup,$start,$pageend);
        $data['Count_CarPackage'] = $this->DateManagement_Model->Count_CarPackage($wherenamegroup);
        
        $this->load->view('SettingData/TablePackage', $data);
    }
    
    
//    Update Status switchPackage Active / Nonactive
     public function Update_Status_Package() {

        $Username = $this->session->userdata('Username');
        $Password = $this->session->userdata('Password');
        $AutoID = $this->session->userdata('AutoID');
        $IDCard = $this->session->userdata('IDCard');
        $FirstName = iconv('tis-620', 'utf-8', $this->session->userdata('FirstName'));
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
        
       $IDPackage = $this->input->post("IDPackage");
       $StatusswitchPackage = $this->input->post("StatusswitchPackage");
       
       if($StatusswitchPackage == "Active"){
           $Status_Package = 'Active';
       }else{
           $Status_Package = 'Nonactive';
       }
       
        $this->DateManagement_Model->Status_updatePackage($IDPackage, $Status_Package);
        $start = 0;
        $pageend = 10;
        $wherenamegroup = '';
        
        $data['pageend'] = $pageend;
        $data['Get_CarPackage'] = $this->DateManagement_Model->Select_CarPackage($wherenamegroup,$start,$pageend);
        $data['Count_CarPackage'] = $this->DateManagement_Model->Count_CarPackage($wherenamegroup);
        
        $this->load->view('SettingData/TablePackage', $data);
    }
   
//        public function Delete_Car_Package() {
//
//        $Username = $this->session->userdata('Username');
//        $Password = $this->session->userdata('Password');
//        $AutoID = $this->session->userdata('AutoID');
//        $IDCard = $this->session->userdata('IDCard');
//        $FirstName = iconv('tis-620', 'utf-8', $this->session->userdata('FirstName'));
//        $LastName = $this->session->userdata('LastName');
//        $Tel = $this->session->userdata('Tel');
//        $Status = $this->session->userdata('Status');
//        $LevelEmp = $this->session->userdata('LevelEmp');
//        $DEPARTMENT = $this->session->userdata('DEPARTMENT');
//
//        $data['Username'] = $Username;
//        $data['Password'] = $Password;
//        $data['AutoID'] = $AutoID;
//        $data['IDCard'] = $IDCard;
//        $data['FirstName'] = $FirstName;
//        $data['LastName'] = $LastName;
//        $data['Tel'] = $Tel;
//        $data['Status'] = $Status;
//        $data['LevelEmp'] = $LevelEmp;
//        $data['DEPARTMENT'] = $DEPARTMENT;
//        
//        $IDPackage = $this->input->post("IDPackage");
//       
//        $this->DateManagement_Model->DeleteCarPackage($Username,$IDPackage);
//        $start = 0;
//        $pageend = 10;
//        $wherenamegroup='';
//        
//        $data['pageend'] = $pageend;
//        $data['Get_CarPackage'] = $this->DateManagement_Model->Select_CarPackage($wherenamegroup,$start,$pageend);
//        $data['Count_CarPackage'] = $this->DateManagement_Model->Count_CarPackage($wherenamegroup);
//        
//        $this->load->view('SettingData/TablePackage', $data);
//    }
    
    
    //ค้นหา Package 
    public function SearchCarPackage() {

        $Username = $this->session->userdata('Username');
        $Password = $this->session->userdata('Password');
        $AutoID = $this->session->userdata('AutoID');
        $IDCard = $this->session->userdata('IDCard');
        $FirstName = iconv('tis-620', 'utf-8', $this->session->userdata('FirstName'));
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
        
        
        
        $SearchsubPackage = $this->input->post("SearchsubPackage");
        $SearchNamePackage = iconv("UTF-8//ignore", "TIS-620//ignore", $this->input->post("SearchNamePackage"));



        if ($SearchsubPackage == "InsureCode") {
            $wherenamegroup = " WHERE ID_InsureCode LIKE '%" . $SearchNamePackage . "%'";
        } else if ($SearchsubPackage == 'NamePackage') {
            $wherenamegroup = " WHERE NamePackage LIKE '%" . $SearchNamePackage . "%'";
        } else if ($SearchsubPackage == 'IDPackage') {
            $wherenamegroup = " WHERE IDPackage LIKE '%" . $SearchNamePackage . "%'";
        } else {
            $wherenamegroup = "";
        }


        $page = $this->input->post('page');
        $pageend1 = 10;
        if ($page != '') {
            $page = $page;
        } else {
            $page = 1;
        }

        $start = ($page - 1) * $pageend1;
        $pageend = $page * 10;

        $data['pageend'] = $pageend1;

        $data['Get_CarPackage'] = $this->DateManagement_Model->Select_CarPackage($wherenamegroup, $start, $pageend);
        $data['Count_CarPackage'] = $this->DateManagement_Model->Count_CarPackage($wherenamegroup);


        $this->load->view('SettingData/TablePackage', $data);
    }
    
    //ตารางรถยนต์

    public function Management_CarInformation() {

        $Username = $this->session->userdata('Username');
        $Password = $this->session->userdata('Password');
        $AutoID = $this->session->userdata('AutoID');
        $IDCard = $this->session->userdata('IDCard');
        $FirstName = iconv('tis-620', 'utf-8', $this->session->userdata('FirstName'));
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

        $data['Currentdate'] = $this->Model_HomeInsurance->Current_date();
        foreach ($data['Currentdate'] as $value) {
            $data['Currentdate'] = $value->Currentdate;
            $Currentdate = $value->Currentdate;
        }
        $data['StatusEdit'] = '';
        $data['CarBrand'] =  '';
        $data['CarModel'] = '';
        $data['MakeDescription'] = '';
        $data['CarYear'] = '';
        $data['EngineCC'] = '';
        $data['Group'] = '';
        $data['NewPrice'] = '';
        $data['Sale_Price'] = '';
        $data['SaveDate'] = '';
        $data['colNumber'] = '';
        
        $start = 0;
        $pageend = 10;
        $data['pageend'] = $pageend;
        
        $wherenamegroup = "where Save_By = '$Username' AND Status_Check = '0' ";
        $data['Count_CarInformation'] = $this->DateManagement_Model->CountStatus_Car_TmpAdd($wherenamegroup);
        $data['CountCarInformation'] = $data['Count_CarInformation'][0]->Count;

        if ($data['CountCarInformation'] == 0) {
            $data['GetCarInformation'] = '';
            $data['Count_CarInformation'] = 0;
            $data['Status_Check'] = 0;
        } else {

            $data['GetCarInformation'] = $this->DateManagement_Model->ShowStatus_Car_TmpAdd($wherenamegroup, $start, $pageend);
            $data['Status_Check'] = $data['GetCarInformation'][0]->Status_Check;

            $data['Count_CarInformation'] = $this->DateManagement_Model->CountStatus_Car_TmpAdd($wherenamegroup);
        }




        $data['Brandcar'] = $this->Model_HomeInsurance->Get_Brandcar();  
        $data['GetEngineCC'] = $this->DateManagement_Model->Select_EngineCC();
        $data['GetCarBrand'] = $this->DateManagement_Model->Select_CarBrand();
        $data['Group_Car'] = $this->DateManagement_Model->GetGroup_Car();
         
        
        $data['Show_Data_management'] = "SettingData/CarInformation";
        $this->load->view('SettingData/Main_Datamanagement', $data);
    }
    
    
       
    
     public function Insernt_CarInformation() {

        $Username = $this->session->userdata('Username');
        $Password = $this->session->userdata('Password');
        $AutoID = $this->session->userdata('AutoID');
        $IDCard = $this->session->userdata('IDCard');
        $FirstName = iconv('tis-620', 'utf-8', $this->session->userdata('FirstName'));
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


        $CarBrand = trim($this->input->post("CarBrand"));
        $CarModel =  iconv('UTF-8', 'TIS-620', trim($this->input->post("CarModel")));
        $MakeDescription = iconv('UTF-8', 'TIS-620', trim($this->input->post("MakeDescription")));
        $CarYear = trim($this->input->post("CarYear"));
        $EngineCC = trim($this->input->post("EngineCC"));
        $Group = trim($this->input->post("Group"));
        $NewPrice = trim($this->input->post("NewPrice"));
        $SaveDate = $this->input->post("SaveDate");
        $Status_Car = "Active";

        $start = 0;
        $pageend = 10;
        $data['pageend'] = $pageend;
        
        
        $wherenamegroup = "WHERE CarBrand = '" . $CarBrand . "' AND CarModel = '" . $CarModel . "' AND CarYear = '" . $CarYear . "' AND MakeDescription = '". $MakeDescription . "'";

        $Count_Car = $this->DateManagement_Model->COUNT_CarInformation($wherenamegroup);
        $data['Count_CarInformation'] = $Count_Car[0]->Count;

        if ($data['Count_CarInformation'] == 0) {
            $Status_Check = 0; // 0 แสดงว่า ยังไม่มีข้อมูล คือ ถูก
        } else {
            $Status_Check = 2; // 2 แสดงว่า ข้อมูลมีอยู่ คือ ผิด
            echo"<script>alert('ข้อมูลซ้ำกรุณาตรวจสอบ')</script>";
        }
        
        $this->DateManagement_Model->Insert_TmpAdd($CarBrand, $CarYear, $CarModel, $EngineCC, $MakeDescription, 
        $Group, $NewPrice, $SaveDate, $Username, $Status_Car,$Status_Check); 
        
        $wherenamegroup = "where Save_By = '$Username' AND Status_Check = '0' ";

        $data['GetCarInformation'] = $this->DateManagement_Model->ShowStatus_Car_TmpAdd($wherenamegroup,$start,$pageend);
        $data['Status_Check'] = 0;
        foreach ($data['GetCarInformation'] as $value) {
           $data['Status_Check'] =  $value->Status_Check;
        }

        $data['Count_CarInformation'] = $this->DateManagement_Model->CountStatus_Car_TmpAdd($wherenamegroup);

        $this->load->view('SettingData/Tablecarinformation', $data);
    }

    
    public function EditCarInformation() {

        $Username = $this->session->userdata('Username');
        $Password = $this->session->userdata('Password');
        $AutoID = $this->session->userdata('AutoID');
        $IDCard = $this->session->userdata('IDCard');
        $FirstName = iconv('tis-620', 'utf-8', $this->session->userdata('FirstName'));
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
        

        $data['Currentdate'] = $this->Model_HomeInsurance->Current_date();
        foreach ($data['Currentdate'] as $value) {
            $data['Currentdate'] = $value->Currentdate;
            $Currentdate = $value->Currentdate;
        }
        
        $Code_Car = $this->input->post("Code_Car");
        $data['StatusEdit'] = $this->input->post("StatusEdit");
        
        $data['Select_CarInformation'] = $this->DateManagement_Model->SelectEdit_CarInformation($Code_Car);
        foreach ($data['Select_CarInformation'] as $value) {
            $data['CarBrand'] = $value->CarBrand;
            $data['CarModel'] = $value->CarModel;
            $data['MakeDescription'] = $value->MakeDescription;
            $data['CarYear'] = $value->CarYear;
            $data['EngineCC'] = $value->EngineCC;
            $data['Group'] = $value->Group;
            $data['NewPrice'] = $value->NewPrice;
            $data['SaveDate'] = $value->SaveDate;
        }


        $start = 0;
        $pageend = 10;
        $wherenamegroup='';
        
        $data['pageend'] = $pageend;
        $data['GetCarInformation'] = $this->DateManagement_Model->Select_CarInformation($wherenamegroup,$start,$pageend);
        $data['Count_CarInformation'] = $this->DateManagement_Model->COUNT_CarInformation($wherenamegroup);
        $data['GetEngineCC'] = $this->DateManagement_Model->Select_EngineCC();
        $data['GetCarBrand'] = $this->DateManagement_Model->Select_CarBrand();
        $data['Group_Car'] = $this->DateManagement_Model->GetGroup_Car();
  
        
        $this->load->view('SettingData/Addcarinformation', $data);
    }
    
   
    public function SearchCarMain() {
       
       

        $Username = $this->session->userdata('Username');
        $Password = $this->session->userdata('Password');
        $AutoID = $this->session->userdata('AutoID');
        $IDCard = $this->session->userdata('IDCard');
        $FirstName = iconv('tis-620', 'utf-8', $this->session->userdata('FirstName'));
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

        $CarBrand = $this->input->post("SearchsubCarBrand");
        $CarModel = iconv("UTF-8//ignore", "TIS-620//ignore",trim($this->input->post("SearchsubCarModel")));
        $CarYear = $this->input->post("SearchsubCarYear");
         $inputsearch = iconv("UTF-8//ignore", "TIS-620//ignore", trim($this->input->post("inputsearch")));
       
        $pageend1 = 10;
        $data['Status_Check'] = 0;
        
        $page = $this->input->post('page');
        if ($page != '') {
            $page = $page;
        } else {
            $page = 1;
        }

        $start = ($page - 1) * $pageend1;
        $pageend = $page * 10;

        $data['pageend'] = $pageend1;
        
        
        if ($inputsearch != '') {
            $wherenamegroup = "WHERE CarBrand = '" . $CarBrand . "' AND CarModel = '" . $CarModel . "' AND CarYear = '" . $CarYear . "' AND  MakeDescription LIKE'%" . $inputsearch . "%'";
        } else {
            $wherenamegroup = "WHERE CarBrand = '" . $CarBrand . "' AND CarModel = '" . $CarModel . "' AND CarYear = '" . $CarYear . "'";
        }
        

        
        $data['GetCarInformation'] = $this->DateManagement_Model->Select_CarInformation($wherenamegroup,$start,$pageend);
        $data['Count_CarInformation'] = $this->DateManagement_Model->COUNT_CarInformation($wherenamegroup);


       $this->load->view('SettingData/Tablecarinformation', $data);
    }
    
    
    //    Update Status switchCar Active / Nonactive
     public function Update_Status_Car() {

        $Username = $this->session->userdata('Username');
        $Password = $this->session->userdata('Password');
        $AutoID = $this->session->userdata('AutoID');
        $IDCard = $this->session->userdata('IDCard');
        $FirstName = iconv('tis-620', 'utf-8', $this->session->userdata('FirstName'));
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
        
       $Code_Car = $this->input->post("Code_Car");
       $StatusswitchCar = $this->input->post("StatusswitchCar");
       
       if($StatusswitchCar == "Active"){
           $Status_Package = 'Active';
       }else{
           $Status_Package = 'Nonactive';
       }
       
        $this->DateManagement_Model->Status_updateCar($Code_Car, $StatusswitchCar);
        
        $start = 0;
        $pageend = 10;
        $data['Status_Check'] = 0;
        
        $CarBrand = $this->input->post("SearchsubCarBrand");
        $CarModel = iconv("UTF-8//ignore", "TIS-620//ignore",trim($this->input->post("SearchsubCarModel")));
        $CarYear = $this->input->post("SearchsubCarYear");
        $inputsearch = iconv("UTF-8//ignore", "TIS-620//ignore", trim($this->input->post("inputsearch")));

        if ($inputsearch != '') {
             $wherenamegroup = "WHERE CarBrand = '" . $CarBrand . "' AND CarModel = '" . $CarModel . "' AND CarYear = '" . $CarYear . "' AND  MakeDescription LIKE'%" . $inputsearch . "%'";
        } else {
             $wherenamegroup = "WHERE CarBrand = '" . $CarBrand . "' AND CarModel = '" . $CarModel . "' AND CarYear = '" . $CarYear . "'";
        }
        
        
        $data['pageend'] = $pageend;
        $data['GetCarInformation'] = $this->DateManagement_Model->Select_CarInformation($wherenamegroup,$start,$pageend);
        $data['Count_CarInformation'] = $this->DateManagement_Model->COUNT_CarInformation($wherenamegroup);

        
        $this->load->view('SettingData/Tablecarinformation', $data);
    }
    

    
     public function Import_FileCarInformation() {

        $Username = $this->session->userdata('Username');
        $Password = $this->session->userdata('Password');
        $AutoID = $this->session->userdata('AutoID');
        $IDCard = $this->session->userdata('IDCard');
        $FirstName = iconv('tis-620', 'utf-8', $this->session->userdata('FirstName'));
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
        
        
        $data['Currentdate'] = $this->Model_HomeInsurance->Current_date();
        foreach ($data['Currentdate'] as $value) {
            $SaveDate = $value->Currentdate;
        }


        $start = 0;
        $pageend = 20;
        $data['pageend'] = $pageend;
        
        $this->load->library('PHPExcel');
        $path = getcwd(); //ใช้คืนค่า directory ปัจจุบัน ที่กำลังทำงานอยู่
        $filepath = $path . "/UploadExcelcar";

        list($namefile, $ext) = explode('.', $_FILES['fileupCar']['name']); // explodeแยกข้อความให้อยู่ในรูปแบบของ array
        $newnamefile = rand(0, 100); //random numbers
        $file_payment = $newnamefile . '.' . $ext;
        move_uploaded_file($_FILES["fileupCar"]["tmp_name"], $filepath . '/' . $newnamefile . '.' . $ext);

        $file = "./UploadExcelcar/" . $file_payment . "";
        $obj = PHPExcel_IOFactory::load($file);
        $objPHPExcel = PHPExcel_IOFactory::load($file);
        $cell = $objPHPExcel->getActiveSheet()->getCellCollection();  //7000 
        
        
        foreach ($cell as $cl) {
            $column = $obj->getActiveSheet()->getCell($cl)->getColumn();
            $row = $obj->getActiveSheet()->getCell($cl)->getRow();
            $data_value = $obj->getActiveSheet()->getCell($cl)->getValue();
            $arr_row[$row] = $data_value;
            $arr_column[$row][$column] = $data_value;
        }
        

        $colNumber = PHPExcel_Cell::columnIndexFromString($column);
        if ($colNumber != 8){
            echo "<script>alert('จำนวน Column ไม่ถูกต้อง')</script>";
            
        }else{
        
        for ($x = 1; $x <= count($arr_row); $x++) {
            if ($x == 1) {
                
            } else {

                 $CarBrand = trim($arr_column[$x]["A"]);
                 $CarYear = trim($arr_column[$x]["B"]);
                 $CarModel = trim($arr_column[$x]["C"]);
                 $EngineCC = trim($arr_column[$x]["D"]);
                 $MakeDescription = trim($arr_column[$x]["E"]);
                 $Group = trim($arr_column[$x]["F"]);
                 $NewPrice = trim($arr_column[$x]["G"]);
                 $Status_Car = trim($arr_column[$x]["H"]);

                $wherenamegroup = "WHERE CarBrand = '" . $CarBrand . "' AND CarModel = '" . $CarModel . "' AND CarYear = '" . $CarYear . "' AND MakeDescription = '". $MakeDescription . "'";
                

                $Count_Car = $this->DateManagement_Model->COUNT_CarInformation($wherenamegroup);
                $data['Count_CarInformation'] = $Count_Car[0]->Count;

                if ($data['Count_CarInformation'] == 0) {
                    
                    $Status_Check = 0; // 0 แสดงว่า ยังไม่มีข้อมูล คือ ถูก
                } else {
                    $Status_Check = 2; // 2 แสดงว่า ข้อมูลมีอยู่ คือ ผิด
                   
                }
                
                $this->DateManagement_Model->Insert_TmpAdd($CarBrand, $CarYear, $CarModel, $EngineCC, $MakeDescription, 
                $Group, $NewPrice, $SaveDate, $Username, $Status_Car,$Status_Check);  
                

            } //End else
           
        }//End for
         
        
        $wherenamegroup = "where Save_By = '$Username' AND Status_Check = '0' ";
 
        $data['GetCarInformation'] = $this->DateManagement_Model->ShowStatus_Car_TmpAdd($wherenamegroup,$start,$pageend);
        $data['Status_Check'] = 0;
        foreach ($data['GetCarInformation'] as $value) {
           $data['Status_Check'] =  $value->Status_Check;
        }

        $data['Count_CarInformation'] = $this->DateManagement_Model->CountStatus_Car_TmpAdd($wherenamegroup);

        $this->load->view('SettingData/Tablecarinformation', $data);
    }
    
   }  
    
    
    
     public function UPDATE_ADDTMP() {

        $Username = $this->session->userdata('Username');
        $Password = $this->session->userdata('Password');
        $AutoID = $this->session->userdata('AutoID');
        $IDCard = $this->session->userdata('IDCard');
        $FirstName = iconv('tis-620', 'utf-8', $this->session->userdata('FirstName'));
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

        $data['Currentdate'] = $this->Model_HomeInsurance->Current_date();
        foreach ($data['Currentdate'] as $value) {
            $data['Currentdate'] = $value->Currentdate;
            $SaveDate = $value->Currentdate;
        }
        
        $Code_Car = trim($this->input->POST('Code_Car'));
        $CarBrandEdit = iconv('UTF-8', 'TIS-620', trim($this->input->POST('CarBrandEdit')));
        $CarModelEdit = trim($this->input->post("CarModelEdit"));
        $CarYearEdit = trim($this->input->post("CarYearEdit"));
        $MakeDescriptionEdit = iconv('UTF-8', 'TIS-620', trim($this->input->post("MakeDescriptionEdit")));
        $EngineCCEdit = trim($this->input->post("EngineCCEdit"));
        $GroupEdit = trim($this->input->post("GroupEdit"));
        $NewPriceEdit = trim($this->input->post("NewPriceEdit"));
        $Status_Car = 'Active';


        $this->DateManagement_Model->Update_TmpCar($CarBrandEdit, $CarModelEdit, $CarYearEdit, $MakeDescriptionEdit, $EngineCCEdit, $GroupEdit, $NewPriceEdit, $SaveDate, $Username, $Status_Car, $Code_Car);

        $wherenamegroup = "where Save_By = '$Username' AND Status_Check = '0'";

        $start = 0;
        $pageend = 10;
        $data['pageend'] = $pageend;


        $data['GetCarInformation'] = $this->DateManagement_Model->ShowStatus_Car_TmpAdd($wherenamegroup, $start, $pageend);
        $data['Status_Check'] = 0;
        foreach ($data['GetCarInformation'] as $item) {
           $data['Status_Check'] =  $item->Status_Check;
        }

        $data['Count_CarInformation'] = $this->DateManagement_Model->CountStatus_Car_TmpAdd($wherenamegroup);

        $this->load->view('SettingData/Tablecarinformation', $data);
    }

    public function DELETE_ADDTMP() {

        $Username = $this->session->userdata('Username');
        $Password = $this->session->userdata('Password');
        $AutoID = $this->session->userdata('AutoID');
        $IDCard = $this->session->userdata('IDCard');
        $FirstName = iconv('tis-620', 'utf-8', $this->session->userdata('FirstName'));
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
      
        $Code_Car = $this->input->post("Code_Car");
        
        $DELETE_ADDTMP = "WHERE Code_Car = '$Code_Car' AND Save_By = '$Username' AND Status_Check = '0'";
       
        $this->DateManagement_Model->DELETE_ADDTMP($DELETE_ADDTMP);
        
        

        $start = 0;
        $pageend = 10;
        $data['pageend'] = $pageend;
        $wherenamegroup = "where Save_By = '$Username' AND Status_Check = '0' ";

        $data['GetCarInformation'] = $this->DateManagement_Model->ShowStatus_Car_TmpAdd($wherenamegroup, $start, $pageend);
        $data['Status_Check'] = 0;
        foreach ($data['GetCarInformation'] as $item) {
           $data['Status_Check'] =  $item->Status_Check;
        }
        $data['Count_CarInformation'] = $this->DateManagement_Model->CountStatus_Car_TmpAdd($wherenamegroup);
       
        $this->load->view('SettingData/Tablecarinformation', $data);
    }
    
    
        public function Save_EditTmp() {

        $Username = $this->session->userdata('Username');
        $Password = $this->session->userdata('Password');
        $AutoID = $this->session->userdata('AutoID');
        $IDCard = $this->session->userdata('IDCard');
        $FirstName = iconv('tis-620', 'utf-8', $this->session->userdata('FirstName'));
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

        $data['Currentdate'] = $this->Model_HomeInsurance->Current_date();
        foreach ($data['Currentdate'] as $value) {
            $data['Currentdate'] = $value->Currentdate;
            $SaveDate = $value->Currentdate;
        }

        $start = 0;
        $pageend = 10;
        $data['pageend'] = $pageend;

//        $TmpAdd_Car = $this->input->post('TmpAdd_Car'); 
//        if ($TmpAdd_Car != "") {
//            $I = 1;
//            foreach ($TmpAdd_Car as $b) {
//            $Code_Car[$I] = $b;
//            $CarBrandEdit[$I] = iconv('UTF-8', 'TIS-620', trim($this->input->POST("CarBrandEdit" . $b . "")));
//            $CarModelEdit[$I] = trim($this->input->post("CarModelEdit" . $b . ""));
//            $MakeDescriptionEdit[$I] = iconv('UTF-8', 'TIS-620', trim($this->input->post("MakeDescriptionEdit" . $b . "")));
//            $EngineCCEdit[$I] = trim($this->input->post("EngineCCEdit" . $b . ""));
//            $CarYearEdit[$I] = trim($this->input->post("CarYearEdit" . $b . ""));
//            $GroupEdit[$I] = trim($this->input->post("GroupEdit" . $b . ""));
//            $NewPriceEdit[$I] = trim($this->input->post("NewPriceEdit" . $b . ""));
//
//
//                  $wherechk = $Code_Car[$I];
//
//                  $Status_Car = "Active";
//                  $where[$I] = "CarBrand = '$CarBrandEdit[$I]',
//                  [CarModel] = '$CarModelEdit[$I]',
//                  [CarYear] =  '$CarYearEdit[$I]',    
//                  [MakeDescription] = '$MakeDescriptionEdit[$I]',
//                  [EngineCC] = '$EngineCCEdit[$I]',
//                  [Group] = '$GroupEdit[$I]',
//                  [NewPrice] = '$NewPriceEdit[$I]',
//                  [SaveDate] = GETDATE(),
//                  [Save_By] = '$Username',
//                  [Status_Car] = '$Status_Car',
//                  [Status_Check] = '1' WHERE  Code_Car = '$Code_Car[$I]'";
//
//
//                $this->DateManagement_Model->Update_Checkcorrect($where[$I]);
//
//
//                $I++; }
                
           
                $this->DateManagement_Model->Insert_TmpAdd_CarInformation(); //insent in to ข้อมูลที่ถูกไปตารางจริง

                $data['Status_Check'] = 0;
                $Update_Success = "WHERE  Save_By = '$Username' AND Status_Check = '0' AND Status_Check <> '1'";
                $this->DateManagement_Model->Update_CheckSuccess($Update_Success);

//                $DELETE_ADDTMP = "WHERE  Save_By = '$Username' AND Status_Check = 0" ;
//                $this->DateManagement_Model->DELETE_ADDTMP($DELETE_ADDTMP);
//        }

        $wherenamegroup = "where Save_By = '$Username' AND CONVERT(datetime,SaveDate) = '$SaveDate'";  
  
        $data['GetCarInformation'] = $this->DateManagement_Model->Select_CarInformation($wherenamegroup,$start,$pageend);
        $data['Count_CarInformation'] = $this->DateManagement_Model->COUNT_CarInformation($wherenamegroup);
        
        
        $this->load->view('SettingData/Tablecarinformation', $data);
    }
    

    //ตารางความคุ้มครอง
    
     public function Management_Car_Coverage() {

        $Username = $this->session->userdata('Username');
        $Password = $this->session->userdata('Password');
        $AutoID = $this->session->userdata('AutoID');
        $IDCard = $this->session->userdata('IDCard');
        $FirstName = iconv('tis-620', 'utf-8', $this->session->userdata('FirstName'));
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
        
        $start = 0;
        $pageend = 10;
        $data['pageend'] = $pageend;
        
        $whereCoverRate = "where Save_By = '$Username' AND StatusCoverage_Check = '0' ";
        $data['CountCoverRate'] = $this->DateManagement_Model->CountTmp_data_CoverRate($whereCoverRate);
        $data['CountCover'] = $data['CountCoverRate'][0]->Count;
        
        if ($data['CountCover'] == 0) {
            $data['CoverRate'] = '';
            $data['CountCoverRate'] = 0;
            $data['StatusCoverage_Check'] = 0;
        } else {

            $data['CoverRate'] = $this->DateManagement_Model->Select_dataTmp_CoverRate($whereCoverRate, $start, $pageend);
            $data['StatusCoverage_Check'] = $data['CoverRate'][0]->StatusCoverage_Check;

            $data['CountCoverRate'] = $this->DateManagement_Model->CountTmp_data_CoverRate($whereCoverRate);
        }
        

        $data['Get_Insure'] = $this->DateManagement_Model->Get_Insure_Company();
        $data['selectIDPackage'] = $this->DateManagement_Model->Get_IDPackage();
        

        $data['Show_Data_management'] = "SettingData/Main_Car_Coverage";
        $this->load->view('SettingData/Main_Datamanagement', $data);
    

    }  
    
    
     //ค้นหา CarCoverage 
    public function SearchCarCoverage() {

        $Username = $this->session->userdata('Username');
        $Password = $this->session->userdata('Password');
        $AutoID = $this->session->userdata('AutoID');
        $IDCard = $this->session->userdata('IDCard');
        $FirstName = iconv('tis-620', 'utf-8', $this->session->userdata('FirstName'));
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
        
        $data['IDPackage'] = 0;
        $data['Insure_Company'] =  0;
              
        $SearchsubCarCoverage= $this->input->post("SearchsubCarCoverage");
        $SearchNameCarCoverage = iconv("UTF-8//ignore", "TIS-620//ignore", $this->input->post("SearchNameCarCoverage"));
        

        if ($SearchsubCarCoverage == "InsureCode") {
            $whereCoverRate = " WHERE Insure_Code_Company LIKE '%" . $SearchNameCarCoverage . "%'";
        }else if ($SearchsubCarCoverage == 'IDPackage') {
            $whereCoverRate = " WHERE IDPackage LIKE '%" . $SearchNameCarCoverage . "%'";
        } else {
            $whereCoverRate = "";
        }


        $page = $this->input->post('page');
        $pageend1 = 10;
        if ($page != '') {
            $page = $page;
        } else {
            $page = 1;
        }

        $start = ($page - 1) * $pageend1;
        $pageend = $page * 10;

        $data['pageend'] = $pageend1;
        
        $data['StatusCoverage_Check'] = 0;
        $data['CoverRate'] = $this->DateManagement_Model->Select_data_CoverRate($whereCoverRate, $start, $pageend);
        $data['CountCoverRate'] = $this->DateManagement_Model->Count_data_CoverRate($whereCoverRate);
        
        $data['Get_Insure'] = $this->DateManagement_Model->Get_Insure_Company();
//        $data['IDPackage'] = $data['Get_Insure'][0]->IDPackage;
        
        $data['selectIDPackage'] = $this->DateManagement_Model->Get_IDPackage();
//        $data['Insure_Company'] = $data['selectIDPackage'][0]->Insure_Company;
  
        $this->load->view('SettingData/TableCarCoverage', $data);

      }
    
    
       public function ImportExcel_TmpCarCoverage() {


        $Username = $this->session->userdata('Username');
        $Password = $this->session->userdata('Password');
        $AutoID = $this->session->userdata('AutoID');
        $IDCard = $this->session->userdata('IDCard');
        $FirstName = iconv('tis-620', 'utf-8', $this->session->userdata('FirstName'));
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
        
        $data['Currentdate'] = $this->Model_HomeInsurance->Current_date();
        foreach ($data['Currentdate'] as $value) {
            $SaveDate = $value->Currentdate;
        }
        
        $start = 0;
        $pageend = 10;
        $data['pageend'] = $pageend;
        
        
        $this->load->library('PHPExcel');
        $path = getcwd(); //ใช้คืนค่า directory ปัจจุบัน ที่กำลังทำงานอยู่
        $filepath = $path . "/UploadExcelcar";

        list($namefile, $ext) = explode('.', $_FILES['fileCoverage']['name']); // explodeแยกข้อความให้อยู่ในรูปแบบของ array
        $newnamefile = rand(0, 100); //random numbers
        $file_payment = $newnamefile . '.' . $ext;
        move_uploaded_file($_FILES["fileCoverage"]["tmp_name"], $filepath . '/' . $newnamefile . '.' . $ext);

        $file = "./UploadExcelcar/" . $file_payment . "";
        $obj = PHPExcel_IOFactory::load($file);
        $objPHPExcel = PHPExcel_IOFactory::load($file);
        $cell = $objPHPExcel->getActiveSheet()->getCellCollection();  //7000 
     
        foreach ($cell as $cl) {
            $column = $obj->getActiveSheet()->getCell($cl)->getColumn();
            $row = $obj->getActiveSheet()->getCell($cl)->getRow();
            $data_value = $obj->getActiveSheet()->getCell($cl)->getValue();
            $arr_row[$row] = $data_value;
            $arr_column[$row][$column] = $data_value;
        }
        
        $colNumber = PHPExcel_Cell::columnIndexFromString($column);
        if ($colNumber != 13){
            echo "<script>alert('จำนวน Column ไม่ถูกต้อง')</script>";
            
        }else{
        
       
        $data['Get_Insure'] = $this->DateManagement_Model->Get_Insure_Company();
        $data['selectIDPackage'] = $this->DateManagement_Model->Get_IDPackage();
        
        $HeadCoverage1 = iconv('UTF-8','TIS-620', "ความคุ้มครองหลัก (ความรับผิดต่อบุคคล)");
        $HeadCoverage2 = iconv('UTF-8','TIS-620', "ความเสียหายต่อชีวิต/ร่างกาย/อนามัย/ บาท/คน");
        $HeadCoverage3 = iconv('UTF-8','TIS-620', "สูงสุดไม่เกิน");
        $HeadCoverage4 = iconv('UTF-8','TIS-620', "ความเสียหายต่อทรัพย์สิน");
        $HeadCoverage5 = iconv('UTF-8','TIS-620', "อุบัติเหตุส่วนบุคคล ของผู้โดยสารและผู้ขับขี่");
        $HeadCoverage6 = iconv('UTF-8','TIS-620', "ค่ารักษาพยาบาล ของผู้โดยสารและผู้ขับขี่");
        $HeadCoverage7 = iconv('UTF-8','TIS-620', "การประกันตัวผู้ขับขี่");
        $HeadCoverage8 = iconv('UTF-8','TIS-620', "ความคุ้มครองรถยนต์เสียหาย");
        $HeadCoverage9 = iconv('UTF-8','TIS-620', "ความเสียหายส่วนแรก");
        $HeadCoverage10 = iconv('UTF-8','TIS-620', "ความคุ้มครองรถยนต์สูญหาย/ไฟไหม้");

        for ($x = 1; $x <= count($arr_row); $x++) {
            if ($x == 1) {
                
            } else {

                $IDPackage = trim($arr_column[$x]["A"]);
                $Insure_Code_Company = trim($arr_column[$x]["B"]);
                $DetailCoverage1 = iconv('UTF-8', 'TIS-620', trim($arr_column[$x]["C"]));
                $DetailCoverage2 = iconv('UTF-8', 'TIS-620', trim($arr_column[$x]["D"]));
                $DetailCoverage3 = iconv('UTF-8', 'TIS-620', trim($arr_column[$x]["E"]));
                $DetailCoverage4 = iconv('UTF-8', 'TIS-620', trim($arr_column[$x]["F"]));
                $DetailCoverage5 = iconv('UTF-8', 'TIS-620', trim($arr_column[$x]["G"]));
                $DetailCoverage6 = iconv('UTF-8', 'TIS-620', trim($arr_column[$x]["H"]));
                $DetailCoverage7 = iconv('UTF-8', 'TIS-620', trim($arr_column[$x]["I"]));
                $DetailCoverage8 = iconv('UTF-8', 'TIS-620', trim($arr_column[$x]["J"]));
                $DetailCoverage9 = iconv('UTF-8', 'TIS-620', trim($arr_column[$x]["K"]));
                $DetailCoverage10 = iconv('UTF-8', 'TIS-620', trim($arr_column[$x]["L"]));
                $Net_Insurance = iconv('UTF-8', 'TIS-620', trim($arr_column[$x]["M"]));


                   $StatusCoverage_Check = 0; // 0 แสดงว่า ยังไม่มีข้อมูล คือ ถูก


                        $this->DateManagement_Model->Insert_TmpCarCoverage($IDPackage, $Insure_Code_Company,
                        $HeadCoverage1, $HeadCoverage2, $HeadCoverage3, $HeadCoverage4, $HeadCoverage5, 
                        $HeadCoverage6, $HeadCoverage7, $HeadCoverage8, $HeadCoverage9, $HeadCoverage10,
                        $DetailCoverage1, $DetailCoverage2, $DetailCoverage3, $DetailCoverage4, $DetailCoverage5,
                        $DetailCoverage6, $DetailCoverage7, $DetailCoverage8, $DetailCoverage9, $DetailCoverage10
                        ,$Net_Insurance, $Username, $SaveDate, $StatusCoverage_Check); //26
                
                
            } //End else
        }//End for
      
        $whereCoverRate = "where Save_By = '$Username' AND StatusCoverage_Check = '0' ";

        $data['CoverRate'] = $this->DateManagement_Model->Select_dataTmp_CoverRate($whereCoverRate, $start, $pageend);
        $data['StatusCoverage_Check'] = $data['CoverRate'][0]->StatusCoverage_Check;
        $data['CountCoverRate'] = $this->DateManagement_Model->CountTmp_data_CoverRate($whereCoverRate);
        
        $this->load->view('SettingData/TableCarCoverage', $data);
    }
  }     
    //    Update Status switch$CoverRate Active / Nonactive
    public function Update_Status_CoverRate() {

        $Username = $this->session->userdata('Username');
        $Password = $this->session->userdata('Password');
        $AutoID = $this->session->userdata('AutoID');
        $IDCard = $this->session->userdata('IDCard');
        $FirstName = iconv('tis-620', 'utf-8', $this->session->userdata('FirstName'));
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


        $ID_CoverRate = $this->input->post("ID_CoverRate");
        $switchCoverRate = $this->input->post("switchCoverRate");

        if ($switchCoverRate == "Active") {
            $Status_Coverage = 'Active';
        } else {
            $Status_Coverage = 'Nonactive';
        }

        $this->DateManagement_Model->Status_updateCoverRate($ID_CoverRate, $Status_Coverage);

        $start = 0;
        $pageend = 10;
        $data['pageend'] = $pageend;
        $data['StatusCoverage_Check'] = 0;


        $SearchsubCarCoverage = $this->input->post("SearchsubCarCoverage");
        $SearchNameCarCoverage = iconv("UTF-8//ignore", "TIS-620//ignore", $this->input->post("SearchNameCarCoverage"));


        if ($SearchsubCarCoverage == "InsureCode") {
            $whereCoverRate = " WHERE Insure_Code_Company LIKE '%" . $SearchNameCarCoverage . "%'";
        } else if ($SearchsubCarCoverage == 'IDPackage') {
            $whereCoverRate = " WHERE IDPackage LIKE '%" . $SearchNameCarCoverage . "%'";
        } else {
            $whereCoverRate = "";
        }
        
        $data['Get_Insure'] = $this->DateManagement_Model->Get_Insure_Company();
        $data['selectIDPackage'] = $this->DateManagement_Model->Get_IDPackage();



        $data['CoverRate'] = $this->DateManagement_Model->Select_data_CoverRate($whereCoverRate, $start, $pageend);
        $data['CountCoverRate'] = $this->DateManagement_Model->Count_data_CoverRate($whereCoverRate);


        $this->load->view('SettingData/TableCarCoverage', $data);
    }

    public function Update_TmpCoverage() {

        $Username = $this->session->userdata('Username');
        $Password = $this->session->userdata('Password');
        $AutoID = $this->session->userdata('AutoID');
        $IDCard = $this->session->userdata('IDCard');
        $FirstName = iconv('tis-620', 'utf-8', $this->session->userdata('FirstName'));
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

        $data['Currentdate'] = $this->Model_HomeInsurance->Current_date();
        foreach ($data['Currentdate'] as $value) {
            $data['Currentdate'] = $value->Currentdate;
            $SaveDate = $value->Currentdate;
        }
        $data['Get_Insure'] = $this->DateManagement_Model->Get_Insure_Company();
        $data['selectIDPackage'] = $this->DateManagement_Model->Get_IDPackage();


        $ID_CoverRate = trim($this->input->POST('ID_CoverRate'));
        $IDPackageEdit = trim($this->input->POST('IDPackageEdit'));
        $Insure_Code_CompanyEdit = trim($this->input->POST('Insure_Code_CompanyEdit'));
        $DetailCoverage1Edit = iconv('UTF-8', 'TIS-620', trim($this->input->POST('DetailCoverage1Edit')));
        $DetailCoverage2Edit = iconv('UTF-8', 'TIS-620', trim($this->input->post("DetailCoverage2Edit")));
        $DetailCoverage3Edit = iconv('UTF-8', 'TIS-620', trim($this->input->post("DetailCoverage3Edit")));
        $DetailCoverage4Edit = iconv('UTF-8', 'TIS-620', trim($this->input->post("DetailCoverage4Edit")));
        $DetailCoverage5Edit = iconv('UTF-8', 'TIS-620', trim($this->input->POST('DetailCoverage5Edit')));
        $DetailCoverage6Edit = iconv('UTF-8', 'TIS-620', trim($this->input->post("DetailCoverage6Edit")));
        $DetailCoverage7Edit = iconv('UTF-8', 'TIS-620', trim($this->input->post("DetailCoverage7Edit")));
        $DetailCoverage8Edit = iconv('UTF-8', 'TIS-620', trim($this->input->post("DetailCoverage8Edit")));
        $DetailCoverage9Edit = iconv('UTF-8', 'TIS-620', trim($this->input->post("DetailCoverage9Edit")));
        $DetailCoverage10Edit = iconv('UTF-8', 'TIS-620', trim($this->input->post("DetailCoverage10Edit")));
        $Net_InsuranceEdit = str_replace(',', '',trim($this->input->post("Net_InsuranceEdit")));
        $Status_Car = 'Active';


        $this->DateManagement_Model->UpdateTmpCoverage($ID_CoverRate, $IDPackageEdit, $Insure_Code_CompanyEdit,
        $DetailCoverage2Edit, $DetailCoverage3Edit, $DetailCoverage4Edit, $DetailCoverage5Edit, $DetailCoverage6Edit,
        $DetailCoverage7Edit,$DetailCoverage8Edit, $DetailCoverage9Edit, $DetailCoverage10Edit,$DetailCoverage1Edit, 
        $Net_InsuranceEdit, $Status_Car, $Username, $SaveDate);

        $start = 0;
        $pageend = 10;
        $data['pageend'] = $pageend;


        $whereCoverRate = "where Save_By = '$Username' AND StatusCoverage_Check = '0' ";

        $data['CoverRate'] = $this->DateManagement_Model->Select_dataTmp_CoverRate($whereCoverRate, $start, $pageend);
        $data['StatusCoverage_Check'] = $data['CoverRate'][0]->StatusCoverage_Check;
        
        $data['CountCoverRate'] = $this->DateManagement_Model->CountTmp_data_CoverRate($whereCoverRate);
        
        $this->load->view('SettingData/TableCarCoverage', $data);

    }

    
    public function Save_Edit_TmpCoverage() {
        

        $Username = $this->session->userdata('Username');
        $Password = $this->session->userdata('Password');
        $AutoID = $this->session->userdata('AutoID');
        $IDCard = $this->session->userdata('IDCard');
        $FirstName = iconv('tis-620', 'utf-8', $this->session->userdata('FirstName'));
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

        
        $data['Currentdate'] = $this->Model_HomeInsurance->Current_date();
        foreach ($data['Currentdate'] as $value) {
            $data['Currentdate'] = $value->Currentdate;
            $SaveDate = $value->Currentdate;
        }
        $data['Get_Insure'] = $this->DateManagement_Model->Get_Insure_Company();
        $data['selectIDPackage'] = $this->DateManagement_Model->Get_IDPackage();
        
        $start = 0;
        $pageend = 10;
        $data['pageend'] = $pageend;
        $data['StatusCoverage_Check'] = 0;


//       $TmpAdd_Coverage = $this->input->post('TmpAdd_Coverage'); 
//        if ($TmpAdd_Coverage != "") {
//            $I = 1;
//            foreach ($TmpAdd_Coverage as $C) {
//                
//                $ID_CoverRate[$I] = $C;
//                $IDPackageEdit[$I] = trim($this->input->post("IDPackageEdit" . $C . ""));
//                $Insure_Code_CompanyEdit[$I] = trim($this->input->post("Insure_Code_CompanyEdit" . $C . ""));
//                $DetailCoverage1Edit[$I] = iconv('UTF-8', 'TIS-620', trim($this->input->POST("DetailCoverage1Edit" . $C . "")));
//                $DetailCoverage2Edit[$I] = iconv('UTF-8', 'TIS-620', trim($this->input->POST("DetailCoverage2Edit" . $C . "")));
//                $DetailCoverage3Edit[$I] = iconv('UTF-8', 'TIS-620',trim($this->input->post("DetailCoverage3Edit" . $C . "")));
//                $DetailCoverage4Edit[$I] = iconv('UTF-8', 'TIS-620', trim($this->input->post("DetailCoverage4Edit" . $C . "")));
//                $DetailCoverage5Edit[$I] = iconv('UTF-8', 'TIS-620', trim($this->input->post("DetailCoverage5Edit" . $C . "")));
//                $DetailCoverage6Edit[$I] = iconv('UTF-8', 'TIS-620', trim($this->input->post("DetailCoverage6Edit" . $C . "")));
//                $DetailCoverage7Edit[$I] = iconv('UTF-8', 'TIS-620', trim($this->input->post("DetailCoverage7Edit" . $C . "")));
//                $DetailCoverage8Edit[$I] = iconv('UTF-8', 'TIS-620', trim($this->input->post("DetailCoverage8Edit" . $C . "")));
//                $DetailCoverage9Edit[$I] = iconv('UTF-8', 'TIS-620', trim($this->input->post("DetailCoverage9Edit" . $C . "")));
//                $DetailCoverage10Edit[$I] = iconv('UTF-8', 'TIS-620', trim($this->input->post("DetailCoverage10Edit" . $C . "")));
//                $Net_InsuranceEdit[$I] = str_replace(',', '', trim($this->input->post("Net_InsuranceEdit" . $C . "")));
//                $Status_Coverage = 'Active';

                
//                  $where[$I] = "[IDPackage] = '$IDPackageEdit[$I]',   
//                  [Insure_Code_Company] = '$Insure_Code_CompanyEdit[$I]', 
//                  [DetailCoverage1] = '$DetailCoverage1Edit[$I]',      
//                  [DetailCoverage2] = '$DetailCoverage2Edit[$I]',
//                  [DetailCoverage3] =  '$DetailCoverage3Edit[$I]',    
//                  [DetailCoverage4] = '$DetailCoverage4Edit[$I]',
//                  [DetailCoverage5] = '$DetailCoverage5Edit[$I]',
//                  [DetailCoverage6] = '$DetailCoverage6Edit[$I]',
//                  [DetailCoverage7] = '$DetailCoverage7Edit[$I]',
//                  [DetailCoverage8] = '$DetailCoverage8Edit[$I]',
//                  [DetailCoverage9] = '$DetailCoverage9Edit[$I]',
//                  [DetailCoverage10] = '$DetailCoverage10Edit[$I]',    
//                  [Net_Insurance] = '$Net_InsuranceEdit[$I]', 
//                  [Save_By] = '$Username',    
//                  [Save_date] = '$SaveDate',
//                  [Status_Coverage] = '$Status_Coverage',
//                  [StatusCoverage_Check] = '1' WHERE  ID_CoverRate = '$ID_CoverRate[$I]'";
//
//
//                $this->DateManagement_Model->Update_Checkcorrect_Coverage($where[$I]);

//                $I++; }
            
               $this->DateManagement_Model->Insert_AddTmp_CarCoverage(); //insent in to ข้อมูลที่ถูกไปตารางจริง

               $this->DateManagement_Model->UpdateCheckSuccess_Coverage($Username); //update StatusCoverage_Check เมื่อถูกบันทึกลงฐานจริงเรียบร้อยแล้ว
               
               
//        }
        
        $whereCoverRate = "where Save_By = '$Username' AND CONVERT(datetime,Save_date) = '$SaveDate'";

        $data['CoverRate'] = $this->DateManagement_Model->Select_data_CoverRate($whereCoverRate, $start, $pageend);
        
        $data['CountCoverRate'] = $this->DateManagement_Model->Count_data_CoverRate($whereCoverRate);
        
        $this->load->view('SettingData/TableCarCoverage', $data);
    }
    
    
    public function DELETE_TmpCar_Coverage() {

        $Username = $this->session->userdata('Username');
        $Password = $this->session->userdata('Password');
        $AutoID = $this->session->userdata('AutoID');
        $IDCard = $this->session->userdata('IDCard');
        $FirstName = iconv('tis-620', 'utf-8', $this->session->userdata('FirstName'));
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
      
        $ID_CoverRate = $this->input->post("ID_CoverRate");
       
        $this->DateManagement_Model->DELETE_ADDTMPCOVERRATE($Username,$ID_CoverRate);
        
        $start = 0;
        $pageend = 10;
        $data['pageend'] = $pageend;

        $whereCoverRate = "where Save_By = '$Username' AND StatusCoverage_Check = '0' ";
        $data['CountCoverRate'] = $this->DateManagement_Model->CountTmp_data_CoverRate($whereCoverRate);
        $data['CountCover'] = $data['CountCoverRate'][0]->Count;
        
        if ($data['CountCover'] == 0) {
            $data['CoverRate'] = '';
            $data['CountCoverRate'] = 0;
            $data['StatusCoverage_Check'] = 0;
        } else {

            $data['CoverRate'] = $this->DateManagement_Model->Select_dataTmp_CoverRate($whereCoverRate, $start, $pageend);
            $data['StatusCoverage_Check'] = $data['CoverRate'][0]->StatusCoverage_Check;

            $data['CountCoverRate'] = $this->DateManagement_Model->CountTmp_data_CoverRate($whereCoverRate);
        }

        $data['Get_Insure'] = $this->DateManagement_Model->Get_Insure_Company();
        $data['selectIDPackage'] = $this->DateManagement_Model->Get_IDPackage();
        
        $this->load->view('SettingData/TableCarCoverage', $data);
    }
    
    
    public function UpdateCoverage() {

        $Username = $this->session->userdata('Username');
        $Password = $this->session->userdata('Password');
        $AutoID = $this->session->userdata('AutoID');
        $IDCard = $this->session->userdata('IDCard');
        $FirstName = iconv('tis-620', 'utf-8', $this->session->userdata('FirstName'));
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

        $data['Currentdate'] = $this->Model_HomeInsurance->Current_date();
        foreach ($data['Currentdate'] as $value) {
            $data['Currentdate'] = $value->Currentdate;
            $SaveDate = $value->Currentdate;
        }
        $data['Get_Insure'] = $this->DateManagement_Model->Get_Insure_Company();
        $data['selectIDPackage'] = $this->DateManagement_Model->Get_IDPackage();


        $ID_CoverRate = trim($this->input->POST('ID_CoverRate'));
        $IDPackage = trim($this->input->POST('IDPackageEdit'));
        $Insure_Code_Company = trim($this->input->POST('Insure_Code_CompanyEdit'));
        $DetailCoverage1 = iconv('UTF-8', 'TIS-620', trim($this->input->POST('DetailCoverage1Edit')));
        $DetailCoverage2 = iconv('UTF-8', 'TIS-620', trim($this->input->post("DetailCoverage2Edit")));
        $DetailCoverage3 = iconv('UTF-8', 'TIS-620', trim($this->input->post("DetailCoverage3Edit")));
        $DetailCoverage4 = iconv('UTF-8', 'TIS-620', trim($this->input->post("DetailCoverage4Edit")));
        $DetailCoverage5 = iconv('UTF-8', 'TIS-620', trim($this->input->POST('DetailCoverage5Edit')));
        $DetailCoverage6 = iconv('UTF-8', 'TIS-620', trim($this->input->post("DetailCoverage6Edit")));
        $DetailCoverage7 = iconv('UTF-8', 'TIS-620', trim($this->input->post("DetailCoverage7Edit")));
        $DetailCoverage8 = iconv('UTF-8', 'TIS-620', trim($this->input->post("DetailCoverage8Edit")));
        $DetailCoverage9 = iconv('UTF-8', 'TIS-620', trim($this->input->post("DetailCoverage9Edit")));
        $DetailCoverage10 = iconv('UTF-8', 'TIS-620', trim($this->input->post("DetailCoverage10Edit")));
        $Net_Insurance = str_replace(',', '',trim($this->input->post("Net_InsuranceEdit")));
        $Status_Coverage = 'Active';


        $this->DateManagement_Model->Update_Coverage($ID_CoverRate, $IDPackage, $Insure_Code_Company,$DetailCoverage2,
        $DetailCoverage3, $DetailCoverage4, $DetailCoverage5, $DetailCoverage6, $DetailCoverage7 ,$DetailCoverage8, 
        $DetailCoverage9, $DetailCoverage10,  $DetailCoverage1, $Net_Insurance, $Status_Coverage,$Username, $SaveDate);
        

        $start = 0;
        $pageend = 10;
        $data['pageend'] = $pageend;
        $data['StatusCoverage_Check'] =  0;
        

        $whereCoverRate = "where Save_By = '$Username' ";
        
        $data['CoverRate'] = $this->DateManagement_Model->Select_data_CoverRate($whereCoverRate, $start, $pageend);
        $data['CountCoverRate'] = $this->DateManagement_Model->Count_data_CoverRate($whereCoverRate);


        $this->load->view('SettingData/TableCarCoverage', $data);

    }
    
    
        // ตารางกลาง MiddleCarInsurance
       public function Main_middleCarInsurance() {

        $Username = $this->session->userdata('Username');
        $Password = $this->session->userdata('Password');
        $AutoID = $this->session->userdata('AutoID');
        $IDCard = $this->session->userdata('IDCard');
        $FirstName = iconv('tis-620', 'utf-8', $this->session->userdata('FirstName'));
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

        $data['Currentdate'] = $this->Model_HomeInsurance->Current_date();
        foreach ($data['Currentdate'] as $value) {
            $data['Currentdate'] = $value->Currentdate;
            $Currentdate = $value->Currentdate;
        }
        
        $CarBrand = '';
        $CarModel = '';
        $CarYear = '';
        $start = 0;
        $pageend = 20;
        
        $data['pageend'] = $pageend;

        $data['Get_Insure'] = $this->DateManagement_Model->Get_Insure_Company();
        $data['GetEngineCC'] = $this->DateManagement_Model->Select_EngineCC();
        $data['GetCarBrand'] = $this->DateManagement_Model->Select_CarBrand();
        $data['Group_Car'] = $this->DateManagement_Model->GetGroup_Car();
        $data['cartype'] = $this->DateManagement_Model->Get_cartype();
        $data['InsuranceType'] = $this->DateManagement_Model->Get_InsuranceType();
        $data['selectIDPackage'] = $this->DateManagement_Model->Get_IDPackage();
        $data['Get_CarYear'] = $this->DateManagement_Model->Get_CarYearExport();
   

        
        $whereMiddle = "where A.Save_By = '$Username' AND A.Status_Middle = '0' ";
        $data['Count_CAR_DETAILS'] = $this->DateManagement_Model->SELECT_COUNT_MiddleCar_TMP($whereMiddle);
        $data['CountMiddle'] = $data['Count_CAR_DETAILS'][0]->Count;
        
        if ($data['CountMiddle'] == 0) {
            $data['GETCARDETAILS'] = '';
            $data['Count_CAR_DETAILS'] = 0;
            $data['Status_Middle'] = 0;
        } else {

            $data['GETCARDETAILS'] = $this->DateManagement_Model->SELECT_MiddleCar_TMP($whereMiddle, $start, $pageend);
            $data['Status_Middle'] = $data['GETCARDETAILS'][0]->Status_Middle;
            $data['Count_CAR_DETAILS'] = $this->DateManagement_Model->SELECT_COUNT_MiddleCar_TMP($whereMiddle);
        }

        

        $data['Show_Data_management'] = "SettingData/Main_MiddleCar";
        $this->load->view('SettingData/Main_Datamanagement', $data);
    }
    
    

//    public function MainTabledetails() {
//
//        $Username = $this->session->userdata('Username');
//        $Password = $this->session->userdata('Password');
//        $AutoID = $this->session->userdata('AutoID');
//        $IDCard = $this->session->userdata('IDCard');
//        $FirstName = $this->session->userdata('FirstName');
//        $LastName = $this->session->userdata('LastName');
//        $Tel = $this->session->userdata('Tel');
//        $Status = $this->session->userdata('Status');
//        $LevelEmp = $this->session->userdata('LevelEmp');
//        $DEPARTMENT = $this->session->userdata('DEPARTMENT');
//
//        $data['Username'] = $Username;
//        $data['Password'] = $Password;
//        $data['AutoID'] = $AutoID;
//        $data['IDCard'] = $IDCard;
//        $data['FirstName'] = $FirstName;
//        $data['LastName'] = $LastName;
//        $data['Tel'] = $Tel;
//        $data['Status'] = $Status;
//        $data['LevelEmp'] = $LevelEmp;
//        $data['DEPARTMENT'] = $DEPARTMENT;
//        
//        
//        $CarBrand = iconv('UTF-8', 'TIS-620', trim($this->input->POST('CarBrand')));
//        $CarModel = iconv('UTF-8', 'TIS-620', trim($this->input->post("CarModel")));
//        $CarYear = $this->input->post("CarYear");
//        $ID_InsureCode = $this->input->post("ID_InsureCode");
//        $IDPackag = $this->input->post("IDPackag");
//        $ID_CoverRate = $this->input->post("ID_CoverRate");
//        $data['selectIDPackage'] = $this->DateManagement_Model->Get_IDPackage();
//
//        $whereMiddle = " WHERE B.CarBrand = '" . $CarBrand . "' AND B.CarModel = '" . $CarModel . "'
//        AND B.CarYear = '" . $CarYear . "' AND A.Insure_Code_Company = '" . $ID_InsureCode . "'
//        AND A.IDPackage = '" . $IDPackag . "' AND A.ID_CoverRate = '".$ID_CoverRate."'";
//   
//         $start = 0;
//         $pageend = 10;
//         $data['pageend1'] = $pageend;
//         $data['Status_Middle'] = 0 ;
//
//         
////        $page = $this->input->post('page');
////        if ($page == 0) {
////            $start = 0;
////            $pageend1 = 10;
////            $pageend = 10;
////        } else {
////            $pageend1 = 10;
////            if ($page != '') {
////                $page = $page;
////            } else {
////                $page = 1;
////            }
////
////            $start = ($page - 1) * $pageend1;
////            $pageend = $page * 10;
////        }
////
////        $data['pageend1'] = $pageend1;
//         
//         
//     
//        $data['GETCARDETAILS'] = $this->DateManagement_Model->SELECT_MiddleCar_TMP($whereMiddle, $start, $pageend);
//        $data['Count_CAR_DETAILS'] = $this->DateManagement_Model->SELECT_COUNT_MiddleCar_TMP($whereMiddle);
//      
////      $data['GETCARDETAILS'] = $this->DateManagement_Model->SELECT_MiddleCar($wherenamegroup, $start, $pageend);
////      $data['Count_CAR_DETAILS'] = $this->DateManagement_Model->SELECT_COUNT_MiddleCar($wherenamegroup);
//
//      $this->load->view('SettingData/Table_MiddleCarInsurance', $data);
//    }

    public function Get_Code_Car() {

        $Username = $this->session->userdata('Username');
        $Password = $this->session->userdata('Password');
        $AutoID = $this->session->userdata('AutoID');
        $IDCard = $this->session->userdata('IDCard');
        $FirstName = iconv('tis-620', 'utf-8', $this->session->userdata('FirstName'));
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


        $CarBrand = iconv('UTF-8', 'TIS-620', trim($this->input->POST('CarBrand')));
        $CarModel = iconv('UTF-8', 'TIS-620', trim($this->input->post("CarModel")));
        $CarYear = $this->input->post("CarYear");

        $whereMiddle ='';
        $start = 0;
        $pageend = 20;
     
        $data['pageend1'] = $pageend;

        $data['GETCARDETAILS'] = $this->DateManagement_Model->SELECT_MiddleCar($whereMiddle,$start,$pageend);
        $data['Count_CAR_DETAILS'] = $this->DateManagement_Model->SELECT_COUNT_MiddleCar($whereMiddle);
        $data['Get_MakeDescription'] = $this->DateManagement_Model->SELECTMakeDescription($CarBrand, $CarModel, $CarYear);

        $this->load->view('SettingData/SELECT_Code_Car', $data);
    }

    public function ShowIDPackagc() { //ดึง IDPackagc 

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
        
        $ID_InsureCode = $this->input->POST('ID_InsureCode');
        $data['GET_Package'] = $this->DateManagement_Model->SELECTPACKAGE($ID_InsureCode);
        $this->load->view('SettingData/Select_IDPackage', $data);
    }
    
    
        public function Get_IDCoverRate() { //ดึง IDIDCoverRate

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
        
        $IDPackag = $this->input->POST('IDPackag');
        
        $start = 0;
        $pageend = 20;
        $whereMiddle='';
        
        $data['pageend1'] = $pageend;
        
        $data['Status_Middle'] = 0;
        

        $data['GETCARDETAILS'] = $this->DateManagement_Model->SELECT_MiddleCar($whereMiddle,$start,$pageend);
        $data['Count_CAR_DETAILS'] = $this->DateManagement_Model->SELECT_COUNT_MiddleCar($whereMiddle);
        $data['GET_IDCoverRate'] = $this->DateManagement_Model->SELECTCOVERRATE($IDPackag);
           
           
        $this->load->view('SettingData/Select_IDCoverRate', $data);
    }
    
    
     
     public function ImportExcel_TmpMiddle() {
         
        $Username = $this->session->userdata('Username');
        $Password = $this->session->userdata('Password');
        $AutoID = $this->session->userdata('AutoID');
        $IDCard = $this->session->userdata('IDCard');
        $FirstName = iconv('tis-620', 'utf-8', $this->session->userdata('FirstName'));
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
        
        $data['Currentdate'] = $this->Model_HomeInsurance->Current_date();
        foreach ($data['Currentdate'] as $value) {
            $SaveDate = $value->Currentdate;
        }
        
        $start = 0;
        $pageend = 20;
        $data['pageend'] = $pageend;
        
        
        $this->load->library('PHPExcel');
        $path = getcwd(); //ใช้คืนค่า directory ปัจจุบัน ที่กำลังทำงานอยู่
        $filepath = $path . "/UploadExcelMiddle";

        list($namefile, $ext) = explode('.', $_FILES['FileMiddle']['name']); // explodeแยกข้อความให้อยู่ในรูปแบบของ array
        $newnamefile = rand(0, 100); //random numbers
        $file_payment = $newnamefile . '.' . $ext;
        move_uploaded_file($_FILES["FileMiddle"]["tmp_name"], $filepath . '/' . $newnamefile . '.' . $ext);

        $file = "./UploadExcelMiddle/" . $file_payment . "";
        $obj = PHPExcel_IOFactory::load($file);
        $objPHPExcel = PHPExcel_IOFactory::load($file);
        $cell = $objPHPExcel->getActiveSheet()->getCellCollection();  //7000 
     
        foreach ($cell as $cl) {
            $column = $obj->getActiveSheet()->getCell($cl)->getColumn();
            $row = $obj->getActiveSheet()->getCell($cl)->getRow();
            $data_value = $obj->getActiveSheet()->getCell($cl)->getValue();
            $arr_row[$row] = $data_value;
            $arr_column[$row][$column] = $data_value;
        }
        
    
        $colNumber = PHPExcel_Cell::columnIndexFromString($column);
        if ($colNumber != 10){
            echo "<script>alert('จำนวน Column ไม่ถูกต้อง')</script>";
            
        }else{
            
     
        for ($x = 1; $x <= count($arr_row); $x++) {
            if ($x == 1) {
                
            } else {
                
                $Insure_Code_Company = trim($arr_column[$x]["A"]);
                $Code_Car = trim($arr_column[$x]["B"]);
                $CODE = trim($arr_column[$x]["C"]);
                $ID_CoverRate = trim($arr_column[$x]["D"]);
                $DetailCoverage1 = iconv('UTF-8', 'TIS-620', trim($arr_column[$x]["E"]));
                $IDPackage = trim($arr_column[$x]["F"]);
                $Insurance_price_total = iconv('UTF-8', 'TIS-620', trim($arr_column[$x]["G"]));
                $Discount_price_cctv = iconv('UTF-8', 'TIS-620', trim($arr_column[$x]["H"]));
                $ID_Type_Auto = iconv('UTF-8', 'TIS-620', trim($arr_column[$x]["I"]));
                $Group_Car = iconv('UTF-8', 'TIS-620', trim($arr_column[$x]["J"]));
                
                //คำนวนเบี้ยสุทธิ์ 1.07428 มาจากการคำนวนมาก่อน  คำนวนอากร คำนวนภาษี
                $Insurance_price = $Insurance_price_total / 1.07428; // เบี้ยสุทธิ์ 
                $Akon = $Insurance_price * 0.004; //อากร
                $Tax = ($Insurance_price+$Akon) * 0.07 ; //ภาษี

                 $whereMiddle = " WHERE  A.Insure_Code_Company = '" . $Insure_Code_Company . "'
                 AND A.IDPackage = '" . $IDPackage . "' AND A.ID_CoverRate = '" . $ID_CoverRate . "'
                 AND A.Save_By = '" . $Username . "'";


                $Count_DETAILS = $this->DateManagement_Model->SELECT_COUNT_MiddleCar($whereMiddle);
                $data['Count_CAR_DETAILS'] = $Count_DETAILS[0]->Count;

                if ($data['Count_CAR_DETAILS'] == 0) {
                    
                    $Status_Middle = 0; // 0 แสดงว่า ยังไม่มีข้อมูล คือ ถูก
                    
                $this->DateManagement_Model->Insent_TmpMiddleCar($Insure_Code_Company, $Code_Car, $CODE, $ID_CoverRate,
                $DetailCoverage1, $Insurance_price, $IDPackage, $Akon, $Tax, $Insurance_price_total, $Discount_price_cctv, 
                $ID_Type_Auto, $Group_Car, $SaveDate, $Status_Middle, $Username);   
                    
                } 
//                else {
//                   
//                    $Status_Middle = 2; // 2 แสดงว่า ข้อมูลมีอยู่ คือ ผิด
//                }

               
                
            } //End else
           
        }//End for
    
        
        $whereMiddle = "where A.Save_By = '$Username' AND A.Status_Middle = '0' ";

        $data['Count_CAR_DETAILS'] = $this->DateManagement_Model->SELECT_COUNT_MiddleCar_TMP($whereMiddle);
        $data['CountMiddle'] = $data['Count_CAR_DETAILS'][0]->Count;

        if ($data['CountMiddle'] == 0) {
            $data['GETCARDETAILS'] = '';
            $data['Count_CAR_DETAILS'] = 0;
            $data['Status_Middle'] = 0;
        } else {

            $data['GETCARDETAILS'] = $this->DateManagement_Model->SELECT_MiddleCar_TMP($whereMiddle, $start, $pageend);
            $data['Status_Middle'] = $data['GETCARDETAILS'][0]->Status_Middle;
            $data['Count_CAR_DETAILS'] = $this->DateManagement_Model->SELECT_COUNT_MiddleCar_TMP($whereMiddle);
        }

        $data['Get_Insure'] = $this->DateManagement_Model->Get_Insure_Company();
        $data['selectIDPackage'] = $this->DateManagement_Model->Get_IDPackage();
        $data['InsuranceType'] = $this->DateManagement_Model->Get_InsuranceType();
        $data['Group_Car'] = $this->DateManagement_Model->GetGroup_Car();
        $data['cartype'] = $this->DateManagement_Model->Get_cartype();

        $this->load->view('SettingData/Table_MiddleCarInsurance', $data);
    }
}  
    //ค้นหา
     public function SearchCarMiddleCar() {

        $Username = $this->session->userdata('Username');
        $Password = $this->session->userdata('Password');
        $AutoID = $this->session->userdata('AutoID');
        $IDCard = $this->session->userdata('IDCard');
        $FirstName = $this->session->userdata('FirstName');
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

        $CarBrand = iconv('UTF-8', 'TIS-620', trim($this->input->POST('CarBrand')));
        $CarModel = iconv('UTF-8', 'TIS-620', trim($this->input->post("CarDesc")));
        $CarYear = $this->input->post("CarYear");
        $ID_InsureCode = $this->input->post("ID_InsureCode");
        $IDPackag = $this->input->post("IDPackag");
        $ID_CoverRate = $this->input->post("ID_CoverRate");
        
        
        if ($CarBrand == "0" || $CarBrand == '') {
            $whereMiddleCarBrand = "";
        } else {
            $whereMiddleCarBrand = "AND B.CarBrand = '" . $CarBrand . "'";
        }

        if ($CarModel == "0" || $CarModel == '') {
            $whereMiddleCarModel = "";
        } else {
           $whereMiddleCarModel = "AND B.CarModel = '" . iconv( 'utf-8//ignore','tis-620//ignore',$CarModel). "'";
        }

        if ($ID_InsureCode == "0" || $ID_InsureCode == '') {
            $whereMiddleCompany = "";
        } else {
            $whereMiddleCompany = " AND A.Insure_Code_Company = '" . $ID_InsureCode . "'";
        }

        if ($IDPackag == "0" || $IDPackag == '') {
            $whereMiddleIDPackage = "";
        } else {
            $whereMiddleIDPackage = "AND D.IDPackage = '" . $IDPackag . "'";
        }

        if ($ID_CoverRate == "0" || $ID_CoverRate == '') {
            $whereMiddleIDCoverRate = "";
        } else {
            $whereMiddleIDCoverRate = " AND A.ID_CoverRate = '" . $ID_CoverRate . "'";
        }


       $whereMiddle = " WHERE B.CarYear = '" . $CarYear . "'";
        
       $whereMiddle = $whereMiddle." ".$whereMiddleCarBrand." ".$whereMiddleCarModel." ".$whereMiddleCompany." ".$whereMiddleIDPackage." ".$whereMiddleIDCoverRate ;

        $page = $this->input->post('page');
        $pageend1 = 20;
        if ($page != '') {
            $page = $page;
        } else {
            $page = 1;
        }

        $start = ($page - 1) * $pageend1;
        $pageend = $page * 20;

        $data['pageend'] = $pageend1;
        $data['pageshow'] = $page;
        $data['Status_Middle'] = 0; 


        $data['GETCARDETAILS'] = $this->DateManagement_Model->SELECT_MiddleCar($whereMiddle, $start, $pageend);
        $data['Count_CAR_DETAILS'] = $this->DateManagement_Model->SELECT_COUNT_MiddleCar($whereMiddle);

        $this->load->view('SettingData/Table_MiddleCarInsurance', $data);
    }

    //update ตาราง middleCarInsurance
      public function Update_TmpmiddleCar() {
          
        $Username = $this->session->userdata('Username');
        $Password = $this->session->userdata('Password');
        $AutoID = $this->session->userdata('AutoID');
        $IDCard = $this->session->userdata('IDCard');
        $FirstName = iconv('tis-620', 'utf-8', $this->session->userdata('FirstName'));
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

        $data['Currentdate'] = $this->Model_HomeInsurance->Current_date();
        foreach ($data['Currentdate'] as $value) {
            $data['Currentdate'] = $value->Currentdate;
            $SaveDate = $value->Currentdate;
        }

        
        $Middle_ID = trim($this->input->POST('Middle_ID'));
        $Code_Car = trim($this->input->POST('Code_CarEdit'));
        $IDCoverRate = iconv('UTF-8', 'TIS-620', trim($this->input->POST('IDCoverRateEdit')));
        $Insure_Code_Company = iconv('UTF-8', 'TIS-620', trim($this->input->POST('Insure_Code_CompanyEdit')));
        $IDPackage = trim($this->input->POST('IDPackageEdit'));
        $ID_Type_Auto = iconv('UTF-8', 'TIS-620', trim($this->input->post("IDTypeAutoEdit")));
        $CODE = trim($this->input->post("CODEEdit"));
        $Group_Car = trim($this->input->post("Group_CarEdit"));
        $Insurance_price = str_replace(',', '',trim($this->input->POST('Insurance_priceEdit')));
        $Insurance_price_total = str_replace(',', '',trim($this->input->POST('InsurancepricetotalEdit')));
        $Discount_price_cctv = trim($this->input->post("CctvPriceEdit"));
        $DetailCoverage1 = iconv('UTF-8', 'TIS-620', trim($this->input->post("DetailCoverage1Edit")));
        $Akon = str_replace(',', '', trim($this->input->post("AkonEdit")));
        $Tax = str_replace(',', '', trim($this->input->post("TaxEdit")));

        $Status = 'Active';
        $Status_Middle = '0';


       $this->DateManagement_Model->UpdateTmpmiddle($Middle_ID, $Insure_Code_Company, $CODE, $Code_Car, $IDCoverRate,
       $DetailCoverage1, $Insurance_price, $IDPackage, $Akon, $Tax, $Insurance_price_total, $Discount_price_cctv
       ,$ID_Type_Auto, $Group_Car, $Status, $SaveDate, $Status_Middle, $Username);

        $start = 0;
        $pageend = 20;
        $data['pageend'] = $pageend;


        $whereMiddle = "where A.Save_By = '$Username' AND A.Status_Middle = '0' ";

        $data['GETCARDETAILS'] = $this->DateManagement_Model->SELECT_MiddleCar_TMP($whereMiddle, $start, $pageend);
        $data['Status_Middle'] = $data['GETCARDETAILS'][0]->Status_Middle;
        $data['Count_CAR_DETAILS'] = $this->DateManagement_Model->SELECT_COUNT_MiddleCar_TMP($whereMiddle);

        $data['Get_Insure'] = $this->DateManagement_Model->Get_Insure_Company();
        $data['selectIDPackage'] = $this->DateManagement_Model->Get_IDPackage();
        $data['InsuranceType'] = $this->DateManagement_Model->Get_InsuranceType();
        $data['Group_Car'] = $this->DateManagement_Model->GetGroup_Car();
        $data['cartype'] = $this->DateManagement_Model->Get_cartype();
        
        
        $this->load->view('SettingData/Table_MiddleCarInsurance', $data);

    }
    
      //    Update Status switchCoverRate Active / Nonactive
    public function Update_switchststusCoverRate() {

        $Username = $this->session->userdata('Username');
        $Password = $this->session->userdata('Password');
        $AutoID = $this->session->userdata('AutoID');
        $IDCard = $this->session->userdata('IDCard');
        $FirstName = iconv('tis-620', 'utf-8', $this->session->userdata('FirstName'));
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


        $Middle_ID = $this->input->post("Middle_ID");
        $switchMiddle= $this->input->post("switchMiddle");
        
        
        if ($switchMiddle == "Active") {
            $Status = 'Active';
        } else {
            $Status = 'Nonactive';
        }

       $this->DateManagement_Model->Status_updatemiddle($Middle_ID,$Status);

        $start = 0;
        $pageend = 20;
        $data['pageend'] = $pageend;
        $data['Status_Middle'] = 0;
        
        
        $CarBrand = iconv('UTF-8', 'TIS-620', trim($this->input->POST('CarBrand')));
        $CarModel = iconv('UTF-8', 'TIS-620', trim($this->input->post("CarDesc")));
        $CarYear = $this->input->post("CarYear");
        $ID_InsureCode = $this->input->post("ID_InsureCode");
        $IDPackag = $this->input->post("IDPackag");
        $ID_CoverRate = $this->input->post("ID_CoverRate");

        
        if ($CarBrand == "0" || $CarBrand == '') {
            $whereMiddleCarBrand = "";
        } else {
            $whereMiddleCarBrand = "AND B.CarBrand = '" . $CarBrand . "'";
        }

        if ($CarModel == "0" || $CarModel == '') {
            $whereMiddleCarModel = "";
        } else {
            $whereMiddleCarModel = "AND B.CarModel = '" . iconv( 'utf-8//ignore','tis-620//ignore',$CarModel). "'";
        }

        if ($ID_InsureCode == "0" || $ID_InsureCode == '') {
            $whereMiddleCompany = "";
        } else {
            $whereMiddleCompany = " AND A.Insure_Code_Company = '" . $ID_InsureCode . "'";
        }

        if ($IDPackag == "0" || $IDPackag == '') {
            $whereMiddleIDPackage = "";
        } else {
            $whereMiddleIDPackage = "AND D.IDPackage = '" . $IDPackag . "'";
        }

        if ($ID_CoverRate == "0" || $ID_CoverRate == '') {
            $whereMiddleIDCoverRate = "";
        } else {
            $whereMiddleIDCoverRate = " AND A.ID_CoverRate = '" . $ID_CoverRate . "'";
        }


       $whereMiddle = " WHERE B.CarYear = '" . $CarYear . "'";
        
       $whereMiddle = $whereMiddle." ".$whereMiddleCarBrand." ".$whereMiddleCarModel." ".$whereMiddleCompany." ".$whereMiddleIDPackage." ".$whereMiddleIDCoverRate ;
        
        
        $data['GETCARDETAILS'] = $this->DateManagement_Model->SELECT_MiddleCar($whereMiddle, $start, $pageend);
        $data['Count_CAR_DETAILS'] = $this->DateManagement_Model->SELECT_COUNT_MiddleCar($whereMiddle);

        
        $this->load->view('SettingData/Table_MiddleCarInsurance', $data);
    }
    
    
    public function Updateswitchststusall() {

        $Username = $this->session->userdata('Username');
        $Password = $this->session->userdata('Password');
        $AutoID = $this->session->userdata('AutoID');
        $IDCard = $this->session->userdata('IDCard');
        $FirstName = iconv('tis-620', 'utf-8', $this->session->userdata('FirstName'));
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
        
        
        $start = 0;
        $pageend = 20;
        $data['pageend'] = $pageend;
        $data['Status_Middle'] = 0;
        
        
        $StatusMiddle = $this->input->post('StatusMiddle');
        $wherechk = '';
        $s = 1;
        foreach ($StatusMiddle as $value) {
            $Check_Middle[$s] = $value;
            $GetMiddle = explode(",", $Check_Middle[$s]);

            $A = $GetMiddle[0];
            $B = $GetMiddle[1];
            
            if ($s <= 1) {
                $wherechk = "'" . $A . "'";
            } else {
                $wherechk = "" . $wherechk . ",'" . $A . "' ";
            }

            $s++;
             
        }
       
       $whereStatus = " WHERE Middle_ID in ( " . $wherechk . " )";
       
    
        $data['getStatus'] = $this->DateManagement_Model->Get_StatusMiddle($whereStatus);
        foreach ($data['getStatus'] as $value) {
           $Status = $value->Status;
           $Middle = $value->Middle_ID;
           
           if ($Status == "Active") {
                $whereStatusMiddle = " SET Status = 'Non-Active' WHERE  Middle_ID ='$Middle' ";
            }else{
                $whereStatusMiddle = " SET Status = 'Active' WHERE  Middle_ID ='$Middle' ";
            }
            
           
         $this->DateManagement_Model->StatusAllUpdatemiddle($whereStatusMiddle);
            
//            WHERE Middle_ID in ( '" . $whereStatus . "' )";
//            } else {
//             echo  $whereStatusMiddle = "SET     Status =  CASE  
//                                    WHEN Status = '$Status' THEN 'Active'
//                                    else '$Status' 
//                    END 
//            WHERE Middle_ID in ( '" . $Middle . "' )";
//            }
        }
        

        $CarBrand = iconv('UTF-8', 'TIS-620', trim($this->input->POST('CarBrand')));
        $CarModel = iconv('UTF-8', 'TIS-620', trim($this->input->post("CarDesc")));
        $CarYear = $this->input->post("CarYear");
        $ID_InsureCode = $this->input->post("ID_InsureCode");
        $IDPackag = $this->input->post("IDPackag");
        $ID_CoverRate = $this->input->post("ID_CoverRate");

        
        if ($CarBrand == "0" || $CarBrand == '') {
            $whereMiddleCarBrand = "";
        } else {
            $whereMiddleCarBrand = "AND B.CarBrand = '" . $CarBrand . "'";
        }

        if ($CarModel == "0" || $CarModel == '') {
            $whereMiddleCarModel = "";
        } else {
            $whereMiddleCarModel = "AND B.CarModel = '" . iconv( 'utf-8//ignore','tis-620//ignore',$CarModel). "'";
        }

        if ($ID_InsureCode == "0" || $ID_InsureCode == '') {
            $whereMiddleCompany = "";
        } else {
            $whereMiddleCompany = " AND A.Insure_Code_Company = '" . $ID_InsureCode . "'";
        }

        if ($IDPackag == "0" || $IDPackag == '') {
            $whereMiddleIDPackage = "";
        } else {
            $whereMiddleIDPackage = "AND D.IDPackage = '" . $IDPackag . "'";
        }

        if ($ID_CoverRate == "0" || $ID_CoverRate == '') {
            $whereMiddleIDCoverRate = "";
        } else {
            $whereMiddleIDCoverRate = " AND A.ID_CoverRate = '" . $ID_CoverRate . "'";
        }


       $whereMiddle = " WHERE B.CarYear = '" . $CarYear . "'";
        
       $whereMiddle = $whereMiddle." ".$whereMiddleCarBrand." ".$whereMiddleCarModel." ".$whereMiddleCompany." ".$whereMiddleIDPackage." ".$whereMiddleIDCoverRate ;
     
        $data['GETCARDETAILS'] = $this->DateManagement_Model->SELECT_MiddleCar($whereMiddle, $start, $pageend);
        $data['Count_CAR_DETAILS'] = $this->DateManagement_Model->SELECT_COUNT_MiddleCar($whereMiddle);

        
        $this->load->view('SettingData/Table_MiddleCarInsurance', $data);
    }
    
    
    
    
     public function Delete_TmpMiddle() {

        $Username = $this->session->userdata('Username');
        $Password = $this->session->userdata('Password');
        $AutoID = $this->session->userdata('AutoID');
        $IDCard = $this->session->userdata('IDCard');
        $FirstName = iconv('tis-620', 'utf-8', $this->session->userdata('FirstName'));
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
      
        $Middle_ID = $this->input->post("Middle_ID");
        
        $this->DateManagement_Model->DELETE_ADDTMPMiddle($Middle_ID,$Username);
        
        $start = 0;
        $pageend = 10;
        $data['pageend'] = $pageend;
       
        
        $whereMiddle = "where A.Save_By = '$Username' AND A.Status_Middle = '0' ";
        $data['Count_CAR_DETAILS'] = $this->DateManagement_Model->SELECT_COUNT_MiddleCar_TMP($whereMiddle);
        $data['CountMiddle'] = $data['Count_CAR_DETAILS'][0]->Count;
        
        if ($data['CountMiddle'] == 0) {
            $data['GETCARDETAILS'] = '';
            $data['Count_CAR_DETAILS'] = 0;
            $data['Status_Middle'] = 0;
        } else {

            $data['GETCARDETAILS'] = $this->DateManagement_Model->SELECT_MiddleCar_TMP($whereMiddle, $start, $pageend);
            $data['Status_Middle'] = $data['GETCARDETAILS'][0]->Status_Middle;
            $data['Count_CAR_DETAILS'] = $this->DateManagement_Model->SELECT_COUNT_MiddleCar_TMP($whereMiddle);
        }
       

        $data['Get_Insure'] = $this->DateManagement_Model->Get_Insure_Company();
        $data['selectIDPackage'] = $this->DateManagement_Model->Get_IDPackage();
        $data['InsuranceType'] = $this->DateManagement_Model->Get_InsuranceType();
        $data['Group_Car'] = $this->DateManagement_Model->GetGroup_Car();
        $data['cartype'] = $this->DateManagement_Model->Get_cartype();
        
        
        $this->load->view('SettingData/Table_MiddleCarInsurance', $data);
    }
    
    
        public function Save_Edit_TmpMiddle() {
        

        $Username = $this->session->userdata('Username');
        $Password = $this->session->userdata('Password');
        $AutoID = $this->session->userdata('AutoID');
        $IDCard = $this->session->userdata('IDCard');
        $FirstName = iconv('tis-620', 'utf-8', $this->session->userdata('FirstName'));
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

        
        $data['Currentdate'] = $this->Model_HomeInsurance->Current_date();
        foreach ($data['Currentdate'] as $value) {
            $data['Currentdate'] = $value->Currentdate;
            $SaveDate = $value->Currentdate;
        }
        $data['Get_Insure'] = $this->DateManagement_Model->Get_Insure_Company();
        $data['selectIDPackage'] = $this->DateManagement_Model->Get_IDPackage();
        
        $start = 0;
        $pageend = 10;
        $data['pageend'] = $pageend;
        $data['Status_Middle'] = 0;


//       $TmpMiddle = $this->input->post('TmpMiddle'); 
//        if ($TmpMiddle != "") {
//            $I = 1;
//            foreach ($TmpMiddle as $M) {
//
//                $Middle_ID[$I] = $M;
//                $Insure_Code_CompanyEdit[$I] = trim($this->input->post("Insure_Code_CompanyEdit" . $M . ""));
//                $Code_CarEdit[$I] = trim($this->input->post("Code_CarEdit" . $M . ""));
//                $CODEEdit[$I] = iconv('UTF-8', 'TIS-620', trim($this->input->post("CODEEdit" . $M . "")));
//                $IDCoverRateEdit[$I] = trim($this->input->POST("IDCoverRateEdit" . $M . ""));
//                $DetailCoverage1Edit[$I] = iconv('UTF-8', 'TIS-620', trim($this->input->post("AkonEdit" . $M . "")));
//                $Insurance_priceEdit[$I] = str_replace(',', '',  trim($this->input->post("Insurance_priceEdit" . $M . "")));
//                $IDPackageEdit[$I] = trim($this->input->POST("IDPackageEdit" . $M . ""));
//                $AkonEdit[$I] = str_replace(',', '',  trim($this->input->post("AkonEdit" . $M . "")));
//                $TaxEdit[$I] = str_replace(',', '', trim($this->input->post("TaxEdit" . $M . "")));
//                $InsurancepricetotalEdit[$I] = str_replace(',', '',  trim($this->input->post("InsurancepricetotalEdit" . $M . "")));
//                $CctvPriceEdit[$I] = str_replace(',', '', trim($this->input->post("CctvPriceEdit" . $M . "")));
//                $IDTypeAutoEdit[$I] = trim($this->input->post("IDTypeAutoEdit" . $M . ""));
//                $Group_CarEdit[$I] = iconv('UTF-8', 'TIS-620', trim($this->input->post("Group_CarEdit" . $M . "")));
//                $Status = 'Active';

//                $where[$I] = "[Insure_Code_Company] = '$Insure_Code_CompanyEdit[$I]',
//                                [Code_Car] = '$Code_CarEdit[$I]', 
//                                [CODE] = '$CODEEdit[$I]',      
//                                [ID_CoverRate] = '$IDCoverRateEdit[$I]',
//                                [DetailCoverage1] =  '$DetailCoverage1Edit[$I]',    
//                                [Insurance_price] = '$Insurance_priceEdit[$I]',
//                                [IDPackage] = '$IDPackageEdit[$I]',
//                                [Akon] = '$AkonEdit[$I]',
//                                [Tax] = '$TaxEdit[$I]',
//                                [Insurance_price_total] = '$InsurancepricetotalEdit[$I]',
//                                [Discount_price_cctv] = '$CctvPriceEdit[$I]',
//                                [ID_Type_Auto] = '$IDTypeAutoEdit[$I]',    
//                                [Group_Car] = '$Group_CarEdit[$I]', 
//                                [Status] = '$Status', 
//                                [SaveDate] = '$SaveDate',  
//                                [Status_Middle] = '1',    
//                                [Save_By] = '$Username'      
//                  
//                  WHERE  Middle_ID = '$Middle_ID[$I]' AND [Save_By] = '$Username'";
//
//
//                $this->DateManagement_Model->Update_Checkcorrect_Middle($where[$I]);
//
//                $I++;
//            }

            $this->DateManagement_Model->Insert_AddTmp_Middle($Username); //insent in to ข้อมูลที่ถูกไปตารางจริง

            $this->DateManagement_Model->UpdateCheckSuccess_TmpMiddleCar($Username); //update Status_Middle เมื่อถูกบันทึกลงฐานจริงเรียบร้อยแล้ว
               
               
//        }

        $whereMiddle = "where A.Save_By = '$Username' AND CONVERT(date,A.SaveDate) = '$SaveDate'";
        
        $data['GETCARDETAILS'] = $this->DateManagement_Model->SELECT_MiddleCar($whereMiddle, $start, $pageend);
        $data['Count_CAR_DETAILS'] = $this->DateManagement_Model->SELECT_COUNT_MiddleCar($whereMiddle);
        
        
   
        $this->load->view('SettingData/Table_MiddleCarInsurance', $data);
    }

    public function ExportMiddleCarInsurance() {

        $Username = $this->session->userdata('Username');
        $Password = $this->session->userdata('Password');
        $AutoID = $this->session->userdata('AutoID');
        $IDCard = $this->session->userdata('IDCard');
        $FirstName = iconv('tis-620', 'utf-8', $this->session->userdata('FirstName'));
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




        $whereMiddle = "where A.Save_By = '$Username' AND Status_Middle = '0'";
        $data['Count_CAR_DETAILS'] = $this->DateManagement_Model->SELECT_COUNT_MiddleCar_TMP($whereMiddle);
        $start = 0;
        $pageend = $data['Count_CAR_DETAILS'][0]->Count;
        $data['GETCARDETAILS'] = $this->DateManagement_Model->SELECT_MiddleCar_TMP($whereMiddle, $start, $pageend);



        $objPHPExcel = new PHPExcel();
        $objPHPExcel->getActiveSheet()->setTitle('MiddleCar'); //ชื่อหัว
        $objPHPExcel->setActiveSheetIndex(0) //หัวข้อ
                ->setCellValue('A1', 'Insure_Code_Company')
                ->setCellValue('B1', 'Code_Car')
                ->setCellValue('C1', 'CODE')
                ->setCellValue('D1', 'ID_CoverRate')
                ->setCellValue('E1', 'DetailCoverage1')
                ->setCellValue('F1', 'IDPackage')
                ->setCellValue('G1', 'Insurance_price_total')
                ->setCellValue('H1', 'Discount_price_cctv')
                ->setCellValue('I1', 'ID_Type_Auto')
                ->setCellValue('J1', 'Group_Car');


        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(20);  //ปรับความกว่างของช่อง
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(13);
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(15);
        $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(16);
        $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(15);
        $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(13);
        $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(18);
        $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(18);
        $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(13);




        //ใส่สีหัวข้อ
        $objPHPExcel->getActiveSheet()->getStyle('A1:J1')->applyFromArray(
                array(
                    'fill' => array(
                        'type' => PHPExcel_Style_Fill::FILL_SOLID,
                        'color' => array('rgb' => 'B8DBD9')
                    )
                )
        );

        $start2 = 2;

        if ($pageend == 0) {
            
        } else {
            foreach ($data['GETCARDETAILS'] as $row) {



                $objPHPExcel->setActiveSheetIndex(0)
                        ->setCellValue('A' . $start2, $row->Auto_ID)
                        ->setCellValue('B' . $start2, $row->Code_Car)
                        ->setCellValue('C' . $start2, iconv('tis-620//IGNORE', 'utf-8//IGNORE', $row->CODE))
                        ->setCellValue('D' . $start2, $row->ID_CoverRate)
                        ->setCellValue('E' . $start2, iconv('tis-620//IGNORE', 'utf-8//IGNORE', $row->DetailCoverage1))
                        ->setCellValue('F' . $start2, iconv('tis-620//IGNORE', 'utf-8//IGNORE', $row->IDPackage))
                        ->setCellValue('G' . $start2, number_format($row->Insurance_price_total, 02))
                        ->setCellValue('H' . $start2, number_format($row->Discount_price_cctv, 02))
                        ->setCellValue('I' . $start2, $row->ID_Type_Auto)
                        ->setCellValue('J' . $start2, $row->Group_Car);


                // เพิ่มแถวข้อมูล
                $start2++;
            }
        }

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');  // Excel2007 (xlsx) หรือ Excel5 (xls)         
        $filename = 'TmpMiddleCarInsurance-' . date("dmYHi") . '.xlsx'; //  กำหนดชือ่ไฟล์ นามสกุล xls หรือ xlsx

        header('Content-Type: application/vnd.ms-excel'); //mime type
        header('Content-Disposition: attachment;filename="' . $filename . '"'); //tell browser what's the file name
        header('Cache-Control: max-age=0'); //no cache
        ob_end_clean();
        $objWriter->save('php://output'); // ดาวน์โหลดไฟล์รายงาน

        exit;
    }
    

    
        public function ExportMiddleCarYear() {

        $Username = $this->session->userdata('Username');
        $Password = $this->session->userdata('Password');
        $AutoID = $this->session->userdata('AutoID');
        $IDCard = $this->session->userdata('IDCard');
        $FirstName = iconv('tis-620', 'utf-8', $this->session->userdata('FirstName'));
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


        
        $CarBrand = iconv('UTF-8', 'TIS-620', trim($this->input->get('CarBrand')));
        $CarModel = iconv('UTF-8', 'TIS-620', trim($this->input->get("CarDesc")));
        $CarYear = $this->input->get("CarYear");
        $ID_InsureCode = $this->input->get("ID_InsureCode");
        $IDPackag = $this->input->get("IDPackag");
        $ID_CoverRate = $this->input->get("ID_CoverRate");
        
        
        if ($CarBrand == "0" || $CarBrand == '') {
            $whereMiddleCarBrand = "";
        } else {
            $whereMiddleCarBrand = "AND B.CarBrand = '" . $CarBrand . "'";
        }

        if ($CarModel == "0" || $CarModel == '') {
            $whereMiddleCarModel = "";
        } else {
            $whereMiddleCarModel = "AND B.CarModel = '" . $CarModel . "'";
        }

        if ($ID_InsureCode == "0" || $ID_InsureCode == '') {
            $whereMiddleCompany = "";
        } else {
            $whereMiddleCompany = " AND A.Insure_Code_Company = '" . $ID_InsureCode . "'";
        }

        if ($IDPackag == "0" || $IDPackag == '') {
            $whereMiddleIDPackage = "";
        } else {
            $whereMiddleIDPackage = "AND D.IDPackage = '" . $IDPackag . "'";
        }

        if ($ID_CoverRate == "0" || $ID_CoverRate == '') {
            $whereMiddleIDCoverRate = "";
        } else {
            $whereMiddleIDCoverRate = " AND A.ID_CoverRate = '" . $ID_CoverRate . "'";
        }


        $whereMiddle = "AND B.CarYear = '" . $CarYear . "'";
        
        $whereMiddle = $whereMiddle." ".$whereMiddleCarBrand." ".$whereMiddleCarModel." ".$whereMiddleCompany." ".$whereMiddleIDPackage." ".$whereMiddleIDCoverRate ;

        $data['Count_CAR_DETAILS'] = $this->DateManagement_Model->SELECT_COUNT_MiddleCar($whereMiddle);
        $start = 0;
        $pageend = $data['Count_CAR_DETAILS'][0]->Count;
        $data['GETCARDETAILS'] = $this->DateManagement_Model->SELECT_MiddleCar($whereMiddle, $start, $pageend);


        $objPHPExcel = new PHPExcel();
        $objPHPExcel->getActiveSheet()->setTitle('MiddleCarInsurance'); //ชื่อหัว
        $objPHPExcel->setActiveSheetIndex(0) //หัวข้อ
                ->setCellValue('A1', 'row') 
                ->setCellValue('B1', 'Insure_Code_Company')
                ->setCellValue('C1', 'Code_Car')
                ->setCellValue('D1', 'CODE')
                ->setCellValue('E1', 'ID_CoverRate')
                ->setCellValue('F1', 'DetailCoverage1')
                ->setCellValue('G1', 'IDPackage')
                ->setCellValue('H1', 'Insurance_price_total')
                ->setCellValue('I1', 'Discount_price_cctv')
                ->setCellValue('J1', 'ID_Type_Auto')
                ->setCellValue('K1', 'Group_Car');


        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(10);  //ปรับความกว่างของช่อง
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(23);
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(15);
        $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(16);
        $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(15);
        $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(15);
        $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(18);
        $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(13);
        $objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(13);


        //ใส่สีหัวข้อ
        $objPHPExcel->getActiveSheet()->getStyle('A1:K1')->applyFromArray(
                array(
                    'fill' => array(
                    'type' => PHPExcel_Style_Fill::FILL_SOLID,
                    'color' => array('rgb' => 'B8DBD9')
                    )
                )
        );

        $start2 = 2;

        if ($pageend == 0) {
            
        } else {
            foreach ($data['GETCARDETAILS'] as $row) {

                $objPHPExcel->setActiveSheetIndex(0)
                        ->setCellValue('A' . $start2, $row->row)
                        ->setCellValue('B' . $start2, $row->Auto_ID)
                        ->setCellValue('C' . $start2, $row->Code_Car)
                        ->setCellValue('D' . $start2, iconv('tis-620//IGNORE', 'utf-8//IGNORE', $row->CODE))
                        ->setCellValue('E' . $start2, $row->ID_CoverRate)
                        ->setCellValue('F' . $start2, iconv('tis-620//IGNORE', 'utf-8//IGNORE', $row->DetailCoverage1))
                        ->setCellValue('G' . $start2, iconv('tis-620//IGNORE', 'utf-8//IGNORE', $row->IDPackage))
                        ->setCellValue('H' . $start2, number_format($row->Insurance_price_total, 02))
                        ->setCellValue('I' . $start2, number_format($row->Discount_price_cctv, 02))
                        ->setCellValue('J' . $start2, $row->ID_Type_Auto)
                        ->setCellValue('K' . $start2, $row->Group_Car);


                // เพิ่มแถวข้อมูล
                $start2++;
            }
        }

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');  // Excel2007 (xlsx) หรือ Excel5 (xls)         
        $filename = 'MiddleCarInsurance-' . date("dmYHi") . '.xlsx'; //  กำหนดชือ่ไฟล์ นามสกุล xls หรือ xlsx

        header('Content-Type: application/vnd.ms-excel'); //mime type
        header('Content-Disposition: attachment;filename="' . $filename . '"'); //tell browser what's the file name
        header('Cache-Control: max-age=0'); //no cache
        ob_end_clean();
        $objWriter->save('php://output'); // ดาวน์โหลดไฟล์รายงาน

        exit;
    }
    
    
    public function get_CarBrand() {
        $CarYear = $this->input->get('CarYear');
        $res = $this->DateManagement_Model->GetCarBrandExport($CarYear);
        $result = array();
        foreach ($res as $r) {
            $result[] = array(
                'CarBrand' => $r->CarBrand,
            );
        }
        echo json_encode($result);
    }

    
     public function getAmpCarDesc() {
         
        $CarBrand = $this->input->get('CarBrand');
        $res = $this->DateManagement_Model->GetCarModelExport($CarBrand);
        $result = array();
        foreach ($res as $r) {
            $result[] = array(
                'CarModel' => iconv('tis-620//ignore', 'utf-8//ignore', $r->CarModel),
            );
        }
     
    echo json_encode($result);
    }
    


}
