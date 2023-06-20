<?php

namespace App\Controllers\Site;

use App\Classes\Date;
use App\Controllers\Refrence\SiteRefrenceController;
use App\Helpers\Input;
use App\Helpers\Tools;
use App\Models\User;

class ApiController extends SiteRefrenceController
{
    public function consult()
    {
        $jsonData['error'] = false;
        $data = Input::getDataForm();
        $checkError = $this->checkValidation($data, [
            'name'    => 'required',
            'surname' => 'required',
            'mobile'  => 'required|min:11',
            'field'   => 'required',
        ]);
        if ($checkError['error']) {
            $jsonData['error'] = true;
            $jsonData['message'] = 'خطا در داده های کاربر';
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
        if (! $res) {
            $jsonData['error'] = true;
            $jsonData['message'] = 'خطا در برقراری ارتباط با سرور';
        }
        Tools::json($jsonData);
    }
}
