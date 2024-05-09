<?php

/**
 * Created by PhpStorm.
 * User: Dell
 * Date: 9/30/2015
 * Time: 6:30 PM
 */
class Directory_model extends Common_model
{

    public function __construct()
    {
        parent::__construct();
    }
    public function getBusinessesByCategoryId($id)
    {
        $this->db
            ->select('BusinessId, UserId, (SELECT CategoryName FROM '. $this->_categories .' WHERE CateogryId = '. $id .' LIMIT 0,1) AS CategoryId,
            OrganizationName,
            OrganizationURL,
            OrganizationCity,
            FROM_UNIXTIME(StartDate, "%Y-%m-%d") StartDate,
            Services,
            Notes')
            ->from($this->_uBusinesses)
            ->where('CateogryId', $id);

        $result = $this->db->get();
        $rows = $result->result_array();
        return $rows;
    }
}