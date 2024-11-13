<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StudentCL extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Dhaka');
        $this->load->model('Student_model');
    }

    public function index() {
        $this->load->view('SDashboard/Login');
    }

    public function student(){
        // Check if the session is set and 'loginas' is 'student'
        if ($this->session->userdata('loginas') !== 'student') {
            $this->load->view('SDashboard/template');
        }
    }

    public function StuTopSheet(){
        $id=$this->session->userdata('S_Id');
        $data['stuacc'] = $this->Student_model->accTopSheet($id);
        $this->load->view('SDashboard/accTopSheet', $data);
    }

    public function StuLedDetails(){
        $id=$this->session->userdata('S_Id');
        $data['stuacc'] = $this->Student_model->StuLedgDetails($id);
        $this->load->view('SDashboard/AccLedDetail', $data);
    }

}

?>