<?php
    class ProductFeature extends ProductFeatureModel{
     
        function form_data_collection(){
            $this->features = $_POST['features'];
            $this->value = $_POST['value'];
        }

        function create(){
            // $this->features = join(',', $this->features);
            // $this->value = join(',', $this->value);
            $feature_info = [];
            foreach($this->features as $index_1 => $value_1){
                foreach($this->value as $index_2 => $value_2){
                    if($index_1 == $index_2){
                        $feature_info[] = [
                            'features' => $value_1,
                            'value' => $value_2
                        ];
                    }
                }
            }
            foreach($feature_info as $value){
                $this->insert(array(
                     "features" => $value['features'],
                     "value" => $value['value']
                 ));
            }
            // print_r($this->features);
            // $this->insert(array(
            //    "product_id"=>$this->product_id,
            //     "features" => $this->features,
            //     "value" => $this->value,
            // ));
        }

        function save(){
            $response = new Response();
            $validation = (new validation())->validation([
            ]);
            if(!$validation->status){
                return $validation;
            }
            $this->form_data_collection();
            try{
                $this->create();
                $response->status = 1;
                $response->add_message("Sidebar saved successfuly");
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
                $response->add_message("Sidebar delete successfuly");
            }catch(Exception $e){
                $response->add_error($e->getMessage());
            }
            return $response;
        }

        function get_sidebars(){
            return $this->retrieve("","*",array())->fetchAll();
        }

        function get_sidebar($id){
            $data = [
                "id" => $id
            ];
            return $this->retrieve(" where id = :id","*",$data)->fetch();
        }

        function product_feature_update($id){
            
            $response = new Response();
            $validation = (new validation())->validation([
                'features' => 'required',
                'value' => 'required'
            ]);
            if(!$validation->status){
                return $validation;
            }
            $this->form_data_collection();
            $this->features = join(',', $this->features);
            $this->value = join(',', $this->value);
            try{
                $this->update([
                    "id" => $id
                ]
                ,[
                    "product_id"=>$this->product_id,
                    "features" => $this->features,
                    "value" => $this->value,
                ],[
                    "product_id"=>$this->product_id,
                    "features" => $this->features,
                    "value" => $this->value,
                ]);
            $response->status = 1;
            $response->add_message('update successfull');
            }catch(Exception $e){
                $response->add_error($e->getMessage());
            }
            return $response;

        }



    }