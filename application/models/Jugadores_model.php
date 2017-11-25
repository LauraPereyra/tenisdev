<?php
/**
 * Created by PhpStorm.
 * User: JuanPablo
 * Date: 27/10/2016
 * Time: 7:49
 */
class Jugadores_model extends MY_Model {
    public function __construct() {
        parent::__construct();
    }

    public function get_all($where = []){
        $this->db->from('jugador');
        if( ! empty($where)) {
            $this->db->where($where);
        }
        $query = $this->db->get();
        return $query->result();
    }

    public function get($id){
        $this->db->from('jugador');
        $this->db->where('id',$id);
        $query = $this->db->get();
        return $query->row();
    }

    public function set($data) {
        return $this->_set('jugador', $data);
    }

    public function update( $id , $data ) {
        return $this->_update('jugador', ['id' => $id], $data);
    }

    public function delete( $id ) {
        return $this->_delete('jugador', ['id' => $id]);
    }

}