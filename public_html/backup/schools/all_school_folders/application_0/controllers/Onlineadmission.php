<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @property Profile_model $profile_model Profile Model
 * @property Common_model $common_model Common Model
 * @property Settings_model $settings_model Settings Model
 * @property Ion_auth $ion_auth ion_auth
 * @property Panel_model $panel_model Panel model
 */
class Onlineadmission extends CI_Controller
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
        if ($this->ion_auth->logged_in()) {
            $this->data['userInformation'] = $this->ion_auth->user()->row();
        }
        $uri2 = $this->uri->segment(2);
        if (isset($uri2)) {
            $this->data['userid'] = $this->uri->segment(2);
        } else {
            $this->data['userid'] = $this->data['userInformation']->id;
        }
        $this->data['title'] = "Add New Applicants";

        $this->load->view('layouts/header', $this->data);
        $this->load->view('pages/addnewadmission', $this->data);
        $this->load->view('layouts/footer', $this->data);
    }


    public function insert_online_admission()
    {
        if ($this->ion_auth->logged_in()) {
            $this->data['userInformation'] = $this->ion_auth->user()->row();
        }
        $uri2 = $this->uri->segment(2);
        if (isset($uri2)) {
            $this->data['userid'] = $this->uri->segment(2);
        } else {
            $this->data['userid'] = $this->data['userInformation']->id;
        }
        $data = array(
            'FullNameBn' => $this->input->post('full_name_bn'),
            'FullNameEn' => $this->input->post('full_name_en'),
            'FatherNameBn' => $this->input->post('father_name_bn'),
            'FatherNameEn' => $this->input->post('father_name_en'),
            'MotherNameBn' => $this->input->post('mother_name_bn'),
            'MotherNameEn' => $this->input->post('mother_name_en'),
            'DateOfBirth' => $this->input->post('date_of_birth'),
            'MobileNo' => $this->input->post('mobile_no'),
            'PermanentVillege' => $this->input->post('permanent_villege'),
            'PermanentPost' => $this->input->post('permanent_post'),
            'PermanentUpazila' => $this->input->post('permanent_upazila'),
            'PermanentDistrict' => $this->input->post('permanent_district'),
            'PresentVillege' => $this->input->post('present_villege'),
            'PresentPost' => $this->input->post('present_post'),
            'PresentUpazila' => $this->input->post('present_upazila'),
            'PresentDistrict' => $this->input->post('present_district'),
            'OthersGuardian' => $this->input->post('others_guardian'),
            'Relation' => $this->input->post('relation'),
            'OthersGuardianPermanentAddress' => $this->input->post('others_guardian_permanent_address'),
            'OthersGuardianPresentAddress' => $this->input->post('others_guardian_present_address'),
            'GuardianMobileNo' => $this->input->post('guardian_mobile_no'),
            'Nationality' => $this->input->post('nationality'),
            'Gender' => $this->input->post('gender'),
            'Religion' => $this->input->post('religion'),
            'StdGroup' => $this->input->post('std_group'),
            'Compulsory' => $this->input->post('compulsory'),
            'Selective' => $this->input->post('selective'),
            'Optional' => $this->input->post('optional'),
            'ExamName1' => $this->input->post('examname_1'),
            'Board1' => $this->input->post('board_1'),
            'Institute1' => $this->input->post('institute_1'),
            'PassYear1' => $this->input->post('pass_yera_1'),
            'ExamCenterName1' => $this->input->post('exam_center_name_1'),
            'RollNo1' => $this->input->post('roll_no_1'),
            'RegNo1' => $this->input->post('reg_no_1'),
            'Session1' => $this->input->post('session_1'),
            'Result1' => $this->input->post('result_1'),
            'ExamName2' => $this->input->post('examname_2'),
            'Board2' => $this->input->post('board_2'),
            'Institute2' => $this->input->post('institute_2'),
            'PassYear2' => $this->input->post('pass_yera_2'),
            'ExamCenterName2' => $this->input->post('exam_center_name_2'),
            'RollNo2' => $this->input->post('roll_no_2'),
            'RegNo2' => $this->input->post('reg_no_2'),
            'Session2' => $this->input->post('session_2'),
            'Result2' => $this->input->post('result_2'),
            'ExamName3' => $this->input->post('examname_3'),
            'Board3' => $this->input->post('board_3'),
            'Institute3' => $this->input->post('institute_3'),
            'PassYear3' => $this->input->post('pass_yera_3'),
            'ExamCenterName3' => $this->input->post('exam_center_name_3'),
            'RollNo3' => $this->input->post('roll_no_3'),
            'RegNo3' => $this->input->post('reg_no_3'),
            'Session3' => $this->input->post('session_3'),
            'Result3' => $this->input->post('result_3'),
            'Class' => $this->input->post('class'),
            'Section' => $this->input->post('section'),
            'BkashNo' => $this->input->post('bkash_no'),
            'Amount' => $this->input->post('amount'),
            'TransactionId' => $this->input->post('transaction_id'),
            'Photo' => $this->input->post('phpto'),
            'isActive' => 1
        );

        $this->results = $this->settings_model->insertOnlineAdmission($data);

        if ($this->results) {
            $this->status['status'] = 1;
            $this->status['msg'] = 'Well done!';
        } else {
            $this->status['status'] = 0;
            $this->status['msg'] = 'Oh snap! Change a few things up and try submitting again.';
        }
        echo jsonEncode($this->status);
    }

    public function view_single_applicants()
    {
        if ($this->ion_auth->logged_in()) {
            $this->data['userInformation'] = $this->ion_auth->user()->row();
        }
        $uri2 = $this->uri->segment(2);
        if (isset($uri2)) {
            $this->data['userid'] = $this->uri->segment(2);
        } else {
            $this->data['userid'] = $this->data['userInformation']->id;
        }
        $uri2 = $this->uri->segment(2);
        $this->data['title'] = "View Applicants";
        $this->data['applicantsinfos'] = $this->applicant_information_of_mine($uri2);
        $this->data['applicantinfo'] = $this->data['applicantsinfos'][0];
        $this->load->view('layouts/header', $this->data);
        $this->load->view('pages/viewsingleapplicants', $this->data);
        $this->load->view('layouts/footer', $this->data);
    }

    public function view_admission_request()
    {
        if ($this->ion_auth->logged_in()) {
            $this->data['userInformation'] = $this->ion_auth->user()->row();
        }
        $uri2 = $this->uri->segment(2);
        if (isset($uri2)) {
            $this->data['userid'] = $this->uri->segment(2);
        } else {
            $this->data['userid'] = $this->data['userInformation']->id;
        }
        $this->data['title'] = "View Applicants";

        $this->load->view('layouts/header', $this->data);
        $this->load->view('pages/viewadmission', $this->data);
        $this->load->view('layouts/footer', $this->data);
    }

    public function get_all_applicants_by_ajax()
    {
        echo $this->panel_model->getAllApplicants();
    }

    public function delete_applicants()
    {
        $uri2 = $this->uri->segment(2);
        if (isset($uri2)) {
            $this->data['userid'] = $this->uri->segment(2);
        } else {
            if ($this->ion_auth->logged_in()) {
                $this->data['userInformation'] = $this->ion_auth->user()->row();
            }
            $this->data['userid'] = $this->data['userInformation']->id;
        }

        if ($uri2) {
            $w1 = array('id' => $uri2);
            $w2 = array('UserId' => $uri2);
            $this->isDelete = $this->panel_model->deleteApplicant($w1);
            $this->isDelete = $this->panel_model->deletePayments($w2);
            $this->isDelete = $this->panel_model->deleteUserBasicInformation($w2);

            if ($this->isDelete) {
                $this->status['status'] = 1;
                $this->status['msg'] = "Applicants has been deleted";
            } else {
                $this->status['status'] = 0;
                $this->status['msg'] = "Oh snap! Change a few things up and try submitting again.";
            }
        } else {
            $this->status['status'] = 0;
            $this->status['msg'] = "Oh snap! Change a few things up and try submitting again.";
        }

        /* ajax response */
        echo jsonEncode($this->status);
    }

    public function applicant_information_of_mine($id)
    {

        return $this->profile_model->getApplicantsInformation($id);
    }

}

?>