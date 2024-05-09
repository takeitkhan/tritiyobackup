<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @property Uploader $uploader Uploader Class Library
 * @property Common_model $common_model Uploader Class Library
 * @property Profile_model $profile_model Profile Class Library
 * @property ion_auth_model $ion_auth_model ion_auth_model Library
 */
class ProfileEditor extends MY_Controller
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
        $this->data['title'] = "Overview";

        $uri2 = $this->uri->segment(2);
        if (isset($uri2)) {
            $this->data['userid'] = $this->uri->segment(2);
            $this->data['groupid'] = $this->get_group_id($this->data['userid']);
        } else {
            $this->data['userid'] = $this->data['userInformation']->id;
            $this->data['groupid'] = $this->get_group_id($this->data['userid']);
        }
        $this->data['biodata'] = $this->common_model->get_user_single_informations_by_user_id($this->data['userid']);
        $this->data['userinformation'] = $this->basic_information_of_mine($this->data['userid']);
        $this->data['modifyuserid'] = $this->get_group_id($this->data['userid']);

        $groupinfos = $this->get_group_name($this->data['userid']);
        $this->data['groupname'] = $groupinfos->name;
        $this->data['personalinformation'] = $this->personal_information_of_mine($this->data['userid']);
        //owndebugger($this->data['personalinformation']);
        $this->data['educationhistory'] = $this->education_of_mine($this->data['userid']);
        $this->data['workhistory'] = $this->history_of_work($this->data['userid']);
        $this->data['businesses'] = $this->businesses_of_mine($this->data['userid']);
        $this->data['country'] = $this->profile_model->getCountryById((isset($this->data['personalinformation']->CountryId) ? $this->data['personalinformation']->CountryId : 240));

        $this->load->view('layouts/header', $this->data);
        $this->load->view('profile/overview', $this->data);
        $this->load->view('layouts/footer', $this->data);
    }

    public function if_user_exists()
    {
        if (isset($_GET['userpage']) == true) {
            $newportalurl = $this->uri->segment(2);
        }

        $thanks = $this->profile_model->checkNewPortalUrl($newportalurl);
        //owndebugger($thanks);
        if ($thanks == 1) {
            $this->status['status'] = 1;
            $this->status['msg'] = 1;
            echo jsonEncode($this->status);
        } else {
            $this->status['status'] = 0;
            $this->status['msg'] = 'User does not exists';
            echo jsonEncode($this->status);
        }
    }

    public function users_information()
    {
        if ($this->ion_auth->logged_in()) {
            $this->data['userInformation'] = $this->ion_auth->user()->row();
        }
        $this->data['loggedinuserinformation'] = $this->basic_information_of_mine($this->data['userInformation']->id);
        $this->data['loggedinuserid'] = $this->data['userInformation']->id;
        $this->data['loggedinusergroupid'] = $this->get_group_id($this->data['loggedinuserid']);
        $this->data['gender'] = $this->gender_get(7);
        $this->data['enrollment'] = $this->common_model->get_settings(10);
        //owndebugger($this->data['loggedinusergroupid']);
        if ($this->data['loggedinusergroupid'] != 1) {
            redirect('dashboard');
        } else {
            $uri2 = $this->uri->segment(2);
            if (isset($uri2)) {
                $this->data['userid'] = $this->uri->segment(2);
                $this->data['groupid'] = $this->get_group_id($this->data['userid']);
            } else {
                $this->data['userid'] = $this->data['userInformation']->id;
                $this->data['groupid'] = $this->get_group_id($this->data['userid']);
            }

            //owndebugger($this->data['loggedinusergroupid']);

            $this->data['userinformation'] = $this->basic_information_of_mine($this->data['userid']);
            $this->data['modifyuserid'] = $this->get_group_id($this->data['userid']);
            $groupinfos = $this->get_group_name($this->data['userid']);
            $this->data['groupname'] = $groupinfos->name;
            $this->data['title'] = 'Basic Information';
            $this->load->view('layouts/header', $this->data);
            $this->load->view('profile/basicinformation', $this->data);
            $this->load->view('layouts/footer', $this->data);
        }
    }

    public function delete_an_user()
    {
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
                $this->data['groupid'] = $this->get_group_id($this->data['userid']);
            } else {
                $this->data['userid'] = $this->data['userInformation']->id;
                $this->data['groupid'] = $this->get_group_id($this->data['userid']);
            }
            $this->data['title'] = 'Delete An User';
            $this->load->view('layouts/header', $this->data);
            $this->load->view('profile/deleteanuser', $this->data);
            $this->load->view('layouts/footer', $this->data);
        }
    }

    /** Modifications * */
    public function modify_basic_information()
    {
        if ($this->ion_auth->logged_in()) {
            $this->data['userInformation'] = $this->ion_auth->user()->row();
        }
        $this->data['loggedinuserinformation'] = $this->basic_information_of_mine($this->data['userInformation']->id);
        $this->data['loggedinuserid'] = $this->data['userInformation']->id;
        $this->data['loggedinusergroupid'] = $this->get_group_id($this->data['loggedinuserid']);

        $this->data['gender'] = $this->gender_get(7);
        $this->data['enrollment'] = $this->common_model->get_settings(10);
        //owndebugger($this->data['loggedinusergroupid']);
        if ($this->data['loggedinusergroupid'] != 1) {
            redirect('dashboard');
        } else {
            $uri2 = $this->input->post('userid');
            $this->data['userid'] = $this->data['userInformation']->id;
            $this->data['modifyuserid'] = $this->get_group_id($this->data['userid']);
            $groupinfos = $this->get_group_name($this->data['userid']);
            $this->data['groupname'] = $groupinfos->name;
            $data = array(
                'phone' => $this->input->post('phone'),
                'full_name_bn' => $this->input->post('full_name_bn'),
                'full_name_en' => $this->input->post('full_name_en'),
                'father_name_bn' => $this->input->post('father_name_bn'),
                'father_name_en' => $this->input->post('father_name_en'),
                'mother_name_bn' => $this->input->post('mother_name_bn'),
                'mother_name_en' => $this->input->post('mother_name_en')
            );
            $where = array('id' => ((isset($uri2) ? $uri2 : $this->data['userid'])));
            //primary way
            $this->results = $this->profile_model->updateBasicInformation($data, $where);

            if($this->input->post('fphone') == 1) {
                $phonenumber = $this->input->post('phone');
            } else {
                $phonenumber = '';
            }

            if($this->input->post('setguardian') == 1) {
                $data1 = array(
                    'phone' => $phonenumber,
                    'full_name_bn' => $this->input->post('father_name_bn'),
                    'full_name_en' => $this->input->post('father_name_en'),
                    'father_name_bn' => 'N/A',
                    'father_name_en' => 'N/A',
                    'mother_name_bn' => 'N/A',
                    'mother_name_en' => 'N/A'
                );
                $where = array('id' => ((isset($uri2) ? $uri2 . '5' : $this->data['userid'])));
                //primary way
                $this->results = $this->profile_model->updateBasicInformation($data1, $where);
            } else if($this->input->post('setguardian') == 2) {
                $data1 = array(
                    'phone' => $phonenumber,
                    'full_name_bn' => $this->input->post('mother_name_bn'),
                    'full_name_en' => $this->input->post('mother_name_en'),
                    'father_name_bn' => 'N/A',
                    'father_name_en' => 'N/A',
                    'mother_name_bn' => 'N/A',
                    'mother_name_en' => 'N/A'
                );
                $where = array('id' => ((isset($uri2) ? $uri2 . '5' : $this->data['userid'])));
                //primary way
                $this->results = $this->profile_model->updateBasicInformation($data1, $where);
            }
            //secondary way
            //$this->results = $this->common_model->updateRecords($this->common_model->_usersTable, $data, $where);

            if ($this->results) {
                $this->status['status'] = 1;
                $this->status['msg'] = 'Well done!';
            } else {
                $this->status['status'] = 0;
                $this->status['msg'] = 'Oh snap! Change a few things up and try submitting again.';
            }
            echo jsonEncode($this->status);
        }
    }

    public function personal_information()
    {
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
                $this->data['groupid'] = $this->get_group_id($this->data['userid']);
            } else {
                $this->data['userid'] = $this->data['userInformation']->id;
                $this->data['groupid'] = $this->get_group_id($this->data['userid']);
            }
            $this->data['userinformation1'] = $this->basic_information_of_mine($this->data['userid']);
            $this->data['userinformation'] = $this->personal_information_of_mine($this->data['userid']);
            $this->data['countries'] = $this->common_model->get_countries();
            $this->data['gender'] = $this->gender_get(7);
            $this->data['adultgender'] = $this->gender_get(11);
            $this->data['districts'] = $this->common_model->get_districts();
            //$this->data['upazilas'] = $this->get_upazila(17);
            $this->data['upazilas'] = $this->common_model->get_upazillas(17);
            $this->data['enrollment'] = $this->common_model->get_settings(10);
            $this->data['religions'] = $this->common_model->get_settings(12);
            $this->data['bloodgroups'] = $this->common_model->get_settings(13);
            $this->data['modifyuserid'] = $this->get_group_id($this->data['userid']);
            $groupinfos = $this->get_group_name($this->data['userid']);
            $this->data['groupname'] = $groupinfos->name;
            $this->data['title'] = 'Personal Information';

            $this->load->view('layouts/header', $this->data);
            $this->load->view('profile/personalinformation', $this->data);
            $this->load->view('layouts/footer', $this->data);
        }
    }

    /** Modification Personal Information * */
    public function modify_personal_information()
    {
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
            $this->data['userid'] = $this->data['userInformation']->id;
            $uri2 = $this->input->post('userid');
            //$dateofbirth = datetoint($this->input->post('dateofbirth'));
            $dateofbirth = $this->input->post('dateofbirth');
            $joindate = datetoint($this->input->post('joindate'));
            $config['upload_path'] = "uploads/pp";
            $config['allowed_types'] = "gif|jpg|jpeg|png";
            $config['max_size'] = "5000";
            $config['max_width'] = "1907";
            $config['max_height'] = "1280";
            //$this->load->library('upload', $config);
            $this->upload->initialize($config);
            /** Above Code for Upload File Initializer * */
            /** File If:Else Condition * */
            if (isset($this->data['userid'])) {
                if ($_FILES["userfile"]["error"] == 4) {
                    $pp = $this->input->post('userphoto');
                } else {
                    $this->upload->do_upload('userfile');
                    $profilephoto = $this->upload->data();
                }

                $data = array(
                    'UserId' => ((isset($uri2) ? $uri2 : $this->data['userid'])),
                    'Gender' => $this->input->post('gender'),
                    'UniqueNumber' => $this->input->post('uniquenumber'),
                    'BloodGroup' => $this->input->post('bloodgroup'),
                    'Religion' => $this->input->post('religion'),
                    'Upazila' => $this->input->post('upazila'),
                    'District' => $this->input->post('district'),
                    'JoinDate' => $joindate,
                    'EnrollmentStatus' => $this->input->post('enrollmentstatus'),
                    'Address' => $this->input->post('address'),
                    'CountryId' => $this->input->post('countryid'),
                    'DateOfBirth' => $dateofbirth,
                    //'UserPhoto' => (isset($profilephoto['file_name']) ? $profilephoto['file_name'] : $this->input->post('userphoto')),
                    'UserPhoto' => (isset($profilephoto['file_name']) ? $profilephoto['file_name'] : $pp),
                    'Biography' => $this->input->post('biography'),
                    'YearlyIncome' => $this->input->post('yearlyincome'),
                    'MaritalStatus' => $this->input->post('maritalstatus')
                );

                if ($this->input->post('infosid') == 'none') {
                    $this->results = $this->profile_model->insertPersonalInformation($data);
                } else {
                    $where = array('InfosId' => $this->input->post('infosid'));
                    $this->results = $this->profile_model->updatePersonalInformation($data, $where);
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
    }

//    public function upload_profile_photo()
//    {
//
//        $this->id = $this->input->post('infosid', true);
//        $this->where = array('InfosId' => $this->id);
//
//        //var_dump($this->where);
//
//        $config['upload_path'] = "uploads/pp";
//        $config['allowed_types'] = "gif|jpg|jpeg|png";
//        $config['max_size'] = "5000";
//        $config['max_width'] = "1907";
//        $config['max_height'] = "1280";
//        //$this->load->library('upload', $config);
//        $this->upload->initialize($config);
//
//        if ($this->upload->do_upload('userfile')) {
//            $profilephoto = $this->upload->data();
//            if (isset($profilephoto['file_name'])) {
//                $this->status['status'] = 1;
//                $this->status['file_name'] = $profilephoto['file_name'];
//                $this->status['msg'] = "Profile Photo Uploaded Successfully";
//            } else {
//                $this->status['status'] = 0;
//                $this->status['msg'] = "Something went wrong when saving the settings, please try again.";
//            }
//            echo jsonEncode($this->status);
//        } else {
//            echo $this->upload->display_errors();
//        }
//    }

    /** Education History * */
    public function education_history()
    {
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
                $this->data['groupid'] = $this->get_group_id($this->data['userid']);
            } else {
                $this->data['userid'] = $this->data['userInformation']->id;
                $this->data['groupid'] = $this->get_group_id($this->data['userid']);
            }
            $this->data['userinformation'] = $this->basic_information_of_mine($this->data['userid']);
            $this->data['educationhistory'] = $this->education_of_mine($this->data['userid']);
            $this->data['modifyuserid'] = $this->get_group_id($this->data['userid']);
            $groupinfos = $this->get_group_name($this->data['userid']);
            $this->data['groupname'] = $groupinfos->name;
            $this->data['title'] = "Education History";
            $this->load->view('layouts/header', $this->data);
            $this->load->view('profile/educationhistory', $this->data);
            $this->load->view('layouts/footer', $this->data);
        }
    }

    public function add_new_education()
    {
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
            $uri2 = $this->input->post('userid');
            $this->data['userid'] = $this->data['userInformation']->id;

            $this->data['title'] = "Add new education history";
            //$startdate = datetoint($this->input->post('startdate'));
            $passingyear = datetoint($this->input->post('passingyear'));

            $data = array(
                'UserId' => ((isset($uri2) ? $uri2 : $this->data['userid'])),
                'InstituteName' => $this->input->post('institutename'),
                'Degree' => $this->input->post('degree'),
                'Concentrations' => $this->input->post('concentrations'),
                'PSession' => $this->input->post('psession'),
                'Board' => $this->input->post('board'),
                'PassingYear' => $passingyear,
                'GPA' => $this->input->post('gpa'),
                'IsGraduated' => 1
                //'IsGraduated' => $this->input->post('isgraduated')
            );
            // ALTER TABLE `u_educationhistory` ADD COLUMN `PSession` VARCHAR(50) NULL DEFAULT NULL AFTER `GPA`, ADD COLUMN `PassingYear` INT(11) NULL DEFAULT NULL AFTER `PSession`, ADD COLUMN `Board` VARCHAR(50) NULL DEFAULT NULL AFTER `PassingYear`;


            $this->results = $this->profile_model->insertEducation($data);

            if ($this->results) {
                $this->status['status'] = 1;
                $this->status['msg'] = 'Well done!';
            } else {
                $this->status['status'] = 0;
                $this->status['msg'] = 'Oh snap! Change a few things up and try submitting again.';
            }
            echo jsonEncode($this->status);
        }
    }

    public function work_history()
    {
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
                $this->data['groupid'] = $this->get_group_id($this->data['userid']);
            } else {
                $this->data['userid'] = $this->data['userInformation']->id;
                $this->data['groupid'] = $this->get_group_id($this->data['userid']);
            }

            $this->data['title'] = "Work & Business History";
            $this->data['userinformation'] = $this->basic_information_of_mine($this->data['userid']);
            $this->data['workhistory'] = $this->history_of_work($this->data['userid']);
            $this->data['modifyuserid'] = $this->get_group_id($this->data['userid']);
            $groupinfos = $this->get_group_name($this->data['userid']);
            $this->data['groupname'] = $groupinfos->name;

            $this->load->view('layouts/header', $this->data);
            $this->load->view('profile/workhistory', $this->data);
            $this->load->view('layouts/footer', $this->data);
        }
    }

    public function add_new_work()
    {
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
            $uri2 = $this->input->post('userid');
            $this->data['userid'] = $this->data['userInformation']->id;

            $this->data['title'] = "Add new work history";
            $startdate = datetoint($this->input->post('startdate'));
            $enddate = datetoint($this->input->post('enddate'));

            $data = array(
                'UserId' => ((isset($uri2) ? $uri2 : $this->data['userid'])),
                'Organization' => $this->input->post('organization'),
                'Position' => $this->input->post('position'),
                'StartDate' => $startdate,
                'EndDate' => $enddate,
                'Responsibilities' => $this->input->post('responsibilities')
            );

            $this->results = $this->profile_model->insertWork($data);

            if ($this->results) {
                $this->status['status'] = 1;
                $this->status['msg'] = 'Well done!';
            } else {
                $this->status['status'] = 0;
                $this->status['msg'] = 'Oh snap! Change a few things up and try submitting again.';
            }
            echo jsonEncode($this->status);
        }
    }

    public function my_businesses()
    {
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
                $this->data['userid'] = $this->data['userInformation']->id;
            }
            $this->data['userinformation'] = $this->basic_information_of_mine($this->data['userid']);
            $this->data['businesses'] = $this->businesses_of_mine($this->data['userid']);
            $this->data['modifyuserid'] = $this->get_group_id($this->data['userid']);
            $groupinfos = $this->get_group_name($this->data['userid']);
            $this->data['groupname'] = $groupinfos->name;
            $this->data['categories'] = $this->module_based_categories(8);
            $this->data['countries'] = $this->common_model->get_countries();

            $this->data['title'] = "My Businesses";

            $this->load->view('layouts/header', $this->data);
            $this->load->view('profile/mybusinesses', $this->data);
            $this->load->view('layouts/footer', $this->data);
        }
    }

    public function add_new_business()
    {
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
            $uri2 = $this->input->post('userid');
            $this->data['userid'] = $this->data['userInformation']->id;

            $this->data['title'] = "Add new business";
            $startdate = datetoint($this->input->post('startdate'));
            $data = array(
                'UserId' => ((isset($uri2) ? $uri2 : $this->data['userid'])),
                'CateogryId' => $this->input->post('categoryid'),
                'OrganizationName' => $this->input->post('organizationname'),
                'OrganizationURL' => $this->input->post('organizationurl'),
                'OrganizationCity' => $this->input->post('organizationcity'),
                'StartDate' => $startdate,
                'Services' => $this->input->post('services'),
                'Notes' => $this->input->post('notes')
            );

            $this->results = $this->profile_model->insertBusiness($data);

            if ($this->results) {
                $this->status['status'] = 1;
                $this->status['msg'] = 'Well done!';
            } else {
                $this->status['status'] = 0;
                $this->status['msg'] = 'Oh snap! Change a few things up and try submitting again.';
            }
            echo jsonEncode($this->status);
        }
    }

    public function student_personal_information()
    {
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
                $this->data['groupid'] = $this->get_group_id($this->data['userid']);
            } else {
                $this->data['userid'] = $this->data['userInformation']->id;
                $this->data['groupid'] = $this->get_group_id($this->data['userid']);
            }
            /* $this->data['userinformation'] = $this->basic_information_of_mine($this->data['userid']);
              $this->data['userinformation'] = $this->personal_information_of_mine($this->data['userid']);
              $this->data['countries'] = $this->common_model->get_countries();
              $this->data['gender'] = $this->gender_get(7); */


            $this->data['userinformation2'] = $this->basic_information_of_mine($this->data['userid']);
            $this->data['userinformation'] = $this->student_personal_information_of_mine($this->data['userid']);
            $this->data['userinformation1'] = $this->tch_staff_academic_information_of_mine($this->data['userid']);
            $this->data['class'] = $this->common_model->get_settings(1);
            $this->data['section'] = $this->common_model->get_settings(2);
            $this->data['department'] = $this->common_model->get_settings(3);
            $this->data['group'] = $this->common_model->get_settings(6);
            //$this->data['designations'] = $this->common_model->get_settings(14);
           //$user_type = $this->ion_auth->get_users_groups(201634286)->row();

           
            if($this->data['groupid'] == 3){
               // owndebugger($this->data['groupid']) `SettingsName` ASC ;
                $this->data['status_type']= $this->db->order_by('SettingsName', 'ASC')->get_where('initial_settings_info', array('SettingsCategory =' => '14','status_type'=> 'teacher' ))->result();
            }else if($this->data['groupid'] == 6){
                $this->data['status_type']= $this->db->order_by('SettingsName', 'ASC')->get_where('initial_settings_info', array('SettingsCategory =' => '14','status_type ='=> 'staff' ))->result();

            }
            
            //owndebugger($this->data['status_type']);
            $this->data['modifyuserid'] = $this->get_group_id($this->data['userid']);
            $groupinfos = $this->get_group_name($this->data['userid']);
            $this->data['groupname'] = $groupinfos->name;
            $this->data['title'] = 'Academic Information';

            $this->load->view('layouts/header', $this->data);
            $this->load->view('profile/studentpersonalinformation', $this->data);
            $this->load->view('layouts/footer', $this->data);
        }
    }

    public function modify_student_personal_information()
    {
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
                $this->data['groupid'] = $this->get_group_id($this->data['userid']);
            } else {
                $this->data['userid'] = $this->data['userInformation']->id;
                $this->data['groupid'] = $this->get_group_id($this->data['userid']);
            }
            $this->data['title'] = "Personal Information";
            $uri2 = $this->input->post('userid');
            $groupcheck = $this->input->post('usergroupid');
            $data = array(
                'UserId' => ((isset($uri2) ? $uri2 : $this->data['userid'])),
                'Class' => $this->input->post('class'),
                'ClassRoll' => $this->input->post('classroll'),
                'Section' => $this->input->post('section'),
                'GroupId' => $this->input->post('group'),
                'Department' => $this->input->post('department'),
                'isActive' => 1
            );
            $data1 = array(
                'UserId' => ((isset($uri2) ? $uri2 : $this->data['userid'])),
                'Designation' => $this->input->post('designation'),
                'SalaryScale' => $this->input->post('salaryscale'),
                'IndexNumber' => $this->input->post('indexnumber'),
                'BankAccountNumber' => $this->input->post('bankaccountnumber'),
                'BankName' => $this->input->post('bankname'),
                'BankBranchName' => $this->input->post('bankbranchname'),
                'DateAttended' => $this->input->post('dateattended'),
                'isActive' => 1
            );

            if ($this->input->post('studentpersonalinfoid') == 'none' || $this->input->post('teacherstaffinfoid') == 'none') {
                if ($groupcheck == 4) {                    
                    $this->results = $this->profile_model->insertStudentPersonalInformation($data);
                } else {
                    $this->results = $this->profile_model->insertTchStaffAcademicInformation($data1);
                }
            } else {
                if ($groupcheck == 4) {
                    if($this->input->post('promote') == 2) {
                        unset($data['isActive']);
                        $data2 = array(
                            'StudyYear' => date('Y')
                        );
                        $datamerged = array_merge($data, $data2);
                        $this->results = $this->profile_model->insertStudentPromotion($datamerged);
                    }
                    $where = array('StudentInfoId' => $this->input->post('studentpersonalinfoid'));
                    $this->results = $this->profile_model->updateStudentPersonalInformation($data, $where);
                } else {
                    $where1 = array('TchStaffId' => $this->input->post('teacherstaffinfoid'));
                    $this->results = $this->profile_model->updateTchStaffAcademicInformation($data1, $where1);
                }
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
    }

    public function subscription()
    {
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
            $this->data['title'] = "Subscription Information";

            $this->load->view('layouts/header', $this->data);
            $this->load->view('profile/subscription', $this->data);
            $this->load->view('layouts/footer', $this->data);
        }
    }

    public function billing_form()
    {
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
            $this->data['userinformation_b'] = $this->basic_information_of_mine($this->data['userid']);
            $this->data['userinformation'] = $this->personal_information_of_mine($this->data['userid']);
            $this->data['countries'] = $this->common_model->get_countries();

            $this->data['title'] = "Upgrade your plan";

            $this->load->view('layouts/header', $this->data);
            $this->load->view('profile/billingform', $this->data);
            $this->load->view('layouts/footer', $this->data);
        }
    }

    public function change_password()
    {
        if ($this->ion_auth->logged_in()) {
            $this->data['userInformation'] = $this->ion_auth->user()->row();
        }
        $this->data['loggedinuserinformation'] = $this->basic_information_of_mine($this->data['userInformation']->id);

        $uri2 = $this->uri->segment(2);
        //owndebugger($uri2);
        if (isset($uri2)) {
            $this->data['userid'] = $this->uri->segment(2);
            $this->data['groupid'] = $this->get_group_id($this->data['userid']);
        } else {
            $this->data['userid'] = $this->data['userInformation']->id;
            $this->data['groupid'] = $this->get_group_id($this->data['userid']);
        }
        $this->data['class'] = $this->common_model->get_settings(1);
        $this->data['section'] = $this->common_model->get_settings(2);
        $this->data['department'] = $this->common_model->get_settings(3);
        $this->data['group'] = $this->common_model->get_settings(6);
        $this->data['modifyuserid'] = $this->get_group_id($this->data['userid']);

        $groupinfos = $this->get_group_name($this->data['userid']);
        $this->data['groupname'] = $groupinfos->name;


        $this->data['title'] = "Change Password";
        $this->load->view('layouts/header', $this->data);
        $this->load->view('profile/changepassword', $this->data);
        $this->load->view('layouts/footer', $this->data);
    }

    /** Modification Setup Information * */
    public function modify_password_information()
    {
        $uri2 = $this->input->post('userid');
        $this->data['userid'] = $this->input->post('userid');
        $this->data['modifyuserid'] = $this->get_group_by_user_id($this->data['userid']);
        //owndebugger($this->data['modifyuserid']);
        $password = $this->input->post('password');
        $confirm_password = $this->input->post('confirm_password');
        if ($password == $confirm_password) {
            $data = array(
                'password' => $this->ion_auth_model->hash_password($this->input->post('password'), FALSE, FALSE)
            );
            $where = array('id' => ((isset($uri2) ? $uri2 : $this->data['userid'])));
            $this->results = $this->profile_model->updateBasicInformation($data, $where);
        } else {
        }
        if ($this->results) {
            $this->status['status'] = 1;
            $this->status['msg'] = 'Well done!';
        } else {
            $this->status['status'] = 0;
            $this->status['msg'] = 'Oh snap! Password and Confirm Password dose not match';
        }
        echo jsonEncode($this->status);
    }

    /** All delete functions here at below * */
    public function delete_education()
    {
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

            if ($uri2) {
                $this->where = array('EducationID' => $uri2);
                $this->isDelete = $this->profile_model->deleteEducation($this->where);
                if ($this->isDelete) {
                    $this->status['status'] = 1;
                    $this->status['msg'] = "Education has been deleted.";
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
    }

    public function delete_work()
    {
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

            if ($uri2) {
                $this->where = array('WorkId' => $uri2);
                $this->isDelete = $this->profile_model->deleteWork($this->where);
                if ($this->isDelete) {
                    $this->status['status'] = 1;
                    $this->status['msg'] = "Work has been deleted.";
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
    }

    public function delete_business()
    {
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

            if ($uri2) {
                $this->where = array('BusinessId' => $uri2);
                $this->isDelete = $this->profile_model->deleteBusiness($this->where);
                if ($this->isDelete) {
                    $this->status['status'] = 1;
                    $this->status['msg'] = "Business has been deleted.";
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
    }

    /** First Time Profile Creator * */
    public function generate_userid()
    {
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
            //owndebugger($this->data['usergroups']);

            $this->load->view('layouts/header', $this->data);
            $this->load->view('profile/usergenerator', $this->data);
            $this->load->view('layouts/footer', $this->data);
        }
    }
    public function promotion_manager() {
        if (isset($uri2)) {
            $this->data['userid'] = $this->uri->segment(2);
        } else {
            if ($this->ion_auth->logged_in()) {
                $this->data['userInformation'] = $this->ion_auth->user()->row();
            }
            $this->data['userid'] = $this->data['userInformation']->id;
        }

        $this->data['title'] = "Promotion Manager";        
        $this->load->view('layouts/header', $this->data);
        $this->load->view('profile/student_manager', $this->data);
        $this->load->view('layouts/footer', $this->data);
    }
    public function generate_student_and_guardian()
    {
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
            $this->data['title'] = "Add student and guardian";
            $pass = $this->qpass_gen($this->input->post('stdpass'));
            $pass1 = $this->qpass_gen($this->input->post('gpass'));

            /** Guardian Insert **/
            $egid = $this->input->post('egid');
            $gid = $this->input->post('gid');
            $admitid = $this->input->post('admitid');

            if ($admitid == 'none') {

                if ($egid == "") {
                    $data2 = array(
                        'GuardianId' => $gid,
                        'StudentId' => $this->input->post('stdid')
                    );
                } else if (!empty($egid)) {
                    $data2 = array(
                        'GuardianId' => $egid,
                        'StudentId' => $this->input->post('stdid')
                    );
                }

                if ($egid == "") {
                    $data = array(
                        'id' => $this->input->post('stdid'),
                        'password' => $pass,
                        'created_on' => datetoint(date('Y-m-d H:i:s')),
                        'active' => 1
                    );
                    $inugroups = array(
                        'user_id' => $this->input->post('stdid'),
                        'group_id' => 4
                    );
                    $data1 = array(
                        'id' => $gid,
                        'password' => $pass1,
                        'created_on' => datetoint(date('Y-m-d H:i:s')),
                        'active' => 1
                    );
                    $inugroups1 = array(
                        'user_id' => $this->input->post('gid'),
                        'group_id' => 5
                    );

                    $this->results = $this->profile_model->insertStudentIdAndPass($data);
                    $this->results = $this->profile_model->insertStudentIdToUsersGroups($inugroups);

                    $this->results = $this->profile_model->insertGuardianIdAndPass($data1);
                    $this->results = $this->profile_model->insertGuardianIdToUsersGroups($inugroups1);

                    $this->results = $this->profile_model->insertStudentGuardianRelation($data2);

                    $data3 = array(
                        'UserId' => $this->input->post('stdid'),
                        'Class' => $this->input->post('studentclass'),
                        'ClassRoll' => $this->input->post('studentclsroll'),
                        'Section' => $this->input->post('sectionval'),
                        'GroupId' => $this->input->post('studygroupval'),
                        'Department' => $this->input->post('departmentval')
                    );
                    $this->results = $this->profile_model->insertStudentAcademicInformation($data3);

                } else if (!empty($egid)) {
                    $data = array(
                        'id' => $this->input->post('stdid'),
                        'password' => $pass,
                        'created_on' => datetoint(date('Y-m-d H:i:s')),
                        'active' => 1
                    );
                    $inugroups = array(
                        'user_id' => $this->input->post('stdid'),
                        'group_id' => 4
                    );

                    $this->results = $this->profile_model->insertStudentIdAndPass($data);
                    $this->results = $this->profile_model->insertStudentIdToUsersGroups($inugroups);
                    $this->results = $this->profile_model->insertStudentGuardianRelation($data2);

                    $data3 = array(
                        'UserId' => $this->input->post('stdid'),
                        'Class' => $this->input->post('studentclass'),
                        'ClassRoll' => $this->input->post('studentclsroll'),
                        'Section' => $this->input->post('sectionval'),
                        'GroupId' => $this->input->post('studygroupval'),
                        'Department' => $this->input->post('departmentval')
                    );
                    $this->results = $this->profile_model->insertStudentAcademicInformation($data3);
                }

            } else {
                if ($egid == "") {
                    $data2 = array(
                        'GuardianId' => $gid,
                        'StudentId' => $this->input->post('stdid')
                    );
                } else if (!empty($egid)) {
                    $data2 = array(
                        'GuardianId' => $egid,
                        'StudentId' => $this->input->post('stdid')
                    );
                }


                if ($egid == "") {
                    $data = array(
                        'id' => $this->input->post('stdid'),
                        'password' => $pass,
                        'created_on' => datetoint(date('Y-m-d H:i:s')),
                        'active' => 1
                    );
                    $inugroups = array(
                        'user_id' => $this->input->post('stdid'),
                        'group_id' => 4
                    );
                    $data1 = array(
                        'id' => $gid,
                        'password' => $pass1,
                        'created_on' => datetoint(date('Y-m-d H:i:s')),
                        'active' => 1
                    );
                    $inugroups1 = array(
                        'user_id' => $this->input->post('gid'),
                        'group_id' => 5
                    );

                    $where = array('id' => $admitid);
                    $this->results = $this->profile_model->updateBasicInformation($data, $where);
                    $this->results = $this->profile_model->insertStudentIdToUsersGroups($inugroups);

                    $this->results = $this->profile_model->insertGuardianIdAndPass($data1);
                    $this->results = $this->profile_model->insertGuardianIdToUsersGroups($inugroups1);

                    $this->results = $this->profile_model->insertStudentGuardianRelation($data2);

                    $data3 = array(
                        'UserId' => $this->input->post('stdid'),
                        'Class' => $this->input->post('studentclass'),
                        'ClassRoll' => $this->input->post('studentclsroll'),
                        'Section' => $this->input->post('sectionval'),
                        'GroupId' => $this->input->post('studygroupval'),
                        'Department' => $this->input->post('departmentval')
                    );
                    $this->results = $this->profile_model->insertStudentAcademicInformation($data3);

                } else if (!empty($egid)) {
                    $data = array(
                        'id' => $this->input->post('stdid'),
                        'password' => $pass,
                        'created_on' => datetoint(date('Y-m-d H:i:s')),
                        'active' => 1
                    );
                    $inugroups = array(
                        'user_id' => $this->input->post('stdid'),
                        'group_id' => 4
                    );

                    $where = array('id' => $admitid);
                    $this->results = $this->profile_model->updateBasicInformation($data, $where);
                    $this->results = $this->profile_model->insertStudentIdToUsersGroups($inugroups);
                    $this->results = $this->profile_model->insertStudentGuardianRelation($data2);

                    $data3 = array(
                        'UserId' => $this->input->post('stdid'),
                        'Class' => $this->input->post('studentclass'),
                        'ClassRoll' => $this->input->post('studentclsroll'),
                        'Section' => $this->input->post('sectionval'),
                        'GroupId' => $this->input->post('studygroupval'),
                        'Department' => $this->input->post('departmentval')
                    );
                    $this->results = $this->profile_model->insertStudentAcademicInformation($data3);
                }
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
    }

    public function simple_test()
    {
        $data = array(
            'id' => '201532',
            'password' => 'samtay',
            'created_on' => datetoint(date('Y-m-d H:i:s')),
            'active' => 1
        );
        $where = array('id' => '11414');
        $this->results = $this->profile_model->updateBasicInformation($data, $where);

        owndebugger($this->results);
    }

    public function generate_teacher_or_staff()
    {
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
            $this->data['title'] = "Add teacher or staff";
            $pass = $this->qpass_gen($this->input->post('ts_pass'));

            $data = array(
                'id' => $this->input->post('ts_id'),
                'password' => $pass,
                'created_on' => datetoint(date('Y-m-d H:i:s')),
                'active' => 1
            );
            $basicinfomation = array(
                'UserId' => $this->input->post('ts_id'),
                'UniqueNumber' => $this->input->post('nationalidcardnumber')
            );
            $inugroups = array(
                'user_id' => $this->input->post('ts_id'),
                'group_id' => $this->input->post('which_user_group')
            );

            $this->results = $this->profile_model->insertPersonalInformation($basicinfomation);
            $this->results = $this->profile_model->insertStudentIdAndPass($data);
            $this->results = $this->profile_model->insertStudentIdToUsersGroups($inugroups);

            if ($this->results) {
                $this->status['status'] = 1;
                $this->status['msg'] = 'Well done!';
            } else {
                $this->status['status'] = 0;
                $this->status['msg'] = 'Oh snap! Change a few things up and try submitting again.';
            }
            echo jsonEncode($this->status);
        }
    }    

    public function qpass_gen($password)
    {
        $pass = $this->ion_auth_model->hash_password($password, FALSE, FALSE);
        return $pass;
    }

    /** Common Function * */
    public function history_of_work($id)
    {
        return $this->profile_model->getWorkHistory($id);
    }

    public function businesses_of_mine($id)
    {
        return $this->profile_model->getBusinesses($id);
    }

    public function education_of_mine($id)
    {
        return $this->profile_model->getEducationHistory($this->data['userid']);
    }

    public function module_based_categories($id)
    {
        return $this->common_model->get_categories_by_module_id($id);
    }

    public function basic_information_of_mine($id)
    {

        return $this->profile_model->getUsersInformation($id);
    }

    public function personal_information_of_mine($id)
    {
        return $this->profile_model->getPersonalInformation($id);
    }

    public function student_personal_information_of_mine($id)
    {
        return $this->profile_model->getStudentPersonalInformation($id);
    }

    public function tch_staff_academic_information_of_mine($id)
    {
        return $this->profile_model->getTchStaffAcademicInformation($id);
    }

    public function gender_get($id)
    {
        return $this->common_model->get_settings($id);
    }

    public function enrollment_status_get($id)
    {
        return $this->common_model->get_enrollment_status($id);
    }

    public function get_group_id($userid)
    {
        return $this->ion_auth->get_users_groups($userid)->row()->id;
    }

    public function get_group_name($userid)
    {
        if (isset($userid))
            $row = $this->ion_auth->get_users_groups($userid)->result();
        return $row[0];
    }

    public function get_group_by_user_id($userid)
    {
        return $this->common_model->get_group_by_user_id($userid);
    }

    public function get_upazila()
    {
        $disid = $this->uri->segment(2);
        $this->results = $this->common_model->get_upazillas_for_json($disid);

        if($this->results) {
            $datas = $this->results;
        }
        echo jsonEncode($datas);
    }
}

/** Modifications **/