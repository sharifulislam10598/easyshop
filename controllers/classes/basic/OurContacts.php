<?php
    class OurContacts  extends OurContactsModel{
     
        function form_data_collection(){
            $this->address = $_POST['address'];
            $this->phone = $_POST['phone'];
            $this->fax = $_POST['fax'];
            $this->email = $_POST['email'];
            $this->skype = $_POST['skype'];
        }

        function create(){
            $this->insert(array(
                "address" => $this->address,
                "phone" => $this->phone,
                "fax" => $this->fax,
                "email" => $this->email,
                "skype" => $this->skype,
            ));
        }

        function save(){
            $response = new Response();
            $validation = (new validation())->validation([
                'address' => 'required',
                'phone' => 'required',
                'fax' => 'required',
                'email' => 'required',
                'skype' => 'required'
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
        
        function get_contacts_info(){
            return $this->retrieve("","*",[])->fetch();
        }

        // function get_about_info(){
        //     return $this->retrieve("where id = :id","*",['id' => $_POST['id']])->fetch();
        // }
        
        function contact_update(){
            $response = new Response();
            $validation = (new validation())->validation([
                'address' => 'required',
                'phone' => 'required',
                'fax' => 'required',
                'email' => 'required',
                'skype' => 'required'
            ]);
            if(!$validation->status){
                return $validation;
            }
            try{
                $this->form_data_collection();
                $this->update(["id" => $_POST['id']],
                ['address' => $this->address,
                'phone' => $this->phone,
                'fax' => $this->fax,
                'email' => $this->email,
                'skype' => $this->skype],

                ['address' => $this->address,
                'phone' => $this->phone,
                'fax' => $this->fax,
                'email' => $this->email,
                'skype' => $this->skype]);
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