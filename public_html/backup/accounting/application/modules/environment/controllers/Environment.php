<?php
$header = header('Access-Control-Allow-Origin: *');
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Environment extends MX_Controller {
    public function __construct() {
        parent::__construct();
        if (!$this->ion_auth->logged_in()) {
            redirect('outlet', 'refresh');
        }
        $this->load->helper('environment');
        $this->load->model('environment_model');
    }

    public function index() {
        $data['title'] = 'Environment';
        accView('index', $data);
    }

    public function add() {
        $data['title'] = 'Add Order';
        accView('add', $data);
    }

    public function edit() {
        $data['title'] = 'Edit Order';
        accView('edit', $data);
    }

    public function ajax() {

    }

    public function delete() {

    }

}

?>