<?php

defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set("Asia/Bangkok"); //เซตเวลา ว่าเอาเวลาของอะไร

class Check_buy extends CI_Controller {

    public function __construct() {
        parent:: __construct();
        $this->load->library('session', 'upload', 'encrypt');
        $this->load->library('excel');
        $this->load->model('Model_HomeInsurance');
        $this->load->library('ciqrcode');
        set_time_limit(0);
        ini_set('memory_limit', '-1');
    }

  

public function Home() {
        
        
        $Username = $this->session->userdata('Username');
        $Password = $this->session->userdata('Password');
        $AutoID = $this->session->userdata('AutoID');
        $IDCard = iconv('tis-620', 'utf-8', $this->session->userdata('IDCard'));
        $FirstName = iconv('tis-620', 'utf-8', $this->session->userdata('FirstName'));
        $LastName = iconv('tis-620', 'utf-8', $this->session->userdata('LastName'));
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
        
        if($AutoID == ""){
            $this->load->view('false');
        } else {

        $data['Brandcar'] = $this->Model_HomeInsurance->Get_Brandcar();
        $CountCheckSell =$this->Model_HomeInsurance->Count_Show_Customers_Interested($Username); //Count ตรวจสอบการซื้อ
        foreach ($CountCheckSell as  $value) {
           $data['CoutCheck_Sell'] = $value->Count;
        }

        $this->load->view('Check_buy/HomeCar', $data);
    }
 }     


    public function Work_Notification() {

        $Username = $this->session->userdata('Username');
        $Password = $this->session->userdata('Password');
        $AutoID = $this->session->userdata('AutoID');
//        $IDCard = iconv('tis-620', 'utf-8', $this->session->userdata('IDCard'));
        $FirstName = $this->session->userdata('FirstName');
        $LastName = iconv('tis-620', 'utf-8', $this->session->userdata('LastName'));
        $Tel = $this->session->userdata('Tel');
        $Status = $this->session->userdata('Status');
        $LevelEmp = $this->session->userdata('LevelEmp');
        $DEPARTMENT = $this->session->userdata('DEPARTMENT');

        
        $IDCard    =  $this->input->post("IDCard");
        $NameUser   =  $this->input->post("NameUser");
        $Insurance_Price =  $this->input->post("Insurance_Price");
        $Namecompany  =  $this->input->post("Namecompany");
        $Type_ID   =  $this->input->post("Type_ID");
        $PROSPECT_LIST_ID =  $this->input->post("PROSPECT_LIST_ID");
        $PaymentType  =  $this->input->post("PaymentType");
        $CarLicensePlateProvince  =  $this->input->post("CarLicensePlateProvince");
        $TransStatus  =  $this->input->post("TransStatus");
        $StatusButton  =  $this->input->post("StatusButton");
        $head  =  $this->input->post("head");

        $data['Username'] = $Username;
        $data['Password'] = $Password;
        $data['AutoID'] = $AutoID;
//        $data['IDCard'] = $IDCard;
        $data['FirstName'] = $FirstName;
        $data['LastName'] = $LastName;
        $data['Tel'] = $Tel;
        $data['Status'] = $Status;
        $data['LevelEmp'] = $LevelEmp;
        $data['DEPARTMENT'] = $DEPARTMENT;
        $data['IDCard']      = $IDCard;
        $data['Insurance_Price'] = $Insurance_Price;
        $data['PROSPECT_LIST_ID'] = $PROSPECT_LIST_ID;
        $data['PaymentType'] = $PaymentType;
        $data['CarLicensePlateProvince'] = $CarLicensePlateProvince;
        $data['StatusButton'] = $StatusButton;
        $data['head'] = $head;

        

        
        if ($AutoID == "") {
            $this->load->view('false');
        } else {

            $data['PROVINCE'] = $this->Model_HomeInsurance->PROVINCE();
            $getProvince = $this->Model_HomeInsurance->PROVINCE_one($CarLicensePlateProvince);
            foreach ($getProvince as  $value) {
               $data['PROVINCE_NAME'] = $value->PROVINCE_NAME;
            }

            $data['Call_Work'] = $this->Model_HomeInsurance->getCall_work($Username,$PROSPECT_LIST_ID);   //เรียกข้อมูลแจ้งงาน
            $data['GetCC'] = $this->Model_HomeInsurance->SelectEnginecc();


            $InsureClass = $this->Model_HomeInsurance->Insure_Class($Namecompany,$Type_ID); //ข้อมูลประกันชั้น
            foreach ($InsureClass as $value) {
                $data['Down_payment']    = $value->Down_payment;
                $data['Max_installment'] = $value->Max_installment;
            }


           $checkrow_Tran = $this->Model_HomeInsurance->GetTransection($PROSPECT_LIST_ID);
            if(count($checkrow_Tran)  < 1){ 

                  
                  $data['PageShow'] = "Check_buy/Work_Notification";
                   $this->load->view('Check_buy/remark', $data);
            
            }else{
                
                  $data['PageShow'] = "Check_buy/Work_NotificationEdit";
                   $this->load->view('Check_buy/remark',$data);
            }
            
        }
    }
    
     public function Save_Worknotification(){

        $FirstName = $this->session->userdata('FirstName');
        $Username = $this->session->userdata('Username');
        $txt_pospeclist   = $this->input->post("txt_pospeclist");
        $prefix    = $this->input->post("prefix");
        $txtname   = $this->input->post("txtname");
        $txtsur    = $this->input->post("txtsur");
        $txtidcard = $this->input->post("txtidcard");
        $txtbd     = $this->input->post("txtbd");
        $txtage1   = $this->input->post("txtage1");
        $tel = $this->input->post("tel");
        $tel_work = $this->input->post("tel_work");
        $phone = $this->input->post("phone");
        $moo = $this->input->post("moo");
        $village = $this->input->post("village");
        $soi = $this->input->post("soi");
        $subdistrict = $this->input->post("subdistrict");
        $road = $this->input->post("road");
        $policy_number = $this->input->post("policy_number");
        $policy_moo = $this->input->post("policy_moo");
        $policy_village = $this->input->post("policy_village");
        $policy_soi = $this->input->post("policy_soi");
        $policy_road = $this->input->post("policy_road");
        $policy_subdistrict = $this->input->post("policy_subdistrict");
        $policy_zip = $this->input->post("policy_zip");
        $contact = $this->input->post("contact");
        $datacar_brand = $this->input->post("datacar_brand");
        $datacar_model = $this->input->post("datacar_model");
        $datacar_Y_regis = $this->input->post("datacar_Y_regis");
        $datacar_paper = $this->input->post("datacar_paper");
        $datacar_province = $this->input->post("datacar_province");
        $datacar_cc = $this->input->post("datacar_cc");
        $datacar_seat = $this->input->post("datacar_seat");
        $datacar_weight = $this->input->post("datacar_weight");
        $datacar_beauty = $this->input->post("datacar_beauty");
        $datacar_price = $this->input->post("datacar_price");
        $datacar_type = $this->input->post("datacar_type");
        $datacar_number = $this->input->post("datacar_number");
        $datacar_no = $this->input->post("datacar_no");
        $typepay = $this->input->post("typepay");
        $amount_install = $this->input->post("amount_install");
        $style_installment = $this->input->post("style_installment"); ////****************ลงเป็นเงินสด
        $percent = $this->input->post("percent");
        $installment_first = $this->input->post("installment_first");
        $pay_process = $this->input->post("pay_process");
        $Day_Dew = $this->input->post("Day_Dew");
        $sum_instasll = $this->input->post("sum_instasll");
        $pay_first = $this->input->post("pay_first");
        // $sumcash  = $this->input->post("sumcash");
        $bank = $this->input->post("bank");
        $datepay = $this->input->post("datepay");
        $number_cash = $this->input->post("number_cash");
        $Akon    = $this->input->post("Akon");
        $tax     = $this->input->post("tax");
       
        $sum_customer_pay = $this->input->post("sum_customer_pay"); //ยอดรวมที่ลูกค้าต้องชำระ

        $afterdiscount       =  $this->input->post("afterdiscount");
        $after_discountcash  =  $this->input->post("after_discountcash");

        $number = $this->input->post("number");
        $zip = $this->input->post("zip");


        if($typepay == "เงินสด"){
            $Net_Total      = $after_discountcash; //เบี้ยประกันรวมหลังหักส่วนลดเงินสด
            $PeriodNumber   = ""; //จำนวนงวด
            $Down_Percent   = ""; //% Down
            $Down           = ""; ////ดาวน์งวดแรก
            $Charge         = ""; //ค่าดำเนินการ
            $Due            = "";  //ครบดิว
            $Installment    = ""; //ยอดชำระแต่ละงวด
            $Total_FirstPayment   = trim($sum_customer_pay);; //รวม เงินสด

        }else{ //เงินผ่อน
             $Net_Total      = $afterdiscount; //เบี้ยประกันรวมหลังหักส่วนลดผ่อน
             $PeriodNumber   = trim($amount_install); //จำนวนงวด
             $Down_Percent   = $percent; //% Down
             $Down           = trim($installment_first); //ดาวน์งวดแรก
             $Charge         =  $pay_process;  //ค่าดำเนินการ
             $Due            =  trim($Day_Dew);  //ครบดิว
             $Installment    = trim($sum_instasll); //ยอดชำระแต่ละงวด
             $Total_FirstPayment  = trim($pay_first); //รวมจ่ายครั้งแรก

        
 
        }

// //-------------------------------------------------------------------------------------------
        
    $OPT = "ADD";
    $SUB_OPT = "TRANSACTION";
    $FDATE = "";
    $LDATE = "";
    $TranID =  "";
    $Prospect_list_id = $txt_pospeclist;
    $QuotationNo  = "";
    $CreateEmp  = "";
    $CustomerInt = trim(iconv("UTF-8","TIS-620",$prefix));
    $CustomerFirstname = trim(iconv("UTF-8","TIS-620",$txtname));
    $CustomerLastname = trim(iconv("UTF-8","TIS-620",$txtsur));
    $CustomerIDCard = trim($txtidcard); 
    $BirthDate = date("Y-m-d",strtotime($txtbd));
    $Age   = trim($txtage1);
    $NameDriver1 ="";
     $LastNameDriver1 = "";
     $Birthday_Driver1 = "2020-02-11";
     $Age_Driver1 = "";
     $Number_Driver1 ="";
     $NameDriver2 = "";
     $LastNameDriver2 = "";
     $Birthday_Driver2 = "2020-02-11";
     $Age_Driver2 = "";
     $Number_Driver2 ="";
    $CustomerHomeTel = trim($tel);
    $CustomerOfficeTel =  trim($tel_work);
    $CustomerMobileTel =  trim($phone);
    $CustomerAddr1 = "";
    $CustomerMoo_Doc  = trim(iconv("UTF-8","TIS-620",$moo)); 
    $CustomerName_Village_Doc  = trim(iconv("UTF-8","TIS-620",$village));
    $CustomerSoi_Doc =  trim(iconv("UTF-8","TIS-620",$soi));
    $CustomerRoad_Doc =   trim(iconv("UTF-8","TIS-620",$road));
    $CustomerDistrict_Doc   = $subdistrict;
    $CustomerAddr2 =" ";
    $CustomerAddr_Policy =trim(iconv("UTF-8","TIS-620",$policy_number));
    $CustomerMoo_Policy  = trim(iconv("UTF-8","TIS-620",$policy_moo)); 
    $CustomerName_Village_Policy  = trim(iconv("UTF-8","TIS-620",$policy_village));
    $CustomerSoi_Policy = trim(iconv("UTF-8","TIS-620",$policy_soi));
    $CustomerRoad_Policy = trim(iconv("UTF-8","TIS-620",$policy_road));
    $CustomerDistrict_Policy   = $policy_subdistrict;
    $CustomerZip   = "";
    $CustomerZip_Policy   = trim($policy_zip);
    $Customer_NameOffice  = "";
    $Contact_Customer  = trim(iconv("UTF-8","TIS-620",$contact));
    $StartCoverDate ="";
    $EndCoverDate ="";
    $StartCoverDate_Act ="";
    $EndCoverDate_Act ="";
    $CarBrand  = iconv("UTF-8","TIS-620",$datacar_brand);
    $CarModel  = iconv("UTF-8","TIS-620",$datacar_model);
    $CarFamilyDesc = "";
    $CarYear  = $datacar_Y_regis;
    $CarLicensePlate   = trim(iconv("UTF-8","TIS-620",$datacar_paper));
    $CarLicensePlateProvince   = $datacar_province;
    $CC = trim(iconv("UTF-8","TIS-620",$datacar_cc));
    $Car_Seat   = trim(iconv("UTF-8","TIS-620",$datacar_seat));
    $Car_Weight =  trim(iconv("UTF-8","TIS-620",$datacar_weight));
    $Accessory  = trim(iconv("UTF-8","TIS-620",$datacar_beauty));
    $Price_Accessory = trim(iconv("UTF-8","TIS-620",$datacar_price));
    $VehicleKey ="";
    $CarType = iconv("UTF-8","TIS-620",$datacar_type);
    $ChasisNo = trim(iconv("UTF-8","TIS-620",$datacar_number));
    $EngineNo = trim(iconv("UTF-8","TIS-620",$datacar_no));
    $Type_Protection   = "";
    $Insurance_Company  ="";
    $TypeOfInsure   = "";
    $Net_premium   = "";
    $Total_Premium   = "";
    $TypeDiscount   = "";
    $Discount_Percent  = "";
    $Discount_Premium   = "";
    $Discount_Percent_Premium   = "";
    $Net_Discount_Premium   = "";
    $Garage  ="";
    $CarProtection   = "";
    $DeDuctible   = "";
    $LossProtection   = "";
    $ExternalProtectionLife   = "";
    $ExternalProtection   = "";
    $ExternalProtectionLife_Person   = "";
    $ExternalProtectionLife_Time   = "";
    $ExternalProtectionAsset   = "";
    $PA_DRIVER_PASSENGER   = "";
    $PA_DRIVER   = "";
    $PA_PASSENGER   = "";
    $PA_NUMBER   = "";
    $PA_TOTAL   = "";
    $ME   = "";
    $BB   = "";
    $AKON   = $Akon;
    $TAX   =  $tax;
    $ClaimReceiveNo  ="";
    $ClaimReceiveDate ="";
    $PolicyNo   = "";
    $PolicyDate ="";
    $PolicyEMS  ="";
    $PolicySendDate ="";
    $CopyPolicySendDate ="";
    $PolicySendType = "";
    $PolicyCustDate ="";
    $Branch_Code  = "";
    $TELESALE  ="";
    $SOURCE_LIST  ="";
    $TransStatus = "";
    $CreateDate ="";
    $ModifyEmp  ="";
    $ModifyDate ="";
    $Remark  = "";
    $Remark_Transaction  = "";
    $PaymentType = trim(iconv("UTF-8","TIS-620",$typepay)); //---------เพิ่งเพิ่ม
    $TypeDown    = trim(iconv("UTF-8","TIS-620",$style_installment));

   
   
   
    $Customer_Payment   = "";
    $Bank  = $bank;
    $Date_Payment =$datepay; 
    $Number_Credit   =  trim($number_cash); 
    $Number_Ref   =""; 
    $Insurance_Company_Act = "";
    $Net_premium_Act   = "";
    $AKON_Act   = "";
    $TAX_Act   = "";
    $Total_Premium_Act   = "";
    $Net_Total_Premium   = "";
    
    $Status ="";
    $ID ="";
    $Ret ="";
    $OUT ="";
    $TypeDiscount_Act ="";
    $Premium_Act ="";
    $Percent_Act ="";
    $Discount_Act  ="";
    $Net_Total_Premium_Act ="";
    $Money_Contract ="";
    $CustomerAddr_Doc =trim($number);
    $CustomerZip_Doc =trim($zip);


        $dataArr = array(
            "OPT"=> $OPT,
            "SUB_OPT"=> $SUB_OPT,
            "FDATE"=> $FDATE,
            "LDATE"=> $LDATE,
            "TranID"=> $TranID,
            "Prospect_list_id"=>$Prospect_list_id,
            "QuotationNo"=>$QuotationNo,
            "CreateEmp"=>$CreateEmp,
            "CustomerInt"=>$CustomerInt,
            "CustomerFirstname"=>$CustomerFirstname,
            "CustomerLastname"=>$CustomerLastname,
            "CustomerIDCard"=>$CustomerIDCard,
            "BirthDate"=>$BirthDate,
            "Age"=>$Age,
            "NameDriver1"=>$NameDriver1,
            "LastNameDriver1"=>$LastNameDriver1,
            "Birthday_Driver1"=>$Birthday_Driver1,
            "Age_Driver1"=>$Age_Driver1,
            "Number_Driver1"=>$Number_Driver1,
            "NameDriver2"=>$NameDriver2,
            "LastNameDriver2"=>$LastNameDriver2,
            "Birthday_Driver2"=>$Birthday_Driver2,
            "Age_Driver2"=>$Age_Driver2,
            "Number_Driver2"=>$Number_Driver2,
            "CustomerHomeTel"=>$CustomerHomeTel,
            "CustomerOfficeTel"=>$CustomerOfficeTel,
            "CustomerMobileTel"=>$CustomerMobileTel,
            "CustomerAddr1"=>$CustomerAddr1,
            "CustomerMoo_Doc"=>$CustomerMoo_Doc, 
            "CustomerName_Village_Doc"=>$CustomerName_Village_Doc,
            "CustomerSoi_Doc"=>$CustomerSoi_Doc,
            "CustomerRoad_Doc"=>$CustomerRoad_Doc,
            "CustomerDistrict_Doc"=>$CustomerDistrict_Doc,
            "CustomerAddr2"=>$CustomerAddr2,
            "CustomerAddr_Policy"=>$CustomerAddr_Policy,
            "CustomerMoo_Policy"=>$CustomerMoo_Policy, 
            "CustomerName_Village_Policy"=>$CustomerName_Village_Policy,
            "CustomerSoi_Policy"=>$CustomerSoi_Policy,
            "CustomerRoad_Policy"=>$CustomerRoad_Policy,
            "CustomerDistrict_Policy"=>$CustomerDistrict_Policy,
            "CustomerZip"=>$CustomerZip,
            "CustomerZip_Policy"=>$CustomerZip_Policy,
            "Customer_NameOffice"=>$Customer_NameOffice,
            "Contact_Customer"=>$Contact_Customer,
            "StartCoverDate"=>$StartCoverDate,
            "EndCoverDate"=>$EndCoverDate,
            "StartCoverDate_Act"=>$StartCoverDate_Act,
            "EndCoverDate_Act"=>$EndCoverDate_Act,
            "CarBrand"=>$CarBrand,
            "CarModel"=>$CarModel,
            "CarFamilyDesc"=>$CarFamilyDesc,
            "CarYear"=>$CarYear,
            "CarLicensePlate"=>$CarLicensePlate,
            "CarLicensePlateProvince"=>$CarLicensePlateProvince,
            "CC"=>$CC,
            "Car_Seat"=>$Car_Seat,
            "Car_Weight"=>$Car_Weight,
            "Accessory"=>$Accessory,
            "Price_Accessory"=>$Price_Accessory,
            "VehicleKey"=>$VehicleKey,
            "CarType"=>$CarType,
            "ChasisNo"=>$ChasisNo,
            "EngineNo"=>$EngineNo,
            "Type_Protection"=>$Type_Protection,
            "Insurance_Company"=>$Insurance_Company,
            "TypeOfInsure"=>$TypeOfInsure,
            "Net_premium"=>$Net_premium,
            "Total_Premium"=>$Total_Premium,
            "TypeDiscount"=>$TypeDiscount,
            "Discount_Percent"=>$Discount_Percent,
            "Discount_Premium"=>$Discount_Premium,
            "Discount_Percent_Premium"=>$Discount_Percent_Premium,
            "Net_Discount_Premium"=>$Net_Discount_Premium,
            "Garage"=>$Garage,
            "CarProtection"=>$CarProtection,
            "DeDuctible"=>$DeDuctible,
            "LossProtection"=>$LossProtection,
            "ExternalProtectionLife"=>$ExternalProtectionLife,
            "ExternalProtection"=>$ExternalProtection,
            "ExternalProtectionLife_Person"=>$ExternalProtectionLife_Person,
            "ExternalProtectionLife_Time"=>$ExternalProtectionLife_Time,
            "ExternalProtectionAsset"=>$ExternalProtectionAsset,
            "PA_DRIVER_PASSENGER"=>$PA_DRIVER_PASSENGER,
            "PA_DRIVER"=>$PA_DRIVER,
            "PA_PASSENGER"=>$PA_PASSENGER,
            "PA_NUMBER"=>$PA_NUMBER,
            "PA_TOTAL"=>$PA_TOTAL,
            "ME"=>$ME,
            "BB"=>$BB,
            "AKON"=>$AKON,
            "TAX"=>$TAX,
            "ClaimReceiveNo"=>$ClaimReceiveNo,
            "ClaimReceiveDate"=>$ClaimReceiveDate,
            "PolicyNo"=>$PolicyNo,
            "PolicyDate"=>$PolicyDate,
            "PolicyEMS"=>$PolicyEMS,
            "PolicySendDate"=>$PolicySendDate,
            "CopyPolicySendDate"=>$CopyPolicySendDate,
            "PolicySendType"=>$PolicySendType,
            "PolicyCustDate"=>$PolicyCustDate,
            "Branch_Code"=>$Branch_Code,
            "TELESALE"=>$TELESALE,
            "SOURCE_LIST"=>$SOURCE_LIST,
            "TransStatus"=>$TransStatus,
            "CreateDate"=>$CreateDate,
            "ModifyEmp"=>$ModifyEmp,
            "ModifyDate"=>$ModifyDate,
            "Remark"=>$Remark,
            "Remark_Transaction"=>$Remark_Transaction,
            "PaymentType"=>$PaymentType,
            "PeriodNumber"=>$PeriodNumber,
            "TypeDown"=>$TypeDown,
            "Down_Percent"=>$Down_Percent,
            "Down"=>$Down,
            "Charge"=>$Charge,
            "Due"=>$Due,
            "Installment"=>$Installment,
            "Total_FirstPayment"=>$Total_FirstPayment,
            "Customer_Payment"=>$Customer_Payment,
            "Bank"=>$Bank,
            "Date_Payment"=>$Date_Payment,
            "Number_Credit"=>$Number_Credit,
            "Number_Ref"=>$Number_Ref,
            "Insurance_Company_Act"=>$Insurance_Company_Act,
            "Net_premium_Act"=>$Net_premium_Act,
            "AKON_Act"=>$AKON_Act,
            "TAX_Act"=>$TAX_Act,
            "Total_Premium_Act"=>$Total_Premium_Act,
            "Net_Total_Premium"=>$Net_Total_Premium,
            "Net_Total"=>$Net_Total,
            "Status"=>$Status,
            "ID"=>$ID, 
            "Ret"=>$Ret,
            "OUT"=>$OUT,
            "TypeDiscount_Act"=>$TypeDiscount_Act,
            "Premium_Act"=>$Premium_Act,
            "Percent_Act"=>$Percent_Act,
            "Discount_Act"=>$Discount_Act,
            "Net_Total_Premium_Act"=>$Net_Total_Premium_Act,
            "Money_Contract"=>$Money_Contract,
            "CustomerAddr_Doc"=>$CustomerAddr_Doc,
            "CustomerZip_Doc"=>$CustomerZip_Doc,

        );

         $this->Model_HomeInsurance->insertAA($dataArr);

 
          $data['ShowCustomers'] = $this->Model_HomeInsurance->Show_Customers_Interested($Username);

            $A = $this->Model_HomeInsurance->CountApproveCredit($Username); $data['CountApprove_Credit']   = $A[0]->CountApprove_Credit;
            $B = $this->Model_HomeInsurance->CountRejectCredit($Username);  $data['CountReject_Credit']    = $B[0]->CountReject_Credit;
            $C = $this->Model_HomeInsurance->CountCallwork_Orange($Username); $data['CountCallwork_Orange']= $C[0]->CountCallwork_Orange;
            $D = $this->Model_HomeInsurance->CountCallwork_Green($Username); $data['CountCallwork_Green']  = $D[0]->CountCallwork_Green;
            $E = $this->Model_HomeInsurance->CountWaitCheck($Username);     $data['CountCallwork_success'] = $E[0]->CountCallwork_success;
            $F = $this->Model_HomeInsurance->CountWaittell_Insure($Username);   $data['CountWaitCheck']    = $F[0]->CountWaitCheck;
            $G = $this->Model_HomeInsurance->Counttell_Insure($Username);   $data['CounttellInsure']       = $G[0]->CounttellInsure;
            $H = $this->Model_HomeInsurance->CountReject_Tran($Username);   $data['CountRejectTrans']      = $H[0]->CountRejectTrans;
          
            $this->load->view('Check_buy/Viewquotation_main/Table_Viewquotation',$data);



    }
    public function  selectbox(){
        $txtAumphur = $this->input->POST('txtAumphur');
        $txttumbon  = $this->input->POST('txttumbon');
        $txtprovince= $this->input->POST('txtprovince');

        $GET_PROVINCE     = $this->Model_HomeInsurance->PROVINCE_one($txtprovince);
        $GET_AMPHUR       = $this->Model_HomeInsurance->AMPHUR_one($txtAumphur);
        $GET_DISTRICTNAME = $this->Model_HomeInsurance->DISTRICT_one($txttumbon);

        $Get_Province_id = $GET_PROVINCE[0]->PROVINCE_ID;
        $Get_Province    = iconv("TIS-620//IGNORE","UTF-8//IGNORE",$GET_PROVINCE[0]->PROVINCE_NAME);

        $Get_Amphur_id   = $GET_AMPHUR[0]->AMPHUR_ID;
        $Get_Amphur      = iconv("TIS-620//IGNORE","UTF-8//IGNORE",$GET_AMPHUR[0]->AMPHUR_NAME);

        $Get_Tumbon_id   = $GET_DISTRICTNAME[0]->DISTRICT_ID;
        $Get_Tumbon      = iconv("TIS-620//IGNORE","UTF-8//IGNORE",$GET_DISTRICTNAME[0]->DISTRICT_NAME);


        $GET_PROVINCE2 = $this->Model_HomeInsurance->PROVINCE();



        $data[] = array("Get_Amphur_id"=>$Get_Amphur_id,"Get_Amphur"=>$Get_Amphur,"Get_Tumbon_id"=>$Get_Tumbon_id,"Get_Tumbon"=>$Get_Tumbon,"Get_Province_id"=>$Get_Province_id,"Get_Province"=>$Get_Province);
         echo json_encode($data);

      
    }public function Remark(){
        $PROSPECT_LIST_ID    = $this->input->post("PROSPECT_LIST_ID");
        $Remark              = $this->input->post("Remark");
        $head                = $this->input->post("head");
        
        $data['PageShow'] = "Check_buy/SubWork_Notification/Remark";
        $data['head'] = "หมายเหตุ";
        $data['Remark'] = $Remark;
        $this->load->view('Check_buy/remark',$data);
      }
    
      public function Upload_Slip(){
        $Username = $this->session->userdata('Username');
        $FirstName = $this->session->userdata('FirstName');
        $PROSPECT_LIST_ID = $this->input->post("PROSPECT_LIST_ID");
        $Insurance_price  = $this->input->post("Insurance_price");
        $payfirst        = $this->input->post("payfirst");
        $PaymentType     = $this->input->post("PaymentType");
        $head           = $this->input->post("head");
        $PeriodNumber   = $this->input->post("PeriodNumber");
        $TransactionID        = $this->input->post("TransactionID");
        $Date_Payment   = $this->input->post("Date_Payment");
        $Total_FirstPayment = $this->input->post("Total_FirstPayment");
        $Installment   = $this->input->post("Installment");

       
        $dateCurrent = $this->Model_HomeInsurance->get_DateCurrent();
        foreach ($dateCurrent as  $value) {
             $data['Day_Current'] = $value->DateCurrent;
        }

        $data['PROSPECT_LIST_ID'] = $PROSPECT_LIST_ID;
        $data['Insurance_price'] = $Insurance_price;
        $data['payfirst'] = $payfirst;
        $data['PaymentType'] = $PaymentType;
        $data['head'] = $head;
        $data['PeriodNumber'] = $PeriodNumber;
        $data['TransactionID'] = $TransactionID;
        $data['Date_Payment'] = $Date_Payment;
        $data['Total_FirstPayment'] = $Total_FirstPayment;
        $data['Installment'] = $Installment;
        $start=0;
        $pageend = 10;
        $where ="WHERE SaveBy ='".$Username."' AND PROSPECT_LIST_ID='".$PROSPECT_LIST_ID."' ";
        $data['Username'] = $Username;
        $data['pageend'] = $pageend;
      
        $whereslip ="";
        $getsum = $this->Model_HomeInsurance->sumslip($Username,$PROSPECT_LIST_ID,$whereslip);
        $data['count_getsum'] = count($getsum);


        $data['get_Picbill'] = $this->Model_HomeInsurance->gettable_image($start,$pageend,$where);
        $data['Count_get_Picbill'] = $this->Model_HomeInsurance->countgettable_image($where);

        $checkStatus_Payslip = $this->Model_HomeInsurance->checkStatus_Payslip($Username,$PROSPECT_LIST_ID); 
        $data['checkStatus_Payslip'] = $checkStatus_Payslip[0]->StatusButton;
         $this->load->view('Check_buy/SubWork_Notification/Upload_bill',$data);
    }

     public function Save_Slip() { //UPDATE ทับ  job_alert_NEW เพราะตารางใบเสร็จไม่มีธนาคาร
        $Username = $this->session->userdata('Username');
        $FirstName = $this->session->userdata('FirstName');
        $picname  = $this->input->POST('picname');
        $paymoney = $this->input->POST('paymoney');
        $bank     = iconv('utf-8','tis-620',$this->input->POST('bank'));
        $datepay  = date("Y-m-d H:i:00",strtotime($this->input->POST('datepay')));
        $number_cash  = $this->input->POST('number_cash');
        $txtpostspeclist  = $this->input->POST('txtpostspeclist');
        $Insurance_price = $this->input->POST('Insurance_price');
        $summoney  = $this->input->POST('summoney');
        $PaymentType   = $this->input->POST('PaymentType');
         
        $PeriodNumber   = $this->input->POST('PeriodNumber');
        $TransactionID        = $this->input->POST('TransactionID');
        $Total_FirstPayment   = $this->input->POST('Total_FirstPayment');
        $Installment   = $this->input->POST('Installment');
       

        $path = getcwd();
        $filepath = $path . "/JIB_PAYSLIP";

       if(empty($_FILES['file']['name'])) {
           $namefile = '';
       }else {
           list($namefile, $ext) = explode('.', $_FILES['file']['name']);
       }

       if($namefile == '') {
           $picname = $this->input->post("picname");
       }else{
           
           @unlink("" . $filepath . "/" . $this->input->post("picname"));
           $newnamefile = rand(0, 100);
           $picname = $newnamefile. '.' . $ext;//
           move_uploaded_file($_FILES["file"]["tmp_name"], $filepath . '/' . $newnamefile . '.' . $ext);
           
       }


       $this->Model_HomeInsurance->SaveBill($txtpostspeclist,$picname,$paymoney,$bank,$Username,$datepay); //insert ลงตารางภาพ และทำการดึง Sumข้อมุล

       $whereslip ="";
       $getsum = $this->Model_HomeInsurance->sumslip($Username,$txtpostspeclist,$whereslip);
       $Sumpay = $getsum[0]->Sumpay;
       $data['count_getsum'] = count($getsum);
      
        $this->Model_HomeInsurance->updatepayJob_Alert_New($Sumpay,$datepay,$txtpostspeclist); //update Jobalert at PROSPECT_LIST_ID


        $this->Model_HomeInsurance->updateDatepay($txtpostspeclist); //update date_pay

        $start=0;
        $pageend = 10;
        $data['pageend'] = $pageend;
        $where ="WHERE SaveBy ='".$Username."' AND PROSPECT_LIST_ID='".$txtpostspeclist."'  ";
        $data['get_Picbill'] = $this->Model_HomeInsurance->gettable_image($start,$pageend,$where);
        $data['Count_get_Picbill'] = $this->Model_HomeInsurance->countgettable_image($where);
 
        $checkStatus_Payslip = $this->Model_HomeInsurance->checkStatus_Payslip($Username,$txtpostspeclist); 
        $data['checkStatus_Payslip'] = $checkStatus_Payslip[0]->StatusButton;

         $data['txtsumpay'] =  $summoney;
         $data['Insurance_price'] =  $Insurance_price;
         $data['PROSPECT_LIST_ID'] = $txtpostspeclist;
         $data['Username'] = $Username;
         $data['payfirst'] = $Insurance_price;
         $data['PaymentType'] = $PaymentType;
         $data['Date_Payment'] = $datepay; // textbox ที่กรอกเงินครั้งล่าสุด
         $data['PeriodNumber'] = $PeriodNumber;
         $data['TransactionID'] = $TransactionID;
         $data['Total_FirstPayment'] = $Total_FirstPayment;
         $data['Installment'] = $Installment;

          $this->load->view('Check_buy/SubWork_Notification/table_bill',$data);

     
   }
   public function Confirm_waitChecek(){

        $UserName = $this->session->userdata('Username');
        $FirstName =$this->session->userdata('FirstName');
        $txtpostspeclist = $this->input->post("txtpostspeclist");
        $Insurance_price = $this->input->post("Insurance_price");
        $txtsumpay       = $this->input->post("txtsumpay");
        $PaymentType    = $this->input->post("PaymentType");

        $PeriodNumber       = $this->input->post("PeriodNumber");
        $TransactionID            = $this->input->post("TransactionID");
        $Date_Paymentfirst  = date("Y-m-d",strtotime($this->input->post("Date_Paymentfirst")));
        $Date_Payment       = date("Y-m-d",strtotime($this->input->post("Date_Payment")));
        $Total_FirstPayment = $this->input->post("Total_FirstPayment");
        $Installment        = $this->input->post("Installment");
        $PROSPECT_LIST_ID   = $this->input->post("PROSPECT_LIST_ID");



        if($txtsumpay == $Insurance_price || $txtsumpay > $Insurance_price){
             
                $TransStatus = "pending";
                $this->Model_HomeInsurance->UpdateTrans_Status($TransStatus,$txtpostspeclist);
                
                $TELESALES_STATUS='WAIT';
                $TELESALES_GROUPDEBT = "'RS0016'";
                $this->Model_HomeInsurance->UpdateStatus_tell($TELESALES_STATUS,$TELESALES_GROUPDEBT,$txtpostspeclist);//Update ที่ TBL_TELESALE_WORK_NEW WAIT|RS0016
                
                $this->Model_HomeInsurance->UpdatePaySlip($UserName,$txtpostspeclist); //Update Status 1 Payslip
        }else{

            

        }

          $count = intval($PeriodNumber); 
          $last  = intval($PeriodNumber);//งวดสุดท้าย

        $this->Model_HomeInsurance->delete_installment($TransactionID);
          for ($i=0; $i < $count ; $i++) { 

            if(intval($i)+1 == 1){
                $principal = $Total_FirstPayment;
            }else{


               if(intval($i)+1 == $last){
                   $principal = intval($Installment - 200);
               }else{
                   $principal = $Installment;
               }
           }
           $num = intval($i)+1;
           $datePay  = date("Y-m-d", strtotime($Date_Payment.'+'.$i.' month'));
           $principal = number_format($principal,2);

           $this->Model_HomeInsurance->Insert_TBL_INSTALLMENT($TransactionID,$num,$datePay,$principal);

          }

           $getInsurance_price_total = $this->Model_HomeInsurance->getCall_work($UserName,$PROSPECT_LIST_ID);
           $sum= $getInsurance_price_total[0]->Insurance_price_total;
           $IDCard = $getInsurance_price_total[0]->IDCard;
           $Down_Percent = $getInsurance_price_total[0]->Down_Percent;
           $PaymentType = $getInsurance_price_total[0]->PaymentType;


           if(iconv("TIS-620//ignore","UTF-8//ignore",$PaymentType) == "เงินสด"){

                $IDCARD = $IDCard;
                $PaymentType =  iconv("UTF-8","TIS-620","เงินสด");
                $Principal = $sum; //ยอดรวมที่ลูกค้าต้องชำระ
                $OSbalance = $sum; //ยอดรวมที่ลูกค้าต้องชำระ
                $E_Balance = $sum; //ยอดรวมที่ลูกค้าต้องชำระ
                $ServiceFee = 0.00;
                $StatusAccount = "A";

                $this->Model_HomeInsurance->delete_installment_main($TransactionID);
                $this->Model_HomeInsurance->Insert_TBL_INSTALLMENT_MAIN_money($TransactionID,$IDCARD,$PaymentType,$Principal,$OSbalance,$E_Balance,$ServiceFee,$StatusAccount);
 
        }else{

            $IDCARD = $IDCard;
            $PaymentType = iconv("UTF-8","TIS-620","ผ่อนเงินสด");
            $Principal = $sum; //ยอดรวมที่ลูกค้าต้องชำระ
            $OSbalance = $sum; //ยอดรวมที่ลูกค้าต้องชำระ
            $E_Balance = $sum; //ยอดรวมที่ลูกค้าต้องชำระ

            $day = date("d",strtotime($Date_Payment));
            $number_day = intval($day);

               if($number_day >= 1 && $number_day <= 14){ //วันครบดิว
                      $Due = 1;
               }else if($number_day >= 15 && $number_day <= 31){
                       $Due = 15;
               }

            // $datefirst = $this->Model_HomeInsurance->getDate_First($PROSPECT_LIST_ID);
            // $Date_payfirst   = $datefirst[0]->Date_pay;

            // $datelast = $this->Model_HomeInsurance->getDate_last($PROSPECT_LIST_ID);
            // $Date_paylast   = $datelast[0]->Date_pay;

               



            $Duedate = $Due;
            $Term = $PeriodNumber; //จำนวนงวด;
            $StartDate = $Date_Paymentfirst;
            $EndDate    = $Date_Payment ;
            $DownPercent = $Down_Percent; //เปอร์เซ็นดาวน์งวดแรก
            $ServiceFee = 0.00;
            $StatusAccount = "A";
            
            $this->Model_HomeInsurance->delete_installment_main($TransactionID);
            $this->Model_HomeInsurance->Insert_TBL_INSTALLMENT_MAIN($TransactionID,$IDCARD,$PaymentType,$Principal,$OSbalance,$E_Balance,$Duedate,$Term,$StartDate,$EndDate,$DownPercent,$ServiceFee,$StatusAccount);

        }    


          $start=0;
          $pageend = 10;
          $where ="WHERE SaveBy ='".$UserName."' AND PROSPECT_LIST_ID='".$txtpostspeclist."'  ";

          $data['get_Picbill'] = $this->Model_HomeInsurance->gettable_image($start,$pageend,$where);
          $data['Count_get_Picbill'] = $this->Model_HomeInsurance->countgettable_image($where);

          $checkStatus_Payslip = $this->Model_HomeInsurance->checkStatus_Payslip($UserName,$txtpostspeclist); 

          $A = $this->Model_HomeInsurance->CountApproveCredit($UserName); $data['CountApprove_Credit']   = $A[0]->CountApprove_Credit;
          $B = $this->Model_HomeInsurance->CountRejectCredit($UserName);  $data['CountReject_Credit']    = $B[0]->CountReject_Credit;
          $C = $this->Model_HomeInsurance->CountCallwork_Orange($UserName); $data['CountCallwork_Orange']= $C[0]->CountCallwork_Orange;
          $D = $this->Model_HomeInsurance->CountCallwork_Green($UserName); $data['CountCallwork_Green']  = $D[0]->CountCallwork_Green;
          $E = $this->Model_HomeInsurance->CountWaitCheck($UserName);     $data['CountCallwork_success'] = $E[0]->CountCallwork_success;
          $F = $this->Model_HomeInsurance->CountWaittell_Insure($UserName);   $data['CountWaitCheck']    = $F[0]->CountWaitCheck;
          $G = $this->Model_HomeInsurance->Counttell_Insure($UserName);   $data['CounttellInsure']       = $G[0]->CounttellInsure;
          $H = $this->Model_HomeInsurance->CountReject_Tran($UserName);   $data['CountRejectTrans']      = $H[0]->CountRejectTrans;

          
          $data['checkStatus_Payslip'] = $checkStatus_Payslip[0]->StatusButton;
          $data['Insurance_price'] =  $Insurance_price;
          $data['PROSPECT_LIST_ID'] = $txtpostspeclist;
          $data['UserName'] = $UserName;
          $data['PaymentType'] = $PaymentType;
          $data['payfirst'] = $Insurance_price;
          $data['ShowCustomers'] = $this->Model_HomeInsurance->Show_Customers_Interested($UserName);
          $this->load->view('Check_buy/Viewquotation_main/Table_Viewquotation',$data);
         


    }
  
   public function Page_Pic(){
     $Username = $this->session->userdata('Username');
     $FirstName = $this->session->userdata('FirstName');
     $page = $this->input->post("page");
     $pageend1 = 10;
     if($page != ''){
           $page = $page;
       }else{
           $page = 10;
       }       
       $start = ($page-1)*$pageend1;
       $pageend = $page*10;
       $data['numpage'] = $page;
       $data['pageend'] = $pageend1;

        $where ="WHERE SaveBy ='".$Username."' ";
        $data['get_Picbill'] = $this->Model_HomeInsurance->gettable_image($start,$pageend,$where);
        $data['Count_get_Picbill'] = $this->Model_HomeInsurance->countgettable_image($where);

         $this->load->view('Check_buy/SubWork_Notification/table_bill',$data);
   }

   public function Deletebill(){
    $Username = $this->session->userdata('Username');
    $FirstName = $this->session->userdata('FirstName');
    $AutoID = $this->input->post("AutoID");
    $Insurance_price = $this->input->post("Insurance_price");
    $PROSPECT_LIST_ID = $this->input->post("PROSPECT_LIST_ID");
    $PaymentType     = $this->input->post("PaymentType");
    $payfirst =  $this->input->post("payfirst");
    $PeriodNumber  =  $this->input->post("PeriodNumber");
    $TransactionID       =  $this->input->post("TransactionID");
    $Total_FirstPayment =  $this->input->post("Total_FirstPayment");
    $Installment  =  $this->input->post("Installment");
    $datepay     =  $this->input->post("datepay");
    $data['Date_Payment'] = $datepay;

    $where="WHERE SaveBy ='".$Username."' AND  AutoID='".$AutoID."'";


    $TransStatus = "NEW";
    $this->Model_HomeInsurance->UpdateTrans_Status($TransStatus,$PROSPECT_LIST_ID);
    
    $TELESALES_STATUS='NEW';
    $TELESALES_GROUPDEBT = 'NULL';
    $this->Model_HomeInsurance->UpdateStatus_tell($TELESALES_STATUS,$TELESALES_GROUPDEBT,$PROSPECT_LIST_ID);//Update ที่ TBL_TELESALE_WORK_NEW WAIT|RS0016

    $this->Model_HomeInsurance->Del_IMAGE_PAYSLIP($where); //delete

    $whereslip = "";  
    $getsum = $this->Model_HomeInsurance->sumslip($Username,$PROSPECT_LIST_ID,$whereslip);
    if(count($getsum) == 0){
         $Sumpay = 0;
    }else{
         $Sumpay = $getsum[0]->Sumpay;
    }
    

    
     $this->Model_HomeInsurance->updatepayJob_Alert_New2($Sumpay,$PROSPECT_LIST_ID); //Update sumpay 


      $this->Model_HomeInsurance->updateDatepay($PROSPECT_LIST_ID); //update date_pay


    $start = 0;
    $pageend = 10;
    $where ="WHERE SaveBy ='".$Username."' AND PROSPECT_LIST_ID='".$PROSPECT_LIST_ID."' ";
    $data['get_Picbill'] = $this->Model_HomeInsurance->gettable_image($start,$pageend,$where);
    $data['Count_get_Picbill'] = $this->Model_HomeInsurance->countgettable_image($where);
    
    $data['Username']          = $Username;
    $data['Insurance_price'] =  $Insurance_price;
    $data['PROSPECT_LIST_ID'] = $PROSPECT_LIST_ID;
    $data['PaymentType']      = $PaymentType;
    $data['payfirst']         = $payfirst;
    $data['PeriodNumber'] = $PeriodNumber;
    $data['TransactionID'] = $TransactionID;
    $data['Total_FirstPayment'] = $Total_FirstPayment;
    $data['Installment'] = $Installment;



    $checkStatus_Payslip = $this->Model_HomeInsurance->checkStatus_Payslip($Username,$PROSPECT_LIST_ID); 
    $data['checkStatus_Payslip'] = $checkStatus_Payslip[0]->StatusButton;


    $this->load->view('Check_buy/SubWork_Notification/table_bill',$data);
   }


}
