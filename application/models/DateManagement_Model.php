<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class DateManagement_Model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function Get_Insure_Company() {
        $query = "SELECT Auto_ID,Insure_Company,Insure_Code_Company FROM [Jmtib].[dbo].[tb_InsureCompany] where Status = 'Active' GROUP BY  Auto_ID,Insure_Company,Insure_Code_Company";

        return $this->db->query($query)->result();
    }

    public function Get_Company($ID_InsureCode) {
        $query = " SELECT  Auto_ID,Insure_Company  FROM [Jmtib].[dbo].[tb_InsureCompany] WHERE Auto_ID = '$ID_InsureCode'";

        return $this->db->query($query)->result();
    }

    public function Select_CarPackage($wherenamegroup,$start, $pageend) {
        $query = "SELECT * FROM (SELECT ROW_NUMBER () OVER(ORDER BY IDPackage) AS row,
                 [IDPackage],[ID_InsureCode],[NamePackage],[SaveDate],[Status_Package],[Save_By]
                 FROM [Jmtib].[dbo].[TBL_CarPackage]  $wherenamegroup
                 )AA  WHERE  AA.row > $start And AA.row <= $pageend ";
        return $this->db->query($query)->result();
    }

    public function Count_CarPackage($wherenamegroup) {
        $query = "SELECT COUNT(AA.IDPackage) AS Count FROM (
                  SELECT  [IDPackage],[ID_InsureCode],[NamePackage],[SaveDate],[Status_Package],[Save_By]
                  FROM [Jmtib].[dbo].[TBL_CarPackage] $wherenamegroup )AA";
        return $this->db->query($query)->result();
    }
    
    public function SELECT_CARIDPackage($IDPackage) {
        $query = "SELECT  [IDPackage] FROM [Jmtib].[dbo].[TBL_MiddleCarInsurance]  where  [IDPackage] = '$IDPackage' GROUP BY [IDPackage]";
        return $this->db->query($query)->result();
    }

    public function Insent_CarPackage($ID_InsureCode, $NamePackage, $SaveDate, $Status_Package, $Username) {
        $query = "INSERT INTO [Jmtib].[dbo].[TBL_CarPackage]
        (ID_InsureCode,NamePackage,SaveDate,Status_Package,Save_By)        
        VALUES ('" . $ID_InsureCode . "',
		'" . $NamePackage . "',
		'" . $SaveDate . "',
                '" . $Status_Package . "',
		'" . $Username . "')";
        $this->db->query($query);
    }

    public function SelectEdit_CarPackage($IDPackage) {
        $query = "SELECT [IDPackage],[ID_InsureCode],[NamePackage]
       ,[SaveDate],[Status_Package],[Save_By] FROM [Jmtib].[dbo].[TBL_CarPackage]  where IDPackage = '$IDPackage'";
        return $this->db->query($query)->result();
    }

    public function Status_updatePackage($IDPackage, $Status_Package) {
        $query = "UPDATE [Jmtib].[dbo].[TBL_CarPackage] 
                SET  [Status_Package] = '$Status_Package'
                WHERE  IDPackage = '$IDPackage'";
        $this->db->query($query);
    }

    public function UpdateCarPackage($ID_InsureCode, $NamePackage, $SaveDate, $Status_Package, $Username, $IDPackage) {
        $query = "UPDATE [Jmtib].[dbo].[TBL_CarPackage]
                SET [ID_InsureCode] = '$ID_InsureCode'
                    , [NamePackage] = '$NamePackage'
                    , [SaveDate] = '$SaveDate'
                    , [Status_Package] = '$Status_Package'
                    , [Save_By] = '$Username'
                WHERE IDPackage = '$IDPackage'";
        $this->db->query($query);
    }

    //DELETE CarPackage 
    public function DeleteCarPackage($Username, $IDPackage) {
        $query = "DELETE FROM [Jmtib].[dbo].[TBL_CarPackage] where Save_By = '$Username' AND IDPackage = '$IDPackage'";
        $this->db->query($query);
    }
    
    public function searchgroupPackage($wherenamegroup) {
        $query = "SELECT [IDPackage]
                ,[ID_InsureCode]
                ,[NamePackage]
                ,[SaveDate]
                ,[Status_Package]
                ,[Save_By]
                FROM [Jmtib].[dbo].[TBL_CarPackage] 
                WHERE $wherenamegroup ";
        $this->db->query($query);
    }
    
    
//   Management_CarInformation 
    public function Select_EngineCC() {
        $query = "SELECT  [EngineCC]  FROM [Jmtib].[dbo].[TBL_Car_Information] GROUP BY [EngineCC] ORDER BY [EngineCC] ASC";
        return $this->db->query($query)->result();
    }
    
    public function Select_CarBrand() {
        $query = "SELECT  [CarBrand] FROM [Jmtib].[dbo].[TBL_CarBrand]";
        return $this->db->query($query)->result();
    }
    
     public function COUNT_CarInformation($wherenamegroup) {
        $query = "SELECT COUNT(AA.Code_Car) AS Count FROM (
                  SELECT  [Code_Car],[CarBrand],[CarYear],[CarModel],[EngineCC],
                  [MakeDescription],[Group],[NewPrice],Status_Car
                  FROM [Jmtib].[dbo].[TBL_Car_Information] $wherenamegroup )AA";
        return $this->db->query($query)->result();
    }
    
      public function Select_CarInformation($wherenamegroup,$start, $pageend) {
        $query = "SELECT * FROM (SELECT ROW_NUMBER () OVER (ORDER BY Code_Car) AS row,
        [Code_Car],[CarBrand],[CarYear],[CarModel],[EngineCC],[MakeDescription],[Group],[NewPrice],Status_Car
        FROM [Jmtib].[dbo].[TBL_Car_Information] $wherenamegroup)BB  WHERE BB.row > '$start' AND BB.row <= '$pageend'";
        return $this->db->query($query)->result();
    }
    
     public function searchgroupCar_Information($wherenamegroup) {
        $query = "SELECT [Code_Car],[CarBrand],[CarYear],[CarModel],[EngineCC],[MakeDescription],[Group],[NewPrice],[Status_Car]
        FROM [Jmtib].[dbo].[TBL_CarPackage] WHERE $wherenamegroup ";
        $this->db->query($query);
    }
    
    public function GetGroup_Car() {
        $query = "SELECT [Group_Car] FROM [Jmtib].[dbo].[TBL_Group_Car]";
        return $this->db->query($query)->result();
    }

//    public function Insent_CarInformation($CarBrand, $CarYear, $CarModel, $EngineCC, $MakeDescription, $Group, $NewPrice,$SaveDate,$Username,$Status_Car) {
//        $query = "INSERT INTO [Jmtib].[dbo].[TBL_Car_Information]
//        ([CarBrand],[CarYear],[CarModel],[EngineCC],[MakeDescription],[Group],[NewPrice],[SaveDate],[Save_By],Status_Car)            
//        VALUES ('" . $CarBrand . "',
//		'" . $CarYear . "',
//		'" . $CarModel . "',
//                '" . $EngineCC . "',
//                '" . $MakeDescription . "',
//                '" . $Group . "',
//                '" . $NewPrice . "',
//                '" . $SaveDate . "',
//                '" . $Username . "',
//		'" . $Status_Car . "')";
//        $this->db->query($query);
//    }
    

    
    public function Update_TmpCar($CarBrandEdit, $CarModelEdit, $CarYearEdit, $MakeDescriptionEdit, $EngineCCEdit, $GroupEdit, $NewPriceEdit, $SaveDate, $Username, $Status_Car, $Code_Car) {
        $query = "UPDATE [Jmtib].[dbo].[TmpAdd_Car]
                SET   CarBrand = '$CarBrandEdit'
                     ,[CarModel] = '$CarModelEdit'
                     ,[CarYear] = '$CarYearEdit'
                     ,[MakeDescription] = '$MakeDescriptionEdit'    
                     ,[EngineCC] = '$EngineCCEdit'
                     ,[Group] = '$GroupEdit'
                     ,[NewPrice] = '$NewPriceEdit'
                     ,[SaveDate] = '$SaveDate'
                     ,[Save_By] = '$Username'
                     ,[Status_Car] = '$Status_Car'
                     ,[Status_Check] = '0'
                WHERE  Code_Car = '$Code_Car'";

        $this->db->query($query);
    }
      //คือ สถานะที่บันทึกเสร็จเรียบร้อย Updata ให้เป็น 1 เพื่อนไม่ให้ กวาดไป insent อีก
      public function Update_CheckSuccess($Update_Success) {
        $query = "UPDATE [Jmtib].[dbo].[TmpAdd_Car]
                SET  [Status_Check] = '1' $Update_Success"; 

        $this->db->query($query);
    }

    public function Update_Checkcorrect($where) {
        $query = "UPDATE [Jmtib].[dbo].[TmpAdd_Car] SET $where";

        $this->db->query($query);
    }

    // DELETE_TABLE_TBL_TMPADD 
    public function DELETE_ADDTMP($DELETE_ADDTMP) {
        $query = "DELETE  FROM [Jmtib].[dbo].[TmpAdd_Car] $DELETE_ADDTMP";
        $this->db->query($query);
    }

    public function Insert_TmpAdd($CarBrand, $CarYear, $CarModel, $EngineCC, $MakeDescription, 
               $Group, $NewPrice, $SaveDate, $Username, $Status_Car,$Status_Check) {
        $query = "INSERT INTO [Jmtib].[dbo].[TmpAdd_Car]
        ([CarBrand],[CarYear],[CarModel],[EngineCC],[MakeDescription],[Group],[NewPrice],[SaveDate],[Save_By],Status_Car,Status_Check)            
        VALUES ('" . $CarBrand . "',
		'" . $CarYear . "',
		'" . $CarModel . "',
                '" . $EngineCC . "',
                '" . $MakeDescription . "',
                '" . $Group . "',
                '" . $NewPrice . "',
                '" . $SaveDate . "',
                '" . $Username . "',
                '" . $Status_Car . "',
		'" . $Status_Check . "')";
        $this->db->query($query);
    }
    
    
       public function ShowStatus_Car_TmpAdd($wherenamegroup,$start,$pageend) {
        $query = "SELECT * FROM (SELECT ROW_NUMBER () OVER (ORDER BY Code_Car) AS row,
        [Code_Car] ,[CarBrand],[CarYear],[CarModel],[EngineCC],MAX(SaveDate)AS  SaveDate 
       ,[MakeDescription],[Group],[NewPrice],[Save_By],[Status_Car],[Status_Check]
        FROM [Jmtib].[dbo].[TmpAdd_Car]  $wherenamegroup
        GROUP BY [Code_Car] ,[CarBrand],[CarYear],[CarModel],[EngineCC],
        [MakeDescription],[Group],[NewPrice],[Save_By],[Status_Car],[Status_Check] )BB  WHERE BB.row > '$start' AND BB.row <= '$pageend'";
        return $this->db->query($query)->result();
    }
    
        public function CountStatus_Car_TmpAdd($wherenamegroup) {
        $query = "SELECT COUNT(AA.Code_Car) AS Count FROM (
        SELECT [Code_Car] ,[CarBrand],[CarYear],[CarModel],[EngineCC],MAX(SaveDate)AS  SaveDate 
       ,[MakeDescription],[Group],[NewPrice],[Save_By],[Status_Car],[Status_Check]
        FROM [Jmtib].[dbo].[TmpAdd_Car]  $wherenamegroup
        GROUP BY [Code_Car] ,[CarBrand],[CarYear],[CarModel],[EngineCC],
        [MakeDescription],[Group],[NewPrice],[Save_By],[Status_Car],[Status_Check] )AA";
        return $this->db->query($query)->result();
    }
    
    // insent เข้า ฐานจริง TBL_Car_Information รอบทุดท้ายเสร็จเรียบร้อยแล้ว Status_Check 0 คือ ตรวจสอบถูกต้องเรียบร้อยแล้ว
    public function Insert_TmpAdd_CarInformation() {
        $query = "INSERT INTO [Jmtib].[dbo].[TBL_Car_Information]
                ([CarBrand],[CarYear],[CarModel],[EngineCC],[MakeDescription],[Group],[NewPrice],[SaveDate],[Save_By],Status_Car) 
                SELECT [CarBrand],[CarYear],[CarModel],[EngineCC]
                ,[MakeDescription],[Group],[NewPrice],[SaveDate],[Save_By],[Status_Car]
                FROM [Jmtib].[dbo].[TmpAdd_Car]  where [Status_Check] = '0' AND [Status_Check] <> '1' AND [Status_Check] <> '3'";
        $this->db->query($query);
    }
    
//    SelectUpdate_TmpAdd_Car ข้อมูลที่สถานะเป็น 0 อยู่ ที่สถานะค้างไว้ ก่อนจะ impost เข้าใหม่อีกต้องเครียของเดิมออกก่อน
//    public function SelectUpdate_TmpAdd_Car($Update_Success_clear) {
//        $query = "UPDATE  [Jmtib].[dbo].[TmpAdd_Car]
//                SET  [Status_Check] = '4'
//            FROM (
//                SELECT  [Code_Car]
//                   ,[CarBrand]
//                   ,[CarYear]
//                   ,[CarModel]
//                   ,[EngineCC]
//                   ,[MakeDescription]
//                   ,[Group]
//                   ,[NewPrice]
//                   ,[SaveDate]
//                   ,[Save_By]
//                   ,[Status_Car]
//                   ,[Status_Check] 
//            FROM [Jmtib].[dbo].[TmpAdd_Car]) AS OtherTable $Update_Success_clear";
//        $this->db->query($query);
//    }

    public function SelectEdit_CarInformation($Code_Car) {
        $query = "SELECT [Code_Car],[CarBrand],[CarYear],[CarModel],[EngineCC],[MakeDescription]
                ,[Group],[NewPrice],[SaveDate],[Save_By],[Status_Car]
                FROM [Jmtib].[dbo].[TBL_Car_Information] where Code_Car = '$Code_Car'";
        return $this->db->query($query)->result();
    }

    public function searchgroupCarInformation($wherenamegroup) {
        $query = "SELECT [Code_Car]
                ,[CarBrand]
                ,[CarYear]
                ,[CarModel]
                ,[EngineCC]
                ,[MakeDescription]
                ,[Group]
                ,[NewPrice]
                ,[Save_By]
                ,[Status_Car]
                FROM [Jmtib].[dbo].[TBL_Car_Information]
                WHERE $wherenamegroup ";
        $this->db->query($query);
    }
    
     public function Status_TmpAdd_Car($Code_Car, $StatusswitchCar) {
        $query = "UPDATE [Jmtib].[dbo].[TmpAdd_Car]
                 SET  Status_Check = '$StatusswitchCar'
                 WHERE  Code_Car = '$Code_Car'";
        $this->db->query($query);
    }
    
    public function Status_updateCar($Code_Car, $StatusswitchCar) {
        $query = "UPDATE [Jmtib].[dbo].[TBL_Car_Information]
                 SET  Status_Car = '$StatusswitchCar'
                 WHERE  Code_Car = '$Code_Car'";
        $this->db->query($query);
    }

    public function SELECTPACKAGE($ID_InsureCode) {
        $query = "SELECT A.[IDPackage],A.[NamePackage],B.[Net_Insurance]
            FROM [Jmtib].[dbo].[TBL_CarPackage] A 
            INNER JOIN [Jmtib].[dbo].[TBL_CarCoverage] B ON A.IDPackage = B.IDPackage
            where A.ID_InsureCode = '$ID_InsureCode'";
        
         return $this->db->query($query)->result();
    }
    
    public function Get_InsuranceType() {
        $query = "SELECT [ID_Type_Auto],[Type_ID],[Type_Name]FROM [Jmtib].[dbo].[TBL_InsuranceType]";

        return $this->db->query($query)->result();
    }
    
       public function Get_cartype() {
        $query = "SELECT [CODE],[TYPENAME]FROM [Jmtib].[dbo].[cartype]";
        return $this->db->query($query)->result();
    }
    
    public function SELECTCOVERRATE($IDPackag) {
        $query = "SELECT A.[IDPackage],B.[ID_CoverRate],B.DetailCoverage1
                FROM [Jmtib].[dbo].[TBL_CarPackage] A 
                INNER JOIN [Jmtib].[dbo].[TBL_CarCoverage] B ON A.IDPackage = B.IDPackage
                where A.IDPackage = '$IDPackag'";
        
         return $this->db->query($query)->result();
    }
    
    public function SELECT_DetailCoverage1($IDPackag, $ID_CoverRate) {
        $query = "SELECT A.[IDPackage],B.[ID_CoverRate],B.DetailCoverage1
                FROM [Jmtib].[dbo].[TBL_CarPackage] A 
                INNER JOIN [Jmtib].[dbo].[TBL_CarCoverage] B ON A.IDPackage = B.IDPackage
                where A.IDPackage = '$IDPackag' AND ID_CoverRate = '$ID_CoverRate'";

        return $this->db->query($query)->result();
    }

    public function SELECT_CAR_DETAILS($wherenamegroup, $start, $pageend) {
        $query = "SELECT * FROM (SELECT ROW_NUMBER () OVER(ORDER BY Code_Car) AS row,
            [Code_Car],[CarBrand],[CarYear],[CarModel] ,[EngineCC] ,[MakeDescription],[Group]
            ,[NewPrice],[SaveDate],[Save_By],[Status_Car]
            FROM [Jmtib].[dbo].[TBL_Car_Information]  $wherenamegroup)AA  WHERE  AA.row > '$start' And AA.row <= '$pageend' ";

        return $this->db->query($query)->result();
    }
    

    public function Count_CAR_DETAILS($wherenamegroup) {
        $query = "SELECT COUNT(AA.Code_Car) AS Count FROM (
                SELECT [Code_Car],[CarBrand],[CarYear],[CarModel] ,[EngineCC] ,[MakeDescription],[Group]
                ,[NewPrice],[SaveDate],[Save_By],[Status_Car]
                FROM [Jmtib].[dbo].[TBL_Car_Information] $wherenamegroup) AA";

        return $this->db->query($query)->result();
    }

    public function SELECTMakeDescription($CarBrand, $CarModel, $CarYear) {
        $query = "SELECT [Code_Car] FROM [Jmtib].[dbo].[TBL_Car_Information] where CarBrand = '$CarBrand'
                AND CarModel = '$CarModel' AND CarYear = '$CarYear'";
        return $this->db->query($query)->result();
    }

//    select Group เพื่อไป insent
    public function SELECT_GROUP($CarBrand, $CarModel, $CarYear) {
        $query = "SELECT [Group] FROM [Jmtib].[dbo].[TBL_Car_Information] where CarBrand = '$CarBrand'
                AND CarModel = '$CarModel' AND CarYear = '$CarYear' GROUP BY [Group] ";
        return $this->db->query($query)->result();
    }
    
//    insent ตารางกลาง [Jmtib].[dbo].[TBL_MiddleCarInsurance]
    public function Insent_MiddleCar($ID_InsureCode, $Code_Car, $CODE, $ID_CoverRate, $DetailCoverage1, $Insurance_price, $IDPackag, $Akon, $Tax, $Insurance_price_total, $Discount_price_cctv, $ID_Type_Auto, $Group_Car, $Status, $SaveDate, $Username) {
        $query = "INSERT INTO  [Jmtib].[dbo].[TBL_MiddleCarInsurance]
        ([Insure_Code_Company],[Code_Car],[CODE],[ID_CoverRate],[DetailCoverage1],[Insurance_price],[IDPackage],
        [Akon],[Tax],[Insurance_price_total],[Discount_price_cctv],[ID_Type_Auto],[Group_Car],[Status],[SaveDate],[Save_By])            
        VALUES ('" . $ID_InsureCode . "',
                '" . $Code_Car . "',
                '" . $CODE . "',    
                '" . $ID_CoverRate . "',    
                '" . $DetailCoverage1 . "',
                '" . $Insurance_price . "',
                '" . $IDPackag . "',
                '" . $Akon . "',
                '" . $Tax . "',
                '" . $Insurance_price_total . "',
                '" . $Discount_price_cctv . "',  
                '" . $ID_Type_Auto . "',    
                '" . $Group_Car . "',
                '" . $Status . "',
                '" . $SaveDate . "',
                '" . $Username . "')";
        $this->db->query($query);
    }
    
    public function SELECT_COUNT_MiddleCar($wherenamegroup) {
        $query = "SELECT COUNT(AA.Middle_ID) AS Count FROM 
               (SELECT A.Middle_ID,A.Code_Car,A.ID_CoverRate ,A.Insurance_price,
		A.Insurance_price_total,A.[Akon],A.[Tax],A.Status
		,B.CarBrand,B.CarModel,B.CarYear,B.EngineCC,B.MakeDescription
                ,A.[Discount_price_cctv]
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
                ,U.Insure_Code_Company,U.Insure_Company,U.Auto_ID
                ,L.[Type_Name],L.ID_Type_Auto
                ,E.CODE,E.TYPENAME
                FROM [Jmtib].[dbo].[TBL_MiddleCarInsurance] A
                INNER JOIN [Jmtib].[dbo].[TBL_Car_Information]  B ON A.Code_Car = B.Code_Car
                INNER JOIN [Jmtib].[dbo].[TBL_CarCoverage] C ON A.ID_CoverRate = C.ID_CoverRate
                INNER JOIN [Jmtib].[dbo].[TBL_CarPackage] D ON A.IDPackage = D.IDPackage
                INNER JOIN [Jmtib].[dbo].[tb_InsureCompany] U ON A.Insure_Code_Company = U.Auto_ID
                INNER JOIN [Jmtib].[dbo].[TBL_InsuranceType] L ON A.ID_Type_Auto = L.ID_Type_Auto
                INNER JOIN [Jmtib].[dbo].[cartype] E ON A.CODE = E.CODE $wherenamegroup ) AA";

        return $this->db->query($query)->result();
    }

    public function SELECT_MiddleCar($wherenamegroup,$start,$pageend) {
        $query = "SELECT * FROM (SELECT ROW_NUMBER () OVER(ORDER BY A.Middle_ID) AS row, 
		 A.Middle_ID,A.Code_Car,A.ID_CoverRate ,A.Insurance_price,
		A.Insurance_price_total,A.[Akon],A.[Tax],A.Group_Car,A.Status
		,B.CarBrand,B.CarModel,B.CarYear,B.EngineCC,B.MakeDescription
                ,A.[Discount_price_cctv]
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
                ,U.Insure_Code_Company,U.Insure_Company,U.Auto_ID
                ,L.[Type_Name],L.ID_Type_Auto
                ,E.CODE,E.TYPENAME
                FROM [Jmtib].[dbo].[TBL_MiddleCarInsurance] A
                INNER JOIN [Jmtib].[dbo].[TBL_Car_Information]  B ON A.Code_Car = B.Code_Car
                INNER JOIN [Jmtib].[dbo].[TBL_CarCoverage] C ON A.ID_CoverRate = C.ID_CoverRate
                INNER JOIN [Jmtib].[dbo].[TBL_CarPackage] D ON A.IDPackage = D.IDPackage
                INNER JOIN [Jmtib].[dbo].[tb_InsureCompany] U ON A.Insure_Code_Company = U.Auto_ID
                INNER JOIN [Jmtib].[dbo].[TBL_InsuranceType] L ON A.ID_Type_Auto = L.ID_Type_Auto
                INNER JOIN [Jmtib].[dbo].[cartype] E ON A.CODE = E.CODE
                $wherenamegroup )AA WHERE  AA.row > '$start' And AA.row <= '$pageend'";
        return $this->db->query($query)->result();
    }
    
        public function SELECT_COUNT_MiddleCar_TMP($wherenamegroup) {
        $query = "SELECT COUNT(AA.Middle_ID) AS Count FROM 
               (SELECT A.Middle_ID,A.Code_Car,A.ID_CoverRate ,A.Insurance_price,
		A.Insurance_price_total,A.[Akon],A.[Tax],A.[Group_Car],A.Status
		,B.CarBrand,B.CarModel,B.CarYear,B.EngineCC,B.MakeDescription
                ,A.[Discount_price_cctv],A.[Status_Middle]
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
                ,U.Insure_Code_Company,U.Insure_Company,U.Auto_ID
                ,L.[Type_Name],L.ID_Type_Auto
                ,E.CODE,E.TYPENAME
                FROM [Jmtib].[dbo].[TBL_TmpMiddleCar] A
                INNER JOIN [Jmtib].[dbo].[TBL_Car_Information]  B ON A.Code_Car = B.Code_Car
                INNER JOIN [Jmtib].[dbo].[TBL_CarCoverage] C ON A.ID_CoverRate = C.ID_CoverRate
                INNER JOIN [Jmtib].[dbo].[TBL_CarPackage] D ON A.IDPackage = D.IDPackage
                INNER JOIN [Jmtib].[dbo].[tb_InsureCompany] U ON A.Insure_Code_Company = U.Auto_ID
                INNER JOIN [Jmtib].[dbo].[TBL_InsuranceType] L ON A.ID_Type_Auto = L.ID_Type_Auto
                INNER JOIN [Jmtib].[dbo].[cartype] E ON A.CODE = E.CODE $wherenamegroup ) AA";

        return $this->db->query($query)->result();
    }
    
    
        public function SELECT_MiddleCar_TMP($wherenamegroup,$start,$pageend) {
        $query = "SELECT * FROM (SELECT ROW_NUMBER () OVER(ORDER BY A.Middle_ID) AS row, 
		 A.Middle_ID,A.Code_Car,A.ID_CoverRate ,A.Insurance_price,
		A.Insurance_price_total,A.[Akon],A.[Tax],A.[Group_Car],A.Status
		,B.CarBrand,B.CarModel,B.CarYear,B.EngineCC,B.MakeDescription
                ,A.[Discount_price_cctv],A.[Status_Middle]
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
                ,U.Insure_Code_Company,U.Insure_Company,U.Auto_ID
                ,L.[Type_Name],L.ID_Type_Auto
                ,E.CODE,E.TYPENAME
                FROM [Jmtib].[dbo].[TBL_TmpMiddleCar] A
                INNER JOIN [Jmtib].[dbo].[TBL_Car_Information]  B ON A.Code_Car = B.Code_Car
                INNER JOIN [Jmtib].[dbo].[TBL_CarCoverage] C ON A.ID_CoverRate = C.ID_CoverRate
                INNER JOIN [Jmtib].[dbo].[TBL_CarPackage] D ON A.IDPackage = D.IDPackage
                INNER JOIN [Jmtib].[dbo].[tb_InsureCompany] U ON A.Insure_Code_Company = U.Auto_ID
                INNER JOIN [Jmtib].[dbo].[TBL_InsuranceType] L ON A.ID_Type_Auto = L.ID_Type_Auto
                INNER JOIN [Jmtib].[dbo].[cartype] E ON A.CODE = E.CODE
                $wherenamegroup )AA WHERE  AA.row > '$start' And AA.row <= '$pageend'";
        return $this->db->query($query)->result();
    }
    
    
    
    //    insent ตารางกลาง [Jmtib].[dbo].[TBL_TmpMiddleCar]
    public function Insent_TmpMiddleCar($Insure_Code_Company, $Code_Car, $CODE, 
                $ID_CoverRate, $DetailCoverage1,$Insurance_price,$IDPackage,$Akon, $Tax, $Insurance_price_total, 
                $Discount_price_cctv, $ID_Type_Auto, $Group_Car,$SaveDate,$Status_Middle,$Username) {
        $query = "INSERT INTO  [Jmtib].[dbo].[TBL_TmpMiddleCar]([Insure_Code_Company],[Code_Car],[CODE],[ID_CoverRate],
            [DetailCoverage1],[Insurance_price],[IDPackage],[Akon],[Tax],[Insurance_price_total],[Discount_price_cctv],
            [ID_Type_Auto],[Group_Car],[Status],[SaveDate],[Status_Middle],[Save_By])            
        VALUES ('" . $Insure_Code_Company . "',
                '" . $Code_Car . "',
                '" . $CODE . "',    
                '" . $ID_CoverRate . "',    
                '" . $DetailCoverage1 . "',
                '" . $Insurance_price . "',
                '" . $IDPackage . "',
                '" . $Akon . "',
                '" . $Tax . "',
                '" . $Insurance_price_total . "',
                '" . $Discount_price_cctv . "',  
                '" . $ID_Type_Auto . "',    
                '" . $Group_Car . "',
                'Active',
                '" . $SaveDate . "',
                '" . $Status_Middle . "',
                '" . $Username . "')";
        $this->db->query($query);
    }
    
    //************************** ตาราง CoverRate ********************
    
    public function Select_data_CoverRate($whereCoverRate, $start, $pageend) {
        $query = "SELECT * FROM (SELECT ROW_NUMBER () OVER(ORDER BY ID_CoverRate) AS row,
             [ID_CoverRate],[IDPackage],[Insure_Code_Company],[HeadCoverage1],[HeadCoverage2],[HeadCoverage3]
            ,[HeadCoverage4],[HeadCoverage5],[HeadCoverage6],[HeadCoverage7],[HeadCoverage8]
            ,[HeadCoverage9],[HeadCoverage10],[DetailCoverage1] ,[DetailCoverage2],[DetailCoverage3],[DetailCoverage4],[DetailCoverage5]
            ,[DetailCoverage6],[DetailCoverage7],[DetailCoverage8],[DetailCoverage9],[DetailCoverage10],[Net_Insurance] 
            ,[Status_Coverage],[Save_By] ,[Save_date] FROM [Jmtib].[dbo].[TBL_CarCoverage] $whereCoverRate
            )AA  WHERE  AA.row > '$start' And AA.row <= '$pageend' ";
        return $this->db->query($query)->result();
    }
    
    
    public function Count_data_CoverRate($whereCoverRate) {
        $query = "SELECT COUNT(AA.ID_CoverRate) AS Count FROM (SELECT [ID_CoverRate]
        ,[IDPackage],[Insure_Code_Company],[HeadCoverage1],[HeadCoverage2],[HeadCoverage3]
        ,[HeadCoverage4],[HeadCoverage5],[HeadCoverage6],[HeadCoverage7],[HeadCoverage8]
        ,[HeadCoverage9],[HeadCoverage10],[DetailCoverage1] ,[DetailCoverage2],[DetailCoverage3],[DetailCoverage4],[DetailCoverage5]
        ,[DetailCoverage6],[DetailCoverage7],[DetailCoverage8],[DetailCoverage9],[DetailCoverage10] ,[Net_Insurance] 
        ,[Status_Coverage],[Save_By] ,[Save_date] FROM [Jmtib].[dbo].[TBL_CarCoverage] $whereCoverRate ) AA ";
        return $this->db->query($query)->result();
    }
    
    
    
    public function Insert_TmpCarCoverage($IDPackage, $Insure_Code_Company, $HeadCoverage1, $HeadCoverage2,
            $HeadCoverage3, $HeadCoverage4, $HeadCoverage5, $HeadCoverage6, $HeadCoverage7, $HeadCoverage8, 
            $HeadCoverage9, $HeadCoverage10,$DetailCoverage1,$DetailCoverage2,$DetailCoverage3,$DetailCoverage4,
       $DetailCoverage5 ,$DetailCoverage6,$DetailCoverage7,$DetailCoverage8,$DetailCoverage9,$DetailCoverage10 
       ,$Net_Insurance,$Username,$SaveDate,$StatusCoverage_Check) {
        $query = "INSERT INTO [Jmtib].[dbo].[TBL_TmpCarCoverage] ([IDPackage],[Insure_Code_Company],
        [HeadCoverage1],[HeadCoverage2],[HeadCoverage3],[HeadCoverage4],[HeadCoverage5],[HeadCoverage6],
        [HeadCoverage7],[HeadCoverage8],[HeadCoverage9],[HeadCoverage10],[DetailCoverage1] ,
        [DetailCoverage2],[DetailCoverage3],[DetailCoverage4],[DetailCoverage5] ,[DetailCoverage6]
       ,[DetailCoverage7],[DetailCoverage8],[DetailCoverage9],[DetailCoverage10] ,[Net_Insurance] 
       ,[Save_By],[Save_date],[Status_Coverage],[StatusCoverage_Check])        
        VALUES ('" . $IDPackage . "',
		'" . $Insure_Code_Company . "',
		'" . $HeadCoverage1 . "',
                '" . $HeadCoverage2 . "',
                '" . $HeadCoverage3 . "',
                '" . $HeadCoverage4 . "',
                '" . $HeadCoverage5 . "',
                '" . $HeadCoverage6 . "',
                '" . $HeadCoverage7 . "',
                '" . $HeadCoverage8 . "',
                '" . $HeadCoverage9 . "',
                '" . $HeadCoverage10 . "',
                '" . $DetailCoverage1 . "',
                '" . $DetailCoverage2 . "',
                '" . $DetailCoverage3 . "',
                '" . $DetailCoverage4 . "',
                '" . $DetailCoverage5 . "',
                '" . $DetailCoverage6 . "',
                '" . $DetailCoverage7 . "',
                '" . $DetailCoverage8 . "',
                '" . $DetailCoverage9 . "',
                '" . $DetailCoverage10 . "',
                '" . $Net_Insurance . "',
                '" . $Username . "',
                '" . $SaveDate . "',
                'Active',    
		'". $StatusCoverage_Check. "')";
        $this->db->query($query);
    }
    
    
      public function Select_dataTmp_CoverRate($whereCoverRate, $start, $pageend) {
        $query = "SELECT * FROM (SELECT ROW_NUMBER () OVER(ORDER BY ID_CoverRate) AS row,
             [ID_CoverRate],[IDPackage],[Insure_Code_Company],[HeadCoverage1],[HeadCoverage2],[HeadCoverage3]
            ,[HeadCoverage4],[HeadCoverage5],[HeadCoverage6],[HeadCoverage7],[HeadCoverage8]
            ,[HeadCoverage9],[HeadCoverage10],[DetailCoverage1] ,[DetailCoverage2],[DetailCoverage3],[DetailCoverage4],[DetailCoverage5]
            ,[DetailCoverage6],[DetailCoverage7],[DetailCoverage8],[DetailCoverage9],[DetailCoverage10],[Net_Insurance] 
            ,[Status_Coverage],[Save_By] ,[Save_date],[StatusCoverage_Check] FROM [Jmtib].[dbo].[TBL_TmpCarCoverage]  $whereCoverRate
            )AA  WHERE  AA.row > '$start' And AA.row <= '$pageend' ";
        return $this->db->query($query)->result();
    }

    public function CountTmp_data_CoverRate($whereCoverRate) {
        $query = "SELECT COUNT(AA.ID_CoverRate) AS Count FROM (SELECT [ID_CoverRate]
        ,[IDPackage],[Insure_Code_Company],[HeadCoverage1],[HeadCoverage2],[HeadCoverage3]
        ,[HeadCoverage4],[HeadCoverage5],[HeadCoverage6],[HeadCoverage7],[HeadCoverage8]
        ,[HeadCoverage9],[HeadCoverage10],[DetailCoverage1] ,[DetailCoverage2],[DetailCoverage3],[DetailCoverage4],[DetailCoverage5]
        ,[DetailCoverage6],[DetailCoverage7],[DetailCoverage8],[DetailCoverage9],[DetailCoverage10] ,[Net_Insurance] 
        ,[Status_Coverage],[Save_By] ,[Save_date],[StatusCoverage_Check] FROM [Jmtib].[dbo].[TBL_TmpCarCoverage]  $whereCoverRate ) AA ";
        return $this->db->query($query)->result();
    }
    
    public function Status_updateCoverRate($ID_CoverRate, $Status_Coverage) {
        $query = "UPDATE  [Jmtib].[dbo].[TBL_CarCoverage]
                  SET [Status_Coverage] = '$Status_Coverage'
                  WHERE ID_CoverRate = '$ID_CoverRate'";
        $this->db->query($query);
    }
    
    public function Get_IDPackage() {
        $query = "SELECT [IDPackage],[NamePackage] FROM [Jmtib].[dbo].[TBL_CarPackage] GROUP BY [IDPackage],[NamePackage]";

        return $this->db->query($query)->result();
    }
    
    public function UpdateTmpCoverage($ID_CoverRate, $IDPackageEdit, $Insure_Code_CompanyEdit,
    $DetailCoverage2Edit, $DetailCoverage3Edit, $DetailCoverage4Edit, $DetailCoverage5Edit, $DetailCoverage6Edit, $DetailCoverage7Edit 
   ,$DetailCoverage8Edit, $DetailCoverage9Edit, $DetailCoverage10Edit,  $DetailCoverage1Edit, $Net_InsuranceEdit, $Status_Car, $Username, $SaveDate) {
        $query = "UPDATE  [Jmtib].[dbo].[TBL_TmpCarCoverage]
                SET    [IDPackage] = '$IDPackageEdit'
                      ,[Insure_Code_Company] = '$Insure_Code_CompanyEdit'
                      ,[DetailCoverage1] = '$DetailCoverage1Edit'
                      ,[DetailCoverage2] = '$DetailCoverage2Edit'
                      ,[DetailCoverage3] = '$DetailCoverage3Edit'
                      ,[DetailCoverage4] = '$DetailCoverage4Edit'
                      ,[DetailCoverage5] = '$DetailCoverage5Edit'
                      ,[DetailCoverage6] = '$DetailCoverage6Edit'
                      ,[DetailCoverage7] = '$DetailCoverage7Edit'
                      ,[DetailCoverage8] = '$DetailCoverage8Edit'
                      ,[DetailCoverage9] = '$DetailCoverage9Edit'
                      ,[DetailCoverage10] = '$DetailCoverage10Edit'
                      ,[Net_Insurance]= '$Net_InsuranceEdit'
                      ,[Status_Coverage]= '$Status_Car'
                      ,[Save_By]= '$Username'
                      ,[Save_date] = '$SaveDate'
                      ,[StatusCoverage_Check] = '0'

                  WHERE  ID_CoverRate = '$ID_CoverRate'";

        $this->db->query($query);
    }
    
    
    
        public function Update_Coverage($ID_CoverRate, $IDPackage, $Insure_Code_Company,
    $DetailCoverage2, $DetailCoverage3, $DetailCoverage4, $DetailCoverage5, $DetailCoverage6, $DetailCoverage7 
   ,$DetailCoverage8, $DetailCoverage9, $DetailCoverage10,  $DetailCoverage1, $Net_Insurance, $Status_Coverage, $Username, $SaveDate) {
        $query = "UPDATE  [Jmtib].[dbo].[TBL_CarCoverage]
                SET    [IDPackage] = '$IDPackage'
                      ,[Insure_Code_Company] = '$Insure_Code_Company'
                      ,[DetailCoverage1] = '$DetailCoverage1'
                      ,[DetailCoverage2] = '$DetailCoverage2'
                      ,[DetailCoverage3] = '$DetailCoverage3'
                      ,[DetailCoverage4] = '$DetailCoverage4'
                      ,[DetailCoverage5] = '$DetailCoverage5'
                      ,[DetailCoverage6] = '$DetailCoverage6'
                      ,[DetailCoverage7] = '$DetailCoverage7'
                      ,[DetailCoverage8] = '$DetailCoverage8'
                      ,[DetailCoverage9] = '$DetailCoverage9'
                      ,[DetailCoverage10] = '$DetailCoverage10'
                      ,[Net_Insurance]= '$Net_Insurance'
                      ,[Status_Coverage]= '$Status_Coverage'
                      ,[Save_By]= '$Username'
                      ,[Save_date] = '$SaveDate'
                          
                  WHERE  ID_CoverRate = '$ID_CoverRate'";

        $this->db->query($query);
    }
    
    public function Update_Checkcorrect_Coverage($where) {
        $query = "UPDATE [Jmtib].[dbo].[TBL_TmpCarCoverage] SET $where";

        $this->db->query($query);
    }
    
    // insent เข้า ฐานจริง [Jmtib].[dbo].[TBL_CarCoverage] รอบทุดท้ายเสร็จเรียบร้อยแล้ว Status_Check 1 คือ ตรวจสอบถูกต้องเรียบร้อยแล้ว
    public function Insert_AddTmp_CarCoverage() {
        $query = "INSERT INTO  [Jmtib].[dbo].[TBL_CarCoverage]
            ([IDPackage],[Insure_Code_Company],[HeadCoverage1],[HeadCoverage2],[HeadCoverage3],[HeadCoverage4]
            ,[HeadCoverage5],[HeadCoverage6] ,[HeadCoverage7],[HeadCoverage8],[HeadCoverage9] ,[HeadCoverage10]
            ,[DetailCoverage1],[DetailCoverage2] ,[DetailCoverage3],[DetailCoverage4],[DetailCoverage5]
            ,[DetailCoverage6],[DetailCoverage7],[DetailCoverage8] ,[DetailCoverage9],[DetailCoverage10]
            ,[Net_Insurance] ,[Status_Coverage] ,[Save_By] ,[Save_date])
        SELECT [IDPackage],[Insure_Code_Company],[HeadCoverage1],[HeadCoverage2] ,[HeadCoverage3],[HeadCoverage4]
            ,[HeadCoverage5] ,[HeadCoverage6],[HeadCoverage7],[HeadCoverage8],[HeadCoverage9],[HeadCoverage10]
            ,[DetailCoverage1],[DetailCoverage2],[DetailCoverage3],[DetailCoverage4],[DetailCoverage5]
            ,[DetailCoverage6] ,[DetailCoverage7],[DetailCoverage8],[DetailCoverage9],[DetailCoverage10]
            ,[Net_Insurance],[Status_Coverage],[Save_By] ,[Save_date]
        FROM [Jmtib].[dbo].[TBL_TmpCarCoverage] where StatusCoverage_Check = '0'";
        $this->db->query($query);
    }
    
    //คือ สถานะที่บันทึกเสร็จเรียบร้อย Updata ให้เป็น 2 เพื่อนไม่ให้ กวาดไป insent อีก
    public function UpdateCheckSuccess_Coverage($Username) {
        $query = "UPDATE  [Jmtib].[dbo].[TBL_TmpCarCoverage]
                 SET  [StatusCoverage_Check] = '1' 
                 WHERE  Save_By = '$Username' AND  StatusCoverage_Check <> '1'";

        $this->db->query($query);
    }
    
    // DELETE TBL_TmpCarCoverage
    public function DELETE_ADDTMPCOVERRATE($Username, $ID_CoverRate) {
        $query = " DELETE FROM [Jmtib].[dbo].[TBL_TmpCarCoverage] WHERE  Save_By = '$Username' AND ID_CoverRate = '$ID_CoverRate'";
        $this->db->query($query);
    }
    
    // UPDATE TBL_TmpCarCoverage หลังจาก Export แล้ว Check แล้วว่ามีผิดต้องการที่จะแก้ไข 
       public function UpdateTmpmiddle($Middle_ID, $Insure_Code_Company, $CODE, $Code_Car, $IDCoverRate,
       $DetailCoverage1, $Insurance_price, $IDPackage, $Akon, $Tax, $Insurance_price_total, $Discount_price_cctv
       , $ID_Type_Auto, $Group_Car, $Status, $SaveDate, $Status_Middle, $Username) {
        $query = "UPDATE [Jmtib].[dbo].[TBL_TmpMiddleCar]
                  SET [Insure_Code_Company] = '$Insure_Code_Company'
                    ,[Code_Car]  = '$Code_Car'
                    ,[CODE]  = '$CODE'
                    ,[ID_CoverRate]  = '$IDCoverRate'
                    ,[DetailCoverage1]  = '$DetailCoverage1'
                    ,[Insurance_price]  = '$Insurance_price'
                    ,[IDPackage]  = '$IDPackage'
                    ,[Akon]  = '$Akon'
                    ,[Tax]  = '$Tax'
                    ,[Insurance_price_total]  = '$Insurance_price_total'
                    ,[Discount_price_cctv]  = '$Discount_price_cctv'
                    ,[ID_Type_Auto]  = '$ID_Type_Auto'
                    ,[Group_Car]  = '$Group_Car'
                    ,[Status]  = '$Status'
                    ,[SaveDate]  = '$SaveDate'
                    ,[Status_Middle] = '$Status_Middle'
                    ,[Save_by] = '$Username'

                WHERE Middle_ID = '$Middle_ID'  AND  Save_by = '$Username'";

        $this->db->query($query);
    }
    
    // update status Active/Nonactive
    public function Status_updatemiddle($Middle_ID,$Status) {
        $query = "UPDATE  [Jmtib].[dbo].[TBL_MiddleCarInsurance]
                  SET Status = '$Status'
                  WHERE Middle_ID = '$Middle_ID'";
        $this->db->query($query);
    }
    


    // DELETE_TABLE_TBL_TMPADD 
    public function DELETE_ADDTMPMiddle($Middle_ID, $Username) {
        $query = "DELETE  FROM [Jmtib].[dbo].[TBL_TmpMiddleCar] WHERE  Middle_ID = '$Middle_ID' AND Save_By = '$Username' AND Status_Middle = '0'";
        $this->db->query($query);
    }
    
    // update status  เพื่อ ติ้กว่าต้องการบันทึกข้อมูลอันไหนบ้างโดย update status เปน 1 ก่อน ถึงจะ กวาดไปบันทึกฐานจริง
     public function Update_Checkcorrect_Middle($where) {
        $query = "UPDATE [Jmtib].[dbo].[TBL_TmpMiddleCar] SET $where";

        $this->db->query($query);
    }
    
    // insent เข้า ฐานจริง [Jmtib].[dbo].[TBL_MiddleCarInsurance] รอบทุดท้ายเสร็จเรียบร้อยแล้ว Status_Middle 1 คือ ตรวจสอบถูกต้องเรียบร้อยแล้ว
    public function Insert_AddTmp_Middle($Username) {
        $query = "INSERT INTO [Jmtib].[dbo].[TBL_MiddleCarInsurance]  
                ([Insure_Code_Company],[Code_Car],[CODE] ,[ID_CoverRate]
                ,[DetailCoverage1],[Insurance_price],[IDPackage],[Akon]
                ,[Tax],[Insurance_price_total],[Discount_price_cctv],[ID_Type_Auto]
                ,[Group_Car],[Status],[SaveDate],[Save_by])
         SELECT [Insure_Code_Company],[Code_Car],[CODE],[ID_CoverRate],
         [DetailCoverage1],[Insurance_price],[IDPackage],[Akon]
        ,[Tax],[Insurance_price_total],[Discount_price_cctv],[ID_Type_Auto]
        ,[Group_Car],[Status] ,[SaveDate],[Save_by]
         FROM [Jmtib].[dbo].[TBL_TmpMiddleCar] WHERE [Status_Middle] = '0' AND  [Save_by] = '$Username'";
        $this->db->query($query);
    }
    
    
    //คือ สถานะที่บันทึกเสร็จเรียบร้อย Updata ให้เป็น 1 เพื่อนไม่ให้ กวาดไป insent อีก
    public function UpdateCheckSuccess_TmpMiddleCar($Username) {
        $query = "UPDATE  [Jmtib].[dbo].[TBL_TmpMiddleCar]
                 SET  [Status_Middle] = '1' 
                 WHERE  Save_By = '$Username' AND Status_Middle <> '1' AND Status_Middle <> '2'";

        $this->db->query($query);
    }
    
        
    // update statusALL Active/Nonactive 
    public function StatusAllUpdatemiddle($whereStatusMiddle) {
        $query = "UPDATE  [Jmtib].[dbo].[TBL_MiddleCarInsurance] $whereStatusMiddle ";
        $this->db->query($query);
    }
    
    public function Get_StatusMiddle($whereStatus) {
        $query = "SELECT [Middle_ID],[Status]
        FROM [Jmtib].[dbo].[TBL_MiddleCarInsurance]  $whereStatus";

        return $this->db->query($query)->result();
    }

    public function Get_CarYearExport() {

        $query = "SELECT [CarYear] FROM [Jmtib].[dbo].[TBL_Car_Information] GROUP BY [CarYear] ORDER BY [CarYear] ASC";

        return $this->db->query($query)->result();
    }

    public function GetCarBrandExport($CarYear) {

        $query = "SELECT [CarBrand] FROM [Jmtib].[dbo].[TBL_Car_Information] where [CarYear] = '$CarYear' GROUP BY [CarBrand]";

        return $this->db->query($query)->result();
    }

    public function GetCarModelExport($CarBrand) {

       $query = " SELECT [CarModel] FROM [Jmtib].[dbo].[TBL_Car_Information] where [CarBrand] = '$CarBrand' GROUP BY [CarModel]";

        return $this->db->query($query)->result();
    }
    


}
