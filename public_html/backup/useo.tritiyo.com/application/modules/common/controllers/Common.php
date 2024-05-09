<?php

if (!defined('BASEPATH'))

    exit('No direct script access allowed');

/**

 * @property Frontend_model $frontend_model frontend Model

 * @property Profile_model $profile_model Directory Model

 * @property Settings_model $settings_model Settings Model

 * @property Panel_model $panel_model Panel Model

 * @property Payments_model $payments_model Payments Model

 * @property Common_model $common_model Payments Model

 * @property WpShortcodes $WpShortcodes WpShortcodes

 * @property Shortcodes $Shortcodes Shortcodes

 *

 */

class Common extends MX_Controller {



    protected $data = array();

    protected $themename;

    private $status = array("status" => 0, "msg" => NULL);

    private $where = array();

    private $id;

    private $results = array();

    

    public function __construct() {

        parent::__construct();        

        $this->load->model(array("common_model", "order_model", "profile_model", "settings_model", "panel_model", "term_model", "product_model", "frontend_model", "shortcodes/photogallery"));

        $this->load->library(array('ion_auth', 'form_validation', 'upload', 'initial', 'cart'));

    }



    public function index() {

        $this->data['settings'] = $this->get_settings();

        echo $this->data['settings']->InstituteEmail;

        //owndebugger($this->data['settings']); die();

    }

    public function send_contact_email() {        
       //owndebugger($_POST);

        $this->data['settings'] = $this->get_settings();

        $to = "info@tritiyo.com";

        $this->email->bcc();
        $sender_name = $this->input->post('name'); //"Samrat Khan";

        //$subject = $this->input->post('subject'); //"01680139540";

        $sender_email = $this->input->post('email'); //"takeitkhan@gmail.com";
       // $sender_email = $this->input->post('subject'); //"takeitkhan@gmail.com";
$phone = $this->input->post('phone');
        $sender_message = $this->input->post('message'); //"Mail Message";

//die();

         $subject = 'Message from ' . (!empty($sender_name) ? $sender_name : ' web form');



        $headers = "From: Tritiyo Limited\r\n";

        $headers .= "Reply-To: " . strip_tags($sender_email) . "\r\n";

        //$headers .= "CC: ". ADMINEMAIL."\r\n";

        $headers .= "MIME-Version: 1.0\r\n";

        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";



        $message = '<html><body>';

        $message .= et_header(COMPANYNAME);

        $content = '<b> ' . (!empty($sender_name) ? $sender_name : $sender_email) . '</b>, contacted through the <span style="">' . COMPANYNAME . ' web form.</span><br/><br/>';

        $message .= et_row($sender_message);
        

        //$con1 = 'Subject: ' . (!empty($subject) ? $subject : '');

        $message .= et_row($con1);

        $con2 = 'Email Address: ' . (!empty($sender_email) ? $sender_email : '');
        $con3 = 'Phone: ' . (!empty($phone) ? $phone : '');

        $message .= et_row($con2);
        $message .= et_row($con3);

        $message .= et_footer(COMPANYNAME, '+8801821660066');

        //$message .= et_footer('Phone: +88-02-9881792- Ext : 563');

        $message .= "</body></html>";



        $list = array('tritiyolimited@gmail.com','musa.tritiyo@gmail.com','dev.saddam@gmail.com');



        if (!empty($sender_email)) {
            $this->load->library('email');
            $this->email->from('noreply@tritiyo.com', 'Tritiyo Limited');

            $this->email->to($to);

            $this->email->bcc($list);



            $this->email->subject($subject);

            $this->email->message($message);



            if ( ! $this->email->send())

            {

               /* $this->session->set_flashdata('error_msg', 'Mail sent failed');

                redirect('page/contact-us', 'refresh');*/

                // Generate error

                $this->status['status'] = 0;

                $this->status['msg'] = "Mail sent failed";

            }else{



                /*$this->session->set_flashdata('sucess_msg', 'Mail sent successfully');

                redirect('page/contact-us', 'refresh');*/

                $this->status['status'] = 1;

                $this->status['msg'] = "Mail sent successfully";

            }



            //$sendornot = @mail($to, $subject, $message, $headers);

           echo jsonEncode($this->status);





        } else {

            $this->status['msg'] = 'Please enter email address and try again.';

            echo jsonEncode($this->status);

        }

    }

    public function send_test() {

        $this->data['settings'] = $this->get_settings();

        $to = "info@regalfurniturebd.com";

        $this->email->bcc();

        //$to = "rashed.zamann@gmail.com";

        $sender_name = $this->input->post('fullname'); //"Samrat Khan";

        $sender_phone = $this->input->post('phonenumber'); //"01680139540";

        $sender_email = $this->input->post('emailaddress'); //"takeitkhan@gmail.com";

        $sender_message = $this->input->post('message'); //"Mail Message";



        $subject = 'Message from ' . (!empty($sender_name) ? $sender_name : ' web form');



        $headers = "From: Regal Furniture\r\n";

        $headers .= "Reply-To: " . strip_tags($sender_email) . "\r\n";

        //$headers .= "CC: ". ADMINEMAIL."\r\n";

        $headers .= "MIME-Version: 1.0\r\n";

        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";



        $message = '<html><body>';

        $message .= et_header(COMPANYNAME);

        $content = '<b> ' . (!empty($sender_name) ? $sender_name : $sender_email) . '</b>, contacted through the <span style="">' . COMPANYNAME . ' web form.</span><br/><br/>';

        $message .= et_row($sender_message);

        $con1 = 'Phone number: ' . (!empty($sender_phone) ? $sender_phone : '');

        $message .= et_row($con1);

        $con2 = 'Email Address: ' . (!empty($sender_email) ? $sender_email : '');

        $message .= et_row($con2);

        $message .= et_footer(COMPANYNAME);

        $message .= et_footer('Phone: +88-02-9881792- Ext : 563');

        $message .= "</body></html>";



        $list = array('regalfurniture2012@gmail.com' , 'tritiyolimited@gmail.com');



        if (!empty($sender_email)) {



            $this->load->library('email');



            $this->email->from('noreply@regalfurniturebd.com', 'Regal Furniture');

            $this->email->to($to);

            $this->email->bcc($list);



            $this->email->subject($subject);

            $this->email->message($message);



            if ( ! $this->email->send())

            {

                /* $this->session->set_flashdata('error_msg', 'Mail sent failed');

                 redirect('page/contact-us', 'refresh');*/

                // Generate error

                $this->status['status'] = 0;

                $this->status['msg'] = "Mail sent failed";

            }else{



                /*$this->session->set_flashdata('sucess_msg', 'Mail sent successfully');

                redirect('page/contact-us', 'refresh');*/

                $this->status['status'] = 1;

                $this->status['msg'] = "Mail sent successfully";

            }



            //$sendornot = @mail($to, $subject, $message, $headers);

//            if ($sendornot == 1) {

//                $this->status['status'] = 1;

//                $this->status['msg'] = "Mail sent successfully";

//            } else {

//                $this->status['status'] = 0;

//                $this->status['msg'] = "Mail sent failed";

//            }

            echo jsonEncode($this->status);





        } else {

            $this->status['msg'] = 'Please enter email address and try again.';

            echo jsonEncode($this->status);

        }

    }



    /**

     * @return mixed

     */

    public function get_settings() {

        $row = $this->settings_model->getSystemSettings();

        return $row[0];

    }



}



?>