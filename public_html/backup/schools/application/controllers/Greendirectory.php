<?php
if (! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @property Directory_model $directory_model Directory Model
 * @property Profile_model $profile_model Directory Model
 */
class GreenDirectory extends MY_Controller
{
    protected $data = array();
    private $records = array();
    private $results = array();
    private $_session = array();
    private $status = array("status" => 0, "msg" => NULL);
    private $where = array();
    private $id;
    private $pagetitle;
    private $isUpdate = 0;
    private $isDelete = 0;
    private $isInsert = 0;

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        if ($this->ion_auth->logged_in()) {
            $this->data['userInformation'] = $this->ion_auth->user()->row();
        }
        $this->data['loggedinuserinformation'] = $this->basic_information_of_mine($this->data['userInformation']->id);
        $this->data['title'] = "Green Directory";
        $this->data['userid'] = $this->data['userInformation']->id;
        $this->data['userinformation'] = $this->profile_model->getUsersInformation($this->data['userid']);
        $this->data['personalinformation'] = $this->profile_model->getPersonalInformation($this->data['userid']);
        $this->data['categories'] = $this->common_model->get_directory_categories(8);

        $this->load->view('layouts/header', $this->data);
        $this->load->view('directory/categories', $this->data);
        $this->load->view('layouts/footer', $this->data);
    }

    public function get_businesses()
    {
        $this->id = $this->uri->segment(2);

        if ($this->ion_auth->logged_in()) {
            $this->data['userInformation'] = $this->ion_auth->user()->row();
        }
        $this->data['loggedinuserinformation'] = $this->basic_information_of_mine($this->data['userInformation']->id);

        $this->data['title'] = "Green Directory";
        $this->data['userid'] = $this->data['userInformation']->id;
        $this->data['userinformation'] = $this->profile_model->getUsersInformation($this->data['userid']);
        $this->data['personalinformation'] = $this->profile_model->getPersonalInformation($this->data['userid']);

        $this->data['businessesbyid'] = $this->directory_model->getBusinessesByCategoryId($this->id);

        $this->load->view('layouts/header', $this->data);
        $this->load->view('directory/businesses', $this->data);
        $this->load->view('layouts/footer', $this->data);
    }
}