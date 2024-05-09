<?php

/**
 * Class Reports_model
 *
 * @property Common_model $common_model Common models navigator
 */
class Reports_model extends Common_model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getPaymentByUserByDate($id, $sd, $ed)
    {
        $this->db->select('*, (SELECT full_name_bn FROM users WHERE id = UserId) AS ReceivedBy,
	        (SELECT LedgerName FROM ' . $this->_ledgernames . ' WHERE TypeId = LedgerNameId) AS LedgerName, Amount, AdditionalNote')
            ->from($this->_paymentsentries)
            ->where('TransactionWith', $id)
            ->where('PaymentDate >=', $sd)
            ->where('PaymentDate <=', $ed)
            ->order_by('PaymentId', 'ASC');
        $result = $this->db->get();
        $rows = $result->result_array();
        //owndebugger($rows);
        return $rows;
    }
    public function getResultByUserByYear($id, $class, $section, $examid, $year)
    {
        $this->db->select('t1.ResultId, t1.Subjects,t2.SettingsDescription AS subject_name,(t2.cq) + (t2.mcq) + (t2.practical) as FullMarks,(t2.descriptive_pass_mark) + (t2.mcq_pass_mark) + (t2.practical_pass_mark) as PassMarks,
                t1.IsAbsent, t1.Written, t1.MCQ, t1.Practical, t1.AddedDate, t1.AddedYear, t1.isActive')
            ->from($this->_results.' as t1')
            ->where('t1.StudentId', $id)
            ->where('t1.Sections', $section)
            ->where('t1.Classes', $class)
            ->where('t1.Exams', $examid)
            ->where('t1.AddedYear', $year)
            ->join('initial_settings_info as t2','t2.SettingsId = t1.Subjects','LEFT')
            ->order_by('t1.Subjects', 'ASC');
        $result = $this->db->get();
        //ob_clean();
         // echo $this->db->last_query();
        $rows = $result->result_array();
        //owndebugger($rows);
        return $rows;
    }
    public function getSubjectResultByUserByYear($id, $subject, $class, $section, $examid, $year)
    {
        $this->db->select('ResultId, Subjects, (SELECT SettingsDescription FROM initial_settings_info WHERE SettingsId = Subjects) AS subject_name,
                IsAbsent, Written, MCQ, Practical, AddedDate, AddedYear, isActive')
            ->from($this->_results)
            ->where('StudentId', $id)
            ->where('Exams', $examid)
            ->where('Classes', $class)
            ->where('Sections', $section)
            ->where('Subjects', $subject)
            ->where('AddedYear', $year)
            // ->group_by("StudentId")
            ->order_by('Subjects', 'ASC');
        $result = $this->db->get();
        //ob_clean();
        // echo $this->db->last_query();
        $rows = $result->result_array();
        //owndebugger($rows);
        return $rows;
    }

    public function myStdAttendanceDateBetween($id, $sd, $ed)
    {
        $this->db->select('*,
            (SELECT full_name_bn FROM users WHERE id = UserId) AS fullnamebn,
            (SELECT full_name_en FROM users WHERE id = UserId) AS fullnameen,
            DATE_FORMAT(AttDate, \'%Y-%m-%d\') AS dateofatt,
	        DATE_FORMAT(AttDate, \'%Y-%m-%d\') AS AttDate, IF(isAbsent = 0, \'Present\', \'Absent\') AS PrsStatus')
            ->from($this->_attendance)
            ->where('UserId', $id)
            ->where('AttDate >=', $sd)
            ->where('AttDate <=', $ed);
        $result = $this->db->get();
        $rows = $result->result_array();
        //owndebugger($rows);
        return $rows;
    }

    public function getIndividualResult($id, $exam)
    {
        $this->db->select('*,
            (SELECT SettingsName FROM initial_settings_info WHERE SettingsId = results.Subjects) AS subnameen,
            (SELECT SettingsDescription FROM initial_settings_info WHERE SettingsId = results.Subjects) AS subnamebn')
            ->from($this->_results)
            ->where('StudentId', $id);

        $rows = $this->db->get();
        if ($rows->num_rows() > 0) {
            return $rows->result_array();
        }
    }

}