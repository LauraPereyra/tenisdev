<?php
/**
 * Created by PhpStorm.
 * User: JuanPablo
 * Date: 01/11/2016
 * Time: 12:53
 */
defined('BASEPATH') OR exit('No direct script access allowed');
class Inscripciones extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }
    public function read() {
        $inscripciones = $this->inscripciones->get_all();
        $extra['inscripciones'] = $inscripciones;
        render($extra);
    }

    public function create() {
        $this->form_validation->set_error_global_delimiters('<div class="alert alert-danger">','</div>');
        if ( $this->form_validation->run('create_inscripcion') == FALSE ) {
            $jugadores = $this->jugadores->get_all();
            $equipos = $this->equipos->get_all();
            $extra['jugadores'] = $jugadores;
            $extra['equipos'] = $equipos;
            render($extra);
        } else {
            $torneo=$porciones = explode("-", $this->input->post('torneo'));
            $data= [
                'jugador_id'  => $this->input->post('jugador'),
                'equipo_id'  => $this->input->post('equipo'),
                'ganancia_torneo' => 0,
            ];
            $result = $this->inscripciones->set($data);
            redirect('inscripciones');
        }
    }
}
