<?php
/**
 * Created by PhpStorm.
 * User: Jorge Andres
 * Date: 27/10/2016
 * Time: 09:15 AM
 */
class Nacionalidad_model extends MY_Model {
    public function __construct() {
        parent::__construct();
    }

    public function get_all(){
        $this->db->from( 'nacionalidad' );
        $query = $this->db->get();
        return $query->result();
    }

    public function get( $id ){
        $this->db->from( 'nacionalidad' );
        $this->db->where( 'id', $id );
        $query = $this->db->get();
        return $query->row();
    }

    public function set( $data = [] ) {
        return $this->_set( 'nacionalidad', $data );
    }

    public function update( $id , $data = [] ) {
        return $this->_update( 'nacionalidad', [ 'id' => $id ], $data );
    }

    public function delete( $id ) {
        return $this->_delete( 'nacionalidad', [ 'id' => $id ] );
    }

}