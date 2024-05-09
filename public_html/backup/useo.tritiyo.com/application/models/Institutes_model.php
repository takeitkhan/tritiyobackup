<?php

/**
 * Created by PhpStorm.
 * User: Dell
 * Date: 9/29/2015
 * Time: 1:28 PM
 */
class Institutes_model extends Common_model {

    public function __construct() {
        parent::__construct();
    }

    public function getAll() {
        return $this->db->select('*')
            ->from('institutes')
            ->get()
            ->result();
    }
    
    public function add($array) {
        //owndebugger($array);
        //die();
        
        return $this->db->insert('institutes', $array);
    }
    
    public function update($array, $where) {
        return $this->db->update('institutes', $array, $where);
    }
    
}