<?php
class Employee_model extends Common_model{
    public function __construct(){
        parent::__construct();
    }

    public function all($search = []){

    }

    public function count($search = []){

    }

    public function employee_list(array $search){
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
            $this->db->or_like('employee_no', $search_final['title']);
            $this->db->or_like('address', $search_final['title']);
        }
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get(tbl_employee_info, $search_final['limit'], $search_final['offset']);
        $row = $query->result();
        return $row;
    }
    public function employee_count(array $search){
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
            $this->db->or_like('employee_no', $search_final['title']);
            $this->db->or_like('address', $search_final['title']);
        }
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get(tbl_employee_info);
        $row = $query->num_rows();
        //echo $this->db->last_query();
        return $row;
    }
    public function employee_deleted_list(array $search){
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
            $this->db->or_like('employee_no', $search_final['title']);
            $this->db->or_like('address', $search_final['title']);
        }
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get(tbl_employee_info, $search_final['limit'], $search_final['offset']);
        $row = $query->result();
        return $row;
    }
    public function employee_deleted_count(array $search){
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
            $this->db->or_like('employee_no', $search_final['title']);
            $this->db->or_like('address', $search_final['title']);
        }
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get(tbl_employee_info);
        $row = $query->num_rows();
        return $row;
    }
}