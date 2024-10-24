<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FileUploader {

    protected $CI;

    public function __construct() {
        // Assign the CodeIgniter super-object
        $this->CI =& get_instance();
        // Load the upload library
        $this->CI->load->library('upload');
    }

    public function upload($field_name, $upload_path = './uploads/', $allowed_types = 'jpg|jpeg|png|pdf', $max_size = 2048, $max_width = 0, $max_height = 0, $encrypt_name = TRUE) {
        // File upload configuration
        $config['upload_path'] = $upload_path;
        $config['allowed_types'] = $allowed_types;
        $config['max_size'] = $max_size;
        $config['max_width'] = $max_width;
        $config['max_height'] = $max_height;
        $config['encrypt_name'] = $encrypt_name;

        // Initialize the upload library with the config
        $this->CI->upload->initialize($config);

        // Perform the upload
        if ($this->CI->upload->do_upload($field_name)) {
            $file_data = $this->CI->upload->data();
            return $file_data;
        } else {
            return ['error' => $this->CI->upload->display_errors()];
        }
    }

    public function uploadImage($field_name) {
        //return $this->upload($field_name, './uploads/images/', 'jpg|jpeg|png');
        
        $FileInfo=$this->upload($field_name, './uploads/images/', 'jpg|jpeg|png');

        // Check if the 'file_name' key exists and get the value
        if (array_key_exists('file_name', $FileInfo)) {
            $file_name = $FileInfo['file_name'];
        } else{
            $file_name ='';
        }

        return $file_name;

    }

    public function uploadPDF($field_name) {
        //return $this->upload($field_name, './uploads/pdfs/', 'pdf');

        $FileInfo=$this->upload($field_name, './uploads/pdfs/', 'pdf');

        // Check if the 'file_name' key exists and get the value
        if (array_key_exists('file_name', $FileInfo)) {
            $file_name = $FileInfo['file_name'];
        } else{
            $file_name ='';
        }

        return $file_name;
    }
    
}
