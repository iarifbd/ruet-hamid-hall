<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NumberToWords {
    
    private $ones = array(
        0 => "", 1 => "One", 2 => "Two", 3 => "Three", 4 => "Four", 5 => "Five", 
        6 => "Six", 7 => "Seven", 8 => "Eight", 9 => "Nine", 10 => "Ten", 
        11 => "Eleven", 12 => "Twelve", 13 => "Thirteen", 14 => "Fourteen", 
        15 => "Fifteen", 16 => "Sixteen", 17 => "Seventeen", 18 => "Eighteen", 19 => "Nineteen"
    );

    private $tens = array(
        0 => "", 2 => "Twenty", 3 => "Thirty", 4 => "Forty", 5 => "Fifty", 
        6 => "Sixty", 7 => "Seventy", 8 => "Eighty", 9 => "Ninety"
    );
    
    private $thousands = array(
        1 => "Thousand", 2 => "Lac", 3 => "Crore"
    );

    public function convert_number_to_words($number) {
        if (!is_numeric($number)) {
            return false;
        }

        $num = floor($number); // Take only the whole number part
        $decimal = round(($number - $num) * 100); // Get decimal part

        $number_in_words = $this->convert($num) . " Taka";

        // Add the paisa part if exists
        if ($decimal > 0) {
            $number_in_words .= " and " . $this->convert($decimal) . " Paisa";
        }

        return $number_in_words;
    }

    private function convert($number) {
        if ($number < 20) {
            return $this->ones[$number];
        } elseif ($number < 100) {
            return $this->tens[floor($number / 10)] . " " . $this->ones[$number % 10];
        } elseif ($number < 1000) {
            return $this->ones[floor($number / 100)] . " Hundred " . $this->convert($number % 100);
        } else {
            return $this->convert_thousands($number);
        }
    }

    private function convert_thousands($number) {
        $output = '';
        $count = 0;

        while ($number > 0) {
            if ($number % 1000 != 0) {
                $output = $this->convert($number % 1000) . " " . ($count > 0 ? $this->thousands[$count] : '') . " " . $output;
            }
            $number = floor($number / 1000);
            $count++;
        }

        return trim($output);
    }
}
