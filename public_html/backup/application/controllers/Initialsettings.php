<?php
if (! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * @property settings_model $settings_model sdss
 * @property Uploader       $uploader Uploader Class Library
 * @property Common_model   $common_model Uploader Class Library
 * @property Panel_model    $panel_model panel_model Class Library
 */
class Initialsettings extends MY_Controller
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
        if (!$this->ion_auth->logged_in()) {
            redirect('outlet', 'refresh');
        }
    }

    public function index()
    {
        $uri2 = $this->uri->segment(2);
        if (isset($uri2)) {
            $this->data['settingsinformation'] = $this->common_model->get_initial_settings_by_id($uri2);
        }
        if ($this->ion_auth->logged_in()) {
            $this->data['userInformation'] = $this->ion_auth->user()->row();
        }
        $this->data['loggedinuserinformation'] = $this->basic_information_of_mine($this->data['userInformation']->id);
        $this->data['userid'] = $this->data['userInformation']->id;

        $this->data['title'] = "Initial Settings";
        $selected_category = $this->uri->segment(1);

        $categories = array('addnewclass' => 'Class', 'addnewsection' => 'Section', 'addnewdepartment' => 'Department', 'addnewsubject' => 'Subject', 'addnewexam' => 'Exam', 'addnewshift' => 'Shift');
        $this->data['selected_category'] = $categories[$selected_category];

        $this->load->view('layouts/header', $this->data);
        $this->load->view('initialsettings/addsettings', $this->data);
        $this->load->view('layouts/footer', $this->data);
    }

    public function new_setting()
    {
        $this->data['title'] = "New Settings";

        $this->load->view('layouts/header', $this->data);
        $this->load->view('initialsettings/newsetting', $this->data);
        $this->load->view('layouts/footer', $this->data);
    }

    public function insert_initial_settings()
    {
        $updatedId = $this->input->post('SettingsId');
        if (isset($updatedId)) {
            $data = array(
                'SettingsCategory' => $this->input->post('SettingsCategory'),
                'SettingsName' => $this->input->post('SettingsName'),
                'SettingsDescription' => $this->input->post('SettingsDescription'),
                'isActive' => $this->input->post('isActive')
            );
            $where = array('SettingsId' => $uri2);
            //$where = array('SettingsId' => $updatedId);
            $this->results = $this->settings_model->updateInitialSettings($data, $where);
        }
        $data = array(
            'SettingsCategory' => $this->input->post('SettingsCategory'),
            'SettingsName' => $this->input->post('SettingsName'),
            'SettingsDescription' => $this->input->post('SettingsDescription'),
            'isActive' => $this->input->post('isActive')
        );
        $this->results = $this->settings_model->insertInitialSetting($data);
        if ($this->results) {
            $this->status['status'] = 1;
            $this->status['msg'] = 'Well done!';
        } else {
            $this->status['status'] = 0;
            $this->status['msg'] = 'Oh snap! Change a few things up and try submitting again.';
        }
        echo jsonEncode($this->status);
    }

    public function view_initial_settings()
    {
        $this->data['title'] = "Initial Settings";
        $cat = $this->uri->segment(2);
        $categories = array(
            '1' => 'Class',
            '2' => 'Section',
            '3' => 'Department',
            '4' => 'Subject',
            '5' => 'Exam',
            '6' => 'Shift'
        );

        $this->data['selected_category'] = $categories[$cat];

        $this->load->view('layouts/header', $this->data);
        $this->load->view('initialsettings/viewsettings', $this->data);
        $this->load->view('layouts/footer', $this->data);
    }

    public function get_initial_settings_by_category()
    {
        $cat = $this->uri->segment(3);
        echo $this->panel_model->getInitialSettingsByCategory($cat);
    }

}

?>