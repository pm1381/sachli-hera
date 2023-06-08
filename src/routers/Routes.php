<?php

namespace App\Routers;

use App\Models\Log;

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
        $this->router->before('POST', '/.*', function(){
            Log::insert();
        });

        $this->router->setNamespace(CONTROLLER_NAMESPACE);
        $this->router->get('/', 'site\HomeController@home');
        $this->router->post('/consult/', 'site\HomeController@consult');
        $this->router->get('/landing/{address}/', 'site\LandingController@landing');

        $this->router->get('/sachadmin/field/list/', 'admin\FieldController@list');
        $this->router->post('/sachadmin/field/create/', 'admin\FieldController@create');
        $this->router->post('/sachadmin/field/update/{id}/', 'admin\FieldController@update');
        $this->router->post('/sachadmin/field/destroy/{id}/', 'admin\FieldController@destroy');
        $this->router->get('/sachadmin/field/show/', 'admin\FieldController@show');
        $this->router->get('/sachadmin/field/edit/{id}/', 'admin\FieldController@edit');

        $this->router->get('/sachadmin/user/list/', 'admin\UserController@list');
        $this->router->post('/sachadmin/user/update/{id}/', 'admin\UserController@update');
        $this->router->get('/sachadmin/user/edit/{id}/', 'admin\UserController@edit');
        $this->router->post('/sachadmin/user/destroy/{id}/', 'admin\UserController@destroy');

        $this->router->get('/sachadmin/home/edit/', 'admin\HomeController@edit');
        $this->router->post('/sachadmin/home/update/', 'admin\HomeController@update');
        $this->router->get('/sachadmin/home/showUploadImage/', 'admin\HomeController@showUploadImage');
        $this->router->post('/sachadmin/home/imageUpdate/', 'admin\HomeController@imageUpdate');

        $this->router->get('/sachadmin/landing/list/', 'admin\LandingController@list');
        $this->router->post('/sachadmin/landing/create/', 'admin\LandingController@create');
        $this->router->post('/sachadmin/landing/update/{id}/', 'admin\LandingController@update');
        $this->router->post('/sachadmin/landing/destroy/{id}/', 'admin\LandingController@destroy');
        $this->router->get('/sachadmin/landing/show/', 'admin\LandingController@show');
        $this->router->get('/sachadmin/landing/edit/{id}/', 'admin\LandingController@edit');
        $this->router->get('/sachadmin/landing/showUploadImage/{id}/', 'admin\LandingController@showUploadImage');
        $this->router->post('/sachadmin/landing/imageUpdate/{id}/', 'admin\LandingController@imageUpdate');

        
        $this->router->post('/sachadmin/api/image/', 'admin\ApiController@image');
        $this->router->post('/sachadmin/api/homeImage/', 'admin\ApiController@homeImage');
        
    }
}
