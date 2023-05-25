<?php

namespace App\MiddleWares\Admin;

use App\Helpers\Tools;
use App\Classes\Response;

class Login
{
    public function ipCheck()
    {
        if (Tools::getIp() == 'UNKNOWN') {
            Response::setStatus(400, 'unkonwn ip');
            exit();
        }
    }
}

