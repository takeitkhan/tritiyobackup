<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @property Profile_model $profile_model sdss
 * @property Uploader $uploader Uploader Class Library
 * @property Common_model $common_model Uploader Class Library
 * @property Paypal_ec $paypal_ec Uploader Class Library
 * @property Admin_model $admin_model Admin Model
 * @property csvimport $csvimport csvimport
 * @property hybridauthlib $hybridauthlib hybridauthlib
 */
class HAuth extends CI_Controller
{
    protected $data = array();
    private $status = array("status" => 0, "msg" => NULL);
    private $where = array();
    private $id;

    public function __construct()
    {
        parent::__construct();

        $this->load->model(array("common_model", "admin_model", "profile_model"));
        $this->load->library('HybridAuthLib');
        $this->load->library(array('ion_auth', 'form_validation', 'upload', 'initial'));

        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login', 'refresh');
        }
    }

    public function index()
    {
        $this->load->view('hauth/home', $this->data);
    }	
	public function login($provider)
    {
        if ($this->ion_auth->logged_in()) {
            $this->data['userInformation'] = $this->ion_auth->user()->row();
        }
        $this->data['userid'] = $this->data['userInformation']->id;
        $hybridauth_session_total = $this->admin_model->getStoredHybridSessionTotal($this->data['userid'],$provider);
		
		//print_r($hybridauth_session_total);exit();

        if ($hybridauth_session_total[0]['TotalAccounts'] > 0) {
            redirect('social_login', 'refresh');
        } else {
            try {
                //log_message('debug', 'controllers.HAuth.login: loading HybridAuthLib');
                if ($this->hybridauthlib->providerEnabled($provider)) {
                    //log_message('debug', "controllers.HAuth.login: service $provider enabled, trying to authenticate.");
                    $service = $this->hybridauthlib->authenticate($provider);
                    if ($service->isUserConnected()) {
                        $user_profile = $service->getUserProfile();
                        $this->data['user_profile'] = $user_profile;
                        $hybridauth_session_data = $this->hybridauthlib->getSessionData();
                        $data1 = array(
                            'user_id' => $this->data['userid'],
                            'hybridauth_session' => $hybridauth_session_data,
                            'provider' => $provider,
                            'updated_at' => datetoint(__now())
                        );
                        $this->results = $this->profile_model->insertSocialConnection($data1);
                    } else // Cannot authenticate user
                    {
                        show_error('Cannot authenticate user');
                    }
                } else // This service is not enabled.
                {
                    //log_message('error', 'controllers.HAuth.login: This provider is not enabled (' . $provider . ')');
                    show_404($_SERVER['REQUEST_URI']);
                }
            } catch (Exception $e) {
                $error = 'Unexpected error';
                switch ($e->getCode()) {
                    case 0 :
                        $error = 'Unspecified error.';
                        break;
                    case 1 :
                        $error = 'configuration error.';
                        break;
                    case 2 :
                        $error = 'Provider not properly configured.';
                        break;
                    case 3 :
                        $error = 'Unknown or disabled provider.';
                        break;
                    case 4 :
                        $error = 'Missing provider application credentials.';
                        break;
                    case 5 :
                        //log_message('debug', 'controllers.HAuth.login: Authentification failed. The user has canceled the authentication or the provider refused the connection.');
                        //redirect();
                        if (isset($service)) {
                            //log_message('debug', 'controllers.HAuth.login: logging out from service.');
                            $service->logout();
                        }
                        show_error('User has cancelled the authentication or the provider refused the connection.');
                        break;
                    case 6 :
                        $error = 'User profile request failed. Most likely the user is not connected to the provider and he should to authenticate again.';
                        break;
                    case 7 :
                        $error = 'User not connected to the provider.';
                        break;
                }

                if (isset($service)) {
                    $service->logout();
                }

                //log_message('error', 'controllers.HAuth.login: ' . $error);
                show_error('Error authenticating user.');
            }
        }
		redirect("social_login/");
        /*$this->data['userinformation'] = $this->basic_information_of_mine($this->data['userid']);
        $this->data['personalinformation'] = $this->personal_information_of_mine($this->data['userid']);
        $this->data['countries'] = $this->common_model->get_countries();

        $this->data['title'] = "Social Accounts Connection";
        $this->data['panel_heading'] = $this->panel_heading();
        
        //$this->load->view('layouts/header', $this->data);
        //$this->load->view('profile/socialaccounts', $this->data);
        //$this->load->view('layouts/header', $this->data);
        
        $this->data["main_content"]=  $this->load->view("dashboard/dashboard",$this->data,true);
        $this->load->view("dashboard/admin_master",  $this->data);*/
    }
	
	
	
	public function logout($provider){
		if ($this->ion_auth->logged_in()) {
            $this->data['userInformation'] = $this->ion_auth->user()->row();
        }
        $this->data['userid'] = $this->data['userInformation']->id;
        $hybridauth_session_data = $this->admin_model->getStoredHybridSession($this->data['userid'],$provider);
        $hybridauth_session_total = $this->admin_model->getStoredHybridSessionTotal($this->data['userid'],$provider);
	
        if (!empty($hybridauth_session_data)) {
            $this->hybridauthlib->restoreSessionData($hybridauth_session_data[0]['hybridauth_session']);
			$facebook = $this->hybridauthlib->getAdapter($provider);
			if ($this->hybridauthlib->providerEnabled($provider)) {
				$service = $this->hybridauthlib->authenticate($provider);
				//$service->logout();
				//$fb_logout_url = $adapter->api()->getLogoutUrl( $params ); 
				//echo $fb_logout_url;exit();
				$this->hybridauthlib->logoutAllProviders();
				$this->admin_model->deleteStoredHybridSession($this->data['userid'],$provider);
				$session["MessageBox"]="<font color='green'>$provider successfully logged out</font>";
				$this->session->set_userdata($session);
			}				
        }
		redirect("dashboard/social_login");
	}

    public function endpoint()
    {
		if(isset($_GET['denied'])||isset($_GET['oauth_problem'])){
			redirect("dashboard/social_login");
		}
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        	//owndebugger($_GET);
            $_GET = $_REQUEST;
        }
        require_once APPPATH . '/third_party/hybridauth/index.php';
		//redirect("dashboard/concurrent_post/");
    }

    public function basic_information_of_mine($id)
    {
        return $this->profile_model->getUsersInformation($id);
    }

    public function personal_information_of_mine($id)
    {
        return $this->profile_model->getPersonalInformation($id);
    }

    public function panel_heading()
    {
        return 'Update your portal';
    }

    public function is_relation($rid, $sid)
    {
        $connected = $this->admin_model->isRelation($rid, $sid);
        return $connected;
    }

    public function get_group_id($userid)
    {
        return $this->ion_auth->get_users_groups($userid)->row()->id;
    }
}

/* End of file hauth.php */
/* Location: ./application/controllers/hauth.php */
