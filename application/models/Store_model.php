<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Store_model extends CI_Model {

    public function get_all_products() {
        $this->db->order_by('id', 'ASC');
        $query = $this->db->get('products');
        return $query->result_array();
    }

    public function get_all_measurement() {
        $query = $this->db->get('measurement');
        return $query->result_array();
    }

    public function get_all_record() {
        $this->db->order_by('id', 'ASC');
        $query = $this->db->get('store');
        return $query->result_array();
    }

     public function get_group_record() {
            $this->db->select('product_id, products.productName, lot_number, COUNT(qty) as total_qty, product_location as status');
            $this->db->join('products', 'store.product_id = products.id', 'left');
            $this->db->group_by(['product_id', 'lot_number', 'product_location']);
            $this->db->order_by('lot_number', 'ASC');
            $query = $this->db->get('store');
        return $query->result_array();
    }

    public function get_short_list() {
        $this->db->select('store.product_id, products.productName, products.brand, products.category, products.description, products.productImage, store.min_stock, COUNT(store.qty) as total_qty');
        $this->db->join('products', 'store.product_id = products.id', 'left');
        $this->db->where('product_location', 'inhouse');
        $this->db->group_by('store.product_id, products.productName, products.brand, products.category, products.description, products.productImage, store.min_stock');
        $this->db->having('total_qty <= store.min_stock');  // Use HAVING to compare total_qty and min_stock
        $query = $this->db->get('store');
        
        return $query->result_array();
    }

    public function get_expiry_list() {
        $this->db->select('store.id, store.product_id, products.productName, products.brand, products.category, products.description, products.productImage, store.expiry_date');
        $this->db->join('products', 'store.product_id = products.id', 'left');
        
        // Simple WHERE condition to check expiry_date
        $this->db->where('store.expiry_date <=', date('Y-m-d'));
        
        $query = $this->db->get('store');

        // Debugging: Output the generated SQL query
        echo $this->db->last_query();  // This will help check the exact SQL query generated

        return $query->result_array();
    }





    public function combtable(){
        $this->db->select('store.id as sid, products.id as pid, store.*, products.*');
        $this->db->from('store');
        $this->db->join('products', 'store.product_id = products.id', 'left');
        $this->db->order_by('sid', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function insert_to_store($data) {
        return $this->db->insert('store', $data);
    }

    public function get_record_by_id($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('store');
        return $query->row_array();
    }

    public function update_record($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('store', $data);
    }

    public function delete_record($id) {
        $this->db->where('id', $id);
        return $this->db->delete('store');
    }
}
