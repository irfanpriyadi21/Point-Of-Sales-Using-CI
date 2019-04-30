<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class m_crud extends CI_Model{

    public function save($table, $data){
        $this->db->insert($table, $data);
    }
    public function view($table){
        return $this->db->get($table)->result_array();
    }
    public function Viewget($table, $field, $id){
      $this->db->where($field, $id);
      return $this->db->get($table)->row_array();
    }
    public function delete($table, $field, $id){
      $this->db->where($field, $id);
      return $this->db->delete($table);
    }
    public function update($table, $field,   $id, $data){
      $this->db->where($field, $id);
      return $this->db->update($table, $data);
    }
    public function Viewwhere($table, $field, $id){
      $this->db->where($field, $id);
      return $this->db->get($table)->result_array();
    }
    // public function jumlahuser(){
    //   $sql = "SELECT count(username) as username FROM pengguna";
    //   $result = $this->db->query($sql);
    //   return $result->row()->username;
    // }
    public function Viewwhere2($table, $field = [], $id = []){
      // $this->db->where($field[0], $id[0]);
      // $this->db->where($field[1], $id[1]);
      $count = count($field);
      for($i = 0;$i < $count;$i++){
        $this->db->where($field[$i], $id[$i]);
      }
      return $this->db->get($table)->row_array();
    }
}