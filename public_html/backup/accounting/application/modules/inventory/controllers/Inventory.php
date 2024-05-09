<?php
$header = header('Access-Control-Allow-Origin: *');
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Inventory extends MX_Controller {
    public function __construct() {
        parent::__construct();
        if (!$this->ion_auth->logged_in()) {
            redirect('outlet', 'refresh');
        }
        $this->load->helper('inventory');
        $this->load->model('inventory_model');
    }

    public function index() {
        $data['title'] = 'All Inventory';
        accView('index', $data);
    }

    public function add() {
        $data['title'] = 'Add Inventory';
        accView('add', $data);
    }

    public function edit() {
        $data['title'] = 'Edit Inventory';
        accView('edit', $data);
    }

    public function ajax() {

    }

    public function delete() {

    }

}

?>