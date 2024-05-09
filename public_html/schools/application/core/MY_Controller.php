<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller
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

    function __construct()
    {
        parent::__construct();
        $this->output->enable_profiler(FALSE); // I keep this here so I dont have to manualy edit each controller to see profiler or not
        $this->load->model(array('admin_model', 'common_model', 'profile_model', 'settings_model', 'payments_model', 'reports_model', 'panel_model', 'directory_model', 'reports_model', 'result_model'));
        $this->load->library(array('ion_auth', 'form_validation', 'upload', 'initial'));
        $this->load->database();
        $this->load->helper(array('url', 'language'));
        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
        $this->lang->load('auth');

        $this->data['settings'] = $this->get_settings();
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login', 'refresh');
        }
    }

    public function get_settings()
    {
        $row = $this->settings_model->getSystemSettings();
        return $row[0];
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