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
            // $this->load->helper('alert_helper');
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

    /*************************************
                Subjects Settings
    **************************************/

    public function subjects_settings(){
        if ($this->ion_auth->logged_in()) {
            $userInformation = $this->ion_auth->user()->row();
            $this->data['userid'] = $userInformation->id;
        }
        $posts = $this->input->post();
        if($posts){
              //dd($posts);
            if($this->common_model->isRecordsExists('initial_settings_info',['SettingsCategory'=> 4 ,'SettingsName'=>$posts['SettingsName'], 'class_level'=>$posts['class_level']]))
            {
               set_message('error', 'Already Exist');
               redirect('subjectssettings');

            }else{
                if(!empty($posts['groups'])){
                    $groups = '';
                    foreach ($posts['groups'] as $group) {
                         $groups .= $group .',';
                    }
                }else{
                    $groups = '';
                }

                $mergeable = (!empty($posts['mergeable']))? $posts['mergeable'] : 0;
                $noeffect = (!empty($posts['noeffect']))? $posts['noeffect'] : 0;
                $separate_pass = (!empty($posts['separate_pass']))? $posts['separate_pass'] : 0;
                $data = [
                    'SettingsCategory'=> 4 ,
                    'SettingsName' => $posts['SettingsName'],
                    'SettingsDescription' => $posts['SettingsDescription'],
                    'status_type '=> $posts['status_type'],
                    'cq'=> $posts['cq'],
                    'mcq'=> $posts['mcq'],
                    'practical '=> $posts['practical'],
                    'comments '=> $posts['comments'],
                    'class_level '=> $posts['class_level'],
                    'groups '=> rtrim($groups,','),
                    'mergeable '=> $mergeable,
                    'noeffect '=> $noeffect,
                    'separate_pass '=> $separate_pass,
                    'isActive '=> 1,
                    'subject_type '=> $posts['subject_type'],
                    'mcq_pass_mark '=> $posts['mcq_pass_mark'],
                    'practical_pass_mark '=> $posts['practical_pass_mark'],
                    'mergeable_id '=> $posts['mergeable_id'],
                    'descriptive_pass_mark '=> $posts['descriptive_pass_mark'],
                    'subject_sl '=> $posts['subject_sl']
                    // 'pass '=> $posts['pass']

                ];
                 // dd($data);
                $result = $this->db->insert('initial_settings_info',$data);
                set_message('success', 'Successfully Added');
                redirect('subjectssettings');
            }


        }
        $this->data['title'] = "Add Subject";
        $offset = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        $per_page_limit = 20;
        $url = base_url('subjectssettings');
        $search = array(
            'status_type'=> ($this->input->get('status_type')) ? $this->input->get('status_type') : 'Active',
            'SettingsName' => @$this->input->get('SettingsName'),
            'level' => @$this->input->get('level'),
            'limit' => $per_page_limit,
            'offset' => $offset,
        );
        // echo @$this->input->get('isActive');
        $this->data['subjects'] =$this->settings_model->subject_list($search);
        $total_rows = $this->settings_model->subject_count($search);
        $this->data['paging'] = paging($total_rows, $per_page_limit, $url);

        $this->data['groups'] = $this->db->get_where('initial_settings_info',['SettingsCategory'=> 6])->result();
        $this->data['class_level'] = $this->db->get('class_level')->result();
        $this->data['form_action'] = "addsubject";
        $this->load->view('layouts/header', $this->data);
        $this->load->view('initialsettings/subjectsetttings', $this->data);
        $this->load->view('layouts/footer', $this->data);
    }

    public function edit_subject($id)
    {
        if ($this->ion_auth->logged_in()) {
            $userInformation = $this->ion_auth->user()->row();
            $this->data['userid'] = $userInformation->id;
        }
        $posts = $this->input->post();
        if(@$posts['SettingsId']){
             if(!empty($posts['groups'])){
                $groups = '';
                foreach ($posts['groups'] as $group) {
                     $groups .= $group .',';
                }
            }else{
                $groups = '';
            }

            $mergeable = (!empty($posts['mergeable']))? $posts['mergeable'] : 0;
            $noeffect = (!empty($posts['noeffect']))? $posts['noeffect'] : 0;
            $separate_pass = (!empty($posts['separate_pass']))? $posts['separate_pass'] : 0;

            $data = [
                'SettingsCategory'=> 4 ,
                'SettingsName' => $posts['SettingsName'],
                'SettingsDescription' => $posts['SettingsDescription'],
                'status_type '=> $posts['status_type'],
                'cq'=> $posts['cq'],
                'mcq'=> $posts['mcq'],
                'practical '=> $posts['practical'],
                'comments '=> $posts['comments'],
                'class_level '=> $posts['class_level'],
                'groups '=> rtrim($groups,','),
                'mergeable '=> $mergeable,
                'noeffect '=> $noeffect,
                'separate_pass '=> $separate_pass,
                'isActive '=> 1,
                'subject_type '=> $posts['subject_type'],
                'mcq_pass_mark '=> $posts['mcq_pass_mark'],
                'practical_pass_mark '=> $posts['practical_pass_mark'],
                'mergeable_id '=> $posts['mergeable_id'],
                'descriptive_pass_mark '=> $posts['descriptive_pass_mark'],
                'subject_sl '=> $posts['subject_sl']
            ];
            $result = $this->db->where('SettingsId', $posts['SettingsId'])->update('initial_settings_info', $data);
            set_message('success', 'Successfully Updated');
            redirect('subjectssettings');
        }
        $this->data['single_item'] = $this->db->get_where('initial_settings_info',['SettingsId'=> $id])->row();
        // dd($this->data['single_item']);
        // $this->data['form_action'] = "addsubject";
        $this->data['title'] = "Edit Subject";
        $this->data['groups'] = $this->db->get_where('initial_settings_info',['SettingsCategory'=> 6])->result();
        $this->data['class_level'] = $this->db->get('class_level')->result();
        // redirect('subjectssettings');
        $this->load->view('layouts/header', $this->data);
        $this->load->view('initialsettings/subjectsetttings', $this->data);
        $this->load->view('layouts/footer', $this->data);
    }
    public function delete_subject($id)
    {
        $result = $this->db->where('SettingsId', $id)->update('initial_settings_info', ['status_type'=>'Inactive']);
        if ($result)
                set_message('success', 'Successfully Inactive');
            else
                set_message('error', 'Can Not Added');
            redirect('subjectssettings');
    }
    public function active_subject($id)
    {
       $result = $this->db->where('SettingsId', $id)->update('initial_settings_info', ['status_type'=>'Active']);
        if ($result)
                set_message('success', 'Successfully Active');
            else
                set_message('error', 'Can Not Added');
            redirect('subjectssettings');
    }

    /******************
    Designation Settings
    *******************/

    public function designation_settings($value='')
    {
        if ($this->ion_auth->logged_in()) {
            $userInformation = $this->ion_auth->user()->row();
            $this->data['userid'] = $userInformation->id;
        }
        $posts = $this->input->post();
        if($posts){
            if($this->common_model->isRecordsExists('initial_settings_info',['SettingsCategory'=> 14 ,'SettingsName'=>$posts['SettingsName']]))
            {
               set_message('error', 'Already Exist');
               redirect('designationsettings');

            }else{
                $data = ['SettingsCategory'=> 14 ,'SettingsName' => $posts['SettingsName'],'status_type '=> $posts['status_type']];
                $result = $this->db->insert('initial_settings_info',$data);
                set_message('success', 'Successfully Added');
                redirect('designationsettings');

            }

        }

        $this->data['title'] = "Add Designation";
        $this->data['teachers'] = $this->db->get_where('initial_settings_info',['SettingsCategory'=> 14 ,'status_type '=> 'teacher'])->result();
        $this->data['staffs'] = $this->db->get_where('initial_settings_info',['SettingsCategory'=> 14 ,'status_type '=> 'staff'])->result();
        $this->load->view('layouts/header', $this->data);
        $this->load->view('initialsettings/designationsettings', $this->data);
        $this->load->view('layouts/footer', $this->data);
    }
    public function edit_designation($id)
    {
        if ($this->ion_auth->logged_in()) {
            $userInformation = $this->ion_auth->user()->row();
            $this->data['userid'] = $userInformation->id;
        }
        $posts = $this->input->post();
        if(@$posts['SettingsId']){
            $data = [ 'SettingsName' => $posts['SettingsName'],'status_type '=> $posts['status_type']];
            $result = $this->db->where('SettingsId', $posts['SettingsId'])->update('initial_settings_info', $data);
            set_message('success', 'Successfully Updated');
            redirect('designationsettings');
        }
        $this->data['single_item'] = $this->db->get_where('initial_settings_info',['SettingsId'=> $id])->row();
        // dd($this->data['single_item']);
        // $this->data['form_action'] = "addsubject";
        $this->data['title'] = "Edit Designation";
        $this->data['teachers'] = $this->db->get_where('initial_settings_info',['SettingsCategory'=> 14 ,'status_type '=> 'teacher'])->result();
        $this->data['staffs'] = $this->db->get_where('initial_settings_info',['SettingsCategory'=> 14 ,'status_type '=> 'staff'])->result();
        // dd($this->data['teachers'] );
        // redirect('subjectssettings');
        $this->load->view('layouts/header', $this->data);
        $this->load->view('initialsettings/designationsettings', $this->data);
        $this->load->view('layouts/footer', $this->data);
    }

    public function delete_designation($id)
    {
        # code...
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
