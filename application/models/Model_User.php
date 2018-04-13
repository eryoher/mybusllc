<?php

class Model_User extends CI_Model {
      //Name of table in database
      private $table = "users";

      function __construct(){
        parent::__construct();
        $this->load->database();
      }

      /*
      * listUser Method
      * list all data from table users and license of bus
      */
      public function listUser(){
        $query = $this->db->query("Select * from " . $this->table);
        return $query->result();
      }

      /*
      * createUser Method
      * use to create user
      */
      public function createUser($record){
        return $this->db->insert($this->table, $record);
      }

      /*
      * login Method
      * use to crear the session and register the login
      */
      public function login($data){
        $this->db->where('username', $data['username']);
        $this->db->where('password', md5($data['password']));
        $query = $this->db->get($this->table);
        if( $query->num_rows() > 0 ){
          return true;
        }else{
          return false;
        }
      }

      /*
      * getUser Method
      * use to get one user
      */
      public function getUser($id){
        $this->db->where('id', $id);
        $query = $this->db->get($this->table);
        return $query->row();
      }

      /*
      * update Method
      * Use to update of user
      * @parameter $data >> new data
      */
      public function update($data){
        $this->db->where('id', $data['id']);
        $query = $this->db->get($this->table);
        $oldData =  $query->row();
        if( $oldData->password != $data['password'] ){
          $data['password'] = md5($data['password']); //update new password
        }
        $this->db->where('id', $data['id']);
        $this->db->update($this->table,$data);

      }
      /*
      * delete Method
      * Use to delete one user of table
      * @parameter $id >> id of user
      */

      public function delete($id){
        $this->db->where('id', $id);
        return $this->db->delete($this->table);
      }

}
