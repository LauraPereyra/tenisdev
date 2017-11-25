<?php
/**
 * Created by PhpStorm.
 * User: JuanPablo
 * Date: 27/10/2016
 * Time: 2:39
 */
class Arbitros_model extends MY_Model {
    public function __construct() {
        parent::__construct();
    }

    public function get_arbitros(){
        $this->db->from('arbitro');
        $query = $this->db->get();
        return $query->result();
    }

    public function get($id){
        $this->db->from('arbitro');
        $this->db->where('id',$id);
        $query = $this->db->get();
        return $query->row();
    }

    public function set($data) {
        return $this->_set('arbitro', $data);
    }

    public function update( $id , $data ) {
        return $this->_update('arbitro', ['id' => $id], $data);
    }

    public function delete( $id ) {
        return $this->_delete('arbitro', ['id' => $id]);
    }

}