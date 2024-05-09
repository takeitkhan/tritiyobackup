<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Categorypage extends Common_model {

    function __construct() {
        parent::__construct();
    }

    public function run($params = array()) {        
        $cat_id = isset($params['cat_id']) ? $params['cat_id'] : '0';
        $rows = $this->getAllPostsByCategoryId($cat_id, 'all');
        $str = '<div class="row category-page">';
        $e = 0;
        foreach ((array) $rows as $row) {
            if (!empty($row)) {
                if ($e <= 20) {
                    $str .= '<div class="col-lg-3 col-md-3 col-sm-12"><div class="news_img">';
                    $str .= '<div class="content_container"><div class="img_container">'
                            . '<img src="' . (!empty($row->MediaFileName) ? base_url() . 'uploads/posts/' . $row->MediaFileName : '') . '" alt="" class="img-responsive img-thumbnail"/>'
                            . '</div></div>';
                    $str .= '</div></div>';
                    $str .= '<div class="col-lg-9 col-md-9 col-sm-12"><div class="news_content">';
                    $str .= '<h4><a href="' . base_url() . 'article/' . (!empty($row->PostRoute) ? trim($row->PostRoute) : trim($row->PostId)) . '">' . strip_tags(text_limit($row->Title, 80)) . '</a></h4>';                    
                    $str .= '<div class="post-info">Posted on ';
                    $str .= '<span>';
                    $str .= inttodate($row->AddedDate);
                    $str .= '</span>';                        
                    $str .= '</div>';
                    $str .= (!empty($row->PostContent) ? text_limit($row->PostContent, 800) : '');
                    $str .= '<br/>';
                    $str .= '<a href="' . base_url() . 'article/' . (!empty($row->PostRoute) ? trim($row->PostRoute) : trim($row->PostId)) . '" type="button">Read More</a>';
                    $str .= '</div></div><div class="clearfix"></div>';
                }
                $e++;
            } else {
                $str .= '<div class="col-md-12">No News Posted</div>';
            }
        }
        $str .= '</div>';
        return $str;
    }  
    public function getAllPostsByCategoryId($id, $option = NULL) {
        $sql = $this->db->query('SELECT * FROM posts WHERE FIND_IN_SET("' . $id . '", replace(Category, " ", "")) <> 0 ORDER BY PostId DESC');

        //$sql = $this->db->get();
        //owndebugger($sql);
        if ($sql->num_rows() > 0) {
            if ($option == 'all') {
                foreach ($sql->result() as $rows) {
                    $data[] = $rows;
                }
            } else {
                $data = $sql->row_array();
            }
            return $data;
        } else {
            return false;
        }
    }

}

?>