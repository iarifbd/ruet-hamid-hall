<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sales extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Dhaka');
        $this->load->model('Sales_model');
    }

    public function index() {
        $data['get_all'] = $this->Sales_model->get_all();
        $this->load->view('sales/salesform', $data);
    }


    public function get_by_date(){

        $from_date=$this->input->post('from_date');
        $to_date=$this->input->post('to_date');

        $data['salesrecords']=$this->Sales_model->get_by_date($from_date,$to_date);
        $this->load->view('sales/salesreport', $data);

    }
  

}
