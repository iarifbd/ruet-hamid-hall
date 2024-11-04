<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hostel_sit_plan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Hostel_model'); // Make sure to create this model
        $this->load->helper('url');
    }

    // Display the list of seating plans
    public function index() {
        $data['sit_plans'] = $this->Hostel_model->get_all_seats();
        $this->load->view('Sitplan/SitAlocationForm', $data);
    }

    // Load the form to add a new seat
    public function CreateSitPlan() {
        $data['floor']=$this->Hostel_model->get_all_floor();
        $data['room']=$this->Hostel_model->get_all_room();
        $data['sit']=$this->Hostel_model->get_all_sit();
        $this->load->view('Sitplan/CreateSitPlan',$data);
    }

    public function makeplan(){
        print_r($_POST);
    }


    
}
