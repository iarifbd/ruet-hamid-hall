<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hostel_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database(); // Load the database library
    }

    // Get all seating plans
    public function get_all_seats() {
        $query = $this->db->get('hostel_sit_plan');
        return $query->result_array();
    }

    // Get a single seat by ID
    public function get_seat_by_id($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('hostel_sit_plan');
        return $query->row_array(); // Return a single row
    }

    // Insert a new seat
    public function insert_seat($data) {
        return $this->db->insert('hostel_sit_plan', $data);
    }

    // Update an existing seat
    public function update_seat($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('hostel_sit_plan', $data);
    }

    // Delete a seat
    public function delete_seat($id) {
        $this->db->where('id', $id);
        return $this->db->delete('hostel_sit_plan');
    }
}
