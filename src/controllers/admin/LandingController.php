<?php

namespace App\Controllers\Admin;

use App\Classes\Date;
use App\Classes\Response;
use App\Controllers\Refrence\AdminRefrenceController;
use App\Helpers\Input;
use App\Helpers\Tools;
use App\Models\Landing;

class LandingController extends AdminRefrenceController
{
    public function list()
    {
        $where = [];
        if (Input::get('search', null) != null) {
            $where['title'] = "%" . Input::get('search') . "%";
        }
        $Landing = new Landing();
        $res = $Landing->getAll($where);
        $this->data['form']['result'] = $res;
        $this->data['form']['countAll'] = $Landing->countAll($where); 
        Response::setStatus(200, '', $res);
        Tools::render('admin\landing\list', $this->data);
    }

    public function create()
    {
        $data = Input::getDataJson();
        $checkError = $this->checkValidation($data, [
            'title'    => 'required',
            'description' => 'required',
            'address' => 'required'
        ]);
        if ($checkError['error']) {
            Response::setStatus(402, 'error in input data');
        }
        $res = Landing::insert([
            'title' => $data['title'],
            'description' => $data['description'],
            'address' => $data['address'],
            'created_at' => Date::now(),
            'updated_at' => Date::now()
        ]);
        ($res) ? Response::setStatus(200, 'inserted successfully'): Response::setStatus(500, 'error in insert query');
    }

    public function update($id)
    {
        $data = Input::getDataJson();
        $checkError = $this->checkValidation($data, [
            'title'    => 'required',
            'description' => 'required',
            'address' => 'required'

        ]);
        if ($checkError['error']) {
            Response::setStatus(402, 'error in input data');
        }
        $res = Landing::where('id', '=', $id)->update([
            'title' => $data['title'],
            'description' => $data['description'],
            'created_at' => Date::now(),
            'updated_at' => Date::now(),
            'address' => $data['address']
        ]);
        ($res) ? Response::setStatus(200, 'updated successfully'): Response::setStatus(500, 'error in update query');
    }

    public function destroy($id)
    {
        Landing::where('id', '=', $id)->delete();
        Response::setStatus(200, 'deleted successfully');
    }

    public function show()
    {
        Tools::render('admin\landing\manage', $this->data);
    }

    public function edit($id)
    {
        $res = Landing::where('id', '=', $id)->get();
        $this->data['form']['result'] = $res;
        Response::setStatus(200, 'found succrssfully', $res);
        Tools::render('admin\landing\manage', $this->data);
    }
}
