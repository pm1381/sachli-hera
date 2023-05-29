<?php

namespace App\Helpers;

class Input
{
    public static function post($data, $default="")
    {
        if (isset($_POST[$data])) {
            return $_POST[$data];
        }
        return $default;
    }

    public static function get($data, $default="")
    {
        if (isset($_GET[$data])) {
            return $_GET[$data];
        }
        return $default;
    }

    public static function file($data, $default="")
    {
        if (isset($_FILES[$data])) {
            return $_FILES[$data];
        }
        return $default;
    }

    public static function getDataJson($wantArray = true)
    {
        $json = file_get_contents('php://input');
        if ($wantArray) {
            return json_decode($json, true);
        }
        return json_decode($json);
    }

    public static function getDataForm()
    {
        $array = $_REQUEST;
        return $array;
    }

    public static function only(...$params)
    {
        $final = [];
        foreach ($params as $value) {
            $final[] = $_REQUEST[$value];
        }
        return $final;
    }
}
