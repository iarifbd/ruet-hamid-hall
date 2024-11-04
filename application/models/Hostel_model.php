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

}
