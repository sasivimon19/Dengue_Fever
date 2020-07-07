<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set("Asia/Bangkok"); //เซตเวลา ว่าเอาเวลาของอะไร

 

class HomeInsurance extends CI_Controller {
	public function __construct(){
		parent:: __construct();
	 	$this->load->library('session','upload');
 		$this->load->library('excel');
	 	$this->load->model('Model_HomeInsurance');	
	 	set_time_limit(0);
	 	ini_set('memory_limit', '-1');
	 }
 
	 public function index() { //แก้แล้ว
             
        $useragent = $_SERVER['HTTP_USER_AGENT']; // เก็บว่าคนดูใช้ Browser ตัวใด
        // ใช้ If ทำการแยกประเภทของ Browser ของคนดู ว่ามันเป็นของ คอมพิวเตอร์ หรือ โทรศัพท์เคลื่อนที่
        if (preg_match('/android|avantgo|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i', $useragent) || preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|e\-|e\/|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(di|rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|xda(\-|2|g)|yas\-|your|zeto|zte\-/i', substr($useragent, 0, 4))) {
            $AgentSERVER = "Mobile";
        } else {
            $AgentSERVER = "PC";
        }
	 $this->load->view('Login');
    }

    public function login() {
        
        $useragent = $_SERVER['HTTP_USER_AGENT']; // เก็บว่าคนดูใช้ Browser ตัวใด
        // ใช้ If ทำการแยกประเภทของ Browser ของคนดู ว่ามันเป็นของ คอมพิวเตอร์ หรือ โทรศัพท์เคลื่อนที่
        if (preg_match('/android|avantgo|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i', $useragent) || preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|e\-|e\/|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(di|rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|xda(\-|2|g)|yas\-|your|zeto|zte\-/i', substr($useragent, 0, 4))) {
            $AgentSERVER = "Mobile";
        } else {
            $AgentSERVER = "PC";
        }
        
        $IP_Address = "";
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $IP_Address = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $IP_Address = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $IP_Address = $_SERVER['REMOTE_ADDR'];
        }

        
        if ($this->input->get("Username") != "" && $this->input->get('Password')!='') {
            $Username = $this->input->get("Username");      
            $Password = $this->input->get("Password");
        } else {
            $Username = $this->input->post("Username"); //รับค่า pass จากฟอร์ม       
            $Password = $this->input->post("password");
        }


        $data['check'] = $this->Model_HomeInsurance->_checklogin($Username, $Password);       // //ประกาศตัวแปร a มารับ ค่า user pass เพื่อ loop ค่าจากฐานข้อมูล

        $Status_Log = "Active";
        foreach ($data['check'] as $key) {
            $StatusLog = $key->Status_Log;
        }

        if (count($data['check']) > 0) {

            if ($StatusLog == 'Nonactive') {

                foreach ($data['check'] as $row) :                                          //loop ค่าจากฐานข้อมูลออกมา

                     $AutoID = $row->AutoID;
                     $Username = trim($row->Username);
                     $Password = $row->Password;
                     $IDCard = $row->IDCard;
                     $FirstName = trim($row->FirstName);
                     $LastName = trim($row->LastName);
                     $Tel = $row->Tel;
                     $Status = $row->Status;
                     $LevelEmp = $row->LevelEmp;
                     $DEPARTMENT = $row->DEPARTMENT;

                endforeach;
                
                $data['Currentdate'] = $this->Model_HomeInsurance->Current_date();
                foreach ($data['Currentdate'] as $value) {
                    $date_Login = $value->Currentdate;
                }
                
                $LogLogin = $this->Model_HomeInsurance->GET_Log_Login($IP_Address);
                foreach ($LogLogin as $value) {
                    $Status_Loglogin = $value->Status_Loglogin;
                }
                $Status_Loglogin = '';
              

                // update status userlogin
                $this->Model_HomeInsurance->Update_status($Status_Log, $AutoID); //update status จาก active เป็น nonactive
                
                if($Status_Loglogin == 1 || $Status_Loglogin == '') {
                    
                    $this->Model_HomeInsurance->Update_Log_Login($IP_Address);
                    
                    //insent login_status
                    $this->Model_HomeInsurance->insent_login_status($Username, $Password, $date_Login, $IP_Address, $AgentSERVER);
          
                    $this->session->set_userdata(array('AutoID' => $AutoID, 'Username' => $Username, 'Password' => $Password, 'IDCard' => $IDCard, 'FirstName' => $FirstName, 'LastName' => $LastName, 'Tel' => $Tel, 'Status' => $Status,'LevelEmp' => $LevelEmp,'DEPARTMENT' => $DEPARTMENT));
                   
                    redirect('HomeInsurance/Home');
                    
                } else {
                 
                    $this->load->view('false');
                }
            } else {
  
                $this->load->view('ConfirmActive');
                foreach ($data['check'] as $row) : 

                     $AutoID = $row->AutoID;
                     $Username = trim($row->Username);
                     $Password = $row->Password;
                     $IDCard = $row->IDCard;
                     $FirstName = trim($row->FirstName);
                     $LastName = trim($row->LastName);
                     $Tel = $row->Tel;
                     $Status = $row->Status;
                     $LevelEmp = $row->LevelEmp;
                     $DEPARTMENT = $row->DEPARTMENT;

                endforeach;

              $this->session->set_userdata(array('AutoID' => $AutoID, 'Username' => $Username, 'Password' => $Password, 'IDCard' => $IDCard, 'FirstName' => $FirstName, 'LastName' => $LastName, 'Tel' => $Tel, 'Status' => $Status,'LevelEmp' => $LevelEmp,'DEPARTMENT' => $DEPARTMENT));    
            }
        } else {
            $this->load->view('Login_false');
        }
    }
    
    public function Home() {        
        
        $Username = $this->session->userdata('Username');
        $Password = $this->session->userdata('Password');
        $AutoID = $this->session->userdata('AutoID');
        $IDCard =  $this->session->userdata('IDCard');
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
        
	if($Username == ""){

        $this->load->view('false');
           
        } else {
        $data['Brandcar'] = $this->Model_HomeInsurance->Get_Brandcar();
        $CountCheckSell =$this->Model_HomeInsurance->Count_Show_Customers_Interested($Username); //Count ตรวจสอบการซื้อ
        foreach ($CountCheckSell as  $value) {
           $data['CoutCheck_Sell'] = $value->Count;
        }
        $this->load->view('HomeCar', $data);
    }
 }    
           
    public function Main_Customer() {

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
        
        $data['Currentdate'] = $this->Model_HomeInsurance->Current_date();
        foreach ($data['Currentdate'] as $value) {
            $Currentdate = $value->Currentdate;
        }
        $data['Current_Date'] = $Currentdate;
  
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

        if($Username == ""){

        $this->load->view('false');
           
        } else {
        $data['Brandcar'] = $this->Model_HomeInsurance->Get_Brandcar();
        

        $this->load->view('Checkcarinsurance/Customer_data', $data);
    }
}  
    
    public function CONFORM_ACTIVE() {
        
         
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
        
        $key = $this->input->post('inputValue');
        
        
        if ($Username == "") {

            $this->load->view('false');
            
        } else {
            $check_datalogin = $this->Model_HomeInsurance->check_datalogin($key,$AutoID);

            if (count($check_datalogin) == 1) {
                $this->Model_HomeInsurance->Update_check_Emp($key,$Username);
                echo "<script>alert('ยืนยันตัวตนเรียบร้อยกรุณา Login ใหม่อีกครั้ง');window.history.back();</script>";
            } else {
                echo "<script>alert('PASSWORD ไม่ถูกต้อง');</script>";
            }
        }
    }

    public function Main_quotation() {

        $Username = $this->session->userdata('Username');
        $Password = $this->session->userdata('Password');
        $AutoID = $this->session->userdata('AutoID');
        $IDCard = iconv('tis-620', 'utf-8', $this->session->userdata('IDCard'));
        $FirstName = $this->session->userdata('FirstName');
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


        $data['PROVINCE'] = $this->Model_HomeInsurance->PROVINCE();
        $data['ShowCustomers'] = $this->Model_HomeInsurance->Show_Customers_Interested($Username);
        
        if($Username == ""){

        $this->load->view('false');
           
        } else {

        //Count Status
        $A = $this->Model_HomeInsurance->CountApproveCredit($Username);
        $data['CountApprove_Credit'] = $A[0]->CountApprove_Credit;
        $B = $this->Model_HomeInsurance->CountRejectCredit($Username);
        $data['CountReject_Credit'] = $B[0]->CountReject_Credit;
        $C = $this->Model_HomeInsurance->CountCallwork_Orange($Username);
        $data['CountCallwork_Orange'] = $C[0]->CountCallwork_Orange;
        $D = $this->Model_HomeInsurance->CountCallwork_Green($Username);
        $data['CountCallwork_Green'] = $D[0]->CountCallwork_Green;
        $E = $this->Model_HomeInsurance->CountWaitCheck($Username);
        $data['CountCallwork_success'] = $E[0]->CountCallwork_success;
        $F = $this->Model_HomeInsurance->CountWaittell_Insure($Username);
        $data['CountWaitCheck'] = $F[0]->CountWaitCheck;
        $G = $this->Model_HomeInsurance->Counttell_Insure($Username);
        $data['CounttellInsure'] = $G[0]->CounttellInsure;
        $H = $this->Model_HomeInsurance->CountReject_Tran($Username);
        $data['CountRejectTrans'] = $H[0]->CountRejectTrans;


      $this->load->view('Check_buy/Viewquotation_main/Viewquotation',$data);
    }
}

    public function Policy_controllers() {

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
        
        
        $whereUsername ="";
        $whereUsernameCustomer = "";
        
        $start = 0;
        $pageend = 10;
     
        $data['pageend1'] = $pageend;
        
//       $name = $this->input->post('name');
//       $whereUsername = " WHERE CreateEmp = '" . $Username . "'";
//       $whereUsernameCustomer = " WHERE CreateEmp = '" . $Username . "'";
//       $page = $this->input->post('page');
//       $pageend = 10;
//       $start =0;
//       $whereUsername = "";
//       $whereUsernameCustomer = "";
//  
//       if ($name == "Policy") {
//
//            $pageend1 = 10;

//            if ($page != '') {
//                $page = $page;
//            } else {
//                $page = 1;
//            }
//
//            $start = ($page - 1) * $pageend1;
//            $pageend = $page * 10;
//
//            $data['pageend'] = $pageend;
//            
//        } elseif ($name == "Customer") {
//
//            $pageend1 = 10;
//            $pageend = 10;

//            if ($page != '') {
//                $page = $page;
//            } else {
//                $page = 1;
//            }
//
//            $start = ($page - 1) * $pageend1;
//            $pageend = $page * 10;

//            $data['pageend'] = $pageend1;
//        }

      $data['pageend'] = $pageend;

//      $data['GETTRANS'] = $this->Model_HomeInsurance->Select_TRANS_ACTION($whereUsername, $start, $pageend);
//      $data['GETCOUNTTRANS'] = $this->Model_HomeInsurance->Count_TRANS_ACTION($whereUsername);
//      $data['Get_Customer'] = $this->Model_HomeInsurance->Select_Customer_Action($whereUsernameCustomer, $start, $pageend);
//      $data['Count_Customer'] = $this->Model_HomeInsurance->Count_Customer_Action($whereUsernameCustomer);        
        
        $data['GETTRANS'] = '';
        $data['GETCOUNTTRANS'] = 0;
        $data['Get_Customer'] = '';
        $data['Count_Customer'] = 0;

        
        
        $data['Show_Data_management'] = "Checkcarinsurance/Policy_status";
        $this->load->view('SettingData/Main_Datamanagement', $data);
    }

//    ตารางข้อมูลลูกค้า
        public function Show_Insurance_Policy() {
           

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
        

        $Searchsub_Main_Policy = $this->input->post('Searchsub_Main_Policy');
        $SearchPolicy = iconv("UTF-8//ignore", "TIS-620//ignore", trim($this->input->post("SearchPolicy")));

        if ($Searchsub_Main_Policy == "Ref") {
            $whereUsername = " WHERE e.Emp = '" . $Username . "' AND a.TransID LIKE '%" . $SearchPolicy . "%'";
        } else if ($Searchsub_Main_Policy == 'CustomerIDCard') {
            $whereUsername = " WHERE e.Emp = '" . $Username . "' AND a.CustomerIDCard LIKE '%" . $SearchPolicy . "%'";

        } else {
            $whereUsername = "";
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

        $data['pageend'] = $pageend;


        $data['GETTRANS'] = $this->Model_HomeInsurance->Select_TRANS_ACTION($whereUsername, $start, $pageend);
        $data['GETCOUNTTRANS'] = $this->Model_HomeInsurance->Count_TRANS_ACTION($whereUsername);

        $this->load->view('Checkcarinsurance/Table_Insurance_Policy', $data);
    }

//    ติดตามสถานะกรมธรรม์ 
    public function Show_Customer_Policy() {
        

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

        $Searchsub_Main_Policy = $this->input->post('Searchsub_Main_Policy');
        $SearchPolicy = iconv("UTF-8//ignore", "TIS-620//ignore", trim($this->input->post("SearchPolicy")));

        if ($Searchsub_Main_Policy == "Ref") {
            $whereUsernameCustomer = " WHERE CreateEmp = '" . $Username . "' AND TransID LIKE '%" . $SearchPolicy . "%'";
        } else if ($Searchsub_Main_Policy == 'CustomerIDCard') {
            $whereUsernameCustomer = " WHERE CreateEmp = '" . $Username . "' AND CustomerIDCard LIKE '%" . $SearchPolicy . "%'";

        } else {
            $whereUsernameCustomer = "";
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

        $data['pageend'] = $pageend;

        $data['Get_Customer'] = $this->Model_HomeInsurance->Select_Customer_Action($whereUsernameCustomer, $start, $pageend);
        $data['Count_Customer'] = $this->Model_HomeInsurance->Count_Customer_Action($whereUsernameCustomer);

        $this->load->view('Checkcarinsurance/Table_Customer_Policy', $data);
    }

//    public function Commission_controllers() {
//            
//        $Username = $this->session->userdata('Username');
//        $Password = $this->session->userdata('Password');
//        $AutoID = $this->session->userdata('AutoID');
//        $IDCard =  $this->session->userdata('IDCard');
//        $FirstName =  $this->session->userdata('FirstName');
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
//        $this->load->view('Checkcarinsurance/View_Commission',$data);
//    }
    
//  Check IDcard ว่าถูกหลักหรือป่าว
	public function CheckID() {

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

        $IDcard = $this->input->POST('ID_cardnumber');

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

        $data['GetIDCard'] = $this->Model_HomeInsurance->Check_IDcard($IDcard);
        foreach ($data['GetIDCard'] as $value) {
            $CheckIDcard = $value->IDcard;
        }

        if ($CheckIDcard == "TRUE") {
            
        } else {
            echo"<script>alert('เลขบัตรประชาชน $CheckIDcard กรุณากรอกรใหม่')</script>";
            echo"<script>document.getElementById('ID_cardnumber').value = ''</script>";
        }
    }

	public function Check_chip() { //แก้แล้ว เลือกประกันฃ


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
        
        $data['Currentdate'] = $this->Model_HomeInsurance->Current_date();
        foreach ($data['Currentdate'] as $value) {
            $Currentdate = $value->Currentdate;
        }
        
        $data['Current_Date'] = $Currentdate;
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
        

        $car_brand = $this->input->post('car_brand');
        $Car_modil = iconv('UTF-8//IGNORE','TIS-620//IGNORE',$this->input->post('Car_modil'));
        $CODE = $this->input->post('Type_Car');
        $YearGroup = $this->input->post('YearGroup');		
	$MakeDescription = $this->input->post('MakeDescription');
        
        $data['Type_Name'] = '';
        $data['Insure_Company'] = '';
        $data['Insurance_price_total'] = '';


        $data['CarBrand'] = $car_brand;
        $data['Car_model'] = iconv('TIS-620//IGNORE','UTF-8//IGNORE',$Car_modil);
        $data['Car_Year'] = $YearGroup;
	$data['MakeDescription'] = $MakeDescription;
	$data['CODE'] = $CODE;
		 	
        //$data['Searchpremiums'] = $this->Model_HomeInsurance->Select_Detail_Car($car_brand, $Car_modil, $CODE, $YearGroup);           
        $data['Brandcar'] = $this->Model_HomeInsurance->Get_Brandcar();      
        $data['Coverage1'] = $this->Model_HomeInsurance->DetailCoverage1();
	
        //where Models GET_TYPECAR
        $Where =" AND B.CarBrand = '$car_brand' AND B.CarModel = '$Car_modil' AND B.CarYear = '$YearGroup' AND A.CODE = '$CODE' 
	AND B.MakeDescription='$MakeDescription' AND A.Status = 'Active' ";
		
	$data['TYPECAR'] = $this->Model_HomeInsurance->GET_TYPECAR($Where);
        
	$data['checktext1'] = '';
        $data['checktext2'] = '';
        $data['checktext3'] = '';	
        
	$whereLengthvehicle = "";		     
	$this->load->view('Checkcarinsurance/Check_Insurance', $data);
     

    }
       
    
	public function Check_Search_More() { //แก้แล้ว  ค้นหาประกัน
         

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
        
        $data['Currentdate'] = $this->Model_HomeInsurance->Current_date();
        foreach ($data['Currentdate'] as $value) {
            $Currentdate = $value->Currentdate;
        }
        
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
        $Car_modil = iconv('UTF-8//IGNORE','TIS-620//IGNORE',$this->input->post('CarDesc'));
        $CODE = $this->input->post('Type_Car');
        $YearGroup = $this->input->post('CarYear');
        $Maincoverage = $this->input->post('Maincoverage');
        $Insuranceprice = $this->input->post('my_display');
        $Insurance_price = str_replace(',', '', $Insuranceprice);
        $Insurance_price_total = $this->input->post('my_display');
        $Insurance_price_total = str_replace(',', '', $Insurance_price_total);
	$MakeDescription = $this->input->post('MakeDescription');

        $data['CarBrand'] = $car_brand;
        $data['CarDesc'] = iconv('UTF-8//IGNORE','TIS-620//IGNORE',$Car_modil);
        $data['CarYear'] = $YearGroup;
        $data['Type_Car'] = $CODE;
        $data['Insurance_price'] = $Insurance_price;
        $data['Insurance_price_total'] = $Insurance_price_total;
	

        $Length = $this->input->post('Length'); 
        $whereLength = ''; //ประเภทประกัน
		
        if ($Length != "") {
            $I = 1;
            foreach ($Length as $b) {
                $Check_Length[$I] = $b;

                if ($I <= 1) {
                    $wherechk = "'" . $Check_Length[$I] . "'";
                } else {
                    $wherechk = "" . $wherechk . ",'" . $Check_Length[$I] . "' ";
                }
                $I++;
            }
            $whereLength = "AND L.ID_Type_Auto in ( " . $wherechk . " )";
        }


        $company = $this->input->post('company');
        $whereLengthcompany = ""; // บริษัท
			
	   if ($company != "") {
            $C = 1;
            foreach ($company as $f) {
                $Check_company[$C] = $f;

                if ($C <= 1) {
                    $wherechkompany = "'" . $Check_company[$C] . "'";
                } else {
                    $wherechkompany = "" . $wherechkompany . ",'" . $Check_company[$C] . "' ";
                }
                $C++;
            }
            $whereLengthcompany = "AND U.Insure_Code_Company in ( " . $wherechkompany . " )";
        }
        

        $wherenamegroup = ""; //ความคุ้มครอง
        if ($Maincoverage == "Re1") {
            $wherenamegroup = " AND A.DetailCoverage1 = '" . $Maincoverage . "'";
        } else if ($Maincoverage == "Re2") {
            $wherenamegroup = "AND A.DetailCoverage1 = '" . $Maincoverage . "'";
        } 
		
        
        if ($Insurance_price_total == "0" || $Insurance_price_total == "") {  //ทุนประกัน
            $wherepricetotal = "";
        } else {
            $wherepricetotal = "AND A.Insurance_price_total <= '" . $Insurance_price_total . "'";
        }
		
	$Where =" AND B.CarBrand = '$car_brand' AND B.CarModel = '$Car_modil' AND B.CarYear = '$YearGroup' AND A.CODE = '$CODE' 
	AND B.MakeDescription='$MakeDescription'  AND A.Status = 'Active'";

        $Where = $Where." ".$whereLength." ".$whereLengthcompany." ".$wherenamegroup . "  " . $wherepricetotal;
	$data['TYPECAR'] = $this->Model_HomeInsurance->GET_TYPECAR($Where);
        
        $data['checktext1'] = $this->input->post('checktext1');
        $data['checktext2'] = $this->input->post('checktext2');
        $data['checktext3'] = $this->input->post('checktext3');
        
        $this->load->view('Show_search', $data);
        
    }
 
	public function Show_Interested() { //แก้แล้วหน้ายืนัยนซื้อประกัน

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

        $data['Currentdate'] = $this->Model_HomeInsurance->Current_date();
        foreach ($data['Currentdate'] as $value) {
            $Currentdate = $value->Currentdate;
        }
        $data['Current_Date'] = $Currentdate;
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
		
		
		
	$Middle_ID = $this->input->POST('Middle_ID');
	$data['Middle_ID'] = $Middle_ID;

        $ID_InsureCode = $this->input->POST('ID_InsureCode');
        $car_brand = $this->input->POST('CarBrand');
        $Car_modil = iconv("utf-8//ignore","tis-620//ignore",$this->input->post('Car_model'));
        $YearGroup = $this->input->POST('Car_Year');
        $CODE = $this->input->post('CODE');
     
        $Insurance_price = $this->input->post('Insurance_price');
        $Insurance_price_total = $this->input->post('Insurance_price_total');
        $Net_Insurance = $this->input->post('Net_Insurance');
   
        $data['ID_InsureCode'] = $ID_InsureCode;
        $data['CarBrand'] = $car_brand;
        $data['Car_model'] = $Car_modil;
        $data['Car_Year'] = $YearGroup;
        $data['CODE'] = $CODE;
        $data['Insurance_price'] = $Insurance_price;
	$data['Insurance_price_total'] = $Insurance_price_total;
      


        $data['PROVINCE'] = $this->Model_HomeInsurance->PROVINCE();
        $data['Brandcar'] = $this->Model_HomeInsurance->Get_Brandcar();
        $data['Insure_Code_Company'] = '';

        $data['GetCC'] = $this->Model_HomeInsurance->SelectEnginecc();
        $data['GetCC'] = $this->Model_HomeInsurance->SelectEnginecc();
      

	$Where =" AND  A.Middle_ID='$Middle_ID' AND A.Status = 'Active'";
	$data['Details_Car'] = $this->Model_HomeInsurance->GET_TYPECAR($Where);

        $this->load->view('Popup_Applyinsurance', $data);
    }
 
    public function GetInterested() { //แก้แล้วรายละเอียด

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
		
	$Middle_ID = $this->input->POST('Middle_ID');
	$data['Middle_ID'] = $Middle_ID;
		
	$Where =" AND  A.Middle_ID='$Middle_ID' AND A.Status = 'Active' ";
       $data['Details_Car'] = $this->Model_HomeInsurance->GET_TYPECAR($Where);
        
        $this->load->view('Popup_Interested', $data);
    }

    public function Check_Car_Model() { //รุ่นรถ

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
        
        
        $car_brand = $this->input->POST('car_brand');
        $data['GET_Car_Brand'] = $this->Model_HomeInsurance->Get_CarModel($car_brand);

        $this->load->view('ViewCarModel', $data);
    }

    public function Check_Typecar() {  //ประเภทรถ

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

        
        
        $car_brand = iconv('utf-8','tis-620', $this->input->POST('car_brand'));
        $Car_modil = iconv('utf-8','tis-620', $this->input->POST('Car_modil'));
        $YearGroup = $this->input->POST('YearGroup');

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
        
        
        $data['Get_Type_car'] = $this->Model_HomeInsurance->searching_Premium($car_brand,$Car_modil,$YearGroup);
	$where =" AND CarBrand='$car_brand' AND CarModel='$Car_modil' AND CarYear ='$YearGroup' ";
	$Get_Car = $this->Model_HomeInsurance->Get_Car($where); 
		
	$MakeDescription = "";
        foreach ($Get_Car as $item) {
            $MakeDescription = $item->MakeDescription;
        }
        echo '<script type="text/javascript"> document.getElementById("MakeDescription").value="' . $MakeDescription . '"; </script>';


        $this->load->view('View_Type_car', $data);
    }
    
   public function Check_Year_Car() { //แก้ดึงปี เพิ่มดึงรุ่นย่อยมาด้วย

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
       
        $Car_modil = iconv('utf-8','tis-620', $this->input->POST('Car_modil'));
        
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
        
        
      $data['GET_Yearcar'] = $this->Model_HomeInsurance->Get_YearCar($Car_modil);
	
        $this->load->view('ViewYear_Car', $data);
    }
	
	
    public function quotation_information() { //แก้แล้วยืนยันการซื้อประกัน

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
        
        $data['Currentdate'] = $this->Model_HomeInsurance->Current_date();
        foreach ($data['Currentdate'] as $value) {
            $Currentdate = $value->Currentdate;
        }
        $data['Current_Date'] = $Currentdate;
       
        $prefix_Insurance = iconv('UTF-8', 'TIS-620', trim($this->input->POST('prefix_Insurance')));
        $NameUser_company = iconv('UTF-8', 'TIS-620', trim($this->input->POST('NameUser_company')));
        if ($NameUser_company  != '') {
            $NameCustomers = $NameUser_company;
            $LastCustomers = iconv('UTF-8', 'TIS-620', trim($this->input->POST('lastnames_Follow')));
        } else {
            $NameCustomers = iconv('UTF-8', 'TIS-620', trim($this->input->POST('Name_Follow')));
            $LastCustomers = iconv('UTF-8', 'TIS-620', trim($this->input->POST('lastnames_Follow')));
        }
	$Middle_ID = $this->input->POST('Middle_ID');
        $ID_cardnumber = $this->input->POST('ID_cardnumber');
        $PhoneCustomers = $this->input->POST('Contact_phone');
        $Namecompany = trim($this->input->POST('Namecompany'));
        $Moredetails = iconv('UTF-8', 'TIS-620', trim($this->input->POST('More_details')));
        $InsuranceType = iconv('UTF-8', 'TIS-620', $this->input->POST('Type_Insurance'));
        $Insuranceprice = $this->input->POST('Insurance_price');
        $Insurance_price = str_replace(',', '', $Insuranceprice);
        $Status_Payment = '0';
        $Status_Quotation = '0';
        $CarBrand = iconv('UTF-8', 'TIS-620', trim($this->input->POST('CarBrand')));
        $CarDesc = iconv('UTF-8', 'TIS-620', trim($this->input->POST('CarDesc')));
        $CarFamilyDesc = '';
        $CarYear = $this->input->POST('CarYear');
        $CarLicensePlate = iconv('UTF-8', 'TIS-620', trim($this->input->POST('License_Plate')));
        $CarLicensePlateProvince = $this->input->POST('PROVINCE_CHECK');
        $Type_ID = $this->input->POST('ID_Type_Auto');
        $Birthday = $this->input->POST('Birthday');
        $Age = $this->input->POST('Age');
        $PaymentType = iconv('UTF-8', 'TIS-620', trim($this->input->POST('typepay')));
        $CODECAR = $this->input->POST('CODECAR');
        $Insurancepricetotal = $this->input->POST('Insurancepricetotal');
        $Insurance_price_total = str_replace(',', '', $Insurancepricetotal);
	$AKON = $this->input->POST('akonview');
        $TAX = $this->input->POST('taxview');
        $TypeOfInsure = $this->input->POST('Type_ID');
        if($this->input->POST('typepay') != "ผ่อนเงินสด"){
            $Money_Contract = 0.00;
        } else {
            $Money_Contract = 200;
        }

        
       $this->Model_HomeInsurance->InsertResult($prefix_Insurance,$NameCustomers,$LastCustomers, $PhoneCustomers, $ID_cardnumber, $CarBrand,
       $CarDesc,$CODECAR,$CarFamilyDesc,$CarYear,$CarLicensePlate,$CarLicensePlateProvince,$Moredetails,$Username,$Namecompany,$Insurance_price,$Type_ID,$Insurance_price_total);
 
        $data['PROSPECTID']= $this->Model_HomeInsurance->GETPROSPECTLISTID($Username,$ID_cardnumber);

        foreach ($data['PROSPECTID'] as $value) {
           $PROSPECTLISTID = $value->PROSPECT_LIST_ID;
        }   

       $this->Model_HomeInsurance->InsertResult_JOBALERT($PROSPECTLISTID, $Username, $prefix_Insurance, $NameCustomers,
       $LastCustomers, $ID_cardnumber,$PhoneCustomers, $Birthday, $Age, $CarBrand, $CarDesc, $CarYear, $InsuranceType,
       $CarLicensePlate, $CarLicensePlateProvince, $AKON, $TAX, $PaymentType,$Money_Contract,$Namecompany,$TypeOfInsure,
       $Insurance_price,$Insurance_price_total);

        $this->Model_HomeInsurance->InsertResult_TELESALES_WORK($PROSPECTLISTID,$Username);  
	
        $this->Model_HomeInsurance->Insert_PROSPECT_Middle($Middle_ID,$PROSPECTLISTID,$Username);  
		 
    }
	
	
	
/*     public function quotation_information() {

        $UserName = $this->session->userdata('UserName');
        $Password = $this->session->userdata('Password');
        $ID_UserLogin = $this->session->userdata('ID_UserLogin');
        $IDCard = iconv('tis-620', 'utf-8', $this->session->userdata('IDCard'));
        $FirstName = iconv('tis-620', 'utf-8', $this->session->userdata('FirstName'));
        $LastName = iconv('tis-620', 'utf-8', $this->session->userdata('LastName'));
        $Mobile = $this->session->userdata('Mobile');
        $Status = $this->session->userdata('Status');
        
        
        $data['Currentdate'] = $this->Model_HomeInsurance->Current_date();
        foreach ($data['Currentdate'] as $value) {
            $Currentdate = $value->Currentdate;
        }
        $data['Current_Date'] = $Currentdate;
        

        
         $prefix_Insurance = iconv('UTF-8', 'TIS-620', trim($this->input->POST('prefix_Insurance')));  
         $NameUser_company = iconv('UTF-8', 'TIS-620', trim($this->input->POST('NameUser_company')));
         $NameCustomers = iconv('UTF-8', 'TIS-620', trim($this->input->POST('Name_Follow')));
         $LastCustomers = iconv('UTF-8', 'TIS-620', trim($this->input->POST('lastnames_Follow')));
         $ID_cardnumber = $this->input->POST('ID_cardnumber');
         $PhoneCustomers = $this->input->POST('Contact_phone');
         $Namecompany = $this->input->POST('Namecompany');   
         $Moredetails = iconv('UTF-8', 'TIS-620', trim($this->input->POST('More_details')));
         $InsuranceType = iconv('UTF-8', 'TIS-620', $this->input->POST('Type_Insurance'));
         $Insuranceprice = $this->input->POST('Insurance_price');
         $Insurance_price = str_replace(',', '', $Insuranceprice);
         $Status_Payment = '0';
         $Status_Quotation = '0';
         $CarBrand = iconv('UTF-8', 'TIS-620', trim($this->input->POST('CarBrand')));
         $CarDesc = iconv('UTF-8', 'TIS-620', trim($this->input->POST('CarDesc')));
         $CarFamilyDesc = '';
         $CarYear = $this->input->POST('CarYear');
         $CarLicensePlate = iconv('UTF-8', 'TIS-620', trim($this->input->POST('License_Plate')));
         $CarLicensePlateProvince = $this->input->POST('PROVINCE_CHECK');
         $Type_ID = $this->input->POST('ID_Type_Auto');
         $Birthday = $this->input->POST('Birthday');
         $Age = $this->input->POST('Age');
         $cc = $this->input->POST('cc');
         $seat = $this->input->POST('seat');
         $Bodynumber =  iconv('UTF-8', 'TIS-620', trim($this->input->POST('Bodynumber')));
         $Enginenumber = $this->input->POST('Enginenumber');
         $CODE = $this->input->POST('CODE');
         $weight = $this->input->POST('weight');
         $Accessories = iconv('UTF-8', 'TIS-620', trim($this->input->POST('Accessories')));
         $Price_Accessories = $this->input->POST('Price_Accessories');
         $typepay =  iconv('UTF-8', 'TIS-620', trim($this->input->POST('typepay')));

         
         
//        $path = getcwd();
//        $filepath = $path . "/JIB_PAYSLIP";
//
//        if (empty($_FILES['file']['name'])) {
//            $namefile = '';
//        } else {
//            list($namefile, $ext) = explode('.', $_FILES['file']['name']);
//        }
//
//        if ($namefile == '') {
//              $picname = $this->input->POST('picname');
//            echo "<script>alert('กรุณาเลือกภาพที่ต้องการเพิ่ม');</script>";
//        } else {
//            @unlink("" . $filepath . "/" . $this->input->post("picname"));
//            $newnamefile = rand(0, 100);
//            $picname = $newnamefile . '.' . $ext;
//            move_uploaded_file($_FILES["file"]["tmp_name"], $filepath . '/' . $newnamefile . '.' . $ext);
//        }

        $data['UserName'] = $UserName;
        $data['Password'] = $Password;
        $data['ID_UserLogin'] = $ID_UserLogin;
        $data['IDCard'] = $IDCard;
        $data['FirstName'] = $FirstName;
        $data['LastName'] = $LastName;
        $data['Mobile'] = $Mobile;
        $data['Status'] = $Status;

       
        
        $this->Model_HomeInsurance->Insent_Customers_Interested($FirstName,$prefix_Insurance,$NameCustomers, $LastCustomers,$NameUser_company,
        $ID_cardnumber,$PhoneCustomers,$Namecompany,$Currentdate,$Birthday,$Moredetails,$InsuranceType,$Insuranceprice,
        $Status_Payment,$Status_Quotation,$CarBrand,$CarDesc,$CarFamilyDesc,$CarYear,$CarLicensePlate,$CarLicensePlateProvince,
        $Type_ID,$Age,$cc,$seat,$Bodynumber,$Enginenumber,$CODE,$weight,$Accessories,$Price_Accessories,$typepay);
        

        $this->Model_HomeInsurance->InsertResult($NameCustomers, $LastCustomers, $PhoneCustomers,$ID_cardnumber, $CarBrand, $CarDesc, $CarFamilyDesc, 
        $CarYear, $CarLicensePlate, $CarLicensePlateProvince, $Moredetails, $FirstName);
    } */
   


    
    //    function เลือก แจ้งงาน
    public function Work_Notification() {

        $Username = $this->session->userdata('Username');
        $Password = $this->session->userdata('Password');
        $AutoID = $this->session->userdata('AutoID');
	//$IDCard =  $this->session->userdata('IDCard');
        $FirstName =  $this->session->userdata('FirstName');
        $LastName = $this->session->userdata('LastName');
        $Tel = $this->session->userdata('Tel');
        $Status = $this->session->userdata('Status');
        $LevelEmp = $this->session->userdata('LevelEmp');
        $DEPARTMENT = $this->session->userdata('DEPARTMENT');
        
        
        $data['Username'] = $Username;
        $data['Password'] = $Password;
        $data['AutoID'] = $AutoID;
//      $data['IDCard'] = $IDCard;
        $data['FirstName'] = $FirstName;
        $data['LastName'] = $LastName;
        $data['Tel'] = $Tel;
        $data['Status'] = $Status;
        $data['LevelEmp'] = $LevelEmp;
        $data['DEPARTMENT'] = $DEPARTMENT;
        
        
        
        $IDCard    =  $this->input->post("IDCard");
        $NameUser   =  iconv("utf-8//ignore","tis-620//ignore",$this->input->post("NameUser"));
        $Insurance_Price =  $this->input->post("Insurance_Price");
        $Namecompany  =  $this->input->post("Namecompany");
        $Type_ID   =  $this->input->post("Type_ID");
        $PROSPECT_LIST_ID =  $this->input->post("PROSPECT_LIST_ID");
        $PaymentType  =  $this->input->post("PaymentType");
        $CarLicensePlateProvince  =  $this->input->post("CarLicensePlateProvince");
        $TransStatus  =  $this->input->post("TransStatus");
	$StatusButton = $this->input->post("StatusButton");

        $data['Insurance_Price'] = $Insurance_Price;
        $data['PROSPECT_LIST_ID'] = $PROSPECT_LIST_ID;
        $data['PaymentType'] = $PaymentType;
        $data['CarLicensePlateProvince'] = $CarLicensePlateProvince;
	$data['StatusButton'] = $StatusButton;

        if ($AutoID == "") {
            $this->load->view('false');
        } else {

            $data['PROVINCE'] = $this->Model_HomeInsurance->PROVINCE();
            $getProvince = $this->Model_HomeInsurance->PROVINCE_one($CarLicensePlateProvince);
            foreach ($getProvince as  $value) {
               $data['PROVINCE_NAME'] = $value->PROVINCE_NAME;
            }
	
            $data['Call_Work'] = $this->Model_HomeInsurance->getCall_work($NameUser,$PROSPECT_LIST_ID);   //เรียกข้อมูลแจ้งงาน
            $data['GetCC'] = $this->Model_HomeInsurance->SelectEnginecc();


            $InsureClass = $this->Model_HomeInsurance->Insure_Class($Namecompany,$Type_ID); //ข้อมูลประกันชั้น
            foreach ($InsureClass as $value) {
                $data['Down_payment']    = $value->Down_payment;
                $data['Max_installment'] = $value->Max_installment;
            }


           $checkrow_Tran = $this->Model_HomeInsurance->GetTransection($PROSPECT_LIST_ID);
            if(count($checkrow_Tran)  < 1){ 

                  $this->load->view('Work_Notification', $data);
            
            }else{

                   $this->load->view('Work_NotificationEdit',$data);
            }
            
        }
    }

    //    function เลือก AMPHUR
    public function FUN_AMPHUR() {
        
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
        
        if ($AutoID == "") {
            $this->load->view('false');
        } else {
            
        $PROVINCE_ID= $this->input->POST('PROVINCE_ID');
        $AMPHUR_ID = $this->input->POST('AMPHUR_ID');       
     
        $data['GET_AMPHUR'] = $this->Model_HomeInsurance->AMPHUR($PROVINCE_ID);
        $this->load->view('AMPHUR', $data);
        }
    }

    //    function เลือก DISTRICTNAME
    public function FUN_DISTRICTNAME() {

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
        

        
        if ($AutoID == "") {
            $this->load->view('false');
        } else {
      
            $AMPHUR_ID = $this->input->POST('AMPHUR_ID');        
            $data['GET_DISTRICTNAME'] = $this->Model_HomeInsurance->DISTRICTNAME($AMPHUR_ID);
            
            $this->load->view('DISTRICTNAME', $data);
        }
    }




    public function Logout() {

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
        
        $Status_Log = "Nonactive";
        $this->Model_HomeInsurance->Update_status($Status_Log, $AutoID); //update status จาก active เป็น nonactive

        $IP_Address = "";

        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $IP_Address = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $IP_Address = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $IP_Address = $_SERVER['REMOTE_ADDR'];
        }
        
        $data['Currentdate'] = $this->Model_HomeInsurance->Current_date();
        foreach ($data['Currentdate'] as $value) {
            $date_Login = $value->Currentdate;
        }
        
        $this->Model_HomeInsurance->Update_date_Logout($Username,$IP_Address,$date_Login);

        $Username = $this->session->unset_userdata('Username');		
        $Password = $this->session->unset_userdata('Password');		
      
        $this->load->view('Login');
    }
    
       public function Save_Worknotification(){

        $FirstName = iconv('tis-620', 'utf-8', $this->session->userdata('FirstName'));
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


          $data['ShowCustomers'] = $this->Model_HomeInsurance->Show_Customers_Interested($FirstName);

            $A = $this->Model_HomeInsurance->CountApproveCredit($FirstName); $data['CountApprove_Credit']   = $A[0]->CountApprove_Credit;
            $B = $this->Model_HomeInsurance->CountRejectCredit($FirstName);  $data['CountReject_Credit']    = $B[0]->CountReject_Credit;
            $C = $this->Model_HomeInsurance->CountCallwork_Orange($FirstName); $data['CountCallwork_Orange']= $C[0]->CountCallwork_Orange;
            $D = $this->Model_HomeInsurance->CountCallwork_Green($FirstName); $data['CountCallwork_Green']  = $D[0]->CountCallwork_Green;
            $E = $this->Model_HomeInsurance->CountWaitCheck($FirstName);     $data['CountCallwork_success'] = $E[0]->CountCallwork_success;
            $F = $this->Model_HomeInsurance->CountWaittell_Insure($FirstName);   $data['CountWaitCheck']    = $F[0]->CountWaitCheck;
            $G = $this->Model_HomeInsurance->Counttell_Insure($FirstName);   $data['CounttellInsure']       = $G[0]->CounttellInsure;
            $H = $this->Model_HomeInsurance->CountReject_Tran($FirstName);   $data['CountRejectTrans']      = $H[0]->CountRejectTrans;
          
            $this->load->view('Checkcarinsurance/Table_Viewquotation',$data);



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

      
    }public function PROVINCE(){


        $data['PROVINCE'] = $this->Model_HomeInsurance->PROVINCE();
         $this->load->view('PROVINCE',$data);

    }
      public function Upload_Slip(){
        $FirstName = iconv('tis-620', 'utf-8', $this->session->userdata('FirstName'));
        $PROSPECT_LIST_ID = $this->input->post("PROSPECT_LIST_ID");
        $Insurance_price  = $this->input->post("Insurance_price");
	$payfirst        = $this->input->post("payfirst");
        $PaymentType     = $this->input->post("PaymentType");
       
        $dateCurrent = $this->Model_HomeInsurance->get_DateCurrent();
        foreach ($dateCurrent as  $value) {
             $data['Day_Current'] = $value->DateCurrent;
        }

        $data['PROSPECT_LIST_ID'] = $PROSPECT_LIST_ID;
        $data['Insurance_price'] = $Insurance_price;
		$data['payfirst'] = $payfirst;
        $data['PaymentType'] = $PaymentType;
        $start=0;
        $pageend = 10;
        $where ="WHERE SaveBy ='".$FirstName."' AND PROSPECT_LIST_ID='".$PROSPECT_LIST_ID."' ";
        $data['FirstName'] = $FirstName;
        $data['pageend'] = $pageend;
      
        $whereslip ="";
        $getsum = $this->Model_HomeInsurance->sumslip($FirstName,$PROSPECT_LIST_ID,$whereslip);
        $data['count_getsum'] = count($getsum);


        $data['get_Picbill'] = $this->Model_HomeInsurance->gettable_image($start,$pageend,$where);
        $data['Count_get_Picbill'] = $this->Model_HomeInsurance->countgettable_image($where);

        $checkStatus_Payslip = $this->Model_HomeInsurance->checkStatus_Payslip($FirstName,$PROSPECT_LIST_ID); 
        $data['checkStatus_Payslip'] = $checkStatus_Payslip[0]->StatusButton;
         $this->load->view('SubWork_Notification/Upload_bill',$data);
    }

     public function Save_Slip() { //UPDATE ทับ  job_alert_NEW เพราะตารางใบเสร็จไม่มีธนาคาร
        
        $FirstName = iconv('tis-620', 'utf-8', $this->session->userdata('FirstName'));
        $picname  = $this->input->POST('picname');
        $paymoney = $this->input->POST('paymoney');
        $bank     = iconv('utf-8','tis-620',$this->input->POST('bank'));
        $datepay  = date("Y-m-d H:i:00",strtotime($this->input->POST('datepay')));
        $number_cash  = $this->input->POST('number_cash');
        $txtpostspeclist  = $this->input->POST('txtpostspeclist');
        $Insurance_price = $this->input->POST('Insurance_price');
        $summoney  = $this->input->POST('summoney');
        $PaymentType   = $this->input->POST('PaymentType');


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


       $this->Model_HomeInsurance->SaveBill($txtpostspeclist,$picname,$paymoney,$bank,$FirstName,$datepay); //insert ลงตารางภาพ และทำการดึง Sumข้อมุล

       $whereslip ="";
       $getsum = $this->Model_HomeInsurance->sumslip($FirstName,$txtpostspeclist,$whereslip);
       $Sumpay = $getsum[0]->Sumpay;
       $data['count_getsum'] = count($getsum);
      
        $this->Model_HomeInsurance->updatepayJob_Alert_New($Sumpay,$datepay,$txtpostspeclist); //update Jobalert at PROSPECT_LIST_ID

        $start=0;
        $pageend = 10;
        $data['pageend'] = $pageend;
        $where ="WHERE SaveBy ='".$FirstName."' AND PROSPECT_LIST_ID='".$txtpostspeclist."'  ";
        $data['get_Picbill'] = $this->Model_HomeInsurance->gettable_image($start,$pageend,$where);
        $data['Count_get_Picbill'] = $this->Model_HomeInsurance->countgettable_image($where);
 
        $checkStatus_Payslip = $this->Model_HomeInsurance->checkStatus_Payslip($FirstName,$txtpostspeclist); 
        $data['checkStatus_Payslip'] = $checkStatus_Payslip[0]->StatusButton;

         $data['txtsumpay'] =  $summoney;
         $data['Insurance_price'] =  $Insurance_price;
         $data['PROSPECT_LIST_ID'] = $txtpostspeclist;
         $data['FirstName'] = $FirstName;
	 $data['payfirst'] = $Insurance_price;
         $data['PaymentType'] = $PaymentType;
         $this->load->view('SubWork_Notification/table_bill',$data);
     
     
   }
   public function Confirm_waitChecek(){
        $FirstName = iconv('tis-620', 'utf-8', $this->session->userdata('FirstName'));
        $txtpostspeclist = $this->input->post("txtpostspeclist");
        $Insurance_price = $this->input->post("Insurance_price");
        $txtsumpay       = $this->input->post("txtsumpay");
		$PaymentType    = $this->input->post("PaymentType");

        if($txtsumpay == $Insurance_price || $txtsumpay > $Insurance_price){
             

                $TransStatus = "pending";
                $this->Model_HomeInsurance->UpdateTrans_Status($TransStatus,$txtpostspeclist);
                
                $TELESALES_STATUS='WAIT';
                $TELESALES_GROUPDEBT = "'RS0016'";
                $this->Model_HomeInsurance->UpdateStatus_tell($TELESALES_STATUS,$TELESALES_GROUPDEBT,$txtpostspeclist);//Update ที่ TBL_TELESALE_WORK_NEW WAIT|RS0016
                
                $this->Model_HomeInsurance->UpdatePaySlip($FirstName,$txtpostspeclist); //Update Status 1 Payslip
        }else{

            

        }

          $start=0;
          $pageend = 10;
          $where ="WHERE SaveBy ='".$FirstName."' AND PROSPECT_LIST_ID='".$txtpostspeclist."'  ";

          $data['get_Picbill'] = $this->Model_HomeInsurance->gettable_image($start,$pageend,$where);
          $data['Count_get_Picbill'] = $this->Model_HomeInsurance->countgettable_image($where);

          $checkStatus_Payslip = $this->Model_HomeInsurance->checkStatus_Payslip($FirstName,$txtpostspeclist); 
          $data['checkStatus_Payslip'] = $checkStatus_Payslip[0]->StatusButton;
          $data['Insurance_price'] =  $Insurance_price;
          $data['PROSPECT_LIST_ID'] = $txtpostspeclist;
          $data['FirstName'] = $FirstName;
		  $data['PaymentType'] = $PaymentType;
		  $data['payfirst'] = $Insurance_price;
          $this->load->view('SubWork_Notification/table_bill',$data);

   }
   public function Page_Pic(){

     $FirstName = iconv('tis-620', 'utf-8', $this->session->userdata('FirstName'));
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

        $where ="WHERE SaveBy ='".$FirstName."' ";
        $data['get_Picbill'] = $this->Model_HomeInsurance->gettable_image($start,$pageend,$where);
        $data['Count_get_Picbill'] = $this->Model_HomeInsurance->countgettable_image($where);

         $this->load->view('SubWork_Notification/table_bill',$data);
   }

   public function Deletebill(){

    $FirstName = iconv('tis-620', 'utf-8', $this->session->userdata('FirstName'));
    $AutoID = $this->input->post("AutoID");
    $Insurance_price = $this->input->post("Insurance_price");
    $PROSPECT_LIST_ID = $this->input->post("PROSPECT_LIST_ID");
    $PaymentType     = $this->input->post("PaymentType");
    $payfirst=  $this->input->post("payfirst");
    $where="WHERE SaveBy ='".$FirstName."' AND  AutoID='".$AutoID."'";


    $TransStatus = "NEW";
    $this->Model_HomeInsurance->UpdateTrans_Status($TransStatus,$PROSPECT_LIST_ID);
    
    $TELESALES_STATUS='NEW';
    $TELESALES_GROUPDEBT = 'NULL';
    $this->Model_HomeInsurance->UpdateStatus_tell($TELESALES_STATUS,$TELESALES_GROUPDEBT,$PROSPECT_LIST_ID);//Update ที่ TBL_TELESALE_WORK_NEW WAIT|RS0016

    $this->Model_HomeInsurance->Del_IMAGE_PAYSLIP($where); //delete

    $whereslip = "";
    $getsum = $this->Model_HomeInsurance->sumslip($FirstName,$PROSPECT_LIST_ID,$whereslip);
    if(count($getsum) == 0){
         $Sumpay = 0;
    }else{
         $Sumpay = $getsum[0]->Sumpay;
    }

    
     $this->Model_HomeInsurance->updatepayJob_Alert_New2($Sumpay,$PROSPECT_LIST_ID); //Update sumpay 


    $start = 0;
    $pageend = 10;
    $where ="WHERE SaveBy ='".$FirstName."' AND PROSPECT_LIST_ID='".$PROSPECT_LIST_ID."' ";
    $data['get_Picbill'] = $this->Model_HomeInsurance->gettable_image($start,$pageend,$where);
    $data['Count_get_Picbill'] = $this->Model_HomeInsurance->countgettable_image($where);
    
    $data['FirstName'] = $FirstName;
    $data['Insurance_price'] =  $Insurance_price;
    $data['PROSPECT_LIST_ID'] = $PROSPECT_LIST_ID;
	$data['PaymentType']      = $PaymentType;
    $data['payfirst']         = $payfirst;
	
    $checkStatus_Payslip = $this->Model_HomeInsurance->checkStatus_Payslip($FirstName,$PROSPECT_LIST_ID); 
    $data['checkStatus_Payslip'] = $checkStatus_Payslip[0]->StatusButton;


    $this->load->view('SubWork_Notification/table_bill',$data);
   }
   
  public function Comparison_Price() {
      
        $Username = $this->session->userdata('Username');
        $Password = $this->session->userdata('Password');
        $AutoID = $this->session->userdata('AutoID');
        $IDCard = $this->session->userdata('IDCard');
        $FirstName =  $this->session->userdata('FirstName');
        $LastName =  $this->session->userdata('LastName');
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


       $car_brand = $this->input->POST('CarBrand');
       $Car_modil = iconv("utf-8//ignore","tis-620//ignore",$this->input->post('CarDesc'));
       $YearGroup = $this->input->POST('CarYear');
       $CODE = $this->input->POST('Type_Car');
       $MakeDescription = $this->input->post('MakeDescription');


        $data['CarBrand'] = $car_brand;
        $data['Car_model'] = iconv("utf-8//ignore","tis-620//ignore",$Car_modil);
        $data['YearGroup'] = $YearGroup;
        $data['CODE'] = $CODE;
        $data['MakeDescription'] = $MakeDescription;

        $checktext1 = $this->input->post('checktext1');
        $checktext2 = $this->input->post('checktext2');
        $checktext3 = $this->input->post('checktext3');

        $wherechkompany ="'$checktext1','$checktext2','$checktext3'";
        $whereLengthvehicle = "AND A.Middle_ID in ( " . $wherechkompany . " )";


            if ($Username == "") {
                $this->load->view('false');
            } else {

                $data['checkComparison'] = $this->Model_HomeInsurance->Comparison_MOdels($car_brand, $Car_modil, $YearGroup,$MakeDescription, $CODE, $whereLengthvehicle);
            }
        

        $this->load->view('footer', $data);
    }
    
    
        public function Main_Commission() {

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
        }
        

        $start = 0;
        $pageend = 10;
        $data['pageend'] = $pageend;
        
        $data['Count_Commission'] = 0;
        
//      $data['Count_Commission'] = $this->Model_HomeInsurance->Count_Commission_Model($whereCommission, $start, $pageend);

        $data['Show_Data_management'] = "Checkcarinsurance/Commission";
        $this->load->view('SettingData/Main_Datamanagement', $data);
    }
    
    
        public function Show_Insurance_Commission() {


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
        }

        $datepaystart = $this->input->post("datepaystart");
        $datepayend = $this->input->post("datepayend");


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
        

        $thai = iconv("utf-8", "tis-620", "('ประกันภัย','ประกันภัยและ พ.ร.บ.')");


        $data['Select_Commission'] = $this->Model_HomeInsurance->Select_Commission_Model($thai,$Username,$datepaystart,$datepayend, $start, $pageend);
        $data['Count_Commission'] = $this->Model_HomeInsurance->Count_Commission_Model($thai,$datepaystart,$datepayend,$Username);

        $this->load->view('Checkcarinsurance/Table_Commission', $data);
    }

}
