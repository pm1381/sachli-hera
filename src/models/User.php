<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Capsule\Manager as DB;

class User extends BaseModel
{
    protected $fillable = ['surname', 'name', 'mobile', 'description', 'field', 'adminDescription', 'created_at', 'updated_at'];
    public $timestamps = false;

    public function __construct()
    {
        $this->table = 'user';
        $this->primaryKey = 'id';
        Model::preventsSilentlyDiscardingAttributes(true);
    }
}
