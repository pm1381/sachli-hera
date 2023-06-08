<?php

namespace App\Controllers\Admin;

use App\Controllers\Refrence\AdminRefrenceController;
use App\Helpers\Input;
use App\Helpers\Tools;

class ApiController extends AdminRefrenceController
{
    public function image()
    {
        $data['error'] = true;
        $id = Input::post('id', null);
        $file = Input::file('file', null);
        $main = Input::post('main', null);
        $number = Input::post('number', null);
        if ($id != null && $file != null && $main != null && $number != null) {
            if ($file['type'] == 'image/jpeg') {
                ($main) ? $type = 'main' : $type = 'support';
                $destination = UPLOAD . "landing/" . $type . "_" . $id . "_" . $number . ".jpeg";
                $r = move_uploaded_file($file['tmp_name'], $destination);
                if ($r) {
                    $data['error'] = false;
                }
            }
        }
        Tools::json($data);
    }

    public function homeImage()
    {
        $data['error'] = true;
        $file = Input::file('file', null);
        $number = Input::post('number', null);
        $name = Input::post('name', null);
        if ($file != null && $number != null && $name != null) {
            if ($file['type'] == 'image/jpeg') {
                $destination = UPLOAD . "home/" . $name . "/" . "image_" . $number . ".jpeg";
                $r = move_uploaded_file($file['tmp_name'], $destination);
                if ($r) {
                    $data['error'] = false;
                }
            }
        }
        Tools::json($data);
    }
}
