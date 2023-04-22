<?php

namespace App\Http\Controllers;

use App\Http\services\CompanyService;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public function __invoke()
    {
        (new CompanyService())->findCompanies();

        dd('done well');
    }
}
