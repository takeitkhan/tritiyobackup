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




    public function generateResults($eid, $cid, $sid, $subid, $sgid, $yy)
    {
        $this->db->query('INSERT INTO ' . $this->_results . ' (Exams, Classes, Subjects, Sections, StudyGroups, StudentId, AddedDate, AddedYear,IsAbsent, isActive) SELECT ' . $eid . ', si.Class, ' . $subid . ', si.Section, IF(' . $sgid . ', ' . $sgid . ', 0), p.user_id, NOW(), '.$yy.', 0, 1
        FROM ' . $this->_usersGroups . ' AS p
        LEFT JOIN ' . $this->_studentInformation . ' AS si
        ON p.user_id = si.UserId
        WHERE p.group_id = 4 AND si.Class = ' . $cid . ' AND si.Section = ' . $sid . '');
        return $this->db->affected_rows();

//        $this->db->query('INSERT INTO results (Exams, Classes, Subjects, Sections, StudyGroups, StudentId, AddedDate, AddedYear, isActive)
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
			(SELECT full_name_bn FROM users WHERE id = results.StudentId LIMIT 0,1) AS StudentName,
			(SELECT ClassRoll FROM u_std_information WHERE UserId = results.StudentId LIMIT 0,1) AS ClassRoll,
			(SELECT SettingsName FROM initial_settings_info WHERE SettingsId = results.Classes LIMIT 0,1) AS ClassName,
			(SELECT SettingsName FROM initial_settings_info WHERE SettingsId = results.Sections LIMIT 0,1) AS SectionName,
			(SELECT SettingsName FROM initial_settings_info WHERE SettingsId = results.StudyGroups LIMIT 0,1) AS GroupName,
			(SELECT SettingsName FROM initial_settings_info WHERE SettingsId = results.Exams LIMIT 0,1) AS ExamName,
			(SELECT SettingsName FROM initial_settings_info WHERE SettingsId = results.Subjects LIMIT 0,1) AS SubjectName,
			Written, MCQ, Practical, Listening, Writting, Speaking, Reading, AddedDate, AddedYear
        ')->from($this->_results)
            ->where('Exams', $eid)
            ->where('Classes', $cid)
            ->where('Sections', $sid)
            ->where('Subjects', $subid)
            ->where('StudyGroups', $sgid)
            ->where('AddedYear', $year)
            ->order_by('StudentId', 'ASC');

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
//
//SELECT
//ResultId,
//(SELECT SettingsName FROM initial_settings_info WHERE SettingsId = results.Exams LIMIT 0,1) AS ExamName,
//(SELECT SettingsName FROM initial_settings_info WHERE SettingsId = results.Classes LIMIT 0,1) AS ClassName,
//(SELECT SettingsName FROM initial_settings_info WHERE SettingsId = results.Sections LIMIT 0,1) AS SectionName,
//(SELECT SettingsName FROM initial_settings_info WHERE SettingsId = results.StudyGroups LIMIT 0,1) AS GroupName,
//(SELECT full_name_bn FROM users WHERE id = results.StudentId LIMIT 0,1) AS StudentName,
//Written,
//MCQ,
//Practical,
//Speaking,
//Reading,
//Listening
//FROM results
}

?>