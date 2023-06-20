<?php

namespace App\Models;

use App\Classes\Date;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Capsule\Manager as DB;

class Home extends BaseModel
{
    protected $fillable = ['heroText', 'sampleText', 'footer', 'footerText', 'articleText', 'address', 'mobile', 'updated_at'];
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
        return Date::M2J('Y-m-d', $value);
    }
    public function getHeroTextAttribute($value)
    {
        return html_entity_decode($value);
    }
    public function getSampleTextAttribute($value)
    {
        return html_entity_decode($value);
    }
    public function getFooterTextAttribute($value)
    {
        return html_entity_decode($value);
    }
    public function getArticleTextAttribute($value)
    {
        return html_entity_decode($value);
    }
    public function getFooterAttribute($value)
    {
        return json_decode($value, JSON_UNESCAPED_UNICODE);
    }
}
