<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Settings extends MX_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('Ion_auth');
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->model('settings_model');
        $this->load->library('upload');
        $this->load->library('sma');
        $language = $this->db->get('settings')->row()->language;
        $this->lang->load('system_syntax', $language);
        $this->load->model('ion_auth_model');

        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login', 'refresh');
        }
        if (!$this->ion_auth->in_group('admin')) {
            redirect('home/permission');
        }
    }

    public function index() {
        $data = array();
        $data['settings'] = $this->settings_model->getSettings();
        $this->load->view('home/dashboard'); // just the header file
        $this->load->view('settings', $data);
        $this->load->view('home/footer'); // just the footer file
    }

    public function update() {
        $id = $this->input->post('id');
        $name = $this->input->post('name');
        $title = $this->input->post('title');
        $email = $this->input->post('email');
        $address = $this->input->post('address');
        $phone = $this->input->post('phone');
        $currency = $this->input->post('currency');
        $discount = $this->input->post('discount');
        $buyer = $this->input->post('buyer');
        $p_code = $this->input->post('p_code');

        if (!empty($email)) {
            $this->load->library('form_validation');
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            // Validating Name Field
            $this->form_validation->set_rules('name', 'System Name', 'trim|required|min_length[1]|max_length[100]|xss_clean');
            // Validating Title Field
            $this->form_validation->set_rules('title', 'Title', 'rtrim|equired|min_length[1]|max_length[100]|xss_clean');
            // Validating Email Field
            $this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[1]|max_length[100]|xss_clean');
            // Validating Address Field   
            $this->form_validation->set_rules('address', 'Address', 'trim|required|min_length[1]|max_length[500]|xss_clean');
            // Validating Phone Field           
            $this->form_validation->set_rules('phone', 'Phone', 'trim|required|min_length[1]|max_length[50]|xss_clean');
            // Validating Currency Field   
            $this->form_validation->set_rules('currency', 'Currency', 'trim|required|min_length[1]|max_length[3]|xss_clean');
            // Validating Phone Field  
            $this->form_validation->set_rules('discount', 'Discount', 'trim|required|min_length[1]|max_length[50]|xss_clean');
            // Validating Department Field   
            $this->form_validation->set_rules('buyer', 'Buyer', 'trim|min_length[5]|max_length[500]|xss_clean');
            // Validating Phone Field           
            $this->form_validation->set_rules('p_code', 'Purchase Code', 'trim|min_length[5]|max_length[50]|xss_clean');

            if ($this->form_validation->run() == FALSE) {
                $data = array();
                $data['settings'] = $this->settings_model->getSettings();
                $this->load->view('home/dashboard'); // just the header file
                $this->load->view('settings', $data);
                $this->load->view('home/footer'); // just the footer file
            } else {

                //$error = array('error' => $this->upload->display_errors());
                $data = array();
                $data = array(
                    'system_vendor' => $name,
                    'title' => $title,
                    'address' => $address,
                    'phone' => $phone,
                    'email' => $email,
                    'currency' => $currency,
                    'discount' => $discount,
                    'codec_username' => $buyer,
                    'codec_purchase_code' => $p_code
                );
                $this->settings_model->updateSettings($id, $data);
                $this->session->set_flashdata('feedback', 'Updated');
                // Loading View
                redirect('settings');
            }
        } else {
            $this->session->set_flashdata('feedback', 'Email Required!');
            redirect('settings', 'refresh');
        }
    }
    
     function backups() {
        $data['files'] = glob('./files/backups/*.zip', GLOB_BRACE);
        $data['dbs'] = glob('./files/backups/*.txt', GLOB_BRACE);
        $data['settings'] = $this->settings_model->getSettings();

        //$bc = array(array('link' => site_url('settings'), 'page' => lang('settings')), array('link' => '#', 'page' => lang('backups')));
        //$meta = array('page_title' => lang('backups'), 'bc' => $bc);
        // $this->page_construct('settings/backups', $this->data, $meta);
        $this->load->view('home/dashboard', $data);
        $this->load->view('backups', $data);
        $this->load->view('home/footer');
    }

    function language() {

        $data['settings'] = $this->settings_model->getSettings();

        //$bc = array(array('link' => site_url('settings'), 'page' => lang('settings')), array('link' => '#', 'page' => lang('backups')));
        //$meta = array('page_title' => lang('backups'), 'bc' => $bc);
        // $this->page_construct('settings/backups', $this->data, $meta);
        $this->load->view('home/dashboard', $data);
        $this->load->view('language', $data);
        $this->load->view('home/footer');
    }

    function changeLanguage() {
        $id = $this->input->post('id');
        $language = $this->input->post('language');
        $language_settings = $this->input->post('language_settings');


        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        // Validating Name Field
        $this->form_validation->set_rules('language', 'language', 'trim|required|min_length[1]|max_length[100]|xss_clean');


        if ($this->form_validation->run() == FALSE) {
            $data = array();
            $data['settings'] = $this->settings_model->getSettings();
            $this->load->view('home/dashboard', $data); // just the header file
            $this->load->view('settings', $data);
            $this->load->view('home/footer'); // just the footer file
        } else {

            //$error = array('error' => $this->upload->display_errors());
            $data = array();
            $data = array(
                'language' => $language,
            );

            $this->settings_model->updateSettings($id, $data);

            // Loading View
            $this->session->set_flashdata('feedback', 'Updated');
            if (!empty($language_settings)) {
                redirect('settings/language');
            } else {
                redirect('');
            }
        }
    }

    function backup_database() {
        if (!$this->ion_auth->in_group('admin')) {
            $this->session->set_flashdata('error', lang('access_denied'));
            redirect("home/permission");
        }
        $this->load->dbutil();
        $prefs = array(
            'format' => 'sql',
            'filename' => 'hms_db_backup.sql'
        );
        $back = $this->dbutil->backup($prefs);
        $backup = & $back;
        $db_name = 'db-backup-on-' . date("Y-m-d-H-i-s") . '.txt';
        $save = './files/backups/' . $db_name;
        $this->load->helper('file');
        write_file($save, $backup);
        $this->session->set_flashdata('message', 'Database backup Successfull !');
        redirect("settings/backups");

        /* 	
          $this->load->dbutil();
          $backup = $this->dbutil->backup();
          $this->load->helper('file');
          write_file('Downloads.sql', $backup);
          $this->load->helper('download');
          force_download('backup.zip', $backup); */
    }

    
    function backup_files() {
        if (!$this->ion_auth->in_group('admin')) {
            $this->session->set_flashdata('error', lang('access_denied'));
            redirect("home/permission");
        }
        $this->load->library('zip');
        $data = array_diff(scandir(FCPATH), array('..', '.', 'files')); // 'files' folder will be excluded here with '.' and '..'
        foreach ($data as $d) {
            $path = FCPATH . $d;
            if (is_dir($path))
                $this->zip->read_dir($path, false);
            if (is_file($path))
                $this->zip->read_file($path, false);
        }
        $filename = 'file-backup-' . date("Y-m-d-H-i-s") . '.zip';
        $this->zip->archive(FCPATH . 'files/backups/' . $filename);
        $this->session->set_flashdata('message', 'Application backup Successfull !');
        redirect("settings/backups");
        exit();
    } 

    /* function backup_files()
      {
      if (!$this->ion_auth->in_group('admin')) {
      $this->session->set_flashdata('error', lang('access_denied'));
      redirect("home/permission");
      }
      $this->load->dbutil();
      $backup = $this->dbutil->backup();
      $this->load->helper('file');

      $filename = 'file-backup-' . date("Y-m-d-H-i-s");
      $this->sma->zip("./", './files/backups/', $filename);
      $this->session->set_flashdata('message', lang('backup_saved'));
      redirect("settings/backups");
      exit();
      } */

    function restore_database($dbfile) {
        if (!$this->ion_auth->in_group('admin')) {
            $this->session->set_flashdata('error', lang('access_denied'));
            redirect("home/permission");
        }
        $file = file_get_contents('./files/backups/' . $dbfile . '.txt');
        $this->db->conn_id->multi_query($file);
        $this->db->conn_id->close();
        $this->session->set_flashdata('message', 'Restoring of Backup Successfull');
        redirect('settings/backups');
    }

  
   

    function download_database($dbfile) {
        if (!$this->ion_auth->in_group('admin')) {
            $this->session->set_flashdata('error', lang('access_denied'));
            redirect("home/permission");
        }
        $this->load->library('zip');
        $this->zip->read_file('./files/backups/' . $dbfile . '.txt');
        $name = 'db_backup_' . date('Y_m_d_H_i_s') . '.zip';
        $this->zip->download($name);
        exit();
    }

    function download_backup($zipfile) {
        if (!$this->ion_auth->in_group('admin')) {
            $this->session->set_flashdata('error', lang('access_denied'));
            redirect("home/permission");
        }
        $this->load->helper('download');
        force_download('./files/backups/' . $zipfile . '.zip', NULL);
        exit();
    }

    function restore_backup($zipfile) {
        if (!$this->ion_auth->in_group('admin')) {
            $this->session->set_flashdata('error', lang('access_denied'));
            redirect("home/permission");
        }
        $file = './files/backups/' . $zipfile . '.zip';
        $this->sma->unzip($file, './');
        $this->session->set_flashdata('info', 'Restoring of Application Successfull');
        redirect("settings/backups");
        exit();
    }

    function delete_database($dbfile) {
        if (!$this->ion_auth->in_group('admin')) {
            $this->session->set_flashdata('error', lang('access_denied'));
            redirect("home/permission");
        }
        unlink('./files/backups/' . $dbfile . '.txt');
        $this->session->set_flashdata('info', 'Deleting of Database Successfull');
        redirect("settings/backups");
    }

    function delete_backup($zipfile) {
        if (!$this->ion_auth->in_group('admin')) {
            $this->session->set_flashdata('error', lang('access_denied'));
            redirect("home/permission");
        }
        unlink('./files/backups/' . $zipfile . '.zip');
        $this->session->set_flashdata('info', 'Deleting of App Backup Successfull');
        redirect("settings/backups");
    }

}

/* End of file settings.php */
/* Location: ./application/modules/settings/controllers/settings.php */


