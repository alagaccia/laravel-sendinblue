<?php
namespace AndreaLagaccia\Sendinblue;

use AndreaLagaccia\Sendinblue\Sendinblue;
use Illuminate\Support\Facades\DB;

class TransactionalEmail extends Sendinblue
{
    protected $url;
    protected $template_url;

    public function __construct()
    {
        parent::__construct();

        $this->url = $this->api_base_url . 'smtp/email';
        $this->template_url = $this->api_base_url . 'smtp/templates';
    }

    /*
     * method: POST
     */ 
    public function send($to, $templateId = null, $params = null, $tags = null)
    {
        $res = \Http::withHeaders($this->api_headers)->post($this->url, [
                'to' => [
                    [
                        'email' => $to['email'],
                        'name' => $to['name'] ?? null,
                    ]
                ],
                'templateId' => $templateId ?? null,
                'params' => $params,
                'tags' => $tags,
            ]);

        return $res->object();
    }

    /*
     * method: GET
     * return: { count: x, transactionalEmails: {email, subject, messageId, uuid, date, templateId, from, tags[]} }
     */ 
    public function getEmails($params)
    {
        $res = \Http::withHeaders($this->api_headers)->get($this->url, $params);

        return $res->object();
    }

    /*
     * method: GET
     * return: { email, subject, date, events[], body, attachmentCount, templateId }
     */ 
    public function getEmail($uuid)
    {
        $res = \Http::withHeaders($this->api_headers)->get($this->url . '/' . $uuid);

        return $res->object();
    }
}
