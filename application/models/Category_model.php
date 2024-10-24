<?php
class Category_model extends CI_Model {
    public function get_all_categories() {
        $query = $this->db->get('categories');
        return $query->result_array();
    }

    public function insertCategory($data) {
        $this->db->insert('categories', $data);
    }
}
