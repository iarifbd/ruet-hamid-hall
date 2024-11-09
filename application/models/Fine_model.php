<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fine_model extends CI_Model {

    public function CalFine($gdate) {
        $this->db->where('status', 'Due');
        $this->db->where('achead', 'HC');
        $this->db->where('ldate <', $gdate);
        $query = $this->db->get('studentledger');
        
        // Return the result as an array
        $defaulters= $query->result_array();  

        // Get the last day of this month
        $lastDateOfMonth = (new DateTime($gdate))->modify('last day of this month')->format('Y-m-d');

        // Prepare an array for new bills
        $newBills = [];

        foreach ($defaulters as $defaulter) {
            // Get the defaulter's month number form fdate to tdate
            $monthCount = $this->getMonthNumber($gdate,$defaulter['ldate']);

            // Calculate fines and charges
            $fineAmount = number_format($monthCount * 5, 2);
            $hallCharge = number_format(500, 2);
            $totalDue = number_format($hallCharge + $fineAmount, 2);

            // Generate new Fines 
            $newBills[] = [
                'gdate' => $gdate,
                'ldate' => $lastDateOfMonth,
                'tdate' => '0000-00-00',
                'S_Id' => $defaulter['S_Id'],
                'description' => sprintf(
                    'Delay Fine on %s (for %d Month): %s',
                    $defaulter['ldate'],
                    $monthCount,
                    $fineAmount
                ),
                'acctype' => 'Dr',
                'achead' => 'DF',
                'dr' => $fineAmount,
                'cr' => number_format(0, 2),
                'balance' => $fineAmount,
                'status' => 'Due'
            ];
        }

        return $newBills;            
    }

    public function getMonthNumber($fdate,$tdate) {
        // Validate the date format and extract to year and month
        $dateTime = DateTime::createFromFormat('Y-m-d', $tdate);
        if (!$dateTime) {
            throw new InvalidArgumentException("Invalid date format.");
        }

        $tyear = (int)$dateTime->format('Y');
        $tmonth = (int)$dateTime->format('m');

        // Calculate the base month number from
        $BaseDateTime = DateTime::createFromFormat('Y-m-d', $fdate);
        $baseYear = (int)$BaseDateTime->format('Y');
        $baseMonth = (int)$BaseDateTime->format('m');

        // Calculate the month number
        return ($baseYear-$tyear) * 12 + ($baseMonth-$tmonth);
    }


    public function CalHC($gdate){
        // get who are in hall occupy/vacant
        $this->db->where('status', 'occupy');
        $query = $this->db->get('hostel_sit_plan');
        
        // Return the result as an array
        $boarders= $query->result_array();  

        // Get the last day of this month
        $lastDateOfMonth = (new DateTime($gdate))->modify('last day of this month')->format('Y-m-d');

        foreach ($boarders as $key => $boarder) {
            // Generate new Hall Charge for  boarders
            $HC[] = [
                'gdate' => $gdate,
                'ldate' => $lastDateOfMonth,
                'tdate' => '0000-00-00',
                'S_Id' => $boarder['S_Id'],
                'description' => 'Hall Charge on '.$gdate,
                'acctype' => 'Dr',
                'achead' => 'HC',
                'dr' => number_format(500, 2),
                'cr' => number_format(0, 2),
                'balance' => number_format(500, 2),
                'status' => 'Due'
            ];
        }

        return $HC;
    }
    
    public function instStLedg($data) {
        return $this->db->insert_batch('studentledger', $data); // Insert multiple records into studentledger
    }

    public function ApplyHC($data) {
        return $this->db->insert('studentledger', $data); // Insert multiple records into studentledger
    }

}
