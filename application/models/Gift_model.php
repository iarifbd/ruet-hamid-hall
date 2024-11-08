<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gift_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    // Fetch all gifts
    public function get_gifts()
    {
        $query = $this->db->get('gifts');
        return $query->result_array();
    }

    // Fetch a random gift
    public function get_random_gift()
    {
        $query = $this->db->order_by('RAND()')->limit(1)->get('gifts');
        return $query->row_array();
    }
}
?>
