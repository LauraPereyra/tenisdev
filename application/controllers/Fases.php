<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Fases extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }
    public function read() {
        $fases = $this->fases->get_all();
        $extra['fases'] = $fases;
        render($extra);
    }

    public function create() {
        $this->form_validation->set_error_global_delimiters('<div class="alert alert-danger">','</div>');
        if ( $this->form_validation->run('create_fase') == FALSE ) {
            render();
        } else {
            $data= [
                'id' => rand(1,10000000),
                'nombre'  => $this->input->post('nombre'),
                'premioconsuelo' => $this->input->post('premioconsuelo'),
            ];
            $result = $this->fases->set($data);
            redirect('fases');
        }
    }

    public function update($id) {
        $fase=$this->fases->get($id);
        $this->form_validation->set_error_global_delimiters('<div class="alert alert-danger">','</div>');
        if ( $this->form_validation->run('create_fase') == FALSE )
        {
            $extra = [
                'fase'=> $fase
            ];
            render($extra);
        } else {
            $data = [
                'nombre'       => $this->input->post('nombre'),
                'premioconsuelo'     => $this->input->post('premioconsuelo'),
            ];
            $result = $this->fases->update($id ,$data);
            redirect('fases');
        }
    }

    public function delete($id) {
        $this->fases->delete($id);
        redirect('fases');
    }

}
