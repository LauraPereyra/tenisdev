    <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nacionalidades extends MY_Controller
{
    public function read() {
        $extra = [
            'nacionalidades' => $this->nacionalidad->get_all()
        ];
        render( $extra );
    }

    public function update( $id = NULL ) {
        $nacionalidad = $this->nacionalidad->get( $id );
        if ( empty($nacionalidad) ) {
            show_404();
        }
        if ( $this->input->is_ajax_request() ) {
            if ($this->form_validation->run('update_nacionalidad') == FALSE) {
                echo json_encode(['status' => FALSE, 'message' => $this->form_validation->error_array()]);
            } else {
                $data = [
                    'nombre'  => $this->input->post('nombre')
                ];
                $result = $this->nacionalidad->update($nacionalidad->id, $data);
                if ( $result ) {
                    echo json_encode(['status' => TRUE, 'message' => 'La nacionalidad se actualizó correctamente', 'href' => site_url('nacionalidades')]);
                } else {
                    echo json_encode(['status' => FALSE, 'message' => ['Ocurrió un error al actualizar la nacionalidad']]);
                }
            }
        } else {
            render(['nacionalidad' => $nacionalidad]);
        }
    }

    public function create() {
        if ( $this->input->is_ajax_request() ) {
            if ($this->form_validation->run('create_nacionalidad') == FALSE) {
                echo json_encode(['status' => FALSE, 'message' => $this->form_validation->error_array()]);
            } else {
                $data = [
                    'id' => rand(1,10000000),
                    'nombre'  => $this->input->post('nombre')
                ];
                $result = $this->nacionalidad->set($data);
                if ( $result ) {
                    echo json_encode(['status' => TRUE, 'message' => 'La nacionalidad se creo correctamente', 'href' => site_url('nacionalidades')]);
                } else {
                    echo json_encode(['status' => FALSE, 'message' => ['Ocurrió un error al crear la nacionalidad']]);
                }
            }
        } else {
            render();
        }
    }

    public function delete($id) {
        $this->nacionalidad->delete($id);
        redirect('nacionalidades');
    }
}
