<?php
namespace AndreaLagaccia\Sendinblue;

use AndreaLagaccia\Sendinblue\Sendinblue;

class TransactionalSms extends Sendinblue
{
    protected $url;

    public function __construct()
    {
        parent::__construct();

        $this->url = $this->api_base_url . 'transactionalSMS/sms/';
    }

    public function send($number, $content)
    {
        $method_url = $this->url;

        $res = \Http::withHeaders($this->api_headers)->post($method_url, [
                'type' => 'transactional',
                'unicodeEnabled' => false,
                'sender' => $this->sms_sender_name,
                'recipient' => $number,
                'content' => $content,
                'webUrl' => $this->set_sms_webhook,
            ]);

        return $res->object();
    }
}
