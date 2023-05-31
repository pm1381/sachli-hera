<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Landing extends BaseModel
{
    protected $fillable = ['address', 'title', 'description', 'created_at', 'updated_at'];
    public $timestamps = false;

    public function __construct()
    {
        $this->table = 'landing';
        $this->primaryKey = 'id';
        Model::preventsSilentlyDiscardingAttributes(true);
    }
}
