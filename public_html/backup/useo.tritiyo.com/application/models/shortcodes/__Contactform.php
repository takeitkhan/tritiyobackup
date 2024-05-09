<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Contactform extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function run($params = array()) {
        $str = (!empty($status) ? $status : '');
        $str .= form_open_multipart('common/send_contact_email', array('class' => 'form-horizontals', 'data-toggle' => 'validator'));
        $str .= '<div class="form-group">
                        <input class="form-control" name="fullname" placeholder="Name*" type="text" required="required" />
                    </div>
                    <div class="form-group">
                        <input class="form-control" name="emailaddress" id="exampleInputEmail1" placeholder="Email*" type="email" required="required" />
                    </div>
                    <div class="form-group">
                        <input class="form-control" name="phonenumber" placeholder="Valid bangladeshi mobile number *" type="text" required="required" pattern="([0][1][1-9][0-9]{8})" />
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" name="message" rows="3" placeholder="Description"></textarea>
                    </div>
                    <input type="submit" class="btn btn-default" value="Send" />';
        $str .= form_close();
        return $str;
    }

}
