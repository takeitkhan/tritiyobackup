<?php
$header = header('Access-Control-Allow-Origin: *');
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Customers extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->ion_auth->logged_in()) {
            redirect('outlet', 'refresh');
        }

        $this->load->helper('customers');
        $this->load->model('customers_model');

    }

    public function index()
    {
        $offset = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        $per_page_limit = 5;
        $url = base_url('customers');
        $search = array(
            'status' => $this->input->get('status'),
            'title' => $this->input->get('title'),
            'limit' => $per_page_limit,
            'offset' => $offset,
        );
        $data['customers'] = $this->customers_model->customer_list($search);
        $total_rows = $this->customers_model->customer_count($search);
        $data['paging'] = pagination($total_rows, $per_page_limit, $url);

        $data['title'] = 'All Customers';
        accView('index', $data);
    }

    public function add()
    {
        $post = $this->input->post();
        // dd($post);
        if ($post) {
            $result = insertRow(tbl_customers, $post);
            if ($result)
                set_message('success', 'Successfully Added');
            else
                set_message('error', 'Can Not Save');
        }
        $data['title'] = 'Add Customer';
        accView('add', $data);
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Customer';
        $data['customer'] = getRecord(tbl_customers, ['id' => $id]);
        /*update*/
        $post = $this->input->post();
        if ($post) {
            $result = updateRow(tbl_customers, $post, ['id' => $id]);
            if ($result)
                set_message('success', 'Successfully Updated');
            else
                set_message('error', 'Can Not Updated');
        }

        accView('edit', $data);
    }

    public function ajax()
    {

    }

    public function delete($id)
    {
        if ($id) {
            $result = updateRow(tbl_customers, ['activity' => 'Delete'], ['id' => $id]);
            if ($result)
                set_message('success', 'Successfully Deleted');
            else
                set_message('error', 'Can Not Updated');

            redirect('customers');
        }
    }
    public function alive($id)
    {
        if ($id) {
            $result = updateRow(tbl_customers, ['activity' => 'Alive'], ['id' => $id]);
            if ($result)
                set_message('success', 'Successfully Alive');
            else
                set_message('error', 'Can Not Alive');

            redirect('deletedcustomers');
        }
    }
    public function deleted_customers()
    {
        $offset = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        $per_page_limit = 5;
        $url = base_url('deletedcustomers');
        $search = array(
            'status' => $this->input->get('status'),
            'title' => $this->input->get('title'),
            'limit' => $per_page_limit,
            'offset' => $offset,
        );
        $data['customers'] = $this->customers_model->customer_deleted_list($search);
        $total_rows = $this->customers_model->customer_deleted_count($search);
        $data['paging'] = pagination($total_rows, $per_page_limit, $url);

        $data['title'] = 'Deleted Customers';
        accView('deleted-customers', $data);
    }
}

?>