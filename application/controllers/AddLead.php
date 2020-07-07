<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set("Asia/Bangkok"); //เซตเวลา ว่าเอาเวลาของอะไร

 

class AddLead extends CI_Controller {
	public function __construct(){
		parent:: __construct();
	 	$this->load->library('session','upload');
 		$this->load->library('excel');
	 	$this->load->model('Model_AddLead','AddLead');
        $this->load->model('Model_HomeInsurance');  
	 	set_time_limit(0);
	 	ini_set('memory_limit', '-1');
	 }

     public function index(){

        $UserName = $this->session->userdata('Username');
        $where = " where Save_By ='".$UserName."'";
        $start = 0;
        $pageend = 15;

      
        $data['get_PROSPECT_LIST'] = $this->AddLead->Get_PROSPECT_LIST_TEST($where,$start,$pageend);
        $getcount = $this->AddLead->Count_PROSPECT_LIST_TEST($where); 
        $data['Count'] = $getcount[0]->Count;
        $data['pageend'] = $pageend;
        $data['numpage'] = 1;
        $data['Brandcar'] = $this->Model_HomeInsurance->Get_Brandcar(); //รุ่น
       $this->load->view('AddLead/index',$data);

     
     }
     public function SaveAdd_Lead(){

        $UserName = $this->session->userdata('Username');
        $prefix    = iconv("utf-8//ignore","tis-620//ignore",$this->input->post("prefix"));
        $fname     = iconv("utf-8//ignore","tis-620//ignore",$this->input->post("fname"));
        $lastname  = iconv("utf-8//ignore","tis-620//ignore",$this->input->post("lastname"));
        $model_car = iconv("utf-8//ignore","tis-620//ignore",$this->input->post("model_car"));
        $brand_car = iconv("utf-8//ignore","tis-620//ignore",$this->input->post("brand_car"));
        $year_car  = iconv("utf-8//ignore","tis-620//ignore",$this->input->post("year_car"));
        $tel       = $this->input->post("tel");
        $paper_car = iconv("utf-8//ignore","tis-620//ignore",$this->input->post("paper_car")); 
        $expiration_date = date("Y-m-d H:i:s.00",strtotime($this->input->post("expiration_date")));

        $int               = $prefix;
        $CUSTOMERFIRSTNAME = $fname;
        $CUSTOMERLASTNAME  = $lastname;
        $CUSTOMERTEL1      = $tel;
        $CARBRAND          = $brand_car;
        $CARDESC           = $model_car;
        $CARYEAR           = $year_car;
        $CARLICENSEPLATE   = $paper_car;
        $EMP               = $UserName;
        $PolicyDate        = $expiration_date;


        $this->AddLead->Save_AddLead($int,$CUSTOMERFIRSTNAME,$CUSTOMERLASTNAME,$CUSTOMERTEL1,$CARBRAND,$CARDESC,$CARYEAR,$CARLICENSEPLATE,$EMP,$PolicyDate);

        $where = " where Save_By ='".$UserName."'";
        
        $start = 0;
        $pageend = 15;
        $data['get_PROSPECT_LIST'] = $this->AddLead->Get_PROSPECT_LIST_TEST($where,$start,$pageend);
        $getcount = $this->AddLead->Count_PROSPECT_LIST_TEST($where); 
        $data['Count'] = $getcount[0]->Count;
        $data['pageend'] = $pageend;
        $data['numpage'] = 1;
         $this->load->view('AddLead/sub_tableadd_lead',$data);




     }
     public function SearchAdd_Lead(){
        $UserName = $this->session->userdata('Username');
        $page        = $this->input->post("page");
        $selecthead  = $this->input->post("selecthead");
        $txtsearch   = iconv("UTF-8//ignore","tis-620//ignore",$this->input->post("txtsearch"));
        $start = 0;
        $pageend1 = 15;

            //Paging
            if($page != ''){
                 $page = $page;
            }else{
                 $page = 1;
            }       
            $start = ($page-1)*$pageend1;
            $pageend = $page*15;
            $data['numpage'] = $page;
            $data['pageend'] = $pageend1;




            if($selecthead == "name"){
                 $where = "WHERE  (CustomerFirstname like '%".$txtsearch."%' or CustomerLastname like '%".$txtsearch."%') AND Save_By ='".$UserName."'";
            }else{
                 $where = "WHERE ".$selecthead." like '%".$txtsearch."%' AND Save_By ='".$UserName."'";
            }

            

            
            $data['get_PROSPECT_LIST'] = $this->AddLead->Get_PROSPECT_LIST_TEST($where,$start,$pageend);
            $getcount = $this->AddLead->Count_PROSPECT_LIST_TEST($where); 
            $data['Count'] = $getcount[0]->Count;
            $this->load->view('AddLead/sub_tableadd_lead',$data);
     }
     public function Edit_Lead(){
            $UserName = $this->session->userdata('Username');
            $PROSPECT_LIST_ID  = $this->input->post("PROSPECT_LIST_ID");
            $start = 0;
            $pageend = 1;
            $where = "WHERE Save_By ='".$UserName."' AND PROSPECT_LIST_ID='".$PROSPECT_LIST_ID."'";
            $data['get_PROSPECT_LIST_Edit'] = $this->AddLead->Get_PROSPECT_LIST_TEST($where,$start,$pageend);
            $CarBrand = $data['get_PROSPECT_LIST_Edit'][0]->CarBrand;
            $CarDesc = $data['get_PROSPECT_LIST_Edit'][0]->CarDesc;
           
            $getcount = $this->AddLead->Count_PROSPECT_LIST_TEST($where); 
            
            $data['Count'] = $getcount[0]->Count;
            $data['pageend'] = $pageend;
            $data['Brandcar'] = $this->Model_HomeInsurance->Get_Brandcar(); //รุ่น
            $data['ModelCar'] = $this->Model_HomeInsurance->Get_CarModel($CarBrand);
            $data['Yearcar'] = $this->Model_HomeInsurance->Get_YearCar($CarDesc);
            // foreach ($data['ModelCar'] as  $value) {
            //    echo  "<br>".$value->CarModel;
            // }
              $this->load->view('AddLead/div_editLead',$data);
     }
     public function Update_Lead(){

        $UserName = $this->session->userdata('Username');
        $PROSPECT_LIST_ID  = $this->input->post("PROSPECT_LIST_ID");
        
        $prefix    = iconv("utf-8//ignore","tis-620//ignore",$this->input->post("prefix"));
        $fname     = iconv("utf-8//ignore","tis-620//ignore",$this->input->post("fname"));
        $lastname  = iconv("utf-8//ignore","tis-620//ignore",$this->input->post("lastname"));
        $model_car = iconv("utf-8//ignore","tis-620//ignore",$this->input->post("model_car"));
        $brand_car = iconv("utf-8//ignore","tis-620//ignore",$this->input->post("brand_car"));
        $year_car  = iconv("utf-8//ignore","tis-620//ignore",$this->input->post("year_car"));
        $tel       = $this->input->post("tel");
        $paper_car = iconv("utf-8//ignore","tis-620//ignore",$this->input->post("paper_car")); 
        $expiration_date = date("Y-m-d H:i:s.00",strtotime($this->input->post("expiration_date")));


        
          $this->AddLead->update_PROSPECT_LIST_TEST($prefix,$fname,$lastname,$tel,$brand_car,$model_car,$year_car,$paper_car,$expiration_date,$PROSPECT_LIST_ID,$UserName);

            $start = 0;
            $pageend = 15;
            $where = " WHERE Save_By ='".$UserName."' ";
            $data['get_PROSPECT_LIST'] = $this->AddLead->Get_PROSPECT_LIST_TEST($where,$start,$pageend);
            $getcount = $this->AddLead->Count_PROSPECT_LIST_TEST($where); 
            
            $data['Count'] = $getcount[0]->Count;
            $data['pageend'] = $pageend;
            $this->load->view('AddLead/sub_tableadd_lead',$data);

     }
 

}



