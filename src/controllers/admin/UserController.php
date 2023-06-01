<?php

namespace App\Controllers\Admin;

use App\Classes\Date;
use App\Classes\Response;
use App\Classes\Session;
use App\Controllers\Refrence\AdminRefrenceController;
use App\Helpers\Input;
use App\Helpers\Tools;
use App\Models\User;

class UserController extends AdminRefrenceController
{
    public function list()
    {
        $where = [];
        $whereInstant = [];
        if (Input::get('search', null) != null) {
            $whereInstant['name'] = "%" . Input::get('search') . "%";
            $whereInstant['mobile'] = "%" . Input::get('search') . "%";
        }
        $skip = Tools::startSkip(LIMIT);
        $this->manageSearchParams($where);
        $obj = User::select('user.id', 'mobile', 'name', 'surname', 'user.created_at', 'user.field', 'field.title')
            ->leftJoin('field', 'field.id', 'user.field')
            ->where(function($query) use ($where) {
                foreach ($where as $key => $value) {
                    if ($key == 'field') {
                        $query->where($key, '=', $value);
                    } else {
                        $query->where($key, 'like', $value);
                    }
                }
            })
            ->where(function($query) use ($whereInstant) {
                foreach ($whereInstant as $key => $value) {
                    $query->orWhere($key, 'like', $value);
                }
            });
        $countRes = $obj->get();
        $res = $obj->skip($skip)->take(LIMIT)->orderBy('user.created_at', 'DESC')->get();
        $this->data['form']['result'] = $res;
        $this->data['form']['countAll'] = count($countRes);
        // Response::setStatus(200, 'founded users', $res);
        Tools::render('admin\user\list', $this->data);
    }

    public function update($id)
    {
        $data = Input::getDataForm();
        $checkError = $this->checkValidation($data, [
            'name'    => 'required',
            'surname' => 'required',
            'mobile'  => 'required|min:11'
        ]);
        if ($checkError['error']) {
            // Response::setStatus(402, 'error in input data');
            $session = new Session();
            $session->setFlash('name', $data['name'])->setFlash('surname', $data['surname'])->
            setFlash('description', $data['description'])->setFlash('adminDescription', $data['adminDescription'])->
            setFlash('mobile', $data['mobile'])->setFlash('error', SESSION_ERROR);
            Tools::redirect(ADMIN_ORIGIN . $this->data['form']['page'] . '/edit/' . $id . "/");
        }
        $res = User::where('id', '=', $id)->update([
            'name' => $data['name'],
            'surname' => $data['surname'],
            'mobile' => $data['mobile'],
            'description' => $data['description'],
            'adminDescription' => $data['adminDescription'],
            'updated_at' => Date::now()
        ]);
        // ($res) ? Response::setStatus(200, 'updated successfully'): Response::setStatus(500, 'error in update query');
        $session = new Session();
        ($res) ? $session->setFlash('done', SESSION_DONE) : $session->setFlash('error', SESSION_ERROR);
        Tools::redirect(ADMIN_ORIGIN . $this->data['form']['page'] . '/list/');
    }

    public function destroy($id)
    {
        User::where('id', '=', $id)->delete();
        Response::setStatus(200, 'deleted successfully');
    }

    public function edit($id)
    {
        $res = User::where('id', '=', $id)->first();
        $this->data['form']['result'] = $res;
        $this->data['form']['actionUrl'] = ADMIN_ORIGIN . $this->data['form']['page'] . '/update/' . $id . '/';
        // Response::setStatus(200, 'found succrssfully', $res);
        Tools::render('admin\user\manage', $this->data);
    }

    private function manageSearchParams(&$where)
    {
        if (Input::get('name') != "") {
            $where['name'] = "%" . Input::get('name') . "%";
        }
        if (Input::get('surname') != "") {
            $where['surname'] = "%" . Input::get('surname') . "%";
        }
        if (Input::get('mobile') != "") {
            $where['mobile'] = "%" . Input::get('mobile') . "%";
        }
        if (Input::get('field') != "") {
            $where['field.title'] =  Input::get('field');
        }
    }
}
