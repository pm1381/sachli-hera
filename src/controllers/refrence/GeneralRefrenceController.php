<?php

namespace App\Controllers\Refrence;

use App\Helpers\Tools;
use ReflectionClass;
use App\Classes\Validation;
use App\Helpers\Arrays;
use Rakit\Validation\Validator;
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

    public function checkValidation($data, $pattern)
    {
        $validation = new Validation($data, new Validator(Arrays::errorView()));
        $validation->makeValidation($pattern);
        return $validation->handleValidationError();
    }
}
