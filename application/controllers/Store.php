<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Store extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Dhaka');
        $this->load->model('Product_model');
        $this->load->model('Store_model');
        $this->load->library('FileUploader');
        $this->load->library('Lot_generator');
        $this->load->library('form_validation');
    }



    public function index() {
        $data['products'] = $this->Product_model->get_all_products();
        $data['records'] = $this->Store_model->get_group_record();
        $this->load->view('store/list', $data);
    }


    public function storeInfo(){
        $data['records'] = $this->Store_model->combtable();
        $this->load->view('store/storeInfo',$data);
    }

    public function add() {
        $data['products'] = $this->Product_model->get_all_products();
        $data['measurement'] = $this->Store_model->get_all_measurement();
        $data['lotNum'] = $this->lot_generator->generate_token(8);
        $this->load->view('store/add',$data);
    }

    public function save_product() {
        // Set validation rules
        $this->form_validation->set_rules('product_id', 'Product ID', 'required');
        $this->form_validation->set_rules('qty', 'Product Quantity', 'required');
        

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('store/add');
        } else {
            // Handle file uploads
            $shipment_pdf = $this->fileuploader->uploadPDF('shipment_pdf');            
            $product_data = array(
                'product_id' => $this->input->post('product_id'),
                'partNumber' => $this->input->post('partNumber'),
                'serialNumber' => $this->input->post('serialNumber'),
                'qty' => 1,
                'unit' => $this->input->post('unit'),
                'unitPrice' => $this->input->post('unitPrice'),
                'vat_tax' => $this->input->post('vat_tax'),
                'expiry_date' => $this->input->post('expiry_date'),
                'min_stock' => $this->input->post('min_stock'),
                'lot_number' => $this->input->post('lot_number'),
                'shipment_pdf' => $shipment_pdf,
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d'),
            );

            /*echo "<pre>"; print_r($product_data);exit;*/

            for ($i = 0; $i < $this->input->post('qty'); $i++) {
             $this->Store_model->insert_to_store($product_data);
            }

            redirect('store');
        }
    }

    public function update_record() {
        // Set validation rules
        $this->form_validation->set_rules('product_id', 'Product ID', 'required');
        $this->form_validation->set_rules('qty', 'Product Quantity', 'required');
        

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('store/add');
        } else {
            // Handle file uploads
            $shipment_pdf = $this->fileuploader->uploadPDF('shipment_pdf');  
            $id= $this->input->post('id');         
            $product_data = array(
                'product_id' => $this->input->post('product_id'),
                'partNumber' => $this->input->post('partNumber'),
                'serialNumber' => $this->input->post('serialNumber'),
                'qty' => 1,
                'unit' => $this->input->post('unit'),
                'unitPrice' => $this->input->post('unitPrice'),
                'vat_tax' => $this->input->post('vat_tax'),
                'expiry_date' => $this->input->post('expiry_date'),
                'min_stock' => $this->input->post('min_stock'),
                'lot_number' => $this->input->post('lot_number'),
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d'),
            );

            if (!empty($_FILES['shipment_pdf']['name'])) {
                $product_data['shipment_pdf'] = $this->fileuploader->uploadPDF('shipment_pdf');
            }   

            $this->Store_model->update_record($id, $product_data);
            redirect('store/storeInfo');
           
        }
    }
    private function upload_file($field_name) {
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'jpg|jpeg|png|pdf';
        $config['max_size'] = 2048; // 2MB

        $this->load->library('upload', $config);

        if ($this->upload->do_upload($field_name)) {
            return $this->upload->data('file_name');
        } else {
            return NULL;
        }
    }

    public function edit($id) {
        $data['products'] = $this->Product_model->get_all_products();
        $data['measurement'] = $this->Store_model->get_all_measurement();
        $data['records'] = $this->Store_model->get_record_by_id($id);
        $data['id']=$id;
        $this->load->view('store/edit', $data);
    }

    public function update_product($id) {
        // Set validation rules
        $this->form_validation->set_rules('product_id', 'Product ID', 'required');
        $this->form_validation->set_rules('product_name', 'Product Name', 'required');
        // Add more validation rules as needed

        if ($this->form_validation->run() === FALSE) {
            $data['product'] = $this->Store_model->get_product_by_id($id);
            $this->load->view('store/edit', $data);
        } else {
            // Handle file uploads
            $image = $this->upload_file('image');
            $shipment_pdf = $this->upload_file('shipment_pdf');

            $product_data = array(
                'product_id' => $this->input->post('product_id'),
                'product_name' => $this->input->post('product_name'),
                'brand' => $this->input->post('brand'),
                'category' => $this->input->post('category'),
                'description' => $this->input->post('description'),
                'part_number' => $this->input->post('part_number'),
                'serial_number' => $this->input->post('serial_number'),
                'qty' => $this->input->post('qty'),
                'unit' => $this->input->post('unit'),
                'unit_price' => $this->input->post('unit_price'),
                'vat_tax' => $this->input->post('vat_tax'),
                'expiry_date' => $this->input->post('expiry_date'),
                'min_stock' => $this->input->post('min_stock'),
                'lot_number' => $this->input->post('lot_number'),
                'shipment_pdf' => $shipment_pdf ? $shipment_pdf : $this->input->post('existing_shipment_pdf')
            );

            $this->Store_model->update_product($id, $product_data);
            redirect('store');
        }
    }

    public function delete($id) {
        $this->Store_model->delete_product($id);
        redirect('store');
    }


    public function expired_list() {
       $data['X_list'] = $this->Store_model->get_expiry_list(); 
        $this->load->view('store/expairList', $data);
    }



    public function short_list() {
        $data['s_list'] = $this->Store_model->get_short_list(); 
        $this->load->view('store/shortList', $data);
    }

}
