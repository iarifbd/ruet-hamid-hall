<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StudentCL extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Dhaka');
        $this->load->model('Student_model');
    }

    public function index() {
        $this->load->view('SDashboard/template');
    }



}

?>