<?php

namespace App\Controllers\Refrence;

class SiteRefrenceController extends GeneralRefrenceController
{
    protected $redirectTo = ORIGIN;

    public function __construct()
    {
        parent::__construct();
    }
}
