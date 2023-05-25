<?php
namespace App\Providers;

use App\Classes\Gate;
use App\Helpers\Tools;
use App\Interfaces\Provider;
use ReflectionClass;
use ReflectionMethod;

class AuthServiceProvider extends ServiceProvider implements Provider {
    public function register()
    {
        $allFiles = Tools::getFilesInFolder(POLICY);
        foreach ($allFiles as $value) {
            $fullName = Policy_NAMESPACE .  explode(".", $value)[0];
            $refclass = new ReflectionClass($fullName);
            $methods = $refclass->getMethods();
            foreach ($methods as  $method) {
                $name = strtolower(str_replace("App\Policies\\", "", explode("Policy", $method->class)[0])) . "_" . $method->name;
                $refMethod = new ReflectionMethod($method->class, $method->name);
                $closure = $refMethod->getClosure(new $refclass->name);
                Gate::define($name, $closure, 1);
            }
        }
        // print_f(Gate::getAllGates());
    }

    public function boot() {
    }
}

