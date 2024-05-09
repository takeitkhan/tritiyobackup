<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @property Profile_model $profile_model Profile Model
 * @property Common_model $common_model Common Model
 * @property Settings_model $settings_model Settings Model
 * @property Ion_auth $ion_auth ion_auth
 * @property Admin_model $admin_model admin_model
 */
class Dashboard extends MY_Controller
{

    protected $data;

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        if ($this->ion_auth->logged_in()) {
            $this->data['userInformation'] = $this->ion_auth->user()->row();
            //owndebugger($this->data['userInformation']);
        }
        $this->data['loggedinuserinformation'] = $this->basic_information_of_mine($this->data['userInformation']->id);
        $this->data['title'] = "Smart Campus Dashboard";
        $this->data['userid'] = $this->data['userInformation']->id;
        $this->data['biodata'] = $this->common_model->get_user_single_informations_by_user_id($this->data['userid']);
        $this->data['userinformation'] = $this->basic_information_of_mine($this->data['userid']);
        $this->data['personalinformation'] = $this->settings_model->getPersonalInformation($this->data['userid']);
        $this->data['totals'] = $this->settings_model->getTotalBusinessesCount();
        $this->data['messages'] = $this->admin_model->getAllMessage($this->data['userInformation']->id);
        //owndebugger($this->data['genderwisecount']);
        $this->data['totalss'] = $this->common_model->all_totals();
        (isset($this->data['totalss']) ? $this->data['totalss'][0] : '');
        $this->data['clswisestudents'] = $this->common_model->class_wise_students();
        (isset($this->data['clswisestudents']) ? $this->data['clswisestudents'][0] : '');
        
        $infos = array();
        if (!empty($this->data['clswisestudents'])) {
	        foreach ($this->data['clswisestudents'] as $cwt) { 	
	        	$boys = $this->admin_model->getGenderWiseCount($cwt->ClsId, 21);        	
	        	$girls = $this->admin_model->getGenderWiseCount($cwt->ClsId, 22);
	        	
	        	$infos[] = '<li><div class="animated flipInY summary">';
	        	$infos[] .= '<span>' . $cwt->ClsName . '</span>';
	        	$infos[] .= '<h3>' . $cwt->CWC . '</h3>';
	        	$infos[] .= '<span>Boys: ' . $boys[0]->Total . '</span>, ';
        		$infos[] .= '<span>Girls: ' . $girls[0]->Total . '</span><br />';
        		$m = $girls[0]->Total + $boys[0]->Total;
        		$req = $cwt->CWC - $m;
        		$infos[] .= '<span class="text-danger">Updates Gender: ' . $req . '</span>';
	        	$infos[] .= '</div></li>';
	        }
	    }
	    $this->data['infos'] = $infos;

        $this->load->view('layouts/header', $this->data);
        $this->load->view('profile/dashboard', $this->data);
        $this->load->view('layouts/footer', $this->data);
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
