<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}


if (!function_exists('message_box')) {
    function message_box($message_type, $close_button = TRUE)
    {
       // $CI =& get_instance();
        $message = globalInstance()->session->flashdata($message_type);
        $retval = '';

        if($message){
            switch($message_type){
                case 'success':
                    $retval .= '<div class="alert alert-success msg-pad-cnt">';
                    break;
                case 'error':
                    $retval .= '<div class="alert alert-danger msg-pad-cnt">';
                    break;
                case 'info':
                    $retval .= '<div class="alert alert-info msg-pad-cnt">';
                    break;
                case 'warning':
                    $retval .= '<div class="alert alert-warning msg-pad-cnt">';
                    break;
            }

            if($close_button)
                $retval .= '<a class="close" data-dismiss="alert" href="#">&times;</a>';

            $retval .= $message;
            $retval .= '</div>';
            return $retval;
        }
    }
}

if (!function_exists('set_message')){
    function set_message($type, $message)
    {
        //$CI =& get_instance();
        globalInstance()->session->set_flashdata($type, $message);
    }
}

