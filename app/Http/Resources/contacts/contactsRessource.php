<?php

namespace App\Http\Resources\contacts;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class contactsRessource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "firstname" => $this->firstname,
            "lastname" => $this->lastname,
            "email" => $this->email,
            "phone" => $this->phone,
            "jobtitle" => $this->jobtitle,

        ];
    }
}
