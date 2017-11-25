<?php defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Model extends CI_Model 
{
    public function __construct() {
        parent::__construct();
    }
    
    protected function _build_from($data) 
    {
        
    }

    protected function _set($table, $data){
        //empezamos una transacción
        $this->db->trans_start();
        $this->db->insert($table, $data);
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
        }else{
            $this->db->trans_commit();
        }
        return $this->db->trans_status();
    }
    
    protected function _update($table, $where, $data)
    {
        $this->db->trans_start();
        $this->db->where($where);
        $this->db->update($table, $data);
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
        }else{
            $this->db->trans_commit();
        }
        return $this->db->trans_status();
    }

    protected function _delete($table, $where){
        $this->db->trans_start();
        $this->db->where($where);
        $this->db->delete($table);
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
        }else{
            $this->db->trans_commit();
        }
        return $this->db->trans_status();
    }
    
}

