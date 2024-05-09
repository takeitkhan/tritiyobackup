<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Created by Samrat.
 *
 * @property Panel_model $panel_model Panel Model
 * @property Common_model $common_model Common Model
 * User: Dell
 * Date: 9/29/2015
 * Time: 1:00 PM
 */
class Users extends MY_Controller
{

    protected $data = array();
    protected $return = array();
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

    public function __construct(){
        parent::__construct();
        $this->load->model(array("user_model"));
        $this->load->helper('user_helper');
        if (!$this->ion_auth->logged_in()) {
            redirect('outlet', 'refresh');
        }
    }

    public function students($offset = 0){
        if ($this->ion_auth->logged_in()) {
            $this->data['userInformation'] = $this->ion_auth->user()->row();
        }
        $this->data['loggedinuserinformation'] = $this->basic_information_of_mine($this->data['userInformation']->id);
        $this->data['userid'] = $this->data['userInformation']->id;
        $this->data['title'] = "Students";

        $this->data['usergroup'] = (isset($_GET['usergroup']) ? $_GET['usergroup'] : '0');
        $this->data['cid'] = (isset($_GET['classs']) ? $_GET['classs'] : '0');
        $this->data['sid'] = (isset($_GET['section']) ? $_GET['section'] : '0');
        $this->data['sgid'] = (isset($_GET['groupp']) ? $_GET['groupp'] : '0');
        $this->data['department'] = (isset($_GET['department']) ? $_GET['department'] : '0');

        if ($this->data['usergroup'] == 0) {
            $this->data['notfound'] = 'You must to select the usergroup';
        } else if ($this->data['usergroup'] == 100 AND $this->data['cid'] == 0 AND $this->data['sid'] == 0 AND $this->data['sgid'] == 0 AND $this->data['department'] == 0) {
            $thanks1 = $this->if_attendance_exists_tchstaffs();
            if ($thanks1->Total >= 1) {
                $thanks = $this->panel_model->getUsersForAttendanceTchStaffs();
                $this->data['usersforattendance'] = $thanks;
            } else {
                $thanks = $this->panel_model->insertOrUpdateAttendanceTchStaffs();
                $this->data['usersforattendance'] = $thanks;
            }
            $thanks = $this->panel_model->getUsersForAttendanceTchStaffs();
            $this->data['usersforattendance'] = $thanks;
        } else if ($this->data['usergroup'] != 0 AND $this->data['usergroup'] != 100 AND !empty($this->data['sid'])) {
            $thanks1 = $this->if_attendance_exists($this->data['cid'], $this->data['sid'], $this->data['sgid'], $this->data['department']);
            if ($thanks1->Total >= 1) {
                $thanks = $this->panel_model->getUsersForAttendance($this->data['cid'], $this->data['sid'], $this->data['sgid'], $this->data['department']);
                $this->data['usersforattendance'] = $thanks;
            } else {
                $thanks = $this->panel_model->insertOrUpdateAttendance($this->data['cid'], $this->data['sid'], $this->data['sgid'], $this->data['department']);
                $this->data['usersforattendance'] = $thanks;
            }
        } else {
            $this->data['notfound'] = 'No user found on this criteria';
        }
        $this->data['notfound'] = (isset($this->data['notfound']) ? $this->data['notfound'] : 'Select Appropriate Class, Section and Study Group if you choose students');

        $this->data['usergroups'] = $this->panel_model->getUsersGroups();
        $this->data['return'][0] = "Select one";
        $this->data['return'][100] = "Others";
        foreach ($this->data['usergroups'] as $row) {
            $this->data['return'][$row['id']] = $row['name'] . (isset($row['description']) ? " (" . $row['description'] . ")" : "");
        }

        $prm = $this->uri->segment('2');
        $offset = $this->input->get('per_page');
        $offset = (!empty($offset) ? $offset : 0);
        $limit = 10;

        $search = array(
            'isActive' => $this->input->get('status'),
            'Class' => $this->input->get('classs'),
            'Section' => $this->input->get('section'),
            'GroupId' => $this->input->get('groupp'),
            'Department' => $this->input->get('department'),
            'limit' => $limit,
            'offset' => $offset,
            'prm' => $prm
        );
        $this->data['students'] = $this->user_model->get_student_list($search);
        $this->load->library('pagination');
        $config['total_rows'] = $this->user_model->count_student_list($search);
        $config['per_page'] = $limit;
        $config['enable_query_strings'] = TRUE;
        $config['page_query_string'] = TRUE;
        $config['reuse_query_string'] = TRUE;
        $config['use_page_numbers'] = FALSE;
        $config['cur_tag_open'] = '&nbsp;<a class="active">';
        $config['cur_tag_close'] = '</a>';
        $config['base_url'] = base_url('students');
        $this->pagination->initialize($config);
        $this->data['paging'] = $this->pagination->create_links();

        $this->data['classes'] = $this->common_model->get_settings(1);
        $this->data['sections'] = $this->common_model->get_settings(2);
        $this->data['groups'] = $this->common_model->get_settings(6);
        $this->data['departments'] = $this->common_model->get_settings(3);

        newView('users/students', $this->data);
    }
    public function staffs($offset = 0){
        if ($this->ion_auth->logged_in()) {
            $this->data['userInformation'] = $this->ion_auth->user()->row();
        }
        $this->data['loggedinuserinformation'] = $this->basic_information_of_mine($this->data['userInformation']->id);
        $this->data['userid'] = $this->data['userInformation']->id;
        $this->data['title'] = "Staffs";

        $prm = $this->uri->segment('2');
        $offset = $this->input->get('per_page');
        $offset = (!empty($offset) ? $offset : 0);
        $limit = 2;

        $search = array(
            'isActive' => $this->input->get('status'),
            'UserId' => $this->input->get('userid'),
            'IndexNumber' => $this->input->get('index'),
            'limit' => $limit,
            'offset' => $offset,
            'prm' => $prm
        );
        $this->data['staffs'] = $this->user_model->get_staff_list($search);
        $this->load->library('pagination');
        $config['total_rows'] = $this->user_model->count_staff_list($search);
        $config['per_page'] = $limit;
        $config['enable_query_strings'] = TRUE;
        $config['page_query_string'] = TRUE;
        $config['reuse_query_string'] = TRUE;
        $config['use_page_numbers'] = FALSE;
        $config['cur_tag_open'] = '&nbsp;<a class="active">';
        $config['cur_tag_close'] = '</a>';
        $config['base_url'] = base_url('staffs');
        $this->pagination->initialize($config);
        $this->data['paging'] = $this->pagination->create_links();

        newView('users/staffs', $this->data);
    }
    public function guardians($offset = 0){
        if ($this->ion_auth->logged_in()) {
            $this->data['userInformation'] = $this->ion_auth->user()->row();
        }
        $this->data['loggedinuserinformation'] = $this->basic_information_of_mine($this->data['userInformation']->id);
        $this->data['userid'] = $this->data['userInformation']->id;
        $this->data['title'] = "Guardians";

        $prm = $this->uri->segment('2');
        $offset = $this->input->get('per_page');
        $offset = (!empty($offset) ? $offset : 0);
        $limit = 10;

        $search = array(
            'StudentId' => $this->input->get('userid'),
            'GuardianId' => $this->input->get('guardianid'),
            'limit' => $limit,
            'offset' => $offset,
            'prm' => $prm
        );
        $this->data['guardians'] = $this->user_model->get_guardians_list($search);
        $this->load->library('pagination');
        $config['total_rows'] = $this->user_model->count_guardians_list($search);
        $config['per_page'] = $limit;
        $config['enable_query_strings'] = TRUE;
        $config['page_query_string'] = TRUE;
        $config['reuse_query_string'] = TRUE;
        $config['use_page_numbers'] = FALSE;
        $config['cur_tag_open'] = '&nbsp;<a class="active">';
        $config['cur_tag_close'] = '</a>';
        $config['base_url'] = base_url('guardians');
        $this->pagination->initialize($config);
        $this->data['paging'] = $this->pagination->create_links();

        newView('users/guardians', $this->data);
    }
    public function newstudent(){
        if ($this->ion_auth->logged_in()) {
            $this->data['userInformation'] = $this->ion_auth->user()->row();
        }
        $this->data['loggedinuserinformation'] = $this->basic_information_of_mine($this->data['userInformation']->id);
        $this->data['loggedinuserid'] = $this->data['userInformation']->id;
        $this->data['loggedinusergroupid'] = $this->get_group_id($this->data['loggedinuserid']);
        //owndebugger($this->data['loggedinusergroupid']);
        if ($this->data['loggedinusergroupid'] != 1) {
            redirect('dashboard');
        } else {
            $uri2 = $this->uri->segment(2);
            if (isset($uri2)) {
                $this->data['userid'] = $this->uri->segment(2);
            } else {
                if ($this->ion_auth->logged_in()) {
                    $this->data['userInformation'] = $this->ion_auth->user()->row();
                }
                $this->data['userid'] = $this->data['userInformation']->id;
            }
            $this->load->helper('string');
            $this->data['title'] = "Add student and guardian";
            $this->data['class'] = $this->common_model->get_settings(1);
            $this->data['sections'] = $this->common_model->get_settings(2);
            $this->data['departments'] = $this->common_model->get_settings(3);
            $this->data['studygroups'] = $this->common_model->get_settings(6);
            $this->data['usergroups'] = $this->common_model->get_users_type();
            $this->load->view('layouts/header', $this->data);
            $this->load->view('users/newstudent', $this->data);
            $this->load->view('layouts/footer', $this->data);
        }
        //newView('users/newstudent', $this->data);
    }
    public function newstaff(){
        if ($this->ion_auth->logged_in()) {
            $this->data['userInformation'] = $this->ion_auth->user()->row();
        }
        $this->data['loggedinuserinformation'] = $this->basic_information_of_mine($this->data['userInformation']->id);
        $this->data['loggedinuserid'] = $this->data['userInformation']->id;
        $this->data['loggedinusergroupid'] = $this->get_group_id($this->data['loggedinuserid']);
        //owndebugger($this->data['loggedinusergroupid']);
        if ($this->data['loggedinusergroupid'] != 1) {
            redirect('dashboard');
        } else {
            $uri2 = $this->uri->segment(2);
            if (isset($uri2)) {
                $this->data['userid'] = $this->uri->segment(2);
            } else {
                if ($this->ion_auth->logged_in()) {
                    $this->data['userInformation'] = $this->ion_auth->user()->row();
                }
                $this->data['userid'] = $this->data['userInformation']->id;
            }
            $this->load->helper('string');
            $this->data['title'] = "Add student and guardian";
            $this->data['class'] = $this->common_model->get_settings(1);
            $this->data['sections'] = $this->common_model->get_settings(2);
            $this->data['departments'] = $this->common_model->get_settings(3);
            $this->data['studygroups'] = $this->common_model->get_settings(6);
            $this->data['usergroups'] = $this->common_model->get_users_type();
            $this->load->view('layouts/header', $this->data);
            $this->load->view('users/newstaff', $this->data);
            $this->load->view('layouts/footer', $this->data);
        }
        //newView('users/newstudent', $this->data);
    }
    public function createnew(){
        if ($this->ion_auth->logged_in()) {
            $this->data['userInformation'] = $this->ion_auth->user()->row();
        }
        $this->data['loggedinuserinformation'] = $this->basic_information_of_mine($this->data['userInformation']->id);
        $this->data['userid'] = $this->data['userInformation']->id;
        $this->data['title'] = "Students";
        $this->load->view('layouts/header', $this->data);
        $this->load->view('users/createnew', $this->data);
        $this->load->view('layouts/footer', $this->data);
    }
    public function get_group_id($userid)
    {
        return $this->ion_auth->get_users_groups($userid)->row()->id;
    }


}