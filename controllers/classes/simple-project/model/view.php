<?php

    class FileUpload{


    }



    class view extends viewModel{
        public $db_name = "test";
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
////////////////////////////////////////////////////////////////////


//////////////////////////////////////////////////////////////

function upload_files(){
    $this->image1 = (new FileUpload())->upload("uplode-img",$_FILES['image1']);
    $this->image2 = (new FileUpload())->upload("uplode-img",$_FILES['image2']);


}
function form_data_collection(){
    $this->name = $_POST['name'];
    $this->fname = $_POST['fname'];
    $this->village = $_POST['village']; 
}


        function insert($data){
            $columns = join(",",array_keys($data));
            $params = array();
            foreach($data as $key => $value){
                $params[] = ":".$key;
                unset($data[$key]);
                $data[":".$key] = $value;
            }
            $params = join(",",$params);
            $query = $this->connection->prepare("INSERT INTO demo ($columns) values ($params)");
            $query->execute($data);
        }


        function add() {
            
            $response = new Response();
            $validation = (new validation())->validation([
                'name' =>'required',
                'fname' =>'required',
                'village' =>'required',
                'image1' => 'required|uploaded_file:0,500K,png,jpeg',
                'image2' => 'required|uploaded_file:0,500K,png,jpeg'
            ]);
            if(!$validation->status){
                return $validation;
            }
            $this->form_data_collection(); 
            $this->upload_files();
            try{
                $this->insert([
                    'name' => $this->name,
                    'fname' => $this->fname,
                    'village' => $this->village,
                    'image1' => $this->image1,
                    'image2' => $this->image2
                ]);
                $response->status = 1;
                $response->add_message("Save successfully.");
            }catch(Exception $e){
                $response->add_error($e->getMessage());
            }
            return $response;
        }
////////////////////////////////////////////////////////////////
        public function show($columns, $condition, $data){
            foreach($data as $key => $value){
                $data[':'.$key] = $value;
            }
            $query = $this->connection->prepare("SELECT $columns FROM demo $condition");
            $query->execute($data);
            $query->setFetchMode(PDO::FETCH_ASSOC);
            return $query;


        }

        public function show_data(){
          return  $this->show('*', '',[])->fetchAll();
        }
//////////////////////////////////////////////////////////////
        function remove(){
            $this->delete('where id = :id', [
                "id" => $_GET['id']
            ]);
        }

        function delete($query,$data){
            foreach($data as $key => $value){
                unset($data[$key]);
                $data[":".$key] = $value;
            }
            $query = $this->connection->prepare("DELETE from demo $query");
            $query->execute($data);
        }
    

////////////////////////////////////////////////////


        function retrieve($query,$column,$data){
            foreach($data as $key => $value){
                $data[":".$key] = $value;
            }
            $query = $this->connection->prepare("SELECT  $column from demo $query");
            $query->execute($data);
            $query->setFetchMode(PDO::FETCH_ASSOC); 
            return $query;
        }

        
        function get_one($id){
            $data = [
                "id" => $id
            ];
            return $this->retrieve(" where id = :id","*",$data)->fetch();
        }

////////////////////////////////////////////////////////////////////////////
        
        function list_update(){
            $id = $_GET['id'];
            $response = new Response();
            // $validate = (new validation())->validation();
            // if(!$validate->status){
            //     return $validate;
            // }
            $this->form_data_collection();
            try{
                $this->update(
                ['id' => $id],[
                        'name' => $this->name,
                        'fname' => $this->fname,
                        'village' => $this->village
                    ],
                    [
                        'name' => $this->name,
                        'fname' => $this->fname,
                        'village' => $this->village
                    ]
                );
                $response->status = 1;
                $response->add_message("Language saved successfuly");
            }catch(Exception $e){
                $response->add_error($e->getMessage());

            }
            return $response;
        }
    

        function update($id,$change_data, $query_data){
            foreach($query_data as $key => $value){
                $query_data[":".$key] = $value;
            }
            foreach($id as $key=> $value){
                $query_data[":".$key] = $value;
            }

            $update_strings = array();
            foreach($change_data as $key => $value){
                $update_strings[] = $key." = :".$key;
                $query_data[":".$key] = $value;
                
            }
            $update_data = join(',', array_keys($update_strings));
            $query = $this->connection->prepare("UPDATE demo SET $update_data where id =:id");
            $query->execute($query_data);
        }
 ////////////////////////////////////////////////////////
















    }
















?>