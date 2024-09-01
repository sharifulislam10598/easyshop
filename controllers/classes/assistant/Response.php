<?php
    class Response{
        public $status = 0;
        public $messages = array();
        public $errors = array();
        public $data = array();

        function add_message($message){
            $this->messages[] = $message;
        }
        
        function add_error($error){
            $this->errors[] = $error;
        }
        function get_string_messages(){
            return join("<br>",$this->messages);
        }
        
        function get_string_errors(){
            return join("<br>",$this->errors);
        }

    }