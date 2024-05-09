<?php

/**
 * Class Profile_model
 *
 * @property Common_model $common_model Common models navigator
 */
class Result_model extends Common_model
{

    public function __construct(){
        parent::__construct();
    }


    function get_student_list($search){
        $this->db->select('*');
        $this->db->where('isActive', 1);
        $this->db->where('Class', $search['Class']);
        $this->db->where('Section', $search['Section']);
        $this->db->order_by('ClassRoll', 'ASC');
        $query = $this->db->get('u_std_information', $search['limit'], $search['offset']);
        $row = $query->result_array();
        return $row;
    }
    function count_student_list($search){
        $this->db->select('*');
        $this->db->where('isActive', 1);
        $this->db->where('Class', $search['Class']);
        $this->db->where('Section', $search['Section']);
        $row = $this->db->count_all_results('u_std_information');
        return $row;
    }

    function get_result_student_list($search){
        $this->db->select('*');
        $this->db->where('isActive', 1);
        $this->db->where('Classes', $search['Classes']);
        $this->db->where('Sections', $search['Sections']);
        $this->db->where('StudyGroups', $search['StudyGroups']);
        $this->db->where('AddedYear', $search['AddedYear']);
        $this->db->group_by("StudentId");
        $this->db->order_by('ClassRoll', 'ASC');
        // $this->db->group_by("StudentId");
        // $this->db->distinct();
        $query = $this->db->get($this->_results, $search['limit'], $search['offset']);
        $row = $query->result_array();
        // echo $this->db->last_query;
        return $row;
    }
    function count_result_student_list($search){
        $this->db->select('*');
        $this->db->where('isActive', 1);
        $this->db->where('Classes', $search['Classes']);
        $this->db->where('Sections', $search['Sections']);
        $this->db->where('StudyGroups', $search['StudyGroups']);
        $this->db->where('AddedYear', $search['AddedYear']);
        $this->db->group_by("StudentId");
        $this->db->order_by('ClassRoll', 'ASC');
        // $this->db->distinct();
        $row = $this->db->count_all_results($this->_results);
        return $row;
    }

    public function get_subject_info($id){
      $data =   $this->db->select('*')
                ->from('initial_settings_info')
                ->where('SettingsId',$id)
                ->get()
                ->row();
      return $data;
    }

    public function get_student_subjects_info($user_id){
      $data =   $this->db->select('*')
                ->from('u_std_subjects_info')
                ->where('UserId', $user_id)
                ->get()
                ->row();
      return $data;
    }

    function get_subjectwise_student_list($search){
        $this->db->select('*');
        $this->db->where('isActive', 1);
        $this->db->where('Classes', $search['Classes']);
        $this->db->where('Sections', $search['Sections']);
        $this->db->where('StudyGroups', $search['StudyGroups']);
        $this->db->where('Subjects', $search['Subjects']);
        $this->db->where('AddedYear', $search['AddedYear']);
        $this->db->order_by('ClassRoll', 'ASC');
        $query = $this->db->get($this->_results, $search['limit'], $search['offset']);
        $row = $query->result_array();
        return $row;
    }

    function count_subjectwise_student_list($search){
        $this->db->select('*');
        $this->db->where('isActive', 1);
        $this->db->where('Classes', $search['Classes']);
        $this->db->where('Sections', $search['Sections']);
        $this->db->where('StudyGroups', $search['StudyGroups']);
        $this->db->where('Subjects', $search['Subjects']);
        $this->db->where('AddedYear', $search['AddedYear']);
        $row = $this->db->count_all_results($this->_results);
        return $row;
    }

    public function get_result_by_criteria($where)
    {

        $sql = " SELECT
                     nn.*,
                     (SELECT GROUP_CONCAT(CONCAT_WS('|', Subjects, IsAbsent, IFNULL(Written,0), IFNULL(MCQ,0), IFNULL(Practical, 0),IFNULL(ResultId, 0)) SEPARATOR ',') AS eduhis

                     FROM results
                       WHERE
                       StudentId = nn.`StudentId`
                       AND `Exams` = ".$where['Exams']."
                       AND `Classes` = ".$where['Classes']."
                       AND `Sections` = ".$where['Sections'] ."
                       AND `AddedYear` = ".$where['AddedYear']."
                       AND `StudyGroups` = ".$where['StudyGroups'].") AS all_marks
                    FROM
                    (
                     SELECT
                      `results`.*, `u_std_subjects_info`.mandatory_subjects, `u_std_subjects_info`.optional_subject
                     FROM `results`
                     LEFT JOIN `u_std_subjects_info`
                     ON `u_std_subjects_info`.`UserId` = `results`.`StudentId`
                      WHERE `Exams` = ".$where['Exams']."
                      AND `Classes` = ".$where['Classes']."
                      AND `Sections` = ".$where['Sections']."
                      AND `AddedYear` = ".$where['AddedYear'] ."
                      AND `StudyGroups` = ".$where['StudyGroups']."
                      GROUP BY `StudentId`
                    ) AS nn  ORDER BY nn.ClassRoll ASC
                ";
        $query = $this->db->query($sql);
        // echo $this->db->last_query();
        //
        // die();
        $record = $query->result();
       // print_r($record); exit;
        return $record;

    }

    public function generateResults($eid, $cid, $sid, $subid, $sgid, $yy)
    {
       $where = array(
            'Class' => $cid,
            'Section'=> $sid,
            'Year'=> $yy,
            'GroupId'=> ($sgid == 0)? null: $sgid
        );

        $this->db->select('*');
        $this->db->where($where);
        $this->db->like('mandatory_subjects', $subid);
        $this->db->or_like('optional_subject', $subid);
        $exist_subject_students = $this->db->get($this->_studentSubjectsInfo)->result();
        // owndebugger($exist_subjects);
        // echo $this->db->last_query();
        if($exist_subject_students){
            foreach ($exist_subject_students as $student) {
                $data = [
                    'Exams'=> $eid,
                    'StudentId'=> $student->UserId,
                    'ClassRoll'=> $student->ClassRoll,
                    'Classes'=> $cid,
                    'Subjects'=> $subid,
                    'Subjects'=> $subid,
                    'StudyGroups'=> $sgid,
                    'AddedDate'=> date('Y-m-d h:i:s'),
                    'AddedYear'=> $yy,
                    'IsAbsent'=> 0,
                    'isActive'=> 1,
                ];
                $this->db->insert($this->_results, $data);
            }

        }

       /* if($exist_subjects)
        {
            $this->db->query('INSERT INTO ' . $this->_results . ' (Exams, Classes, Subjects, Sections, StudyGroups, StudentId, AddedDate, AddedYear,IsAbsent, isActive) SELECT ' . $eid . ', si.Class, ' . $subid . ', si.Section, IF(' . $sgid . ', ' . $sgid . ', 0), p.user_id, NOW(), '.$yy.', 0, 1
            FROM ' . $this->_usersGroups . ' AS p
            LEFT JOIN ' . $this->_studentInformation . ' AS si
            ON p.user_id = si.UserId
            WHERE p.group_id = 4 AND si.Class = ' . $cid . ' AND si.Section = ' . $sid .' ');
            // echo $this->db->last_query();
            return $this->db->affected_rows();

        }*/
       /* */

        /*$this->db->query('INSERT INTO ' . $this->_results . ' (Exams, Classes, Subjects, Sections, StudyGroups, StudentId, AddedDate, AddedYear,IsAbsent, isActive) SELECT ' . $eid   . ', si.Class, ' . $subid . ', si.Section, IF(' . $sgid . ', ' . $sgid . ', 0), p.user_id, NOW(), '.$yy.', 0, 1
        FROM ' . $this->_usersGroups . ' AS p
        LEFT JOIN ' . $this->_studentInformation . ' AS si
        ON p.user_id = si.UserId
        WHERE p.group_id = 4 AND si.Class = ' . $cid . ' AND si.Section = ' . $sid . '');
        // echo $this->db->last_query();
        return $this->db->affected_rows();*/

//        $this->db->query('INSERT INTO results (Exams, Classes, Subjects, Sections, StudyGroups, StudentId, AddedDate, AddedYear, isActive) LEFT JOIN ' . $this->_studentSubjectsInfo . ' AS subinfo
//              SELECT 162, si.Class, 51, si.Section, 0, p.user_id, NOW(), YEAR(NOW()), 1
//            FROM users_groups AS p
//            LEFT JOIN u_std_information AS si
//            ON p.user_id = si.UserId
//            WHERE p.group_id = 4 AND si.Class = 1 AND si.Section = 1');
        //return $this->db->affected_rows();
    }

    public function ifExists($eid, $cid, $sid, $subid, $sgid, $year)
    {
        $sql = 'SELECT COUNT(*) AS Total FROM ' . $this->_results . ' WHERE (Exams = ' . $eid . ' AND Classes = ' . $cid . ' AND Sections = ' . $sid . ' AND Subjects = ' . $subid . '  AND StudyGroups = ' . $sgid . ' AND AddedYear = ' . $year . ')';
        $query = $this->db->query($sql);
        $record = $query->row();
        return $record;
    }



    public function getResultsOfAClassExamSubjectGroupSection($eid, $cid, $sid, $subid, $sgid)
    {
        $result = $this->db->select('*')->from($this->_results)
            ->where('Exams', $eid)
            ->where('Classes', $cid)
            ->where('Sections', $sid)
            ->where('Subjects', $subid)
            ->where('StudyGroups', $sgid)
            ->group_by('Exams', 'Classes', 'Sections', 'Subjects', 'StudyGroups', 'StudentId');

        $rows = $this->db->get();
        //owndebugger($rows);
        return $rows;
    }
    public function getSubjectWiseResults($eid, $cid, $sid, $subid, $sgid, $year)
    {
        $result = $this->db->select('
			ResultId,
			StudentId,
            IsAbsent,
			(SELECT full_name_bn FROM users WHERE id = results.StudentId LIMIT 0,1) AS StudentName,
			(SELECT ClassRoll FROM u_std_information WHERE UserId = results.StudentId LIMIT 0,1) AS ClassRoll,
			(SELECT SettingsName FROM initial_settings_info WHERE SettingsId = results.Classes LIMIT 0,1) AS ClassName,
			(SELECT SettingsName FROM initial_settings_info WHERE SettingsId = results.Sections LIMIT 0,1) AS SectionName,
			(SELECT SettingsName FROM initial_settings_info WHERE SettingsId = results.StudyGroups LIMIT 0,1) AS GroupName,
			(SELECT SettingsName FROM initial_settings_info WHERE SettingsId = results.Exams LIMIT 0,1) AS ExamName,
			(SELECT SettingsName FROM initial_settings_info WHERE SettingsId = results.Subjects LIMIT 0,1) AS SubjectName,
			Written, MCQ, Practical, Listening, Writting, Speaking, Reading, AddedDate, AddedYear,Subject_rule
        ')->from($this->_results)
            ->where('Exams', $eid)
            ->where('Classes', $cid)
            ->where('Sections', $sid)
            ->where('Subjects', $subid)
            ->where('StudyGroups', $sgid)
            ->where('AddedYear', $year)
            ->order_by('ClassRoll', 'ASC');

        $rows = $this->db->get();
        if($rows->num_rows() > 0) {
			return $rows->result_array();
		}
        //owndebugger($rows);
        //return $rows;
    }



    public function getAllResults()
    {
        $this->datatables
            ->select('ResultId,
                (SELECT full_name_bn FROM users WHERE id = results.StudentId LIMIT 0,1) AS StudentName,
                (SELECT SettingsName FROM initial_settings_info WHERE SettingsId = results.Classes LIMIT 0,1) AS ClassName,
                (SELECT SettingsName FROM initial_settings_info WHERE SettingsId = results.Sections LIMIT 0,1) AS SectionName,
                (SELECT SettingsName FROM initial_settings_info WHERE SettingsId = results.StudyGroups LIMIT 0,1) AS GroupName,
                (SELECT SettingsName FROM initial_settings_info WHERE SettingsId = results.Exams LIMIT 0,1) AS ExamName,
                (SELECT SettingsName FROM initial_settings_info WHERE SettingsId = results.Subjects LIMIT 0,1) AS SubjectName,
                Written, MCQ, Practical, Speaking, Reading, Listening, AddedDate, AddedYear')
            ->from($this->_results)
            ->add_column('Edit', '<a href="' . base_url() . 'editresult/$1" target="_blank"><i class="fa fa-pencil fa-fw"></i></a>', 'ResultId');
            //->add_column('Delete', '<a onclick="ajaxRemoveFn($1,\'deletepage/$1\')" href="javascript:void(0)"><i class="fa fa-trash-o fa-fw"></i></a>', 'ResultId');

        $q = $this->datatables->generate();
        return $q;
    }

    public function modify_single_mark($data, $where)
    {
        $data = $this->updateRecords($this->common_model->_results, $data, $where);
        return $data;
    }
    public function exit_result_session($code){

        $row = $this->db->select('*')
                ->from('result_session')
                ->where('rs_code', $code)
                ->get()->num_rows();
        if($row > 0){
            return false;
        }else{
             return true;
        }
    }
    public function getSubject($cid,$sgid){

         if(($cid > 8) && ($cid < 11)){
            $level = 2;
          }elseif($cid > 10){
            $level = 3;
          }else{
            $level = 1;
          }
                $this->db->select('SettingsId');
                $this->db->from('initial_settings_info');
                $this->db->where('SettingsCategory', 4);
                $this->db->where('status_type', 'Active');
                $this->db->where('class_level',  $level);
                if($level != 1){
                    $this->db->where_in('groups', (int)$sgid);
                }
                $this->db->order_by('subject_sl', 'ASC');

           $row = $this->db->get()->result();

        return $row;
            // $this->db->get();
            // echo $this->db->last_query();

    }

    public function get_result_subject($code){
        $row = $this->db->select('*')
                ->from('result_session')
                ->where('rs_code', $code)
                ->get()->result();
        return $row;
    }



}

?>
