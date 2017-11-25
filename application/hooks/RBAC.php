<?php
/**
 * Created by PhpStorm.
 * User: Jorge Andres
 * Date: 25/08/2016
 * Time: 02:01 AM
 */

class RBAC {

    private $CI;
    public function __construct() {
        $this->CI =& get_instance();
    }

    public function auth() {
        $controller = ucfirst($this->CI->router->fetch_class());
        $method     = $this->CI->router->fetch_method();
        if( is_logged() ) {
            if( $controller === 'Users' && $method === 'login' ) {
                redirect('arbitros');
            }
            return;
        } else {
            if( $controller === 'Users' && $method === 'login' ) {
                return;
            } else {
                show_404();
            }
        }
    }
}