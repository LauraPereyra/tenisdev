<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    public function get_user( $value, $select = NULL ) {
        if( ! is_null($select) ) {
            $this->db->select($select);
        }
        $this->db->from('users');
        $this->db->group_start()->or_where(['id' => $value, 'username' => $value])->group_end();
        $query = $this->db->get();
        return $query->row_array();
    }

    public function is_valid($username, $password) {
        $user = $this->get_user($username);
        if ( ! empty( $user ) ) {
            if ( $user['password'] === $password ) {
                foreach ($user as $key => $value) {
                    $_SESSION[$key] = $value;
                }
                return TRUE;
            } else {
                $this->form_validation->set_message('check_account_callable', "La contrase&ntilde;a no es correcta");
                return FALSE;
            }
        } else {
            $this->form_validation->set_message('check_account_callable', "La cuenta de usario es inexistente.");
            return FALSE;
        }
    }
}