<?php
    class Sticker extends StickerModel{
     
        function form_data_collection(){
            $this->sticker = $_POST['sticker'];
        }

        function create(){
            $this->insert(array(
                "sticker" => $this->sticker,
            ));
        }

        function save(){
            $response = new Response();
            $validation = (new validation())->validation([
                'sticker' => 'required',
            ]);
            if(!$validation->status){
                return $validation;
            }
            $this->form_data_collection();
            try{
                $this->create();
                $response->status = 1;
                $response->add_message("sticker saved successfuly");
            }catch(Exception $e){
                $response->add_error($e->getMessage());
            }
            return $response;
        }
        
        function remove(){
            $response = new Response();
            try{
                $this->delete("where id = :id ",array(
                    "id" => $_GET['stickerid']
                ));
                $response->status = 1;
                $response->add_message("sticker delete successfuly");
            }catch(Exception $e){
                $response->add_error($e->getMessage());
            }
            return $response;
        }

        function get_stickers(){
            return $this->retrieve("","*",array())->fetchAll();
        }

        function get_sticker(){
            return $this->retrieve(" where id = :id","*",['id' => $_GET['id']])->fetch();
        }

        function sticker_update($id){
            $response = new Response();
            $validation = (new validation())->validation([
                'sticker' => 'required',
            ]);
            if(!$validation->status){
                return $validation;
            }
            $this->form_data_collection();
            try{
                $this->update([
                    "id" => $id
                ]
                ,[
                    'sticker' => $this->sticker,
                ],[
                    'sticker' => $this->sticker,
                ]);

            $response->status = 1;
            $response->add_message('language update successfull');
            }catch(Exception $e){
                $response->add_error($e->getMessage());
            }
            return $response;

        }



    }