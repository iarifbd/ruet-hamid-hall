<?php defined('BASEPATH') OR exit('No direct script access allowed');

class FeeCalculator {

    private $fee;
    private $penaltyPerMonth = 5;

    public function __construct($config = array()) {
        if (!empty($config)) {
            $this->fee = $config['fee'];
        }
    }

    public function calculateFine($currentMonth) {
        // Define the overdue months and their respective dues
        $dues = [
            'January' => 5,  // 5 months overdue from January to May
            'February' => 4, // 4 months overdue from February to May
            'March' => 0,    // No fine if paid in May
            'April' => 0     // No fine yet (not due)
        ];

        // Calculate total fine
        $totalFine = 0;

        foreach ($dues as $month => $monthsLate) {
            if ($monthsLate > 0) {
                $totalFine += $monthsLate * $this->penaltyPerMonth; // Add fine for each month with dues
            }
        }

        // Calculate total payable amount
        $totalPayable = $this->fee + $totalFine;

        return [
            'total_fees' => $this->fee,
            'total_fine' => $totalFine,
            'total_payable' => $totalPayable
        ];
    }
}
