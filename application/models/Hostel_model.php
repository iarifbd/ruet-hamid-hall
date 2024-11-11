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
        // Apply the ordering before executing the query
        $this->db->order_by('hall_name', 'ASC');
        $this->db->order_by('floor', 'ASC');
        $this->db->order_by('room_num', 'ASC');
        $this->db->order_by('sit_num', 'DEC');

        // Now fetch the results
        $query = $this->db->get('hostel_sit_plan');
        return $query->result_array();
    }

    public function VacentSitPlan() {
        $this->db->select('hall_name');
        $this->db->where('status', 'vacant');
        $this->db->group_by('hall_name');
        $this->db->order_by('hall_name', 'ASC');
        $query = $this->db->get('hostel_sit_plan');
        $VSitPlan = $query->result_array();
        
        return $VSitPlan;
    }

    public function VacentFloor($hall_name) {
        $this->db->select('floor');
        $this->db->where('status', 'vacant');
        $this->db->where('hall_name', $hall_name);
        $this->db->group_by('floor');
        $this->db->order_by('floor', 'ASC');
        $query = $this->db->get('hostel_sit_plan');
        $VacentFloor = $query->result_array();
        
        return $VacentFloor;
    }

    public function VacentRoom($hall_name,$floor) {
        $this->db->select('room_num');
        $this->db->where('status', 'vacant');
        $this->db->where('hall_name', $hall_name);
        $this->db->where('floor', $floor);
        $this->db->group_by('room_num');
        $this->db->order_by('room_num', 'ASC');
        $query = $this->db->get('hostel_sit_plan');
        $VacentRoom = $query->result_array();
        
        return $VacentRoom;
    }

    public function VacentSit($hall_name,$floor,$room_num) {
        $this->db->select('sit_num');
        $this->db->where('status', 'vacant');
        $this->db->where('hall_name', $hall_name);
        $this->db->where('floor', $floor);
        $this->db->where('room_num', $room_num);
        $this->db->group_by('sit_num');
        $this->db->order_by('sit_num', 'ASC');
        $query = $this->db->get('hostel_sit_plan');
        $VacentSit = $query->result_array();
        
        return $VacentSit;
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

    public function saveAlotment($data){
        $this->db->insert('hostel_sit_plan', $data);
    }

    public function save_hall_records($data){
        $this->db->insert('hall_records', $data);
    }


}
