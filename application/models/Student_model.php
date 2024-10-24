<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student_model extends CI_Model {


    // Fetch all products or specific student information based on ID
    public function stuinfo($id = null) {
        // If an ID is provided, filter by that ID
        if ($id !== null) {
            $this->db->where('S_Id', $id);
        }

        // Order the results by 'id'
        $this->db->order_by('id', 'ASC');

        // Execute the query on the 'studentinformation' table
        $query = $this->db->get('studentinformation');

        // Return the result as an array
        return $query->result_array();
    }

  

}
