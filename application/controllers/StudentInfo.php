<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StudentInfo extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Dhaka');
        $this->load->model('Student_model');
    }

    public function index() {
        $data['stuinfo'] = $this->Student_model->stuinfo();
        $this->load->view('studentsinfo/list', $data);
    }

    public function getstudent($id=null) {
        $data['stuinfo'] = $this->Student_model->stuinfo($id);
        $this->load->view('studentsinfo/view_Student_info', $data);
    }


}
