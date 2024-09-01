<?php
    class Slider extends SliderModel{

     // slider item four start..............
        function form_data_collection_four(){
            $this->first_line = $_POST['first_line'];
            $this->first_line_color = $_POST['first_line_color'];
            $this->second_line = $_POST['second_line'];
            $this->second_line_color = $_POST['second_line_color'];
            $this->third_line = $_POST['third_line'];
            $this->third_line_color = $_POST['third_line_color'];
            $this->subtitle_1 = $_POST['subtitle_1'];
            $this->slider_item = $_POST['slider_item'];
        }

        function create_item_four(){
            $this->insert(array(
                'first_line' => $this->first_line,
                'first_line_color' => $this->first_line_color,
                'second_line' => $this->second_line,
                'second_line_color' => $this->second_line_color,
                'third_line' => $this->third_line,
                'third_line_color' => $this->third_line_color,
                'subtitle_1' => $this->subtitle_1,
                'background_img' => $this->background_img,
                'slider_item' => $this->slider_item
            ));
        }

        function save_item_four(){
            $response = new Response();
            $validation = (new validation())->validation([
                'first_line'=> 'required',
                'second_line'=> 'required',
                'third_line'=> 'required',
                'subtitle_1'=> 'required',
                'background_img' => 'required|uploaded_file:0,500K,png,jpeg'
            ]);
            if(!$validation->status){
                return $validation;
            }
            try{
                $this->form_data_collection_four();
                $this->background_img = $this->upload("uplode-img/slider-img", $_FILES['background_img']);
                $this->create_item_four();
                $response->status = 1;
                $response->add_message("saved successfuly");
            }catch(Exception $e){
                $response->add_error($e->getMessage());
            }
            return $response;
        }
        
        function get_sliders_item_four(){
            return $this->retrieve("where slider_item = :slider_item","*",["slider_item" => 4])->fetchAll();
        }

        function get_slider_item_four(){
            return $this->retrieve("where id = :id","*",['id' => $_GET['id']])->fetch();
        }


        function slider_update_item_four(){
            $response = new Response();
            $validation = (new validation())->validation([
                'first_line'=> 'required',
                'second_line'=> 'required',
                'third_line'=> 'required',
                'subtitle_1'=> 'required'
            ]);
            if(!$validation->status){
                return $validation;
            }
            try{
                $this->form_data_collection_four();
                $this->img_update_for_item_four();
                $this->update(['id' => $_POST['id']],
                [
                    'first_line' => $this->first_line,
                    'first_line_color' => $this->first_line_color,
                    'second_line' => $this->second_line,
                    'second_line_color' => $this->second_line_color,
                    'third_line' => $this->third_line,
                    'third_line_color' => $this->third_line_color,
                    'subtitle_1' => $this->subtitle_1,
                    'background_img' => $this->background_img,
                    'slider_item' => $this->slider_item
                ], 
                [
                    'first_line' => $this->first_line,
                    'first_line_color' => $this->first_line_color,
                    'second_line' => $this->second_line,
                    'second_line_color' => $this->second_line_color,
                    'third_line' => $this->third_line,
                    'third_line_color' => $this->third_line_color,
                    'subtitle_1' => $this->subtitle_1,
                    'background_img' => $this->background_img,
                    'slider_item' => $this->slider_item
                ]);
                $response->status = 1;
                $response->add_message('update successfull');
            }catch(Exception $e){
                $response->add_error($e->getMessage());
            }
            return $response;
        }
        function img_update_for_item_four(){
            if($_FILES['background_img']['size'] === 0){
                $img_info = $this->get_slider_item_four();
                $this->background_img = $img_info['background_img'];
                
            }else{
                $this->background_img = $this->upload("uplode-img/slider-img", $_FILES['background_img']);  
               
            }
        }
    // end slide style four..................
    
    // slide style five start...............
    function form_data_collection_five(){
        $this->first_line = $_POST['first_line'];
        $this->first_line_color = $_POST['first_line_color'];
        $this->subtitle_1 = $_POST['subtitle_1'];
        $this->subtitle_2 = $_POST['subtitle_2'];
        $this->button_text = $_POST['button_text'];
        $this->url = $_POST['url'];
        $this->slider_item = $_POST['slider_item'];
    }

    function create_item_five(){
        $this->insert(array(
            'first_line' => $this->first_line,
            'first_line_color' => $this->first_line_color,
            'subtitle_1' => $this->subtitle_1,
            'subtitle_2' => $this->subtitle_2,
            'button_text' => $this->button_text,
            'url' => $this->url,
            'center_img' => $this->center_img,
            'background_img' => $this->background_img,
            'slider_item' => $this->slider_item
        ));
    }

    function save_item_five(){
        $response = new Response();
        $validation = (new validation())->validation([
            'first_line'=> 'required',
            'subtitle_1'=> 'required',
            'background_img' => 'required|uploaded_file:0,500K,png,jpeg'
        ]);
        if(!$validation->status){
            return $validation;
        }
        try{
            $this->form_data_collection_five();
            $this->center_img = $this->upload("uplode-img/slider-img", $_FILES['center_img']);
            $this->background_img = $this->upload("uplode-img/slider-img", $_FILES['background_img']);
            $this->create_item_five();
            $response->status = 1;
            $response->add_message("saved successfuly");
        }catch(Exception $e){
            $response->add_error($e->getMessage());
        }
        return $response;
    }

    function get_sliders_item_five(){
        return $this->retrieve("where slider_item = :slider_item","*",["slider_item" => 5])->fetchAll();
    }

    function get_slider_item_five(){
        return $this->retrieve("where id = :id","*",['id' => $_GET['id']])->fetch();
    }

    function slider_update_item_five(){
        $response = new Response();
        $validation = (new validation())->validation([
            'first_line'=> 'required',
            'subtitle_1'=> 'required'
        ]);
        if(!$validation->status){
            return $validation;
        }
        try{
            $this->form_data_collection_five();
            $this->img_update_for_item_five();
            $this->update(['id' => $_POST['id']],
            [
                'first_line' => $this->first_line,
                'first_line_color' => $this->first_line_color,
                'subtitle_1' => $this->subtitle_1,
                'subtitle_2' => $this->subtitle_2,
                'button_text' => $this->button_text,
                'url' => $this->url,
                'center_img' => $this->center_img,
                'background_img' => $this->background_img,
                'slider_item' => $this->slider_item
            ], 
            [
                'first_line' => $this->first_line,
                'first_line_color' => $this->first_line_color,
                'subtitle_1' => $this->subtitle_1,
                'subtitle_2' => $this->subtitle_2,
                'button_text' => $this->button_text,
                'url' => $this->url,
                'center_img' => $this->center_img,
                'background_img' => $this->background_img,
                'slider_item' => $this->slider_item
            ]);
            $response->status = 1;
            $response->add_message('update successfull');
        }catch(Exception $e){
            $response->add_error($e->getMessage());
        }
        return $response;
    }

    function img_update_for_item_five(){
        $img_info = $this->get_slider_item_five();
        if($_FILES['background_img']['size'] === 0){
            $this->background_img = $img_info['background_img'];
        }else{ 
            $this->background_img = $this->upload("uplode-img/slider-img", $_FILES['background_img']);   
        }

        if($_FILES['center_img']['size'] === 0){
            $this->center_img = $img_info['center_img'];
        }else{
            $this->center_img = $this->upload("uplode-img/slider-img", $_FILES['center_img']); 
        }
    }

    // end slide style five...............

    // start slide style six...........
    function form_data_collection_six(){
        $this->first_line = $_POST['first_line'];
        $this->first_line_color = $_POST['first_line_color'];
        $this->second_line = $_POST['second_line'];
        $this->second_line_color = $_POST['second_line_color'];
        $this->third_line = $_POST['third_line'];
        $this->third_line_color = $_POST['third_line_color'];
        $this->slider_item = $_POST['slider_item'];
    }

    function create_item_six(){
        $this->insert(array(
            'first_line' => $this->first_line,
            'first_line_color' => $this->first_line_color,
            'second_line' => $this->second_line,
            'second_line_color' => $this->second_line_color,
            'third_line' => $this->third_line,
            'third_line_color' => $this->third_line_color,
            'background_img' => $this->background_img,
            'slider_item' => $this->slider_item
        ));
    }

    function save_item_six(){
        $response = new Response();
        $validation = (new validation())->validation([
            'first_line'=> 'required',
            'second_line'=> 'required',
            'third_line'=> 'required',
            'background_img' => 'required|uploaded_file:0,500K,png,jpeg'
        ]);
        if(!$validation->status){
            return $validation;
        }
        try{
            $this->form_data_collection_six();
            $this->background_img = $this->upload("uplode-img/slider-img", $_FILES['background_img']);
            $this->create_item_six();
            $response->status = 1;
            $response->add_message("saved successfuly");
        }catch(Exception $e){
            $response->add_error($e->getMessage());
        }
        return $response;
    }
    
    function get_sliders_item_six(){
        return $this->retrieve("where slider_item = :slider_item","*",["slider_item" => 6])->fetchAll();
    }

    function get_slider_item_six(){
        return $this->retrieve("where id = :id","*",['id' => $_GET['id']])->fetch();
    }


    function slider_update_item_six(){
        $response = new Response();
        $validation = (new validation())->validation([
            'first_line'=> 'required',
            'second_line'=> 'required',
            'third_line'=> 'required',
        ]);
        if(!$validation->status){
            return $validation;
        }
        try{
            $this->form_data_collection_six();
            $this->img_update_for_item_six();
            $this->update(['id' => $_POST['id']],
            [
                'first_line' => $this->first_line,
                'first_line_color' => $this->first_line_color,
                'second_line' => $this->second_line,
                'second_line_color' => $this->second_line_color,
                'third_line' => $this->third_line,
                'third_line_color' => $this->third_line_color,
                'background_img' => $this->background_img,
                'slider_item' => $this->slider_item
            ], 
            [
                'first_line' => $this->first_line,
                'first_line_color' => $this->first_line_color,
                'second_line' => $this->second_line,
                'second_line_color' => $this->second_line_color,
                'third_line' => $this->third_line,
                'third_line_color' => $this->third_line_color,
                'background_img' => $this->background_img,
                'slider_item' => $this->slider_item
            ]);
            $response->status = 1;
            $response->add_message('update successfull');
        }catch(Exception $e){
            $response->add_error($e->getMessage());
        }
        return $response;
    }
    function img_update_for_item_six(){
        if($_FILES['background_img']['size'] === 0){
            $img_info = $this->get_slider_item_six();
            $this->background_img = $img_info['background_img'];
            
        }else{
            $this->background_img = $this->upload("uplode-img/slider-img", $_FILES['background_img']);  
           
        }
    }
    // end slide style six.............
    
    // start slide style seven..............
    function form_data_collection_seven(){
        $this->first_line = $_POST['first_line'];
        $this->first_line_color = $_POST['first_line_color'];
        $this->second_line = $_POST['second_line'];
        $this->second_line_color = $_POST['second_line_color'];
        $this->button_text = $_POST['button_text'];
        $this->url = $_POST['url'];
        $this->slider_item = $_POST['slider_item'];
    }

    function create_item_seven(){
        $this->insert(array(
            'first_line' => $this->first_line,
            'first_line_color' => $this->first_line_color,
            'second_line' => $this->second_line,
            'second_line_color' => $this->second_line_color,
            'button_text' => $this->button_text,
            'url' => $this->url,
            'background_img' => $this->background_img,
            'slider_item' => $this->slider_item
        ));
    }

    function save_item_seven(){
        $response = new Response();
        $validation = (new validation())->validation([
            'first_line'=> 'required',
            'second_line'=> 'required',
            'background_img' => 'required|uploaded_file:0,500K,png,jpeg'
        ]);
        if(!$validation->status){
            return $validation;
        }
        try{
            $this->form_data_collection_seven();
            $this->background_img = $this->upload("uplode-img/slider-img", $_FILES['background_img']);
            $this->create_item_seven();
            $response->status = 1;
            $response->add_message("saved successfuly");
        }catch(Exception $e){
            $response->add_error($e->getMessage());
        }
        return $response;
    }
    
    function get_sliders_item_seven(){
        return $this->retrieve("where slider_item = :slider_item","*",["slider_item" => 7])->fetchAll();
    }

    function get_slider_item_seven(){
        return $this->retrieve("where id = :id","*",['id' => $_GET['id']])->fetch();
    }


    function slider_update_item_seven(){
        $response = new Response();
        $validation = (new validation())->validation([
            'first_line'=> 'required',
            'second_line'=> 'required',
        ]);
        if(!$validation->status){
            return $validation;
        }
        try{
            $this->form_data_collection_seven();
            $this->img_update_for_item_seven();
            $this->update(['id' => $_POST['id']],
            [
                'first_line' => $this->first_line,
                'first_line_color' => $this->first_line_color,
                'second_line' => $this->second_line,
                'second_line_color' => $this->second_line_color,
                'button_text' => $this->button_text,
                'url' => $this->url,
                'background_img' => $this->background_img,
                'slider_item' => $this->slider_item
            ], 
            [
                'first_line' => $this->first_line,
                'first_line_color' => $this->first_line_color,
                'second_line' => $this->second_line,
                'second_line_color' => $this->second_line_color,
                'button_text' => $this->button_text,
                'url' => $this->url,
                'background_img' => $this->background_img,
                'slider_item' => $this->slider_item
            ]);
            $response->status = 1;
            $response->add_message('update successfull');
        }catch(Exception $e){
            $response->add_error($e->getMessage());
        }
        return $response;
    }
    function img_update_for_item_seven(){
        if($_FILES['background_img']['size'] === 0){
            $img_info = $this->get_slider_item_six();
            $this->background_img = $img_info['background_img'];
            
        }else{
            $this->background_img = $this->upload("uplode-img/slider-img", $_FILES['background_img']);  
           
        }
    }

    //ent slide style seven................

        function make_folder($folder_name){
            if(!file_exists(ROOT_DIRECTORY.'/'.$folder_name)){
                mkdir(ROOT_DIRECTORY.'/'.$folder_name, 0775, true);
            }
        }
        function upload($folder_name,$input){
            $this->make_folder($folder_name);
            $destination = $folder_name ."/".$input['name'];
            move_uploaded_file($input['tmp_name'], '../../'.$destination);
            return $destination;
        }
    // for delete slide style...................
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

        // for carosel indicators...............
        function get_sliders_item_all(){
            return $this->retrieve("","*",[])->fetchAll();
        }

    }

?>