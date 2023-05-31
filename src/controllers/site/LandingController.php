<?php

namespace App\Controllers\Site;

use App\Classes\Response;
use App\Controllers\Refrence\SiteRefrenceController;
use App\Helpers\Tools;
use App\Models\Landing;

class LandingController extends SiteRefrenceController
{
    public function landing($address)
    {
        $res = Landing::where('address', '=', $address)->limit(1)->get();
        if (count($res)) {
            $this->data['form']['result'] = $res;
            Response::setStatus(200, 'page founded', $res);
            Tools::render('site\landing\index', $this->data);
        }
        Response::setStatus(404, 'page not founded');
    }
}
