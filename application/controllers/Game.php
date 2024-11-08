<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Game extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Gift_model');
    }

    // Load the game page
    public function index()
    {
        $data['gifts'] = $this->Gift_model->get_gifts();
        $this->load->view('game_view', $data);
    }

    // Spin the wheel and return a random gift
    public function spin()
    {
        $gift = $this->Gift_model->get_random_gift();
        echo json_encode($gift);
    }
}
?>
