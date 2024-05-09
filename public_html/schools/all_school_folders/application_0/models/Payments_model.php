<?php

/**
 * @property Common_model $common_model Common models
 */
class Payments_model extends Common_model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAllLedgerNames()
    {
        $this->datatables
            ->select('*')
            ->from($this->_ledgernames);
        $q = $this->datatables->generate();
        return $q;
    }

    public function getAllPaymentEntries()
    {
        $this->datatables
            ->select('*')
            ->from($this->_paymentsentries);
        $q = $this->datatables->generate();
        return $q;
    }

    public function checkTransactionId($value)
    {


        $this->db->select('TransactionId')
            ->from($this->_transactions)
            ->where('TransactionId', $value);
        $this->db->limit(1);
        $result = $this->db->get();
        if ($result->num_rows() > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    public function checkAdmissionId($value)
    {


        $this->db->select('UserId')
            ->from($this->_paymentsentries)
            ->where('UserId', $value);
        $this->db->limit(1);
        $result = $this->db->get();
        if ($result->num_rows() > 0) {
            return 1;
        } else {
            return 0;
        }
    }
    public function checkAdmissionIdNew($value)
    {
        $this->db->select('random_code')
            ->from($this->_admissiontable)
            ->where('random_code', $value);
        $this->db->limit(1);
        $result = $this->db->get();
        if ($result->num_rows() > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    /** Inserts Data Functions **/

    public function insertLedgerName($data)
    {
        $data = $this->insertRecords($this->common_model->_ledgernames, $data);
        return $data;
    }

    public function insertPaymentEntries($data)
    {
        $data = $this->insertRecords($this->common_model->_paymentsentries, $data);
        return $data;
    }

    public function insertTransactionId($data)
    {
        $data = $this->insertRecords($this->common_model->_transactions, $data);
        return $data;
    }

    public function updatePaymentIfExists($data, $where)
    {
        $data = $this->updateRecords($this->common_model->_paymentsentries, $data, $where);
        return $data;
    }

    /** Dropdowns **/

    public function get_ledger_names()
    {
        $this->db->select('*, IF(LedgerTypeId = 1, \'Debit\', \'Credit\') AS LedgerType')->from($this->_ledgernames)
            ->order_by('LedgerName');
        $result = $this->db->get();
        $return = array();
        if ($result->num_rows() > 0) {
            $return[0] = "Select one";
            //owndebugger($result->result_array());
            foreach ($result->result_array() as $row) {
                $return[$row['TypeId']] = $row['LedgerName'] . (isset($row['LedgerType']) ? " (" . $row['LedgerType'] . ")" : "");
            }
        }
        return $return;
    }

    public function get_ledger_names_by_type_id($ledgertypeid)
    {
        $this->db->select('*')->from($this->_ledgernames)
            ->where('LedgerTypeId', $ledgertypeid)
            ->order_by('LedgerName');
        $result = $this->db->get();
        //owndebugger($result);
        if ($result->num_rows() > 0) {
            return $result->result_array();
        }
    }

    public function get_payments_methods()
    {
        return $rows = array(
            '0' => 'Select One',
            '1' => 'bKash',
            '2' => 'MCash',
            '3' => 'DBBL Mobile',
            '4' => 'UCash',
            '5' => 'Bank',
            '6' => 'Cash'
        );
    }

}