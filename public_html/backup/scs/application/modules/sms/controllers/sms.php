<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sms extends MX_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('Ion_auth');
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->model('sms_model');
        $this->load->model('patient/patient_model');
        $language = $this->db->get('settings')->row()->language;
        $this->lang->load('system_syntax', $language);
        $this->load->model('donor/donor_model');
        $this->load->model('doctor/doctor_model');
        $this->load->model('ion_auth_model');
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login', 'refresh');
        }
    }

    public function index() {
        $data = array();
        $id = $this->ion_auth->get_user_id();
        $data['sms'] = $this->sms_model->getProfileById($id);
        $this->load->view('home/dashboard'); // just the header file
        $this->load->view('profile', $data);
        $this->load->view('home/footer'); // just the footer file
    }

    public function sendView() {
        $data = array();
        $id = $this->ion_auth->get_user_id();
        $data['groups'] = $this->donor_model->getBloodBank();
        $data['patients'] = $this->patient_model->getPatient();
        $data['sms'] = $this->sms_model->getSmsSettingsById($id);
        $data['teams'] = $this->doctor_model->getDoctor();
        $this->load->view('home/dashboard'); // just the header file
        $this->load->view('sendview', $data);
        $this->load->view('home/footer'); // just the footer file
    }

    public function settings() {
        $data = array();
        $id = $this->ion_auth->get_user_id();
        $data['settings'] = $this->sms_model->getSmsSettingsById($id);
        $this->load->view('home/dashboard'); // just the header file
        $this->load->view('settings', $data);
        $this->load->view('home/footer'); // just the footer file
    }

    public function addNewSettings() {

        $id = $this->input->post('id');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $api_id = $this->input->post('api_id');

        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        // Validating Name Field
        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[100]|xss_clean');
        // Validating Password Field
        if (!empty($password)) {
            $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]|max_length[100]|xss_clean');
        }
        // Validating Email Field
        $this->form_validation->set_rules('api_id', 'Api Id', 'trim|required|min_length[5]|max_length[100]|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            $data = array();
            $id = $this->ion_auth->get_user_id();
            $data['sms'] = $this->sms_model->getSmsSettingsById($id);
            $this->load->view('home/dashboard'); // just the header file
            $this->load->view('settings', $data);
            $this->load->view('home/footer'); // just the footer file
        } else {
            $data = array();
            $data = array(
                'username' => $username,
                'password' => $password,
                'api_id' => $api_id,
                'user' => $this->ion_auth->get_user_id()
            );
            if (empty($this->sms_model->getSmsSettingsById($id)->username)) {
                $this->sms_model->addSmsSettings($data);
                $this->session->set_flashdata('feedback', 'Added');
            } else {
                $this->sms_model->updateSmsSettings($data);
                $this->session->set_flashdata('feedback', 'Updated');
            }
            redirect('sms/settings');
        }
    }

    function sendVoter() {
        $userId = $this->ion_auth->get_user_id();
        $voters = $this->voter_model->getVoter();
        $smsSettings = $this->sms_model->getSmsSettings();
        $username = $smsSettings->username;
        $password = $smsSettings->password;
        $api_id = $smsSettings->api_id;
        foreach ($voters as $voter) {
            $to[] = $voter->phone;
        }
        $to = implode(',', $to);
        // $message = urlencode("Test Message");
        if (!empty($to)) {
            $message = $this->input->post('message');
            file_get_contents('https://api.clickatell.com/http/sendmsg?user=' . $username . '&password=' . $password . '&api_id=' . $api_id . '&to=' . $to . '&text=' . $message);
            $this->session->set_flashdata('feedback', 'Message Sent');
        } else {
            $this->session->set_flashdata('feedback', 'Not Sent');
        }
        redirect('sms/sendView');
    }

    function sendVoterAreaWise() {
        $area_id = $this->input->post('area_id');
        $userId = $this->ion_auth->get_user_id();
        $voters = $this->voter_model->getVoter();
        $smsSettings = $this->sms_model->getSmsSettings();
        $username = $smsSettings->username;
        $password = $smsSettings->password;
        $api_id = $smsSettings->api_id;
        foreach ($voters as $voter) {
            if ($voter->area == $area_id) {
                $to[] = $voter->phone;
            }
        }
        if (!empty($to)) {
            $to = implode(',', $to);
            $message = $this->input->post('message');
            file_get_contents('https://api.clickatell.com/http/sendmsg?user=' . $username . '&password=' . $password . '&api_id=' . $api_id . '&to=' . $to . '&text=' . $message);
            $this->session->set_flashdata('feedback', 'Message Sent');
        } else {
            $this->session->set_flashdata('feedback', 'Message Failed');
        }
        redirect('sms/sendView');
    }

    function sendVoterBloodGroupWise() {
        $blood_group = $this->input->post('blood_group');
        $voters = $this->voter_model->getVoter();
        $smsSettings = $this->sms_model->getSmsSettings();
        $username = $smsSettings->username;
        $password = $smsSettings->password;
        $api_id = $smsSettings->api_id;
        foreach ($voters as $voter) {
            if ($voter->bloodgroup == $blood_group) {
                $to[] = $voter->phone;
            }
        }
        if (!empty($to)) {
            $to = implode(',', $to);
            $message = $this->input->post('message');
            file_get_contents('https://api.clickatell.com/http/sendmsg?user=' . $username . '&password=' . $password . '&api_id=' . $api_id . '&to=' . $to . '&text=' . $message);
            $this->session->set_flashdata('feedback', 'Message Sent');
        } else {
            $this->session->set_flashdata('feedback', 'Message Failed');
        }
        redirect('sms/sendView');
    }

    function sendVolunteer() {
        $userId = $this->ion_auth->get_user_id();
        $volunteers = $this->volunteer_model->getVolunteer();
        $smsSettings = $this->sms_model->getSmsSettingsById($userId);
        $username = $smsSettings->username;
        $password = $smsSettings->password;
        $api_id = $smsSettings->api_id;
        foreach ($volunteers as $volunteer) {
            $to[] = $volunteer->phone;
        }
        if (!empty($to)) {
            $to = implode(',', $to);
            $message = $this->input->post('message');
            file_get_contents('https://api.clickatell.com/http/sendmsg?user=' . $username . '&password=' . $password . '&api_id=' . $api_id . '&to=' . $to . '&text=' . $message);
            $this->session->set_flashdata('feedback', 'Message Sent');
        } else {
            $this->session->set_flashdata('feedback', 'Message Failed');
        }
        redirect('sms/sendView');
    }

    function sendVolunteerAreaWise() {
        $area_id = $this->input->post('area_id');
        $userId = $this->ion_auth->get_user_id();
        $volunteers = $this->volunteer_model->getVolunteer();
        $smsSettings = $this->sms_model->getSmsSettingsById($userId);
        $username = $smsSettings->username;
        $password = $smsSettings->password;
        $api_id = $smsSettings->api_id;
        foreach ($volunteers as $volunteer) {
            if ($volunteer->area == $area_id) {
                $to[] = $volunteer->phone;
            }
        }
        if (!empty($to)) {
            $to = implode(',', $to);
            $message = $this->input->post('message');
            // $message = urlencode("Test Message");
            file_get_contents('https://api.clickatell.com/http/sendmsg?user=' . $username . '&password=' . $password . '&api_id=' . $api_id . '&to=' . $to . '&text=' . $message);
            $this->session->set_flashdata('feedback', 'Message Sent');
        } else {
            $this->session->set_flashdata('feedback', 'Message Failed');
        }
        redirect('sms/sendView');
    }

    function sendSmsToSpecificVolunteer() {
        $userId = $this->ion_auth->get_user_id();
        $smsSettings = $this->sms_model->getSmsSettingsById($userId);
        $username = $smsSettings->username;
        $password = $smsSettings->password;
        $api_id = $smsSettings->api_id;

        $to = $this->input->post('number');
        $message = $this->input->post('message');
        $recipient = $this->input->post('volunteer_namee') . '<br>' . $this->input->post('number');
        if (!empty($to)) {
            $message = $this->input->post('message');
            file_get_contents('https://api.clickatell.com/http/sendmsg?user=' . $username . '&password=' . $password . '&api_id=' . $api_id . '&to=' . $to . '&text=' . $message);
            $data = array();
            $date = time();
            $data = array(
                'message' => $message,
                'date' => $date,
                'recipient' => $recipient
            );
            $this->sms_model->insertSms($data);
            $this->session->set_flashdata('feedback', 'Message Sent');
        } else {
            $this->session->set_flashdata('feedback', 'Message Failed');
        }
        redirect('volunteer');
    }

    function sendSmsTeamWise() {
        $team_id = $this->input->post('team_id');
        $userId = $this->ion_auth->get_user_id();
        $volunteers = $this->volunteer_model->getVolunteer();

        $teamdetails = $this->team_model->getTeamById($team_id);
        $members = $teamdetails->members;
        $members = explode(',', $members);

        $smsSettings = $this->sms_model->getSmsSettingsById($userId);
        $username = $smsSettings->username;
        $password = $smsSettings->password;
        $api_id = $smsSettings->api_id;

        foreach ($members as $member) {
            foreach ($volunteers as $volunteer) {
                if ($volunteer->id == $member) {
                    $to[] = $volunteer->phone;
                }
            }
        }
        if (!empty($to)) {
            $to = implode(',', $to);
            $message = $this->input->post('message');
            // $message = urlencode("Test Message");
            file_get_contents('https://api.clickatell.com/http/sendmsg?user=' . $username . '&password=' . $password . '&api_id=' . $api_id . '&to=' . $to . '&text=' . $message);
            $this->session->set_flashdata('feedback', 'Message Sent');
        } else {
            $this->session->set_flashdata('feedback', 'Message Failed');
        }
        redirect('sms/sendView');
    }

    function sendAllTeam() {
        $userId = $this->ion_auth->get_user_id();
        $teams = $this->team_model->getVolunteer();
        $smsSettings = $this->sms_model->getSmsSettingsById($userId);
        $username = $smsSettings->username;
        $password = $smsSettings->password;
        $api_id = $smsSettings->api_id;
        foreach ($teams as $team) {
            $to[] = $volunteer->phone;
        }
        if (!empty($to)) {
            $to = implode(',', $to);
            $message = $this->input->post('message');
            file_get_contents('https://api.clickatell.com/http/sendmsg?user=' . $username . '&password=' . $password . '&api_id=' . $api_id . '&to=' . $to . '&text=' . $message);
            $this->session->set_flashdata('feedback', 'Message Sent');
        } else {
            $this->session->set_flashdata('feedback', 'Message Failed');
        }
        redirect('sms/sendView');
    }

    function send() {
        $userId = $this->ion_auth->get_user_id();
        $is_v_v = $this->input->post('radio');
        $smsSettings = $this->sms_model->getSmsSettingsById($userId);
        $username = $smsSettings->username;
        $password = $smsSettings->password;
        $api_id = $smsSettings->api_id;

        if ($is_v_v == 'allpatient') {
            $patients = $this->patient_model->getpatient();
            foreach ($patients as $patient) {
                $to[] = $patient->phone;
            }
            $recipient = 'All Patient';
        }

        if ($is_v_v == 'alldoctor') {
            $doctors = $this->doctor_model->getDoctor();
            foreach ($doctors as $doctor) {
                $to[] = $doctor->phone;
            }
            $recipient = 'All Doctor';
        }

        if ($is_v_v == 'bloodgroupwise') {
            $blood_group = $this->input->post('bloodgroup');
            $donors = $this->donor_model->getDonor();
            foreach ($donors as $donor) {
                if ($donor->group == $blood_group) {
                    $to[] = $donor->phone;
                }
            }
            $recipient = 'All Blood Donors With Blood Group ' . $blood_group;
        }


        if ($is_v_v == 'single_patient') {
            $patient = $this->input->post('patient');

            $patient_detail = $this->patient_model->getPatientById($patient);
            $single_patient_phone = $patient_detail->phone;
            $recipient = 'Patient Id: ' . $patient_detail->id . '<br> Patient Name: ' . $patient_detail->name . '<br> Patient Phone: ' . $patient_detail->phone;
        }

        if (!empty($single_patient_phone)) {
            $to = $single_patient_phone;
        } else {
            if (!empty($to)) {
                $to = implode(',', $to);
            }
        }
        // $message = urlencode("Test Message");
        if (!empty($to)) {
            $message = $this->input->post('message');
            file_get_contents('https://api.clickatell.com/http/sendmsg?user=' . $username . '&password=' . $password . '&api_id=' . $api_id . '&to=' . $to . '&text=' . $message);
            $data = array();
            $date = time();
            $data = array(
                'message' => $message,
                'date' => $date,
                'recipient' => $recipient,
                'user' => $this->ion_auth->get_user_id()
            );
            $this->sms_model->insertSms($data);
            $this->session->set_flashdata('feedback', 'Message Sent');
        } else {
            $this->session->set_flashdata('feedback', 'Not Sent');
        }
        redirect('sms/sendView');
    }

    function sent() {
        if ($this->ion_auth->in_group(array('admin'))) {
            $data['sents'] = $this->sms_model->getSms();
        } else {
            $current_user_id = $this->ion_auth->user()->row()->id;
            $data['sents'] = $this->sms_model->getSmsByUser($current_user_id);
        }

        $this->load->view('home/dashboard');
        $this->load->view('sms', $data);
        $this->load->view('home/footer');
    }

}

/* End of file profile.php */
/* Location: ./application/modules/profile/controllers/profile.php */
