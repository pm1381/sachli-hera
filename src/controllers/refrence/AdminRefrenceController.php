<?php

namespace App\Controllers\Refrence;

use App\Entities\Admin as EntitiesAdmin;
use App\Helpers\Tools;
use App\Models\Admin;

class AdminRefrenceController extends GeneralRefrenceController
{
    public function __construct()
    {
        parent::__construct();
        $adminClass = new EntitiesAdmin();
        $current = $adminClass->isLoginJwt();
        if (Tools::checkArray('admin', $current)) {
            $this->data['form']['currentAdmin']['data'] = $current['admin'];
            $admin = new EntitiesAdmin();
            $admin->setId($current['admin']->id)->setIsSuper($current['admin']->isSuper)->setPassCall($current['admin']->passCall)->setName($current['admin']->name)->setMobile($current['admin']->mobile);
            $this->data['form']['currentAdmin']['AdminObjectData'] = $admin;
        }
        $this->data['form']['currentAdmin']['isLogin'] = $current['login'];
        if (Tools::checkArray('admin', $current)) {
            $this->insertLog($current['admin']);
        }
    }
}
