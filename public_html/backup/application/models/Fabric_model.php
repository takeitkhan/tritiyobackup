<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Class Profile_model
 *
 */
class Fabric_model extends CI_Model {

    protected $data = array();

    public function __construct() {
        parent::__construct();
    }

    public function insert($data) {
        $this->db->insert('fabrics', $data);
        return $this->db->insert_id();
       // return $this->db->last_query();
    }

    public function get_fabrics()
    {
         $sql = "SELECT *, 
                (SELECT CONCAT(CONCAT(upload_dir,'/',idno), '.', extension) AS fabric_icon FROM media_file WHERE idno = fabric_icon) AS fab_icon, 
                (SELECT CONCAT(CONCAT(upload_dir,'/',idno), '.', extension) AS fabric_image FROM media_file WHERE idno = fabric_image) AS fab_img 
                FROM `fabrics`  ORDER BY id DESC LIMIT 0, 20
                ";

        //$this->db->last_query(); WHERE id = 4
        return $this->db->query($sql)->result_array();
        
    }

    public function get_fabric($fabric_id) {
        $sql = "SELECT *, 
                (SELECT CONCAT(CONCAT(upload_dir,'/',idno), '.', extension) AS fabric_icon FROM media_file WHERE idno = fabric_icon) AS fab_icon, 
                (SELECT CONCAT(CONCAT(upload_dir,'/',idno), '.', extension) AS fabric_image FROM media_file WHERE idno = fabric_image) AS fab_img 
                FROM `fabrics`" .
                "WHERE id = '{$fabric_id}';";

        return $this->db->query($sql)->row_array();
    }

    public function update($data, $id)
    {
        if($this->db->where('id', $id)->update('fabrics', $data)){
            return true;
        }
    }

    
    public function delete($id)
    {
        $del = $this->db->delete('fabrics', array('id' => $id));
        
        return ($del) ? 1 : 0;
    }

}
