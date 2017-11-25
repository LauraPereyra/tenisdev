<?php
if ( !function_exists('render') ) {
    function render($extra = []) {
        $CI =& get_instance();
        $controller = $CI->router->fetch_class();
        $method = $CI->router->fetch_method();
        $method = ($method === 'index') ? 'read' : $method;
        $CI->config->load('render');
        $controllers = $CI->config->item('controllers');
        if(array_key_exists($controller, $controllers)){
            $data = $controllers[$controller][$method];
            $data['page'] = $CI->load->view('controllers/' . $controller . '/' . $method, $extra, TRUE);
            $CI->load->view('templates/' . $data['template'], $data);
        }
    }
}
if ( ! function_exists('load_widget') ) {
    function load_widget($widget, $config, $extra_data = []) {
        $CI =& get_instance();
        $parts = explode('.', $widget);
        if(count($parts) > 1) {
            $widget = $parts[0];
            $key = $parts[1];
        }
        if ($config) {           
            $CI->config->load('widgets');
            $data = $CI->config->item($widget);
            if(isset($key) && array_key_exists($key, $data)) {
                $data = $data[$key];
            } else if(isset($key) && !array_key_exists($key, $data)) {
                return '';
            }
            foreach ($extra_data as $key => $value) {
                //Mantener la intergridad del archivo de configuración 
                //Preguntando si se quiere reemplazar alguno de sus valores
                if ( ! array_key_exists($key, $data)) {
                    $data[$key] = $value;
                }
            }
        } else {
            $data = $extra_data;
        }
        return $CI->load->view('widgets/' . $widget, $data, TRUE);
    }
}
if ( ! function_exists('get_context') ) {
    function get_context($widget) {
        $CI =& get_instance(); 
        if(is_string($widget)) {
            return $widget . '.' . get_class($CI);
        }         
        return NULL;
    }
}

if ( ! function_exists('get_fn_class') ) {
    function get_fn_class() {
        $CI =& get_instance(); 
        return get_class($CI).__METHOD__;
    }
}

if ( ! function_exists('action_panel') ) {
    function action_panel() {
        $CI =& get_instance();
    }
}
/*Mensajes de alerta*/
if ( ! function_exists('set_alert_flashdata') ) {
    function set_alert_flashdata($message, $status) {
        $CI =& get_instance();
        $CI->session->set_flashdata('alert_status', $status);
        $CI->session->set_flashdata('alert_message', $message);
    }
}

if ( ! function_exists('show_alert_message') ) {
    function show_alert_message() {
        $CI =& get_instance();
        return $CI->load->view('widgets/alert_message', [], TRUE);
    }
}


