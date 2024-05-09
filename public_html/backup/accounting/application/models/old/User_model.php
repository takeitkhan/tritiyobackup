<?php

/**
 * @property Admin_model $admin_model Administrator Model
 * @property Datatables $datatables Datatables
 * @property Common_model $common_model Common Model
 */
class User_model extends Common_model{
    public function __construct(){
        parent::__construct();
    }

    function get_student_list($search){
        $this->db->select('*');
        if(@$search['isActive'] != '') {
            if (@$search['isActive'] == 1) {
                $this->db->where('isActive', $search['isActive']);
            } else  {
                $this->db->where('isActive', 0);
            }
        }
        if(@$search['Class']) {
            $this->db->where('Class', $search['Class']);
        }
        if(@$search['Section']) {
            $this->db->where('Section', $search['Section']);
        }
        if(@$search['GroupId']) {
            $this->db->where('GroupId', $search['GroupId']);
        }
        if(@$search['Department']) {
            $this->db->where('Department', $search['Department']);
        }
        $this->db->order_by('UserId', 'DESC');
        $query = $this->db->get('u_std_information', $search['limit'], $search['offset']);
        $row = $query->result_array();
        return $row;
    }
    function count_student_list($search){
        $this->db->select('*');
        if(@$search['isActive'] != '') {
            if (@$search['isActive'] == 1) {
                $this->db->where('isActive', $search['isActive']);
            } else  {
                $this->db->where('isActive', 0);
            }
        }
        if(@$search['Class']) {
            $this->db->where('Class', $search['Class']);
        }
        if(@$search['Section']) {
            $this->db->where('Section', $search['Section']);
        }
        if(@$search['GroupId']) {
            $this->db->where('GroupId', $search['GroupId']);
        }
        if(@$search['Department']) {
            $this->db->where('Department', $search['Department']);
        }
        $row = $this->db->count_all_results('u_std_information');
        return $row;
    }

    function get_staff_list($search){
        $this->db->select('*');

        if(@$search['isActive'] != '') {
            if (@$search['isActive'] == 1) {
                $this->db->where('isActive', $search['isActive']);
            } else  {
                $this->db->where('isActive', 0);
            }
        }

        if(@$search['UserId']) {
            $this->db->where('UserId', $search['UserId']);
        }
        if(@$search['IndexNumber']) {
            $this->db->where('IndexNumber', $search['IndexNumber']);
        }
        $this->db->order_by('UserId', 'DESC');
        $query = $this->db->get('u_tchstaff_information', $search['limit'], $search['offset']);
        $row = $query->result_array();
        return $row;
    }
    function count_staff_list($search){
        $this->db->select('*');
        if(@$search['isActive'] != '') {
            if (@$search['isActive'] == 1) {
                $this->db->where('isActive', $search['isActive']);
            } else  {
                $this->db->where('isActive', 0);
            }
        }
        if(@$search['UserId']) {
            $this->db->where('UserId', $search['UserId']);
        }
        if(@$search['IndexNumber']) {
            $this->db->where('IndexNumber', $search['IndexNumber']);
        }
        $row = $this->db->count_all_results('u_tchstaff_information');
        return $row;
    }

    function get_guardians_list($search){
        $this->db->select('*');

        if(@$search['StudentId']) {
            $this->db->where('StudentId', $search['StudentId']);
        }
        if(@$search['GuardianId']) {
            $this->db->where('GuardianId', $search['GuardianId']);
        }
        $this->db->order_by('GuardianId', 'DESC');
        $query = $this->db->get('users_relation', $search['limit'], $search['offset']);
        $row = $query->result_array();
        return $row;
    }
    function count_guardians_list($search){
        $this->db->select('*');
        if(@$search['StudentId']) {
            $this->db->where('StudentId', $search['StudentId']);
        }
        if(@$search['GuardianId']) {
            $this->db->where('GuardianId', $search['GuardianId']);
        }
        $row = $this->db->count_all_results('users_relation');
        return $row;
    }
}