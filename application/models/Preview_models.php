<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Model_HomeInsurance extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function Current_date() {
        $query = "SELECT convert(smalldatetime,GETDATE()) AS Currentdate";
        return $this->db->query($query)->result();
    }

}
