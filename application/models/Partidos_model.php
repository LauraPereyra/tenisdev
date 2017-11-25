<?php
/**
 * Created by PhpStorm.
 * User: Jorge Andres
 * Date: 27/10/2016
 * Time: 09:15 AM
 */
class Partidos_model extends MY_Model {
    public function __construct() {
        parent::__construct();
    }

    public function get_all(){
        $this->db->select('b.nombre as fase,a.*,c.nombre as arbitro_n, c.apellido as arbitro_a');
        $this->db->from('partido a');
        $this->db->join('fases b','a.fases_id = b.id');
        $this->db->join('arbitro c','a.arbitro_id = c.id');
        $query = $this->db->get();
        return $query->result();
    }

    public function get($id){
        $this->db->select('b.nombre as fase,a.*,c.nombre as arbitro');
        $this->db->from('partido a');
        $this->db->join('fases b','a.fases_id = b.id');
        $this->db->join('arbitro c','a.arbitro_id = c.id');
        $this->db->where('a.id',$id);
        $query = $this->db->get();
        return $query->row();
    }

    public function set( $data = [] ) {
        return $this->_set( 'partido', $data );
    }

    public function update( $id , $data = [] ) {
        return $this->_update( 'partido', [ 'pais' => $id], $data );
    }

    public function delete( $pais,$gestion ) {
        return $this->_delete( 'partido', [ 'pais' => $pais , 'gestion' =>$gestion] );
    }

    public function register( $data = [] ) {
        return $this->_set( 'equipo_partido', $data );
    }


    function count_teams($id){
        $this->db->from('equipo_partido');
        $this->db->where('partido_id',$id);
        $query = $this->db->get();
        return $query->num_rows();
    }

    function get_team($id){
        $this->db->from('equipo_partido a');
        $this->db->join('equipo b','a.equipo_id = b.id');
        $this->db->where('partido_id',$id);
        $query = $this->db->get();
        return $query->result();
    }

}