<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class MY_Form_validation extends CI_Form_validation {

    protected $_error_prefix_global		= '<div>';
    protected $_error_suffix_global		= '</div>';

    public function __construct($rules = array()){
        parent::__construct($rules);
    }

    public function error_array()
    {
        if ( count($this->_error_array) === 0 )
        {
            return FALSE;
        }
        else
        {
            return $this->_error_array;
        }
    }
    public function set_error_global_delimiters($prefix = '<div>', $suffix = '</div>')
    {
        $this->_error_prefix_global = $prefix;
        $this->_error_suffix_global = $suffix;
        return $this;
    }

    public function error_string($prefix = '', $suffix = '')
    {
        $str = parent::error_string($prefix, $suffix);
        if($str === '')
        {
            return $str;
        }
        return $this->_error_prefix_global . $str . $this->_error_suffix_global;
    }


    // --------------------------------------------------------------------

    /**
     * Alpha space
     *
     * @access	public
     * @param	string
     * @return	bool
     */
    public function alpha_space($str)
    {
        return ( ! preg_match("/^([a-z ])+$/i", $str)) ? FALSE : TRUE;
    }

    public function alpha_spanish_space($str)
    {
        return ( !preg_match("/^([a-zñÑáÁéÉíÍóÓúÚüÜ ])+$/i", $str) ? FALSE : TRUE );
    }

    public function valid_username($str)
    {
        return ( !preg_match("/^([a-z0-9.\-_])+$/i", $str) ? FALSE : TRUE );
    }
    public function valid_arguments($str)
    {
        return ( !preg_match("/^([a-z0-9~%.\/\:_\-])+$/i", $str) ? FALSE : TRUE );
    }
    public function valid_method($str)
    {
        return ( !preg_match("/^([a-z_])+$/i", $str) ? FALSE : TRUE );
    }

    /**
     * @desc Validates a date format
     * @params format,delimiter
     * e.g. d/m/y,/ or y-m-d,-
     */
    public function valid_date($value, $separator){
        $date = explode($separator, $value);
        if(count($date) === 3) {
            return checkdate($date[1], $date[2], $date[0]);
        } else {
            return FALSE;
        }
    }

    public function valid_extra_hour($value)
    {
        $extra_hour = explode(':', $value);
        if(count($extra_hour) === 2) {
            return TRUE;
        } else {
            return FALSE;
        }
    }


    public function valid_time($str){
        if (strrchr($str,":")) {
            list($hh, $mm, $ss) = explode(':', $str);
            if (!is_numeric($hh) || !is_numeric($mm) || !is_numeric($ss)){
                return FALSE;
            }elseif ((int) $hh > 24 || (int) $mm > 59 || (int) $ss > 59){
                return FALSE;
            }elseif (mktime((int) $hh, (int) $mm, (int) $ss) === FALSE){
                return FALSE;
            }
            return TRUE;
        }else{
            return FALSE;
        }
    }



    public function valid_hour($str){
        if (strrchr($str,":")) {
            list($hh, $mm) = explode(':', $str);
            if (!is_numeric($hh) || !is_numeric($mm)){
                return FALSE;
            }elseif ((int) $hh > 24 || (int) $mm > 59){
                return FALSE;
            }elseif (mktime((int) $hh, (int) $mm) ===FALSE){
                return FALSE;
            }
            return TRUE;
        }else{
            return FALSE;
        }
    }

    public function is_float_no_zero($value)
    {
        if ($value > 0)
            return TRUE;
        else
            return FALSE;
    }

    public function _get_rules(){
        return $this->_config_rules;
    }

    public function _set_rules($rules)
    {
        $this->_config_rules = $rules;
    }
}
