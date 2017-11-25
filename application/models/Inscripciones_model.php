<?php
/**
 * Created by PhpStorm.
 * User: JuanPablo
 * Date: 27/10/2016
 * Time: 2:39
 */
class Inscripciones_model extends MY_Model {
    public function __construct() {
        parent::__construct();
    }

    public function get_all(){
        $this->db->select("b.nombre, b.apellido, c.nombre as equipo, a.ganancia_torneo");
        $this->db->from('inscripcion a');
        $this->db->join('jugador b','a.jugador_id = b.id');
        $this->db->join('equipo c','a.equipo_id = c.id');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_by_equipo($id) {
        $this->db->select('b.nombre, b.apellido, b.genero, c.nombre as equipo');
        $this->db->from('inscripcion a');
        $this->db->join('jugador b','a.jugador_id = b.id');
        $this->db->join('equipo c','a.equipo_id = c.id');
        $this->db->where('a.equipo_id',$id);
        $query = $this->db->get();
        return $query->result();
    }

    public function get($id){
        $$this->db->select('b.nombre as jugador, c.nombre as equipo, a.ganancia_torneo');
        $this->db->from('inscripcion a');
        $this->db->join('jugador b','a.jugador_id = b.id');
        $this->db->join('equipo c','a.equipo_id = c.id');
        $this->db->where('id',$id);
        $query = $this->db->get();
        return $query->row();
    }



    public function set($data) {
        return $this->_set('inscripcion', $data);
    }

    public function update( $id_jug,$id_equipo , $data ) {
        return $this->_update('inscripcion', ['jugador_id' => $id_jug,'equipo_id' => $id_equipo ], $data);
    }

    public function delete( $id ) {
        return $this->_delete('inscripcion', ['id' => $id]);
    }

}
