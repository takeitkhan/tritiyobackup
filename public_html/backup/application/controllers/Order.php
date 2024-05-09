<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * @property Profile_model $profile_model Profile Model
 * @property Common_model $common_model Common Model
 * @property Settings_model $settings_model Settings Model
 * @property Ion_auth $ion_auth ion_auth
 * @property panel_model $panel_model panel model
 * @property admin_model $admin_model panel model
 * @property Order_model $Order_model Order model
 */

class Order extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->ion_auth->logged_in()) {
            redirect(base_url() . 'auth/login', 'refresh');
        }
        $this->load->model('order_model');
        $this->data['userInformation'] = $this->ion_auth->user()->row();
        $this->data['userid'] = $this->data['userInformation']->id;
    }

    public function order_list($offset = 0) {

      /*$search = array(
           'upazila' => $this->input->post('upazila'),
           'application_for' => $this->input->post('application_for'),
           'application_quota' => $this->input->post('application_quota'),
           'mobile' => $this->input->post('mobile'),
           'regno' => $this->input->post('regno'),
           'roll_no' => $this->input->post('roll_no'),
           'keyword' => $this->input->post('keyword'),
        );

        $prm = $this->uri->segment('2');
        $offset = $this->input->get('per_page');
        $offset = (!empty($offset) ? $offset : 0);
        

        $limit = 2;
        $this->data['applicants'] = $this->applicants_model->get_applicant_list($limit, $offset, $search, $prm);

        $this->load->library('pagination');
        $config['total_rows'] = $this->db->get('applicants')->num_rows();
        $config['per_page'] = $limit;
        $config['enable_query_strings'] = TRUE;
        $config['page_query_string'] = TRUE;
        $config['reuse_query_string'] = TRUE;
        $config['use_page_numbers'] = FALSE;
        $config['cur_tag_open'] = '&nbsp;<a class="active">';
        $config['cur_tag_close'] = '</a>';

        $config['base_url'] = base_url('applicants');

        $this->pagination->initialize($config);

        $this->data['paging'] = $this->pagination->create_links();


        $this->data['title'] = "Applicant List";
        $this->load->view('layouts/header', $this->data);
        $this->load->view('applicants/index', $this->data);
        $this->load->view('layouts/footer', $this->data);
*/


        
//        $this->data['orders'] = $this->order_model->get_orders([
//            'order_status' => ($type == 'all') ? null : $type,
//            'search_key' => $this->input->get('search_key'),
//            'offset' => $this->input->get('offset')
//        ]);


        $search = array(
           'startdate' => $this->input->post('startdate'),
           'enddate' => $this->input->post('enddate'),
           'keyword' => $this->input->post('keyword'),
        );


        $prm = $this->uri->segment('2');

//        if($this->uri->segment('2') == 'cash_on_delivery') {
//            $prm = $this->uri->segment('2');
//        } else {
//            $prm = $this->uri->segment('2');
//        }
//
//
//
//        $prm = $this->uri->segment('2');
        //echo $prm;

        $offset = $this->input->get('page') == '' ? '0': $this->input->get('page');
        if($this->input->get('page')){
            $offset = $this->input->get('page');
        }

        $limit = 25;
        $this->data['orders'] = $this->order_model->order_list($limit, $offset, $search, $prm);
       // owndebugger($this->data['orders']);

        // load pagination library
        $this->load->library('pagination');
        $config = array();
        $config['base_url'] = site_url('order/all/list');
        $config['total_rows'] = $this->db->get('ecommerce_order_master')->num_rows();
        $config['per_page'] = $limit;
        //which uri segment indicates pagination number
        $config['uri_segment'] = 5;
        $config['use_page_numbers'] = TRUE;
        //max links on a page will be shown
        $config['num_links'] = 5;

        $this->pagination->initialize($config);
        $this->data['pagination'] = $this->pagination->create_links();



//        $this->data['orders'] =  $this->db->select('ecommerce_order_master.*, sum(ecommerce_order_details.price * ecommerce_order_details.qty) as total, sum(ecommerce_order_details.qty) as qty', false)
//                                ->from('ecommerce_order_master')
//                                ->join('ecommerce_order_details', ' ecommerce_order_details.master_id = ecommerce_order_master.id', 'left')
//                                ->group_by(' ecommerce_order_master.id')
//                                ->get()
//                                ->result_array();


//        owndebugger($this->data['orders']);die();
        $this->data['title'] = "Order Manegment";
        $this->load->view('layouts/header', $this->data);
        $this->load->view('order/list', $this->data);
        $this->load->view('layouts/footer', $this->data);
    }

    public function move_to($order_id, $type) {
        if ($this->ion_auth->in_group([1,3,4,5,6])){
            $exist_order_data = $this->db->get_where('ecommerce_order_master', array('order_id =' => $order_id))->result();

            if($this->db->get_where('ecommerce_order_track', array('order_id =' => $order_id))->result()){
                $this->order_model->move_to($order_id, $type);
                $exist_order_data2 = $this->db->get_where('ecommerce_order_master', array('order_id =' => $order_id))->result();
                foreach ($exist_order_data2 as $order){
                   $contuct_number = $order->contuct_number;
                   $alternative_mobile = $order->alternative_mobile;
                    $order_data = array(
                        'order_id' => $order_id ,
                        'order_time' => $order->order_time  ,
                        'order_status' =>  $order->order_status
                    );
                    $this->db->insert('ecommerce_order_track', $order_data);

                    $this->_move_to_cashon($order_id);
                }
            }else{
                foreach ($exist_order_data as $order){
                   $contuct_number = $order->contuct_number;
                   $alternative_mobile = $order->alternative_mobile;

                    $order_data = array(
                        'order_id' => $order_id ,
                        'order_time' => $order->order_time  ,
                        'order_status' =>  $order->order_status
                    );
                    $this->db->insert('ecommerce_order_track', $order_data);
                    $this->_move_to_cashon($order_id);

                }

                $this->order_model->move_to($order_id, $type);
                $exist_order_data2 = $this->db->get_where('ecommerce_order_master', array('order_id =' => $order_id))->result();
                foreach ($exist_order_data2 as $order){
                    $order_data = array(
                        'order_id' => $order_id ,
                        'order_time' => $order->order_time  ,
                        'order_status' =>  $order->order_status
                    );
                    $this->db->insert('ecommerce_order_track', $order_data);
                    $this->_move_to_cashon($order_id);
                }
            }


            //echo $type;
            echo ucfirst(str_replace('_', ' ', $type));
            $message = "\nOrder No:  ".$order_id.".\nOrder Delivery Status: " .ucfirst(str_replace('_', ' ', $type)). "\nRegal Furniture";
            if($this->input->post('send_msg') == 1){
              //sendSms($message, $contuct_number);
              //sendSms($message, $alternative_mobile);
                sendSms($message, '01924602020'); //Habib-01924602020
                sendSms($message, '01992659228'); //Shuvo-01992659228
                //sendSms($message, '01718170799'); //samrat-01680139540
                if($type != 'deleted'){
                    sendSms($message, $contuct_number);
                    sendSms($message, $alternative_mobile);
                }
            }
            
        }
        else
            redirect(base_url(), 'refresh');
            
            //echo "sdas";
            
    }

    public function _move_to_cashon($order_id = 750) {
        $datas = $this->db->get_where('ecommerce_order_master',['id' => $order_id,'payment_method_name' => 'Cash on delivery'])->row();
        if(@$datas) {
            $param = json_decode($datas->param);
            $p = !empty($param) ? $param->epw : '';
            $data_change =  json_encode(array('status' => 1, 'epw' => @$param->param));
            $this->db->update('ecommerce_order_master', ['param' => $data_change], ['id' => $order_id]);
        }
    }

    public function bulk_move($type, $bulk_order_id)
    {
        if ($this->ion_auth->in_group([1,3,4,5,6])){
            $bulk_order_ids = explode('_',$bulk_order_id);
            
            foreach ($bulk_order_ids as $order_id){
               $exist_order_data = $this->db->get_where('ecommerce_order_master', array('order_id =' => $order_id))->result();
               
               if($this->db->get_where('ecommerce_order_track', array('order_id =' => $order_id))->result()){
                   $this->order_model->move_to($order_id, $type);
                   $exist_order_data2 = $this->db->get_where('ecommerce_order_master', array('order_id =' => $order_id))->result();
                   foreach ($exist_order_data2 as $order){
                      $contuct_number = $order->contuct_number;
                      $alternative_mobile = $order->alternative_mobile;
                       $order_data = array(
                           'order_id' => $order_id ,
                           'order_time' => $order->order_time  ,
                           'order_status' =>  $order->order_status
                       );
                       $this->db->insert('ecommerce_order_track', $order_data);
                       $this->_move_to_cashon($order_id);
                   }
               }else{
                   foreach ($exist_order_data as $order){
                      $contuct_number = $order->contuct_number;
                      $alternative_mobile = $order->alternative_mobile;
                      $order_data = array(
                           'order_id' => $order_id ,
                           'order_time' => $order->order_time  ,
                           'order_status' =>  $order->order_status
                      );
                      $this->db->insert('ecommerce_order_track', $order_data);
                      $this->_move_to_cashon($order_id);

                   }

                   $this->order_model->move_to($order_id, $type);
                   $exist_order_data2 = $this->db->get_where('ecommerce_order_master', array('order_id =' => $order_id))->result();
                   foreach ($exist_order_data2 as $order){
                       $order_data = array(
                           'order_id' => $order_id ,
                           'order_time' => $order->order_time  ,
                           'order_status' =>  $order->order_status
                       );
                       $this->db->insert('ecommerce_order_track', $order_data);
                       $this->_move_to_cashon($order_id);
                   }
               }


               //echo $type;
              echo ucfirst(str_replace('_', ' ', $type));
              
              $message = "\nOrder No:  ".$order_id.".\nOrder Delivery Status: " . ucfirst(str_replace('_', ' ', $type)). "\nRegal Furniture";
              
           }
            if($this->input->post('send_msg') == 2){
                sendSms($message, $contuct_number);
                sendSms($message, $alternative_mobile);
            }

        }else
            redirect(base_url(), 'refresh');


    }

    public function order_rows_html() {
        $type = $this->input->get('type');
        $this->data['orders'] = $this->order_model->get_orders([
            'order_status' => ($type == 'all') ? null : $type,
            'search_key' => $this->input->get('search_key'),
            'from_date' => $this->input->get('from_date'),
            'to_date' => $this->input->get('to_date'),
            'offset' => $this->input->get('offset'),
        ]);

        $this->data['output']['total'] = count($this->data['orders']);
        $this->data['output']['html'] = '';
        foreach ($this->data['orders'] as $order) {
            
            $this->data['output']['html'] .= $this->load->view('order/table-row', compact('order'), true);
        }


        header('Content-Type: application/json');
     
        echo json_encode($this->data['output'], JSON_PRETTY_PRINT);
    }
    public function temporary_orders() {
        $options = array(
            'search_key' => '',
            'limit' => $this->input->post('limit'),
            'offset' => $this->input->post('offset')
        );
        $this->data['latest'] = $this->order_model->temporary_orders($options);         
        //owndebugger($this->data['latest']); //die();
        
        $this->data['title'] = "Temporary Order Manegment";
        $this->load->view('layouts/header', $this->data);
        $this->load->view('order/temporary_orders', $this->data);
        $this->load->view('layouts/footer', $this->data);
    }

    public function run_any_query() {
        $this->data['users'] = $this->order_model->query_runner();
        owndebugger($this->data['users']);
    }

    function updateDeliveryDate()
    {
       $id = $this->input->post('id');
       $data['delivery_date'] = $this->input->post('deliverDate');
        //update
        $this->db->where('id', $id);
        $this->db->update('ecommerce_order_master', $data);

        $result = $this->db->get_where('ecommerce_order_master', array(
                        'id' => $id
                  ))->row();
        //Mobile MSG for customer
        $message = "Dear Valued Customer,\n Your approximate Delivery date is.\n ".$data['delivery_date']."\nRegal Furniture";
        sendSms($message, $result->contuct_number);
    }

    function view_payment($id = null){

        $result = $this->db->get_where('ecommerce_order_master', array(
            'id' => $id
        ))->row();

        $data['title'] = 'Payment';
        $data['modal_subview'] = $this->load->view('order/_modal_payment_view', $data, FALSE);
        $this->load->view('_layout_modal_small', $data);
    }


    
}
