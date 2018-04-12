<?php

class Model_User extends CI_Model {

      function __construct(){
        parent::__construct();
        $this->load->database();
      }

      public function listUser(){
        $query = $this->db->query("Select * from users");
        return $query->result();
      }

      public function createUser($record){
        return $this->db->insert('users', $record);
      }

      public function login($data){
        $this->db->where('username', $data['username']);
        $this->db->where('password', md5($data['password']));
        $query = $this->db->get('users');
        if( $query->num_rows() > 0 ){
          return true;
        }else{
          return false;
        }
      }

      public function getUser($id){
        $this->db->where('id', $id);
        $query = $this->db->get('users');
        return $query->row();
      }

      public function update($data){
        $this->db->where('id', $data['id']);
        $query = $this->db->get('users');
        $oldData =  $query->row();
        if( $oldData->password != $data['password'] ){
          $data['password'] = md5($data['password']); //update new password
        }
        $this->db->where('id', $data['id']);
        $this->db->update('users',$data);

      }

      public function delete($id){
        $this->db->where('id', $id);
        return $this->db->delete('users');
      }

}
