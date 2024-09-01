<?php
    use Rakit\Validation\Validator;
    class validation {
        public function validation($validation_data){
            $response = new Response();
            $validator = new Validator;
            
            // make it
         $validation = $validator->make($_POST + $_FILES, $validation_data);
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
    } 
?>
   

