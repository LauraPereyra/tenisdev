<?php
/**
 * Created by PhpStorm.
 * User: Jorge Andres
 * Date: 25/08/2016
 * Time: 02:11 AM
 */

if ( ! function_exists('is_logged') ) {
    function is_logged() {
        return ( isset($_SESSION['username']) );
    }
}

if ( ! function_exists('refresh_user_session') ) {
    function refresh_user_session() {
        if( is_logged() ) {
            $CI  =& get_instance();
            $user = $CI->auth->get_user( $_SESSION['id'] );
            foreach ( $user as $key => $value ) {
                $_SESSION[$key] = $value;
            }
        }
    }
}