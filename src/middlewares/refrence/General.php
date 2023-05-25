<?php

namespace App\MiddleWares\Refrence;
//        App\MiddleWares\Refrence\General

use App\Entities\Admin;
use App\Helpers\Tools;

class General
{
    public function loginCheck()
    {
        // login check using sessions;
        // $current = $userService->isLogin();
        $admin = new Admin();
        $current = $admin->isLoginJwt();
        if ($current['login'] == false) {
            Tools::redirect(ADMIN_ORIGIN . '/login/');
            exit();
        }
    }
}
