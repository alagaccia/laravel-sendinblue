<?php
namespace AndreaLagaccia\Sendinblue;

class Sendinblue
{
    protected $api_key;
    protected $api_base_url;
    protected $api_headers;
    protected $setting_table_name;
    protected $setting_column_name;
    protected $setting_sms_counter_column_name;
    protected $setting_sms_counter_value_name;
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
        $this->set_setting_table_name();
        $this->set_setting_column_name();
        $this->set_setting_sms_counter_column_name();
        $this->set_setting_sms_counter_value_name();
        $this->set_sms_sender_name();
        $this->set_sms_webhook();
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

    public function set_setting_table_name()
    {
        $this->setting_table_name = config('sendinblue.SETTING_TABLE_NAME') ?? env('SENDINBLUE_SETTING_TABLE_NAME');
    }

    public function set_setting_column_name()
    {
        $this->setting_column_name = config('sendinblue.SETTING_COLUMN_NAME') ?? env('SENDINBLUE_SETTING_COLUMN_NAME');
    }

    public function set_setting_sms_counter_column_name()
    {
        $this->setting_sms_counter_column_name = config('sendinblue.SETTING_SMS_COUNTER_COLUMN_NAME') ?? env('SENDINBLUE_SETTINGS_SMS_COUNTER_COLUMN_NAME') ?? null;
    }

    public function set_setting_sms_counter_value_name()
    {
        $this->setting_sms_counter_value_name = config('sendinblue.SETTING_SMS_COUNTER_VALUE_NAME') ?? env('SENDINBLUE_SETTINGS_SMS_COUNTER_VALUE_NAME') ?? null;
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

    public function getListId()
    {
        return $this->list_id;
    }

}
