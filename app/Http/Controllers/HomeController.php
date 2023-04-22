<?php

namespace App\Http\Controllers;

use App\services\CompanyService;

class HomeController extends Controller
{
    public function __invoke()
    {
        (new CompanyService())->findCompanies();

        dd('done well');
    }
}
