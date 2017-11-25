<?php
if ( ! function_exists('test') ) {
    function test($value) {
	        echo var_dump($value);
	        exit();
    }
}
if ( ! function_exists('s404_null') ) {
    function s404_null($value) {
        if(is_null($value)) {
        	show_404();
        }
    }
}
if ( ! function_exists('count_team') ) {
    function count_team($id) {
        $CI  =& get_instance();
        $number = $CI->partidos->count_teams( $id );
        return (!$number == 2);
    }
}