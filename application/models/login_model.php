<?php
class Login_model extends CI_Model{
    function auth_user($username,$password){
        $query=$this->db->query("SELECT * FROM user WHERE username='$username' AND password='$password' LIMIT 1");
        return $query;
    }
}