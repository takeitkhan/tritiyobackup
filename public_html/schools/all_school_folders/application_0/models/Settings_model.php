<?php

/**
 * Class Profile_model
 *
 * @property Common_model $common_model Common models navigator
 */
class Settings_model extends Common_model
{
    public function __construct()
    {
        parent::__construct();
    }

    /*****************************
            Subjects Settings
    ****************************/
    public function subject_list(array $search)
    {
        $options = array(
            'status_type'=> '',
            'SettingsName' => '',
            'level' => '',
            'limit' => 5,
            'offset' => 0,
        );

        $search_final = array_merge($options, $search);
          // dd($search_final);
        $this->db->select('*');
        $this->db->where('SettingsCategory', 4);
        if(@$search_final['status_type']) {
            $this->db->where('status_type', $search_final['status_type']);
        }
        if(@$search_final['level']) {
            $this->db->where('class_level', $search_final['level']);
        }

        if(@$search_final['SettingsName']) {
            $this->db->like('SettingsName', $search_final['SettingsName']);
            $this->db->or_like('SettingsDescription', $search_final['SettingsName']);
        }
        $this->db->order_by('subject_sl', 'ASC');
        $query = $this->db->get($this->_initialSettings, $search_final['limit'], $search_final['offset']);
        $row = $query->result();
        //echo $this->db->last_query();
        return $row;
    }
    public function subject_count(array $search)
    {
        $options = array(
            'status_type'=> '',
            'level' => '',
            'limit' => 5,
            'offset' => 0,
        );

        $search_final = array_merge($options, $search);
        $this->db->select('*');
        $this->db->where('SettingsCategory', 4);
        if(@$search_final['status_type']) {
            $this->db->where('status_type', $search_final['status_type']);
        }
        if(@$search_final['level']) {
            $this->db->where('class_level', $search_final['level']);
        }
        if(@$search_final['SettingsName']) {
            $this->db->like('SettingsName', $search_final['SettingsName']);
            $this->db->or_like('SettingsDescription', $search_final['SettingsName']);
        }
        $this->db->order_by('SettingsId', 'DESC');
        $query = $this->db->get($this->_initialSettings);
        $row = $query->num_rows();
        //echo $this->db->last_query();
        return $row;
    }

    /********************************
    Designation Settings
    *********************************/

    public function getTotalBusinessesCount()
    {
        $table = $this->_uBusinesses;
        return $this->common_model->get_count($table);
    }

    public function getUsersInformation($userid)
    {
        $where = array('id' => $userid);
        $rows = $this->getRecords($this->_usersTable, $where, 'all');

        if ($this->isRecordsExists($this->_usersTable, $where)) {
            foreach ($rows as $row):
                $elements = $row;
            endforeach;
            return $elements;
        } else {
            $nodata = 'No Data Found';
            return $nodata;
        }
    }

    public function getPersonalInformation($userid)
    {
        $where = array('UserId' => $userid);

        $rows = $this->getRecords($this->_uBasicInfos, $where, 'all');

        if ($this->isRecordsExists($this->_uBasicInfos, $where)) {
            foreach ($rows as $row):
                $elements = $row;
            endforeach;
            return $elements;
        } else {
            $nodata = 'No Data Found';
            return $nodata;
        }

    }

    public function getEducationHistory($userid)
    {
        $where = array('UserId' => $userid);


        //$rows = $this->getRecords($this->_uEducationHistory, $where, 'all');
        $rows = $this->getRecords($this->_uEducationHistory, $where, 'all');


        if ($this->isRecordsExists($this->_uEducationHistory, $where)) {
            return $rows;
        } else {
            $nodata = 'No Data Found';
            return $nodata;
        }

    }

    public function getWorkHistory($userid)
    {
        $where = array('UserId' => $userid);

        $rows = $this->getRecords($this->_uWorkHistory, $where, 'all');

        if ($this->isRecordsExists($this->_uWorkHistory, $where)) {
            return $rows;
        } else {
            $rows = 'No Data Found';
            return $rows;
        }

    }

    public function getBusinesses($userid)
    {
        $where = array('UserId' => $userid);

        $rows = $this->getRecords($this->_uBusinesses, $where, 'all');

        if ($this->isRecordsExists($this->_uBusinesses, $where)) {
            return $rows;
        } else {
            $rows = 'No Data Found';
            return $rows;
        }

    }

    public function getSystemSettings()
    {
        $rows = $this->getAllRecords($this->_systemSettings);
        return $rows;
    }
//    public function getBusinessesWithCategoryName()
//    {
//        $query = $this->db->query('
//            SELECT
//                BusinessId,
//                UserId,
//                (SELECT CategoryName FROM categories WHERE categories.CategoryId = u_businesses.CateogryId) AS CategoryName,
//                OrganizationName,
//                OrganizationCity,
//                StartDate,
//                Services,
//                Notes
//            FROM u_businesses WHERE UserId = 1');
//
//        if ($query->num_rows() > 0) {
//            if ($option == "all") {
//                foreach ($query->result() as $rows) {
//                    $data[] = $rows;
//                }
//            } else {
//                $data = $query->row_array();
//            }
//            return $data;
//        }
//
//    }
    public function getCountryById($id)
    {
        $where = array('CountryId' => $id);

        $rows = $this->getRecords($this->_country, $where, 'all');

        if ($this->isRecordsExists($this->_country, $where)) {
            return $rows;
        } else {
            $rows = 'No Data Found';
            return $rows;
        }
    }

    public function getBlocks()
    {
        $this->db->select('*')->from($this->_blocks)->order_by('BlockId', 'DESC');
        $result = $this->db->get();
        if($result->num_rows() > 0) {
            return $rows = $result->result_array();
        }
//        $rows = $this->getAllRecords($this->_blocks);
//        return $rows;
    }

    public function getBlock($id)
    {
        $where = array('BlockId' => $id);
        $rows = $this->getRecords($this->_blocks, $where, 'all');
        return $rows;
    }

    public function checkPageRoute($value)
    {
        $this->db->select('PageRoute')
            ->from($this->_webpages)
            ->where('PageRoute', $value);
        $this->db->limit(1);
        $result = $this->db->get();
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return 1;
        }
    }

    public function getCategoryNameById($id)
    {
        $where = array('CategoryId' => $id);

        $rows = $this->getRecords($this->_categories, $where, 'all');

        if ($this->isRecordsExists($this->_categories, $where)) {
            return $rows;
        } else {
            $rows = 'No Data Found';
            return $rows;
        }
    }

    /** Insert New Entry **/
    public function insertClass($data)
    {
        $data = $this->insertRecords($this->common_model->_classes, $data);
        return $data;
    }


    public function insertPersonalInformation($data)
    {
        $data = $this->insertRecords($this->common_model->_uBasicInfos, $data);
        return $data;
    }

    /**
     * @param $data String eg.
     * @return bool
     */

    public function insertWork($data)
    {
        $data = $this->insertRecords($this->common_model->_uWorkHistory, $data);
        return $data;
    }

    public function insertBlock($data)
    {
        $data = $this->insertRecords($this->common_model->_blocks, $data);
        return $data;
    }

    public function insertBusiness($data)
    {
        $data = $this->insertRecords($this->common_model->_uBusinesses, $data);
        return $data;
    }

    public function insertPages($data)
    {
        $data = $this->insertRecords($this->common_model->_webpages, $data);
        return $data;
    }

    public function insertInitialSetting($data)
    {
        $data = $this->insertRecords($this->common_model->_initialSettings, $data);
        return $data;
    }

    public function insertSystemSettings($data)
    {
        $data = $this->insertRecords($this->common_model->_systemSettings, $data);
        return $data;
    }

    /** Modifications **/
    public function updateBasicInformation($data, $where)
    {
        $data = $this->updateRecords($this->common_model->_usersTable, $data, $where);
        return $data;
    }

    public function updateBlock($data, $where)
    {
        $data = $this->updateRecords($this->common_model->_blocks, $data, $where);
        return $data;
    }

    public function updatePersonalInformation($data, $where)
    {
        $data = $this->updateRecords($this->common_model->_uBasicInfos, $data, $where);
        return $data;
    }

    public function updatePages($data, $where)
    {
        $data = $this->updateRecords($this->common_model->_webpages, $data, $where);
        return $data;
    }

    public function updateInitialSettings($data, $where)
    {
        $data = $this->updateRecords($this->common_model->_initialSettings, $data, $where);
        return $data;
    }

    public function updateSystemSettings($data, $where)
    {
        $data = $this->updateRecords($this->common_model->_systemSettings, $data, $where);
        return $data;
    }

    /** Delete **/
    public function deleteBlock($where)
    {
        $data = $this->deleteRecords($this->common_model->_blocks, $where);
        return $data;
    }

    public function deleteWork($where)
    {
        $data = $this->deleteRecords($this->common_model->_uWorkHistory, $where);
        return $data;
    }

    public function deleteBusiness($where)
    {
        $data = $this->deleteRecords($this->common_model->_uBusinesses, $where);
        return $data;
    }

    public function deletepage($where)
    {
        $data = $this->deleteRecords($this->common_model->_webpages, $where);
        return $data;
    }
    public function deletepost($where)
    {
        $data = $this->deleteRecords($this->common_model->_posts, $where);
        return $data;
    }

    public function insertPost($data)
    {
        $data = $this->insertRecords($this->common_model->_posts, $data);
        return $data;
    }
	public function updatePost($data, $where)
    {
        $data = $this->updateRecords($this->common_model->_posts, $data, $where);
        return $data;
    }

    public function getAllPosts()
    {
        $this->db->select('*, (SELECT SettingsName FROM ' . $this->_initialSettings . ' WHERE SettingsId = ' . $this->_posts . '.Category LIMIT 0,1) AS CategoryName')->from($this->_posts)->order_by('PostId', 'desc');
        $result = $this->db->get();
        $rows = $result->result_array();
        return $rows;
    }
    public function getAllPostsByCategory($id)
    {
        $this->db->select('*, (SELECT SettingsName FROM ' . $this->_initialSettings . ' WHERE SettingsId = ' . $this->_posts . '.Category LIMIT 0,1) AS CategoryName')->from($this->_posts)->where('Category', $id)->order_by('PostId', 'desc');
        $result = $this->db->get();
        $rows = $result->result_array();
        //owndebugger($rows);
        return $rows;
    }

    public function getPostById($id)
    {
        $where = array('PostId' => $id);
        $rows = $this->getRecords($this->_posts, $where, 'all');
        return $rows;
    }

    public function getAllPostsByCatId($id)
    {
        $where = array('Category' => $id);
        $rows = $this->getRecords($this->_posts, $where, 'all');
        return $rows;
    }

    public function insertOnlineAdmission($data)
    {
        $data = $this->insertRecords($this->common_model->_online_applicants, $data);
        return $data;
    }

    public function getPhotosByCatIdAndLimit() {
        $query = $this->db->query("select * from posts where Category=48 ORDER BY PostId DESC LIMIT 0,3");
        $rows = $query->result_array();
        return $rows;
    }

}
