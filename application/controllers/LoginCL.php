<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginCL extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Dhaka');
        $this->load->model('Student_model');
    }

    public function index() {
        redirect(base_url(''));
    }

    public function studentlogin() {


        if ($_POST['S_Id'] == $_POST['password']) { 
            $this->session->set_userdata(['loginas' => 'student', 'lverify' => 'yes','S_Id'=>$_POST['S_Id']]);
            $this->load->view('SDashboard/template');
        }else{
            redirect(base_url('StudentCL/index'));
        }
    }

    public function adminlogin() {
        if ($_POST['username'] == 'admin' && $_POST['password'] == '123') { 
            $this->session->set_userdata(['loginas' => 'admin', 'lverify' => 'yes']);
            $this->load->view('template/template');
        }else{
            redirect(base_url('Welcome/index'));
        }
    }

    public function Slogout() {
        // Destroy the session
        $this->session->sess_destroy();
        redirect(base_url('StudentCL/index'));
    }

    public function Alogout() {
        // Destroy the session
        $this->session->sess_destroy();
        redirect(base_url('Welcome/index'));
    }

}

?>