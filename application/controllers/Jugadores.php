<?php
/**
 * Created by PhpStorm.
 * User: JuanPablo
 * Date: 27/10/2016
 * Time: 7:45
 */
defined('BASEPATH') OR exit('No direct script access allowed');
class Jugadores extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }
    public function read() {
        $jugadores = $this->jugadores->get_all();
        $extra['jugadores'] = $jugadores;
        render($extra);
    }

    public function create() {
        $this->form_validation->set_error_global_delimiters('<div class="alert alert-danger">','</div>');
        if ( $this->form_validation->run('create_jugador') == FALSE ) {
            render();
        } else {
            $data= [
                'id' => rand(1,10000000),
                'nombre'  => $this->input->post('nombre'),
                'apellido'  => $this->input->post('apellido'),
                'fecha_nac'  => $this->input->post('fecha_nac'),
                'genero'  => $this->input->post('genero'),
                'nacionalidad'=>$this->input->post('nacionalidad'),

            ];
            $result = $this->jugadores->set($data);
            redirect('jugadores');
        }
    }

    public function update($id) {
        $jugador=$this->jugadores->get($id);
        $this->form_validation->set_error_global_delimiters('<div class="alert alert-danger">','</div>');
        if ( $this->form_validation->run('create_jugador') == FALSE )
        {
            $extra = [
                'jugador'=> $jugador
            ];
            render($extra);
        } else {
            $data = [
                'nombre'  => $this->input->post('nombre'),
                'apellido'  => $this->input->post('apellido'),
                'fecha_nac'  => $this->input->post('fecha_nac'),
                'genero'  => $this->input->post('genero'),
                'nacionalidad' => $this->input->post('nacionalidad'),
            ];
            $result = $this->jugadores->update($id ,$data);
            redirect('jugadores');
        }
    }

    public function delete($id) {
        $this->jugadores->delete($id);
        redirect('jugadores');
    }

}
