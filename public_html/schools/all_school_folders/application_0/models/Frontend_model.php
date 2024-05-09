<?php

/**
 * Created by PhpStorm.
 * User: Dell
 * Date: 9/29/2015
 * Time: 1:28 PM
 */
class Frontend_model extends Common_model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAllSubPagesFrontend($parent_id)
    {
        return $this->db->select('*')
            ->from($this->_webpages)
            ->where('ParentId', $parent_id)
            ->order_by('ParentId')
            ->get()
            ->result();
    }

    public function getPageById($pageid)
    {
        return $this->db->select('*')
            ->from($this->_webpages)
            ->where('PageId', $pageid)
            ->order_by('PageId')
            ->get()
            ->result();
    }

    public function getAllPagesFrontend()
    {
        return $this->db->select('*')
            ->from($this->_webpages)
            ->where('ParentId', '0')
            ->get()
            ->result();
    }

    public function getMainMenuFromDbDirectly()
    {
//        SEPARATOR ' | '

        $this->db->select('
            `a`.`PageId`,
            `a`.`PageTitle`,
            `a`.`PageRoute`,
            `a`.`ParentId`,
            `a`.`PageOrder`,
            `a`.`isActive`,
            `a`.`isInMenu`,
	        (SELECT GROUP_CONCAT(DISTINCT CONCAT(m.PageId, \';\', `m`.`PageRoute`, \' ; \', `m`.`PageTitle`, \' ; \', `m`.`isInMenu`)
	            ORDER BY m.PageOrder ASC SEPARATOR \' | \')
	            FROM webpages m
	            WHERE m.ParentId = a.PageId AND m.isInMenu = 1) as Childs')
            ->from($this->_webpages . ' as a')
            ->join($this->_webpages . ' as b', 'a.ParentId = b.PageId', 'left')
            ->where('a.ParentId', '0')
            ->where('a.isInMenu', '1')
            ->where('a.isActive', '1')
            ->order_by('a.PageOrder', 'DESC');

        //ob_clean();
        //echo $this->db->last_query();
        //echo $this->db->get_compiled_select();

        $sql = $this->db->get();
        if ($sql->num_rows() > 0) {
            foreach ($sql->result() as $rows) {
                //owndebugger($rows);
                $data[] = $rows;
            }
            return $data;
        }
        //return $sql;
        //owndebugger($sql);

//        return $this->db->query('SELECT a.PageId, a.PageTitle, a.PageRoute, a.ParentId,
//(SELECT GROUP_CONCAT(DISTINCT CONCAT(m.PageId,' | ',m.PageTitle,' | ',m.PageRoute) ORDER BY m.PageOrder ASC SEPARATOR ' | ') FROM webpages m WHERE m.ParentId = a.PageId) as Childs
//FROM webpages AS a LEFT JOIN webpages AS b
//ON a.ParentId = b.PageId
//ORDER BY a.PageOrder DESC WHERE ParentId = 0');
        //ALTER TABLE `webpages` ADD COLUMN `isSpecial` INT NULL DEFAULT NULL AFTER `PublishDate`;

    }

    public function getPageByRoute($route)
    {
        return $this->db->select('*')
            ->from($this->_webpages)
            ->where('PageId', $route)
            ->get()
            ->result();
    }
    public function getVisitorCounts()
    {
        $sql = 'SELECT * FROM (
            (SELECT COUNT(*) AS total FROM ci_sessions) AS total,
            (SELECT COUNT(*) AS yeartotal FROM ci_sessions WHERE YEAR(FROM_UNIXTIME(`timestamp`)) = YEAR(CURDATE())) AS yeartotal,
            (SELECT COUNT(*) AS weektotal FROM ci_sessions WHERE WEEK(FROM_UNIXTIME(`timestamp`)) = WEEK(CURDATE())) AS weektotal,
            (SELECT COUNT(*) AS todaytotal FROM ci_sessions WHERE `timestamp` = CURDATE()) AS todaytotal,
            (SELECT COUNT(*) AS yesterdaytotal FROM ci_sessions WHERE `timestamp` = SUBDATE(CURDATE(), 1)) AS yesterdaytotal)';
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return $query->result();
        }
    }

    public function getPostByRoute($route)
    {
        return $this->db->select('*')
            ->from($this->_posts)
            ->where('PostId', $route)
            ->get()
            ->result();
    }

}