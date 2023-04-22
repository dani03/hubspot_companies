<?php

namespace App\Http\repositories\contacts;

use App\Models\Contact;

class ContactRepository
{

    public function createAndGetInsertID(array $contact): int {
        return Contact::create($contact)->id;
    }

    public function create(array $contact): bool {
        return Contact::create($contact);
    }
}
