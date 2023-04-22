<?php

namespace App\Http\Controllers\Api\V1\companies;

use App\Http\Controllers\Controller;
use App\Http\Resources\companies\companiesRessource;
use App\services\CompanyService;
use Illuminate\Http\Request;

class CompanyController extends Controller
{

    public function __construct(private CompanyService $companyService)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $companies = $this->companyService->getCompanies();
      //return $companies;
    return companiesRessource::collection($companies);

    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
