<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Editor extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Editor_model');
        $this->load->helper('text');
    }

    // Load the editor form
    public function index() {
        $data['contents'] = $this->Editor_model->get_all_content();
        $this->load->view('editor/editor_form', $data);
    }

    // Save the editor content to the database
    public function save_content() {
        $content = $this->input->post('content');

        $data = array(
            'content' => $content,
        );

        $this->Editor_model->insert_content($data);

        redirect('Editor');
    }

    // View all saved content
    public function view_all() {
        $data['contents'] = $this->Editor_model->get_all_content();
        $this->load->view('editor/editor_list', $data);
    }

    // View specific content by ID
    public function view($id) {
        $data['content'] = $this->Editor_model->get_content($id);
        $this->load->view('editor/editor_view', $data);
    }

    // Delete specific content by ID
    public function delete($id) {
        $this->Editor_model->delete($id);
        redirect('Editor');
    }

}
