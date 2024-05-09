<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Portfolio extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('portfolio_model');
        //$this->load->helper('term_helper');
        if (!$this->ion_auth->logged_in()) {
            redirect('outlet', 'refresh');
        }
        if ($this->ion_auth->logged_in()) {
            $this->data['userInformation'] = $this->ion_auth->user()->row();
            $this->data['userid'] = $this->data['userInformation']->id;
        }
    }

    public function portfolio_categories() {
        $this->data['title'] = 'Add portfolio category';
        $this->data['cats'] = $this->portfolio_model->get_categorys();
        $this->load->view('layouts/header', $this->data);
        $this->load->view('portfolio/portfolio_category', $this->data);
        $this->load->view('layouts/footer', $this->data);
    }


    public function edit_portfolio_cat($id) {
        $this->data['title'] = 'Edit portfolio category';
        $this->data['cats'] = $this->portfolio_model->get_categorys();
        $this->data['singlecat'] = $this->portfolio_model->thisCategoryInfo($id);
        $this->load->view('layouts/header', $this->data);
        $this->load->view('portfolio/portfolio_category', $this->data);
        $this->load->view('layouts/footer', $this->data);
    }
    

    public function add_portfolio() {
        $this->data['title'] = 'Add new portfolio';
        $this->data['portfolios'] = $this->portfolio_model->get_portfolios();
        $this->data['cats'] = $this->portfolio_model->get_categorys();

        //owndebugger($this->data['cats']);


        $this->load->view('layouts/header', $this->data);
        $this->load->view('portfolio/add_portfolio', $this->data);
        $this->load->view('layouts/footer', $this->data);
    }

    public function edit_portfolio($id)
    {
        $this->data['title'] = 'Edit portfolio';
        $this->data['portfolios'] = $this->portfolio_model->get_portfolios();
        $this->data['thisPortfolioInfo'] = $this->portfolio_model->thisPortfolioInfo($id);
        $this->data['cats'] = $this->portfolio_model->get_categorys();
        $this->load->view('layouts/header', $this->data);
        $this->load->view('portfolio/add_portfolio', $this->data);
        $this->load->view('layouts/footer', $this->data);
    }


    public function save_categories() {
        $ifnone = $this->input->post('cat_id');
        $this->data['portfolio'] = array(
            'name' => $this->input->post('name'),
            'description' => $this->input->post('description'),
            'status' => $this->input->post('status'),
        );



        if($ifnone === 'none') {
            $insert_id = $this->portfolio_model->insert_category( $this->data['portfolio']);
            $this->session->set_flashdata('portfolio_message', 'Category Added.');
        } else {
            $insert_id = $this->portfolio_model->update_category($this->data['portfolio'], $ifnone);
            $this->session->set_flashdata('portfolio_message', 'Category Updated.');
        }


        redirect("portfolio_cats");
    }
    public function save_portfolio() {
        $img = upload_portfolio_img();
        $ifnone = $this->input->post('portfolio_id');
        if(!empty($this->input->post('edit_portfolio_img'))){
            $img = $this->input->post('edit_portfolio_img');
        }

        $this->data['portfolio'] = array(
            'name' => $this->input->post('name'),
            'description' => $this->input->post('description'),
            'img' => $img,
            'link' => $this->input->post('link'),
            'cat' => $this->input->post('cat_id'),
        );

        if($ifnone === 'none') {
           $insert_id = $this->portfolio_model->insert( $this->data['portfolio']);
            $this->session->set_flashdata('portfolio_message', 'Portfolio Added.');
        } else {
            $insert_id = $this->portfolio_model->update($this->data['portfolio'], $ifnone);
            $this->session->set_flashdata('portfolio_message', 'Portfolio Updated.');
           redirect('portfolios');
        }
        redirect("addnewportfolio");
    }

    function deleteImg($id = null)
    {
        $result = $this->db->get_where('portfolio', array('id' => $id))->row();
        $file = 'uploads/portfolio/'.$result->img;
        unlink($file);

        $this->db->where('id', $id);
        $this->db->update('portfolio', array(
            'img' => null
        ));

        redirect('edit_portfolio/'.$id);
    }

    public function delete_portfolio($id){
        $catdata = @$this->db->get_where('portfolio', array('id' => $id))->row();
        $file = 'uploads/portfolio/'.$catdata->img;
        unlink(@$file);
        $this->portfolio_model->delete($id);
        $this->data['status']['msg'] = "Portfolio Deleted.";

        header('Application-type:application/json');
        echo jsonEncode($this->data['status']);
    }
    public function delete_port_cat($id){
        $this->portfolio_model->delete_category($id);
        $this->data['status']['msg'] = "Category Deleted.";

        header('Application-type:application/json');
        echo jsonEncode($this->data['status']);
    }

    public function portfolio_list() {
        $this->data['title'] = 'Portfolio list';
        $this->data['portfolios'] = $this->portfolio_model->get_portfolios();
        $this->load->view('layouts/header', $this->data);
        $this->load->view('portfolio/portfolio_list', $this->data);
        $this->load->view('layouts/footer', $this->data);
    }
}
