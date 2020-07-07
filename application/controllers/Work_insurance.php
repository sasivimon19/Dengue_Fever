<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set("Asia/Bangkok"); //เซตเวลา ว่าเอาเวลาของอะไร

 

class Work_insurance extends CI_Controller {
	public function __construct(){
		parent:: __construct();
	 	$this->load->library('session','upload');
 		$this->load->library('excel');
                $this->load->model('Model_HomeInsurance');
	 	set_time_limit(0);
	 	ini_set('memory_limit', '-1');
	 }
 
	 public function index()
	 {
	 	$this->load->view('Login');
	 }
         
     public function Insurance_Notification() {
         
        $IDEmp = $this->session->userdata('IDEmp');
        $NameEmp = iconv('tis-620//IGNORE', 'utf-8//IGNORE', $this->session->userdata('NameEmp'));
        $LevelEmp = iconv('tis-620', 'utf-8', $this->session->userdata('LevelEmp'));
        $Code = iconv('tis-620', 'utf-8', $this->session->userdata('Code'));
        $CODE_COMPANY = iconv('tis-620', 'utf-8', $this->session->userdata('CODE_COMPANY'));
        $TYPEDB = $this->session->userdata('TYPEDB');
        $DB = $this->session->userdata('DB');
        
        $data['Currentdate'] = $this->Model_HomeInsurance->Current_date();
        foreach ($data['Currentdate'] as $value) {
            $data['Current_Date'] = $value->Currentdate;
        }

       
        $data['Code'] = $Code;
        $data['ComCode'] = $CODE_COMPANY;
        $data['IDEmp'] = $IDEmp;
        $data['LevelEmp'] = $LevelEmp;
        $data['NameEmp'] = $NameEmp;
        $data['TYPEDB'] = $TYPEDB;
        $data['DB'] = $DB;

        $this->load->view('JobNotification/AddJob_Notification', $data);
    }

   
}



