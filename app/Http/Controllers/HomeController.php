<?php

namespace App\Http\Controllers;

use App\services\CompanyService;

class HomeController extends Controller
{
    public function __invoke()
    {
        return view('welcome');
    }
}
