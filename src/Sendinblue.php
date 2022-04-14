<?php
namespace AndreaLagaccia\Sendinblue;

class Sendinblue
{
    protected $api_key;
    protected $api_base_url;
    protected $api_headers;
    protected $sms_sender_name;
    protected $sms_webhook;
    protected $list_id;

    protected const API_BASE_URL = "https://api.sendinblue.com/v3/";

    public function __construct()
    {
        $this->set_api_key();
        $this->set_api_base_url();
        $this->set_api_headers();
        $this->set_list_id();
        $this->set_sms_sender_name();
        $this->set_sms_webhook();
        $this->get_list_id();
    }

    public function set_api_key()
    {
        $this->api_key = config('sendinblue.API_KEY') ?? env('SENDINBLUE_API_KEY');
    }

    public function set_api_base_url()
    {
        $this->api_base_url = self::API_BASE_URL;
    }

    public function set_api_headers()
    {
        $this->api_headers = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            'Api-Key' => config('sendinblue.API_KEY'),
        ];
    }

    public function set_sms_sender_name()
    {
        $this->sms_sender_name = config('sendinblue.SMS_SENDER_NAME') ?? env('SENDINBLUE_SMS_SENDER_NAME');
    }

    public function set_sms_webhook()
    {
        $this->sms_webhook = config('sendinblue.SMS_WEBHOOK') ?? env('SENDINBLUE_SMS_WEBHOOK') ?? null;
    }

    public function set_list_id()
    {
        $this->list_id = config('sendinblue.LIST_ID') ?? env('SENDINBLUE_LIST_ID');
    }

    public function get_list_id()
    {
        return $this->list_id;
    }

}
