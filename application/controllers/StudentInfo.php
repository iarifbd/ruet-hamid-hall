<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StudentInfo extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Dhaka');
        $this->load->model('Student_model');
    }

    public function index() {
        $data['stuinfo'] = $this->Student_model->stuinfo();
        $this->load->view('studentsinfo/list', $data);
    }

    public function getstudent($id=null) {
        $data['stuinfo'] = $this->Student_model->stuinfo($id);
        $this->load->view('studentsinfo/view_Student_info', $data);
    }

    public function Studentform($id = null) {
        if ($id) {
            $data['student'] = $this->Student_model->getStudent($id); // Get data for editing
        } else {
            $data['student'] = null; // No data for new entry
        }
        
        $this->load->view('studentsinfo/student_form', $data); // Load the form view
    }


    public function SInfosave() {
            $id = $this->input->post('id');
            $data = [
                'S_Id' => $this->input->post('S_Id'),
                'Reg_No' => $this->input->post('Reg_No'),
                'Name' => $this->input->post('Name'),
                'Room' => $this->input->post('Room'),
                'Dept' => $this->input->post('Dept'),
                'Batch' => $this->input->post('Batch'),
                'F_Name' => $this->input->post('F_Name'),
                'M_Name' => $this->input->post('M_Name'),
                'Address' => $this->input->post('Address'),
                'Mobile' => $this->input->post('Mobile'),
                'Gur_Mobile' => $this->input->post('Gur_Mobile'),
                'Blood' => $this->input->post('Blood'),
                'Religion' => $this->input->post('Religion'),
                'Hall_Name' => $this->input->post('Hall_Name'),
            ];

            if ($id) {
                $this->StudentModel->updateStudent($id, $data); // Update existing record
            } else {
                $this->StudentModel->insertStudent($data); // Insert new record
            }

            redirect('Student_model'); // Redirect after save
    }  



}
