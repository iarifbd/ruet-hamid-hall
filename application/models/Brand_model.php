<?php
class Brand_model extends CI_Model {
    public function get_all_brands() {
        $query = $this->db->get('brands');
        return $query->result_array();
    }

    public function insertBrand($data) {
        $this->db->insert('brands', $data);
    }
}
