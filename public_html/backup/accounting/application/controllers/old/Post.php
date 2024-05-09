<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @property Profile_model $profile_model Profile Model
 * @property Common_model $common_model Common Model
 * @property Settings_model $settings_model Settings Model
 * @property Ion_auth $ion_auth ion_auth
 * @property panel_model $panel_model panel model
 */
class Post extends MY_Controller
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

    public function index()
    {
        if ($this->ion_auth->logged_in()) {
            $this->data['userInformation'] = $this->ion_auth->user()->row();
        }
        $this->data['loggedinuserinformation'] = $this->basic_information_of_mine($this->data['userInformation']->id);
        $this->data['userid'] = $this->data['userInformation']->id;
        $this->data['posts'] = $this->get_all_posts();
        $this->data['postsbycat'] = $this->get_all_posts();
        $this->data['postsbyuser'] = $this->get_all_posts($this->data['userid']);

        $this->data['title'] = "Posts";

        $this->load->view('layouts/header', $this->data);
        $this->load->view('pages/viewposts', $this->data);
        $this->load->view('layouts/footer', $this->data);
    }

    public function add_post()
    {
        if ($this->ion_auth->logged_in()) {
            $this->data['userInformation'] = $this->ion_auth->user()->row();
        }
        $this->data['loggedinuserinformation'] = $this->basic_information_of_mine($this->data['userInformation']->id);
        $this->data['userid'] = $this->data['userInformation']->id;
        $this->data['userinformation'] = $this->basic_information_of_mine($this->data['userid']);
        $this->data['personalinformation'] = $this->personal_information_of_mine($this->data['userid']);
        $this->data['postcategory'] = $this->common_model->get_settings(9);
        $uri1 = $this->uri->segment(1);
        $uri2 = $this->uri->segment(2);
        if ($uri1 == 'editpost') {
            if ($uri2) {
                $this->data['title'] = "Edit Post";
                $this->data['posts'] = $this->get_post_by_id($uri2);
                $this->data['post'] = $this->data['posts'][0];
            }
        }
        $this->data['title'] = "Add Post";

        $this->load->view('layouts/header', $this->data);
        $this->load->view('pages/addpost', $this->data);
        $this->load->view('layouts/footer', $this->data);
    }

    public function uploadpost()
    {
        if ($this->ion_auth->logged_in()) {
            $this->data['userInformation'] = $this->ion_auth->user()->row();
        }
        $this->data['loggedinuserinformation'] = $this->basic_information_of_mine($this->data['userInformation']->id);
        $uri2 = $this->input->post('userid');
        $this->data['userid'] = $this->data['userInformation']->id;

        $this->data['title'] = "Add A Post";

        $config['upload_path'] = "uploads/posts";
        $config['allowed_types'] = "gif|jpg|jpeg|png|pdf|doc|xls|txt|docx|xlsx";
        $config['max_size'] = "5000";
        $config['max_width'] = "1907";
        $config['max_height'] = "1280";
        //$this->load->library('upload', $config);
        $this->upload->initialize($config);
        /** Above Code for Upload File Initializer **/

        /** File If:Else Condition **/

        if (isset($this->data['userid'])) {
            if ($_FILES["upload_media"]["error"] == 4) {
                $pp = $this->input->post('userphoto');
            } else {
                $this->upload->do_upload('upload_media');
                $profilephoto = $this->upload->data();
            }

            $data = array(
                'AddedBy' => ((isset($uri2) ? $uri2 : $this->data['userid'])),
                'Category' => $this->input->post('postcategory'),
                'Title' => $this->input->post('posttitle'),
                'PostRoute' => $this->input->post('postroute'),
                'PostContent' => $this->input->post('postcontent'),
                'MediaFileName' => (isset($profilephoto['file_name']) ? $profilephoto['file_name'] : $pp),
                'MediaTempName' => (isset($post['raw_name']) ? $post['raw_name'] : ''),
                'MediaSize' => (isset($post['file_size']) ? $post['file_size'] : ''),
                'MediaWidth' => (isset($post['image_width']) ? $post['image_width'] : ''),
                'MediaHeight' => (isset($post['image_height']) ? $post['image_height'] : ''),
                'AddedDate' => datetoint(__now()),
                'isActive' => 1
            );

            if ($this->input->post('postid') == 'none') {
                $this->results = $this->settings_model->insertPost($data);
            } else {
                $where = array('PostId' => $this->input->post('postid'));
                $this->results = $this->settings_model->updatePost($data, $where);
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
    }

    public function delete_post()
    {
        if ($this->ion_auth->logged_in()) {
            $this->data['userInformation'] = $this->ion_auth->user()->row();
        }
        $this->data['loggedinuserinformation'] = $this->basic_information_of_mine($this->data['userInformation']->id);
        $this->data['userid'] = $this->data['userInformation']->id;
        $this->id = $this->uri->segment(2);

        if ($this->id) {
            $this->where = array('PostId' => $this->id);
            $this->isDelete = $this->settings_model->deletepost($this->where);
            if ($this->isDelete) {
                $this->status['status'] = 1;
                $this->status['msg'] = "Post has been deleted.";
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

    public function get_all_posts()
    {
        return $this->settings_model->getAllPosts();
    }

    public function get_post_by_id($id)
    {
        return $this->settings_model->getPostById($id);
    }

    public function get_all_posts_by_cat_id($id)
    {
        return $this->settings_model->getAllPostsByCatId($id);
    }

    public function basic_information_of_mine($id)
    {
        return $this->profile_model->getUsersInformation($id);
    }

    public function personal_information_of_mine($id)
    {
        return $this->profile_model->getPersonalInformation($id);
    }

}

?>