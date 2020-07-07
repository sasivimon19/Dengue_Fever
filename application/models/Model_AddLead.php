<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Model_AddLead extends CI_Model {

    function __construct() {
        parent::__construct();
    }

     function Current_date() {
        $query = "SELECT convert(smalldatetime,GETDATE()) AS Currentdate";
        return $this->db->query($query)->result();
    }
    function Save_AddLead($int,$CUSTOMERFIRSTNAME,$CUSTOMERLASTNAME,$CUSTOMERTEL1,$CARBRAND,$CARDESC,$CARYEAR,$CARLICENSEPLATE,$EMP,$PolicyDate) {
        $query = "EXEC [Jmtib].[dbo].[SP_ADD_TBL_PROSPECT_LIST] '$int','$CUSTOMERFIRSTNAME','$CUSTOMERLASTNAME','$CUSTOMERTEL1','$CARBRAND','$CARDESC','$CARYEAR','$CARLICENSEPLATE','$EMP','$PolicyDate'";
         $this->db->query($query);
    }
    function Get_PROSPECT_LIST_TEST($where,$start,$pageend){
    	$query="SELECT * FROM (
					SELECT ROW_NUMBER()OVER (ORDER BY PROSPECT_LIST_ID DESC)as  row ,(CustomerFirstname+' '+CustomerLastname) AS 'Fullname',* FROM [Jmtib].[dbo].[TBL_PROSPECT_LIST] $where
				)AA   WHERE (row > '$start' AND row <= '$pageend')";
    	return $this->db->query($query)->result();

    }
    function Count_PROSPECT_LIST_TEST($where){
    	$query="SELECT  COUNT(PROSPECT_LIST_ID) AS 'Count' FROM [Jmtib].[dbo].[TBL_PROSPECT_LIST] $where ";
    	return $this->db->query($query)->result();

    }
    function update_PROSPECT_LIST_TEST($prefix,$fname,$lastname,$tel,$brand_car,$model_car,$year_car,$paper_car,$expiration_date,$PROSPECT_LIST_ID,$UserName){
        $query="UPDATE [Jmtib].[dbo].[TBL_PROSPECT_LIST] set int='$prefix',CustomerFirstname='$fname',CustomerLastname='$lastname',
                CustomeTel1='$tel',CarBrand='$brand_car',CarDesc='$model_car', CarYear='$year_car',CarLicensePlate='$paper_car',RefInsurance_Date='$expiration_date' WHERE PROSPECT_LIST_ID='$PROSPECT_LIST_ID' AND Save_By='$UserName'";
        $this->db->query($query);
    }

}
