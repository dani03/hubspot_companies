<?php

namespace App\Http\services;

use App\Http\repositories\CompanyRepository;
use App\Http\services\contacts\ContactService;
use App\Models\Company;

class CompanyService
{
    private CompanyRepository $companyRepository;
    public function __construct( ) {
        $this->companyRepository = new CompanyRepository();
    }

    public function findCompanies() {
        $companies = (new HubspotService())->getCompanies();
        if(!$companies) {
            return 'no companies found';
        }
        $this->addCompanies($companies);
    }
     public function filterPropertiesCompany(Array $company) {
         return [
             'name' => $company['properties']['name']['value'] ?? null,
             'industry' => $company['properties']['industry']['value'] ?? null,
             'city' => $company['properties']['city']['value'] ?? null,
             'country' => $company['properties']['country']['value'] ?? null,
             'website' => $company['properties']['website']['value'] ?? null,
             'phone' => $company['properties']['phone']['value'] ?? null,
             'zip' => $company['properties']['zip']['value'] ?? null,
             'annualrevenue' => $company['properties']['annualrevenue']['value'] ?? null,
             'numberofemployees' => $company['properties']['numberofemployees']['value'] ?? null,
             'description' => $company['properties']['description']['value'] ?? null,
         ];
     }

    public function addCompanies(array $companies) {
        foreach ($companies as $company) {
          $aNewCompany = $this->filterPropertiesCompany($company);
          $companyID = $this->insertCompany($aNewCompany);
          //recuperation des contacts de cette company
           $contacts = (new HubspotService())->getContacts($company['companyId']);
            $contactsFiltred = (new ContactService())->filterContacts($contacts);
            (new ContactService())->addContact($contactsFiltred,$companyID);
        }
    }

    public function insertCompany(array $company): int
    {
        return $this->companyRepository->createAndGetID($company);
    }

    public function attachToAContact(int $contactId, int $companyId) {
       $company = $this->companyRepository->findCompany($companyId);
       $company->contacts()->attach($contactId);
    }

}
