<?php
$header = header('Access-Control-Allow-Origin: *');
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Products extends MX_Controller {
    public function __construct() {
        parent::__construct();
        if (!$this->ion_auth->logged_in()) {
            redirect('outlet', 'refresh');
        }
        $this->load->helper('products');
        $this->load->model('products_model');
    }

    public function index() {
        $data['title'] = 'All Products';


        $offset = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        $per_page_limit = 5;
        $url = base_url('products');
        $search = array(
            'status' => $this->input->get('status'),
            'title' => $this->input->get('title'),
            'limit' => $per_page_limit,
            'offset' => $offset,
        );
        $data['customers'] = $this->products_model->product_list($search);
        $total_rows = $this->products_model->product_count($search);
        $data['paging'] = pagination($total_rows, $per_page_limit, $url);
        accView('index', $data);
    }

    public function add() {
        $data['title'] = 'Add Product';
        $posts = $this->input->post();
        if($posts){
            if(isRowExist(tbl_products,['name' => $posts['name']]) == 1 || isRowExist(tbl_products,['sku' => $posts['sku']]) == 1){
                set_message('error', 'Already Exist');
            } else {
                $result = insertRow(tbl_products, $posts);
                if ($result)
                    set_message('success', 'Successfully Added');
                else
                    set_message('error', 'Can Not Save');
            }
            redirect('products');
        }
        accView('add', $data);
    }

    public function edit() {
        $data['title'] = 'Edit Product';
        accView('edit', $data);
    }
    
    public function ajax(){
    }

    public function delete() {
    }

    /***********************************
        Units Add, Delete, Edit, Update
    ************************************/
    public function units() {
        $data['title'] = 'Unit Create';
        $data['units'] = getRecords(tbl_units, ['status' => 'Active','activity' => 'Alive']);
        $data['deleted_units_list'] = getRecords(tbl_units, ['status' => 'Active','activity' => 'Delete']);
        accView('product-unit', $data);
    }

    public function add_units() {
        $data['title'] = 'Create Units';
        $posts = $this->input->post();
        if($posts){
            if(isRowExist(tbl_units,['name' => $posts['name']]) == 1){
                set_message('error', 'Already Exist');
            } else {
                $result = insertRow(tbl_units, $posts);
                if ($result)
                    set_message('success', 'Successfully Added');
                else
                    set_message('error', 'Can Not Save');
            }
            redirect('units');
        }
    }

    public function edit_units($id){
        $data['id'] = $id ;
        $data['title'] = 'Edit Unit';
        $data['unit'] = getRecord(tbl_units, ['id' => $id]);
        /*update*/
        $post = $this->input->post();
        if ($post) {
            $result = updateRow(tbl_units, $post, ['id' => $id]);
            if ($result)
                set_message('success', 'Successfully Updated');
            else
                set_message('error', 'Can Not Updated');
        }
       accView('product-unit', $data);
    }

    public function delete_units($id){
        if ($id) {
            $result = updateRow(tbl_units, ['activity' => 'Delete'], ['id' => $id]);
            if ($result)
                set_message('success', 'Successfully Deleted');
            else
                set_message('error', 'Can Not Updated');

            redirect('units');
        }
    }

    public function alive_units($id){
        if ($id) {
            $result = updateRow(tbl_units, ['activity' => 'Alive'], ['id' => $id]);
            if ($result)
                set_message('success', 'Successfully Alive');
            else
                set_message('error', 'Can Not Alive');

            redirect('units');
        }
    }

    /********************************************
        Manufacturers Add, Delete, Edit, Update
    *********************************************/
    public function manufacturers() {
        $data['title'] = 'Manufacturers Create';
        $data['manufacturers'] = getRecords(tbl_manufacturers, ['status' => 'Active','activity' => 'Alive']);
        $data['deleted_manufacturers_list'] = getRecords(tbl_manufacturers, ['status' => 'Active','activity' => 'Delete']);
        accView('product-manufacturers', $data);
    }

    public function add_manufacturers() {
        $data['title'] = 'Create Manufacturers';
        $posts = $this->input->post();
        if($posts){
            if(isRowExist(tbl_manufacturers,['name' => $posts['name']]) == 1){
                set_message('error', 'Already Exist');
            } else {
                $result = insertRow(tbl_manufacturers, $posts);
                if ($result)
                    set_message('success', 'Successfully Added');
                else
                    set_message('error', 'Can Not Save');
            }
            redirect('manufacturers');
        }
    }

    public function edit_manufacturers($id){
        $data['id'] = $id ;
        $data['title'] = 'Edit Manufacturers';
        $data['manufacture'] = getRecord(tbl_manufacturers, ['id' => $id]);
        /*update*/
        $post = $this->input->post();
        if ($post) {
            $result = updateRow(tbl_manufacturers, $post, ['id' => $id]);
            if ($result)
                set_message('success', 'Successfully Updated');
            else
                set_message('error', 'Can Not Updated');
        }
       accView('product-manufacturers', $data);
    }

    public function delete_manufacturers($id){
        if ($id) {
            $result = updateRow(tbl_manufacturers, ['activity' => 'Delete'], ['id' => $id]);
            if ($result)
                set_message('success', 'Successfully Deleted');
            else
                set_message('error', 'Can Not Updated');

            redirect('manufacturers');
        }
    }
    public function alive_manufacturers($id){
        if ($id) {
            $result = updateRow(tbl_manufacturers, ['activity' => 'Alive'], ['id' => $id]);
            if ($result)
                set_message('success', 'Successfully Alive');
            else
                set_message('error', 'Can Not Alive');

            redirect('manufacturers');
        }
    }

    /***********************************
        Brands Add, Delete, Edit, Update
    ************************************/
    public function brands() {
        $data['title'] = 'Brand Create';
        $data['brands'] = getRecords(tbl_brands, ['status' => 'Active','activity' => 'Alive']);
        $data['deleted_brands_list'] = getRecords(tbl_brands, ['status' => 'Active','activity' => 'Delete']);
        accView('product-brand', $data);
    }

    public function add_brands() {
        $data['title'] = 'Create Brand';
        $posts = $this->input->post();
        if($posts){
            if(isRowExist(tbl_brands,['name' => $posts['name']]) == 1){
                set_message('error', 'Already Exist');
            } else {
                $result = insertRow(tbl_brands, $posts);
                if ($result)
                    set_message('success', 'Successfully Added');
                else
                    set_message('error', 'Can Not Save');
            }
            redirect('brands');
        }
    }

    public function edit_brands($id){
        $data['id'] = $id ;
        $data['title'] = 'Edit Brand';
        $data['brand'] = getRecord(tbl_brands, ['id' => $id]);
        /*update*/
        $post = $this->input->post();
        if ($post) {
            $result = updateRow(tbl_brands, $post, ['id' => $id]);
            if ($result)
                set_message('success', 'Successfully Updated');
            else
                set_message('error', 'Can Not Updated');
        }
       accView('product-brand', $data);
    }

    public function delete_brands($id){
        if ($id) {
            $result = updateRow(tbl_brands, ['activity' => 'Delete'], ['id' => $id]);
            if ($result)
                set_message('success', 'Successfully Deleted');
            else
                set_message('error', 'Can Not Updated');

            redirect('brands');
        }
    }
    
    public function alive_brands($id){
        if ($id) {
            $result = updateRow(tbl_brands, ['activity' => 'Alive'], ['id' => $id]);
            if ($result)
                set_message('success', 'Successfully Alive');
            else
                set_message('error', 'Can Not Alive');

            redirect('brands');
        }
    }

    /***********************************
        Vendors Add, Delete, Edit, Update
    ************************************/
    public function vendors() {
        $data['title'] = 'Vendors Create';
        $data['vendors'] = getRecords(tbl_vendors, ['status' => 'Active','activity' => 'Alive']);
        $data['deleted_vendors_list'] = getRecords(tbl_vendors, ['status' => 'Active','activity' => 'Delete']);
        accView('product-vendor', $data);
    }

    public function add_vendors() {
        $data['title'] = 'Create Vendors';
        $posts = $this->input->post();
        if($posts){
            if(isRowExist(tbl_vendors,['name' => $posts['name']]) == 1){
                set_message('error', 'Already Exist');
            } else {
                $result = insertRow(tbl_vendors, $posts);
                if ($result)
                    set_message('success', 'Successfully Added');
                else
                    set_message('error', 'Can Not Save');
            }
            redirect('vendors');
        }
    }

    public function edit_vendors($id){
        $data['id'] = $id ;
        $data['title'] = 'Edit Vendors';
        $data['vendor'] = getRecord(tbl_vendors, ['id' => $id]);
        /*update*/
        $post = $this->input->post();
        if ($post) {
            $result = updateRow(tbl_vendors, $post, ['id' => $id]);
            if ($result)
                set_message('success', 'Successfully Updated');
            else
                set_message('error', 'Can Not Updated');
        }
       accView('product-vendor', $data);
    }

    public function delete_vendors($id){
        if ($id) {
            $result = updateRow(tbl_vendors, ['activity' => 'Delete'], ['id' => $id]);
            if ($result)
                set_message('success', 'Successfully Deleted');
            else
                set_message('error', 'Can Not Updated');

            redirect('vendors');
        }
    }
    
    public function alive_vendors($id){
        if ($id) {
            $result = updateRow(tbl_vendors, ['activity' => 'Alive'], ['id' => $id]);
            if ($result)
                set_message('success', 'Successfully Alive');
            else
                set_message('error', 'Can Not Alive');

            redirect('vendors');
        }
    }


}

?>