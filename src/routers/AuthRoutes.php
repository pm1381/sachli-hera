<?php

namespace App\Routers;

class AuthRoutes
{
    private $router;

    public function __construct($router)
    {
        $this->router = $router;
    }

    public function getAllRoutes()
    {
        $this->authMiddleWare();
        $this->authSite();
        $this->authAdmin();
    }

    private function authSite()
    {
        $this->router->setNamespace(CONTROLLER_NAMESPACE);
        $this->router->get('/admin/login/', 'admin\auth\LoginController@showLoginForm');
        $this->router->post('/admin/login/', 'admin\auth\LoginController@login');
        $this->router->get('/admin/logout/', 'admin\auth\LoginController@logout');
        // $this->router->get('/register/', 'site\auth\RegisterController@showRegistrationForm');
        // $this->router->post('/register/', 'site\auth\RegisterController@register');
        // $this->router->post('/password/email/', 'site\auth\ForgotPasswordController@sendResetLinkEmail', 'password.email');
        // $this->router->get('/password/confirm/', 'site\auth\ConfirmPasswordController@showConfirmationForm', 'password.confirm');
        // $this->router->post('/password/confirm/', 'site\auth\ConfirmPasswordController@confirm');
        // $this->router->get('/password/reset/', 'site\auth\ForgotPasswordController@showLinkRequestForm', 'password.request');
        // $this->router->post('/password/reset/', 'site\auth\ForgotPasswordController@reset', 'password.update');
        // $this->router->get('/password/reset/{token}/', 'site\auth\ForgotPasswordController@showResetForm');
    }

    private function authMiddleWare()
    {
    }
    private function authAdmin()
    {
    }
}
