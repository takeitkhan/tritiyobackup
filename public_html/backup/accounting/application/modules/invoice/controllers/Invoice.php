<?php
$header = header('Access-Control-Allow-Origin: *');
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Invoice extends MX_Controller {
    public function __construct() {
        parent::__construct();
        if (!$this->ion_auth->logged_in()) {
            redirect('outlet', 'refresh');
        }
        $this->load->helper('invoice');
        $this->load->model('invoice_model');
    }

    public function index() {
        $data['title'] = 'All Invoices';
        accView('index', $data);
    }

    public function add() {
        $data['title'] = 'Add Invoice';
        accView('add', $data);
    }

    public function edit() {
        $data['title'] = 'Edit Invoice';
        accView('edit', $data);
    }

    public function ajax() {

    }

    public function delete() {

    }

}

?>