<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quotetion_model extends CI_Model {

    public function get_all_Qute() {
        $this->db->order_by('id', 'ASC');
        $query = $this->db->get('quotations');
        return $query->result_array();
    }

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

    // Retrieve all content
    public function get_all_content() {
        return $this->db->get('editor_content')->result_array();
    }

     public function get_group_record() {
           $this->db->select('product_id, lot_number, COUNT(qty) as total_qty, product_location as status');
        $this->db->group_by(['product_id', 'lot_number', 'product_location']);
        $this->db->order_by('lot_number', 'ASC');
        $query = $this->db->get('store');
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

    public function invoicedata(){
        $this->db->select('store.id as sid, products.id as pid, store.unitPrice, store.lot_number, products.productName, count(products.productName) as total_stock, store.created_at');
        $this->db->from('store');
        $this->db->join('products', 'store.product_id = products.id', 'left');
        $this->db->where('store.product_location', 'inhouse');
        $this->db->group_by('products.productName, store.unitPrice, store.lot_number, store.created_at');
        $this->db->order_by('products.productName', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
    }


    public function insert_quotation($data) {
        $this->db->insert('quotations', $data);
        return $this->db->insert_id();
    }

    public function update_quotation($quotation_id,$data) {
        $this->db->where('id', $quotation_id);
        return $this->db->update('quotations', $data);
    }

    public function insert_quotation_items($items) {
        $this->db->insert_batch('quotation_items', $items);
    }

    public function update_quotation_items($quotation_id,$data) {
        $this->db->where('quotation_id', $quotation_id);
        return $this->db->update('quotation_items', $data);
    }

    public function get_quotation_by_id($quotation_id) {
        $this->db->where('id', $quotation_id);
        $query = $this->db->get('quotations');
        return $query->row_array();
    }

    public function get_quotation_items_by_id($quotation_id) {
        $this->db->where('quotation_id', $quotation_id);
        $query = $this->db->get('quotation_items');
        return $query->result_array();
    }

    public function get_quotation_details($quotation_id) {
        $this->db->select('
            quotations.id AS quotation_id,
            quotations.quotation_number,
            quotations.qdate,
            quotations.vdate,
            quotations.Contact_Person,
            quotations.Company_Name,
            quotations.address,
            quotations.Contact,
            quotations.grand_total,
            quotations.discount,
            quotations.net_total,
            quotations.tc,
            quotation_items.product_id,
            quotation_items.unit_price,
            quotation_items.order_quantity,
            quotation_items.sub_total,
            products.productName,
            products.brand,
            products.category,
            products.description,
            measurement.unit_name
        ');
        $this->db->from('quotations');
        $this->db->join('quotation_items', 'quotations.id = quotation_items.quotation_id');
        $this->db->join('products', 'quotation_items.product_id = products.id');
        $this->db->join('measurement', 'quotation_items.measurement_id = measurement.id');
        $this->db->where('quotations.id', $quotation_id);

        $query = $this->db->get();
        return $query->result_array();
    }

    public function delete_quotation_items($quotation_id) {
        // Ensure $quotation_id is an integer to prevent SQL injection
        $quotation_id = intval($quotation_id);
        $this->db->where('quotation_id', $quotation_id);
        return $this->db->delete('quotation_items');
    }
   
}
