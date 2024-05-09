<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Common_model extends CI_Model{

    private $user_infos = array();
    private $where = array();

    public $_ci_sessions = 'ci_sessions';
    public $_users = 'users';
    public $_groups = 'groups';
    public $_users_groups = 'users_groups';
    public $_store_settings = 'settings';
    public $_upazillas = 'upazilas';
    public $_districts = 'districts';
    public $_divisions = 'divisions';

    /**
     * @package:EasyTask
     * @Common_model::construct().
     * @Author: Idea Tweaker
     */
    function __construct()
    {
        parent::__construct();
    }

    /**
     * @Common_model::insertRecords()
     * @access:public
     * @Author: Idea Tweaker
     * @params:$table
     * @params:$records
     */
    public function insertRecords($table, $records)
    {
        $sql = $this->db->insert($table, $records);
        return ($sql) ? true : false;
    }

    /**
     * @Common_model::isUserExist()
     * @access:public
     * @Author: Idea Tweaker
     * @params:where
     * @return
     */
    public function isRecordsExists($table, $where)
    {
        return $this->getNumRows($table, $where);
    }

    /**
     * @Common_model::getNumRows()
     * @access:public
     * @Author: Idea Tweaker
     * @params:$table
     * @params:$where
     */
    public function getNumRows($table, $where = NULL)
    {
        if (!empty($where))
            $this->db->where($where);
        $this->db->from($table);
        return $this->db->count_all_results();
    }

    public function recordCount($table)
    {
        return $this->db->count_all($table);
    }

    public function recordCountwhere($table, $where)
    {
        $query = $this->db->get_where($table, $where);
        $rowcount = $query->num_rows();
        return $rowcount;
    }

    public function getRecordsLimit($table, $limit, $start)
    {
        $this->db->limit($limit, $start);
        $query = $this->db->get($table);

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

    public function getRecordsWithPager($table, $limit, $start)
    {
        $this->db->limit($limit, $start);
        $query = $this->db->get($table);

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

    public function getAllRecordsWhereWithPager($table, $limit, $start, $where)
    {
        $this->db->limit($limit, $start);
        $query = $this->db->get_where($table, $where);
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
        /* $sql = $this->db->get_where($table, $where);
          foreach ($sql->result() as $rows) {
          $data = $sql->result();
          }
          return $data; */
    }


    public function getAllRecordsJoinWhereWithPager($table, $limit, $start, $join, $where)
    {
        $this->db->limit($limit, $start);
        $query = $this->db->get_where($table, $where);
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

    /**
     * @Common_model::updateRecords()
     * @access:public
     * @Author: Idea Tweaker
     * @params:$table
     * @params:$data
     * @params:$where
     */
    public function updateRecords($table, $data, $where)
    {
        if (!empty($where))
            $this->db->where($where);
        $sql = $this->db->update($table, $data);

        return ($sql) ? 1 : 0;
    }

    /**
     * @param $table
     * @param $where
     * @param $option
     * @return array|bool
     */
    public function getRecords($table, $where, $option)
    {
        if (!empty($where))
            $sql = $this->db->get_where($table, $where);
        else
            $sql = $this->db->get($table);
        if ($sql->num_rows() > 0) {
            if ($option == "all") {
                foreach ($sql->result() as $rows) {
                    $data[] = $rows;
                }
            } else {
                $data = $sql->row_array();
            }
            return $data;
        } else
            return false;
    }

    /**
     * @Common_model::getAllRecords()  All data fetch korar jonno........ Where and Join sara
     * @Author: Samrat Khan
     * @access:public
     * @params:$table
     * @params:$where
     * @params:$option
     * @return
     */
    public function getAllRecords($table)
    {

        $sql = $this->db->get($table);
        if ($sql->num_rows() > 0) {
            foreach ($sql->result() as $rows) {
                $data[] = $rows;
            }
            return $data;
        }
    }

    /**
     * @Common_model::deleteRecords()
     * @access:public
     * @params:$table
     * @params:$where
     * @Author: Idea Tweaker
     */
    public function deleteRecords($table, $where = '')
    {
        if (empty($where))
            $del = $this->db->empty_table($table);
        else
            $del = $this->db->delete($table, $where);
        return ($del) ? 1 : 0;
    }

    /**
     * @Common_model::getLastInserted()
     * @access:public
     * @Author: Idea Tweaker
     */
    public function getLastInserted()
    {
        return $this->db->insert_id();
    }

    /**
     * @Common_model:: getAllRecordsWhere($table, $where);
     * @param type $table
     * @param type $where
     * @return type
     */
    public function getAllRecordsWhere($table, $where)
    {
        $sql = $this->db->get_where($table, $where);
        foreach ($sql->result() as $rows) {
            $data = $sql->result();
        }
        return $data;
    }

    /**
     * @
     * @param type $table
     * @param type $records
     * @return type
     */
    public function insertBatch($table, $records)
    {
        $sql = $this->db->insert_batch($table, $records);
        return ($sql) ? true : false;
    }

    /**
     * @param type $table
     * @param type $records
     * @return type
     */
    public function updateBatch($table, $records)
    {
        $sql = $this->db->update_batch($table, $records, 'resultid');
        return ($sql) ? true : false;
    }

    public function getFewCols($table, $cols = array(), $id = null)
    {
        $this->db->select($cols);
        $this->db->from($table);

        if (!is_null($id))
            $this->db->where('id', $id);
        return $this->db->get()->result();
    }
    function get_settings($id)
    {
        $this->db->from($this->_initialSettings)
            ->where('SettingsCategory', $id)
            ->order_by('SettingsId');
        $result = $this->db->get();
        $return = array();
        if ($result->num_rows() > 0) {
            $return[0] = "Select one";
            foreach ($result->result_array() as $row) {
                $return[$row['SettingsId']] = $row['SettingsName'] /*. (isset($row['SettingsDescription']) ? " (" . $row['SettingsDescription'] . ")" : "")*/;
            }
        }
        //echo $this->db->last_query();
        return $return;
    }
    public function getUsersGroups()
    {
        $ignore = array(1, 2, 3, 5, 6, 7, 8, 9, 10, 11, 12, 13);
        $this->db->select('*')
            ->from($this->_groups)
            ->where_not_in('id', $ignore);
        $result = $this->db->get();
        if ($result->num_rows() > 0) {
            $rows = $result->result_array();
            return $rows;
        }
        #SELECT * FROM groups WHERE id NOT IN (SELECT id FROM groups WHERE id = 1 OR id = 2 OR id = 5 OR id = 10 OR id = 11 OR id = 12 OR id = 12 OR id = 13);
    }
    function get_group_by_user_id($id)
    {
        $this->db->from($this->_usersGroups)
            ->where('user_id', $id);
        $result = $this->db->get();
        $rows = $result->result_array();
        return $rows;
    }
    function get_districts()
    {
        $this->db->from($this->_districts)
            ->order_by('id');
        $result = $this->db->get();
        $return = array();
        if ($result->num_rows() > 0) {
            foreach ($result->result_array() as $row) {
                $return[$row['id']] = $row['name'] . (isset($row['bn_name']) ? " (" . $row['bn_name'] . ")" : "");
            }
        }
        return $return;
    }
    function get_upazillas($id)
    {
        $this->db->from($this->_upazillas)
            ->where('district_id', $id)
            ->order_by('id');
        $result = $this->db->get();
        $return = array();
        if ($result->num_rows() > 0) {
            foreach ($result->result_array() as $row) {
                $return[$row['id']] = $row['name'] . (isset($row['bn_name']) ? " (" . $row['bn_name'] . ")" : "");
            }
        }
        return $return;
    }
    function get_upazillas_for_json($id)
    {
        $this->db->from($this->_upazillas)
            ->where('district_id', $id)
            ->order_by('id');
        $result = $this->db->get();
        if ($result->num_rows() > 0) {
            return $result->result_array();
        }
    }

}