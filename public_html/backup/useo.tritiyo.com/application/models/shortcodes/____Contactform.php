<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Contactform extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    // public function run($params = array()) {
    //     $str = (!empty($status) ? $status : '');
    //     $str .= form_open_multipart('', array('class' => 'form-horizontals', 'id' => 'contactForm', 'data-toggle' => 'validator'));
    //     $str .= '<div class="form-group">
    //                     <input class="form-control" name="fullname" placeholder="Name*" type="text" required="required" />
    //                 </div>
    //                 <div class="form-group">
    //                     <input class="form-control" name="emailaddress" id="exampleInputEmail1" placeholder="Email*" type="email" required="required" />
    //                 </div>
    //                 <div class="form-group">
    //                     <input class="form-control" name="phonenumber" placeholder="Valid bangladeshi mobile number *" type="text" required="required" pattern="([0][1][1-9][0-9]{8})" />
    //                 </div>
    //                 <div class="form-group">
    //                     <textarea class="form-control" name="message" rows="3" placeholder="Description"></textarea>
    //                 </div>
    //                 <input type="submit" class="btn btn-default" value="Send" />';
    //     $str .= form_close();
    //     return $str;
    // }
    public function run($params = array()) {
        $str = (!empty($status) ? $status : '');
        $str .= form_open_multipart('', array('class' => 'form-horizontals', 'id' => 'contactForm', 'data-toggle' => 'validator'));
        $str .= '<div class="form-group">
                                <input type="text" class="form-control" id="cfName" placeholder="Name" required="" name="fullname">
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" id="cfEmail" placeholder="Email" required="" name="emailaddress">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="cfSubject" placeholder="Subject" required="" name="subject">
                            </div>
                            <div class="form-group">
                                <textarea id="cfMessage" rows="5" class="form-control" placeholder="Your Message" required="" name="message"></textarea>
                            </div> 
                            <div class="form-group m-b-0">
                                <button type="submit" class="btn btn-green wow pulse" data-wow-iteration="2" style="visibility: visible; animation-iteration-count: 2; animation-name: pulse;">GIVE US A SHOUT</button>
                            </div>';
        $str .= form_close();
        return $str;
    }

}
