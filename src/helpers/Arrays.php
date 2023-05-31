<?php

namespace App\Helpers;

use App\Models\Admin;
use App\Models\Category;
use App\Models\Field;
use App\Models\File;

class Arrays
{
    public static $field = [];

    public static function errorView()
    {
        return[
            'required' => ':attribute is required',
            'email' => 'field :attribute is required',
            'min' => 'field :attribute is less than required amount',
            'same' => 'field :attribute is not the same'
        ];
    }

    public static function field()
    {
        if (! self::$field) {
            $field = new Field();
            $res = $field->getFound();
            if (count($res)) {
                foreach ($res as  $value) {
                    self::$field[$value->id] = $value->title;
                }
            }
        }
        return self::$field;
    }

    public static function yesOrNo()
    {
        return [
            '0' => [
                'title' => 'خیر',
                'id' => 0
            ],
            '1' => [
                'title' => 'بله',
                'id' => 1
            ]
        ];
    }

    public static function englishAlphabet()
    {
        return ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L'];
    }

    public static function permanentParams()
    {
        return ['search'];
    }

    public static function fieldNameTranslations()
    {
        return [
            'name' => 'نام',
            'email' => 'ایمیل',
            'password' => 'رمزعبور',
            'confirmPass' => 'تایید رمزعبور'
        ];
    }

    public static function sessionOptions()
    {
        return[
            // 'cache_expire' => 180,
            // 'cache_limiter' => 'nocache',
            // 'cookie_domain' => '',
            'cookie_httponly' => true,
            'cookie_lifetime' => 8000,
            // 'cookie_path' => '/',
            'cookie_samesite' => 'Strict',
            'cookie_secure'   => true,
            // 'gc_divisor' => 100,
            // 'gc_maxlifetime' => 1440,
            // 'gc_probability' => true,
            // 'lazy_write' => true,
            // 'name' => 'PHPSESSID',
            // 'read_and_close' => false,
            // 'referer_check' => '',
            // 'save_handler' => 'files',
            // 'save_path' => '',
            // 'serialize_handler' => 'php',
            // 'sid_bits_per_character' => 4,
            // 'sid_length' => 32,
            // 'trans_sid_hosts' => $_SERVER['HTTP_HOST'],
            // 'trans_sid_tags' => 'a=href,area=href,frame=src,form=',
            // 'use_cookies' => true,
            // 'use_only_cookies' => true,
            // 'use_strict_mode' => false,
            // 'use_trans_sid' => false,
        ];
    }
}
