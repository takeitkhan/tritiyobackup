<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Class Profile_model
 *
 */
class Pricing_model extends CI_Model {

    protected $data = array();

    public function __construct() {
        parent::__construct();
    }

    public function insert($data) {
        $this->db->insert('pricing', $data);
        return $this->db->insert_id();
    }

    public function update($data, $id){
        if($this->db->where('id', $id)->update('pricing', $data)){
            return true;
        }
    }

    public function get_pricings() {
        if (!isset($this->data[__METHOD__])) {
            $this->data[__METHOD__] = $this->db->select('*')
                    ->from('pricing')
                    ->order_by('name', 'asc')
                    ->get()
                    ->result_array();

        }
        return $this->data[__METHOD__];
    }

    public function thisPricingInfo($id)
    {
        $where = array('id' => $id);
        return $this->db->get_where('pricing',$where)->result();
    }

    public function get_pricing($cat_id) {
        return $this->db->select('*')
                        ->from('pricing')
                        ->where('id', $cat_id)
                        ->get()
                        ->row_array();
    }

    public function delete($id)
    {
        $del = $this->db->delete('pricing', array('id' => $id));
        return ($del) ? 1 : 0;
    }

}
