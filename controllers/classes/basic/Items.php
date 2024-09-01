<?php
class items extends ItemsModel
{
    function form_data_collection()
    {
        $this->items_name = $_POST['items_name'];
        $this->price = $_POST['price'];
        $this->regular_price = $_POST['regular_price'];
        $this->details = $_POST['details'];
        // $this->items_img = $_POST['items_img'];
        // $this->gallery_img_1 = $_POST['gallery_img_1'];
        // $this->gallery_img_2 = $_POST['gallery_img_2'];
        // $this->gallery_img_3 = $_POST['gallery_img_3'];
        $this->category = $_POST['category'];
        $this->sticker = $_POST['sticker'];
        $this->item_added = $_POST['item_added'];
        $this->availability = $_POST['availability'];
    }
    function create()
    {
        $this->insert(array(
            'items_name' => $this->items_name,
            'price' => $this->price,
            'regular_price' => $this->regular_price,
            'details' => $this->details,
            'items_img' => $this->items_img,
            'gallery_img_1' => $this->gallery_img_1,
            'gallery_img_2' => $this->gallery_img_2,
            'gallery_img_3' => $this->gallery_img_3,
            'category' => $this->category,
            'sticker' => $this->sticker,
            'item_added' => $this->item_added,
            'availability' => $this->availability
        ));
    }


    function save()
    {
        $response = new Response();
        $validation = (new validation())->validation([
            // 'items_name'=> 'required',
            // 'price'=> 'required',
            // 'details'=> 'required',
            // 'items_img'=> 'required|uploaded_file:0,500K,png,jpeg',
            // 'gallery_img_1' => 'required|uploaded_file:0,500K,png,jpeg',
            // 'gallery_img_2' => 'required|uploaded_file:0,500K,png,jpeg',
            // 'gallery_img_3' => 'required|uploaded_file:0,500K,png,jpeg',
            // 'category' => 'required'
        ]);
        if (!$validation->status) {
            return $validation;
        }

        try {
            $this->form_data_collection();
            $this->items_img = $this->upload("uplode-img/items", $_FILES['items_img']);
            $this->gallery_img_1 = $this->upload("uplode-img/items", $_FILES['gallery_img_1']);
            $this->gallery_img_2 = $this->upload("uplode-img/items", $_FILES['gallery_img_2']);
            $this->gallery_img_3 = $this->upload("uplode-img/items", $_FILES['gallery_img_3']);
            $this->create();
            $response->data['item_id'] = $this->connection->lastInsertId();
            $response->status = 1;
            $response->add_message("saved successfuly");
        } catch (Exception $e) {
            $response->add_error($e->getMessage());
        }
        return $response;
    }

    function make_folder($folder_name)
    {
        if (!file_exists(ROOT_DIRECTORY . '/' . $folder_name)) {
            mkdir(ROOT_DIRECTORY . '/' . $folder_name, 0775, true);
        }
    }
    function upload($folder_name, $input)
    {
        $this->make_folder($folder_name);
        $destination = $folder_name . "/" . $input['name'];
        move_uploaded_file($input['tmp_name'], '../' . $destination);
        return $destination;
    }

    function get_items()
    {
        return $this->retrieve("left join categorys on items.category=categorys.id", "items.*, categorys.name as category_name", [])->fetchAll();
    }

    function get_item()
    {
        return $this->retrieve("where id = :id", "*", ['id' => $_GET['id']])->fetch();
    }

    function get_items_for_new_arrivals()
    {
        return $this->retrieve("ORDER BY id DESC LIMIT 6", "*", [])->fetchAll();
    }

    function get_items_for_two_items()
    {
        return $this->retrieve("where item_added = :item_added", "*", ['item_added' => 1])->fetchAll();
    }

    function get_items_for_three_items()
    {
        return $this->retrieve("where item_added = :item_added", "*", ['item_added' => 2])->fetchAll();
    }

    // for items view by id
    function selected_item_info_by_id()
    {
        return $this->retrieve("where id = :id", "*", ['id' => $_GET['id']])->fetch();
    }
    // for ladies category page............................. 
    function selected_item_info_by_ladies()
    {
        return $this->retrieve("where category = :category", "*", ['category' => 20])->fetchAll();
    }
    // for accesories category page............................. 
    function selected_item_info_by_accesories()
    {
        return $this->retrieve("where category = :category", "*", ['category' => 14])->fetchAll();
    }


    function img_upload()
    {
        $items_info = $this->get_item();
        if ($_FILES['items_img']['size'] === 0) {
            $this->items_img = $items_info['items_img'];
        } else {
            $this->items_img = $this->upload("uplode-img/items", $_FILES['items_img']);
        }
        if ($_FILES['gallery_img_1']['size'] === 0) {
            $this->gallery_img_1 = $items_info['gallery_img_1'];
        } else {
            $this->gallery_img_1 = $this->upload("uplode-img/items", $_FILES['gallery_img_1']);
        }

        if ($_FILES['gallery_img_2']['size'] === 0) {
            $this->gallery_img_2 = $items_info['gallery_img_2'];
        } else {
            $this->gallery_img_2 = $this->upload("uplode-img/items", $_FILES['gallery_img_2']);
        }

        if ($_FILES['gallery_img_3']['size'] === 0) {
            $this->gallery_img_3 = $items_info['gallery_img_3'];
        } else {
            $this->gallery_img_3 = $this->upload("uplode-img/items", $_FILES['gallery_img_3']);
        }
    }

    function items_update()
    {
        $response = new Response();
        $validation = (new validation())->validation([
            'items_name' => 'required',
            'price' => 'required',
            'details' => 'required'
        ]);
        if (!$validation->status) {
            return $validation;
        }
        try {
            $this->form_data_collection();
            $this->img_upload();
            $this->update(
                ["id" => $_POST['id']],
                [
                    'items_name' => $this->items_name,
                    'price' => $this->price,
                    'regular_price' => $this->regular_price,
                    'details' => $this->details,
                    'items_img' => $this->items_img,
                    'gallery_img_1' => $this->gallery_img_1,
                    'gallery_img_2' => $this->gallery_img_2,
                    'gallery_img_3' => $this->gallery_img_3,
                    'category' => $this->category,
                    'sticker' => $this->sticker,
                    'item_added' => $this->item_added,
                    'availability' => $this->availability
                ],
                [
                    'items_name' => $this->items_name,
                    'price' => $this->price,
                    'regular_price' => $this->regular_price,
                    'details' => $this->details,
                    'items_img' => $this->items_img,
                    'gallery_img_1' => $this->gallery_img_1,
                    'gallery_img_2' => $this->gallery_img_2,
                    'gallery_img_3' => $this->gallery_img_3,
                    'category' => $this->category,
                    'sticker' => $this->sticker,
                    'item_added' => $this->item_added,
                    'availability' => $this->availability
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
