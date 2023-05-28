<?php

namespace App\Controllers\Admin\Auth;

use App\Controllers\Refrence\AdminRefrenceController;
use App\Helpers\Tools;

class LoginController extends AdminRefrenceController
{
    public function home()
    {
        Tools::render('site\home\index', $this->data);
    }
}
