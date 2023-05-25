<?php

namespace App\Controllers\Refrence;

use App\Classes\Date;
use App\Helpers\Tools;
use App\Models\Log;
use ReflectionClass;
use Illuminate\Database\Capsule\Manager as DB;

class GeneralRefrenceController
{
    protected $model = null;
    protected $view = null;
    public $data;

    public function __construct()
    {
        $namespace = explode("\\", $this::class);
        $controllerName = $namespace[count($namespace) - 1];
        $modelName = str_replace("Controller", "", $controllerName);
        $modelNamespace = 'App\\Models\\' . $modelName;
        if (class_exists($modelNamespace)) {
            $reflectionClass = new ReflectionClass($modelNamespace);
            $newInstance = $reflectionClass->newInstance();
            $this->model = $newInstance;
        }
        $this->data['basic'] = [
            'title' => 'hear1',
            'description' => 'description hear1'
        ];
        $this->data['makeNewUrl'] = "/" . strtolower($modelName) . '/new/';
        $this->data['form']['page'] = strtolower($modelName);
        
        if (strpos(Tools::getUrl(), '/userDedication/') !== false) {
            $this->data['form']['page'] = 'userDedication';
        }

    }

    protected function makeClassData($dataArray, $className)
    {
        $reflectionClass = new ReflectionClass($className);
        $newInstance = $reflectionClass->newInstanceWithoutConstructor();
        $userClassProperties = $reflectionClass->getProperties();
        if (count($dataArray) == count($userClassProperties)) {
            $i = 0;
            foreach ($dataArray as $key => $value) {
                foreach ($userClassProperties as $prop) {
                    $prop->setAccessible(true);
                    if ($key == $prop->getName()) {
                        $i++;
                        $prop->setValue($newInstance, $value);
                        break;
                    }
                }
            }
            if ($i == count($dataArray)) {
                return $newInstance;
            }
        }
        return '';
    }

    protected function insertLog($currentAdmin)
    {
        $data = json_encode($_REQUEST);
        if ($data == "[]") {
            $json = file_get_contents('php://input');
            if ($json) {
                $data = $json;
            }
        }

        $log = new Log();
        $log->insert([
            'admin' => $currentAdmin->id,
            'url' => $_SERVER['REQUEST_URI'],
            'data' => $data,
            'date' => Date::now()
        ]);
    }

    public static function queryLog()
    {
        $logData = [];
        $time = 0;
        $res = DB::getQueryLog();
        foreach ($res as  $value) {
            $logData['detail'][] = [
                'time' => $value['time'], // milli seconds
                'query' => $value['query']
                // 'bindings' => $value['bindings']
            ];
            $time += $value['time'];
        }
        $logData['basic'] = [
            'count' => count($res),
            'totalTime' => $time
        ];
        return $logData;
    }
}
