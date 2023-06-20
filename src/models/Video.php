<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Capsule\Manager as DB;

class Video extends BaseModel
{
    protected $fillable = ['link', 'updated_at'];
    // public $timestamps = false;

    public function __construct()
    {
        $this->table = 'video';
        $this->primaryKey = 'id';
        Model::preventsSilentlyDiscardingAttributes(true);
    }
}
