<?php
class Customers_model extends Common_model {
    public function __construct(){
        parent::__construct();
    }

    public function all($search = []){

    }

    public function count($search = []){

    }

    public function customer_list(array $search){
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
            $this->db->or_like('contact', $search_final['title']);
            $this->db->or_like('email', $search_final['title']);
            $this->db->or_like('company_name', $search_final['title']);
            $this->db->or_like('office_address', $search_final['title']);
        }
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get(tbl_customers, $search_final['limit'], $search_final['offset']);
        $row = $query->result();
        //echo $this->db->last_query();
        //echo $this->db->last_query();
        return $row;
    }
    public function customer_count(array $search){
        $options = array(
            'status' => '',
            'title' => '',
            'limit' => '',
            'offset' => '',
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
            $this->db->or_like('contact', $search_final['title']);
            $this->db->or_like('email', $search_final['title']);
            $this->db->or_like('company_name', $search_final['title']);
            $this->db->or_like('office_address', $search_final['title']);
        }
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get(tbl_customers);
        $row = $query->num_rows();
        //echo $this->db->last_query();
        return $row;
    }
    public function customer_deleted_list(array $search){
        $options = array(
            'status' => '',
            'title' => '',
            'limit' => 5,
            'offset' => 0,
        );

        $search_final = array_merge($options, $search);
        $this->db->select('*');
        $this->db->where('activity', 'Delete');
        if(@$search_final['status']) {
            $this->db->where('status', $search_final['status']);
        }
        if(@$search_final['title']) {
            $this->db->like('id', $search_final['title']);
            $this->db->or_like('name', $search_final['title']);
            $this->db->or_like('contact', $search_final['title']);
            $this->db->or_like('email', $search_final['title']);
            $this->db->or_like('company_name', $search_final['title']);
            $this->db->or_like('office_address', $search_final['title']);
        }
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get(tbl_customers, $search_final['limit'], $search_final['offset']);
        $row = $query->result();
        //echo $this->db->last_query();
        //echo $this->db->last_query();
        return $row;
    }
    public function customer_deleted_count(array $search){
        $options = array(
            'status' => '',
            'title' => '',
            'limit' => '',
            'offset' => '',
        );

        $search_final = array_merge($options, $search);
        $this->db->select('*');
        $this->db->where('activity', 'Delete');
        if(@$search_final['status']) {
            $this->db->where('status', $search_final['status']);
        }
        if(@$search_final['title']) {
            $this->db->like('id', $search_final['title']);
            $this->db->or_like('name', $search_final['title']);
            $this->db->or_like('contact', $search_final['title']);
            $this->db->or_like('email', $search_final['title']);
            $this->db->or_like('company_name', $search_final['title']);
            $this->db->or_like('office_address', $search_final['title']);
        }
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get(tbl_customers);
        $row = $query->num_rows();
        //echo $this->db->last_query();
        return $row;
    }



}