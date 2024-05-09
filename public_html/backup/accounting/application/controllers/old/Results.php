<?php
if (! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @property Uploader $uploader Uploader Class Library
 * @property Common_model $common_model Uploader Class Library
 * @property Profile_model $profile_model Profile Class Library
 * @property ion_auth_model $ion_auth_model ion_auth_model Library
 * @property result_model $result_model ion_auth_model Library
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
        $this->data['subjects'] = $this->common_model->get_settings(4);
        $this->data['exams'] = $this->common_model->get_settings(5);
        $this->data['groups'] = $this->common_model->get_settings(6);


        $this->data['allresults'] = $this->get_results_of_c_e_s_s($this->data['eid'], $this->data['cid'], $this->data['sid'], $this->data['subid'], $this->data['sgid'],$this->data['year']);
        $this->load->view('layouts/header', $this->data);
        $this->load->view('result/resultgenerator', $this->data);
        $this->load->view('layouts/footer', $this->data);
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
        $limit = 1;

        $search = array(
            'Section' =>  $this->data['sid'],
            'Class' => $this->data['cid'],
            'limit' => $limit,
            'offset' => $offset,
            'prm' => $prm
        );
        $this->data['students'] = $this->result_model->get_student_list($search);
        $this->load->library('pagination');
        $config['total_rows'] = $this->result_model->count_student_list($search);
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

        //owndebugger($_GET);


        //$this->data['allresults'] = $this->get_results_of_c_e_s_s($this->data['eid'], $this->data['cid'], $this->data['sid'], $this->data['subid'], $this->data['sgid'],$this->data['year']);


        //$this->data['searchresults'] = @$this->filter_results($this->data['eid'], $this->data['sid'], $this->data['cid'], $this->data['year']);


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

//    public function global_results() {
//        echo "asd";
//    }

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
        $absent = (isset($_GET['absent']) ? $_GET['absent'] : 0);
        $written = (isset($_GET['written']) ? $_GET['written'] : 0);
        $mcq = (isset($_GET['mcq']) ? $_GET['mcq'] : 0);
        $practical = (isset($_GET['practical']) ? $_GET['practical'] : 0);
        $listening = (isset($_GET['listening']) ? $_GET['listening'] : 0);
        $writting = (isset($_GET['writting']) ? $_GET['writting'] : 0);
        $speaking = (isset($_GET['speaking']) ? $_GET['speaking'] : 0);
        $reading = (isset($_GET['reading']) ? $_GET['reading'] : 0);

        $data = array(
            'IsAbsent' => $absent,
            'Written' => $written,
            'MCQ' => $mcq,
            'Practical' => $practical,
            'Listening' => $listening,
            'Writting' => $writting,
            'Speaking' => $speaking,
            'Reading' => $reading
        );
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
    public function get_individual_result() {
        if ($this->ion_auth->logged_in()) {
            $this->data['userInformation'] = $this->ion_auth->user()->row();
        }
        $this->data['loggedinuserinformation'] = $this->basic_information_of_mine($this->data['userInformation']->id);
        $this->data['userid'] = $this->data['userInformation']->id;
        $this->data['title'] = "Get Individual Result";
        
        $this->data['exams'] = $this->common_model->get_settings(5);
        
        $this->data['ui'] = $this->input->post('studentid');
        $this->data['examid'] = $this->input->post('examid');
        $this->data['yearid'] = $this->input->post('yearid');
        
        if (!empty($this->data['ui'])) {
            $this->data['biodata'] = $this->common_model->get_user_single_informations_by_user_id($this->data['ui']);
            $this->data['result'] = $this->get_result_by_user_id_by_year($this->data['ui'], $this->data['examid'], $this->data['yearid']);                        
        }
        
        $this->load->view('layouts/header', $this->data);
        $this->load->view('reports/individualresult', $this->data);
        $this->load->view('layouts/footer', $this->data);
    }
    public function get_all_individual_result() {
        if ($this->ion_auth->logged_in()) {
            $this->data['userInformation'] = $this->ion_auth->user()->row();
        }
        $this->data['loggedinuserinformation'] = $this->basic_information_of_mine($this->data['userInformation']->id);
        $this->data['userid'] = $this->data['userInformation']->id;
        $this->data['title'] = "Get Individual Result";

        $this->data['exams'] = $this->common_model->get_settings(5);

        $this->data['ui'] = $this->input->get('studentid');
        $this->data['examid'] = $this->input->get('examid');
        $this->data['yearid'] = $this->input->get('yearid');
        if (!empty($this->data['ui'])) {
            $this->data['biodata'] = $this->common_model->get_user_single_informations_by_user_id($this->data['ui']);
            //$this->data['result'] = $this->get_result_by_user_id_by_year($this->data['ui'], $this->data['examid'], $this->data['yearid']);
            $this->data['result'] = $this->db->get_where('results', ['StudentId' => $this->data['ui'], 'AddedYear' => $this->data['yearid']])->row();
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
}

?>