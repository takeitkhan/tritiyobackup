<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Class Profile_model
 *
 */
class Term_model extends CI_Model {

    protected $data = array();

    public function __construct() {
        parent::__construct();
    }

    public function insert($data) {
        $this->db->insert('term', $data);
         //$this->db->last_query();
        return $this->db->insert_id();
    }

    public function update($data, $id)
    {
        if($this->db->where('id', $id)->update('term', $data)){
            return true;
        }
    }

    public function get_categories() {

        if (!isset($this->data[__METHOD__])) {
            $this->data[__METHOD__] = $this->db->select('*,(SELECT count(*) as total_product from relation WHERE relation_type = 2 && relation_value = term.id) as total_product ')
                    ->from('term')
                    ->where('type', 'category')
                    ->order_by('name', 'asc')
                    ->get()
                    ->result_array();



        }
        return $this->data[__METHOD__];
    }

    public function thisCategoriesInfo($id)
    {
        $where = array('id' => $id);
        return $this->db->get_where('term',$where)->result();
    }

    public function get_category($cat_id) {
        return $this->db->select('*')
                        ->from('term')
                        ->where('type', 'category')
                        ->where('id', $cat_id)
                        ->get()
                        ->row_array();
    }

    public function delete($id)
    {
        $del = $this->db->delete('term', array('id' => $id));
        
        return ($del) ? 1 : 0;
    }

}
