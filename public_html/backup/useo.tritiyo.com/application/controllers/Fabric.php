<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Fabric extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(array("product_model", "fabric_model", "common_model", "profile_model", "admin_model", 'media_model'));
        //$this->load->helper('term_helper');

        if (!$this->ion_auth->logged_in()) {
            redirect('outlet', 'refresh');
        }
        if ($this->ion_auth->logged_in()) {
            $this->data['userInformation'] = $this->ion_auth->user()->row();
            $this->data['userid'] = $this->data['userInformation']->id;
        }
    }

    public function add_fabric() {
        $this->data['title'] = 'Add New Fabric';
        $this->data['medias'] = $this->media_model->get_media();
        //owndebugger($this->data['medias']);die();
        //$this->data['categories'] = $this->term_model->get_categories();
        $this->load->view('layouts/header', $this->data);
        $this->load->view('fabric/add_fabric', $this->data);
        $this->load->view('layouts/footer', $this->data);
    }

    public function save_fabric() {

        $this->data['fabrics'] = array(            
            'fabric_title' => $this->input->post('fabricname'),
            'fabric_details' => $this->input->post('fabricdetails'),
            'fabric_icon' => $this->input->post('fabricicon'),
            'fabric_image' => $this->input->post('fabricimage'),
        );

        $fabricid = $this->input->post('fabricid');
        if($fabricid === 'none') {
           $insert_id = $this->fabric_model->insert( $this->data['fabrics']);
        } else {
            $insert_id = $this->fabric_model->update($this->data['fabrics'], $fabricid);
        }
       
       if($insert_id)
         $this->session->set_flashdata('msg','<div class="alert alert-success"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Success!</strong> Your fabrics <b>'.$this->input->post('fabricname').'</b> saved.</div>');
       
    }

    public function fabric_list() {
        $this->data['title'] = 'Fabric list';
        
        $this->data['fabrics'] = $this->fabric_model->get_fabrics();
        //owndebugger($this->data['fabrics'] ); die();

        $this->load->view('layouts/header', $this->data);
        $this->load->view('fabric/fabric_list', $this->data);
        $this->load->view('layouts/footer', $this->data);
    }

    public function edit_fabric($id)
    {
        $this->data['title'] = 'Edit Fabric';
        $this->data['medias'] = $this->media_model->get_media();
        $this->data['fabric'] = $this->fabric_model->get_fabric($id);
        //owndebugger($this->data['fabric'] ); die();
        $this->load->view('layouts/header', $this->data);
        $this->load->view('fabric/add_fabric', $this->data);
        $this->load->view('layouts/footer', $this->data);
    }
    


    public function delete_fabric($id)
    {
        $this->data['status']['status'] = $this->fabric_model->delete($id);
        $this->data['status']['msg'] = "Fabric has been deleted";

        header('Application-type:application/json');
        echo jsonEncode($this->data['status']);
    }

}
