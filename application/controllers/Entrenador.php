<?php
/**
 * Created by PhpStorm.
 * User: JuanPablo
 * Date: 01/11/2016
 * Time: 6:37
 */
defined('BASEPATH') OR exit('No direct script access allowed');
class Entrenador extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }
    public function read() {
        $entrenadores = $this->entrenadores->get_entrenadores();
        $extra['entrenadores'] = $entrenadores;
        render($extra);
    }

    public function create() {
        $this->form_validation->set_error_global_delimiters('<div class="alert alert-danger">','</div>');
        if ( $this->form_validation->run('create_entrenador') == FALSE ) {
            render();
        } else {
            $data= [
                'id' => rand(1,10000000),
                'nombre'  => $this->input->post('nombre'),
                'apellido' => $this->input->post('apellido'),
            ];
            $result = $this->entrenadores->set($data);
            redirect('entrenador');
        }
    }

    public function update($id) {
        $entrenador=$this->entrenadores->get($id);
        $this->form_validation->set_error_global_delimiters('<div class="alert alert-danger">','</div>');
        if ( $this->form_validation->run('create_entrenador') == FALSE )
        {
            $extra = [
                'entrenador'=> $entrenador
            ];
            render($extra);
        } else {
            $data = [
                'nombre'       => $this->input->post('nombre'),
                'apellido'     => $this->input->post('apellido'),
            ];
            $result = $this->entrenadores->update($id ,$data);
            redirect('entrenador');
        }
    }

    public function delete($id) {
        $this->entrenadores->delete($id);
        redirect('entrenador');
    }

}
