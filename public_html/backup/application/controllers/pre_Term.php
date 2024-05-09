<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Term extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('term_model');
        $this->load->helper('term_helper');
        if (!$this->ion_auth->logged_in()) {
            redirect('outlet', 'refresh');
        }
        if ($this->ion_auth->logged_in()) {
            $this->data['userInformation'] = $this->ion_auth->user()->row();
            $this->data['userid'] = $this->data['userInformation']->id;
        }
    }
    

    public function add_category() {
        $this->data['title'] = 'Add new Category';
        $this->data['categories'] = $this->term_model->get_categories();

        $this->load->view('layouts/header', $this->data);
        $this->load->view('term/add_category', $this->data);
        $this->load->view('layouts/footer', $this->data);
    }

    public function edit_category($id)
    {
        $this->data['title'] = 'Edit Category';
        $this->data['categories'] = $this->term_model->get_categories();
        $this->data['thisCategoriesInfo'] = $this->term_model->thisCategoriesInfo($id);
        $this->load->view('layouts/header', $this->data);
        $this->load->view('term/add_category', $this->data);
        $this->load->view('layouts/footer', $this->data);
    }
    
    // public function save_category() {
    //     $this->data['category'] = array(            
    //         'name' => $this->input->post('name'),
    //         'description' => $this->input->post('description'),
    //         'parent_id' => $this->input->post('parent_id'),
    //         'type' => 'category'
    //     );
    //     $ifnone = $this->input->post('cat_id');
    //     if($ifnone === 'none') {
    //        $insert_id = $this->term_model->insert( $this->data['category']);
    //     } else {
    //         $insert_id = $this->term_model->update($this->data['category'], $ifnone);
    //     }
       
    //    if($insert_id)
    //      $this->session->set_flashdata('msg','<div class="alert alert-success"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Success!</strong> Your category <b>'.$this->input->post('name').'</b> saved.</div>');
       
    // }

    public function save_category() {

        $img = upload_category_img();

        $this->data['category'] = array(            
            'name' => $this->input->post('name'),
            'description' => $this->input->post('description'),
            'parent_id' => $this->input->post('parent_id'),
            'type' => 'category',
            'img' =>$img
        );
        $ifnone = $this->input->post('cat_id');
        if($ifnone === 'none') {
           $insert_id = $this->term_model->insert( $this->data['category']);
        } else {
            $insert_id = $this->term_model->update($this->data['category'], $ifnone);
            redirect('edit_category/'.$ifnone);
        }
       
       if($insert_id)
           redirect('edit_category/'.$insert_id);
         //$this->session->set_flashdata('msg','<div class="alert alert-success"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Success!</strong> Your category <b>'.$this->input->post('name').'</b> saved.</div>');
       
    }

    public function delete_category($id)
    {
        $this->data['status']['status'] = $this->term_model->delete($this->input->get('id'));
        $this->data['status']['msg'] = "Category has been deleted";

        header('Application-type:application/json');
        echo jsonEncode($this->data['status']);
    }

    public function category_list() {
        $this->data['title'] = 'Category list';
        $this->data['categories'] = $this->term_model->get_categories();


        $this->load->view('layouts/header', $this->data);
        $this->load->view('term/category_list', $this->data);
        $this->load->view('layouts/footer', $this->data);
    }

}
