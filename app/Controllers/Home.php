<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('home');
       /* echo view('layouts/app');
        echo view('partials/topbar');
        echo view('partials/sidebar');
        echo view('home');
        echo view('partials/footer');*/
    }
}
