<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Dhaka');
        $this->load->model('Student_model');
        $this->load->model('Fine_model');
        $this->load->library('cart');
        $this->load->library('NumberToWords');
    }

    // Method to view the cart
    public function index() {
        $id=$this->session->userdata('S_Id');
        $data['stuacc'] = $this->Student_model->inv_due($id);
        $this->load->view('SDashboard/inv_gen',$data);
    }

    // Method to add item to cart
    public function add($gdate = NULL, $TotalDue = NULL, $S_Id = NULL) {

            if ($gdate && $TotalDue && $S_Id) {
            $product_data = array(
                'id'      => $S_Id,         // Use gdate as product ID
                'qty'     => 1,               
                'price'   => $TotalDue,       // TotalDue as price
                'name'    => $gdate, 
                'options' => array('due' => $TotalDue)  
            );

            // Add the product to the cart
            $this->cart->insert($product_data);

            // Redirect to the cart view after adding the item
            redirect('cart');
        } else {
            // If no data is passed, redirect to cart page with a message
            redirect('cart');
        }
    }

    // Method to remove item from cart
    public function remove($rowid) {
        $this->cart->remove($rowid);
        redirect('cart');
    }

    // Method to update item quantity in cart
    public function update() {
        $rowid = $this->input->post('rowid');
        $qty = $this->input->post('qty');

        $data = array(
            'rowid' => $rowid,
            'qty'   => $qty
        );

        $this->cart->update($data);
        redirect('cart');
    }


    public function checkout(){
        $data['id']=$this->session->userdata('S_Id');
        $data['Info']=$this->Student_model->stuinfo($this->session->userdata('S_Id'));
        $data['stuacc'] = $this->Student_model->inv_due($this->session->userdata('S_Id'));
        $data['cart']=$this->cart->contents();
        $this->load->view('SDashboard/print_inv',$data);
    }
}
?>
