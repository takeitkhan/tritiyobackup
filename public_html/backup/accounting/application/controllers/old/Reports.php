<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @property Profile_model $profile_model Profile Model
 * @property Common_model $common_model Common Model
 * @property Settings_model $settings_model Settings Model
 * @property Ion_auth $ion_auth ion_auth
 * @property Payments_model $payments_model ion_auth
 * @property Reports_model $reports_model Reports Model
 */
class Reports extends MY_Controller
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

    public function get_fee_report()
    {
        if ($this->ion_auth->logged_in()) {
            $this->data['userInformation'] = $this->ion_auth->user()->row();
        }
        $this->data['loggedinuserinformation'] = $this->basic_information_of_mine($this->data['userInformation']->id);
        //owndebugger($this->data['userInformation']);
        $this->data['userid'] = $this->data['userInformation']->id;
        $this->data['settings'] = $this->get_settings();
        $this->data['title'] = "Get Money Receipt";

        $ui = $this->input->post('studentid');
        $sd = datetoint($this->input->post('startdate'));
        $ed = datetoint($this->input->post('enddate'));
        $this->data['sd'] = $sd;
        $this->data['ed'] = $ed;
        //owndebugger($ed);

        if (!empty($this->data['sd']) AND !empty($this->data['ed'])) {
            if ($ui != NULL) {
                $this->data['biodata'] = $this->common_model->get_user_single_informations_by_user_id($ui);
            }
            $this->data['payslip'] = $this->get_payment_by_user_id_date_between($ui, $sd, $ed);
            $this->data['pay_method'] = $this->get_payment_methods();
        }

        (isset($this->data['payslip']) ? $this->data['payslip'] : '');

        $this->load->view('layouts/header', $this->data);
        $this->load->view('reports/feereports', $this->data);
        $this->load->view('layouts/footer', $this->data);
    }

    public function get_pay_slip()
    {
        // debit pay slip report printing
        if ($this->ion_auth->logged_in()) {
            $this->data['userInformation'] = $this->ion_auth->user()->row();
        }
        $this->data['loggedinuserinformation'] = $this->basic_information_of_mine($this->data['userInformation']->id);
        //owndebugger($this->data['userInformation']);
        $this->data['userid'] = $this->data['userInformation']->id;
        $this->data['settings'] = $this->get_settings();
        $this->data['title'] = "Get Pay Slip";

        $ui = $this->input->post('userid');
        $sd = datetoint($this->input->post('startdate'));
        $ed = datetoint($this->input->post('enddate'));
        $this->data['sd'] = $sd;
        $this->data['ed'] = $ed;
        //owndebugger($ed);

        if (!empty($this->data['sd']) AND !empty($this->data['ed'])) {
            if ($ui != NULL) {
                $this->data['biodata'] = $this->common_model->get_user_single_informations_by_user_id($ui);
            }
            $this->data['payslip'] = $this->get_payment_by_user_id_date_between($ui, $sd, $ed);
            $this->data['pay_method'] = $this->get_payment_methods();
        }

        (isset($this->data['payslip']) ? $this->data['payslip'] : '');

        $this->load->view('layouts/header', $this->data);
        $this->load->view('reports/payslip', $this->data);
        $this->load->view('layouts/footer', $this->data);
    }

    public function get_std_attendance_report()
    {
        if ($this->ion_auth->logged_in()) {
            $this->data['userInformation'] = $this->ion_auth->user()->row();
        }
        $this->data['loggedinuserinformation'] = $this->basic_information_of_mine($this->data['userInformation']->id);
        $this->data['userid'] = $this->data['userInformation']->id;
        $this->data['title'] = "Attendance";

        if ($this->input->post('report')) {
            $ui = $this->input->post('studentid');
            $sd = $this->input->post('startdate');
            $ed = $this->input->post('enddate');
            $this->data['sd'] = $sd;
            $this->data['ed'] = $ed;

            if (!empty($this->data['sd']) AND !empty($this->data['ed'])) {
                if ($ui != NULL) {
                    $this->data['biodata'] = $this->common_model->get_user_single_informations_by_user_id($ui);
                }
                $this->data['attendance'] = $this->get_std_attendance_by_user_id_date_between($ui, $sd, $ed);
            }

            (isset($this->data['attendance']) ? $this->data['attendance'] : '');
        } else {
            $this->data[''] = 'Select appropriate criteria to get the value';
        }
        $this->load->view('layouts/header', $this->data);
        $this->load->view('reports/attendancereport', $this->data);
        $this->load->view('layouts/footer', $this->data);
    }

    public function get_std_result_report()
    {
        if ($this->ion_auth->logged_in()) {
            $this->data['userInformation'] = $this->ion_auth->user()->row();
        }
        $this->data['loggedinuserinformation'] = $this->basic_information_of_mine($this->data['userInformation']->id);
        $this->data['userid'] = $this->data['userInformation']->id;
        $this->data['title'] = "Result";
        $this->data['exams'] = $this->common_model->get_settings(5);

        if ($this->input->post('report')) {
            $ui = $this->input->post('studentid');
            //owndebugger($ui);
            $ed = $this->input->post('examm');
            $this->data['ed'] = $ed;
            //owndebugger($ed);

            if (!empty($this->data['ed'])) {
                if ($ui != NULL) {
                    $this->data['biodata'] = $this->common_model->get_user_single_informations_by_user_id($ui);
                }
                $this->data['result'] = $this->get_std_result_by_user_id($ui, $ed);
            }

            (isset($this->data['result']) ? $this->data['result'] : '');
        } else {
            $this->data[''] = 'Select appropriate criteria to get the value';
        }
        $this->load->view('layouts/header', $this->data);
        $this->load->view('reports/resultreport', $this->data);
        $this->load->view('layouts/footer', $this->data);
    }

    public function get_settings()
    {
        $row = $this->settings_model->getSystemSettings();
        return $row[0];
    }

    public function get_payment_methods()
    {
        $row = $this->payments_model->get_payments_methods();
        return $row;
    }

    /** From Reports Model **/
    public function get_payment_by_user_id_date_between($ui, $sd, $ed)
    {
        //return $this->result_model->getSubjectWiseResults($eid, $cid, $sid, $subid, $sgid);
        return $this->reports_model->getPaymentByUserByDate($ui, $sd, $ed);
    }    

    public function get_std_result_by_user_id($ui, $ed)
    {
        //return $this->result_model->getSubjectWiseResults($eid, $cid, $sid, $subid, $sgid);
        return $this->reports_model->getIndividualResult($ui, $ed);
    }

    public function get_std_attendance_by_user_id_date_between($ui, $sd, $ed)
    {
        //return $this->result_model->getSubjectWiseResults($eid, $cid, $sid, $subid, $sgid);
        return $this->reports_model->myStdAttendanceDateBetween($ui, $sd, $ed);
    }

}