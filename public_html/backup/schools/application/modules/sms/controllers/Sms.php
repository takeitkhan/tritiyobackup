<?php
$header = header('Access-Control-Allow-Origin: *');
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Sms extends MX_Controller
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
        $this->load->model('sms_model');


    }

    public function index()
    {
      if ($this->ion_auth->logged_in()) {
          $this->data['userInformation'] = $this->ion_auth->user()->row();
      }
      $data['mysetting'] = $this->sms_model->get_sms_setting();
      $data['loggedinuserinformation'] = basic_information_of_mine_helper($this->data['userInformation']->id);

      $data['userid'] = $this->data['userInformation']->id;
      $data['title'] = "SMS Panel";
      accView('index', $data);


    }


    public function compose()
    {
      if ($this->ion_auth->logged_in()) {
          $this->data['userInformation'] = $this->ion_auth->user()->row();
      }
      $data['loggedinuserinformation'] = basic_information_of_mine_helper($this->data['userInformation']->id);
      $data['userid'] = $this->data['userInformation']->id;
      $data['template'] = $this->sms_model->sms_template_list_compross();
      $data['title'] = "Compose";
      accView('compose', $data);

    }

    public function archive(){

      if ($this->ion_auth->logged_in()) {
          $this->data['userInformation'] = $this->ion_auth->user()->row();
      }
      $offset = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
      $per_page_limit = 10;
      $url = base_url('sms-archive');
      $search = array(
          'status' => $this->input->get('status'),
          'title' => $this->input->get('title'),
          'limit' => $per_page_limit,
          'offset' => $offset,
      );
      $data['archives'] = $this->sms_model->sms_archive_list($search);
      $total_rows = $this->sms_model->sms_archive_list_coutn($search);
      $data['paging'] = paging($total_rows, $per_page_limit, $url);

      $data['loggedinuserinformation'] = basic_information_of_mine_helper($this->data['userInformation']->id);
      $data['userid'] = $this->data['userInformation']->id;
      $data['title'] = "Archive";
      accView('archive', $data);

    }

    public function setting()
    {
      if ($this->ion_auth->logged_in()) {
          $this->data['userInformation'] = $this->ion_auth->user()->row();
      }
      $data['loggedinuserinformation'] = basic_information_of_mine_helper($this->data['userInformation']->id);
      $data['userid'] = $this->data['userInformation']->id;
     if($data['userid'] == '1357'){

          $post = $this->input->post();
          if ($post) {
              $result = updateRow(tbl_sms_setting, $post, ['id' => 1]);

              if ($result)
                  set_message('success', 'Successfully Added');
               else
                  set_message('error', 'Can Not Save');
            }
            $data['mysetting'] = $this->sms_model->get_sms_setting();

            $data['title'] = "Setting";
            accView('setting', $data);

      }else {

        redirect('sms');
      }

    }

    public function template(){
      $data['title'] = "Template";
      $offset = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
      $per_page_limit = 5;

      if ($this->ion_auth->logged_in()) {
          $this->data['userInformation'] = $this->ion_auth->user()->row();
      }
      $post = $this->input->post();
      if ($post) {
          $result = insertRow(tbl_sms_template, $post);

          if ($result)
              set_message('success', 'Successfully Added');
           else
              set_message('error', 'Can Not Save');
      }

      $search = array(
          'status' => $this->input->get('status'),
          'title' => $this->input->get('title'),
          'limit' => $per_page_limit,
          'offset' => $offset,
      );
      $data['messages'] = $this->sms_model->sms_template_list($search);

      $data['userid'] = $this->data['userInformation']->id;

      accView('template', $data);

    }

    public function delete($id){
      if ($id) {
          $result = updateRow(tbl_sms_template, ['activity' => 'Delete'], ['id' => $id]);
          if ($result)
              set_message('success', 'Successfully Deleted');
          else
              set_message('error', 'Can Not Updated');

          redirect('sms-template');
      }

    }

    public function edit($id){
      $data['title'] = 'Edit template';
      $template = getRecord(tbl_sms_template, ['id' => $id]);
      $data['template'] = $template;

      if ($this->ion_auth->logged_in()) {
          $this->data['userInformation'] = $this->ion_auth->user()->row();
      }


      /*update*/
      $post = $this->input->post();
      if ($post) {
          $result = updateRow(tbl_sms_template, $post, ['id' => $id]);
          if ($result){

            set_message('success', 'Successfully Updated');
            redirect('sms-template');
          }else{
            set_message('error', 'Can Not Updated');

          }

      }
      $data['userid'] = $this->data['userInformation']->id;
      accView('edit', $data);

    }


public function send_result_all_sms(){
        $all_numbers = $this->input->post('sms_json');
        $results = $all_numbers;

  
    //$i = 0;
  foreach ($results as $value) {
     
       $sing_result = json_decode($value, true);
       
       $gpa = $sing_result['gpa'];
       $grade = $sing_result['grade'];
       $phone = $sing_result['phone'];
       $sid = $sing_result['sid'];
       
        $school_name = 'Pakutia Public School & College';
        $mysetting = $this->sms_model->get_sms_setting();
        $limit_sms = $mysetting->sms_limit;
        $post_url_routs = 'sms-archive';

        if($phone != ''){
            if($mysetting->status == 'Active'){
        
             
                if($limit_sms > 0){
                  $send_number = '88'.$phone;
                  $send_message = 'Dear Student Your Annual Exam Result 2018 is '.$gpa.' Principal '.$school_name;
                  $user_id = @$sid;
        
                  $sendSms = $this->sms_model->send_singel_sms($send_number, $send_message, $user_id);
                  
                  //owndebugger($sendSms);exit;
                  $sendSms_suc = @$sendSms['SMSINFO']['MSISDNSTATUS'];
        
                  if(!(@$sendSms['SMSINFO']['MSISDNSTATUS'])){
                      $data = [
                          'send_number'=> $send_number,
                          'message '=> $send_message,
                          'user_id '=> @$user_id,
                          'lot_id '=> $mysetting->current_lot
                      ];
                      $u_data = [
                          'sms_limit'=> $limit_sms - 1,
                      ];
                      $this->db->update(tbl_sms_setting, $u_data, "id = 1");
                      $this->db->insert('sms_history', $data);
                 
                    }
        
                }
        
              }
        
        }
       // $i++;

      }
      redirect($post_url_routs);

}


public function send_single_compose(){

$mysetting = $this->sms_model->get_sms_setting();
$limit_sms = $mysetting->sms_limit;
$post = $this->input->post();
$post_url_routs = $this->input->post('post_url_routs');
if($post){
    if($mysetting->status == 'Active'){

     
        if($limit_sms > 0){
          $send_number = '88'.$this->input->post('send_number');
          $send_message = $this->input->post('messages');
          $user_id = @$this->input->post('user_id');

          $sendSms = $this->sms_model->send_singel_sms($send_number, $send_message, $user_id);
          
          //owndebugger($sendSms);exit;
          $sendSms_suc = @$sendSms['SMSINFO']['MSISDNSTATUS'];

          if(!(@$sendSms['SMSINFO']['MSISDNSTATUS'])){
              $data = [
                  'send_number'=> $send_number,
                  'message '=> $send_message,
                  'user_id '=> @$user_id,
                  'lot_id '=> $mysetting->current_lot
              ];
              $u_data = [
                  'sms_limit'=> $limit_sms - 1,
              ];
              $this->db->update(tbl_sms_setting, $u_data, "id = 1");
              $this->db->insert('sms_history', $data);
              set_message('success', 'Successfully Send Message');
              redirect($post_url_routs);
            }else {
              set_message('error', 'SMS Can not sent try again');
            }


        }else {
          set_message('error', 'Sorry you have not enough balance. Your remaining balance '.$limit_sms);
          redirect($post_url_routs);
        }

      }else {
      set_message('error', 'SMS Option Deactivated Please Contact Your Webmaster.');
      redirect($post_url_routs);
    }
}else {
  set_message('error', 'You try to worng way'.@$limit_sms);
  redirect($post_url_routs);
}

}





public function transaction(){
  if ($this->ion_auth->logged_in()) {
      $this->data['userInformation'] = $this->ion_auth->user()->row();
  }
  $post = $this->input->post();
  if ($post) {
      $result = $this->sms_model->inser_transaction();

      if ($result){
        set_message('success', 'Successfully Added');
      }else{
        set_message('error', 'Can Not Save');
      }

  }

  $offset = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
  $per_page_limit = 5;
  $search = array(
      'status' => $this->input->get('status'),
      'title' => $this->input->get('title'),
      'limit' => $per_page_limit,
      'offset' => $offset,
  );
  $data['transaction'] = $this->sms_model->sms_transaction_list($search);
  $data['loggedinuserinformation'] = basic_information_of_mine_helper($this->data['userInformation']->id);
  $data['userid'] = $this->data['userInformation']->id;
  $data['title'] = "Transaction";
  accView('transaction', $data);
}

  public function transaction_delete($id){
    if ($id) {
        $result = updateRow(tbl_sms_buy, ['activity' => 'Delete'], ['id' => $id]);
        if ($result)
            set_message('success', 'Successfully Deleted');
        else
            set_message('error', 'Can Not Updated');

        redirect('sms-transaction');
    }

}



public function transaction_active($id, $qty){
  $mysetting = $this->sms_model->get_sms_setting();
  $old_limit = $mysetting->sms_limit;
  $new_limit = $old_limit + $qty;
  if ($id) {
      $result = updateRow(tbl_sms_buy, ['status' => 'Active'], ['id' => $id]);
      $results = updateRow(tbl_sms_setting, ['sms_limit' => $new_limit], ['id' => 1]);



      if ($result){
        set_message('success', 'Successfully Deleted');
      }else{
        set_message('error', 'Can Not Updated');
      }

      redirect('sms-transaction');
  }

}


}

?>
