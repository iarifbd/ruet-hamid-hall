<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller{

	public function __construct()
	{
	    parent::__construct();
	    date_default_timezone_set('Asia/Dhaka');	
	}


	public function index() {
	    $this->load->view('template/login');
	}


	public function admin() {
	    // Check if the session variable 'loginas' is not set or its value is not 'admin'
	    if ($this->session->userdata('loginas') !== 'admin') {
	        $this->load->view('template/template');
	    }	
	    
	}
	
}
