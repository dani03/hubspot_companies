<?php

namespace App\Http\services;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;
class HubspotService
{
    public static  function client() {
       $access_key = env("THE_ACCESS_TOKEN");
       return  new Client([
            'base_uri' => 'https://api.hubapi.com/',
            'headers' => [
                'Authorization' => "Bearer {$access_key}",
                'Accept' => 'application/json',
            ],
        ]);
    }

    public function getCompanies($fromDate = '2021-06-09'): array {
        $since = strtotime($fromDate);
        $count = 10;
        $offset = 0;
        $response = self::client()->request('GET', 'companies/v2/companies/recent/modified', [
            'query' => [
                'since' => $since,
                'count' => $count,
                'offset' => $offset,
            ],
        ]);
     if ($response->getStatusCode() === 200) {
        $data =  json_decode($response->getBody()->getContents(), true);
        return $data['results'];
     }
     return [];
    }

    public function getContacts(int $companyId):array {
        $access_key = env("THE_ACCESS_TOKEN");
        $response2 = Http::withHeaders([
            'Authorization' => "Bearer {$access_key}",
            'Accept' => 'application/json',
        ])->get("https://api.hubapi.com/companies/v2/companies/{$companyId}/contacts");
        if($response2->status() === 200) {
            $data = json_decode($response2->getBody()->getContents(), true);
            return $data['contacts'] ?? [];
          //  dd($company, json_decode($response2->getBody()->getContents(), true));
        }
        return [];
    }

}
