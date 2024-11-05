<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hostel_sit_plan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Hostel_model'); // Make sure to create this model
        $this->load->helper('url');
    }

    public function index() {
        $data['vsit_plan']=$this->Hostel_model->VacentSitPlan();
        $this->load->view('Sitplan/SitAlocationForm', $data);
    }

    public function saveAlotment(){
        
        $data=array(
                'hall_name'=>$this->input->post('Hall_name'),
                'floor'=>$this->input->post('floor'),
                'room_num'=>$this->input->post('room'),
                'sit_num'=>$this->input->post('sit'),
                'S_Id'=>'',
                'adate'=>'0000-00-00',
                'vdate'=>'0000-00-00',
                'status'=>'vacant'
            );


        echo "<pre>";
        print_r($_POST);


        //save alotment 
       // $this->Hostel_model->saveAlotment($data);
    }

    // Load the form to add a new seat
    public function CreateSitPlan() {
        $data['floor']=$this->Hostel_model->get_all_floor();
        $data['room']=$this->Hostel_model->get_all_room();
        $data['sit']=$this->Hostel_model->get_all_sit();
        $data['sit_plan']=$this->Hostel_model->SitPlan();
        $this->load->view('Sitplan/CreateSitPlan',$data);

    }

    public function makeplan(){
        print_r($_POST);
        $hallName=$this->input->post('Hall_name');
        $floor=$this->input->post('floor');
        $room=$this->input->post('room');
        $sit=$this->input->post('sit');
        $iscreated=$this->Hostel_model->CheckSitPlan($hallName,$floor,$room,$sit);
        //
        if ($iscreated) {
            $this->session->set_flashdata('error', 'Duplicate room created');
            redirect(base_url('Hostel_sit_plan/CreateSitPlan'));
        }else{
            $data=array(
                'hall_name'=>$this->input->post('Hall_name'),
                'floor'=>$this->input->post('floor'),
                'room_num'=>$this->input->post('room'),
                'sit_num'=>$this->input->post('sit'),
                'S_Id'=>'',
                'adate'=>'0000-00-00',
                'vdate'=>'0000-00-00',
                'status'=>'vacant'
            );

            $this->session->set_flashdata('success', 'New room created');
            redirect(base_url('Hostel_sit_plan/CreateSitPlan'));
        }
        echo "<pre>";
        print_r($data);
    }


    
}
