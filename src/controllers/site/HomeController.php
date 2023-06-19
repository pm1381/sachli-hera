<?php

namespace App\Controllers\Site;

use App\Classes\Date;
use App\Classes\Response;
use App\Controllers\Refrence\SiteRefrenceController;
use App\Helpers\Input;
use App\Helpers\Tools;
use App\Models\Home;
use App\Models\User;

class HomeController extends SiteRefrenceController
{
    public function home()
    {
        $res = Home::first();
        $this->data['form']['result'] = $res;
        Tools::render('site\home\index', $this->data);
    }

    public function consult()
    {
        $data = Input::getDataJson();
        $checkError = $this->checkValidation($data, [
            'name'    => 'required',
            'surname' => 'required',
            'mobile'  => 'required|min:11',
            'field'   => 'required',
        ]);
        if ($checkError['error']) {
            Response::setStatus(402, 'error in input data');
        }
        $res = User::insert([
            'field' => $data['field'],
            'name'  => $data['name'],
            'surname' => $data['surname'],
            'mobile'  => $data['mobile'],
            'description' => $data['description'],
            'created_at' => Date::now(),
            'updated_at' => Date::now()
        ]);
        ($res) ? Response::setStatus(200, 'inserted successfully'): Response::setStatus(500, 'error in insert query');
    }
}
