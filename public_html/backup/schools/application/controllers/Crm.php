<?php

/**
 * @property Panel_model $panel_model Panel Model
 * @property Common_model $common_model Common Model
 * @property Profile_model $profile_model Profile Model
 * @property Admin_model $admin_model Administrator Model
 * User: Dell
 * Date: 10/10/2015
 * Time: 3:56 PM
 */
class Crm extends CI_Controller
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
        $this->load->model("common_model");
        $this->load->model("profile_model");
        $this->load->model("panel_model");
        $this->load->model("admin_model");
        $this->load->library(array('ion_auth', 'form_validation', 'upload', 'initial', 'datatables'));

        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login', 'refresh');
        }
    }

    public function allmycontacts_dt()
    {
        $this->data['title'] = "My Contacts";
        if ($this->ion_auth->logged_in()) {
            $this->data['userInformation'] = $this->ion_auth->user()->row();
        }
        $this->data['userid'] = $this->data['userInformation']->id;
        $this->data['loggedinuserinformation'] = $this->basic_information_of_mine($this->data['userInformation']->id);
        $this->data['userinformation'] = $this->basic_information_of_mine($this->data['userid']);
        $this->data['personalinformation'] = $this->personal_information_of_mine($this->data['userid']);

        $this->load->view('administrator/layouts/header', $this->data);
        $this->load->view('administrator/contacts', $this->data);
        $this->load->view('layouts/footer', $this->data);
    }

    public function addressbook_dt()
    {
        $this->data['title'] = "My Uploaded Contacts";
        if ($this->ion_auth->logged_in()) {
            $this->data['userInformation'] = $this->ion_auth->user()->row();
        }
        $this->data['loggedinuserinformation'] = $this->basic_information_of_mine($this->data['userInformation']->id);
        $this->data['userid'] = $this->data['userInformation']->id;
        $this->data['userinformation'] = $this->basic_information_of_mine($this->data['userid']);
        $this->data['personalinformation'] = $this->personal_information_of_mine($this->data['userid']);

        $this->load->view('layouts/header', $this->data);
        $this->load->view('administrator/addressbook', $this->data);
        $this->load->view('layouts/footer', $this->data);
    }

    public function crm_functionality()
    {
        $this->data['title'] = "My Contacts";
        if ($this->ion_auth->logged_in()) {
            $this->data['userInformation'] = $this->ion_auth->user()->row();
        }
        $this->data['loggedinuserinformation'] = $this->basic_information_of_mine($this->data['userInformation']->id);
        $this->data['userid'] = $this->data['userInformation']->id;

        $this->data['interests'] = array(
            '0' => 'No Disposition',
            '1' => '25%',
            '2' => '50%',
            '3' => '75%',
            '4' => '100%'
        );

        $uri2 = $this->uri->segment(2);
        if (isset($uri2)) {
            $this->data['singlecontact'] = $this->get_single_address_by_id($uri2);
            $this->data['contact'] = (isset($this->data['singlecontact'][0]) ? $this->data['singlecontact'][0] : '');
            $this->data['callhistory'] = $this->get_single_call_history_by_id((isset($this->data['contact']['AddressId']) ? $this->data['contact']['AddressId'] : ''));
            $this->data['biodata'] = $this->common_model->get_user_single_informations_by_user_id($this->data['contact']['AddressId']);
        }
        $this->data['contacts'] = $this->admin_model->getMyUploadedContacts();
        $this->data['totalcontacts'] = $this->admin_model->getMyUploadedContactsTotal();
        $tomorrow = $this->upcomming_schedules_tomorrow(1);
        $this->data['tommorrow'] = (isset($tomorrow) ? $tomorrow : 'You don\'t have you schedules today and tomorrow.');
        $nextweek = $this->upcomming_schedules_nextweek(7);
        $this->data['nextweek'] = (isset($nextweek) ? $nextweek : 'You don\'t have you schedules next week.');
        //owndebugger($this->data['tommorrow']);
        //owndebugger($this->data['nextweek']);
        $this->data['userinformation'] = $this->basic_information_of_mine($this->data['userid']);
        $this->data['personalinformation'] = $this->personal_information_of_mine($this->data['userid']);

        $this->load->view('layouts/header', $this->data);
        $this->load->view('administrator/crm', $this->data);
        $this->load->view('layouts/footer', $this->data);
    }

    public function get_addresses()
    {
        $this->data['title'] = "Search Results";

        if ($this->ion_auth->logged_in()) {
            $this->data['userInformation'] = $this->ion_auth->user()->row();
        }
        $this->data['loggedinuserinformation'] = $this->basic_information_of_mine($this->data['userInformation']->id);
        $this->data['userid'] = $this->data['userInformation']->id;
        $uri2 = $this->uri->segment(2);
        if (isset($uri2)) {
            $this->data['contacts'] = $this->admin_model->getAddresses($uri2);
            $this->load->view('administrator/crm', $this->data);
        }
    }

    public function insert_message()
    {
        $this->data['title'] = "Send Internal Message";

        if ($this->ion_auth->logged_in()) {
            $this->data['userInformation'] = $this->ion_auth->user()->row();
        }
        $this->data['loggedinuserinformation'] = $this->basic_information_of_mine($this->data['userInformation']->id);
        $this->data['userid'] = $this->data['userInformation']->id;

        $addressbookid = $this->input->post('addressbookid');
        $contact = $this->input->post('phonenumber');
        $othernotes = $this->input->post('message');

        if ($addressbookid !== 'none') {
            $data = array(
                'from' => $this->data['userid'],
                'to' => $addressbookid,
                'message' => $othernotes,
                'time' => datetoint(__now())
            );

            $this->results = $this->admin_model->insertMessage($data);
            sendSms($othernotes, $contact);

            if ($this->results) {
                $this->status['status'] = 1;
                $this->status['msg'] = 'Well done!';
            } else {
                $this->status['status'] = 0;
                $this->status['msg'] = 'Sorry! Action failed';
            }
            echo jsonEncode($this->status);
        } else {
            $this->status['status'] = 0;
            $this->status['msg'] = 'Sorry! Action failed';
            echo jsonEncode($this->status);
        }
    }

    public function insert_call_history()
    {
        $this->data['title'] = "Call History";

        if ($this->ion_auth->logged_in()) {
            $this->data['userInformation'] = $this->ion_auth->user()->row();
        }
        $this->data['loggedinuserinformation'] = $this->basic_information_of_mine($this->data['userInformation']->id);
        $this->data['userid'] = $this->data['userInformation']->id;

        $addressbookid = $this->input->post('addressbookid');
        $nextcalldate = datetoint($this->input->post('nextcalldate'));
        $interestsrate = $this->input->post('interestsrate');
        $othernotes = $this->input->post('othernotes');

        if ($addressbookid !== 'none') {
            $data = array(
                'AddressBookId' => $addressbookid,
                'CalledBy' => $this->data['userid'],
                'NextCallDate' => $nextcalldate,
                'Interests' => $interestsrate,
                'OtherNotes' => $othernotes,
                'CallTime' => datetoint(__now()),
                'AddedDate' => datetoint(__now())
            );

            $this->results = $this->admin_model->insertCallHistory($data);
            if ($this->results) {
                $this->status['status'] = 1;
                $this->status['msg'] = 'Well done!';
            } else {
                $this->status['status'] = 0;
                $this->status['msg'] = 'Sorry! Action failed';
            }
            echo jsonEncode($this->status);
        } else {
            $this->status['status'] = 0;
            $this->status['msg'] = 'Sorry! Action failed';
            echo jsonEncode($this->status);
        }

    }

    public function get_my_contacts_by_ajax()
    {
        if ($this->ion_auth->logged_in()) {
            $this->data['userInformation'] = $this->ion_auth->user()->row();
        }
        $this->data['loggedinuserinformation'] = $this->basic_information_of_mine($this->data['userInformation']->id);
        $this->data['userid'] = $this->data['userInformation']->id;
        echo $this->admin_model->getAllMyContacts($this->data['userid']);
    }

    public function get_my_uploaded_contacts_by_ajax()
    {
        if ($this->ion_auth->logged_in()) {
            $this->data['userInformation'] = $this->ion_auth->user()->row();
        }
        $this->data['loggedinuserinformation'] = $this->basic_information_of_mine($this->data['userInformation']->id);
        $this->data['userid'] = $this->data['userInformation']->id;
        echo $this->admin_model->getAllMyUploadedContacts($this->data['userid']);
    }

    public function delete_contact()
    {
        $this->id = $this->uri->segment(2);
        if ($this->id) {
            $this->where = array('ContactId' => $this->id);
            $this->isDelete = $this->admin_model->deleteContact($this->where);
            if ($this->isDelete) {
                $this->status['status'] = 1;
                $this->status['msg'] = "Contact has been deleted.";
            } else {
                $this->status['status'] = 0;
                $this->status['msg'] = "Sorry! Action failed";
            }
        } else {
            $this->status['status'] = 0;
            $this->status['msg'] = "Sorry! Action failed";
        }

        /* ajax response */
        echo jsonEncode($this->status);
    }

    public function delete_uploaded_contact()
    {
        $this->id = $this->uri->segment(2);
        if ($this->id) {
            $this->where = array('AddressId' => $this->id);
            $this->isDelete = $this->admin_model->deleteUploadedContact($this->where);
            if ($this->isDelete) {
                $this->status['status'] = 1;
                $this->status['msg'] = "Contact has been deleted.";
            } else {
                $this->status['status'] = 0;
                $this->status['msg'] = "Sorry! Action failed";
            }
        } else {
            $this->status['status'] = 0;
            $this->status['msg'] = "Sorry! Action failed";
        }

        /* ajax response */
        echo jsonEncode($this->status);
    }

    public function add_to_crm()
    {
        if ($this->ion_auth->logged_in()) {
            $this->data['userInformation'] = $this->ion_auth->user()->row();
        }
        $this->data['loggedinuserinformation'] = $this->basic_information_of_mine($this->data['userInformation']->id);
        $this->data['userid'] = $this->data['userInformation']->id;
        if ($this->input->post('Connector') == 'none') {
            $data1 = array(
                'SingleItemId' => $this->input->post('SingleItemId'),
                'ReceiverId' => $this->input->post('PostedBy'),
                'SenderId' => $this->data['userid'],
                'AddedDate' => datetoint(__now()),
                'isApproved' => $this->input->post('IsApproved'),
                'ModulesId' => $this->input->post('ModulesId')
            );

            $this->results = $this->admin_model->insertContacts($data1);
            $this->results = $this->admin_model->insertContactsConnectivity($data1);
        } else {
            $data = array(
                'SingleItemId' => $this->input->post('SingleItemId'),
                'ReceiverId' => $this->input->post('PostedBy'),
                'SenderId' => $this->data['userid'],
                'AddedDate' => datetoint(__now()),
                'isApproved' => $this->input->post('IsApproved'),
                'ModulesId' => $this->input->post('ModulesId')
            );

            $this->results = $this->admin_model->insertContacts($data);
        }

        if ($this->results) {
            $this->status['status'] = 1;
            $this->status['msg'] = 'Well done!';
        } else {
            $this->status['status'] = 0;
            $this->status['msg'] = 'Sorry! Action failed';
        }
        echo jsonEncode($this->status);
    }

    public function upcomming_schedules_tomorrow($diffdays)
    {
        return $this->admin_model->getUpcomingSchedulesTomorrow($diffdays);
    }

    public function upcomming_schedules_nextweek($diffdays)
    {
        return $this->admin_model->getUpcomingSchedulesNextWeek($diffdays);
    }

    public function get_single_address_by_id($aid)
    {
        return $this->admin_model->getSingleAddressById($aid);
    }

    public function get_single_call_history_by_id($cid)
    {
        return $this->admin_model->getCallHistoryById($cid);
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