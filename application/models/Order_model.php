<?php
class Order_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    // Function to retrieve all orders
    public function get_all_orders() {
        $this->db->select('*');
        $this->db->from('orders');
        $query = $this->db->get();
        return $query->result_array();
    }

    // Function to retrieve products for dropdown selection
    public function get_products() {
        $this->db->select('id, product_name, price');
        $this->db->from('products');
        $query = $this->db->get();
        return $query->result_array();
    }

   // Fetch a single product by ID
    public function get_product_by_id($id) {
        $query = $this->db->get_where('products', array('id' => $id));
        return $query->row_array();
    }

        // Function to save an order to the database
        public function save_order($orderData) {
            // Insert order data into the sales table
            $this->db->insert('sales', $orderData);
            $order_id = $this->db->insert_id(); // Get the inserted order ID

            // Get all product IDs from the form submission
            $product_ids = $this->input->post('product_id');

            // Fetch product names for all product IDs in a single query
            $this->db->select('id, product_name');
            $this->db->from('products');
            $this->db->where_in('id', $product_ids);
            $query = $this->db->get();
            $product_names = $query->result_array(); // Get the product names as an associative array

            // Prepare an associative array for quick lookups
            $product_name_map = array();
            foreach ($product_names as $product) {
                $product_name_map[$product['id']] = $product['product_name'];
            }

            // Get the posted product information
            $product_ids = $this->input->post('product_id');
            $invoice_date_time = $this->input->post('invoice_date_time');
            $unit_prices = $this->input->post('unit_price');
            $order_quantities = $this->input->post('order_quantity');
            $sub_totals = $this->input->post('sub_total');
            $discounts = $this->input->post('discount');

            // Loop through each product to save order items
            for ($i = 0; $i < count($product_ids); $i++) {
                $product_id = $product_ids[$i];
                $itemData = array(
                    'product_id' => $product_id,
                    'product_name' => isset($product_name_map[$product_id]) ? $product_name_map[$product_id] : '', // Look up product name
                    'unit_price' => $unit_prices[$i],
                    'order_quantity' => $order_quantities[$i],
                    'sub_total' => $sub_totals[$i],
                    'discount' => isset($discounts[$i]) ? $discounts[$i] : 0, // Default discount to 0 if not set
                    'invoice_date_time' => $invoice_date_time,
                );

                // Insert each order item into the orders table
                $this->db->insert('orders', $itemData);
            }
        }

    public function get_two_table_info_byId($invoice_number){
        $this->db->select('orders.invoice_number, 
                   orders.invoice_date_time, 
                   orders.product_id, 
                   products.product_name, 
                   products.brand_name, 
                   products.categories, 
                   orders.unit_price, 
                   orders.order_quantity, 
                   orders.sub_total, 
                   orders.discount, 
                   (orders.sub_total - orders.discount) AS total_price');
        $this->db->from('orders');
        $this->db->join('products', 'orders.product_id = products.id');
        $this->db->where('orders.invoice_number', $invoice_number); // Add the WHERE clause
        $query = $this->db->get();

        return $result = $query->result_array(); // Fetch the result as an array
    }

    // Function to retrieve order by ID for editing
    public function get_order_by_id($id) {
        $this->db->select('*');
        $this->db->from('orders');
        $this->db->where('invoice_number', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    // Function to update an order
    public function update_order($id, $orderData) {
        $this->db->where('invoice_number', $id);
        $this->db->update('orders', $orderData);
    }

    // Function to delete an order
    public function delete_order($id) {
        $this->db->where('invoice_number', $id);
        $this->db->delete('orders');
    }


}
?>
