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

    public function _remap($method) {
        switch ($method) {
            case 'business':
                $this->load->view('business');
                break;
            case 'charities':
                $this->load->view('charities');
                break;
            case 'college':
                $this->load->view('college');
                break;
            default:
                $this->load->view('Login');
        }
    }

}
