<?php defined('BASEPATH') OR exit('No direct script access allowed');

class FeeController extends CI_Controller {

    public function index() {
        // Define the base fee
        $fee = 500; // Base fee

        // Load the library with parameters
        $this->load->library('FeeCalculator', array('fee' => $fee), 'feeCalculator');

        // Calculate fines and totals
        $result = $this->feeCalculator->calculateFine('May 2024');

        // Output the results
        echo "Total Fees: " . $result['total_fees'] . " Taka<br>";
        echo "Total Fine: " . $result['total_fine'] . " Taka<br>";
        echo "Total Payable: " . $result['total_payable'] . " Taka<br>";

        $month_number = date('n', strtotime('MAY'));

echo $month_number; // Output: 5
    }
}
