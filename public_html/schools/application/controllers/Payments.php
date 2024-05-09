<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @property Profile_model $profile_model Profile Model
 * @property Common_model $common_model Common Model
 * @property Settings_model $settings_model Settings Model
 * @property Ion_auth $ion_auth ion_auth
 * @property Payments_model $payments_model ion_auth
 */
class Payments extends MY_Controller
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
        $this->data['title'] = "Add New Payment";

        $this->data['ledgernames'] = $this->get_all_ledger_names();
        //owndebugger($this->data['ledgernames']);
        $this->data['pay_method'] = $this->get_payment_methods();
        $this->load->view('layouts/header', $this->data);
        $this->load->view('payment/addpayment', $this->data);
        $this->load->view('layouts/footer', $this->data);
    }

    public function transaction_id()
    {
        if ($this->ion_auth->logged_in()) {
            $this->data['userInformation'] = $this->ion_auth->user()->row();
        }
        $this->data['loggedinuserinformation'] = $this->basic_information_of_mine($this->data['userInformation']->id);

        $this->data['userid'] = $this->data['userInformation']->id;
        $this->data['title'] = "Add New Transaction ID";

        $this->data['pay_method'] = $this->get_payment_methods();
        $this->load->view('layouts/header', $this->data);
        $this->load->view('payment/transactionidadder', $this->data);
        $this->load->view('layouts/footer', $this->data);
    }

    public function insert_transaction_id()
    {
        if ($this->ion_auth->logged_in()) {
            $this->data['userInformation'] = $this->ion_auth->user()->row();
        }
        $this->data['loggedinuserinformation'] = $this->basic_information_of_mine($this->data['userInformation']->id);
        $this->data['userid'] = $this->data['userInformation']->id;
        $this->data['title'] = "Insert New Payment";


        $paymentdate = datetoint($this->input->post('transactiondate'));
        $insertedtime = datetoint($this->input->post('insertedtime'));

        $data = array(
            'Amount' => $this->input->post('amount'),
            'SenderNumber' => $this->input->post('sendernumber'),
            'PaymentMethod' => $this->input->post('payment_method'),
            'TransactionId' => $this->input->post('transactionid'),
            'TransactionDate' => $paymentdate,
            'InsertedDate' => $insertedtime,
            'isActive' => 1
        );
        $this->results = $this->payments_model->insertTransactionId($data);

        if ($this->results) {
            $this->status['status'] = 1;
            $this->status['msg'] = 'Well done!';
        } else {
            $this->status['status'] = 0;
            $this->status['msg'] = 'Oh snap! Change a few things up and try submitting again.';
        }
        echo jsonEncode($this->status);
    }

    public function ledger_names_entry()
    {
        if ($this->ion_auth->logged_in()) {
            $this->data['userInformation'] = $this->ion_auth->user()->row();
        }
        $this->data['loggedinuserinformation'] = $this->basic_information_of_mine($this->data['userInformation']->id);
        $this->data['userid'] = $this->data['userInformation']->id;
        $this->data['title'] = "Add Ledger Name";

        $this->data['ledgertype'] = array(
            '1' => 'Debit (Dr)',
            '2' => 'Credit (Cr)'
        );

        $this->load->view('layouts/header', $this->data);
        $this->load->view('payment/ledgername', $this->data);
        $this->load->view('layouts/footer', $this->data);

    }

    public function insert_ledger_name()
    {
        if ($this->ion_auth->logged_in()) {
            $this->data['userInformation'] = $this->ion_auth->user()->row();
        }
        $this->data['loggedinuserinformation'] = $this->basic_information_of_mine($this->data['userInformation']->id);
        $this->data['userid'] = $this->data['userInformation']->id;
        $this->data['title'] = "Insert Ledger Name";

        $data = array(
            'LedgerTypeId' => $this->input->post('ledgertype'),
            'LedgerName' => $this->input->post('ledgername'),
            'LedgerNameBn' => $this->input->post('ledgernamebn')
        );
        $this->results = $this->payments_model->insertLedgerName($data);

        if ($this->results) {
            $this->status['status'] = 1;
            $this->status['msg'] = 'Well done!';
        } else {
            $this->status['status'] = 0;
            $this->status['msg'] = 'Oh snap! Change a few things up and try submitting again.';
        }
        echo jsonEncode($this->status);
    }

    public function new_credit_payment()
    {
        if ($this->ion_auth->logged_in()) {
            $this->data['userInformation'] = $this->ion_auth->user()->row();
        }
        $this->data['loggedinuserinformation'] = $this->basic_information_of_mine($this->data['userInformation']->id);
        $this->data['userid'] = $this->data['userInformation']->id;
        $this->data['title'] = "Add New Payment";

        $this->data['ledgernames'] = $this->get_all_ledger_names();
        $this->data['pay_method'] = $this->get_payment_methods();
        $this->load->view('layouts/header', $this->data);
        $this->load->view('payment/addpayment', $this->data);
        $this->load->view('layouts/footer', $this->data);

    }
    public function new_debit_payment()
    {
        if ($this->ion_auth->logged_in()) {
            $this->data['userInformation'] = $this->ion_auth->user()->row();
        }

        $this->data['userid'] = $this->data['userInformation']->id;
        $this->data['title'] = "Add New Payment";

        $this->data['ledgernames'] = $this->get_all_ledger_names();
        $this->data['pay_method'] = $this->get_payment_methods();
        $this->load->view('layouts/header', $this->data);
        $this->load->view('payment/addpayment', $this->data);
        $this->load->view('layouts/footer', $this->data);

    }

    public function receive_at_once()
    {
        if ($this->ion_auth->logged_in()) {
            $this->data['userInformation'] = $this->ion_auth->user()->row();
        }
        $this->data['loggedinuserinformation'] = $this->basic_information_of_mine($this->data['userInformation']->id);
        $this->data['userid'] = $this->data['userInformation']->id;
        $this->data['title'] = "Receive Payment At Once";
        $this->data['ledgers'] = $this->get_ledger_names_by_typeid(2);
        //owndebugger($this->data['ledgers']);
        $this->data['pay_method'] = $this->get_payment_methods();

        $this->load->view('layouts/header', $this->data);
        $this->load->view('payment/receiveatonce', $this->data);
        $this->load->view('layouts/footer', $this->data);
    }

    public function insert_receive_at_once()
    {
        if ($this->ion_auth->logged_in()) {
            $this->data['userInformation'] = $this->ion_auth->user()->row();
        }
        $this->data['loggedinuserinformation'] = $this->basic_information_of_mine($this->data['userInformation']->id);
        $this->data['userid'] = $this->data['userInformation']->id;
        $this->data['title'] = "Receive Payment At Once";
        $this->data['ledgers'] = $this->get_ledger_names_by_typeid(2);
        $this->data['pay_method'] = $this->get_payment_methods();

        if ($this->input->post('userid') != 'none') {
            if ($this->input->post('bankname')) {
                $accountto = $this->input->post('bankname');
            } else if ($this->input->post('instituteaccount')) {
                $accountto = $this->input->post('instituteaccount');
            }

            $twp = $this->input->post('transactionwith_p');
            $twu = $this->input->post('transactionwith_u');

            if ($twp != '' || $twu != '') {
                if ($twp == "") {
                    $transactionwith = $twu;
                } else {
                    $transactionwith = $twp;
                }
            }
            $paymentdate = datetoint($this->input->post('paymentdate'));

            $amounts = $this->input->post('data');
            //owndebugger($amounts);
            if (is_array($amounts)) {
                foreach ((array)$amounts as $amount => $k) {
                    //owndebugger($amount);
                    if (!empty($k['amount'])) {
                        $data = array(
                            'LedgerNameId' => $k['typeid'],
                            'Amount' => $k['amount'],
                            'UserId' => $this->data['userid'],
                            'TransactionWith' => $transactionwith,
                            'PaymentDate' => $paymentdate,
                            'AdditionalNote' => $k['additionalnote'],
                            'PaymentMethod' => $this->input->post('payment_method'),
                            'TransactionMobileNumber' => $this->input->post('sendermobileno'),
                            'TransactionId' => $this->input->post('transactionid'),
                            'AccountTo' => $accountto,
                            'InsertedTime' => datetoint(__now()),
                            'PaymentStatus' => 1
                        );
                        $this->results = $this->payments_model->insertPaymentEntries($data);
                    }
                }

                if ($this->results) {
                    $this->status['status'] = 1;
                    $this->status['msg'] = 'Well done!';
                } else {
                    $this->status['status'] = 0;
                    $this->status['msg'] = 'Sorry! Payment has not been made';
                }
                $this->load->view('layouts/header', $this->data);
                $this->load->view('payment/payslip', $this->data);
                $this->load->view('layouts/footer', $this->data);
            } else {
                $this->load->view('layouts/header', $this->data);
                $this->load->view('payment/receiveatonce', $this->data);
                $this->load->view('layouts/footer', $this->data);
            }
        } else {
            $this->load->view('layouts/header', $this->data);
            $this->load->view('payment/receiveatonce', $this->data);
            $this->load->view('layouts/footer', $this->data);
        }
    }

    public function pay_at_once()
    {
        if ($this->ion_auth->logged_in()) {
            $this->data['userInformation'] = $this->ion_auth->user()->row();
        }
        $this->data['loggedinuserinformation'] = $this->basic_information_of_mine($this->data['userInformation']->id);
        $this->data['userid'] = $this->data['userInformation']->id;
        $this->data['title'] = "Pay At Once";
        $this->data['ledgers'] = $this->get_ledger_names_by_typeid(1);
        $this->data['pay_method'] = $this->get_payment_methods();

        $this->load->view('layouts/header', $this->data);
        $this->load->view('payment/payatonce', $this->data);
        $this->load->view('layouts/footer', $this->data);
    }

    public function insert_pay_at_once()
    {
        if ($this->ion_auth->logged_in()) {
            $this->data['userInformation'] = $this->ion_auth->user()->row();
        }
        $this->data['loggedinuserinformation'] = $this->basic_information_of_mine($this->data['userInformation']->id);
        $this->data['userid'] = $this->data['userInformation']->id;
        $this->data['title'] = "Pay At Once";
        $this->data['ledgers'] = $this->get_ledger_names_by_typeid(1);
        $this->data['pay_method'] = $this->get_payment_methods();

        if ($this->input->post('userid') != 'none') {
            if ($this->input->post('bankname')) {
                $accountto = $this->input->post('bankname');
            } else if ($this->input->post('instituteaccount')) {
                $accountto = $this->input->post('instituteaccount');
            }

            $twp = $this->input->post('transactionwith_p');
            $twu = $this->input->post('transactionwith_u');

            if ($twp != '' || $twu != '') {
                if ($twp == "") {
                    $transactionwith = $twu;
                } else {
                    $transactionwith = $twp;
                }
            }
            $paymentdate = datetoint($this->input->post('paymentdate'));

            $amounts = $this->input->post('data');
            //owndebugger($amounts);
            if (is_array($amounts)) {
                foreach ((array)$amounts as $amount => $k) {
                    //owndebugger($amount);
                    if (!empty($k['amount'])) {
                        $data = array(
                            'LedgerNameId' => $k['typeid'],
                            'Amount' => $k['amount'],
                            'UserId' => $this->data['userid'],
                            'TransactionWith' => $transactionwith,
                            'PaymentDate' => $paymentdate,
                            'AdditionalNote' => $k['additionalnote'],
                            'PaymentMethod' => $this->input->post('payment_method'),
                            'TransactionMobileNumber' => $this->input->post('sendermobileno'),
                            'TransactionId' => $this->input->post('transactionid'),
                            'AccountTo' => $accountto,
                            'InsertedTime' => datetoint(__now()),
                            'PaymentStatus' => 1
                        );
                        $this->results = $this->payments_model->insertPaymentEntries($data);
                    }
                }

                if ($this->results) {
                    $this->status['status'] = 1;
                    $this->status['msg'] = 'Well done!';
                } else {
                    $this->status['status'] = 0;
                    $this->status['msg'] = 'Sorry! Payment has not been made';
                }
                $this->load->view('layouts/header', $this->data);
                $this->load->view('payment/payslip', $this->data);
                $this->load->view('layouts/footer', $this->data);
            } else {
                $this->load->view('layouts/header', $this->data);
                $this->load->view('payment/payatonce', $this->data);
                $this->load->view('layouts/footer', $this->data);
            }
        } else {
            $this->load->view('layouts/header', $this->data);
            $this->load->view('payment/payatonce', $this->data);
            $this->load->view('layouts/footer', $this->data);
        }
    }

    public function insert_payment()
    {
        if ($this->ion_auth->logged_in()) {
            $this->data['userInformation'] = $this->ion_auth->user()->row();
        }
        $this->data['loggedinuserinformation'] = $this->basic_information_of_mine($this->data['userInformation']->id);
        $this->data['userid'] = $this->data['userInformation']->id;
        $this->data['title'] = "Insert New Payment";

        if ($this->input->post('bankname')) {
            $accountto = $this->input->post('bankname');
        } else if ($this->input->post('instituteaccount')) {
            $accountto = $this->input->post('instituteaccount');
        }

        $twp = $this->input->post('transactionwith_p');
        $twu = $this->input->post('transactionwith_u');

        if ($twp == "") {
            $transactionwith = $twu;
        } else {
            $transactionwith = $twp;
        }
        $paymentdate = datetoint($this->input->post('paymentdate'));

        $data = array(
            'LedgerNameId' => $this->input->post('ledgertypeid'),
            'Amount' => $this->input->post('amount'),
            'UserId' => $this->input->post('userid'),
            'TransactionWith' => $transactionwith,
            'PaymentDate' => $paymentdate,
            'AdditionalNote' => $this->input->post('note'),
            'PaymentMethod' => $this->input->post('payment_method'),
            'TransactionMobileNumber' => $this->input->post('sendermobileno'),
            'TransactionId' => $this->input->post('transactionid'),
            'AccountTo' => $accountto,
            'InsertedTime' => datetoint(__now()),
            'PaymentStatus' => 1
        );
        $this->results = $this->payments_model->insertPaymentEntries($data);

        if ($this->results) {
            $this->status['status'] = 1;
            $this->status['randomcode'] = $this->input->post('userid');
            $this->status['msg'] = 'Well done!';
        } else {
            $this->status['status'] = 0;
            $this->status['msg'] = 'Oh snap! Change a few things up and try submitting again.';
        }
        echo jsonEncode($this->status);
    }

    public function check_transaction_id()
    {
        $newportalurl = $this->uri->segment(2);
        $thanks = $this->payments_model->checkTransactionId($newportalurl);
        if ($thanks == 1) {
            $this->status['status'] = 1;
            $this->status['msg'] = '<span style="color: green;">আপনার ট্রানসাকশান আইডি আমাদের ডাটাবেস এর সাথে মিলেছে</span>';
            echo jsonEncode($this->status);
        } else {
            $this->status['status'] = 0;
            $this->status['msg'] = '<span style="color: red;">আপনার ট্রানসাকশান আইডি আমাদের ডাটাবেস এর সাথে মিলে নাই </span>';
            echo jsonEncode($this->status);
        }
    }

    public function check_admission_id()
    {
        $newportalurl = $this->uri->segment(2);
        $thanks = $this->payments_model->checkAdmissionId($newportalurl);
        if ($thanks == 1) {
            $this->status['status'] = 1;
            $this->status['msg'] = '<span style="color: green;">আপনার আইডি আমাদের ডাটাবেস এর সাথে মিলেছে</span>';
            echo jsonEncode($this->status);
        } else {
            $this->status['status'] = 0;
            $this->status['msg'] = '<span style="color: red;">আপনার আইডি আমাদের ডাটাবেস এর সাথে মিলে নাই </span>';
            echo jsonEncode($this->status);
        }
    }
    public function check_admission_id_new()
    {
        $newportalurl = $this->uri->segment(2);
        $thanks = $this->payments_model->checkAdmissionIdNew($newportalurl);
        
        if (!empty($thanks)) {
            $this->status['status'] = 1;
            $this->status['msg'] = '<span style="color: green;">আপনার আইডি আমাদের ডাটাবেস এর সাথে মিলেছে</span>';            
            echo jsonEncode($this->status);
        } else {
            $this->status['status'] = 0;
            $this->status['msg'] = '<span style="color: red;">আপনার আইডি আমাদের ডাটাবেস এর সাথে মিলে নাই </span>';
            echo jsonEncode($this->status);
        }
    }

    public function get_all_ledger_names()
    {
        $row = $this->payments_model->get_ledger_names();
        return $row;
    }

    public function get_ledger_names_by_typeid($id)
    {
        $row = $this->payments_model->get_ledger_names_by_type_id($id);
        return $row;
    }

    public function get_payment_methods()
    {
        $row = $this->payments_model->get_payments_methods();
        return $row;
    }
}

?>