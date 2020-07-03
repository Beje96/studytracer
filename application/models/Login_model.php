<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

    public function cek_user($username, $password)
    {
        $where = array(
            'username' => $username,
            'password' => $password
        );  

        $this->db->where($where);
        return $this->db->get('user');
    }
}
