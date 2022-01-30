<?php
/*
 * Sendinblue Class
 */

namespace alagaccia\sendinblue;

class Sendinblue
{
    protected $api_key;
    protected $list_id;

    const API_URL = "https://api.sendinblue.com/v3/";

    public function __construct()
    {
        $this->api_key = config('sendinblue.API_KEY') ?? env('SENDINBLUE_API_KEY');
        $this->list_id = config('sendinblue.LIST_ID') ?? env('SENDINBLUE_LIST_ID');
    }

}
