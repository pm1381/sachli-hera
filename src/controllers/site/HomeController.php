<?php

namespace App\Controllers\Site;

use App\Controllers\Refrence\SiteRefrenceController;
use App\Helpers\Tools;
use App\Models\Home;
use App\Models\Landing;
use App\Models\Video;

class HomeController extends SiteRefrenceController
{
    public function home()
    {
        $res = Home::first();
        $this->data['form']['result'] = $res;
        $resVideo = Video::all();
        $this->data['form']['video'] = $resVideo;

        $this->data['form']['lastFive'] = Landing::where('active', '=', '1')->orderBy('id', 'DESC')->limit(5)->get();
        // dd($this->data['form']['lastFive']);
        
        Tools::render('site\home\index', $this->data);
    }
}
