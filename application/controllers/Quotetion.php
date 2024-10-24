<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quotetion extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Dhaka');
        $this->load->model('Product_model');
        $this->load->model('Store_model');
        $this->load->model('Quotetion_model');
        $this->load->library('FileUploader');
        $this->load->library('Lot_generator');
        $this->load->library('form_validation');
    }

    public function index() {
        $data['records'] = $this->Quotetion_model->invoicedata();
        $data['measurement'] = $this->Store_model->get_all_measurement();
        $data['tc'] = $this->Quotetion_model->get_all_content();
        $this->load->view('quotation/create', $data);
    }

    public function list() {
        $data['QutesInfo']=$this->Quotetion_model->get_all_Qute();
        $this->load->view('quotation/list', $data);
    }

    public function edit($quotation_id) {
        $data['tc'] = $this->Quotetion_model->get_all_content();
        $data['records'] = $this->Quotetion_model->invoicedata();
        $data['measurement'] = $this->Store_model->get_all_measurement();
        $data['QuteInfo']=$this->Quotetion_model->get_quotation_by_id($quotation_id);
        $data['QuteItemInfo']=$this->Quotetion_model->get_quotation_items_by_id($quotation_id);
        $data['quotation_id']=$quotation_id;
        $this->load->view('quotation/edit', $data);
    }

    public function save() {

        // Get form data
        $data = $this->input->post();
        
        // Prepare data for `quotations` table
        $quotation_data = array(
            'quotation_number' => $data['quotation_number'],
            'qdate' => $data['qdate'],
            'vdate' => $data['vdate'],
            'contact_person' => $data['Contact_Person'],
            'company_name' => $data['Company_Name'],
            'address' => $data['address'],
            'contact' => $data['Contact'],
            'grand_total' => $data['grand_total'],
            'discount' => $data['discount'],
            'net_total' => $data['net_total'],
            'tc' => $data['tc']
        );
        
        // Insert quotation and get the ID
        $quotation_id = $this->Quotetion_model->insert_quotation($quotation_data);
        
        // Prepare data for `quotation_items` table
        $items_data = array();
        foreach ($data['product_id'] as $key => $product_id) {
            $items_data[] = array(
                'quotation_id' => $quotation_id,
                'product_id' => $product_id,
                'measurement_id' => $data['measurement_id'][$key],
                'unit_price' => $data['unit_price'][$key],
                'order_quantity' => $data['order_quantity'][$key],
                'sub_total' => $data['sub_total'][$key]
            );
        }
        // Insert quotation items
        $this->Quotetion_model->insert_quotation_items($items_data);
        redirect('print_quotation/' . $quotation_id);

    }

    public function update() {
        $quotation_id = $this->input->post('quotation_id');

        // Get form data
        $data = $this->input->post();

        // Prepare data for `quotations` table
        $quotation_data = array(
            'quotation_number' => $data['quotation_number'],
            'qdate' => $data['qdate'],
            'vdate' => $data['vdate'],
            'contact_person' => $data['Contact_Person'],
            'company_name' => $data['Company_Name'],
            'address' => $data['address'],
            'contact' => $data['Contact'],
            'grand_total' => $data['grand_total'],
            'discount' => $data['discount'],
            'net_total' => $data['net_total'],
            'tc' => $data['tc']
        );
        
        // Update quotation
        $this->Quotetion_model->update_quotation($quotation_id, $quotation_data);

        // Prepare data for `quotation_items` table
        $items_data = array();
        foreach ($data['product_id'] as $key => $product_id) {
            $items_data[] = array(
                'quotation_id' => $quotation_id,
                'product_id' => $product_id,
                'measurement_id' => $data['measurement_id'][$key],
                'unit_price' => $data['unit_price'][$key],
                'order_quantity' => $data['order_quantity'][$key],
                'sub_total' => $data['sub_total'][$key]
            );
        }

        // Delete existing items
        $this->Quotetion_model->delete_quotation_items($quotation_id);

        // Insert new items
        $this->Quotetion_model->insert_quotation_items($items_data);

        // Redirect to print quotation
        redirect('print_quotation/' . $quotation_id);
    }

    public function print_quotation($quotation_id) {

         // Fetch quotation data by ID
        $data['quotation'] = $this->Quotetion_model->get_quotation_details($quotation_id);

        if ($data['quotation']) {
           // Load the print view and pass the data
            $this->load->view('quotation/print_quotation', $data);
        }else{
            redirect('Quotetion');
        }
        
    }




}
