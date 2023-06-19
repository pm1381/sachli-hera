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
            $this->data['form']['result'] = $res[0];
            Tools::render('site\landing\index', $this->data);
        } else {
            Response::setStatus(404, 'page not founded');
        }
    }
}
