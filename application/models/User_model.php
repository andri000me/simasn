<?php

class User_model extends CI_Model
{
    public function getmodUser(){
        $data = $this->db->get('view_user');
		return $data;
    }

    private function _updateLastLogin($nip){
        $sql = "UPDATE {$this->_table} SET last_login=now() WHERE nip={$nip}";
        $this->db->query($sql);
    }
}