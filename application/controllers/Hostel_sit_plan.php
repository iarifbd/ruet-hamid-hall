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
        $data['vsit_plan']=$this->Hostel_model->VSitPlan();
        $this->load->view('Sitplan/SitAlocationForm', $data);
        
         
        /*echo "<pre>";
        print_r($data['vsit_plan']);
        echo "</pre>";*/
    }

    public function getHostelDetails() {
        // Assuming the hostel_plan is returned by VSitPlan method
        $hostel_plan = $this->Hostel_model->VSitPlan(); // Fetch the hostel plan

        // Get all hall names (keys of the outer array)
        $hall_names = array_keys($hostel_plan);

        // Initialize arrays to store floor numbers and seat numbers
        $all_floor_numbers = [];
        $all_sit_numbers = [];

        // Loop through each hall and get the floor numbers
        foreach ($hall_names as $hall_name) {
            // Get all floor numbers (keys of the second-level array) for the specified hall
            $floor_numbers = array_keys($hostel_plan[$hall_name]);

            // Store the floor numbers for each hall
            $all_floor_numbers[$hall_name] = $floor_numbers;

            // Now loop through the floors to get seat numbers for each floor and room
            foreach ($floor_numbers as $floor) {
                // Get the room numbers (keys of the third-level array) for the specified floor
                $room_numbers = array_keys($hostel_plan[$hall_name][$floor]);

                // Now loop through rooms to get seat numbers
                foreach ($room_numbers as $room) {
                    // Get the seat numbers (keys of the fourth-level array) for the specified room
                    $sit_numbers = array_keys($hostel_plan[$hall_name][$floor][$room]);

                    // Store the seat numbers for each room
                    $all_sit_numbers[$hall_name][$floor][$room] = $sit_numbers;
                }
            }
        }

        // Print the details to check the structure
        echo "<pre>";
        print_r($hall_names);           // Hall Names
        print_r($all_floor_numbers);    // Floor Numbers per Hall
        print_r($all_sit_numbers);      // Seat Numbers per Room in each Floor
        echo "</pre>";
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
