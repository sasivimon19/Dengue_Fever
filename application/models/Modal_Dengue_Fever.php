<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Modal_Dengue_Fever extends CI_Model {

    function __construct() {
        parent::__construct();
    }

//    function _checklogin($Username, $Password) {
//        $query1 = "SELECT *  FROM  [CORESYSTEM].[dbo].[Tbl_USERLOGIN_APIJP] WHERE Username = LTRIM(RTRIM('$Username')) AND  Password = LTRIM(RTRIM('$Password')) AND Status = '1'";
//        return $this->db->query($query1)->result();
//    }

     public function _checklogin($Username, $Password) {

        $query = "EXEC [dbo].[SP_LOGIN_APIDENGUEFEVER] '$Username','$Password'";

        return $this->db->query($query)->result();
    }

    public function Current_date() {
        $query = "SELECT convert(smalldatetime,GETDATE()) AS Currentdate";
        return $this->db->query($query)->result();
    }

    public function Get_Dengue_Fever() {
        $query = "SELECT * FROM  [CORESYSTEM].[dbo].[Temp_DengueFever]";
        return $this->db->query($query)->result();
    }
    
    public function Select_TITLE($Title) {
        $query = "SELECT [TITLE_CODE],[TITLE],[SEX] FROM [CORESYSTEM].[dbo].[TITLE_JP] where TITLE = '$Title'";
        return $this->db->query($query)->result();
    }

    public function SelectTrueDengueFever($Username, $start, $pageend) {
        $query = "SELECT * FROM (SELECT ROW_NUMBER () OVER(ORDER BY [Date_Save] DESC) AS row, 
                [ID_Timp],[functionName] ,[Title] ,[FirstName] ,[LastName] ,
                [Address] ,[AmphorCode] ,[ProvinceCode] ,[PostCode] ,[IDCard] ,[Birthday] ,
                [Mobile] ,[Occp] ,[Ben] ,[Email] ,[Coverage] ,[IDCard_Close]  ,[Number_Ref],[User_Save] ,[Date_Save] ,[Status_API]
                ,[Status] FROM [CORESYSTEM].[dbo].[Temp_DengueFever] where User_Save = '$Username' AND Status = '2' )AA
                 WHERE   AA.row > '$start' And AA.row <= '$pageend'";

        return $this->db->query($query)->result();
    }
    
    public function SelectTrueDengueFevererror($Username,$wheresuccess, $start, $pageend) {
        $query = "SELECT * FROM (SELECT ROW_NUMBER () OVER(ORDER BY [Date_Save] DESC) AS row, 
                [ID_Timp],[functionName] ,[Title] ,[FirstName] ,[LastName] ,
                [Address] ,[AmphorCode] ,[ProvinceCode] ,[PostCode] ,[IDCard] ,[Birthday] ,
                [Mobile] ,[Occp] ,[Ben] ,[Email] ,[Coverage] ,[IDCard_Close] ,[Number_Ref],[User_Save] ,[Date_Save]
                ,[Status] FROM [CORESYSTEM].[dbo].[Temp_DengueFever] where User_Save = '$Username'  $wheresuccess )AA
                 WHERE   AA.row > '$start' And AA.row <= '$pageend'";

        return $this->db->query($query)->result();
    }
    
       public function Select_TrueDengueFever($Username,$wheresuccess, $start, $pageend) {
        $query = "SELECT * FROM (SELECT ROW_NUMBER () OVER(ORDER BY [Date_Save] DESC) AS row, 
                [ID_Timp],[functionName] ,[Title] ,[FirstName] ,[LastName] ,
                [Address] ,[AmphorCode] ,[ProvinceCode] ,[PostCode] ,[IDCard] ,[Birthday] ,
                [Mobile] ,[Occp] ,[Ben] ,[Email] ,[Coverage] ,[IDCard_Close] ,[Number_Ref],[User_Save] ,[Date_Save]
                ,[Status] FROM [CORESYSTEM].[dbo].[Dengue_Fever] where User_Save = '$Username'  $wheresuccess )AA
                 WHERE   AA.row > '$start' And AA.row <= '$pageend'";

        return $this->db->query($query)->result();
    }
    
    
    
    public function CountTrue_DengueFever($Username) {
        $query = " SELECT COUNT(IDCard) AS Count FROM [CORESYSTEM].[dbo].[Dengue_Fever] where User_Save = '$Username' AND Status = '1'";

        return $this->db->query($query)->result();
    }

    public function CountTrueDengueFevererror($Username,$wheresuccess) {
        $query = "SELECT COUNT(IDCard) AS Count FROM [CORESYSTEM].[dbo].[Temp_DengueFever] where User_Save = '$Username' $wheresuccess ";

        return $this->db->query($query)->result();
    }

    public function CountTrueDengueFever($Username) {
        $query = "SELECT COUNT(IDCard) AS Count FROM [CORESYSTEM].[dbo].[Temp_DengueFever] where User_Save = '$Username' AND Status = '2' ";

        return $this->db->query($query)->result();
    }
    
        
    public function SelectDengueFever($Username) {

        $query = "SELECT * FROM (SELECT ROW_NUMBER () OVER(ORDER BY [Date_Save] DESC) AS row, 
                [ID_Timp],[functionName] ,[Title] ,[FirstName] ,[LastName] ,
                [Address] ,[AmphorCode] ,[ProvinceCode] ,[PostCode] ,[IDCard],[Birthday] ,
                [Mobile] ,[Occp] ,[Ben] ,[Email] ,[Coverage] ,[IDCard_Close],[Number_Ref],[User_Save] ,[Date_Save] ,[Status_API]
                ,[Status] FROM [CORESYSTEM].[dbo].[Temp_DengueFever] where User_Save = '$Username' AND Status = '2')AA";

        return $this->db->query($query)->result();
    }

    public function SelectFalseDengueFever($Username, $start, $pageend) {
        $query = "SELECT * FROM (SELECT ROW_NUMBER () OVER(ORDER BY [Date_Save] DESC) AS row, 
                [ID_Timp],[functionName] ,[Title] ,[FirstName] ,[LastName] ,
                [Address] ,[AmphorCode] ,[ProvinceCode] ,[PostCode] ,[IDCard] ,[Birthday] ,
                [Mobile] ,[Occp] ,[Ben] ,[Email] ,[Coverage] ,[IDCard_Close]  ,[Number_Ref],[User_Save] ,[Date_Save] ,[Status_API]
                ,[Status] FROM [CORESYSTEM].[dbo].[Temp_DengueFever] where User_Save = '$Username' AND Status <> '2' AND Status <> 'SUCCESS')AA
                 WHERE   AA.row > '$start' And AA.row <= '$pageend'";

        return $this->db->query($query)->result();
    }

    public function SumSelectFalseDengueFever($Username) {
        $query = "SELECT * FROM (SELECT ROW_NUMBER () OVER(ORDER BY [Date_Save] DESC) AS row, 
                [ID_Timp],[functionName] ,[Title] ,[FirstName] ,[LastName] ,
                [Address] ,[AmphorCode] ,[ProvinceCode] ,[PostCode] ,[IDCard] ,[Birthday] ,
                [Mobile] ,[Occp] ,[Ben] ,[Email] ,[Coverage] ,[IDCard_Close]  ,[Number_Ref],[User_Save] ,[Date_Save] ,[Status_API]
                ,[Status] FROM [CORESYSTEM].[dbo].[Temp_DengueFever] where User_Save = '$Username' AND Status <> '2' AND Status <> 'SUCCESS')AA";

        return $this->db->query($query)->result();
    }

    public function CountFalseDengueFever($Username) {
        $query = "SELECT COUNT(IDCard) AS Count FROM [CORESYSTEM].[dbo].[Temp_DengueFever] where User_Save = '$Username' AND Status <> '2' AND Status <> 'SUCCESS' ";

        return $this->db->query($query)->result();
    }
    

    public function Select_Temp_DengueFever($Username) {
        $query = "SELECT A.[ID_Timp],A.[functionName]
                ,A.[Title]
                ,B.[TITLE_CODE]
                ,B.[TITLE]
                ,B.[SEX] 
                ,A.[FirstName]
                ,A.[LastName]
                ,A.[Address]
                ,A.[ProvinceCode]
                ,A.[PostCode]
                ,A.[IDCard]
                ,A.[Birthday]
                ,A.[Mobile]
                ,A.[Occp]
                ,A.[Ben]
                ,A.[Email]
                ,A.[Coverage]
                ,A.[IDCard_Close]
                ,A.[User_Save]
                ,A.[Date_Save]
                ,D.[DISTRICT]
                ,D.DISTRICT_CODE
                ,P.[PROVINCE_CODE]
        FROM [CORESYSTEM].[dbo].[Temp_DengueFever] A 
        INNER JOIN [CORESYSTEM].[dbo].[TITLE_JP]  B on B.Title = A.Title
        INNER JOIN [CORESYSTEM].[dbo].[PROVINCE_JP] P on  P.PROVINCE = A.ProvinceCode  
        INNER JOIN [CORESYSTEM].[dbo].[DISTRICT_JP] D on D.DISTRICT = A.AmphorCode AND D.PROVINCE_ID = P.PROVINCE_CODE
        WHERE A.User_Save = '$Username'";

        return $this->db->query($query)->result();
    }

    public  function CountIDCard($IDCard){
        $query="SELECT COUNT(IDCard) AS 'Count'
                FROM [CORESYSTEM].[dbo].[Dengue_Fever] where IDCard='$IDCard'";
        return $this->db->query($query)->result();
    }
    
    
      public function update_Temp_Detail_True($Username) {
        $query = "update [CORESYSTEM].[dbo].[Temp_DengueFever] set Title = B.TITLE_CODE ,
                  AmphorCode = D.DISTRICT_CODE ,ProvinceCode = P.PROVINCE_CODE
                ,Status = '2',Status_API = ''
                 FROM [CORESYSTEM].[dbo].[Temp_DengueFever] A 
                 INNER JOIN [CORESYSTEM].[dbo].[TITLE_JP]  B on B.Title = A.Title
                 INNER JOIN [CORESYSTEM].[dbo].[PROVINCE_JP] P on  P.PROVINCE = A.ProvinceCode  
                 INNER JOIN [CORESYSTEM].[dbo].[DISTRICT_JP] D on D.DISTRICT = A.AmphorCode 
                 AND D.PROVINCE_ID = P.PROVINCE_CODE  AND A.PostCode = D.POSTCODE
                 WHERE A.User_Save = '$Username' AND A.Status = '1'";
        
        $this->db->query($query);
    }

    public function Upload_Insert($functionName, $Title, $FirstName, $LastName, $Address, $AmphorCode, $ProvinceCode, 
        $PostCode, $IDCard, $Birthday, $Mobile, $Occp, $Ben, $Email, $Coverage, $IDCard_Close, $Username, $Date_Save,$Status,$Status_API) {
        $query = "INSERT INTO [CORESYSTEM].[dbo].[Temp_DengueFever]
        (functionName,Title,FirstName,LastName,Address,AmphorCode,ProvinceCode,PostCode
         ,IDCard,Birthday,Mobile,Occp,Ben,Email,Coverage,IDCard_Close,User_Save,Date_Save,Status,Status_API)        
        VALUES ('" . $functionName . "',
		'" . $Title . "',
		'" . $FirstName . "',
                '" . $LastName . "',
                '" . $Address . "',
                '" . $AmphorCode . "',    
                '" . $ProvinceCode . "',
		'" . $PostCode . "',
                '" . $IDCard . "',
                '" . $Birthday . "',
                '" . $Mobile . "',
                '" . $Occp . "',    
                '" . $Ben . "',
		'" . $Email . "',
                '" . $Coverage . "',
                '" . $IDCard_Close . "',
                '" . $Username . "',
                '" . $Date_Save . "',
                '" . $Status . "',
		'" . $Status_API . "')";

        $this->db->query($query);
    }

    public function update_Temp_Detail($TITLE_CODE, $DISTRICT_CODE, $PROVINCE_CODE, $Occp, $Status, $IDCard, $Username) {
        $query = "UPDATE [CORESYSTEM].[dbo].[Temp_DengueFever]
                 SET  Title = '$TITLE_CODE'
                ,AmphorCode = '$DISTRICT_CODE'
                ,ProvinceCode = '$PROVINCE_CODE'
                ,Occp = '$Occp'
                ,Status = '$Status'
                 WHERE IDCard = '$IDCard' AND User_Save = '$Username' AND Status = '1'";
        $this->db->query($query);
    }

    public function update_Temp_DengueFever($where,$Username,$ID_Timp) {
        $query = "UPDATE [CORESYSTEM].[dbo].[Temp_DengueFever]
                  SET $where
                  WHERE  User_Save = '$Username' AND ID_Timp = '$ID_Timp'";
        $this->db->query($query);
    }
    
    
    public function UpdateDengueFever($Username) {
        $query = "UPDATE [CORESYSTEM].[dbo].[Dengue_Fever]
                 SET  Status = '00' 
                 FROM [CORESYSTEM].[dbo].[Dengue_Fever] 
                 WHERE User_Save = '$Username' AND Status = '1'";
        $this->db->query($query);
    }

    public function InsertDengueFever($functionName, $Title, $FirstName, $LastName, $Address, $AmphorCode, 
              $ProvinceCode, $PostCode, $IDCard, $Birthday, $Mobile, $Occp, $Ben, $Email, $Coverage, 
              $IDCard_Close,$Number_Ref,$Username, $Date_Save) {
        $query = "INSERT INTO [CORESYSTEM].[dbo].[Dengue_Fever] 
        (functionName,Title,FirstName,LastName,Address,AmphorCode,ProvinceCode,PostCode
         ,IDCard,Birthday,Mobile,Occp,Ben,Email,Coverage,IDCard_Close,Number_Ref,User_Save,Date_Save,Status)        
        VALUES ('" . $functionName . "',
		'" . $Title . "',
		'" . $FirstName . "',
                '" . $LastName . "',
                '" . $Address . "',
                '" . $AmphorCode . "',    
                '" . $ProvinceCode . "',
		'" . $PostCode . "',
                '" . $IDCard . "',
                '" . $Birthday . "',
                '" . $Mobile . "',
                '" . $Occp . "',    
                '" . $Ben . "',
		'" . $Email . "',
                '" . $Coverage . "',
                '" . $IDCard_Close . "',
                '" . $Number_Ref . "',
                '" . $Username . "',
                '" . $Date_Save . "',
		'1')";

        $this->db->query($query);
    }
    
    
    public function Delete_TmpDengueFever($Username) {

        $query = "DELETE  FROM [CORESYSTEM].[dbo].[Temp_DengueFever]  where User_Save = '$Username' AND Status = 'SUCCESS'";

        return $this->db->query($query);
    }

    public function DeleteTmpDengueFeverTotal($Username) {

        $query = "DELETE  FROM [CORESYSTEM].[dbo].[Temp_DengueFever]  where User_Save = '$Username'";

        return $this->db->query($query);
    }

    public function SearchTrueDengueFever($whereUsername, $start, $pageend) {

        $query = "SELECT * FROM (SELECT ROW_NUMBER () OVER(ORDER BY [Date_Save] DESC) AS row, 
                [ID_Timp],[functionName] ,[Title] ,[FirstName] ,[LastName] ,
                [Address] ,[AmphorCode] ,[ProvinceCode] ,[PostCode] ,[IDCard] ,[Birthday] ,
                [Mobile] ,[Occp] ,[Ben] ,[Email] ,[Coverage] ,[IDCard_Close] ,[Number_Ref],[User_Save] ,[Date_Save]
                ,[Status] FROM [CORESYSTEM].[dbo].[Dengue_Fever] $whereUsername )AA
                 WHERE   AA.row > '$start' And AA.row <= '$pageend'";

        return $this->db->query($query)->result();
    }
    
    
//    public function SearchTrueDengueFeverTotal($whereUsername) {
//        $query = "SELECT ROW_NUMBER () OVER(ORDER BY [Date_Save] DESC) AS row, 
//                [ID_Timp],[functionName] ,[Title] ,[FirstName] ,[LastName] ,
//                [Address] ,[AmphorCode] ,[ProvinceCode] ,[PostCode] ,[IDCard] ,[Birthday] ,
//                [Mobile] ,[Occp] ,[Ben] ,[Email] ,[Coverage] ,[IDCard_Close] ,[Number_Ref],[User_Save] ,[Date_Save]
//                ,[Status] FROM [CORESYSTEM].[dbo].[Dengue_Fever] $whereUsername";
//              
//        return $this->db->query($query)->result();
//    }
    
       public function SearchTrueDengueFeverTotal($whereUsername) {

        $query = "SELECT ROW_NUMBER () OVER(ORDER BY A.Date_Save DESC) AS row, 
              A.[ID_Timp], A.[functionName] , A.[Title] , A.[FirstName] , A.[LastName] ,
              A.[Address]  , A.[PostCode] , A.[IDCard] , A.[Birthday] ,
              A.[Mobile] , A.[Occp] ,[Ben] , A.[Email] , A.[Coverage] , A.[IDCard_Close] 
              ,A.[Number_Ref], A.[User_Save] , A.[Date_Save]  , A.[Status] ,D.[PROVINCE_ID], A.[AmphorCode] , A.[ProvinceCode],
              D.[DISTRICT_CODE],D.[DISTRICT],P.[PROVINCE_CODE] ,P.[PROVINCE]
              FROM [CORESYSTEM].[dbo].[Dengue_Fever]  A
              INNER JOIN   [CORESYSTEM].[dbo].[DISTRICT_JP] D ON D.DISTRICT_CODE = A.AmphorCode 
              INNER JOIN  [CORESYSTEM].[dbo].[PROVINCE_JP] P ON P.PROVINCE_CODE = A.ProvinceCode
              $whereUsername ";


        return $this->db->query($query)->result();
    }

    public function CountSearchTrueDengueFever($whereUsername) {

        $query = "SELECT COUNT(IDCard) AS Count FROM [CORESYSTEM].[dbo].[Dengue_Fever] $whereUsername ";

        return $this->db->query($query)->result();
    }

    public function GETOCCUPATION() {

        $query = "SELECT CODE_OCCUP,Occupation FROM [CORESYSTEM].[dbo].[OCCUPATION_JP] ORDER BY CODE_OCCUP";

        return $this->db->query($query)->result();
    }
    
    
       public function GETDistrict() {

        $query = "SELECT [PROVINCE_ID],[DISTRICT_CODE],[DISTRICT] FROM [CORESYSTEM].[dbo].[DISTRICT_JP]";

        return $this->db->query($query)->result();
    }
    
     public function GETPROVINCE() {

        $query = "SELECT [PROVINCE_CODE],[PROVINCE] FROM [CORESYSTEM].[dbo].[PROVINCE_JP]";

        return $this->db->query($query)->result();
    }
    
     public function GETTITLE() {

        $query = "SELECT [TITLE_CODE],[TITLE],[SEX] FROM [CORESYSTEM].[dbo].[TITLE_JP]";

        return $this->db->query($query)->result();
    }
    
    
        public function SearchOccupation($whereUsername) {

        $query = "SELECT [CODE_OCCUP],[Occupation] FROM [CORESYSTEM].[dbo].[OCCUPATION_JP] $whereUsername";

        return $this->db->query($query)->result();
    }
    
    
    
    public function SearchDISTRICT($whereUsername) {

        $query = "SELECT [PROVINCE_ID],[DISTRICT_CODE],[DISTRICT]FROM [CORESYSTEM].[dbo].[DISTRICT_JP] $whereUsername";

        return $this->db->query($query)->result();
    }
            
            
    public function SearchPROVINCE($whereUsername) {

        $query = "SELECT [PROVINCE_CODE],[PROVINCE] FROM [CORESYSTEM].[dbo].[PROVINCE_JP] $whereUsername";

        return $this->db->query($query)->result();
    }
            
    public function SearchTITLE($whereUsername) {

        $query = "SELECT [TITLE_CODE],[TITLE],[SEX] FROM [CORESYSTEM].[dbo].[TITLE_JP] $whereUsername";

        return $this->db->query($query)->result();
    }
    
    
    public function Get_OCCUPATION() {

        $sql = "SELECT * FROM (SELECT ROW_NUMBER () OVER(ORDER BY CODE_OCCUP ASC) AS row, 
                [CODE_OCCUP],[Occupation] FROM [CORESYSTEM].[dbo].[OCCUPATION_JP] ) AA";

        return $this->db->query($sql)->result();
    }
    
    
    public function Get_Province() {

        $sql = "SELECT * FROM (SELECT ROW_NUMBER () OVER(ORDER BY PROVINCE ASC) AS row, 
                PROVINCE_CODE ,PROVINCE FROM [CORESYSTEM].[dbo].[PROVINCE_JP] ) AA";

        return $this->db->query($sql)->result();
    }
    
   public function Get_DISTRICT() {

        $sql = "SELECT * FROM (SELECT ROW_NUMBER () OVER(ORDER BY DISTRICT_CODE ASC) AS row, 
                PROVINCE_ID,DISTRICT_CODE ,[DISTRICT]FROM [CORESYSTEM].[dbo].[DISTRICT_JP] 
                where DISTRICT IS NOT NULL AND PROVINCE_ID IS NOT NULL AND DISTRICT_CODE IS NOT NULL) AA";

        return $this->db->query($sql)->result();
    }
    
    public function Get_Title() {

        $sql = "SELECT * FROM (SELECT ROW_NUMBER () OVER(ORDER BY TITLE_CODE ASC) AS row, 
                [TITLE_CODE],[TITLE],[SEX] FROM [CORESYSTEM].[dbo].[TITLE_JP] ) AA";

        return $this->db->query($sql)->result();
    }
    
    
    
    
    
}
