<?php

class Showrooms_model extends Common_model {

    public function __construct() {
        parent::__construct();
    }

    public function getShowrooms($id = NULL) {
        if (!empty($id)) {
            $where = array('ShowroomId' => $id);
            $result = $this->db->order_by('ShowroomId', 'DESC')->get_where($this->common_model->_showrooms, $where);
        } else {
            $result = $this->db->order_by('ShowroomId', 'DESC')->get($this->common_model->_showrooms);
        }

        return $result->result_object();
        /*
          if ($sql->num_rows() > 0) {
          foreach ($sql->result() as $rows) {
          $data[] = $rows;
          }
          return $data;
          } else
          return false;
         * 
         */
    }

    public function insertShowroom($data) {
        $data = $this->insertRecords($this->common_model->_showrooms, $data);
        return $data;
    }

    public function updateShowroom($data, $where) {
        $data = $this->updateRecords($this->common_model->_showrooms, $data, $where);
        return $data;
    }

    public function get_showrooms(Array $options = array()) {
        $default = [
            'upazilla_id' => NULL,
            'shop_type' => array(1, 2, 3),
            'district_id' => NULL,
            'limit' => 300
        ];


        $options = array_merge($default, $options);

        $joiner = false;

        $sql = "SELECT * FROM showrooms ";
        // $sql .= " WHERE shoptype in ($shop_type) " : ')1,2,3)')

        if (!empty($options['shop_type'])) {
            $shop_type = join(',', (array) $options['shop_type']);
            $sql .= $this->_where_joiner($joiner) . " Shoptype in ( {$shop_type} ) ";
        }

        if ($options['district_id'] && !isset($options['upazilla_id'])) {
            $sql .= $this->_where_joiner($joiner) . " Upazilla in (SELECT id FROM upazilas  where district_id = {$options['district_id']})";
        }

        if (isset($options['upazilla_id'])) {
            $sql .= $this->_where_joiner($joiner) . " Upazilla = {$options['upazilla_id']} ";
        }


        $sql .= " ORDER BY ShowroomName ASC ";
        $sql .= " LIMIT 0, {$options['limit']};";
        return $this->db->query($sql)->result_array();
    }

    private function _where_joiner(&$joiner,$type = ' AND ') {
        $temp = $joiner;
        $joiner = true;        
        return $temp ? $type : ' WHERE ';
    }

}
