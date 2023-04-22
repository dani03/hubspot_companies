<?php

namespace App\repositories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Builder;
use Ramsey\Collection\Collection;

class CompanyRepository
{

    public function createAndGetID(array $company): int {
       return Company::create($company)->id;
    }

    public function findCompany(int $company_id):Company {
        return Company::find($company_id);
    }

    public function findAll(): Builder|\Illuminate\Database\Eloquent\Collection
    {
        return Company::with('contacts')->get();
    }
    public function findAllActivitySectors():array {
        return Company::pluck('industry');
    }
}
