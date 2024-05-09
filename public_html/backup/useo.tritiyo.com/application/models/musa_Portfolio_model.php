<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Class Profile_model
 *
 */
class Portfolio_model extends CI_Model {

    protected $data = array();

    public function __construct() {
        parent::__construct();
    }

    public function insert($data) {
        $this->db->insert('portfolio', $data);
        return $this->db->insert_id();
    }
    public function update($data, $id){
        if($this->db->where('id', $id)->update('portfolio', $data)){
            return true;
        }
    }
    public function get_portfolios() {
        if (!isset($this->data[__METHOD__])) {
            $this->data[__METHOD__] = $this->db->select('*')
                    ->from('portfolio')
                    ->order_by('name', 'asc')
                    ->get()
                    ->result_array();

        }
        return $this->data[__METHOD__];
    }
    public function thisPortfolioInfo($id)
    {
        $where = array('id' => $id);
        return $this->db->get_where('portfolio',$where)->result();
    }
    public function get_portfolio($cat_id) {
        return $this->db->select('*')
                        ->from('portfolio')
                        ->where('id', $cat_id)
                        ->get()
                        ->row_array();
    }
    public function delete($id)
    {
        $del = $this->db->delete('portfolio', array('id' => $id));
        return ($del) ? 1 : 0;
    }


    public function insert_category($data) {
        $this->db->insert('portfolio_category', $data);
        return $this->db->insert_id();
    }
    public function update_category($data, $id){
        if($this->db->where('id', $id)->update('portfolio_category', $data)){
            return true;
        }
    }
    public function get_categorys() {
        if (!isset($this->data[__METHOD__])) {
            $this->data[__METHOD__] = $this->db->select('*')
                ->from('portfolio_category')
                ->order_by('name', 'asc')
                ->get()
                ->result_array();

        }
        return $this->data[__METHOD__];
    }
    public function thisCategoryInfo($id){
        $where = array('id' => $id);
        return $this->db->get_where('portfolio_category',$where)->result();
    }
    public function get_category($cat_id) {
        return $this->db->select('*')
            ->from('portfolio')
            ->where('id', $cat_id)
            ->get()
            ->row_array();
    }
    public function delete_category($id){
        $del = $this->db->delete('portfolio_category', array('id' => $id));
        return ($del) ? 1 : 0;
    }

}
