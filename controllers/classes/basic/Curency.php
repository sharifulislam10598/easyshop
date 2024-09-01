<?php
    class Currency extends CurrencyModel{
     
        function form_data_collection(){
            $this->name = $_POST['name'];
            $this->url = $_POST['url'];
            $this->symbol = $_POST['symbol'];
        }

        function create(){
            $this->insert(array(
                "name" => $this->name,
                "url" => $this->url,
                "symbol" => $this->symbol
            ));

        }

        function save(){
            $response = new Response();
            $validation = (new validation())->validation([
                'name' => 'required',
                'url' => 'required',
                'symbol' => 'required'
            ]);
            if(!$validation->status){
                return $validation;
            }
            $this->form_data_collection();
            try{
                $this->create();
                $response->status = 1;
                $response->add_message("Currency saved successfuly");
            }catch(Exception $e){
                $response->add_error($e->getMessage());

            }
            return $response;
        }

        function get_Currencys(){
            return $this->retrieve("","*",array())->fetchAll();
        }

        function get_currency($id){
            $data = [
                'id' => $id
            ];
            return $this->retrieve('where id = :id','*', $data )->fetch();
        }

        function currency_update($id){
            $response = new Response();
            $validation = (new validation())->validation([
                'name' => 'required',
                'url' => 'required',
                'symbol' => 'required'
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
                    'name' => $this->name,
                    'symbol' => $this->symbol,
                    'url' => $this->url
                ],[
                    'name' => $this->name,
                    'symbol' => $this->symbol,
                    'url' => $this->url
                ]);

            $response->status = 1;
            $response->add_message('Currency update successfull');
            }catch(Exception $e){
                $response->add_error($e->getMessage());
            }
            return $response;

        }
    }