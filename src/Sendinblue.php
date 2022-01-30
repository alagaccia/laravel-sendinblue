<?php
namespace AndreaLagaccia\Sendinblue;

class Sendinblue
{
    protected $api_key;
    protected $api_base_url;
    protected $list_id;
    protected $headers;

    protected const API_BASE_URL = "https://api.sendinblue.com/v3/";

    public function __construct()
    {
        $this->set_api_key();
        $this->set_api_base_url();
        $this->set_list_id();
        $this->set_headers();
    }

    public function set_api_key()
    {
        $this->api_key = config('sendinblue.API_KEY') ?? env('SENDINBLUE_API_KEY');
    }

    public function set_api_base_url()
    {
        $this->api_base_url = self::API_BASE_URL;
    }

    public function set_list_id()
    {
        $this->list_id = config('sendinblue.LIST_ID') ?? env('SENDINBLUE_LIST_ID');
    }

    public function set_headers()
    {
        $this->headers = [
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
