<?php
    class AboutUs  extends AboutUsModel{
     
        function form_data_collection(){
            $this->title = $_POST['title'];
            $this->article_1 = $_POST['article_1'];
            $this->article_2 = $_POST['article_2'];
        }

        function create(){
            $this->insert(array(
                "title" => $this->title,
                "article_1" => $this->article_1,
                "article_2" => $this->article_2
            ));
        }

        function save(){
            $response = new Response();
            $validation = (new validation())->validation([
                'title' => 'required',
                'article_1' => 'required'
            ]);
            if(!$validation->status){
                return $validation;
            }

            try{
                $this->form_data_collection();
                $this->create();
                $response->status = 1;
                $response->add_message("saved successfuly");
            }catch(Exception $e){
                $response->add_error($e->getMessage());
            }
            return $response;
        }
        
        function get_about_info(){
            return $this->retrieve("","*",[])->fetch();
        }

        // function get_about_info(){
        //     return $this->retrieve("where id = :id","*",['id' => $_POST['id']])->fetch();
        // }
        
        function about_update(){
            $response = new Response();
            $validation = (new validation())->validation([
                'title' => 'required',
                'article_1' => 'required'
            ]);
            if(!$validation->status){
                return $validation;
            }
            try{
                $this->form_data_collection();
                $this->update(["id" => $_POST['id']],['title' => $this->title,'article_1' => $this->article_1,'article_2' => $this->article_2], ['title' => $this->title,'article_1' => $this->article_1,'article_2' => $this->article_2]);
                $response->status = 1;
                $response->add_message('update successfull');
            }catch(Exception $e){
                $response->add_error($e->getMessage());
            }
            return $response;
        }

        function remove(){
            $response = new Response();
            try{
                $this->delete("where id = :id ",array(
                    "id" => $_GET['id']
                ));
                $response->status = 1;
                $response->add_message("delete successfuly");
            }catch(Exception $e){
                $response->add_error($e->getMessage());
            }
            return $response;
        }
    }

?>