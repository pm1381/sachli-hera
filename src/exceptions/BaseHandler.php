<?php

namespace App\Exceptions;

use Monolog\Logger;
use App\Classes\Date;
use App\Helpers\Tools;
use Monolog\Handler\StreamHandler;

class BaseHandler {
    protected array $dontReport = [];

    public function __construct(){}
    
    public function report($error)
    {
        if (! $this->shouldntReport($error)) {
            $baseLogger = new Logger('base');
            $date = Date::getCurrentDate();
            $baseLogger->pushHandler(new StreamHandler(Tools::slashToBackSlash(STORAGE . "log/" . $date . ".log")));
            $baseLogger->error(" *message : " . $error->getMessage() . " *File : " . $error->getFile() . " *Line : " . $error->getLine());          
        }   
    }

    public function render(array $data, $error)
    {
        if (! $this->shouldntReport($error)) {
            var_dump($data);
            var_dump($error);
        }
    }

    private function shouldntReport($checkError)
    {
        foreach ($this->dontReport as $errorClass) {
            if ($checkError instanceof $errorClass) {
                return true;
            }
        }
    }
}
