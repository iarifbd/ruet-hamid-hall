<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FineCL extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Dhaka');
        $this->load->model('Student_model');
        $this->load->model('Fine_model');
    }

    public function index($gdate){
        $this->HCCal($gdate);
        $this->FineCal($gdate);
    }

    public function FineCal($gdate){
        $defaulters = $this->Fine_model->CalFine($gdate);
        // Save to student ledger
        $this->Fine_model->instStLedg($defaulters);
    }

    public function HCCal($gdate){
        $boarders=$this->Fine_model->CalHC($gdate);
        // Save to student ledger
        $this->Fine_model->instStLedg($boarders);
    }




}
