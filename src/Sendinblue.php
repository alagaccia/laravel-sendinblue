<?php
namespace AndreaLagaccia\Sendinblue;

class Sendinblue
{
    protected $api_key;
    protected $list_id;
    protected $headers;

    protected const API_BASE_URL = "https://api.sendinblue.com/v3/";

    public function __construct()
    {
        $this->api_key = config('sendinblue.API_KEY') ?? env('SENDINBLUE_API_KEY');
        $this->list_id = config('sendinblue.LIST_ID') ?? env('SENDINBLUE_LIST_ID');
        $this->headers = $this->setHeaders();
    }

    public function setHeaders()
    {
        return [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
                'Api-Key' => config('sendinblue.API_KEY'),
            ];
    }

    public function getListId()
    {
        return $this->list_id;
    }

}
