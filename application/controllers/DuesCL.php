<?php

class DuesCL extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Load your custom library
        $this->load->library('dues_model');
    }

    public function create_dues() {
        // Define your parameters
        $date = '2024-02-01';
        $rate = 5;

        // Call the library method
        $this->dues_model->insert_dues($date, $rate);

        // Optionally, add a response or redirect
        echo "Dues inserted successfully!";
    }
}
