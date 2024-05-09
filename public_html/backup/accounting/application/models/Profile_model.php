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



    public function getUsersInformation($userid) {
        $where = array('id' => $userid);
        $rows = $this->getRecords($this->_users, $where, 'all');

        if ($this->isRecordsExists($this->_users, $where)) {
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










}
