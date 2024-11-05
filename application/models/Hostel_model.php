<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hostel_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database(); // Load the database library
    }

    // Get all seating plans
    public function get_all_floor() {
        $this->db->where('status', 'active');
        $query = $this->db->get('hostel_floor');
        return $query->result_array();
    }

    public function get_all_room() {
        $this->db->where('status', 'active');
        $query = $this->db->get('hostel_room');
        return $query->result_array();
    }

    public function get_all_sit() {
        $this->db->where('status', 'active');
        $query = $this->db->get('hostel_sit');
        return $query->result_array();
    }

    public function SitPlan() {
        $query = $this->db->get('hostel_sit_plan');
        return $query->result_array();
    }

    public function VSitPlan() {
        // Fetch all rows with 'vacant' status
        $this->db->where('status', 'vacant');
        $query = $this->db->get('hostel_sit_plan');
        $VSitPlan = $query->result_array(); // Resulting array of vacant seat rows

        // Initialize the main array for hostel plan
        $hostel_plan = [];

        // Loop through each row and build the nested structure
        foreach ($VSitPlan as $row) {
            $hall = $row['hall_name'];        // Hall Name
            $floor = $row['floor'];           // Floor Number
            $room = $row['room_num'];         // Room Number
            $sit = $row['sit_num'];           // Seat Number (Sit ID)
            
            // Dynamically create the structure based on hall, floor, room, and seat
            $hostel_plan[$hall][$floor][$room][$sit] = [
                'S_Id'   => $row['S_Id'],    // Student ID
                'adate'  => $row['adate'],   // Allocation Date
                'vdate'  => $row['vdate'],   // Vacant Date
                'status' => $row['status']   // Seat status (vacant)
            ];
        }

        // Return the dynamically built nested structure
        return $hostel_plan;
    }


    public function CheckSitPlan($hallName,$floor,$room,$sit){
        $this->db->where('hall_name',$hallName );
        $this->db->where('floor', $floor);
        $this->db->where('room_num', $room);
        $this->db->where('sit_num', $sit);
        $query = $this->db->get('hostel_sit_plan');
        return $query->result_array();
    }

    public function SitPlanSave($data){
        $this->db->insert_batch('hostel_sit_plan', $data);
    }

}
