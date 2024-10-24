<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invoice_model extends CI_Model {

    public function insert_order($data) {
        $this->db->insert('orders', $data);
        return $this->db->insert_id();
    }
    
    public function insert_order_items($items) {
        $this->db->insert_batch('orders_item', $items);
    }

    public function get_productID($product_id,$count) {
        $this->db->select('store.id');
        $this->db->from('store');
        $this->db->join('products', 'store.product_id = products.id');
        $this->db->where('products.id', $product_id);
        $this->db->where('product_location', 'inhouse');
        $this->db->limit($count);  // Dynamic limit value
        $query = $this->db->get();

        return $result = $query->result_array();
    }

    public function update_store($storeid,$ChallanNumber){

        $data = array(
            'product_location' => 'sold',
            'ChallanNumber' => $ChallanNumber
        );

        $this->db->where('id', $storeid);
        $this->db->update('store', $data);

    }
    
    public function get_invoice_details($inv_id) {
        $this->db->select('
            orders.id ,
            orders.bill_no,
            orders.customer_name,
            orders.company_name,
            orders.customer_address,
            orders.customer_phone,
            orders.date_time,
            orders.gross_amount,
            orders.service_charge_rate,
            orders.service_charge,
            orders.vat_charge_rate,
            orders.vat_charge,
            orders.net_amount,
            orders.discount,
            orders.quotation_id,
            orders.user_id,
            orders.tc,
            orders_item.product_id,
            orders_item.qty,
            orders_item.rate,
            orders_item.unit_name,
            orders_item.amount,
            products.productName,
            products.brand,
            products.category,
            products.description,
            measurement.unit_name
        ');
        $this->db->from('orders');
        $this->db->join('orders_item', 'orders.id = orders_item.order_id');
        $this->db->join('products', 'orders_item.product_id = products.id');
        $this->db->join('measurement', 'orders_item.unit_name = measurement.unit_name');
        $this->db->where('orders.id', $inv_id);

        $query = $this->db->get();
        return $query->result_array();
    }    
}
