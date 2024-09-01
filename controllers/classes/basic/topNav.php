<?php 
    use Rakit\Validation\Validator;
    class topNav extends topNavModel{

        function form_data_collection(){
            $this->name  = $_POST['name'];
            $this->url = $_POST['url'];
        }

        function create(){
            $this->insert([
                "name" => $this->name,
                "url" => $this->url
            ]);
        }


    public function validation(){
        $response = new Response();
        
        $validator = new Validator;

        // make it
        $validation = $validator->make($_POST + $_FILES, [
            'name'                  => 'required',
            'url'                   => 'required'
        ]);

        // then validate
        $validation->validate();

        if ($validation->fails()) {
            // handling errors
            $errors = $validation->errors()->all();

            $response->errors = $errors;
         
        } else {
            $response->status = 1;
        }
        return $response;
    }




     public function save(){
            $response = new Response();
            $this->form_data_collection();
            $validate = $this->validation();
            if(!$validate->status){
                return $validate;
            }
            try{
                $this->create();
                $response->status = 1;
                $response->add_message("Save successfully.");
            }catch(Exception $e){
                $response->add_error($e->getMessage()) ;
            }
            return $response;

        }



        function remove(){
            $this->delete('where id = :id', [
                "id" => $_GET['id']
            ]);
        }

        function get_navs(){
         return   $this->retrieve('','*',[])->fetchAll();
        }


        function nav_update($id){
            $response = new Response();
            $validation = (new validation())->validation([
                'name' => 'required',
                'url' => 'required'
            ]);
            if(!$validation->status){
                return $validation;
            }
            $this->form_data_collection();
            try{
                $this->update(
                    [
                        'id' => $id
                    ],[
                        'name' => $this->name,
                        'url' => $this->url
                    ],
                    [
                        'name' => $this->name,
                        'url' => $this->url
                    ]
                );
                $response->status = 1;
                $response->add_message("Language saved successfuly");
            }catch(Exception $e){
                $response->add_error($e->getMessage());

            }
            return $response;
        }
        

           function get_nav($id){
            $data = [
                "id" => $id
            ];
            return $this->retrieve(" where id = :id","*",$data)->fetch();
        }
   














    }
