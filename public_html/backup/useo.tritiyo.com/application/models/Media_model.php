<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Class Profile_model
 *
 * @property Common_model $common_model Common models navigator
 */
class Media_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function insert($data) {
        $this->db->insert('media_file', $data);
        return $this->db->insert_id();
    }

    public function get_media(array $options = []) {

        $default = [
            'user_id' => $this->ion_auth->get_user_id(),
            'search_key' => '',
            'offset' => 0,
        ];

        $options = array_merge($default, array_filter($options));


       return $this->db->select('*')
                ->from('media_file')
                ->order_by('idno', 'DESC')
                ->limit(20, $options['offset'])
                ->where('idno', $options['search_key'])
                ->or_where('uploaded_by', $options['search_key'])
                ->or_like('type', $options['search_key'], 'both')
                ->or_like('file_name', $options['search_key'], 'both')
                ->get()
                ->result_object();

    }

    public function delete($idno) {

        //$result = $this->db->get_where('relation', array('relation_value' => $idno ))->result();
        $result = $this->db->select('*')
                    ->from('relation')
                    ->where('relation_type', 3)
                    ->where('relation_value', $idno)
                    ->get()
                    ->result();

        if(empty($result)){

            $this->db->where('idno', $idno);

            if ($media = $this->db->get('media_file')->row_object()) {
                $file_path = realpath(BASEPATH . "../{$media->upload_dir}/{$media->idno}.{$media->extension}");
                if (file_exists($file_path)) {
                    unlink($file_path);
                }
                $this->db->where('idno', $idno);
                return $this->db->delete('media_file');
            }
            return false;

        }else{
            return false;
        }
    }

    // public function delete($idno) {
    //     $this->db->where('idno', $idno);

    //     if ($media = $this->db->get('media_file')->row_object()) {
    //         $file_path = realpath(BASEPATH . "../{$media->upload_dir}/{$media->idno}.{$media->extension}");
    //         if (file_exists($file_path)) {
    //             unlink($file_path);
    //         }
    //         $this->db->where('idno', $idno);
    //         return $this->db->delete('media_file');
    //     }
    //     return false;
    // }

}
