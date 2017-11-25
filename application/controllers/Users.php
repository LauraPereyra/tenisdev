<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends MY_Controller {

	public function read() {
		render();
	}

	public function login() {
	    if ( $this->input->is_ajax_request() ) {
            if ($this->form_validation->run('login') == FALSE) {
                echo json_encode(['status' => FALSE, 'message' => $this->form_validation->error_array()]);
            } else {
                echo json_encode(['status' => TRUE, 'message' => site_url('arbitros')]);
            }
        } else {
            render();
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('users/login');
    }
}
