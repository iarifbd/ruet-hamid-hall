<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fine_model extends CI_Model {

    public function getDefalders($ldate) {
        // Use the correct syntax for where conditions
        $this->db->where('status', 'Due');
        $this->db->where('ldate <', $ldate);
        $query = $this->db->get('studentledger');

        // Return the result as an array
        return $query->result_array();       
    }

    public function NewFine($data) {
        return $this->db->insert_batch('studentledger', $data); // Insert multiple records into studentledger
    }

    public function NewBill($data) {
        return $this->db->insert('studentledger', $data); // Insert multiple records into studentledger
    }

    
}
