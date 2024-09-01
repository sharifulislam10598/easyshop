<?php

use Rakit\Validation\Rules\Email;

class UserInfo extends UserModel
{

    function form_data_collection()
    {
        $this->name = $_POST['name'];
        $this->email = $_POST['email'];
        $this->pass_word = $_POST['pass_word'];
    }
    function form_data_collection_for_login()
    {
        $this->email = $_POST['email'];
        $this->pass_word = $_POST['pass_word'];
    }

    function form_data_collection_for_account_update(){
        $this->name = $_POST['name'];
        $this->email = $_POST['email'];
    }
    function create()
    {
        $this->pass_word = password_hash($this->pass_word, PASSWORD_DEFAULT);
        $this->insert(array(
            "name" => $this->name,
            'email' => $this->email,
            'pass_word' => $this->pass_word
        ));
    }


    function save_user_login_info()
    {
        $response = new Response();
        try{
            $this->form_data_collection();
            $this->create();
            $response->status = 1;
            $response->add_message("kk");
        } catch (Exception $e) {
            $response->add_error($e->getMessage());
        }

       return $response;
    }

    function go_to_redirect_url_after_sign_up(){
        $user_info = $this->retrieve("where email = :email", "*", ['email' => $this->email])->fetch();
        $_SESSION['session_id'] = $user_info['id'];
        if (isset($_SESSION['redirect_url'])) {
            $redirect_url = $_SESSION['redirect_url'];
            unset($_SESSION['redirect_url']);
            header("location: $redirect_url");
            exit();
        } else {
            header('location:' . SITE_URL);
            exit();
        }
    }



    function user_password_varify()
    {
        $this->form_data_collection_for_login();
        $user_info = $this->retrieve("where email = :email", "*", ['email' => $this->email])->fetch();
        if ($user_info == false) {
            echo 'email did not matched.';
        } else {
            if (password_verify($this->pass_word, $user_info['pass_word'])) {
                $_SESSION['session_id'] = $user_info['id'];
                if (isset($_SESSION['redirect_url'])) {
                    $redirect_url = $_SESSION['redirect_url'];
                    unset($_SESSION['redirect_url']);
                    header("location: $redirect_url");
                    exit();
                } else {
                    header('location:' . SITE_URL);
                    exit();
                }
            } else {
                echo 'password did not matched.';
            }
        }
    }


    function reset_password()
    {
        $response = new Response();
        $old_password = $_POST['old_password'];
        $new_password = $_POST['new_password'];
        $retype_password = $_POST['retype_password'];

        $user_info = $this->retrieve("where id = :id", "*", ['id' => $_SESSION['session_id']])->fetch();
        $pass_word = $user_info['pass_word'];
        if (password_verify($old_password, $pass_word) == false) {
            $response->add_error('Old password not matched !');
        }
        if ($new_password != $retype_password) {
            $response->add_error('password not matched !');
        }
        if (password_verify($old_password, $pass_word) & $new_password == $retype_password) {
            try {
                $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
                $this->update(
                    ["id" => $_SESSION['session_id']],
                    ['pass_word' => $hashed_password],
                    ['pass_word' => $hashed_password]
                );
                $response->status = 1;
                $response->add_message('Password change successfull');
            } catch (Exception $e) {
                $response->add_error($e->getMessage());
            }
        }
        return $response;
    }



    function get_user_account_info()
    {
        return $this->retrieve("where id = :id", "*", ['id' => $_SESSION['session_id']])->fetch();
    }


    function user_account_info_update(){
        $response = new Response();
        $validation = (new validation())->validation([
        ]);
        if(!$validation->status){
            return $validation;
        }
        try{
            $this->form_data_collection_for_account_update();
            $this->update(
                [
                    'id' => $_SESSION['session_id']
                ],
                [
                    'name' => $this->name,
                    'email' => $this->email
                ],
                [
                    'name' => $this->name,
                    'email' => $this->email
                ]  
            );
            $response->status = 1;
            $response->add_message('update successfull');
        }catch(Exception $e){
            $response->add_error($e->getMessage());
        }
        return $response;
    }

    function remove()
    {
        $response = new Response();
        try {
            $this->delete("where product_id = :id ", array(
                "id" => $_GET['id']
            ));
            $response->status = 1;
            $response->add_message("Category delete successfuly");
        } catch (Exception $e) {
            $response->add_error($e->getMessage());
        }
        return $response;
    }
}
