<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @property Uploader $uploader Uploader Class Library
 * @property Common_model $common_model Uploader Class Library
 * @property Profile_model $profile_model Profile Class Library
 * @property ion_auth_model $ion_auth_model ion_auth_model Library
 * @property Settings_model $settings_model ion_auth_model Library
 */
class Settings extends MY_Controller
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
        $this->data['loggedinuserinformation'] = $this->basic_information_of_mine($this->data['userInformation']->id);
        $this->data['userid'] = $this->data['userInformation']->id;
        $settings = $this->settings_model->getSystemSettings();
        $this->data['sys_settings'] = $settings[0];

        $this->data['title'] = "Settings";

        $this->load->view('layouts/header', $this->data);
        $this->load->view('settings/system_settings', $this->data);
        $this->load->view('layouts/footer', $this->data);
    }

    public function admin_system_settings()
    {

        if ($this->ion_auth->logged_in()) {
            $this->data['userInformation'] = $this->ion_auth->user()->row();
        }
        $this->data['loggedinuserinformation'] = $this->basic_information_of_mine($this->data['userInformation']->id);
        $this->data['userid'] = $this->data['userInformation']->id;
        $settings = $this->settings_model->getSystemSettings();
        $this->data['sys_settings'] = $settings[0];

        $this->data['title'] = "Admin Settings";

        $this->load->view('layouts/header', $this->data);
        $this->load->view('settings/admin_system_settings', $this->data);
        $this->load->view('layouts/footer', $this->data);
    }

    public function modify_admin_system_settings()
    {
        if ($this->ion_auth->logged_in()) {
            $this->data['userInformation'] = $this->ion_auth->user()->row();
        }
        $this->data['loggedinuserinformation'] = $this->basic_information_of_mine($this->data['userInformation']->id);
        $this->data['userid'] = $this->data['userInformation']->id;

        $config['upload_path'] = "uploads/settings";
        $config['allowed_types'] = "gif|jpg|jpeg|png";
        $config['max_size'] = "5000";
        $config['max_width'] = "1907";
        $config['max_height'] = "1280";
        //$this->load->library('upload', $config);
        $this->upload->initialize($config);
        /** Above Code for Upload File Initializer **/

        /** File If:Else Condition **/
        if (isset($this->data['userid'])) {
            if ($_FILES["admin_photo"]["error"] == 4) {
                $institute_logo = $this->input->post('admin_photo');
            } else {
                $this->upload->do_upload('admin_photo');
                $institute_logo = $this->upload->data();
            }
            if ($_FILES["admin_sign"]["error"] == 4) {
                $institute_logo2 = $this->input->post('admin_sign');
            } else {
                $this->upload->do_upload('admin_sign');
                $institute_logo2 = $this->upload->data();
            }

            $data = array(
                'SettingsId' => $this->input->post('settingsid'),
                'AdminName' => $this->input->post('adminname'),
                'AdminPhone' => $this->input->post('adminphone'),
                'AdminEmail' => $this->input->post('adminemail'),
                'AdminPhoto' => (isset($institute_logo['file_name']) ? $institute_logo['file_name'] : $institute_logo),
                'AdminSign' => (isset($institute_logo2['file_name']) ? $institute_logo2['file_name'] : $institute_logo2),
                'AdminMessage' => $this->input->post('adminmessage')
            );

          //  owndebugger($data);exit;

            if ($this->input->post('settingsid') == 'none') {
                $this->results = $this->settings_model->insertSystemSettings($data);
            } else {
                $where = array('SettingsId' => $this->input->post('settingsid'));
                $this->results = $this->settings_model->updateSystemSettings($data, $where);
            }

            if ($this->results) {
                $this->status['status'] = 1;
                $this->status['msg'] = 'Well done!';
            } else {
                $this->status['status'] = 0;
                $this->status['msg'] = 'Oh snap! Change a few things up and try submitting again.';
            }
            echo jsonEncode($this->status);
        } else {
            $this->status['status'] = 0;
            $this->status['msg'] = $this->upload->display_errors();
            echo jsonEncode($this->status);
        }
    }

    public function modify_system_settings()
    {
        if ($this->ion_auth->logged_in()) {
            $this->data['userInformation'] = $this->ion_auth->user()->row();
        }
        $this->data['loggedinuserinformation'] = $this->basic_information_of_mine($this->data['userInformation']->id);
        $this->data['userid'] = $this->data['userInformation']->id;

        $config['upload_path'] = "uploads/settings";
        $config['allowed_types'] = "gif|jpg|jpeg|png";
        $config['max_size'] = "5000";
        $config['max_width'] = "1907";
        $config['max_height'] = "1280";
        //$this->load->library('upload', $config);
        $this->upload->initialize($config);
        /** Above Code for Upload File Initializer **/

        /** File If:Else Condition **/
        if (isset($this->data['userid'])) {
            if ($_FILES["institute_logo"]["error"] == 4) {
                $institute_logo = $this->input->post('institute_logo');
            } else {
                $this->upload->do_upload('institute_logo');
                $institute_logo = $this->upload->data();
            }

            $theme = $this->input->post('theme');
            $data = array(
                'SettingsId' => $this->input->post('settingsid'),
                'InstituteName' => $this->input->post('institutename'),
                'InstituteName_en' => $this->input->post('InstituteName_en'),
                'InstituteEIIN_en' => $this->input->post('InstituteEIIN_en'),
                'InstituteAddress_en' => $this->input->post('InstituteAddress_en'),
                'InstituteSlogan' => $this->input->post('instituteslogan'),
                'InstituteEstablished' => $this->input->post('instituteestablished'),
                'InstituteEIIN' => $this->input->post('instituteeiin'),
                'InstituteIsMPO' => $this->input->post('instituteismpo'),
                'InstituteLogo' => (isset($institute_logo['file_name']) ? $institute_logo['file_name'] : $institute_logo),
                'InstituteHeader' => $this->input->post('instituteismpo'),
                'InstituteAddress' => $this->input->post('instituteaddress'),
                'InstitutePhone' => $this->input->post('institutephone'),
                'InstituteEmail' => $this->input->post('instituteemail'),
                'InstituteWebsite' => $this->input->post('institutewebsite'),
                'InstituteKeywords' => $this->input->post('institutekeywords'),
                'InstituteTime' => $this->input->post('institutetime'),
                'InstituteGoogleMaps' => $this->input->post('institutegooglemaps'),
                'ShortInformation' => $this->input->post('shortinformation'),
                'SelectedTheme' => (isset($theme) ? $theme : 'blue')
            );

            if ($this->input->post('settingsid') == 'none') {
                $this->results = $this->settings_model->insertSystemSettings($data);
            } else {
                $where = array('SettingsId' => $this->input->post('settingsid'));
                $this->results = $this->settings_model->updateSystemSettings($data, $where);
            }

            if ($this->results) {
                $this->status['status'] = 1;
                $this->status['msg'] = 'Well done!';
            } else {
                $this->status['status'] = 0;
                $this->status['msg'] = 'Oh snap! Change a few things up and try submitting again.';
            }
            echo jsonEncode($this->status);
        } else {
            $this->status['status'] = 0;
            $this->status['msg'] = $this->upload->display_errors();
            echo jsonEncode($this->status);
        }
    }

    public function block_manager()
    {
        if ($this->ion_auth->logged_in()) {
            $this->data['userInformation'] = $this->ion_auth->user()->row();
        }
        $this->data['loggedinuserinformation'] = $this->basic_information_of_mine($this->data['userInformation']->id);
        $uri2 = $this->uri->segment(2);
        //owndebugger($uri2);
        if (isset($uri2)) {
            $this->data['blockinfomation1'] = $this->get_block_by_id($uri2);
            $this->data['blockinfomation'] = $this->data['blockinfomation1'][0];
        }
        $this->data['userid'] = $this->data['userInformation']->id;
        $this->data['blocks'] = $this->get_all_blocks();
        //owndebugger($this->data['blocks']);
        $this->data['title'] = "Blocks Manager";

        $this->load->view('layouts/header', $this->data);
        $this->load->view('settings/blockmanager', $this->data);
        $this->load->view('layouts/footer', $this->data);

    }

    public function add_new_block()
    {
        if ($this->ion_auth->logged_in()) {
            $this->data['userInformation'] = $this->ion_auth->user()->row();
        }
        $this->data['loggedinuserinformation'] = $this->basic_information_of_mine($this->data['userInformation']->id);
        //$uri2 = $this->input->post('userid');
        $this->data['userid'] = $this->data['userInformation']->id;

        $this->data['title'] = "Add new block";

        $blockid = $this->input->post('blockid');
        //owndebugger($blockid);
        $blockuniqueid = $this->input->post('blockuniqueid');
        $data = array(
            'BlockUniqueId' => (isset($blockuniqueid) ? $blockuniqueid : rand(5, 9)),
            'BlockTitle' => $this->input->post('blockname'),
            'TitleClasses' => $this->input->post('blockclasses'),
            'WidgetPosition' => $this->input->post('blockposition'),
            'BlockContent' => $this->input->post('blockcontent'),
            'isActive' => $this->input->post('block_is_active')
        );

        if ($blockid == 'none') {
            $this->results = $this->settings_model->insertBlock($data);
        } else {
            $where = array('BlockId' => $blockid);
            $this->results = $this->settings_model->updateBlock($data, $where);
        }

        if ($this->results) {
            $this->status['status'] = 1;
            $this->status['msg'] = 'Well done!';
        } else {
            $this->status['status'] = 0;
            $this->status['msg'] = 'Oh snap! Change a few things up and try submitting again.';
        }
        echo jsonEncode($this->status);
    }

    public function delete_block()
    {
        $uri2 = $this->uri->segment(2);
        if ($uri2) {
            $this->where = array('BlockId' => $uri2);
            $this->isDelete = $this->settings_model->deleteBlock($this->where);
            if ($this->isDelete) {
                $this->status['status'] = 1;
                $this->status['msg'] = "Widget has been deleted.";
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

    public function add_class_form()
    {

        if ($this->ion_auth->logged_in()) {
            $this->data['userInformation'] = $this->ion_auth->user()->row();
        }
        $this->data['loggedinuserinformation'] = $this->basic_information_of_mine($this->data['userInformation']->id);
        $this->data['userid'] = $this->data['userInformation']->id;
        $this->data['title'] = "Settings";

        $this->load->view('layouts/header', $this->data);
        $this->load->view('settings/addclass', $this->data);
        $this->load->view('layouts/footer', $this->data);

    }

    public function add_class()
    {

        if ($this->ion_auth->logged_in()) {
            $this->data['userInformation'] = $this->ion_auth->user()->row();
        }
        $this->data['loggedinuserinformation'] = $this->basic_information_of_mine($this->data['userInformation']->id);
        $this->data['userid'] = $this->data['userInformation']->id;
        $data = array(
            'classname' => $this->input->post('classname'),
            'classdescription' => $this->input->post('classdescription'),
            'isActive' => 1
        );

        $this->results = $this->settings_model->insertClass($data);

        if ($this->results) {
            $this->status['status'] = 1;
            $this->status['msg'] = 'Well done!';
        } else {
            $this->status['status'] = 0;
            $this->status['msg'] = 'Oh snap! Change a few things up and try submitting again.';
        }
        echo jsonEncode($this->status);
    }

    public function get_all_blocks()
    {
        return $this->settings_model->getBlocks();
    }

    public function get_block_by_id($id)
    {
        return $this->settings_model->getBlock($id);
    }
}
