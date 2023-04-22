<?php

namespace App\Http\Resources\companies;

use App\Http\Resources\contacts\contactsRessource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class companiesRessource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            //'id' => $this->id,
            'name' => $this->name,
            'industry' => $this->industry,
            'city' => $this->city,
            'country' => $this->country,
            'website' => $this->website,
            'phone' => $this->phone,
            'zip' => $this->zip,
            'numberofemployees' => $this->numberofemployees,
            'annualrevenue' => $this->annualrevenue,
            'description' => $this->description,
            'contacts' => contactsRessource::collection($this->contacts)
        ];
    }
}
