<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Product_model');
        $this->load->model('Brand_model');
        $this->load->model('Category_model');
        $this->load->library('FileUploader');
        $this->load->helper('url');
    }

    public function index() {
        $data['products'] = $this->Product_model->get_all_products();
        $this->load->view('products/list', $data);
    }

    public function view($id) {
        $data['product'] = $this->Product_model->get_product_by_id($id);
        if (empty($data['product'])) {
            show_404();
        }
        $this->load->view('products/view', $data);
    }

    public function settings() {
        $data['categories'] = $this->Category_model->get_all_categories();
        $data['brands'] = $this->Brand_model->get_all_brands();
        $this->load->view('products/settings', $data);
    }

    public function add_product() {
        $data['brands'] = $this->Brand_model->get_all_brands();
        $data['categories'] = $this->Category_model->get_all_categories();
        $this->load->view('products/create', $data);
    }



    public function delete($id) {

        $PInfo=$this->Product_model->get_product_by_id($id);    
        $file_path = FCPATH . 'uploads/images/' . $PInfo['productImage'];
        
        // Check if the file exists
        if (file_exists($file_path)) {
            unlink($file_path);
        }

        // Delete record from database
        $this->Product_model->delete_product($id);
        redirect('Products');
    }

    public function productData() {
        $productData = [
            'productName' => $this->input->post('productName'),
            'brand' => $this->input->post('brand'),
            'category' => $this->input->post('category'),
            'description' => $this->input->post('description'),
            'productImage' => $this->fileuploader->uploadImage('productImage'),
        ];

        $this->Product_model->insert_product($productData);
        redirect('Products');
    }

    public function brandData() {
        $brandData = ['brandName' => $this->input->post('brandName')];
        $this->Brand_model->insertBrand($brandData);
        redirect('Products/settings');
    }

    public function categoryData() {
        $categoryData = ['category' => $this->input->post('category')];
        $this->Category_model->insertCategory($categoryData);
        redirect('Products/settings');
    }

    public function edit($id) {
        $data['id']=$id;
        $data['product'] = $this->Product_model->get_product_by_id($id);
        $data['brands'] = $this->Brand_model->get_all_brands();
        $data['categories'] = $this->Category_model->get_all_categories();
        $this->load->view('products/edit', $data);
    }

    public function updateProduct() {
        $id = $this->input->post('id');
        $productData = [
            'productName' => $this->input->post('productName'),
            'brand' => $this->input->post('brand'),
            'category' => $this->input->post('category'),
            'description' => $this->input->post('description'),
        ];

        if (!empty($_FILES['productImage']['name'])) {
            $productData['productImage'] = $this->fileuploader->uploadImage('productImage');
        }

        $this->Product_model->updateProduct($id, $productData);
        redirect('Products');
    }
}
