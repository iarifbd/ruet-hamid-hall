<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('AreaChart');
	}

	public function index() {
	    $data['area_chart_data'] = $this->AreaChart();
	    $data['bar_chart_data'] = $this->BarChat();
	    $this->load->view('template/template', $data);
	}

    public function AreaChart()
    {
        // Fetch data from the AreaChart model
        $sales_data  = $this->AreaChart->getMonthlyNetAmounts();


        // Prepare data for Chart.js
        $labels = [];
        $data = [];

        foreach ($sales_data as $row) {
            $labels[] = $row['month_name'];
            $data[] = $row['total_amount'];
        }

        // Pass data to view
        $data = json_encode([
            'labels' => $labels,
            'datasets' => [[
                'label' => "Sales Amount",
                'backgroundColor' => "rgba(75,192,192,0.4)",
                'borderColor' => "rgba(75,192,192,1)",
                'data' => $data,
                'fill' => true,
            ]]
        ]);

        return $data;
    }

	public function BarChat(){
	    // SQL Query Builder to fetch month name and total amount
	    $this->db->select("DATE_FORMAT(date_time, '%b') AS month_name, SUM(net_amount) AS total_amount");
	    $this->db->from('orders');
	    $this->db->group_by("DATE_FORMAT(date_time, '%b')");
	    $this->db->order_by('MIN(date_time)');

	    $query = $this->db->get();
	    $result = $query->result_array();

	    // Prepare data for Chart.js
	    $labels = [];
	    $data = [];

	    foreach ($result as $row) {
	        $labels[] = $row['month_name']; // e.g., "Jan", "Feb"
	        $data[] = $row['total_amount']; // e.g., 12345
	    }

	    // Return data as an associative array
	    return [
	        'labels' => $labels,
	        'data' => $data,
	    ];
	}



	
}
