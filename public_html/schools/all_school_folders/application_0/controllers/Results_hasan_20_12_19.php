<?php
if (! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @property Uploader $uploader Uploader Class Library
 * @property Common_model $common_model Uploader Class Library
 * @property Profile_model $profile_model Profile Class Library
 * @property ion_auth_model $ion_auth_model ion_auth_model Library
 * @property result_model $result_model ion_auth_model Library
 * @property Reports_model $Reports_model report model library
 */
class Results extends MY_Controller
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
        $this->data['title'] = "Results Generator";


        $this->data['eid'] = (isset($_GET['examm']) ? $_GET['examm'] : '0');
        $this->data['cid'] = (isset($_GET['classs']) ? $_GET['classs'] : '0');
        $this->data['sid'] = (isset($_GET['section']) ? $_GET['section'] : '0');
        $this->data['subid'] = (isset($_GET['subject']) ? $_GET['subject'] : '0');
        $this->data['sgid'] = (isset($_GET['groupp']) ? $_GET['groupp'] : '0');
        $this->data['year'] = (isset($_GET['year']) ? $_GET['year'] : '0');
        $this->data['msg'] = (isset($_GET['msg']) ? $_GET['msg'] : 'Select Appropriate Exam, Class, Section, Subject and Group to Generate the Result.');


        $this->data['classes'] = $this->common_model->get_settings(1);
        $this->data['sections'] = $this->common_model->get_settings(2);
        $this->data['subjects'] = $this->common_model->get_sub_setting();
        $this->data['exams'] = $this->common_model->get_settings(5);
        $this->data['groups'] = $this->common_model->get_settings(6);


        $this->data['allresults'] = $this->get_results_of_c_e_s_s($this->data['eid'], $this->data['cid'], $this->data['sid'], $this->data['subid'], $this->data['sgid'],$this->data['year']);
        $this->load->view('layouts/header', $this->data);
        $this->load->view('result/resultgenerator', $this->data);
        $this->load->view('layouts/footer', $this->data);
    }

    /*public function get_class_wise_subject_rule($value='')
    {
        $subid = $this->input->post('subid');
        $rule = $this->db->get_where('initial_settings_info',['SettingsId'=> $subid])->row();
        owndebugger($rule);
        // return $rule;
    }*/

    public function get_class_wise_subject($value='')
    {
        $level = $this->input->post('level');
        $group = $this->input->post('group');
        if($level == 1){
            $subjects = $this->db->get_where('initial_settings_info',['SettingsCategory'=> 4,'status_type' => 'Active','class_level'=> $level])->result();
        }elseif($level == 2){
            $subjects = $this->db->like('groups',$group)->get_where('initial_settings_info',['SettingsCategory'=> 4,'status_type' => 'Active', 'class_level'=> $level])->result();
        }elseif($level == 3){
            $subjects = $this->db->like('groups',$group)->get_where('initial_settings_info',['SettingsCategory'=> 4, 'status_type' => 'Active', 'class_level'=> $level])->result();
        }
       // echo $this->db->last_query();exit; 

        $html = '';
        foreach ($subjects as $subject) {
            $html .= "<option value='". $subject->SettingsId ."' class='test_xhmx'> $subject->SettingsDescription </option>";
        }
        echo $html;
    }

    /*************************************
                Subject Assign
    **************************************/


    public function resultsettings($value='')
    {
        if ($this->ion_auth->logged_in()) {
            $this->data['userInformation'] = $this->ion_auth->user()->row();
        }
        $this->data['loggedinuserinformation'] = $this->basic_information_of_mine($this->data['userInformation']->id);
        $this->data['userid'] = $this->data['userInformation']->id;
        // dd($this->data['rulegroups']);
        $this->data['title'] = "Results Settings";
        $this->load->view('layouts/header', $this->data);
        $this->load->view('result/resultsettings', $this->data);
        $this->load->view('layouts/footer', $this->data);

    }
    public function classwise_subject_assign($value='')
    {
        if ($this->ion_auth->logged_in()) {
            $this->data['userInformation'] = $this->ion_auth->user()->row();
        }
        $this->data['loggedinuserinformation'] = $this->basic_information_of_mine($this->data['userInformation']->id);
        $this->data['userid'] = $this->data['userInformation']->id;

            $rule_year = date('Y',strtotime($this->input->post('ruleyear')));
            $result_group_id = $this->input->post('result_group');
            $subjectlist = $this->input->post('subjects');
            if($subjectlist){
                $subjects='';
                foreach ($subjectlist as $subject) {
                    $subjects .= $subject .',';
                }

                $data = array(
                    'ruleyear'=> $rule_year,
                    'result_rule_group_id'=> $result_group_id ,
                    'subjects'=> $subjects
                );

                $result = $this->db->insert('rule_group_subjects',$data );

                if ($result)
                    set_message('success', 'Successfully Added');
                else
                    set_message('error', 'Can Not Updated');
        }


         // owndebugger($subjects);
        $this->data['title'] = "Subject Assign";
        $this->data['subjects'] = $this->db->get_where('initial_settings_info',['SettingsCategory'=> 4,'status_type'=>'Active'])->result();
        $this->data['result_groups'] = $this->db->get('result_rule_group')->result();
        $this->data['rule_group_subjects'] = $this->db->get_where('rule_group_subjects',['status'=>'Active'])->result();
        // dd($this->data['result_group']);

        $this->load->view('layouts/header', $this->data);
        $this->load->view('result/resultsettings', $this->data);
        $this->load->view('layouts/footer', $this->data);
    }
    public function edit_classwise_subject_assign($id)
    {
        if ($this->ion_auth->logged_in()) {
            $this->data['userInformation'] = $this->ion_auth->user()->row();
        }
        $this->data['loggedinuserinformation'] = $this->basic_information_of_mine($this->data['userInformation']->id);
        $this->data['userid'] = $this->data['userInformation']->id;
            if($this->input->post()){
                $rule_year = date('Y',strtotime($this->input->post('ruleyear')));
                $result_group_id = $this->input->post('result_group');
                $subjectlist = $this->input->post('subjects');
                if($subjectlist){
                    $subjects='';
                    foreach ($subjectlist as $subject) {
                        $subjects .= $subject .',';
                    }

                    $data = array(
                        'ruleyear'=> $rule_year,
                        'result_rule_group_id'=> $result_group_id ,
                        'subjects'=> $subjects
                    );
                    if($this->input->post('id')){
                       $result = $this->common_model->updateRecords('rule_group_subjects', $data, ['id'=> $this->input->post('id')]);

                    if ($result)
                            set_message('success', 'Successfully Added');
                        else
                            set_message('error', 'Can Not Updated');
                     redirect('classwisesubjectassign');
                    }
                }
            }
         // owndebugger($subjects);
        $this->data['title'] = "Classwise Subject Assign";
        $this->data['subjects'] = $this->db->get_where('initial_settings_info',['SettingsCategory'=> 4,'status_type'=>'Active'])->result();
        $this->data['result_groups'] = $this->db->get('result_rule_group')->result();
        $this->data['rule_group_subjects'] = $this->db->get_where('rule_group_subjects',['status'=>'Active'])->result();
        $this->data['rule_group_subject'] = $this->db->get_where('rule_group_subjects',['id'=>$id, 'status'=>'Active'])->row();
        // dd($this->data['rule_group_subject']);

        $this->load->view('layouts/header', $this->data);
        $this->load->view('result/resultsettings', $this->data);
        $this->load->view('layouts/footer', $this->data);
    }
    public function delete_classwise_subject_assign($id)
    {
        // echo $id;
        $result = $this->db->where('id', $id)->update('rule_group_subjects', ['status'=>'Delete']);
        if ($result)
            set_message('success', 'Successfully Deleted');
        else
            set_message('error', 'Can Not Added');
        redirect('classwisesubjectassign');
    }


    /*************************************
                Rule Settings
    **************************************/

    public function subjectrule($value='')
    {
        if ($this->ion_auth->logged_in()) {
            $this->data['userInformation'] = $this->ion_auth->user()->row();
        }
        $this->data['loggedinuserinformation'] = $this->basic_information_of_mine($this->data['userInformation']->id);
        $this->data['userid'] = $this->data['userInformation']->id;

        if($this->input->get('rulegroup')){
            $this->data['rule_subjects'] = @$this->db->get_where('rule_group_subjects',['result_rule_group_id'=> @$this->input->get('rulegroup'),'status'=>'Active'])->result();
            // dd($this->data['rule_subjects']);
        }



        $this->data['rulegroups'] = @$this->db->get('result_rule_group')->result();
        // dd($this->data['rule_subjects']);
        $this->data['title'] = "Results Settings";
        $this->load->view('layouts/header', $this->data);
        $this->load->view('result/resultsettings', $this->data);
        $this->load->view('layouts/footer', $this->data);

    }

    public function edit_subjectrule($value='')
    {

    }
    public function delete_subjectrule($value='')
    {

    }

    public function search_results()
    {
        if ($this->ion_auth->logged_in()) {
            $this->data['userInformation'] = $this->ion_auth->user()->row();
        }
        $this->data['loggedinuserinformation'] = $this->basic_information_of_mine($this->data['userInformation']->id);
        $this->data['userid'] = $this->data['userInformation']->id;
        $this->data['title'] = "Search Results";

        $this->data['eid'] = (isset($_GET['examm']) ? $_GET['examm'] : '0');
        $this->data['cid'] = (isset($_GET['classs']) ? $_GET['classs'] : '0');
        $this->data['sid'] = (isset($_GET['section']) ? $_GET['section'] : '0');
        $this->data['subid'] = (isset($_GET['subject']) ? $_GET['subject'] : '0');
        $this->data['sgid'] = (isset($_GET['groupp']) ? $_GET['groupp'] : '0');
        $this->data['year'] = (isset($_GET['year']) ? $_GET['year'] : '0');
        $this->data['msg'] = (isset($_GET['msg']) ? $_GET['msg'] : 'Select Appropriate Exam, Class, Section, Subject and Group to Generate the Result.');


        $this->data['classes'] = $this->common_model->get_settings(1);
        $this->data['sections'] = $this->common_model->get_settings(2);
        $this->data['subjects'] = $this->common_model->get_settings(4);
        $this->data['exams'] = $this->common_model->get_settings(5);
        $this->data['groups'] = $this->common_model->get_settings(6);


        $prm = $this->uri->segment('2');
        $offset = $this->input->get('per_page');
        $offset = (!empty($offset) ? $offset : 0);
        $limit =30;

        // $search = array(
        //     'Section' =>  $this->data['sid'],
        //     'Class' => $this->data['cid'],
        //     'limit' => $limit,
        //     'offset' => $offset,
        //     'prm' => $prm
        // );
        $where2 = array(
            'Exams' => $this->data['eid'],
            'Classes' => $this->data['cid'],
            'Sections'=> $this->data['sid'],
            'AddedYear'=> $this->data['year'],
            'StudyGroups'=> ($this->data['sgid'] == 0)? 0: $this->data['sgid'],
            'limit' => $limit,
            'offset' => $offset,
            'prm' => $prm
        );
        $this->data['students'] = $this->result_model->get_result_student_list($where2);
        $this->load->library('pagination');
        $config['total_rows'] = $this->result_model->count_result_student_list($where2);
        $config['per_page'] = $limit;
        $config['enable_query_strings'] = TRUE;
        $config['page_query_string'] = TRUE;
        $config['reuse_query_string'] = TRUE;
        $config['use_page_numbers'] = FALSE;
        $config['cur_tag_open'] = '&nbsp;<a class="active">';
        $config['cur_tag_close'] = '</a>';
        $config['base_url'] = base_url('searchresult');
        $this->pagination->initialize($config);
        $this->data['paging'] = $this->pagination->create_links();
        $this->load->view('layouts/header', $this->data);
        $this->load->view('result/search-results', $this->data);
        $this->load->view('layouts/footer', $this->data);
    }
    public function filter_results($exam = '', $sections = '', $classes = '', $year = '') {
        $html = '';
        $students = $this->db->order_by('ClassRoll', 'ASC')->get_where('u_std_information', ['Section' => $sections, 'Class' => $classes, 'isActive' => 1])->result();
        if($students) {
            foreach ($students as $student){
                $html .= "<tr>
                            <td>$student->UserId</td>
                            <td>". tableSingleColumn('users', 'full_name_en', ['id' => $student->UserId]) ."</td>
                            <td>$student->ClassRoll</td>
                            <td>$exam</td>
                            <td>A</td>
                            <td>3.5</td>
                            <td><a class='modalcursour' data-toggle='modal' data-target='#modal_body_". $student->UserId ."'><i class='fa fa-envelope'></i></a></td>
                            <div class='modal fade' id='modal_body_". $student->UserId ."' tabindex='-1' role='dialog' aria-hidden='true'>
                            <div class='modal-dialog' role='document'>
                                <div class='modal-content'>
                                    <form>
                                    <div class='modal-header'>
                                        <h5 class='modal-title' id='exampleModalLongTitle'>
                                            Over All Result
                                            <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                                        </h5>
                                    </div>
                                    <div class='modal-body'>
                                    </div>
                                    <div class='modal-footer'>
                                        <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
                                        <button type='button' class='btn btn-primary'>Send Message</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        </tr>";
            }
        }

        return $html;
        //owndebugger($students);
    }
        public function generate_results()
     {


         $this->data['eid'] = (isset($_GET['examm']) ? $_GET['examm'] : '0');
         $this->data['cid'] = (isset($_GET['classs']) ? $_GET['classs'] : '0');
         $this->data['sid'] = (isset($_GET['section']) ? $_GET['section'] : '0');
         $this->data['subid'] = (isset($_GET['subject']) ? $_GET['subject'] : '0');
         $this->data['sgid'] = (isset($_GET['groupp']) ? $_GET['groupp'] : '0');
         $this->data['year'] = (isset($_GET['year']) ? $_GET['year'] : '0');

         if ($this->data['eid'] == 0 OR $this->data['eid'] == NULL) {
             $this->status['status'] = 0;
             $this->status['msg'] = 'You must to select the exam';
             $this->status['eid'] = $this->data['eid'];
             $this->status['cid'] = $this->data['cid'];
             $this->status['sid'] = $this->data['sid'];
             $this->status['subid'] = $this->data['subid'];
             $this->status['sgid'] = $this->data['sgid'];
             echo jsonEncode($this->status);
         } else if ($this->data['cid'] == 0 OR $this->data['eid'] == NULL) {
             $this->status['status'] = 0;
             $this->status['msg'] = 'You must to select the class';
             $this->status['eid'] = $this->data['eid'];
             $this->status['cid'] = $this->data['cid'];
             $this->status['sid'] = $this->data['sid'];
             $this->status['subid'] = $this->data['subid'];
             $this->status['sgid'] = $this->data['sgid'];
             echo jsonEncode($this->status);
         } else if ($this->data['subid'] == 0 OR $this->data['eid'] == NULL) {
             $this->status['status'] = 0;
             $this->status['msg'] = 'You must to select a subject';
             $this->status['eid'] = $this->data['eid'];
             $this->status['cid'] = $this->data['cid'];
             $this->status['sid'] = $this->data['sid'];
             $this->status['subid'] = $this->data['subid'];
             $this->status['sgid'] = $this->data['sgid'];
             echo jsonEncode($this->status);
         } else {
             $thanks = $this->if_result_exists($this->data['eid'], $this->data['cid'], $this->data['sid'], $this->data['subid'], $this->data['sgid'], $this->data['year']);
             // owndebugger($thanks);

             if ($thanks->Total >= 1) {
                 $this->status['status'] = 1;
                 $this->status['msg'] = 'Results Exists. Modify results instead.';
                 $this->status['eid'] = $this->data['eid'];
                 $this->status['cid'] = $this->data['cid'];
                 $this->status['sid'] = $this->data['sid'];
                 $this->status['subid'] = $this->data['subid'];
                 $this->status['sgid'] = $this->data['sgid'];
                 echo jsonEncode($this->status);
             } else {
                 $this->results = $this->result_model->generateResults($this->data['eid'], $this->data['cid'], $this->data['sid'], $this->data['subid'], $this->data['sgid'], $this->data['year']);
                 if ($this->results) {
                     $this->status['status'] = 1;
                     $this->status['msg'] = 'Well done!';
                 } else {
                     $this->status['status'] = 0;
                     $this->status['msg'] = 'Sorry. We did not found any student based on your criteria.';
                 }

                 $this->status['eid'] = $this->data['eid'];
                 $this->status['cid'] = $this->data['cid'];
                 $this->status['sid'] = $this->data['sid'];
                 $this->status['subid'] = $this->data['subid'];
                 $this->status['sgid'] = $this->data['sgid'];
                 echo jsonEncode($this->status);
             }
         }
     }


    public function if_result_exists($eid, $cid, $sid, $subid, $sgid, $year)
    {
        $where = array(
            'Class' => $cid,
            'Section'=> $sid,
            'Year'=> $year,
            'GroupId'=> ($sgid == 0)? null: $sgid
        );

        $session_code = $eid.$cid.$sid.$year.$sgid;


        //$this->result_model->exit_result_session()

        if($this->result_model->exit_result_session($session_code)){
            $rs['rs_code'] = $session_code;
            $rs['rs_year'] = $year;
            $rs['rs_exam'] = $eid;
            $rs['rs_class'] = $cid;
            $rs['rs_section'] = $sid;
            $rs['rs_group'] = $sgid;


            $allsub = $this->result_model->getSubject($cid,$sgid);
            //owndebugger($allsub);exit;
            $rs_subject = '';
            foreach ($allsub as $sub) {
               $rs_subject .=  $sub->SettingsId.',';
            }
            $rs_subjects = rtrim($rs_subject,", ");
            $rs['rs_exam_sub'] = $rs_subjects;
            $this->db->insert('result_session', $rs);
        }

        $this->db->select('*');
        $this->db->where($where);
        $this->db->like('mandatory_subjects', $subid);
        $this->db->or_like('optional_subject', $subid);
        $exist_subject_students = $this->db->get($this->common_model->_studentSubjectsInfo)->result();

        $u_std_subjects_info = [];
        foreach ($exist_subject_students as $students) {
            $u_std_subjects_info[] .= $students->UserId.',';
        }

        $a1 = $u_std_subjects_info;

        $where2 = array(
            'Exams' => $eid,
            'Subjects' => $subid,
            'Classes' => $cid,
            'Sections'=> $sid,
            'AddedYear'=> $year,
            'StudyGroups'=> ($sgid == 0)? 0: $sgid
        );
        $this->db->select('*');
        $this->db->where($where2);
        $exist_students_results = $this->db->get($this->common_model->_results)->result();

        $exist_students_info = [];
        foreach ($exist_students_results as $exist_students_result) {
            $exist_students_info[] .= $exist_students_result->StudentId.',';
        }
        $a2 = $exist_students_info;
        $results = array_diff($a1,$a2);

        $subject_rule = $this->result_model->get_subject_info($subid);

        $subjectRule = array(
                          'descriptive_pass_mark' => $subject_rule->descriptive_pass_mark,
                          'mcq_pass_mark' => $subject_rule->mcq_pass_mark,
                          'practical_pass_mark' => $subject_rule->practical_pass_mark,
                          'cq' => $subject_rule->cq,
                          'mcq' => $subject_rule->mcq,
                          'practical' => $subject_rule->practical,
                          'FullMarks' => $subject_rule->FullMarks,
                          'PassMarks' => $subject_rule->PassMarks,
                          'mergeable' => $subject_rule->mergeable,
                          'merge_rename' => $subject_rule->merge_rename,
                          'mergeable_id' => $subject_rule->mergeable_id,
                          'subject_type' => $subject_rule->subject_type

                        );




        $subjectRule_json = jsonEncode($subjectRule, True);

            foreach ($results as $newid) {
                $data = [
                    'Exams'=> $eid,
                    'Classes'=> $cid,
                    'Subjects'=> $subid,
                    'Sections'=> $sid,
                    'StudyGroups'=> $sgid,
                    'StudentId'=> rtrim($newid,','),
                    'ClassRoll'=> tableSingleColumn($this->common_model->_studentSubjectsInfo, 'ClassRoll', ['UserId'=> rtrim($newid,',')]),
                    'AddedDate'=> date('Y-m-d h:i:s'),
                    'AddedYear'=> $year,
                    'IsAbsent'=> 0,
                    'isActive'=> 1,
                    'Subject_rule'=> $subjectRule_json,
                    'subject_sn'=> $subject_rule->subject_sl,
                    'op_subject' => tableSingleColumn($this->common_model->_studentSubjectsInfo, 'optional_subject', ['UserId'=> rtrim($newid,',')])

                ];

               $this->db->insert($this->common_model->_results, $data);
            }


        $thanks = $this->result_model->ifExists($eid, $cid, $sid, $subid, $sgid, $year);
        return $thanks;
    }
    public function subject_wise_result()
    {
        $this->data['filteredresults'] = $this->get_results_of_c_e_s_s(162, 1, 13, 51, 0);
        owndebugger($this->data['filteredresults']);

    }
    public function results_modification()
    {
        if ($this->ion_auth->logged_in()) {
            $this->data['userInformation'] = $this->ion_auth->user()->row();
        }
        $this->data['loggedinuserinformation'] = $this->basic_information_of_mine($this->data['userInformation']->id);
        $this->data['userid'] = $this->data['userInformation']->id;
        $this->data['title'] = "Result Modification";

        // '?dataid=' + dataid + '&absent=' + isabsval + '&written=' + written + '&mcq=' + mcq + '&practical=' + practical + '&listening=' + listening + '&writting=' + writting + '&speaking=' + speaking + '&reading=' + reading,

        $stdid = $this->uri->segment(2);
        $dataid = (isset($_GET['dataid']) ? $_GET['dataid'] : 0);
        // $absent = (isset($_GET['absent']) ? $_GET['absent'] : 0);
        /*$written = (isset($_GET['written']) ? $_GET['written'] : 0);
        $mcq = (isset($_GET['mcq']) ? $_GET['mcq'] : 0);
        $practical = (isset($_GET['practical']) ? $_GET['practical'] : 0);*/
        $data=[];
        if($this->input->get('absent'))
            $data['IsAbsent'] = ($this->input->get('absent') == 2 )? 0: 1 ;
        if($this->input->get('written'))
            $data['Written'] = $this->input->get('written');
        if($this->input->get('mcq'))
            $data['MCQ'] = $this->input->get('mcq');
        if($this->input->get('practical'))
            $data['Practical'] = $this->input->get('practical');
        // owndebugger($data);


        /*$data = array(
            'IsAbsent' => $absent,
            'Written' => $written,
            'MCQ' => $mcq,
            'Practical' => $practical
        );*/
        if (isset($dataid)) {
            $where = array('ResultId' => $dataid, 'StudentId' => $stdid);
            $this->results = $this->modify_marks($data, $where);
        }
        if ($this->results) {
            $this->status['status'] = 1;
            $this->status['msg'] = 'Well done!';
        } else {
            $this->status['status'] = 0;
            $this->status['msg'] = 'Sorry!';
        }
        echo jsonEncode($this->status);
    }
    public function results_data_grid()
    {
        if ($this->ion_auth->logged_in()) {
            $this->data['userInformation'] = $this->ion_auth->user()->row();
        }
        $this->data['loggedinuserinformation'] = $this->basic_information_of_mine($this->data['userInformation']->id);
        $this->data['userid'] = $this->data['userInformation']->id;
        $this->data['title'] = "All Results";

        $this->load->view('layouts/header', $this->data);
        $this->load->view('result/resultdatagrid', $this->data);
        $this->load->view('layouts/footer', $this->data);
    }
    public function results_excel_grid()
    {
        if($this->ion_auth->logged_in()) {
            $this->data['userInformation'] = $this->ion_auth->user()->row();
        }

        $this->data['eid'] = (isset($_GET['examm']) ? $_GET['examm'] : '0');
        $this->data['cid'] = (isset($_GET['classs']) ? $_GET['classs'] : '0');
        $this->data['sid'] = (isset($_GET['section']) ? $_GET['section'] : '0');
        $this->data['subid'] = (isset($_GET['subject']) ? $_GET['subject'] : '0');
        $this->data['sgid'] = (isset($_GET['groupp']) ? $_GET['groupp'] : '0');
        $this->data['year'] = (isset($_GET['year']) ? $_GET['year'] : '0');


        $where = array(
            'Exams' => $this->data['eid'],
            'Classes' => $this->data['cid'],
            'Sections'=> $this->data['sid'],
            'AddedYear'=> $this->data['year'],
            'StudyGroups'=> ($this->data['sgid'] == 0)? 0: $this->data['sgid']
        );

        $session_code = $this->data['eid'].$this->data['cid'].$this->data['sid']. $this->data['year'].$this->data['sgid'];
        $this->data['result_subject'] = $this->result_model->get_result_subject($session_code);

        $this->data['students'] = $this->result_model->get_result_by_criteria($where);

        $this->data['all_students_info'] = [];
        foreach ($this->data['students'] as $value) {
             //owndebugger($value->all_marks);
            $this->data['all_students_info'][] = getMarksWithSubject($value->StudentId, $value->ClassRoll, $value->all_marks, $value->mandatory_subjects, $value->optional_subject);
            // owndebugger($this->data['all_students_info'] );
        }




        $this->data['loggedinuserinformation'] = $this->basic_information_of_mine($this->data['userInformation']->id);
        $this->data['userid'] = $this->data['userInformation']->id;
        $this->data['title'] = "All Results";
        $this->data['classes'] = $this->common_model->get_settings(1);
        $this->data['sections'] = $this->common_model->get_settings(2);
        $this->data['subjects'] = $this->common_model->get_settings(4);
        $this->data['exams'] = $this->common_model->get_settings(5);
        $this->data['groups'] = $this->common_model->get_settings(6);

        $this->load->view('layouts/header', $this->data);
        $this->load->view('result/result_excel', $this->data);
        $this->load->view('layouts/footer', $this->data);
    }
    public function get_individual_result() {
        if ($this->ion_auth->logged_in()) {
            $this->data['userInformation'] = $this->ion_auth->user()->row();
        }
        $this->data['loggedinuserinformation'] = $this->basic_information_of_mine($this->data['userInformation']->id);
        $this->data['userid'] = $this->data['userInformation']->id;
        $this->data['title'] = "Get Individual Result";
         $this->load->model('result_model');

        $this->data['eid'] = (isset($_GET['examm']) ? $_GET['examm'] : '0');
        $this->data['cid'] = (isset($_GET['classs']) ? $_GET['classs'] : '0');
        $this->data['sid'] = (isset($_GET['section']) ? $_GET['section'] : '0');
        $this->data['subid'] = (isset($_GET['subject']) ? $_GET['subject'] : '0');
        $this->data['sgid'] = (isset($_GET['groupp']) ? $_GET['groupp'] : '0');
        $this->data['year'] = (isset($_GET['year']) ? $_GET['year'] : '0');
        $this->data['msg'] = (isset($_GET['msg']) ? $_GET['msg'] : 'Select Appropriate Exam, Class, Section, Subject and Group to Generate the Result.');


        $this->data['classes'] = $this->common_model->get_settings(1);
        $this->data['sections'] = $this->common_model->get_settings(2);
        $this->data['subjects'] = $this->common_model->get_settings(4);
        $this->data['exams'] = $this->common_model->get_settings(5);
        $this->data['groups'] = $this->common_model->get_settings(6);

        $this->data['ui'] = $this->input->get('studentid');
        $this->data['examid'] = $this->input->get('examid');
        $this->data['yearid'] = $this->input->get('yearid');

        if (!empty($this->data['ui'])) {
            $this->data['biodata'] = $this->common_model->get_user_single_informations_by_user_id($this->data['ui']);

           // $this->data['result'] = $this->get_result_by_user_id_by_year($this->data['ui'], $this->data['examid'], $this->data['yearid']);

              // $this->data['result'] = $this->db->get_where('results', ['StudentId' => $this->data['ui'], 'Classes' => $this->data['cid'], 'Exams' => $this->data['examid'], 'Sections' => $this->data['sid'], 'AddedYear' => $this->data['yearid']])->result_array();

            $this->data['result'] = $this->db->where(['StudentId' => $this->data['ui'], 'Classes' => $this->data['cid'], 'Exams' => $this->data['examid'], 'Sections' => $this->data['sid'], 'AddedYear' => $this->data['yearid']])
              ->order_by('subject_sn', 'ASC')
              ->get('results')
              ->result_array();
        }

        //owndebugger($this->data['result']);

        $this->load->view('layouts/header', $this->data);
        $this->load->view('reports/individualresult', $this->data);
        $this->load->view('layouts/footer', $this->data);
    }

    public function get_individual_admitcart() {
        if ($this->ion_auth->logged_in()) {
            $this->data['userInformation'] = $this->ion_auth->user()->row();
        }


        $offset = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        $this->data['g_title'] = (isset($_GET['g_title']) ? $_GET['g_title'] : '0');
        if($this->data['g_title'] == 4){
          $per_page_limit = 12;
        }else {
          $per_page_limit = 10;
        }

        $url = base_url('getindividualadmitcart');
        $search = array(
            'student' => $this->input->get('studentid'),
            'exam' => $this->input->get('examid'),
            'class' => $this->input->get('classs'),
            'section' => $this->input->get('section'),
            'limit' => $per_page_limit,
            'offset' => $offset,
        );

        $this->data['report'] = $this->common_model->document_report($search);
        $total_rows = $this->common_model->document_report_total($search);
        $this->data['paging'] = paging($total_rows, $per_page_limit, $url);

        $this->data['loggedinuserinformation'] = $this->basic_information_of_mine($this->data['userInformation']->id);
        $this->data['userid'] = $this->data['userInformation']->id;
        $this->data['title'] = "Get Individual Result";
         $this->data['cid'] = (isset($_GET['classs']) ? $_GET['classs'] : '0');
         $this->data['sid'] = (isset($_GET['section']) ? $_GET['section'] : '0');

         $this->data['classes'] = $this->common_model->get_settings(1);
         $this->data['sections'] = $this->common_model->get_settings(2);
         $this->data['exams'] = $this->common_model->get_settings(5);

         $this->data['examid'] = $this->input->get('examid');
         $this->data['yearid'] = $this->input->get('yearid');
        $this->load->view('layouts/header', $this->data);
        $this->load->view('reports/individual_admitcart', $this->data);
        $this->load->view('layouts/footer', $this->data);
    }






    public function get_all_individual_result() {
        if ($this->ion_auth->logged_in()) {
            $this->data['userInformation'] = $this->ion_auth->user()->row();
        }
        $this->data['loggedinuserinformation'] = $this->basic_information_of_mine($this->data['userInformation']->id);
        $this->data['userid'] = $this->data['userInformation']->id;
        $this->data['title'] = "Get Individual Result";

        $this->data['eid'] = (isset($_GET['examm']) ? $_GET['examm'] : '0');
        $this->data['cid'] = (isset($_GET['classs']) ? $_GET['classs'] : '0');
        $this->data['sid'] = (isset($_GET['section']) ? $_GET['section'] : '0');
        $this->data['subid'] = (isset($_GET['subject']) ? $_GET['subject'] : '0');
        $this->data['sgid'] = (isset($_GET['groupp']) ? $_GET['groupp'] : '0');
        $this->data['year'] = (isset($_GET['year']) ? $_GET['year'] : '0');
        $this->data['msg'] = (isset($_GET['msg']) ? $_GET['msg'] : 'Select Appropriate Exam, Class, Section, Subject and Group to Generate the Result.');


        $this->data['classes'] = $this->common_model->get_settings(1);
        $this->data['sections'] = $this->common_model->get_settings(2);
        $this->data['subjects'] = $this->common_model->get_settings(4);
        $this->data['exams'] = $this->common_model->get_settings(5);
        $this->data['groups'] = $this->common_model->get_settings(6);



        $this->data['ui'] = $this->input->get('studentid');
        $this->data['examid'] = $this->input->get('examid');
        $this->data['yearid'] = $this->input->get('yearid');
        if (!empty($this->data['ui'])) {
            $this->data['biodata'] = $this->common_model->get_user_single_informations_by_user_id($this->data['ui']);
            //$this->data['result'] = $this->get_result_by_user_id_by_year($this->data['ui'], $this->data['examid'], $this->data['yearid']);
            $this->data['result'] = $this->db->get_where('results', ['StudentId' => $this->data['ui'], 'Classes' => $this->data['cid'], 'Sections' => $this->data['sid'], 'AddedYear' => $this->data['yearid']])->row();
           // echo $this->db->last_query();
        }

       // owndebugger($this->data['result']);
        //die();

        $this->load->view('layouts/header', $this->data);
        $this->load->view('reports/individualresult_all', $this->data);
        $this->load->view('layouts/footer', $this->data);
    }
    public function get_results_of_c_e_s_s($eid, $cid, $sid, $subid, $sgid, $year)
    {
        return $this->result_model->getSubjectWiseResults($eid, $cid, $sid, $subid, $sgid, $year);
    }
    public function get_all_results_by_ajax()
    {
        echo $this->result_model->getAllResults();
    }
    public function get_result_by_user_id_by_year($ui, $examid, $year)
    {
        return $this->reports_model->getResultByUserByYear($ui, $examid, $year);
    }
    public function modify_marks($data, $where)
    {
        return $this->result_model->modify_single_mark($data, $where);
    }
    public function results_summary_by_semester(){
        if ($this->ion_auth->logged_in()) {
            $this->data['userInformation'] = $this->ion_auth->user()->row();
        }
        $this->data['loggedinuserinformation'] = $this->basic_information_of_mine($this->data['userInformation']->id);
        $this->data['userid'] = $this->data['userInformation']->id;
        $this->data['title'] = "Search Results";

        $this->data['eid'] = (isset($_GET['examm']) ? $_GET['examm'] : '0');
        $this->data['cid'] = (isset($_GET['classs']) ? $_GET['classs'] : '0');
        $this->data['sid'] = (isset($_GET['section']) ? $_GET['section'] : '0');
        $this->data['subid'] = (isset($_GET['subject']) ? $_GET['subject'] : '0');
        $this->data['sgid'] = (isset($_GET['groupp']) ? $_GET['groupp'] : '0');
        $this->data['year'] = (isset($_GET['year']) ? $_GET['year'] : '0');
        $this->data['msg'] = (isset($_GET['msg']) ? $_GET['msg'] : 'Select Appropriate Exam, Class, Section, Subject and Group to Generate the Result.');


        $this->data['classes'] = $this->common_model->get_settings(1);
        $this->data['sections'] = $this->common_model->get_settings(2);
        $this->data['subjects'] = $this->common_model->get_settings(4);
        $this->data['exams'] = $this->common_model->get_settings(5);
        $this->data['groups'] = $this->common_model->get_settings(6);


        $prm = $this->uri->segment('2');
        $offset = $this->input->get('per_page');
        $offset = (!empty($offset) ? $offset : 0);
        $limit = 2000;

        $search = array(
            'Classes' => $this->data['cid'],
            'Sections' =>  $this->data['sid'],
            'StudyGroups' => $this->data['sgid'],
            'Subjects' => $this->data['subid'],
            'AddedYear' => $this->data['year'],
            'limit' => $limit,
            'offset' => $offset,
            'prm' => $prm
        );
        $this->data['students'] = $this->result_model->get_subjectwise_student_list($search);
        $this->load->library('pagination');
        $config['total_rows'] = $this->result_model->count_subjectwise_student_list($search);
        $config['per_page'] = $limit;
        $config['enable_query_strings'] = TRUE;
        $config['page_query_string'] = TRUE;
        $config['reuse_query_string'] = TRUE;
        $config['use_page_numbers'] = FALSE;
        $config['cur_tag_open'] = '&nbsp;<a class="active">';
        $config['cur_tag_close'] = '</a>';
        $config['base_url'] = base_url('searchresult');
        $this->pagination->initialize($config);
        $this->data['paging'] = $this->pagination->create_links();
        $this->load->view('layouts/header', $this->data);
        $this->load->view('result/semester-results', $this->data);
        $this->load->view('layouts/footer', $this->data);
    }
}
?>
