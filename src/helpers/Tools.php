<?php

namespace App\Helpers;

use App\Classes\Response;
use App\Controllers\Refrence\GeneralRefrenceController;
use Rakit\Validation\ErrorBag;

class Tools
{
    public static function manageCUrl($params, $header, $url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        if (count($header)) {
            curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        }
        if (count($params)) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
        }
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }

    public static function getPage()
    {
        $page = Input::get('page', null);
        if ($page == null) {
            $page = 1;
        }
        return $page;
    }

    public static function startSkip($limit)
    {
        $skip = (self::getPage() - 1) * $limit;
        return $skip;
    }

    public static function slashToBackSlash($string)
    {
        return str_replace("/", "\\", $string);
    }

    public static function checkArray($key, $array, $default="")
    {
        if (array_key_exists($key, $array)) {
            return $array[$key];
        }
        return $default;
    }

    public static function checkObject($object, $property, $default="")
    {
        if (property_exists($object, $property)) {
            return $object->$property;
        }
        return $default;
    }

    public static function createCode()
    {
        return rand(10000, 100000);
    }

    public static function getIp()
    {
        $ipaddress = '';
        if (getenv('HTTP_CLIENT_IP')) {
            $ipaddress = getenv('HTTP_CLIENT_IP');
        } elseif (getenv('HTTP_X_FORWARDED_FOR')) {
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        } elseif (getenv('HTTP_X_FORWARDED')) {
            $ipaddress = getenv('HTTP_X_FORWARDED');
        } elseif (getenv('HTTP_FORWARDED_FOR')) {
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
        } elseif (getenv('HTTP_FORWARDED')) {
            $ipaddress = getenv('HTTP_FORWARDED');
        } elseif (getenv('REMOTE_ADDR')) {
            $ipaddress = getenv('REMOTE_ADDR');
        } else {
            $ipaddress = 'UNKNOWN';
        }
        return $ipaddress;
    }

    public static function createUniqueToken($model)
    {
        do {
            $token = Tools::createSalt();
            $result = $model->getByFieldName('token', $token);
            $cnt = count($result);
        } while ($cnt > 0);
        return $token;
    }

    public static function getFilesInFolder($path, array $ignoreClasses = [])
    {
        $ignoreClasses[] = '.';
        $ignoreClasses[] = '..';
        $files = array_values(array_diff(scandir($path), $ignoreClasses));
        return $files;
    }

    public static function render($template, $found = [])
    {
        $finalTemplate = '';
        $i = 0;
        if (strpos($template, '/') !== false) {
            $arr = explode("/", $template);
        }
        if (strpos($template, '\\') !== false) {
            $arr = explode("\\", $template);
        }
        foreach ($arr as $value) {
            if ($i + 1 >= count($arr)) {
                $finalTemplate .= $value;
            } else {
                $finalTemplate .= $value . DIRECTORY_SEPARATOR;
            }
            $i++;
        }
        $file = VIEW . $finalTemplate . '.php';
        if (file_exists($file)) {
            $data = json_decode(json_encode($found, JSON_INVALID_UTF8_IGNORE));
            $data->form->queryLog = GeneralRefrenceController::queryLog();
            require_once $file;
        } else {
            Response::setStatus(404, 'page not found');
        }
    }

    public static function json($data = ['error' => false])
    {
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($data);
    }

    public static function translateErrors(ErrorBag $allErrors, $translation)
    {
        $messages = $allErrors->messages;
        foreach ($messages as $from => $valueArray) {
            foreach ($valueArray as $key => $value) {
                $value = strtolower($value);
                foreach ($translation as $k => $trans) {
                    if (strpos($value, $k) !== false) {
                        $value = str_replace($k, $trans, $value);
                        $messages[$from][$key] = $value;
                        break;
                    }
                }
            }
        }
        $allErrors->messages = $messages;
        return $allErrors;
    }

    public static function createSalt()
    {
        return password_hash(rand(100000000, 900000000), PASSWORD_DEFAULT);
    }

    public static function redirect($url, $code = 301)
    {
        header("location: " . $url, true, $code);
        exit();
    }

    public static function backSlashToSlash($string)
    {
        return str_replace("\\", "/", $string);
    }

    public static function uniteUrls($url)
    {
        $lastChar = substr($url, -1);
        if ($lastChar != "/") {
            $url .= "/";
        }
        return $url;
    }

    public static function getUrl()
    {
        return DOMAIN . parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    }

    public static function numberToFa($value)
    {
        return self::convertNumber($value, 'toFa');
    }

    public static function numberToEn($value)
    {
        return self::convertNumber($value, 'toEn');
    }

    public static function convertNumber($value, $type)
    {
        $faDigit = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
        $enDigit = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
        $arDigit = ['٩', '٨', '٧', '٦', '٥', '٤', '٣', '٢', '١', '٠'];

        $value = str_replace($arDigit, $faDigit, $value);

        if ($type == 'toFa') {
            return str_replace($enDigit, $faDigit, $value);
        } else {
            return str_replace($faDigit, $enDigit, $value);
        }
    }

    public static function getCurrentUrl()
    {
        return (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    }

    public static function option($array, $selected="")
    {
        $list = '';
        foreach ($array as $key => $value) {
            $get = '';
            if (is_array($value)) {
                if ($key == $selected) {
                    $get = 'selected';
                }
                $list .= '<option class="optionData" data-name="' . $value['title'] . '" value="' . $value['id'] . '" ' . $get . '>' . $value['title'] . '</option>';
            } else {
                if ($value == $selected) {
                    $get = 'selected';
                }
                $list .= '<option class="optionData" data-name="' . $value . '" value="' . $value . '" ' . $get . '>' . $value . '</option>';
            }
        }
        return $list;
    }

    public static function adminMenu()
    {
        $menu = [
            [
                'role' => 'admin',
                'url' => '/admin/',
                'title' => 'مدیران',
                'child' => []
            ],
            [
                'role' => 'manageFile',
                'url' => '/file/',
                'title' => 'فایل',
                'child' => []
            ],
            [
                'role' => 'category',
                'url' => '/category/',
                'title' => 'دسته بندی',
                'child' => []
            ],
            [
                'role' => 'manageUser',
                'url' => '/userDedication/',
                'title' => 'تخصیص کاربر',
                'child' => []
            ],
            [
                'role' => 'user',
                'url' => '/user/',
                'title' => 'کاربران',
                'child' => []
            ],
            [
                'role' => 'transfered',
                'url' => '/transfered/',
                'title' => 'انتقال',
                'child' => []
            ],
            [
                'role' => 'report',
                'url' => '/report/',
                'title' => 'گزارش',
                'child' => []
            ]
        ];
        return $menu;
    }
}
