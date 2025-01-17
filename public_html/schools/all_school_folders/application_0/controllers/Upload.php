<?php
if (! defined('BASEPATH')) exit('No direct script access allowed');
class Upload extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
    }

    function do_upload()
    {
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '100';
        $config['overwrite'] = TRUE;
        $config['max_width'] = '1024';
        $config['max_height'] = '768';

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload()) {
            $error = array('error' => $this->upload->display_errors());
            //$this->load->view('upload_form', $error);
        } else {
            $data = array('upload_data' => $this->upload->data());
            //$this->load->view('upload_success', $data);
        }
    }
}