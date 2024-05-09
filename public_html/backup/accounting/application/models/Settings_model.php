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




    public function getSystemSettings()
    {
        $rows = $this->getAllRecords($this->_store_settings);
        return $rows;
    }




























}