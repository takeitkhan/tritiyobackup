<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @property Profile_model $profile_model Profile Model
 * @property Common_model $common_model Common Model
 * @property Settings_model $settings_model Settings Model
 * @property Ion_auth $ion_auth ion_auth
 * @property Admin_model $admin_model admin_model
 */
class Dashboard extends MY_Controller
{

    protected $data;

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        if ($this->ion_auth->logged_in()) {
            $this->data['userInformation'] = $this->ion_auth->user()->row();
            //owndebugger($this->data['userInformation']);
        }
        $this->data['loggedinuserinformation'] = $this->basic_information_of_mine($this->data['userInformation']->id);
        $this->data['title'] = "Smart Campus Dashboard";
        $this->data['userid'] = $this->data['userInformation']->id;


        $this->load->view('layouts/header', $this->data);
        $this->load->view('profile/dashboard', $this->data);
        $this->load->view('layouts/footer', $this->data);
    }

    public function basic_information_of_mine($id)
    {
        return $this->profile_model->getUsersInformation($id);
    }

    public function personal_information_of_mine($id)
    {
        return $this->profile_model->getPersonalInformation($id);
    }
}
