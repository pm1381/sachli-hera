<?php

namespace App\Classes;

class Response
{
    public static function setStatus($code, $text, $data = [])
    {
        http_response_code($code);
        $jsonArray = array();
        $jsonArray['status'] = $code;
        $jsonArray['data'] = $data;
        $jsonArray['status_text'] = $text;
        echo json_encode($jsonArray);
        exit();
    }
}
