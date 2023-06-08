<?php

namespace App\Models;

use App\Classes\Date;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Capsule\Manager as DB;

class Home extends BaseModel
{
    protected $fillable = ['heroText', 'sampleText', 'footerText', 'articleText', 'address', 'mobile', 'updated_at'];
    public $timestamps = false;
    //social links, footer links, map preview

    public function __construct()
    {
        $this->table = 'home';
        $this->primaryKey = 'id';
        Model::preventsSilentlyDiscardingAttributes(true);
    }

    public function getCreatedAtAttribute($value)
    {
        $this->attributes['created_at'] = Date::M2J('Y-m-d', $value);
    }
    public function getHeroTextAttribute($value)
    {
        $this->attributes['heroText'] = html_entity_decode($value);
    }
    public function getSampleTextAttribute($value)
    {
        $this->attributes['sampleText'] = html_entity_decode($value);
    }
    public function getFooterTextAttribute($value)
    {
        $this->attributes['footerText'] = html_entity_decode($value);
    }
    public function getArticleTextAttribute($value)
    {
        $this->attributes['articleText'] = html_entity_decode($value);
    }
}
