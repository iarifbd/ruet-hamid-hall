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

    }

    public function getMonthNumber($year, $month) {
        // Calculate the base month number for the starting year (2024)
        $baseYear = 2024;
        $baseMonth = 1; // January
        
        // Calculate the month number
        echo ($year - $baseYear) * 12 + ($month - $baseMonth + 1);

        /*// Example usage
        echo getMonthNumber(2024, 1); // Output: 1 (January 2024)
        echo getMonthNumber(2024, 2); // Output: 2 (February 2024)
        echo getMonthNumber(2025, 1); // Output: 13 (January 2025)
        echo getMonthNumber(2025, 2); // Output: 14 (February 2025) */
    }

    

}
