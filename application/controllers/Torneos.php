<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Torneos extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }
    public function read() {
        $torneos = $this->torneo->get_all();
        $extra['torneos'] = $torneos;
        render($extra);
    }

    public function create() {
        $this->form_validation->set_error_global_delimiters('<div class="alert alert-danger">','</div>');
        if ( $this->form_validation->run('create_torneo') == FALSE ) {
            $extra['error'] = '';
            render($extra);
        } else {
            $gestion = $this->input->post('gestion');
            $pais = $this->input->post('pais');
            $torneo = $this->torneo->get( $pais, $gestion);
            //test($torneo);
            if ( ! empty($torneo)) {
                $extra['error'] = '<div class="alert alert-danger">El torneo ya se encuentra registraodo</div>';
                render($extra);
            } else {
                $data= [
                    'nombre'        => $this->input->post('nombre'),
                    'premio'        => $this->input->post('premio'),
                    'gestion'       => $this->input->post('gestion'),
                    'pais'          => $this->input->post('pais'),
                ];
                $result = $this->torneo->set($data);
                redirect('torneos');
            }
        }
    }

    public function update($pais,$gestion) {
        $torneo=$this->torneo->get(urldecode($pais),$gestion);
        $this->form_validation->set_error_global_delimiters('<div class="alert alert-danger">','</div>');
        if ( $this->form_validation->run('create_torneo') == FALSE )
        {
            $extra = [
                'torneo'=> $torneo
            ];
            render($extra);
        } else {
            $data = [
                'nombre'         => $this->input->post('nombre'),
                'premio'        => $this->input->post('premio'),
                'gestion'       => $this->input->post('gestion'),
                'pais'          => $this->input->post('pais'),
            ];
            $result = $this->torneo->update(urldecode($pais),$gestion,$data);
            redirect('torneos');
        }
    }

    public function delete($pais,$gestion) {
        $this->torneo->delete(urldecode($pais),$gestion);
        redirect('torneos');
    }

}
