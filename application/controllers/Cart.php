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


    public function checkout() {
        $studentId = $this->session->userdata('S_Id');

        // If student ID is not set, redirect or show an error
        if (empty($studentId)) {
            redirect('LoginCL/studentlogin'); 
            return;
        }

        // Retrieve student information and invoice details
        $data['id'] = $studentId;
        $data['Info'] = $this->Student_model->stuinfo($studentId);
        $data['stuacc'] = $this->Student_model->inv_due($studentId);
        
        // Get cart contents
        $data['cart'] = $this->cart->contents();

        // Prepare data for insertion into the database
        $sdata = [];
        foreach ($data['cart'] as $item) {
            // Populate $sdata array with cart item details
            $sdata[] = [
                'S_Id' => $item['id'],           
                'gdate' => $item['name'],        
                'amount' => $item['price'],      
                'pdate' => date('Y-m-d'),        
                'status' => 'Under Process'      
            ];
        }

        // Insert the data into the database
        if (!empty($sdata)) {
            $this->Student_model->CartData($sdata);
        } else {
            redirect('cart'); 
        }

        // Clear the cart after checkout
        $this->cart->destroy();

        // Load view to print invoice
        $this->load->view('SDashboard/print_inv', $data); 
    }


}
?>
