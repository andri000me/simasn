<?php

class Users_model extends CI_Model
{
    private $_table = "mod_user";

    public function doLogin(){
		$post = $this->input->post();

        // cari user berdasarkan email dan username
        $this->db->where('email', $post["username"])
                    ->or_where('username', $post["username"]);
        $user = $this->db->get($this->_table)->row();

        // jika user terdaftar
        if($user){
            // periksa password-nya
            $isPasswordTrue = password_verify($post["password"], $user->password);
            // periksa role-nya
            $isAdmin = $user->role == "admin";

            // jika password benar dan dia admin
            if($isPasswordTrue && $isAdmin){ 
                // login sukses yay!
                $this->session->set_userdata(['user_logged' => $user]);
                $this->_updateLastLogin($user->nip);
                return true;
            }
        }
        
        // login gagal
		return false;
    }

    public function isNotLogin(){
        return $this->session->userdata('user_logged') === null;
    }

    private function _updateLastLogin($nip){
        $sql = "UPDATE {$this->_table} SET last_login=now() WHERE nip={$nip}";
        $this->db->query($sql);
    }

}