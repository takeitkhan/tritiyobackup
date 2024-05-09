<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * @property Profile_model $profile_model Profile Model
 * @property Common_model $common_model Common Model
 * @property admin_model $admin_model panel model
 * @property media_model $media_model panel model
 *
 */
class Product extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model(array("product_model", "term_model", "common_model", "profile_model", "admin_model", 'media_model'));
        $this->load->helper('term_helper');
    }

    public function add_new_product()
    {
        $this->_authenticate();
        $this->data['userid'] = $this->data['userInformation']->id;
        $this->data['title'] = "Add new product";
        $this->data['categories'] = $this->term_model->get_categories();
        $this->data['medias'] = $this->media_model->get_media();

        $this->load->view('layouts/header', $this->data);
        $this->load->view('product/add_new_product', $this->data);
        $this->load->view('media/media_list', $this->data);
        $this->load->view('layouts/footer', $this->data);
    }

    public function product_brand()
    {
        $this->_authenticate();
        if($this->uri->segment(2)){
            $this->data['exist_id'] = $this->uri->segment(2);
        }

        if($_POST){

            $brand = array(
                'brand_id' => null,
                'brand_name' => $this->input->post('brandname')
            );
            $this->common_model->insertRecords('product_brand',$brand);
        }

        $this->data['userid'] = $this->data['userInformation']->id;
        $this->data['title'] = "Product Brand";
        $this->data['brands'] =$this->common_model->getAllRecords('product_brand');
       // owndebugger($this->data['brands']);
        $this->load->view('layouts/header', $this->data);
        $this->load->view('product/product_brands', $this->data);
        $this->load->view('layouts/footer', $this->data);
    }

   /* public function add_new_sofa_product()
    {
        $this->_authenticate();
        $this->data['userid'] = $this->data['userInformation']->id;
        $this->data['title'] = "Add Exist sofa category product";
        $this->data['categories'] = $this->term_model->get_categories();
        $this->data['medias'] = $this->media_model->get_media();


        if (@$this->input->get('sku')) {
            $sofa_check = strtolower(substr($this->input->get('sku'), 0, 3));
            if (($sofa_check == 'ssc') or ($sofa_check == 'sdc') or ($sofa_check == 'stc') or ($sofa_check == 'scb') or ($sofa_check == 'sfc')) {
                $product_id = @$this->db->get_where('products', ['sku' => $this->input->get('sku')])->row()->id;
                if ($product_id) {
                    $this->data['product'] = $this->product_model->get_product_sofa($product_id);
                    if ($this->data['product']) {
                        $this->data['userid'] = $this->data['userInformation']->id;
                        $this->data['title'] = "Add product";
                        $this->data['categories'] = $this->term_model->get_categories();
                        $this->data['medias'] = $this->media_model->get_media();

                        $this->data['product']['images'] = $this->product_model->get_product_imgs($product_id);
                        $this->data['product']['categories'] = $this->product_model->get_product_categories($product_id);
                        $this->data['product'] = (object)$this->data['product'];
                    }
                }
            }
        };


        $this->load->view('layouts/header', $this->data);
        $this->load->view('product/add_sofa_product', $this->data);
        //$this->load->view('media/media_list', $this->data);
        $this->load->view('layouts/footer', $this->data);
    }

    public function edit_sofa_product($product_id = 0)
    {
        $this->_authenticate();
        $this->data['product'] = $this->product_model->get_product_sofa($product_id);
        if ($this->data['product']) {
            $this->data['userid'] = $this->data['userInformation']->id;
            $this->data['title'] = "Edit Sofa Product";
            $this->data['categories'] = $this->term_model->get_categories();
            $this->data['medias'] = $this->media_model->get_media();

            $this->data['product']['images'] = $this->product_model->get_product_imgs($product_id);
            $this->data['product']['categories'] = $this->product_model->get_product_categories($product_id);
            $this->data['product'] = (object)$this->data['product'];

            $this->load->view('layouts/header', $this->data);
            $this->load->view('product/edit_sofa_product', $this->data);
            $this->load->view('media/media_list', $this->data);
            $this->load->view('layouts/footer', $this->data);
        } else {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Warning!</strong> Your Product not found.</div>');
            redirect('productlist', 'refresh');
        }
    }*/

    public function edit_product($product_id = 0)
    {
        $this->_authenticate();
        $this->data['product'] = $this->product_model->get_product($product_id);
        if ($this->data['product']) {
            $this->data['userid'] = $this->data['userInformation']->id;
            $this->data['title'] = "Edit product";
            $this->data['categories'] = $this->term_model->get_categories();
            $this->data['medias'] = $this->media_model->get_media();

            $this->data['product']['images'] = $this->product_model->get_product_imgs($product_id);
            $this->data['product']['categories'] = $this->product_model->get_product_categories($product_id);
            $this->data['product'] = (object)$this->data['product'];

            $this->load->view('layouts/header', $this->data);
            $this->load->view('product/add_new_product', $this->data);
            $this->load->view('media/media_list', $this->data);
            $this->load->view('layouts/footer', $this->data);
        } else {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Warning!</strong> Your Product not found.</div>');
            redirect('productlist', 'refresh');
        }
    }

    public function save_product()
    {
        $this->_authenticate();
        $product = $this->input->post();
        $product_img_ids = empty($product['imgs']) ? array(1) : $product['imgs'];
        $product_category_ids = empty($product['category_id']) ? array(1) : $product['category_id'];

        $others = array(
            'description' => $product['product_description'],
            'product_image_id' => (empty($product_img_ids)) ? 1 : $product_img_ids[0]
        );
        $product = array_merge($product, $others);
        $product['userid'] = $this->data['userid'];

        unset($product['imgs']);
        unset($product['category_id']);
        unset($product['product_description']);
        unset($product['wysiwyg']);

        $product_id = $this->product_model->save($product, $product_category_ids, $product_img_ids);
        if (isset($product['id']) && $product['id'] == 'none') {
            $this->session->set_flashdata('msg', '<div class="alert alert-success"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Success!</strong> Your Product <b>' . $this->input->post('name') . '</b> updated.</div>');
        } else if ($product_id) {
            $this->session->set_flashdata('msg', '<div class="alert alert-success"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Success!</strong> Your Product <b>' . $this->input->post('name') . '</b> inserted.</div>');
        }

        header('Content-type:application/json');
        echo json_encode(['msg' => 'Product uploaded sucessfull', 'status' => 1]);
    }

    /*public function add_sofa_product()
    {
        $this->_authenticate();
        $product = $this->input->post();
        $product_img_ids = empty($product['imgs']) ? array(1) : $product['imgs'];
        $product_category_ids = empty($product['category_id']) ? array(1) : $product['category_id'];

        $others = array(
            'description' => $product['product_description'],
            'product_image_id' => (empty($product_img_ids)) ? 1 : $product_img_ids[0]
        );
        $product = array_merge($product, $others);
        $product['userid'] = $this->data['userid'];

        unset($product['imgs']);
        unset($product['category_id']);
        unset($product['product_description']);
        unset($product['wysiwyg']);

//        owndebugger($product);
//        die;


//        owndebugger($product);
//        owndebugger($product_category_ids);
//        owndebugger($product_img_ids);

        $product_id = $this->product_model->savesofa($product, $product_category_ids, $product_img_ids);
        if (isset($product['id']) && $product['id'] == 'none') {
            $this->session->set_flashdata('msg', '<div class="alert alert-success"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Success!</strong> Your Product <b>' . $this->input->post('name') . '</b> updated.</div>');
        } else if ($product_id) {
            $this->session->set_flashdata('msg', '<div class="alert alert-success"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Success!</strong> Your Product <b>' . $this->input->post('name') . '</b> inserted.</div>');
        }

        header('Content-type:application/json');
        echo json_encode(['msg' => 'Product uploaded sucessfull', 'status' => 1]);
    }
*/
    public function product_list()
    {
        $this->_authenticate();
        $this->data['userid'] = $this->data['userInformation']->id;
        $this->data['title'] = "Product List";

        $options = [
            'search_key' => $this->input->get('search_key'),
            'limit' => 20,
            'order_field' => 'id',
            'order_type' => 'desc'
        ];
        $this->data['products'] = $this->product_model->get_products_dashboard($options, TRUE);

        $this->load->view('layouts/header', $this->data);
        $this->load->view('product/product_list', $this->data);
        $this->load->view('layouts/footer', $this->data);
    }

    public function get_products()
    {
        $options = [
            'search_key' => $this->input->get('search_key'),
            'limit' => 20,
            'order_field' => 'id',
            'order_type' => 'desc',
            'page_no' => $this->input->get('page_no')
        ];
        $this->data['products'] = $this->product_model->get_products($options, TRUE);


        $this->data['products'] = $this->product_model->get_products($options, true);
        $this->data['products'] ['type'] = $this->input->get('type');

        if ($this->input->get('type') == 'html') {
            $this->data['products']['html'] = '';
            if (empty($this->data['products']['items'])) {
                $this->data['products']['html'] = '<tr><td colspan="7"><h2>No product found.</h2></td></tr>';
            } else {
                foreach ($this->data['products']['items'] as $product) {
                    $this->data['products']['html'] .= $this->load->view('product/product_loop', $product, true);
                }
            }
        }

        header('Application-type:application/json');
        echo jsonEncode($this->data['products']);
    }

    public function delete_product()
    {
        $this->data['status']['status'] = $this->product_model->delete($this->input->get('id'));
        $this->data['status']['msg'] = "Product delete sucessfull.";
        
        header('Application-type:application/json');
        echo jsonEncode($this->data['status']);
    }

    

    private function _authenticate()
    {
        if (!$this->ion_auth->logged_in()) {
            redirect('outlet', 'refresh');
        }
        $this->data['userInformation'] = $this->ion_auth->user()->row();
        $this->data['userid'] = $this->data['userInformation']->id;
    }

    /*
      public function basic_information_of_mine($id) {
      return $this->profile_model->getUsersInformation($id);
      }

      public function personal_information_of_mine($id) {
      return $this->profile_model->getPersonalInformation($id);
      }
     * 
     */
}

?>