<?php
namespace AndreaLagaccia\Sendinblue;

use AndreaLagaccia\Sendinblue\Sendinblue;
use Illuminate\Support\Facades\DB;

class TransactionalEmail extends Sendinblue
{
    protected $url;
    protected $url_get_emails;
    protected $template_url;

    public function __construct()
    {
        parent::__construct();

        $this->url = $this->api_base_url . 'smtp/email';
        $this->url_get_emails = $this->api_base_url . 'smtp/emails';
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
        // $res = \Http::withHeaders($this->api_headers)->get($this->url_get_emails, $params);

         // Build the query string from the parameters
        $queryString = http_build_query($params);
        
        // Construct the full URL
        $fullUrl = $this->url_get_emails . '?' . $queryString;
        
        // Log the full URL (you can replace this with any logging mechanism you use)
        \Log::info('Full URL: ' . $fullUrl);
        
        try {
            $res = \Http::withHeaders($this->api_headers)->get($fullUrl);
            return $res;
        } catch ( \Exception $e) {
            return $e->getMessage();
        }

        // $res = \Http::withHeaders($this->api_headers)->get($this->url_get_emails, $params);

        return $res->object();
    }

    /*
     * method: GET
     * return: { email, subject, date, events[], body, attachmentCount, templateId }
     */ 
    public function getEmail($uuid)
    {
        $res = \Http::withHeaders($this->api_headers)->get($this->url_get_emails . '/' . $uuid);

        return $res->object();
    }
}
