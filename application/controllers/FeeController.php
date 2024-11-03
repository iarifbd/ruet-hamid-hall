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

    public function getMonthNumber($date) {
        // Validate the date format and extract year and month
        $dateTime = DateTime::createFromFormat('Y-m-d', $date);
        if (!$dateTime) {
            throw new InvalidArgumentException("Invalid date format.");
        }

        $year = (int)$dateTime->format('Y');
        $month = (int)$dateTime->format('m');

        // Calculate the base month number for the starting year (2024)
        $baseYear = 2024;
        $baseMonth = 1; // January

        // Calculate the month number
        return ($year - $baseYear) * 12 + ($month - $baseMonth + 1);
    }

    /*// Example usage
    try {
        echo getMonthNumber('2024-02-01'); // Output: 2 (February 2024)
        echo getMonthNumber('2025-01-01'); // Output: 13 (January 2025)
        // This will throw an exception for an invalid date
        echo getMonthNumber('2024-02-31'); // Invalid date
    } catch (Exception $e) {
        echo $e->getMessage();
    }*/


    

}
