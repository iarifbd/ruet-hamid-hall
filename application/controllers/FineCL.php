<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FineCL extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Dhaka');
        $this->load->model('Student_model');
        $this->load->model('Fine_model');
    }

    public function index($gdate) {
        // Get the defaulters information
        $defaulters = $this->Fine_model->getDefalders($gdate);
        
        // Get the last day of this month
        $lastDateOfMonth = (new DateTime($gdate))->modify('last day of this month')->format('Y-m-d');

        // Prepare an array for new bills
        $newBills = [];

        foreach ($defaulters as $defaulter) {
            // Get the defaulter's month number
            $monthCount = $this->getMonthNumber($defaulter['ldate']);

            // Calculate fines and charges
            $fineAmount = number_format($monthCount * 5, 2);
            $hallCharge = number_format(500, 2);
            $totalDue = number_format($hallCharge + $fineAmount, 2);

            // Generate new bill entry
            $newBills[] = [
                'gdate' => $gdate,
                'ldate' => $lastDateOfMonth,
                'tdate' => '0000-00-00',
                'S_Id' => $defaulter['S_Id'],
                'description' => sprintf(
                    'Hall Charge: %s' . PHP_EOL . 'Delay Fine on %s (for %d Month): %s',
                    $hallCharge,
                    $defaulter['ldate'],
                    $monthCount,
                    $fineAmount
                ),
                'acctype' => 'Dr',
                'dr' => $totalDue,
                'cr' => number_format(0, 2),
                'balance' => $totalDue,
                'status' => 'Due'
            ];
        }

        $data=$newBills;

        // Save to student ledger
        $this->Fine_model->NewBill($data);

        // Output the generated bills
        echo "<pre>";
        print_r($data);
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


}
