<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lot_generator {

    protected $CI;
    protected $token_length;

    public function __construct() {
        $this->CI =& get_instance();
        $this->CI->load->helper('string'); // Load CodeIgniter's string helper for random string generation

        // Set default token length (adjust as needed)
        $this->token_length = 6;
    }

    // Function to generate a new token number with the specified length
    public function generate_token($length = NULL) {
        if (!$length) {
            $length = $this->token_length;
        }

        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $numbers = '0123456789';

        $token = '';

        // Calculate how many characters should be letters and how many should be numbers
        $num_letters = min($length, 3); // At least 3 letters if the length is greater than or equal to 3
        $num_numbers = $length - $num_letters; // Remaining characters will be numbers

        // Generate random letters
        for ($i = 0; $i < $num_letters; $i++) {
            $token .= $alphabet[rand(0, strlen($alphabet) - 1)];
        }

        // Generate random numbers
        for ($i = 0; $i < $num_numbers; $i++) {
            $token .= $numbers[rand(0, strlen($numbers) - 1)];
        }

        // Shuffle the token characters to randomize the order
        $token = str_shuffle($token);

        return $token;
    }
}
