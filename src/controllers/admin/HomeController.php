<?php

namespace App\Controllers\Admin;

use App\Classes\Date;
use App\Classes\Session;
use App\Controllers\Refrence\AdminRefrenceController;
use App\Helpers\Input;
use App\Helpers\Tools;
use App\Models\Footer;
use App\Models\Home;
use App\Models\Video;

class HomeController extends AdminRefrenceController
{
    public function edit()
    {
        $res = Home::first();
        $this->data['form']['result'] = $res;

        $video = new Video();
        $videoRes = $video->orderBy('id', 'ASC')->get();

        $this->data['form']['video'] = $videoRes;
        $this->data['form']['actionUrl'] = ADMIN_ORIGIN . $this->data['form']['page'] . '/update/';
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
        $videosFilter = array_filter($data['videos'], fn($value) => !is_null($value) && $value !== '');

        foreach ($videosFilter as $key => $value) {
            $videoRes = Video::where('id', '=', $key + 1)->update(['link' => $value, 'updated_at' => Date::now()]);
            if (! $videoRes) {
                Video::insert(['link' => $value, 'updated_at' => Date::now(), 'created_at' => Date::now()]);
            }
        }

        $i = 0;
        $footer = [];
        foreach ($data['footerLink'] as $key => $value) {
            if ($value != "" && $value != null && $data['footerTitle'][$i] != "") {
                $footer[] = [
                    'link'  => $value,
                    'title' => $data['footerTitle'][$i]
                ];
            }
            $i++;
        }

        $res = Home::where('id', '=', 1)->update([
            'heroText' => $data['heroText'],
            'footerText' => $data['footerText'],
            'sampleText' => $data['sampleText'],
            'updated_at' => Date::now(),
            'address' => $data['address'],
            'mobile' => $data['mobile'],
            'articleText' => $data['articleText'],
            'footer' => json_encode($footer)
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
