<?php

namespace App\Controllers;

class Mahasiswa extends BaseController
{
    public function index(): string
    {
        return view('profilku');
    }
    public function nilai(): string
    {
        return view('viewbaru');
    }
}
