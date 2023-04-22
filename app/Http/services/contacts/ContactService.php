<?php

namespace App\Http\services\contacts;

use App\Http\repositories\contacts\ContactRepository;
use App\Http\services\CompanyService;

class ContactService
{
    private ContactRepository $contactRepository;
    public function __construct()
    {
        $this->contactRepository = new ContactRepository();
    }

    public function filterContacts(array $contacts) {
        $contactFiltered = [];
        foreach ($contacts as $contact) {
            //transform contact
            $newContact = $this->transformContactData($contact);

            $contactFiltered[] = $newContact;
            //ajouter le contacte en BD
          // $contactID =  $this->addContact($newContact);
        }

        return $contactFiltered;
    }

    public function addContact(array $contacts, int $companyID): void {
        foreach ($contacts as $contact) {
             $contactId =  $this->contactRepository->createAndGetInsertID($contact);
             (new CompanyService())->attachToAContact($contactId, $companyID);
        }
    }
    public function transformContactData(array $contact):array {
        return [
            'email' => $contact['identities'][0]['identity'][0]['value'],
            'firstname'  => $contact['properties'][0]['value'],
            'lastname' => $contact['properties'][2]['value'],
            'jobtitle' => $contact['identities'][0]['identity'][1]['type'],
            'phone' => fake()->phoneNumber,
        ];
    }
}
