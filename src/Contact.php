<?php
namespace alagaccia\sendinblue;

use alagaccia\sendinblue\Sendinblue;

class Contact extends Sendinblue
{
    public function create($client, $list_id = null)
    {
        \Http::withHeaders([
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
                'Api-Key' => config('sendinblue.API_KEY'),
            ])->post('https://api.sendinblue.com/v3/contacts', [
                'updateEnabled' => false,
                'listIds' => [2],
                'email' => $client->email,
                'attributes' => [
                    'SEX' => $client->sex ?? null,
                ]
            ]);
    }

}
