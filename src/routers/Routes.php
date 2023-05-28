<?php

namespace App\Routers;

use App\Entities\Admin;
use App\Helpers\Tools;
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
            Log::insert();
        });

        $this->router->setNamespace(CONTROLLER_NAMESPACE);
        $this->router->get('/', 'site\HomeController@home');
        
    }
}
