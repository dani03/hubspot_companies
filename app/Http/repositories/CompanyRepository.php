<?php

namespace App\Http\repositories;

use App\Models\Company;

class CompanyRepository
{

    public function createAndGetID(array $company): int {
       return Company::create($company)->id;
    }

    public function findCompany(int $company_id):Company {
        return Company::find($company_id);
    }

}
