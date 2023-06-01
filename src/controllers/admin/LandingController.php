<?php

namespace App\Controllers\Admin;

use App\Classes\Date;
use App\Classes\Response;
use App\Classes\Session;
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
        // Response::setStatus(200, '', $res);
        Tools::render('admin\landing\list', $this->data);
    }

    public function create()
    {
        $data = Input::getDataForm();
        $checkError = $this->checkValidation($data, [
            'title'    => 'required',
            'description' => 'required',
            'address' => 'required'
        ]);
        if ($checkError['error']) {
            // Response::setStatus(402, 'error in input data');
            $session = new Session();
            $session->setFlash('title', $data['title'])->setFlash('description', $data['description'])->setFlash('address', $data['address'])->setFlash('error', SESSION_ERROR);
            Tools::redirect(ADMIN_ORIGIN . $this->data['form']['page'] . '/show/');
        }
        $res = Landing::insert([
            'title' => $data['title'],
            'description' => $data['description'],
            'address' => $data['address'],
            'created_at' => Date::now(),
            'updated_at' => Date::now()
        ]);
        // ($res) ? Response::setStatus(200, 'inserted successfully'): Response::setStatus(500, 'error in insert query');
        $session = new Session();
        ($res) ? $session->setFlash('done', SESSION_DONE) : $session->setFlash('error', SESSION_ERROR);
        Tools::redirect(ADMIN_ORIGIN . $this->data['form']['page'] . '/list/');
    }

    public function update($id)
    {
        $data = Input::getDataForm();
        $checkError = $this->checkValidation($data, [
            'title'    => 'required',
            'description' => 'required',
            'address' => 'required'
        ]);
        if ($checkError['error']) {
            // Response::setStatus(402, 'error in input data');
            $session = new Session();
            $session->setFlash('title', $data['title'])->setFlash('description', $data['description'])->setFlash('address', $data['address'])->setFlash('error', SESSION_ERROR);
            Tools::redirect(ADMIN_ORIGIN . $this->data['form']['page'] . '/edit/' . $id . "/");
        }
        $res = Landing::where('id', '=', $id)->update([
            'title' => $data['title'],
            'description' => $data['description'],
            'created_at' => Date::now(),
            'updated_at' => Date::now(),
            'address' => $data['address']
        ]);
        // ($res) ? Response::setStatus(200, 'updated successfully'): Response::setStatus(500, 'error in update query');
        $session = new Session();
        ($res) ? $session->setFlash('done', SESSION_DONE) : $session->setFlash('error', SESSION_ERROR);
        Tools::redirect(ADMIN_ORIGIN . $this->data['form']['page'] . '/list/');
    }

    public function destroy($id)
    {
        Landing::where('id', '=', $id)->delete();
        Response::setStatus(200, 'deleted successfully');
    }

    public function show()
    {
        $this->data['form']['actionUrl'] = ADMIN_ORIGIN . $this->data['form']['page'] . '/create/';
        Tools::render('admin\landing\manage', $this->data);
    }

    public function edit($id)
    {
        $res = Landing::where('id', '=', $id)->first();
        $this->data['form']['result'] = $res;
        $this->data['form']['actionUrl'] = ADMIN_ORIGIN . $this->data['form']['page'] . '/update/' . $id . '/';
        // Response::setStatus(200, 'found succrssfully', $res);
        Tools::render('admin\landing\manage', $this->data);
    }
}
