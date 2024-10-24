<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Editor_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    // Insert content into the database
    public function insert_content($data) {
        return $this->db->insert('editor_content', $data);
    }

    // Retrieve all content
    public function get_all_content() {
        return $this->db->get('editor_content')->result();
    }

    // Retrieve content by ID
    public function get_content($id) {
        return $this->db->get_where('editor_content', ['id' => $id])->row();
    }

    // Delete content by ID
    public function delete($id) {
        $this->db->where('id', $id);
        return $this->db->delete('editor_content');
    }

}
