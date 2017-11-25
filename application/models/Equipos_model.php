<?php

class Equipos_model extends MY_Model {
    public function __construct() {
        parent::__construct();
    }

    public function get_all(){
        $this->db->select('b.nombre as name,b.apellido,a.*,c.nombre as torneo,c.pais,c.gestion,d.nombre as nacionalidad');
        $this->db->from('equipo a');
        $this->db->join('entrenador b','a.entrenador_id = b.id');
        $this->db->join('torneo c','a.torneo_pais = c.pais and a.torneo_gestion = c.gestion');
        $this->db->join('nacionalidad d','a.nacionalidad_id = d.id');
        $query = $this->db->get();
        return $query->result();
    }

    public function get( $id, $where = [] ) {
        $where['a.id'] = $id;
        $this->db->select('b.nombre as name,b.apellido,a.*,c.nombre as torneo,c.pais,c.gestion,d.nombre as nacionalidad');
        $this->db->from('equipo a');
        $this->db->join('entrenador b','a.entrenador_id = b.id');
        $this->db->join('torneo c','a.torneo_pais = c.pais and a.torneo_gestion = c.gestion');
        $this->db->join('nacionalidad d','a.nacionalidad_id = d.id');
        $this->db->where($where);
        $query = $this->db->get();
        return $query->row();
    }

    public function set($data) {
        return $this->_set('equipo', $data);
    }

    public function update( $id , $data ) {
        return $this->_update('equipo', ['id' => $id], $data);
    }

    public function get_valid($modalidad){
        $this->db->from('equipo a');
        $this->db->where('modalidad',$modalidad);
        $query = $this->db->get();
        return $query->result();
    }


}
