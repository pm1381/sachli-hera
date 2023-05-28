<?php

namespace App\Models;

use App\Classes\Date;
use App\Helpers\Tools;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Capsule\Manager as DB;

class Log extends BaseModel
{
    protected $fillable = ['data', 'user', 'admin', 'url', 'date'];
    public $timestamps = false;

    public function __construct()
    {
        $this->table = 'log';
        $this->primaryKey = 'id';
        Model::preventsSilentlyDiscardingAttributes(true);
    }

    public static function insert($adminId = 0)
    {
        $userdata = json_encode($_REQUEST);
        if ($userdata == "[]") {
            $json = file_get_contents('php://input');
            if ($json) {
                $userdata = $json;
            }
        }

        $data = [
            'admin' => $adminId,
            'url' => Tools::getCurrentUrl(),
            'data' => $userdata,
            'date' => Date::now()
        ];
        return Log::create($data);
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
