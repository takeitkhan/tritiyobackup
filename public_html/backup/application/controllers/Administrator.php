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
class Administrator extends MY_Controller
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

    public function __construct()
    {
        parent::__construct();
        if (!$this->ion_auth->logged_in()) {
            redirect('outlet', 'refresh');
        }
    }

    public function index()
    {
        if ($this->ion_auth->logged_in()) {
            $this->data['userInformation'] = $this->ion_auth->user()->row();
        }
        $this->data['title'] = "Administrator Panel";


        $this->load->view('administrator/layouts/header', $this->data);
        $this->load->view('administrator/panel', $this->data);
        $this->load->view('layouts/footer', $this->data);
    }

    public function generate_attendance()
    {
        if ($this->ion_auth->logged_in()) {
            $this->data['userInformation'] = $this->ion_auth->user()->row();
        }
        $this->data['loggedinuserinformation'] = $this->basic_information_of_mine($this->data['userInformation']->id);
        $this->data['userid'] = $this->data['userInformation']->id;
        $this->data['title'] = "Attendance";

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

        $this->data['usergroups'] = $this->get_groups();
        $this->data['return'][0] = "Select one";
        $this->data['return'][100] = "Others";
        foreach ($this->data['usergroups'] as $row) {
            $this->data['return'][$row['id']] = $row['name'] . (isset($row['description']) ? " (" . $row['description'] . ")" : "");
        }
        $this->data['classes'] = $this->common_model->get_settings(1);
        $this->data['sections'] = $this->common_model->get_settings(2);
        $this->data['groups'] = $this->common_model->get_settings(6);
        $this->data['departments'] = $this->common_model->get_settings(3);

        $this->load->view('layouts/header', $this->data);
        $this->load->view('administrator/studentsattendance', $this->data);
        $this->load->view('layouts/footer', $this->data);
    }

    public function attendance_modification()
    {
        if ($this->ion_auth->logged_in()) {
            $this->data['userInformation'] = $this->ion_auth->user()->row();
        }
        $this->data['loggedinuserinformation'] = $this->basic_information_of_mine($this->data['userInformation']->id);
        $this->data['userid'] = $this->data['userInformation']->id;
        $this->data['title'] = "Attendance Modification";

        // '?dataid=' + dataid + '&absent=' + isabsval + '&written=' + written + '&mcq=' + mcq + '&practical=' + practical + '&listening=' + listening + '&writting=' + writting + '&speaking=' + speaking + '&reading=' + reading,

        $stdid = $this->uri->segment(2);
        $dataid = (isset($_GET['dataid']) ? $_GET['dataid'] : 0);
        $absent = (isset($_GET['absent']) ? $_GET['absent'] : 0);
        $guardianpn = (isset($_GET['guardianpn']) ? $_GET['guardianpn'] : 0);
        $message = (isset($_GET['message']) ? $_GET['message'] : 0);


        $data = array(
            'isAbsent' => $absent,
            'Message' => $message
        );
        if (isset($dataid)) {
            if ($guardianpn != 'none') {
                $this->results = sendSms($message, $guardianpn);
                $where = array('AttendanceId' => $dataid, 'UserId' => $stdid);
                $this->modify_attendance($data, $where);
                if ($this->results) {
                    $this->status['status'] = 1;
                    $this->status['msg'] = 'Message to the guardian has been sent';
                } else {
                    $this->status['status'] = 0;
                    $this->status['msg'] = 'Sorry!';
                }
                echo jsonEncode($this->status);
            } else {
                $where = array('AttendanceId' => $dataid, 'UserId' => $stdid);
                $this->results = $this->modify_attendance($data, $where);
                if ($this->results) {
                    $this->status['status'] = 1;
                    $this->status['msg'] = 'Data Saved Successfully';
                } else {
                    $this->status['status'] = 0;
                    $this->status['msg'] = 'Sorry!';
                }
                echo jsonEncode($this->status);
            }
        }
    }


    public function send_notification()
    {
        error_reporting(0);
        $absencenotify = $this->input->post('absencenotify', true);
        $message = $this->input->post('message', true);
        foreach ($absencenotify as $absencenot) {
            $absencesep = explode("_", $absencenot);
            $stdid = $absencesep[0];
            $contact = $absencesep[1];
            $currentDate = date('m/d/Y');
            $absencedate = date('d');
            $absencemonth = date('m');
            $absenceyear = date('Y');
            //echo $currentDate;
            if ($absencesep) {
                $s[] = array(
                    'studentabid' => $stdid,
                    'absencedate' => $absencedate,
                    'absencemonth' => $absencemonth,
                    'absenceyear' => $absenceyear,
                );
                sendSms($message, $contact);
            }
        }
        $res = $this->common_model->insertBatch($this->common_model->_attendance, $s);
        if ($res) {
            $this->status['status'] = 1;
            $this->status['msg'] = "Successfully send sms";
        } else {
            $this->status['status'] = 0;
            $this->status['msg'] = "There is no student in this group. Please add student in this group.";
        }
        echo jsonEncode($this->status);
    }

    public function subscribers()
    {
        if ($this->ion_auth->logged_in()) {
            $this->data['userInformation'] = $this->ion_auth->user()->row();
        }
        $this->data['title'] = "Subscribers";

        $this->load->view('administrator/layouts/header', $this->data);
        $this->load->view('administrator/subscribers', $this->data);
        $this->load->view('layouts/footer', $this->data);
    }

    public function get_all_users_by_ajax()
    {
        echo $this->panel_model->getAllUsers();
    }

    public function if_attendance_exists($cid, $sid, $sgid, $department)
    {
        $thanks = $this->panel_model->ifAttendanceExists($cid, $sid, $sgid, $department);
        return $thanks;
    }

    public function if_attendance_exists_tchstaffs()
    {
        $thanks = $this->panel_model->ifAttendanceExistsTchStaffs();
        return $thanks;
    }

    public function get_groups()
    {
        return $this->panel_model->getUsersGroups();
    }

    public function modify_attendance($data, $where)
    {
        return $this->panel_model->modify_single_attendance($data, $where);
    }
}