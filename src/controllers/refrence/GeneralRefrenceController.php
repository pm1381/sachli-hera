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
            'title' => 'sachli',
            'description' => 'sachli'
        ];
        $this->data['form']['page'] = strtolower($modelName);
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
}
