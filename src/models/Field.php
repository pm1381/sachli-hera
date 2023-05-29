<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Field extends BaseModel
{
    protected $fillable = ['title', 'description', 'created_at', 'updated_at'];
    public $timestamps = false;

    public function __construct()
    {
        $this->table = 'field';
        $this->primaryKey = 'id';
        Model::preventsSilentlyDiscardingAttributes(true);
    }
}
