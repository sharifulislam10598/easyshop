<?php
class DeliveryMethodList  extends DeliveryMethodListModel
{
    function form_data_collection()
    {
        $this->method = $_POST['method'];
        $this->shipping_cost = $_POST['shipping_cost'];
    }

    function create()
    {
        $this->insert(array(
            'method' => $this->method,
            'shipping_cost' => $this->shipping_cost
        ));
    }

    function save()
    {
        $response = new Response();
        $validation = (new validation())->validation([]);
        if (!$validation->status) {
            return $validation;
        }
        try {
            $this->form_data_collection();
            $this->create();
            $response->status = 1;
            $response->add_message("saved successfuly");
        } catch (Exception $e) {
            $response->add_error($e->getMessage());
        }
        return $response;
    }

    function get_delivery_method()
    {
        return $this->retrieve("where id =:id", "*", ['id' => $_GET['id']])->fetch();
    }

    function get_delivery_method_list()
    {
        return $this->retrieve("", "*", [])->fetchAll();
    }

    function delivery_method_update()
    {
        $response = new Response();
        $validation = (new validation())->validation([]);
        if (!$validation->status) {
            return $validation;
        }
        try {
            $this->form_data_collection();
            $this->update(
                [
                    "id" => $_GET['id']
                ],
                [
                    'method' => $this->method,
                    'shipping_cost' => $this->shipping_cost
                ],
                [
                    'method' => $this->method,
                    'shipping_cost' => $this->shipping_cost
                ]

            );
            $response->status = 1;
            $response->add_message('update successfull');
        } catch (Exception $e) {
            $response->add_error($e->getMessage());
        }
        return $response;
    }

    function remove()
    {
        $response = new Response();
        try {
            $this->delete("where id = :id ", array(
                "id" => $_GET['id']
            ));
            $response->status = 1;
            $response->add_message("delete successfuly");
        } catch (Exception $e) {
            $response->add_error($e->getMessage());
        }
        return $response;
    }
}
