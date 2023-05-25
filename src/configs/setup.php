<?php

use App\Configs\Application;

define("PORT", 7000);
define('HOST_NAME', 'maria_db');
define('DOMAIN', "http://localhost/");
define('DRIVER', "mysql");
define('BASE_URL', 'http://localhost:' . PORT . '/admin/list/');
define('ORIGIN', 'http://localhost:' . PORT . '/');
define('ADMIN_ORIGIN', 'http://localhost:' . PORT . '/admin');
define('JWT_SECRET_KEY', 'new test for project');
define('JWT_ALGORITHM', 'HS512');
define('EXPIRE_DATE', '+55 minutes');
define('LIMIT', 10);

//---mongo database---//
define('MONGO_DB_NAME', '');

//---mysql database---//
define('DB_NAME', 'hera');
define('USERNAME', 'parham');
define('PASSWORD', 'secret');

//---statics---//
define("NAMESPACE_SEPRATOR", "\\");
define('SRC', 'src' . DIRECTORY_SEPARATOR);
define('STORAGE', BASE . "\\" . 'storage' . DIRECTORY_SEPARATOR);
define('PUBLIC_FOLDER', 'public' . DIRECTORY_SEPARATOR);
define('UPLOAD', PUBLIC_FOLDER . 'upload' . DIRECTORY_SEPARATOR);
define('TEMPLATE', SRC . 'Views' . DIRECTORY_SEPARATOR);
define('ADMIN_TEMPLATE', TEMPLATE . 'admin' . DIRECTORY_SEPARATOR);
define('MODEL', SRC . 'Models' . DIRECTORY_SEPARATOR);
define('ROUTER', SRC . 'Routers' . DIRECTORY_SEPARATOR);
define('LIBRARY', SRC . 'Libs' . DIRECTORY_SEPARATOR);
define('CONFIG', SRC . 'Configs' . DIRECTORY_SEPARATOR);
define('PROVIDER', SRC . 'Providers' . DIRECTORY_SEPARATOR);
define('POLICY', SRC . 'Policies' . DIRECTORY_SEPARATOR);
define('CONTROLLER', SRC . 'Controllers' . DIRECTORY_SEPARATOR);
define('SITE_CONTROLLER', CONTROLLER . 'Site' . DIRECTORY_SEPARATOR);
define('ADMIN_CONTROLLER', CONTROLLER . 'Admin' . DIRECTORY_SEPARATOR);
define('REFRENCE_CONTROLLER', CONTROLLER . 'Refrence' . DIRECTORY_SEPARATOR);
define('VIEW', SRC . 'views' . DIRECTORY_SEPARATOR);
define('SITE_VIEW', VIEW . 'site' . DIRECTORY_SEPARATOR);
define('ADMIN_VIEW', VIEW . 'admin' . DIRECTORY_SEPARATOR);
define('COMPONENT', ADMIN_VIEW . 'components' . DIRECTORY_SEPARATOR);
define('POPUP', ADMIN_VIEW . 'popups' . DIRECTORY_SEPARATOR);
define("CONTROLLER_NAMESPACE", "App\Controllers");
define("Router_NAMESPACE", "App\Routers" . NAMESPACE_SEPRATOR);
define("Policy_NAMESPACE", "App\Policies" . NAMESPACE_SEPRATOR);
define("MIDDLEWARE_NAMESPACE", "App\MiddleWares" . NAMESPACE_SEPRATOR);

// and adding all files from library floder
// ./vendor/bin/phpcs  --standard=phpcs.xml src\ phpcs check error. to solve errors use phpcbf
require LIBRARY . 'Function.php';
require LIBRARY . 'JDF.php';

$application = new Application();
$application->run();
