<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Basefile{

    private $_ci;
    function __construct(){
        $this->_ci = &get_instance();
    }

    
    public function samrat() {
    	return 'Tritiyo Limited';
    }
}