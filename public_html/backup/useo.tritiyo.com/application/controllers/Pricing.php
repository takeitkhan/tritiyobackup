<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Pricing extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('pricing_model');
        if (!$this->ion_auth->logged_in()) {
            redirect('outlet', 'refresh');
        }
        if ($this->ion_auth->logged_in()) {
            $this->data['userInformation'] = $this->ion_auth->user()->row();
            $this->data['userid'] = $this->data['userInformation']->id;
        }
    }
    

    public function add_pricing() {
        $this->data['title'] = 'Add new pricing';
        $this->data['portfolios'] = $this->pricing_model->get_pricings();
        $this->load->view('layouts/header', $this->data);
        $this->load->view('pricing/add_pricing', $this->data);
        $this->load->view('layouts/footer', $this->data);
    }

    public function edit_pricing($id)
    {
        $this->data['title'] = 'Edit pricing';
        $this->data['pricings'] = $this->pricing_model->get_pricings();
        $this->data['thisPricingInfo'] = $this->pricing_model->thisPricingInfo($id);
        $this->load->view('layouts/header', $this->data);
        $this->load->view('pricing/add_pricing', $this->data);
        $this->load->view('layouts/footer', $this->data);
    }
    
    public function save_pricing() {
        $ifnone = $this->input->post('pricing_id');
        $this->data['pricing'] = array(
            'name' => $this->input->post('name'),
            'description' => $this->input->post('description'),
            'price' => $this->input->post('price'),
        );




        if($ifnone === 'none') {
           $insert_id = $this->pricing_model->insert( $this->data['pricing']);
            $this->session->set_flashdata('pricing_message', 'Pricing Added.');
        } else {
            $insert_id = $this->pricing_model->update($this->data['pricing'], $ifnone);
            $this->session->set_flashdata('pricing_message', 'Pricing Updated.');
           redirect('pricings');
        }
        redirect("addnewpricing");
    }


    public function delete_pricing($id){
        $this->pricing_model->delete($id);
        $this->data['status']['msg'] = "Pricing Deleted.";

        header('Application-type:application/json');
        echo jsonEncode($this->data['status']);
    }

    public function pricing_list() {
        $this->data['title'] = 'Pricing list';
        $this->data['portfolios'] = $this->pricing_model->get_pricings();
        $this->load->view('layouts/header', $this->data);
        $this->load->view('pricing/pricing_list', $this->data);
        $this->load->view('layouts/footer', $this->data);
    }
}
