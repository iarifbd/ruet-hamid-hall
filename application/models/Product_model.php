<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model {


    // Save Product
    public function insert_product($data) {
        $this->db->insert('products', $data);
    }

    // Fetch all products
    public function get_all_products() {
        $this->db->order_by('id', 'ASC');
        $query = $this->db->get('products');
        return $query->result_array();
    }

    // Fetch a single product by ID
    public function get_product_by_id($id) {
        $query = $this->db->get_where('products', array('id' => $id));
        return $query->row_array();
    }

    // Delete a product
    public function delete_product($id) {
        $this->db->where('id', $id);
        return $this->db->delete('products');
    }
    
    // Fetch all category
    public function get_all_category() {
        $query = $this->db->get('categories');
        return $query->result_array();
    }

    // Fetch all brand
    public function get_all_brand() {
        $query = $this->db->get('brands');
        return $query->result_array();
    }
    

    public function updateProduct($id, $productData) {
        $this->db->where('id', $id);
        $this->db->update('products', $productData);
    }

    public function getBrands() {
        return $this->db->get('brands')->result_array();
    }

    public function getCategories() {
        return $this->db->get('categories')->result_array();
    }


}
