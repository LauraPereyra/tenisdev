<?php
/**
 * Created by PhpStorm.
 * User: JuanPablo
 * Date: 01/11/2016
 * Time: 12:53
 */
defined('BASEPATH') OR exit('No direct script access allowed');
class Equipos extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }
    public function read() {
        $equipos = $this->equipos->get_all();
        $extra['equipos'] = $equipos;
        render($extra);
    }

    public function create() {
        $this->form_validation->set_error_global_delimiters('<div class="alert alert-danger">','</div>');
        if ( $this->form_validation->run('create_equipo') == FALSE ) {
            $extra = [
                'nacionalidades' => $this->nacionalidad->get_all()
            ];
            $entrenadores = $this->entrenadores->get_entrenadores();
            $torneos = $this->torneo->get_all();
            $extra['torneos'] = $torneos;
            $extra['entrenadores'] = $entrenadores;
            render($extra);
        } else {
            $torneo=$porciones = explode("-", $this->input->post('torneo'));
            $data= [
                'id' => rand(1,10000000),
                'entrenador_id'  => $this->input->post('entrenador'),
                'nombre'  => $this->input->post('nombre'),
                'modalidad' => $this->input->post('modalidad'),
                'torneo_pais'  => $torneo[0],
                'torneo_gestion' => $torneo[1],
                'nacionalidad_id' => $this->input->post('nacionalidad'),
                'descalificado' => 0,
            ];
            $result = $this->equipos->set($data);
            redirect('equipos');
        }
    }

    public function registration( $id ) {
        $extra['equipo'] = $this->equipos->get($id);
        $extra['inscritos'] = $this->inscripciones->get_by_equipo($id);
        $where = [];
        $type = '';
        if ( ! empty($extra['equipo']) ) {
            switch ( $extra['equipo']->modalidad ) {
                case 'Dobles masculino':
                    $type = 'checkbox';
                    $where['genero'] = 'masculino';
                    break;
                case 'Individual masculino':
                    $type = 'radio';
                    $where['genero'] = 'masculino';
                    break;
                case 'Dobles femenino':
                    $type = 'checkbox';
                    $where['genero'] = 'femenino';
                    break;
                case 'Individual femenino':
                    $type = 'radio';
                    $where['genero'] = 'femenino';
                    break;
                case 'Dobles mixto':
                    $type = 'checkbox';
                    break;
            }
        } else {
            show_404();
        }
        $extra['type'] = $type;
        $extra['jugadores'] = $this->jugadores->get_all($where);
        $this->form_validation->set_error_global_delimiters('<div class="alert alert-danger">','</div>');
        if ( $this->form_validation->run( 'registration' ) == FALSE ) {
            render($extra);
        } else {
            if ( empty($extra['inscripciones']) ) { // si ya esta existen inscrpciones no se puede cambiar
                $jugadores = $this->input->post('jugador[]');
                foreach ($jugadores as $jugador) {
                    $this->inscripciones->set(['jugador_id' => $jugador, 'equipo_id' => $id]);
                }
            }
            redirect('equipos');
        }
    }
}
