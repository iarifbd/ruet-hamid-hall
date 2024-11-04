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
    public function add() {
        $this->load->view('hostel_sit_plan/form');
    }

    // Load the form to edit an existing seat
    public function edit($id) {
        $data['sit_plan'] = $this->Hostel_model->get_seat_by_id($id);
        $this->load->view('hostel_sit_plan/form', $data);
    }

    // Save the seat information (add or update)
    public function save() {
        $data = array(
            'floor' => $this->input->post('floor'),
            'room_num' => $this->input->post('room_num'),
            'sit_num' => $this->input->post('sit_num'),
            'S_Id' => $this->input->post('S_Id'),
            'adate' => $this->input->post('adate'),
            'vdate' => $this->input->post('vdate'),
            'status' => $this->input->post('status')
        );

        // Check if we are updating or inserting a new record
        if ($this->input->post('id')) {
            $this->Hostel_model->update_seat($this->input->post('id'), $data);
            $this->session->set_flashdata('message', 'Seat updated successfully!');
        } else {
            $this->Hostel_model->insert_seat($data);
            $this->session->set_flashdata('message', 'Seat added successfully!');
        }

        redirect('hostel_sit_plan');
    }

    // Delete a seat
    public function delete($id) {
        $this->Hostel_model->delete_seat($id);
        $this->session->set_flashdata('message', 'Seat deleted successfully!');
        redirect('hostel_sit_plan');
    }
}
