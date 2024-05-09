<?php

define('CATEGORY_IMAGE', 'uploads/category/');
define('PORTFOLIO_IMAGE', 'uploads/portfolio/');


function upload_category_img()
{
    if (isset($_FILES['category_img']['name']) && $_FILES['category_img']['name'] != '') {

        $CI =& get_instance();
        $CI->load->database();
        $config['upload_path'] = CATEGORY_IMAGE;
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        //$config['max_size'] = '2024';

        $CI->load->library('upload', $config);
        $CI->upload->initialize($config);

        if (!$CI->upload->do_upload('category_img')) {
            $error = $CI->upload->display_errors();
            $CI->message->custom_error_msg('addnewcategory',$error);
            return false;
            // uploading failed. $error will holds the errors.
        } else {
            $fdata = $CI->upload->data();
            return $fdata['file_name'];
            // uploading successfull, now do your further actions
        }
    }
    return false;

}
function upload_portfolio_img(){
    if (isset($_FILES['portfolio_img']['name']) && $_FILES['portfolio_img']['name'] != '') {
        $CI =& get_instance();
        $CI->load->database();
        $config['upload_path'] = PORTFOLIO_IMAGE;
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $CI->load->library('upload', $config);
        $CI->upload->initialize($config);
        if (!$CI->upload->do_upload('portfolio_img')) {
            $error = $CI->upload->display_errors();
            $CI->message->custom_error_msg('addnewportfolio',$error);
            return false;
        } else {
            $fdata = $CI->upload->data();
            return $fdata['file_name'];
        }
    }
    return false;
}

function upload_portfolio_thumb(){
    if (isset($_FILES['portfolio_thumb']['name']) && $_FILES['portfolio_thumb']['name'] != '') {
        $CI =& get_instance();
        $CI->load->database();
        $config['upload_path'] = PORTFOLIO_IMAGE;
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $CI->load->library('upload', $config);
        $CI->upload->initialize($config);
        if (!$CI->upload->do_upload('portfolio_thumb')) {
            $error = $CI->upload->display_errors();
            $CI->message->custom_error_msg('addnewportfolio',$error);
            return false;
        } else {
            $fdata = $CI->upload->data();
            return $fdata['file_name'];
        }
    }
    return false;
}