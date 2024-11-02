<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dues_model {

    protected $CI;

    public function __construct() {
        // Get the CodeIgniter super object
        $this->CI =& get_instance();
        // Load the database library
        $this->CI->load->database();
    }

    public function insert_dues($date, $rate) {
        // Prepare the query
        $sql = "
            INSERT INTO dues (S_Id, gdate, rate, status) 
            SELECT S_Id, gdate, ?, status 
            FROM studentledger 
            WHERE status = 'Not Paid' AND ldate < ?
        ";

        // Execute the query with the provided parameters
        $this->CI->db->query($sql, array($rate, $date));
    }
}
