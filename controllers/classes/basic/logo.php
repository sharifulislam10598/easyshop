 <?php
    class logo extends logoModel{
     
        function create(){
            $this->insert(array(
                "image" => $this->image,
            ));
        }

        function save(){
            $response = new Response();
            $validation = (new validation())->validation([
                'image' => 'required|uploaded_file:0,500K,png,jpeg'
            ]);
            if(!$validation->status){
                return $validation;
            }

            try{
                $this->image = $this->upload("uplode-img/logo", $_FILES['image']);
                $this->create();
                $response->status = 1;
                $response->add_message("Language saved successfuly");
            }catch(Exception $e){
                $response->add_error($e->getMessage());
            }
            return $response;
        }
        
        function make_folder($folder_name){
            if(!file_exists(ROOT_DIRECTORY.'/'.$folder_name)){
                mkdir(ROOT_DIRECTORY.'/'.$folder_name, 0775, true);
            }
        }
        function upload($folder_name,$input){
            $this->make_folder($folder_name);
            $destination = $folder_name ."/".$input['name'];
            move_uploaded_file($input['tmp_name'], '../'.$destination);
            return $destination;
        }

        function get_logo(){
            return $this->retrieve("","*",[])->fetch();
        }
        
        function logo_update(){
            $response = new Response();
            $validation = (new validation())->validation([
                'image' => 'required|uploaded_file:0,500K,png,jpeg'
            ]);
            if(!$validation->status){
                return $validation;
            }
            try{
                $this->image = $this->upload("uplode-img/logo", $_FILES['image']);
                $this->update(["id" => $_POST['id']],['image' => $this-> image], ['image' => $this-> image]);
                $response->status = 1;
                $response->add_message('language update successfull');
            }catch(Exception $e){
                $response->add_error($e->getMessage());
            }
            return $response;
        }

    }

?>