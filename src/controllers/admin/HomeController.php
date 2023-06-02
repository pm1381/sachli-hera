<?php

namespace App\Controllers\Admin;

use App\Classes\Date;
use App\Classes\Session;
use App\Controllers\Refrence\AdminRefrenceController;
use App\Helpers\Input;
use App\Helpers\Tools;
use App\Models\Home;

class HomeController extends AdminRefrenceController
{
    public function edit()
    {
        $res = Home::first();
        $this->data['form']['result'] = $res;
        $this->data['form']['actionUrl'] = ADMIN_ORIGIN . $this->data['form']['page'] . '/update/';
        $this->data['form']['image'] = ADMIN_ORIGIN . $this->data['form']['page'] . '/update/';
        Tools::render('admin\home\manage', $this->data);
    }

    public function showUploadImage()
    {
        $this->data['form']['actionUrl'] = ADMIN_ORIGIN . $this->data['form']['page'] . '/imageUpdate/';
        Tools::render('admin\home\image', $this->data);
    }

    public function update()
    {
        $data = Input::getDataForm();
        $res = Home::where('id', '=', 1)->update([
            'heroText' => $data['heroText'],
            'footerText' => $data['footerText'],
            'sampleText' => $data['sampleText'],
            'updated_at' => Date::now(),
            'address' => $data['address'],
            'mobile' => $data['mobile']
        ]);
        $session = new Session();
        ($res) ? $session->setFlash('done', SESSION_DONE) : $session->setFlash('error', SESSION_ERROR);
        Tools::redirect(ADMIN_ORIGIN . $this->data['form']['page'] . '/edit/');
    }

    public function imageUpdate()
    {
        $res = Home::where('id', '=', 1)->update([
            'updated_at' => Date::now()
        ]);
        $session = new Session();
        ($res) ? $session->setFlash('done', SESSION_DONE) : $session->setFlash('error', SESSION_ERROR);
        Tools::redirect(ADMIN_ORIGIN . $this->data['form']['page'] . '/edit/');
    }
}
