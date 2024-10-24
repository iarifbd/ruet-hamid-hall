<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sales_model extends CI_Model {

    public function get_all() {
        $query = $this->db->get('orders');
        return $query->result_array();
    }
    
    public function get_by_date($from, $to) {
        $this->db->select('*'); // Select all fields
        $this->db->from('orders'); // Specify the table
        $this->db->where('date_time >=', $from); // Date range from
        $this->db->where('date_time <=', $to);   // Date range to
        $query = $this->db->get(); // Execute the query
        
        return $query->result_array(); // Return result as array
    }

}
