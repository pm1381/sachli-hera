<?php

namespace App\Routers;

use App\Entities\Admin;
use App\Helpers\Tools;

class Routes
{
    private $router;

    public function __construct($router)
    {
        $this->router = $router;
    }

    public function getAllRoutes()
    {
        //general middlewares
        $this->router->setNamespace(MIDDLEWARE_NAMESPACE);
        $this->router->before('GET|POST', '/.*', function(){
            $admin = new Admin();
            $current = $admin->isLoginJwt();
            if ($current['login'] == 0 && strpos(Tools::getUrl(), '/login/') === false) {
                Tools::redirect(ADMIN_ORIGIN . '/login/');
                exit();
            }
        });

        $this->router->setNamespace(CONTROLLER_NAMESPACE);
        $this->router->get('/admin/admin/', 'admin\AdminController@list');
        $this->router->get('/admin/admin/manage/{admin}/', 'admin\AdminController@manage');
        $this->router->post('/admin/admin/delete/{admin}/', 'admin\AdminController@delete');
        $this->router->post('/admin/admin/updateManage/', 'admin\AdminController@submitManage');
        $this->router->post('/admin/admin/new/', 'admin\AdminController@addAdmin');
        $this->router->get('/admin/admin/new/', 'admin\AdminController@showAdd');

        $this->router->get('/admin/file/', 'admin\FileController@list');
        $this->router->post('/admin/file/delete/{file}/', 'admin\FileController@delete');
        $this->router->get('/admin/file/manage/{file}/', 'admin\FileController@manage');
        $this->router->post('/admin/file/updateManage/{file}/', 'admin\FileController@submitManage');
        $this->router->post('/admin/file/extract/', 'admin\FileController@extractFile');
        $this->router->post('/admin/file/new/', 'admin\FileController@addFile');
        $this->router->get('/admin/file/new/', 'admin\FileController@showAdd');

        $this->router->get('/admin/category/', 'admin\CategoryController@list');
        $this->router->get('/admin/category/manage/{category}/', 'admin\CategoryController@manage');
        $this->router->post('/admin/category/delete/{category}/', 'admin\CategoryController@delete');
        $this->router->post('/admin/category/updateManage/', 'admin\CategoryController@submitManage');
        $this->router->post('/admin/category/new/', 'admin\CategoryController@addCategory');
        $this->router->get('/admin/category/new/', 'admin\CategoryController@showAdd');
        $this->router->get('/admin/category/active/{category}/', 'admin\CategoryController@active');
        $this->router->get('/admin/category/diactive/{category}/', 'admin\CategoryController@diactive');

        $this->router->get('/admin/userDedication/', 'admin\UserController@list');
        $this->router->get('/admin/user/', 'admin\UserController@list');
        $this->router->post('/admin/userDedication/delete/{user}/', 'admin\UserController@delete');
        $this->router->post('/admin/user/delete/{user}/', 'admin\UserController@delete');
        $this->router->post('/admin/user/updateManage/{user}/', 'admin\UserController@submitManage');
        $this->router->get('/admin/user/manage/{user}/', 'admin\UserController@manage');
        $this->router->post('/admin/user/transfer/', 'admin\UserController@transfer');
        $this->router->post('/admin/user/new/', 'admin\UserController@submitManage');
        $this->router->get('/admin/user/new/', 'admin\UserController@showAdd');

        $this->router->get('/admin/transfered/', 'admin\TransferController@list');

        $this->router->get('/admin/report/', 'admin\ReportController@list');
        $this->router->post('/admin/report/delete/{id}/', 'admin\ReportController@delete');
        $this->router->post('/admin/report/returnToPrev/', 'admin\ReportController@returnToPrev');

        //api
        $this->router->post('/admin/api/save/admin/', 'admin\ApiController@saveAdmin');
        $this->router->post('/admin/api/saveAll/admin/', 'admin\ApiController@saveAllAdmin');
        $this->router->post('/admin/api/save/report/', 'admin\ApiController@saveReport');
        $this->router->post('/admin/api/show/report/', 'admin\ApiController@showReport');

        //general
        $this->router->get('/admin/general/deleteRedis/{redisKey}/', 'admin\GeneralController@redisRemove');
        $this->router->get('/admin/general/deleteLog/', 'admin\GeneralController@removeFromlog');
    }
}
