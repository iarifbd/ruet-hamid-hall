<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hostel_sit_plan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Hostel_model'); // Make sure to create this model
        $this->load->model('Fine_model'); // Make sure to create this model
        $this->load->helper('url');
    }

    public function index() {
        $data['vsit_plan']=$this->Hostel_model->VacentSitPlan();
        $data['sit_plan']=$this->Hostel_model->SitPlan();
        $data['floor'] = '';
        $this->load->view('Sitplan/SitAlocationForm', $data);
    }

    public function ajaxfloor() {
        // Get hall_name from POST data
        $hall_name = $this->input->post('hall_name');

        // Validate hall_name (ensure it's not empty)
        if (!empty($hall_name)) {
            $Floors = $this->Hostel_model->VacentFloor($hall_name);

            // Create the options for the Floors dropdown
            if (!empty($Floors)) {
                echo "<option value=''>Select Floor Number</option>";
                foreach ($Floors as $floor) {
                    echo "<option value='" . htmlspecialchars($floor['floor']) . "'>" . htmlspecialchars($floor['floor']) . "</option>";
                }
            } else {
                echo "<option value=''>No Floors available</option>";
            }
        } else {
            echo "<option value=''>Invalid Hall Name</option>";
        }
    }

    public function ajaxroom() {
        // Get hall_name from POST data
        $hall_name = $this->input->post('hall_name');
        $floor = $this->input->post('floor');

        // Validate hall_name (ensure it's not empty)
        if (!empty($hall_name) && !empty($floor)) {
            $Rooms = $this->Hostel_model->VacentRoom($hall_name,$floor);

            // Create the options for the Rooms dropdown
            if (!empty($Rooms)) {
                echo "<option value=''>Select Room Number</option>";
                foreach ($Rooms as $room) {
                    echo "<option value='" . htmlspecialchars($room['room_num']) . "'>" . htmlspecialchars($room['room_num']) . "</option>";
                }
            } else {
                echo "<option value=''>No room available</option>";
            }
        } else {
            echo "<option value=''>Invalid Hall Name</option>";
        }
    }

    public function ajaxsit() {
        // Get hall_name from POST data
        $hall_name = $this->input->post('hall_name');
        $floor = $this->input->post('floor');
        $room_num = $this->input->post('roomNumber');

        // Validate hall_name (ensure it's not empty)
        if (!empty($hall_name) && !empty($floor)) {
            $Sits = $this->Hostel_model->VacentSit($hall_name,$floor,$room_num);

            // Create the options for the Sits dropdown
            if (!empty($Sits)) {
                echo "<option value=''>Select Sit Number</option>";
                foreach ($Sits as $sit) {
                    echo "<option value='" . htmlspecialchars($sit['sit_num']) . "'>" . htmlspecialchars($sit['sit_num']) . "</option>";
                }
            } else {
                echo "<option value=''>No sit available</option>";
            }
        } else {
            echo "<option value=''>Invalid Hall Name</option>";
        }
    }

    public function saveAlotment(){
        
        $data=array(
                'hall_name'=>$this->input->post('hall_name'),
                'floor'=>$this->input->post('floor'),
                'room_num'=>$this->input->post('roomNumber'),
                'sit_num'=>$this->input->post('seatNumber'),
                'S_Id'=>$this->input->post('studentId'),
                'adate'=>$this->input->post('allocationDate'),
                'vdate'=>'0000-00-00',
                'status'=>'occupy'
            );

        //save alotment 
        $this->Hostel_model->saveAlotment($data);

        // Get the last day of this month
        $lastDateOfMonth = (new DateTime($this->input->post('allocationDate')))->modify('last day of this month')->format('Y-m-d');

        $HC = array(
                'gdate' => $this->input->post('allocationDate'),
                'ldate' => $lastDateOfMonth,
                'tdate' => '0000-00-00',
                'S_Id' => $this->input->post('studentId'),
                'description' => 'Hall Charge on '.$this->input->post('allocationDate'),
                'acctype' => 'Dr',
                'achead' => 'HC',
                'dr' => number_format(500, 2),
                'cr' => number_format(0, 2),
                'balance' => number_format(500, 2),
                'status' => 'Due'
            );

        //apply HC 
        $this->Fine_model->ApplyHC($HC);

        // Redirect after save
        redirect(base_url('Hostel_sit_plan')); 

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
    }


    
}
