<?php

namespace App\Controllers;

use PSpell\Config;

class layout extends BaseController
{
    public function index(): string
    {
        return view('layout/beranda');
    }
}