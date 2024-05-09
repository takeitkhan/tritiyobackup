<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @property settings_model $settings_model sdss
 * @property Uploader $uploader Uploader Class Library
 * @property Common_model $common_model Uploader Class Library
 * @property Panel_model $panel_model Uploader Class Library
 */
class Pages extends MY_Controller
{
    protected $data = array();
    private $records = array();
    private $results = array();
    private $_session = array();
    private $status = array("status" => 0, "msg" => NULL);
    private $where = array();
    private $id;
    private $pagetitle;
    private $isUpdate = 0;
    private $isDelete = 0;
    private $isInsert = 0;

    public function __construct()
    {
        parent::__construct();
        if (!$this->ion_auth->logged_in()) {
            redirect('outlet', 'refresh');
        }
    }

    public function add_page()
    {
        if ($this->ion_auth->logged_in()) {
            $this->data['userInformation'] = $this->ion_auth->user()->row();
        }
        $this->data['loggedinuserinformation'] = $this->basic_information_of_mine($this->data['userInformation']->id);

        $uri2 = $this->uri->segment(2);
        if (isset($uri2)) {
            $this->data['userid'] = $this->uri->segment(2);
        } else {
            $this->data['userid'] = $this->data['userInformation']->id;
        }
        if (isset($uri2)) {
            $this->data['title'] = "Update Page";
            $this->data['page_header'] = "Update Page";
            $this->data['pageinformation'] = $this->common_model->get_pages_by_id($uri2);
            //owndebugger($this->data['pageinformation']);
        } else {
            $this->data['title'] = "Add New Page";
            $this->data['page_header'] = "Create Page";
        }
        $this->data['posts'] = $this->get_all_posts_by_category_id(47);
        //owndebugger($this->data['posts']);
        $this->data['pages'] = $this->default_getpage();
        $this->data['pages1'] = $this->default_getpage_yes(0, 'ASC');

        $this->load->view('layouts/header', $this->data);
        $this->load->view('pages/addpage', $this->data);
        $this->load->view('layouts/footer', $this->data);
    }

    public function insert_page()
    {
        $uri2 = $this->input->post('page_id');
        if (isset($uri2)) {
            $data1 = array(
                'PageTitle' => $this->input->post('page_title'),
                'SeoTitle' => $this->input->post('seo_title'),
                'MetaKeyword' => $this->input->post('metakeyword'),
                'MetaDescription' => $this->input->post('meta_description'),
                'PageRoute' => $this->input->post('page_route'),
                'ParentId' => $this->input->post('parent_page'),
                'PageOrder' => $this->input->post('page_order'),
                'Description' => $this->input->post('page_content'),
                'isInMenu' => $this->input->post('is_in_menu'),
                'isMegaMenu' => $this->input->post('is_mega_menu'),
                'isSpecial' => $this->input->post('is_special'),
                'isSecondary' => $this->input->post('is_secondary'),
                'isActive' => $this->input->post('page_is_active')
            );
            $where = array('PageId' => $uri2);
            $this->results = $this->settings_model->updatePages($data1, $where);
        } else {
            $data = array(
                'PageTitle' => $this->input->post('page_title'),
                'SeoTitle' => $this->input->post('seo_title'),
                'MetaKeyword' => $this->input->post('metakeyword'),
                'MetaDescription' => $this->input->post('meta_description'),
                'PageRoute' => $this->input->post('page_route'),
                'ParentId' => $this->input->post('parent_page'),
                'PageOrder' => $this->input->post('page_order'),
                'Description' => $this->input->post('page_content'),
                'PublishDate' => datetoint(date("Y-m-d h:s:i")),
                'isInMenu' => $this->input->post('is_in_menu'),
                'isMegaMenu' => $this->input->post('is_mega_menu'),
                'isSpecial' => $this->input->post('is_special'),
                'isSecondary' => $this->input->post('is_secondary'),
                'isActive' => $this->input->post('page_is_active')
            );

            $this->results = $this->settings_model->insertPages($data);
        }
        
        if ($this->results == 1) {
            $this->status['status'] = 1;
            $this->status['msg'] = 'Well done!';
        } else {
            $this->status['status'] = 0;
            $this->status['msg'] = 'Oh snap! Change a few things up and try submitting again.';
        }
        echo jsonEncode($this->status);
//        owndebugger($data1);
    }

    public function view_page()
    {
        if ($this->ion_auth->in_group('Admin')) {
            if ($this->ion_auth->logged_in()) {
                $this->data['userInformation'] = $this->ion_auth->user()->row();
            }
            $this->data['loggedinuserinformation'] = $this->basic_information_of_mine($this->data['userInformation']->id);
            $this->data['userid'] = $this->data['userInformation']->id;
            $this->data['title'] = "View Pages";
            $this->data['pages'] = $this->default_getpage();

            $this->load->view('layouts/header', $this->data);
            $this->load->view('pages/viewpage', $this->data);
            $this->load->view('layouts/footer', $this->data);
        } else {
            redirect('outlet', refresh);
        }
    }

    public function delete_page()
    {
        if ($this->ion_auth->logged_in()) {
            $this->data['userInformation'] = $this->ion_auth->user()->row();
        }
        $this->data['loggedinuserinformation'] = $this->basic_information_of_mine($this->data['userInformation']->id);
        $this->data['userid'] = $this->data['userInformation']->id;
        $this->id = $this->uri->segment(2);

        if ($this->id) {
            $this->where = array('PageId' => $this->id);
            $this->isDelete = $this->settings_model->deletepage($this->where);
            if ($this->isDelete) {
                $this->status['status'] = 1;
                $this->status['msg'] = "Page has been deleted.";
            } else {
                $this->status['status'] = 0;
                $this->status['msg'] = "Oh snap! Change a few things up and try submitting again.";
            }
        } else {
            $this->status['status'] = 0;
            $this->status['msg'] = "Oh snap! Change a few things up and try submitting again.";
        }

        /* ajax response */
        echo jsonEncode($this->status);
    }

    public function add_post()
    {
        if ($this->ion_auth->logged_in()) {
            $this->data['userInformation'] = $this->ion_auth->user()->row();
        }
        $this->data['loggedinuserinformation'] = $this->basic_information_of_mine($this->data['userInformation']->id);

        $uri2 = $this->uri->segment(2);
        if (isset($uri2)) {
            $this->data['userid'] = $this->uri->segment(2);
        } else {
            $this->data['userid'] = $this->data['userInformation']->id;
        }
        if (isset($uri2)) {
            $this->data['title'] = "Update Page";
            $this->data['page_header'] = "Update Page";
            $this->data['pageinformation'] = $this->common_model->get_pages_by_id($uri2);
        } else {
            $this->data['title'] = "Add New Page";
            $this->data['page_header'] = "Create Page";
        }
        $this->data['pages'] = $this->default_getpage();
        //$this->data['posts'] = $this->get_all_posts_by_category_id(9);

        $this->load->view('layouts/header', $this->data);
        $this->load->view('pages/addpage', $this->data);
        $this->load->view('layouts/footer', $this->data);
    }

    public function check_page_name()
    {
        $newportalurl = $this->uri->segment(2);
        $thanks = $this->settings_model->checkPageRoute($newportalurl);
        if ($thanks == 1) {
            $this->status['status'] = 1;
            $this->status['msg'] = 'This route is available.';
            echo jsonEncode($this->status);
        } else {
            $this->status['status'] = 0;
            $this->status['msg'] = 'This route is not available.';
            echo jsonEncode($this->status);
        }
    }
    public function check_post_name()
    {
        $newportalurl = $this->uri->segment(2);
        $thanks = $this->settings_model->checkPostRoute($newportalurl);
        if ($thanks == 1) {
            $this->status['status'] = 1;
            $this->status['msg'] = 'This route is available.';
            echo jsonEncode($this->status);
        } else {
            $this->status['status'] = 0;
            $this->status['msg'] = 'This route is not available.';
            echo jsonEncode($this->status);
        }
    }

    public function insert_post()
    {
        $uri2 = $this->input->post('page_id');
        if (isset($uri2)) {
            $data1 = array(
                'PageTitle' => $this->input->post('page_title'),
                'PageRoute' => $this->input->post('page_route'),
                'ParentId' => $this->input->post('parent_page'),
                'Description' => $this->input->post('page_content'),
                'isActive' => $this->input->post('page_is_active')
            );
            $where = array('PageId' => $uri2);
            $this->results = $this->settings_model->updatePages($data1, $where);
        } else {
            $data = array(
                'PageTitle' => $this->input->post('page_title'),
                'PageRoute' => $this->input->post('page_route'),
                'ParentId' => $this->input->post('parent_page'),
                'Description' => $this->input->post('page_content'),
                'PublishDate' => datetoint(date("Y-m-d h:s:i")),
                'isActive' => $this->input->post('page_is_active')
            );

            $this->results = $this->settings_model->insertPages($data);
        }

        if ($this->results) {
            $this->status['status'] = 1;
            $this->status['msg'] = 'Well done!';
        } else {
            $this->status['status'] = 0;
            $this->status['msg'] = 'Oh snap! Change a few things up and try submitting again.';
        }
        echo jsonEncode($this->status);
    }


    public function get_all_pages_by_ajax()
    {
        echo $this->panel_model->getAllPages();
    }

    public function get_all_posts_by_ajax()
    {
        echo $this->panel_model->getAllPosts();
    }
    
    public function get_all_categories_by_ajax()
    {
    	echo $this->panel_model->getAllCategories();
    }

    public function default_getpage()
    {
        return $this->common_model->get_pages();
    }

    public function default_getpage_yes($yes, $order)
    {
        return $this->common_model->get_pages_yes($yes, $order);
    }

    public function get_all_posts()
    {
        return $this->settings_model->getAllPosts();
    }

    public function get_all_posts_by_category_id($id)
    {
        return $this->settings_model->getAllPostsByCategory($id);
    }
}