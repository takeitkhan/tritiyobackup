<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * @property settings_model $settings_model sdss
 * @property Uploader $uploader Uploader Class Library
 * @property Common_model $common_model Uploader Class Library
 * @property Panel_model $panel_model Uploader Class Library
 */
class Showrooms extends MY_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->ion_auth->logged_in()) {
            redirect('outlet', 'refresh');
        }
    }

    public function index() {
        if ($this->ion_auth->logged_in()) {
            $this->data['userInformation'] = $this->ion_auth->user()->row();
        }
        $this->data['loggedinuserinformation'] = $this->basic_information_of_mine($this->data['userInformation']->id);
        $this->data['userid'] = $this->data['userInformation']->id;

        $uri2 = $this->uri->segment(2);
        $this->data['title'] = "Showrooms Management";
        $this->data['districts'] = $this->common_model->get_districts();
        //$this->data['upazilas'] = $this->get_upazila(17);
        $this->data['upazilas'] = $this->common_model->get_upazillas(17);
        if(isset($uri2)) {
            $this->data['pageinformation'] = $this->showrooms_model->getShowrooms($uri2);
        } else {
            $this->data['pageinformation'] = $this->showrooms_model->getShowrooms();
        }
        $this->data['get_showrooms'] = $this->showrooms_model->getShowrooms();

        $this->load->view('layouts/header', $this->data);
        $this->load->view('pages/showrooms', $this->data);
        $this->load->view('layouts/footer', $this->data);
    }

    public function add_modify_showroom() {        
        $data = array(            
            'ShowroomName' => $this->input->post('showroomname'),
            'ShowroomAddress' => $this->input->post('showroomaddress'),
            'Phone' => $this->input->post('showroomphone'),
            'Latitude' => $this->input->post('latitude'),
            'Longitude' => $this->input->post('longitude'),            
            'Shoptype' => $this->input->post('showroomtype'),
            'Upazilla' => $this->input->post('upazila'),
            'Note' => $this->input->post('note')
        );
        
        if ($this->input->post('infosid') == 'none') {
            $this->results = $this->showrooms_model->insertShowroom($data);
        } else {
            $where = array('InfosId' => $this->input->post('infosid'));
            $this->results = $this->showrooms_model->updateShowroom($data, $where);
        }

      
    }
    
    
    public function delete()
    {
        
       $this->results = $this->db->delete('showrooms',"ShowroomId='".$this->input->get('id')."'");
        
        if ($this->results) {
            $this->status['status'] = 1;
            $this->status['msg'] = 'Well done!';
        } else {
            $this->status['status'] = 0;
            $this->status['msg'] = 'Oh snap! Change a few things up and try submitting again.';
        }
        echo jsonEncode($this->status);
    }
    

}
