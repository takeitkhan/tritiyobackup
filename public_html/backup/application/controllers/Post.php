<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * @property Profile_model $profile_model Profile Model
 * @property Common_model $common_model Common Model
 * @property Settings_model $settings_model Settings Model
 * @property Ion_auth $ion_auth ion_auth
 * @property panel_model $panel_model panel model
 * @property admin_model $admin_model panel model
 */
class Post extends MY_Controller {

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

    public function __construct() {
        parent::__construct();
        $this->load->library('HybridAuthLib');
        $this->load->model(array("common_model", "profile_model", "admin_model"));
        if (!$this->ion_auth->logged_in()) {
            redirect('outlet', 'refresh');
        }
    }

    public function index() {
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

    public function add_category() {
        if ($this->ion_auth->logged_in()) {
            $this->data['userInformation'] = $this->ion_auth->user()->row();
        }
        $this->data['loggedinuserinformation'] = $this->basic_information_of_mine($this->data['userInformation']->id);
        $this->data['userid'] = $this->data['userInformation']->id;
        $this->data['userinformation'] = $this->basic_information_of_mine($this->data['userid']);
        $this->data['personalinformation'] = $this->personal_information_of_mine($this->data['userid']);

        $uri1 = $this->uri->segment(1);
        $uri2 = $this->uri->segment(2);
        if ($uri1 == 'editcategory') {
            if ($uri2) {
                $this->data['title'] = "Edit Category";
                $this->data['posts'] = $this->get_category_by_id($uri2);
                $this->data['inisetting'] = $this->data['posts'][0];
            } else {
                $this->data['title'] = "Add New Category";
            }
        } else {
            $this->data['title'] = "Add New Category";
        }



        $this->load->view('layouts/header', $this->data);
        $this->load->view('pages/addcategory', $this->data);
        $this->load->view('layouts/footer', $this->data);
    }

    public function view_categories() {
        if ($this->ion_auth->logged_in()) {
            $this->data['userInformation'] = $this->ion_auth->user()->row();
        }
        $this->data['loggedinuserinformation'] = $this->basic_information_of_mine($this->data['userInformation']->id);
        $this->data['userid'] = $this->data['userInformation']->id;
        $this->data['userinformation'] = $this->basic_information_of_mine($this->data['userid']);
        $this->data['personalinformation'] = $this->personal_information_of_mine($this->data['userid']);


        $this->data['title'] = "View All Categories";

        $this->load->view('layouts/header', $this->data);
        $this->load->view('pages/viewcategories', $this->data);
        $this->load->view('layouts/footer', $this->data);
    }

    public function modify_category() {
        if ($this->ion_auth->logged_in()) {
            $this->data['userInformation'] = $this->ion_auth->user()->row();
        }
        $this->data['loggedinuserinformation'] = $this->basic_information_of_mine($this->data['userInformation']->id);
        $this->data['userid'] = $this->data['userInformation']->id;

        if (isset($this->data['userid'])) {
            $data = array(
                'SettingsCategory' => 9,
                'SettingsName' => $this->input->post('settingsname'),
                'SettingsDescription' => $this->input->post('settingsdescription'),
                'isActive' => 1
            );

            if ($this->input->post('settingsid') == 'none') {
                $this->results = $this->settings_model->insertInitialSettings($data);
            } else {
                $where = array('SettingsId' => $this->input->post('settingsid'));
                $this->results = $this->settings_model->updateInitialSettings($data, $where);
            }

            if ($this->results) {
                $this->status['status'] = 1;
                $this->status['msg'] = 'Well done!';
            } else {
                $this->status['status'] = 0;
                $this->status['msg'] = 'Oh snap! Change a few things up and try submitting again.';
            }
            echo jsonEncode($this->status);
        } else {
            $this->status['status'] = 0;
            $this->status['msg'] = $this->upload->display_errors();
            echo jsonEncode($this->status);
        }
    }

    public function add_post() {
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
        $newsid = $this->input->post('news_id');
        //owndebugger($newsid);
        if ($uri1 == 'editpost' || $uri1 == 'searchandedit') {
            if (!empty($uri2)) {
                $this->data['title'] = "Edit Post";
                $this->data['posts'] = $this->get_post_by_id($uri2);
                //owndebugger($this->data['posts']);
                $this->data['post'] = $this->data['posts'][0];
            } else if(!empty ($newsid)) {
                $this->data['title'] = "Edit Post";
                $this->data['posts'] = $this->get_post_by_id($newsid);
                //owndebugger($this->data['posts']);
                $this->data['post'] = $this->data['posts'][0];
            }
        }
        $this->data['posts'] = $this->get_all_posts_by_category_id(47, 14);
        //owndebugger($this->data['posts']);
        $this->data['title'] = "Post";

        $this->load->view('layouts/header', $this->data);
        $this->load->view('pages/addpost', $this->data);
        $this->load->view('layouts/footer', $this->data);
    }

    public function uploadpost() {        
        if ($this->ion_auth->logged_in()) {
            $this->data['userInformation'] = $this->ion_auth->user()->row();
        }
        $this->data['loggedinuserinformation'] = $this->basic_information_of_mine($this->data['userInformation']->id);
        $uri2 = $this->input->post('userid');
        $this->data['userid'] = $this->data['userInformation']->id;

        $this->data['title'] = "Post";

        $config['upload_path'] = "uploads/posts";
        $config['allowed_types'] = "gif|jpg|jpeg|png|pdf|doc|xls|txt|docx|xlsx";
        $config['max_size'] = "5000";
        $config['max_width'] = "1907";
        $config['max_height'] = "1280";
        //$this->load->library('upload', $config);
        $this->upload->initialize($config);
        /** Above Code for Upload File Initializer * */
        /** File If:Else Condition * */
        if (isset($this->data['userid'])) {
            if (!empty($_FILES["upload_media_edit"]) ? $_FILES["upload_media_edit"]["error"] : '' == 4) {
                $pp = $this->input->post('userphoto');
            } else {
                $um = $this->upload->do_upload('upload_media');
                $ume = $this->upload->do_upload('upload_media_edit');
                (!empty($um) ? $um : '')  || (!empty($ume) ? $ume : '');
                $profilephoto = $this->upload->data();
            }

            $catstr = implode(", ", (array) $this->input->post('postcategory'));
            $nad = __now();
            
            $data = array(
                'AddedBy' => ((isset($uri2) ? $uri2 : $this->data['userid'])),
                'Category' => $catstr,
                'Title' => $this->input->post('posttitle'),
                'ConnectionLink' => $this->input->post('connection_link'),
                'PostRoute' => $this->input->post('postroute'),
                'PostContent' => $this->input->post('postcontent'),
                'MediaFileName' => (isset($profilephoto['file_name']) ? $profilephoto['file_name'] : $pp),
                'MediaTempName' => (isset($post['raw_name']) ? $post['raw_name'] : ''),
                'MediaSize' => (isset($post['file_size']) ? $post['file_size'] : ''),
                'MediaWidth' => (isset($post['image_width']) ? $post['image_width'] : ''),
                'MediaHeight' => (isset($post['image_height']) ? $post['image_height'] : ''),
                'AddedDate' => datetoint($nad),
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

    public function facebook_post() {
        if ($this->ion_auth->logged_in()) {
            $this->data['userInformation'] = $this->ion_auth->user()->row();
        }
        $this->data['loggedinuserinformation'] = $this->basic_information_of_mine($this->data['userInformation']->id);
        $this->data['userid'] = $this->data['userInformation']->id;

        $this->data["facebook_status"] = $this->admin_model->getStoredHybridSession($this->data['userid'], "Facebook");

        if (!empty($this->data['facebook_status'][0])) {
            if ($this->data["facebook_status"] != "0") {
                $this->data["facebook_profile"] = $this->get_user_pages("Facebook");
// 				owndebugger($this->data['facebook_profile']);
//     			$access_token = explode('&', $this->data['facebook_profile']->coverInfoURL);
//     			$a_t = explode('=', $access_token[1]);
                //owndebugger($a_t[1]);

                owndebugger($this->data['facebook_profile'][0]);
                $params = array(
                    'access_token' => $this->data['facebook_profile'][0]['access_token'],
                    'message' => "hello word! 1"
                );
                owndebugger($params);


                $facebook = $this->hybridauthlib->authenticate("Facebook");
                $facebook->api()->api("/394693820718605/feed", 'POST', $params);
//     			owndebugger('Successfully posted to Facebook');
// 				$params = array(
//     				"access_token" => $a_t[1],
//     				"message" => "Here is a blog post about auto posting on Facebook using PHP",
//     				"link" => "http://facebook.com",
//     				"picture" => "https://i.telegraph.co.uk/multimedia/archive/03474/Facebook_3474124b.jpg",
//     				"name" => "How to Auto Post on Facebook with PHP",
//     				"caption" => "https://facebook.com",
//     				"description" => "Automatically post on Facebook with PHP using Facebook PHP SDK."
//     			);
// 				$facebook = $this->hybridauthlib->authenticate("Facebook");
//     			$ret = $facebook->api()->api('/221320344636/feed', 'POST', $params);
//     			owndebugger('Successfully posted to Facebook');
            }
        } else {
            $this->data["facebook_profile"] = 0;
        }
    }

    public function get_user_pages($provider) {
        $profile_data = "";
        $status = $this->input->post("status", true);
        if ($this->ion_auth->logged_in()) {
            $this->data['userInformation'] = $this->ion_auth->user()->row();
        }
        $this->data['userid'] = $this->data['userInformation']->id;

        $this->data['userid'] = $this->data['userInformation']->id;
        $hybridauth_session_data = $this->admin_model->getStoredHybridSession($this->data['userid'], $provider);
        $hybridauth_session_total = $this->admin_model->getStoredHybridSessionTotal($this->data['userid'], $provider);

        if (!empty($hybridauth_session_data)) {
            $this->hybridauthlib->restoreSessionData($hybridauth_session_data[0] ['hybridauth_session']);
            try {
                $facebook = $this->hybridauthlib->getAdapter($provider);
                if ($this->hybridauthlib->providerEnabled($provider)) {
                    $service = $this->hybridauthlib->authenticate($provider);
                    if ($service->isUserConnected()) {
                        $profile_data = $facebook->getUserPages();
                        // owndebugger($this->data['user_profile']);
                    } else {
                        show_error('Cannot authenticate user');
                    }
                } else {
                    show_404($_SERVER ['REQUEST_URI']);
                }
            } catch (Exception $e) {
                echo "Ooophs, we got an error: " . $e->getMessage();
            }
        }
        return $profile_data;
    }

    public function get_profile($provider) {
        $profile_data = "";
        $status = $this->input->post("status", true);
        if ($this->ion_auth->logged_in()) {
            $this->data['userInformation'] = $this->ion_auth->user()->row();
        }
        $this->data['userid'] = $this->data['userInformation']->id;

        $this->data['userid'] = $this->data['userInformation']->id;
        $hybridauth_session_data = $this->admin_model->getStoredHybridSession($this->data['userid'], $provider);
        $hybridauth_session_total = $this->admin_model->getStoredHybridSessionTotal($this->data['userid'], $provider);

        if (!empty($hybridauth_session_data)) {
            $this->hybridauthlib->restoreSessionData($hybridauth_session_data[0] ['hybridauth_session']);
            try {
                $facebook = $this->hybridauthlib->getAdapter($provider);
                if ($this->hybridauthlib->providerEnabled($provider)) {
                    $service = $this->hybridauthlib->authenticate($provider);
                    if ($service->isUserConnected()) {
                        $profile_data = $facebook->getUserProfile();
                        // owndebugger($this->data['user_profile']);
                    } else {
                        show_error('Cannot authenticate user');
                    }
                } else {
                    show_404($_SERVER ['REQUEST_URI']);
                }
            } catch (Exception $e) {
                echo "Ooophs, we got an error: " . $e->getMessage();
            }
        }
        return $profile_data;
    }

    public function uploadimage() {
        if ($this->ion_auth->logged_in()) {
            $this->data['userInformation'] = $this->ion_auth->user()->row();
        }
        $this->data['loggedinuserinformation'] = $this->basic_information_of_mine($this->data['userInformation']->id);
        $uri2 = $this->input->post('userid');
        $this->data['userid'] = $this->data['userInformation']->id;

        $this->data['title'] = "Add A Post";

        $config['upload_path'] = "uploads/posts";
        $config['allowed_types'] = "gif|jpg|jpeg|png";
        $config['max_size'] = "5000";
        $config['max_width'] = "1907";
        $config['max_height'] = "1280";
        //$this->load->library('upload', $config);
        $this->upload->initialize($config);
        /** Above Code for Upload File Initializer * */
        /** File If:Else Condition * */
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
                'Title' => (isset($post['raw_name']) ? $post['raw_name'] : ''),
                'PostRoute' => (isset($post['raw_name']) ? $post['raw_name'] : ''),
                'PostContent' => (isset($post['raw_name']) ? $post['raw_name'] : ''),
                'MediaFileName' => (isset($profilephoto['file_name']) ? $profilephoto['file_name'] : $pp),
                'MediaTempName' => (isset($post['raw_name']) ? $post['raw_name'] : ''),
                'MediaSize' => (isset($post['file_size']) ? $post['file_size'] : ''),
                'MediaWidth' => (isset($post['image_width']) ? $post['image_width'] : ''),
                'MediaHeight' => (isset($post['image_height']) ? $post['image_height'] : ''),
                'AddedDate' => datetoint(__now()),
                'isActive' => 1
            );

            //owndebugger($this->input->post('postcategory'));

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
        //owndebugger($this->input->post('postcategory'));
    }

    public function delete_post() {
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

    public function delete_category() {
        if ($this->ion_auth->logged_in()) {
            $this->data['userInformation'] = $this->ion_auth->user()->row();
        }
        $this->data['loggedinuserinformation'] = $this->basic_information_of_mine($this->data['userInformation']->id);
        $this->data['userid'] = $this->data['userInformation']->id;
        $this->id = $this->uri->segment(2);

        if ($this->id) {
            $this->where = array('SettingsId' => $this->id);
            $this->isDelete = $this->settings_model->deletecategory($this->where);
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

    public function get_all_posts() {
        return $this->settings_model->getAllPosts();
    }

    public function get_post_by_id($id) {
        return $this->settings_model->getPostById($id);
    }

    public function get_category_by_id($id) {
        return $this->settings_model->getCategoryById($id);
    }

    public function get_all_posts_by_cat_id($id) {
        return $this->settings_model->getAllPostsByCatId($id);
    }

    public function basic_information_of_mine($id) {
        return $this->profile_model->getUsersInformation($id);
    }

    public function personal_information_of_mine($id) {
        return $this->profile_model->getPersonalInformation($id);
    }

    public function get_all_posts_by_category_id($id, $limit) {
        return $this->settings_model->getAllPostsByCategory($id, $limit);
    }

}

?>