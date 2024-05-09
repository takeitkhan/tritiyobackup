<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * @property Upload_model $upload_model Common models navigator
 */

class Media extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->database();
        $this->load->model('media_model');

        if (!$this->ion_auth->logged_in()) {
            redirect('outlet', 'refresh');
        }
        if ($this->ion_auth->logged_in()) {
            $this->data['userInformation'] = $this->ion_auth->user()->row();
            $this->data['userid'] = $this->data['userInformation']->id;
        }

        $this->load->library('upload');
    }

    public function do_upload() {
        $date = date('Y-m');

        $folder_name = str_replace(':', '', $date);
        if (!is_dir('uploads/file/' . $folder_name)) {
            mkdir('./uploads/file/' . $folder_name, 0777, TRUE);
        }

        $this->data['upload_path'] = './uploads/file/' . $folder_name;
        $this->data['upload_dir'] = 'uploads/file/' . $folder_name;
        $this->data['file_extension'] = pathinfo(basename($_FILES["filetoupload"]["name"]), PATHINFO_EXTENSION);

        $file = array(
            'file_name' => $_FILES["filetoupload"]["name"],
            'type' => $_FILES["filetoupload"]["type"],
            'size' => $_FILES["filetoupload"]["size"],
            'extension' => $this->data['file_extension'],
            'upload_dir' => $this->data['upload_dir'],
            'uploaded_by' => $this->data['userInformation']->id
        );

        $file_id = $this->media_model->insert($file);

        $config['file_name'] = $file_id . '.' . $this->data['file_extension'];
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['upload_path'] = $this->data['upload_path'];
        $this->upload->initialize($config);


            if (!$this->upload->do_upload('filetoupload')) {
                $this->status['error'] = $this->upload->display_errors();
                $this->status['status'] = false;

            } else {

                //$upload_data =$this->upload->data();

                $config['image_library'] = 'gd2';
                $config['source_image'] = $this->data['upload_dir'].'/'.$file_id . '.' . $this->data['file_extension'];
                $config['new_image'] = $this->data['upload_dir'].'/'.$file_id . '.' . $this->data['file_extension'];
                $config['create_thumb'] = TRUE;
                $config['maintain_ratio'] = TRUE;
                $config['width']         = 452;
                $config['height']       = 250;

                $this->load->library('image_lib', $config);

                if ( ! $this->image_lib->resize())
                {
                    echo $this->image_lib->display_errors();
                }

                $this->status['status'] = true;
                $this->status['file'] = array(
                    'url' => base_url($this->data['upload_dir'] . '/' . $file_id . '.' . $file['extension']),
                    'idno' => $file_id,
                    'file_name' => $file['file_name']
                );
            }
        header('Content-Type: application/json');
        echo jsonEncode($this->status);
    }

/*    public function do_upload() {
        $date = date('Y-m');
        $folder_name = str_replace(':', '', $date);
        if (!is_dir('uploads/file/' . $folder_name)) {
            mkdir('./uploads/file/' . $folder_name, 0777, TRUE);
        }
        $this->data['upload_path'] = './uploads/file/' . $folder_name;
        $this->data['upload_dir'] = 'uploads/file/' . $folder_name;
        $this->data['file_extension'] = pathinfo(basename($_FILES["filetoupload"]["name"]), PATHINFO_EXTENSION);

        $file = array(
            'file_name' => $_FILES["filetoupload"]["name"],
            'type' => $_FILES["filetoupload"]["type"],
            'size' => $_FILES["filetoupload"]["size"],
            'extension' => $this->data['file_extension'],
            'upload_dir' => $this->data['upload_dir'],
            'uploaded_by' => $this->data['userInformation']->id
        );

        $file_id = $this->media_model->insert($file);



        $config['file_name'] = $file_id . '.' . $this->data['file_extension'];
        $config['allowed_types'] = 'gif|jpg|png';
        $config['upload_path'] = $this->data['upload_path'];
        $this->upload->initialize($config);

        if (!$this->upload->do_upload('filetoupload')) {
            $this->status['error'] = $this->upload->display_errors();
            $this->status['status'] = false;
        } else {
            $this->status['status'] = true;
            $this->status['file'] = array(
                'url' => base_url($this->data['upload_dir'] . '/' . $file_id . '.' . $file['extension']),
                'idno' => $file_id,
                'file_name' => $file['file_name']
            );
        }
        header('Content-Type: application/json');
        echo jsonEncode($this->status);
    }*/

    public function get_media_list_json() {
        $this->data['medias'] = $this->media_model->get_media([
            'search_key' => $this->input->get('search_key'),
            'offset' => $this->input->get('offset'),
        ]);
        header('Content-Type: application/json');
        echo jsonEncode($this->data['medias']);
    }

    public function meida_list() {
        $this->data['title'] = 'Media list';
        $this->data['medias'] = $this->media_model->get_media([]);

        $this->load->view('layouts/header', $this->data);
        $this->load->view('media/media_list', $this->data);
        $this->load->view('layouts/footer', $this->data);
    }

    public function delete($id = NULL) {
        header('Content-Type:application/json');
        if (($id != NULL) && $this->ion_auth->is_admin() && $this->media_model->delete($id)) {


            $this->status = [
                'status' => true,
                'msg' => 'Image deleted.'
            ];

            echo jsonEncode($this->status);
            exit;
        }

        $this->status = [
            'status' => false,
            'msg' => 'Image Allready used in Product.'
        ];
        echo jsonEncode($this->status);
    }

}
