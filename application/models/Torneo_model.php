<?php
/**
 * Created by PhpStorm.
 * User: Jorge Andres
 * Date: 27/10/2016
 * Time: 09:15 AM
 */
class Torneo_model extends MY_Model {
    public function __construct() {
        parent::__construct();
    }

    public function get_all(){
        $this->db->from( 'torneo' );
        $query = $this->db->get();
        return $query->result();
    }

    public function get( $pais,$gestion ){
        //test($gestion);
        $this->db->from( 'torneo' );
        $this->db->where(['pais' => $pais, 'gestion' => $gestion  ]);
        $query = $this->db->get();
        return $query->row();
    }

    public function set( $data = [] ) {
        return $this->_set( 'torneo', $data );
    }

    public function update( $pais,$gestion , $data = [] ) {
        return $this->_update( 'torneo', [ 'pais' => $pais , 'gestion' =>$gestion], $data );
    }

    public function delete( $pais,$gestion ) {
        return $this->_delete( 'torneo', [ 'pais' => $pais , 'gestion' =>$gestion] );
    }

}