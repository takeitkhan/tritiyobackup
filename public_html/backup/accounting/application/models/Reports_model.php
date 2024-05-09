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
    public function getResultByUserByYear($id, $examid, $year)
    {
        $this->db->select('ResultId, Subjects, (SELECT SettingsName FROM initial_settings_info WHERE SettingsId = Subjects) AS subject_name,
                IsAbsent, Written, MCQ, Practical, Listening, Writting, Speaking, Reading, AddedDate, AddedYear, isActive')
            ->from($this->_results)
            ->where('StudentId', $id)
            ->where('Exams', $examid)
            ->where('AddedYear', $year)
            ->order_by('Subjects', 'ASC');
        $result = $this->db->get();
        //ob_clean();
        //echo $this->db->last_query();
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