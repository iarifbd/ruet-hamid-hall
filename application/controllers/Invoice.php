<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invoice extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Dhaka');
        $this->load->model('Product_model');
        $this->load->model('Store_model');
        $this->load->model('Quotetion_model');
        $this->load->model('Invoice_model');
        $this->load->library('FileUploader');
        $this->load->library('Lot_generator');
        $this->load->library('form_validation');
        $this->load->library('NumberToWords');
    }

    public function index() {
        $data['records'] = $this->Quotetion_model->invoicedata();
        $data['measurement'] = $this->Store_model->get_all_measurement();
        $data['tc'] = $this->Quotetion_model->get_all_content();
        $this->load->view('invoice/create', $data);
    }

    public function makeinvo($quotation_id) {

         // Fetch quotation data by ID and geneter invoice
        $InvInfo = $this->Quotetion_model->get_quotation_details($quotation_id);

        if ($InvInfo) {
           //data found
            $orderinfo=array(
                'bill_no'=>$InvInfo[0]['quotation_number'] ,
                'customer_name'=>$InvInfo[0]['Contact_Person'] ,
                'company_name'=>$InvInfo[0]['Company_Name'] ,
                'customer_address'=>$InvInfo[0]['address'] ,
                'customer_phone'=>$InvInfo[0]['Contact'] ,
                'date_time'=>$InvInfo[0]['qdate'] ,
                'gross_amount'=>$InvInfo[0]['grand_total'] ,
                'service_charge_rate'=>'0.00',
                'service_charge'=>'0.00' ,
                'vat_charge_rate'=>'0.00' ,
                'vat_charge'=>'0.00' ,
                'net_amount'=>$InvInfo[0]['net_total'] ,
                'discount'=>$InvInfo[0]['discount'] ,
                'quotation_id'=>$quotation_id ,
                'user_id'=>1 ,
                'tc'=>$InvInfo[0]['tc'],

            );
             // Insert orders and get the ID
            $order_id = $this->Invoice_model->insert_order($orderinfo);
            
            // Prepare data for `quotation_items` table
            $items_data = array();
            foreach ($InvInfo as $key => $value) {
                $items_data[] = array(
                    'order_id' =>$order_id ,
                    'product_id' =>$value['product_id'] ,
                    'qty' =>$value['order_quantity'] ,
                    'rate' =>$value['unit_price'] ,
                    'unit_name' =>$value['unit_name'] ,
                    'amount' =>$value['sub_total'] ,
                );

                // collect the productID
                $product_id=$value['product_id'];
                $count=count($InvInfo);
                $productID=$this->Invoice_model->get_productID($product_id,$count);
                
                //update store location ststus as sold
                foreach ($productID as $key => $storeid) {
                    $this->Invoice_model->update_store($storeid['id'],$InvInfo[0]['quotation_number']);
                }

            }

            $this->Invoice_model->insert_order_items($items_data);
            
            redirect('Invoice/print_invoice/' . $order_id);

        }else{
           //data not found
            echo "no data found";
        }
        
    }

    public function save(){
        // Get form data
        $data = $this->input->post();

        // get order data
        $invoiceData=array(
            'bill_no'=>$data['inv_number'],
            'customer_name'=>$data['Contact_Person'],
            'company_name'=>$data['Company_Name'],
            'customer_address'=>$data['address'],
            'customer_phone'=>$data['Contact'],
            'date_time'=>$data['invdate'],
            'gross_amount'=>$data['grand_total'],
            'service_charge_rate'=>00.00,
            'service_charge'=>00.00,
            'vat_charge_rate'=>00.00,
            'vat_charge'=>00.00,
            'net_amount'=>$data['net_total'],
            'discount'=>$data['discount'],
            'quotation_id'=>0,
            'user_id'=>1,
            'tc'=>$data['tc'],

        );

        // Insert invoice and get the order ID
        $orderid = $this->Invoice_model->insert_order($invoiceData);

        // Prepare data for `orders_item` table
        $items_data = array();
        foreach ($data['product_id'] as $key => $product_id) {
            $items_data[] = array(
                'order_id' => $orderid,
                'product_id' => $product_id,
                'qty' => $data['order_quantity'][$key],
                'rate' => $data['unit_price'][$key],
                'unit_name' => $data['measurement_id'][$key],
                'amount' => $data['sub_total'][$key]
            );

            // collect the product_id
                $count=count($data['product_id']);
                $rows=$this->Invoice_model->get_productID($product_id,$count);
                
                //update store location ststus as sold
                foreach ($rows as $key => $row) {
                    $this->Invoice_model->update_store($row['id'],$orderid);
                }
        }

        // Insert quotation items
        $this->Invoice_model->insert_order_items($items_data);
        
        //print invoice
        redirect('Invoice/print_invoice/' . $orderid);
    }

    public function print_invoice($order_id) {

         // Fetch invoice data by ID
        $data['invoice'] = $this->Invoice_model->get_invoice_details($order_id);

        if ($data['invoice']) {
           // Load the print view and pass the data
            $this->load->view('invoice/print_invoice', $data);
        }else{
            redirect('Invoice');
        }
        
    }


}
