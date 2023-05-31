<?php

namespace App\Classes;

class Response
{
    public static function setStatus($code, $text, $data = [])
    {
        http_response_code($code);
        $jsonArray = array();
        $jsonArray['status'] = $code;
        $jsonArray['message'] = $text;
        $jsonArray['data'] = $data;
        echo json_encode($jsonArray);
        exit();
    }
}
