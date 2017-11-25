<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        date_default_timezone_set('America/Manaus');
    }

    public function _remap($method, $arguments) {
        $method = ($method === 'index') ? 'read' : $method;
        if(!method_exists ($this, $method)) {
            show_404();
        };
        return call_user_func_array(array($this, $method), $arguments);
    }
}

