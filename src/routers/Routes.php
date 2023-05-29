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
        $this->router->before('GET|POST', '/.*', function(){
            header('Content-Type: application/json; charset=utf-8');
            // header('Content-Type: application/x-www-form-urlencoded');
            Log::insert();
        });

        $this->router->setNamespace(CONTROLLER_NAMESPACE);
        $this->router->get('/', 'site\HomeController@home');
        $this->router->post('/consult/', 'site\HomeController@consult');
        
    }
}
