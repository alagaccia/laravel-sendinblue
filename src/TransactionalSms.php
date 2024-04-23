<?php
namespace AndreaLagaccia\Sendinblue;

use AndreaLagaccia\Sendinblue\Sendinblue;
use Illuminate\Support\Facades\DB;

class TransactionalSms extends Sendinblue
{
    protected $url;

    public function __construct()
    {
        parent::__construct();

        $this->url = $this->api_base_url . 'transactionalSMS/sms';
    }

    public function send(array $to, int $templateId, array $params, array $tags = null)
    {
        $method_url = $this->url;

        $res = \Http::withHeaders($this->api_headers)->post($method_url, [
                'to' => [
                    [
                        'email' => $to['email'],
                        'name' => $to['name'],
                    ]
                ],
                'templateId' => $templateId,
                'params' => $params,
                'tags' => $tags,
            ]);

        return $res->object();
    }
}
