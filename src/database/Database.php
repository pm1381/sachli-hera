<?php

namespace App\Database;

use Illuminate\Database\Capsule\Manager as Capsule;

class Database
{
    public function __construct()
    {
    }

    public function addMysqlConnection()
    {
        $db = new Capsule();
        $db->addConnection(
            [
            'driver' => DRIVER,
            'host' => HOST_NAME,
            'database' => DB_NAME,
            'username' => USERNAME,
            'password' => PASSWORD,
            'charset' => 'utf8'
            ]
        );
        $db->setAsGlobal();
        $db->bootEloquent();
        $db->connection()->enableQueryLog();
    }
}
