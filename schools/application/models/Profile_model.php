<?php

/**
 * Class Profile_model
 *
 * @property Common_model $common_model Common models navigator
 */
class Profile_model extends Common_model {

    public function __construct() {
        parent::__construct();
    }

    public function getTotalBusinessesCount() {
        $table = $this->_uBusinesses;
        return $this->common_model->get_count($table);
    }

    public function getUsersInformation($userid) {
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

    public function getPersonalInformation($userid) {
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

    public function getStudentPersonalInformation($userid) {
        $where = array('UserId' => $userid);
        $rows = $this->getRecords($this->_studentInformation, $where, 'all');

        if ($this->isRecordsExists($this->_studentInformation, $where)) {
            foreach ($rows as $row):
                $elements = $row;
            endforeach;
            return $elements;
        } else {
            $nodata = 'No Data Found';
            return $nodata;
        }
    }

    public function getTchStaffAcademicInformation($userid) {
        $where = array('UserId' => $userid);
        $rows = $this->getRecords($this->_tchstaff_information, $where, 'all');
        if ($this->isRecordsExists($this->_tchstaff_information, $where)) {
            foreach ($rows as $row):
                $elements = $row;
            endforeach;
            return $elements;
        } else {
            $nodata = 'No Data Found';
            return $nodata;
        }
    }
    public function getEducationHistory($userid) {
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

    public function getWorkHistory($userid) {
        $where = array('UserId' => $userid);
        $rows = $this->getRecords($this->_uWorkHistory, $where, 'all');
        if ($this->isRecordsExists($this->_uWorkHistory, $where)) {
            return $rows;
        } else {
            $rows = 'No Data Found';
            return $rows;
        }
    }

    public function getBusinesses($userid) {
        $where = array('UserId' => $userid);
        $rows = $this->getRecords($this->_uBusinesses, $where, 'all');

        if ($this->isRecordsExists($this->_uBusinesses, $where)) {
            return $rows;
        } else {
            $rows = 'No Data Found';
            return $rows;
        }
    }

    public function getApplicantsInformation($applicantid) {
        $this->db->select('UserID,
                (SELECT Gender FROM u_basicinfos WHERE UserId = acc_payments.UserId) AS Gender,
                (SELECT EnrollmentStatus FROM u_basicinfos WHERE UserId = acc_payments.UserId) AS EnrollmentStatus,
                (SELECT FROM_UNIXTIME(DateOfBirth, "%Y-%m-%d") FROM u_basicinfos WHERE UserId = acc_payments.UserId) AS DateOfBirth,
                (SELECT full_name_bn FROM users WHERE id = acc_payments.UserId) AS Fn_bn,
                (SELECT full_name_en FROM users WHERE id = acc_payments.UserId) AS Fn_en,
                (SELECT father_name_bn FROM users WHERE id = acc_payments.UserId) AS Ffn_bn,
                (SELECT father_name_en FROM users WHERE id = acc_payments.UserId) AS Ffn_en,
                (SELECT mother_name_bn FROM users WHERE id = acc_payments.UserId) AS Mfn_bn,
                (SELECT mother_name_en FROM users WHERE id = acc_payments.UserId) AS Mfn_en,
                PaymentId,
                LedgerNameId,
                Amount,
                PaymentDate,
                TransactionId');
        $this->db->from($this->_paymentsentries)->where('UserId', $applicantid);
        $rows = $this->db->get();

        $row = $rows->result_array();
        return $row;
    }

    public function checkNewPortalUrl($value) {
        $query = $this->db->get_where($this->_usersTable, array('id' => $value), 1, 0);
        if ($query->num_rows() > 0) {
            return 1;
        } else {
            return 0;
        }
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
    public function getCountryById($id) {
        $where = array('CountryId' => $id);

        $rows = $this->getRecords($this->_country, $where, 'all');

        if ($this->isRecordsExists($this->_country, $where)) {
            return $rows;
        } else {
            $rows = 'No Data Found';
            return $rows;
        }
    }

    public function getCategoryNameById($id) {
        $where = array('CategoryId' => $id);

        $rows = $this->getRecords($this->_categories, $where, 'all');

        if ($this->isRecordsExists($this->_categories, $where)) {
            return $rows;
        } else {
            $rows = 'No Data Found';
            return $rows;
        }
    }
    
    public function getAdmissionData($randomcode) {
         $where = array('random_code' => $randomcode);

        $rows = $this->getRecords($this->_admissiontable, $where, 'all');

        if ($this->isRecordsExists($this->_admissiontable, $where)) {
            return $rows[0];
        } else {
            $rows = 'No Data Found';
            return $rows;
        }
    }

    /** Insert New Entry * */
    public function insertStudentIdAndPass($data) {
        $data = $this->insertRecords($this->common_model->_usersTable, $data);
        return $data;
    }
    
    public function insertAdmissionData($data) {
        $data = $this->insertRecords($this->common_model->_admissiontable, $data);
        $insert_id = $this->db->insert_id();
        return  $insert_id;
    }

    public function updateStudentIdAndPass($data, $where) {
        $data = $this->updateRecords($this->common_model->_usersTable, $data, $where);
        return $data;
    }

    public function insertAdmissionInstance($data) {
        $data = $this->insertRecords($this->common_model->_usersTable, $data);
        return $data;
    }

    public function insertStudentGuardianRelation($data) {
        $data = $this->insertRecords($this->common_model->_usersRelation, $data);
        return $data;
    }

    public function insertStudentAcademicInformation($data) {
        $data = $this->insertRecords($this->common_model->_studentInformation, $data);
        return $data;
    }

    public function insertGuardianIdAndPass($data) {
        $data = $this->insertRecords($this->common_model->_usersTable, $data);
        return $data;
    }

    public function insertStudentIdToUsersGroups($data) {
        $data = $this->insertRecords($this->common_model->_usersGroups, $data);
        return $data;
    }

    public function insertGuardianIdToUsersGroups($data) {
        $data = $this->insertRecords($this->common_model->_usersGroups, $data);
        return $data;
    }

    public function insertClass($data) {
        $data = $this->insertRecords($this->common_model->_classes, $data);
        return $data;
    }

    public function insertPersonalInformation($data) {
        $data = $this->insertRecords($this->common_model->_uBasicInfos, $data);
        //return $this->db->last_query();
        return $data;
    }

    /** Insert New Entry By Altab * */
    public function insertStudentPersonalInformation($data) {
        $data = $this->insertRecords($this->common_model->_studentInformation, $data);
        return $data;
    }
    public function insertStudentsubjectInformation($data) {
        $data = $this->insertRecords($this->common_model->_studentSubjectsInfo, $data);
        return $data;
    }

    public function insertStudentPromotion($data) {
        $data = $this->insertRecords($this->common_model->_studentPromotion, $data);
        return $data;
    }

    public function insertTchStaffAcademicInformation($data) {
        $data = $this->insertRecords($this->common_model->_tchstaff_information, $data);
        return $data;
    }

    /** Insert New Entry * */
    public function insertEducation($data) {
        $data = $this->insertRecords($this->common_model->_uEducationHistory, $data);
        return $data;
    }

    public function insertWork($data) {
        $data = $this->insertRecords($this->common_model->_uWorkHistory, $data);
        return $data;
    }

    public function insertBusiness($data) {
        $data = $this->insertRecords($this->common_model->_uBusinesses, $data);
        return $data;
    }

    public function insertPages($data) {
        $data = $this->insertRecords($this->common_model->_webpages, $data);
        return $data;
    }

    public function insertInitialSetting($data) {
        $data = $this->insertRecords($this->common_model->_initialSettings, $data);
        return $data;
    }

    /** Modifications * */
    public function updateBasicInformation($data, $where) {
        $data = $this->updateRecords($this->common_model->_usersTable, $data, $where);
        return $data;
    }

    public function updatePersonalInformation($data, $where) {
        $data = $this->updateRecords($this->common_model->_uBasicInfos, $data, $where);
        return $data;
    }

    public function updateStudentPersonalInformation($data, $where) {
        $data = $this->updateRecords($this->common_model->_studentInformation, $data, $where);
        return $data;
    }
    public function updateStudentSubjectInformation($data, $where) {
        $data = $this->updateRecords($this->common_model->_studentSubjectsInfo, $data, $where);
        return $data;
    }

    public function updateTchStaffAcademicInformation($data, $where) {
        $data = $this->updateRecords($this->common_model->_tchstaff_information, $data, $where);
        return $data;
    }

    public function updatePages($data, $where) {
        $data = $this->updateRecords($this->common_model->_webpages, $data, $where);
        return $data;
    }

    public function updateInitialSettings($data, $where) {
        $data = $this->updateRecords($this->common_model->_initialSettings, $data, $where);
        return $data;
    }

    /** Delete * */
    public function deleteEducation($where) {
        $data = $this->deleteRecords($this->common_model->_uEducationHistory, $where);
        return $data;
    }

    public function deleteWork($where) {
        $data = $this->deleteRecords($this->common_model->_uWorkHistory, $where);
        return $data;
    }

    public function deleteBusiness($where) {
        $data = $this->deleteRecords($this->common_model->_uBusinesses, $where);
        return $data;
    }

    public function deletepage($where) {
        $data = $this->deleteRecords($this->common_model->_webpages, $where);
        return $data;
    }

}
