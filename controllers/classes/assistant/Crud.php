<?php
    class Crud{
        public $db_name = "supershop";
        public $user_name = "root";
        public $password = "";
        public $hostname = "localhost";
        public $connection;

        function __construct()
        {
            try {
                $conn = new PDO("mysql:host=".$this->hostname.";dbname=".$this->db_name, $this->user_name, $this->password);
                // set the PDO error mode to exception
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->connection = $conn;

              } catch(PDOException $e) {
                echo "connection failed: " . $e->getMessage();
                die();
              }
        }

        public function get_table_name(){
            return strtolower($this->get_parent_class_name());
        }

        public function get_parent_class_name() {
            $reflection = new ReflectionClass($this);
            return $reflection->getName(); // Returns "LanguageModel"
        }

        function insert($data){
            $keys = join(",",array_keys($data));
            $params = array();
            foreach($data as $key => $value){
                $params[] = ":".$key;
                unset($data[$key]);
                $data[":".$key] = $value;
            }
            $params = join(",",$params);
            $query = $this->connection->prepare("INSERT INTO ".$this->get_table_name()." ($keys) values($params)");
            $query->execute($data);

        }


        function retrieve($query,$column,$data){
            foreach($data as $key => $value){
                unset($data[$key]);
                $data[":".$key] = $value;
            }
            $query = $this->connection->prepare("SELECT  $column from ".$this->get_table_name()." $query");
            // $query = $this->connection->prepare("SELECT  items.*, categorys.name from items left join categorys on items.category=categorys.id");
            $query->execute($data);
            $query->setFetchMode(PDO::FETCH_ASSOC); 
            return $query;
        }
        
        function delete($query,$data){
            foreach($data as $key => $value){
                unset($data[$key]);
                $data[":".$key] = $value;
            }
            $query = $this->connection->prepare("DELETE from ".$this->get_table_name()." $query");
            $query->execute($data);
        }

        
        function update($id,$change_data, $query_data){
            foreach($query_data as $key => $value){
                unset($query_data[$key]);
                $query_data[":".$key] = $value;
            }
            foreach($id as $key => $value){
                $query_data[":".$key] = $value;
            }
            $update_strings = array();
            foreach($change_data as $key => $value){
                $update_strings[] = $key." = :".$key;
            }
            $update_statement = join(',',$update_strings);
            $query = $this->connection->prepare("UPDATE " .$this->get_table_name()." SET $update_statement where id = :id");
            $query->execute($query_data);
        }



























        
        // function retrieve_value($columns, $conditions){
        //     $conditions = join(",", array_keys($conditions));

        // }

        // function update($data, $conditions){

        //     $query = $this->connection->prepare("UPDATE ". $this->get_table_name()." SET $columns ='$value' WHERE ");
        //     $query->execute($data);
        // }


    }

