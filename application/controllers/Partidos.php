<?php
/**
 * Created by PhpStorm.
 * User: JuanPablo
 * Date: 01/11/2016
 * Time: 12:53
 */
defined('BASEPATH') OR exit('No direct script access allowed');
class Partidos extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }
    public function read() {
        $partidos = $this->partidos->get_all();
        $extra['partidos'] = $partidos;
        render($extra);
    }

    public function create() {
        $this->form_validation->set_error_global_delimiters('<div class="alert alert-danger">','</div>');
        if ( $this->form_validation->run('create_partido') == FALSE ) {
            $arbitros = $this->arbitros->get_arbitros();
            $fases = $this->fases->get_all();
            $extra['arbitros'] = $arbitros;
            $extra['fases'] = $fases;
            render($extra);
        } else {
            $data= [
                'fases_id'  => $this->input->post('fase'),
                'arbitro_id'  => $this->input->post('arbitro'),
                'modalidad'  => $this->input->post('modalidad'),
            ];
            $result = $this->partidos->set($data);
            redirect('partidos');
        }
    }

    public function add_team($id,$modalidad){
        $partido=$this->partidos->get($id);
        $equipos=$this->equipos->get_valid(urldecode($modalidad));
        $this->form_validation->set_error_global_delimiters('<div class="alert alert-danger">','</div>');
        if ( $this->form_validation->run('add_team') == FALSE )
        {
            $extra = [
                'partido'=> $partido,
                'equipos'=> $equipos
            ];
            render($extra);
        } else {
            $data = [
                'equipo_id'  => $this->input->post('equipo_1'),
                'partido_id'  => $id
            ];
            $result = $this->partidos->register($data);
            $data = [
                'equipo_id'  => $this->input->post('equipo_2'),
                'partido_id'  => $id
            ];
            $result = $this->partidos->register($data);
            redirect('partidos');
        }
    }

    public function win($id){
        $partido=$this->partidos->get($id);
        $equipos=$this->partidos->get_team($id);
        //test($equipos);
        $this->form_validation->set_error_global_delimiters('<div class="alert alert-danger">','</div>');
        if ( $this->form_validation->run('win') == FALSE )
        {
            $extra = [
                'equipos'=> $equipos,
                'partido'=> $partido
            ];
            render($extra);
        } else {
            $fase =$this->fases->get($partido->fase_id);
            $data_result = [
                'equipo_id'  => $this->input->post('resultado'),
            ];
            //$this->partidos->update($id,$data_result);
            $win = $this->input->post('equipo');
            foreach ($equipos as $equipo){
                if ($equipo->equipo_id != $win ){
                    $lose = $equipo->equipo_id;
                }
            }
            $data_lose = [
                'descalificado'  => 1];
            //$this->equipos->update($lose,$data_lose);
            $data_ganancia = [
                'ganancia'  => $fase->premioconsuelo];
            $this->inscripciones->update($data);
            redirect('partidos');
        }
    }
}
