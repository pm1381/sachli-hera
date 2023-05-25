<?php

namespace App\Controllers\Admin\Auth;

use App\Classes\Cookie;
use App\Classes\Jwt;
use App\Classes\Session;
use App\Controllers\Refrence\AdminRefrenceController;
use App\Entities\Admin AS AdminClass;
use App\Helpers\Input;
use App\Helpers\Tools;
use App\Models\Admin;

class LoginController extends AdminRefrenceController
{
    public function showLoginForm()
    {
        Tools::render('admin\auth\login', $this->data);
    }
    
    public function login()
    {
        $data = Input::getDataForm();
        $adminClass = new AdminClass();
        $adminClass->setMobile($data['mobile'])->setPassword($data['password']);
        $admin = new Admin();
        $adminId = $admin->loginCheck($adminClass);
        if($adminId) {
            $token = Tools::createUniqueToken($admin);
            $adminClass->setToken($token)->setId($adminId);

            $jwt = new Jwt();
            $jwtData = $jwt->create(['mobile' => $adminClass->getMobile(), 'userToken' => $token]);
            $cookie = new Cookie();
            $cookie->setName('jwtToken')->setContent($jwtData)->setExpire(EXPIRE_DATE)->add();
            $admin->updateAdmin($adminClass, ['token' => $jwtData]);
            Tools::redirect(ADMIN_ORIGIN . '/admin/');
        } else {
            $session = new Session();
            $session->setFlash('error', 'کاربر مدنظر یافت نشد')->setFlash('old', ['mobile' => $adminClass->getMobile(), 'url_to' => ADMIN_ORIGIN . '/admin/', 'url_from' => ADMIN_ORIGIN . '/admin/']);
            Tools::redirect(ADMIN_ORIGIN . '/login/');
        }
    }

    public function logout()
    {
        $cookie = new Cookie();
        $cookie->setName('jwtToken')->remove();

        $session = new Session();
        $session->setFlash('success', 'با موفقیت از سیستم خارج شدید');
        Tools::redirect(ADMIN_ORIGIN . '/login/');
    }

}
