<?php

/**
 * Created by PhpStorm.
 * User: Dell
 * Date: 9/29/2015
 * Time: 1:28 PM
 */
class Frontend_model extends Common_model {

    public function __construct() {
        parent::__construct();
    }

    public function getAllSubPagesFrontend($parent_id) {
        return $this->db->select('*')
                        ->from($this->_webpages)
                        ->where('ParentId', $parent_id)
                        ->order_by('ParentId')
                        ->get()
                        ->result();
    }

    public function getPageById($pageid) {
        return $this->db->select('*')
                        ->from($this->_webpages)
                        ->where('PageId', $pageid)
                        ->order_by('PageId')
                        ->get()
                        ->result();
    }

    public function getAllPagesFrontend() {
        return $this->db->select('*')
                        ->from($this->_webpages)
                        ->where('ParentId', '0')
                        ->get()
                        ->result();
    }

    public function getMainMenuFromDbDirectly() {
        $this->db->select('
            `a`.`PageId`,
            `a`.`PageTitle`,
            `a`.`PageRoute`,
            `a`.`Description`,
            `a`.`ParentId`,
            `a`.`PageOrder`,
            `a`.`isActive`,
            `a`.`isMegaMenu`,
            `a`.`isInMenu`,
	        (SELECT GROUP_CONCAT(DISTINCT CONCAT(m.PageId, \';\', `m`.`PageRoute`, \' ; \', `m`.`PageTitle`, \' ; \', `m`.`Description`, \' ; \', `m`.`isInMenu`)
	            ORDER BY m.PageOrder ASC SEPARATOR \' | \')
	            FROM webpages m
	            WHERE m.ParentId = a.PageId AND m.isInMenu = 1) as Childs')
                ->from($this->_webpages . ' as a')
                ->join($this->_webpages . ' as b', 'a.ParentId = b.PageId', 'left')
                ->where('a.ParentId', '0')
                ->where('a.isInMenu', '1')
                ->where('a.isActive', '1')                
                ->where('a.isSecondary', '1')
                ->order_by('a.PageOrder', 'ASC');
        $sql = $this->db->get();
        if ($sql->num_rows() > 0) {
            foreach ($sql->result() as $rows) {
                $data[] = $rows;
            }
            return $data;
        }
    }

    public function getSecondaryMenuFromDbDirectly() {
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
                ->where('a.isSecondary', '2')
                ->order_by('a.PageOrder', 'ASC');
        $sql = $this->db->get();
        if ($sql->num_rows() > 0) {
            foreach ($sql->result() as $rows) {
                $data[] = $rows;
            }
            return $data;
        }
    }

    public function getPageByRoute($route) {
        return $this->db->select('*')
                        ->from($this->_webpages)
                        ->where('PageRoute', $route)
                        ->get()
                        ->result();
    }

    public function getPostByRoute($route) {
        if (is_int($route)) {
            return $this->db->select('*')
                            ->from($this->_posts)
                            ->where('PostId', $route)
                            ->get()
                            ->result();
        } else {
            return $this->db->select('*')
                            ->from($this->_posts)
                            ->where('PostRoute', $route)
                            ->get()
                            ->result();
        }
        ob_clean();
        echo $this->db->last_query();
    }

    public function getAllPostsFronts() {
        return $this->db->select('*')
                        ->from($this->_posts)
                        ->order_by('PostId', 'desc')
                        ->limit(22)
                        ->get()
                        ->result();

//     	ob_clean();
//     	echo $this->db->last_query();
    }

    public function getAllPostsByCategoryId($id, $limit = 5) {
        $sql = $this->db->query('SELECT * FROM posts WHERE  FIND_IN_SET("' . $id . '", replace(Category, " ", "")) <> 0 ORDER BY PostId DESC ' . (!empty($limit) ? " LIMIT 0, $limit" : '') . '');

        //ob_clean();
        //echo $this->db->last_query();
        //$sql = $this->db->get();
        //owndebugger($sql);
        if ($sql->num_rows() > 0) {
            foreach ($sql->result() as $rows) {
                $data[] = $rows;
            }
            return $data;
        } else {
            return false;
        }
    }

    public function getAllPostsByCatId($id, $limit = 5) {
        $sql = $this->db->query('SELECT * FROM posts WHERE IN ("' . $id . '") ORDER BY PostId DESC ' . (!empty($limit) ? " LIMIT 0, $limit" : '') . '');

        //ob_clean();
        //echo $this->db->last_query();
        //$sql = $this->db->get();
        //owndebugger($sql);
        if ($sql->num_rows() > 0) {
            foreach ($sql->result() as $rows) {
                $data[] = $rows;
            }
            return $data;
        } else {
            return false;
        }
    }

}
