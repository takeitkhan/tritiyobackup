<?php

$header = header('Access-Control-Allow-Origin: *');
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

/**
 * @property Frontend_model $frontend_model frontend Model
 * @property Profile_model $profile_model Directory Model
 * @property Settings_model $settings_model Settings Model
 * @property Panel_model $panel_model Panel Model
 * @property Payments_model $payments_model Payments Model
 * @property Common_model $common_model Payments Model
 * @property WpShortcodes $WpShortcodes WpShortcodes
 * @property Shortcodes $Shortcodes Short codes
 *
 */
class Frontend extends MX_Controller {

    protected $data = array();
    protected $themename;
    private $status = array("status" => 0, "msg" => NULL);
    private $where = array();
    private $id;
    private $results = array();

    public function __construct() {
        parent::__construct();
//        $this->output->enable_profiler(TRUE);
        $this->load->model(array("common_model", "showrooms_model", "order_model", "profile_model", "settings_model", "panel_model", "term_model", "product_model", "frontend_model", "institutes_model", "shortcodes/photogallery"));
        $this->load->library(array('ion_auth', 'form_validation', 'upload', 'initial', 'cart'));

        $this->data['settings'] = $this->get_settings();
        $this->data['blocks'] = $this->get_blocks();
        //owndebugger($this->data['blocks']);
        for ($i = 0; $i <= 35; $i++) {
            $this->data['block' . $i] = $this->search($this->data['blocks'], 'WidgetPosition', $i);
        }
        $this->data['pages'] = $this->get_webpages();
        // owndebugger($this->data['pages']);
        $this->data['mainmenu'] = $this->get_menu_directly_from_db();
        $this->data['cart']['items'] = $this->cart->contents();
        $this->data['cart']['total'] = array_sum(array_column($this->data['cart']['items'], 'subtotal'));

        $this->data['compare_products'] = (array) $this->session->userdata('compared_list');
    }

    /**
     * Sending Data to settings page
     */
    public function index() {
        $this->data['institute'] = $this->input->post('institute');
        
        //owndebugger($institute);
        
        if(isset($this->data['institute'])) {
            $this->db = $this->load->database($this->data['institute'], TRUE);
        } else {
            $this->db = $this->load->database('pakutiacollege', TRUE);
        }
        $this->load->model('useo_model');
        $this->data['rows'] = $this->useo_model->get_counts_useo($this->db);
        $this->data['settings'] = $this->useo_model->get_admin_info($this->db);
        
        $this->data['title'] = 'USEO';
        $this->data['SeoTitle'] = 'USEO';
        $this->data['MetaKeyword'] = 'web design company in bangladesh, web development company in bangladesh, android app development company in bangladesh';
        $this->data['MetaDescription'] = 'Tritiyo Limited, have the pleasure to express ourselves as an absolute software development company in Dhaka, Bangladesh that is specialized for IT Services';

        // $this->data = array();
        $this->load->view('header', $this->data);
        $this->load->view('index', $this->data);
        $this->load->view('footer', $this->data);
    }

    public function page() {
        $uri1 = $this->uri->segment(1);
        if (isset($uri1)) {
            $pageroute = $this->uri->segment(2);
            $single_page = $this->page_single($pageroute);

            if ($pageroute == 'pricing') {
                $this->data['pricings'] = $this->db->get_where('pricing', ['id!=' => 1])->result();
                $this->data['default_pricing'] = $this->db->get_where('pricing', ['id' => 1])->row();


                $this->data['title'] = (!empty($single_page->PageTitle) ? $single_page->PageTitle : '');
                $this->data['SeoTitle'] = (!empty($single_page->SeoTitle) ? $single_page->SeoTitle : '');
                $this->data['MetaKeyword'] = (!empty($single_page->MetaKeyword) ? $single_page->MetaKeyword : '');
                $this->data['MetaDescription'] = (!empty($single_page->MetaDescription) ? $single_page->MetaDescription : '');

                $this->load->view('header', $this->data);
                $this->load->view('pricing', $this->data);
                $this->load->view('footer', $this->data);
            } else {
                if ($single_page->isSpecial == 1) {
                    $str = $single_page->Description;
                    $this->data['special_single_page'] = $this->shortcodes->parse($str);
                } else {
                    $this->data['single_page'] = $single_page;
                }
                $this->data['title'] = (!empty($single_page->PageTitle) ? $single_page->PageTitle : '');
                $this->data['SeoTitle'] = (!empty($single_page->SeoTitle) ? $single_page->SeoTitle : '');
                $this->data['MetaKeyword'] = (!empty($single_page->MetaKeyword) ? $single_page->MetaKeyword : '');
                $this->data['MetaDescription'] = (!empty($single_page->MetaDescription) ? $single_page->MetaDescription : '');
                $this->load->view('header', $this->data);
                $this->load->view('page', $this->data);
                $this->load->view('footer', $this->data);
            }
        } else {
            redirect(base_url(), 'refresh');
        }
    }

    public function portfolio() {
        $this->data['title'] = 'Portfolio of Web design, Web Development, Digital Marketing, Android app development works';
        $this->data['SeoTitle'] = 'Portfolio of Web design, Web Development, Digital Marketing, Android app development works';
        $this->data['MetaKeyword'] = 'web design, web development, digital marketing, android app development, mobile app development';
        $this->data['MetaDescription'] = 'Portfolio of Web design, Web Development, Digital Marketing, Android app development works';
        
        $this->data['cats'] = $this->db->get_where('portfolio_category', ['status' => 1])->result();
        $this->data['techs'] = $this->db->get_where('portfolio_technology', ['status' => 1])->result();
        
        if ($this->input->post('submit')) {
            //owndebugger($this->input->post()); die();
            date_default_timezone_set('Asia/Dhaka');
            $months = $this->input->post('time_duration');
            switch ($months) {
                case 3:
                    $start = date('Y-m-d', strtotime('-3 months'));
                    $end = date('d m Y');
                    break;
                case 6:
                    $start = date('Y-m-d', strtotime('-6 months'));
                    $end = date('d m Y');
                    break;
                case 12:
                    $start = date('Y-m-d', strtotime('-12 months'));
                    $end = date('d m Y');
                    break;
                default:
                    $start = NULL;
                    $end = NULL;
                    break;
            }
            
            $this->data['options'] = array(
                'search_key' => !empty($this->input->post('search_key')) ? $this->input->post('search_key') : NULL,
                'start_date' => $start,
                'end_date' => $end,
                'category' => !empty($this->input->post('category')) ? $this->input->post('category') : NULL,
                'techs' => !empty($this->input->post('techs')) ? $this->input->post('techs') : NULL,
                'order_by_field' => !empty($this->input->post('order_by')) ? $this->input->post('order_by') : NULL,
                'order_by_type' => !empty($this->input->post('asde')) ? $this->input->post('asde') : NULL,
                'offset' => !empty($this->input->post('offset')) ? $this->input->post('offset') : NULL,
                'limit' => !empty($this->input->post('limit')) ? $this->input->post('limit') : NULL
            );
            
            //owndebugger($this->data['options']['techs']); die();
            $this->db->select('*')->from('portfolio');
            
            if (!empty($this->data['options']['search_key'])) {
                $this->db->group_start()
                    ->like('name', $this->data['options']['search_key'], 'both')
                    ->or_like('description', $this->data['options']['search_key'], 'both')
                    ->or_like('details', $this->data['options']['search_key'], 'both')
                    ->or_like('seo_keywords', $this->data['options']['search_key'], 'both')
                    ->group_end();
            }
            $cats = $this->data['options']['category'];
            $techs = $this->data['options']['techs'];
            
            if(!empty($cats)) {
                $this->db->where("FIND_IN_SET('$cats', `category`)");
            }
            if(!empty($techs)) {
                $this->db->where("FIND_IN_SET('$techs', `technology`)");
            }
            
            if (!empty($this->data['options']['start_date']) && !empty($this->data['options']['end_date'])) {
                $this->db->where('DATE(posted_date) BETWEEN "' . $this->data['options']['start_date'] . '" AND "' . $this->data['options']['end_date'] . '"', '', false);
            }
            $this->db->order_by($this->data['options']['order_by_field'], $this->data['options']['order_by_type']);
            $this->db->limit($this->data['options']['limit'], $this->data['options']['offset']);

            $this->data['portfolios'] = $this->db->get()->result_array(); //echo $this->db->last_query(); die(); //;
            
            $this->load->view('header', $this->data);
            $this->load->view('portfolio', $this->data);
            $this->load->view('footer', $this->data);
        } else {
            

            $this->data['portfolios'] = $this->db->select('*')
                    ->from('portfolio')
                    ->order_by('name', 'asc')
                    ->limit(15)
                    ->get()
                    ->result();
            $sql = "SELECT COUNT(*) AS `numrows` FROM `portfolio`";
            $this->data['count_all_portfolio'] = $this->db->query($sql)->row_object()->numrows;
            
            $this->load->view('header', $this->data);
            $this->load->view('portfolio', $this->data);
            $this->load->view('footer', $this->data);
        }
                
    }

    public function category_product($category_id = 0) {
        if ($category_id) {
            $pageroute = $this->uri->segment(2);
            $single_page = $this->page_single($pageroute);
            $this->data['cats'] = $this->db->get_where('portfolio_category', ['status' => 1])->result();
            $this->data['portfolios'] = $this->db->select('*')
                    ->from('portfolio')                    
                    ->like('category', "$category_id,")
                    ->order_by('name', 'asc')
                    ->get()
                    ->result();

            $sql = "SELECT COUNT(*) AS `numrows` FROM `portfolio`";
            $this->data['count_all_portfolio'] = $this->db->query($sql)->row_object()->numrows;
            //echo $this->db->last_query();
            // owndebugger($this->data['portfolios']);
            // die();
            $this->data['title'] = (!empty($single_page->PageTitle) ? $single_page->PageTitle : '');
            $this->data['SeoTitle'] = (!empty($single_page->SeoTitle) ? $single_page->SeoTitle : '');
            $this->data['MetaKeyword'] = (!empty($single_page->MetaKeyword) ? $single_page->MetaKeyword : '');
            $this->data['MetaDescription'] = (!empty($single_page->MetaDescription) ? $single_page->MetaDescription : '');

            $this->load->view('header', $this->data);
            $this->load->view('portfolio', $this->data);
            $this->load->view('footer', $this->data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }

    public function happy_client($id) {
        
        $this->data['project'] = $this->db->select('*')->from('portfolio')->where('id', $id)->get()->row();

        $this->data['title'] = $this->data['project']->name;
        $this->data['SeoTitle'] = $this->data['project']->name;
        $this->data['MetaKeyword'] = $this->data['project']->seo_keywords;
        $this->data['MetaDescription'] = $this->data['project']->description;
        $this->data['img'] = base_url('uploads/portfolio/' . $this->data['project']->thumbnail);
                
        
        $technologies = explode(',', $this->data['project']->technology);
        foreach ($technologies as $tid) {
            $this->data['techs'][] = $this->db->select('*')->from('portfolio_technology')->where('id', $tid)->get()->row();
        }
        
        $this->load->view('header', $this->data);
        $this->load->view('happy_client', $this->data);
        $this->load->view('footer', $this->data);
    }

    public function send_client_requirment_mail() {
        $total = '';
        $item_total = '';
        $sender_message = '';
        $items = '';
        $this->data['settings'] = $this->get_settings();
        $to = "info@tritiyo.com";
        $this->email->bcc();


        $sender_name = $this->input->post('client_name');
        $sender_phone = $this->input->post('client_phone');
        $sender_email = $this->input->post('client_email');

        $pricing_elements = $this->input->post('pricing_element');
        $starting_element = $this->input->post('starting_element');
        if (!empty($starting_element)) {
            $feature = explode('_', $starting_element);
            $starting_name = $feature[0];
            $starting_price = $feature[1];
        }

        if (!empty($pricing_elements)) {
            foreach ($pricing_elements as $item) {
                $itemval = explode('_', $item);
                $items .= "<tr><td style='border: 1px solid black;'>$itemval[0]</td><td style='border: 1px solid black;' align='right'>&#2547;$itemval[1]</td></tr>";
                $total += $itemval[1];
            }
        }

        if (!empty($total)) {
            $item_total .= "<tr><td style='border: 1px solid black;'><b>Total</b></td><td style='border: 1px solid black;' align='right'><b>&#2547;$total</b></td></tr>";
        }

        $sender_message .= "<table style='border: 1px solid black; border-collapse: collapse;' class='table table-bordered'>
                              <thead>
                                <tr>
                                  <td style='border: 1px solid black;'><b>Feature Name</b></td>
                                  <td style='border: 1px solid black;' align='right'><b>Feature Price</b></td>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td style='border: 1px solid black;'>$starting_name</td>
                                  <td style='border: 1px solid black;' align='right'>&#2547;$starting_price</td>
                                </tr>
                                " . $items . $item_total . "
                                </tbody> 
                                </table>";

        $subject = 'Message from ' . (!empty($sender_name) ? $sender_name : ' web form');
        $headers = "From: Tritiyo Limited\r\n";
        $headers .= "Reply-To: " . strip_tags($sender_email) . "\r\n";
        //$headers .= "CC: ". ADMINEMAIL."\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
        $message = '<html><body>';
        $message .= et_header(COMPANYNAME);
        $content = '<b> ' . (!empty($sender_name) ? $sender_name : $sender_email) . '</b>, contacted through the <span style="">' . COMPANYNAME . ' web form.</span><br/><br/>';
        $message .= et_row($sender_message);
        $con = 'Client Name: ' . (!empty($sender_name) ? $sender_name : '');
        $message .= et_row($con);
        $con1 = 'Phone number: ' . (!empty($sender_phone) ? $sender_phone : '');
        $message .= et_row($con1);
        $con2 = 'Email Address: ' . (!empty($sender_email) ? $sender_email : '');
        $message .= et_row($con2);
        $message .= et_footer(COMPANYNAME, '+8801821660066');
        //$message .= et_footer('Phone: +8801821660066');
        $message .= "</body></html>";
        $list = array('tritiyolimited@gmail.com');
        if (!empty($sender_name)) {
            $this->load->library('email');
            $this->email->from('noreply@tritiyo.com', 'Tritiyo Limited');
            $this->email->to($to);
            $this->email->bcc($list);
            $this->email->subject($subject);
            $this->email->message($message);
            if (!$this->email->send()) {
                $price_message = '<div class="alert alert-danger" role="alert">
                                      <strong>Oh snap!</strong> Change a few things up and try submitting again.
                                  </div>';
            } else {
                $price_message = '<div class="alert alert-success" role="alert">
                                      <strong>Well done!</strong> Mail sent successfully.
                                  </div>';
            }
        } else {
            $price_message = '<div class="alert alert-danger" role="alert">
                                  <strong>Oh snap!</strong> Change a few things up and try submitting again.
                             </div>';
        }

        $this->session->set_flashdata('message', $price_message);
        redirect(base_url() . 'page/pricing');
    }

    public function single_page() {
        $uri1 = $this->uri->segment(1);
        if (isset($uri1)) {
            $pageroute = $this->uri->segment(2);
            $this->data['single_post'] = $this->post_single($pageroute);
//owndebugger($this->data['single_post']);
            $this->data['title'] = (!empty($single_page->Title) ? $single_page->Title : '');
            $this->data['SeoTitle'] = (!empty($single_page->SeoTitle) ? $single_page->SeoTitle : '');
            $this->data['MetaKeyword'] = (!empty($single_page->MetaKeyword) ? $single_page->MetaKeyword : '');
            $this->data['MetaDescription'] = (!empty($single_page->MetaDescription) ? $single_page->MetaDescription : '');
            $this->load->view('header', $this->data);
            $this->load->view('single', $this->data);
            $this->load->view('footer', $this->data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }

    public function products_html() {
        $options = array(
            'limit' => 12,
            'max_price' => (int) $this->input->get('max_price'),
            'min_price' => (int) $this->input->get('min_price'),
            'categorization' => (int) $this->input->get('categorization'),
            'search_key' => $this->input->get('search_key'),
            'cat_id' => (int) $this->input->get('cat_id'),
            'page_no' => (int) $this->input->get('page_no'),
            'order_field' => $this->input->get('order_field'),
            'order_type' => $this->input->get('order_type')
        );


        $this->data['products'] = $this->product_model->get_products($options, true);
        $this->data['products']['term'] = $this->term_model->get_category($options['cat_id']);


        $json = (object) array(
                    'term' => $this->data['products']['term'],
                    'product_list_html' => $this->load->view('shop/product_list_html', $this->data, true),
                    'product_pagination_html' => $this->load->view('shop/product_pagination_html', $this->data, true)
        );

        header('Content-type:application/json');
        echo json_encode($json);
    }

    public function search_product() {

        $options = array(
            'limit' => 12,
            'max_price' => (int) $this->input->get('max_price'),
            'min_price' => (int) $this->input->get('min_price'),
            'search_key' => $this->input->get('search_key'),
            'page_no' => (int) $this->input->get('page_no'),
            'order_field' => $this->input->get('order_field'),
            'order_type' => $this->input->get('order_type')
        );
        $cat_id = $this->input->get('cat_id');
        if (($cat_id)) {
            $options['cat_id'] = $this->input->get('cat_id');
        }

        $this->data['products'] = $this->product_model->get_products($options, true);

//        if (empty($this->data['products']['items'])) {
//            $this->data['may_like_products'] = $this->product_model->get_products(array('limit' => 12));
//        }
        $this->data['breadcrumb'] = array(
            array('url' => 'search?search_key=' . urldecode($options['search_key']), 'title' => 'Search')
        );

        $this->load->view('common/header', $this->data);
        $this->load->view('shop/product_list', $this->data);
        $this->load->view('common/footer', $this->data);
    }

    public function get_sub_category() {
        $cat_id = $this->input->post('parent_id');

        //echo $cat_id;
        $sub_categories = $this->term_model->get_selected_sub_category($cat_id);
        //owndebugger($sub_category);

        foreach ($sub_categories as $sub_category) {
            $name = explode(' ', $sub_category->name);
            $name = implode('-', $name);
            //echo '<option value="">Select Sub Category</option>';
            echo '<option value="' . $sub_category->id . '-' . strtolower($name) . '">' . $sub_category->name . '</option>';
        }
    }

    public function advance_search_product($category_id = 0) {

        $this->data['categories'] = $this->term_model->get_parent_category();
        if ($this->input->get('cat_id')) {
            $this->data['sub_categories'] = $this->term_model->get_selected_sub_category($this->input->get('cat_id'));
        } else {
            $this->data['sub_categories'] = $this->term_model->get_selected_sub_category(51);
        }

        // owndebugger($this->data['sub_categories']);
        if ($this->uri->segment(2)) {
            $category_id = $this->uri->segment(2);
            $category_id = strstr($category_id, '-', true);
        } else {
            $category_id = 51;
        }


        if ($category_id) {
            $category_id = (int) $category_id;
            $this->data['term'] = $this->term_model->get_category($category_id);

            $of = $this->input->get('order_field');
            $op = $this->input->get('order_type');
            $field = empty($of) ? ' price ' : $of;
            $shorttype = empty($op) ? ' ASC ' : $op;
            $options = array(
                'limit' => 12,
                'max_price' => (int) $this->input->get('max_price'),
                'min_price' => (int) $this->input->get('min_price'),
                'search_key' => $this->input->get('search_key'),
                'categorization' => (int) $this->input->get('categorization'),
                'cat_id' => $category_id,
                'page_no' => (int) $this->input->get('page_no'),
                'order_field' => $field,
                'order_type' => $shorttype
            );

            $this->data['products'] = $this->product_model->get_products($options, true);
        }


        $this->load->view('common/header', $this->data);
        $this->load->view('shop/advance_search_product_list', $this->data);
        $this->load->view('common/footer', $this->data);
    }

    public function single_product($product_id = 0) {

        $this->data['product'] = $this->product_model->get_product_frontend($product_id);
        //owndebugger($this->data['product']); die();
        if ($this->data['product']) {
            $this->data['product']['images'] = $this->product_model->get_product_imgs($this->data['product']['id']);
            $this->data['product']['categories'] = $this->product_model->get_product_categories($this->data['product']['id']);

            $semilar_categories = array_column($this->data['product']['categories'], 'id');

            $this->data['similar_products'] = $this->product_model->get_products(['limit' => 30, 'cat_id' => array_slice($semilar_categories, 1)]);

            if (!(count($this->data['similar_products']) > 6)) {
                $more = $this->product_model->get_products(['limit' => 30, 'cat_id' => $semilar_categories]);
                shuffle($more);
                $this->data['similar_products'] += $more;
            } else
                shuffle($this->data['similar_products']);


            $this->data['similar_products'] = array_slice($this->data['similar_products'], 0, 8);

            //Remove current product from semilar product list. Lazy way. 
            /* array_walk( $this->data['similar_products'], function($values,$key){
              $is_same = $this->data['product']['id'] == $values['id'];
              if($is_same)
              unset($this->data['similar_products'][$key]);

              }); */

            $this->data['title'] = (!empty($this->data['product']['name']) ? $this->data['product']['name'] : '');

            $this->load->view('common/header', $this->data);
            $this->load->view('shop/single_product', $this->data);
            $this->load->view('common/footer', $this->data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }

    public function add_to_cart() {

        $product = $this->product_model->get_product($this->input->get('id'));
        if ($product) {

            if ($product['discount'] > 0) {
                $data = array(
                    'id' => $product['id'],
                    'qty' => ($this->input->get('qty') ? abs($this->input->get('qty')) : 1),
                    'price' => $product['price'] - (($product['price'] * $product['discount']) / 100), //current price
                    'regular_price' => $product['price'], //regular price
                    'delivery_charge' => $product['delivery_charge'],
                    'name' => $product['name'],
                    'code' => $product['code'],
                    'img' => $product['product_image'],
                    'discount' => $product['discount'],
                    'sku' => $product['sku'],
                    'cart_time' => time()
                );

                // owndebugger($data);
            } else {
                $data = array(
                    'id' => $product['id'],
                    'qty' => ($this->input->get('qty') ? abs($this->input->get('qty')) : 1),
                    'price' => $product['price'], //current price
                    'regular_price' => $product['price'], //regular price
                    'delivery_charge' => $product['delivery_charge'],
                    'name' => $product['name'],
                    'code' => $product['code'],
                    'img' => $product['product_image'],
                    'discount' => $product['discount'],
                    'sku' => $product['sku'],
                    'cart_time' => time()
                );
            }

            //owndebugger($data);
            $this->cart->insert($data);
            $this->status['status'] = 1;
            $this->status['msg'] = 'Successfully added to cart.';
        } else {
            $this->status['status'] = 0;
            $this->status['msg'] = 'Faild to add. Relaoad and try again';
        }
        /* New card content */
        $this->status['cart'] = array_values((array) $this->cart->contents());

        header('Content-type:Application/json');
        echo jsonEncode($this->status);
        //redirect('product/' . $product['id'] . '-' . url_title($product['name'], '-', TRUE));
    }

    public function remove_from_cart() {
        $product_id = $this->input->get('id');

        $row_no = array_search($product_id, array_column(array_values($this->cart->contents()), 'id'));

        $data = array(
            'rowid' => array_keys($this->cart->contents())[$row_no],
            'qty' => 0
        );

        $this->cart->update($data);

        $this->status['status'] = 1;
        $this->status['msg'] = 'Successfully removed from cart.';

        /* New card content */
        $this->status['cart'] = array_values((array) $this->cart->contents());

        header('Content-type:Application/json');
        echo jsonEncode($this->status);
    }

    public function remove_from_compare() {


        $compared_list = (array) $this->session->userdata('compared_list');

        //* Easy Way

        $compared_list = (array) $this->session->userdata('compared_list');
        $compared_list = array_diff($compared_list, [$this->input->get('id')]);
        $this->session->set_userdata('compared_list', $compared_list);

        /* / Complex way
          $compared_list = (array) $this->session->userdata('compared_list');

          $compared_list = array_flip($compared_list);
          unset($compared_list[$this->input->get('id')]);
          $compared_list = array_flip($compared_list);
          $this->session->set_userdata('compared_list', $compared_list);
          // */

        $this->session->set_userdata('compared_list', $compared_list);

        $this->status['status'] = 1;
        $this->status['msg'] = 'Successfully removed from compare list.';

        header('Content-type:Application/json');
        echo jsonEncode($this->status);
    }

    public function view_cart() {
        $cart = $this->data['cart'];
        //owndebugger($cart);
        foreach ($cart['items'] as $item) {
            $current_product_info = $this->db->get_where('products', array('id =' => $item["id"]))->row();

            if ($item['discount'] !== $current_product_info->discount) {
                $new_discount_price = $item['regular_price'] - ($item['regular_price'] * $current_product_info->discount) / 100;
                $rowid = $item['rowid'];
                $qty = $item['qty'];
                $price = $new_discount_price;
                $discount = $current_product_info->discount;
                $this->data['discount_message'] = '<div class="alert alert-danger fade in alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>Your cart has changed with discount.</div>';
            } else {
                $rowid = $item['rowid'];
                $qty = $item['qty'];
                $price = $item['price'];
                $discount = $item['discount'];
                $this->data['discount_message'] = "";
            }

            $newarray[] = [
                'rowid' => $rowid,
                'qty' => $qty,
                'price' => $price,
                'discount' => $discount,
            ];
        }
        // owndebugger($newarray);
        $this->cart->update($newarray);
        // owndebugger($this->data['cart']); die();


        $this->data['items'] = array_values((array) $this->cart->contents());

//        owndebugger( $this->status['cart']);
//        die;
        $this->data['title'] = 'Order List';
        $this->load->view('common/header', $this->data);
        $this->load->view('shop/cart', $this->data);
        $this->load->view('common/footer', $this->data);
    }

//    public function view_cart() {
//        $this->data['title'] = 'Order List';
//        $this->load->view('common/header', $this->data);
//        $this->load->view('shop/cart', $this->data);
//        $this->load->view('common/footer', $this->data);
//    }

    public function checkout($step = 0) {
//        if(empty($this->cart->contents()))
//            redirect();

        if ($step == 2) {
            $this->_checkout_step_2();
        } else if ($step == 3) {
            $this->_checkout_step_3();
        } else if ($step == 4) {
            $this->_checkout_step_4();
        } else if ($this->ion_auth->logged_in()) {
            $this->_checkout_step_2();
        } else {
            $this->_checkout_step_1();
        }
    }

    private function _checkout_step_1() {
        $this->data['breadcrumb'] = array(
            array('url' => 'checkout', 'title' => 'Authentication')
        );

        $this->load->view('common/header', $this->data);
        $this->load->view('shop/signup', $this->data);
        $this->load->view('common/footer', $this->data);
    }

    private function _checkout_step_2() {
        if ($this->session->userdata('shiping_info')) {
            $this->data['cart']['shiping_info'] = $this->session->userdata('shiping_info');
        } else if ($this->ion_auth->logged_in()) {
            $this->data['userInformation'] = $this->ion_auth->user()->row();
            //owndebugger($this->data['userInformation']);die();
            $this->data['userid'] = $this->data['userInformation']->id;
            $this->data['cart']['shiping_info'] = array(
                'full_name' => $this->data['userInformation']->full_name_en, // . ' ' . $this->data['userInformation']->last_name,
                'mobile_number' => $this->data['userInformation']->phone,
                'email' => $this->data['userInformation']->email,
                'shiping_address' => $this->data['userInformation']->address,
                'additional_information' => ''
            );
        } else {
            $this->data['cart']['shiping_info'] = array(
                'full_name' => '',
                'mobile_number' => '',
                'alternative_mobile' => '',
                'email' => '',
                'shiping_address' => '',
                'additional_information' => ''
            );
        }
        $this->data['breadcrumb'] = array(
            array('url' => 'cart', 'title' => 'Order List'),
            array('url' => 'checkout/2', 'title' => 'Delivery Address')
        );

        $this->load->view('common/header', $this->data);
        $this->load->view('shop/checkout/step2', $this->data);
        $this->load->view('common/footer', $this->data);
    }

    private function _checkout_step_3() {
        $this->data['payment_info'] = $this->session->userdata('payment_info');
        $this->data['shiping_info'] = $this->session->userdata('shiping_info');
        $this->data['breadcrumb'] = array(
            array('url' => 'cart', 'title' => 'Order List '),
            array('url' => 'checkout/3', 'title' => 'Payment Method')
        );

        $this->load->view('common/header', $this->data);
        $this->load->view('shop/checkout/step3', $this->data);
        $this->load->view('common/footer', $this->data);
    }

    private function _checkout_step_4() {


        if ($this->ion_auth->logged_in()) {
            $this->data['userInformation'] = $this->ion_auth->user()->row();
        }
        $this->data['payment_info'] = $this->session->userdata('payment_info');
        $this->data['shiping_info'] = $this->session->userdata('shiping_info');




        //owndebugger($this->data['shiping_info']); die();

        $order_status = $this->_order_validity();
        //owndebugger($order_status);


        if ($order_status['flag'] == false) {
            redirect($order_status['redirect'], 'refresh');
        }

        $this->data['breadcrumb'] = array(
            array('url' => 'cart', 'title' => 'Order List'),
            array('url' => 'checkout/4', 'title' => 'Order Confirmation')
        );


        $this->load->view('common/header', $this->data);
        $this->load->view('shop/checkout/step4', $this->data);
        $this->load->view('common/footer', $this->data);
    }

    public function update_shiping_address() {
        $this->load->library('form_validation');

        $shiping_info = array(
            'full_name' => $this->input->post('full_name'),
            'mobile_number' => $this->input->post('mobile_number'),
            'alternative_mobile' => $this->input->post('alternative_mobile'),
            'email' => $this->input->post('email'),
            'shiping_address' => $this->input->post('shiping_address'),
            'additional_information' => $this->input->post('additional_information')
        );

        $this->session->set_userdata('shiping_info', $shiping_info);

        $this->form_validation->set_rules('full_name', 'Full Name', 'required');
        $this->form_validation->set_rules('mobile_number', 'Mobile Number', 'required');
        $this->form_validation->set_rules('alternative_mobile', 'Alternative Mobile Number', 'required');
        $this->form_validation->set_rules('shiping_address', 'Email', 'required');


        if ($this->form_validation->run()) {
            redirect('checkout/3', 'refresh');
        } else {
            redirect('checkout/2', 'refresh');
        }
    }

    public function update_payment_info() {
        $this->load->library('form_validation');
        $active_payment_method = array(
            '1' => 'Cash on delivery',
            '2' => 'Bkash',
            '3' => 'Debit or Credit Card',
            '4' => 'Mobile Banking'
        );
        /* Collecting Data from user form */
        $payment = array(
            'payment_method' => $this->input->post('payment_method'),
            'card_type' => $this->input->post('card_type'),
            'payment_parameter' => $this->input->post('payment_parameter'),
            'payment_term' => $this->input->post('payment_term')
        );
        $payment_info = array(
            'payment_method' => $payment['payment_method'],
            'payment_method_name' => $active_payment_method[$payment['payment_method']],
            'card_type' => $payment['card_type'],
            'payment_parameter' => $payment['payment_parameter'],
            'payment_term' => $payment['payment_term']
        );
        $this->session->set_userdata('payment_info', $payment_info);
        $sessdata = $this->session->userdata('payment_info');
        $shiping_info = $this->session->userdata('shiping_info');

        $this->form_validation->set_rules('payment_method', 'Payment Method', 'required');
        $this->form_validation->set_rules('payment_term', 'Terms & Conditions', 'required');


        $m = array(
            'delivery_details' => $shiping_info,
            'items_details' => $this->data['cart']['items'],
            'payment_details' => $sessdata
        );
        $records = array(
            'tmp_id' => null,
            'user_id' => !empty($this->ion_auth->user()->row()->id) ? $this->ion_auth->user()->row()->id : null,
            'prepare_params' => jsonEncode($m),
            'success_params' => null
        );
        $this->order_model->place_order_params($records);


        //my Test
        if ($this->input->post('payment_method') == 1) {
            $payment_method = 1;
            $this->confirm_order($payment_method);
        }

        if ($this->form_validation->run()) {
            redirect('checkout/4', 'refresh');
        } else {
            redirect('checkout/3', 'refresh');
        }
    }

    function cashsubmitorder() {
        if ($this->ion_auth->logged_in()) {
            $this->data['userInformation'] = $this->ion_auth->user()->row();
            $this->data['userid'] = $this->data['userInformation']->id;
        }


        if (!($this->cart->contents())) {
            //redirect(base_url());
        }

        $this->data['track_msg'] = 'Your order has been submitted. Our concern person will contact with you soon';
        $double_check = 'REG' . __random();
        $track = $double_check;
        $double_check = $double_check;
        $secret_key = md5(uniqid(rand(), TRUE));
        $this->data['track_id'] = $track;
        $shiping_info = $this->session->userdata('shiping_info');
        $trackcode = $this->session->userdata('track_id');
        $payment_info = $this->session->userdata('payment_info');
        $cart = $this->data['cart'];

        $order_master = array(
            'customer_name' => $shiping_info['full_name'],
            'contuct_number' => $shiping_info['mobile_number'],
            'alternative_mobile' => $shiping_info['alternative_mobile'],
            'email_address' => $shiping_info['email'],
            'shiping_address' => $shiping_info['shiping_address'],
            'payment_method_name' => (!empty($payment_info['payment_method_name']) ? $payment_info['payment_method_name'] : 'None Selected'),
            'payment_term_status' => 'checked',
            'order_status' => 'order_placed',
            'user_id' => isset($this->data['userid']) ? $this->data['userid'] : 0
        );




        $this->data['status'] = 2;
        $this->data['track_msg'] = 'Payment is not done Yet';
        $double_check = 'REG' . __random();
        $track = $double_check;
        $secret_key = md5(uniqid(rand(), TRUE));
        $this->data['track_id'] = $track;
        $status_with = array(
            'payment_parameter' => $track,
            'param' => json_encode(array('status' => 2, 'epw' => ''))
        );

        $order_master1 = array_merge($order_master, $status_with);
        list($trackcode, $secret_key) = $this->order_model->place_order($order_master1, $this->data['cart']['items']);




        $orderID = array(
            'order_id' => $trackcode,
        );

        $this->_register_user($shiping_info['full_name'], $shiping_info['mobile_number'], $shiping_info['email']);

        $this->data['new_order_id'] = $this->db->insert_id();
        $this->data['new_track_id'] = $trackcode;
        $this->data['track_key'] = $secret_key;



        $contuct_number = $shiping_info['mobile_number'];
        $alternative_mobile = $shiping_info['alternative_mobile'];

        //$customer_message = "Order has been placed successfully on Regal Furniture\nOrder No: " . $trackcode . "\nHotline: 09613737777";
        $customer_message = "Order has been placed successfully on Regal Furniture\nOrder No: " . $trackcode;
        sendSms($customer_message, $contuct_number);
        sendSms($customer_message, $alternative_mobile);

        $message = "New Order has been placed successfully on Regal Furniture\nOrder No: " . $trackcode;

        //Mobile MSG admin
        sendSms($message, '01680139540'); //samrat-01680139540
        sendSms($message, '01992659228'); //Shuvo-01992659228
        sendSms($message, '01924602020'); //Habib-01924602020


        $this->cart->destroy();
        $this->_session_destroyer();

        $this->load->view('common/header', $this->data);
        $this->load->view('shop/checkout/cash_thank_you', $this->data);
        $this->load->view('common/footer', $this->data);
    }

    function submitOrder() {

        /* Checking User is already loged in */
        if ($this->ion_auth->logged_in()) {
            $this->data['userInformation'] = $this->ion_auth->user()->row();
            $this->data['userid'] = $this->data['userInformation']->id;
        }

        $this->data['track_msg'] = 'Payment Has Been Successful. We will contact you shortly.';
        $double_check = 'REG' . __random();
        $track = $double_check;
        $double_check = $double_check;
        $secret_key = md5(uniqid(rand(), TRUE));
        $this->data['track_id'] = $track;

        /*
         * @store Cart Data in database
         * @return order Master ID
         * @save order as pending
         */

        $shiping_info = $this->session->userdata('shiping_info');
        $trackcode = $this->session->userdata('track_id');
        $payment_info = $this->session->userdata('payment_info');
        $cart = $this->data['cart'];

        $order_master = array(
            'customer_name' => $shiping_info['full_name'],
            'contuct_number' => $shiping_info['mobile_number'],
            'alternative_mobile' => $shiping_info['alternative_mobile'],
            'email_address' => $shiping_info['email'],
            'shiping_address' => $shiping_info['shiping_address'],
            'payment_method_name' => (!empty($payment_info['payment_method_name']) ? $payment_info['payment_method_name'] : 'None Selected'),
            'payment_term_status' => 'checked',
            'order_status' => 'order_placed',
            //ALTER TABLE `ecommerce_order_master` ADD COLUMN `track_id` VARCHAR(255) NOT NULL AFTER `secret_key`;
            'user_id' => isset($this->data['userid']) ? $this->data['userid'] : 0
        );


        $this->data['status'] = 2;
        $this->data['track_msg'] = 'Payment is not done Yet';
        $double_check = 'REG' . __random();
        $track = $double_check;
        //$double_check = $double_check;
        $secret_key = md5(uniqid(rand(), TRUE));

        $this->data['track_id'] = $track;
        $status_with = array(
            'payment_parameter' => $track,
            'param' => jsonEncode(array('status' => 2, 'epw' => ''))
        );
        $order_master1 = array_merge($order_master, $status_with);
        //owndebugger($this->data['cart']['items']); die();
        list($trackcode, $secret_key) = $this->order_model->place_order($order_master1, $this->data['cart']['items']);
        /* $trackcode_test = $this->order_model->place_order($order_master1, $this->data['cart']['items']);
          owndebugger($trackcode_test);
          die(); */



        $orderID = array(
            'order_id' => $trackcode,
        );
        $this->session->set_userdata('orderId', $orderID);
        //owndebugger($this->session->userdata()); die();
        /*
         * @pass order value to payment gateway
         * @receive payment status
         * @update order master payment status
         */
        $this->_register_user($shiping_info['full_name'], $shiping_info['mobile_number'], $shiping_info['email']);
        $this->_payment($cart, $shiping_info, $trackcode);

        //redirect("view_invoicer/redirect_to?track_id={$track}&status={$this->data['status']}&message={$this->data['track_msg']}");
    }

    public function _payment($cart, $shiping, $trackcode) {

        $cur_random_value = $this->rand_string(18);
        $url = 'https://securepay.sslcommerz.com/gwprocess/v3/api.php';
        //$url = 'https://sandbox.sslcommerz.com/gwprocess/v3/api.php';

        $fields = array(
            //test sandbox
//            'store_id' => 'test_regalfurniturebd001',
//            'store_passwd'=> 'test_regalfurniturebd001@ssl',
            //live sand box
            'store_id' => 'regalfurniturebdlive',
            'store_passwd' => 'regalfurniturebdlive60822',
            'total_amount' => $cart['total'],
//            'payment_type' => 'VISA',
            'currency' => 'BDT',
            'tran_id' => $cur_random_value,
            'cus_name' => $shiping['full_name'],
            'cus_email' => $shiping['email'] != '' ? $shiping['email'] : 'customer@regalfurniturebd.com',
            'cus_add1' => $shiping['shiping_address'],
            'cus_city' => 'Dhaka',
            'cus_state' => 'Dhaka',
            'cus_postcode' => '1212',
            'cus_country' => 'Bangladesh',
            'cus_phone' => $shiping['mobile_number'],
            'cus_fax' => 'Not-Applicable',
            'ship_name' => $shiping['full_name'],
            'ship_add1' => $shiping['shiping_address'],
            'ship_city' => 'Dhaka',
            'ship_state' => 'Dhaka',
            'ship_postcode' => '1212',
            'ship_country' => 'Bangladesh',
            'desc' => 'Furniture',
            'success_url' => base_url('frontend/payment_return_url?order_id=success_' . $trackcode),
            'fail_url' => base_url('frontend/payment_return_url?order_id=failed_' . $trackcode),
            'cancel_url' => base_url('frontend/payment_return_url?order_id=cancel_' . $trackcode),
                //'signature_key' => 'f90dc4636073bf6f441ab64924e8412a'
        );

        $fields_string = '';
        foreach ($fields as $key => $value) {
            $fields_string .= $key . '=' . $value . '&';
        }
        $fields_string = rtrim($fields_string, '&');

        //owndebugger($fields_string); die();
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, count($fields));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

        $content = curl_exec($ch);

        $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if ($code == 200 && !( curl_errno($ch))) {
            curl_close($ch);
            $sslcommerzResponse = $content;
        } else {
            curl_close($ch);
            echo "FAILED TO CONNECT WITH SSLCOMMERZ API";
            exit;
        }

        # PARSE THE JSON RESPONSE
        $sslcz = json_decode($sslcommerzResponse, true);
        //owndebugger($sslcz); die();
        $this->redirect_to_merchant($sslcz['GatewayPageURL']);
        //echo $sslcz['GatewayPageURL'];
    }

    function redirect_to_merchant($url) {
        redirect($url);
    }

    function payment_return_url() {

        $response = $this->input->get('order_id');
        $response = explode('_', $response);
        $status = $response[0];
        $orderId = $response[1];
        //owndebugger($response); die();
        // $msg = $this->input->post(); //$_POST; // $this->input->post();
        if ($status == 'success') {
            $data['param'] = jsonEncode(array('status' => 1, 'epw' => $msg));
            //update
            $this->db->where('id', $orderId);
            $this->db->update('ecommerce_order_master', $data);
            $this->data['track_msg'] = 'Payment Has Been Successful. We will contact you shortly.';
            $this->data['status'] = 1;
            //Mobile MSG Operation
            $result = $this->db->get_where('ecommerce_order_master', array(
                        'id' => $orderId
                    ))->row();



            //$customer_message = "Order has been placed successfully on Regal Furniture\nOrder No: " . $result->id . "\nHotline: 09613737777";
            $customer_message = "Order has been placed successfully on Regal Furniture\nOrder No: " . $result->id;
            sendSms($customer_message, $result->contuct_number);
            sendSms($customer_message, $result->alternative_mobile);

            //Mobile MSG admin
            $message = "New Order has been placed successfully on Regal Furniture\nOrder No: " . $result->id;
            sendSms($message, '01680139540'); //samrat-01680139540
            sendSms($message, '01992659228'); //Shuvo-01992659228
            sendSms($message, '01924602020'); //Habib-01924602020

            $track = $this->db->get_where('ecommerce_order_master', array(
                        'id' => $orderId
                    ))->row()->payment_parameter;
            redirect("view_invoicer/redirect_to?track_id={$track}&status={$this->data['status']}&message={$this->data['track_msg']}");
        } else {
            $data['param'] = jsonEncode(array('status' => 2, 'epw' => $msg));
            //update
            $this->db->where('id', $orderId);
            $this->db->update('ecommerce_order_master', $data);
            $this->data['track_msg'] = 'Payment Has Been Failed. But, your data has been saved to our database. We will contact you soon.';
            $this->data['status'] = 2;

            $track = $this->db->get_where('ecommerce_order_master', array(
                        'id' => $orderId
                    ))->row()->payment_parameter;
            redirect("view_invoicer/redirect_to?track_id={$track}&status={$this->data['status']}&message={$this->data['track_msg']}");
        }

        //$track = $this->db->get_where('ecommerce_order_master', array(
        //           'id' => $orderId
        //       ))->row()->payment_parameter;
        //redirect("view_invoicer/redirect_to?track_id={$track}&status={$this->data['status']}&message={$this->data['track_msg']}");
    }

//     public function _payment($cart, $shiping, $trackcode) {
//         $cur_random_value = $this->rand_string(18);
//         $url = 'https://securepay.easypayway.com/payment/request.php';
//         //$url = 'https://sandbox.sslcommerz.com/gwprocess/v3/api.php';
//         $fields = array(
//             'store_id' => 'regalfurniturebd',
//             'amount' => $cart['total'],
// //            'payment_type' => 'VISA',
//             'currency' => 'BDT',
//             'tran_id' => $cur_random_value,
//             'cus_name' => $shiping['full_name'],
//             'cus_email' => $shiping['email'] != '' ? $shiping['email'] : 'customer@regalfurniturebd.com',
//             'cus_add1' => $shiping['shiping_address'],
//             'cus_city' => 'Dhaka',
//             'cus_state' => 'Dhaka',
//             'cus_postcode' => '1212',
//             'cus_country' => 'Bangladesh',
//             'cus_phone' => $shiping['mobile_number'],
//             'cus_fax' => 'Not-Applicable',
//             'ship_name' => $shiping['full_name'],
//             'ship_add1' => $shiping['shiping_address'],
//             'ship_city' => 'Dhaka',
//             'ship_state' => 'Dhaka',
//             'ship_postcode' => '1212',
//             'ship_country' => 'Bangladesh',
//             'desc' => 'Furniture',
//             'success_url' => base_url('frontend/payment_return_url?order_id=' . $trackcode),
//             'fail_url' => base_url('frontend/payment_return_url?order_id=' . $trackcode),
//             'cancel_url' => base_url('frontend/payment_return_url?order_id=' . $trackcode),
//             'signature_key' => 'f90dc4636073bf6f441ab64924e8412a'
//         );
//         $fields_string = '';
//         foreach ($fields as $key => $value) {
//             $fields_string .= $key . '=' . $value . '&';
//         }
//         $fields_string = rtrim($fields_string, '&');
//         //owndebugger($fields_string); die();
//         $ch = curl_init();
//         curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
//         curl_setopt($ch, CURLOPT_URL, $url);
//         curl_setopt($ch, CURLOPT_POST, count($fields));
//         curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
//         curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
//         $url_forward = str_replace('"', '', stripslashes(curl_exec($ch)));
//         curl_close($ch);
//         $this->redirect_to_merchant($url_forward);
//     }
    //     function payment_return_url() {
    //     $orderId = $this->input->get('order_id');
    //     $msg = $this->input->post(); //$_POST; // $this->input->post();
    //     if ($msg['pay_status'] === 'Successful') {
    //         $data['param'] = jsonEncode(array('status' => 1, 'epw' => $msg));
    //         //update
    //         $this->db->where('id', $orderId);
    //         $this->db->update('ecommerce_order_master', $data);
    //         $this->data['track_msg'] = 'Payment Has Been Successful. We will contact you shortly.';
    //         $this->data['status'] = 1;
    //         //Mobile MSG Operation
    //         $result = $this->db->get_where('ecommerce_order_master', array(
    //                     'id' => $orderId
    //                 ))->row();
    //         $customer_message = "Order has been placed successfully on Regal Furniture\nOrder No: " . $result->id . "\nHotline: 09613737777";
    //         sendSms($customer_message, $result->contuct_number);
    //         sendSms($customer_message, $result->alternative_mobile);
    //         //Mobile MSG admin
    //         $message = "New Order has been placed successfully on Regal Furniture\nOrder No: " . $result->id ;
    //         sendSms($message, '01924602020'); //Habib-01924602020
    //         //Mobile MSG admin
    //         sendSms($message, '01992659228'); //Shuvo-01992659228
    //         sendSms($message, '01680139540'); //samrat-01680139540
    //     } else {
    //         $data['param'] = jsonEncode(array('status' => 2, 'epw' => $msg));
    //         //update
    //         $this->db->where('id', $orderId);
    //         $this->db->update('ecommerce_order_master', $data);
    //         $this->data['track_msg'] = 'Payment Has Been Failed. But, your data has been saved to our database. We will contact you soon.';
    //         $this->data['status'] = 2;
    //     }
    //     $track = $this->db->get_where('ecommerce_order_master', array(
    //                 'id' => $orderId
    //             ))->row()->payment_parameter;
    //     redirect("view_invoicer/redirect_to?track_id={$track}&status={$this->data['status']}&message={$this->data['track_msg']}");
    // }



    public function confirm_order($prm = null) {
        /* Checking User is already loged in */

        //echo $this->input->post('pay_status');

        if ($this->ion_auth->logged_in()) {
            $this->data['userInformation'] = $this->ion_auth->user()->row();
            $this->data['userid'] = $this->data['userInformation']->id;
        }


        /** From Previous * */
        $track = $this->input->get('track');
        $trackcode = $this->session->userdata('track_id');

        /* Generating Data for Order Master Table */
        $shiping_info = $this->session->userdata('shiping_info');
        $trackcode = $this->session->userdata('track_id');
        $payment_info = $this->session->userdata('payment_info');
        $cart = $this->data['cart'];

        $order_master = array(
            'customer_name' => $shiping_info['full_name'],
            'contuct_number' => $shiping_info['mobile_number'],
            'alternative_mobile' => $shiping_info['alternative_mobile'],
            'email_address' => $shiping_info['email'],
            'shiping_address' => $shiping_info['shiping_address'],
            'payment_method_name' => (!empty($payment_info['payment_method_name']) ? $payment_info['payment_method_name'] : 'None Selected'),
            'payment_term_status' => 'checked',
            'order_status' => 'order_placed',
            //ALTER TABLE `ecommerce_order_master` ADD COLUMN `track_id` VARCHAR(255) NOT NULL AFTER `secret_key`;
            'user_id' => isset($this->data['userid']) ? $this->data['userid'] : 0
        );


        /** From Previous * */
        if ($this->input->post('pay_status') === 2) {
            $this->data['status'] = 2;
            $this->data['track_msg'] = 'Payment Has Been Failed. But, your data has been saved to our database. We will contact you soon.';
            if ($track == $trackcode) {
                $this->data['track_id'] = $track;
                $status_with = array(
                    'payment_parameter' => $this->data['track_id'],
                    'param' => jsonEncode(array('status' => $this->data['status'], 'epw' => jsonEncode($this->input->post())))
                );
                $order_master1 = array_merge($order_master, $status_with);
                list($trackcode, $secret_key) = $this->order_model->place_order($order_master1, $this->data['cart']['items']);
            }
        } else if ($this->input->post('pay_status') === 7) {
            $this->data['status'] = 1;
            $this->data['track_msg'] = 'Payment Has Been Successful. We will contact you shortly.';
            if ($track == $trackcode) {
                $this->data['track_id'] = $track;
                $status_with = array(
                    'payment_parameter' => $this->data['track_id'],
                    'param' => jsonEncode(array('status' => $this->data['status'], 'epw' => jsonEncode($this->input->post())))
                );
                $order_master1 = array_merge($order_master, $status_with);
                list($trackcode, $secret_key) = $this->order_model->place_order($order_master1, $this->data['cart']['items']);
            }
        }
        $order_status = $this->_order_validity();
        if ($order_status['flag'] == false) {
            redirect($order_status['redirect'], 'refresh');
        }
        $this->data['order'] = array(
            'id' => $trackcode,
            'shiping_info' => $shiping_info,
            'payment_info' => $payment_info,
            'cart' => $cart,
        );


        if ($this->_register_user($shiping_info['full_name'], $shiping_info['email']))
            redirect("view_invoicer/redirect_to?track_id={$track}&status={$this->data['status']}&message={$this->data['track_msg']}");
    }

    /*
     *  New User Registration in order process
     */

    public function _register_user($userName, $mobile, $email = null) {
        $tables = $this->config->item('tables', 'ion_auth');
        $identity_column = $this->config->item('identity', 'ion_auth');
        $this->data['identity_column'] = $identity_column;

        //check mobile number in database
        $result = $this->db->get_where('users', array(
                    'phone' => $mobile
                ))->row();

        if ($result) {
            return False;
        }

        if (strtolower($email))
            $email = $email;
        else
            $email = null;


        $password = $this->_randomPassword();
        $identity = $this->_random_username($userName);

        $additional_data = array(
            'full_name_en' => $userName,
            'phone' => $mobile
        );


        if ($this->form_validation->run() == true && $this->ion_auth->register($identity, $password, $email, $additional_data)) {

            $message = "Dear Valued Customer,\n you account has been create successfully.\n User Name:" . $identity . "\nPassword:" . $password . "\nRegal Furniture";
            sendSms($message, $mobile);

//            $remember = false;
//            if ($this->ion_auth->login($identity, $password, $remember)) {
//                //if the login is successful
//                //redirect them back to the dashboard page
//                $this->session->set_flashdata('message', $this->ion_auth->messages());
//                return true;
//            }
        }
    }

    function _randomPassword() {
        $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
    }

    public function test_session() {
        owndebugger($this->session);
        owndebugger($this->cart->contents());
        $this->cart->destroy();
    }

//    public function unload_cart_remove() {
//        _session_destroyer();
//        echo 'Remove';
//    }

    public function _session_destroyer() {
        $m = $this->session->unset_userdata('track_id');
        $m = $this->session->unset_userdata('shiping_info');
        $m = $this->session->unset_userdata('payment_info');
        $m = $this->cart->destroy();
        return $m;
    }

    public function view_invoice($order_id = 0, $secret_key = '') {

        if (!$this->ion_auth->logged_in()) {
            redirect(base_url() . 'auth/login', 'refresh');
        }


        $this->data['base_url'] = base_url();
        $this->data['order'] = $this->order_model->get_order($order_id, $secret_key);
        if (!empty($this->data['order'])) {
            $this->load->view('shop/invoice', $this->data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }

    function pdf_invoice() {
        $id = $this->input->post('id');
        $secret_key = $this->input->post('secret_key');
        $this->data['order'] = $this->order_model->get_order($id, $secret_key);
        if (!empty($this->data['order'])) {
            $html = $this->load->view('shop/pdf_invoice', $this->data, true);

            $filename = 'Purchase_Invoice.pdf';
            $this->load->library('pdf');
            $pdf = $this->pdf->load();

            $pdf->SetFooter($_SERVER['HTTP_HOST'] . '|{PAGENO}|' . date(DATE_RFC822));
            $pdf->WriteHTML($html);
            $pdf->Output($filename, 'D');
        } else {
            redirect(base_url(), 'refresh');
        }
    }

    public function view_invoicer() {
        $this->data['order_id'] = $this->input->get('track_id');
        $this->data['msg'] = $this->input->get('message');
        $this->data['status'] = $this->input->get('status');
        //$this->data['base_url'] = base_url();
        $this->data['order'] = $this->order_model->get_order_pp($this->data['order_id']);
        //owndebugger($this->data['order']); die();
        if ($this->data['order']) {
            $this->load->view('shop/invoice', $this->data);
        } else {
            redirect(base_url(), 'refresh');
        }
        $this->_session_destroyer();
    }

    private function _order_validity() {
        $list = array();
        $shiping_info = $this->session->userdata('shiping_info');
        $payment_info = $this->session->userdata('payment_info');
        $cart = $this->data['cart'];


//owndebugger($cart);



        foreach ($cart['items'] as $item) {

            $current_product_info = $this->db->get_where('products', array('id =' => $item["id"]))->row();

            if ($item['discount'] !== $current_product_info->discount) {
                $new_discount_price = $item['regular_price'] - ($item['regular_price'] * $current_product_info->discount) / 100;
                $rowid = $item['rowid'];
                $qty = $item['qty'];
                $price = $new_discount_price;
                $discount = $current_product_info->discount;
            } else {
                $rowid = $item['rowid'];
                $qty = $item['qty'];
                $price = $item['price'];
                $discount = $item['discount'];
            }

            $newarray[] = [
                'rowid' => $rowid,
                'qty' => $qty,
                'price' => $price,
                'discount' => $discount,
            ];
        }
        // owndebugger($newarray);
        $this->cart->update($newarray);


        //$current_product_info = $this->db->get_where('products', array('id =' => $item["id"]))->row();
        //$data['files'] = 
        /* $current_discount = $current_product_info->discount;
          owndebugger($current_discount); */
        //owndebugger($cart);
        $return = array(
            'flag' => TRUE,
            'redirect' => ''
        );

        if ($cart['total'] <= 0) {
            $return = array(
                'flag' => FALSE,
                'redirect' => ''
            );
            $temp = "<strong>Invalid.</strong> Please some product to your cart then try to place order.";
            $this->session->set_flashdata('validation_error', $temp);
        } else if (empty($shiping_info) OR empty($shiping_info['full_name']) OR empty($shiping_info['mobile_number']) OR empty($shiping_info['shiping_address'])) {
            $return = array(
                'flag' => FALSE,
                'redirect' => 'checkout/2'
            );
            $temp = "<strong>Required!</strong> You have to fill up valid <strong>Full Name</strong>, <strong>Mobile Number</strong> and <strong>Shipping Address</strong>";
            $this->session->set_flashdata('validation_error', $temp);
        } else if (empty($payment_info) OR empty($payment_info['payment_method']) OR empty($payment_info['payment_term'])) {
            $return = array(
                'flag' => FALSE,
                'redirect' => 'checkout/3'
            );
            $temp = "<strong>Payment option not selected!</strong> You have to select payment option and have to agree payment term and condition.";
            $this->session->set_flashdata('validation_error', $temp);
        }
        return $return;
    }

    public function order_list() {
        if (!$this->ion_auth->logged_in()) {
            redirect(base_url(), 'refresh');
        } else {
            if ($this->ion_auth->logged_in()) {
                $this->data['userInformation'] = $this->ion_auth->user()->row();
            }
        }
    }

    /** Login & Registered * */
    public function my_account() {
        $this->_authenticate();

        $this->data['breadcrumb'] = array(
            array('url' => 'myaccount', 'title' => 'My Account'),
            array('url' => 'myaccount', 'title' => 'Order List')
        );
        $this->data['orders'] = $this->order_model->get_orders(['user_id' => $this->data['userInformation']->id]);


        frontView('userpanel/userdashboard', $this->data);

        // $this->load->view('common/header', $this->data);
        // $this->load->view('userpanel/userdashboard', $this->data);
        // $this->load->view('common/footer', $this->data);
    }

    /** My Personal Information */
    public function personal_information() {
        $this->_authenticate();

        $this->data['breadcrumb'] = array(
            array('url' => 'myaccount', 'title' => 'My Account'),
            array('url' => 'personal_information', 'title' => 'Personal Information')
        );

        $this->form_validation->set_rules('full_name', 'Full Name', 'trim|required|min_length[3]|max_length[40]');
        $this->form_validation->set_rules('phone', 'Phone', 'trim|required|min_length[6]|max_length[30]');
        $this->form_validation->set_rules('address', 'Address', 'trim|required|min_length[15]');
        //$this->form_validation->set_rules('password', 'password', 'trim|required|min_length[5]|max_length[20]');


        if ($this->form_validation->run()) {
            $data = [
                'full_name_en' => $this->input->post('full_name'),
                'phone' => $this->input->post('phone'),
                'address' => $this->input->post('address')
                    //,'password' => $this->input->post('password')
            ];


            if ($this->ion_auth->update($this->data['userInformation']->id, $data)) {
                $this->data['userInformation'] = $this->ion_auth->user()->row();
            }
        }
        // $this->data['userInformation'];
        $this->load->view('common/header', $this->data);
        $this->load->view('userpanel/personal_information', $this->data);
        $this->load->view('common/footer', $this->data);
    }

    public function showrooms() {
        $this->data['title'] = "Show rooms";
        $this->data['breadcrumb'] = array(
            array('url' => 'regal_showrooms', 'title' => 'Showrooms')
        );
        $this->data['districts'] = $this->common_model->get_districts();
        $this->data['showrooms'] = $this->showrooms_model->get_showrooms();

        return $this->load->view('shop/showrooms', $this->data, true);
        // $this->load->view('common/footer', $this->data);
    }

    // darcadmin
    public function get_showrooms() {

        header('Content-type:application/json');
        $showrooms = $this->showrooms_model->get_showrooms($this->input->get());
        // owndebugger($showrooms);
        // die();
        echo jsonEncode($showrooms);
    }

    function checkUserName($prm) {
//        $username = $this->_random_username($prm);
//        if($username){
//            echo '<span class="color:red">Your User name: '.$username.'</span>';
//        }
    }

    function checkEmail($prm) {
        $result = $this->db->get_where('users', array(
                    'email' => $prm
                ))->row();

        if ($result) {
            echo jsonEncode([
                'msg' => 'This Email already Used! Please use another One.',
                'status' => 1
            ]);
        }
    }

    public function register() {

        $this->data['title'] = "Create an user";

        $tables = $this->config->item('tables', 'ion_auth');
        $identity_column = $this->config->item('identity', 'ion_auth');
        $this->data['identity_column'] = $identity_column;


        $this->form_validation->set_rules('password', $this->lang->line('create_user_validation_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
        $this->form_validation->set_rules('password_confirm', $this->lang->line('create_user_validation_password_confirm_label'), 'required');

        if ($this->form_validation->run() == true) {

            if (strtolower($this->input->post('email')))
                $email = strtolower($this->input->post('email'));
            else
                $email = null;


            $password = $this->input->post('password');
            $identity = $this->_random_username($this->input->post('full_name_en'));

            $additional_data = array(
                'full_name_en' => $this->input->post('full_name_en'),
                'phone' => $this->input->post('mobile_number')
            );
        }


        if ($this->form_validation->run() == true && $this->ion_auth->register($identity, $password, $email, $additional_data)) {
            // check to see if we are creating the user
            // redirect them back to the admin page
            $message = "Dear Valued Customer,\n you account has been create successfully.\n User Name:" . $identity . "\nPassword:" . $password . "\nRegal Furniture";
            $receiver = $this->input->post('mobile_number');


            sendSms($message, $receiver);

            $this->session->set_flashdata('message', 'Your account created successfully. Check your mobile and get your account username, password.');
            redirect('authentication', 'checkout');
        } else {
            // display the create user form
            // set the flash data error message if there is one
            $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

            $this->data['identity'] = array(
                'name' => 'identity',
                'id' => 'identity',
                'type' => 'text',
                'value' => $this->form_validation->set_value('identity'),
            );
            $this->data['email'] = array(
                'name' => 'email',
                'id' => 'email',
                'type' => 'text',
                'value' => $this->form_validation->set_value('email'),
            );
            $this->data['password'] = array(
                'name' => 'password',
                'id' => 'password',
                'type' => 'password',
                'value' => $this->form_validation->set_value('password'),
            );
            $this->data['password_confirm'] = array(
                'name' => 'password_confirm',
                'id' => 'password_confirm',
                'type' => 'password',
                'value' => $this->form_validation->set_value('password_confirm'),
            );

            $this->session->set_flashdata('message', 'Something went wrong. System unable to create your account. Try again or contact with us.');
            redirect('authentication', 'checkout');
        }
    }

    function _random_username($string) {
        $pattern = " ";
        $firstPart = strstr(strtolower($string), $pattern, true);
        $secondPart = substr(strstr(strtolower($string), $pattern, false), 0, 4);
        $nrRand = rand(0, 1000);

        $username = trim($firstPart) . trim($secondPart) . trim($nrRand);
        return $username;
    }

    /**
     * @return mixed
     */
    public function get_settings() {
        $row = $this->settings_model->getSystemSettings();
        return $row[0];
    }

    /**
     * @return array
     */
    public function get_blocks() {
        $blocks = $this->settings_model->getBlocks(1);
        return $blocks;
    }

    function search($array, $searchkey, $value) {
        if (is_array($array)) {
            foreach ($array as $key => $block) {
                $blockvar = (array) $block;
                if ($blockvar[$searchkey] == $value)
                    return $block;
            }
        }
        return false;
    }

//public function get_widget($blocks, widgetposition, 0)
    public function get_widget($array, $key, $value) {
        owndebugger($array);
        foreach ($array as $key => $block) {
//owndebugger($block);
            if ($block[$key] == $value) {
                return $key;
            }
        }
        return false;
    }

    /**
     * @param $id
     * @return array|bool
     */
    public function get_block($id) {
        $block = $this->settings_model->getBlock($id);
        return $block;
    }

    /**
     * @return array
     */
    public function get_webpages() {
        return $this->frontend_model->getAllPagesFrontend();
    }

    public function get_webpages_by_id($pageid) {
        return $this->frontend_model->getPageById($pageid);
    }

    public function get_sub_webpages($parent_id) {
        return $this->frontend_model->getAllSubPagesFrontend($parent_id);
    }

    public function get_menu_directly_from_db() {
        $menus = $this->frontend_model->getMainMenuFromDbDirectly();
        if (!empty($menus)) {
            $html = '<ul class="nav navbar-nav">';
            foreach ((array) $menus as $menu) {
                if ($menu->isMegaMenu == 1) {
                    $html .= '<li class="dropdown megamenu-80width ' . (($this->uri->segment(1) == 'category') ? ' active' : '') . '">';
                    $html .= '<a data-toggle="dropdown" class="dropdown-toggle" href="#">';
                    $html .= $menu->PageTitle;
                    $html .= '<b class="caret"></b></a>';
                    $html .= '<ul class="dropdown-menu">';
                    $html .= '<li class="megamenu-content">';
                    $html .= $menu->Description;
                    $html .= '</li>';
                    $html .= '</ul>';
                    $html .= '</li>';
                }

                if (!empty($menu->Childs)) {
                    $html .= '<li class="dropdown "><a href="' . base_url() . 'page/' . $menu->PageRoute . '" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">' . $menu->PageTitle . ' <span class="caret"></span></a>';
                } else {
                    if ($menu->isMegaMenu == 0) {
                        $html .= '<li class="' . (($this->uri->segment(1) == 'page') && ($this->uri->segment(2) == $menu->PageRoute) ? ' active' : '') . '"><a href="' . base_url() . 'page/' . $menu->PageRoute . '">' . $menu->PageTitle . '</a></li>';
                    }
                }
                if (!empty($menu->Childs)) {
                    $childs = explode('|', $menu->Childs);
                    $html .= '<ul class="dropdown-menu">';
                    foreach ($childs as $child) {
                        $menu = explode(';', $child);
                        $html .= '<li><a href="' . base_url() . 'page/' . trim($menu[1]) . '">' . $menu[2] . '</a></li>';
                    }
                    $html .= '</ul>';
                }
                if (!empty($menu->Childs)) {
                    $html .= '</li>';
                } else {
                    
                }
                $html .= '</li>';
            }

            $html .= '</ul>';
            //$html .= '<ul class="pull-right"><li><a href="">Track Order</a></li></ul>';
            return $html;
        }
    }

    public function get_secondary_menu_directly_from_db() {
        $menus = $this->frontend_model->getSecondaryMenuFromDbDirectly();
        if (!empty($menus)) {
            $html = '<nav class="navbar">';
            $html .= '<div id="navbar" class="secondary navbar-collapse collapse">';
            $html .= '<ul class="nav navbar-nav">';

            foreach ((array) $menus as $menu) {
                if (!empty($menu->Childs)) {
                    $html .= '<li class="dropdown"><a href="' . base_url() . 'page/' . trim($menu->PageId) . '/' . $menu->PageRoute . '" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">' . $menu->PageTitle . ' <span class="caret"></span></a>';
                } else {
                    $html .= '<li><a href="' . base_url() . 'page/' . trim($menu->PageId) . '/' . $menu->PageRoute . '">' . $menu->PageTitle . '</a></li>';
                }
                if (!empty($menu->Childs)) {
                    $childs = explode('|', $menu->Childs);
                    $html .= '<ul class="dropdown-menu">';
                    foreach ($childs as $child) {
                        $menu = explode(';', $child);
                        $html .= '<li><a href="' . base_url() . 'page/' . trim($menu[0]) . '/' . trim($menu[1]) . '">' . $menu[2] . '</a></li>';
                    }
                    $html .= '</ul>';
                }
                if (!empty($menu->Childs)) {
                    $html .= '</li>';
                } else {
                    
                }
                $html .= '</li>';
            }
            $html .= '</ul></div></nav>';

            return $html;
        }
    }

    public function get_all_posts_by_cat_id($id) {
        return $this->settings_model->getAllPostsByCatId($id);
    }

    public function get_photos_by_cat_id_and_limits() {
        return $this->settings_model->getPhotosByCatIdAndLimit();
    }

    public function page_single($pageroute) {
        $pageroute = (!empty($pageroute) ? $pageroute : $this->uri->segment(2));
        $return = $this->frontend_model->getPageByRoute($pageroute);
        if (isset($return[0]))
            return $return[0];
        else
            redirect(base_url());
    }

    public function post_single($postid) {
        $postid = (isset($postid) ? $postid : $_GET['post_id']);
        $return = $this->frontend_model->getPostByRoute($postid);
        if (isset($return[0]))
            return $return[0];
        else
            redirect(base_url());
    }

    public function get_applicant_if_exists($id) {
        return $this->profile_model->getPersonalInformation($id);
    }

    public function get_posts_by_category($id, $limit = NULL) {
        return $this->frontend_model->getAllPostsByCategoryId($id, $limit);
    }

    public function get_posts_with_limit() {
        return $this->frontend_model->getAllPostsFronts();
    }

    public function get_posts_by_cat($id, $limit = NULL) {
        return $this->frontend_model->getAllPostsByCatId($id, $limit);
    }

    private function _authenticate() {
        if (!$this->ion_auth->logged_in()) {
            redirect('signup', 'refresh');
        }
        $this->data['userInformation'] = $this->ion_auth->user()->row();
        $this->data['userid'] = $this->data['userInformation']->id;
    }

    public function add_to_compare() {
        $this->data['compare_products'][] = $this->input->get('product_id');

        /* Setting Data */
        $this->session->set_userdata('compared_list', array_unique($this->data['compare_products']));

        /* Return status */
        header('Content-type: application/json');
        echo jsonEncode([
            'msg' => ' Your product added to compare list.',
            'status' => 1,
            'compare_products' => $this->data['compare_products']
        ]);
    }

    public function compare_products() {
        $this->data['breadcrumb'] = array(
            array('url' => 'compare', 'title' => 'Compare')
        );

        $compared_list = array_reverse($this->data['compare_products']);


        $i = 0;
        $this->data['products'] = array();
        foreach ($compared_list as $product_id) {
            if ($i++ >= 3)
                break;
            $this->data['products'][] = $this->product_model->get_product($product_id);
        }

        $this->load->view('common/header', $this->data);
        $this->load->view('shop/compare_products', $this->data);
        $this->load->view('common/footer', $this->data);
    }

    public function download_pdf($order_id = 66, $secret_key = '1764ac8cefca9f1473f6d9d8d79ab72ab16375bb') {
        $this->data['order'] = $this->order_model->get_order($order_id, $secret_key);
        $this->data['base_url'] = base_url();
        $x = $this->load->view('shop/invoice', $this->data, true);


        require_once APPPATH . 'third_party/dompdf/vendor/autoload.php';
        $dompdf = new \Dompdf\Dompdf();
        $dompdf->loadHtml($x);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream();
    }

    /**
     * TEST Easy Pay Gate Way
     * ALL ARE TEST DATA
     */
    function cart() {
        $this->load->view('common/header', $this->data);
        $this->load->view('my_cart', $this->data);
        $this->load->view('common/footer', $this->data);
    }

    function submit_order() {
        $cart = (object) array(
                    'amount' => '1',
                    'cus_name' => 'Rashed Zaman',
                    'cus_email' => 'rashed.zamann@gmail.com',
                    'cus_add1' => 'House B-158, Road 22',
                    'cus_add2' => 'Mohakhali DOHS',
                    'cus_city' => 'Dhaka',
                    'cus_state' => 'Dhaka',
                    'cus_postcode' => '1206',
                    'cus_country' => 'Bangladesh',
                    'cus_phone' => '01718899252',
                    'ship_name' => 'Mr.Rashed Zaman',
                    'ship_add1' => 'House B-158, Road 22',
                    'ship_add2' => 'Mohakhali DOHS',
                    'ship_city' => 'Dhaka',
                    'ship_state' => 'Dhaka',
                    'ship_postcode' => '1212',
                    'ship_country' => 'Bangladesh',
                    'desc' => 'T-Shirt',
                    'opt_a' => 'Option Value A',
                    'opt_b' => 'Option Value B',
                    'opt_c' => 'Option Value C',
                    'opt_d' => 'Option Value D',
        );

        $this->payment($cart);
    }

    function rand_string($length) {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";

        $size = strlen($chars);
        $str = '';
        for ($i = 0; $i < $length; $i++) {
            $str .= $chars[rand(0, $size - 1)];
        }
        return $str;
    }

    function select_order($id = null) {
        $order = $this->db->get_where('ecommerce_order_master', array(
                    'id' => $id
                ))->row();

        $order->order_details = $this->db->get_where('ecommerce_order_details', array(
                    'master_id' => $order->id
                ))->result();


        echo '<pre>';
        print_r($order);
        exit();
    }

    function tracking() {
        //echo "Saddam";
        $this->data['title'] = "Tracking";
        $this->load->view('common/header', $this->data);
        $this->load->view('tracking', $this->data);
        $this->load->view('common/footer', $this->data);
    }

    function tracking_ajax() {
        $html = '';
        $code = $this->input->post('code');
        $code_type = $this->input->post('code_type');
        $result = $this->db->get_where('ecommerce_order_master', ['id' => $code])->row();

        if ($result) {
            $status = $result->order_status;
            $order_time = $result->order_time;
            $order_time = date('d M Y', strtotime($order_time));
            /* if ($status == 'order_placed') {
              $s = 'Order Placed';
              } else {
              $s = $status;
              Date-> Process-> Production-> Distribution -> Delivery
              } */

            $html = '<div class="col-md-8">
                        <ul class="progress-indicator">';
            if ($status == 'order_placed') {
                $html .= ' <li class="completed"> <span class="bubble"></span> Order Date <br>(' . $order_time . ')</li>
                            <li> <span class="bubble"></span> Order Processing </li> 
                            <li> <span class="bubble"></span> Order Production </li> 
                            <li> <span class="bubble"></span> Order Distribution </li> 
                            <li> <span class="bubble"></span> Delivery Done </li>';
            } elseif ($status == 'processing') {
                $html .= '<li class="completed"> <span class="bubble"></span> Order Date <br>(' . $order_time . ')</li>
                           <li class="completed"> <span class="bubble"></span> Processing </li>
                           <li> <span class="bubble"></span> Production </li> 
                           <li> <span class="bubble"></span> Distribution </li> 
                           <li> <span class="bubble"></span> Delivery Done </li>';
            } elseif ($status == 'production') {
                $html .= '<li class="completed"> <span class="bubble"></span> Order Date <br>(' . $order_time . ')</li>
                           <li class="completed"> <span class="bubble"></span> Processing </li>
                           <li class="completed"> <span class="bubble"></span> Production </li> 
                           <li> <span class="bubble"></span> Distribution </li> 
                           <li> <span class="bubble"></span> Delivery Done </li>';
            } elseif ($status == 'distribution') {
                $html .= '<li class="completed"> <span class="bubble"></span> Order Date <br>(' . $order_time . ')</li>
                           <li class="completed"> <span class="bubble"></span> processing </li>
                           <li class="completed"> <span class="bubble"></span> Production </li> 
                           <li class="completed"> <span class="bubble"></span> Distribution </li> 
                           <li> <span class="bubble"></span> Delivery Done </li>';
            } elseif ($status == 'refund') {
                $html .= '<li class="completed"> <span class="bubble"></span> Order Date <br>(' . $order_time . ')</li>
                           <li class="completed"> <span class="bubble"></span> processing </li>
                           <li class="completed"> <span class="bubble"></span> Production </li> 
                           <li class="completed"> <span class="bubble"></span> Distribution </li> 
                           <li class="completed"> <span class="bubble"></span> Refund </li>';
            } else {
                $html .= '<li class="completed"> <span class="bubble"></span> Order Date <br>(' . $order_time . ')</li>
                           <li class="completed"> <span class="bubble"></span> processing </li>
                           <li class="completed"> <span class="bubble"></span> Production </li> 
                           <li class="completed"> <span class="bubble"></span> Distribution </li> 
                           <li class="completed"> <span class="bubble"></span> Delivery Done </li>';
            }

            $html .= '</ul> </div>';
            /* $html = '<table class="table table-striped table-bordered table-list">
              <thead>
              <tr><th>Current Status</th></tr>
              </thead>
              <tbody>
              <tr><td>' . $s . '</td></tr>
              </tbody>
              </table>'; */
        } else {
            $html = '<table class="table table-striped table-bordered table-list">
                            <thead>
                                <tr><th>Current Status</th></tr> 
                            </thead>
                            <tbody>
                                <tr><td>Please enter your valid booking code or order number.</td></tr>
                            </tbody>
                        </table>';
        }
        echo $html;
    }

    public function download_catalogue($category_id = 0) {
        $category_id = (int) $category_id;
        $this->data['term'] = $this->term_model->get_category($category_id);

        $of = $this->input->get('order_field');
        $op = $this->input->get('order_type');
        $field = empty($of) ? ' price ' : $of;
        $shorttype = empty($op) ? ' ASC ' : $op;
        $options = array(
            'limit' => 5000,
            'max_price' => (int) $this->input->get('max_price'),
            'min_price' => (int) $this->input->get('min_price'),
            'search_key' => $this->input->get('search_key'),
            'cat_id' => $category_id,
            'page_no' => (int) $this->input->get('page_no'),
            'order_field' => $field,
            'order_type' => $shorttype
        );

        $this->data['products'] = $this->product_model->get_products($options, true);

        $this->data['title'] = (!empty($this->data['term']['name']) ? $this->data['term']['name'] : '');
        $this->data['settings'] = $this->get_settings();


        $this->data['base_url'] = base_url();

        //$x = $this->load->view('shop/catalogue/download', $this->data);


        $x = $this->load->view('shop/catalogue/download', $this->data, true);
        require_once APPPATH . 'third_party/dompdf/vendor/autoload.php';
        $dompdf = new \Dompdf\Dompdf();
        $dompdf->loadHtml($x);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream($this->data['term']['name']);
    }

    public function __payment($cart, $shiping, $trackcode) {
        $cur_random_value = $this->rand_string(18);
        //$url = 'https://securepay.easypayway.com/payment/request.php';
        $url = 'https://sandbox.sslcommerz.com/gwprocess/v3/api.php';

        $fields = array(
            //test sandbox
            'store_id' => 'test_regalfurniturebd001',
            'store_passwd' => 'test_regalfurniturebd001@ssl',
            //live sand box
            // 'store_id' => 'regalfurniturebdlive',
            // 'store_passwd'=> 'regalfurniturebdlive60822',
            'total_amount' => $cart['total'],
//            'payment_type' => 'VISA',
            'currency' => 'BDT',
            'tran_id' => $cur_random_value,
            'cus_name' => $shiping['full_name'],
            'cus_email' => $shiping['email'] != '' ? $shiping['email'] : 'customer@regalfurniturebd.com',
            'cus_add1' => $shiping['shiping_address'],
            'cus_city' => 'Dhaka',
            'cus_state' => 'Dhaka',
            'cus_postcode' => '1212',
            'cus_country' => 'Bangladesh',
            'cus_phone' => $shiping['mobile_number'],
            'cus_fax' => 'Not-Applicable',
            'ship_name' => $shiping['full_name'],
            'ship_add1' => $shiping['shiping_address'],
            'ship_city' => 'Dhaka',
            'ship_state' => 'Dhaka',
            'ship_postcode' => '1212',
            'ship_country' => 'Bangladesh',
            'desc' => 'Furniture',
            'success_url' => base_url('frontend/payment_return_url?order_id=success_' . $trackcode),
            'fail_url' => base_url('frontend/payment_return_url?order_id=failed_' . $trackcode),
            'cancel_url' => base_url('frontend/payment_return_url?order_id=cancel_' . $trackcode),
            'signature_key' => 'f90dc4636073bf6f441ab64924e8412a'
        );

        $fields_string = '';
        foreach ($fields as $key => $value) {
            $fields_string .= $key . '=' . $value . '&';
        }
        $fields_string = rtrim($fields_string, '&');

        //owndebugger($fields_string); die();
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, count($fields));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

        $content = curl_exec($ch);

        $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if ($code == 200 && !( curl_errno($ch))) {
            curl_close($ch);
            $sslcommerzResponse = $content;
        } else {
            curl_close($ch);
            echo "FAILED TO CONNECT WITH SSLCOMMERZ API";
            exit;
        }

        # PARSE THE JSON RESPONSE
        $sslcz = json_decode($sslcommerzResponse, true);
        //owndebugger($sslcz); die();
        $this->redirect_to_merchant($sslcz['GatewayPageURL']);
        //echo $sslcz['GatewayPageURL'];
    }
    
    
    
    public function institutes() {
        $this->data['institutes'] = $this->institutes_model->getAll();
        $this->data['title'] = 'Institutes';
        
        // $this->data = array();
        $this->load->view('header', $this->data);
        $this->load->view('institutes', $this->data);
        $this->load->view('footer', $this->data);
    }
    
    public function send_message_to_admin() {
        $post = $this->input->post();
        
        if(!empty($post)) {
            $m = sendSms($post['message'], $post['receiver']);
        } else {
            $m = sendSms('test', '01680139540');
        }
        if($m == true) {
            redirect(base_url('institutes'), 'refresh');
        } else {
            redirect(base_url('institutes'), 'refresh');
        }
    }
    
    public function send_email_to_admin() {
        $post = $this->input->post();
        $email = trim($post['receiver']);
        
        if(!empty($post)) {
            $m = send_mail($post['message'], $post['receiver'], $post['subject']);
        } else {
            $m = send_mail('test', 'skydotint@gmail.com');
        }
        
        if($m == true) {
            redirect(base_url('institutes'), 'refresh');
        } else {
            redirect(base_url('institutes'), 'refresh');
        }
    }
    
    public function add_institute() {
        if($this->ion_auth->logged_in()) {
            
            $this->data['title'] = 'Add Institute';
            
            // $this->data = array();
            $this->load->view('header', $this->data);
            $this->load->view('add_institute', $this->data);
            $this->load->view('footer', $this->data);
            
        } else {
            redirect(base_url('outlet'), 'refresh');
        }
    }
    
    
    public function edit_institute($id) {
        
        
        $this->data['institute'] = $this->db->select('*')->from('institutes')->where(array('id' => $id))->get()->row();
        
        if($this->ion_auth->logged_in()) {
            
            $this->data['title'] = 'Add Institute';
            
            // $this->data = array();
            $this->load->view('header', $this->data);
            $this->load->view('add_institute', $this->data);
            $this->load->view('footer', $this->data);
            
        } else {
            redirect(base_url('outlet'), 'refresh');
        }
        
    }
    
    
    
    public function add_institute_save() {
        
        $post = $this->input->post();

        if($post['id'] != 'none') {
            $result = $this->institutes_model->update($post, $where = array('id' => $post['id']));
        } else {
            $result = $this->institutes_model->add($post);
        }
        
        if($result == true) {
            redirect(base_url('institutes'), 'refresh');
        } else {
            redirect(base_url('institutes'), 'refresh');
        }
        
    }
    
    public function edit_institute_save() {
        
        $post = $this->input->post();
        //owndebugger($post);
        //die();
        
        $result = $this->institutes_model->add($post);
        
        if($result == true) {
            redirect(base_url('add_institute'), 'refresh');
        } else {
            
        }
        
    }
    

}

?>