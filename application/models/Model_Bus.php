<?php

class Model_Bus extends CI_Model {
      //Name of table in database
      private $table = "buses";

      function __construct(){
        parent::__construct();
        $this->load->database();
      }
      /*
      * getList Method
      * Return list of all buses, only tow field, id and license
      */
      public function getList(){
        $this->db->select('id');
        $this->db->select('license');
        $query = $this->db->get($this->table);
        return $query->result();
      }

      /*
      * listBuses Method
      * list all data from table buses
      */
      public function listBuses(){
        $query = $this->db->query("Select * from " . $this->table);
        return $query->result();
      }

      /*
      * createBus Method
      * Use to create a new bus in the system
      */
      public function createBus($record){
        return $this->db->insert($this->table, $record);
      }

      /*
      * getBus Method
      * get all data of one bus
      * @parameter $id >> id of table buses
      */
      public function getBus($id){
        $this->db->where('id', $id);
        $query = $this->db->get($this->table);
        return $query->row();
      }

      /*
      * update Method
      * use to update one record in the table buses
      * @parameter $data >> new data
      */
      public function update($data){
        $this->db->where('id', $data['id']);
        $this->db->update($this->table,$data);
      }

      /*
      * delete Method
      * delete one record of table buses
      * @parameter $id >> id of record to delete
      */
      public function delete($id){
        $this->db->where('id', $id);
        return $this->db->delete($this->table);
      }

}
