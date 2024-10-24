<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AreaChart extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Fetch data for the area chart based on monthly net amount from orders.
     *
     * @return array Array of data with month names and total amounts
     */
    public function getMonthlyNetAmounts()
    {
        // Build the query
        $this->db->select("DATE_FORMAT(date_time, '%b') AS month_name, SUM(net_amount) AS total_amount");
        $this->db->from('orders');
        $this->db->group_by("DATE_FORMAT(date_time, '%b')");
        $this->db->order_by('MIN(date_time)');

        // Execute the query
        $query = $this->db->get();

        // Return the result as an array
        return $query->result_array();
    }
}
