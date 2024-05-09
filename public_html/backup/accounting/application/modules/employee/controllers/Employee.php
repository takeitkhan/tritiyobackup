<?php
$header = header('Access-Control-Allow-Origin: *');
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Employee extends MX_Controller {
    public function __construct() {
        parent::__construct();
        if (!$this->ion_auth->logged_in()) {
            redirect('outlet', 'refresh');
        }
        $this->load->helper('employee');
        $this->load->model('employee_model');
    }

    public function index() {
        $offset = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        $per_page_limit = 5;
        $url = base_url('employees');
        $search = array(
            'status' => $this->input->get('status'),
            'title' => $this->input->get('title'),
            'limit' => $per_page_limit,
            'offset' => $offset,
        );
        $data['emps'] = $this->employee_model->employee_list($search);
        $total_rows = $this->employee_model->employee_count($search);
        $data['paging'] = pagination($total_rows, $per_page_limit, $url);

        $data['title'] = 'All Employee';
        accView('index', $data);
    }

    public function add() {
        $post = $this->input->post();
        $email = $this->input->post('email');
        $password = password_hash('12345', PASSWORD_DEFAULT);
        $users_data = ['email' => $email, 'username' => $email, 'password' => $password];

        if ($post) {
           if(isRowExist(tbl_users,['email' => $email]) == 1){
               $this->session->set_flashdata('exist','<div class="alert alert-error"><a class="close" data-dismiss="alert" href="#">×</a>Email Exist</div>');
            } else {
               $this->session->set_flashdata('exist','');
                insertRow(tbl_users, $users_data);
                $post['user_id'] = lastId();
                $post['created_by'] = $this->ion_auth->get_user_id();
                insertRow(tbl_users_groups, ['user_id' => $post['user_id'], 'group_id' => 5]);
                $result = insertRow(tbl_employee_info, $post);
                if ($result)
                    set_message('success', 'Successfully Added');
                else
                    set_message('error', 'Can Not Save');
            }
        }

        $data['title'] = 'Add Employee';
        accView('add', $data);
    }

    public function edit($id) {
        $data['id'] = $id ;
        $data['title'] = 'Edit Employee';
        $data['employee'] = getRecord(tbl_employee_info, ['id' => $id]);
        // dd($data['employee']);
        /*update*/
        $post = $this->input->post();
        if ($post) {
            $result = updateRow(tbl_employee_info, $post, ['id' => $id]);
            if ($result)
                set_message('success', 'Successfully Updated');
            else
                set_message('error', 'Can Not Updated');
        }
        accView('edit', $data);
    }

    public function ajax() {

    }

    public function delete($id)
    {
        if ($id) {
            $result = updateRow(tbl_employee_info, ['activity' => 'Delete'], ['id' => $id]);
            if ($result)
                set_message('success', 'Successfully Deleted');
            else
                set_message('error', 'Can Not Updated');

            redirect('employees');
        }
    }
    public function alive($id)
    {
        if ($id) {
            $result = updateRow(tbl_employee_info, ['activity' => 'Alive'], ['id' => $id]);
            if ($result)
                set_message('success', 'Successfully Alive');
            else
                set_message('error', 'Can Not Alive');

            redirect('deletedemployees');
        }
    }
    public function deleted_employee()
    {
        $offset = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        $per_page_limit = 5;
        $url = base_url('deletedemployees');
        $search = array(
            'status' => $this->input->get('status'),
            'title' => $this->input->get('title'),
            'limit' => $per_page_limit,
            'offset' => $offset,
        );
        $data['emps'] = $this->employee_model->employee_deleted_list($search);
        $total_rows = $this->employee_model->employee_deleted_count($search);
        $data['paging'] = pagination($total_rows, $per_page_limit, $url);

        $data['title'] = 'Deleted Employee';
        accView('deleted-employee', $data);
    }

}

?>