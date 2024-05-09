<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Common_model extends CI_Model
{

    private $user_infos = array();
    private $where = array();
    public $_usersTable = 'users';
    public $_callHistory = 'callhistory';
    public $_messages = 'messages';
    public $_groups = 'groups';
    public $_attendance = 'attendance';
    public $_usersRelation = 'users_relation';
    public $_usersGroups = 'users_groups';
    public $_country = 'country';
    public $_categories = 'categories';
    public $_uBasicInfoCriteria = 'u_basicinfocriteria';
    public $_posts = 'posts';
    public $_webpages = 'webpages';
    public $_initialSettings = 'initial_settings_info';
    public $_systemSettings = 'settings';
    public $_studentPromotion = 'student_promotion';
    public $_uBasicInfos = 'u_basicinfos';
    public $_uBusinesses = 'u_businesses';
    public $_uEducationHistory = 'u_educationhistory';
    public $_uOtherCriterias = 'u_othercriterias';
    public $_uSubscriptions = 'u_subscriptions';
    public $_uWorkHistory = 'u_workhistory';
    public $_studentInformation = 'u_std_information';
    public $_tchstaff_information = 'u_tchstaff_information';
    public $_online_applicants = 'online_applicants';
    public $_results = 'results';
    public $_blocks = 'blocks';

    /** Division Wise Data **/
    public $_upazillas = 'upazilas';
    public $_districts = 'districts';
    public $_divisions = 'divisions';

    /** Payments Modules Tables */
    public $_ledgernames = 'acc_ledgernames';
    public $_paymentsentries = 'acc_payments';
    public $_transactions = 'acc_transactions_validator';

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
     *
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

    function get_countries()
    {
        $this->db->from('country');
        $this->db->order_by('Name');
        $result = $this->db->get();
        $return = array();
        if ($result->num_rows() > 0) {
            foreach ($result->result_array() as $row) {
                $return[$row['CountryId']] = $row['Name'];
            }
        }

        return $return;

    }

    function get_pages()
    {
        $this->db->from($this->_webpages);
        $this->db->order_by('PageTitle');
        $result = $this->db->get();
        $return = array();
        if ($result->num_rows() > 0) {
            $return[0] = "Select a Page";
            foreach ($result->result_array() as $row) {
                $return[$row['PageId']] = $row['PageTitle'];
            }
        }

        return $return;

    }

    function get_pages_by_id($id)
    {
        $where = array('PageId' => $id);
        $rows = $this->getRecords($this->_webpages, $where, 'all');

        if ($this->isRecordsExists($this->_webpages, $where)) {
            foreach ($rows as $row):
                $elements = $row;
            endforeach;
            return $elements;
        } else {
            $nodata = 'No Data Found';
            return $nodata;
        }

    }

    function get_initial_settings_by_id($id)
    {
        $where = array('SettingsId' => $id);
        $rows = $this->getRecords($this->_initialSettings, $where, 'all');

        if ($this->isRecordsExists($this->_initialSettings, $where)) {
            foreach ($rows as $row):
                $elements = $row;
            endforeach;
            return $elements;
        } else {
            $nodata = 'No Data Found';
            return $nodata;
        }

    }

    function get_categories_by_module_id($id)
    {
        $this->db->from($this->_categories);
        $this->db->where('ModuleId', $id);
        $this->db->order_by('CategoryName');
        $result = $this->db->get();
        $return = array();
        if ($result->num_rows() > 0) {
            foreach ($result->result_array() as $row) {
                $return[$row['CategoryId']] = $row['CategoryName'];
            }
        }
        return $return;
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
                $return[$row['SettingsId']] = $row['SettingsName'] . (isset($row['SettingsDescription']) ? " (" . $row['SettingsDescription'] . ")" : "");
            }
        }
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

    function get_users_type()
    {
        $this->db->select('*')->from($this->_groups);
        $this->db->where('id !=', 1);
        $this->db->where('id !=', 2);
        $this->db->where('id !=', 4);
        $this->db->where('id !=', 5);
        //SELECT * FROM groups WHERE id <> '1'  AND id <> '2' AND id <> '4' AND id <> '5'
        $result = $this->db->get();
        $return = array();
        if ($result->num_rows() > 0) {
            $return[0] = "Select one";
            foreach ($result->result_array() as $row) {
                $return[$row['id']] = $row['name'] . (isset($row['description']) ? " (" . $row['description'] . ")" : "");
            }
        }
        return $return;
//        $rows = $result->result_array();
//        return $rows;

    }

    function get_directory_categories($id)
    {
        $this->db->select('*, (SELECT COUNT(*) FROM u_businesses WHERE CateogryId = categories.CategoryId) AS TotalBusinesses')->from('categories')
            ->where('ModuleId', $id)
            ->order_by('CategoryName');
        $result = $this->db->get();
        $rows = $result->result_array();
        return $rows;
    }

    function get_count($table)
    {
        $this->db->select('COUNT(*) AS Total')
            ->from($table);
        $result = $this->db->get();

        if ($result->num_rows() > 0) {
            foreach ($result->result_array() as $row) {
                return $row['Total'];
            }
        }
    }

    function get_user_single_informations_by_user_id($userid)
    {
        $this->db->select('*,
                (SELECT name FROM groups WHERE id = group_id) AS groupname,
                (
                    CASE
                        group_id
                            WHEN 3 THEN ((SELECT GROUP_CONCAT(CONCAT_WS(\'|\', m.InstituteName, m.Degree, m.Concentrations, m.GPA, FROM_UNIXTIME(m.PassingYear, \'%d-%m-%Y\'), m.Board, m.PSession, m.IsGraduated) SEPARATOR \',\') AS eduhis FROM u_educationhistory AS m WHERE m.UserId = user_id))
                            WHEN 4 THEN ((SELECT GROUP_CONCAT(CONCAT_WS(\'|\', m.InstituteName, m.Degree, m.Concentrations, m.GPA, FROM_UNIXTIME(m.PassingYear, \'%d-%m-%Y\'), m.Board, m.PSession, m.IsGraduated) SEPARATOR \',\') AS eduhis FROM u_educationhistory AS m WHERE m.UserId = user_id))
                            WHEN 5 THEN ((SELECT GROUP_CONCAT(CONCAT_WS(\'|\', m.InstituteName, m.Degree, m.Concentrations, m.GPA, FROM_UNIXTIME(m.PassingYear, \'%d-%m-%Y\'), m.Board, m.PSession, m.IsGraduated) SEPARATOR \',\') AS eduhis FROM u_educationhistory AS m WHERE m.UserId = user_id))
                            WHEN 6 THEN ((SELECT GROUP_CONCAT(CONCAT_WS(\'|\', m.InstituteName, m.Degree, m.Concentrations, m.GPA, FROM_UNIXTIME(m.PassingYear, \'%d-%m-%Y\'), m.Board, m.PSession, m.IsGraduated) SEPARATOR \',\') AS eduhis FROM u_educationhistory AS m WHERE m.UserId = user_id))
                            WHEN 7 THEN ((SELECT GROUP_CONCAT(CONCAT_WS(\'|\', m.InstituteName, m.Degree, m.Concentrations, m.GPA, FROM_UNIXTIME(m.PassingYear, \'%d-%m-%Y\'), m.Board, m.PSession, m.IsGraduated) SEPARATOR \',\') AS eduhis FROM u_educationhistory AS m WHERE m.UserId = user_id))
                            WHEN 8 THEN ((SELECT GROUP_CONCAT(CONCAT_WS(\'|\', m.InstituteName, m.Degree, m.Concentrations, m.GPA, FROM_UNIXTIME(m.PassingYear, \'%d-%m-%Y\'), m.Board, m.PSession, m.IsGraduated) SEPARATOR \',\') AS eduhis FROM u_educationhistory AS m WHERE m.UserId = user_id))
                            WHEN 9 THEN ((SELECT GROUP_CONCAT(CONCAT_WS(\'|\', m.InstituteName, m.Degree, m.Concentrations, m.GPA, FROM_UNIXTIME(m.PassingYear, \'%d-%m-%Y\'), m.Board, m.PSession, m.IsGraduated) SEPARATOR \',\') AS eduhis FROM u_educationhistory AS m WHERE m.UserId = user_id))
                            WHEN 10 THEN ((SELECT GROUP_CONCAT(CONCAT_WS(\'|\', m.InstituteName, m.Degree, m.Concentrations, m.GPA, FROM_UNIXTIME(m.PassingYear, \'%d-%m-%Y\'), m.Board, m.PSession, m.IsGraduated) SEPARATOR \',\') AS eduhis FROM u_educationhistory AS m WHERE m.UserId = user_id))
                            WHEN 11 THEN ((SELECT GROUP_CONCAT(CONCAT_WS(\'|\', m.InstituteName, m.Degree, m.Concentrations, m.GPA, FROM_UNIXTIME(m.PassingYear, \'%d-%m-%Y\'), m.Board, m.PSession, m.IsGraduated) SEPARATOR \',\') AS eduhis FROM u_educationhistory AS m WHERE m.UserId = user_id))
                            WHEN 12 THEN ((SELECT GROUP_CONCAT(CONCAT_WS(\'|\', m.InstituteName, m.Degree, m.Concentrations, m.GPA, FROM_UNIXTIME(m.PassingYear, \'%d-%m-%Y\'), m.Board, m.PSession, m.IsGraduated) SEPARATOR \',\') AS eduhis FROM u_educationhistory AS m WHERE m.UserId = user_id))
                        END
                ) AS educationhistory,
                (
                    CASE
                        group_id
                            WHEN 4 THEN (SELECT
                                CONCAT_WS(\'|\',
                                    (SELECT SettingsName FROM initial_settings_info WHERE SettingsId = Class),
                                    ClassRoll,
                                    (SELECT SettingsName FROM initial_settings_info WHERE SettingsId = Section),
                                    (SELECT SettingsName FROM initial_settings_info WHERE SettingsId = GroupId),
                                    (SELECT SettingsName FROM initial_settings_info WHERE SettingsId = Department)
                                )
                            FROM u_std_information AS p WHERE p.UserId = user_id)
                            WHEN 3 THEN (SELECT
                                CONCAT_WS(\'|\',                                    
                                    SalaryScale,
                                    DateAttended,
        							IndexNumber,
					        		BankAccountNumber,
					        		BankName,
					        		BankBranchName,
        							(SELECT SettingsName FROM initial_settings_info WHERE SettingsId = Designation),
                                    (SELECT SettingsDescription FROM initial_settings_info WHERE SettingsId = Designation)
                                )
                            FROM u_tchstaff_information AS p WHERE p.UserId = user_id)
                        END
                ) AS enstdinfo,
                (
                    CASE
                        group_id
                            WHEN 4 THEN (SELECT
                                CONCAT_WS(\'|\',
                                    (SELECT SettingsDescription FROM initial_settings_info WHERE SettingsId = Class),
                                    ClassRoll,
                                    (SELECT SettingsDescription FROM initial_settings_info WHERE SettingsId = Section),
                                    (SELECT SettingsDescription FROM initial_settings_info WHERE SettingsId = GroupId),
                                    (SELECT SettingsDescription FROM initial_settings_info WHERE SettingsId = Department)
                                )
                            FROM u_std_information AS p WHERE p.UserId = user_id)
                            WHEN 3 THEN (SELECT
                                CONCAT_WS(\'|\',
                                    SalaryScale,
                                    DateAttended,
        							IndexNumber,
					        		BankAccountNumber,
					        		BankName,
					        		BankBranchName,
        							(SELECT SettingsName FROM initial_settings_info WHERE SettingsId = Designation),
                                    (SELECT SettingsDescription FROM initial_settings_info WHERE SettingsId = Designation)
                                )
                            FROM u_tchstaff_information AS p WHERE p.UserId = user_id)
                        END
                ) AS bnstdinfo,
                (SELECT full_name_bn FROM users WHERE id = user_id) AS banglaname,
                (SELECT full_name_en FROM users WHERE id = user_id) AS englishname,
                (SELECT father_name_bn FROM users WHERE id = user_id) AS banglafname,
                (SELECT father_name_en FROM users WHERE id = user_id) AS englishfname,
                (SELECT mother_name_bn FROM users WHERE id = user_id) AS banglamname,
                (SELECT mother_name_en FROM users WHERE id = user_id) AS englishmname,
                (SELECT phone FROM users WHERE id = user_id) AS phone,
                (SELECT Gender FROM u_basicinfos WHERE UserId = user_id) AS gendernum,
                (SELECT (SELECT SettingsName FROM initial_settings_info WHERE SettingsId = Gender) AS gender FROM u_basicinfos WHERE UserId = user_id) AS genderen,
                (SELECT (SELECT SettingsDescription FROM initial_settings_info WHERE SettingsId = Gender) AS gender FROM u_basicinfos WHERE UserId = user_id) AS genderbn,
                (SELECT UniqueNumber FROM u_basicinfos WHERE UserId = user_id) AS uniquenumber,
                (SELECT Religion FROM u_basicinfos WHERE UserId = user_id) AS religion,
                (SELECT (SELECT SettingsName FROM initial_settings_info WHERE SettingsId = Religion) AS gender FROM u_basicinfos WHERE UserId = user_id) AS religionen,
                (SELECT (SELECT SettingsDescription FROM initial_settings_info WHERE SettingsId = Religion) AS gender FROM u_basicinfos WHERE UserId = user_id) AS religionbn,
                (SELECT Address FROM u_basicinfos WHERE UserId = user_id) AS address,
                (SELECT Upazila FROM u_basicinfos WHERE UserId = user_id) AS upazila,
                (SELECT (SELECT name FROM upazilas WHERE id = Upazila) AS upazilaname FROM u_basicinfos WHERE UserId = user_id) AS upazilaen,
                (SELECT (SELECT bn_name FROM upazilas WHERE id = Upazila) AS upazilaname FROM u_basicinfos WHERE UserId = user_id) AS upazilabn,
                (SELECT District FROM u_basicinfos WHERE UserId = user_id) AS district,
                (SELECT (SELECT name FROM districts WHERE id = District) AS districtname FROM u_basicinfos WHERE UserId = user_id) AS districten,
                (SELECT (SELECT bn_name FROM districts WHERE id = District) AS districtname FROM u_basicinfos WHERE UserId = user_id) AS districtbn,
                (SELECT FROM_UNIXTIME(DateOfBirth, \'%Y-%m-%d\') FROM u_basicinfos WHERE UserId = user_id) AS dob,
                (SELECT FROM_UNIXTIME(JoinDate, \'%Y-%m-%d\') FROM u_basicinfos WHERE UserId = user_id) AS joindate,
                (SELECT BloodGroup FROM u_basicinfos WHERE UserId = user_id) AS bloodgroup,
                (SELECT (SELECT SettingsName FROM initial_settings_info WHERE SettingsId = BloodGroup) AS bloodgroup FROM u_basicinfos WHERE UserId = user_id) AS bloodgroupen,
                (SELECT (SELECT SettingsDescription FROM initial_settings_info WHERE SettingsId = BloodGroup) AS bloodgroup FROM u_basicinfos WHERE UserId = user_id) AS bloodgroupbn,
                (SELECT CountryId FROM u_basicinfos WHERE UserId = user_id) AS country,
                (SELECT Biography FROM u_basicinfos WHERE UserId = user_id) AS biography,
                (SELECT UserPhoto FROM u_basicinfos WHERE UserId = user_id) AS userphoto,
                (SELECT IF(MaritalStatus = 1, \'Married\', \'Unmarried\') FROM u_basicinfos WHERE UserId = user_id) AS maritalstatusen,
                (SELECT IF(MaritalStatus = 1, \'বিবাহিত\', \'অবিবাহিত \') FROM u_basicinfos WHERE UserId = user_id) AS maritalstatusbn,
                (SELECT EnrollmentStatus FROM u_basicinfos WHERE UserId = user_id) AS enrollmentstatus,
                (SELECT (SELECT SettingsName FROM initial_settings_info WHERE SettingsId = EnrollmentStatus) AS enrollmentstatus FROM u_basicinfos WHERE UserId = user_id) AS enrollmentstatus,
                (SELECT (SELECT SettingsDescription FROM initial_settings_info WHERE SettingsId = EnrollmentStatus) AS enrollmentstatus FROM u_basicinfos WHERE UserId = user_id) AS enrollmentstatus
        FROM users_groups
        WHERE user_id = "' . $userid . '"');
        $sql = $this->db->get();
        if ($sql->num_rows() > 0) {
            $data = $sql->row_array();
            return $data;
        } else {
            return false;
        }

        /**
         * SELECT *,
         * (SELECT name FROM groups WHERE id = group_id) AS groupname,
         * (
         * CASE
         * group_id
         * WHEN 3 THEN ((SELECT GROUP_CONCAT(CONCAT_WS('|', m.InstituteName, m.Degree, m.Concentrations, FROM_UNIXTIME(m.StartDate, '%d-%m-%Y'), FROM_UNIXTIME(m.EndDate, '%d-%m-%Y'), m.GPA, m.IsGraduated) SEPARATOR ',') AS eduhis FROM u_educationhistory AS m WHERE m.UserId = user_id))
         * WHEN 4 THEN ((SELECT GROUP_CONCAT(CONCAT_WS('|', m.InstituteName, m.Degree, m.Concentrations, FROM_UNIXTIME(m.StartDate, '%d-%m-%Y'), FROM_UNIXTIME(m.EndDate, '%d-%m-%Y'), m.GPA, m.IsGraduated) SEPARATOR ',') AS eduhis FROM u_educationhistory AS m WHERE m.UserId = user_id))
         * WHEN 5 THEN ((SELECT GROUP_CONCAT(CONCAT_WS('|', m.InstituteName, m.Degree, m.Concentrations, FROM_UNIXTIME(m.StartDate, '%d-%m-%Y'), FROM_UNIXTIME(m.EndDate, '%d-%m-%Y'), m.GPA, m.IsGraduated) SEPARATOR ',') AS eduhis FROM u_educationhistory AS m WHERE m.UserId = user_id))
         * WHEN 6 THEN ((SELECT GROUP_CONCAT(CONCAT_WS('|', m.InstituteName, m.Degree, m.Concentrations, FROM_UNIXTIME(m.StartDate, '%d-%m-%Y'), FROM_UNIXTIME(m.EndDate, '%d-%m-%Y'), m.GPA, m.IsGraduated) SEPARATOR ',') AS eduhis FROM u_educationhistory AS m WHERE m.UserId = user_id))
         * WHEN 7 THEN ((SELECT GROUP_CONCAT(CONCAT_WS('|', m.InstituteName, m.Degree, m.Concentrations, FROM_UNIXTIME(m.StartDate, '%d-%m-%Y'), FROM_UNIXTIME(m.EndDate, '%d-%m-%Y'), m.GPA, m.IsGraduated) SEPARATOR ',') AS eduhis FROM u_educationhistory AS m WHERE m.UserId = user_id))
         * WHEN 8 THEN ((SELECT GROUP_CONCAT(CONCAT_WS('|', m.InstituteName, m.Degree, m.Concentrations, FROM_UNIXTIME(m.StartDate, '%d-%m-%Y'), FROM_UNIXTIME(m.EndDate, '%d-%m-%Y'), m.GPA, m.IsGraduated) SEPARATOR ',') AS eduhis FROM u_educationhistory AS m WHERE m.UserId = user_id))
         * WHEN 9 THEN ((SELECT GROUP_CONCAT(CONCAT_WS('|', m.InstituteName, m.Degree, m.Concentrations, FROM_UNIXTIME(m.StartDate, '%d-%m-%Y'), FROM_UNIXTIME(m.EndDate, '%d-%m-%Y'), m.GPA, m.IsGraduated) SEPARATOR ',') AS eduhis FROM u_educationhistory AS m WHERE m.UserId = user_id))
         * WHEN 10 THEN ((SELECT GROUP_CONCAT(CONCAT_WS('|', m.InstituteName, m.Degree, m.Concentrations, FROM_UNIXTIME(m.StartDate, '%d-%m-%Y'), FROM_UNIXTIME(m.EndDate, '%d-%m-%Y'), m.GPA, m.IsGraduated) SEPARATOR ',') AS eduhis FROM u_educationhistory AS m WHERE m.UserId = user_id))
         * WHEN 11 THEN ((SELECT GROUP_CONCAT(CONCAT_WS('|', m.InstituteName, m.Degree, m.Concentrations, FROM_UNIXTIME(m.StartDate, '%d-%m-%Y'), FROM_UNIXTIME(m.EndDate, '%d-%m-%Y'), m.GPA, m.IsGraduated) SEPARATOR ',') AS eduhis FROM u_educationhistory AS m WHERE m.UserId = user_id))
         * WHEN 12 THEN ((SELECT GROUP_CONCAT(CONCAT_WS('|', m.InstituteName, m.Degree, m.Concentrations, FROM_UNIXTIME(m.StartDate, '%d-%m-%Y'), FROM_UNIXTIME(m.EndDate, '%d-%m-%Y'), m.GPA, m.IsGraduated) SEPARATOR ',') AS eduhis FROM u_educationhistory AS m WHERE m.UserId = user_id))
         * END
         * ) AS educationhistory,
         * (
         * CASE
         * group_id
         * WHEN 4 THEN (SELECT
         * CONCAT_WS('|',
         * (SELECT SettingsName FROM initial_settings_info WHERE SettingsId = Class),
         * ClassRoll,
         * (SELECT SettingsName FROM initial_settings_info WHERE SettingsId = Section),
         * (SELECT SettingsName FROM initial_settings_info WHERE SettingsId = GroupId),
         * (SELECT SettingsName FROM initial_settings_info WHERE SettingsId = Department)
         * )
         * FROM u_std_information AS p WHERE p.UserId = user_id)
         * WHEN 3 THEN (SELECT
         * CONCAT_WS('|',
         * (SELECT SettingsName FROM initial_settings_info WHERE SettingsId = Designation),
         * SalaryScale,
         * DateAttended
         * )
         * FROM u_tchstaff_information AS p WHERE p.UserId = user_id)
         * END
         * ) AS enstdinfo,
         * (
         * CASE
         * group_id
         * WHEN 4 THEN (SELECT
         * CONCAT_WS('|',
         * (SELECT SettingsDescription FROM initial_settings_info WHERE SettingsId = Class),
         * ClassRoll,
         * (SELECT SettingsDescription FROM initial_settings_info WHERE SettingsId = Section),
         * (SELECT SettingsDescription FROM initial_settings_info WHERE SettingsId = GroupId),
         * (SELECT SettingsDescription FROM initial_settings_info WHERE SettingsId = Department)
         * )
         * FROM u_std_information AS p WHERE p.UserId = user_id)
         * WHEN 3 THEN (SELECT
         * CONCAT_WS('|',
         * (SELECT SettingsDescription FROM initial_settings_info WHERE SettingsId = Designation),
         * SalaryScale,
         * DateAttended
         * )
         * FROM u_tchstaff_information AS p WHERE p.UserId = user_id)
         * END
         * ) AS bnstdinfo,
         * (SELECT full_name_bn FROM users WHERE id = user_id) AS banglaname,
         * (SELECT full_name_en FROM users WHERE id = user_id) AS englishname,
         * (SELECT father_name_bn FROM users WHERE id = user_id) AS banglafname,
         * (SELECT father_name_en FROM users WHERE id = user_id) AS englishfname,
         * (SELECT mother_name_bn FROM users WHERE id = user_id) AS banglamname,
         * (SELECT mother_name_en FROM users WHERE id = user_id) AS englishmname,
         * (SELECT phone FROM users WHERE id = user_id) AS phone,
         * (SELECT Gender FROM u_basicinfos WHERE UserId = user_id) AS gendernum,
         * (SELECT (SELECT SettingsName FROM initial_settings_info WHERE SettingsId = Gender) AS gender FROM u_basicinfos WHERE UserId = user_id) AS genderen,
         * (SELECT (SELECT SettingsDescription FROM initial_settings_info WHERE SettingsId = Gender) AS gender FROM u_basicinfos WHERE UserId = user_id) AS genderbn,
         * (SELECT UniqueNumber FROM u_basicinfos WHERE UserId = user_id) AS uniquenumber,
         * (SELECT Religion FROM u_basicinfos WHERE UserId = user_id) AS religion,
         * (SELECT (SELECT SettingsName FROM initial_settings_info WHERE SettingsId = Religion) AS gender FROM u_basicinfos WHERE UserId = user_id) AS religionen,
         * (SELECT (SELECT SettingsDescription FROM initial_settings_info WHERE SettingsId = Religion) AS gender FROM u_basicinfos WHERE UserId = user_id) AS religionbn,
         * (SELECT Address FROM u_basicinfos WHERE UserId = user_id) AS address,
         * (SELECT Upazila FROM u_basicinfos WHERE UserId = user_id) AS upazila,
         * (SELECT (SELECT name FROM upazilas WHERE id = Upazila) AS upazilaname FROM u_basicinfos WHERE UserId = user_id) AS upazilaen,
         * (SELECT (SELECT bn_name FROM upazilas WHERE id = Upazila) AS upazilaname FROM u_basicinfos WHERE UserId = user_id) AS upazilabn,
         * (SELECT District FROM u_basicinfos WHERE UserId = user_id) AS district,
         * (SELECT (SELECT name FROM districts WHERE id = District) AS districtname FROM u_basicinfos WHERE UserId = user_id) AS districten,
         * (SELECT (SELECT bn_name FROM districts WHERE id = District) AS districtname FROM u_basicinfos WHERE UserId = user_id) AS districtbn,
         * (SELECT FROM_UNIXTIME(DateOfBirth, '%d-%m-%Y') FROM u_basicinfos WHERE UserId = user_id) AS dob,
         * (SELECT FROM_UNIXTIME(JoinDate, '%d-%m-%Y') FROM u_basicinfos WHERE UserId = user_id) AS joindate,
         * (SELECT BloodGroup FROM u_basicinfos WHERE UserId = user_id) AS bloodgroup,
         * (SELECT (SELECT SettingsName FROM initial_settings_info WHERE SettingsId = BloodGroup) AS bloodgroup FROM u_basicinfos WHERE UserId = user_id) AS bloodgroupen,
         * (SELECT (SELECT SettingsDescription FROM initial_settings_info WHERE SettingsId = BloodGroup) AS bloodgroup FROM u_basicinfos WHERE UserId = user_id) AS bloodgroupbn,
         * (SELECT CountryId FROM u_basicinfos WHERE UserId = user_id) AS country,
         * (SELECT Biography FROM u_basicinfos WHERE UserId = user_id) AS biography,
         * (SELECT UserPhoto FROM u_basicinfos WHERE UserId = user_id) AS userphoto,
         * (SELECT IF(MaritalStatus = 1, 'Married', 'Unmarried') FROM u_basicinfos WHERE UserId = user_id) AS maritalstatusen,
         * (SELECT IF(MaritalStatus = 1, 'বিবাহিত', 'অবিবাহিত ') FROM u_basicinfos WHERE UserId = user_id) AS maritalstatusbn,
         * (SELECT EnrollmentStatus FROM u_basicinfos WHERE UserId = user_id) AS enrollmentstatus,
         * (SELECT (SELECT SettingsName FROM initial_settings_info WHERE SettingsId = EnrollmentStatus) AS enrollmentstatus FROM u_basicinfos WHERE UserId = user_id) AS enrollmentstatus,
         * (SELECT (SELECT SettingsDescription FROM initial_settings_info WHERE SettingsId = EnrollmentStatus) AS enrollmentstatus FROM u_basicinfos WHERE UserId = user_id) AS enrollmentstatus
         * FROM users_groups
         * WHERE user_id = 16111300
         */

    }

    public function all_totals()
    {
        $sql = 'SELECT * FROM
                    (
                    SELECT SUM(Amount) AS allcredit FROM acc_payments a
                    LEFT JOIN acc_ledgernames b
                    ON a.LedgerNameId = b.TypeId
                    WHERE b.LedgerTypeId = 2
                    ) AS allcredit,
                    (
                    SELECT SUM(Amount) AS alldebit FROM acc_payments a
                        LEFT JOIN acc_ledgernames b
                        ON a.LedgerNameId = b.TypeId
                        WHERE b.LedgerTypeId = 1
                    ) AS alldebit,
                    (SELECT COUNT(*) AS boys FROM u_basicinfos WHERE Gender = 21) AS boys,
                    (SELECT COUNT(*) AS girls FROM u_basicinfos WHERE Gender = 22) AS girls,
                    (SELECT COUNT(*) AS totalstudents FROM users_groups WHERE group_id = 4) AS ts,
                    (SELECT COUNT(*) AS totalteachers FROM users_groups WHERE group_id NOT IN (1, 2, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13)) AS tt,
                    (SELECT COUNT(*) AS attendancetoday FROM attendance WHERE AttDate = CURDATE()) AS attt,
                    (SELECT COUNT(*) AS attendanceyesterday FROM attendance WHERE AttDate = CURDATE() - 1) AS atty';
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return $query->result();
        }
    }

    public function class_wise_students()
    {
        $sql = '
        SELECT ClsId, (SELECT SettingsName FROM initial_settings_info WHERE SettingsId = ClsId) AS ClsName, COUNT(*) AS CWC FROM (
            SELECT (SELECT Class FROM u_std_information WHERE u_std_information.UserId = users_groups.user_id LIMIT 0,1) AS ClsId FROM users_groups WHERE group_id = 4
        ) AS q
        GROUP BY ClsId
        ';
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return $query->result();
        }
    }
}