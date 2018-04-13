<?php

class Model_Route extends CI_Model {
      //Name of table in database
      private $table = "routes";

      function __construct(){
        parent::__construct();
        $this->load->database();
      }

      /*
      * Method listRoutes
      * list all data from table routes and license of bus
      */
      public function listRoutes(){
        $query = $this->db->query("Select r.id,  r.name, r.city_origin, r.city_destiny, r.value, bu.license from " . $this->table . " r LEFT join buses bu on r.bus_id = bu.id order by r.id");
        return $query->result();
      }


      /*
      * Method createRoute
      * Create the route and the inverse route
      */
      public function createRoute($record){
        $record2['name'] = $record['city_destiny']."-".$record['city_origin'];
        $record2['city_origin'] = $record['city_destiny'];
        $record2['city_destiny'] = $record['city_origin'];
        $record2['value'] =  $record['value'];
        $record2['bus_id'] =  $record['bus_id'];
        $this->db->insert($this->table, $record);
        $this->db->insert($this->table, $record2);
      }

      /*
      * Method getRoute
      * Get all data of one route
      * Parameters $id >> id of route
      */
      public function getRoute($id){
        $this->db->where('id', $id);
        $query = $this->db->get($this->table);
        return $query->row();
      }

      /*
      * Method validateRoute
      * Use to validate of this route doesn't exits in database
      * Parameters $origin >> origin city
      * Parameters $destination >> destination city
      */
      public function validateRoute($origin, $destination){
        $this->db->where('city_origin', $origin);
        $this->db->where('city_destiny', $destination);
        $data = $this->db->get($this->table);
        if(empty($data->row()) ){
          return true;
        }

        return false;
      }

      /*
      * Method getPathRoutes
      * Use to get all routes of database
      */
      public function getPathRoutes(){
        $query = $this->db->query("Select r.id,  r.name, r.city_origin, r.city_destiny, r.value, bu.license from " . $this->table . " r LEFT join buses bu on r.bus_id = bu.id");
        return $this->orderData( $query->result() );
      }

      /*
      * Method getListCities
      * Use to get one lists of the cities
      * Parameters $city >> field name of database
      */
      public function getListCities($city){
          $this->db->select($city);
          $query = $this->db->get($this->table);
          $result = $query->result();
          $data[] = 'Select a City...';
          foreach ($result as $key => $value) {
            $data[$value->$city] = $value->$city;
          }
          return $data;
      }

      /*
      * Method orderData
      * Use order of data and return array with origin city like a key
      * Parameters $routes >> Object data with all cities
      */
      private function orderData($routes){
        $result = [];
        foreach ($routes as $key => $route) {
          $result[$route->city_origin][] =  ['node' => $route->city_destiny, "name" => $route->name, "price" => $route->value, "bus" => $route->license];
        }
        return $result;

      }

      /*
      * Method update
      * Use to Update one record of table
      * Parameters $data >> new data to save
      */
      public function update($data){
        $this->db->where('id', $data['id']);
        $this->db->update($this->table,$data);
      }

      /*
      * Method delete
      * Use to delete one record of table
      * Parameters $id >> id of record to delete.
      */
      public function delete($id){
        $this->db->where('id', $id);
        return $this->db->delete($this->table);
      }

}
