<?php
namespace App\Providers;

use App\Exceptions\BaseHandler;
use App\Interfaces\Provider;
use App\Helpers\Input;

class ErrorHandlingServiceProvider extends ServiceProvider implements Provider {
    public function register()
    {
        $whoops = new \Whoops\Run;

        $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
        // $whoops->pushHandler(new \Whoops\Handler\JsonResponseHandler);

        // $whoops->pushHandler(new \Whoops\Handler\CallbackHandler(function($error) {
        //     print_f($error, true);
        //     $handler = new BaseHandler();
        //     $handler->report($error);
        //     $handler->render(Input::getDataForm(), $error);
        // }));
        $whoops->register();
    }

    public function boot()
    {
    }
}

