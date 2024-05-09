<?php
class Sms_model extends Common_model{
    public function __construct(){
        parent::__construct();
    }


    public function sms_template_list(array $search)
    {
      $options = array(
          'status' => '',
          'title' => '',
          'limit' => 5,
          'offset' => 0,
      );

      $search_final = array_merge($options, $search);
      $this->db->select('*');
      $this->db->where('activity', 'Alive');
      if(@$search_final['status']) {
          $this->db->where('status', $search_final['status']);
      }
      if(@$search_final['title']) {
          $this->db->like('id', $search_final['title']);
          $this->db->or_like('name', $search_final['title']);
      }
      $this->db->order_by('id', 'DESC');
      $query = $this->db->get(tbl_sms_template, $search_final['limit'], $search_final['offset']);
      $row = $query->result();
      //echo $this->db->last_query();
      return $row;
    }

    public function get_sms_setting(){
    $row =  $this->db->select('*')
                ->where('id', 1)
                ->get(tbl_sms_setting)
                ->row();

    return  $row;
    }

    public function sms_template_list_compross()
    {
      $this->db->select('*');
      $this->db->where('status', 'Active');
      $this->db->where('activity', 'Alive');
      $this->db->order_by('id', 'DESC');
      $query = $this->db->get(tbl_sms_template);
      $row = $query->result();
      return $row;
    }

    public function inser_transaction(){
      $data = array(
        'qty' => $this->input->post('qty'),
        'status' => 'Inactive',
        'date' => date("Y-m-d"),
        'activity' => 'Alive'
      );

      $result =  $this->db->insert(tbl_sms_buy, $data);
      if($result){
        return true;
      }else {
        return false;
      }
    }


  public function sms_transaction_list(array $search)
  {
    $options = array(
        'status' => '',
        'title' => '',
        'limit' => 5,
        'offset' => 0,
    );

    $search_final = array_merge($options, $search);
    $this->db->select('*');
    $this->db->where('activity', 'Alive');
    if(@$search_final['status']) {
        $this->db->where('status', $search_final['status']);
    }
    if(@$search_final['title']) {
        $this->db->like('id', $search_final['title']);
        $this->db->or_like('name', $search_final['title']);
    }
    $this->db->order_by('id', 'DESC');
    $query = $this->db->get(tbl_sms_buy, $search_final['limit'], $search_final['offset']);
    $row = $query->result();
    //echo $this->db->last_query();
    return $row;
  }

  public function sms_archive_list(array $search){
    $options = array(
        'status' => '',
        'title' => '',
        'limit' => 5,
        'offset' => 0,
    );
    $search_final = array_merge($options, $search);
    $this->db->select('*');
    if(@$search_final['title']) {
        $this->db->like('send_number', $search_final['title']);
    }
    $this->db->order_by('id', 'DESC');
    $query = $this->db->get(tbl_sms_history, $search_final['limit'], $search_final['offset']);
    $row = $query->result();
    //echo $this->db->last_query();
    return $row;
  }

  public function sms_archive_list_coutn(array $search){
    $options = array(
        'status' => '',
        'title' => '',
        'limit' => 5,
        'offset' => 0,
    );
    $search_final = array_merge($options, $search);
    $this->db->select('*');
    if(@$search_final['title']) {
        $this->db->like('send_number', $search_final['title']);
    }
    $this->db->order_by('id', 'DESC');
    $query = $this->db->get(tbl_sms_history);
    $row = $query->num_rows();
    return $row;
  }

public function send_singel_sms($send_number, $send_message, $user_id = null){
$mysetting = $this->get_sms_setting();
$limit_sms = $mysetting->sms_limit;
if($mysetting->status == 'Active'){
    if($limit_sms > 0){
        $user = $mysetting->api_user;
        $pass = $mysetting->api_pass;
        $sid = $mysetting->api_sid;
        $url=  "http://sms.sslwireless.com/pushapi/dynamic/server.php";
        $param="user=$user&pass=$pass&sms[0][0]= $send_number &sms[0][1]=".urlencode($send_message)."&sms[0][2]=123456789&sid=$sid";
        $crl = curl_init();
        curl_setopt($crl,CURLOPT_SSL_VERIFYPEER,FALSE);
        curl_setopt($crl,CURLOPT_SSL_VERIFYHOST,2);
        curl_setopt($crl,CURLOPT_URL,$url);
        curl_setopt($crl,CURLOPT_HEADER,0);
        curl_setopt($crl,CURLOPT_RETURNTRANSFER,1);
        curl_setopt($crl,CURLOPT_POST,1);
        curl_setopt($crl,CURLOPT_POSTFIELDS,$param);
        $response = curl_exec($crl);
        $httpcode = curl_getinfo($crl, CURLINFO_HTTP_CODE);
        curl_close($crl);
        $xml = simplexml_load_string($response);
        $json = json_encode($xml);
        $array = json_decode($json,TRUE);
        return $array;
        

      }
    }


  }










}
