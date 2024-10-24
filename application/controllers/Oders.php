<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Oders extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Order_model');
    }

    public function index() {
        $data['products'] = $this->Order_model->get_all_orders();
        $this->load->view('orders/list', $data);
    }

    // View a single product
    public function view($id) {
        $data['product'] = $this->Order_model->get_two_table_info_byId($id);
        if (empty($data['product'])) {
            show_404();
        }
        $this->load->view('orders/view', $data);
    }

    // Edit a product
    public function edit($id) {

        $orders = $this->Order_model->get_order_by_id($id);
        $data['product'] = $this->Order_model->get_product_by_id($orders['product_id']);
        $data['orders']=$orders;

        if (empty($data['product'])) {
            show_404();
        }

        if ($this->input->post()) {
            $orderData = array(
                'invoice_date_time' => $this->input->post('invoice_date_time'),
                'product_id' => $this->input->post('product_id'),
                'product_name' => $this->input->post('product_name'),
                'unit_price' => $this->input->post('unit_price'),
                'order_quantity' => $this->input->post('order_quantity'),
                'sub_total' => $this->input->post('sub_total'),
                'discount' => $this->input->post('discount')
            );
            $this->Order_model->update_order($id, $orderData);
            redirect('Oders');
        }

        $this->load->view('orders/edit', $data);
    }


    public function create() {
        $data['products'] = $this->Order_model->get_products();
        $this->load->view('orders/create', $data);
    }

    public function store() {
        $this->form_validation->set_rules('product_id[]', 'Product', 'required');
        $this->form_validation->set_rules('order_quantity[]', 'Quantity', 'required|numeric');

        if ($this->form_validation->run() == TRUE) {
            $orderData = array(
                'invoice_date_time' => $this->input->post('invoice_date_time'),
                'customer_name' => $this->input->post('customer_name'),
                'grand_total' => $this->input->post('grand_total'),
                'discount' => $this->input->post('discount'),
                'net_total' => $this->input->post('net_total'),
            );

            $this->Order_model->save_order($orderData);
            $this->session->set_flashdata('success', 'Order created successfully!');
            redirect('Oders');
        } else {
            $this->create();
        }
    }



    public function update($id) {
        $this->form_validation->set_rules('product_id[]', 'Product', 'required');
        $this->form_validation->set_rules('order_quantity[]', 'Quantity', 'required|numeric');

        if ($this->form_validation->run() == TRUE) {
            $orderData = array(
                'invoice_date_time' => $this->input->post('invoice_date_time'),
                'customer_name' => $this->input->post('customer_name'),
                'grand_total' => $this->input->post('grand_total'),
                'discount' => $this->input->post('discount'),
                'net_total' => $this->input->post('net_total'),
            );

            $this->Order_model->update_order($id, $orderData);
            $this->session->set_flashdata('success', 'Order updated successfully!');
            redirect('Oders');
        } else {
            $this->edit($id);
        }
    }

    public function delete($id) {
        $this->Order_model->delete_order($id);
        $this->session->set_flashdata('success', 'Order deleted successfully!');
        redirect('Oders');
    }
}
?>
