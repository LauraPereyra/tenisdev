<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Arbitros extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }
    public function read() {
        $arbitros = $this->arbitros->get_arbitros();
        $extra['arbitros'] = $arbitros;
        render($extra);
    }

    public function create() {
        $this->form_validation->set_error_global_delimiters('<div class="alert alert-danger">','</div>');
        if ( $this->form_validation->run('create_arbitro') == FALSE ) {
            render();
        } else {
            $data= [
                'id' => rand(1,10000000),
                'nombre'  => $this->input->post('nombre'),
                'apellido' => $this->input->post('apellido'),
            ];
            $result = $this->arbitros->set($data);
            redirect('arbitros');
        }
    }

    public function update($id) {
        $arbitro=$this->arbitros->get($id);
        $this->form_validation->set_error_global_delimiters('<div class="alert alert-danger">','</div>');
        if ( $this->form_validation->run('create_arbitro') == FALSE )
        {
            $extra = [
                'arbitro'=> $arbitro
            ];
            render($extra);
        } else {
            $data = [
                'nombre'       => $this->input->post('nombre'),
                'apellido'     => $this->input->post('apellido'),
            ];
            $result = $this->arbitros->update($id ,$data);
            redirect('arbitros');
        }
    }

    public function delete($id) {
        $this->arbitros->delete($id);
        redirect('arbitros');
    }

}
