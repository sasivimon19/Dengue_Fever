<?php  defined('BASEPATH') OR exit('No direct script access allowed');
 class Model_HomeInsurance extends CI_Model{
	function __construct(){
		parent::__construct();
	}

 
    function _checklogin($Username,$Password) {
        $query1 = "SELECT *  FROM  [Jmtib].[dbo].[USERNAME] WHERE UserName = LTRIM(RTRIM('$Username')) AND  Password = LTRIM(RTRIM('$Password')) AND Status = 'ACTIVE' AND (LevelEmp = 'INDY'  Or LevelEmp = 'ADMIN' or LevelEmp = 'USER' AND DEPARTMENT = 'DS01' OR  DEPARTMENT = 'DS02')";
        return $this->db->query($query1)->result();
    }
    
    public function Current_date() {
        $query = "SELECT convert(smalldatetime,GETDATE()) AS Currentdate";
        return $this->db->query($query)->result();
    }
    
    //  insent log login user
    public function insent_login_status($Username, $Password, $date_Login,$IP_Address,$AgentSERVER) {
        $query = "INSERT INTO [Jmtib].[dbo].[Log_Login_Carinsurance]
        (Username,Password,date_Login,IP_address,Windows,Status_Loglogin)     
        VALUES ('" . $Username . "',
		'" . $Password . "',
		'" . $date_Login . "',
		'" . $IP_Address . "',
                '" . $AgentSERVER . "',
		'1')";
        $this->db->query($query);
    }

    function GET_Log_Login($IP_Address) {
        $query1 = "SELECT *  FROM  [Jmtib].[dbo].[Log_Login_Carinsurance] where IP_address = '$IP_Address' AND Status_Loglogin = '1'";
        return $this->db->query($query1)->result();
    }
    
    function Update_Log_Login($IP_Address) {
        $query = "UPDATE [Jmtib].[dbo].[Log_Login_Carinsurance]
                  SET Status_Loglogin = '0'
                  WHERE IP_Address = '$IP_Address'";
        $this->db->query($query);
    }
    
    function Update_date_Logout($Username,$IP_Address,$date_Login) {
        $query = "UPDATE [Jmtib].[dbo].[Log_Login_Carinsurance]  SET date_Logout = '$date_Login',Status_Loglogin = '0'
         WHERE  Username = '$Username' AND date_Login = (SELECT  MAX(date_Login)FROM [Jmtib].[dbo].[Log_Login_Carinsurance] 
         WHERE  Username = '$Username'  AND IP_Address = '$IP_Address' AND date_Logout IS NULL)
         AND date_Logout IS NULL";
        $this->db->query($query);
    }

    
    // sclect ยี่ห้อรถยนต์  
    function Get_Brandcar() {
        $query = "SELECT * FROM [Jmtib].[dbo].[TBL_CarBrand]";
        return $this->db->query($query)->result();
    }

    // sclect ยี่ห้อรถยนต์  
    function Get_CarModel($car_brand) {
        $query = "  SELECT CarModel FROM [Jmtib].[dbo].[TBL_Car_Information] where CarBrand = '$car_brand' GROUP BY CarModel";
        return $this->db->query($query)->result();
    }

    function Get_YearCar($Car_modil) {
        $query = "SELECT CarYear FROM [Jmtib].[dbo].[TBL_Car_Information] where CarModel = '$Car_modil' GROUP BY CarYear";
        return $this->db->query($query)->result();
    }
	function Get_Car($where) {
        $query = "SELECT * FROM [Jmtib].[dbo].[TBL_Car_Information] where  Code_Car IS NOT NULL $where";
        return $this->db->query($query)->result();
    }
    function Get_Type_Car() {
        $query = "SELECT * FROM [Jmtib].[dbo].[cartype]";
        return $this->db->query($query)->result();
    }

   public function InsertResult($prefix_Insurance, $NameCustomers, $LastCustomers, $PhoneCustomers, $ID_cardnumber, $CarBrand,
       $CarDesc,$CODECAR, $CarFamilyDesc, $CarYear, $CarLicensePlate, $CarLicensePlateProvince, $Moredetails,$Username,$Namecompany,$Insurance_price,$Type_ID,$Insurance_price_total) {

        $query = "EXEC [Jmtib].[dbo].[SP_APP_TBL_PROSPECT_LIST] '$prefix_Insurance','$NameCustomers','$LastCustomers','$PhoneCustomers','$ID_cardnumber',
         '$CarBrand','$CarDesc','$CODECAR','$CarFamilyDesc','$CarYear','$CarLicensePlate','$CarLicensePlateProvince','$Moredetails','$Username','$Namecompany','$Insurance_price','$Type_ID','$Insurance_price_total'";
		$this->db->query($query);
    }

  public function InsertResult_JOBALERT($PROSPECTLISTID, $Username, $prefix_Insurance, $NameCustomers,
       $LastCustomers, $ID_cardnumber,$PhoneCustomers, $Birthday, $Age, $CarBrand, $CarDesc, $CarYear, $InsuranceType,
       $CarLicensePlate, $CarLicensePlateProvince, $AKON, $TAX, $PaymentType,$Money_Contract,$Namecompany,$TypeOfInsure,
       $Insurance_price,$Insurance_price_total) {

        $query = "EXEC [Jmtib].[dbo].[SP_ADD_JOBALERT_APP] '$PROSPECTLISTID','$Username','$prefix_Insurance','$NameCustomers','$LastCustomers',
	'$ID_cardnumber','$PhoneCustomers','$Birthday','$Age','$CarBrand','$CarDesc','$CarYear','$InsuranceType','$CarLicensePlate',
        '$CarLicensePlateProvince','$AKON','$TAX','$PaymentType','$Money_Contract','$Namecompany','$TypeOfInsure',
        '$Insurance_price','$Insurance_price_total'";

        $this->db->query($query);
  }

    public function InsertResult_TELESALES_WORK($Prospect_list_id,$Username) {

        $query = "EXEC  [Jmtib].[dbo].[SP_TBL_TELESALES_WORK_NEW] 'ADD','ADD_ALL','$Prospect_list_id','$Username'";

        $this->db->query($query);
    }
    
    public function Insert_PROSPECT_Middle($Middle_ID,$Prospect_list_id,$Username) {

        $query = "EXEC [Jmtib].[dbo].[SP_ADD_PROSPECT_Middle] '$Middle_ID','$Prospect_list_id','$Username'";

        $this->db->query($query);
    }
	
    
    public function Select_Detail_Car($car_brand, $Car_modil, $CODE, $YearGroup) {

        $query = "EXEC [Jmtib].[dbo].[SP_Get_Detail_CarInsurance1_mb] '$car_brand','$Car_modil','$CODE','$YearGroup'";
        
        return $this->db->query($query)->result();
    }
 
    
    
     public function Select_TRANS_ACTION($whereUsername,$start,$pageend) {

        $query = "SELECT * FROM (SELECT ROW_NUMBER () OVER(ORDER BY b.DATE_FOLLOW DESC) AS row, 
            a.TransID as Ref,b.DATE_FOLLOW,b.RESULT,c.TELESALE_GROUPDESC,CreateEmp,e.EMP + ' : ' + d.FirstName AS NameEmp
            ,a.CustomerIDCard from TBL_TRANSACTION a inner join TBL_TELESALE_RESULT b
            on a.Prospect_list_id = b.PROSPECT_LIST_ID inner join TBL_TELESALE_RESULT_GROUPDEBT c
            on b.TELESALE_GROUPDEBT = c.TELESALE_GROUPDEBT inner join USERNAME d
            on b.EMP = d.Username inner join TBL_TELESALE_WORK e
            on a.Prospect_list_id = e.PROSPECT_LIST_ID
            $whereUsername ) AA WHERE   AA.row > '$start' And AA.row <= '$pageend'";

        return $this->db->query($query)->result();
    }
    
    
     public function Count_TRANS_ACTION($whereUsername) {

        $query = "SELECT COUNT(AA.Ref) AS Count FROM 
            (select a.TransID as Ref,b.DATE_FOLLOW,b.RESULT,c.TELESALE_GROUPDESC,CreateEmp,e.EMP + ' : ' + d.FirstName AS NameEmp
            ,a.CustomerIDCard from TBL_TRANSACTION a inner join TBL_TELESALE_RESULT b
            on a.Prospect_list_id = b.PROSPECT_LIST_ID inner join TBL_TELESALE_RESULT_GROUPDEBT c
            on b.TELESALE_GROUPDEBT = c.TELESALE_GROUPDEBT inner join USERNAME d
            on b.EMP = d.Username inner join TBL_TELESALE_WORK e
            on a.Prospect_list_id = e.PROSPECT_LIST_ID $whereUsername ) AA";

        return $this->db->query($query)->result();
    }

    
   public function Count_Customer_Action($whereUsernameCustomer) {

        $query = "SELECT COUNT(AA.Ref) AS Count FROM (
                select TransID as Ref,CustomerInt,CustomerFirstname,CustomerIDCard
                CustomerLastname,ClaimReceiveNo
                ClaimReceiveDate,PolicyNo,PolicyDate
                from TBL_TRANSACTION
                $whereUsernameCustomer )AA ";

        return $this->db->query($query)->result();
    }
    
       public function Select_Customer_Action($whereUsernameCustomer,$start,$pageend) {

        $query = "SELECT * FROM (SELECT ROW_NUMBER () OVER(ORDER BY ClaimReceiveDate DESC) AS row,
                TransID as Ref,CustomerInt,CustomerFirstname,CustomerIDCard,
                CustomerLastname,ClaimReceiveNo,
                ClaimReceiveDate,PolicyNo,PolicyDate from TBL_TRANSACTION
                $whereUsernameCustomer )AA  WHERE  AA.row > '$start' And AA.row <= '$pageend' ";

        return $this->db->query($query)->result();
    }

    public function Show_Customers_Interested($Username) {
        $query = "SELECT A.PROSPECT_LIST_ID,A.IDCard,A.CustomeTel1,A.Insurance_price,
            A.Insurance_price_total,A.TypeInsurance,A.Type_Customer,A.Namecompany,A.SaveDate
              ,B.[TransID]
              ,B.[TransactionID]
              ,B.[Prospect_list_id]
              ,B.[QuotationNo]
              ,B.[CreateEmp]
              ,B.[CustomerInt]
              ,B.[CustomerFirstname]
              ,B.[CustomerLastname]
              ,B.[CustomerIDCard]
              ,B.[BirthDate]
              ,B.[Age]
              ,B.[NameDriver1]
              ,B.[LastNameDriver1]
              ,B.[Birthday_Driver1]
              ,B.[Age_Driver1]
              ,B.[Number_Driver1]
              ,B.[NameDriver2]
              ,B.[LastNameDriver2]
              ,B.[Birthday_Driver2]
              ,B.[Age_Driver2]
              ,B.[Number_Driver2]
              ,B.[CustomerHomeTel]
              ,B.[CustomerOfficeTel]
              ,B.[CustomerMobileTel]
              ,B.[CustomerAddr_Doc]
              ,B.[CustomerMoo_Doc]
              ,B.[CustomerName_Village_Doc]
              ,B.[CustomerSoi_Doc]
              ,B.[CustomerRoad_Doc]
              ,B.[CustomerDistrict_Doc]
              ,B.[CustomerZip_Doc]
              ,B.[CustomerAddr_Policy]
              ,B.[CustomerMoo_Policy]
              ,B.[CustomerName_Village_Policy]
              ,B.[CustomerSoi_Policy]
              ,B.[CustomerRoad_Policy]
              ,B.[CustomerDistrict_Policy]
              ,B.[CustomerZip_Policy]
              ,B.[Customer_NameOffice]
              ,B.[Contact_Customer]
              ,B.[StartCoverDate]
              ,B.[EndCoverDate]
              ,B.[StartCoverDate_Act]
              ,B.[EndCoverDate_Act]
              ,B.[CarBrand]
              ,B.[CarModel]
              ,B.[CarFamilyDesc]
              ,B.[CarYear]
              ,B.[CarLicensePlate]
              ,B.[CarLicensePlateProvince]
              ,B.[CC]
              ,B.[Car_Seat]
              ,B.[Car_Weight]
              ,B.[Accessory]
              ,B.[Price_Accessory]
              ,B.[VehicleKey]
              ,B.[CarType]
              ,B.[ChasisNo]
              ,B.[EngineNo]
              ,B.[Type_Protection]
              ,B.[Insurance_Company]
              ,B.[TypeOfInsure]
              ,B.[Net_premium]
              ,B.[Total_Premium]
              ,B.[TypeDiscount]
              ,B.[Discount_Percent]
              ,B.[Discount_Premium]
              ,B.[Discount_Percent_Premium]
              ,B.[Net_Discount_Premium]
              ,B.[Garage]
              ,B.[CarProtection]
              ,B.[DeDuctible]
              ,B.[LossProtection]
              ,B.[ExternalProtectionLife_Person]
              ,B.[ExternalProtectionLife_Time]
              ,B.[ExternalProtectionAsset]
              ,B.[PA_DRIVER_PASSENGER]
              ,B.[PA_DRIVER]
              ,B.[PA_PASSENGER]
              ,B.[PA_NUMBER]
              ,B.[ME]
              ,B.[BB]
              ,B.[AKON]
              ,B.[TAX]
              ,B.[ClaimReceiveNo]
              ,B.[ClaimReceiveDate]
              ,B.[PolicyNo]
              ,B.[PolicyDate]
              ,B.[PolicyEMS]
              ,B.[PolicySendDate]
              ,B.[CopyPolicySendDate]
              ,B.[PolicySendType]
              ,B.[PolicyCustDate]
              ,B.[Branch_Code]
              ,B.[TELESALE]
              ,B.[SOURCE_LIST]
              ,B.[TransStatus]
              ,B.[ManagerApprove]
              ,B.[CreateDate]
              ,B.[ModifyEmp]
              ,B.[ModifyDate]
              ,B.[Remark]
              ,B.[PaymentType]
              ,B.[PeriodNumber]
              ,B.[TypeDown]
              ,B.[Down_Percent]
              ,B.[Down]
              ,B.[Charge]
              ,B.[Due]
              ,B.[Installment]
              ,B.[Total_FirstPayment]
              ,B.[Customer_Payment]
              ,B.[Bank]
              ,B.[Date_Payment]
              ,B.[Number_Credit]
              ,B.[Number_Ref]
              ,B.[Insurance_Company_Act]
              ,B.[Net_premium_Act]
              ,B.[AKON_Act]
              ,B.[TAX_Act]
              ,B.[Total_Premium_Act]
              ,B.[TypeDiscount_Act]
              ,B.[Premium_Act]
              ,B.[Percent_Act]
              ,B.[Discount_Act]
              ,B.[Net_Total_Premium_Act]
              ,B.[Net_Total]
              ,B.[Money_Contract]
              ,B.[Status_Approve]
              ,B.[Status_Account]
              ,B.[Pay_Insurance]
              ,B.[Pay_ActInsuance]
              ,B.[Emp_Pay_Insurance]
              ,B.[Emp_Pay_ActInsurance]
              ,B.[Date_Pay_Insurance]
              ,B.[Date_Pay_ActInsurance]
              ,B.[Status_Admin]
              ,I.Auto_ID,I.Insure_Code_Company,I.Insure_Company
              ,N.ID_Type_Auto,N.[Type_ID],N.[Type_Name]  
              ,TE.TELESALES_STATUS
              ,TE.TELESALES_GROUPDEBT 
,(CASE WHEN TE.TELESALES_STATUS = 'NEW' AND TE.TELESALES_GROUPDEBT IS NULL AND B.TransStatus='NEW' AND B.TransactionID IS NULL AND B.Status_Admin='NEW' THEN '1' --รออนุมัติเครดิต
WHEN TE.TELESALES_STATUS = 'NEW' AND TE.TELESALES_GROUPDEBT IS NULL AND B.TransStatus='NEW' AND B.TransactionID IS NULL AND B.Status_Admin='REJECT' THEN '2' --ไม่อนุมัติเครดิต
WHEN TE.TELESALES_STATUS = 'NEW' AND TE.TELESALES_GROUPDEBT IS NULL AND B.TransStatus='NEW' AND B.TransactionID IS NULL AND B.Status_Admin='APPROVE' THEN '3' --แจ้งงานสีส้ม
WHEN TE.TELESALES_STATUS = 'NEW' AND TE.TELESALES_GROUPDEBT IS NULL AND B.TransStatus='NEW' AND B.TransactionID IS NOT  NULL THEN '4' --แจ้งงานสีเขียว
WHEN TE.TELESALES_STATUS = 'WAIT' AND TE.TELESALES_GROUPDEBT='RS0016' AND B.TransStatus='pending' AND B.TransactionID IS NOT  NULL THEN '5' --รอตรวจสอบข้อมูล
WHEN TE.TELESALES_STATUS = 'WAIT' AND TE.TELESALES_GROUPDEBT='RS0016' AND B.TransStatus='A' AND B.TransactionID IS NOT NULL THEN '6' --รอแจ้งบริษัทประกัน
WHEN TE.TELESALES_STATUS = 'WAIT' AND TE.TELESALES_GROUPDEBT='RS0017' AND B.TransStatus='A' AND B.TransactionID IS NOT NULL THEN '7' --แจ้งบริษัทประกันแล้ว
WHEN TE.TELESALES_STATUS = 'WAIT' AND TE.TELESALES_GROUPDEBT='RS0016' AND B.TransStatus='REJECT' AND B.TransactionID IS NOT NULL THEN '8' --ข้อมูลไม่สมบูรณ์ 
 
END) AS StatusButton
FROM  [Jmtib].[dbo].[TBL_PROSPECT_LIST] A  
INNER JOIN [Jmtib].[dbo].[TBL_JOB_ALERT] B ON  A.PROSPECT_LIST_ID = B.Prospect_list_id 
LEFT JOIN  [Jmtib].[dbo].[TBL_TELESALE_WORK] TE ON  A.PROSPECT_LIST_ID = TE.PROSPECT_LIST_ID
LEFT JOIN [Jmtib].[dbo].[tb_InsureCompany] I ON A.Namecompany = I.Insure_Code_Company
LEFT JOIN  [Jmtib].[dbo].[TBL_InsuranceType] N ON A.Type_ID = N.ID_Type_Auto
where B.CreateEmp = '$Username' ORDER BY  A.SaveDate  DESC";

        return $this->db->query($query)->result();
    }
    public function Count_Show_Customers_Interested($Username){
      $query="SELECT COUNT(IDCard) AS 'Count' FROM [Jmtib].[dbo].[TBL_PROSPECT_LIST] A
                INNER JOIN [Jmtib].[dbo].[TBL_JOB_ALERT] B ON A.PROSPECT_LIST_ID = B.Prospect_list_id
                INNER JOIN [Jmtib].[dbo].[tb_InsureCompany] I ON A.Namecompany = I.Insure_Code_Company
                INNER JOIN  [Jmtib].[dbo].[TBL_InsuranceType] N ON A.Type_ID = N.ID_Type_Auto
                where  CreateEmp = '$Username'";
            return $this->db->query($query)->result();
    }
    
    public function PROSPECT_LIST_ID($NameUser, $PROSPECT_LIST_ID) {
        $query = "SELECT * FROM [Jmtib].[dbo].[TBL_PROSPECT_LIST] 
        WHERE Save_By = '$NameUser' AND PROSPECT_LIST_ID = '$PROSPECT_LIST_ID'";
        return $this->db->query($query)->result();
    }
	
	public function GETPROSPECTLISTID($Username, $ID_cardnumber) {

        $query = "SELECT * FROM [Jmtib].[dbo].[TBL_PROSPECT_LIST] 
        WHERE Save_By = '$Username' AND IDCard = '$ID_cardnumber'";

        return $this->db->query($query)->result();
    }
	
	public function GETJOBALERT($Username,$ID_cardnumber,$PROSPECTLISTID){
        $query = "SELECT *  FROM [Jmtib].[dbo].[TBL_JOB_ALERT]
        WHERE CreateEmp = '$Username' AND CustomerIDCard = '$ID_cardnumber' AND Prospect_list_id = '$PROSPECTLISTID'";
        
         return $this->db->query($query)->result();
    }

    //    update status เข้า login 
    public function Update_status($Status_Log, $AutoID) {
        $query = "UPDATE [Jmtib].[dbo].[USERNAME]
                  SET Status_Log = '$Status_Log'
                  WHERE AutoID = '$AutoID'";
        $this->db->query($query);
    }
    
     public function Check_IDcard($IDcard) {

        $query = "select [dbo].[chk_format_IDcard]('$IDcard') AS IDcard ";

        return $this->db->query($query)->result();
    }
    
    public function SelectEnginecc() {
        
        $query = " SELECT [EngineCC] FROM [Jmtib].[dbo].[TBL_Car_Information] GROUP BY EngineCC ORDER BY EngineCC ASC";
        
        return $this->db->query($query)->result();
    }

    public function PROVINCE() {
        $query = "SELECT * FROM [Jmtib].[dbo].[TBL_PROVINCE]";
        return $this->db->query($query)->result();
    }

    //AMPHUR WHERE ID ของ PROVINCE(จังหวัด)
    public function AMPHUR($PROVINCE_ID) {
        $query = "SELECT * FROM [Jmtib].[dbo].[TBL_AMPHUR] WHERE PROVINCE_ID = '$PROVINCE_ID' ";
        return $this->db->query($query)->result();
    }

    //ตำบล where ด้วย ID ของ AMPHUR
    public function DISTRICTNAME($AMPHUR_ID) {
        $query = "SELECT * FROM [Jmtib].[dbo].[TBL_DISTRICT]  WHERE AMPHUR_ID = '$AMPHUR_ID'";
        return $this->db->query($query)->result();
    }
    
     function DetailCoverage1() {
        $query1 = "SELECT [DetailCoverage1] FROM [Jmtib].[dbo].[TBL_CarCoverage] GROUP BY [DetailCoverage1]";
        return $this->db->query($query1)->result();
    }

//    select Type_db 
    public function searching_Premium($car_brand, $Car_modil, $YearGroup) {
        $query = "SELECT A.CODE,D.TYPENAME FROM [Jmtib].[dbo].[TBL_MiddleCarInsurance] A
                INNER JOIN [Jmtib].[dbo].[TBL_Car_Information]  B ON A.Code_Car = B.Code_Car
                LEFT JOIN [Jmtib].[dbo].[cartype] D ON A.CODE = D.CODE 
                where B.CarBrand = '$car_brand' AND B.CarModel = '$Car_modil' AND B.CarYear = '$YearGroup' 
                GROUP BY A.CODE,D.TYPENAME";

        return $this->db->query($query)->result();
    }
	
	
	public function GET_FirstPayment($Username,$CustomerIDCard,$PROSPECT_LIST_ID) {
        $query = "SELECT A.PROSPECT_LIST_ID,A.IDCard,A.CustomeTel1,A.Insurance_price, A.Insurance_price_total,
		A.TypeInsurance,A.Type_Customer,A.Namecompany,A.SaveDate,A.REMARK
                ,B.[TransID]
                ,B.[TransactionID]
                ,B.[Prospect_list_id]
                ,B.[Total_FirstPayment]
                ,B.[QuotationNo]
                ,B.[CreateEmp]
                ,B.[CustomerInt]
                ,B.[CustomerFirstname]
                ,B.[CustomerLastname]
                ,B.[CustomerIDCard]
                ,B.[Status_Admin]
                ,B.[PaymentType]
                ,B.Installment
                ,I.Auto_ID,I.Insure_Code_Company,I.Insure_Company
                ,N.ID_Type_Auto,N.[Type_ID],N.[Type_Name]
                ,[jmtib].dbo.convert_text(B.Total_FirstPayment) AS TextbathDebt_balance
                FROM [Jmtib].[dbo].[TBL_PROSPECT_LIST] A
                INNER JOIN [Jmtib].[dbo].[TBL_JOB_ALERT] B ON A.PROSPECT_LIST_ID = B.Prospect_list_id
                INNER JOIN [Jmtib].[dbo].[tb_InsureCompany] I ON A.Namecompany = I.Insure_Code_Company
		INNER JOIN  [Jmtib].[dbo].[TBL_InsuranceType] N ON A.Type_ID = N.ID_Type_Auto
                  where B.CreateEmp = '$Username' AND A.IDCard = '$CustomerIDCard' AND A.PROSPECT_LIST_ID = '$PROSPECT_LIST_ID'";
        return $this->db->query($query)->result();
    }

    
    public function GET_TYPECAR($Where) { //แก้แล้ว หน้าเช็คประกัน
        $query = "SELECT A.CODE,A.Insurance_price,A.DetailCoverage1,A.Insurance_price_total,A.[Akon]
                ,A.[Discount_price_cctv],A.[Tax],B.CarBrand,B.CarModel,B.CarYear,B.EngineCC
                ,C.[HeadCoverage1]
                ,C.[HeadCoverage2]
                ,C.[HeadCoverage3]
                ,C.[HeadCoverage4]
                ,C.[HeadCoverage5]
                ,C.[HeadCoverage6]
                ,C.[HeadCoverage7]
                ,C.[HeadCoverage8]
                ,C.[HeadCoverage9]
                ,C.[HeadCoverage10]
                ,C.[DetailCoverage1]
                ,C.[DetailCoverage2]
                ,C.[DetailCoverage3]
                ,C.[DetailCoverage4]
                ,C.[DetailCoverage5]
                ,C.[DetailCoverage6]
                ,C.[DetailCoverage7]
                ,C.[DetailCoverage8]
                ,C.[DetailCoverage9]
                ,C.[DetailCoverage10]
                ,C.[Net_Insurance]
                ,C.[Status_Coverage]
                ,D.IDPackage,D.NamePackage
                ,U.Insure_Code_Company,U.Insure_Company
                ,L.[Type_Name],L.ID_Type_Auto,Type_ID
                ,E.CODE,E.TYPENAME
		,U.img
		,A.Middle_ID
		,A.Code_Car
		,A.ID_CoverRate		
                FROM [Jmtib].[dbo].[TBL_MiddleCarInsurance] A
                INNER JOIN [Jmtib].[dbo].[TBL_Car_Information]  B ON A.Code_Car = B.Code_Car
                INNER JOIN [Jmtib].[dbo].[TBL_CarCoverage] C ON A.ID_CoverRate = C.ID_CoverRate
                INNER JOIN [Jmtib].[dbo].[TBL_CarPackage] D ON A.IDPackage = D.IDPackage
                INNER JOIN [Jmtib].[dbo].[tb_InsureCompany] U ON A.Insure_Code_Company = U.Auto_ID
                INNER JOIN [Jmtib].[dbo].[TBL_InsuranceType] L ON A.ID_Type_Auto = L.ID_Type_Auto
                INNER JOIN [Jmtib].[dbo].[cartype] E ON A.CODE = E.CODE
		where Insurance_price_total IS not null	$Where	 	
		ORDER BY L.ID_Type_Auto";
        return $this->db->query($query)->result();
    }
    
    
    
    public function GET_DetailsCAR($car_brand,$Car_modil,$YearGroup,$CODE,$Insurance_price_total,$Net_Insurance) { //รายละเอียประกหัน น่าจะไม่ได้ใช้
        $query = "SELECT A.CODE,A.Insurance_price,A.DetailCoverage1,A.Insurance_price_total,A.[Akon]
               ,A.[Discount_price_cctv],A.[Tax],B.CarBrand,B.CarModel,B.CarYear,B.EngineCC
                ,C.[HeadCoverage1]
                ,C.[HeadCoverage2]
                ,C.[HeadCoverage3]
                ,C.[HeadCoverage4]
                ,C.[HeadCoverage5]
                ,C.[HeadCoverage6]
                ,C.[HeadCoverage7]
                ,C.[HeadCoverage8]
                ,C.[HeadCoverage9]
                ,C.[DetailCoverage1]
                ,C.[DetailCoverage2]
                ,C.[DetailCoverage3]
                ,C.[DetailCoverage4]
                ,C.[DetailCoverage5]
                ,C.[DetailCoverage6]
                ,C.[DetailCoverage7]
                ,C.[DetailCoverage8]
                ,C.[DetailCoverage9]
                ,C.[Net_Insurance]
                ,C.[Status_Coverage]
                ,C.[Remark]
                ,D.IDPackage,D.NamePackage
                ,U.Insure_Code_Company,U.Insure_Company
                ,L.[Type_Name],L.ID_Type_Auto
                ,E.CODE,E.TYPENAME
                FROM [Jmtib].[dbo].[TBL_MiddleCarInsurance] A
                INNER JOIN [Jmtib].[dbo].[TBL_Car_Information]  B ON A.Code_Car = B.Code_Car
                INNER JOIN [Jmtib].[dbo].[TBL_CarCoverage] C ON A.ID_CoverRate = C.ID_CoverRate
                INNER JOIN [Jmtib].[dbo].[TBL_CarPackage] D ON A.IDPackage = D.IDPackage
                INNER JOIN [Jmtib].[dbo].[tb_InsureCompany] U ON A.Insure_Code_Company = U.Auto_ID
                INNER JOIN [Jmtib].[dbo].[TBL_InsuranceType] L ON A.ID_Type_Auto = L.ID_Type_Auto
                INNER JOIN [Jmtib].[dbo].[cartype] E ON A.CODE = E.CODE
            where B.CarBrand = '$car_brand' AND B.CarModel = '$Car_modil' AND B.CarYear = '$YearGroup' AND A.CODE = '$CODE'
             AND A.Insurance_price_total ='$Insurance_price_total' AND Net_Insurance = '$Net_Insurance'
            Group by A.CODE,A.Insurance_price,A.DetailCoverage1,A.Insurance_price_total,A.[Akon]
                          ,A.[Discount_price_cctv],A.[Tax],B.CarBrand,B.CarModel,B.CarYear,B.EngineCC
			  ,C.[HeadCoverage1]
			  ,C.[HeadCoverage2]
			  ,C.[HeadCoverage3]
			  ,C.[HeadCoverage4]
			  ,C.[HeadCoverage5]
			  ,C.[HeadCoverage6]
			  ,C.[HeadCoverage7]
			  ,C.[HeadCoverage8]
			  ,C.[HeadCoverage9]
                          ,C.[HeadCoverage10]
			  ,C.[DetailCoverage1]
			  ,C.[DetailCoverage2]
			  ,C.[DetailCoverage3]
			  ,C.[DetailCoverage4]
			  ,C.[DetailCoverage5]
			  ,C.[DetailCoverage6]
			  ,C.[DetailCoverage7]
			  ,C.[DetailCoverage8]
			  ,C.[DetailCoverage9]
                          ,C.[DetailCoverage10]
			  ,C.[Net_Insurance]
			  ,C.[Status_Coverage]
			  ,C.[Remark]
              ,D.IDPackage,D.NamePackage
			  ,U.Insure_Code_Company,U.Insure_Company
			  ,L.[Type_Name],L.ID_Type_Auto
			  ,E.TYPENAME,E.CODE ORDER BY L.ID_Type_Auto";
        return $this->db->query($query)->result();
    }
    
    
        public function Find_out_more($car_brand, $Car_modil, $YearGroup, $CODE, $where, $whereLength, $whereLengthcompany) {
        $query = "SELECT A.CODE,A.Insurance_price,A.DetailCoverage1,A.Insurance_price_total,A.[Akon]
                ,A.[Discount_price_cctv],A.[Tax],B.CarBrand,B.CarModel,B.CarYear,B.EngineCC
                ,C.[HeadCoverage1]
                ,C.[HeadCoverage2]
                ,C.[HeadCoverage3]
                ,C.[HeadCoverage4]
                ,C.[HeadCoverage5]
                ,C.[HeadCoverage6]
                ,C.[HeadCoverage7]
                ,C.[HeadCoverage8]
                ,C.[HeadCoverage9]
                ,C.[DetailCoverage1]
                ,C.[DetailCoverage2]
                ,C.[DetailCoverage3]
                ,C.[DetailCoverage4]
                ,C.[DetailCoverage5]
                ,C.[DetailCoverage6]
                ,C.[DetailCoverage7]
                ,C.[DetailCoverage8]
                ,C.[DetailCoverage9]
                ,C.[Net_Insurance]
                ,C.[Status_Coverage]
                ,C.[Remark]
                ,D.IDPackage,D.NamePackage
                ,U.Insure_Code_Company,U.Insure_Company
                ,L.[Type_Name],L.ID_Type_Auto
                ,E.CODE,E.TYPENAME
                FROM [Jmtib].[dbo].[TBL_MiddleCarInsurance] A
                INNER JOIN [Jmtib].[dbo].[TBL_Car_Information]  B ON A.Code_Car = B.Code_Car
                INNER JOIN [Jmtib].[dbo].[TBL_CarCoverage] C ON A.ID_CoverRate = C.ID_CoverRate
                INNER JOIN [Jmtib].[dbo].[TBL_CarPackage] D ON A.IDPackage = D.IDPackage
                INNER JOIN [Jmtib].[dbo].[tb_InsureCompany] U ON A.Insure_Code_Company = U.Auto_ID
                INNER JOIN [Jmtib].[dbo].[TBL_InsuranceType] L ON A.ID_Type_Auto = L.ID_Type_Auto
                INNER JOIN [Jmtib].[dbo].[cartype] E ON A.CODE = E.CODE
                WHERE B.CarBrand = '$car_brand'
		AND B.CarModel = '$Car_modil'
                AND A.CODE = '$CODE'    
		AND B.CarYear = '$YearGroup'
                        $where
                        $whereLength
                        $whereLengthcompany  
                        GROUP BY 
                           A.CODE,A.Insurance_price,A.DetailCoverage1,A.Insurance_price_total,A.[Akon]
                           ,A.[Discount_price_cctv],A.[Tax],B.CarBrand,B.CarModel,B.CarYear,B.EngineCC
			  ,C.[HeadCoverage1]
			  ,C.[HeadCoverage2]
			  ,C.[HeadCoverage3]
			  ,C.[HeadCoverage4]
			  ,C.[HeadCoverage5]
			  ,C.[HeadCoverage6]
			  ,C.[HeadCoverage7]
			  ,C.[HeadCoverage8]
			  ,C.[HeadCoverage9]
			  ,C.[DetailCoverage1]
			  ,C.[DetailCoverage2]
			  ,C.[DetailCoverage3]
			  ,C.[DetailCoverage4]
			  ,C.[DetailCoverage5]
			  ,C.[DetailCoverage6]
			  ,C.[DetailCoverage7]
			  ,C.[DetailCoverage8]
			  ,C.[DetailCoverage9]
			  ,C.[Net_Insurance]
			  ,C.[Status_Coverage]
			  ,C.[Remark]
                          ,D.IDPackage,D.NamePackage
			  ,U.Insure_Code_Company,U.Insure_Company
			  ,L.[Type_Name],L.ID_Type_Auto
			  ,E.TYPENAME,E.CODE 
                          ORDER BY L.ID_Type_Auto ";
        return $this->db->query($query)->result();
    }
    
      public function Comparison_MOdels($car_brand, $Car_modil, $YearGroup, $MakeDescription, $CODE, $whereLengthvehicle) {
        $query = "select *,
(select TOP 1  Down_payment from [Jmtib].[dbo].[TBL_Insurance_Installments] where ID_Type_Auto = AA.ID_Type_Auto and Insure_Code_Company=AA.Insure_Code_Company) AS Down_payment,
(select TOP 1  Max_installment from [Jmtib].[dbo].[TBL_Insurance_Installments] where ID_Type_Auto = AA.ID_Type_Auto and Insure_Code_Company=AA.Insure_Code_Company) AS Max_installment
 from(
SELECT A.Insurance_price,A.Insurance_price_total,A.[Akon]
                ,A.[Discount_price_cctv],A.[Tax],B.CarBrand,B.CarModel,B.CarYear,B.EngineCC
                ,C.[HeadCoverage1]
                ,C.[HeadCoverage2]
                ,C.[HeadCoverage3]
                ,C.[HeadCoverage4]
                ,C.[HeadCoverage5]
                ,C.[HeadCoverage6]
                ,C.[HeadCoverage7]
                ,C.[HeadCoverage8]
                ,C.[HeadCoverage9]
                ,C.[HeadCoverage10]
                ,C.[DetailCoverage1]
                ,C.[DetailCoverage2]
                ,C.[DetailCoverage3]
                ,C.[DetailCoverage4]
                ,C.[DetailCoverage5]
                ,C.[DetailCoverage6]
                ,C.[DetailCoverage7]
                ,C.[DetailCoverage8]
                ,C.[DetailCoverage9]
                ,C.[DetailCoverage10]
                ,C.[Net_Insurance]
                ,C.[Status_Coverage]
                ,D.IDPackage,D.NamePackage
                ,U.Insure_Code_Company,U.Insure_Company
                ,L.[Type_Name],L.ID_Type_Auto
                ,E.CODE,E.TYPENAME
                ,U.img
                ,A.Middle_ID
                ,A.Code_Car
                ,A.ID_CoverRate  
                FROM [Jmtib].[dbo].[TBL_MiddleCarInsurance] A
                INNER JOIN [Jmtib].[dbo].[TBL_Car_Information]  B ON A.Code_Car = B.Code_Car
                INNER JOIN [Jmtib].[dbo].[TBL_CarCoverage] C ON A.ID_CoverRate = C.ID_CoverRate
                INNER JOIN [Jmtib].[dbo].[TBL_CarPackage] D ON A.IDPackage = D.IDPackage
                INNER JOIN [Jmtib].[dbo].[tb_InsureCompany] U ON A.Insure_Code_Company = U.Auto_ID
                INNER JOIN [Jmtib].[dbo].[TBL_InsuranceType] L ON A.ID_Type_Auto = L.ID_Type_Auto
                INNER JOIN [Jmtib].[dbo].[cartype] E ON A.CODE = E.CODE
            where B.CarBrand = '$car_brand' AND B.CarModel = '$Car_modil' AND B.CarYear = '$YearGroup' AND A.CODE = '$CODE'
            AND B.MakeDescription='$MakeDescription' 
            $whereLengthvehicle 
            ) AA";

        return $this->db->query($query)->result();
    }

    public function GET_CarCoverage($ID_InsureCode) {
        
        $query = "SELECT  * FROM [Jmtib].[dbo].[TBL_CarCoverage] where ID_InsureCode = '$ID_InsureCode' AND HeadCoverage = '1' ";
        
        return $this->db->query($query)->result();
    }
	public function insertAA($dataArr){

        $query = "EXEC [Jmtib].[dbo].[SP_TBL_TRANSACTION_NEW] 
        '".$dataArr['OPT']."',
        '".$dataArr['SUB_OPT']."',
        '".$dataArr['FDATE']."',
        '".$dataArr['LDATE']."',
        '".$dataArr['TranID']."',
        '".$dataArr['Prospect_list_id']."',
        '".$dataArr['QuotationNo']."',
        '".$dataArr['CreateEmp']."',
        '".$dataArr['CustomerInt']."',
        '".$dataArr['CustomerFirstname']."',
        '".$dataArr['CustomerLastname']."',
        '".$dataArr['CustomerIDCard']."',
        '".$dataArr['BirthDate']."',
        '".$dataArr['Age']."',
        '".$dataArr['NameDriver1']."',
        '".$dataArr['LastNameDriver1']."',
        '".$dataArr['Birthday_Driver1']."',
        '".$dataArr['Age_Driver1']."',
        '".$dataArr['Number_Driver1']."',
        '".$dataArr['NameDriver2']."',
        '".$dataArr['LastNameDriver2']."',
        '".$dataArr['Birthday_Driver2']."',
        '".$dataArr['Age_Driver2']."',
        '".$dataArr['Number_Driver2']."',
        '".$dataArr['CustomerHomeTel']."',
        '".$dataArr['CustomerOfficeTel']."',
        '".$dataArr['CustomerMobileTel']."',
        '".$dataArr['CustomerAddr1']."',
        '".$dataArr['CustomerMoo_Doc']."', 
        '".$dataArr['CustomerName_Village_Doc']."',
        '".$dataArr['CustomerSoi_Doc']."',
        '".$dataArr['CustomerRoad_Doc']."',
        '".$dataArr['CustomerDistrict_Doc']."',
        '".$dataArr['CustomerAddr2']."',
        '".$dataArr['CustomerAddr_Policy']."',
        '".$dataArr['CustomerMoo_Policy']."', 
        '".$dataArr['CustomerName_Village_Policy']."',
        '".$dataArr['CustomerSoi_Policy']."',
        '".$dataArr['CustomerRoad_Policy']."',
        '".$dataArr['CustomerDistrict_Policy']."',
        '".$dataArr['CustomerZip']."',
        '".$dataArr['CustomerZip_Policy']."',
        '".$dataArr['Customer_NameOffice']."',
        '".$dataArr['Contact_Customer']."',
        '".$dataArr['StartCoverDate']."',
        '".$dataArr['EndCoverDate']."',
        '".$dataArr['StartCoverDate_Act']."',
        '".$dataArr['EndCoverDate_Act']."',
        '".$dataArr['CarBrand']."',
        '".$dataArr['CarModel']."',
        '".$dataArr['CarFamilyDesc']."',
        '".$dataArr['CarYear']."',
        '".$dataArr['CarLicensePlate']."',
        '".$dataArr['CarLicensePlateProvince']."',
        '".$dataArr['CC']."',
        '".$dataArr['Car_Seat']."',
        '".$dataArr['Car_Weight']."',
        '".$dataArr['Accessory']."',
        '".$dataArr['Price_Accessory']."',
        '".$dataArr['VehicleKey']."',
        '".$dataArr['CarType']."',
        '".$dataArr['ChasisNo']."',
        '".$dataArr['EngineNo']."',
        '".$dataArr['Type_Protection']."',
        '".$dataArr['Insurance_Company']."',
        '".$dataArr['TypeOfInsure']."',
        '".$dataArr['Net_premium']."',
        '".$dataArr['Total_Premium']."',
        '".$dataArr['TypeDiscount']."',
        '".$dataArr['Discount_Percent']."',
        '".$dataArr['Discount_Premium']."',
        '".$dataArr['Discount_Percent_Premium']."',
        '".$dataArr['Net_Discount_Premium']."',
        '".$dataArr['Garage']."',
        '".$dataArr['CarProtection']."',
        '".$dataArr['DeDuctible']."',
        '".$dataArr['LossProtection']."',
        '".$dataArr['ExternalProtectionLife']."',
        '".$dataArr['ExternalProtection']."',
        '".$dataArr['ExternalProtectionLife_Person']."',
        '".$dataArr['ExternalProtectionLife_Time']."',
        '".$dataArr['ExternalProtectionAsset']."',
        '".$dataArr['PA_DRIVER_PASSENGER']."',
        '".$dataArr['PA_DRIVER']."',
        '".$dataArr['PA_PASSENGER']."',
        '".$dataArr['PA_NUMBER']."',
        '".$dataArr['PA_TOTAL']."',
        '".$dataArr['ME']."',
        '".$dataArr['BB']."',
        '".$dataArr['AKON']."',
        '".$dataArr['TAX']."',
        '".$dataArr['ClaimReceiveNo']."',
        '".$dataArr['ClaimReceiveDate']."',
        '".$dataArr['PolicyNo']."',
        '".$dataArr['PolicyDate']."',
        '".$dataArr['PolicyEMS']."',
        '".$dataArr['PolicySendDate']."',
        '".$dataArr['CopyPolicySendDate']."',
        '".$dataArr['PolicySendType']."',
        '".$dataArr['PolicyCustDate']."',
        '".$dataArr['Branch_Code']."',
        '".$dataArr['TELESALE']."',
        '".$dataArr['SOURCE_LIST']."',
        '".$dataArr['TransStatus']."',
        '".$dataArr['CreateDate']."',
        '".$dataArr['ModifyEmp']."',
        '".$dataArr['ModifyDate']."',
        '".$dataArr['Remark']."',
        '".$dataArr['Remark_Transaction']."',
        '".$dataArr['PaymentType']."',
        '".$dataArr['PeriodNumber']."',
        '".$dataArr['TypeDown']."',
        '".$dataArr['Down_Percent']."',
        '".$dataArr['Down']."',
        '".$dataArr['Charge']."',
        '".$dataArr['Due']."',
        '".$dataArr['Installment']."',
        '".$dataArr['Total_FirstPayment']."',
        '".$dataArr['Customer_Payment']."',
        '".$dataArr['Bank']."',
        '".$dataArr['Date_Payment']."',
        '".$dataArr['Number_Credit']."',
        '".$dataArr['Number_Ref']."',
        '".$dataArr['Insurance_Company_Act']."',
        '".$dataArr['Net_premium_Act']."',
        '".$dataArr['AKON_Act']."',
        '".$dataArr['TAX_Act']."',
        '".$dataArr['Total_Premium_Act']."',
        '".$dataArr['Net_Total_Premium']."',
        '".$dataArr['Net_Total']."',
        '".$dataArr['Status']."',
        '".$dataArr['ID']."',
        '".$dataArr['Ret']."',
        '".$dataArr['OUT']."',
        '".$dataArr['TypeDiscount_Act']."',
        '".$dataArr['Premium_Act']."',
        '".$dataArr['Percent_Act']."',
        '".$dataArr['Discount_Act']."',
        '".$dataArr['Net_Total_Premium_Act']."',
        '".$dataArr['Money_Contract']."',
        '".$dataArr['CustomerAddr_Doc']."',
        '".$dataArr['CustomerZip_Doc']."' ";

         return $this->db->query($query);
   
    }
	 public function PROVINCE_one($PROVINCE_ID) {
        $query = "SELECT * FROM [Jmtib].[dbo].[TBL_PROVINCE]  WHERE PROVINCE_ID = '$PROVINCE_ID'";
        return $this->db->query($query)->result();
    }
	 public function AMPHUR_one($AMPHUR_ID) {
        $query = "SELECT * FROM [Jmtib].[dbo].[TBL_AMPHUR] WHERE AMPHUR_ID = '$AMPHUR_ID' ";
        return $this->db->query($query)->result();
    }
	  public function DISTRICT_one($DISTRICT_ID) {
        $query = "SELECT * FROM [Jmtib].[dbo].[TBL_DISTRICT]  WHERE DISTRICT_ID = '$DISTRICT_ID'";
        return $this->db->query($query)->result();
    }
    
//    public function check_datalogin($key) {
//
//        $query = "SELECT *  FROM  [Jmtib].[dbo].[USERNAME] WHERE Password = '$key' AND Status = 'ACTIVE' AND (LevelEmp = 'INDY' AND DEPARTMENT = 'DS01' AND DEPARTMENT = 'DS02')";
//
//        return $this->db->query($query)->result();
//    }
    
      public function check_datalogin($key,$AutoID) {

        $query = "SELECT *  FROM  [Jmtib].[dbo].[USERNAME] WHERE Password = '$key' AND AutoID = '$AutoID' AND Status = 'ACTIVE' AND (LevelEmp = 'INDY')";

        return $this->db->query($query)->result();
    }

    public function Update_check_Emp($key,$Username) {
        $query = "UPDATE [Jmtib].[dbo].[USERNAME]
                  SET Status_Log = 'Nonactive'
                  WHERE Password = '$key' AND Username = '$Username' AND Status = 'ACTIVE'";
        $this->db->query($query);
    }
    function getCall_work($NameUser,$PROSPECT_LIST_ID){ //เรียกแจ้งงาน
        $query ="SELECT A.*,B.*,I.*,N.*  FROM [Jmtib].[dbo].[TBL_PROSPECT_LIST] A
                 INNER JOIN [Jmtib].[dbo].[TBL_JOB_ALERT] B ON A.PROSPECT_LIST_ID = B.Prospect_list_id
                 INNER JOIN [Jmtib].[dbo].[tb_InsureCompany] I ON A.Namecompany = I.Insure_Code_Company
                 INNER JOIN  [Jmtib].[dbo].[TBL_InsuranceType] N ON A.Type_ID = N.ID_Type_Auto
                 where  CreateEmp = '$NameUser'  AND A.PROSPECT_LIST_ID='$PROSPECT_LIST_ID'";
        return $this->db->query($query)->result();
    }
	function get_DateCurrent(){
        $query="SELECT GETDATE() AS 'DateCurrent'";
         return $this->db->query($query)->result();
    }
	 function Insure_Class($Namecompany,$Type_ID){ //ประกันชั้น ... มี ID
        $query="SELECT * FROM  [Jmtib].[dbo].[TBL_Insurance_Installments] where Insure_Code_Company='$Namecompany' AND ID_Type_Auto='$Type_ID'";
         return $this->db->query($query)->result();
    }
     function Sumpayment($Code_Car,$Type_ID){ //ยอดรวมที่ลูกค้าต้องชำระ 
        $query="SELECT * FROM [Jmtib].[dbo].[TBL_MiddleCarInsurance] where  Code_Car='$Code_Car' and ID_Type_Auto='$Type_ID'";
        return $this->db->query($query)->result();
    }
    function SaveBill($PROSPECT_LIST_ID,$Image,$Payment,$Bank,$SaveBy,$datepay){
        $query=" INSERT INTO [Jmtib].[dbo].[TBL_IMAGE_PAYSLIP]
                 (PROSPECT_LIST_ID,Image,Payment,Bank,SaveDate,Status,SaveBy,Date_pay) VALUES ('$PROSPECT_LIST_ID','$Image','$Payment','$Bank',GETDATE(),'0','$SaveBy','$datepay') ";
                 $this->db->query($query);
    }function gettable_image($start,$pageend,$where){
        $query="SELECT * FROM (
                    SELECT ROW_NUMBER() OVER (ORDER BY Date_pay) AS 'Row',* FROM  
                    [Jmtib].[dbo].[TBL_IMAGE_PAYSLIP] $where
                )AA WHERE AA.Row >'$start' AND AA.Row <= '$pageend'";
                 return $this->db->query($query)->result();
    }function countgettable_image($where){
        $query="SELECT COUNT(PROSPECT_LIST_ID) AS 'Count'  FROM  [Jmtib].[dbo].[TBL_IMAGE_PAYSLIP]  $where";
         return $this->db->query($query)->result();
    }
    function UpdatePaySlip($SaveBy,$txtpostspeclist){
      $query="UPDATE [Jmtib].[dbo].[TBL_IMAGE_PAYSLIP] SET Status='1' WHERE SaveBy ='$SaveBy' and PROSPECT_LIST_ID='$txtpostspeclist' ";
           $this->db->query($query);
    }

    function sumslip($SaveBy,$txtpostspeclist,$whereslip){
        $query="SELECT SUM(Payment) AS 'Sumpay',PROSPECT_LIST_ID
                FROM  [Jmtib].[dbo].[TBL_IMAGE_PAYSLIP] WHERE SaveBy ='$SaveBy' and PROSPECT_LIST_ID='$txtpostspeclist' $whereslip
                GROUP BY PROSPECT_LIST_ID";
                return $this->db->query($query)->result();
    }function updatepayJob_Alert_New($Sumpay,$datepay,$PROSPECT_LIST_ID){ 

        $query="UPDATE [Jmtib].[dbo].[TBL_JOB_ALERT] SET  Customer_Payment='$Sumpay', Date_Payment='$datepay'
                WHERE Prospect_list_id ='$PROSPECT_LIST_ID'";
                $this->db->query($query);

    }
    function updatepayJob_Alert_New2($Sumpay,$PROSPECT_LIST_ID){ 

        $query="UPDATE [Jmtib].[dbo].[TBL_JOB_ALERT] SET  Customer_Payment='$Sumpay', Date_Payment=GETDATE()
                WHERE Prospect_list_id ='$PROSPECT_LIST_ID'";
                $this->db->query($query);

    }
    function GetTransection($txt_pospeclist){
        $query="SELECT *  FROM [Jmtib].[dbo].[TBL_TRANSACTION]  where Prospect_list_id = '$txt_pospeclist'";
        return $this->db->query($query)->result();
    }
    function UpdateTrans_Status($TransStatus,$txt_pospeclist){
        $query="UPDATE [Jmtib].[dbo].[TBL_JOB_ALERT]  set TransStatus = '$TransStatus' ,Status_Admin ='APPROVE' where Prospect_list_id = '$txt_pospeclist' ";
       $this->db->query($query);
    }
     function Del_IMAGE_PAYSLIP($where){
        $query="DELETE [Jmtib].[dbo].[TBL_IMAGE_PAYSLIP] $where";
            $this->db->query($query);
    }function get_TumbonEdit($DISTRICT_ID){
      $query="SELECT tumbon.DISTRICT_ID,tumbon.DISTRICT_NAME,amphur.AMPHUR_ID,amphur.AMPHUR_NAME,province.PROVINCE_ID,province.PROVINCE_NAME
              FROM [Jmtib].[dbo].[TBL_DISTRICT] tumbon inner join [Jmtib].[dbo].[TBL_AMPHUR] amphur
              on tumbon.AMPHUR_ID = amphur.AMPHUR_ID inner join [Jmtib].[dbo].[TBL_PROVINCE] province 
              on amphur.PROVINCE_ID = province.PROVINCE_ID where tumbon.DISTRICT_ID='$DISTRICT_ID'";
      return $this->db->query($query)->result();
    }


    //Count Status
    function CountApproveCredit($FirstName){  //อนุมัติเครดิต
      $query="SELECT Count(B.Prospect_list_id) AS 'CountApprove_Credit'  FROM [Jmtib].[dbo].[TBL_JOB_ALERT] B
              INNER JOIN [Jmtib].[dbo].[TBL_TELESALE_WORK] TE ON TE.PROSPECT_LIST_ID = B.Prospect_list_id 
              where  B.CreateEmp = '$FirstName' AND TE.TELESALES_STATUS = 'NEW' AND TE.TELESALES_GROUPDEBT IS NULL AND B.TransStatus='NEW' AND B.TransactionID IS NULL AND B.Status_Admin='NEW'";
       return $this->db->query($query)->result();
    }function CountRejectCredit($FirstName){ //ไม่อนุมัติเครดิต
      $query=" SELECT Count(B.Prospect_list_id) AS 'CountReject_Credit'  FROM [Jmtib].[dbo].[TBL_JOB_ALERT] B
                INNER JOIN [Jmtib].[dbo].[TBL_TELESALE_WORK] TE ON TE.PROSPECT_LIST_ID = B.Prospect_list_id 
                where  B.CreateEmp = '$FirstName' AND  TE.TELESALES_STATUS = 'NEW' AND TE.TELESALES_GROUPDEBT IS NULL AND
                 B.TransStatus='NEW' AND B.TransactionID IS NULL AND B.Status_Admin='REJECT'";
       return $this->db->query($query)->result();

    }function CountCallwork_Orange($FirstName){ //แจ้งงานสีส้ม
      $query=" SELECT Count(B.Prospect_list_id) AS 'CountCallwork_Orange'  FROM [Jmtib].[dbo].[TBL_JOB_ALERT] B
                INNER JOIN [Jmtib].[dbo].[TBL_TELESALE_WORK] TE ON TE.PROSPECT_LIST_ID = B.Prospect_list_id 
                where  B.CreateEmp = '$FirstName' AND  TE.TELESALES_STATUS = 'NEW' AND TE.TELESALES_GROUPDEBT IS NULL AND 
                B.TransStatus='NEW' AND B.TransactionID IS NULL AND B.Status_Admin='APPROVE'";
       return $this->db->query($query)->result();
    }
    function CountCallwork_Green($FirstName){ //แจ้งงานสีเขียว
      $query=" SELECT Count(B.Prospect_list_id) AS 'CountCallwork_Green'  FROM [Jmtib].[dbo].[TBL_JOB_ALERT] B
                INNER JOIN [Jmtib].[dbo].[TBL_TELESALE_WORK] TE ON TE.PROSPECT_LIST_ID = B.Prospect_list_id 
                where  B.CreateEmp = '$FirstName' AND  TE.TELESALES_STATUS = 'NEW' AND TE.TELESALES_GROUPDEBT 
                IS NULL AND B.TransStatus='NEW' AND B.TransactionID IS NOT  NULL";
       return $this->db->query($query)->result();
    }
    function CountWaitCheck($FirstName){  //รอตรวจสอบข้อมูล
      $query=" SELECT Count(B.Prospect_list_id) AS 'CountCallwork_success'  FROM [Jmtib].[dbo].[TBL_JOB_ALERT] B
                INNER JOIN [Jmtib].[dbo].[TBL_TELESALE_WORK] TE ON TE.PROSPECT_LIST_ID = B.Prospect_list_id 
                where  B.CreateEmp = '$FirstName' AND TE.TELESALES_STATUS = 'WAIT' AND TE.TELESALES_GROUPDEBT='RS0016'
                 AND B.TransStatus='pending' AND B.TransactionID IS NOT  NULL";
       return $this->db->query($query)->result();

    } function CountWaittell_Insure($FirstName){ //รอแจ้งบริษัทประกันแล้ว
      $query="SELECT Count(B.Prospect_list_id) AS 'CountWaitCheck'  FROM [Jmtib].[dbo].[TBL_JOB_ALERT] B
                INNER JOIN [Jmtib].[dbo].[TBL_TELESALE_WORK] TE ON TE.PROSPECT_LIST_ID = B.Prospect_list_id 
                where  B.CreateEmp = '$FirstName' AND TE.TELESALES_STATUS = 'WAIT' AND TE.TELESALES_GROUPDEBT='RS0016' AND B.TransStatus='A' AND B.TransactionID IS NOT NULL";
       return $this->db->query($query)->result();
    }function Counttell_Insure($FirstName){ //แจ้งบริษัทประกันแล้ว
      $query="SELECT Count(B.Prospect_list_id) AS 'CounttellInsure'  FROM [Jmtib].[dbo].[TBL_JOB_ALERT] B
              INNER JOIN [Jmtib].[dbo].[TBL_TELESALE_WORK] TE ON TE.PROSPECT_LIST_ID = B.Prospect_list_id 
              where  B.CreateEmp = '$FirstName' AND TE.TELESALES_STATUS = 'WAIT' AND TE.TELESALES_GROUPDEBT='RS0017' 
              AND B.TransStatus='A' AND B.TransactionID IS NOT NULL";
       return $this->db->query($query)->result();
    }function CountReject_Tran($FirstName){ //ข้อมูลไม่สมบูรณ์
      $query="SELECT Count(B.Prospect_list_id) AS 'CountRejectTrans'  FROM [Jmtib].[dbo].[TBL_JOB_ALERT] B
              INNER JOIN [Jmtib].[dbo].[TBL_TELESALE_WORK] TE ON TE.PROSPECT_LIST_ID = B.Prospect_list_id 
              where  B.CreateEmp = '$FirstName' AND TE.TELESALES_STATUS = 'WAIT' AND TE.TELESALES_GROUPDEBT='RS0016' 
              AND B.TransStatus='REJECT' AND B.TransactionID IS NOT NULL";
       return $this->db->query($query)->result();
    }
    function UpdateStatus_tell($TELESALES_STATUS,$TELESALES_GROUPDEBT,$PROSPECT_LIST_ID){ //Update status แจ้งบริษัทประกันแล้ว
      $query="UPDATE [Jmtib].[dbo].[TBL_TELESALE_WORK]  set TELESALES_STATUS = '$TELESALES_STATUS',TELESALES_GROUPDEBT =$TELESALES_GROUPDEBT WHERE PROSPECT_LIST_ID ='$PROSPECT_LIST_ID'";
      $this->db->query($query);
    }

function checkStatus_Payslip($FirstName,$PROSPECT_LIST_ID){
 $query="SELECT B.Prospect_list_id,TE.TELESALES_STATUS,TE.TELESALES_GROUPDEBT,B.TransStatus,
    (CASE 
     WHEN TE.TELESALES_STATUS = 'WAIT' AND TE.TELESALES_GROUPDEBT='RS0016' AND B.TransStatus='pending' AND B.TransactionID IS NOT  NULL THEN '1'
     WHEN TE.TELESALES_STATUS = 'WAIT' AND TE.TELESALES_GROUPDEBT='RS0016' AND B.TransStatus='REJECT' AND B.TransactionID IS NOT NULL  THEN '2'
     WHEN TE.TELESALES_STATUS = 'WAIT' AND TE.TELESALES_GROUPDEBT='RS0016' AND B.TransStatus='A' AND B.TransactionID IS NOT NULL  THEN '3'
     WHEN TE.TELESALES_STATUS = 'WAIT' AND TE.TELESALES_GROUPDEBT='RS0017' AND B.TransStatus='A' AND B.TransactionID IS NOT NULL  THEN '4'
     ELSE '0' 
    END) AS StatusButton
  from  [Jmtib].[dbo].[TBL_JOB_ALERT] B  inner join [Jmtib].[dbo].[TBL_TELESALE_WORK] TE ON
 B.Prospect_list_id  = TE.PROSPECT_LIST_ID WHERE CreateEmp ='$FirstName' AND  B.Prospect_list_id ='$PROSPECT_LIST_ID'";
  return $this->db->query($query)->result();
    }
     function getDate_First($PROSPECT_LIST_ID){ //ดึงวันวันที่จ่ายครั้งแรก โดยจับจาก AutoID เพราะ กรณีที่เขาแนบใบเสร็จมามั่ววันที่ไม่ตรง
      $query="SELECT  AutoID,Date_pay FROM [Jmtib].[dbo].[TBL_IMAGE_PAYSLIP] where  AutoID = (select MIN(AutoID) from [Jmtib].[dbo].[TBL_IMAGE_PAYSLIP] where PROSPECT_LIST_ID ='$PROSPECT_LIST_ID')";
       return $this->db->query($query)->result();
    }
    function getDate_last($PROSPECT_LIST_ID){ //ดึงวันวันที่จ่ายครั้งสุดท้าย โดยจับจาก AutoID เพราะ กรณีที่เขาแนบใบเสร็จมามั่ววันที่ไม่ตรง
      $query="SELECT  AutoID,Date_pay FROM [Jmtib].[dbo].[TBL_IMAGE_PAYSLIP] where  AutoID = (select MAX(AutoID) from [Jmtib].[dbo].[TBL_IMAGE_PAYSLIP] where PROSPECT_LIST_ID ='$PROSPECT_LIST_ID')";
       return $this->db->query($query)->result();
    }
    function Insert_TBL_INSTALLMENT_MAIN($TransID,$IDCARD,$PaymentType,$Principal,$OSbalance,$E_Balance,$Duedate,$Term,$StartDate,$EndDate,$DownPercent,$ServiceFee,$StatusAccount){
      $query="INSERT INTO [Jmtib].[dbo].[TBL_INSTALLMENT_MAIN] (TransID,IDCARD,DateCreate,PaymentType,Principal,Interest,OSbalance,E_Balance,Charge,Duedate,Term,StartDate,EndDate,DownPercent,ServiceFee,StatusAccount) values('$TransID','$IDCARD',GETDATE(),'$PaymentType','$Principal','0.00','$OSbalance','$E_Balance','0.00','$Duedate','$Term','$StartDate','$EndDate','$DownPercent','$ServiceFee','$StatusAccount')";
       $this->db->query($query);
    }
     function Insert_TBL_INSTALLMENT_MAIN_money($TransID,$IDCARD,$PaymentType,$Principal,$OSbalance,$E_Balance,$ServiceFee,$StatusAccount){
      $query="INSERT INTO [Jmtib].[dbo].[TBL_INSTALLMENT_MAIN] (TransID,IDCARD,DateCreate,PaymentType,Principal,Interest,OSbalance,E_Balance,Charge
      ,ServiceFee,StatusAccount) values('$TransID','$IDCARD',GETDATE(),'$PaymentType','$Principal','0.00','$OSbalance','$E_Balance','0.00','$ServiceFee','$StatusAccount')";
       $this->db->query($query);
    }
    function Insert_TBL_INSTALLMENT($TransID,$num,$datePay,$principal){
      $query="INSERT INTO [Jmtib].[dbo].[TBL_INSTALLMENT] (TransID,TERM,DUEDATE,PRINCIPAL,INTEREST)
              VALUES('$TransID',$num,'$datePay','$principal','0.0')";
       $this->db->query($query);
    }
    function updateDatepay($PROSPECTLISTID){
      $query="UPDATE  [Jmtib].[dbo].[TBL_JOB_ALERT] SET Date_Payment=(select MAX(CONVERT(date,Date_pay)) from [dbo].[TBL_IMAGE_PAYSLIP]  WHERE PROSPECT_LIST_ID='$PROSPECTLISTID')  where  PROSPECT_LIST_ID='$PROSPECTLISTID'";
        $this->db->query($query);
    }
	function delete_installment($TranID) {
        $query = "delete from [Jmtib].[dbo].[TBL_INSTALLMENT] where TransID='$TranID'";
        $this->db->query($query);
    }

    function delete_installment_main($TranID) {
        $query = "delete from [Jmtib].[dbo].[TBL_INSTALLMENT_MAIN] where TransID='$TranID'";
        $this->db->query($query);
    }
    
    //Commission
    public function Count_Commission_Model($thai,$datepaystart,$datepayend,$Username) {
        $query = "select count(AA.count_ref) AS Count from  (select 'ชำระเงินสด' as 'Type_Insure',COUNT(*) as 'count_ref',sum(Net_premium) as Net_premium
       ,[dbo].[Get_Rate_Commission](case when PeriodNumber IS NULL then 1 else PeriodNumber end,'DS01') as Rate
       ,SUM(Net_premium) * [dbo].[Get_Rate_Commission](case when PeriodNumber IS NULL then 1 else PeriodNumber end,'DS01') as Commission
from TBL_JOB_ALERT
where TransStatus = 'A' and  PeriodNumber is null
      AND (Type_Protection in $thai) AND (convert(date,CreateDate) between '$datepaystart' and '$datepayend') 
      AND CreateEmp = '$Username'
      AND [dbo].[Check_Customer_payment_Commission](TransactionID) = 'PASS'
      group by [dbo].[Get_Rate_Commission](case when PeriodNumber IS NULL then 1 else PeriodNumber end,'DS01')
 

union all

select 'ผ่อน 3 งวด' as 'Type_Insure',COUNT(*) as 'count_ref',sum(Net_premium) as Net_premium
       ,[dbo].[Get_Rate_Commission](case when PeriodNumber IS NULL then 1 else PeriodNumber end,'DS01') as Rate
       ,SUM(Net_premium) * [dbo].[Get_Rate_Commission](case when PeriodNumber IS NULL then 1 else PeriodNumber end,'DS01') as Commission
from TBL_JOB_ALERT
where TransStatus = 'A' and  PeriodNumber = '3' 
      AND (Type_Protection in $thai) AND (convert(date,CreateDate) between '$datepaystart' and '$datepayend') 
      AND CreateEmp = '$Username'
      AND [dbo].[Check_Customer_payment_Commission](TransactionID) = 'PASS'
      group by  [dbo].[Get_Rate_Commission](case when PeriodNumber IS NULL then 1 else PeriodNumber end,'DS01')
      
union all

select 'ผ่อน 6 งวด' as 'Type_Insure',COUNT(*) as 'count_ref',sum(Net_premium) as Net_premium
       ,[dbo].[Get_Rate_Commission](case when PeriodNumber IS NULL then 1 else PeriodNumber end,'DS01') as Rate
       ,SUM(Net_premium) * [dbo].[Get_Rate_Commission](case when PeriodNumber IS NULL then 1 else PeriodNumber end,'DS01') as Commission
from TBL_JOB_ALERT
where TransStatus = 'A' and  PeriodNumber = '6' 
      AND (Type_Protection in $thai) AND (convert(date,CreateDate) between '$datepaystart' and '$datepayend') 
      AND CreateEmp = '$Username'
      AND [dbo].[Check_Customer_payment_Commission](TransactionID) = 'PASS'
      group by [dbo].[Get_Rate_Commission](case when PeriodNumber IS NULL then 1 else PeriodNumber end,'DS01')

union all

select 'ผ่อน 8 งวด' as 'Type_Insure',COUNT(*) as 'count_ref',sum(Net_premium) as Net_premium
       ,[dbo].[Get_Rate_Commission](case when PeriodNumber IS NULL then 1 else PeriodNumber end,'DS01') as Rate
       ,SUM(Net_premium) * [dbo].[Get_Rate_Commission](case when PeriodNumber IS NULL then 1 else PeriodNumber end,'DS01') as Commission
from TBL_JOB_ALERT
where TransStatus = 'A' and  PeriodNumber = '8' 
      AND (Type_Protection in $thai) AND (convert(date,CreateDate) between '$datepaystart' and '$datepayend') 
      AND CreateEmp = '$Username'
      AND [dbo].[Check_Customer_payment_Commission](TransactionID) = 'PASS'
      group by [dbo].[Get_Rate_Commission](case when PeriodNumber IS NULL then 1 else PeriodNumber end,'DS01')

union all

select 'ผ่อน 10 งวด' as 'Type_Insure',COUNT(*) as 'count_ref',sum(Net_premium) as Net_premium
       ,[dbo].[Get_Rate_Commission](case when PeriodNumber IS NULL then 1 else PeriodNumber end,'DS01') as Rate
       ,SUM(Net_premium) * [dbo].[Get_Rate_Commission](case when PeriodNumber IS NULL then 1 else PeriodNumber end,'DS01') as Commission
from TBL_JOB_ALERT
where TransStatus = 'A' and  PeriodNumber = '10'
      AND (Type_Protection in $thai) AND (convert(date,CreateDate) between '$datepaystart' and '$datepayend') 
      AND CreateEmp = '$Username'
      AND [dbo].[Check_Customer_payment_Commission](TransactionID) = 'PASS'
      group by [dbo].[Get_Rate_Commission](case when PeriodNumber IS NULL then 1 else PeriodNumber end,'DS01')) AA
      ";
        
        return $this->db->query($query)->result();
    }
    
      
    public function Select_Commission_Model($thai,$Username,$datepaystart,$datepayend,$start, $pageend) {
        $query = "select * from (select ROW_NUMBER() OVER(ORDER BY DD.Net_premium) AS row,* from 
            (select 'ชำระเงินสด' as 'Type_Insure',COUNT(*) as 'count_ref', sum(Net_premium) 
            as Net_premium ,[dbo].[Get_Rate_Commission]
            (case when PeriodNumber IS NULL then 1 else PeriodNumber end,'DS01') as Rate
            ,SUM(Net_premium) * [dbo].[Get_Rate_Commission]
            (case when PeriodNumber IS NULL then 1 else PeriodNumber end,'DS01') as Commission 
            from TBL_JOB_ALERT where TransStatus = 'A' and PeriodNumber is null AND 
            (Type_Protection in $thai) AND (convert(date,CreateDate) 
            between '$datepaystart' and '$datepayend') AND CreateEmp = '$Username' AND 
            [dbo].[Check_Customer_payment_Commission](TransactionID) = 'PASS' 
            group by [dbo].[Get_Rate_Commission](case when PeriodNumber IS NULL then 1 else PeriodNumber end,'DS01')
    union all select 'ผ่อน 3 งวด' as 'Type_Insure',COUNT(*) as 'count_ref',sum(Net_premium) as Net_premium , 
            [dbo].[Get_Rate_Commission](case when PeriodNumber IS NULL then 1 else PeriodNumber end,'DS01') as Rate ,
            SUM(Net_premium) * [dbo].[Get_Rate_Commission](case when PeriodNumber IS NULL then 1 else PeriodNumber end,'DS01') as Commission
            from TBL_JOB_ALERT where TransStatus = 'A' and PeriodNumber = '3' AND (Type_Protection in $thai)
            AND (convert(date,CreateDate) between '$datepaystart' and '$datepayend') AND CreateEmp = 'MDSA001'
            AND [dbo].[Check_Customer_payment_Commission](TransactionID) = 'PASS' 
            group by [dbo].[Get_Rate_Commission](case when PeriodNumber IS NULL then 1 else PeriodNumber end,'DS01')
            union all select 'ผ่อน 6 งวด' as 'Type_Insure',COUNT(*) as 'count_ref',sum(Net_premium) as Net_premium ,[dbo].[Get_Rate_Commission] 
            (case when PeriodNumber IS NULL then 1 else PeriodNumber end,'DS01') as Rate ,SUM(Net_premium) * [dbo].[Get_Rate_Commission]
            (case when PeriodNumber IS NULL then 1 else PeriodNumber end,'DS01') as Commission from TBL_JOB_ALERT where TransStatus = 'A'
            and PeriodNumber = '6' AND (Type_Protection in $thai) AND 
            (convert(date,CreateDate) between '$datepaystart' and '$datepayend') AND CreateEmp = '$Username'
            AND [dbo].[Check_Customer_payment_Commission](TransactionID) = 'PASS' group by [dbo].
            [Get_Rate_Commission](case when PeriodNumber IS NULL then 1 else PeriodNumber end,'DS01') 
    union all 
            select 'ผ่อน 8 งวด' as 'Type_Insure',COUNT(*) as 'count_ref',sum(Net_premium) as Net_premium ,
            [dbo].[Get_Rate_Commission](case when PeriodNumber IS NULL then 1 else PeriodNumber end,'DS01') as Rate , 
            SUM(Net_premium) * [dbo].[Get_Rate_Commission](case when PeriodNumber IS NULL then 1 else PeriodNumber end,'DS01')
            as Commission from TBL_JOB_ALERT where TransStatus = 'A' and PeriodNumber = '8' AND (Type_Protection in
            $thai) AND (convert(date,CreateDate) between '$datepaystart' and '$datepayend') 
            AND CreateEmp = '$Username' AND [dbo].[Check_Customer_payment_Commission](TransactionID) = 'PASS' 
            group by [dbo].[Get_Rate_Commission](case when PeriodNumber IS NULL then 1 else PeriodNumber end,'DS01')
    union all
            select 'ผ่อน 10 งวด' as 'Type_Insure',COUNT(*) as 'count_ref',sum(Net_premium) as Net_premium ,
            [dbo].[Get_Rate_Commission](case when PeriodNumber IS NULL then 1 else PeriodNumber end,'DS01') as 
            Rate ,SUM(Net_premium) * [dbo].[Get_Rate_Commission](case when PeriodNumber IS NULL then 1 else PeriodNumber
            end,'DS01') as Commission from TBL_JOB_ALERT where TransStatus = 'A' and PeriodNumber = '10' AND (Type_Protection in $thai)
            AND (convert(date,CreateDate) between '$datepaystart' and '$datepayend') AND CreateEmp = '$Username' 
            AND [dbo].[Check_Customer_payment_Commission](TransactionID) = 'PASS'
            group by [dbo].[Get_Rate_Commission]
            (case when PeriodNumber IS NULL then 1 else PeriodNumber end,'DS01') ) DD ) AA WHERE AA.row > '$start' And AA.row <= '$pageend'";


        return $this->db->query($query)->result();
    }

}
